<?php
if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Communication_item extends CI_Controller{

    public function __Construct(){
        parent::__Construct();

        $this->lang->load('btn','english');
        //$this->lang->load('btn','portuguese-brazilian');
        $this->lang->load('communication-item','english');
        //$this->lang->load('communication-item','portuguese-brazilian');

        if (!$this->session->userdata('logged_in')) {
            redirect(base_url());
        }
        $this->load->model('project_model');
        $this->load->model('communication_item_model');
        $this->load->model('Communication_item_stakeholder_model');
    }

    private function ajax_checking(){
        if (!$this->input->is_ajax_request()) {
            redirect(base_url());
        }
    }

    public function list($project_id){
        $query['communication_item'] = $this->communication_item_model->getWithProject_id($project_id);
        //$query['communication_responsability'] = $this->communication_item_model->getAllCommunication_responsability();
        //$query['stakeholder'] = $this->communication_item_model->getCommunication_stakeholder_item_id($project_id);
        $query['project_id'] = $project_id;
        $this->load->view('frame/header_view');
        $this->load->view('frame/sidebar_nav_view');
        $this->load->view('project/communication/communication_mp/communication_item/list', $query);
    }

    public function newp($project_id){
        $query['communication_item'] = $this->communication_item_model->getWithProject_id($project_id);
        $query['project_id'] = $project_id;
        $this->load->view('frame/header_view');
        $this->load->view('frame/sidebar_nav_view');
        $this->load->view('project/communication/communication_mp/communication_item/new', $query);

    }

    public function edit($communication_item){
        $query['communication_item'] = $this->communication_item_model->get($communication_item);
        $query['project_id'] = $this->input->post('project_id');
        $this->load->view('frame/header_view');
        $this->load->view('frame/sidebar_nav_view');
        $this->load->view('project/communication/communication_mp/communication_item/edit', $query);
    }

    public function insert() {
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
        $query = $this->communication_item_model->insert($data['communication_item']);

        if($query){
            $this->load->view('frame/header_view');
            $this->load->view('frame/sidebar_nav_view');
            redirect(base_url() . 'Communication_item/list/' . $communication_item['project_id']);
        }
    }


    public function insertResponasibility() {
        $communication = $this->input->post('ids');
        $communication_exploded = explode(',', $communication);

        $communication_responsability['communication_item_id'] = $communication_exploded[0];
        $communication_responsability['stakeholder_id'] = $communication_exploded[1];
        $communication_responsability['communication_responsability_id'] = $communication_exploded[2];


        $data['communication_responsability'] = $communication_responsability;
        $query = $this->Communication_item_stakeholder_model->insertResponasibility($data['communication_responsability']);

        if($query){
            redirect(base_url() . 'Communication_item/list/' . $communication_item['project_id']);
        }
    }

    public function update($id){
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
        $query = $this->communication_item_model->update($data['communication_item'], $id);

        if($query){
            $this->load->view('frame/header_view');
            $this->load->view('frame/sidebar_nav_view');
            redirect(base_url() . 'Communication_item/list/' . $communication_item['project_id']);
        }
   }

  public function delete($id){
        $project_id['id'] = $this->input->post('project_id');
        $query = $this->communication_item_model->delete($id);
        if($query){
            $this->load->view('frame/header_view');
            $this->load->view('frame/sidebar_nav_view');
            redirect(base_url() . 'Communication_item/list/' . $project_id['id']);
        }
    }
}
?>
