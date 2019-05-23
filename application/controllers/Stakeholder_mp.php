<?php
if (!defined('BASEPATH')) {
	exit('No direct script access allowed');
}

class Stakeholder_mp extends CI_Controller{

	function __construct(){
		parent::__construct();
		// $this->load->helper('url', 'english');
        
     $this->lang->load('btn','english');
       // $this->lang->load('btn','portuguese-brazilian');
       $this->lang->load('stakeholder_mp','english');
      //   $this->lang->load('stakeholder_mp','portuguese-brazilian');
        

		$this->load->helper('url');
		$this->load->model('Stakeholder_mp_model');
	}


	function new($project_id){
		//chamar db da model
	    $query['stake_mp'] = $this->Stakeholder_mp_model->getStakeholder_mpStakeholder_item_id($project_id);
        $query['stakeholders'] = $this->Stakeholder_mp_model->getStakeholder();
       	$query['project_id'] = $project_id;
		$this->load->view('frame/header_view.php');
		$this->load->view('frame/sidebar_nav_view.php');
		$this->load->view('project/stakeholder_mp.php', $query);
		
	}


	function list($project_id){
		$query['stake_mp'] = $this->Stakeholder_mp_model->getStakeholder_mpStakeholder_item_id($project_id);
        $query['stakeholder'] = $this->Stakeholder_mp_model->getStakeholder();
        $query['project_id'] = $project_id;
        $this->load->view('frame/header_view');
        $this->load->view('frame/sidebar_nav_view'); 
        $this->load->view('project/stakeholder_mp_list', $query);
		
	}


//Criar o Schedule 1 Vez
	public function insert(){
	$stake_mp['stakeholder_id'] = $this->input->post('stakeholder_id');
	$stake_mp['project_id'] = $this->input->post('project_id');
    $stake_mp['interest'] = $this->input->post('interest');
    $stake_mp['power'] = $this->input->post('power');
    $stake_mp['influence'] = $this->input->post('influence');
    $stake_mp['impact'] = $this->input->post('impact');
    $stake_mp['average'] = $this->input->post('average');
    $stake_mp['current_engagement'] = $this->input->post('current_engagement');
    $stake_mp['expected_engagement'] = $this->input->post('expected_engagement');
    $stake_mp['strategy'] = $this->input->post('strategy');
    $stake_mp['scope'] = $this->input->post('scope');
    $stake_mp['observation'] = $this->input->post('observation');

    $data['stake_mp'] = $stake_mp;
        $query = $this->Stakeholder_mp_model->insert_stake_mp($data['stake_mp']);

 redirect('project/'.$stake_mp['project_id']);
 echo json_encode($insert);

	}

	public function update(){
    $stake_mp['stakeholder_id'] = $this->input->post('stakeholder_id');
    $stake_mp['interest'] = $this->input->post('interest');
    $stake_mp['power'] = $this->input->post('power');
    $stake_mp['influence'] = $this->input->post('influence');
    $stake_mp['impact'] = $this->input->post('impact');
    $stake_mp['average'] = $this->input->post('average');
    $stake_mp['current_engagement'] = $this->input->post('current_engagement');
    $stake_mp['expected_engagement'] = $this->input->post('expected_engagement');
    $stake_mp['strategy'] = $this->input->post('strategy');
    $stake_mp['scope'] = $this->input->post('scope');
    $stake_mp['observation'] = $this->input->post('observation');

    $data['stake_mp'] = $stake_mp;
        $query = $this->stakeholder_mp_model->insert_stake_mp($data['stake_mp']);

   if($query){
           redirect(base_url('stakeholder_mp/stakeholder_mp_list/').$stake_mp['project_id']);
       }

	//	$dados = $this->post('schedule_mp.schedule_model');
	}


	public function delete($id){
    $query = $this->Stakeholder_mp_model->deleteStake_mp($id);
    
    if($query){
        redirect(base_url('stakeholder_mp/stakeholder_mp_list').$stake_mp['project_id']);
    }
}
	}


?>