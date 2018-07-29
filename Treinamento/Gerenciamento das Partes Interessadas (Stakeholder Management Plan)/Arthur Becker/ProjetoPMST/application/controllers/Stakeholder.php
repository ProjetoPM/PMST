<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Stakeholder extends CI_Controller {

    function index() {
        $data[stakeholder] = $this->Stakeholder_model->getAllStakeholder();
        $this->load->view('my_stakeholder.php', $data)
        // $this->db->select('*');
        // $dataproject['project'] = $this->db->get('project')->result();
        // $this->load->view('project/my_projects', $dataproject);

        // $this->load->model('myproject_model');
        // $data['project'] = $this->myproject_model->showproject();

        // $this->load->view('project', $data);        
    }

    public function __Construct() {
        parent::__Construct();
        // if(!$this->session->userdata('logged_in')) {
        //     redirect(base_url());
        // }
        $this->load->helper('url');
        $this->load->model('Stakeholder_model');
    }

    // private function ajax_checking(){
    //     if (!$this->input->is_ajax_request()) {
    //         redirect(base_url());
    //     }
    // }

    public function stakeholder_form(){

        $data = array(
            'formTitle' => 'New Stakeholder',
            'title' => 'New Stakeholder'
        );

        $this->load->view('frame/header_view');
        $this->load->view('frame/sidebar_nav_view');
        $this->load->view('stakeholder/new_stakeholder', $data);

    }


    function add_stakeholder(){
            //$this->ajax_checking();

        $postData = $this->input->post();
        $insert = $this->Stakeholder_model->insert_stakeholder($postData);
        // if($insert['status'] == 'success'){
            $this->session->set_flashdata('success', 'Stakeholder '.$postData['title'].' has been successfully created!');
        // }
        redirect('Stakeholder/show_stakeholders');
        echo json_encode($insert);            
    }


    public function show_stakeholders(){

            $this->db->select('*');
        // $dataproject['project'] = $this->db->get_where('project', array('created_by' => $this->session->userdata('user_id') ))->result();
            $dataproject['project'] = $this->db->get_where('project')->result();

        $this->load->view('frame/header_view');
        $this->load->view('frame/sidebar_nav_view');
        //O erro do topo da pag ta nesse "$dataproject" Resolver depois
        // $this->load->view('stakeholder/my_stakeholder', $dataproject);
        $this->load->view('stakeholder/my_stakeholder', $datastakeholder);

    }

        //<!-- Begin Delete method --> 
    public function delete($stakelholder_id){
        $query = $this->Stakelholder_model->deletestakelholder($stakelholder_id);

        if($query){
            header('location:'.base_url().$this->index());
        }
    }
            //<!-- End Delete method --> 


            //<!-- Begin Update method --> 
    public function update($stakelholder_id){
        $stakelholder['name'] = $this->input->post('name');
        $stakelholder['roles_responsabilies'] = $this->input->post('roles_responsabilies');
        $stakelholder['status'] = $this->input->post('status');

        $query = $this->Stakelholder_model->updatestakelholder($stakelholder, $stakelholder_id);

        if($query){
            header('location:'.base_url().$this->index());
        }
    }
            //<!-- End Update method --> 

    public function saveUpdate(){
            //$this->ajax_checking();

        $postData = $this->input->post();

        $this->db->where('stakeholder_id', $postData['stakeholder_id']);

        if($this->db->update('Stakeholder', $postData)){
            $this->session->set_flashdata('success', 'Stakeholder '.$postData['name'].' has been updated created!');
        }
        redirect('stakelholder/show_stakeholders');
        //echo json_encode($insert);            
    }
}
?>