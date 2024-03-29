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
        $this->load->helper('log_activity');

        $this->load->model('log_model');
        $this->load->model('view_model');
        $this->load->model('Project_model');
        $this->load->model('Stakeholder_model');
        $this->load->model('Delivery_acceptance_term_model');

        $array = array();
		array_push($array, 'delivery_acceptance_term');
		loadLangs($array);

		$userInProject = $this->Project_model->userInProject($_SESSION['user_id'], $_SESSION['project_id']);
		
		if ($userInProject) {
			$this->session->set_flashdata('error3', 'You have no access to this project');
			redirect('projects/' . $_SESSION['project_id']);
		}
    }

    public function new($project_id)
    {
        if (strcmp($_SESSION['language'], "US") == 0) {
            $this->lang->load('btn', 'english');
        } else {
            $this->lang->load('btn', 'portuguese-brazilian');
        }
        
        $dado['stakeholder'] = $this->Stakeholder_model->getAll($_SESSION['project_id']);
        $idusuario = $_SESSION['user_id'];
        $this->db->where('user_id', $idusuario);
        $this->db->where('project_id', $project_id);
        $project['dados'] = $this->db->get('project_user')->result();
        
        
        if (count($project['dados']) > 0) {
            $dado['stakeholders'] = $this->Stakeholder_model->getAll($_SESSION['project_id']);
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
        // $project_id['project_id'] = $this->input->post('project_id');
        $query = $this->Delivery_acceptance_term_model->delete($id);
        if ($query) {
            insertLogActivity('delete', 'deliverable status');
            // $this->session->set_flashdata('error', 'Deliverable Status has been deleted!');
            // redirect('integration/deliverable-status/list/' . $_SESSION['project_id']);
        }
    }
    
    public function list($project_id)
    {
        $dado['stakeholder'] = $this->Stakeholder_model->getAll($_SESSION['project_id']);
        $dado['project_id'] = $project_id;
        $dado['delivery_acceptance_term'] = $this->Delivery_acceptance_term_model->getAll($project_id);
        $this->load->view('frame/header_view');
        $this->load->view('frame/topbar');
        $this->load->view('frame/sidebar_nav_view');
        $this->load->view('project/integration/delivery_acceptance_term/list', $dado);
    }


    public function edit($id)
    {
        if (strcmp($_SESSION['language'], "US") == 0) {
            $this->lang->load('btn', 'english');
        } else {
            $this->lang->load('btn', 'portuguese-brazilian');
        }
        $query['stakeholder'] = $this->Stakeholder_model->getAll($id);
        $query['delivery_acceptance_term'] = $this->Delivery_acceptance_term_model->get($id);
        
        $dado["fields"] = getAllFieldEvaluation($_SESSION['project_id'], "deliverable status", $query['delivery_acceptance_term']['id']);

        $this->load->view('frame/header_view');
        $this->load->view('frame/topbar');
        $this->load->view('frame/sidebar_nav_view');
        $this->load->view('project/integration/delivery_acceptance_term/edit', $query);
    }

    public function update($project_id)
    {
        if(strcmp($_SESSION['language'],"US") == 0){
			$feedback_success = 'Item Updated';
        }else{
			$feedback_success = 'Item Atualizado ';
		}

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
            $this->session->set_flashdata('success', $feedback_success);
            redirect('integration/deliverable-status/list/' . $delivery_acceptance_term['project_id']);
        }
    }

    public function insert($project_id)
    {
        if(strcmp($_SESSION['language'],"US") == 0){
			$feedback_success = 'Item Created';
        }else{
			$feedback_success = 'Item Criado ';
		}

        $delivery_acceptance_term['validator_name'] = $this->input->post('validator_name');
        $delivery_acceptance_term['role'] = $this->input->post('role');
        $delivery_acceptance_term['function'] = $this->input->post('function');
        $delivery_acceptance_term['validation_date'] = $this->input->post('validation_date');
        $delivery_acceptance_term['comments'] = $this->input->post('comments');

        $delivery_acceptance_term['project_id'] = $this->input->post('project_id');

        $query = $this->Delivery_acceptance_term_model->insert($delivery_acceptance_term);

        if ($query) {
            insertLogActivity('insert', 'deliverable status');
            $this->session->set_flashdata('success', $feedback_success);
            redirect('integration/deliverable-status/list/' . $delivery_acceptance_term['project_id']);
        }
    }
}
