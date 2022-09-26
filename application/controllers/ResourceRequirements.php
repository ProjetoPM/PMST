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
		
		$this->load->model('log_model');
		$this->load->model('view_model');
		$this->load->model('Project_model');
		$this->load->model('Activity_model');
		$this->load->model('Resources_model');
		$this->load->model('Resource_requirements_model');

		$userInProject = $this->Project_model->userInProject($_SESSION['user_id'], $_SESSION['project_id']);
		
		if ($userInProject) {
			$this->session->set_flashdata('error3', 'You have no access to this project');
			redirect('projects/' . $_SESSION['project_id']);
		}

		$langs = array();
        array_push($langs, 'resource_requirements', 'resources');

        loadLangs($langs);
		

		$this->load->helper('url');
		$this->load->helper('log_activity');


	}

	private $document = 'resource requirements';
	//RESOURCE REQUIREMENT
	public function list($project_id)
	{
		if (strcmp($_SESSION['language'], "US") == 0) {
			$this->lang->load('btn', 'english');
		} else {
			$this->lang->load('btn', 'portuguese-brazilian');
		}
		
		$data['project_id'] = $project_id;
		$data['activity'] = $this->Activity_model->getAll($project_id);
		$data['resources'] = $this->Resources_model->getAll($project_id);
		$data['resource_requirements'] = $this->Resource_requirements_model->getAllPerProject($project_id);
		foreach ($data['resource_requirements'] as $resource) {
			$resource->total_cost = $resource->resource_amount * $resource->cost_per_unit;
		}

		$this->load->view('frame/header_view');
		$this->load->view('frame/topbar');
		$this->load->view('frame/sidebar_nav_view');
		$this->load->view('project/schedule/resource_requirement/list', $data);
	}
	
	
	public function edit($resource_requirement_id)
	{
		
		$data['resource_requirement'] = $this->Resource_requirements_model->get($resource_requirement_id);
		
		$this->load->view('frame/header_view.php');
		$this->load->view('frame/topbar');
		$this->load->view('frame/sidebar_nav_view.php');
		$this->load->view('project/schedule/resource_requirement/edit', $data);
	}

	public function new()
	{
		$data['activities'] = $this->Activity_model->getAll($_SESSION['project_id']);
		$data['resources'] = $this->Resources_model->getAll($_SESSION['project_id']);

		$this->load->view('frame/header_view.php');
		$this->load->view('frame/topbar');
		$this->load->view('frame/sidebar_nav_view.php');
		$this->load->view('project/schedule/resource_requirement/new', $data);

	}

	public function insert($project_id)
	{
		if(strcmp($_SESSION['language'],"US") == 0){
			$feedback_success = 'Item Updated';
        }else{
			$feedback_success = 'Item Atualizado ';
		}

		$resource_requirement['resource_amount'] = $this->input->post('required_amount_of_resource');
		$resource_requirement['activity_id'] = $this->input->post('activity_id');
		$resource_requirement['resource_id'] = $this->input->post('resource_id');

		$query = $this->Resource_requirements_model->insert($resource_requirement);

		if ($query) {
			insertLogActivity('insert', $this->document);
			$this->session->set_flashdata('success', $feedback_success);

			redirect('schedule/resource-requirements/list/' . $project_id);
		}
	}
	public function update($resource_requirement_id)
	{
		if(strcmp($_SESSION['language'],"US") == 0){
			$feedback_success = 'Item Updated';
        }else{
			$feedback_success = 'Item Atualizado ';
		}

		$resource['resource_amount'] = $this->input->post('required_amount_of_resource');

		$data['resource'] = $resource;
		$query = $this->Resource_requirements_model->update($data['resource'], $resource_requirement_id);

		if ($query) {
			insertLogActivity('update', $this->document);
			$this->session->set_flashdata('success', $feedback_success);

			redirect('schedule/resource-requirements/list/' . $_SESSION['project_id']);
		}
	}

	public function delete($resource_requirement_id){

        $query = $this->Resource_requirements_model->delete($resource_requirement_id);

        if ($query) {
			insertLogActivity('delete', $this->document);
			redirect('schedule/resource-requirements/list/' . $_SESSION['project_id']);
		}
    }
}
