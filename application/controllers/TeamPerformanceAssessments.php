<?php
defined('BASEPATH') or exit('No direct script access allowed');

class TeamPerformanceAssessments extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		if (!$this->session->userdata('logged_in')) {
			redirect(base_url());
		}
		if ($_SESSION['access_level'] == "0" ) {
			$this->session->set_flashdata('error3', 'You do not have permission to access this document!');
			redirect('project/'. $_SESSION['project_id']);
		 }

		 if (strcmp($_SESSION['language'], "US") == 0) {
            $this->lang->load('team-performance-evaluation', 'english');
            $this->lang->load('project-page', 'english');
        } else {
            $this->lang->load('team-performance-evaluation', 'portuguese-brazilian');
            $this->lang->load('project-page', 'portuguese-brazilian');
        }

		$this->load->helper('url');
		$this->load->model('Team_Performance_Evaluation_model');
		$this->load->model('view_model');
		$this->load->model('log_model');

		$this->load->helper('log_activity');


		// $this->lang->load('btn','portuguese-brazilian');
		
		// $this->lang->load('team-performance-evaluation','portuguese-brazilian');

	}

	public function list($project_id)
	{
		if (strcmp($_SESSION['language'], "US") == 0) {
			$this->lang->load('btn', 'english');
		} else {
			$this->lang->load('btn', 'portuguese-brazilian');
		}

		$dado['project_id'] = $project_id;

		$dado['team_performance_evaluation'] = $this->Team_Performance_Evaluation_model->getAll($project_id);
		$this->load->view('frame/header_view');
		$this->load->view('frame/topbar');
		$this->load->view('frame/sidebar_nav_view');
		$this->load->view('project/human_resource/team_performance_evaluation/list', $dado);
	}

	public function new($project_id)
	{

		if (strcmp($_SESSION['language'], "US") == 0) {
			$this->lang->load('btn', 'english');
		} else {
			$this->lang->load('btn', 'portuguese-brazilian');
		}

		$idusuario = $_SESSION['user_id'];
		$this->db->where('user_id', $idusuario);
		$this->db->where('project_id', $project_id);
		$project['dados'] = $this->db->get('project_user')->result();

		if (count($project['dados']) > 0) {
			$dado['id'] = $project_id;
			$this->load->view('frame/header_view');
			$this->load->view('frame/topbar');
			$this->load->view('frame/sidebar_nav_view');
			$this->load->view('project/human_resource/team_performance_evaluation/new', $dado);
		} else {
			redirect(base_url());
		}
	}

	public function edit($team_performance_evaluation_id)
	{

		if (strcmp($_SESSION['language'], "US") == 0) {
			$this->lang->load('btn', 'english');
		} else {
			$this->lang->load('btn', 'portuguese-brazilian');
		}
		
		$query['team_performance_evaluation'] = $this->Team_Performance_Evaluation_model->get($team_performance_evaluation_id);
		$this->load->view('frame/header_view');
		$this->load->view('frame/topbar');
		$this->load->view('frame/sidebar_nav_view');
		$this->load->view('project/human_resource/team_performance_evaluation/edit', $query);
	}

	public function insert($project_id)
	{

		$team_performance_evaluation['team_member_name'] = $this->input->post('team_member_name');
		$team_performance_evaluation['role'] = $this->input->post('role');
		$team_performance_evaluation['project_function'] = $this->input->post('project_function');
		$team_performance_evaluation['report_date'] = $this->input->post('report_date');
		$team_performance_evaluation['team_member_comments'] = $this->input->post('team_member_comments');
		$team_performance_evaluation['strong_points'] = $this->input->post('strong_points');
		$team_performance_evaluation['improvement'] = $this->input->post('improvement');
		$team_performance_evaluation['development_plan'] = $this->input->post('development_plan');
		$team_performance_evaluation['already_developed'] = $this->input->post('already_developed');
		$team_performance_evaluation['external_comments'] = $this->input->post('external_comments');
		$team_performance_evaluation['team_mates_comments'] = $this->input->post('team_mates_comments');
		$team_performance_evaluation['team_performance_evaluationcol'] = $this->input->post('team_performance_evaluationcol');


		$team_performance_evaluation['project_id'] = $project_id;
		$query = $this->Team_Performance_Evaluation_model->insert($team_performance_evaluation);

		if ($query) {
			insertLogActivity('insert', 'team performance assessments');
			redirect('resources/team-performance-assessments/list/' . $team_performance_evaluation['project_id']);
		}
	}

	public function update($team_performance_evaluation_id)
	{

		$team_performance_evaluation['team_member_name'] = $this->input->post('team_member_name');
		$team_performance_evaluation['role'] = $this->input->post('role');
		$team_performance_evaluation['project_function'] = $this->input->post('project_function');
		$team_performance_evaluation['report_date'] = $this->input->post('report_date');
		$team_performance_evaluation['team_member_comments'] = $this->input->post('team_member_comments');
		$team_performance_evaluation['strong_points'] = $this->input->post('strong_points');
		$team_performance_evaluation['improvement'] = $this->input->post('improvement');
		$team_performance_evaluation['development_plan'] = $this->input->post('development_plan');
		$team_performance_evaluation['already_developed'] = $this->input->post('already_developed');
		$team_performance_evaluation['external_comments'] = $this->input->post('external_comments');
		$team_performance_evaluation['team_mates_comments'] = $this->input->post('team_mates_comments');
		$team_performance_evaluation['team_performance_evaluationcol'] = $this->input->post('team_performance_evaluationcol');
		$team_performance_evaluation['project_id'] = $this->input->post('project_id');
		//var_dump($team_performance_evaluation['project_id']);
		//die();

		$query = $this->Team_Performance_Evaluation_model->update($team_performance_evaluation, $team_performance_evaluation_id);

		if ($query) {
			insertLogActivity('update', 'team performance assessments');
			redirect('resources/team-performance-assessments/list/' . $team_performance_evaluation['project_id']);
		}
	}

	public function delete($team_performance_evaluation_id)
	{

		$project_id['project_id'] = $this->input->post('project_id');
		//$project_id['project_id'] = $project_id;
		$query = $this->Team_Performance_Evaluation_model->delete($team_performance_evaluation_id);
		if ($query) {
			insertLogActivity('delete', 'team performance assessments');
			redirect('resources/team-performance-assessments/list/' . $_SESSION['project_id']);
		}
	}
}
