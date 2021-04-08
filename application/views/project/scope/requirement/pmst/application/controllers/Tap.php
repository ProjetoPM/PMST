<?php
if (!defined('BASEPATH')) {
	exit('No direct script access allowed');
}

class Tap extends CI_Controller{

	function __construct(){
		parent::__construct();

		if (!$this->session->userdata('logged_in')) {
			redirect(base_url());
		}

		//$this->load->helper('url');
		$this->lang->load('btn', 'english');
		//$this->lang->load('btn', 'portuguese-brazilian');
		$this->lang->load('tap', 'english');
		//$this->lang->load('tap', 'portuguese-brazilian');
		$this->load->model('Tap_model');
		$this->load->model('Stakeholder_mp_model');
		$this->load->model('Project_model');

	}

	public function newp($project_id){
		$idusuario = $_SESSION['user_id'];
    $this->db->where('user_id', $idusuario);
    $this->db->where('project_id', $project_id);
    $project['dados'] = $this->db->get('project_user')-> result();

    if (count($project['dados']) > 0) {

			$dado['project_charter'] = $this->Tap_model->readTap($project_id);
			$dado['id'] = $project_id;
			$this->db->where('project_id', $project_id);
			$dado['project'] =  $this->db->get('project')->result();

			$dado['stakeholder'] = $this->Tap_model->getAllStk();
			$dado['stakeholder_mp'] = $this->Tap_model->getAllStk_mp();

			$this->db->where('project_id', $project_id);
			$dataproject['project'] = $this->db->get('project')->result();

			$this->load->view('frame/header_view');
			$this->load->view('frame/sidebar_nav_view');

			$this->load->view('project/tap_view',$dado);

    } else {
        redirect(base_url());
    }
	}

	public function insert() {
		$postData = $this->input->post();
		$insert   = $this->Tap_model->createTap($postData);
		redirect('project/' . $postData['project_id']);
		echo json_encode($insert);
	}

	public function update($id) {
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
		$project_charter['status'] = $this->input->post('status');

		if ($this->input->post('status') == 1) {
			$project_charter['status'] = 1;
		} else {
			$project_charter['status'] = 0;
		}
		$query = $this->Tap_model->updateTap($project_charter, $id);

		if ($query) {
			redirect('project/' . $id);
		}
	}

}
?>
