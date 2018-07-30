<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PartesInteressadas extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('Stakelholder_model');
		$this->load->model('Project_model');
		$this->load->model('Stakelholdermp_model');	
	}

	public function index($project_id){
		$dado['id'] = $project_id;
		$dado['stakelholder'] = $this->Stakelholder_model->getAllStakelholder();
		$this->load->view('addpartesI.php',$dado);
	}

	public function addnew($project_id){
		$dado['id'] = $project_id;
		$dado['stakeholder_mp'] = $this->Stakelholdermp_model->getAllStakelholdermp();
		$dado['stakelholder'] = $this->Stakelholder_model->getAllStakelholder();
		$this->load->view('addpartesI.php',$dado);
	}

	public function insert($id){
		$Stakeholder_mp['stakelholder_mp_id'] = $this->input->post('stakelholder_id');
		$Stakeholder_mp['stakelholder_id'] = $this->input->post('stakelholder_id');
		$Stakeholder_mp['interest'] = $this->input->post('interest');
		$var1=$Stakeholder_mp['interest'];
		$Stakeholder_mp['power'] = $this->input->post('power');
		$var2=$Stakeholder_mp['power'];
		$Stakeholder_mp['influence'] = $this->input->post('influence');
		$var3=$Stakeholder_mp['influence'];
		$Stakeholder_mp['impact'] = $this->input->post('impact');
		$var4=$Stakeholder_mp['impact'];
		$Stakeholder_mp['average'] = (($var1+$var2+$var3+$var4)/4);
		$Stakeholder_mp['expectedengagement'] = $this->input->post('expectedengagement');
		$Stakeholder_mp['currentengagement'] = $this->input->post('currentengagement');
		$Stakeholder_mp['strategy'] = $this->input->post('strategy');
		$Stakeholder_mp['scope'] = $this->input->post('scope');
		$Stakeholder_mp['observation'] = $this->input->post('observation');
		$Stakeholder_mp['project_id'] = $id;
		$Stakeholder_mp['status'] = $this->input->post('status');
		var_dump($Stakeholder_mp);
		$query = $this->Stakelholdermp_model->insertstakelholdermp($Stakeholder_mp);

		if($query){
			header('location:'.base_url().$this->index($project_id));
		}

	}

	public function edit($stakeholder_mp_id){
		$data['stakeholder_mp'] = $this->Stakelholdermp_model->getStakelholdermp($stakeholder_mp_id);
		$this->load->view('editstakelholdermp', $data);
	}

	public function update($stakeholder_mp_id){
		$Stakelhoder_mp['interest'] = $this->input->post('interest');
		$Stakelhoder_mp['power'] = $this->input->post('power');
		$Stakelhoder_mp['influence'] = $this->input->post('influence');
		$Stakelhoder_mp['impact'] = $this->input->post('impact');
		$Stakelhoder_mp['average'] = $this->input->post('average');
		$Stakelhoder_mp['expectedengagement'] = $this->input->post('expectedengagement');
		$Stakelhoder_mp['currentengagement'] = $this->input->post('currentengagement');
		$Stakelhoder_mp['strategy'] = $this->input->post('strategy');
		$Stakelhoder_mp['scope'] = $this->input->post('scope');
		$Stakelhoder_mp['observation'] = $this->input->post('observation');
		$Stakelhoder_mp['project_id'] = $this->input->post('project_id');
		$Stakelhoder_mp['status'] = $this->input->post('status');
		

		$query = $this->Stakelholdermp_model->updatestakelholdermp($stakeholder_mp_id, $project_id);

		if($query){
			header('location:'.base_url().$this->index());
		}
	}

	public function view(){
		$data['stakelholder'] = $this->Stakelholder_model->getAllStakelholder();
		$data['stakelholder_mp'] = $this->Stakelholdermp_model->getAllStakelholdermp();
		$this->load->view('partesI_list', $data);
	}

	public function delete($stakeholder_mp_id){
		$query = $this->Stakelholdermp_model->deletestakelholdermp($stakeholder_mp_id);

		if($query){
			header('location:'.base_url().$this->index());
		}
	}
}
?>