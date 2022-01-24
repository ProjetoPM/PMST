<?php
defined('BASEPATH') or exit('No direct script access allowed');

class WeeklyEvaluation extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		if (!$this->session->userdata('logged_in')) {
			redirect(base_url());
		}

		// $this->load->helper('url', 'english');

		if (strcmp($_SESSION['language'], "US") == 0) {
			$this->lang->load('weekly_eval', 'english');
			$this->lang->load('weekly_report', 'english');
			$this->lang->load('project-page', 'english');
		} else {
			$this->lang->load('weekly_eval', 'portuguese-brazilian');
			$this->lang->load('weekly_report', 'portuguese-brazilian');
			$this->lang->load('project-page', 'portuguese-brazilian');
		}

		$this->load->model('Project_model');
		$this->load->helper('log_activity');
		$this->load->model('log_model');
		$this->load->model('view_model');
		$this->load->helper('url');
		$this->load->model('WeeklyEvaluation_model');
		$this->load->model('WeeklyReport_model');
	}

	public function list()
	{

		if (strcmp($_SESSION['language'], "US") == 0) {
			$this->lang->load('btn', 'english');
		} else {
			$this->lang->load('btn', 'portuguese-brazilian');
		}

		$dado['weekly_evaluation'] = $this->WeeklyEvaluation_model->getAll($_SESSION['user_id']);
		$dado['weekly_report'] = $this->WeeklyReport_model->getAll();

		$this->load->view('frame/header_view');
		$this->load->view('frame/topbar');
		$this->load->view('frame/sidebar_nav_view');
		$this->load->view('project/weekly_evaluation/list', $dado);
	}





	public function new_submission_score($id)
	{

		if (strcmp($_SESSION['language'], "US") == 0) {
			$this->lang->load('btn', 'english');
		} else {
			$this->lang->load('btn', 'portuguese-brazilian');
		}
		$dado['weekly_report'] = $this->WeeklyReport_model->get($id);
		$dado['weekly_processes'] = $this->WeeklyReport_model->getAllProcesses($id);
		// var_dump($dado);
		// die();
		$this->load->view('frame/header_view');
		$this->load->view('frame/topbar');
		$this->load->view('frame/sidebar_nav_view');
		$this->load->view('project/weekly_evaluation/evaluate', $dado);
	}

	function insert_score()
	{
		if (strcmp($_SESSION['language'], "US") == 0) {
			$feedback_success = 'ItemEvaluated';
		} else {
			$feedback_success = 'Item Avaliado ';
		}

		$weekly_report['score'] = $this->input->post('score');
		$weekly_report['comments'] = $this->input->post('comments');


		$insert  = $this->WeeklyReport_model->insert($weekly_report);
		if ($insert) {
			$this->session->set_flashdata('success', $feedback_success);
			insertLogActivity('insert', 'weekly evaluation');
		}
		redirect("weekly-evaluation/list");
		// echo json_encode($insert);
	}

	function edit_score($id)
	{
		if (strcmp($_SESSION['language'], "US") == 0) {
			$this->lang->load('btn', 'english');
		} else {
			$this->lang->load('btn', 'portuguese-brazilian');
		}
		$dado['weekly_report'] = $this->WeeklyReport_model->get($id);
		$dado['weekly_processes'] = $this->WeeklyReport_model->getAllProcesses($id);


		$this->load->view('frame/header_view');
		$this->load->view('frame/topbar');
		$this->load->view('frame/sidebar_nav_view');
		$this->load->view('project/weekly_evaluation/edit_score', $dado);
	}

	function update_score($weekly_report_id)
	{
		if (strcmp($_SESSION['language'], "US") == 0) {
			$feedback_success = 'Item Created';
		} else {
			$feedback_success = 'Item Criado ';
		}

		$weekly_report['score'] = $this->input->post('score');
		$weekly_report['comments'] = $this->input->post('comments');
		$weekly_report['user_id'] = $weekly_report['user_id'];
		die($weekly_report['user_id']);

		$insert  = $this->WeeklyReport_model->update($weekly_report, $weekly_report_id);
		if ($insert) {
			$this->session->set_flashdata('success', $feedback_success);
			insertLogActivity('insert', 'weekly evaluation');
		}
		redirect("weekly-evaluation/list");
		// echo json_encode($insert);
	}

	public function new()
	{

		if (strcmp($_SESSION['language'], "US") == 0) {
			$this->lang->load('btn', 'english');
		} else {
			$this->lang->load('btn', 'portuguese-brazilian');
		}

		$this->load->view('frame/header_view');
		$this->load->view('frame/topbar');
		$this->load->view('frame/sidebar_nav_view');
		$this->load->view('project/weekly_evaluation/new');
	}

	function insert()
	{
		if (strcmp($_SESSION['language'], "US") == 0) {
			$feedback_success = 'Item Created';
		} else {
			$feedback_success = 'Item Criado ';
		}

		$weekly_evaluation['name'] = $this->input->post('name');
		$weekly_evaluation['start_date'] = $this->input->post('start_date');
		$weekly_evaluation['end_date'] = $this->input->post('end_date');
		$weekly_evaluation['deadline'] = $this->input->post('deadline');
		$weekly_evaluation['status'] = $this->input->post('status');
		$weekly_evaluation['individual_or_group'] = $this->input->post('type');
		$weekly_evaluation['user_id'] = $_SESSION['user_id'];

		$insert  = $this->WeeklyEvaluation_model->insert($weekly_evaluation);
		if ($insert) {
			$this->session->set_flashdata('success', $feedback_success);
			insertLogActivity('insert', 'weekly evaluation');
		}
		redirect("weekly-evaluation/list");
		// echo json_encode($insert);
	}

	public function edit($weekly_evaluation)
	{

		if (strcmp($_SESSION['language'], "US") == 0) {
			$this->lang->load('btn', 'english');
		} else {
			$this->lang->load('btn', 'portuguese-brazilian');
		}

		$dado['weekly_evaluation'] = $this->WeeklyEvaluation_model->get($weekly_evaluation);

		$this->load->view('frame/header_view');
		$this->load->view('frame/topbar');
		$this->load->view('frame/sidebar_nav_view');
		$this->load->view('project/weekly_evaluation/edit', $dado);
	}




	public function update($weekly_evaluation_id)
	{
		if (strcmp($_SESSION['language'], "US") == 0) {
			$feedback_success = 'Item Updated';
		} else {
			$feedback_success = 'Item Atualizado ';
		}

		$weekly_evaluation['name'] = $this->input->post('name');
		$weekly_evaluation['start_date'] = $this->input->post('start_date');
		$weekly_evaluation['end_date'] = $this->input->post('end_date');
		$weekly_evaluation['deadline'] = $this->input->post('deadline');
		$weekly_evaluation['status'] = $this->input->post('status');
		$weekly_evaluation['individual_or_group'] = $this->input->post('type');
		$weekly_evaluation['user_id'] = $_SESSION['user_id'];


		$query = $this->WeeklyEvaluation_model->update($weekly_evaluation_id, $weekly_evaluation);
		if ($query) {
			$this->session->set_flashdata('success', $feedback_success);
			insertLogActivity('update', 'weekly_evaluation');
		}

		$this->load->view('frame/header_view');
		$this->load->view('frame/topbar');
		$this->load->view('frame/sidebar_nav_view');
		redirect("weekly-evaluation/list");
	}
}
