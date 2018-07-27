<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Project extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('Project_model');
	}

	public function index(){
		$data['project'] = $this->Project_model->getAllProjects();
		$this->load->view('project_list.php', $data);
	}

	public function addnew(){
		$this->load->view('addproject.php');
	}

	public function insert(){
		$project['title'] = $this->input->post('title');
		$project['description'] = $this->input->post('description');
		$project['status'] = $this->input->post('status');
		
		$query = $this->Project_model->insertproject($project);

		if($query){
			header('location:'.base_url().$this->index());
		}

	}

	public function edit($project_id){
		$data['project'] = $this->Project_model->getProject($project_id);
		$this->load->view('editproject', $data);
	}

	public function update($project_id){
		$project['title'] = $this->input->post('title');
		$project['description'] = $this->input->post('description');
		$project['status'] = $this->input->post('status');

		$query = $this->Project_model->updateproject($project, $project_id);

		if($query){
			header('location:'.base_url().$this->index());
		}
	}

	public function delete($project_id){
		$query = $this->Project_model->deleteproject($project_id);

		if($query){
			header('location:'.base_url().$this->index());
		}
	}
}


?>