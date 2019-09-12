<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ResourceBreakdownStructure extends CI_Controller {

	function __construct(){
		parent::__construct();
		if (!$this->session->userdata('logged_in')) {
			redirect(base_url());
		}

		// $this->load->helper('url', 'english');

		$this->lang->load('btn','english');
        // $this->lang->load('btn','portuguese-brazilian');
		$this->lang->load('resource_breakdown_structure','english');
        // $this->lang->load('quality_mp','portuguese-brazilian');


		$this->load->model('Project_model');
		$this->load->helper('url');
		$this->load->model('Benefits_plan_model');
	}

	public function newp($project_id){
		$idusuario = $_SESSION['user_id'];
    $this->db->where('user_id', $idusuario);
    $this->db->where('project_id', $project_id);
    $project['dados'] = $this->db->get('project_user')-> result();

    if (count($project['dados']) > 0) {
    $dado['benefits_plan'] = $this->Benefits_plan_model->readBenefits($project_id);
		$dado['id'] = $project_id;
		$this->db->where('project_id', $project_id);
		$dado['project'] =  $this->db->get('project')->result();

		//$dado['verific'] = true;
		$this->db->where('project_id', $project_id);
		$dataproject['project'] = $this->db->get('project')->result();
		$this->load->view('frame/header_view');
		$this->load->view('frame/sidebar_nav_view');

		$this->load->view('project/human_resource/resource_breakdown_structure',$dado);

    } else {
        redirect(base_url());
    }

	}

}
?>
