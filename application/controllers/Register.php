<?php
if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}
class Register extends CI_Controller
{

    public function __Construct()
    {
        parent::__Construct();
       
        $this->load->model('Admin_model');
    }

    public function addUser()
    {
        if($this->Admin_model->getUserByEmail($this->input->post('email')) != null){
            $this->session->set_flashdata('flashError', 'User ' . $this->input->post('email') . '`s already created!');
            redirect(site_url());
        }
        $user['name'] = $this->input->post('name');
        $user['email'] = $this->input->post('email');
        $user['password'] = md5($this->input->post('password'));
        $user['institution'] = $this->input->post('institution');
        $user['role'] = 'user';
        $user['created_at'] = date('Y\-m\-d\ H:i:s A');

        $this->load->model('user_register');
        $this->user_register->insert_user($user);
        $this->session->set_flashdata('flashCreated', 'User ' . $user['email'] . '`s password has been successfully created!');
            redirect(site_url());
    }
    
    // public function c_recover_password(){

    //     $user['email'] = $this->input->post('email');
    //     $this->load->model('user_register');
    //     $this->user_register->model_recover_password($user);
        
    //     //var_dump($user['email']);
    // }

    public function show_Edit_User($project_id = null)
    {
        //$this->db->select('*');
        $datauser['user'] = $this->db->get_where('user', array(
            'user_id' => $this->session->userdata('user_id')
        ))->result();
        $this->db->where('user_id', $project_id);
        $this->load->view('frame/header_view'); 
		 $this->load->view('frame/topbar');
        $this->load->view('frame/sidebar_nav_view');
        $this->load->view('frame/footer_view');
        $this->load->view('edit_user', $datauser);
    }
    public function updateUser($project_id = null)
    {
        $this->db->where('user_id', $project_id);
        $datauser['user'] = $this->db->get('user')->result();
        $this->load->view('frame/header_view'); 
		 $this->load->view('frame/topbar');
        $this->load->view('frame/sidebar_nav_view');
        $this->load->view('edit_user', $datauser);
    }
    public function saveUpdateUser()
    {
        //$this->ajax_checking();
        $postData = $this->input->post();
        $this->db->where('user_id', $postData['user_id']);
        $_SESSION['name'] = $postData['name'];
        $this->db->update('user', $postData);
        $this->session->set_flashdata('success', 'User ' . $postData['name'] . ' has been updated!');   
        redirect('project/show_projects');
    }

    public function savePassword()
    {
        $postData['user_id'] = $this->input->post('user_id');
        $postData['password'] = md5($this->input->post('password'));
        $this->db->where('user_id', $postData['user_id']);
        $this->db->update('user', $postData);
        $this->session->set_flashdata('success', 'Password has been updated!');
        
        redirect('project/show_projects');
    }
}
