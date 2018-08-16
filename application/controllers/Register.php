<?php
if (!defined('BASEPATH')) {
 exit('No direct script access allowed');
}
class Register extends CI_Controller
{
 public function addUser()
 {
  $user['name']           = $this->input->post('name');
  $user['email']          = $this->input->post('email');
  $user['password']       = $this->input->post('password');
  $user['institution']       = $this->input->post('institution');
  $user['role']           = $this->input->post('role');
  $this->load->model('user_register');
  $this->user_register->insert_user($user);

  redirect(site_url().'/authentication', 'refresh');
 }
 
 public function c_recover_password(){

  $user['email'] = $this->input->post('email');
  $this->load->model('user_register');
  $this->user_register->model_recover_password($user);
  
        //var_dump($user['email']);
 }

 public function show_Edit_User($id = null)
 {
        //$this->db->select('*');
  $datauser['user'] = $this->db->get_where('user', array(
   'user_id' => $this->session->userdata('user_id')
  ))->result();
  $this->db->where('user_id', $id);
  $this->load->view('frame/header_view');
  $this->load->view('frame/sidebar_nav_view');
  $this->load->view('frame/footer_view');
  $this->load->view('edit_user', $datauser);
 }
 public function updateUser($id = null)
 {
  $this->db->where('user_id', $id);
  $datauser['user'] = $this->db->get('user')->result();
  $this->load->view('frame/header_view');
  $this->load->view('frame/sidebar_nav_view');
  $this->load->view('edit_user', $datauser);
 }
 public function saveUpdateUser()
 {
        //$this->ajax_checking();
  $postData = $this->input->post();
  $this->db->where('user_id', $postData['user_id']);
  $_SESSION['name'] = $postData['name'];
  if ($this->db->update('user', $postData)) {
   $this->session->set_flashdata('userUpdate', 'User ' . $postData['name'] . ' has been updated created!');            
  }
  redirect(base_url());
 }
}
