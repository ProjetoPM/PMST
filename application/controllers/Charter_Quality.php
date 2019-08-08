<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Charter_Quality extends CI_Controller {

	function __construct(){
		parent::__construct();
		if (!$this->session->userdata('logged_in')) {
			redirect(base_url());
		}

		// $this->load->helper('url', 'english');

		$this->lang->load('btn','english');
        // $this->lang->load('btn','portuguese-brazilian');
		$this->lang->load('quality_plan','english');
        // $this->lang->load('quality_mp','portuguese-brazilian');


		$this->load->model('project_model');
		$this->load->helper('url');
		$this->load->model('Quality_model');
	}

	public function newp($project_id){
		    $idusuario = $_SESSION['user_id'];
    $this->db->where('user_id', $idusuario);
    $this->db->where('project_id', $project_id);
    $project['dados'] = $this->db->get('project_user')-> result();

    if (count($project['dados']) > 0) {
        $dado['quality_mp'] = $this->Quality_model->readQuality($project_id);
		$dado['id'] = $project_id;
		$this->db->where('project_id', $project_id);
		$dado['project'] =  $this->db->get('project')->result();

		//$dado['verific'] = true;
		$this->db->where('project_id', $project_id);
		$dataproject['project'] = $this->db->get('project')->result();
		$this->load->view('frame/header_view');
		$this->load->view('frame/sidebar_nav_view');

		$this->load->view('project/quality/quality_mp',$dado);

    } else {
        redirect(base_url());
    }

	}

	function insert()
	{
		 //$this->ajax_checking();

		$postData = $this->input->post();
		$insert   = $this->Quality_model->createQuality($postData);
		redirect('project/' . $postData['project_id']);
		echo json_encode($insert);
	}


	public function update($id){
		$quality_mp['methodology'] = $this->input->post('methodology');
		$quality_mp['related_processes'] = $this->input->post('related_processes');
		$quality_mp['expectations_tolerances'] = $this->input->post('expectations_tolerances');
		$quality_mp['traceability'] = $this->input->post('traceability');
		$quality_mp['status'] = (int) $this->input->post('status');

		//$insert = $this->project_model->insert_project_pgq($quality_mp);
		$query = $this->Quality_model->updateQuality($quality_mp, $id);

		$this->load->view('frame/header_view');
		$this->load->view('frame/sidebar_nav_view');
		redirect('project/' . $id);
	}
}
?>
