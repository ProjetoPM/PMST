<?php
defined('BASEPATH') or exit('No direct script access allowed');

class DeliverableStatus extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('logged_in')) {
            redirect(base_url());
        }
        $this->load->helper('url');
        $this->load->model('Delivery_acceptance_term_model');
        $this->load->model('view_model');
        $this->load->model('log_model');
        $this->load->helper('log_activity');


        $this->lang->load('btn', 'english');
        // $this->lang->load('btn','portuguese-brazilian');
        $this->lang->load('delivery_acceptance_term', 'english');

        // $this->lang->load('manage-cost','portuguese-brazilian');

    }

    public function new($project_id)
    {
        $idusuario = $_SESSION['user_id'];
        $this->db->where('user_id', $idusuario);
        $this->db->where('project_id', $project_id);
        $project['dados'] = $this->db->get('project_user')->result();


        if (count($project['dados']) > 0) {
            $dado['project_id'] = $project_id;
            $this->load->view('frame/header_view');
            $this->load->view('frame/topbar');
            $this->load->view('frame/sidebar_nav_view');
            $this->load->view('project/integration/delivery_acceptance_term/new', $dado);
        } else {
            redirect(base_url());
        }
    }

    public function delete($id)
    {
        $project_id['project_id'] = $this->input->post('project_id');
        //var_dump($id);exit;die;
        $query = $this->Delivery_acceptance_term_model->delete($id);
        if ($query) {
            insertLogActivity('delete', 'deliverable status');
            redirect('integration/deliverable-status/list/' . $_SESSION['project_id']);
        }
    }

    public function list($project_id)
    {
        $dado['project_id'] = $project_id;
        $dado['delivery_acceptance_term'] = $this->Delivery_acceptance_term_model->getAll($project_id);
        $this->load->view('frame/header_view');
        $this->load->view('frame/topbar');
        $this->load->view('frame/sidebar_nav_view');
        $this->load->view('project/integration/delivery_acceptance_term/list', $dado);
    }


    public function edit($project_id)
    {
        $query['delivery_acceptance_term'] = $this->Delivery_acceptance_term_model->get($project_id);
        $this->load->view('frame/header_view');
        $this->load->view('frame/topbar');
        $this->load->view('frame/sidebar_nav_view');
        $this->load->view('project/integration/delivery_acceptance_term/edit', $query);
    }



    public function update($project_id)
    {

        $delivery_acceptance_term['validator_name'] = $this->input->post('validator_name');
        $delivery_acceptance_term['role'] = $this->input->post('role');
        $delivery_acceptance_term['function'] = $this->input->post('function');
        $delivery_acceptance_term['validation_date'] = $this->input->post('validation_date');
        $delivery_acceptance_term['comments'] = $this->input->post('comments');

        $delivery_acceptance_term['project_id'] = $this->input->post('project_id');

        $data['delivery_acceptance_term'] = $delivery_acceptance_term;
        $query = $this->Delivery_acceptance_term_model->update($data['delivery_acceptance_term'], $project_id);

        if ($query) {
            insertLogActivity('update', 'deliverable status');
            $this->session->set_flashdata('success', 'Deliverable Status has been successfully changed!');
            redirect('integration/deliverable-status/list/' . $delivery_acceptance_term['project_id']);
        }
    }

    public function insert($project_id)
    {
        $delivery_acceptance_term['validator_name'] = $this->input->post('validator_name');
        $delivery_acceptance_term['role'] = $this->input->post('role');
        $delivery_acceptance_term['function'] = $this->input->post('function');
        $delivery_acceptance_term['validation_date'] = $this->input->post('validation_date');
        $delivery_acceptance_term['comments'] = $this->input->post('comments');

        $delivery_acceptance_term['project_id'] = $this->input->post('project_id');

        $query = $this->Delivery_acceptance_term_model->insert($delivery_acceptance_term);

        if ($query) {
            insertLogActivity('insert', 'deliverable status');
            $this->session->set_flashdata('success', 'Deliverable Status has been successfully created!');
            redirect('integration/deliverable-status/list/' . $delivery_acceptance_term['project_id']);
        }
    }
}
