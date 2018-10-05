<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class RegisterRisk extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('Risk_model');


		$this->lang->load('btn','english');
        // $this->lang->load('btn','portuguese-brazilian');
        $this->lang->load('risk','english');
        // $this->lang->load('risk','portuguese-brazilian');

	}

	public function addnew($project_id){
		$dado['id'] = $project_id;
		$this->load->view('frame/header_view');
		$this->load->view('frame/sidebar_nav_view');
		$this->load->view('project/risk',$dado);
	}

	public function insert($id){
		$risk_register['impacted_objective'] = $this->input->post('impacted_objective');
		$risk_register['priority'] = $this->input->post('priority');
		$risk_register['risk_status'] = $this->input->post('risk_status');
		$risk_register['event'] = $this->input->post('event');
		$risk_register['date'] = $this->input->post('date');
		$risk_register['identifier'] = $this->input->post('identifier');
		$risk_register['type'] = $this->input->post('type');
		$risk_register['status'] = 1;
		$risk_register['project_id'] = $id;
		$query = $this->Risk_model->insert($risk_register);
		
		if($query){
			$this->load->view('frame/header_view');
			$this->load->view('frame/sidebar_nav_view');
			redirect('project/' . $risk_register['project_id']);
		}

	}
}
?>