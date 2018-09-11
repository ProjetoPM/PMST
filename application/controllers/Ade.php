<?php
if (!defined('BASEPATH')) {
	exit('No direct script access allowed');
}

class Ade extends CI_Controller{
	
	public function __Construct(){
		parent::__Construct();
		if (!$this->session->userdata('logged_in')) {
			redirect(base_url());
		}
		$this->load->model('project_model');
		$this->load->model('ade_model');
	}

	public function getAde_form($project_id){
		$query['team_performance_evaluation'] = $this->ade_model->getAde($project_id);
		$query['project_id'] = $project_id;
		$this->load->view('frame/header_view');
		$this->load->view('frame/sidebar_nav_view'); 
		$this->load->view('project/ade_view', $query);
	}

	public function insertAde() {
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
		$data['team_performance_evaluation'] = $team_performance_evaluation;
		$query = $this->ade_model->insertAde($data['team_performance_evaluation']);

		if($query){
			redirect('projects');
		}
	}
}
?>