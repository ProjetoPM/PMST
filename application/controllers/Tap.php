<?php
if (!defined('BASEPATH')) {
	exit('No direct script access allowed');
}

class Tap extends CI_Controller{
	
	function __construct(){
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('Tap_model');
	}

	public function addTap(){
		$this->load->view('frame/header_view.php');
		$this->load->view('frame/sidebar_nav_view.php');
		$this->load->view('tap_view');
	}





}
?>