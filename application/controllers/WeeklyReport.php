<?php
if (!defined('BASEPATH')) {
	exit('No direct script access allowed');
}

class WeeklyReport extends CI_Controller
{

	public function __Construct()
	{
		parent::__Construct();
		if (!$this->session->userdata('logged_in')) {
			redirect(base_url());
		}

		if (strcmp($_SESSION['language'], "US") == 0) {
			$this->lang->load('weekly_eval', 'english');

			$this->lang->load('weekly_report', 'english');
			$this->lang->load('project-page', 'english');
		} else {
			$this->lang->load('weekly_eval', 'english');
			$this->lang->load('weekly_report', 'portuguese-brazilian');
			$this->lang->load('project-page', 'portuguese-brazilian');
		}

		//$this->lang->load('btn','portuguese-brazilian');
		//$this->lang->load('risk-mp','portuguese-brazilian');

		$this->load->model('Project_model');
		$this->load->helper('log_activity');
		$this->load->model('log_model');
		$this->load->model('view_model');
		$this->load->helper('url');
		$this->load->model('WeeklyReport_model');
		$this->load->model('WeeklyEvaluation_model');
	}

	public function list()
	{

		if (strcmp($_SESSION['language'], "US") == 0) {
			$this->lang->load('btn', 'english');
		} else {
			$this->lang->load('btn', 'portuguese-brazilian');
		}

		$dado['weekly_report'] = $this->WeeklyReport_model->getAllPerMember($_SESSION['user_id']);
		

		$this->load->view('frame/header_view');
		$this->load->view('frame/topbar');
		$this->load->view('frame/sidebar_nav_view');
		$this->load->view('project/weekly_report/list', $dado);

	}
	
	public function new()
	{

		if (strcmp($_SESSION['language'], "US") == 0) {
			$this->lang->load('btn', 'english');
		} else {
			$this->lang->load('btn', 'portuguese-brazilian');
		}

		$dado['evaluation'] = $this->WeeklyEvaluation_model->getAll();
		
		$this->load->view('frame/header_view');
		$this->load->view('frame/topbar');
		$this->load->view('frame/sidebar_nav_view');
		$this->load->view('project/weekly_report/new', $dado);
	}

	public function insert()
	{
		insertLogActivity('insert', 'Weekly Report');

		$weekly_report['tool_evaluation'] = $this->input->post('tool_evaluation');
		$weekly_report['user_id'] = $_SESSION['user_id'];
		$weekly_report['weekly_evaluation_id'] = $this->input->post('evaluation_id');

		$weekly_report_process['pdf_path'] = $this->input->post('pdf_path');
		$weekly_report_process['description'] = $this->input->post('description');
		$weekly_report_process['process_name'] = $this->input->post('process_name');

		
		
		$insert_id   = $this->WeeklyReport_model->insert($weekly_report);
		$weekly_report_process['weekly_report_id'] = $insert_id;

		$query2 = $this->WeeklyReport_model->updateProcessReport($weekly_report_process, $insert_id);

		$this->session->set_flashdata('success', 'Weekly Report has been successfully created!');
		redirect('weekly-report/list');
		// echo json_encode($insert);
	}

	public function edit($weekly_report_id)
	{

		if (strcmp($_SESSION['language'], "US") == 0) {
			$this->lang->load('btn', 'english');
		} else {
			$this->lang->load('btn', 'portuguese-brazilian');
		}

		$this->db->where('user_id',  $_SESSION['user_id']);
		$this->db->where('project_id',  $_SESSION['project_id']);
		$project['dados'] = $this->db->get('project_user')->result();
		// Verificando se o usuario logado tem acesso a esse projeto
		$dado['weekly_report'] = $this->WeeklyReport_model->get($weekly_report_id);
		$dado['processes'] = $this->WeeklyReport_model->getAllItens($weekly_report_id);
		$this->load->view('frame/header_view');
		$this->load->view('frame/topbar');
		$this->load->view('frame/sidebar_nav_view');
		$this->load->view('project/weekly_report/new', $dado);
	}


	public function update($weekly_report_id)
	{
		insertLogActivity('update', 'weekly report');

	
		$weekly_report['date'] = $this->input->post('date');
		$weekly_report['tool_evaluation'] = $this->input->post('tool_evaluation');
		$weekly_report['user_id'] = $_SESSION['user_id'];


		$weekly_report_process['pdf_path'] = $this->input->post('pdf_path');
		$weekly_report_process['description'] = $this->input->post('description');
		$weekly_report_process['status'] = $this->input->post('status');
		

		$insert_id   = $this->WeeklyReport_model->update($weekly_report, $weekly_report_id);
		$query2 = $this->WeeklyReport_model->updateQualityCheckItem($weekly_report_process, $weekly_report_id);

		$this->session->set_flashdata('update', 'Weekly Report has been successfully changed!');
		redirect('weekly-report/list');
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
}
