<?php 
/**
 * 
 */
class Stakeholder extends CI_Controller {
	
	function __construct() {
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('stakeholder_model');
	}

	public function index() {
		$data['stakelholder'] = $this->stakeholder_model->getAllStakeholder();
		$this->load->view('tap_view.php', $data);
	}
	public function insertStakeholder() {
		$stakeholder['name'] = $this->input->post('name');
		$stakeholder['roles_responsabilies'] = $this->input->post('roles_responsabilities');
		$stakeholder['status'] = $this->input->post('status');

		$query = $this->stakeholder_model->insertStakeholder($stakeholder);

		if ($query) {
			header('location:'.base_url().$this->index());
		}
	}

	public function insertProject() {
		$project['scope'] = $this->input->post('scope');
		$project['objective'] = $this->input->post('objective');
		$project['sucess'] = $this->input->post('sucess');
		$project['requirements'] = $this->input->post('requirements');
		$project['assumptions'] = $this->input->post('assumptions');
		$project['constraints'] = $this->input->post('constraints');
		$project['risks'] = $this->input->post('risks');
		$project['milestone'] = $this->input->post('milestone');
		$project['budge'] = $this->input->post('budget');
		$project['stakeholder'] = $this->input->post('stakeholder');
		$project['aprovalReq'] = $this->input->post('approvalreq');

		$query = $this->stakeholder_model->insertProject($project);

		if ($query) {
			header('location:' .base_url().$this->index());
		}
	}

	public function addnew(){
		$this->load->view('stakeholderadd.php');
	}

	public function edit($stakelholder_id){
		$data['stakelholder'] = $this->stakeholder_model->getStakeholder($stakelholder_id);
		$this->load->view('edit', $data);
	}

	public function delete($id){
		$query = $this->stakeholder_model->deletestakeholder($id);

		if($query){
			header('location:'.base_url().$this->index());
		}
	}

	public function viewStakeholderList() {
		$data['stakelholder'] = $this->stakeholder_model->getAllStakeholder();
		$this->load->view('stakeholder_list', $data);
	}

	public function update($stakelholder_id) {
		$stakeholder['name'] = $this->input->post('name');
		$stakeholder['roles_responsabilies'] = $this->input->post('roles_responsabilities');
		$stakeholder['status'] = $this->input->post('status');

		$query = $this->stakeholder_model->updatestakeholder($stakeholder, $stakelholder_id);

		if($query){
			header('location:'.base_url().$this->index());
		}
	}

	public function viewProjectList() {
		$data['project_charter'] = $this->stakeholder_model->getAllProjects();
		$this->load->view('project_list', $data);
	}

	public function editProject($id){
		$data['project_charter'] = $this->stakeholder_model->getProject($id);
		$this->load->view('editproject', $data);
	}

	public function deleteProject($id){
		$query = $this->stakeholder_model->deleteproject($id);

		if($query){
			header('location:'.base_url().$this->index());
		}
	}

	public function updateProject() {
		$project['scope'] = $this->input->post('scope');
		$project['objective'] = $this->input->post('objective');
		$project['sucess'] = $this->input->post('sucess');
		$project['requirements'] = $this->input->post('requirements');
		$project['assumptions'] = $this->input->post('assumptions');
		$project['constraints'] = $this->input->post('constraints');
		$project['risks'] = $this->input->post('risks');
		$project['milestone'] = $this->input->post('milestone');
		$project['budge'] = $this->input->post('budget');
		$project['stakeholder'] = $this->input->post('stakeholder');
		$project['aprovalReq'] = $this->input->post('approvalreq');


		$query = $this->stakeholder_model->updateproject($project, $id);

		if($query){
			header('location:'.base_url().$this->index());
		}
	}
}
 ?>