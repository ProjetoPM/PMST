<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class GerenciarCustos extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('Custos_model');

		$this->lang->load('btn','english');
        // $this->lang->load('btn','portuguese-brazilian');
        $this->lang->load('manage-cost','english');
        // $this->lang->load('manage-cost','portuguese-brazilian');

	}

	public function addnew($project_id){
		$dado['cost_mp'] = $this->Custos_model->getAllCustos();
		$dado['id'] = $project_id;
		//$dado['verific'] = true;
		$this->load->view('frame/header_view');
		$this->load->view('frame/sidebar_nav_view');
		$this->load->view('project/cost',$dado);
	}

	public function insert($id){
		$dado['cost_mp'] = $this->Custos_model->getAllCustos();
		$cost_mp['accuracy_level'] = $this->input->post('accuracy_level');
		$cost_mp['project_costs_m'] = $this->input->post('project_costs_m');
		$cost_mp['organizational_procedures'] = $this->input->post('organizational_procedures');
		$cost_mp['measurement_rules'] = $this->input->post('measurement_rules');
		$cost_mp['format_report'] = $this->input->post('format_report');
		$cost_mp['project_id'] = $id;
		$cost_mp['status'] = 1;
		$query=false;
		if($dado['cost_mp']!=null){
			foreach($dado['cost_mp'] as $cost){
				$verific = $cost->project_id;
				if($id==$verific){
					$query = $this->Custos_model->updatecost($cost_mp, $id);
				}
			}
		}
		if($query!=true){
			$query = $this->Custos_model->insertcustos($cost_mp);
		}
		
		if($query){
			$this->load->view('frame/header_view');
			$this->load->view('frame/sidebar_nav_view');
			redirect('project/' . $cost_mp['project_id']);
		}

	}
}
?>