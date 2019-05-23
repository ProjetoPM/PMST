<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Team_Performance_Evaluation extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('Team_Performance_Evaluation_model');


		$this->lang->load('btn','english');
        // $this->lang->load('btn','portuguese-brazilian');
        $this->lang->load('team-performance-evaluation','english');
        // $this->lang->load('team-performance-evaluation','portuguese-brazilian');

	}

	public function list($project_id){
		$dado['project_id'] = $project_id;

		$dado['team_performance_evaluation'] = $this->Team_Performance_Evaluation_model->getAllTeamEvalProject($project_id);
		$this->load->view('frame/header_view');
		$this->load->view('frame/sidebar_nav_view');
		$this->load->view('human_resource/team_performance_evaluation/list',$dado);
	}

	public function new($project_id){
		$dado['id'] = $project_id;
		$this->load->view('frame/header_view');
		$this->load->view('frame/sidebar_nav_view');
		$this->load->view('human_resource/team_performance_evaluation/new',$dado);
	}

	public function edit($team_performance_evaluation_id) {
		
		$query['team_performance_evaluation'] = $this->Team_Performance_Evaluation_model->getTeamEval($team_performance_evaluation_id);
		$this->load->view('frame/header_view.php');
		$this->load->view('frame/sidebar_nav_view.php');
		$this->load->view('human_resource/team_performance_evaluation/edit', $query);
	}

	public function insert($project_id){
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
		
		if($query){
			$this->load->view('frame/header_view');
			$this->load->view('frame/sidebar_nav_view');
			redirect('Team_Performance_Evaluation/list/' . $team_performance_evaluation['project_id']);
		}
	}

	public function update($team_performance_evaluation_id) {
		
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

		$query = $this->Team_Performance_Evaluation_model->updateTeamEval($team_performance_evaluation,$team_performance_evaluation_id);

		if ($query) {
			redirect('Team_Performance_Evaluation/list/' . $team_performance_evaluation['project_id']);
		}
	}

	public function delete($team_performance_evaluation_id){
		
		$project_id['project_id'] = $this->input->post('project_id');
		//$project_id['project_id'] = $project_id;
		$query = $this->Team_Performance_Evaluation_model->deleteTeamEval($team_performance_evaluation_id);
		if($query){
			$this->load->view('frame/header_view');
            $this->load->view('frame/sidebar_nav_view');
            redirect(base_url() . 'Team_Performance_Evaluation/list/' . $team_performance_evaluation['project_id']);
		}
	}
	
}
?>