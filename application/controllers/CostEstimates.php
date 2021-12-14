<?php
defined('BASEPATH') or exit('No direct script access allowed');

class CostEstimates extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		if (!$this->session->userdata('logged_in')) {
			redirect(base_url());
		}

		if (strcmp($_SESSION['language'], "US") == 0) {
			$this->lang->load('cost_estimates', 'english');
            $this->lang->load('project-page', 'english');
        } else {
			$this->lang->load('cost_estimates', 'portuguese-brazilian');
            $this->lang->load('project-page', 'portuguese-brazilian');
        }

		$this->load->helper('url');
		$this->load->model('Activity_model');
		$this->load->model('view_model');
		$this->load->model('log_model');
		$this->load->helper('log_activity');



		// $this->lang->load('manage-cost','portuguese-brazilian');

	}


	//COST ESTIMATION
	public function list($project_id)
	{
		if (strcmp($_SESSION['language'], "US") == 0) {
			$this->lang->load('btn', 'english');
		} else {
			$this->lang->load('btn', 'portuguese-brazilian');
		}
		
		$dado['project_id'] = $project_id;
		$dado['activity'] = $this->Activity_model->getAll($project_id);
		$this->load->view('frame/header_view');
		$this->load->view('frame/topbar');
		$this->load->view('frame/sidebar_nav_view');
		$this->load->view('project/schedule/cost_estimation/list', $dado);
	}
	
	public function edit($project_id)
	{
		if (strcmp($_SESSION['language'], "US") == 0) {
			$this->lang->load('btn', 'english');
		} else {
			$this->lang->load('btn', 'portuguese-brazilian');
		}
		
		$query['activity'] = $this->Activity_model->get($project_id);
		
		$this->load->view('frame/header_view.php');
		$this->load->view('frame/topbar');
		$this->load->view('frame/sidebar_nav_view.php');
		$this->load->view('project/schedule/cost_estimation/edit', $query);
	}
	
	public function update($project_id)
	{

		if(strcmp($_SESSION['language'],"US") == 0){
			$feedback_success = 'Item Updated';
        }else{
			$feedback_success = 'Item Atualizado ';
		}

		$activity['estimated_cost'] = $this->input->post('estimated_cost');
		$activity['cumulative_estimated_cost'] = $this->input->post('cumulative_estimated_cost');
		$activity['replanted_cost'] = $this->input->post('replanted_cost');
		$activity['contingency_reserve'] = $this->input->post('contingency_reserve');
		$activity['sum_of_work_packages'] = $this->input->post('sum_of_work_packages');
		$activity['contingency_reserve_of_packages'] = $this->input->post('contingency_reserve_of_packages');
		$activity['baseline'] = $this->input->post('baseline');
		$activity['budget'] = $this->input->post('budget');
		$activity['cumulative_replanted_cost'] = $this->input->post('cumulative_replanted_cost');
		$activity['real_cost'] = $this->input->post('real_cost');
		$activity['cumulative_real_cost'] = $this->input->post('cumulative_real_cost');
		$activity['reserve'] = $this->input->post('reserve');

		$activity['project_id'] = $this->input->post('project_id');

		$data['activity'] = $activity;
		$query = $this->Activity_model->update($data['activity'], $project_id);

		if ($query) {
			insertLogActivity('update', 'cost estimates');
			$this->session->set_flashdata('success', $feedback_success);
			redirect('cost/cost-estimates/list/' . $activity['project_id']);
		}
	}
}
