<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ProjectScopeStatement extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		if (!$this->session->userdata('logged_in')) {
			redirect(base_url());
		}
		$this->load->helper('url');
		$this->load->model('Scope_specification_model');
		$this->load->model('view_model');
		$this->load->model('log_model');
		$this->load->helper('log_activity');

		$this->lang->load('btn', 'english');
		// $this->lang->load('btn','portuguese-brazilian');
		$this->lang->load('scope_specification', 'english');
		// $this->lang->load('manage-scope','portuguese-brazilian');

	}

	public function new($project_id)
	{
		$this->db->where('user_id', $_SESSION['user_id']);
		$this->db->where('project_id', $_SESSION['project_id']);
		$project['dados'] = $this->db->get('project_user')->result();
		// Verificando se o usuario logado tem acesso a esse projeto

		if (count($project['dados']) > 0) {
			$dado['scope_specification'] = $this->Scope_specification_model->get($_SESSION['project_id']);
			// Confere sempre se não há dados desta area de conhecimento no projeto

			if ($dado['scope_specification'] != null) {
				redirect("scope/project-scope-statement/edit/" . $_SESSION['project_id']);
			}

			$this->load->view('frame/header_view');
			$this->load->view('frame/topbar');
			$this->load->view('frame/sidebar_nav_view');
			$this->load->view('project/scope/scope_specification/new', $dado);
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
			$dado['scope_specification'] = $this->Scope_specification_model->get($_SESSION['project_id']);
			if ($dado['scope_specification'] == null) {
				redirect("scope/project-scope-statement/new/" . $_SESSION['project_id']);
			}

			$this->load->view('frame/header_view');
			$this->load->view('frame/topbar');
			$this->load->view('frame/sidebar_nav_view');
			$this->load->view('project/scope/scope_specification/edit', $dado);
		} else {
			redirect(base_url());
		}
	}

	public function insert()
	{
		$Scope_specification['scope_description'] = $this->input->post('scope_description');
		$Scope_specification['acceptance_criteria'] = $this->input->post('acceptance_criteria');
		$Scope_specification['deliveries'] = $this->input->post('deliveries');
		$Scope_specification['exclusions'] = $this->input->post('exclusions');
		$Scope_specification['restrictions'] = $this->input->post('restrictions');
		$Scope_specification['assumptions'] = $this->input->post('assumptions');
		$Scope_specification['project_id'] = $_SESSION['project_id'];

		$query = $this->Scope_specification_model->insert($Scope_specification);

		if ($query) {
			insertLogActivity('insert', 'project scope statement');
			redirect("scope/project-scope-statement/edit/" . $_SESSION['project_id']);
		}
	}

	public function update()
	{
		$Scope_specification['scope_description'] = $this->input->post('scope_description');
		$Scope_specification['acceptance_criteria'] = $this->input->post('acceptance_criteria');
		$Scope_specification['deliveries'] = $this->input->post('deliveries');
		$Scope_specification['exclusions'] = $this->input->post('exclusions');
		$Scope_specification['restrictions'] = $this->input->post('restrictions');
		$Scope_specification['assumptions'] = $this->input->post('assumptions');

		$query = $this->Scope_specification_model->update($Scope_specification, $_SESSION['project_id']);

		if ($query) {
			insertLogActivity('update', 'project scope statement');
			redirect("scope/project-scope-statement/edit/" . $_SESSION['project_id']);
		}
	}
}
