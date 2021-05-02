<?php
defined('BASEPATH') or exit('No direct script access allowed');

class FinalReport extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		if (!$this->session->userdata('logged_in')) {
			redirect(base_url());
		}

		// $this->load->helper('url', 'english');

		$this->lang->load('btn', 'english');
		// $this->lang->load('btn','portuguese-brazilian');
		$this->lang->load('final_report', 'english');
		// $this->lang->load('quality_mp','portuguese-brazilian');

		$this->load->model('view_model');
		$this->load->model('Project_model');
		$this->load->model('log_model');
		$this->load->helper('url');
		$this->load->model('Final_report_model');
		$this->load->helper('log_activity');
	}

	public function new($project_id)
	{
		$this->db->where('user_id',  $_SESSION['user_id']);
		$this->db->where('project_id',  $_SESSION['project_id']);
		$project['dados'] = $this->db->get('project_user')->result();
		// Verificando se o usuario logado tem acesso a esse projeto

		if (count($project['dados']) > 0) {
			$dado['final_report'] = $this->Final_report_model->get($_SESSION['project_id']);
			if ($dado['final_report'] != null) {
				redirect("integration/final-report/edit/" . $_SESSION['project_id']);
			}
			$this->load->view('frame/header_view');
			$this->load->view('frame/topbar');
			$this->load->view('frame/sidebar_nav_view');
			$this->load->view('project/integration/final_report/new', $dado);
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
			$dado['final_report'] = $this->Final_report_model->get($_SESSION['project_id']);
			if ($dado['final_report'] == null) {
				redirect(base_url("integration/final-report/new/" . $_SESSION['project_id']));
			}
			$this->load->view('frame/header_view');
			$this->load->view('frame/topbar');
			$this->load->view('frame/sidebar_nav_view');
			$this->load->view('project/integration/final_report/edit', $dado);
		} else {
			redirect(base_url());
		}
	}


	function insert()
	{
		insertLogActivity('insert', 'final Report');

		$postData = $this->input->post();
		$insert   = $this->Final_report_model->insert($postData);
		if ($insert) {
			$this->session->set_flashdata('success', 'Final Report has been successfully created!');
		}
		redirect("integration/final-report/edit/" . $_SESSION['project_id']);
		// echo json_encode($insert);
	}


	public function update()
	{
		insertLogActivity('update', 'final Report');

		$final_report['business_deals'] = $this->input->post('business_deals');
		$final_report['situation_analysis'] = $this->input->post('situation_analysis');
		$final_report['recommendation'] = $this->input->post('recommendation');
		$final_report['evaluation'] = $this->input->post('evaluation');

		//$insert = $this->project_model->insert_project_pgq($quality_mp);
		$query = $this->Final_report_model->update($final_report, $_SESSION['project_id']);
		if ($query) {
			$this->session->set_flashdata('success', 'Final Report has been successfully changed!');
		}

		$this->load->view('frame/header_view');
		$this->load->view('frame/topbar');
		$this->load->view('frame/sidebar_nav_view');
		redirect("integration/final-report/edit/" . $_SESSION['project_id']);
	}
}
