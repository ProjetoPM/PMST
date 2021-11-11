<?php
if (!defined('BASEPATH')) {
	exit('No direct script access allowed');
}

class ProjectCharter extends CI_Controller
{

	function __construct()
	{
		parent::__construct();

		if (!$this->session->userdata('logged_in')) {
			redirect(base_url());
		}

		if(strcmp($_SESSION['language'],"US") == 0){
			$this->lang->load('project-page', 'english');
			$this->lang->load('btn', 'english');
			$this->lang->load('tap', 'english');
		}else{
			$this->lang->load('project-page', 'portuguese-brazilian');
			$this->lang->load('btn', 'portuguese-brazilian');
			$this->lang->load('tap', 'portuguese-brazilian');
		}


		$this->load->model('Project_Charter_model');
		$this->load->model('log_model');
		$this->load->model('Stakeholder_mp_model');
		$this->load->model('view_model');
		$this->load->helper('log_activity');
		$this->load->model('Project_model');
	}

	public function new($project_id)
	{
		$this->db->where('user_id', $_SESSION['user_id']);
		$this->db->where('project_id', $_SESSION['project_id']);
		$project['dados'] = $this->db->get('project_user')->result();
		// Verificando se o usuario logado tem acesso a esse projeto

		if (count($project['dados']) > 0) {
			$dado['project_charter'] = $this->Project_Charter_model->get($_SESSION['project_id']);
			// Confere sempre se não há dados desta area de conhecimento no projeto

			if ($dado['project_charter'] != null) {
				redirect("integration/project-charter/edit/" . $_SESSION['project_id']);
			}
			$dado['stakeholder'] = $this->Project_Charter_model->getAllStk();

			//$dado['stakeholder_mp'] = $this->Project_Charter_model->getAllStk_mp();

			$this->load->view('frame/header_view');
			$this->load->view('frame/topbar');
			$this->load->view('frame/sidebar_nav_view');
			$this->load->view('project/integration/project_charter/new', $dado);
		} else {
			redirect(base_url());
		}
	}

	public function edit($project_id)
	{
		// var_dump($_SESSION['project']);
		// die;
		// exit;

		if(strcmp($_SESSION['language'],"US") == 0){
			$this->lang->load('project-page', 'english');
			$this->lang->load('btn', 'english');
			$this->lang->load('tap', 'english');
		}else{
			$this->lang->load('project-page', 'portuguese-brazilian');
			$this->lang->load('btn', 'portuguese-brazilian');
			$this->lang->load('tap', 'portuguese-brazilian');
		}

		$this->db->where('user_id', $_SESSION['user_id']);
		$this->db->where('project_id', $_SESSION['project_id']);
		$project['dados'] = $this->db->get('project_user')->result();

		if (count($project['dados']) > 0) {
			$dado['project_charter'] = $this->Project_Charter_model->get($_SESSION['project_id']);
			
			if ($dado['project_charter'] == null) {
				redirect("integration/project-charter/new/" . $_SESSION['project_id']);
			}

			$dado['items'] = array_column($dado['project_charter'], 'project_charter_id');
			$dado['items'] = $this->view_model->getAllSignature($dado['items'][0]);

			$dado['stakeholder'] = $this->Project_Charter_model->getAllStk();
			//$dado['stakeholder_mp'] = $this->Project_Charter_model->getAllStk_mp();

			$this->load->view('frame/header_view');
			$this->load->view('frame/topbar');
			$this->load->view('frame/sidebar_nav_view');
			$this->load->view('project/integration/project_charter/edit', $dado);
		} else {
			redirect(base_url());
		}
	}

	public function insert()
	{
		if(strcmp($_SESSION['language'],"US") == 0){
			$feedback_success = 'Item Created';
        }else{
			$feedback_success = 'Item Criado ';
		}

		if ($_SESSION['access_level'] == "1") {
			$this->session->set_flashdata('error', 'You are not allowed to create or change documents!');
			redirect("integration/project-charter/new/" . $_SESSION['project_id']);
		}
		
		$postData = $this->input->post();
		$insert   = $this->Project_Charter_model->insert($postData);
		if ($insert) {
			$this->session->set_flashdata('success', $feedback_success);
		}
		redirect("integration/project-charter/edit/" . $postData['project_id']);
		echo json_encode($insert);
	}

	public function update()
	{
		if(strcmp($_SESSION['language'],"US") == 0){
			$feedback_success = 'Item Updated';
        }else{
			$feedback_success = 'Item Atualizado ';
		}

		if ($_SESSION['acess_level'] == 1) {
			$this->session->set_flashdata('error', 'You are not allowed to create or change documents!');
			redirect("integration/project-charter/edit/" . $_SESSION['project_id']);
		}
		$project_charter['project_description'] = $this->input->post('project_description');
		$project_charter['project_purpose'] = $this->input->post('project_purpose');
		$project_charter['project_objective'] = $this->input->post('project_objective');
		$project_charter['benefits'] = $this->input->post('benefits');
		$project_charter['high_level_requirements'] = $this->input->post('high_level_requirements');
		$project_charter['boundaries'] = $this->input->post('boundaries');
		$project_charter['high_level_risks'] = $this->input->post('high_level_risks');
		$project_charter['summary_schedule'] = $this->input->post('summary_schedule');
		$project_charter['budge_summary'] = $this->input->post('budge_summary');
		$project_charter['project_approval_requirements'] = $this->input->post('project_approval_requirements');
		$project_charter['exit_criteria'] = $this->input->post('exit_criteria');
		$project_charter['success_criteria'] = $this->input->post('success_criteria');
		$project_charter['start_date'] = $this->input->post('start_date');
		$project_charter['end_date'] = $this->input->post('end_date');
		$project_charter['status'] = $this->input->post('status');

		if ($this->input->post('status') == 1) {
			$project_charter['status'] = 1;
		} else {
			$project_charter['status'] = 0;
		}
		$query = $this->Project_Charter_model->update($project_charter, $_SESSION['project_id']);

		if ($query) {
			insertLogActivity('update', 'project charter');
			$this->session->set_flashdata('success', $feedback_success);

			redirect("integration/project-charter/edit/" . $_SESSION['project_id']);
		}
	}
}
