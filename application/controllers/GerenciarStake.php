<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class GerenciarStake extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('Stakeholder_model');


		$this->lang->load('btn','english');
        // $this->lang->load('btn','portuguese-brazilian');
        $this->lang->load('stakeholder','english');
        // $this->lang->load('manage-cost','portuguese-brazilian');

	}

	public function addnew($project_id){
		$dado['id'] = $project_id;
		$this->load->view('frame/header_view');
		$this->load->view('frame/sidebar_nav_view');
		$this->load->view('project/stakeholder',$dado);
	}

	public function insert($id){
		$stakeholder_register['name'] = $this->input->post('name');
		$stakeholder_register['type'] = $this->input->post('type');
		$stakeholder_register['organization'] = $this->input->post('organization');
		$stakeholder_register['position'] = $this->input->post('position');
		$stakeholder_register['role'] = $this->input->post('role');
		$stakeholder_register['responsibility'] = $this->input->post('responsibility');
		$stakeholder_register['email'] = $this->input->post('email');
		$stakeholder_register['phone_number'] = $this->input->post('phone_number');
		$stakeholder_register['work_place'] = $this->input->post('work_place');
		$stakeholder_register['essential_requirements'] = $this->input->post('essential_requirements');
		$stakeholder_register['main_expectations'] = $this->input->post('main_expectations');
		$stakeholder_register['interest_phase'] = $this->input->post('interest_phase');
		$stakeholder_register['observations'] = $this->input->post('observations');
		$dado['project_id'] = $id;
		$query = $this->Stakeholder_model->insertStakes($stakeholder_register);
		
		if($query){
			$this->load->view('frame/header_view');
			$this->load->view('frame/sidebar_nav_view');
			redirect('project/' . $dado['project_id']);
		}

	}
}
?>