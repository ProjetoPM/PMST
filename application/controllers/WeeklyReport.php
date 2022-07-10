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
        array_push($langs, 'weekly_eval', 'weekly_report');

        loadLangs($langs);

        $this->load->model('log_model');
        $this->load->model('view_model');
        $this->load->model('Workspace_model');
        $this->load->model('WeeklyReport_model');
        $this->load->model('Report_upload_model');
        $this->load->model('Pmbok_process_model');
        $this->load->model('Weekly_process_model');
        $this->load->model('WeeklyEvaluation_model');
        $this->load->library('parser');
        $this->load->helper('url');
        $this->load->helper('log_activity');
    }

    public function list()
    {
        $dado['weekly_report'] = $this->WeeklyReport_model->getAllPerMember($_SESSION['user_id']);

        $dado['processes'] = verifyLanguage()
            ? $this->WeeklyReport_model->getProcessGroupsByLanguage(2)
            : $this->WeeklyReport_model->getProcessGroupsByLanguage(1);

        loadViews('workspace/weekly_report/list', $dado);
    }

    public function new()
    {
        if ($this->Workspace_model->getRole($_SESSION['workspace_id'], $_SESSION['user_id']) == 2) {
            $dado['pmbok_processes'] = verifyLanguage()
                ? $this->WeeklyReport_model->getProcessGroupsByLanguage(2)
                : $dado['pmbok_processes'] = $this->WeeklyReport_model->getProcessGroupsByLanguage(1);

            $dado['evaluation'] = $this->WeeklyEvaluation_model->getAll();
            loadViews('workspace/weekly_report/new', $dado);
        } else {
            $this->session->set_flashdata('error', 'You are not allowed to access this page');
            redirect('workspace/list');
        }
    }

    /**
     * Função responsável em organizar as informações das imagens dos processos da página
     * 'new' do Weekly Report e salvar na tabela 'report_uploads'.
     */
    public function uploadImage($weekly_report_id, $weekly_report_process_id, $name, $size, $tmpName)
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
        } else {
            $filePath = $folder . $fileUniqName . "." . $fileExtension;
            move_uploaded_file($tmpName, $filePath);
            $this->Report_upload_model->saveImage($weekly_report_id, $weekly_report_process_id, $fileName, $filePath);
            return true;
        }
    }

    public function insert()
    {
        $pmbok_id = (verifyLanguage()) ? 2 : 1;

        /**
         * Getting the data from the form.
         */
        $weekly_report          = $this->input->post('weekly_report');
        $processes              = $this->input->post('add');
        $files                  = $_FILES['files'];

        /** 
         * Getting the informations.
         */
        $user_id                = $_SESSION['user_id'];
        $evaluation_id          = $weekly_report['evaluation_id'];
        $tool_evaluation        = $weekly_report['tool_evaluation'];


        /**
         * Verifying if the weekly report is already submitted.
         */
        // if ($this->WeeklyReport_model->alreadySubmitted($evaluation_id, $user_id)) {
        // 	$this->session->set_flashdata('error', 'You\'ve already submitted to this report');
        // 	return redirect("weekly-report/list");
        // }

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
        $current_date           = new DateTime(date('m/d/Y', time()));


        if ($current_date > $date_submit) {
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
        
        foreach ($processes as $i => $value) {
            $save_weekly_report_process['weekly_report_id']         = $weekly_report_id;
            $save_weekly_report_process['pmbok_id']                 = $pmbok_id;
            $save_weekly_report_process['pmbok_group_id']           = $processes[$i]['process_group'];
            $save_weekly_report_process['pmbok_process_id']         = $processes[$i]['process_name'];
            $save_weekly_report_process['description']              = $processes[$i]['process_description'];

            /**
             * Inserting the weekly_report_process.
             */
            $query = $this->Weekly_process_model->insert($save_weekly_report_process);

            /**
             * Recovering the last of 'weekly_report_process_id' inserted. This will be used 
             * to associate the images.
             */
            $weekly_report_process_id = $this->Weekly_process_model->getLastIdWeeklyReportProcess();

            /**
             * Inserting images.
             */
            for ($j = 0; $j < count($files['name'][$i]); $j++) {
                $this->uploadImage(
                    $weekly_report_id,
                    $weekly_report_process_id,
                    $files['name'][$i][$j],
                    $files['size'][$i][$j],
                    $files['tmp_name'][$i][$j],
                );
            }
        }

        if ($query) {
            $this->session->set_flashdata('success', 'Weekly Report has been successfully created!');
            redirect('weekly-report/list');
        }
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
            'name' => getWeeklyEvaluationName($dado['weekly_report']['weekly_evaluation_id']),
            'tool' => $dado['weekly_report']['tool_evaluation'],
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
        $old_processes              = $this->input->post('update');  
        $new_files_new_processes    = $_FILES['files'] ?? [];
        $new_files_old_processes    = $_FILES['files_update'] ?? [];

        /**
         * Adding new processes.
         */
        print_r(empty($new_processes) ? 'new_processes está vazio.' : 'new_processes não está vazio.');

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
                for ($j = 0; $j < count($new_files_new_processes['name'][$i]); $j++) {
                    $this->uploadImage(
                        $weekly_report_id,
                        $weekly_report_process_id,
                        $new_files_new_processes['name'][$i][$j],
                        $new_files_new_processes['size'][$i][$j],
                        $new_files_new_processes['tmp_name'][$i][$j],
                    );
                }
            }
        }

        print_r(empty($old_processes) ? '----------old_processes está vazio.' : 'old_processes não está vazio.');

        /**
         * Updating old processes.
         */
        if (!empty($old_processes)) {
            foreach ($old_processes as $i => $value) {
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
                for ($j = 0; $j < count($new_files_old_processes['name'][$i]); $j++) {
                    $this->uploadImage(
                        $weekly_report_id,
                        $i,
                        $new_files_old_processes['name'][$i][$j],
                        $new_files_old_processes['size'][$i][$j],
                        $new_files_old_processes['tmp_name'][$i][$j],
                    );
                }
            }
        }


        // print_r($_FILES);
        // // print_r($new_files_old_processes);
        // exit();

        // /** 
        //  * Getting the informations.
        //  */
        // $user_id                = $_SESSION['user_id'];
        // $evaluation_id          = $weekly_report['evaluation_id'];
        // $tool_evaluation        = $weekly_report['tool_evaluation'];

        // $weekly_report['tool_evaluation'] = $this->input->post('tool_evaluation');
        // $weekly_report['user_id'] = $_SESSION['user_id'];

        // $weekly_report_process['process_name'] = $this->input->post('process');
        // $weekly_report_process['description'] = $this->input->post('description');

        // $data = $this->WeeklyEvaluation_model->getDeadline($weekly_report['weekly_evaluation_id']);
        // $date = date('m/d/Y', time());
        // $currentDate = new DateTime($date);
        // $submitDay = new DateTime($data);

        // if ($currentDate > $submitDay) {
        //     $this->session->set_flashdata('error', 'You are not able to update this item, since the deadline has arrived');
        //     redirect('weekly-report/list');
        // } else {
        //     $insert_id   = $this->WeeklyReport_model->update($weekly_report, $weekly_report_id);
        //     $query2 = $this->WeeklyReport_model->updateProcessReport($weekly_report_process, $insert_id);
        //     insertLogActivity('update', 'weekly report');
        //     $this->session->set_flashdata('update', 'Weekly Report has been successfully changed!');
        //     redirect('weekly-report/list');
        // }
    }

    public function delete($weekly_report_id)
    {
        //$project_id['project_id'] = $project_id;
        $query = $this->WeeklyReport_model->delete($weekly_report_id);
        if ($query) {
            insertLogActivity('delete', 'quality checklist');
            redirect('weekly-report/list');
        }
    }

    public function images($weekly_report_id)
    {
        if (strcmp($_SESSION['language'], "US") == 0) {
            $this->lang->load('btn', 'english');
        } else {
            $this->lang->load('btn', 'portuguese-brazilian');
        }

        $dado['uploads'] = $this->Report_upload_model->getAllPerProcesses($weekly_report_id);

        exit();
        $this->load->view('frame/header_view');
        $this->load->view('frame/topbar');
        $this->load->view('frame/sidebar_nav_view');
        $this->load->view('project/weekly_report/images', $dado);
    }

    public function insert_process()
    {
        $weekly_report_process['description'] = $this->input->post('description');
        $weekly_report_process['process_name'] = $this->input->post('process_name');

        $data = $this->input->post('process_group');
        $weekly_report_process['weekly_report_id'] = 1;
        $query2 = $this->WeeklyReport_model->updateProcessReport($weekly_report_process, 1);
    }


    //Armazena a imagem localmente 
    function do_upload($id_file = null)
    {
        $indexFile = $id_file != null ? $id_file : "image";

        $target_dir = "upload/reports/";
        $image_data = explode(".", $_FILES[$indexFile]["name"]);
        $image_type = $image_data[1];
        $tmp_name = uniqid(rand()) . "." . $image_type;
        $target_file = $target_dir . $tmp_name;

        // $imageFileType pega o tipo do arquivo
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        $check = getimagesize($_FILES[$indexFile]["tmp_name"]);
        if ($check !== false) {
            $uploadOK = 1;
        } else {
            $this->session->set_flashdata('error', 'Invalid File.');
            redirect('weekly-report/list');
        }


        // Verificações do tipo da imagem, tamanho e se já existe
        if (file_exists($target_file)) {
        }

        $sizeInMegaBytes = 50;

        if ($_FILES["image"]["size"] > $sizeInMegaBytes * 10e6) {
            $this->session->set_flashdata('error', 'File is too large');
            redirect('weekly-report/list');
        }
        if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "pdf") {
            $this->session->set_flashdata('error', 'File must be a jpg, png, jpeg or pdf');
            redirect('weekly-report/list');
        }
        if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
            $this->session->set_flashdata('success', 'File ' . htmlspecialchars(basename($_FILES["image"]["name"])) . ' has been uploaded.');
            return $target_file;
        } else {
            $this->session->set_flashdata('error', 'There was an error uploading this file.');
            return false;
        }
    }

    // Método para realizar a persistência com o banco
    function upload_image($name, $process_id)
    {
        $target_file = $this->do_upload();
        $data['path'] = $target_file;
        $data['alt'] = $name;
        $data['weekly_report_process_id'] = $process_id;

        $this->Report_upload_model->insert($data);
        redirect('weekly-report/list');
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
