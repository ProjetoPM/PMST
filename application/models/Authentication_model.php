<?php
if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Authentication_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function getUserRole($user_id)
    {
        $this->db->select('role');
        $this->db->where('user_id', $user_id);
        $this->db->from('user');
        $this->db->limit(1);
        $query = $this->db->get();
        $res = $query->row_array();
        return $res['role'];
    }

    function validate_login($postData){
        $this->db->select('*');
        $this->db->where('email', $postData['email']);
        $this->db->where('password', md5($postData['password']));
        $this->db->where('status', 1);
        $this->db->from('user');
        $query=$this->db->get();
        if ($query->num_rows() == 0)
            return false;
        else
            return $query->result();
    }

    public function insertSignature($signature)
    {
        return $this->db->insert('signature', $signature);
    }

    public function deleteAllSignature($item_id)
    {
        $this->db->where('signature.item_id', $item_id);
        return $this->db->delete('signature');
    }

    function change_password($postData){
        $this->load->model('admin_model');
        $validate = false;

        $oldData = $this->admin_model->get_user_by_id($this->session->userdata('user_id'));

        if($oldData[0]['password'] == md5($postData['currentPassword']))
            $validate = true;

        if($validate){
            $data = array(
                'password' => md5($postData['newPassword']),
            );
            $this->db->where('user_id', $this->session->userdata('user_id'));
            $this->db->update('user', $data);
        }
        
    }


}