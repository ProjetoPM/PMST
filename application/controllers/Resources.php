<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Resources extends CI_Controller
{
    
    function __construct()
    {
        parent::__construct();
        
        $this->load->model('Assumption_log_model');
        $this->load->model('Resources_model');
        $this->load->model('Project_model');
        $this->load->model('view_model');
        $this->load->model('log_model');
        

        $userInProject = $this->Project_model->userInProject($_SESSION['user_id'], $_SESSION['project_id']);
        
        if ($userInProject) {
            $this->session->set_flashdata('error3', 'You have no access to this project');
            redirect('projects/' . $_SESSION['project_id']);
        }
        
        if (!$this->session->userdata('logged_in')) {            
            redirect(base_url());
        }
        $this->load->helper('url');
        $this->load->helper('log_activity');

        
        
        if (strcmp($_SESSION['language'], "US") == 0) {
            $this->lang->load('resources', 'english');
            $this->lang->load('resource_requirements', 'english');
            $this->lang->load('project-page', 'english');
        } else {
            $this->lang->load('resources', 'portuguese-brazilian');
            $this->lang->load('resource_requirements', 'portuguese-brazilian');
            $this->lang->load('project-page', 'portuguese-brazilian');
        }
    }
    
    public function new()
    {
        if (strcmp($_SESSION['language'], "US") == 0) {
            $this->lang->load('btn', 'english');
        } else {
            $this->lang->load('btn', 'portuguese-brazilian');
        }
        
            $dado['id'] = $_SESSION['project_id'];
            $this->load->view('frame/header_view');
            $this->load->view('frame/topbar');
            $this->load->view('frame/sidebar_nav_view', $_SESSION['project_id']);
            $this->load->view('project/schedule/resources/new', $dado);
        
    }
        
    public function insert()
    {
        if (strcmp($_SESSION['language'], "US") == 0) {
            $feedback_success = 'Item Created';
        } else {
            $feedback_success = 'Item Criado ';
        }

        $resource['resource_name'] = $this->input->post('resource_name');
        $resource['resource_description'] = $this->input->post('resource_description');
        $resource['cost_per_unit'] = $this->input->post('resource_cost_per_unit');
        $resource['resource_type'] = $this->input->post('resource_type');
        $resource['project_id'] = $_SESSION['project_id'];
        $query = $this->Resources_model->insert($resource);

        if ($query) {
            insertLogActivity('insert', 'project resource');
            $this->session->set_flashdata('success', $feedback_success);
            redirect('schedule/resource-requirements/list/' . $resource['project_id']);
        }
    
    }

    
    public function list($project_id)
    {
        if (strcmp($_SESSION['language'], "US") == 0) {
            $this->lang->load('btn', 'english');
        } else {
            $this->lang->load('btn', 'portuguese-brazilian');
        }
        
        $dado['project_id'] = $_SESSION['project_id'];
        $dado['assumption_log'] = $this->Assumption_log_model->getAll($_SESSION['project_id']);
        $this->load->view('frame/header_view');
        $this->load->view('frame/topbar');
        $this->load->view('frame/sidebar_nav_view');

        $this->load->view('project/integration/assumption_log/list', $dado);
    }


    public function edit($assumption_log_id)
    {
        if (strcmp($_SESSION['language'], "US") == 0) {
            $this->lang->load('btn', 'english');
        } else {
            $this->lang->load('btn', 'portuguese-brazilian');
        }

        $query['assumption_log'] = $this->Assumption_log_model->get($assumption_log_id);
        $query["fields"] = getAllFieldEvaluation($_SESSION['project_id'], "assumption log", $query['assumption_log']['assumption_log_id']);

        $this->load->view('frame/header_view.php');
        $this->load->view('frame/topbar');
        $this->load->view('frame/sidebar_nav_view.php');
        $this->load->view('project/integration/assumption_log/edit', $query);
    }

    public function update($assumption_log_id)
    {
        if (strcmp($_SESSION['language'], "US") == 0) {
            $feedback_success = 'Item Updated';
        } else {
            $feedback_success = 'Item Atualizado ';
        }

        $assumption_log['description_log'] = $this->input->post('description_log');
        // $assumption_log['type'] = $this->input->post('type');
        $assumption_log['project_id'] = $_SESSION['project_id'];
        $query = $this->Assumption_log_model->update($assumption_log, $assumption_log_id);

        if ($query) {
            insertLogActivity('update', 'assumption log');
            $this->session->set_flashdata('success', $feedback_success);
            redirect('integration/assumption-log/list/' . $_SESSION['project_id']);
        }
    }

}
