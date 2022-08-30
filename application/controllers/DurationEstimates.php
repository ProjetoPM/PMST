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
		$this->load->helper('log_activity');

		$this->load->model('log_model');
		$this->load->model('view_model');
		$this->load->model('Activity_model');
		$this->load->model('Project_model');
		$this->load->model('DurationEstimates_model');
		
		if (strcmp($_SESSION['language'], "US") == 0) {
			$this->lang->load('duration', 'english');

            $this->lang->load('project-page', 'english');
        } else {
			$this->lang->load('duration', 'portuguese-brazilian');
            $this->lang->load('project-page', 'portuguese-brazilian');
        }

		$array = array();
		array_push($array, 'duration');
		loadLangs($array);

		$userInProject = $this->Project_model->userInProject($_SESSION['user_id'], $_SESSION['project_id']);
		
		if ($userInProject) {
			$this->session->set_flashdata('error3', 'You have no access to this project');
			redirect('projects/' . $_SESSION['project_id']);
		}

		// $this->lang->load('btn','portuguese-brazilian');
		// $this->lang->load('manage-cost','portuguese-brazilian');

	}

	//DURATION ESTIMATES
	public function list($project_id)
	{
		if (strcmp($_SESSION['language'], "US") == 0) {
			$this->lang->load('btn', 'english');
		} else {
			$this->lang->load('btn', 'portuguese-brazilian');
		}

		$dado['project_id'] = $project_id;
		$dado['duration_estimates'] = $this->DurationEstimates_model->getAll($project_id);
		$this->load->view('frame/header_view');
		$this->load->view('frame/topbar');
		$this->load->view('frame/sidebar_nav_view');
		$this->load->view('project/schedule/duration_estimates/list', $dado);
	}

	public function edit($project_id)
	{
		if (strcmp($_SESSION['language'], "US") == 0) {
			$this->lang->load('btn', 'english');
		} else {
			$this->lang->load('btn', 'portuguese-brazilian');
		}

		$query['duration_estimates'] = $this->DurationEstimates_model->get($project_id);

		$this->load->view('frame/header_view.php');
		$this->load->view('frame/topbar');
		$this->load->view('frame/sidebar_nav_view.php');
		$this->load->view('project/schedule/duration_estimates/edit', $query);
	}

	public function read($project_id)
	{
		$query['duration_estimates'] = $this->DurationEstimates_model->get($project_id);

		$this->load->view('frame/header_view.php');
		$this->load->view('frame/topbar');
		$this->load->view('frame/sidebar_nav_view.php');
		$this->load->view('project/schedule/duration_estimates/read', $query);
	}

	public function update($id)
	{

		if(strcmp($_SESSION['language'],"US") == 0){
			$feedback_success = 'Item Updated';
        }else{
			$feedback_success = 'Item Atualizado ';
		}

		$duration_estimates['estimated_duration'] = $this->input->post('estimated_duration');
		$duration_estimates['performed_duration'] = $this->input->post('performed_duration');
		$duration_estimates['estimated_start_date'] = $this->input->post('estimated_start_date');
		$duration_estimates['performed_start_date'] = $this->input->post('performed_start_date');
		$duration_estimates['estimated_end_date'] = $this->input->post('estimated_end_date');
		$duration_estimates['performed_end_date'] = $this->input->post('performed_end_date');
		// $duration_estimates['project_id'] = $this->input->post('project_id');
		$duration_estimates['status'] = 1;


		// $duration_estimates['status'] = $this->input->post('status');

		$status = $this->DurationEstimates_model->get($id);
		if ($status['performed_duration'] != null) {
			if ($duration_estimates['estimated_duration'] != $status['estimated_duration']) {
				$duration_estimates['version'] = $status['version'] + 1;
				$status['duration_estimates_id'] = "";
				$status['status'] = "0";
				$this->DurationEstimates_model->insert($status);
			}
		}
		$data['duration_estimates'] = $duration_estimates;
		$query = $this->DurationEstimates_model->update($data['duration_estimates'], $id);

		if ($query) {
			insertLogActivity('update', 'duration estimates');
			$this->session->set_flashdata('success', $feedback_success);
			redirect('schedule/duration-estimates/list/' . $_SESSION['project_id']);
		}
	}

	public function insert()
	{

		if(strcmp($_SESSION['language'],"US") == 0){
			$feedback_success = 'Item Created';
        }else{
			$feedback_success = 'Item Criado ';
		}

		$duration_estimates['estimated_duration'] = $this->input->post('estimated_duration');
		$duration_estimates['performed_duration'] = $this->input->post('performed_duration');
		$duration_estimates['estimated_start_date'] = $this->input->post('estimated_start_date');
		$duration_estimates['performed_start_date'] = $this->input->post('performed_start_date');
		$duration_estimates['estimated_end_date'] = $this->input->post('estimated_end_date');
		$duration_estimates['performed_end_date'] = $this->input->post('performed_end_date');
		$duration_estimates['project_id'] = $this->input->post('project_id');
		$duration_estimates['activity_id'] = $this->input->post('activity_id');
		$duration_estimates['status'] = 1;
		$duration_estimates['version'] = 1;
		

		$data['duration_estimates'] = $duration_estimates;
		$query = $this->DurationEstimates_model->insert($data['duration_estimates']);

		if ($query) {
			insertLogActivity('create', 'duration estimates');
			$this->session->set_flashdata('success', $feedback_success);
			redirect('schedule/duration-estimates/list/' . $_SESSION['project_id']);
		}
	}

	public function new($project_id)
	{
		if (strcmp($_SESSION['language'], "US") == 0) {
			$this->lang->load('btn', 'english');
		} else {
			$this->lang->load('btn', 'portuguese-brazilian');
		}
		
		$idusuario = $_SESSION['user_id'];
		$this->db->where('user_id', $idusuario);
		$this->db->where('project_id', $project_id);
		$project['dados'] = $this->db->get('project_user')->result();

		if (count($project['dados']) > 0) {
			$dado['activity'] = $this->Activity_model->getAll($project_id);
			$dado['project_id'] = $project_id;
			$this->load->view('frame/header_view');
			$this->load->view('frame/topbar');
			$this->load->view('frame/sidebar_nav_view');
			$this->load->view('project/schedule/duration_estimates/new', $dado);
		} else {
			redirect(base_url());
		}
	}

	public function delete($activity_id)
    {
        $query = $this->DurationEstimates_model->delete($activity_id);
        if ($query) {
            insertLogActivity('delete', 'Project Calendars');
			$this->session->set_flashdata('delete', 'Item deleted successfully!');
            // redirect('schedule/project-schedule-network-diagram/list/' . $_SESSION['project_id']);
        }
    }

}
