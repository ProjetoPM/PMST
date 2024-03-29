<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ScheduleNetworkDiagram extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		if (!$this->session->userdata('logged_in')) {
			redirect(base_url());
		}

		$this->load->model('log_model');
		$this->load->model('view_model');
		$this->load->model('Project_model');
		$this->load->model('Activity_model');
		$this->load->model('ScheduleNetwork_model');

		$userInProject = $this->Project_model->userInProject($_SESSION['user_id'], $_SESSION['project_id']);

		if ($userInProject) {
			$this->session->set_flashdata('error3', 'You have no access to this project');
			redirect('projects/' . $_SESSION['project_id']);
		}

		$langs = array();
		array_push($langs, 'schedule_net');

		loadLangs($langs);

		$this->load->helper('url');
		$this->load->helper('log_activity');
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

	public function edit($id)
	{
		$query['activity'] = $this->Activity_model->getAll($_SESSION['project_id']);
		$query['schedule_network'] = $this->ScheduleNetwork_model->get($id);

		$this->load->view('frame/header_view.php');
		$this->load->view('frame/topbar');
		$this->load->view('frame/sidebar_nav_view.php');
		$this->load->view('project/schedule/schedule_network/edit', $query);
	}

	public function new($id)
	{
		$data['activity'] = $this->Activity_model->getAll($id);
		$data['id'] = $id;


		$this->load->view('frame/header_view.php');
		$this->load->view('frame/topbar');
		$this->load->view('frame/sidebar_nav_view.php');
		$this->load->view('project/schedule/schedule_network/new', $data);
	}

	public function update($schedule_network_id)
	{
		if (strcmp($_SESSION['language'], "US") == 0) {
			$feedback_success = 'Item Updated';
		} else {
			$feedback_success = 'Item Atualizado ';
		}

		$first_or_last_activity = $this->input->post('first_or_last');
		if(strcmp($first_or_last_activity, "on") === 0 ){
			unset($snd['predecessor_activity_id']);
		}

		$snd['activity_id'] = $this->input->post('activity_id');
		$sn['predecessor_activity'] = $this->input->post('predecessor_activity');
		$sn['dependence_type'] = $this->input->post('dependence_type');
		$sn['anticipation'] = $this->input->post('anticipation');
		$sn['wait'] = $this->input->post('wait');

		if (strcmp($sn['activity_id'], $sn['predecessor_activity']) == 0 && $first_or_last_activity == null) {
			$this->session->set_flashdata('error', 'An activity cannot be a predecessor of itself!');
			redirect('schedule/project-schedule-network-diagram/list/' . $_SESSION['project_id']);
		}

		$sn['project_id'] = $this->input->post('project_id');

		$data['schedule_network'] = $sn;
		$query = $this->ScheduleNetwork_model->update($data['schedule_network'], $schedule_network_id);

		if ($query) {
			insertLogActivity('update', 'project schedule network diagram');
			$this->session->set_flashdata('success', $feedback_success);
			redirect('schedule/project-schedule-network-diagram/list/' . $_SESSION['project_id']);
		}
	}

	public function insert()
	{

		$first_or_last_activity = $this->input->post('first_or_last');
		$snd['predecessor_activity_id'] = $this->input->post('predecessor_activity_id');
		$snd['activity_id'] = $this->input->post('activity_id');


		if(strcmp($first_or_last_activity, "on") === 0){
			unset($snd['predecessor_activity_id']);
		}
		if (strcmp($snd['activity_id'], $snd['predecessor_activity_id']) == 0  && $first_or_last_activity == null) {
			$this->session->set_flashdata('error', 'An activity cannot be a predecessor of itself!');
			redirect('schedule/project-schedule-network-diagram/new');
		} else {
			$snd['lead_lag'] = $this->input->post('lead_lag');
			$snd['dependence_type'] = $this->input->post('dependence_type');
			$snd['project_id'] = $_SESSION['project_id'];

			$query = $this->ScheduleNetwork_model->insert($snd);

			if ($query) {
				insertLogActivity('insert', 'project schedule network diagram');
				$this->session->set_flashdata('success', 'Project Schedule Network Diagram has been successfully created!');
				redirect('schedule/project-schedule-network-diagram/list/' . $_SESSION['project_id']);
			}
		}
	}

	public function delete($id)
	{
		$query = $this->ScheduleNetwork_model->delete($id);
		if ($query) {
			insertLogActivity('delete', 'project schedule network diagram');
			$this->session->set_flashdata('delete', 'Item deleted successfully!');
			// redirect('schedule/project-schedule-network-diagram/list/' . $_SESSION['project_id']);
		}
	}
}
