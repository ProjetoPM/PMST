<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Authentication extends CI_Controller {   
    public function __construct() {
        parent::__construct();
        $this->load->model("authentication_model");
        $this->load->library('user_agent');
        $this->load->model('view_model');
        $this->load->model('project_model');
        $this->load->helper('log_activity');
        $this->lang->load('btn', 'english');
    }

    public function index() {
        $_SESSION['language'] = 0;

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

    public function signature($item_id, $view_name) {
        $str_replace = str_replace("-", " ", $view_name);
        $postData = $this->input->post();

        if ($postData == null){
            $this->session->set_flashdata('error', 'Error: it was not possible to sign this document');
            redirect($this->agent->referrer());
        }
        $validate = $this->authentication_model->validate_login($postData);

        if ($validate && $this->project_model->getIdUser($this->input->post('email')) == $_SESSION['user_id']) {
            if ($this->input->post('terms') == "1") {
                date_default_timezone_set('America/Sao_paulo');
                $signature['date'] = date('Y-m-d');
                $signature['time'] = date('H:i:s');
                $signature['user_id'] = $_SESSION['user_id']; // o nome dele pega na model
                $signature['access_level'] = $_SESSION['access_level'];
                $signature['item_id'] = $item_id;
                $signature['view_id'] = $this->view_model->GetIDByName(str_replace("-", " ", $view_name));
                $query = $this->authentication_model->insertSignature($signature);
               
                if ($query) {
                    $this->session->set_flashdata('success', 'Document successfully signed!');
                    insertLogActivity('sign', $str_replace);
                } else {
                    $this->session->set_flashdata('error', 'Error: it was not possible to sign this document');
                }
            } elseif ($this->input->post('terms') == "2"){
                $query = $this->authentication_model->deleteAllSignature($item_id);

                if ($query) {
                    $this->session->set_flashdata('delete_signature', 'Document successfully deleted!');
                    insertLogActivity('unsubscribe', $str_replace);
                } else {
                    $this->session->set_flashdata('error', 'Error: it was not possible delete this document');
                }
            }
            redirect($this->agent->referrer());
        }
        else {
            $this->session->set_flashdata('error', 'The email or password is incorrect!');
            redirect($this->agent->referrer());
        }
    }

    public function language($language) {
		if (strcmp($language, "US") == 0) {
			$_SESSION['language'] = "US";
		} else{
			$_SESSION['language'] = "BR";
		}
	}

    public function login() {
        $_SESSION['project_id'] = null;
        $_SESSION['language'] = "US";
        $postData = $this->input->post();

        if ($postData == null) {
            redirect(base_url());
        }
        $validate = $this->authentication_model->validate_login($postData);

        if ($validate) {
            $newdata = array(
                'email' => $validate[0]->email,
                'name' => $validate[0]->name,
                'role' => $validate[0]->role,
                'user_id' => $validate[0]->user_id,
                'logged_in' => true,

            );
            $this->session->set_userdata($newdata);
            redirect(base_url("projects"));
        } else {
            $data = array('alert' => true);
            $this->session->set_flashdata('flashError', 'The email or password is incorrect!');
            $this->load->view('login', $data);
        }
    }

    function change_password() {
        $this->ajax_checking();
        $postData = $this->input->post();
        $update = $this->authentication_model->change_password($postData);

        if($update['status'] === 'success') {
            $this->session->set_flashdata('success', 'Your password has been successfully changed!');
        }
        echo json_encode($update);
    }

    public function logout() {
        $this->session->sess_destroy();
        redirect(base_url());
    }
}

/* End of file */
