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
		$dado['project_id'] = $project_id;
		$dado['activity'] = $this->Activity_model->getAll($project_id);
		$this->load->view('frame/header_view');
		$this->load->view('frame/topbar');
		$this->load->view('frame/sidebar_nav_view');
		$this->load->view('project/schedule/schedule_network/list', $dado);
	}

	public function edit($project_id)
	{
		$query['activity'] = $this->Activity_model->get($project_id);

		$this->load->view('frame/header_view.php');
		$this->load->view('frame/sidebar_nav_view.php');
		$this->load->view('project/schedule/schedule_network/edit', $query);
	}

	public function update($project_id)
	{
		$activity['predecessor_activity'] = $this->input->post('predecessor_activity');
		$activity['dependence_type'] = $this->input->post('dependence_type');
		$activity['anticipation'] = $this->input->post('anticipation');
		$activity['wait'] = $this->input->post('wait');

		$activity['project_id'] = $this->input->post('project_id');

		$data['activity'] = $activity;
		$query = $this->Activity_model->update($data['activity'], $project_id);

		if ($query) {
			insertLogActivity('update', 'project schedule network diagram');
			$this->session->set_flashdata('success', 'Project Schedule Network Diagram has been successfully changed!');
			redirect('schedule/project-schedule-network-diagram/list/' . $activity['project_id']);
		}
	}
}
