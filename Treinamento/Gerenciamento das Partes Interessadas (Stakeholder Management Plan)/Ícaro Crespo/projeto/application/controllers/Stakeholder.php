<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Stakeholder extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('stakeholder_model');
	}

	public function index(){
		$data['stakeholder'] = $this->stakeholder_model->getAllStakeholders();
		$this->load->view('listStakeholder.php', $data);
	}

	public function view(){
		$data['stakeholder'] = $this->stakeholder_model->getAllStakeholder();
		$this->load->view('listStakeholder.php', $data);
	}

	public function insert(){
		$stakeholder['name'] = $this->input->post('name');
		$stakeholder['roles_responsabilies'] = $this->input->post('roles_responsabilies');
		$stakeholder['status'] = $this->input->post('status');
		if($this->input->post('status') == 1){
			$stakeholder['status'] = 1;
		}else{
			$stakeholder['status'] = 0;
		}

		$query = $this->stakeholder_model->insertStakeholder($stakeholder);

		if($query){
			header('location:'.base_url().$this->index().'index.php/stakeholder/');
		}
		
	}

	public function add(){
		$this->load->view('addStakeholder.php');
	}

	public function edit($id){
		$data['stakeholder'] = $this->stakeholder_model->getStakeholder($id);
		$this->load->view('updStakeholder', $data);
	}

	public function update($id){
		$stakeholder['name'] = $this->input->post('name');
		$stakeholder['roles_responsabilies'] = $this->input->post('roles_responsabilies');
		$stakeholder['status'] = $this->input->post('status');
		if($this->input->post('status') == 1){
			$stakeholder['status'] = 1;
		}else{
			$stakeholder['status'] = 0;
		}
		$query = $this->stakeholder_model->updateStakeholder($stakeholder);

		if($query){
			header('location:'.base_url().$this->index().'index.php/stakeholder/');
		}
	}

	public function delete($id){
		$query = $this->stakeholder_model->deleteStakeholder($id);

		if($query){
			header('location:'.base_url().$this->index().'index.php/stakeholder/');
		}
	}
}
?>