<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

    class Register extends CI_Controller
        {

            public function addUser()
                {
                    $user['name'] = $this->input->post('name');
                    $user['email'] = $this->input->post('email');
                    $user['password'] = $this->input->post('password');
                    $user['institution'] = $this->input->post('institution');
                    $user['lattes_address'] = $this->input->post('lattes_address');
                    $user['role'] = $this->input->post('role');

                    $this->load->model('user_register');

                    $this->user_register->insert_user($user);
                }
            
        }