<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ActivityList extends CI_Controller
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
		$this->lang->load('activity', 'english');

		// $this->lang->load('manage-cost','portuguese-brazilian');

	}

	public function new($project_id)
	{
		$idusuario = $_SESSION['user_id'];
		$this->db->where('user_id', $idusuario);
		$this->db->where('project_id', $project_id);
		$project['dados'] = $this->db->get('project_user')->result();

		if (count($project['dados']) > 0) {
			$dado['project_id'] = $project_id;
			$this->load->view('frame/header_view');
			$this->load->view('frame/topbar');
			$this->load->view('frame/sidebar_nav_view');
			$this->load->view('project/schedule/activity_list/new', $dado);
		} else {
			redirect(base_url());
		}
	}

	public function delete($id)
	{
		$project_id['project_id'] = $this->input->post('project_id');
		$query = $this->Activity_model->delete($id);
		if ($query) {
			insertLogActivity('delete', 'activity list');
			redirect('schedule/activity-list/list/' . $_SESSION['project_id']);
		}
	}

	public function list($project_id)
	{
		$dado['project_id'] = $project_id;
		$dado['activity'] = $this->Activity_model->getAll($project_id);
		$this->load->view('frame/header_view');
		$this->load->view('frame/topbar');
		$this->load->view('frame/sidebar_nav_view');
		$this->load->view('project/schedule/activity_list/list', $dado);
	}


	public function edit($project_id)
	{
		$query['activity'] = $this->Activity_model->get($project_id);
		$this->load->view('frame/header_view.php');
		$this->load->view('frame/topbar');
		$this->load->view('frame/sidebar_nav_view');
		$this->load->view('project/schedule/activity_list/edit', $query);
	}



	public function update($project_id)
	{
		$activity['associated_id'] = $this->input->post('associated_id');
		$activity['project_phase'] = $this->input->post('project_phase');
		$activity['milestone'] = $this->input->post('milestone');
		$activity['activity_name'] = $this->input->post('activity_name');

		$activity['project_id'] = $this->input->post('project_id');

		$data['activity'] = $activity;
		$query = $this->Activity_model->update($data['activity'], $project_id);

		if ($query) {
			insertLogActivity('update', 'activity list');
			redirect('schedule/activity-list/list/' . $activity['project_id']);
		}
	}

	public function insert($project_id)
	{
		$activity['associated_id'] = $this->input->post('associated_id');
		$activity['project_phase'] = $this->input->post('project_phase');
		$activity['milestone'] = $this->input->post('milestone');
		$activity['activity_name'] = $this->input->post('activity_name');

		$activity['project_id'] = $this->input->post('project_id');

		$query = $this->Activity_model->insert($activity);

		if ($query) {
			insertLogActivity('insert', 'activity list');
			redirect('schedule/activity-list/list/' . $activity['project_id']);
		}
	}

}
