<?php
if (!defined('BASEPATH')) {
	exit('No direct script access allowed');
}

class Stakeholder_mp extends CI_Controller{

	function __construct(){
		parent::__construct();
        if (!$this->session->userdata('logged_in')) {
            redirect(base_url());
        }
		// $this->load->helper('url', 'english');

     $this->lang->load('btn','english');
       // $this->lang->load('btn','portuguese-brazilian');
       $this->lang->load('stakeholder_mp','english');
      //   $this->lang->load('stakeholder_mp','portuguese-brazilian');


		$this->load->helper('url');
		$this->load->model('Stakeholder_mp_model');
		$this->load->model('Stakeholder_model');

	}


	function newp($project_id){
		$idusuario = $_SESSION['user_id'];
    $this->db->where('user_id', $idusuario);
    $this->db->where('project_id', $project_id);
    $project['dados'] = $this->db->get('project_user')-> result();

    if (count($project['dados']) > 0) {
        //chamar db da model
        $query['stakeholder_mp'] = $this->Stakeholder_mp_model->getStakeholderMp($stakeholder_id);
        $query['stakeholders'] = $this->Stakeholder_model->getStakeholder($stakeholder_id);
        $query['project_id'] = $project_id;
        $this->load->view('frame/header_view.php');
        $this->load->view('frame/sidebar_nav_view.php');
        $this->load->view('project/stakeholder/stakeholder_plan/stakeholder_mp', $query);
    } else {
        redirect(base_url());
    }

	}


	    public function listp($project_id){
	        $dado['project_id'] = $project_id;

					$dado['stakeholder'] = $this->Stakeholder_model->getAllStakeholders($project_id);
	        $this->load->view('frame/header_view');
	        $this->load->view('frame/sidebar_nav_view');
	        $this->load->view('project/stakeholder/stakeholder_plan/list',$dado);
	    }


	function insert()	{
		$postData = $this->input->post();
		$insert   = $this->Stakeholder_mp_model->insert($postData);
		redirect('Benefits_plan/newp/' . $postData['project_id']);
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
           redirect(base_url('stakeholder_mp/stakeholder_mp_listp/').$stake_mp['project_id']);
       }

	//	$dados = $this->post('schedule_mp.schedule_model');
	}


	public function delete($id){
    $query = $this->Stakeholder_mp_model->deleteStake_mp($id);

    if($query){
        redirect(base_url('stakeholder_mp/stakeholder_mp_listp').$stake_mp['project_id']);
    }
}
	}


?>
