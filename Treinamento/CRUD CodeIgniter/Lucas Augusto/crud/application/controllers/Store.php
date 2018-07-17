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

}


?>