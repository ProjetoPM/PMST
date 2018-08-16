<?php
if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Human_resource extends CI_Controller{
	// Métodos Human Resource
	public function human_resource_form(){
		$this->load->view('frame/header_view');
        $this->load->view('frame/sidebar_nav_view');
        $this->load->view('human_resource/human_resource_mp');
    }
}