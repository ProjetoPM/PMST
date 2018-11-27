<?php
if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Change_log extends CI_Controller {

	function __construct(){

		parent::__Construct();
		if (!$this->session->userdata('logged_in')) {
			redirect(base_url());
		}
		//$this->load->helper('url');
		$this->load->model('project_model');
		$this->load->model('Change_log_model');
		
		$this->lang->load('btn','english');
        // $this->lang->load('btn','portuguese-brazilian');
		$this->lang->load('change_log','english');
        // $this->lang->load('change_log_view','portuguese-brazilian');
	}


	private function ajax_checking(){
		if (!$this->input->is_ajax_request()) {
			redirect(base_url());
		}
	}

	public function list($project_id){
		$query['change_log'] = $this->Change_log_model->getWithProject_id($project_id);
		$query['project_id'] = $project_id;
		$this->load->view('frame/header_view');
		$this->load->view('frame/sidebar_nav_view');
		$this->load->view('project/integration/change_log/list', $query);

	}

	public function new($project_id){
		$query['project_id'] = $project_id;
		$this->load->view('frame/header_view');
		$this->load->view('frame/sidebar_nav_view'); 
		$this->load->view('project/integration/change_log/new', $query);
	}

	public function edit($change_log){
		$query['change_log'] = $this->Change_log_model->get($change_log);
		$query['project_id'] = $this->input->post('project_id');
		$this->load->view('frame/header_view');
		$this->load->view('frame/sidebar_nav_view'); 
		$this->load->view('project/integration/change_log/edit', $query);
	}


	
  public function insert() {
        $change_log['id_number'] = $this->input->post('id_number');
        $change_log['requester'] = $this->input->post('requester');
        $change_log['request_date'] = $this->input->post('request_date');
        $change_log['change_type'] = $this->input->post('change_type');
        $change_log['situation'] = $this->input->post('situation');
        $change_log['change_description'] = $this->input->post('change_description');
        $change_log['project_management_feedback'] = $this->input->post('project_management_feedback');
        $change_log['ccc_feedback'] = $this->input->post('ccc_feedback');
        $change_log['ccc_feedback_date'] = $this->input->post('ccc_feedback_date');
        $change_log['comments'] = $this->input->post('comments');
        $change_log['project_id'] = $this->input->post('project_id');
        
        $query = $this->Change_log_model->insert($change_log);

        if($query){
            $this->load->view('frame/header_view');
            $this->load->view('frame/sidebar_nav_view');
            redirect(base_url() . 'Change_log/list/' . $change_log['project_id']);
        }
    }
  public function update($id){
        $change_log['id_number'] = $this->input->post('id_number');
        $change_log['requester'] = $this->input->post('requester');
        $change_log['request_date'] = $this->input->post('request_date');
        $change_log['change_type'] = $this->input->post('change_type');
        $change_log['situation'] = $this->input->post('situation');
        $change_log['change_description'] = $this->input->post('change_description');
        $change_log['project_management_feedback'] = $this->input->post('project_management_feedback');
        $change_log['ccc_feedback'] = $this->input->post('ccc_feedback');
        $change_log['ccc_feedback_date'] = $this->input->post('ccc_feedback_date');
        $change_log['comments'] = $this->input->post('comments');
        $change_log['project_id'] = $this->input->post('project_id');

        $query = $this->Change_log_model->update($change_log, $id);

        if($query){
            $this->load->view('frame/header_view');
            $this->load->view('frame/sidebar_nav_view');
            redirect(base_url() . 'Change_log/list/' . $change_log['project_id']);
        }
    }

    public function delete($id){
        $project_id['id'] = $this->input->post('project_id');
        $query = $this->Change_log_model->delete($id);
        if($query){
            $this->load->view('frame/header_view');
            $this->load->view('frame/sidebar_nav_view');
            redirect(base_url() . 'Change_log/list/' . $project_id['id']);
        }
    }

}
?>