<?php
defined('BASEPATH') or exit('No direct script access allowed');

class WorkPerformanceReports extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('logged_in')) {
            redirect(base_url());
        }
        $this->load->helper('url');
        $this->load->model('Work_performance_report_model');
        $this->load->model('view_model');
        $this->load->model('log_model');
        $this->load->helper('log_activity');


        $this->lang->load('btn', 'english');
        // $this->lang->load('btn','portuguese-brazilian');
        $this->lang->load('work_performance_report', 'english');

        // $this->lang->load('manage-cost','portuguese-brazilian');

    }

    public function new($project_id)
    {
        $idusuario = $_SESSION['user_id'];
        $this->db->where('user_id', $idusuario);
        $this->db->where('project_id', $project_id);
        $project['dados'] = $this->db->get('project_user')->result();

        if (count($project['dados']) > 0) {
            $dado['project_id'] = $project_id;
            $this->load->view('frame/header_view');
            $this->load->view('frame/topbar');
            $this->load->view('frame/sidebar_nav_view');
            $this->load->view('project/integration/work_performance_report/new', $dado);
        } else {
            redirect(base_url());
        }
    }

    public function delete($work_id)
    {
        $project_id['project_id'] = $this->input->post('project_id');
        $query = $this->Work_performance_report_model->delete($work_id);
        if ($query) {
            insertLogActivity('delete', 'work performance reports');
            redirect('integration/work-performance-reports/list/' . $_SESSION['project_id']);
        }
    }

    public function list($project_id)
    {
        $dado['project_id'] = $project_id;
        $dado['work_performance_report'] = $this->Work_performance_report_model->getAll($project_id);
        $this->load->view('frame/header_view');
        $this->load->view('frame/topbar');
        $this->load->view('frame/sidebar_nav_view');
        $this->load->view('project/integration/work_performance_report/list', $dado);
    }


    public function edit($project_id)
    {
        $query['work_performance_report'] = $this->Work_performance_report_model->get($project_id);
        $this->load->view('frame/header_view');
        $this->load->view('frame/topbar');
        $this->load->view('frame/sidebar_nav_view');
        $this->load->view('project/integration/work_performance_report/edit', $query);
    }



    public function update($project_id)
    {
        $work_performance_report['responsible'] = $this->input->post('responsible');
        $work_performance_report['date'] = $this->input->post('date');
        $work_performance_report['main_activities'] = $this->input->post('main_activities');
        $work_performance_report['next_activities'] = $this->input->post('next_activities');
        $work_performance_report['comments'] = $this->input->post('comments');
        $work_performance_report['issues'] = $this->input->post('issues');
        $work_performance_report['changes'] = $this->input->post('changes');
        $work_performance_report['risks'] = $this->input->post('risks');
        $work_performance_report['attention_points'] = $this->input->post('attention_points');

        $work_performance_report['project_id'] = $this->input->post('project_id');

        $data['work_performance_report'] = $work_performance_report;
        $query = $this->Work_performance_report_model->update($data['work_performance_report'], $project_id);

        if ($query) {
            insertLogActivity('update', 'work performance reports');
            $this->session->set_flashdata('success', 'Work Performance Reports has been successfully changed!');
            redirect('integration/work-performance-reports/list/' . $work_performance_report['project_id']);
        }
    }

    public function insert($project_id)
    {
        $work_performance_report['responsible'] = $this->input->post('responsible');
        $work_performance_report['date'] = $this->input->post('date');
        $work_performance_report['main_activities'] = $this->input->post('main_activities');
        $work_performance_report['next_activities'] = $this->input->post('next_activities');
        $work_performance_report['comments'] = $this->input->post('comments');
        $work_performance_report['issues'] = $this->input->post('issues');
        $work_performance_report['changes'] = $this->input->post('changes');
        $work_performance_report['risks'] = $this->input->post('risks');
        $work_performance_report['attention_points'] = $this->input->post('attention_points');

        $work_performance_report['project_id'] = $this->input->post('project_id');

        $query = $this->Work_performance_report_model->insert($work_performance_report);

        if ($query) {
            insertLogActivity('insert', 'work performance reports');
            $this->session->set_flashdata('success', 'Work Performance Reports has been successfully created!');
            redirect('integration/work-performance-reports/list/' . $work_performance_report['project_id']);
        }
    }
}
