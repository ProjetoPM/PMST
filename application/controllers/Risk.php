<?php
if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Risk extends CI_Controller{
    
    public function __Construct(){
        parent::__Construct();
        if (!$this->session->userdata('logged_in')) {
            redirect(base_url());
        }
        $this->load->model('project_model');
        $this->load->model('risk_mp_model');
    }
    
    private function ajax_checking(){
        if (!$this->input->is_ajax_request()) {
            redirect(base_url());
        }
    }

    public function risk_form($project_id){
        $query['risk_mp'] = $this->risk_mp_model->getRisk_mpProject_id($project_id);
        $query['project_id'] = $project_id;
        $this->load->view('frame/header_view');
        $this->load->view('frame/sidebar_nav_view'); 
        $this->load->view('project/risk_mp', $query);
    }
    
    public function insert() {
        $risk_mp['methodology'] = $this->input->post('methodology');
        $risk_mp['roles_responsibilities'] = $this->input->post('roles_responsibilities');
        $risk_mp['risk_management_processes'] = $this->input->post('risk_management_processes');
        $risk_mp['risks_categories'] = $this->input->post('risks_categories');
        $risk_mp['risks_probability_impact'] = $this->input->post('risks_probability_impact');
        $risk_mp['probability_impact_matrix'] = $this->input->post('probability_impact_matrix');
        $risk_mp['reviewed_tolerances'] = $this->input->post('reviewed_tolerances');
        $risk_mp['traceability'] = $this->input->post('traceability');
        $risk_mp['project_id'] = $this->input->post('project_id');
        $risk_mp['status'] = $this->input->post('status');
        
        if($this->input->post('status') == 1){
            $risk_mp['status'] = 1;
        }else{
            $risk_mp['status'] = 0;
        }
        $query = $this->risk_mp_model->insertRisk_mp($risk_mp);

        if($query){
            redirect('projects');
        }
    }

    public function update($id){
        $risk_mp['methodology'] = $this->input->post('methodology');
        $risk_mp['roles_responsibilities'] = $this->input->post('roles_responsibilities');
        $risk_mp['risk_management_processes'] = $this->input->post('risk_management_processes');
        $risk_mp['risks_categories'] = $this->input->post('risks_categories');
        $risk_mp['risks_probability_impact'] = $this->input->post('risks_probability_impact');
        $risk_mp['probability_impact_matrix'] = $this->input->post('probability_impact_matrix');
        $risk_mp['reviewed_tolerances'] = $this->input->post('reviewed_tolerances');
        $risk_mp['traceability'] = $this->input->post('traceability');
        $risk_mp['project_id'] = $this->input->post('project_id');
        $risk_mp['status'] = $this->input->post('status');
        if($this->input->post('status') == 1){
            $risk_mp['status'] = 1;
        }else{
            $risk_mp['status'] = 0;
        }
            $query = $this->risk_mp_model->updateRisk_mp($risk_mp, $id);

        if($query){
            redirect('projects');
        }
    }
}
?>