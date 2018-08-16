<?php
if (!defined('BASEPATH')) {
	exit('No direct script access allowed');
}

class Shedule extends CI_Controller
{

	function shedule_form(){
		//chamar db da model
		$this->load->view('frame/header_view.php');
		$this->load->view('frame/sidebar_nav_view.php');
		$this->load->view('shedule.php');

	}



}






?>