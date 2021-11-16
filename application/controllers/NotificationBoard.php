<?php
if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class NotificationBoard extends CI_Controller
{

    public function __Construct()
    {
        parent::__Construct();
        if (!$this->session->userdata('logged_in')) {
            redirect(base_url());
        }
        if(strcmp($_SESSION['language'],"US") == 0){
            $this->lang->load('project-page', 'english');
            $this->lang->load('notification-board', 'english');
        }else{
            $this->lang->load('project-page', 'portuguese-brazilian');
            $this->lang->load('notification-board','portuguese-brazilian');
        }
        $this->lang->load('btn', 'english');
        //$this->lang->load('btn','portuguese-brazilian');
        
        //$this->lang->load('notification-board','portuguese-brazilian');

        if (!$this->session->userdata('logged_in')) {
            redirect(base_url());
        }
        $this->load->model('project_model');
        $this->load->model('log_model');
        $this->load->model('view_model');
        $this->load->model('notification_board_model');
        $this->load->helper('log_activity');
    }

    private function ajax_checking()
    {
        if (!$this->input->is_ajax_request()) {
            redirect(base_url());
        }
    }

    public function list($project_id)
    {
        if (strcmp($_SESSION['language'], "US") == 0) {
            $this->lang->load('btn', 'english');
        } else {
            $this->lang->load('btn', 'portuguese-brazilian');
        }
        
        
        $query['notification_board'] = $this->notification_board_model->getAll($project_id);
        $query['project_id'] = $project_id;
        $this->load->view('frame/header_view');
        $this->load->view('frame/topbar');
        $this->load->view('frame/sidebar_nav_view');
        $this->load->view('project/notification/notification_mp/list', $query);
    }
    
    public function new($project_id)
    {
        
        $idusuario = $_SESSION['user_id'];
        $this->db->where('user_id', $idusuario);
        $this->db->where('project_id', $project_id);
        $project['dados'] = $this->db->get('project_user')->result();
        
        if (count($project['dados']) > 0) {
            $query['project_id'] = $project_id;
            $this->load->view('frame/header_view');
            $this->load->view('frame/topbar');
            $this->load->view('frame/sidebar_nav_view');
            $this->load->view('project/notification/notification_mp/new', $query);
        } else {
            redirect(base_url());
        }
    }
    
    public function edit($notification_board)
    {
        if (strcmp($_SESSION['language'], "US") == 0) {
            $this->lang->load('btn', 'english');
        } else {
            $this->lang->load('btn', 'portuguese-brazilian');
        }
        
        $query['notification_board'] = $this->notification_board_model->get($notification_board);
        $query['project_id'] = $this->input->post('project_id');
        $this->load->view('frame/header_view');
        $this->load->view('frame/topbar');
        $this->load->view('frame/sidebar_nav_view');
        $this->load->view('project/notification/notification_mp/edit', $query);
    }

    public function insert()
    {
        $notification_board['running_activities'] = $this->input->post('running_activities');
        $notification_board['important_activities'] = $this->input->post('important_activities');
        $notification_board['open_issues'] = $this->input->post('open_issues');
        $notification_board['project_id'] = $this->input->post('project_id');
        $notification_board['changes_approval'] = $this->input->post('changes_approval');
        $notification_board['general_warnings'] = $this->input->post('general_warnings');

        $query = $this->notification_board_model->insert($notification_board);

        if ($query) {
            insertLogActivity('insert', 'notification board');
            redirect('notification-board/list/' . $notification_board['project_id']);
        }
    }

    public function update()
    {
        $notification_board['running_activities'] = $this->input->post('running_activities');
        $notification_board['important_activities'] = $this->input->post('important_activities');
        $notification_board['open_issues'] = $this->input->post('open_issues');
        $notification_board['project_id'] = $this->input->post('project_id');
        $notification_board['changes_approval'] = $this->input->post('changes_approval');
        $notification_board['general_warnings'] = $this->input->post('general_warnings');

        $query = $this->notification_board_model->update($notification_board, $_SESSION['project_id']);

        if ($query) {
            insertLogActivity('update', 'notification board');
            redirect('notification-board/list/' . $_SESSION['project_id']);
        }
    }

    public function delete($id)
    {
        $project_id['id'] = $this->input->post('project_id');
        $query = $this->notification_board_model->delete($id);
        if ($query) {
            insertLogActivity('delete', 'notification board');
            redirect('notification-board/list/' . $_SESSION['project_id']);
        }
    }
}
