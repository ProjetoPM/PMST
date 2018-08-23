<?php
if (!defined('BASEPATH')) {
	exit('No direct script access allowed');
}

class Stakeholder_mp extends CI_Controller{

	function __construct(){
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('Stakeholder_mp_model');
	}

	function stakeholder_mp_form(){
		//chamar db da model
		$query['stakeholders'] = $this->Stakeholder_mp_model->getAllStakeholders();

		$this->load->view('frame/header_view.php');
		$this->load->view('frame/sidebar_nav_view.php');
		$this->load->view('project/stakeholder_mp.php', $query);
		
	}

	public function updateSchedule(){
		$shed['schedule_model'] = $this->input->post('schedule_model');
		$shed['accuracy_level'] = $this->input->post('accuracy_level');
		$shed['organizational_procedures'] = $this->input->post('organizational_procedures');
		$shed['schedule_maintenance'] = $this->input->post('schedule_maintenance');
		$shed['performance_measurement'] = $this->input->post('performance_measurement');
		$shed['report_format'] = $this->input->post('report_format');

		$query =	$this->Schedule_model->updateScheduleDB($shed);
		if ($query) {
			header('location:'.base_url().$this->schedule_form());
		}

		//var_dump($shed);
	}
}
?>