<?php
defined('BASEPATH') or exit('No direct script access allowed');

class StakeholderRegister extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('logged_in')) {
            redirect(base_url());
        }
        $this->load->helper('url');
        $this->load->model('Stakeholder_model');
        $this->load->model('view_model');
        $this->load->model('log_model');
        $this->load->helper('log_activity');


        $this->lang->load('btn', 'english');
        // $this->lang->load('btn','portuguese-brazilian');
        $this->lang->load('stakeholder', 'english');

        // $this->lang->load('manage-cost','portuguese-brazilian');

    }

    public function new($project_id)
    {
        $idusuario = $_SESSION['user_id'];
        $this->db->where('user_id', $idusuario);
        $this->db->where('project_id', $project_id);
        $project['dados'] = $this->db->get('project_user')->result();

        if (count($project['dados']) > 0) {
            $dado['id'] = $project_id;
            $this->load->view('frame/header_view');
            $this->load->view('frame/topbar');
            $this->load->view('frame/sidebar_nav_view', $project_id);
            $this->load->view('project/stakeholder/stakeholder_register/new', $dado);
        } else {
            redirect(base_url());
        }
    }

    public function delete($stakeholder_id)
    {
        $project_id['project_id'] = $this->input->post('project_id');
        //$project_id['project_id'] = $project_id;
        $query = $this->Stakeholder_model->delete($stakeholder_id);
        if ($query) {
            insertLogActivity('delete', 'stakeholder register');
            redirect('stakeholder/stakeholder-register/list/' . $project_id['project_id']);
        }
    }

    public function list($project_id)
    {
        $dado['project_id'] = $project_id;

        $dado['stakeholder'] = $this->Stakeholder_model->getAll($project_id);
        $this->load->view('frame/header_view');
        $this->load->view('frame/topbar');
        $this->load->view('frame/sidebar_nav_view');
        $this->load->view('project/stakeholder/stakeholder_register/list', $dado);
    }


    public function edit($stakeholder_id)
    {
        $query['stakeholder'] = $this->Stakeholder_model->get($stakeholder_id);
        $this->load->view('frame/header_view.php');
        $this->load->view('frame/topbar');
        $this->load->view('frame/sidebar_nav_view.php');
        $this->load->view('project/stakeholder/stakeholder_register/edit', $query);
    }

    public function update($stakeholder_id)
    {
        $stakeholder['name'] = $this->input->post('name');
        $stakeholder['type'] = $this->input->post('type');
        $stakeholder['organization'] = $this->input->post('organization');
        $stakeholder['position'] = $this->input->post('position');
        $stakeholder['role'] = $this->input->post('role');
        $stakeholder['responsibility'] = $this->input->post('responsibility');
        $stakeholder['email'] = $this->input->post('email');
        $stakeholder['phone_number'] = $this->input->post('phone_number');
        $stakeholder['work_place'] = $this->input->post('work_place');
        $stakeholder['essential_requirements'] = $this->input->post('essential_requirements');
        $stakeholder['main_expectations'] = $this->input->post('main_expectations');
        $stakeholder['interest_phase'] = $this->input->post('interest_phase');
        $stakeholder['observations'] = $this->input->post('observations');
        $stakeholder['project_id'] = $this->input->post('project_id');

        $data['stakeholder'] = $stakeholder;
        $query = $this->Stakeholder_model->update($data['stakeholder'], $stakeholder_id);

        if ($query) {
            insertLogActivity('update', 'stakeholder register');
            $this->session->set_flashdata('success', 'Stakeholder Register has been successfully changed!');
            redirect('stakeholder/stakeholder-register/list/' . $stakeholder['project_id']);
        }
    }


    public function insert($project_id)
    {
        $stakeholder['name'] = $this->input->post('name');
        $stakeholder['type'] = $this->input->post('type');
        $stakeholder['organization'] = $this->input->post('organization');
        $stakeholder['position'] = $this->input->post('position');
        $stakeholder['role'] = $this->input->post('role');
        $stakeholder['responsibility'] = $this->input->post('responsibility');
        $stakeholder['email'] = $this->input->post('email');
        $stakeholder['phone_number'] = $this->input->post('phone_number');
        $stakeholder['work_place'] = $this->input->post('work_place');
        $stakeholder['essential_requirements'] = $this->input->post('essential_requirements');
        $stakeholder['main_expectations'] = $this->input->post('main_expectations');
        $stakeholder['interest_phase'] = $this->input->post('interest_phase');
        $stakeholder['observations'] = $this->input->post('observations');
        $stakeholder['project_id'] = $project_id;

        $query = $this->Stakeholder_model->insert($stakeholder);

        if ($query) {
            insertLogActivity('insert', 'stakeholder register');
            $this->session->set_flashdata('success', 'Stakeholder Register has been successfully created!');
            redirect('stakeholder/stakeholder-register/list/' . $stakeholder['project_id']);
        }
    }
}
