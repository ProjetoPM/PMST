<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class TEP extends CI_Controller {

	function __construct(){

		parent::__construct();
		$this->load->helper('url');
		$this->load->model('Tep_model');
		
		$this->lang->load('btn','english');
        // $this->lang->load('btn','portuguese-brazilian');
        $this->lang->load('tep','english');
        // $this->lang->load('tep','portuguese-brazilian');

		
	}

	public function new($project_id){
		$dado['project_closure_term'] = $this->Tep_model->getTep();
		$dado['id'] = $project_id;
		//$dado['verific'] = true;
		$this->load->view('frame/header_view');
		$this->load->view('frame/sidebar_nav_view');
		$this->load->view('project/tep',$dado);
	}

	public function insert($id){
		$dado['project_closure_term'] = $this->Tep_model->getTep();
		$project_closure_term['client'] = $this->input->post('client');
		$project_closure_term['project_closure_date'] = $this->input->post('project_closure_date');
		$project_closure_term['main_changes_approved'] = $this->input->post('main_changes_approved');
		$project_closure_term['main_deviations'] = $this->input->post('main_deviations');
		$project_closure_term['main_lessons_learned'] = $this->input->post('main_lessons_learned');
		$project_closure_term['client_comments'] = $this->input->post('client_comments');
		$project_closure_term['sponsor_comments'] = $this->input->post('sponsor_comments');
		$project_closure_term['project_id'] = $id;
		$query=false;
		if($dado['project_closure_term']!=null){
			foreach($dado['project_closure_term'] as $tep){
				$verific = $tep->project_id;
				if($id==$verific){
					$query = $this->Tep_model->updatetep($project_closure_term, $id);
				}
			}
		}
		if($query!=true){
			$query = $this->Tep_model->insertTep($project_closure_term);
		}
		
		if($query){
			$this->load->view('frame/header_view');
			$this->load->view('frame/sidebar_nav_view');
			redirect('project/' . $project_closure_term['project_id']);
		}

	}
}
?>