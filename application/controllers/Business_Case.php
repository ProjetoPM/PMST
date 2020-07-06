<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Business_Case extends CI_Controller {

	function __construct(){
		parent::__construct();
		if (!$this->session->userdata('logged_in')) {
			redirect(base_url());
		}

		// $this->load->helper('url', 'english');

		$this->lang->load('btn','english');
        // $this->lang->load('btn','portuguese-brazilian');
		$this->lang->load('business_case','english');
        // $this->lang->load('quality_mp','portuguese-brazilian');


		$this->load->model('Project_model');
		$this->load->helper('url');
		$this->load->model('Business_case_model');
	}

	public function newp($project_id){
		$idusuario = $_SESSION['user_id'];
    $this->db->where('user_id', $idusuario);
    $this->db->where('project_id', $project_id);
    $project['dados'] = $this->db->get('project_user')-> result();

    if (count($project['dados']) > 0) {
    $dado['business_case'] = $this->Business_case_model->readBusinessCase($project_id);
		$dado['id'] = $project_id;
		$this->db->where('project_id', $project_id);
		$dado['project'] =  $this->db->get('project')->result();

		//$dado['verific'] = true;
		$this->db->where('project_id', $project_id);
		$dataproject['project'] = $this->db->get('project')->result();
		$this->load->view('frame/header_view');
		$this->load->view('frame/sidebar_nav_view');

		$this->load->view('project/integration/business_case',$dado);

    } else {
        redirect(base_url());
    }

	}

	function insert()
	{
		 //$this->ajax_checking();

		$postData = $this->input->post();
		$insert   = $this->Business_case_model->createBusinessCase($postData);
		redirect('Business_Case/newp' . $postData['project_id']);
		echo json_encode($insert);
	}


	public function update($project_id){
		$business_case['business_deals'] = $this->input->post('business_deals');
		$business_case['situation_analysis'] = $this->input->post('situation_analysis');
		$business_case['recommendation'] = $this->input->post('recommendation');
		$business_case['evaluation'] = $this->input->post('evaluation');

		//$insert = $this->project_model->insert_project_pgq($quality_mp);
		$query = $this->Business_case_model->updateBusinessCase($business_case, $project_id);

		$this->load->view('frame/header_view');
		$this->load->view('frame/sidebar_nav_view');
		redirect('Business_Case/newp/' . $project_id);
	}
}
?>
