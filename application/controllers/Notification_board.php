<?php
if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Notification_board extends CI_Controller{

    public function __Construct(){
        parent::__Construct();

        $this->lang->load('btn','english');
        //$this->lang->load('btn','portuguese-brazilian');
        $this->lang->load('notification-board','english');
        //$this->lang->load('notification-board','portuguese-brazilian');

        if (!$this->session->userdata('logged_in')) {
            redirect(base_url());
        }
        $this->load->model('project_model');
        $this->load->model('notification_board_model');
    }

    private function ajax_checking(){
        if (!$this->input->is_ajax_request()) {
            redirect(base_url());
        }
    }

    public function list($project_id){
        $query['notification_board'] = $this->notification_board_model->getWithProject_id($project_id);
        $query['project_id'] = $project_id;
        $this->load->view('frame/header_view');
        $this->load->view('frame/sidebar_nav_view');
        $this->load->view('project/notification/notification_mp/list', $query);
    }

    public function newp($project_id){
        $query['project_id'] = $project_id;
        $this->load->view('frame/header_view');
        $this->load->view('frame/sidebar_nav_view');
        $this->load->view('project/notification/notification_mp/new', $query);
    }

    public function edit($notification_board){
        $query['notification_board'] = $this->notification_board_model->get($notification_board);
        $query['project_id'] = $this->input->post('project_id');
        $this->load->view('frame/header_view');
        $this->load->view('frame/sidebar_nav_view');
        $this->load->view('project/notification/notification_mp/edit', $query);
    }

    public function insert() {
        $notification_board['running_activities'] = $this->input->post('running_activities');
        $notification_board['important_activities'] = $this->input->post('important_activities');
        $notification_board['open_issues'] = $this->input->post('open_issues');
        $notification_board['project_id'] = $this->input->post('project_id');
        $notification_board['changes_approval'] = $this->input->post('changes_approval');
        $notification_board['general_warnings'] = $this->input->post('general_warnings');

        $query = $this->notification_board_model->insert($notification_board);

        if($query){
            $this->load->view('frame/header_view');
            $this->load->view('frame/sidebar_nav_view');
            redirect(base_url() . 'Notification_board/list/' . $notification_board['project_id']);
        }
    }

    public function update($id){
        $notification_board['running_activities'] = $this->input->post('running_activities');
        $notification_board['important_activities'] = $this->input->post('important_activities');
        $notification_board['open_issues'] = $this->input->post('open_issues');
        $notification_board['project_id'] = $this->input->post('project_id');
        $notification_board['changes_approval'] = $this->input->post('changes_approval');
        $notification_board['general_warnings'] = $this->input->post('general_warnings');

        $query = $this->notification_board_model->update($notification_board, $id);

        if($query){
            $this->load->view('frame/header_view');
            $this->load->view('frame/sidebar_nav_view');
            redirect(base_url() . 'Notification_board/list/' . $notification_board['project_id']);
        }
    }

    public function delete($id){
        $project_id['id'] = $this->input->post('project_id');
        $query = $this->notification_board_model->delete($id);
        if($query){
            $this->load->view('frame/header_view');
            $this->load->view('frame/sidebar_nav_view');
            redirect(base_url() . 'Notification_board/list/' . $project_id['id']);
        }
    }
}
?>
