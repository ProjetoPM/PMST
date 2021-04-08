<?php
defined('BASEPATH') or exit('No direct script access allowed');

class DurationEstimates extends CI_Controller
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
		$this->lang->load('duration', 'english');

		// $this->lang->load('manage-cost','portuguese-brazilian');

	}

	//DURATION ESTIMATES
	public function list($project_id)
	{
		$dado['project_id'] = $project_id;
		$dado['activity'] = $this->Activity_model->getAll($project_id);
		$this->load->view('frame/header_view');
		$this->load->view('frame/topbar');
		$this->load->view('frame/sidebar_nav_view');
		$this->load->view('project/schedule/duration_estimates/list', $dado);
	}

	public function edit($project_id)
	{
		$query['activity'] = $this->Activity_model->get($project_id);

		$this->load->view('frame/header_view.php');
		$this->load->view('frame/sidebar_nav_view.php');
		$this->load->view('project/schedule/duration_estimates/edit', $query);
	}

	public function update($project_id)
	{
		$activity['estimated_duration'] = $this->input->post('estimated_duration');
		$activity['replanted_duration'] = $this->input->post('replanted_duration');
		$activity['performed_duration'] = $this->input->post('performed_duration');
		$activity['estimated_start_date'] = $this->input->post('estimated_start_date');
		$activity['replanted_start_date'] = $this->input->post('replanted_start_date');
		$activity['performed_start_date'] = $this->input->post('performed_start_date');
		$activity['estimated_end_date'] = $this->input->post('estimated_end_date');
		$activity['replanted_end_date'] = $this->input->post('replanted_end_date');
		$activity['performed_end_date'] = $this->input->post('performed_end_date');

		$activity['project_id'] = $this->input->post('project_id');

		$data['activity'] = $activity;
		$query = $this->Activity_model->update($data['activity'], $project_id);

		if ($query) {
			insertLogActivity('update', 'duration estimates');
			$this->session->set_flashdata('success', 'Duration Estimates has been successfully changed!');
			redirect('schedule/duration-estimates/list/' . $activity['project_id']);
		}
	}
}
