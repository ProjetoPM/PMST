<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ResourceRequirements extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		if (!$this->session->userdata('logged_in')) {
			redirect(base_url());
		}
		
		if (strcmp($_SESSION['language'], "US") == 0) {
            $this->lang->load('resource_requirements', 'english');
            $this->lang->load('project-page', 'english');
        } else {
            $this->lang->load('resource_requirements', 'portuguese-brazilian');
            $this->lang->load('project-page', 'portuguese-brazilian');
        }

		$this->load->helper('url');
		$this->load->model('Activity_model');
		$this->load->model('view_model');
		$this->load->model('log_model');
		$this->load->helper('log_activity');


		// $this->lang->load('btn','portuguese-brazilian');
		

		// $this->lang->load('manage-cost','portuguese-brazilian');

	}


	//RESOURCE REQUIREMENT
	public function list($project_id)
	{
		if (strcmp($_SESSION['language'], "US") == 0) {
			$this->lang->load('btn', 'english');
		} else {
			$this->lang->load('btn', 'portuguese-brazilian');
		}
		
		$dado['project_id'] = $project_id;
		$dado['activity'] = $this->Activity_model->getAll($project_id);
		$this->load->view('frame/header_view');
		$this->load->view('frame/topbar');
		$this->load->view('frame/sidebar_nav_view');
		$this->load->view('project/schedule/resource_requirement/list', $dado);
	}
	
	public function edit($project_id)
	{
		
		$query['activity'] = $this->Activity_model->get($project_id);
		
		$this->load->view('frame/header_view.php');
		$this->load->view('frame/topbar');
		$this->load->view('frame/sidebar_nav_view.php');
		$this->load->view('project/schedule/resource_requirement/edit', $query);
	}

	public function newR()
	{
		$query['activity'] = $this->Activity_model->get($_SESSION['project_id']);

		$this->load->view('frame/header_view.php');
		$this->load->view('frame/topbar');
		$this->load->view('frame/sidebar_nav_view.php');
		$this->load->view('project/schedule/resource_requirement/newR', $query);
	}

	public function new()
	{
		$query['activities'] = $this->Activity_model->getAll($_SESSION['project_id']);
		$query['activity'] = $this->Activity_model->get($_SESSION['project_id']);

		$this->load->view('frame/header_view.php');
		$this->load->view('frame/topbar');
		$this->load->view('frame/sidebar_nav_view.php');
		$this->load->view('project/schedule/resource_requirement/new', $query);
	}
	public function update($project_id)
	{
		if(strcmp($_SESSION['language'],"US") == 0){
			$feedback_success = 'Item Updated';
        }else{
			$feedback_success = 'Item Atualizado ';
		}

		$activity['resource_description'] = $this->input->post('resource_description');
		$activity['required_amount_of_resource'] = $this->input->post('required_amount_of_resource');
		$activity['resource_cost_per_unit'] = $this->input->post('resource_cost_per_unit');
		$activity['resource_type'] = $this->input->post('resource_type');

		$activity['project_id'] = $this->input->post('project_id');

		$data['activity'] = $activity;
		$query = $this->Activity_model->update($data['activity'], $project_id);

		if ($query) {
			insertLogActivity('update', 'resource requirements');
			$this->session->set_flashdata('success', $feedback_success);
			redirect('schedule/resource-requirements/list/' . $activity['project_id']);
		}
	}
}
