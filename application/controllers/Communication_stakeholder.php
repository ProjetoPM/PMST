<?php
if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Communication_stakeholder extends CI_Controller {

	function __construct(){

		parent::__Construct();
		if (!$this->session->userdata('logged_in')) {
			redirect(base_url());
		}
		//$this->load->helper('url');
		$this->load->model('project_model');
		// $this->load->model('Change_log_model');
		
		$this->lang->load('btn','english');
        // $this->lang->load('btn','portuguese-brazilian');
	//	$this->lang->load('change_log','english');
        // $this->lang->load('change_log_view','portuguese-brazilian');
        $this->load->model('communication_item_model');
         $this->load->model('Stakeholder_mp_model'); // stakeholders
         $this->load->model('Communication_item_stakeholder_model'); // stakeholder responsability
	}


	private function ajax_checking(){
		if (!$this->input->is_ajax_request()) {
			redirect(base_url());
		}
	}

	public function list($project_id){
		 $query['communication_item'] = $this->communication_item_model->getWithProject_id($project_id);
		 $query['communication_responsability'] = $this->Communication_item_stakeholder_model->getAllCommunication_responsability();
        $query['stakeholders'] = $this->Stakeholder_mp_model->getStakeholder();
        //$query['stakeholder'] = $this->communication_item_model->getCommunication_stakeholder_item_id($project_id);
        $query['project_id'] = $project_id;
		$this->load->view('frame/header_view');
		$this->load->view('frame/sidebar_nav_view');
		$this->load->view('project/communication/communication_mp/responsability/attribute_stakeholder', $query);

	}

}
?>