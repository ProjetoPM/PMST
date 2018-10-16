<?php
if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Requirements_registration extends CI_Controller{

    public function __Construct(){
        parent::__Construct();
        if (!$this->session->userdata('logged_in')) {
            redirect(base_url());
        }
        $this->load->model('project_model');
        $this->load->model('requirements_registration_model');

        $this->lang->load('btn','english');
        // $this->lang->load('btn','portuguese-brazilian');
        $this->lang->load('requirements-registration','english');
        // $this->lang->load('requirements-registration','portuguese-brazilian');

    }
    
    private function ajax_checking(){
        if (!$this->input->is_ajax_request()) {
            redirect(base_url());
        }
    }

    public function list($project_id){
        $query['requirements_registration'] = $this->requirements_registration_model->getWithProject_id($project_id);
        $query['project_id'] = $project_id;
        $this->load->view('frame/header_view');
        $this->load->view('frame/sidebar_nav_view'); 
        $this->load->view('project/scope/requirement/list', $query);
    }

    public function new($project_id){
        $query['project_id'] = $project_id;
        $this->load->view('frame/header_view');
        $this->load->view('frame/sidebar_nav_view'); 
        $this->load->view('project/scope/requirement/new', $query);
    }

    public function edit($requirements_registration){
        $query['requirements_registration'] = $this->requirements_registration_model->get($requirements_registration);
        $this->load->view('frame/header_view');
        $this->load->view('frame/sidebar_nav_view'); 
        $this->load->view('project/scope/requirement/edit', $query);
    }
    
    public function insert() {
        $requirements_registration['associated_id'] = $this->input->post('associated_id');
        $requirements_registration['business_strategy'] = $this->input->post('business_strategy');
        $requirements_registration['priority'] = $this->input->post('priority');
        $requirements_registration['description'] = $this->input->post('description');
        $requirements_registration['version'] = $this->input->post('version');
        $requirements_registration['phase'] = $this->input->post('phase');
        $requirements_registration['associated_delivery'] = $this->input->post('associated_delivery');
        $requirements_registration['type'] = $this->input->post('type');
        $requirements_registration['requester'] = $this->input->post('requester');
        $requirements_registration['complexity'] = $this->input->post('complexity');
        $requirements_registration['acceptance_criteria'] = $this->input->post('acceptance_criteria');
        $requirements_registration['responsible'] = $this->input->post('responsible');
        $requirements_registration['validity'] = $this->input->post('validity');
        $requirements_registration['project_id'] = $this->input->post('project_id');
        
        $query = $this->requirements_registration_model->insert($requirements_registration);

        if($query){
            $this->load->view('frame/header_view');
            $this->load->view('frame/sidebar_nav_view');
            redirect($this->list($requirements_registration['project_id']));
        }
    }

    public function update($id){
        $requirements_registration['business_strategy'] = $this->input->post('business_strategy');
        $requirements_registration['priority'] = $this->input->post('priority');
        $requirements_registration['description'] = $this->input->post('description');
        $requirements_registration['version'] = $this->input->post('version');
        $requirements_registration['phase'] = $this->input->post('phase');
        $requirements_registration['associated_delivery'] = $this->input->post('associated_delivery');
        $requirements_registration['type'] = $this->input->post('type');
        $requirements_registration['requester'] = $this->input->post('requester');
        $requirements_registration['complexity'] = $this->input->post('complexity');
        $requirements_registration['acceptance_criteria'] = $this->input->post('acceptance_criteria');
        $requirements_registration['responsible'] = $this->input->post('responsible');
        $requirements_registration['validity'] = $this->input->post('validity');
        $requirements_registration['project_id'] = $this->input->post('project_id');
        
        $query = $this->requirements_registration_model->update($requirements_registration, $id);

        if($query){
            $this->load->view('frame/header_view');
            $this->load->view('frame/sidebar_nav_view');
            redirect('project/' . $requirements_registration['project_id']);
        }
    }

    public function delete($id){
        $project_id['id'] = $this->input->post('project_id');
        $query = $this->requirements_registration_model->delete($id);
        if($query){
            $this->load->view('frame/header_view');
            $this->load->view('frame/sidebar_nav_view');
            redirect('project/' . $project_id['id']);
        }
    }
}
?>