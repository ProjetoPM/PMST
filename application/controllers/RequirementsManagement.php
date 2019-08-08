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
		$this->load->model('Requirements_mp_model');
	}

	public function newp($project_id){

		//buscando stakeholders
		$data['requirements_mp'] = $this->Requirements_mp_model->tap_form($project_id);
		$data['project_id'] = $project_id;
		$this->db->where('project_id', $project_id);
		$data['requirements_mp'] = $this->db->get('requirements_mp')->result();
		$this->load->view('frame/header_view.php');
		$this->load->view('frame/sidebar_nav_view.php');
		$this->load->view('project/scope/requirements_mp', $data);

	}



	public function insert() {
		$requirements_mp['requirements_collection_proc'] = $this->input->post('requirements_collection_proc');
		$requirements_mp['requirements_prioritization'] = $this->input->post('requirements_prioritization');
		$requirements_mp['product_metrics'] = $this->input->post('product_metrics');
		$requirements_mp['project_id'] = $this->input->post('project_id');
		$requirements_mp['status'] = $this->input->post('status');

		if ($this->input->post('status') == 1) {
			$requirements_mp['status'] = 1;
		} else {
			$requirements_mp['status'] = 0;
		}
		$query = $this->Requirements_mp_model->insertRequirementsMp($requirements_mp);

		if ($query) {
			redirect('project/' . $requirements_mp['project_id']);
		}
	}

	public function update($requirements_mp_id) {
		$requirements_mp['requirements_collection_proc'] = $this->input->post('requirements_collection_proc');
		$requirements_mp['requirements_prioritization'] = $this->input->post('requirements_prioritization');
		$requirements_mp['product_metrics'] = $this->input->post('product_metrics');
		$requirements_mp['project_id'] = $this->input->post('project_id');
		$requirements_mp['status'] = $this->input->post('status');


		if ($this->input->post('status') == 1) {
			$requirements_mp['status'] = 1;
		} else {
			$requirements_mp['status'] = 0;
		}
		$query = $this->Requirements_mp_model->updateRequirementsMp($requirements_mp, $requirements_mp_id);

		if ($query) {
			redirect('project/' . $requirements_mp['project_id']);
		}
	}

}
?>
