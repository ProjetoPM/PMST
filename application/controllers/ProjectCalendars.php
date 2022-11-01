<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ProjectCalendars extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		
		$this->load->model('log_model');
		$this->load->model('view_model');
		$this->load->model('Project_model');
		$this->load->model('Activity_model');
		$this->load->model('Stakeholder_model');
		$this->load->model('ProjectCalendars_model');

		$userInProject = $this->Project_model->userInProject($_SESSION['user_id'], $_SESSION['project_id']);
        
        if ($userInProject) {
            $this->session->set_flashdata('error3', 'You have no access to this project');
            redirect('projects/' . $_SESSION['project_id']);
        }

		if (!$this->session->userdata('logged_in')) {
			redirect(base_url());
		}

		$array = array();
		array_push($array, 'calendars', 'stakeholder');
		loadLangs($array);

		$this->load->helper('url');
		$this->load->helper('log_activity');
		

	}


	public function new()
    {
		
        $idusuario = $_SESSION['user_id'];
        $this->db->where('user_id', $idusuario);
        $this->db->where('project_id', $_SESSION['project_id']);
        $project['dados'] = $this->db->get('project_user')->result();


        if (count($project['dados']) > 0) {
			$dado['activities'] = $this->Activity_model->getAll($_SESSION['project_id']);
			$dado['stakeholders'] = $this->Stakeholder_model->getAllWithRole($_SESSION['project_id'], getIndexOfLanguage());
            $this->load->view('frame/header_view');
            $this->load->view('frame/topbar');
            $this->load->view('frame/sidebar_nav_view');
            $this->load->view('project/schedule/project_calendar/new', $dado);
        } else {
            redirect(base_url());
        }
    }
	
	//RESOURCE CALENDAR
	public function list($project_id)
	{
		$dado['project_id'] = $project_id;
		$dado['calendars'] = $this->ProjectCalendars_model->getAllPerProject($project_id);
		$this->load->view('frame/header_view'); 
		$this->load->view('frame/topbar');
		$this->load->view('frame/sidebar_nav_view');
		$this->load->view('project/schedule/project_calendar/list', $dado);
	}

	public function edit($id)
	{
		
		$query['activities'] = $this->Activity_model->getAll($_SESSION['project_id']);
		$query['stakeholders'] = $this->Stakeholder_model->getAllWithRole($_SESSION['project_id'], getIndexOfLanguage());
		$query['calendar'] = $this->ProjectCalendars_model->get($id);

		$this->load->view('frame/header_view.php');
		$this->load->view('frame/topbar');
		$this->load->view('frame/sidebar_nav_view.php');
		$this->load->view('project/schedule/project_calendar/edit', $query);
	}

	public function insert()
	{

		if(strcmp($_SESSION['language'],"US") == 0){
			$feedback_success = 'Item Updated';
        }else{
			$feedback_success = 'Item Atualizado ';
		}

		$activity['activity_id'] = $this->input->post('activity_id');
		$activity['stakeholder_id'] = $this->input->post('stakeholder_id');
		$activity['allocation_start'] = $this->input->post('allocation_start');
		$activity['allocation_ends'] = $this->input->post('allocation_ends');

		$start_date_higher_than_end_date = diff_date($activity['allocation_start'], $activity['allocation_ends']);

		if($start_date_higher_than_end_date){
			$this->session->set_flashdata('error', $this->lang->line('start_date_higher_than_end_date'));
			redirect('schedule/project-calendars/list/' . $_SESSION['project_id']);
		}
		

		$query = $this->ProjectCalendars_model->insert($activity);

		if ($query) {
			insertLogActivity('create', 'project calendars');
			$this->session->set_flashdata('success', $feedback_success);
			redirect('schedule/project-calendars/list/' . $_SESSION['project_id']);
		}
	}

	public function update($id)
	{
		if(strcmp($_SESSION['language'],"US") == 0){
			$feedback_success = 'Item Updated';
        }else{
			$feedback_success = 'Item Atualizado ';
		}

		$activity['activity_id'] = $this->input->post('activity_id');
		$activity['stakeholder_id'] = $this->input->post('stakeholder_id');
		$activity['allocation_start'] = $this->input->post('allocation_start');
		$activity['allocation_ends'] = $this->input->post('allocation_ends');

		$start_date_higher_than_end_date = diff_date($activity['allocation_start'], $activity['allocation_ends']);

		if($start_date_higher_than_end_date){
			$this->session->set_flashdata('error', $this->lang->line('start_date_higher_than_end_date'));
			redirect('schedule/project-calendars/list/' . $_SESSION['project_id']);
		}

		$query = $this->ProjectCalendars_model->update($activity, $id);

		if ($query) {
			insertLogActivity('update', 'project calendars');
			$this->session->set_flashdata('success', $feedback_success);
			redirect('schedule/project-calendars/list/' . $_SESSION['project_id']);
		}
	}

	public function delete($id)
    {
        $query = $this->ProjectCalendars_model->delete($id);
        if ($query) {
            insertLogActivity('delete', 'Project Calendars');
			$this->session->set_flashdata('delete', 'Item deleted successfully!');
            // redirect('schedule/project-schedule-network-diagram/list/' . $_SESSION['project_id']);
        }
    }

	
}
