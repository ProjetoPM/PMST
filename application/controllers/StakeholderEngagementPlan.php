<?php
if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class StakeholderEngagementPlan extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('logged_in')) {
            redirect(base_url());
        }

        $this->load->helper('url');
        $this->load->helper('log_activity');
        
        $this->load->model('log_model');
        $this->load->model('view_model');
        $this->load->model('Project_model');
        $this->load->model('Stakeholder_model');
        $this->load->model('Stakeholder_mp_model');

        if (strcmp($_SESSION['language'], "US") == 0) {
            $this->lang->load('stakeholder_mp', 'english');
            $this->lang->load('project-page', 'english');
        } else {
            $this->lang->load('stakeholder_mp', 'portuguese-brazilian');
            $this->lang->load('project-page', 'portuguese-brazilian');
        }
        // $this->load->helper('url', 'english');

        // $this->lang->load('btn','portuguese-brazilian');
        
        //   $this->lang->load('stakeholder_mp','portuguese-brazilian');


    }


    function new($project_id)
    {
        if (strcmp($_SESSION['language'], "US") == 0) {
			$this->lang->load('btn', 'english');
		} else {
			$this->lang->load('btn', 'portuguese-brazilian');
		}

        $idusuario = $_SESSION['user_id'];
        $this->db->where('user_id', $idusuario);
        $this->db->where('project_id', $project_id);
        $project['dados'] = $this->db->get('project_user')->result();

        if (count($project['dados']) > 0) {
            //chamar db da model
            $query['stakeholder_mp'] = $this->Stakeholder_mp_model->get($project_id);
            $query['stakeholders'] = $this->Stakeholder_model->get($project_id);
            $query['project_id'] = $project_id;
            $this->load->view('frame/header_view.php');
            $this->load->view('frame/sidebar_nav_view.php');
            $this->load->view('project/stakeholder/stakeholder_plan/stakeholder_mp', $query);
        } else {
            redirect(base_url());
        }
    }

    public function edit($stakeholder_id)
    {
        if (strcmp($_SESSION['language'], "US") == 0) {
			$this->lang->load('btn', 'english');
		} else {
			$this->lang->load('btn', 'portuguese-brazilian');
		}

        $query['stakeholder'] = $this->Stakeholder_model->get($stakeholder_id);
        $dado["fields"] = getAllFieldEvaluation($_SESSION['project_id'], "stakeholder engagement plan", $query['stakeholder']['stakeholder_id']);

        $this->load->view('frame/header_view');
        $this->load->view('frame/topbar');
        $this->load->view('frame/sidebar_nav_view');
        $this->load->view('project/stakeholder/stakeholder_plan/edit', $query);
    }


    public function list($project_id)
    {
        if (strcmp($_SESSION['language'], "US") == 0) {
			$this->lang->load('btn', 'english');
		} else {
			$this->lang->load('btn', 'portuguese-brazilian');
		}
        
        $dado['project_id'] = $project_id;

        $dado['stakeholder'] = $this->Stakeholder_model->getAll($project_id);
        $this->load->view('frame/header_view');
        $this->load->view('frame/topbar');
        $this->load->view('frame/sidebar_nav_view');
        $this->load->view('project/stakeholder/stakeholder_plan/list', $dado);
    }


    public function update($stakeholder_id)
    {

        if(strcmp($_SESSION['language'],"US") == 0){
			$feedback_success = 'Item Updated';
        }else{
			$feedback_success = 'Item Atualizado ';
		}

        $stakeholder['power'] = $this->input->post('power');
        $stakeholder['interest'] = $this->input->post('interest');
        $stakeholder['influence'] = $this->input->post('influence');
        $stakeholder['impact'] = $this->input->post('impact');
        $stakeholder['average'] = $this->input->post('average');
        $stakeholder['expected_engagement'] = $this->input->post('expected_engagement');
        $stakeholder['current_engagement'] = $this->input->post('current_engagement');
        $stakeholder['strategy'] = $this->input->post('strategy');
        $stakeholder['scope'] = $this->input->post('scope');
        $stakeholder['observation'] = $this->input->post('observation');
        $stakeholder['project_id'] = $this->input->post('project_id');

        $data['stakeholder'] = $stakeholder;
        $query = $this->Stakeholder_model->update($data['stakeholder'], $stakeholder_id);

        if ($query) {
            insertLogActivity('update', 'stakeholder engagement plan');
            $this->session->set_flashdata('success', $feedback_success);
            redirect('stakeholder/stakeholder-engagement-plan/list/' . $stakeholder['project_id']);
        }
    }


    function insert()
    {
        if(strcmp($_SESSION['language'],"US") == 0){
			$feedback_success = 'Item Created';
        }else{
			$feedback_success = 'Item Criado ';
		}
        insertLogActivity('insert', 'stakeholder engagement plan');
        $postData = $this->input->post();
        $insert   = $this->Stakeholder_mp_model->insert($postData);
        $this->session->set_flashdata('success', $feedback_success);
        redirect('stakeholder/stakeholder-engagement-plan/new/' . $postData['project_id']);
        echo json_encode($insert);
    }

    // 	public function update(){
    //         date_default_timezone_set('America/Sao_paulo');
    // 		$log['project_id']= $_SESSION['project_id'];
    //         $log['action_type'] = 'Update';
    // 		$log['date'] = date('d/m/Y');
    // 		$log['time'] = date('H:i:s');
    // 		$log['view_id'] =  $this->view_model->GetIDByName('stakeholder_engagement_plan');
    // 		$log['action'] = $this->session->userdata('name') .' performed an "' 
    // 		.$log['action_type']. '" action in "stakeholder engagement plan"';
    // 		$this->log_model->insert($log);
    // 		// $this->log_model->insertNotification($_SESSION['project_id']);

    //     $stake_mp['stakeholder_id'] = $this->input->post('stakeholder_id');
    //     $stake_mp['interest'] = $this->input->post('interest');
    //     $stake_mp['power'] = $this->input->post('power');
    //     $stake_mp['influence'] = $this->input->post('influence');
    //     $stake_mp['impact'] = $this->input->post('impact');
    //     $stake_mp['average'] = $this->input->post('average');
    //     $stake_mp['current_engagement'] = $this->input->post('current_engagement');
    //     $stake_mp['expected_engagement'] = $this->input->post('expected_engagement');
    //     $stake_mp['strategy'] = $this->input->post('strategy');
    //     $stake_mp['scope'] = $this->input->post('scope');
    //     $stake_mp['observation'] = $this->input->post('observation');

    //     $data['stake_mp'] = $stake_mp;
    //         $query = $this->stakeholder_mp_model->insert($data['stake_mp']);

    //    if($query){
    //            redirect(base_url('stakeholder/stakeholder-engagement-plan/stakeholder_mp_list/').$stake_mp['project_id']);
    //        }

    // 	//	$dados = $this->post('schedule_mp.schedule_model');
    // 	}


    // 	public function delete($id){
    //     $query = $this->Stakeholder_mp_model->delete($id);

    //     if($query){
    //         redirect(base_url('stakeholder/stakeholder-engagement-plan/stakeholder_mp_list').$_SESSION['project_id']);
    //     }
    // }
}
