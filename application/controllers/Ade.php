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
		// $query['project_id'] = $project_id;
		$this->load->view('frame/header_view');
		$this->load->view('frame/sidebar_nav_view'); 
		$this->load->view('project/ade_view', $query);
		// var_dump($query);
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

	/*
	private function ajax_checking(){
		if (!$this->input->is_ajax_request()) {
			redirect(base_url());
		}
	}

	public function communication_form($project_id){
		$query['communication_item'] = $this->communication_item_model->getCommunication_itemProject_id($project_id);
		$query['project_id'] = $project_id;
		$this->load->view('frame/header_view');
		$this->load->view('frame/sidebar_nav_view'); 
		$this->load->view('project/communication_item', $query);
	}
	
	public function insert() {
		$communication_item['type'] = $this->input->post('type');
		$communication_item['description'] = $this->input->post('description');
		$communication_item['content'] = $this->input->post('content');
		$communication_item['distribution_reason'] = $this->input->post('distribution_reason');
		$communication_item['language'] = $this->input->post('language');
		$communication_item['channel'] = $this->input->post('channel');
		$communication_item['documento_format'] = $this->input->post('documento_format');
		$communication_item['metod'] = $this->input->post('metod');
		$communication_item['frequency'] = $this->input->post('frequency');
		$communication_item['allocated_resources'] = $this->input->post('allocated_resources');
		$communication_item['format'] = $this->input->post('format');
		$communication_item['local'] = $this->input->post('local');
		$communication_item['project_id'] = $this->input->post('project_id');
		$communication_item['status'] = (int) $this->input->post('status');

		$data['communication_item'] = $communication_item;
		$query = $this->communication_item_model->insertCommunication_item($data['communication_item']);

		if($query){
			redirect('projects');
		}
	}

	public function update($id){
		$communication_item['type'] = $this->input->post('type');
		$communication_item['description'] = $this->input->post('description');
		$communication_item['content'] = $this->input->post('content');
		$communication_item['distribution_reason'] = $this->input->post('distribution_reason');
		$communication_item['language'] = $this->input->post('language');
		$communication_item['channel'] = $this->input->post('channel');
		$communication_item['documento_format'] = $this->input->post('documento_format');
		$communication_item['metod'] = $this->input->post('metod');
		$communication_item['frequency'] = $this->input->post('frequency');
		$communication_item['allocated_resources'] = $this->input->post('allocated_resources');
		$communication_item['format'] = $this->input->post('format');
		$communication_item['local'] = $this->input->post('local');
		$communication_item['status'] = (int) $this->input->post('status');
		
		$data['communication_item'] = $communication_item;
		$query = $this->communication_item_model->updateCommunication_item($data['communication_item'], $id);

		if($query){
			redirect('project/' . $id);
		}
	}

	public function delete($id){
		$query = $this->communication_item_model->deleteCommunication_item($id);
		var_dump($query);
		if($query){
			redirect('project/' . $id);
		}
	}*/
}
?>