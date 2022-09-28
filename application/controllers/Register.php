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
        $this->load->model('User_Model');
        $this->load->model('Workspace_invite_model');
    }
    
    public function list($project_id)
    {
        if(strcmp($_SESSION['language'],"US") == 0){
			$this->lang->load('project-page', 'english');
			$this->lang->load('btn', 'english');
		}else{
			$this->lang->load('project-page', 'portuguese-brazilian');
			$this->lang->load('btn', 'portuguese-brazilian');
		}

        $dado['project_id'] = $project_id;

        $dado['user'] = $this->User_Model->GetUsersByProject($project_id);
        $this->load->view('frame/header_view');
        $this->load->view('frame/topbar');
        $this->load->view('frame/sidebar_nav_view');
        $this->load->view('user/user_list', $dado);
    }

    public function addUser()
    {
        $email                  = $this->input->post('email');

        if (!isset($email) || empty($email)) {
            $this->session->set_flashdata('flashError', 'E-mail\'s empty.');
            redirect(site_url());
        }

        if($this->Admin_model->getUserByEmail($email)) {
            $this->session->set_flashdata('flashError', 'User ' . $email . '`s already created!');
            redirect(site_url());
        }

        $name                   = $this->input->post('name');
        $password               = md5($this->input->post('password'));
        $institution            = $this->input->post('institution');
        $role                   = 'user';
        $created_at             = date('Y\-m\-d\ H:i:s A');

        $user['name']           = $this->input->post('name');
        $user['email']          = $this->input->post('email');
        $user['password']       = md5($this->input->post('password'));
        $user['institution']    = $this->input->post('institution');
        $user['role']           = 'user';
        $user['created_at']     = date('Y\-m\-d\ H:i:s A');

        $this->load->model('user_register');
        $this->user_register->insert_user($user);

        /**
         * Verifica se este usuário já foi convidado para um workspace antes de criar a conta. Se sim, atualiza a tabela
         * 'workspace_invite' com o id do usuário criado. Assim, aparecerá um convite para o mesmo na tela do workspace.
         */
        $user_vinculated_in_workspace = $this->Workspace_invite_model->verifyNewUser($email);

        if ($user_vinculated_in_workspace) {
            $update_user_id = $this->User_Model->getUserIdByEmail($email);
            $this->Workspace_invite_model->update_new_user($update_user_id, $email);
        }

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
