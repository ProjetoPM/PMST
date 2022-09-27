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
        
		$langs = array();
        array_push($langs, 'resource_requirements', 'resources');
        
        loadLangs($langs);
    }
    private $document = 'resources';
    
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


    public function edit($resource_id)
    {
        if (strcmp($_SESSION['language'], "US") == 0) {
            $this->lang->load('btn', 'english');
        } else {
            $this->lang->load('btn', 'portuguese-brazilian');
        }

        $query['resource'] = $this->Resources_model->get($resource_id);
        $query["fields"] = getAllFieldEvaluation($_SESSION['project_id'], "resources", $query['resource']['resource_id']);

        $this->load->view('frame/header_view.php');
        $this->load->view('frame/topbar');
        $this->load->view('frame/sidebar_nav_view.php');
        $this->load->view('project/schedule/resources/edit', $query);
    }

    public function update($resource_id)
    {
        if (strcmp($_SESSION['language'], "US") == 0) {
            $feedback_success = 'Item Updated';
        } else {
            $feedback_success = 'Item Atualizado ';
        }

        $resource['resource_name'] = $this->input->post('resource_name');
        $resource['resource_type'] = $this->input->post('resource_type');
        $resource['resource_description'] = $this->input->post('resource_description');
        $resource['cost_per_unit'] = $this->input->post('resource_cost_per_unit');
        $resource['project_id'] = $_SESSION['project_id'];

        $query = $this->Resources_model->update($resource, $resource_id);

        if ($query) {
            insertLogActivity('update', $this->document);
            $this->session->set_flashdata('success', $feedback_success);
            redirect('schedule/resource-requirements/list/' . $resource['project_id']);
        }
    }

    public function delete($resource_id){

        $query = $this->Resources_model->delete($resource_id);

        if ($query) {
			insertLogActivity('delete', $this->document);
			redirect('schedule/resource-requirements/list/' . $_SESSION['project_id']);
		}
    }

}
