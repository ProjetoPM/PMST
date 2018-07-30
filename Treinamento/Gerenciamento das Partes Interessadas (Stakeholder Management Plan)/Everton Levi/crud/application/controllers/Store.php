<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Store extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('store_model');
	}

	public function index(){
		$this->load->view('addNewStakeholder.php');
	}

	public function viewStoreList(){
		$data['store'] = $this->store_model->getAllStores();
		//var_dump($data);
		$this->load->view('store_list.php', $data);
	}

	public function delete($idStore){
		$query = $this->store_model->deleteStore($idStore);
		if($query){
			header('location:'.base_url().$this->index());
		}
	}

	public function editStore($idStore){
		$data['sto'] = $this->store_model->getStore($idStore);
		$this->load->view('editStore', $data);
	}

	public function updateSto($idStore){
		$sto['nameStore'] = $this->input->post('nameStore');
		$sto['addressStore'] = $this->input->post('addressStore');
		$query = $this->store_model->updateStore($sto, $idStore);
		if($query){
			header('location:'.base_url().$this->index());
		}
	}


}
?>