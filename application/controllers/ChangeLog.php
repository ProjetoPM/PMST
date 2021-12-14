<?php
if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class ChangeLog extends CI_Controller
{

    function __construct()
    {

        parent::__Construct();
        if (!$this->session->userdata('logged_in')) {
            redirect(base_url());
        }

        if(strcmp($_SESSION['language'],"US") == 0){
            $this->lang->load('change_log', 'english');
            $this->lang->load('change_request', 'english');
            $this->lang->load('project-page', 'english');
        }else{
            $this->lang->load('change_log', 'english');
            $this->lang->load('change_request','portuguese-brazilian');
            $this->lang->load('project-page', 'portuguese-brazilian');
        }

        //$this->load->helper('url');
        $this->load->model('view_model');
        $this->load->model('project_model');
        $this->load->model('Change_log_model');
        $this->load->model('log_model');
        $this->load->helper('log_activity');
        $this->load->model('Change_request_model');

        // $this->lang->load('btn','portuguese-brazilian');
        // $this->lang->load('change_log', 'english');
        // $this->lang->load('change_log_view','portuguese-brazilian');
    }


    private function ajax_checking()
    {
        if (!$this->input->is_ajax_request()) {
            redirect(base_url());
        }
    }

    public function list($project_id)
    {
        if(strcmp($_SESSION['language'],"US") == 0){
            $this->lang->load('btn', 'english');
        }else{
            $this->lang->load('btn','portuguese-brazilian');
        }
        $dado['project_id'] = $project_id;
		$dado['change_request'] = $this->Change_request_model->getAll($project_id);
        $this->load->view('frame/header_view');
        $this->load->view('frame/topbar');
        $this->load->view('frame/sidebar_nav_view');
        $this->load->view('project/integration/change_log/list', $dado);
    }

    public function new($project_id)
    {
        if(strcmp($_SESSION['language'],"US") == 0){
            $this->lang->load('btn', 'english');
        }else{
            $this->lang->load('btn','portuguese-brazilian');
        }
        $query['project_id'] = $project_id;
        $this->load->view('frame/header_view');
        $this->load->view('frame/topbar');
        $this->load->view('frame/sidebar_nav_view');
        $this->load->view('project/integration/change_log/new', $query);
    }

    public function edit($change_log)
    {
        if(strcmp($_SESSION['language'],"US") == 0){
            $this->lang->load('btn', 'english');
        }else{
            $this->lang->load('btn','portuguese-brazilian');
        }

        $query['change_request'] = $this->Change_request_model->get($change_log);

        $this->load->view('frame/header_view');
        $this->load->view('frame/topbar');
        $this->load->view('frame/sidebar_nav_view');
        $this->load->view('project/integration/change_log/edit', $query);
    }



    public function insert()
    {
        $change_log['id_number'] = $this->input->post('id_number');
        $change_log['requester'] = $this->input->post('requester');
        $change_log['request_date'] = $this->input->post('request_date');
        $change_log['change_type'] = $this->input->post('change_type');
        $change_log['situation'] = $this->input->post('situation');
        $change_log['change_description'] = $this->input->post('change_description');
        $change_log['project_management_feedback'] = $this->input->post('project_management_feedback');
        $change_log['ccc_feedback'] = $this->input->post('ccc_feedback');
        $change_log['ccc_feedback_date'] = $this->input->post('ccc_feedback_date');
        $change_log['comments'] = $this->input->post('comments');
        $change_log['project_id'] = $this->input->post('project_id');

        $query = $this->Change_log_model->insert($change_log);

        if ($query) {
            insertLogActivity('insert', 'change log');
            redirect('integration/change-log/list/' . $change_log['project_id']);
        }
    }
    public function update()
    {
        $change_log['id_number'] = $this->input->post('id_number');
        $change_log['requester'] = $this->input->post('requester');
        $change_log['request_date'] = $this->input->post('request_date');

        $opcoes = array("Corrective Action", "Preventive Action", "Defect Repair", "Update");
        foreach ($opcoes as $teste) {
            $pieces = explode(" ", $teste);
            if ($pieces[0] == $this->input->post('change_type'))
                $change_log['change_type'] = $teste;
        }

        $opc = array("Under Analysis", "Approved", "Rejected", "Canceled", "Suspended");
        foreach ($opc as $testes) {
            $piece = explode(" ", $testes);
            if ($piece[0] == $this->input->post('situation'))
                $change_log['situation'] = $testes;
        }

        $change_log['change_description'] = $this->input->post('change_description');
        $change_log['project_management_feedback'] = $this->input->post('project_management_feedback');
        $change_log['ccc_feedback'] = $this->input->post('ccc_feedback');
        $change_log['ccc_feedback_date'] = $this->input->post('ccc_feedback_date');
        $change_log['comments'] = $this->input->post('comments');
        $change_log['project_id'] = $this->input->post('project_id');

        $query = $this->Change_log_model->update($change_log, $_SESSION['project_id']);

        if ($query) {
            insertLogActivity('update', 'change log');
            redirect('integration/change-log/list/' . $change_log['project_id']);
        }
    }

    public function delete($id)
    {
        $project_id['id'] = $this->input->post('project_id');
        $query = $this->Change_log_model->delete($id);
        if ($query) {
            insertLogActivity('delete', 'change log');
            redirect('integration/change-log/list/' . $_SESSION['project_id']);
        }
    }
}
