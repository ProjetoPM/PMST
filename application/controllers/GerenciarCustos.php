<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PartesInteressadas extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('Custos_model');
	}

	public function addnew($project_id){
		$dado['id'] = $project_id;
		$dado['cost_mp'] = $this->Custos_model->getAllCustos();
		$this->load->view('cost.php',$dado);
	}

	public function insert($id,$verific){
		$cost_mp['project_costs_m'] = $this->input->post('project_costs_m');
		$cost_mp['accuracy_level'] = $this->input->post('accuracy_level');
		$cost_mp['organizational_procedures'] = $this->input->post('organizational_procedures');
		$cost_mp['measurement_rules'] = $this->input->post('measurement_rules');
		$cost_mp['format_report'] = $this->input->post('format_report');
		$cost_mp['project_id'] = $id;
		if($verific){
			$cost_mp['status'] = 1;
		}
		$query = $this->Custos_model->insertcustos($cost_mp);

		if($query){
		$this->load->view("project/",$id);
			//header('location:'.base_url().$this->index($id));
		}

	}

	public function view(){
		$data['stakelholder'] = $this->Stakelholder_model->getAllStakelholder();
		$data['stakeholder_mp'] = $this->Stakelholdermp_model->getAllStakelholdermp();
		$this->load->view('partesI_list', $data);
	}
}
?>