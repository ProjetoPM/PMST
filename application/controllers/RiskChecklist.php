<?php
if (!defined('BASEPATH')) {
	exit('No direct script access allowed');
}

class RiskChecklist extends CI_Controller
{

	public function __Construct()
	{
		parent::__Construct();
		if (!$this->session->userdata('logged_in')) {
			redirect(base_url());
		}

		$this->lang->load('btn', 'english');
		//$this->lang->load('btn','portuguese-brazilian');
		$this->lang->load('risk-mp', 'english');
		//$this->lang->load('risk-mp','portuguese-brazilian');

		$this->load->model('Project_model');
		$this->load->helper('log_activity');
		$this->load->model('log_model');
		$this->load->model('view_model');
		$this->load->helper('url');
		$this->load->model('RiskChecklist_model');
	}

	public function new($project_id)
	{
		$this->db->where('user_id',  $_SESSION['user_id']);
		$this->db->where('project_id',  $_SESSION['project_id']);
		$project['dados'] = $this->db->get('project_user')->result();
		// Verificando se o usuario logado tem acesso a esse projeto

		// if (count($project['dados']) > 0) {
		// 	$dado['risk_mp'] = $this->Risk_mp_model->get($project_id);
		// 	if ($dado['risk_mp'] != null) {
		// 		redirect("risk/risk-mp/edit/" . $_SESSION['project_id']);
		// 	}
		$dado['risk_check'] = $this->RiskChecklist_model->getAll($project_id);
		

			$this->load->view('frame/header_view');
			$this->load->view('frame/topbar');
			$this->load->view('frame/sidebar_nav_view');
			$this->load->view('project/risk/risk_checklist/new', $dado);
		// } else {
		// 	redirect(base_url());
		// }
	}

	public function edit($project_id)
	{
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
		// insertLogActivity('insert', 'risk management plan');
		// var_dump($this->input->post());exit;die;
		$postData = $this->input->post();
		$insert   = $this->RiskChecklist_model->updateRiskCheckList($postData, $_SESSION['project_id']);
		redirect('risk/risk-checklist/new/' . $_SESSION['project_id']);
		echo json_encode($insert);
	}

	public function update()
	{
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

			// $data = $this->communications_mp_model->updateResponsability($communication_item_id, $communication_responsability_id, $stakeholder_responsability);
			echo json_encode($data);
			// $this->package_model->update_package($id, $package, $product);
			// redirect('package');
			//  redirect('communication/communications-mp/list/' . $_SESSION['project_id']);
	

		// insertLogActivity('update', 'risk management plan');
		redirect('risk/risk-mp/edit/' . $_SESSION['project_id']);
	}
}
