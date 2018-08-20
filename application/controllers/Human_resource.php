<?php
if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Human_resource extends CI_Controller{

	public function __Construct(){
        parent::__Construct();
        if (!$this->session->userdata('logged_in')) {
            redirect(base_url());
        }
        $this->load->model('project_model');
        $this->load->model('human_resource_model');
    }
    
    private function ajax_checking(){
        if (!$this->input->is_ajax_request()) {
            redirect(base_url());
        }
    }

	public function human_resource_form($project_id){
        $data['human_resource_mp'] = $this->human_resource_model->getHumanResource();
        $data['id'] = $project_id;
        $this->load->view('frame/header_view');
        $this->load->view('frame/sidebar_nav_view');
        $this->load->view('human_resource/human_resource_mp', $data);
    }

    public function insert($id){
        $data['human_resource_mp'] = $this->human_resource_model->getHumanResource();
        if($data['human_resource_mp']!=null){
            $query = $this->human_resource_model->deleteHumanResource($id);
        }

    	$human_resource_mp['roles_responsibilities'] = $this->input->post('roles_responsibilities');
    	$human_resource_mp['organizational_chart'] = $this->input->post('organizational_chart');
    	$human_resource_mp['staff_mp'] = $this->input->post('staff_mp');
		// $human_resource_mp['project_id'] = $this->input->post('project_id');
        $human_resource_mp['project_id'] = $id;
		$human_resource_mp['status'] = $this->input->post('status');

		$human_resource_mp['status'] = 1;
    	
    	$query = $this->human_resource_model->insertHumanResource($human_resource_mp);

        if($query){
            redirect('projects');
        }
    }

    public function saveUpdate(){
        //$this->ajax_checking();
        
        $postData = $this->input->post();
        
        $this->db->where('project_id', $postData['project_id']);
        
        if ($this->db->update('project', $postData)) {
            $this->session->set_flashdata('success', 'Project ' . $postData['title'] . ' has been updated created!');
        }
        redirect('projects');
        //echo json_encode($insert);            
    }

    // public function edit($id){
    // 	$data['human_resource_mp'] = $this->human_resource_model->getHumanResource($id);
    //     $this->load->view('human_resource/human_resource_mp', $data);
    // }

  //   public function update($id){
  //   	$human_resource_mp['roles_responsibilities'] = $this->input->post('roles_responsibilities');
  //   	$human_resource_mp['organizational_chart'] = $this->input->post('organizational_chart');
  //   	$human_resource_mp['staff_mp'] = $this->input->post('staff_mp');
		// $human_resource_mp['project_id'] = $this->input->post('project_id');
		// $human_resource_mp['status'] = $this->input->post('status');

		// $human_resource_mp['status'] = 1;
    	
  //   	$query = $this->human_resource_model->insertHumanResource($human_resource_mp);

  //       if($query){
  //           redirect('projects');
  //       }
  //   }


}