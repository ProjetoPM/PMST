<?php
if (!defined('BASEPATH')) {
	exit('No direct script access allowed');
}

class IssueLog extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		if (!$this->session->userdata('logged_in')) {
			redirect(base_url());
		}

		$this->load->helper('log_activity');

		$this->load->model('log_model');
		$this->load->model('view_model');
		$this->load->model('Project_model');
		$this->load->model('Stakeholder_model');
		$this->load->model('Issues_record_model');
		$this->load->model('Issues_record_stakeholder_model');

		if ($_SESSION['access_level'] == "0") {
			$this->session->set_flashdata('error3', 'You do not have permission to access this document!');
			redirect('project/' . $_SESSION['project_id']);
		}

       $array = array();
		array_push($array, 'issues_record');
		loadLangs($array);

		$userInProject = $this->Project_model->userInProject($_SESSION['user_id'], $_SESSION['project_id']);
		
		if ($userInProject) {
			$this->session->set_flashdata('error3', 'You have no access to this project');
			redirect('projects/' . $_SESSION['project_id']);
		}
	}

	public function list($project_id)
	{
		if(strcmp($_SESSION['language'],"US") == 0){
            $this->lang->load('btn', 'english');
        }else{
            $this->lang->load('btn', 'portuguese-brazilian');
        }

		$query['issues_record'] = $this->Issues_record_model->getAll($_SESSION['project_id']);
		$query['project_id'] = $_SESSION['project_id'];
		$this->load->view('frame/header_view');
		$this->load->view('frame/topbar');
		$this->load->view('frame/sidebar_nav_view.php');
		$this->load->view('project/integration/issues_log/list', $query);
	}

	public function new($project_id)
	{
		if(strcmp($_SESSION['language'],"US") == 0){
            $this->lang->load('btn', 'english');
        }else{
            $this->lang->load('btn', 'portuguese-brazilian');
        }

		$query['stakeholder'] = $this->Stakeholder_model->getAll($_SESSION['project_id']);
		$idusuario = $_SESSION['user_id'];
		$this->db->where('user_id', $idusuario);
		$this->db->where('project_id', $_SESSION['project_id']);
		$project['dados'] = $this->db->get('project_user')->result();

		if (count($project['dados']) > 0) {
			$query['project_id'] = $_SESSION['project_id'];
			$this->load->view('frame/header_view');
			$this->load->view('frame/topbar');
			$this->load->view('frame/sidebar_nav_view.php');
			$this->load->view('project/integration/issues_log/new', $query);
		} else {
			redirect(base_url());
		}
	}

	public function insert()
	{
		$issues_record['identification'] = $this->input->post('identification');
		$issues_record['identification_date'] = $this->input->post('identification_date');
		$issues_record['question_description'] = $this->input->post('question_description');
		$issues_record['type'] = $this->input->post('type');
		$issues_record['responsable'] = $this->input->post('responsable');
		$issues_record['situation'] = $this->input->post('situation');
		$issues_record['action'] = $this->input->post('action');
		$issues_record['resolution_date'] = $this->input->post('resolution_date');
		$issues_record['replan_date'] = $this->input->post('replan_date');
		$issues_record['observations'] = $this->input->post('observations');
		$issues_record['status'] = $this->input->post('status');
		$issues_record['project_id'] = $_SESSION['project_id'];

		$query = $this->Issues_record_model->insert($issues_record);

		if ($query) {
			insertLogActivity('insert', 'issue log');
			redirect('integration/issue-log/list/' . $_SESSION['project_id']);
		}
	}

	public function edit($issues_record_id)
	{
		if(strcmp($_SESSION['language'],"US") == 0){
            $this->lang->load('btn', 'english');
        }else{
            $this->lang->load('btn', 'portuguese-brazilian');
        }
		
		$query['stakeholder'] = $this->Stakeholder_model->getAll($_SESSION['project_id']);
		//query = array de objetos
		//issues_record = objeto do array query
		$query['issues_record'] = $this->Issues_record_model->get($issues_record_id);
		$dado["fields"] = getAllFieldEvaluation($_SESSION['project_id'], "issue log", $query['issues_record']['issues_record_id']);
		//var_dump($query);
		$this->load->view('frame/header_view');
		$this->load->view('frame/topbar');
		$this->load->view('frame/sidebar_nav_view.php');
		//passa pra view todo array de objetos
		$this->load->view('project/integration/issues_log/edit', $query);
	}
	public function update($issues_record_id)
	{
		$issues_record['identification'] = $this->input->post('identification');
		$issues_record['identification_date'] = $this->input->post('identification_date');
		$issues_record['question_description'] = $this->input->post('question_description');
		$issues_record['type'] = $this->input->post('type');
		$issues_record['responsable'] = $this->input->post('responsable');
		$issues_record['situation'] = $this->input->post('situation');
		$issues_record['action'] = $this->input->post('action');
		$issues_record['resolution_date'] = $this->input->post('resolution_date');
		$issues_record['replan_date'] = $this->input->post('replan_date');
		$issues_record['observations'] = $this->input->post('observations');
		$issues_record['status'] = $this->input->post('status');

		$data['issues_record'] = $issues_record;
		$query = $this->Issues_record_model->update($data['issues_record'], $issues_record_id);

		if ($query) {
			insertLogActivity('update', 'issue log');
			redirect('integration/issue-log/list/' . $_SESSION['project_id']);
		}
	}

	public function delete($issues_record_id)
	{
		insertLogActivity('delete', 'issue log');
		//$data['issues_record'] = $this->Issues_record_model->getIssues_record($issues_record_id);
		//$project_id['issues_record_id'] = $this->input->post('project_id');
		//$project_id = $data['project_id'];
		$query = $this->Issues_record_model->delete($issues_record_id);
		if ($query) {
			redirect('integration/issue-log/list/' . $_SESSION['project_id']);
		}
	}
}
