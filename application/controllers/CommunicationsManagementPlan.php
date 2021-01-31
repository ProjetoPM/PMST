<?php
if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class CommunicationsManagementPlan extends CI_Controller
{

    public function __Construct()
    {
        parent::__Construct();

       // $this->lang->load('btn', 'english');
        //$this->lang->load('btn','portuguese-brazilian');
        $this->lang->load('communication-item_lang', 'english');
        $this->lang->load('communication-item','portuguese-brazilian');

        if (!$this->session->userdata('logged_in')) {
            redirect(base_url());
        }
        $this->load->model('project_model');
        $this->load->model('view_model');
        $this->load->model('communications_mp_model');
        $this->load->model('log_model');
        $this->load->model('Communications_stakeholder_model');
        $this->load->helper('log_activity');
        $this->load->model('Stakeholder_model');
        $this->load->model('Project_Charter_model');
    }

    private function ajax_checking()
    {
        if (!$this->input->is_ajax_request()) {
            redirect(base_url());
        }
    }

    public function list($project_id)
    {
        $query['communication_item'] = $this->communications_mp_model->getAll($project_id);
        $query['communication_item_responsability'] = $this->communications_mp_model->getAll($project_id);
        $query['communication_stakeholder_responsability'] =[];
		foreach ($query['communication_item'] as $item) {
            foreach ($this->communications_mp_model->getAllResponsability($item->communication_item_id) as $resp){
                array_push($query['communication_stakeholder_responsability'],  $resp);
            }
           
        }
									

       
        //$query['communication_responsability'] = $this->communication_item_model->getAllCommunication_responsability();
        //$query['stakeholder'] = $this->communication_item_ model->getCommunication_stakeholder_item_id($project_id);
        $query['project_id'] = $project_id;
      
        $query['stakeholder'] = $this->Stakeholder_model->getAll($_SESSION['project_id']);
        $this->load->view('frame/header_view');
        $this->load->view('frame/topbar');
        $this->load->view('frame/sidebar_nav_view');
        $this->load->view('project/communication/communications_mp/list', $query);
    }

    public function new($project_id)
    {
        $idusuario = $_SESSION['user_id'];
        $this->db->where('user_id', $idusuario);
        $this->db->where('project_id', $project_id);
        $project['dados'] = $this->db->get('project_user')->result();

        if (count($project['dados']) > 0) {
            $query['communication_item'] = $this->communications_mp_model->getAll($project_id);
            $query['project_id'] = $project_id;
            $this->load->view('frame/header_view');
            $this->load->view('frame/topbar');
            $this->load->view('frame/sidebar_nav_view');
            $this->load->view('project/communication/communications_mp/new', $query);
        } else {
            redirect(base_url());
        }
    }

    public function edit($communication_item)
    {
        $query['communication_item'] = $this->communications_mp_model->get($communication_item);
        $query['project_id'] = $this->input->post('project_id');
        $this->load->view('frame/header_view');
        $this->load->view('frame/topbar');
        $this->load->view('frame/sidebar_nav_view');
        $this->load->view('project/communication/communications_mp/edit', $query);
    }

    public function insert()
    {
        $communication_item['type'] = $this->input->post('type');
        $communication_item['description'] = $this->input->post('description');
        $communication_item['content'] = $this->input->post('content');
        $communication_item['distribution_reason'] = $this->input->post('distribution_reason');
        $communication_item['language'] = $this->input->post('language');
        $communication_item['channel'] = $this->input->post('channel');
        $communication_item['document_format'] = $this->input->post('document_format');
        $communication_item['method'] = $this->input->post('method');
        $communication_item['frequency'] = $this->input->post('frequency');
        $communication_item['allocated_resources'] = $this->input->post('allocated_resources');
        $communication_item['format'] = $this->input->post('format');
        $communication_item['local'] = $this->input->post('local');
        $communication_item['project_id'] = $this->input->post('project_id');
        $communication_item['status'] = 1;

        $data['communication_item'] = $communication_item;
        $query = $this->communications_mp_model->insert($data['communication_item']);

        if ($query) {
            insertLogActivity('insert', 'communications management plan');
            redirect('communication/communications-mp/list/' . $communication_item['project_id']);
        }
    }


    public function insertResponasibility()
    {
        $communication = $this->input->post('ids');
        $communication_exploded = explode(',', $communication);

        $communication_responsability['communication_item_id'] = $communication_exploded[0];
        $communication_responsability['stakeholder_id'] = $communication_exploded[1];
        $communication_responsability['communication_responsability_id'] = $communication_exploded[2];


        $data['communication_responsability'] = $communication_responsability;
        $query = $this->Communications_stakeholder_model->insertResponasibility($data['communication_responsability']);

        if ($query) {
            redirect('communication/communications-mp/list/' . $_SESSION['project_id']);
        }
    }

    public function update($id)
    {
        $communication_item['type'] = $this->input->post('type');
        $communication_item['description'] = $this->input->post('description');
        $communication_item['content'] = $this->input->post('content');
        $communication_item['distribution_reason'] = $this->input->post('distribution_reason');
        $communication_item['language'] = $this->input->post('language');
        $communication_item['channel'] = $this->input->post('channel');
        $communication_item['document_format'] = $this->input->post('document_format');
        $communication_item['method'] = $this->input->post('method');
        $communication_item['frequency'] = $this->input->post('frequency');
        $communication_item['allocated_resources'] = $this->input->post('allocated_resources');
        $communication_item['format'] = $this->input->post('format');
        $communication_item['local'] = $this->input->post('local');
        $communication_item['project_id'] = $this->input->post('project_id');
        $communication_item['status'] = 1;

        $data['communication_item'] = $communication_item;
        $query = $this->communications_mp_model->update($data['communication_item'], $id);

        if ($query) {
            insertLogActivity('update', 'communications management plan');
            redirect('communication/communications-mp/list/' . $communication_item['project_id']);
        }
    }

    public function delete($id)
    {
        $project_id['id'] = $this->input->post('project_id');
        $query = $this->communications_mp_model->delete($id);
        if ($query) {
            insertLogActivity('delete', 'communications management plan');
            redirect('communication/communications-mp/list/' . $_SESSION['project_id']);
        }
    }
    //UPDATE
    function updateResponsability()
    {
        // var_dump($this->input->post('responsability'));
        // die;
        $communication_item_id = $this->input->post('communication_item_id');
        $communication_responsability_id = $this->input->post('communication_responsability_id');
        $stakeholder_responsability = $this->input->post('responsability');

        $data = $this->communications_mp_model->updateResponsability($communication_item_id, $communication_responsability_id, $stakeholder_responsability);
        echo json_encode($data);
        // $this->package_model->update_package($id, $package, $product);
        // redirect('package');
        //  redirect('communication/communications-mp/list/' . $_SESSION['project_id']);
    }
}
