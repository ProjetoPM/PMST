<?php
if (!defined('BASEPATH')) {
	exit('No direct script access allowed');
}

class Scope_specification extends CI_Controller {
	
	function __construct(){
		parent::__construct();
		// $this->load->helper('url', 'english');
		$this->lang->load('btn','english');
		// $this->lang->load('btn','portuguese-brazilian');
		$this->lang->load('scope_specification','english');
		// $this->lang->load('scope_specification','portuguese-brazilian');
		$this->load->model('Issues_record_model');
	}


	
}