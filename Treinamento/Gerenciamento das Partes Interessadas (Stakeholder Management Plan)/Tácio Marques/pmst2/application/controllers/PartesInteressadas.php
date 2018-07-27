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

	//public function index(){
	//	$data['stakelholdermp'] = $this->Stakelholdermp_model->getAllStakelholdermp();
	//	$this->load->view('partesI_list.php', $data);
	//}

	public function addnew($project_id){
		$dado['id'] = $project_id;
		$dado['stakelholder'] = $this->Stakelholder_model->getAllStakelholder();
		$this->load->view('addpartesI.php',$dado);
	}

	public function insert(){
		$Stakelholder_mp['interest'] = $this->input->post('interest');
		$Stakelholder_mp['power'] = $this->input->post('power');
		$Stakelholder_mp['influence'] = $this->input->post('influence');
		$Stakelholder_mp['impact'] = $this->input->post('impact');
		$Stakelholder_mp['average'] = (($this->input->post('interest')+$this->input->post('power')+$this->input->post('influence')+$this->input->post('impact'))/4);
		$Stakelholder_mp['expectedengagement'] = $this->input->post('expectedengagement');
		$Stakelholder_mp['currentengagement'] = $this->input->post('currentengagement');
		$Stakelholder_mp['strategy'] = $this->input->post('strategy');
		$Stakelholder_mp['scope'] = $this->input->post('scope');
		$Stakelholder_mp['observation'] = $this->input->post('observation');
		$Stakelholder_mp['project_id'] = $this->input->post('project_id');
		$Stakelholder_mp['status'] = $this->input->post('status');
		
		$query = $this->Stakelholdermp_model->insertstakelholdermp($Stakelholder_mp);

		if($query){
			header('location:'.base_url().$this->index());
		}

	}

	public function edit($stakelholder_mp_id){
		$data['stakelholder_mp'] = $this->Stakelholdermp_model->getStakelholdermp($stakelholder_mp_id);
		$this->load->view('editstakelholdermp', $data);
	}

	public function update($stakelholder_mp_id){
		$Stakelholder_mp['interest'] = $this->input->post('interest');
		$Stakelholder_mp['power'] = $this->input->post('power');
		$Stakelholder_mp['influence'] = $this->input->post('influence');
		$Stakelholder_mp['impact'] = $this->input->post('impact');
		$Stakelholder_mp['average'] = $this->input->post('average');
		$Stakelholder_mp['expectedengagement'] = $this->input->post('expectedengagement');
		$Stakelholder_mp['currentengagement'] = $this->input->post('currentengagement');
		$Stakelholder_mp['strategy'] = $this->input->post('strategy');
		$Stakelholder_mp['scope'] = $this->input->post('scope');
		$Stakelholder_mp['observation'] = $this->input->post('observation');
		$Stakelholder_mp['project_id'] = $this->input->post('project_id');
		$Stakelholder_mp['status'] = $this->input->post('status');
		

		$query = $this->Stakelholdermp_model->updatestakelholdermp($stakelholder_mp_id, $project_id);

		if($query){
			header('location:'.base_url().$this->index());
		}
	}

	//public function view(){
	//	$data['stakelholdermp'] = $this->Stakelholdermp_model->getStakelholdermp($stakelholder_mp_id);
	//	$this->load->view('partesI_list', $data);
	//}

	public function delete($Stakelholder_mp_id){
		$query = $this->Stakelholdermp_model->deletestakelholdermp($stakelholder_mp_id);

		if($query){
			header('location:'.base_url().$this->index());
		}
	}
}
?>