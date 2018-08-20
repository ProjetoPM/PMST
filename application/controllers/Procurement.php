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
    }
    
    private function ajax_checking(){
        if (!$this->input->is_ajax_request()) {
            redirect(base_url());
        }
    }

    public function add($project_id){
        $query = $this->procurement_mp_model->getProcurement_mpProject_id($project_id);
        if($query['procurement_mp_id'] != 0){
            $this->edit($query['procurement_mp_id']);
        }else{
            $data['project_id'] = $project_id;
            $this->load->view('frame/header_view');
            $this->load->view('frame/sidebar_nav_view'); 
            $this->load->view('project/procurement_mp', $data);
        }
    }
    
    public function insert() {
        $procurement_mp['products_services_obtained'] = $this->input->post('products_services_obtained');
        $procurement_mp['team_actions'] = $this->input->post('team_actions');
        $procurement_mp['performance_metrics'] = $this->input->post('performance_metrics');
        $procurement_mp['project_id'] = $this->input->post('project_id');
        $procurement_mp['status'] = $this->input->post('status');
        
        if($this->input->post('status') == 1){
            $procurement_mp['status'] = 1;
        }else{
            $procurement_mp['status'] = 0;
        }
        $query = $this->procurement_mp_model->insertProcurement_mp($procurement_mp);

        if($query){
            redirect('projects');
        }
    }

    public function edit($id){
        $data['procurement_mp'] = $this->procurement_mp_model->getPerocurement_mp($id);
        $this->load->view('edit_procurement_mp.php', $data);
    }

    public function update($id){
        $procurement_mp['products_services_obtained'] = $this->input->post('products_services_obtained');
        $procurement_mp['team_actions'] = $this->input->post('team_actions');
        $procurement_mp['performance_metrics'] = $this->input->post('performance_metrics');
        $procurement_mp['project_id'] = $this->input->post('project_id');
        $procurement_mp['status'] = $this->input->post('status');
        
        if($this->input->post('status') == 1){
            $procurement_mp['status'] = 1;
        }else{
            $procurement_mp['status'] = 0;
        }
        $query = $this->procurement_mp_model->updateProcurement_mp($procurement_mp, $id);

        if($query){
            redirect('projects');
        }
    }        
}
?>