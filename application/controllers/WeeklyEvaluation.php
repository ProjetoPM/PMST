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

		$array = array();
		array_push($array, 'weekly_eval', 'weekly_report', 'feedback');
		loadLangs($array);
		if (strcmp($_SESSION['language'], "US") == 0) {
			$this->lang->load('weekly_eval', 'english');
			$this->lang->load('weekly_report', 'english');
			$this->lang->load('project-page', 'english');
		} else {
			$this->lang->load('weekly_eval', 'portuguese-brazilian');
			$this->lang->load('weekly_report', 'portuguese-brazilian');
			$this->lang->load('project-page', 'portuguese-brazilian');
		}

		$this->load->helper('log_activity');
		$this->load->helper('url');
		$this->load->model('log_model');
		$this->load->model('view_model');
		$this->load->model('Score_model');
		$this->load->model('Project_model');
		$this->load->model('Workspace_model');
		$this->load->model('WeeklyReport_model');
        $this->load->model('Report_upload_model');
		$this->load->model('WeeklyEvaluation_model');
	}

	public function list($workspace_id)
	{
		if (strcmp($_SESSION['language'], "US") == 0) {
			$this->lang->load('btn', 'english');
		} else {
			$this->lang->load('btn', 'portuguese-brazilian');
		}

		$dado['weekly_evaluation'] = $this->WeeklyEvaluation_model->getAll($workspace_id);
		$dado['weekly_report'] = $this->WeeklyReport_model->getAllPerWorkspace($workspace_id);

		$this->load->view('frame/header_view');
		$this->load->view('frame/topbar');
		$this->load->view('frame/sidebar_nav_view');
		$this->load->view('workspace/weekly_evaluation/list', $dado);
	}

	public function new()
	{
		if (strcmp($_SESSION['language'], "US") == 0) {
			$this->lang->load('btn', 'english');
		} else {
			$this->lang->load('btn', 'portuguese-brazilian');
		}
		$role = $this->Workspace_model->getRole($_SESSION['workspace_id'], $_SESSION['user_id']);

		if ($role == 1) {
			$this->load->view('frame/header_view');
			$this->load->view('frame/topbar');
			$this->load->view('frame/sidebar_nav_view');
			$this->load->view('workspace/weekly_evaluation/new');
		} else {
			$this->session->set_flashdata('error', 'An error occurred while loading \'new evaluation\' page. Verify if you\'re in a workspace.');
			redirect('/weekly-evaluation/list');
		}
	}

	function insert()
	{
		if (strcmp($_SESSION['language'], "US") == 0) {
			$feedback_success = 'Item Created';
		} else {
			$feedback_success = 'Item Criado ';
		}
		$deadline_date = $this->input->post('deadline');
		$deadline_time = $this->input->post('deadline-time');
		$deadline = new DateTime($deadline_date . ' ' . $deadline_time);

		$weekly_evaluation['name'] = $this->input->post('name');
		$weekly_evaluation['start_date'] = $this->input->post('start_date');
		$weekly_evaluation['end_date'] = $this->input->post('end_date');
		$weekly_evaluation['deadline'] = $deadline->format('Y-m-d H:i:s');
		$weekly_evaluation['status'] = $this->input->post('status');
		$weekly_evaluation['individual_or_group'] = $this->input->post('type');
		$weekly_evaluation['user_id'] = $_SESSION['user_id'];
		$weekly_evaluation['workspace_id'] = $_SESSION['workspace_id'];
		$weekly_evaluation['group_score_id'] = $this->input->post('score_metric');

		$insert  = $this->WeeklyEvaluation_model->insert($weekly_evaluation);

		if ($insert) {
			$this->session->set_flashdata('success', $feedback_success);
			insertLogActivity('insert', 'weekly evaluation');
		}
		redirect("weekly-evaluation/list/{$_SESSION['workspace_id']}");
	}

	public function edit($weekly_evaluation)
	{
		if (strcmp($_SESSION['language'], "US") == 0) {
			$this->lang->load('btn', 'english');
		} else {
			$this->lang->load('btn', 'portuguese-brazilian');
		}
		$dado['weekly_evaluation'] = $this->WeeklyEvaluation_model->get($weekly_evaluation);

		$deadline = new DateTime($dado['weekly_evaluation'][0]->deadline);
		$deadline_date = $deadline->format('Y-m-d');
		$deadline_time = $deadline->format('H:i');

		$dado['deadline_date'] = $deadline_date;
		$dado['deadline_time'] = $deadline_time;

		$this->load->view('frame/header_view');
		$this->load->view('frame/topbar');
		$this->load->view('frame/sidebar_nav_view');
		$this->load->view("workspace/weekly_evaluation/edit", $dado);
	}

	public function update($weekly_evaluation_id)
	{
		if (strcmp($_SESSION['language'], "US") == 0) {
			$feedback_success = 'Item Updated';
		} else {
			$feedback_success = 'Item Atualizado ';
		}
		$deadline_date = $this->input->post('deadline');
		$deadline_time = $this->input->post('deadline-time');
		$deadline = new DateTime($deadline_date . ' ' . $deadline_time);

		$weekly_evaluation['name'] = $this->input->post('name');
		$weekly_evaluation['start_date'] = $this->input->post('start_date');
		$weekly_evaluation['end_date'] = $this->input->post('end_date');
		$weekly_evaluation['deadline'] = $deadline->format('Y-m-d H:i:s');
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
		redirect("weekly-evaluation/list/{$_SESSION['workspace_id']}");
	}

	function add_score($weekly_report_id)
	{
		$language = strcmp($_SESSION['language'], "US") == 0 ? "english" : "portuguese-brazilian";
		$this->lang->load('btn', $language);
		$dado['score'] = $this->WeeklyReport_model->getScoreGivenByProfessor($weekly_report_id, $_SESSION['user_id']);
		$dado['weekly_report'] = $this->WeeklyReport_model->get($weekly_report_id);
		$dado['scores'] = $this->Score_model->getAllByGroup($dado['weekly_report'][0]->group_score_id, $_SESSION['user_id']);
		$dado['weekly_processes'] = $this->WeeklyReport_model->getAllProcesses($weekly_report_id, getIndexOfLanguage());
        $dado['weekly_images'] = $this->Report_upload_model->getImages($weekly_report_id);

		if (count($dado['score']) > 0) {
			redirect("weekly-evaluation/edit-score/" . $weekly_report_id);
		} else {
			unset($dado['score']);
			$this->load->view('frame/header_view');
			$this->load->view('frame/topbar');
			$this->load->view('frame/sidebar_nav_view');
			$this->load->view('workspace/weekly_evaluation/add_score', $dado);
		}
	}
	function insert_score($weekly_report_id)
	{       
		$evaluationExists = $this->WeeklyEvaluation_model->alreadyEvaluated($weekly_report_id);

		if(!empty($evaluationExists)) {
            $this->session->set_flashdata('error', 'This report has already been evaluated');
            return;
		} 

        $score['report_id'] = $weekly_report_id;
        $score['professor_id'] = $_SESSION['user_id'];
        $score['score_id'] = $this->input->post('score');
        $score['comments'] = $this->input->post('comments');
        
        $insert = $this->Score_model->insert($score);
		
		if ($insert) {
			$this->session->set_flashdata('success', $this->lang->line('item_evaluated'));
			insertLogActivity('insert', 'weekly report score');
		}
		$this->load->view('frame/header_view');
		$this->load->view('frame/topbar');
		$this->load->view('frame/sidebar_nav_view');

		redirect("weekly-evaluation/list/{$_SESSION['workspace_id']}");
	}

	function edit_score($id)
	{
		$language = strcmp($_SESSION['language'], "US") == 0 ? "english" : "portuguese-brazilian";
		$this->lang->load('btn', $language);

        $dado['weekly_report'] = $this->WeeklyReport_model->get($id);
        $dado['score'] = $this->WeeklyReport_model->getScoreGivenByProfessor($id, $_SESSION['user_id']);
        $dado['scores'] = $this->Score_model->getAllByGroup($dado['weekly_report'][0]->group_score_id, $_SESSION['user_id']);
        $dado['weekly_processes'] = $this->WeeklyReport_model->getAllProcesses($id, getIndexOfLanguage());
        $dado['weekly_images'] = $this->Report_upload_model->getImages($id);

		$this->load->view('frame/header_view');
		$this->load->view('frame/topbar');
		$this->load->view('frame/sidebar_nav_view');
		$this->load->view('workspace/weekly_evaluation/edit_score', $dado);
	}

	function update_score($weekly_report_id)
	{
		if (strcmp($_SESSION['language'], "US") == 0) {
			$feedback_success = 'Item re-evaluated successfully!';
		} else {
			$feedback_success = 'Item reavaliado com sucesso!';
		}

		$score['comments'] = $this->input->post('comments');
		$score['report_id'] = $weekly_report_id;
		$score['professor_id'] = $_SESSION['user_id'];
		$score['score_id'] = $this->input->post('score');

		$insert = $this->Score_model->update($score);

		if ($insert) {
			$this->session->set_flashdata('success', $this->lang->line('item_created'));
			insertLogActivity('update', 'weekly report score');
		}
		$this->load->view('frame/header_view');
		$this->load->view('frame/topbar');
		$this->load->view('frame/sidebar_nav_view');

        $this->session->set_flashdata('success', $feedback_success);
		redirect("weekly-evaluation/list/{$_SESSION['workspace_id']}");
	}
}
