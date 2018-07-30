<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ProjectCharter_stakeholder extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('projectCharter_stakeholder_model');
		$this->load->model('projectCharter_model');
		$this->load->model('stakeholder_model');
	}

	public function index(){
		$data['projectCharter_stakeholder'] = $this->projectCharter_stakeholder_model->getAllProjectCharter_stakeholders();
		$this->load->view('listProjectCharter_stakeholder.php', $data);
	}

	public function add(){
		$projectCharters['projectCharters'] = $this->projectCharter_model->getAllProjectCharters();
		$stakeholders['stakeholders'] = $this->stakeholder_model->getAllStakeholders();
		$data = $projectCharters + $stakeholders;
		$this->load->view('addProjectCharter_stakeholder.php', $data);
	}

	public function insert(){
		$projectCharter_stakeholder['project_charter_id'] = $this->input->post('project_charter_id');
		$projectCharter_stakeholder['stakeholder_id'] = $this->input->post('stakeholder_id');
		$projectCharter_stakeholder['status'] = $this->input->post('status');
		if($this->input->post('status') == 1){
			$projectCharter_stakeholder['status'] = 1;
		}else{
			$projectCharter_stakeholder['status'] = 0;
		}
		
		$query = $this->projectCharter_stakeholder_model->insertprojectCharter_stakeholder($projectCharter_stakeholder);

		if($query){
			header('location:'.base_url().'index.php/projectCharter_stakeholder/index');
		}

	}

	public function edit(){
		$idPC['idPC'] = $this->input->post('idPC');
		$idS['idS'] = $this->input->post('idS');
		$projectCharters['projectCharters'] = $this->projectCharter_model->getAllProjectCharters();
		$stakeholders['stakeholders'] = $this->stakeholder_model->getAllStakeholders();
		$data['projectCharter_stakeholder'] = $this->projectCharter_stakeholder_model->getProjectCharter_stakeholder($idPC, $idS);
		$todos = $data + $projectCharters + $stakeholders;

		$this->load->view('updProjectCharter_stakeholder', $todos);
	}

	public function update(){
		$projectCharter_stakeholder['project_charter_id'] = $this->input->post('project_charter_id');
		$projectCharter_stakeholder['stakeholder_id'] = $this->input->post('stakeholder_id');
		$projectCharter_stakeholder['status'] = $this->input->post('status');
		if($this->input->post('status') == 1){
			$projectCharter_stakeholder['status'] = 1;
		}else{
			$projectCharter_stakeholder['status'] = 0;
		}
		$query = $this->projectCharter_stakeholder_model->updateprojectCharter_stakeholder($projectCharter_stakeholder, $this->input->post('idPC'), $this->input->post('idS'));

		if($query){
			header('location:'.base_url().'index.php/projectCharter_stakeholder/index');
		}
	}

	public function delete(){
		$query = $this->projectCharter_stakeholder_model->deleteprojectCharter_stakeholder($this->input->post('idPC'), $this->input->post('idS'));

		if($query){
			header('location:'.base_url().'index.php/projectCharter_stakeholder/index');
		}
	}
}


?>