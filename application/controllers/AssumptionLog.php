<?php
defined('BASEPATH') or exit('No direct script access allowed');

class AssumptionLog extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('logged_in')) {
            redirect(base_url());
        }
        $this->load->helper('url');
        $this->load->model('Assumption_log_model');
        $this->load->model('view_model');
        $this->load->model('log_model');
        $this->load->helper('log_activity');


        if (strcmp($_SESSION['language'], "US") == 0) {
            $this->lang->load('assumption_log', 'english');
            $this->lang->load('btn', 'english');
            $this->lang->load('project-page', 'english');
        } else {
            $this->lang->load('assumption_log', 'portuguese-brazilian');
            $this->lang->load('btn', 'portuguese-brazilian');
            $this->lang->load('project-page', 'portuguese-brazilian');
        }

        // $this->lang->load('manage-cost','portuguese-brazilian');

    }

    public function new_assumption($project_id)
    {

        if (strcmp($_SESSION['language'], "US") == 0) {
            $this->lang->load('btn', 'english');
        } else {
            $this->lang->load('btn', 'portuguese-brazilian');
        }

        $idusuario = $_SESSION['user_id'];
        $this->db->where('user_id', $idusuario);
        $this->db->where('project_id', $_SESSION['project_id']);
        $project['dados'] = $this->db->get('project_user')->result();

        if (count($project['dados']) > 0) {
            $dado['id'] = $_SESSION['project_id'];
            $dado['type'] = "A";
            $this->load->view('frame/header_view');
            $this->load->view('frame/topbar');
            $this->load->view('frame/sidebar_nav_view', $_SESSION['project_id']);
            $this->load->view('project/integration/assumption_log/new', $dado);
        } else {
            redirect(base_url());
        }
    }

    public function new_constraint($project_id)
    {
        if (strcmp($_SESSION['language'], "US") == 0) {
            $this->lang->load('btn', 'english');
        } else {
            $this->lang->load('btn', 'portuguese-brazilian');
        }

        $idusuario = $_SESSION['user_id'];
        $this->db->where('user_id', $idusuario);
        $this->db->where('project_id', $_SESSION['project_id']);
        $project['dados'] = $this->db->get('project_user')->result();

        if (count($project['dados']) > 0) {
            $dado['id'] = $_SESSION['project_id'];
            $dado['type'] = "C";
            $this->load->view('frame/header_view');
            $this->load->view('frame/topbar');
            $this->load->view('frame/sidebar_nav_view', $_SESSION['project_id']);
            $this->load->view('project/integration/assumption_log/new', $dado);
        } else {
            redirect(base_url());
        }
    }

    public function delete($assumption_log_id)
    {
        $project_id['project_id'] = $this->input->post('project_id');
        //$project_id['project_id'] = $project_id;
        $query = $this->Assumption_log_model->delete($assumption_log_id);
        if ($query) {
            insertLogActivity('delete', 'assumption log');
            redirect('integration/assumption-log/list/' . $_SESSION['project_id']);
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
        $this->load->view('frame/header_view.php');
        $this->load->view('frame/sidebar_nav_view.php');
        $this->load->view('project/integration/assumption_log/edit', $query);
    }

    public function update($assumption_log_id)
    {
        if(strcmp($_SESSION['language'],"US") == 0){
			$feedback_success = 'Item Updated';
        }else{
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


    public function insert($project_id)
    {
        if(strcmp($_SESSION['language'],"US") == 0){
			$feedback_success = 'Item Created';
        }else{
			$feedback_success = 'Item Criado ';
		}

        $assumption_log['description_log'] = $this->input->post('description_log');
        $assumption_log['type'] = $this->input->post('type');
        $assumption_log['project_id'] = $_SESSION['project_id'];
        $query = $this->Assumption_log_model->insert($assumption_log);

        if ($query) {
            insertLogActivity('insert', 'assumption log');
            $this->session->set_flashdata('success', $feedback_success);
            redirect('integration/assumption-log/list/' . $_SESSION['project_id']);
        }
    }
}
