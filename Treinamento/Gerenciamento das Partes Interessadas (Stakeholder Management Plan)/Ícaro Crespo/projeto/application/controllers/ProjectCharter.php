<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ProjectCharter extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('projectCharter_model');
		$this->load->model('project_model');
	}

	public function index(){
		$data['projectCharter'] = $this->projectCharter_model->getAllProjectCharters();
		$this->load->view('listProjectCharter.php', $data);
	}

		public function view(){
		$data['projectCharter'] = $this->projectCharter_model->getAllProjectCharter();
		$this->load->view('listProjectCharter.php', $data);
	}

	public function add(){
		$projects['projects'] = $this->project_model->getAllProjects();
		$this->load->view('addProjectCharter.php', $projects);
		//var_dump($projects);
		//die();
	}

	public function insert(){
		$projectCharter['scope'] = $this->input->post('scope');
		$projectCharter['objective'] = $this->input->post('objective');
		$projectCharter['success'] = $this->input->post('success');
		$projectCharter['requirements'] = $this->input->post('requirements');
		$projectCharter['assumptions'] = $this->input->post('assumptions');
		$projectCharter['constraints'] = $this->input->post('constraints');
		$projectCharter['risks'] = $this->input->post('risks');
		$projectCharter['budge'] = $this->input->post('budge');
		$projectCharter['milestone'] = $this->input->post('milestone');
		$projectCharter['stakeholder'] = $this->input->post('stakeholder');
		$projectCharter['aprovalReq'] = $this->input->post('aprovalReq');
		$projectCharter['project_id'] = $this->input->post('project_id');
		$projectCharter['start_date'] = $this->input->post('start_date');
		$projectCharter['end_date'] = $this->input->post('end_date');
		$projectCharter['status'] = $this->input->post('status');
		if($this->input->post('status') == 1){
			$projectCharter['status'] = 1;
		}else{
			$projectCharter['status'] = 0;
		}
		$query = $this->projectCharter_model->insertprojectCharter($projectCharter);

		if($query){
			header('location:'.base_url().'index.php/projectCharter/index');
		}

	}

	public function edit($id){
		$projects['projects'] = $this->project_model->getAllProjects();
		$data['projectCharter'] = $this->projectCharter_model->getprojectCharter($id);
		$todos = $data + $projects;
		$this->load->view('updProjectCharter.php', $todos);
	}

	public function update($id){
		$projectCharter['scope'] = $this->input->post('scope');
		$projectCharter['objective'] = $this->input->post('objective');
		$projectCharter['success'] = $this->input->post('success');
		$projectCharter['requirements'] = $this->input->post('requirements');
		$projectCharter['assumptions'] = $this->input->post('assumptions');
		$projectCharter['constraints'] = $this->input->post('constraints');
		$projectCharter['risks'] = $this->input->post('risks');
		$projectCharter['milestone'] = $this->input->post('milestone');
		$projectCharter['budge'] = $this->input->post('budge');
		$projectCharter['stakeholder'] = $this->input->post('stakeholder');
		$projectCharter['aprovalReq'] = $this->input->post('aprovalReq');
		$projectCharter['start_date'] = $this->input->post('start_date');
		$projectCharter['end_date'] = $this->input->post('end_date');
		$projectCharter['project_id'] = $this->input->post('project_id');
		$projectCharter['status'] = $this->input->post('status');
		if($this->input->post('status') == 1){
			$projectCharter['status'] = 1;
		}else{
			$projectCharter['status'] = 0;
		}
		$query = $this->projectCharter_model->updateprojectCharter($projectCharter, $id);

		if($query){
			header('location:'.base_url().'index.php/projectCharter/index');
		}
	}

	public function delete($id){
		$query = $this->projectCharter_model->deleteprojectCharter($id);

		if($query){
			header('location:'.base_url().'index.php/projectCharter/index');
		}
	}
}
?>