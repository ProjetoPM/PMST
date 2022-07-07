<?php
if (!defined('BASEPATH')) {
	exit('No direct script access allowed');
}

class WeeklyReport extends CI_Controller
{
	public function __construct() {
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

	public function list() {
        $dado['weekly_report'] = $this->WeeklyReport_model->getAllPerMember($_SESSION['user_id']);

		$dado['processes'] = verifyLanguage()
            ? $this->WeeklyReport_model->getProcessGroupsByLanguage(2)
		    : $this->WeeklyReport_model->getProcessGroupsByLanguage(1);

		loadViews('workspace/weekly_report/list', $dado);
	}

	public function new() {
		if($this->Workspace_model->getRole($_SESSION['workspace_id'], $_SESSION['user_id']) == 2){
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
    public function uploadImage($weekly_report_id, $weekly_report_process_id, $name, $size, $tmpName) {
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

	public function insert() {
		$pmbok_id = (verifyLanguage()) ? 2 : 1;

		$weekly_evaluation_id = $this->input->post('evaluation_id');

		// if ($this->WeeklyReport_model->alreadySubmitted($weekly_evaluation_id, $_SESSION['user_id'])) { 
		if (!$this->WeeklyReport_model->alreadySubmitted($weekly_evaluation_id, $_SESSION['user_id'])) {
			$this->session->set_flashdata('error', 'You\'ve already submitted to this report');
			return redirect("weekly-report/list");
		}
		
		$weekly_report['weekly_evaluation_id'] = $weekly_evaluation_id;
		$weekly_report['tool_evaluation'] = $this->input->post('tool_evaluation');
		$weekly_report['user_id'] = $_SESSION['user_id'];
		$weekly_report['score'] = 3;

		// Compara a data atual com a data de submissão
		$data = $this->WeeklyEvaluation_model->getDeadline($this->input->post('evaluation_id'));
		$submitDay = new DateTime($data);
		
		$date = date('m/d/Y', time());
		$currentDate = new DateTime($date);

		if ($currentDate > $submitDay) {
			$this->session->set_flashdata('error', 'You are not able to create this item, since the deadline has arrived');
			redirect('weekly-report/list');
		}
		$weekly_report_id = $this->WeeklyReport_model->insert($weekly_report);

		if (!$weekly_report_id) {
			$this->session->set_flashdata('error', 'There was an error inserting the weekly report');
			redirect('weekly-report/list');
		}

		for ($i = 1; $this->input->post("process_name-${i}"); $i++) {
			$weekly_report_process['weekly_report_id'] = $weekly_report_id;
			$weekly_report_process['pmbok_id'] = $pmbok_id;
			$weekly_report_process['pmbok_group_id'] = $this->input->post("process_group-$i");
			$weekly_report_process['pmbok_process_id'] = $this->input->post("process_name-$i");
			$weekly_report_process['description'] = $this->input->post("description-$i");
			$query = $this->Weekly_process_model->insert($weekly_report_process);

            /**
             * Recupera o id do último 'weekly_report_process_id' inserido. Este id é usado para
             * associar as imagens a um processo.
             */
            $weekly_report_process_id = $this->Weekly_process_model->getLastIdWeeklyReportProcess();
            $files = $_FILES["files-${i}"];

            if (isset($files) && count($files) > 0) {
                foreach ($files['name'] as $index => $file) {
                    $this->uploadImage(
                        $weekly_report_id,
                        $weekly_report_process_id,
                        $files['name'][$index],
                        $files['size'][$index],
                        $files['tmp_name'][$index],
                    );
                }
            }
		}

		if ($query) {
			$weekly_report_process['weekly_report_id'] = $insert_id;
			$this->session->set_flashdata('success', 'Weekly Report has been successfully created!');
			redirect('weekly-report/list');
		}
	}

	public function edit($weekly_report_id) {
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
		$weekly_report['tool_evaluation'] = $this->input->post('tool_evaluation');
		$weekly_report['user_id'] = $_SESSION['user_id'];

		$weekly_report_process['process_name'] = $this->input->post('process');
		$weekly_report_process['description'] = $this->input->post('description');

		$data = $this->WeeklyEvaluation_model->getDeadline($weekly_report['weekly_evaluation_id']);
		$date = date('m/d/Y', time());
		$currentDate = new DateTime($date);
		$submitDay = new DateTime($data);

		if ($currentDate > $submitDay) {
			$this->session->set_flashdata('error', 'You are not able to update this item, since the deadline has arrived');
			redirect('weekly-report/list');
		} else {
			$insert_id   = $this->WeeklyReport_model->update($weekly_report, $weekly_report_id);
			$query2 = $this->WeeklyReport_model->updateProcessReport($weekly_report_process, $insert_id);
			insertLogActivity('update', 'weekly report');
			$this->session->set_flashdata('update', 'Weekly Report has been successfully changed!');
			redirect('weekly-report/list');
		}
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
