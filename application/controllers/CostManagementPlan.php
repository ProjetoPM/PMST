<?php
defined('BASEPATH') or exit('No direct script access allowed');

class CostManagementPlan extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		if (!$this->session->userdata('logged_in')) {
			redirect(base_url());
		}

		if (strcmp($_SESSION['language'], "US") == 0) {
            $this->lang->load('manage-cost', 'english');
            $this->lang->load('project-page', 'english');
        } else {
            $this->lang->load('manage-cost', 'portuguese-brazilian');
            $this->lang->load('project-page', 'portuguese-brazilian');
        }

		$this->load->helper('url');
		$this->load->model('Cost_model');
		$this->load->model('view_model');
		$this->load->model('log_model');
		$this->load->helper('log_activity');

		// $this->lang->load('btn','portuguese-brazilian');
		
		// $this->lang->load('manage-cost','portuguese-brazilian');

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
			$dado['cost_mp'] = $this->Cost_model->get($project_id);
			if ($dado['cost_mp'] != null) {
				redirect("cost/cost-mp/edit/" . $_SESSION['project_id']);
			}

			$this->load->view('frame/header_view');
			$this->load->view('frame/topbar');
			$this->load->view('frame/sidebar_nav_view');
			$this->load->view('project/cost/cost_mp/new', $dado);
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
			$dado['cost_mp'] = $this->Cost_model->get($project_id);
			if ($dado['cost_mp'] == null) {
				redirect("cost/cost-mp/new/" . $_SESSION['project_id']);
			}

			$this->load->view('frame/header_view');
			$this->load->view('frame/topbar');
			$this->load->view('frame/sidebar_nav_view');
			$this->load->view('project/cost/cost_mp/edit', $dado);
		} else {
			redirect(base_url());
		}
	}

	function insert()
	{
		insertLogActivity('insert', 'cost management plan');
		$postData = $this->input->post();
		$insert   = $this->Cost_model->insert($postData);
		$this->session->set_flashdata('success', 'Cost Management Plan has been successfully created!');
		redirect('cost/cost-mp/edit/' . $postData['project_id']);
		echo json_encode($insert);
	}

	public function update()
	{
		insertLogActivity('update', 'cost management plan');

		$cost_mp['project_costs_m'] = $this->input->post('project_costs_m');
		$cost_mp['accuracy_level'] = $this->input->post('accuracy_level');
		$cost_mp['organizational_procedures'] = $this->input->post('organizational_procedures');
		$cost_mp['measurement_rules'] = $this->input->post('measurement_rules');
		$cost_mp['format_report'] = $this->input->post('format_report');

		$cost_mp['control_thresholds'] = $this->input->post('control_thresholds');
		$cost_mp['details'] = $this->input->post('details');
		$cost_mp['precision_level'] = $this->input->post('precision_level');
		$cost_mp['units_measure'] = $this->input->post('units_measure');

		$cost_mp['status'] = $this->input->post('status');

		//$insert = $this->project_model->insert_project_pgq($quality_mp);
		$query = $this->Cost_model->update($cost_mp, $_SESSION['project_id']);
		$this->session->set_flashdata('success', 'Cost Management Plan has been successfully changed!');
		redirect('cost/cost-mp/edit/' . $_SESSION['project_id']);
	}
}
