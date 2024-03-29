<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Wbs extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		if (!$this->session->userdata('logged_in')) {
			redirect(base_url());
		}
		// If para globalização do sistema
		if (strcmp($_SESSION['language'], "US") == 0) {
            $this->lang->load('wbs', 'english');
            $this->lang->load('project-page', 'english');
        } else {
            $this->lang->load('wbs', 'portuguese-brazilian');
            $this->lang->load('project-page', 'portuguese-brazilian');
        }
		// $this->load->helper('url', 'english');		
		// $this->lang->load('quality_mp','portuguese-brazilian');


		$this->load->model('Project_model');
		$this->load->helper('url');
		$this->load->model('Benefits_plan_model');
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
			$dado['benefits_plan'] = $this->Benefits_plan_model->get($_SESSION['project_id']);
			if ($dado['benefits_plan'] != null) {
				//redirect("scope/work-breakdown-structure/edit/".$_SESSION['project_id']);
			}

			$this->load->view('frame/header_view');
			$this->load->view('frame/topbar');
			$this->load->view('frame/sidebar_nav_view');
			$this->load->view('project/scope/wbs/new', $dado);
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
			$dado['benefits_plan'] = $this->Benefits_plan_model->get($_SESSION['project_id']);
			if ($dado['benefits_plan'] == null) {
				redirect("scope/work-breakdown-structure/new/" . $_SESSION['project_id']);
			}

			$this->load->view('frame/header_view');
			$this->load->view('frame/topbar');
			$this->load->view('frame/sidebar_nav_view');
			$this->load->view('project/scope/wsb/edit', $dado);
		} else {
			redirect(base_url());
		}
	}

	function insert()
	{
		//$this->ajax_checking();
		$postData = $this->input->post();
		$insert   = $this->Benefits_plan_model->insert($postData);
		redirect('scope/work-breakdown-structure/edit/' . $postData['project_id']);
		echo json_encode($insert);
	}


	public function update()
	{
		$benefits_plan['target_benefits'] = $this->input->post('target_benefits');
		$benefits_plan['strategic_alignment'] = $this->input->post('strategic_alignment');
		$benefits_plan['schedule_benefit'] = $this->input->post('schedule_benefit');
		$benefits_plan['benefits_owner'] = $this->input->post('benefits_owner');
		$benefits_plan['indicators'] = $this->input->post('indicators');
		$benefits_plan['premises'] = $this->input->post('premises');
		$benefits_plan['risks'] = $this->input->post('risks');

		//$insert = $this->project_model->insert_project_pgq($quality_mp);
		$query = $this->Benefits_plan_model->update($benefits_plan, $_SESSION['project_id']);

		redirect('scope/work-breakdown-structure/edit/' . $_SESSION['project_id']);
	}
}
