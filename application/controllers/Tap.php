<?php
if (!defined('BASEPATH')) {
	exit('No direct script access allowed');
}

class Tap extends CI_Controller{

	function __construct(){
		parent::__construct();
		//$this->load->helper('url');
		$this->lang->load('btn', 'english');
		//$this->lang->load('btn', 'portuguese-brazilian');
		$this->lang->load('tap', 'english');
		//$this->lang->load('tap', 'portuguese-brazilian');
		$this->load->model('Tap_model');
		$this->load->model('Stakeholder_mp_model');
	}

	public function new($project_id){

		//buscando stakeholders
		$data['stakeholder'] = $this->Tap_model->getAllStk();
		$data['stakeholder_mp'] = $this->Tap_model->getAllStk_mp();
		$data['project_charter'] = $this->Tap_model->tap_form($project_id);
		$data['project_id'] = $project_id;
		$this->db->where('project_id', $project_id);
		$data['project_charter'] = $this->db->get('project_charter')->result();
		$this->load->view('frame/header_view.php');
		$this->load->view('frame/sidebar_nav_view.php');
		$this->load->view('project/tap_view', $data);

	}



	public function insert() {
		$project_charter['project_description'] = $this->input->post('project_description');
		$project_charter['project_purpose'] = $this->input->post('project_purpose');
		$project_charter['project_objective'] = $this->input->post('project_objective');
		$project_charter['benefits'] = $this->input->post('benefits');
		$project_charter['high_level_requirements'] = $this->input->post('high_level_requirements');
		$project_charter['initial_assumptions'] = $this->input->post('initial_assumptions');
		$project_charter['initial_restrictions'] = $this->input->post('initial_restrictions');
		$project_charter['project_limits'] = $this->input->post('project_limits');
		$project_charter['high_level_risks'] = $this->input->post('high_level_risks');
		$project_charter['summary_schedule'] = $this->input->post('summary_schedule');
		$project_charter['budge_summary'] = $this->input->post('budge_summary');
		$project_charter['project_approval_requirements'] = $this->input->post('project_approval_requirements');
		$project_charter['start_date'] = $this->input->post('start_date');
		$project_charter['end_date'] = $this->input->post('end_date');
		$project_charter['project_id'] = $this->input->post('project_id');
		$project_charter['status'] = $this->input->post('status');

		if ($this->input->post('status') == 1) {
			$project_charter['status'] = 1;
		} else {
			$project_charter['status'] = 0;
		}
		$query = $this->Tap_model->insertTap($project_charter);

		if ($query) {
			redirect('project/' . $project_charter['project_id']);
		}
	}

	public function update($project_charter_id) {
		$project_charter['project_description'] = $this->input->post('project_description');
		$project_charter['project_purpose'] = $this->input->post('project_purpose');
		$project_charter['project_objective'] = $this->input->post('project_objective');
		$project_charter['benefits'] = $this->input->post('benefits');
		$project_charter['high_level_requirements'] = $this->input->post('high_level_requirements');
		$project_charter['initial_assumptions'] = $this->input->post('initial_assumptions');
		$project_charter['initial_restrictions'] = $this->input->post('initial_restrictions');
		$project_charter['project_limits'] = $this->input->post('project_limits');
		$project_charter['high_level_risks'] = $this->input->post('high_level_risks');
		$project_charter['summary_schedule'] = $this->input->post('summary_schedule');
		$project_charter['budge_summary'] = $this->input->post('budge_summary');
		$project_charter['project_approval_requirements'] = $this->input->post('project_approval_requirements');
		$project_charter['start_date'] = $this->input->post('start_date');
		$project_charter['end_date'] = $this->input->post('end_date');
		$project_charter['project_id'] = $this->input->post('project_id');
		$project_charter['status'] = $this->input->post('status');

		if ($this->input->post('status') == 1) {
			$project_charter['status'] = 1;
		} else {
			$project_charter['status'] = 0;
		}
		$query = $this->Tap_model->updateTap($project_charter, $project_charter_id);

		if ($query) {
			redirect('project/' . $project_charter['project_id']);
		}
	}

}
?>
