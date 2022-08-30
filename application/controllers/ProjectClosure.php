<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ProjectClosure extends CI_Controller
{

	function __construct()
	{

		parent::__construct();
		if (!$this->session->userdata('logged_in')) {
			redirect(base_url());
		}

		if (strcmp($_SESSION['language'], "US") == 0) {
            $this->lang->load('tep', 'english');
            $this->lang->load('project-page', 'english');
        } else {
            $this->lang->load('tep', 'portuguese-brazilian');
            $this->lang->load('project-page', 'portuguese-brazilian');
        }

		$this->load->helper('url');
		$this->load->helper('log_activity');
		
		$this->load->model('log_model');
		$this->load->model('view_model');
        $this->load->model('Project_model');
		$this->load->model('Project_Closure_model');

		// $this->lang->load('btn','portuguese-brazilian');
		// $this->lang->load('tep','portuguese-brazilian');


	}

	public function new($project_id)
	{

		if (strcmp($_SESSION['language'], "US") == 0) {
            $this->lang->load('btn','english');
        } else {
			$this->lang->load('btn','portuguese-brazilian');
        }
		
		$this->db->where('user_id', $_SESSION['user_id']);
		$this->db->where('project_id', $_SESSION['project_id']);
		$project['dados'] = $this->db->get('project_user')->result();
		// Verificando se o usuario logado tem acesso a esse projeto
		
		if (count($project['dados']) > 0) {
			$dado['project_closure'] = $this->Project_Closure_model->get($_SESSION['project_id']);
			// Confere sempre se não há dados desta area de conhecimento no projeto
			
			if ($dado['project_closure'] != null) {
				redirect("integration/project-closure/edit/" . $_SESSION['project_id']);
			}
			$dado['project_id'] = $_SESSION['project_id'];
			
			$this->load->view('frame/header_view');
			$this->load->view('frame/topbar');
			$this->load->view('frame/sidebar_nav_view');
			$this->load->view('project/integration/project_closure/new', $dado);
		} else {
			redirect(base_url());
		}
	}
	
	public function edit($project_id)
	{
		if (strcmp($_SESSION['language'], "US") == 0) {
			$this->lang->load('btn','english');
		} else {
			$this->lang->load('btn','portuguese-brazilian');
		}

		$this->db->where('user_id', $_SESSION['user_id']);
		$this->db->where('project_id', $_SESSION['project_id']);
		$project['dados'] = $this->db->get('project_user')->result();
		// Verificando se o usuario logado tem acesso a esse projeto
		
		if (count($project['dados']) > 0) {
			$dado['project_closure'] = $this->Project_Closure_model->get($_SESSION['project_id']);
			// Confere sempre se não há dados desta area de conhecimento no projeto
			
			if ($dado['project_closure'] == null) {
				redirect("integration/project-closure/new/" . $_SESSION['project_id']);
			}
			$dado["fields"] = getAllFieldEvaluation($_SESSION['project_id'], "project closure report", $dado['project_closure'][0]->project_closure_term_id);
			$dado['project_id'] = $_SESSION['project_id'];

			$this->load->view('frame/header_view');
			$this->load->view('frame/topbar');
			$this->load->view('frame/sidebar_nav_view');
			$this->load->view('project/integration/project_closure/edit', $dado);
		} else {
			redirect(base_url());
		}
	}

	public function insert()
	{
		$project_closure_term['client'] = $this->input->post('client');
		$project_closure_term['project_closure_date'] = $this->input->post('project_closure_date');
		$project_closure_term['main_changes_approved'] = $this->input->post('main_changes_approved');
		$project_closure_term['main_deviations'] = $this->input->post('main_deviations');
		$project_closure_term['main_lessons_learned'] = $this->input->post('main_lessons_learned');
		$project_closure_term['client_comments'] = $this->input->post('client_comments');
		$project_closure_term['sponsor_comments'] = $this->input->post('sponsor_comments');
		$project_closure_term['project_id'] = $_SESSION['project_id'];


		$query = $this->Project_Closure_model->insert($project_closure_term);

		if ($query) {   
			insertLogActivity('insert', 'project closure');
			$this->session->set_flashdata('success', 'Project Closure Report has been successfully created!');
			redirect("integration/project-closure/edit/" . $_SESSION['project_id']);
		}
	}

	public function update()
	{
		$project_closure_term['client'] = $this->input->post('client');
		$project_closure_term['project_closure_date'] = $this->input->post('project_closure_date');
		$project_closure_term['main_changes_approved'] = $this->input->post('main_changes_approved');
		$project_closure_term['main_deviations'] = $this->input->post('main_deviations');
		$project_closure_term['main_lessons_learned'] = $this->input->post('main_lessons_learned');
		$project_closure_term['client_comments'] = $this->input->post('client_comments');
		$project_closure_term['sponsor_comments'] = $this->input->post('sponsor_comments');

		$query = $this->Project_Closure_model->update($project_closure_term, $_SESSION['project_id']);

		if ($query) {
			insertLogActivity('update', 'project closure');
			$this->session->set_flashdata('success', 'Project Closure Report has been successfully changed!');
			redirect("integration/project-closure/edit/" . $_SESSION['project_id']);
		}
	}
}
