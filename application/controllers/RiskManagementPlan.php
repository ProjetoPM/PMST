<?php
if (!defined('BASEPATH')) {
	exit('No direct script access allowed');
}

class RiskManagementPlan extends CI_Controller
{

	public function __Construct()
	{
		parent::__Construct();
		if (!$this->session->userdata('logged_in')) {
			redirect(base_url());
		}

		if (strcmp($_SESSION['language'], "US") == 0) {
            $this->lang->load('risk-mp', 'english');
            $this->lang->load('project-page', 'english');
        } else {
			$this->lang->load('risk-mp', 'portuguese-brazilian');
            $this->lang->load('project-page', 'portuguese-brazilian');
        }

		$this->lang->load('btn', 'english');
		//$this->lang->load('btn','portuguese-brazilian');
		
		//$this->lang->load('risk-mp','portuguese-brazilian');

		$this->load->model('Project_model');
		$this->load->helper('log_activity');
		$this->load->model('log_model');
		$this->load->model('view_model');
		$this->load->helper('url');
		$this->load->model('Risk_mp_model');
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
			$dado['risk_mp'] = $this->Risk_mp_model->get($project_id);
			if ($dado['risk_mp'] != null) {
				redirect("risk/risk-mp/edit/" . $_SESSION['project_id']);
			}

			$this->load->view('frame/header_view');
			$this->load->view('frame/topbar');
			$this->load->view('frame/sidebar_nav_view');
			$this->load->view('project/risk/risk_mp/new', $dado);
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
			$dado['risk_mp'] = $this->Risk_mp_model->get($project_id);
			if ($dado['risk_mp'] == null) {
				redirect("risk/risk-mp/new/" . $_SESSION['project_id']);
			}

			$this->load->view('frame/header_view');
			$this->load->view('frame/topbar');
			$this->load->view('frame/sidebar_nav_view');
			$this->load->view('project/risk/risk_mp/edit', $dado);
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

		insertLogActivity('insert', 'risk management plan');

		$postData = $this->input->post();
		$insert   = $this->Risk_mp_model->insert($postData);
		$this->session->set_flashdata('success', $feedback_success);
		redirect('risk/risk-mp/edit/' . $postData['project_id']);
		echo json_encode($insert);
	}

	public function update()
	{
		if(strcmp($_SESSION['language'],"US") == 0){
			$feedback_success = 'Item Updated';
        }else{
			$feedback_success = 'Item Atualizado ';
		}

		$risk_mp['methodology'] = $this->input->post('methodology');
		$risk_mp['roles_responsibilities'] = $this->input->post('roles_responsibilities');
		$risk_mp['risks_categories'] = $this->input->post('risks_categories');
		$risk_mp['probability_impact_matrix'] = $this->input->post('probability_impact_matrix');
		$risk_mp['reviewed_tolerances'] = $this->input->post('reviewed_tolerances');
		$risk_mp['traceability'] = $this->input->post('traceability');
		$risk_mp['funding'] = $this->input->post('funding');
		$risk_mp['timing'] = $this->input->post('timing');
		$risk_mp['stakeholder_risk'] = $this->input->post('stakeholder_risk');
		$risk_mp['definitions_risk'] = $this->input->post('definitions_risk');
		$risk_mp['format_report'] = $this->input->post('format_report');


		$risk_mp['status'] = $this->input->post('status');

		$query = $this->Risk_mp_model->update($risk_mp, $_SESSION['project_id']);

		insertLogActivity('update', 'risk management plan');
		$this->session->set_flashdata('success', $feedback_success);
		redirect('risk/risk-mp/edit/' . $_SESSION['project_id']);
	}
}
