<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ProjectScheduleNetworkDiagram extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		if (!$this->session->userdata('logged_in')) {
			redirect(base_url());
		}
		$this->load->helper('url');
		$this->load->model('ScheduleNetwork_model');
		$this->load->model('Activity_model');
		$this->load->model('view_model');
		$this->load->model('log_model');
		$this->load->helper('log_activity');


		$this->lang->load('btn', 'english');
		// $this->lang->load('btn','portuguese-brazilian');
		$this->lang->load('schedule_net_lang', 'english');

		// $this->lang->load('manage-cost','portuguese-brazilian');

	}


	//SCHEDULE NETWORK
	public function list($project_id)
	{
		$dado['schedule_network'] = $this->ScheduleNetwork_model->getAll($project_id);
		$this->load->view('frame/header_view');
		$this->load->view('frame/topbar');
		$this->load->view('frame/sidebar_nav_view');
		$this->load->view('project/schedule/schedule_network/list', $dado);
	}

	public function edit($project_id)
	{
		$query['activity'] = $this->Activity_model->getAll($project_id);
		$query['schedule_network'] = $this->ScheduleNetwork_model->get($project_id);

		$this->load->view('frame/header_view.php');
		$this->load->view('frame/topbar');
		$this->load->view('frame/sidebar_nav_view.php');
		$this->load->view('project/schedule/schedule_network/edit', $query);
	}

	public function new()
	{
		$query['activity'] = $this->Activity_model->getAll($_SESSION['project_id']);
		$query['schedule_network'] = $this->ScheduleNetwork_model->get($_SESSION['project_id']);

		$this->load->view('frame/header_view.php');
		$this->load->view('frame/topbar');
		$this->load->view('frame/sidebar_nav_view.php');
		$this->load->view('project/schedule/schedule_network/new', $query);
	}

	public function update($id)
	{
		$snd['predecessor_activity_id'] = $this->input->post('predecessor_activity_id');
		$snd['activity_id'] = $this->input->post('activity_id');
		$snd['lead_lag'] = $this->input->post('dependence_type');
		$snd['project_id'] = $this->input->post('project_id');

		$query = $this->ScheduleNetwork_model->update($snd, $id);

		if ($query) {
			insertLogActivity('update', 'project schedule network diagram');
			$this->session->set_flashdata('success', 'Project Schedule Network Diagram has been successfully changed!');
			redirect('schedule/project-schedule-network-diagram/list/' . $_SESSION['project_id']);
		}
	}

	public function insert()
	{
		$snd['predecessor_activity_id'] = $this->input->post('predecessor_activity_id');
		$snd['activity_id'] = $this->input->post('activity_id');
		$snd['lead_lag'] = $this->input->post('dependence_type');
		$snd['project_id'] = $_SESSION['project_id'];

		$query = $this->ScheduleNetwork_model->insert($snd);

		if ($query) {
			insertLogActivity('insert', 'project schedule network diagram');
			$this->session->set_flashdata('success', 'Project Schedule Network Diagram has been successfully created!');
			redirect('schedule/project-schedule-network-diagram/list/' . $_SESSION['project_id']);
		}
	}
}
