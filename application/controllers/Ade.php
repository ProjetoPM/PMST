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

		// $query['team_performance_evaluation'] = $this->ade_model->delete($project_id);

		$this->load->view('frame/header_view');
		$this->load->view('frame/sidebar_nav_view'); 
		$this->load->view('project/ade_view', $query);
	}

	public function insertAde($project_id) {
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
		$data['team_performance_evaluation'] = $team_performance_evaluation;
		$query = $this->ade_model->insertAde($data['team_performance_evaluation']);

		if($query){
			redirect('projects',$team_performance_evaluation['project_id']);
		}
	}

	public function delete($team_performance_evaluation_id){

		$query = $this->ade_model->deleteT($team_performance_evaluation_id);
		if($query){
			redirect('projects/' . $project_id);
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
		// $team_performance_evaluation['project_id'] = $project_id;
		// $data['team_performance_evaluation'] = $team_performance_evaluation;
		
		//var_dump($issues_record);
		$query = $this->ade_model->updateAde($data['team_performance_evaluation'], $team_performance_evaluation_id);

		if ($query) {
			redirect('projects/' . $project_id);
		}
	}

}
?>