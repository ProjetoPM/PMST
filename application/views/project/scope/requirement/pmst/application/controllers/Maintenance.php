<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Maintenance extends CI_Controller {

    public function Construct() {
        parent::Construct();
        if(!$this->session->userdata('logged_in')) {
            redirect(base_url());
        }
    }

    public function index() {

        $this->db->where('user_id', $_SESSION['user_id']);
        $datauser['user'] = $this->db->get('user')->result();
        $this->load->view('frame/header_view', $datauser);
        $this->load->view('frame/sidebar_nav_view');
        $this->load->view('maintenance');
        $this->load->view('frame/footer_view');
    }
}

/* End of file */
