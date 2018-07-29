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
            'status' => $postData['status'],
        );

        $this->db->insert('project', $data);

        $module = "Project Management";
        $activity = "created new project ".$postData['title'];
        return array('status' => 'success', 'message' => '');
    }
}

/* End of file */
?>