<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ChangeRequest extends CI_Controller
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
		$this->load->model('Stakeholder_model');
		$this->load->model('Change_request_model');

		$array = array();
		array_push($array, 'change_request');
		loadLangs($array);

		$userInProject = $this->Project_model->userInProject($_SESSION['user_id'], $_SESSION['project_id']);
		
		if ($userInProject) {
			$this->session->set_flashdata('error3', 'You have no access to this project');
			redirect('projects/' . $_SESSION['project_id']);
		}

	}

	public function list($project_id)
	{
		if (strcmp($_SESSION['language'], "US") == 0) {
            $this->lang->load('btn', 'english');
        } else {
			$this->lang->load('btn', 'portuguese-brazilian');
        }

		$dado['project_id'] = $project_id;

		$dado['change_request'] = $this->Change_request_model->getAll($project_id);
		$this->load->view('frame/header_view');
		$this->load->view('frame/topbar');
		$this->load->view('frame/sidebar_nav_view');
		$this->load->view('project/integration/change_request/list', $dado);
	}

	public function new($project_id)
	{
		if (strcmp($_SESSION['language'], "US") == 0) {
            $this->lang->load('btn', 'english');
        } else {
			$this->lang->load('btn', 'portuguese-brazilian');
        }

		$dado['stakeholder'] = $this->Stakeholder_model->getAll($_SESSION['project_id']);
		$idusuario = $_SESSION['user_id'];
		$this->db->where('user_id', $idusuario);
		$this->db->where('project_id', $project_id);
		$project['dados'] = $this->db->get('project_user')->result();

		if (count($project['dados']) > 0) {
			$dado['project_id'] = $project_id;
			$this->load->view('frame/header_view');
			$this->load->view('frame/topbar');
			$this->load->view('frame/sidebar_nav_view');
			$this->load->view('project/integration/change_request/new', $dado);
		} else {
			redirect(base_url());
		}
	}

	public function edit($project_id)
	{
		if (strcmp($_SESSION['language'], "US") == 0) {
            $this->lang->load('btn', 'english');
        } else {
			$this->lang->load('btn', 'portuguese-brazilian');
        }
		
		$query['stakeholder'] = $this->Stakeholder_model->getAll($_SESSION['project_id']);
		$query['change_request'] = $this->Change_request_model->get($project_id);

		$dado["fields"] = getAllFieldEvaluation($_SESSION['project_id'], "change request", $query['change_request']['id']);

		$this->load->view('frame/header_view');
		$this->load->view('frame/topbar');
		$this->load->view('frame/sidebar_nav_view');
		$this->load->view('project/integration/change_request/edit', $query);
	}

	public function insert($project_id)
	{
		$change_request['requester'] = $this->input->post('requester');
		$change_request['number_id'] = $this->input->post('number_id');
		$change_request['request_date'] = $this->input->post('request_date');
		$change_request['type'] = $this->input->post('type');
		$change_request['description'] = $this->input->post('description');
		$change_request['impacted_areas'] = $this->input->post('impacted_areas');
		$change_request['impacted_docs'] = $this->input->post('impacted_docs');
		$change_request['justification'] = $this->input->post('justification');
		$change_request['comments'] = $this->input->post('comments');
		$change_request['manager_opinion'] = $this->input->post('manager_opinion');
		$change_request['committee_opinion'] = $this->input->post('committee_opinion');
		$change_request['status'] = $this->input->post('status');
		$change_request['committee_date'] = $this->input->post('committee_date');
		$change_request['project_id'] = $project_id;

		$query = $this->Change_request_model->insert($change_request);

		if ($query) {
			insertLogActivity('insert', 'change request');
			redirect('integration/change-request/list/' . $change_request['project_id']);
		}
	}

	public function update($id)
	{
		$change_request['requester'] = $this->input->post('requester');
		$change_request['number_id'] = $this->input->post('number_id');
		$change_request['request_date'] = $this->input->post('request_date');
		$change_request['type'] = $this->input->post('type');
		$change_request['description'] = $this->input->post('description');
		$change_request['impacted_areas'] = $this->input->post('impacted_areas');
		$change_request['impacted_docs'] = $this->input->post('impacted_docs');
		$change_request['justification'] = $this->input->post('justification');
		$change_request['comments'] = $this->input->post('comments');
		$change_request['manager_opinion'] = $this->input->post('manager_opinion');
		$change_request['committee_opinion'] = $this->input->post('committee_opinion');
		$change_request['status'] = $this->input->post('status');
		$change_request['committee_date'] = $this->input->post('committee_date');
		$change_request['project_id'] = $this->input->post('project_id');
		
		$status = $this->Change_request_model->get($id);

		if($change_request['status'] !=  $status['status']){
			$status['id'] = "";
			$status['log'] = 1;
			$this->Change_request_model->insert($status);
		}

		$query = $this->Change_request_model->update($change_request, $id);

		if ($query) {
			insertLogActivity('update', 'change request');
			redirect('integration/change-request/list/' . $change_request['project_id']);
		}
	}

	public function delete($id)
	{
		$project_id['project_id'] = $this->input->post('project_id');
		//$project_id['project_id'] = $project_id;
		$query = $this->Change_request_model->delete($id);
		if ($query) {
			insertLogActivity('delete', 'change request');
			redirect('integration/change-request/list/' . $_SESSION['project_id']);
		}
	}
}
