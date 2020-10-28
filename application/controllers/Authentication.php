<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Authentication extends CI_Controller {

    public function __Construct() {
        parent::__Construct();
        $this->load->model("authentication_model");
    }

    public function index() {

        if($this->session->userdata('logged_in')) {
            redirect(base_url("projects"));
        }else {
            $data = array('alert' => false);
            $this->load->view('login',$data);
        }
    }

    public function register() {
            $this->load->view('register');
    }

    public function forgot() {
            $this->load->view('forgot');
    }

    private function ajax_checking(){
        if (!$this->input->is_ajax_request()) {
            redirect(base_url());
        }
    }

    public function login(){
        $_SESSION['project_id'] = null;
        $postData = $this->input->post();
        if(($postData) == null){
            redirect(base_url());
        }
        $validate = $this->authentication_model->validate_login($postData);
        if ($validate){
            $newdata = array(
                'email'     => $validate[0]->email,
                'name' => $validate[0]->name,
                'role' => $validate[0]->role,
                'user_id' => $validate[0]->user_id,
                'logged_in' => TRUE,

            );
            $this->session->set_userdata($newdata);
            redirect(base_url("projects"));
        }
        else{
            $data = array('alert' => true);
            $this->load->view('login',$data);
            $this->session->set_flashdata('flashError', 'the email or password is incorrect!');
        }

    }

    function change_password(){
        $this->ajax_checking();

        $postData = $this->input->post();
        $update = $this->authentication_model->change_password($postData);
        if($update['status'] == 'success')
            $this->session->set_flashdata('success', 'Your password has been successfully changed!');

        echo json_encode($update);
    }

    public function logout() {
        $this->session->sess_destroy();
        redirect(base_url());
    }


}

/* End of file */
