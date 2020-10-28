<?php
if (!defined('BASEPATH')) {
	exit('No direct script access allowed');
}

class ProjectManagementPlan extends CI_Controller
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
		$this->lang->load('project_mp', 'english');
		//$this->lang->load('tap', 'portuguese-brazilian');
		$this->load->model('Project_Management_model');
		$this->load->model('view_model');
		$this->load->helper('log_activity');
		$this->load->model('log_model');
	}
	public function new($projet_id)
	{
		$idusuario = $_SESSION['user_id'];
		$this->db->where('user_id', $idusuario);
		$this->db->where('project_id', $_SESSION['project_id']);
		$project['dados'] = $this->db->get('project_user')->result();
		// Verificando se o usuario logado tem acesso a esse projeto

		if (count($project['dados']) > 0) {
			$dado['project_mp'] = $this->Project_Management_model->get($_SESSION['project_id']);
			if ($dado['project_mp'] != null) {
				redirect("integration/project-mp/edit/" . $_SESSION['project_id']);
			}

			$this->load->view('frame/header_view');
			$this->load->view('frame/topbar');
			$this->load->view('frame/sidebar_nav_view');
			$this->load->view('project/integration/project_mp/new', $dado);
		} else {
			redirect(base_url());
		}
	}

	public function edit($projet_id)
	{
		$idusuario = $_SESSION['user_id'];
		$this->db->where('user_id', $idusuario);
		$this->db->where('project_id', $_SESSION['project_id']);
		$project['dados'] = $this->db->get('project_user')->result();

		if (count($project['dados']) > 0) {
			$dado['project_mp'] = $this->Project_Management_model->get($_SESSION['project_id']);
			if ($dado['project_mp'] == null) {
				redirect("integration/project-mp/new/" . $_SESSION['project_id']);
			}

			$this->load->view('frame/header_view');
			$this->load->view('frame/topbar');
			$this->load->view('frame/sidebar_nav_view');
			$this->load->view('project/integration/project_mp/edit', $dado);
		} else {
			redirect(base_url());
		}
	}



	public function insert()
	{
		insertLogActivity('insert', 'project management plan');
		$postData = $this->input->post();
		$insert   = $this->Project_Management_model->insert($postData);
		redirect('integration/project-mp/edit/' . $postData['project_id']);
		echo json_encode($insert);
	}

	public function update()
	{
		$project_mp['project_lifecycle'] = $this->input->post('project_lifecycle');
		$project_mp['project_guidelines'] = $this->input->post('project_guidelines');
		$project_mp['project_guidelines'] = $this->input->post('project_guidelines');
		$project_mp['change_mp'] = $this->input->post('change_mp');
		$project_mp['configuration_mp'] = $this->input->post('configuration_mp');
		$project_mp['baseline_maintenance'] = $this->input->post('baseline_maintenance');
		$project_mp['stakeholders_communication'] = $this->input->post('stakeholders_communication');
		$project_mp['key_review'] = $this->input->post('key_review');
		$project_mp['status'] = $this->input->post('status');

		$query = $this->Project_Management_model->update($project_mp, $_SESSION['project_id']);

		insertLogActivity('update', 'project management plan');
		redirect('integration/project-mp/edit/' . $_SESSION['project_id']);
	}
}
