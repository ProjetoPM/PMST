<?php
if (!defined('BASEPATH')) {
	exit('No direct script access allowed');
}

class RequirementsManagement extends CI_Controller{

	function __construct(){
		parent::__construct();
		if (!$this->session->userdata('logged_in')) {
			redirect(base_url());
		}
		//$this->load->helper('url');
		$this->lang->load('btn', 'english');
		//$this->lang->load('btn', 'portuguese-brazilian');
		$this->lang->load('requirements_mp', 'english');
		//$this->lang->load('tap', 'portuguese-brazilian');
		$this->load->model('Project_model');
		$this->load->helper('url');
		$this->load->model('Requirements_mp_model');
	}

	public function newp($project_id){
		$idusuario = $_SESSION['user_id'];
    $this->db->where('user_id', $idusuario);
    $this->db->where('project_id', $project_id);
    $project['dados'] = $this->db->get('project_user')-> result();

    if (count($project['dados']) > 0) {
    $dado['requirements_mp'] = $this->Requirements_mp_model->readRequirementsManagementPlan($project_id);
		$dado['id'] = $project_id;
		$this->db->where('project_id', $project_id);
		$dado['project'] =  $this->db->get('project')->result();

		//$dado['verific'] = true;
		$this->db->where('project_id', $project_id);
		$dataproject['project'] = $this->db->get('project')->result();
		$this->load->view('frame/header_view');
		$this->load->view('frame/sidebar_nav_view');

		$this->load->view('project/scope/requirements_mp',$dado);

    } else {
        redirect(base_url());
    }

	}

	public function insert() {
		$postData = $this->input->post();
		$insert   = $this->Requirements_mp_model->createRequirementsManagementPlan($postData);
		redirect('RequirementsManagement/newp/' . $postData['project_id']);
		echo json_encode($insert);
	}

	public function update($project_id) {
		$requirements_mp['requirements_collection_proc'] = $this->input->post('requirements_collection_proc');
		$requirements_mp['requirements_prioritization'] = $this->input->post('requirements_prioritization');
		$requirements_mp['product_metrics'] = $this->input->post('product_metrics');
		$requirements_mp['status'] = $this->input->post('status');

		$query = $this->Requirements_mp_model->updateRequirementsManagementPlan($requirements_mp, $project_id);

		$this->load->view('frame/header_view');
		$this->load->view('frame/sidebar_nav_view');
		redirect('RequirementsManagement/newp/' . $project_id);
	}
}
?>
