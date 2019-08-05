<?php
if (!defined('BASEPATH')) {
	exit('No direct script access allowed');
}

class ProjectManagement extends CI_Controller{

	function __construct(){
		parent::__construct();
		//$this->load->helper('url');
		$this->lang->load('btn', 'english');
		//$this->lang->load('btn', 'portuguese-brazilian');
		$this->lang->load('project_mp', 'english');
		//$this->lang->load('tap', 'portuguese-brazilian');
		$this->load->model('Project_management_model');
	}

	public function new($project_id){

		//buscando stakeholders
		$data['project_mp'] = $this->Project_management_model->tap_form($project_id);
		$data['project_id'] = $project_id;
		$this->db->where('project_id', $project_id);
		$data['project_mp'] = $this->db->get('project_mp')->result();
		$this->load->view('frame/header_view.php');
		$this->load->view('frame/sidebar_nav_view.php');
		$this->load->view('project/integration/project_management/project_mp', $data);

	}



	public function insert() {
		$project_mp['project_lifecycle'] = $this->input->post('project_lifecycle');
		$project_mp['project_guidelines'] = $this->input->post('project_guidelines');
		$project_mp['project_guidelines'] = $this->input->post('project_guidelines');
		$project_mp['change_mp'] = $this->input->post('change_mp');
		$project_mp['configuration_mp'] = $this->input->post('configuration_mp');
		$project_mp['baseline_maintenance'] = $this->input->post('baseline_maintenance');
		$project_mp['stakeholders_communication'] = $this->input->post('stakeholders_communication');
		$project_mp['key_review'] = $this->input->post('key_review');
		$project_mp['project_id'] = $this->input->post('project_id');
		$project_mp['status'] = $this->input->post('status');

		if ($this->input->post('status') == 1) {
			$project_mp['status'] = 1;
		} else {
			$project_mp['status'] = 0;
		}
		$query = $this->Project_management_model->insertProjectMp($project_mp);

		if ($query) {
			redirect('project/' . $project_mp['project_id']);
		}
	}

	public function update($project_mp_id) {
    $project_mp['project_lifecycle'] = $this->input->post('project_lifecycle');
		$project_mp['project_guidelines'] = $this->input->post('project_guidelines');
		$project_mp['project_guidelines'] = $this->input->post('project_guidelines');
		$project_mp['change_mp'] = $this->input->post('change_mp');
		$project_mp['configuration_mp'] = $this->input->post('configuration_mp');
		$project_mp['baseline_maintenance'] = $this->input->post('baseline_maintenance');
		$project_mp['stakeholders_communication'] = $this->input->post('stakeholders_communication');
		$project_mp['key_review'] = $this->input->post('key_review');
		$project_mp['project_id'] = $this->input->post('project_id');
		$project_mp['status'] = $this->input->post('status');

		if ($this->input->post('status') == 1) {
			$project_charter['status'] = 1;
		} else {
			$project_charter['status'] = 0;
		}
		$query = $this->Project_management_model->updateProjectMp($project_mp, $project_mp_id);

		if ($query) {
			redirect('project/' . $project_mp['project_id']);
		}
	}

}
?>
