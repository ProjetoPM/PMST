<?php
if (!defined('BASEPATH')) {
	exit('No direct script access allowed');
}

class ScheduleManagementPlan extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		if (!$this->session->userdata('logged_in')) {
			redirect(base_url());
		}

		if (strcmp($_SESSION['language'], "US") == 0) {
            $this->lang->load('schedule', 'english');
            $this->lang->load('project-page', 'english');
        } else {
            $this->lang->load('schedule', 'portuguese-brazilian');
            $this->lang->load('project-page', 'portuguese-brazilian');
        }

		// $this->lang->load('btn','portuguese-brazilian');
		
		// $this->lang->load('schedule','portuguese-brazilian');
		$this->load->helper('url');
		$this->load->model('view_model');
		$this->load->model('log_model');
		$this->load->helper('log_activity');
		$this->load->model('Schedule_model');
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
			$dado['schedule_mp'] = $this->Schedule_model->get($project_id);
			// Confere sempre se não há dados desta area de conhecimento no projeto
			
			if ($dado['schedule_mp'] != null) {
				redirect("schedule/schedule-mp/edit/" . $_SESSION['project_id']);
			}
			
			$this->load->view('frame/header_view');
			$this->load->view('frame/topbar');
			$this->load->view('frame/sidebar_nav_view');
			$this->load->view('project/schedule/schedule_mp/new', $dado);
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
			$dado['schedule_mp'] = $this->Schedule_model->get($project_id);
			if ($dado['schedule_mp'] == null) {
				redirect("schedule/schedule-mp/new/" . $_SESSION['project_id']);
			}
			$dado["fields"] = getAllFieldEvaluation($_SESSION['project_id'], "schedule management plan", $dado['schedule_mp'][0]->schedule_mp_id);

			$this->load->view('frame/header_view');
			$this->load->view('frame/topbar');
			$this->load->view('frame/sidebar_nav_view');
			$this->load->view('project/schedule/schedule_mp/edit', $dado);
		} else {
			redirect(base_url());
		}
	}

	//Criar o Schedule 1 Vez
	public function insert()
	{
		if(strcmp($_SESSION['language'],"US") == 0){
			$feedback_success = 'Item Created';
        }else{
			$feedback_success = 'Item Criado ';
		}

		insertLogActivity('insert', 'schedule management plan');
		$postData = $this->input->post();
		$insert = $this->Schedule_model->insert($postData);
		$this->session->set_flashdata('success', $feedback_success);
		redirect('schedule/schedule-mp/edit/' . $postData['project_id']);
		echo json_encode($insert);

		//	$dados = $this->post('schedule_mp.schedule_model');
	}


	// esse parametro vai ser inicializado la na view
	public function update()
	{
		if(strcmp($_SESSION['language'],"US") == 0){
			$feedback_success = 'Item Updated';
        }else{
			$feedback_success = 'Item Atualizado ';
		}

		$schedule_mp['schedule_model'] = $this->input->post('schedule_model');
		$schedule_mp['accuracy_level'] = $this->input->post('accuracy_level');
		$schedule_mp['organizational_procedures'] = $this->input->post('organizational_procedures');
		$schedule_mp['schedule_maintenance'] = $this->input->post('schedule_maintenance');
		$schedule_mp['performance_measurement'] = $this->input->post('performance_measurement');
		$schedule_mp['report_format'] = $this->input->post('report_format');
		$schedule_mp['release_iteration'] = $this->input->post('release_iteration');
		$schedule_mp['units_measure'] = $this->input->post('units_measure');
		$schedule_mp['control_thresholds'] = $this->input->post('control_thresholds');

		$query =	$this->Schedule_model->update($schedule_mp, $_SESSION['project_id']);

		insertLogActivity('update', 'schedule management plan');
		$this->session->set_flashdata('success', $feedback_success);
		redirect('schedule/schedule-mp/edit/' . $_SESSION['project_id']);
		//if ($query) {
		//header('location:'.base_url().//$this->schedule_form());
	}



	//var_dump($shed);






}
