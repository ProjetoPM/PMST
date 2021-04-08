<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ManagementStakeholder extends CI_Controller {

	function __construct(){
		parent::__construct();
        if (!$this->session->userdata('logged_in')) {
            redirect(base_url());
        }
		$this->load->helper('url');
		$this->load->model('Stakeholder_model');


		$this->lang->load('btn','english');
        // $this->lang->load('btn','portuguese-brazilian');
        $this->lang->load('stakeholder','english');

        // $this->lang->load('manage-cost','portuguese-brazilian');

	}

	public function addnew($project_id){
		$idusuario = $_SESSION['user_id'];
    $this->db->where('user_id', $idusuario);
    $this->db->where('project_id', $project_id);
    $project['dados'] = $this->db->get('project_user')-> result();

    if (count($project['dados']) > 0) {
        $dado['id'] = $project_id;
        $this->load->view('frame/header_view');
        $this->load->view('frame/sidebar_nav_view');
        $this->load->view('project/stakeholder/stakeholder',$dado);

    } else {
        redirect(base_url());
    }
	}

    public function delete($stakeholder_id){

        $project_id['project_id'] = $this->input->post('project_id');
        //$project_id['project_id'] = $project_id;
        $query = $this->Stakeholder_model->deleteStakeholder($stakeholder_id);
        if($query){
            $this->load->view('frame/header_view');
            $this->load->view('frame/sidebar_nav_view');
            redirect(base_url() . 'ManagementStakeholder/listp/' . $project_id['project_id']);
        }
    }

    public function listp($project_id){
        $dado['project_id'] = $project_id;

        $dado['stakeholder'] = $this->Stakeholder_model->getAllStakeholders($project_id);
        $this->load->view('frame/header_view');
        $this->load->view('frame/sidebar_nav_view');
        $this->load->view('project/stakeholder/stakeholder_register/list',$dado);
    }

		public function listPlan($project_id){
				$dado['project_id'] = $project_id;

				$dado['stakeholder'] = $this->Stakeholder_model->getAllStakeholders($project_id);
				$this->load->view('frame/header_view');
				$this->load->view('frame/sidebar_nav_view');
				$this->load->view('project/stakeholder/stakeholder_plan/list',$dado);
		}

    public function edit($stakeholder_id) {
        $query['stakeholder'] = $this->Stakeholder_model->getStakeholder($stakeholder_id);
        $this->load->view('frame/header_view.php');
        $this->load->view('frame/sidebar_nav_view.php');
        $this->load->view('project/stakeholder/stakeholder_register/edit', $query);
    }

		public function editPlan($stakeholder_id) {
				$query['stakeholder'] = $this->Stakeholder_model->getStakeholder($stakeholder_id);
				$this->load->view('frame/header_view.php');
				$this->load->view('frame/sidebar_nav_view.php');
				$this->load->view('project/stakeholder/stakeholder_plan/edit', $query);
		}

    public function update($stakeholder_id) {
        $stakeholder['name'] = $this->input->post('name');
        $stakeholder['type'] = $this->input->post('type');
        $stakeholder['organization'] = $this->input->post('organization');
        $stakeholder['position'] = $this->input->post('position');
        $stakeholder['role'] = $this->input->post('role');
        $stakeholder['responsibility'] = $this->input->post('responsibility');
        $stakeholder['email'] = $this->input->post('email');
        $stakeholder['phone_number'] = $this->input->post('phone_number');
        $stakeholder['work_place'] = $this->input->post('work_place');
        $stakeholder['essential_requirements'] = $this->input->post('essential_requirements');
        $stakeholder['main_expectations'] = $this->input->post('main_expectations');
        $stakeholder['interest_phase'] = $this->input->post('interest_phase');
        $stakeholder['observations'] = $this->input->post('observations');
        $stakeholder['project_id'] = $this->input->post('project_id');

				$data['stakeholder'] = $stakeholder;
				$query = $this->Stakeholder_model->updateStakeholder($data['stakeholder'], $stakeholder_id);

        if ($query) {
            redirect('ManagementStakeholder/listp/' . $stakeholder['project_id']);
        }
    }

		public function updatePlan($stakeholder_id) {
				$stakeholder['interest'] = $this->input->post('interest');
				$stakeholder['power'] = $this->input->post('power');
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
				$query = $this->Stakeholder_model->updateStakeholder($data['stakeholder'], $stakeholder_id);

				if ($query) {
						redirect('ManagementStakeholder/listPlan/' . $stakeholder['project_id']);
				}
		}

	public function insert($id){
		$stakeholder['name'] = $this->input->post('name');
        $stakeholder['type'] = $this->input->post('type');
        $stakeholder['organization'] = $this->input->post('organization');
        $stakeholder['position'] = $this->input->post('position');
        $stakeholder['role'] = $this->input->post('role');
        $stakeholder['responsibility'] = $this->input->post('responsibility');
        $stakeholder['email'] = $this->input->post('email');
        $stakeholder['phone_number'] = $this->input->post('phone_number');
        $stakeholder['work_place'] = $this->input->post('work_place');
        $stakeholder['essential_requirements'] = $this->input->post('essential_requirements');
        $stakeholder['main_expectations'] = $this->input->post('main_expectations');
        $stakeholder['interest_phase'] = $this->input->post('interest_phase');
        $stakeholder['observations'] = $this->input->post('observations');
        $stakeholder['project_id'] = $id;

				$query = $this->Stakeholder_model->insert($stakeholder);

		if($query){
			$this->load->view('frame/header_view');
			$this->load->view('frame/sidebar_nav_view');
			redirect('ManagementStakeholder/listp/' . $stakeholder['project_id']);
		}

	}


}
?>
