<?php
defined('BASEPATH') or exit('No direct script access allowed');

class EVM extends CI_Controller
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
		$this->load->model('EVM_model');
		$this->load->model('view_model');
		$this->load->model('Project_model');
		$this->load->model('Activity_model');

		$array = array();
		array_push($array, 'earned_value', 'change_log');
		loadLangs($array);

		$userInProject = $this->Project_model->userInProject($_SESSION['user_id'], $_SESSION['project_id']);

		if ($userInProject) {
			$this->session->set_flashdata('error3', 'You have no access to this project');
			redirect('projects/' . $_SESSION['project_id']);
		}
	}

	// function metricCalculus($index1, inde)

	//AGREGATE VALUE
	public function list($project_id)
	{
		if (strcmp($_SESSION['language'], "US") == 0) {
			$this->lang->load('btn', 'english');
		} else {
			$this->lang->load('btn', 'portuguese-brazilian');
		}

		$data['project_id'] = $project_id;
		$data['activities'] = $this->Activity_model->getAllPerProject($project_id);
		$data['activities']['bac'] = 0;

		// print_r($data['activities']);
		foreach ($data['activities'] as $ac => $value) {

			// var_dump($ac->agregate_value); 

			// print_r($value);
			// var_dump($ac->agregate_value);
			// $ac->cv = $ac->agregate_value - $ac->real_agregate_cost;
			// $ac->planned_value == 0 ? $ac->spi = 0 : $ac->spi = $ac->agregate_value / $ac->planned_value; 
			// $ac->planned_value == 0 ? $ac->cpi = 0 : $ac->cpi = $ac->agregate_value / $ac->real_agregate_cost; 
			// $data['activities']['bac'] += $ac->planned_value;
		}

		exit();

		$this->load->view('frame/header_view');
		$this->load->view('frame/topbar');
		$this->load->view('frame/sidebar_nav_view');
		$this->load->view('project/schedule/earned_value_management/list', $data);
	}


	public function new($activity_id)
	{
		$data['activities'] = $this->Activity_model->getAll($_SESSION['project_id']);
		$data['activity'] = $this->Activity_model->get($activity_id);
		$data['id'] = $activity_id;

		if (!(empty($data['activity']['real_agregate_cost']) &&
			empty($data['activity']['agregate_value']) &&
			empty($data['activity']['planned_value']))) {
			redirect("schedule/earned-value-management/edit/$activity_id");
		}

		$this->load->view('frame/header_view.php');
		$this->load->view('frame/topbar');
		$this->load->view('frame/sidebar_nav_view.php');
		$this->load->view('project/schedule/earned_value_management/new', $data);
	}

	public function edit($activity_id)
	{
		$query['activities'] = $this->Activity_model->getAll($_SESSION['project_id']);
		$query['activity'] = $this->Activity_model->get($activity_id);
		$query['activity']['sv'] = $query['activity']['agregate_value'] - $query['activity']['planned_value'];
		$query['activity']['cv'] = $query['activity']['agregate_value'] - $query['activity']['real_agregate_cost'];
		$query['activity']['spi'] = $query['activity']['agregate_value'] / $query['activity']['planned_value'];
		$query['activity']['cpi'] = $query['activity']['agregate_value'] / $query['activity']['real_agregate_cost'];
		$query['activity']['bac'] = 0;

		foreach ($query['activities'] as $ac) {
			$query['activity']['bac'] += $ac->planned_value;
		}



		$this->load->view('frame/header_view.php');
		$this->load->view('frame/topbar');
		$this->load->view('frame/sidebar_nav_view.php');
		$this->load->view('project/schedule/earned_value_management/edit', $query);
	}

	public function update($activity_id)
	{
		if (strcmp($_SESSION['language'], "US") == 0) {
			$feedback_success = 'Item Updated';
		} else {
			$feedback_success = 'Item Atualizado ';
		}

		$activity['agregate_value'] = $this->input->post('agregate_value');
		$activity['planned_value'] = $this->input->post('planned_value');
		$activity['real_agregate_cost'] = $this->input->post('real_agregate_cost');


		$data['activity'] = $activity;
		$query = $this->Activity_model->update($data['activity'], $activity_id);

		if ($query) {
			insertLogActivity('update', 'earned value management');
			$this->session->set_flashdata('success', $feedback_success);
			// redirect('schedule/earned-value-management/list/' . $_SESSION['project_id']);
		}
	}
}
