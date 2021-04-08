<?php
if (!defined('BASEPATH')) {
	exit('No direct script access allowed');
}

class ScopeManagementPlan extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		if (!$this->session->userdata('logged_in')) {
			redirect(base_url());
		}
		//$this->load->helper('url');
		$this->lang->load('btn', 'english');
		//$this->lang->load('btn', 'portuguese-brazilian');
		$this->lang->load('scope_mp', 'english');
		//$this->lang->load('tap', 'portuguese-brazilian');

		$this->load->model('Project_model');
		$this->load->model('view_model');
		$this->load->helper('url');
		$this->load->model('log_model');
		$this->load->model('Scope_mp_model');
		$this->load->helper('log_activity');
	}


	public function new($project_id)
	{
		$this->db->where('user_id', $_SESSION['user_id']);
		$this->db->where('project_id', $_SESSION['project_id']);
		$project['dados'] = $this->db->get('project_user')->result();
		// Verificando se o usuario logado tem acesso a esse projeto

		if (count($project['dados']) > 0) {
			$dado['scope_mp'] = $this->Scope_mp_model->get($project_id);
			// Confere sempre se não há dados desta area de conhecimento no projeto

			if ($dado['scope_mp'] != null) {
				redirect("scope/scope-mp/edit/" . $_SESSION['project_id']);
			}

			$this->load->view('frame/header_view');
			$this->load->view('frame/topbar');
			$this->load->view('frame/sidebar_nav_view');
			$this->load->view('project/scope/scope_mp/new', $dado);
		} else {
			redirect(base_url());
		}
	}

	public function edit($project_id)
	{
		$this->db->where('user_id', $_SESSION['user_id']);
		$this->db->where('project_id', $_SESSION['project_id']);
		$project['dados'] = $this->db->get('project_user')->result();

		if (count($project['dados']) > 0) {
			$dado['scope_mp'] = $this->Scope_mp_model->get($_SESSION['project_id']);
			if ($dado['scope_mp'] == null) {
				redirect("scope/scope-mp/new/" . $_SESSION['project_id']);
			}

			$this->load->view('frame/header_view');
			$this->load->view('frame/topbar');
			$this->load->view('frame/sidebar_nav_view');
			$this->load->view('project/scope/scope_mp/edit', $dado);
		} else {
			redirect(base_url());
		}
	}

	public function insert()
	{
		insertLogActivity('insert', 'scope management plan');

		$postData = $this->input->post();
		$insert   = $this->Scope_mp_model->insert($postData);
		$this->session->set_flashdata('success', 'Scope Management Plan has been successfully created!');
		redirect("scope/scope-mp/edit/" . $_SESSION['project_id']);
		echo json_encode($insert);
	}

	public function update()
	{
		$scope_mp['scope_specification'] = $this->input->post('scope_specification');
		$scope_mp['eap_process'] = $this->input->post('eap_process');
		$scope_mp['deliveries_acceptance'] = $this->input->post('deliveries_acceptance');
		$scope_mp['scope_change_mp'] = $this->input->post('scope_change_mp');
		$scope_mp['baseline'] = $this->input->post('baseline');
		$scope_mp['status'] = $this->input->post('status');

		$query = $this->Scope_mp_model->update($scope_mp, $_SESSION['project_id']);
		insertLogActivity('update', 'scope management plan');
		$this->session->set_flashdata('success', 'Scope Management Plan has been successfully changed!');
		redirect("scope/scope-mp/edit/" . $_SESSION['project_id']);
	}

	// 	function image_upload()
	// {
	// 	$this->load->view('frame/header_view.php');
	// 	$this->load->view('project/scope/scope_mp', $data);
	// 	$this->load->view('frame/sidebar_nav_view.php');
	// }

	function ajax_upload()
	{
		$project_id = $this->input->post('project_id');
		$view_id = $this->input->post('view_id');
		$folder = 'upload/Project' . $project_id . 'View' . $view_id;
		$path = 'Project' . $project_id . 'View' . $view_id;
		mkdir($folder, 0777);

		if (isset($_FILES["image_file"]["name"])) {

			$config['upload_path'] = 'upload/' . $path;
			$config['allowed_types'] = 'jpg|jpeg|png|gif';


			$this->load->library('upload', $config);
			if (!$this->upload->do_upload('image_file')) {
				echo $this->upload->display_errors();
			} else {
				$data = $this->upload->data();
				echo '<img src="' . base_url() . 'upload/' . $path . $data["file_name"] . '" width="300" height="225" class="img-thumbnail" />';
			}
		}
	}
}
