<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ProjectPerformanceReport extends CI_Controller
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
        $this->load->model('Project_performance_report_model');


        if (strcmp($_SESSION['language'], "US") == 0) {
            $this->lang->load('project_performance_report', 'english');
            $this->lang->load('project-page', 'english');
        } else {
            $this->lang->load('project_performance_report', 'portuguese-brazilian');
            $this->lang->load('project-page', 'portuguese-brazilian');
        }



        
        // $this->lang->load('btn','portuguese-brazilian');


        // $this->lang->load('manage-cost','portuguese-brazilian');

    }

    public function new($project_id)
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
            $dado['project_id'] = $project_id;
            $this->load->view('frame/header_view');
            $this->load->view('frame/topbar');
            $this->load->view('frame/sidebar_nav_view');
            $this->load->view('project/integration/project_performance_report/new', $dado);
        } else {
            redirect(base_url());
        }
    }

    public function delete($id)
    {
        $project_id['project_id'] = $this->input->post('project_id');
        $query = $this->Project_performance_report_model->delete($id);
        if ($query) {
            insertLogActivity('delete', 'project performance and monitoring report');
            redirect('integration/project-performance-report/list/' . $_SESSION['project_id']);
        }
    }

    public function list($project_id)
    {
        $dado['project_id'] = $project_id;
        $dado['project_performance_report'] = $this->Project_performance_report_model->getAll($project_id);
        $this->load->view('frame/header_view');
        $this->load->view('frame/topbar');
        $this->load->view('frame/sidebar_nav_view');
        $this->load->view('project/integration/project_performance_report/list', $dado);
    }


    public function edit($project_id)
    {
        $query['project_performance_report'] = $this->Project_performance_report_model->get($project_id);

        $dado["fields"] = getAllFieldEvaluation($_SESSION['project_id'], "project performance and monitoring report", $query['project_performance_report']['id']);

        $this->load->view('frame/header_view.php');
        $this->load->view('frame/topbar');
        $this->load->view('frame/sidebar_nav_view.php');
        $this->load->view('project/integration/project_performance_report/edit', $query);
    }



    public function update($project_id)
    {
        if(strcmp($_SESSION['language'],"US") == 0){
			$feedback_success = 'Item Updated';
        }else{
			$feedback_success = 'Item Atualizado ';
		}
        
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
        $query = $this->Project_performance_report_model->update($data['project_performance_report'], $project_id);

        if ($query) {
            insertLogActivity('update', 'project performance and monitoring report');
            $this->session->set_flashdata('success', $feedback_success);
            redirect('integration/project-performance-report/list/' . $project_performance_report['project_id']);
        }
    }

    public function insert($project_id)
    {
        if(strcmp($_SESSION['language'],"US") == 0){
			$feedback_success = 'Item Created';
        }else{
			$feedback_success = 'Item Criado ';
		}

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

        if ($query) {
            insertLogActivity('insert', 'project performance and monitoring report');
            $this->session->set_flashdata('success', $feedback_success);
            redirect('integration/project-performance-report/list/' . $project_performance_report['project_id']);
        }
    }
}
