<?php
if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Procurement extends CI_Controller{
    
    public function __Construct(){
        parent::__Construct();
        if (!$this->session->userdata('logged_in')) {
            redirect(base_url());
        }
        $this->load->model('project_model');
        $this->load->model('procurement_mp_model');

        $this->lang->load('btn','english');
        // $this->lang->load('btn','portuguese-brazilian');
        $this->lang->load('procurement-mp','english');
        // $this->lang->load('procurement_mp','portuguese-brazilian');

    }
    
    private function ajax_checking(){
        if (!$this->input->is_ajax_request()) {
            redirect(base_url());
        }
    }

    public function new($project_id){
        $query['procurement_mp'] = $this->procurement_mp_model->getProcurement_mpProject_id($project_id);
        $query['project_id'] = $project_id;
        $this->load->view('frame/header_view');
        $this->load->view('frame/sidebar_nav_view'); 
        $this->load->view('project/procurement/procurement_mp', $query);

    }
    
    public function insert() {
        $procurement_mp['products_services_obtained'] = $this->input->post('products_services_obtained');
        $procurement_mp['team_actions'] = $this->input->post('team_actions');
        $procurement_mp['performance_metrics'] = $this->input->post('performance_metrics');
        $procurement_mp['procurement_management'] = $this->input->post('procurement_management');
        $procurement_mp['project_id'] = $this->input->post('project_id');
        $procurement_mp['status'] = 1;
        
        $query = $this->procurement_mp_model->insertProcurement_mp($procurement_mp);

        if($query){
            $this->load->view('frame/header_view');
            $this->load->view('frame/sidebar_nav_view');
            redirect('project/' . $procurement_mp['project_id']);
        }
    }

    public function update($id){
        $procurement_mp['products_services_obtained'] = $this->input->post('products_services_obtained');
        $procurement_mp['team_actions'] = $this->input->post('team_actions');
        $procurement_mp['performance_metrics'] = $this->input->post('performance_metrics');
        $procurement_mp['procurement_management'] = $this->input->post('procurement_management');
        $procurement_mp['project_id'] = $this->input->post('project_id');
        $procurement_mp['status'] = 1;
        
        $query = $this->procurement_mp_model->updateProcurement_mp($procurement_mp, $id);

        if($query){
            $this->load->view('frame/header_view');
            $this->load->view('frame/sidebar_nav_view');
            redirect('project/' . $procurement_mp['project_id']);
        }
    }        
}
?>