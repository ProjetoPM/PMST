<?php
if (!defined('BASEPATH')) {
	exit('No direct script access allowed');
}

class RequirementsManagementPlan extends CI_Controller
{

	function __construct()
	{
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
		$this->load->model('view_model');
		$this->load->model('log_model');
		$this->load->helper('url');
		$this->load->helper('log_activity');
		$this->load->model('Requirements_mp_model');
	}



	public function new($project_id)
	{
		$this->db->where('user_id', $_SESSION['user_id']);
		$this->db->where('project_id', $_SESSION['project_id']);
		$project['dados'] = $this->db->get('project_user')->result();
		// Verificando se o usuario logado tem acesso a esse projeto

		if (count($project['dados']) > 0) {

			$dado['requirements_mp'] = $this->Requirements_mp_model->get($_SESSION['project_id']);
			// Confere sempre se não há dados desta area de conhecimento no projeto

			if ($dado['requirements_mp'] != null) {
				redirect("scope/requirements-mp/edit/" . $_SESSION['project_id']);
			}

			$this->load->view('frame/header_view');
			$this->load->view('frame/topbar');
			$this->load->view('frame/sidebar_nav_view');
			$this->load->view('project/scope/requirements_mp/new', $dado);
		} else {
			redirect(base_url());
		}
	}

	public function edit($project_id)
	{
		$this->db->where('user_id', $_SESSION['user_id']);
		$this->db->where('project_id', $_SESSION['project_id']);
		$project['dados'] = $this->db->get('project_user')->result();

		if (count($project['dados']) > 0) {
			$dado['requirements_mp'] = $this->Requirements_mp_model->get($_SESSION['project_id']);
			if ($dado['requirements_mp'] == null) {
				redirect("scope/requirements-mp/new/" . $_SESSION['project_id']);
			}

			$this->load->view('frame/header_view');
			$this->load->view('frame/topbar');
			$this->load->view('frame/sidebar_nav_view');
			$this->load->view('project/scope/requirements_mp/edit', $dado);
		} else {
			redirect(base_url());
		}
	}

	public function insert()
	{
		insertLogActivity('insert', 'requirements management plan');
		$postData = $this->input->post();
		$insert   = $this->Requirements_mp_model->insert($postData);
		redirect('scope/requirements-mp/edit/' . $_SESSION['project_id']);
		echo json_encode($insert);
	}

	public function update()
	{
		$requirements_mp['requirements_collection_proc'] = $this->input->post('requirements_collection_proc');
		$requirements_mp['requirements_prioritization'] = $this->input->post('requirements_prioritization');
		$requirements_mp['product_metrics'] = $this->input->post('product_metrics');
		$requirements_mp['status'] = $this->input->post('status');

		$query = $this->Requirements_mp_model->update($requirements_mp, $_SESSION['project_id']);
		insertLogActivity('update', 'requirements management plan');
		redirect('scope/requirements-mp/edit/' . $_SESSION['project_id']);
	}
}
