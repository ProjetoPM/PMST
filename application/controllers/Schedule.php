<?php
if (!defined('BASEPATH')) {
	exit('No direct script access allowed');
}

class Schedule extends CI_Controller
{

	function __construct(){
		parent::__construct();
		$this->lang->load('btn','english');
        // $this->lang->load('btn','portuguese-brazilian');
        $this->lang->load('schedule','english');
        // $this->lang->load('schedule','portuguese-brazilian');
		//$this->load->helper('url');
		$this->load->model('Schedule_model');
	}

	public function schedule_form($project_id){
		$data['schedule_mp'] = $this->Schedule_model->schedule_form($project_id);
		$data['project_id'] = $project_id;
		//$this->db->where('project_id', $project_id);
		$data['project_charter'] = $this->db->get('project_charter')->result();
		$this->load->view('frame/header_view.php');
		$this->load->view('frame/sidebar_nav_view.php');
		$this->load->view('project/schedule_mp', $data);
	}

//Criar o Schedule 1 Vez
	public function insert(){
		$schedule_mp['schedule_model'] = $this->input->post('schedule_model');
		$schedule_mp['accuracy_level'] = $this->input->post('accuracy_level');
		$schedule_mp['organizational_procedures'] = $this->input->post('organizational_procedures');
		$schedule_mp['schedule_maintenance'] = $this->input->post('schedule_maintenance');
		$schedule_mp['performance_measurement'] = $this->input->post('performance_measurement');
		$schedule_mp['report_format'] = $this->input->post('report_format');
		$schedule_mp['project_id'] = $this->input->post('project_id');
		$schedule_mp['status'] = $this->input->post('status');

		$query = $this->Schedule_model->insert($schedule_mp);

		if ($query) {
			redirect('project/'. $schedule_mp['project_id']);
		}
	}


// esse parametro vai ser inicializado la na view
	public function update($schedule_mp_id){
		$schedule_mp['schedule_model'] = $this->input->post('schedule_model');
		$schedule_mp['accuracy_level'] = $this->input->post('accuracy_level');
		$schedule_mp['organizational_procedures'] = $this->input->post('organizational_procedures');
		$schedule_mp['schedule_maintenance'] = $this->input->post('schedule_maintenance');
		$schedule_mp['performance_measurement'] = $this->input->post('performance_measurement');
		$schedule_mp['report_format'] = $this->input->post('report_format');
		$schedule_mp['project_id'] = $this->input->post('project_id');
		$schedule_mp['status'] = $this->input->post('status');

		$query =	$this->Schedule_model->update($schedule_mp, $schedule_mp_id);

		if ($query) {
			redirect('project/'. $schedule_mp['project_id']);
		}
	

	}
}
?>