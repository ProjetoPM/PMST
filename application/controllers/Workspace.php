<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Workspace extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		if (!$this->session->userdata('logged_in')) {
			redirect(base_url());
		}

		// $this->load->helper('url', 'english');


		if (strcmp($_SESSION['language'], "US") == 0) {
			$this->lang->load('btn', 'english');
			$this->lang->load('user', 'english');
			$this->lang->load('workspace', 'english');
			$this->lang->load('project-page', 'english');
		} else {
			$this->lang->load('btn', 'portuguese-brazilian');
			$this->lang->load('user', 'portuguese-brazilian');
			$this->lang->load('workspace', 'portuguese-brazilian');
			$this->lang->load('project-page', 'portuguese-brazilian');
		}

		$this->load->model('view_model');
		$this->load->model('Project_model');
		$this->load->model('log_model');
		$this->load->helper('url');
		$this->load->model('Workspace_model');
		$this->load->helper('log_activity');
	}

	public function list()
	{
		$data['workspace'] = $this->Workspace_model->getUserWorkSpaces($_SESSION['user_id']);

		if (count($data['workspace']) > 0) {

			$this->load->view('frame/header_view');
			$this->load->view('frame/topbar');
			$this->load->view('frame/sidebar_nav_view');
			$this->load->view('workspace/workspace', $data);
		} else {
			redirect(base_url());
		}
	}

	public function members($workspace_id)
	{
		$data['users'] = $this->Workspace_model->getWorkSpaceUsers($workspace_id);

		if (count($data['users']) > 0) {

			$this->load->view('frame/header_view');
			$this->load->view('frame/topbar');
			$this->load->view('frame/sidebar_nav_view');
			$this->load->view('frame/footer_view');
			$this->load->view('workspace/members', $data);
		} else {
			redirect(base_url());
		}
	}

	public function new()
	{

		$this->load->view('frame/header_view');
		$this->load->view('frame/topbar');
		$this->load->view('frame/sidebar_nav_view');
		$this->load->view('frame/footer_view');
		$this->load->view('workspace/new');
	}

	public function edit($project_id)
	{

		$this->db->where('user_id',  $_SESSION['user_id']);
		$this->db->where('project_id',  $_SESSION['project_id']);
		$project['dados'] = $this->db->get('project_user')->result();

		if (count($project['dados']) > 0) {
			$dado['business_case'] = $this->Business_case_model->get($_SESSION['project_id']);
			if ($dado['business_case'] == null) {
				redirect(base_url("integration/business-case/new/" . $_SESSION['project_id']));
			}
			$dado["fields"] = getAllFieldEvaluation($_SESSION['project_id'], "business case", $dado['business_case'][0]->business_case_id);

			$this->load->view('frame/header_view');
			$this->load->view('frame/topbar');
			$this->load->view('frame/sidebar_nav_view');
			$this->load->view('project/integration/business_case/edit', $dado);
		} else {
			redirect(base_url());
		}
	}


	public function insert()
	{
		if (strcmp($_SESSION['language'], "US") == 0) {
			$feedback_success = 'Item Created';
		} else {
			$feedback_success = 'Item Criado ';
		}
		$workspace['name'] = $this->input->post('workspace');
		$workspace['status'] = $this->input->post('status');
		
		$workspace_user['user_id'] = $_SESSION['user_id'];
		$workspace_user['access_level'] = 1;

		$insert  = $this->Workspace_model->insert($workspace, $workspace_user);

		var_dump($insert);
		if ($insert) {
			$this->session->set_flashdata('success', $feedback_success);
			insertLogActivity('insert', 'workspace');
			redirect("projects/$insert");
		}
		redirect("workspace/list");
		// echo json_encode($insert);
	}


	public function update()
	{
		if (strcmp($_SESSION['language'], "US") == 0) {
			$feedback_success = 'Item Updated';
		} else {
			$feedback_success = 'Item Atualizado ';
		}

		$business_case['business_deals'] = $this->input->post('business_deals');
		$business_case['situation_analysis'] = $this->input->post('situation_analysis');
		$business_case['recommendation'] = $this->input->post('recommendation');
		$business_case['evaluation'] = $this->input->post('evaluation');

		//$insert = $this->project_model->insert_project_pgq($quality_mp);
		$query = $this->Business_case_model->update($business_case, $_SESSION['project_id']);
		if ($query) {
			$this->session->set_flashdata('success', $feedback_success);
			insertLogActivity('update', 'business case');
		}

		$this->load->view('frame/header_view');
		$this->load->view('frame/topbar');
		$this->load->view('frame/sidebar_nav_view');
		redirect("integration/business-case/edit/" . $_SESSION['project_id']);
	}
}
