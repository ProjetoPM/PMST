<?php
if (!defined('BASEPATH')) {
	exit('No direct script access allowed');
}

class WeeklyReport extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();

		date_default_timezone_set('America/Sao_Paulo');

		if (!$this->session->userdata('logged_in')) redirect(base_url());

		$langs = array();
		array_push($langs, 'weekly_eval', 'weekly_report');

		loadLangs($langs);

		$this->load->model('log_model');
		$this->load->model('view_model');
		$this->load->model('Project_model');
		$this->load->model('WeeklyReport_model');
		$this->load->model('Weekly_process_model');
		$this->load->model('Report_upload_model');
		$this->load->model('Pmbok_process_model');
		$this->load->model('WeeklyEvaluation_model');
		// $this->load->CI_Controller('LanguageSwitcher_controller');
		$this->load->helper('url');
		$this->load->helper('log_activity');
	}

	public function list()
	{
		$dado['weekly_report'] = $this->WeeklyReport_model->getAllPerMember($_SESSION['user_id']);
		if (verifyLanguage()) {
			$dado['processes'] = $this->WeeklyReport_model->getProcessGroupsByLanguage(2);
		} else {
			$dado['processes'] = $this->WeeklyReport_model->getProcessGroupsByLanguage(1);
		}

		loadViews('project/weekly_report/list', $dado);
	}

	public function new()
	{
		if (verifyLanguage()) {
			$dado['pmbok_processes'] = $this->WeeklyReport_model->getProcessGroupsByLanguage(2);
		} else {
			$dado['pmbok_processes'] = $this->WeeklyReport_model->getProcessGroupsByLanguage(1);
		}

		$dado['evaluation'] = $this->WeeklyEvaluation_model->getAll();
		loadViews('project/weekly_report/new', $dado);
	}

	public function insert()
	{
		if (verifyLanguage()) {
			$id = 2;
		} else {
			$id = 1;
		}
		$weekly_report['weekly_evaluation_id'] = $this->input->post('evaluation_id');
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
		$insert_id   = $this->WeeklyReport_model->insert($weekly_report);

		if (!$insert_id) {
			$this->session->set_flashdata('error', 'There was an error inserting the weekly report');
			redirect('weekly-report/list');
		}

		for ($i = 1; $this->input->post("process_name-${i}"); $i++) {
			$weekly_report_process['weekly_report_id'] = $insert_id;
			$weekly_report_process['pmbok_id'] = $id;
			$weekly_report_process['pmbok_process_id'] = $this->input->post("process_name-$i");
			$weekly_report_process['description'] = $this->input->post("description-$i");
			$query = $this->Weekly_process_model->insert($weekly_report_process);
		}

		if ($query) {
			$weekly_report_process['weekly_report_id'] = $insert_id;
			$this->session->set_flashdata('success', 'Weekly Report has been successfully created!');
			redirect('weekly-report/list');
		}
	}

	public function edit($weekly_report_id)
	{
		if (strcmp($_SESSION['language'], "US") == 0) $this->lang->load('btn', 'english');
		else $this->lang->load('btn', 'portuguese-brazilian');

		if (verifyLanguage()) $dado['pmbok_processes'] = $this->WeeklyReport_model->getProcessGroupsByLanguage(2);
		else $dado['pmbok_processes'] = $this->WeeklyReport_model->getProcessGroupsByLanguage(1);
		
		$dado['evaluation'] = $this->WeeklyEvaluation_model->getAll();
		$dado['weekly_report'] = $this->WeeklyReport_model->get($weekly_report_id);
		$dado['weekly_processes'] = $this->WeeklyReport_model->getAllProcesses($weekly_report_id);

		loadViews('project/weekly_report/edit', $dado);
		print_r($dado['weekly_processes']);
	}

	public function update($weekly_report_id)
	{
		$weekly_report['tool_evaluation'] = $this->input->post('tool_evaluation');
		$weekly_report['weekly_evaluation_id'] = $this->input->post('evaluation_id');
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
		var_dump($data);
		exit();
		$weekly_report_process['weekly_report_id'] = 1;
		$query2 = $this->WeeklyReport_model->updateProcessReport($weekly_report_process, 1);
	}


	//Armazena a imagem localmente 
	function do_upload()
	{
		$target_dir = "upload/reports/";
		$image_data = explode(".", $_FILES["image"]["name"]);
		$image_type = $image_data[1];
		$tmp_name = uniqid(rand()) . "." . $image_type;
		$target_file = $target_dir . $tmp_name;

		// $imageFileType pega o tipo do arquivo
		$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

		$check = getimagesize($_FILES["image"]["tmp_name"]);
		if ($check !== false) {
			$uploadOK = 1;
		} else {
			$this->session->set_flashdata('error', 'File is not an image');
			redirect('weekly-report/list');
		}


		// Verificações do tipo da imagem, tamanho e se já existe
		if (file_exists($target_file)) {
		}
		if ($_FILES["image"]["size"] > 500000) {
			$this->session->set_flashdata('error', 'File is too large');
			redirect('weekly-report/list');
		}
		if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
			$this->session->set_flashdata('error', 'File must be a jpg, png or jpeg.');
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

	// Método post realizando a persistência com o banco
	function upload_image()
	{
		$target_file = $this->do_upload();
		$data['path'] = $target_file;
		$data['alt'] = $this->input->post('description');
		$data['weekly_report_process_id'] = $this->input->post('process_id');

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
