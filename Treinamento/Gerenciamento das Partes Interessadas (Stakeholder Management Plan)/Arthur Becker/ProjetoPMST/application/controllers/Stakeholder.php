<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Stakeholder extends CI_Controller {

     function index() {
        $this->db->select('*');
        $datastakeholder['stakeholder'] = $this->db->get('stakeholder')->result();
        $this->load->view('stakeholder/my_stakeholder', $datastakeholder);

        $this->load->model('mystakeholder_model');
        $data['stakeholder'] = $this->mystakeholder_model->show_stakeholders();

        $this->load->view('stakeholder', $data);
    }

    public function __Construct() {
        parent::__Construct();
        $this->load->model('Stakeholder_model');
    }

    private function ajax_checking(){
        if (!$this->input->is_ajax_request()) {
            redirect(base_url());
        }
    }

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
            $this->session->set_flashdata('success', 'Stakeholder '.$postData['nam
                '].' has been successfully created!');
        // }
        redirect('Stakeholder/show_stakeholders');
        echo json_encode($insert);            
    }


    public function show_stakeholders(){

            $this->db->select('*');
            $datastakeholder['stakeholder'] = $this->db->get_where('stakeholder')->result();

        $this->load->view('frame/header_view');
        $this->load->view('frame/sidebar_nav_view');
        $this->load->view('stakeholder/my_stakeholder', $datastakeholder);

    }

        //<!-- Begin Delete method --> 
    public function delete($stakelholder_id){
        $this->db->where('stakeholder_id', $id);
        if($this->db->delete('stakeholder')) {
            redirect('');
        } else {
            redirect('');
        }
    }
            //<!-- End Delete method --> 


            //<!-- Begin Update method --> 
    public function update($stakelholder_id){
       
        $this->db->where('stakeholder_id', $id);
        $dataproject['stakeholder'] = $this->db->get('stakeholder')->result();

        $this->load->view('frame/header_view');
        $this->load->view('frame/sidebar_nav_view');
        $this->load->view('stakeholder/edit_stakeholder', $datastakeholder);

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