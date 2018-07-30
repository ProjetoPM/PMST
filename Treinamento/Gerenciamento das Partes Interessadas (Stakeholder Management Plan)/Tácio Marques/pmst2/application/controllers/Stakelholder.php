<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Stakelholder extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('Stakelholder_model');
		$this->load->model('Stakelholdermp_model');
	}


	public function index(){
		$data['stakelholder'] = $this->Stakelholder_model->getAllStakeholder();
		$this->load->view('addpartesI.php', $data);
	}

	public function addnew(){
		$this->load->view('addstakeholder.php');
	}

	public function insert(){
		$stakelholder['name'] = $this->input->post('name');
		$stakelholder['roles_responsabilies'] = $this->input->post('roles_responsabilies');
		$stakelholder['status'] = $this->input->post('status');
		
		$query = $this->Stakelholder_model->insertstakelholder($stakelholder);

		if($query){
			$data['stakeholder_mp'] = $this->Stakelholdermp_model->getAllStakelholdermp();
			$data['stakelholder'] = $this->Stakelholder_model->getAllStakelholder();
			$this->load->view('addpartesI.php',$data);
		}

	}

	public function edit($stakelholder_id){
		$data['stakelholder'] = $this->Stakelholder_model->getStakelholder($stakelholder_id);
		$this->load->view('editstakelholder', $data);
	}

	public function update($stakelholder_id){
		$stakelholder['name'] = $this->input->post('name');
		$stakelholder['roles_responsabilies'] = $this->input->post('roles_responsabilies');
		$stakelholder['status'] = $this->input->post('status');

		$query = $this->Stakelholder_model->updatestakelholder($stakelholder, $stakelholder_id);

		if($query){
			header('location:'.base_url().$this->index());
		}
	}

	public function delete($stakelholder_id){
		$query = $this->Stakelholder_model->deletestakelholder($stakelholder_id);

		if($query){
			header('location:'.base_url().$this->index());
		}
	}
}


?>