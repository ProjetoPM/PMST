<?php
if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class WeeklyReport extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        if (!$this->session->userdata('logged_in'))
            redirect(base_url());

        $langs = array();
        array_push($langs, 'weekly_eval', 'weekly_report', 'workspace');

        loadLangs($langs);

        $this->load->helper('url');
        $this->load->helper('log_activity');

        $this->load->library('parser');

        $this->load->model('log_model');
        $this->load->model('view_model');
        $this->load->model('Project_model');
        $this->load->model('Workspace_model');
        $this->load->model('WeeklyReport_model');
        $this->load->model('Report_upload_model');
        $this->load->model('Pmbok_process_model');
        $this->load->model('Weekly_process_model');
        $this->load->model('WeeklyEvaluation_model');
    }

    public function list()
    {
        $dado['weekly_report'] = $this->WeeklyReport_model->getAllPerMember($_SESSION['user_id']);
        // var_dump($dado['weekly_report']);
        // exit();
        $dado['processes'] = verifyLanguage()
            ? $this->WeeklyReport_model->getProcessGroupsByLanguage(2)
            : $this->WeeklyReport_model->getProcessGroupsByLanguage(1);

        loadViews('workspace/weekly_report/list', $dado);
    }

    public function new()
    {
        if ($this->Workspace_model->getRole($_SESSION['workspace_id'], $_SESSION['user_id']) == 2) {
            $data['pmbok_processes'] = verifyLanguage()
                ? $this->WeeklyReport_model->getProcessGroupsByLanguage(2)
                : $data['pmbok_processes'] = $this->WeeklyReport_model->getProcessGroupsByLanguage(1);

            $query['evaluation'] = $this->WeeklyEvaluation_model->getAll($_SESSION['workspace_id']);
            foreach ($query['evaluation'] as $value => $evaluation) {


                /**
                 * Comparing if current date is greater than the submission date.
                 */
                $date_evaluation        = $evaluation->deadline;
                $date_submit            = new DateTime($date_evaluation);
                $current_date           = new DateTime(date('m/d/Y H:i:s', time()));
                $teste                  = $current_date->format('m/d/Y H:i:s');
                $teste2                 = $date_submit->format('m/d/Y H:i:s');

                if (diff_date($teste, $teste2)) {
                    unset($query['evaluation'][$value]);
                }
            }

            $data['evaluation'] =  array_values($query['evaluation']);

            loadViews('workspace/weekly_report/new', $data);
        } else {
            $this->session->set_flashdata('error', 'You are not allowed to access this page');
            redirect('workspace/list');
        }
    }

    /**
     * Função responsável em organizar as informações das imagens dos processos da página
     * 'new' do Weekly Report e salvar na tabela 'report_uploads'.
     */
    public function upload_image($weekly_report_id, $weekly_report_process_id, $name, $size, $tmpName)
    {
        /* Tamanho máximo do arquivo. */
        $maxSizeInMb = 50;

        if ($size > $maxSizeInMb * 1e6)
            return false;

        $folder = "upload/weekly_report/";
        $fileName = $name;
        $fileUniqName = uniqid();
        $fileExtension = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));

        if ($fileExtension != "jpg" && $fileExtension != "png" && $fileExtension != "pdf" && $fileExtension != "jpeg") {
            return false;
        }
        $filePath = $folder . $fileUniqName . "." . $fileExtension;
        move_uploaded_file($tmpName, $filePath);
        $this->Report_upload_model->saveImage($weekly_report_id, $weekly_report_process_id, $fileName, $filePath);
        return true;
    }

    public function insert()
    {
        $pmbok_id = (verifyLanguage()) ? 2 : 1;

        /**
         * Getting the data from the form.
         */
        $weekly_report          = $this->input->post('weekly_report');
        $processes              = $this->input->post('add');
        $files                  = $_FILES['files'] ?? [];

        /** 
         * Getting the informations.
         */
        $user_id                = $_SESSION['user_id'];
        $evaluation_id          = $weekly_report['evaluation_id'];
        $tool_evaluation        = $weekly_report['tool_evaluation'];

        /**
         * Verifying if the weekly report is already submitted.
         */
        if ($this->WeeklyReport_model->alreadySubmitted($evaluation_id, $user_id)) {
            $this->session->set_flashdata('error', 'You\'ve already submitted to this report');
            return redirect("weekly-report/list");
        }

        /** 
         * Preparing to insert the weekly report.
         */
        $save_weekly_report['weekly_evaluation_id']         = $evaluation_id;
        $save_weekly_report['tool_evaluation']              = $tool_evaluation;
        $save_weekly_report['user_id']                      = $user_id;
        $save_weekly_report['score']                        = 3;

        /**
         * Comparing if current date is greater than the submission date.
         */
        $date_evaluation        = $this->WeeklyEvaluation_model->getDeadline($evaluation_id);
        $date_submit            = new DateTime($date_evaluation);
        $current_date           = new DateTime(date('m/d/Y H:i:s', time()));

        $teste = $current_date->format('m/d/Y H:i:s');
        $teste2 = $date_submit->format('m/d/Y H:i:s');

        if (diff_date($teste, $teste2)) {
            $this->session->set_flashdata('error', 'You are not able to create this item, since the deadline has arrived');
            redirect('weekly-report/list');
        }

        $weekly_report_id = $this->WeeklyReport_model->insert($save_weekly_report);

        if (!$weekly_report_id) {
            $this->session->set_flashdata('error', 'There was an error inserting the weekly report');
            redirect('weekly-report/list');
        }

        /**
         * Inserting all the processes of the weekly report.
         */
        $upload_image_has_errors = false;

        if ($processes !== null) {
            foreach ($processes as $i => $value) {
                $save_weekly_report_process['weekly_report_id']         = $weekly_report_id;
                $save_weekly_report_process['pmbok_id']                 = $pmbok_id;
                $save_weekly_report_process['pmbok_group_id']           = $processes[$i]['process_group'];
                $save_weekly_report_process['pmbok_process_id']         = $processes[$i]['process_name'];
                $save_weekly_report_process['description']              = $processes[$i]['process_description'];

                /**
                 * Inserting the weekly_report_process.
                 */
                $this->Weekly_process_model->insert($save_weekly_report_process);

                /**
                 * Recovering the last of 'weekly_report_process_id' inserted. This will be used 
                 * to associate the images.
                 */
                $weekly_report_process_id = $this->Weekly_process_model->getLastIdWeeklyReportProcess();

                /**
                 * Inserting images.
                 */
                if (!empty($files['size'][$i][0])) {
                    for ($j = 0; $j < count($files['name'][$i]); $j++) {
                        $is_image_uploaded = $this->upload_image(
                            $weekly_report_id,
                            $weekly_report_process_id,
                            $files['name'][$i][$j],
                            $files['size'][$i][$j],
                            $files['tmp_name'][$i][$j],
                        );
                        if (!$is_image_uploaded) {
                            $upload_image_has_errors = true;
                        }
                    }
                }
            }
        }
        $upload_image_has_errors
            ? $this->session->set_flashdata('warning', 'Weekly Report created with some images not uploaded. Please check the images and try again.')
            : $this->session->set_flashdata('success', 'Weekly Report has been successfully created!');

        redirect('weekly-report/list');
    }

    public function edit($weekly_report_id)
    {
        if (strcmp($_SESSION['language'], "US") == 0)
            $this->lang->load('btn', 'english');
        else
            $this->lang->load('btn', 'portuguese-brazilian');

        if (verifyLanguage())
            $dado['pmbok_processes'] = $this->WeeklyReport_model->getProcessGroupsByLanguage(2);
        else
            $dado['pmbok_processes'] = $this->WeeklyReport_model->getProcessGroupsByLanguage(1);

        $dado['weekly_report'] = $this->WeeklyReport_model->get($weekly_report_id);
        $dado['weekly_processes'] = $this->WeeklyReport_model->getAllProcesses($weekly_report_id, getIndexOfLanguage());
        $dado['pmbok_groups'] = $this->WeeklyReport_model->getProcessNamesByGroup(getIndexOfLanguage());
        $dado['weekly_images'] = $this->Report_upload_model->getImages($weekly_report_id);

        $dado['evaluation'] = array(
            'name' => getWeeklyEvaluationName($dado['weekly_report'][0]->weekly_evaluation_id),
            'tool' => $dado['weekly_report'][0]->tool_evaluation,
        );
        loadViews('workspace/weekly_report/edit', $dado);
    }

    public function update($weekly_report_id)
    {
        $pmbok_id = (verifyLanguage()) ? 2 : 1;


        /**
         * Getting the data from the form.
         */
        $weekly_report              = $this->input->post('weekly_report');
        $new_processes              = $this->input->post('add');
        $evaluation_id              = $this->input->post('weekly_evaluation_id');
        $old_processes              = $this->input->post('update');
        $new_files_new_processes    = $_FILES['files'] ?? [];
        $new_files_old_processes    = $_FILES['files_update'] ?? [];
        $individual_image_delete    = $this->input->post('image_uploaded') ?? [];


        $date_evaluation        = $this->WeeklyEvaluation_model->getDeadline($evaluation_id);
        $date_submit            = new DateTime($date_evaluation);
        $current_date           = new DateTime(date('m/d/Y H:i:s', time()));

        // retorna o horário porém da erro no if
        $teste = $current_date->format('m/d/Y H:i:s');
        $teste2 = $date_submit->format('m/d/Y H:i:s');

        // $bool = ;
        if (diff_date($teste, $teste2)) {
            $this->session->set_flashdata('error', 'You are not able to create this item, since the deadline has arrived');
            redirect('weekly-report/list');
        }

        /**
         * Updating 'tool_evaluation' field.
         */
        $this->WeeklyReport_model->update($weekly_report_id, $weekly_report['tool_evaluation']);

        /**
         * Adding new processes.
         */
        $upload_image_has_errors = false;

        if (!empty($new_processes)) {
            foreach ($new_processes as $i => $value) {
                $save_weekly_report_process['weekly_report_id']         = $weekly_report_id;
                $save_weekly_report_process['pmbok_id']                 = $pmbok_id;
                $save_weekly_report_process['pmbok_group_id']           = $new_processes[$i]['process_group'];
                $save_weekly_report_process['pmbok_process_id']         = $new_processes[$i]['process_name'];
                $save_weekly_report_process['description']              = $new_processes[$i]['process_description'];

                /**
                 * Inserting the weekly_report_process.
                 */
                $this->Weekly_process_model->insert($save_weekly_report_process);

                /**
                 * Recovering the last of 'weekly_report_process_id' inserted. This will be used 
                 * to associate the images.
                 */
                $weekly_report_process_id = $this->Weekly_process_model->getLastIdWeeklyReportProcess();

                /**
                 * Inserting images.
                 */
                if (!empty($new_files_new_processes['size'][$i][0])) {
                    for ($j = 0; $j < count($new_files_new_processes['name'][$i]); $j++) {
                        $is_image_uploaded = $this->upload_image(
                            $weekly_report_id,
                            $weekly_report_process_id,
                            $new_files_new_processes['name'][$i][$j],
                            $new_files_new_processes['size'][$i][$j],
                            $new_files_new_processes['tmp_name'][$i][$j],
                        );
                        if (!$is_image_uploaded) {
                            $upload_image_has_errors = true;
                        }
                    }
                }
            }
        }

        /**
         * Updating old processes.
         */
        if (!empty($old_processes)) {
            foreach ($old_processes as $i => $value) {
                /**
                 * Removing processes marked for deletion.
                 */
                if ($old_processes[$i]['remove_process'] == 'true') {
                    $this->delete_images($i);
                    $this->Weekly_process_model->delete_process($i, $weekly_report_id);
                    continue;
                }
                $update_weekly_report_process['weekly_report_process_id']   = $i;
                $update_weekly_report_process['pmbok_id']                   = $pmbok_id;
                $update_weekly_report_process['pmbok_group_id']             = $old_processes[$i]['process_group'];
                $update_weekly_report_process['pmbok_process_id']           = $old_processes[$i]['process_name'];
                $update_weekly_report_process['description']                = $old_processes[$i]['process_description'];

                /**
                 * Inserting the weekly_report_process.
                 */
                $this->Weekly_process_model->update_processes($weekly_report_id, $update_weekly_report_process);

                /**
                 * Inserting images.
                 */
                if (!empty($new_files_old_processes)) {
                    for ($j = 0; $j < count($new_files_old_processes['name'][$i]); $j++) {
                        if (!empty($new_files_old_processes['name'][$i][0])) {
                            $is_image_uploaded = $this->upload_image(
                                $weekly_report_id,
                                $i,
                                $new_files_old_processes['name'][$i][$j],
                                $new_files_old_processes['size'][$i][$j],
                                $new_files_old_processes['tmp_name'][$i][$j],
                            );
                            if (!$is_image_uploaded) {
                                $upload_image_has_errors = true;
                            }
                        }
                    }
                }
            }
        }
        /**
         * Deleting individual images from processes using the 'report_upload_id' field.
         */
        if (!empty($individual_image_delete)) {
            foreach ($individual_image_delete as $i => $value) {
                if ($individual_image_delete[$i]['remove'] == 'true') {
                    $this->delete_image_by_report_upload_id($i);
                }
            }
        }

        $upload_image_has_errors
            ? $this->session->set_flashdata('warning', 'Weekly Report changed with some images not uploaded. Please check the images and try again.')
            : $this->session->set_flashdata('success', 'Weekly Report has been successfully changed!');

        redirect('weekly-report/list');
    }

    public function delete_images($weekly_report_process_id)
    {
        $array_path = $this->WeeklyReport_model->get_path_image_by_wr_process_id($weekly_report_process_id);

        if ($array_path != null) {
            foreach ($array_path as $path) {
                if (file_exists($path->path)) {
                    unlink($path->path);
                }
            }
        }
    }

    public function delete_images_by_wr_id($weekly_report_id)
    {
        $array_path = $this->WeeklyReport_model->get_path_image_by_wr_id($weekly_report_id);

        if ($array_path != null) {
            foreach ($array_path as $path) {
                if (file_exists($path->path)) {
                    unlink($path->path);
                }
            }
        }
    }

    public function delete_image_by_report_upload_id($report_upload_id)
    {
        $array_path = $this->WeeklyReport_model->get_path_image_by_report_upload_id($report_upload_id);

        if ($array_path != null) {
            foreach ($array_path as $path) {
                if (file_exists($path->path)) {
                    unlink($path->path);
                }
            }
        }
        $this->Weekly_process_model->delete_image_from_process_by($report_upload_id);
    }

    public function delete($weekly_report_id)
    {
        $query = $this->WeeklyReport_model->delete($weekly_report_id);
        $this->delete_images_by_wr_id($weekly_report_id);
        $this->Weekly_process_model->delete_process_images_by_wr_id($weekly_report_id);

        if ($query) {
            insertLogActivity('delete', 'weekly report');
            $this->session->set_flashdata('success', 'Weekly Report has been successfully deleted!');
            redirect('weekly-report/list');
        }
    }

    public function insert_process()
    {
        $weekly_report_process['description'] = $this->input->post('description');
        $weekly_report_process['process_name'] = $this->input->post('process_name');

        $data = $this->input->post('process_group');
        $weekly_report_process['weekly_report_id'] = 1;
        $query2 = $this->WeeklyReport_model->updateProcessReport($weekly_report_process, 1);
    }

    public function getProcessNameViaAjax()
    {
        if (!$this->input->is_ajax_request()) {
            exit("No direct script access allowed.");
        }

        /**
         * Remembering that in the database, pmbok '2' is in English 
         * and '1' is in portuguese.
         */
        $language = strcmp($_SESSION['language'], 'US') === 0 ? 2 : 1;
        echo json_encode($this->WeeklyReport_model->getProcessNamesByGroup($language));
    }
}
