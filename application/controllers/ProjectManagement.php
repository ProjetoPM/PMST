<?php
if (!defined('BASEPATH')) {
	exit('No direct script access allowed');
}

class ProjectManagement extends CI_Controller{

	function __construct(){
		parent::__construct();
		if (!$this->session->userdata('logged_in')) {
			redirect(base_url());
		}
		//$this->load->helper('url');
		$this->lang->load('btn', 'english');
		//$this->lang->load('btn', 'portuguese-brazilian');
		$this->lang->load('project_mp', 'english');
		//$this->lang->load('tap', 'portuguese-brazilian');
		$this->load->model('Project_management_model');
	}

	public function newp($project_id){
		$idusuario = $_SESSION['user_id'];
    $this->db->where('user_id', $idusuario);
    $this->db->where('project_id', $project_id);
    $project['dados'] = $this->db->get('project_user')-> result();

    if (count($project['dados']) > 0) {
    $dado['project_mp'] = $this->Project_management_model->readProjectManagementPlan($project_id);
		$dado['id'] = $project_id;
		$this->db->where('project_id', $project_id);
		$dado['project'] =  $this->db->get('project')->result();

		//$dado['verific'] = true;
		$this->db->where('project_id', $project_id);
		$dataproject['project'] = $this->db->get('project')->result();
		$this->load->view('frame/header_view');
		$this->load->view('frame/sidebar_nav_view');

		$this->load->view('project/integration/project_management/project_mp', $dado);

    } else {
        redirect(base_url());
    }

	}

	public function insert() {
		$postData = $this->input->post();
		$insert   = $this->Project_management_model->createProjectManagementPlan($postData);
		redirect('ProjectManagement/newp/' . $postData['project_id']);
		echo json_encode($insert);
	}

	public function update($project_id) {
    $project_mp['project_lifecycle'] = $this->input->post('project_lifecycle');
		$project_mp['project_guidelines'] = $this->input->post('project_guidelines');
		$project_mp['project_guidelines'] = $this->input->post('project_guidelines');
		$project_mp['change_mp'] = $this->input->post('change_mp');
		$project_mp['configuration_mp'] = $this->input->post('configuration_mp');
		$project_mp['baseline_maintenance'] = $this->input->post('baseline_maintenance');
		$project_mp['stakeholders_communication'] = $this->input->post('stakeholders_communication');
		$project_mp['key_review'] = $this->input->post('key_review');
		$project_mp['status'] = $this->input->post('status');

		$query = $this->Project_management_model->updateProjectManagementPlan($project_mp, $project_id);

		$this->load->view('frame/header_view');
		$this->load->view('frame/sidebar_nav_view');
		redirect('ProjectManagement/newp/' . $project_id);
	}

}
?>
