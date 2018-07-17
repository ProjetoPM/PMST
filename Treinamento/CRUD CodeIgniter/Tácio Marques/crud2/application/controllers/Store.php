<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Store extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('users_model_store');
	}

	public function index(){
		$data['store'] = $this->users_model_store->getAllStore();
		$this->load->view('store_list.php', $data);
	}

	public function viewStore(){
		$data['store'] = $this->users_model_store->getAllStore();
		$this->load->view('store_list.php', $data);
	}

	public function insertStore(){
		$store['nameStore'] = $this->input->post('nameStore');
		$store['addressStore'] = $this->input->post('addressStore');
		
		$test = $this->users_model_store->insertStore($store);

		if($test){
			header('location:'.base_url().$this->index());
		}
		
	}

	public function addNewStore(){
		$this->load->view('addformstore.php');
	}

	public function editStore($id){
		$data['store'] = $this->users_model_store->getStore($id);
		$this->load->view('editformstore', $data);
	}

	public function updateStore($id){
		$store['nameStore'] = $this->input->post('nameStore');
		$store['addressStore'] = $this->input->post('addressStore');
		
		$test = $this->users_model_store->updateStore($store);

		if($test){
			header('location:'.base_url().$this->index());
		}
	}

	public function deleteStore($id){
		$query = $this->users_model_store->deleteStore($id);

		if($query){
			header('location:'.base_url().$this->index());
		}
	}
}


?>