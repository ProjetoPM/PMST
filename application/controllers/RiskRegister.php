<?php
defined('BASEPATH') or exit('No direct script access allowed');

class RiskRegister extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		if (!$this->session->userdata('logged_in')) {
			redirect(base_url());
		}


		if (strcmp($_SESSION['language'], "US") == 0) {
			$this->lang->load('risk', 'english');
			$this->lang->load('project-page', 'english');
		} else {
			$this->lang->load('risk', 'portuguese-brazilian');
			$this->lang->load('project-page', 'portuguese-brazilian');
		}

		$this->load->helper('url');
		$this->load->model('Risk_model');
		$this->load->model('view_model');
		$this->load->model('log_model');
		$this->load->helper('log_activity');


		// $this->lang->load('btn','portuguese-brazilian');
		// $this->lang->load('risk','portuguese-brazilian');

	}

	public function list($project_id)
	{
		if (strcmp($_SESSION['language'], "US") == 0) {
			$this->lang->load('btn', 'english');
		} else {
			$this->lang->load('btn', 'portuguese-brazilian');
		}

		$dado['project_id'] = $project_id;

		$dado['risk_register'] = $this->Risk_model->getAll($project_id);
		$this->load->view('frame/header_view');
		$this->load->view('frame/topbar');
		$this->load->view('frame/sidebar_nav_view');
		$this->load->view('project/risk/risk_register/list', $dado);
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
		$this->db->where('project_id', $project_id);
		$project['dados'] = $this->db->get('project_user')->result();

		if (count($project['dados']) > 0) {
			$dado['id'] = $project_id;
			$this->load->view('frame/header_view');
			$this->load->view('frame/topbar');
			$this->load->view('frame/sidebar_nav_view');
			$this->load->view('project/risk/risk_register/new', $dado);
		} else {
			redirect(base_url());
		}
	}

	public function edit($risk_register_id)
	{
		if (strcmp($_SESSION['language'], "US") == 0) {
			$this->lang->load('btn', 'english');
		} else {
			$this->lang->load('btn', 'portuguese-brazilian');
		}

		$query['risk_register'] = $this->Risk_model->get($risk_register_id);
		$this->load->view('frame/header_view.php');
		$this->load->view('frame/topbar');
		$this->load->view('frame/sidebar_nav_view.php');
		$this->load->view('project/risk/risk_register/edit', $query);
	}

	public function insert($project_id)
	{
		$risk_register['impacted_objective'] = $this->input->post('impacted_objective');
		$risk_register['priority'] = $this->input->post('priority');
		$risk_register['risk_status'] = $this->input->post('risk_status');
		$risk_register['event'] = $this->input->post('event');
		$risk_register['date'] = $this->input->post('date');
		$risk_register['identifier'] = $this->input->post('identifier');
		$risk_register['type'] = $this->input->post('type');
		$risk_register['lessons'] = $this->input->post('lessons');
		$risk_register['category'] = $this->input->post('category');
		$risk_register['fallback'] = $this->input->post('fallback');
		$risk_register['contingency_owner'] = $this->input->post('contingency_owner');
		$risk_register['contingency'] = $this->input->post('contingency');
		$risk_register['secondary'] = $this->input->post('secondary');
		$risk_register['residual'] = $this->input->post('residual');
		$risk_register['timing'] = $this->input->post('timing');
		$risk_register['responses_owner'] = $this->input->post('responses_owner');
		$risk_register['responses'] = $this->input->post('responses');
		$risk_register['triggers'] = $this->input->post('triggers');
		$risk_register['causes'] = $this->input->post('causes');
		$risk_register['strategy'] = $this->input->post('strategy');
		$risk_register['effects'] = $this->input->post('effects');
		$risk_register['score'] = $this->input->post('score');
		$risk_register['impact'] = $this->input->post('impact');
		$risk_register['probability'] = $this->input->post('probability');

		$risk_register['status'] = 1;
		$risk_register['project_id'] = $project_id;
		$query = $this->Risk_model->insert($risk_register);

		if ($query) {
			insertLogActivity('insert', 'risk register');
			$this->session->set_flashdata('success', 'Risk Register has been successfully created!');
			redirect('risk/risk-register/list/' . $risk_register['project_id']);
		}
	}

	public function update($risk_register_id)
	{
		$risk_register['impacted_objective'] = $this->input->post('impacted_objective');
		$risk_register['priority'] = $this->input->post('priority');
		$risk_register['risk_status'] = $this->input->post('risk_status');
		$risk_register['event'] = $this->input->post('event');
		$risk_register['date'] = $this->input->post('date');
		$risk_register['identifier'] = $this->input->post('identifier');
		$risk_register['type'] = $this->input->post('type');
		$risk_register['lessons'] = $this->input->post('lessons');
		$risk_register['category'] = $this->input->post('category');
		$risk_register['fallback'] = $this->input->post('fallback');
		$risk_register['contingency_owner'] = $this->input->post('contingency_owner');
		$risk_register['contingency'] = $this->input->post('contingency');
		$risk_register['secondary'] = $this->input->post('secondary');
		$risk_register['residual'] = $this->input->post('residual');
		$risk_register['timing'] = $this->input->post('timing');
		$risk_register['responses_owner'] = $this->input->post('responses_owner');
		$risk_register['responses'] = $this->input->post('responses');
		$risk_register['triggers'] = $this->input->post('triggers');
		$risk_register['causes'] = $this->input->post('causes');
		$risk_register['strategy'] = $this->input->post('strategy');
		$risk_register['effects'] = $this->input->post('effects');
		$risk_register['score'] = $this->input->post('score');
		$risk_register['impact'] = $this->input->post('impact');
		$risk_register['probability'] = $this->input->post('probability');

		$risk_register['project_id'] = $this->input->post('project_id');


		$query = $this->Risk_model->update($risk_register, $risk_register_id);

		if ($query) {
			insertLogActivity('update', 'risk register');
			$this->session->set_flashdata('success', 'Risk Register has been successfully changed!');
			redirect('risk/risk-register/list/' . $risk_register['project_id']);
		}
	}

	public function delete($risk_register_id)
	{
		$project_id['project_id'] = $this->input->post('project_id');
		//$project_id['project_id'] = $project_id;
		$query = $this->Risk_model->delete($risk_register_id);
		if ($query) {
			insertLogActivity('delete', 'risk register');
			redirect('risk/risk-register/list/' . $_SESSION['project_id']);
		}
	}
}
