<?php
if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class ResourceManagementPlan extends CI_Controller
{

    public function __Construct()
    {
        parent::__Construct();

        // $this->load->helper('url', 'english');

        // $this->lang->load('btn','portuguese-brazilian');
        
        // $this->lang->load('resource','portuguese-brazilian');

        if (!$this->session->userdata('logged_in')) {
            redirect(base_url());
        }

        if (strcmp($_SESSION['language'], "US") == 0) {
            $this->lang->load('resource', 'english');
            $this->lang->load('project-page', 'english');
        } else {
            $this->lang->load('resource', 'portuguese-brazilian');
            $this->lang->load('project-page', 'portuguese-brazilian');
        }

        $this->load->model('project_model');
        $this->load->helper('log_activity');
        $this->load->model('view_model');
        $this->load->model('log_model');
        $this->load->model('human_resource_model');
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
            $dado['human_resources_mp'] = $this->human_resource_model->get($project_id);
            if ($dado['human_resources_mp'] != null) {
                redirect("resources/resource-mp/edit/" . $_SESSION['project_id']);
            }

            $this->load->view('frame/header_view');
            $this->load->view('frame/topbar');
            $this->load->view('frame/sidebar_nav_view');
            $this->load->view('project/human_resource/human_resource_mp/new', $dado);
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
            $dado['human_resources_mp'] = $this->human_resource_model->get($project_id);
            if ($dado['human_resources_mp'] == null) {
                redirect("resources/resource-mp/new/" . $_SESSION['project_id']);
            }

            $this->load->view('frame/header_view');
            $this->load->view('frame/topbar');
            $this->load->view('frame/sidebar_nav_view');
            $this->load->view('project/human_resource/human_resource_mp/edit', $dado);
        } else {
            redirect(base_url());
        }
    }

    public function insert()
    {
        if(strcmp($_SESSION['language'],"US") == 0){
			$feedback_success = 'Item Created';
        }else{
			$feedback_success = 'Item Criado ';
		}

        $human_resource_mp['roles_responsibilities'] = $this->input->post('roles_responsibilities');
        $human_resource_mp['organizational_chart'] = $this->input->post('organizational_chart');
        $human_resource_mp['staff_mp'] = $this->input->post('staff_mp');
        $human_resource_mp['project_id'] = $_SESSION['project_id'];
        $human_resource_mp['status'] = 1;
        $human_resource_mp['identification_resources'] = $this->input->post('identification_resources');
        $human_resource_mp['acquiring_resources'] = $this->input->post('acquiring_resources');
        $human_resource_mp['training'] = $this->input->post('training');
        $human_resource_mp['team_development'] =  $this->input->post('team_development');
        $human_resource_mp['control'] = $this->input->post('control');
        $human_resource_mp['recognition_plan'] = $this->input->post('recognition_plan');
       

        $query = $this->human_resource_model->insert($human_resource_mp);

        if ($query) {
            insertLogActivity('insert', 'resource management plan');
            $this->session->set_flashdata('success', $feedback_success);
            redirect("resources/resource-mp/edit/" . $_SESSION['project_id']);
        }
    }

    public function update()
    {
        if(strcmp($_SESSION['language'],"US") == 0){
			$feedback_success = 'Item Updated';
        }else{
			$feedback_success = 'Item Atualizado ';
		}

        $human_resources_mp['roles_responsibilities'] = $this->input->post('roles_responsibilities');
        $human_resources_mp['organizational_chart'] = $this->input->post('organizational_chart');
        $human_resources_mp['staff_mp'] = $this->input->post('staff_mp');       
        $human_resources_mp['identification_resources'] = $this->input->post('identification_resources');
        $human_resources_mp['acquiring_resources'] = $this->input->post('acquiring_resources');
        $human_resources_mp['training'] = $this->input->post('training');
        $human_resources_mp['team_development'] =  $this->input->post('team_development');
        $human_resources_mp['control'] = $this->input->post('control');
        $human_resources_mp['recognition_plan'] = $this->input->post('recognition_plan');
        $human_resources_mp['status'] = 1;
        $query = $this->human_resource_model->update($human_resources_mp, $_SESSION['project_id']);

        if ($query) {
            insertLogActivity('update', 'resource management plan');
            $this->session->set_flashdata('success', $feedback_success);
            redirect("resources/resource-mp/edit/" . $_SESSION['project_id']);
        }
    }
}
