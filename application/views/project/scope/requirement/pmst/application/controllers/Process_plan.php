<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Process_plan extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		if (!$this->session->userdata('logged_in')) {
			redirect(base_url());
		}
		$this->load->helper('url');
		$this->load->model('Process_plan_model');
		$this->load->helper('log_activity');

		$this->lang->load('btn', 'english');
		// $this->lang->load('btn','portuguese-brazilian');
		$this->lang->load('process-plan', 'english');
		// $this->lang->load('process_plan','portuguese-brazilian');

	}


	public function new($project_id)
	{
		$this->db->where('user_id',  $_SESSION['user_id']);
		$this->db->where('project_id',  $_SESSION['project_id']);
		$project['dados'] = $this->db->get('project_user')->result();
		// Verificando se o usuario logado tem acesso a esse projeto

		if (count($project['dados']) > 0) {
			$dado['process_plan'] = $this->Process_plan_model->get($_SESSION['project_id']);
			if ($dado['process_plan'] != null) {
				redirect("Process_plan/edit/" . $_SESSION['project_id']);
			}

			$this->load->view('frame/header_view'); 
		 $this->load->view('frame/topbar');
			$this->load->view('frame/sidebar_nav_view');
			$this->load->view('project/quality/process_plan/new', $dado);
		} else {
			redirect(base_url());
		}
	}

	public function edit($project_id)
	{
		$this->db->where('user_id',  $_SESSION['user_id']);
		$this->db->where('project_id',  $_SESSION['project_id']);
		$project['dados'] = $this->db->get('project_user')->result();

		if (count($project['dados']) > 0) {
			$dado['process_plan'] = $this->Process_plan_model->get($_SESSION['project_id']);
			if ($dado['process_plan'] == null) {
				redirect("Process_plan/new/" . $_SESSION['project_id']);
			}

			$this->load->view('frame/header_view'); 
		 $this->load->view('frame/topbar');
			$this->load->view('frame/sidebar_nav_view');
			$this->load->view('project/quality/process_plan/edit', $dado);
		} else {
			redirect(base_url());
		}
	}

	public function insert()
	{
		$process_plan['process_limits'] = $this->input->post('process_limits');
		$process_plan['process_configuration'] = $this->input->post('process_configuration');
		$process_plan['process_metrics'] = $this->input->post('process_metrics');
		$process_plan['goals_performance_improvement'] = $this->input->post('goals_performance_improvement');
		$process_plan['project_id'] = $_SESSION['project_id'];

		$query = $this->Process_plan_model->insert($process_plan);

		if ($query) {
			redirect("Process_plan/edit/" . $_SESSION['project_id']);
		}
	}

	public function update()
	{
		$process_plan['process_limits'] = $this->input->post('process_limits');
		$process_plan['process_configuration'] = $this->input->post('process_configuration');
		$process_plan['process_metrics'] = $this->input->post('process_metrics');
		$process_plan['goals_performance_improvement'] = $this->input->post('goals_performance_improvement');

		$query = $this->Process_plan_model->update($process_plan, $_SESSION['project_id']);

		if ($query) {
			redirect('Process_plan/edit/' . $_SESSION['project_id']);
		}
	}
}
