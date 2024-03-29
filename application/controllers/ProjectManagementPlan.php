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
		$this->load->helper('url');
		$this->load->helper('log_activity');

		$this->load->model('log_model');
		$this->load->model('view_model');
		$this->load->model('Project_model');
		$this->load->model('Project_management_model');
		
		$array = array();
		array_push($array, 'project_mp');
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
		$idusuario = $_SESSION['user_id'];
		$this->db->where('user_id', $idusuario);
		$this->db->where('project_id', $_SESSION['project_id']);
		$project['dados'] = $this->db->get('project_user')->result();
		// Verificando se o usuario logado tem acesso a esse projeto

		if (count($project['dados']) > 0) {
			$dado['project_mp'] = $this->Project_management_model->get($_SESSION['project_id']);
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
		if (strcmp($_SESSION['language'], "US") == 0) {
			$this->lang->load('btn', 'english');
			$this->lang->load('photo_upload', 'english');
		} else {
			$this->lang->load('btn', 'portuguese-brazilian');
			$this->lang->load('photo_upload', 'portuguese-brazilian');
		}

		$idusuario = $_SESSION['user_id'];
		$this->db->where('user_id', $idusuario);
		$this->db->where('project_id', $_SESSION['project_id']);
		$project['dados'] = $this->db->get('project_user')->result();

		if (count($project['dados']) > 0) {
			$dado['project_mp'] = $this->Project_management_model->get($_SESSION['project_id']);
			if ($dado['project_mp'] == null) {
				redirect("integration/project-mp/new/" . $_SESSION['project_id']);
			}

			$dado["fields"] = getAllFieldEvaluation($_SESSION['project_id'], "project management plan", $dado['project_mp']['project_mp_id']);
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

		if(strcmp($_SESSION['language'],"US") == 0){
			$feedback_success = 'Item Created';
        }else{
			$feedback_success = 'Item Criado ';
		}

		$project_mp['project_lifecycle'] = $this->input->post('project_lifecycle');
		$project_mp['project_guidelines'] = $this->input->post('project_guidelines');
		$project_mp['requirements_mp'] = $this->input->post('requirements_mp');
		$project_mp['schedule_mp'] = $this->input->post('schedule_mp');
		$project_mp['cost_mp'] = $this->input->post('cost_mp');
		$project_mp['quality_mp'] = $this->input->post('quality_mp');
		$project_mp['resource_mp'] = $this->input->post('resource_mp');
		$project_mp['stakeholders_communication'] = $this->input->post('stakeholders_communication');
		$project_mp['risk_mp'] = $this->input->post('risk_mp');
		$project_mp['procurement_mp'] = $this->input->post('procurement_mp');
		$project_mp['stakeholder_mp'] = $this->input->post('stakeholder_mp');

		$project_mp['scope_baseline'] = $this->input->post('scope_baseline');
		$project_mp['baseline_maintenance'] = $this->input->post('baseline_maintenance');
		$project_mp['cost_baseline'] = $this->input->post('cost_baseline');

		$project_mp['change_mp'] = $this->input->post('change_mp');
		$project_mp['configuration_mp'] = $this->input->post('configuration_mp');
		$project_mp['performance'] = $this->input->post('performance');
		$project_mp['project_lifecycle'] = $this->input->post('project_lifecycle');
		$project_mp['development'] = $this->input->post('development');
		$project_mp['key_review'] = $this->input->post('key_review');

		$project_mp['project_id'] = $_SESSION['project_id'];
		
		$query = $this->Project_management_model->insert($project_mp);
		
		if ($query) {
			insertLogActivity('insert', 'project management plan');
			$this->session->set_flashdata('success', $feedback_success);
			redirect('integration/project-mp/edit/' . $_SESSION['project_id']);
		}
		// echo json_encode($insert);
	}

	public function update()
	{

		if(strcmp($_SESSION['language'],"US") == 0){
			$feedback_success = 'Item Updated';
        }else{
			$feedback_success = 'Item Atualizado ';
		}

		$project_mp['project_lifecycle'] = $this->input->post('project_lifecycle');
		$project_mp['project_guidelines'] = $this->input->post('project_guidelines');
		$project_mp['change_mp'] = $this->input->post('change_mp');
		$project_mp['configuration_mp'] = $this->input->post('configuration_mp');
		$project_mp['baseline_maintenance'] = $this->input->post('baseline_maintenance');
		$project_mp['stakeholders_communication'] = $this->input->post('stakeholders_communication');
		$project_mp['key_review'] = $this->input->post('key_review');
		$project_mp['requirements_mp'] = $this->input->post('requirements_mp');
		$project_mp['schedule_mp'] = $this->input->post('schedule_mp');
		$project_mp['cost_mp'] = $this->input->post('cost_mp');
		$project_mp['quality_mp'] = $this->input->post('quality_mp');
		$project_mp['resource_mp'] = $this->input->post('resource_mp');
		$project_mp['risk_mp'] = $this->input->post('risk_mp');
		$project_mp['procurement_mp'] = $this->input->post('procurement_mp');
		$project_mp['stakeholder_mp'] = $this->input->post('stakeholder_mp');
		$project_mp['scope_baseline'] = $this->input->post('scope_baseline');
		$project_mp['cost_baseline'] = $this->input->post('cost_baseline');
		$project_mp['performance'] = $this->input->post('performance');
		$project_mp['development'] = $this->input->post('development');


		$project_mp['status'] = $this->input->post('status');

		$query = $this->Project_management_model->update($project_mp, $_SESSION['project_id']);

		insertLogActivity('update', 'project management plan');
		$this->session->set_flashdata('success', $feedback_success);
		redirect('integration/project-mp/edit/' . $_SESSION['project_id']);
	}
}
