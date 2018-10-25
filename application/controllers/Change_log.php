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
		$this->load->view('project/change_log_view', $dado);
	}

	public function insert($id){
		$dado['change_log'] = $this->Change_log_model->getChange_log();
		
		$change_log['id_number'] = $this->input->post('id_number');
		$change_log['requester'] = $this->input->post('requester');
		$change_log['request_date'] = $this->input->post('request_date');
		$change_log['change_type'] = $this->input->post('change_type');
		$change_log['situation'] = $this->input->post('situation');
		$change_log['change_description'] = $this->input->post('change_description');
		$change_log['project_management_feedback'] = $this->input->post('project_management_feedback');
		$change_log['ccc_feedback'] = $this->input->post('ccc_feedback');
		$change_log['comments'] = $this->input->post('comments');
		$change_log['project_management_feedback'] = $this->input->post('project_management_feedback');
		$change_log['project_id'] = $id;

		$query=false;
		if($dado['change_log']!=null){
			foreach($dado['change_log'] as $tep){
				$verific = $tep->project_id;
				if($id==$verific){
					$query = $this->Change_log_model->updateChange_log($change_log, $id);
				}
			}
		}
		if($query!=true){
			$query = $this->Change_log_model->insertChange_log($change_log);
		}
		
		if($query){
			$this->load->view('frame/header_view');
			$this->load->view('frame/sidebar_nav_view');
			redirect('project/' . $change_log['project_id']);
		}

	}
}
