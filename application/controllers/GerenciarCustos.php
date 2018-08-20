<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class GerenciarCustos extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('Custos_model');
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
		if($dado['cost_mp']!=null){
			$query = $this->Custos_model->deletecustos($id);
		}

		$cost_mp['project_costs_m'] = $this->input->post('project_costs_m');
		$cost_mp['accuracy_level'] = $this->input->post('accuracy_level');
		$cost_mp['organizational_procedures'] = $this->input->post('organizational_procedures');
		$cost_mp['measurement_rules'] = $this->input->post('measurement_rules');
		$cost_mp['format_report'] = $this->input->post('format_report');
		$cost_mp['project_id'] = $id;
		$cost_mp['status'] = 1;
		$query = $this->Custos_model->insertcustos($cost_mp);

		if($query){
		$this->load->view('frame/header_view');
        $this->load->view('frame/sidebar_nav_view');
        redirect('project/' . $cost_mp['project_id']);
		}

	}
		$this->load->view('project/project_page',$id);
			//header('location:'.base_url().$this->index($id));
		}

	}

	public function delete($project_id){
		$query = $this->Project_model->deleteproject($project_id);

		if($query){
			header('location:'.base_url().$this->index());
		}
	}

}
?>