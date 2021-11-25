<?php
if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class ProcurementManagementPlan extends CI_Controller
{

    public function __Construct()
    {
        parent::__Construct();
        if (!$this->session->userdata('logged_in')) {
            redirect(base_url());
        }

        if (strcmp($_SESSION['language'], "US") == 0) {
            $this->lang->load('procurement-mp', 'english');
            $this->lang->load('project-page', 'english');
        } else {
            $this->lang->load('procurement-mp', 'portuguese-brazilian');
            $this->lang->load('project-page', 'portuguese-brazilian');
        }

        $this->load->helper('log_activity');
        $this->load->model('Project_model');
        $this->load->model('Procurement_mp_model');
        $this->load->model('view_model');
        $this->load->model('log_model');
        $this->lang->load('btn', 'english');
        
    }

    private function ajax_checking()
    {
        if (!$this->input->is_ajax_request()) {
            redirect(base_url());
        }
    }

    public function new($project_id)
    {

        if (strcmp($_SESSION['language'], "US") == 0) {
			$this->lang->load('btn', 'english');
		} else {
			$this->lang->load('btn', 'portuguese-brazilian');
		}
        
        $this->db->where('user_id',  $_SESSION['user_id']);
        $this->db->where('project_id',  $_SESSION['project_id']);
        $project['dados'] = $this->db->get('project_user')->result();
        // Verificando se o usuario logado tem acesso a esse projeto
        
        if (count($project['dados']) > 0) {
            $dado['procurement_mp'] = $this->Procurement_mp_model->get($project_id);
            if ($dado['procurement_mp'] != null) {
                redirect("procurement/procurement-mp/edit/" . $_SESSION['project_id']);
            }
            
            $this->load->view('frame/header_view'); 
		    $this->load->view('frame/topbar');
            $this->load->view('frame/sidebar_nav_view');
            $this->load->view('project/procurement/procurement_mp/new', $dado);
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
        
        $this->db->where('user_id',  $_SESSION['user_id']);
        $this->db->where('project_id',  $_SESSION['project_id']);
        $project['dados'] = $this->db->get('project_user')->result();
        
        if (count($project['dados']) > 0) {
            $dado['procurement_mp'] = $this->Procurement_mp_model->get($project_id);
            if ($dado['procurement_mp'] == null) {
                redirect("procurement/procurement-mp/new/" . $_SESSION['project_id']);
            }
            $dado["fields"] = getAllFieldEvaluation($_SESSION['project_id'], "requirements management plan", $dado['procurement_mp'][0]->procurement_mp_id);

            $this->load->view('frame/header_view'); 
		    $this->load->view('frame/topbar');
            $this->load->view('frame/sidebar_nav_view');
            $this->load->view('project/procurement/procurement_mp/edit', $dado);
        } else {
            redirect(base_url());
        }
    }

    public function insert()
    {
        insertLogActivity('insert', 'procurement management plan');

        $postData = $this->input->post();
        $insert   = $this->Procurement_mp_model->insert($postData);
        $this->session->set_flashdata('success', 'Procurement Management Plan has been successfully created!');
        redirect("procurement/procurement-mp/edit/" . $_SESSION['project_id']);
        echo json_encode($insert);
    }

    public function update()
    {
        $procurement_mp['products_services_obtained'] = $this->input->post('products_services_obtained');
        $procurement_mp['performance_metrics'] = $this->input->post('performance_metrics');
        $procurement_mp['procurement_management'] = $this->input->post('procurement_management');
        $procurement_mp['schedule_procurement_activities'] = $this->input->post('schedule_procurement_activities');
        $procurement_mp['estimates'] = $this->input->post('estimates');
        $procurement_mp['issues'] = $this->input->post('issues');
        $procurement_mp['sellers'] = $this->input->post('sellers');
        $procurement_mp['strategy'] = $this->input->post('strategy');
        $procurement_mp['constraint_assumption'] = $this->input->post('constraint_assumption');
        $procurement_mp['legal_jurisdiction'] = $this->input->post('legal_jurisdiction');
        $procurement_mp['roles'] = $this->input->post('roles');


        $procurement_mp['status'] = $this->input->post('status');

        $query = $this->Procurement_mp_model->update($procurement_mp, $_SESSION['project_id']);

        insertLogActivity('update', 'procurement management plan');
        $this->session->set_flashdata('success', 'Procurement Management Plan has been successfully changed!');
        redirect("procurement/procurement-mp/edit/" . $_SESSION['project_id']);
    }
}
