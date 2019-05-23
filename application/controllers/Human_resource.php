<?php
if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Human_resource extends CI_Controller{

    public function __Construct(){
        parent::__Construct();

        // $this->load->helper('url', 'english');
        
        $this->lang->load('btn','english');
        // $this->lang->load('btn','portuguese-brazilian');
        $this->lang->load('human-resource','english');
        // $this->lang->load('human-resource','portuguese-brazilian');
        
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

    public function new($project_id){
        $data['human_resources_mp'] = $this->human_resource_model->getHumanResourceProject_id($project_id);
        $data['id'] = $project_id;
        $this->load->view('frame/header_view');
        $this->load->view('frame/sidebar_nav_view');
        $this->load->view('project/human_resource/human_resource_mp', $data);
    }

    public function insert($id){
        $data['human_resource_mp'] = $this->human_resource_model->getHumanResourceProject_id($id);
        $human_resource_mp['roles_responsibilities'] = $this->input->post('roles_responsibilities');
        $human_resource_mp['organizational_chart'] = $this->input->post('organizational_chart');
        $human_resource_mp['staff_mp'] = $this->input->post('staff_mp');
        $human_resource_mp['project_id'] = $id;
        $human_resource_mp['status'] = $this->input->post('status');

        $human_resource_mp['status'] = 1;
        
        $query = $this->human_resource_model->insertHumanResource($human_resource_mp);

        if($query){
            $this->load->view('frame/header_view');
            $this->load->view('frame/sidebar_nav_view');
            redirect('project/'.$human_resource_mp['project_id']);
        }
    }

    public function update($id){
        $human_resources_mp['roles_responsibilities'] = $this->input->post('roles_responsibilities');
        $human_resources_mp['organizational_chart'] = $this->input->post('organizational_chart');
        $human_resources_mp['staff_mp'] = $this->input->post('staff_mp');
        $human_resource_mp['project_id'] = $this->input->post('project_id');
        $human_resources_mp['status'] = $this->input->post('status');

        $human_resources_mp['status'] = 1;
        
        $query = $this->human_resource_model->updateHumanResource($human_resources_mp, $id);

        if($query){
            $this->load->view('frame/header_view');
            $this->load->view('frame/sidebar_nav_view');
            redirect('project/'.$human_resource_mp['project_id']);
        }
    }  
}