<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Project_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function insert_project($postData){

        $data = array(
            'title' => $postData['title'],
            'description' => $postData['description'],
            'objectives' => $postData['objectives'],
            'created_by' => $this->session->userdata('user_id')
        );

        $this->db->insert('project', $data);

        $module = "Project Management";
        $activity = "created new project ".$postData['title'];
        $this->insert_log($activity, $module);
        return array('status' => 'success', 'message' => '');
    }

    function insert_log($activity, $module){
        $id = $this->session->userdata('user_id');

        $data = array(
            'fk_user_id' => $id,
            'activity' => $activity,
            'module' => $module,
            'created_at' => date('Y\-m\-d\ H:i:s A')
        );
        $this->db->insert('activity_log', $data);
    }
}

/* End of file */
?>