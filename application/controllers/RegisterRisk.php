<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class RegisterRisk extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('Risk_model');


		$this->lang->load('btn','english');
        // $this->lang->load('btn','portuguese-brazilian');
        $this->lang->load('risk','english');
        // $this->lang->load('risk','portuguese-brazilian');

	}

	public function list($project_id){
		$dado['project_id'] = $project_id;

		$dado['risk_register'] = $this->Risk_model->getAllRiskProject($project_id);
		$this->load->view('frame/header_view');
		$this->load->view('frame/sidebar_nav_view');
		$this->load->view('project/risk/risk_register/list',$dado);
	}

	public function addnew($project_id){
		$dado['id'] = $project_id;
		$this->load->view('frame/header_view');
		$this->load->view('frame/sidebar_nav_view');
		$this->load->view('project/risk/risk_register/new',$dado);
	}

	public function edit($risk_register_id) {
		
		$query['risk_register'] = $this->Risk_model->getRisk($risk_register_id);
		$this->load->view('frame/header_view.php');
		$this->load->view('frame/sidebar_nav_view.php');
		$this->load->view('project/risk/risk_register/edit', $query);
	}

	public function insert($project_id){
		$risk_register['impacted_objective'] = $this->input->post('impacted_objective');
		$risk_register['priority'] = $this->input->post('priority');
		$risk_register['risk_status'] = $this->input->post('risk_status');
		$risk_register['event'] = $this->input->post('event');
		$risk_register['date'] = $this->input->post('date');
		$risk_register['identifier'] = $this->input->post('identifier');
		$risk_register['type'] = $this->input->post('type');
		$risk_register['status'] = 1;
		$risk_register['project_id'] = $project_id;
		$query = $this->Risk_model->insert($risk_register);
		
		if($query){
			$this->load->view('frame/header_view');
			$this->load->view('frame/sidebar_nav_view');
			redirect('RegisterRisk/list/' . $risk_register['project_id']);
		}
	}

	public function update($risk_register_id) {
		
		$risk_register['impacted_objective'] = $this->input->post('impacted_objective');
		$risk_register['priority'] = $this->input->post('priority');
		$risk_register['risk_status'] = $this->input->post('risk_status');
		$risk_register['event'] = $this->input->post('event');
		$risk_register['date'] = $this->input->post('date');
		$risk_register['identifier'] = $this->input->post('identifier');
		$risk_register['type'] = $this->input->post('type');
		$risk_register['project_id'] = $this->input->post('project_id');



		$query = $this->Risk_model->updateRisk($risk_register,$risk_register_id);

		if ($query) {
			redirect('RegisterRisk/list/' . $risk_register['project_id']);
		}
	}

	public function delete($risk_register_id){
		
		$project_id['project_id'] = $this->input->post('project_id');
		//$project_id['project_id'] = $project_id;
		$query = $this->Risk_model->deleteRisk($risk_register_id);
		if($query){
			$this->load->view('frame/header_view');
            $this->load->view('frame/sidebar_nav_view');
            redirect(base_url() . 'RegisterRisk/list/' . $project_id['project_id']);
		}
	}
	
}
?>