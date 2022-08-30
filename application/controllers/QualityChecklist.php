<?php
if (!defined('BASEPATH')) {
	exit('No direct script access allowed');
}

class QualityChecklist extends CI_Controller
{

	public function __Construct()
	{
		parent::__Construct();
		if (!$this->session->userdata('logged_in')) {
			redirect(base_url());
		}
		
		$this->load->helper('url');
		$this->load->helper('log_activity');

		$this->load->model('log_model');
		$this->load->model('view_model');
		$this->load->model('Project_model');
		$this->load->model('QualityChecklist_model');

		if (strcmp($_SESSION['language'], "US") == 0) {
			$this->lang->load('quality_checklist', 'english');
            $this->lang->load('risk-mp', 'english');
            $this->lang->load('project-page', 'english');
        } else {
			$this->lang->load('quality_checklist', 'portuguese-brazilian');
            $this->lang->load('risk-mp', 'portuguese-brazilian');
            $this->lang->load('project-page', 'portuguese-brazilian');
        }

		//$this->lang->load('btn','portuguese-brazilian');
		//$this->lang->load('risk-mp','portuguese-brazilian');

	}

	public function list($project_id)
	{

		if (strcmp($_SESSION['language'], "US") == 0) {
			$this->lang->load('btn', 'english');
		} else {
			$this->lang->load('btn', 'portuguese-brazilian');
		}

		$dado['project_id'] = $project_id;
		$dado['quality_check'] = $this->QualityChecklist_model->getAll($project_id);

		$this->load->view('frame/header_view');
		$this->load->view('frame/topbar');
		$this->load->view('frame/sidebar_nav_view');
		$this->load->view('project/quality/quality_checklist/list', $dado);
	}

	public function edit($quality_checklist_id)
	{

		if (strcmp($_SESSION['language'], "US") == 0) {
			$this->lang->load('btn', 'english');
		} else {
			$this->lang->load('btn', 'portuguese-brazilian');
		}

		$this->db->where('user_id',  $_SESSION['user_id']);
		$this->db->where('project_id',  $_SESSION['project_id']);
		$project['dados'] = $this->db->get('project_user')->result();
		// Verificando se o usuario logado tem acesso a esse projeto
		$dado['quality_check'] = $this->QualityChecklist_model->get($quality_checklist_id);

		$dado["fields"] = getAllFieldEvaluation($_SESSION['project_id'], "quality checklist", $dado['quality_check']['quality_checklist_id']);

		$dado['quality_itens'] = $this->QualityChecklist_model->getAllItens($quality_checklist_id);



			$this->load->view('frame/header_view');
			$this->load->view('frame/topbar');
			$this->load->view('frame/sidebar_nav_view');
			$this->load->view('project/quality/quality_checklist/edit', $dado);
	}

	public function new($project_id)
	{

		if (strcmp($_SESSION['language'], "US") == 0) {
			$this->lang->load('btn', 'english');
		} else {
			$this->lang->load('btn', 'portuguese-brazilian');
		}

		$this->db->where('user_id',  $_SESSION['user_id']);
		$this->db->where('project_id',  $_SESSION['project_id']);
		$project['dados'] = $this->db->get('project_user')->result();
		$project['project_id'] = $_SESSION['project_id'];

			$this->load->view('frame/header_view');
			$this->load->view('frame/topbar');
			$this->load->view('frame/sidebar_nav_view');
			$this->load->view('project/quality/quality_checklist/new', $project);
	}


	public function insert($project_id)
	{
		insertLogActivity('insert', 'quality checklist');

		$quality_check['verified'] = $this->input->post('verified');
		$quality_check['date'] = $this->input->post('date');
		$quality_check['responsible'] = $this->input->post('responsible');
		$quality_check['guidelines'] = $this->input->post('guidelines');
		$quality_check['documents'] = $this->input->post('documents');
		$quality_check['project_id'] = $_SESSION['project_id'];

		$quality_item['item_check'] = $this->input->post('item_check');
		$quality_item['comments'] = $this->input->post('comments');
		$quality_item['status'] = $this->input->post('status');

		$insert_id   = $this->QualityChecklist_model->insert($quality_check);
		
		$query2 = $this->QualityChecklist_model->updateQualityCheckItem($quality_item, $insert_id );

		$this->session->set_flashdata('success', 'Quality Checklist has been successfully created!');
		redirect('quality/quality-checklist/list/' . $_SESSION['project_id']);
		// echo json_encode($insert);
	}

	public function update($quality_check_id)
	{
		insertLogActivity('update', 'quality checklist');

		$quality_check['verified'] = $this->input->post('verified');
		$quality_check['date'] = $this->input->post('date');
		$quality_check['responsible'] = $this->input->post('responsible');
		$quality_check['guidelines'] = $this->input->post('guidelines');
		$quality_check['documents'] = $this->input->post('documents');
		$quality_check['project_id'] = $_SESSION['project_id'];

		
		$quality_item['item_check'] = $this->input->post('item_check');
		$quality_item['comments'] = $this->input->post('comments');
		$quality_item['status'] = $this->input->post('status');
		// var_dump($this->input->post());exit;

		$insert_id   = $this->QualityChecklist_model->update($quality_check, $quality_check_id);
		$query2 = $this->QualityChecklist_model->updateQualityCheckItem($quality_item, $quality_check_id );
		
		$this->session->set_flashdata('update', 'Quality Checklist has been successfully changed!');
		redirect('quality/quality-checklist/edit/' . $quality_check_id);
	}

	public function delete($quality_checklist_id)
	{
		$project_id['project_id'] = $this->input->post('project_id');
		//$project_id['project_id'] = $project_id;
		$query = $this->QualityChecklist_model->delete($quality_checklist_id);
		if ($query) {
			insertLogActivity('delete', 'quality checklist');
			redirect('quality/quality-checklist/list/' . $_SESSION['project_id']);
		}
	}
}
