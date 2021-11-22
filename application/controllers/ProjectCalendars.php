<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ProjectCalendars extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		if (!$this->session->userdata('logged_in')) {
			redirect(base_url());
		}

		if (strcmp($_SESSION['language'], "US") == 0) {
			$this->lang->load('calendars', 'english');
            $this->lang->load('project-page', 'english');
			$this->lang->load('stakeholder', 'english');
        } else {
            $this->lang->load('calendars', 'portuguese-brazilian');
            $this->lang->load('project-page', 'portuguese-brazilian');
			$this->lang->load('stakeholder', 'portuguese-brazilian');

        }

		$this->load->helper('url');
		$this->load->model('Activity_model');
		$this->load->model('ProjectCalendars_model');
		$this->load->model('view_model');
		$this->load->model('log_model');
		$this->load->helper('log_activity');


		$this->lang->load('btn', 'english');
		// $this->lang->load('btn','portuguese-brazilian');
		
		$this->load->model('Stakeholder_model');
		

		// $this->lang->load('manage-cost','portuguese-brazilian');

	}


	public function new()
    {
		
        $idusuario = $_SESSION['user_id'];
        $this->db->where('user_id', $idusuario);
        $this->db->where('project_id', $_SESSION['project_id']);
        $project['dados'] = $this->db->get('project_user')->result();


        if (count($project['dados']) > 0) {
			$dado['activities'] = $this->Activity_model->getAll($_SESSION['project_id']);
			$dado['stakeholders'] = $this->Stakeholder_model->getAll($_SESSION['project_id']);
            $this->load->view('frame/header_view');
            $this->load->view('frame/topbar');
            $this->load->view('frame/sidebar_nav_view');
            $this->load->view('project/schedule/resource_calendar/new', $dado);
        } else {
            redirect(base_url());
        }
    }
	
	//RESOURCE CALENDAR
	public function list($project_id)
	{
		if (strcmp($_SESSION['language'], "US") == 0) {
			$this->lang->load('btn', 'english');
		} else {
			$this->lang->load('btn', 'portuguese-brazilian');
		}
		$dado['project_id'] = $project_id;
		$dado['calendars'] = $this->ProjectCalendars_model->getAll($project_id);
		$this->load->view('frame/header_view'); 
		$this->load->view('frame/topbar');
		$this->load->view('frame/sidebar_nav_view');
		$this->load->view('project/schedule/resource_calendar/list', $dado);
	}

	public function edit($id)
	{
		if (strcmp($_SESSION['language'], "US") == 0) {
			$this->lang->load('btn', 'english');
		} else {
			$this->lang->load('btn', 'portuguese-brazilian');
		}
		
		$query['activities'] = $this->Activity_model->getAll($_SESSION['project_id']);
		$query['stakeholders'] = $this->Stakeholder_model->getAll($_SESSION['project_id']);
		$query['calendar'] = $this->ProjectCalendars_model->get($id);

		$this->load->view('frame/header_view.php');
		$this->load->view('frame/topbar');
		$this->load->view('frame/sidebar_nav_view.php');
		$this->load->view('project/schedule/resource_calendar/edit', $query);
	}

	public function insert()
	{
		$activity['activity_id'] = $this->input->post('activity_id');
		$activity['stakeholder_id'] = $this->input->post('stakeholder_id');
		$activity['function'] = $this->input->post('function');
		$activity['availability_start'] = $this->input->post('availability_start');
		$activity['availability_ends'] = $this->input->post('availability_ends');
		$activity['allocation_start'] = $this->input->post('allocation_start');
		$activity['allocation_ends'] = $this->input->post('allocation_ends');
		$activity['project_id'] = $_SESSION['project_id'];
		

		$query = $this->ProjectCalendars_model->insert($activity);

		if ($query) {
			insertLogActivity('create', 'project calendars');
			$this->session->set_flashdata('success', 'Project Calendars has been successfully created!');
			redirect('schedule/project-calendars/list/' . $_SESSION['project_id']);
		}
	}

	public function update($id)
	{
		$activity['activity_id'] = $this->input->post('activity_id');
		$activity['stakeholder_id'] = $this->input->post('stakeholder_id');
		$activity['function'] = $this->input->post('function');
		$activity['availability_start'] = $this->input->post('availability_start');
		$activity['availability_ends'] = $this->input->post('availability_ends');
		$activity['allocation_start'] = $this->input->post('allocation_start');
		$activity['allocation_ends'] = $this->input->post('allocation_ends');

		$query = $this->ProjectCalendars_model->update($activity, $id);

		if ($query) {
			insertLogActivity('update', 'project calendars');
			$this->session->set_flashdata('success', 'Project Calendars has been successfully changed!');
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
