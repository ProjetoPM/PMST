<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class TAP extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('tap_model');
	}

public function index(){
	

	}
	public function showtap(){
		$data['tap'] = $this->tap_model->getAllTap();
		$this->load->view('tap_view.php', $data);
	}
public function addtap(){
		$this->load->view('tapnew.php');
	}
	public function insert(){
		$tap['scope'] = $this->input->post('scope');
		$tap['objective'] = $this->input->post('objective');
		$tap['sucess'] = $this->input->post('sucess');
		$tap['requirements'] = $this->input->post('requirements');
		$tap['assumptions'] = $this->input->post('assumptions');
		$tap['constraints '] = $this->input->post('constraints');
		$tap['risks'] = $this->input->post('risks');
		$tap['milestone'] = $this->input->post('schedule');
		$tap['budge'] = $this->input->post('budget');
		$tap['stakeholder'] = $this->input->post('stakeholder');
		$tap['aprovalReq'] = $this->input->post('aprovalReq');
		
		
		$query = $this->tap_model->insert($tap);
		if($query){
			header('location:'.base_url().$this->index()); // PRECISO MUDAR ISSO PARA NÃO VOLTAR AO COMEÇO
		}

	}

	public function edit($id){
		$data['stake'] = $this->stake_model->geStake($id);
		$this->load->view('editform', $data);
	}

	public function update($id){
	     $stake['name'] = $this->input->post('nome');
		$stake['roles_responsabilies'] = $this->input->post('função');
		$stake['status'] = $this->input->post('status');

		$query = $this->stake_model->updatestake($stake, $id);

		if($query){
			header('location:'.base_url().$this->index());
		}
	}

	public function delete($id){
		$query = $this->tap_model->deletetap($id);

		if($query){
			header('location:'.base_url().$this->index());
		}
	}
}


?>