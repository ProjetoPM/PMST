<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ClosedProcurementDocumentation extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('logged_in')) {
            redirect(base_url());
        }
        $this->load->helper('url');
        $this->load->model('Procurement_cpd_model');
        $this->load->model('view_model');
        $this->load->model('log_model');
        $this->load->helper('log_activity');


        $this->lang->load('btn', 'english');
        // $this->lang->load('btn','portuguese-brazilian');
        $this->lang->load('closed_procurement_documentation', 'english');

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
            $this->load->view('project/procurement/closed_procurement_documentation/new', $dado);
        } else {
            redirect(base_url());
        }
    }

    public function delete($closed_procurement_documentation_id)
    {
        $project_id['project_id'] = $this->input->post('project_id');
        //$project_id['project_id'] = $project_id;
        $query = $this->Procurement_cpd_model->delete($closed_procurement_documentation_id);
        if ($query) {
            insertLogActivity('delete', 'closed procurement documentation');
            redirect('procurement/closed-procurement-documentation/list/' . $project_id['project_id']);
        }
    }

    public function list($project_id)
    {
        $dado['project_id'] = $project_id;

        $dado['closed_procurement_documentation'] = $this->Procurement_cpd_model->getAll($project_id);
        $this->load->view('frame/header_view');
        $this->load->view('frame/topbar');
        $this->load->view('frame/sidebar_nav_view');
        $this->load->view('project/procurement/closed_procurement_documentation/list', $dado);
    }


    public function edit($closed_procurement_documentation_id)
    {
        $query['closed_procurement_documentation'] = $this->Procurement_cpd_model->get($closed_procurement_documentation_id);
        $this->load->view('frame/header_view.php');
        $this->load->view('frame/sidebar_nav_view.php');
        $this->load->view('project/procurement/closed_procurement_documentation/edit', $query);
    }

    public function update($closed_procurement_documentation_id)
    {
        $closed_procurement_documentation['provider'] = $this->input->post('provider\'s name');
        $closed_procurement_documentation['supplier_representative'] = $this->input->post('supplier representative');
        $dclosed_procurement_documentation['main_deliveries'] = $this->input->post('main deliveries of this project');
        $closed_procurement_documentation['closing_date'] = $this->input->post('closing_date');
        $closed_procurement_documentation['project_id'] = $this->input->post('project_id');
        $data['closed_procurement_documentation'] = $closed_procurement_documentation;
        $query = $this->Procurement_cpd_model->update($data['closed_procurement_documentation'], $closed_procurement_documentation_id);

        if ($query) {
            insertLogActivity('update', 'closed procurement documentation register');
            $this->session->set_flashdata('success', 'Closed Procurement Documentation has been successfully changed!');
            redirect('procurement/closed-procurement-documentation/list/' . $closed_procurement_documentation['project_id']);
        }
    }


    public function insert($project_id)
    {
        $closed_procurement_documentation['provider'] = $this->input->post('provider');
        $closed_procurement_documentation['supplier_representative'] = $this->input->post('supplier_representative');
        $closed_procurement_documentation['main_deliveries'] = $this->input->post('main_deliveries');
        $closed_procurement_documentation['closing_date'] = $this->input->post('closing_date');
        $closed_procurement_documentation['project_id'] = $_SESSION["project_id"];

        $query = $this->Procurement_cpd_model->insert($closed_procurement_documentation);

        if ($query) {
            insertLogActivity('insert', 'closed procurement documentation');
            $this->session->set_flashdata('success', 'Closed Procurement Documentation has been successfully created!');
            redirect('procurement/closed-procurement-documentation/list/' . $closed_procurement_documentation['project_id']);
        }
    }
}
