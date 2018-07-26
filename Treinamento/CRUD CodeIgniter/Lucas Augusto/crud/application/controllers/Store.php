<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Store extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('store_model');
	}

	public function index(){
		//$data['store'] = $this->store_model->getAllStories();
		//$this->load->view('store_list.php', $data);
    }
    public function viewStoreList(){
    	$data['store'] = $this->store_model->getAllStories();
    	$this->load->view('store_list', $data);
    }
    	public function edit($idStore){
		$data['store'] = $this->store_model->getStore($idStore);
		$this->load->view('editstore', $data);
	}
public function update($idStore){
		$store['name'] = $this->input->post('name');
		$store['adress'] = $this->input->post('adress');

		$query = $this->store_model->updatestore($store, $idStore);

		if($query){
			header('location:'.base_url().$this->index());
		}
	}

	public function delete($idStore){
		$query = $this->store_model->deletestore($idStore);

		if($query){
			header('location:'.base_url().$this->index());
		}
	}

}


?>