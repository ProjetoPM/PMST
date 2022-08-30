<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ResourceBreakdownStructure extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		if (!$this->session->userdata('logged_in')) {
			redirect(base_url());
		}
		
		$this->load->helper('url');
		
		$this->load->model('log_model');
		$this->load->model('Project_model');
		$this->load->model('Benefits_plan_model');

		$array = array();
		array_push($array, 'resource_breakdown_structure');
		loadLangs($array);

		$userInProject = $this->Project_model->userInProject($_SESSION['user_id'], $_SESSION['project_id']);
		
		if ($userInProject) {
			$this->session->set_flashdata('error3', 'You have no access to this project');
			redirect('projects/' . $_SESSION['project_id']);
		}
	}

	public function new($project_id)
	{
		if (strcmp($_SESSION['language'], "US") == 0) {
			$this->lang->load('btn', 'english');
		} else {
			$this->lang->load('btn', 'portuguese-brazilian');
		}
		$this->db->where('user_id', $_SESSION['user_id']);
		$this->db->where('project_id', $_SESSION['project_id']);
		$project['dados'] = $this->db->get('project_user')->result();
		// Verificando se o usuario logado tem acesso a esse projeto

		if (count($project['dados']) > 0) {
			// $dado['schedule_mp'] = $this->Schedule_model->get($project_id);
			// // Confere sempre se não há dados desta area de conhecimento no projeto

			// if($dado['schedule_mp'] != null){
			// 	redirect("Schedule/edit/".$_SESSION['project_id']);
			// }

			$this->load->view('frame/header_view');
			$this->load->view('frame/topbar');
			$this->load->view('frame/sidebar_nav_view');
			$this->load->view('project/human_resource/resource_breakdown_structure');
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
		
		$this->db->where('user_id', $_SESSION['user_id']);
		$this->db->where('project_id', $_SESSION['project_id']);
		$project['dados'] = $this->db->get('project_user')->result();

		if (count($project['dados']) > 0) {
			// $dado['schedule_mp'] = $this->Schedule_model->get($project_id);
			// if($dado['schedule_mp'] == null){
			// 	redirect("Schedule/new/".$_SESSION['project_id']);
			// }

			$this->load->view('frame/header_view');
			$this->load->view('frame/topbar');
			$this->load->view('frame/sidebar_nav_view');
			$this->load->view('project/schedule/schedule_mp/edit');
		} else {
			redirect(base_url());
		}
	}

	// public function insert() {
	// 	$project_closure_term['client'] = $this->input->post('client');
	// 	$project_closure_term['project_closure_date'] = $this->input->post('project_closure_date');
	// 	$project_closure_term['main_changes_approved'] = $this->input->post('main_changes_approved');
	// 	$project_closure_term['main_deviations'] = $this->input->post('main_deviations');
	// 	$project_closure_term['main_lessons_learned'] = $this->input->post('main_lessons_learned');
	// 	$project_closure_term['client_comments'] = $this->input->post('client_comments');
	// 	$project_closure_term['sponsor_comments'] = $this->input->post('sponsor_comments');
	// 	$project_closure_term['project_id'] = $_SESSION['project_id'];


	//     $query = $this->Project_Closure_model->insert($project_closure_term);

	//     if($query){
	//         $this->load->view('frame/header_view'); 
	//  $this->load->view('frame/topbar');
	//         $this->load->view('frame/sidebar_nav_view');
	//         redirect("integration/project-closure/edit/".$_SESSION['project_id']);
	//     }
	// }

	// public function update(){
	// 	$project_closure_term['client'] = $this->input->post('client');
	// 	$project_closure_term['project_closure_date'] = $this->input->post('project_closure_date');
	// 	$project_closure_term['main_changes_approved'] = $this->input->post('main_changes_approved');
	// 	$project_closure_term['main_deviations'] = $this->input->post('main_deviations');
	// 	$project_closure_term['main_lessons_learned'] = $this->input->post('main_lessons_learned');
	// 	$project_closure_term['client_comments'] = $this->input->post('client_comments');
	// 	$project_closure_term['sponsor_comments'] = $this->input->post('sponsor_comments');

	//     $query = $this->Project_Closure_model->update($project_closure_term, $_SESSION['project_id']);

	//     if($query){
	//         $this->load->view('frame/header_view'); 
	//  $this->load->view('frame/topbar');
	//         $this->load->view('frame/sidebar_nav_view');
	//         redirect("integration/project-closure/edit/".$_SESSION['project_id']);
	//     }
	// }
}
