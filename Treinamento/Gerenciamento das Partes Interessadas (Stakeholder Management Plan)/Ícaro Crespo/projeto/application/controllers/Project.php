<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Project extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('project_model');
		//$this->load->model('project_model_store');
	}

	public function index(){
		$data['project'] = $this->project_model->getAllProjects();
		$this->load->view('listProject.php', $data);
	}

	public function add(){
		$this->load->view('addProject.php');
	}

	public function view(){
		$data['project'] = $this->project_model->getAllProject();
		$this->load->view('listProject.php', $data);
	}

	public function insert(){
		$project['title'] = $this->input->post('title');
		$project['description'] = $this->input->post('description');
		$project['status'] = $this->input->post('status');
		if($this->input->post('status') == 1){
			$project['status'] = 1;

		}else{
			$project['status'] = 0;
		}
		
		$query = $this->project_model->insertproject($project);

		if($query){
			header('location:'.base_url().$this->index());
		}

	}

	public function edit($id){
		$data['project'] = $this->project_model->getProject($id);
		$this->load->view('updProject', $data);
	}

	public function update($id){
		$project['title'] = $this->input->post('title');
		$project['description'] = $this->input->post('description');
		$project['status'] = $this->input->post('status');
		if($this->input->post('status') == 1){
			$project['status'] = 1;

		}else{
			$project['status'] = 0;
		}
		
		$query = $this->project_model->updateproject($project, $id);

		if($query){
			header('location:'.base_url().$this->index());
		}
	}

	public function delete($id){
		$query = $this->project_model->deleteproject($id);

		if($query){
			header('location:'.base_url().$this->index());
		}
	}
}
?>