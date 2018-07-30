<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Stakeholders extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('Stakeholders_model');
	}


	public function index(){
		$this->load->view('addNewStakeholder.php');
	}

	public function addStakeholder(){
		$stk['name'] = $this->input->post('name');
		$stk['roles_responsabilies'] = $this->input->post('roles_responsabilies');
		$stk['status'] = $this->input->post('status');

		$query = $this->Stakeholders_model->insertStakeholder($stk);

		if ($query) {
			header('location:'.base_url().$this->index());
		}
	}

	public function addNStakeholders(){
		$this->load->view('addNewStakeholder.php');
	}


//wireframe I
	public function addProject(){
		$dados = ['option_names' => $this->Stakeholders_model->selectStk()];		
		$this->load->view('addProject.php', $dados);
	}

	public function insertProject(){
		$stake['stakelholder_id'] = $this->input->post('name');
		$stake['interest'] = $this->input->post('interest');
		$stake['power'] = $this->input->post('power');
		$stake['influence'] = $this->input->post('influence');
		$stake['impact'] = $this->input->post('impact');
		$stake['average'] = $this->input->post('average');
		$stake['expectedengagement'] = $this->input->post('expectedengagement');
		$stake['currentengagement'] = $this->input->post('currentengagement');
		$stake['strategy'] = $this->input->post('strategy');
		$stake['scope'] = $this->input->post('scope');
		$stake['observation'] = $this->input->post('observation');
		//$stk['project_id'] = $this->input->post('project_id');
		$stk['status'] = $this->input->post('status');

		$query = $this->Stakeholders_model->insertStk($stake);

		if($query){
			header('location:'.base_url().$this->index());
		}

	}

	public function selectStkController(){
		$dados = ['option_names' => $this->Stakeholders_model->selectStk()];

	}


//wireframe II
	public function projectList(){
		$list['stakeholder_mp'] = $this->Stakeholders_model->getProjects();
		$this->load->view('projectList.php', $list);
	}


}


?>