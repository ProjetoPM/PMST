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

	public function addTap($project_id){
		$data['project_charter'] = $this->Tap_model->insertTap($project_id);
		$data['project_id'] = $project_id;
		$this->db->where('project_id', $project_id);
		$data['project_charter'] = $this->db->get('project_charter')->result();
		$this->load->view('frame/header_view.php');
		$this->load->view('frame/sidebar_nav_view.php');
		$this->load->view('project/tap_view', $data);
	}





}
?>