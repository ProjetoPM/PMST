<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Change_log extends CI_Controller {

	function __construct(){

		parent::__construct();
		$this->load->helper('url');
		$this->load->model('Change_log_model');
		
		//$this->lang->load('btn','english');
        // $this->lang->load('btn','portuguese-brazilian');
		//$this->lang->load('change_log_view','english');
        // $this->lang->load('change_log_view','portuguese-brazilian');
	}

	public function addChangeLog($project_id){
		$dado['change_log'] = $this->Change_log_model->getChange_log();
		$dado['id'] = $project_id;
		$this->load->view('frame/header_view');
		$this->load->view('frame/sidebar_nav_view');
		$this->load->view('project/change_log_view',$dado);
	}
}
