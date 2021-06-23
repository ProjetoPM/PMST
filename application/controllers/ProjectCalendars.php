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
		$this->load->helper('url');
		$this->load->model('Activity_model');
		$this->load->model('view_model');
		$this->load->model('log_model');
		$this->load->helper('log_activity');


		$this->lang->load('btn', 'english');
		// $this->lang->load('btn','portuguese-brazilian');
		$this->lang->load('calendars', 'english');

		// $this->lang->load('manage-cost','portuguese-brazilian');

	}

	
	//RESOURCE CALENDAR
	public function list($project_id)
	{
		$dado['project_id'] = $project_id;
		$dado['activity'] = $this->Activity_model->getAll($project_id);
		$this->load->view('frame/header_view'); 
		$this->load->view('frame/topbar');
		$this->load->view('frame/sidebar_nav_view');
		$this->load->view('project/schedule/resource_calendar/list', $dado);
	}

	public function edit($project_id)
	{
		$query['activity'] = $this->Activity_model->get($project_id);

		$this->load->view('frame/header_view.php');
		$this->load->view('frame/sidebar_nav_view.php');
		$this->load->view('project/schedule/resource_calendar/edit', $query);
	}

	public function update($project_id)
	{
		$activity['resource_name'] = $this->input->post('resource_name');
		$activity['function'] = $this->input->post('function');
		$activity['availability_start'] = $this->input->post('availability_start');
		$activity['availability_ends'] = $this->input->post('availability_ends');
		$activity['allocation_start'] = $this->input->post('allocation_start');
		$activity['allocation_ends'] = $this->input->post('allocation_ends');

		$activity['project_id'] = $this->input->post('project_id');

		$data['activity'] = $activity;
		$query = $this->Activity_model->update($data['activity'], $project_id);

		if ($query) {
			insertLogActivity('update', 'project calendars');
			$this->session->set_flashdata('success', 'Project Calendars has been successfully changed!');
			redirect('schedule/project-calendars/list/' . $activity['project_id']);
		}
	}

	
}
