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
		
     	$query['project_id'] = $project_id;
     	$this->load->view('frame/header_view');
     	$this->load->view('frame/sidebar_nav_view');
     	$this->load->view('project/communication/communication_mp/responsability/attribute_stakeholder', $query);

     }

     public function insert() {
     	$communication_responsability['communication_item_id'] = $this->input->post('communication_item_id');
     	$communication_responsability['stakeholder_id'] = $this->input->post('stakeholder_id');
     	$communication_responsability['communication_responsability_id'] = $this->input->post('communication_responsability_id');
     	
     	var_dump($communication_responsability);
		die();
     	$query = $this->communication_item_model->insert($communication_responsability);

     	if($query){
     		$this->load->view('frame/header_view');
     		$this->load->view('frame/sidebar_nav_view');
			redirect(base_url() . 'Communication_stakeholder/list/' . $this->input->post('project_id'));     	
		}
     }

     public function update($id){
     	$communication_responsability['communication_item_id'] = $this->input->post('communication_item_id');
     	$communication_responsability['stakeholder_id'] = $this->input->post('stakeholder_id');
     	$query = $this->communication_item_model->insert($communication_responsability);

     	if($query){
     		$this->load->view('frame/header_view');
     		$this->load->view('frame/sidebar_nav_view');
     		redirect(base_url() . 'Attribute_Stakeholder/list/' . $attribute_stakeholder['project_id']);
     	}
     }       

 }
 ?>