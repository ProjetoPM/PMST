<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ProjectPerformanceReport extends CI_Controller {

	function __construct(){
		parent::__construct();
        if (!$this->session->userdata('logged_in')) {
            redirect(base_url());
        }
		$this->load->helper('url');
		$this->load->model('Project_performance_report_model');


		$this->lang->load('btn','english');
        // $this->lang->load('btn','portuguese-brazilian');
    $this->lang->load('project_performance_report','english');

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
        $this->load->view('project/integration/project_performance_report/new',$dado);
    } else {
        redirect(base_url());
    }
	}

    public function delete($id){
        $project_id['project_id'] = $this->input->post('project_id');
        $query = $this->Project_performance_report_model->deleteProjectReport($id);
        if($query){
            $this->load->view('frame/header_view');
            $this->load->view('frame/sidebar_nav_view');
            redirect(base_url() . 'ProjectPerformanceReport/listp/' . $project_id['project_id']);
        }
    }

    public function listp($project_id){
        $dado['project_id'] = $project_id;
        $dado['project_performance_report'] = $this->Project_performance_report_model->getAllProjectReport($project_id);
        $this->load->view('frame/header_view');
        $this->load->view('frame/sidebar_nav_view');
        $this->load->view('project/integration/project_performance_report/list',$dado);
    }


    public function edit($id) {
        $query['project_performance_report'] = $this->Project_performance_report_model->getProjectReport($id);
        $this->load->view('frame/header_view.php');
        $this->load->view('frame/sidebar_nav_view.php');
        $this->load->view('project/integration/project_performance_report/edit', $query);
    }



    public function update($id) {
			$project_performance_report['date'] = $this->input->post('date');
			$project_performance_report['current_performance_analysis'] = $this->input->post('current_performance_analysis');
			$project_performance_report['planned_forecasts'] = $this->input->post('planned_forecasts');
			$project_performance_report['forecasts_considering_current_performance'] = $this->input->post('forecasts_considering_current_performance');
			$project_performance_report['current_risk_situation'] = $this->input->post('current_risk_situation');
			$project_performance_report['current_status_of_issues'] = $this->input->post('current_status_of_issues');
			$project_performance_report['work_completed_during_the_period'] = $this->input->post('work_completed_during_the_period');
			$project_performance_report['work_to_be_completed_in_the_next_period'] = $this->input->post('work_to_be_completed_in_the_next_period');
			$project_performance_report['summary_of_changes'] = $this->input->post('summary_of_changes');
			$project_performance_report['earned_value_management'] = $this->input->post('earned_value_management');
			$project_performance_report['other_relevant_information'] = $this->input->post('other_relevant_information');

        $project_performance_report['project_id'] = $this->input->post('project_id');

				$data['project_performance_report'] = $project_performance_report;
				$query = $this->Project_performance_report_model->updateProjectReport($data['project_performance_report'], $id);

        if ($query) {
            redirect('ProjectPerformanceReport/listp/' . $project_performance_report['project_id']);
        }
    }

	public function insert($id){
				$project_performance_report['date'] = $this->input->post('date');
				$project_performance_report['current_performance_analysis'] = $this->input->post('current_performance_analysis');
				$project_performance_report['planned_forecasts'] = $this->input->post('planned_forecasts');
				$project_performance_report['forecasts_considering_current_performance'] = $this->input->post('forecasts_considering_current_performance');
				$project_performance_report['current_risk_situation'] = $this->input->post('current_risk_situation');
				$project_performance_report['current_status_of_issues'] = $this->input->post('current_status_of_issues');
				$project_performance_report['work_completed_during_the_period'] = $this->input->post('work_completed_during_the_period');
				$project_performance_report['work_to_be_completed_in_the_next_period'] = $this->input->post('work_to_be_completed_in_the_next_period');
				$project_performance_report['summary_of_changes'] = $this->input->post('summary_of_changes');
				$project_performance_report['earned_value_management'] = $this->input->post('earned_value_management');
				$project_performance_report['other_relevant_information'] = $this->input->post('other_relevant_information');


				$project_performance_report['project_id'] = $this->input->post('project_id');

				$query = $this->Project_performance_report_model->insert($project_performance_report);

				if($query){
					$this->load->view('frame/header_view');
					$this->load->view('frame/sidebar_nav_view');
					redirect('ProjectPerformanceReport/listp/' . $project_performance_report['project_id']);
		}
	}

}
?>
