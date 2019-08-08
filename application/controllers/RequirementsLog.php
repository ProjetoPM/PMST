<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class RequirementsLog extends CI_Controller {

	function __construct(){
		parent::__construct();
		if (!$this->session->userdata('logged_in')) {
			redirect(base_url());
		}
		$this->load->helper('url');
		$this->load->model('Requirements_log_model');

		//$this->lang->load('requirements-log','portuguese-brazilian');
   
        $this->lang->load('requirements-log','english');
   

	}

	public function addnew($project_id){
		    $idusuario = $_SESSION['user_id'];
    $this->db->where('user_id', $idusuario);
    $this->db->where('project_id', $project_id);
    $project['dados'] = $this->db->get('project_user')-> result();

    if (count($project['dados']) > 0) {
        $dado['re_log'] = $this->Requirements_log_model->getLog();
		$dado['re_regist'] = $this->Requirements_log_model->getRegistration();
		$dado['id'] = $project_id;
		//$dado['verific'] = true;
		$this->load->view('frame/header_view');
		$this->load->view('frame/sidebar_nav_view');
		$this->load->view('project/requirements_log',$dado); 

    } else {
        redirect(base_url());
    }
	}

	public function insert($id){
		$dado['re_log'] = $this->Requirements_log_model->getLog();
		$dado['re_regist'] = $this->Requirements_log_model->getRegistration();

		// Insert Requirement Registration
		$re_regist['associated_id'] = $this->input->post('associated_id');
        $re_regist['business_strategy'] = $this->input->post('business_strategy');
        $re_regist['requirement_name'] = $this->input->post('requirement_name');
        $re_regist['priority'] = $this->input->post('priority');
        $re_regist['description'] = $this->input->post('description');
        $re_regist['version'] = $this->input->post('version');
        $re_regist['phase'] = $this->input->post('phase');
        $re_regist['associated_delivery'] = $this->input->post('associated_delivery');
        $re_regist['type'] = $this->input->post('type');
        $re_regist['requester'] = $this->input->post('requester');
        $re_regist['complexity'] = $this->input->post('complexity');
        $re_regist['acceptance_criteria'] = $this->input->post('acceptance_criteria');
        $re_regist['responsible'] = $this->input->post('responsible');
        $re_regist['validity'] = $this->input->post('validity');
        $re_regist['supporting_documentation'] = $this->input->post('supporting_documentation');
        $re_regist['requirement_situation'] = $this->input->post('requirement_situation');

        // Insert Requirement Log
        
        $re_log['creation_date'] = $this->input->post('creation_date');
		$re_log['last_change_date'] = $this->input->post('last_change_date');
		$re_log['last_change_responsible'] = $this->input->post('last_change_responsible');
		$re_log['last_change_reason'] = $this->input->post('last_change_reason');



		$re_log['project_id'] = $id;
		//$re_log['status'] = 1;
		$query=false;
		if($dado['re_regist']!=null){
			foreach($dado['re_regist'] as $re_regist){
				$verific = $re_regist->project_id;
				if($id==$verific){
					$query = $this->Requirements_log_model->updateRegistration($re_regist, $id);
					
				}
			}
		}
		if($dado['re_log']!=null){
			foreach($dado['re_log'] as $re_log){
				$verific = $re_log->project_id;
				if($id==$verific){
					$query = $this->Requirements_log_model->updateLog($re_log, $id);

				}
			}
		}

		if($query!=true){
			$query = $this->Requirements_log_model->insertLog($re_log);
			$query = $this->Requirements_log_model->insertRegistration($re_regist);
		}
		
		if($query){
			$this->load->view('frame/header_view');
			$this->load->view('frame/sidebar_nav_view');
			redirect('project/' . $re_log['project_id']);
		}

	}
}
?>