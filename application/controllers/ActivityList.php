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
		$this->load->helper('log_activity');
		
		$this->load->model('log_model');
		$this->load->model('view_model');
		$this->load->model('Project_model');
		$this->load->model('Activity_model');
		
		$array = array();
		
		array_push($array, 'activity');
		loadLangs($array);		
		
		$userInProject = $this->Project_model->userInProject($_SESSION['user_id'], $_SESSION['project_id']);
		
		if ($userInProject) {
			$this->session->set_flashdata('error3', 'You have no access to this project');
			redirect('projects/' . $_SESSION['project_id']);
		}

	}

	public function new($project_id)
	{
		if (strcmp($_SESSION['language'], "US") === 0) $this->lang->load('btn', 'english');
		else $this->lang->load('btn', 'portuguese-brazilian');

		$idusuario = $_SESSION['user_id'];
		$this->db->where('user_id', $idusuario);
		$this->db->where('project_id', $project_id);
		$project['dados'] = $this->db->get('project_user')->result();

		if (count($project['dados']) > 0) {
			$dado['milestone'] = $this->Activity_model->getAllMilestone($project_id);
			$dado['phase'] = $this->Activity_model->getAllPhase($project_id);
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

	public function deleteMilestone($id)
	{

		$query = $this->Activity_model->deleteMilestone($id);
		if ($query) {
			insertLogActivity('delete', 'milestone');
			redirect('schedule/activity-list/list/' . $_SESSION['project_id']);
		}
	}

	public function deletePhase($id)
	{
		$query = $this->Activity_model->deletePhase($id);
		if ($query) {
			insertLogActivity('delete', 'project phase');
			redirect('schedule/activity-list/list/' . $_SESSION['project_id']);
		}
	}

	public function list($project_id)
	{
		if (strcmp($_SESSION['language'], "US") == 0) {
			$this->lang->load('btn', 'english');
		} else {
			$this->lang->load('btn', 'portuguese-brazilian');
		}
		$dado['project_id'] = $project_id;
		$dado['activity'] = $this->Activity_model->getAll($project_id);
		$dado['milestone'] = $this->Activity_model->getAllMilestone($project_id);
		$dado['phase'] = $this->Activity_model->getAllPhase($project_id);

		$this->load->view('frame/header_view');
		$this->load->view('frame/topbar');
		$this->load->view('frame/sidebar_nav_view');
		$this->load->view('project/schedule/activity_list/list', $dado);
	}

	public function edit($project_id)
	{
		if (strcmp($_SESSION['language'], "US") === 0) $this->lang->load('btn', 'english');
		else $this->lang->load('btn', 'portuguese-brazilian');
		
		$query['activity'] = $this->Activity_model->get($project_id);
		$query['milestone_list'] = $this->Activity_model->getAllMilestone($this->input->post('project_id'));
		$query['phase_list'] = $this->Activity_model->getAllPhase($this->input->post('project_id'));
		$this->load->view('frame/header_view.php');
		$this->load->view('frame/topbar');
		$this->load->view('frame/sidebar_nav_view');
		$this->load->view('project/schedule/activity_list/edit', $query);
	}

	public function update($project_id)
	{
		if (strcmp($_SESSION['language'], "US") == 0) {
			$feedback_success = 'Item Updated';
		} else {
			$feedback_success = 'Item Atualizado ';
		}
		$activity['associated_id'] = $this->input->post('associated_id');
		$activity['project_phase'] = $this->input->post('project_phase');
		$activity['milestone'] = $this->input->post('milestone');
		$activity['activity_name'] = $this->input->post('activity_name');
		$activity['wbs_id'] = $this->input->post('wbs_id');
		$activity['description'] = $this->input->post('description');

		$activity['project_id'] = $this->input->post('project_id');

		$data['activity'] = $activity;
		$query = $this->Activity_model->update($data['activity'], $project_id);

		if ($query) {
			insertLogActivity('update', 'activity list');
			$this->session->set_flashdata('success', $feedback_success);
			redirect('schedule/activity-list/list/' . $activity['project_id']);
		}
	}

	public function insert($project_id)
	{
		if (strcmp($_SESSION['language'], "US") === 0) $feedback_success = 'Item created ';
		else $feedback_success = 'Item criado ';

		$activity['associated_id'] = $this->input->post('associated_id');
		$activity['project_phase'] = $this->input->post('project_phase');
		$activity['milestone'] = $this->input->post('milestone');
		$activity['activity_name'] = $this->input->post('activity_name');
		$activity['wbs_id'] = $this->input->post('wbs_id');
		$activity['description'] = $this->input->post('description');
		$activity['project_id'] = $this->input->post('project_id');

		$query = $this->Activity_model->insert($activity);

		if ($query) {
			insertLogActivity('insert', 'activity list');
			$this->session->set_flashdata('success', $feedback_success);
			redirect('schedule/activity-list/list/' . $activity['project_id']);
		}
	}

	public function insertMilestone()
	{
		if (strcmp($_SESSION['language'], "US") == 0) {
			$feedback_success = 'Milestone Created';
		} else {
			$feedback_success = 'Marco-alvo Criado ';
		}

		$activity['milestone'] = $this->input->post('milestone');
		$activity['project_id'] = $_SESSION['project_id'];

		$query = $this->Activity_model->insertMilestone($activity);

		if ($query) {
			insertLogActivity('insert', 'milestone');
			$this->session->set_flashdata('success', $feedback_success);
			redirect('schedule/activity-list/list/' . $activity['project_id']);
		}
	}

	public function insertPhase()
	{
		if (strcmp($_SESSION['language'], "US") == 0) {
			$feedback_success = 'Project Phase Created';
		} else {
			$feedback_success = 'Fase do Projeto Criada';
		}

		$activity['project_phase'] = $this->input->post('project_phase');
		$activity['project_id'] = $_SESSION['project_id'];

		$query = $this->Activity_model->insertPhase($activity);

		if ($query) {
			insertLogActivity('insert', 'project phase');
			$this->session->set_flashdata('success', $feedback_success);
			redirect('schedule/activity-list/list/' . $activity['project_id']);
		}
	}
}
