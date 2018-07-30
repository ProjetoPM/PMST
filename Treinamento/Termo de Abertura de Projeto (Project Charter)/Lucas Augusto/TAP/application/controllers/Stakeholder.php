<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Stakeholder extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('stake_model');
	}

public function index(){
		$data['stakelholder'] = $this->stake_model->getAll();
		$this->load->view('stakeholder_list.php', $data);

	}
public function addstake(){
		$this->load->view('add_stake.php');
	}
	public function insert(){
		$stake['name'] = $this->input->post('nome');
		$stake['roles_responsabilies'] = $this->input->post('função');
		$stake['status'] = $this->input->post('status');
		
		$query = $this->stake_model->insertstake($stake);

		if($query){
			header('location:'.base_url().$this->index());
		}

	}

	public function edit($id){
		$data['stake'] = $this->stake_model->geStake($id);
		$this->load->view('editform', $data);
	}

	public function update($id){
	     $stake['name'] = $this->input->post('nome');
		$stake['roles_responsabilies'] = $this->input->post('função');
		$stake['status'] = $this->input->post('status');

		$query = $this->stake_model->updatestake($stake, $id);

		if($query){
			header('location:'.base_url().$this->index());
		}
	}

	public function delete($id){
		$query = $this->stake_model->deletestake($id);

		if($query){
			header('location:'.base_url().$this->index());
		}
	}
}


?>