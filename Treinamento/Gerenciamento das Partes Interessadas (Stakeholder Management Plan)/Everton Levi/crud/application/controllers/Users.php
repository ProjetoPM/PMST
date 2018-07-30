<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('Users_model');
	}

	public function index(){
		$data['users'] = $this->Users_model->getAllUsers();
		$this->load->view('user_list.php', $data);
	}

	public function addnew(){
		$this->load->view('addform.php');
	}

	public function addNewStore(){
		$this->load->view('addformstore.php');
	}

	public function insertStore(){
		$store['nameStore'] = $this->input->post('nameStore');
		$store['addressStore'] = $this->input->post('addressStore');
<<<<<<< HEAD
		$query = $this->Users_model->insertStore($store);
=======

		$query = $this->Users_model->insertStore($store);

>>>>>>> master
		if ($query) {
			header('location'.base_url().$this->index());
		}
	}

	public function insert(){
		$user['username'] = $this->input->post('username');
		$user['password'] = $this->input->post('password');
		$user['fname'] = $this->input->post('fname');
		
		$query = $this->Users_model->insertuser($user);

		if($query){
			header('location:'.base_url().$this->index());
		}

	}

	public function edit($id){
		$data['user'] = $this->Users_model->getUser($id);
		$this->load->view('editform', $data);
	}

	public function update($id){
		$user['username'] = $this->input->post('username');
		$user['password'] = $this->input->post('password');
		$user['fname'] = $this->input->post('fname');
<<<<<<< HEAD
		$query = $this->Users_model->updateuser($user, $id);
=======

		$query = $this->Users_model->updateuser($user, $id);

>>>>>>> master
		if($query){
			header('location:'.base_url().$this->index());
		}
	}

	public function delete($id){
		$query = $this->Users_model->deleteuser($id);
<<<<<<< HEAD
=======

>>>>>>> master
		if($query){
			header('location:'.base_url().$this->index());
		}
	}
}


?>