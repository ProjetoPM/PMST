<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Project extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('project_model');
		$this->load->model('stakeholder_model'); 
	}

	public function index()
	{
		$dados['project'] = $this->project_model->pegarProjetos();
		$dados['stakeholder'] = $this->stakeholder_model->pegarStakeholders();
		$this->load->view('project', $dados);
	}

	
	public function addproject() {
		$this->load->view('addproject_page');
	}

	public function createProject() {
		$dados['title'] = $this->input->post('projectTitle');
		$dados['description'] = $this->input->post('projectDesc');
		$dados['status'] = $this->input->post('projectStatus');
		$dados['scope'] = $this->input->post('scope');
		$dados['objective'] = $this->input->post('objective');
		$dados['sucess'] = $this->input->post('sucess');
		$dados['requirements'] = $this->input->post('require');
		$dados['assumptions'] = $this->input->post('assumptions');
		$dados['risks'] = $this->input->post('risks');
		$dados['milestone'] = $this->input->post('milestone');
		$dados['start_date'] = $this->input->post('startDate');
		$dados['end_date'] = $this->input->post('endDate');
		$dados['budge'] = $this->input->post('budge');
		$dados['stakeholder'] = $this->input->post('stakeCharter');
		$dados['aprovalReq'] = $this->input->post('approval');
	
		$resultado = $this->project_model->inserirProject($dados);

		if($resultado){
			header('location:'.base_url().$this->index());
		}
	}

	public function deleteProject($id=null){
		$resultado = $this->project_model->deletarProject($id);

		if($resultado){
			header('location:'.base_url().$this->index());
		}
	}

	public function openProject($id=null){
		$dados['project'] = $this->project_model->pegarProjetos($id);
		$this->load->view('projectPage', $dados);
	}

// euuuu
	public function editProject($id){
		$dados['project'] = $this->project_model->getproject($id);
		$this->load->view('editformproject.php', $dados);
	}

	public function updateProject($id){
		$project['title'] = $this->input->post('title');
		$project['description'] = $this->input->post('description');
		$project['status'] = $this->input->post('projectStatus');
		$project['scope'] = $this->input->post('scope');
		$project['objective'] = $this->input->post('objective');
		$project['sucess'] = $this->input->post('sucess');
		$project['requirements'] = $this->input->post('require');
		$project['assumptions'] = $this->input->post('assumptions');
		$project['risks'] = $this->input->post('risks');
		$project['milestone'] = $this->input->post('milestone');
		$project['start_date'] = $this->input->post('startDate');
		$project['end_date'] = $this->input->post('endDate');
		$project['budge'] = $this->input->post('budge');
		$project['stakeholder'] = $this->input->post('stakeCharter');
		$project['aprovalReq'] = $this->input->post('approval');
	

		$query = $this->project_model->updateproject($project, $id);

		if($query){
			header('location:'.base_url().$this->index());
		}
	}

}
