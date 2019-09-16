<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Activity extends CI_Controller {

	function __construct(){
		parent::__construct();
        if (!$this->session->userdata('logged_in')) {
            redirect(base_url());
        }
		$this->load->helper('url');
		$this->load->model('Activity_model');


		$this->lang->load('btn','english');
        // $this->lang->load('btn','portuguese-brazilian');
    $this->lang->load('activity','english');

        // $this->lang->load('manage-cost','portuguese-brazilian');

	}

	public function newp($project_id){
		$idusuario = $_SESSION['user_id'];
    $this->db->where('user_id', $idusuario);
    $this->db->where('project_id', $project_id);
    $project['dados'] = $this->db->get('project_user')-> result();

    if (count($project['dados']) > 0) {
        $dado['project_id'] = $project_id;
        $this->load->view('frame/header_view');
        $this->load->view('frame/sidebar_nav_view');
        $this->load->view('project/schedule/activity_list/new',$dado);
    } else {
        redirect(base_url());
    }
	}

    public function deleteActivity($id){
        $project_id['project_id'] = $this->input->post('project_id');
        $query = $this->Activity_model->deleteActivity($id);
        if($query){
            $this->load->view('frame/header_view');
            $this->load->view('frame/sidebar_nav_view');
            redirect(base_url() . 'Activity/listp/' . $project_id['project_id']);
        }
    }

    public function listp($project_id){
        $dado['project_id'] = $project_id;
        $dado['activity'] = $this->Activity_model->getAllActivity($project_id);
        $this->load->view('frame/header_view');
        $this->load->view('frame/sidebar_nav_view');
        $this->load->view('project/schedule/activity_list/list',$dado);
    }


    public function editActivity($id) {
        $query['activity'] = $this->Activity_model->getActivity($id);
        $this->load->view('frame/header_view.php');
        $this->load->view('frame/sidebar_nav_view.php');
        $this->load->view('project/schedule/activity_list/edit', $query);
    }

		public function editResourceRequirement($id) {
				$query['activity'] = $this->Activity_model->getActivity($id);
				$this->load->view('frame/header_view.php');
				$this->load->view('frame/sidebar_nav_view.php');
				$this->load->view('project/schedule/resource_requirement/edit', $query);
		}

		public function updateResourceRequirement($id) {
				$activity['predecessor_activity'] = $this->input->post('predecessor_activity');
				$activity['dependence_type'] = $this->input->post('dependence_type');
				$activity['anticipation'] = $this->input->post('anticipation');
				$activity['wait'] = $this->input->post('wait');

        $activity['project_id'] = $this->input->post('project_id');

				$data['activity'] = $activity;
				$query = $this->Activity_model->updateActivity($data['activity'], $id);

        if ($query) {
            redirect('Activity/listp/' . $activity['project_id']);
        }
    }

    public function updateActivity($id) {
        $activity['associated_id'] = $this->input->post('associated_id');
        $activity['project_phase'] = $this->input->post('project_phase');
        $activity['milestone'] = $this->input->post('milestone');
				$activity['activity_name'] = $this->input->post('position');

				$activity['predecessor_activity'] = $this->input->post('predecessor_activity');
				$activity['dependence_type'] = $this->input->post('dependence_type');
				$activity['anticipation'] = $this->input->post('anticipation');
				$activity['wait'] = $this->input->post('wait');

        $activity['project_id'] = $this->input->post('project_id');

				$data['activity'] = $activity;
				$query = $this->Activity_model->updateActivity($data['activity'], $id);

        if ($query) {
            redirect('Activity/listp/' . $activity['project_id']);
        }
    }

	public function insertActivity($id){
		$activity['associated_id'] = $this->input->post('associated_id');
		$activity['project_phase'] = $this->input->post('project_phase');
		$activity['milestone'] = $this->input->post('milestone');
		$activity['activity_name'] = $this->input->post('activity_name');

		$activity['project_id'] = $this->input->post('project_id');

		$query = $this->Activity_model->insert($activity);

		if($query){
			$this->load->view('frame/header_view');
			$this->load->view('frame/sidebar_nav_view');
			redirect('Activity/listp/' . $activity['project_id']);
		}
	}
}
?>
