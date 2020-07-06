<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Benefits_plan extends CI_Controller {
	

	function __construct(){
		parent::__construct();
		if (!$this->session->userdata('logged_in')) {
			redirect(base_url());
		
			
		}

		// $this->load->helper('url', 'english');

		$this->lang->load('btn','english');
        // $this->lang->load('btn','portuguese-brazilian');
		$this->lang->load('benefits_plan','english');
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
		
		$this->load->view('frame/sidebar_nav_view2',$project_id);

		$this->load->view('project/integration/benefits_plan',$dado);

    } else {
        redirect(base_url());
    }

	}

	function insert()
	{
		 //$this->ajax_checking();

		$postData = $this->input->post();
		$insert   = $this->Benefits_plan_model->createBenefitsPlan($postData);
		redirect('Benefits_plan/newp/' . $postData['project_id']);
		echo json_encode($insert);
	}


	public function update($project_id){
		$benefits_plan['target_benefits'] = $this->input->post('target_benefits');
		$benefits_plan['strategic_alignment'] = $this->input->post('strategic_alignment');
		$benefits_plan['schedule_benefit'] = $this->input->post('schedule_benefit');
		$benefits_plan['benefits_owner'] = $this->input->post('benefits_owner');
		$benefits_plan['indicators'] = $this->input->post('indicators');
		$benefits_plan['premises'] = $this->input->post('premises');
		$benefits_plan['risks'] = $this->input->post('risks');

		//$insert = $this->project_model->insert_project_pgq($quality_mp);
		$query = $this->Benefits_plan_model->updateBenefitsPlan($benefits_plan, $project_id);

		$this->load->view('frame/header_view');
		
		$this->load->view('frame/sidebar_nav_view2', $project_id );
		redirect('Benefits_plan/newp/' . $project_id);
	}
}
?>
