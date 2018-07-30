<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Stakeholder_mp extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('stakeholder_mp_model');
		$this->load->model('project_model');
		$this->load->model('stakeholder_model');
	}

	public function index(){
		$data['stakeholder_mp'] = $this->stakeholder_mp_model->getAllStakeholder_mps();
		$this->load->view('listStakeholder_mp.php', $data);
	}

	public function view(){
		$data['stakeholder_mp'] = $this->stakeholder_mp_model->getAllStakeholder_mps();
		$this->load->view('listStakeholder_mp.php', $data);
	}

	public function insert(){
		$stakeholder_mp['stakeholder_id'] = $this->input->post('stakeholder_id');
		$stakeholder_mp['interest'] = $this->input->post('interest');
		$stakeholder_mp['power'] = $this->input->post('power');
		$stakeholder_mp['influence'] = $this->input->post('influence');
		$stakeholder_mp['impact'] = $this->input->post('impact');
		$stakeholder_mp['average'] = $this->input->post('average');
		$stakeholder_mp['expectedengagement'] = $this->input->post('expectedengagement');
		$stakeholder_mp['currentengagement'] = $this->input->post('currentengagement');
		$stakeholder_mp['strategy'] = $this->input->post('strategy');
		$stakeholder_mp['scope'] = $this->input->post('scope');
		$stakeholder_mp['observation'] = $this->input->post('observation');
		$stakeholder_mp['project_id'] = $this->input->post('project_id');
		$stakeholder_mp['status'] = $this->input->post('status');
		if($this->input->post('status') == 1){
			$stakeholder_mp['status'] = 1;
		}else{
			$stakeholder_mp['status'] = 0;
		}

		$query = $this->stakeholder_mp_model->insertStakeholder_mp($stakeholder_mp);

		if($query){
			header('location:'.base_url().'index.php/stakeholder_mp/index');
		}
		
	}

	public function add(){
		$projects['projects'] = $this->project_model->getAllProjects();
		$stakeholders['stakeholders'] = $this->stakeholder_model->getAllStakeholders();
		$todos = $projects + $stakeholders;
		$this->load->view('addStakeholder_mp.php', $todos);
	}

	public function edit($id){
		$data['stakeholder_mp'] = $this->stakeholder_mp_model->getStakeholder_mp($id);
		$projects['projects'] = $this->project_model->getAllProjects();
		$stakeholders['stakeholders'] = $this->stakeholder_model->getAllStakeholders();
		$todos = $data + $projects + $stakeholders;
		$this->load->view('updStakeholder_mp', $todos);
	}

	public function update($id){
		$stakeholder_mp['stakeholder_id'] = $this->input->post('stakeholder_id');
		$stakeholder_mp['interest'] = $this->input->post('interest');
		$stakeholder_mp['power'] = $this->input->post('power');
		$stakeholder_mp['influence'] = $this->input->post('influence');
		$stakeholder_mp['impact'] = $this->input->post('impact');
		$stakeholder_mp['average'] = $this->input->post('average');
		$stakeholder_mp['expectedengagement'] = $this->input->post('expectedengagement');
		$stakeholder_mp['currentengagement'] = $this->input->post('currentengagement');
		$stakeholder_mp['strategy'] = $this->input->post('strategy');
		$stakeholder_mp['scope'] = $this->input->post('scope');
		$stakeholder_mp['observation'] = $this->input->post('observation');
		$stakeholder_mp['project_id'] = $this->input->post('project_id');
		$stakeholder_mp['status'] = $this->input->post('status');
		if($this->input->post('status') == 1){
			$stakeholder_mp['status'] = 1;
		}else{
			$stakeholder_mp['status'] = 0;
		}
		
		$query = $this->stakeholder_mp_model->updatestakeholder_mp($stakeholder_mp, $id);

		if($query){
			header('location:'.base_url().'index.php/stakeholder_mp/index');
		}
	}

	public function delete($id){
		$query = $this->stakeholder_mp_model->deletestakeholder_mp($id);

		if($query){
			header('location:'.base_url().'index.php/stakeholder_mp/index');
		}
	}
}
?>