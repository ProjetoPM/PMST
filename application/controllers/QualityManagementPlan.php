<?php
defined('BASEPATH') or exit('No direct script access allowed');

class QualityManagementPlan extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		if (!$this->session->userdata('logged_in')) {
			redirect(base_url());
		}

		$this->load->helper('url');
		$this->load->helper('log_activity');
		
		$this->load->model('log_model');
		$this->load->model('view_model');
		$this->load->model('Project_model');
		$this->load->model('Quality_model');

		$array = array();
		array_push($array, 'quality_plan');
		loadLangs($array);

		$userInProject = $this->Project_model->userInProject($_SESSION['user_id'], $_SESSION['project_id']);
		
		if ($userInProject) {
			$this->session->set_flashdata('error3', 'You have no access to this project');
			redirect('projects/' . $_SESSION['project_id']);
		}

	}

	public function new($project_id)
	{

		if (strcmp($_SESSION['language'], "US") == 0) {
			$this->lang->load('btn', 'english');
		} else {
			$this->lang->load('btn', 'portuguese-brazilian');
		}

		$this->db->where('user_id',  $_SESSION['user_id']);
		$this->db->where('project_id',  $_SESSION['project_id']);
		$project['dados'] = $this->db->get('project_user')->result();
		// Verificando se o usuario logado tem acesso a esse projeto

		if (count($project['dados']) > 0) {
			$dado['quality_mp'] = $this->Quality_model->get($project_id);
			if ($dado['quality_mp'] != null) {
				redirect("quality/quality-mp/edit/" . $_SESSION['project_id']);
			}

			$this->load->view('frame/header_view');
			$this->load->view('frame/topbar');
			$this->load->view('frame/sidebar_nav_view');
			$this->load->view('project/quality/quality_mp/new', $dado);
		} else {
			redirect(base_url());
		}
	}

	public function edit($project_id)
	{
		if (strcmp($_SESSION['language'], "US") == 0) {
			$this->lang->load('btn', 'english');
		} else {
			$this->lang->load('btn', 'portuguese-brazilian');
		}

		$this->db->where('user_id',  $_SESSION['user_id']);
		$this->db->where('project_id',  $_SESSION['project_id']);
		$project['dados'] = $this->db->get('project_user')->result();

		if (count($project['dados']) > 0) {
			$dado['quality_mp'] = $this->Quality_model->get($project_id);
			if ($dado['quality_mp'] == null) {
				redirect("quality/quality-mp/new/" . $_SESSION['project_id']);
			}

			$dado["fields"] = getAllFieldEvaluation($_SESSION['project_id'], "quality management plan", $dado['quality_mp'][0]->quality_mp_id);

			$this->load->view('frame/header_view');
			$this->load->view('frame/topbar');
			$this->load->view('frame/sidebar_nav_view');
			$this->load->view('project/quality/quality_mp/edit', $dado);
		} else {
			redirect(base_url());
		}
	}

	function insert()
	{

		if (strcmp($_SESSION['language'], "US") == 0) {
			$feedback_success = 'Item Created';
		} else {
			$feedback_success = 'Item Criado ';
		}

		insertLogActivity('insert', 'quality management plan');

		$postData = $this->input->post();
		$insert   = $this->Quality_model->insert($postData);
		$this->session->set_flashdata('success', $feedback_success);
		redirect('quality/quality-mp/edit/' . $postData['project_id']);
		echo json_encode($insert);
	}


	public function update()
	{

		if (strcmp($_SESSION['language'], "US") == 0) {
			$feedback_success = 'Item Updated';
		} else {
			$feedback_success = 'Item Atualizado ';
		}

		$quality_mp['standards'] = $this->input->post('standards');
		$quality_mp['objectives'] = $this->input->post('objectives');
		$quality_mp['roles_responsibilities'] = $this->input->post('roles_responsibilities');
		$quality_mp['deliverables'] = $this->input->post('deliverables');
		$quality_mp['activities'] = $this->input->post('activities');
		$quality_mp['tools'] = $this->input->post('tools');
		$quality_mp['procedures'] = $this->input->post('procedures');
		$quality_mp['status'] = (int) $this->input->post('status');

		//$insert = $this->project_model->insert_project_pgq($quality_mp);
		$query = $this->Quality_model->update($quality_mp, $_SESSION['project_id']);

		insertLogActivity('update', 'quality management plan');
		$this->session->set_flashdata('success', $feedback_success);
		redirect('quality/quality-mp/edit/' . $_SESSION['project_id']);
	}
}
