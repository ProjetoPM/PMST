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

	//AGREGATE VALUE
	public function list($project_id)
	{
		if (strcmp($_SESSION['language'], "US") == 0) {
			$this->lang->load('btn', 'english');
		} else {
			$this->lang->load('btn', 'portuguese-brazilian');
		}
		$data['activities'] = $this->Activity_model->getAllPerProject($project_id);


		// Cálculo BAC para próxima implementação
		// $data['activities']['bac'] += $ac->planned_value;


		$data['project_id'] = $project_id;
		$this->load->view('frame/header_view');
		$this->load->view('frame/topbar');
		$this->load->view('frame/sidebar_nav_view');
		$this->load->view('project/schedule/agregate_value/list', $data);
	}

	public function edit($id)
	{
		$query['activities'] = $this->Activity_model->getAll($_SESSION['project_id']);
		$query['activity'] = $this->Activity_model->get($id);

		$query['activity']['cv'] = $query['activity']['agregate_value'] - $query['activity']['real_agregate_cost'];

		$planned_value_equals_zero = $query['activity']['planned_value'] == 0;
		$real_agregate_cost = $query['activity']['real_agregate_cost'] == 0;

		if($planned_value_equals_zero || $real_agregate_cost){
			$query['activity']['spi'] = 0;
			$query['activity']['cpi'] = 0;
		}else{
			$query['activity']['spi'] =  $query['activity']['agregate_value'] / $query['activity']['planned_value'];
			$query['activity']['cpi'] =  $query['activity']['agregate_value'] / $query['activity']['real_agregate_cost'];
		}

		$this->load->view('frame/header_view.php');
		$this->load->view('frame/topbar');
		$this->load->view('frame/sidebar_nav_view.php');
		$this->load->view('project/schedule/agregate_value/edit', $query);
	}

	public function update($project_id)
	{
		if(strcmp($_SESSION['language'],"US") == 0){
			$feedback_success = 'Item Updated';
        }else{
			$feedback_success = 'Item Atualizado ';
		}

		$activity['agregate_value'] = $this->input->post('agregate_value');
		$activity['planned_value'] = $this->input->post('planned_value');
		$activity['real_agregate_cost'] = $this->input->post('real_agregate_cost');

		$activity['project_id'] = $_SESSION['project_id'];

		$data['activity'] = $activity;
		$query = $this->Activity_model->update($data['activity'], $project_id);

		if ($query) {
			insertLogActivity('update', 'earned value management');
			$this->session->set_flashdata('success', $feedback_success);
			redirect('schedule/earned-value-management/list/' . $_SESSION['project_id']);
		}
	}
}
