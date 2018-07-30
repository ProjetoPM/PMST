<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Stakeholder_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function insert_stakeholder($postData){

        $data = array(
            'name' => $postData['name'],
            // 'interest' => $postData['interest'],
			// 'power' => $postData['power'],
			// 'influence' => $postData['influence'],
			// 'impact' => $postData['impact'],
			// 'average' => $postData['average'],
			// 'engagement' => $postData['engagement'],
			'roles_responsabilies' => $postData['roles_responsabilies'],
			// 'strategy' => $postData['strategy'],
			// 'scopeImpact' => $postData['scopeImpact'],
			// 'comments' => $postData['comments'],
            'status' => $postData['status'],
        );

        $this->db->insert('stakeholder', $data);

        $module = "Stakeholder Management";
        $activity = "created new stakeholder ".$postData['name'];
        return array('status' => 'success', 'message' => '');
    }

    function insert_stakeholdermp($postData){

        $data = array(
            'name' => $postData['name'],
            'interest' => $postData['interest'],
            'power' => $postData['power'],
            'influence' => $postData['influence'],
            'impact' => $postData['impact'],
            'average' => $postData['average'],
            'engagement' => $postData['engagement'],
            'roles_responsabilies' => $postData['roles_responsabilies'],
            'strategy' => $postData['strategy'],
            'scopeImpact' => $postData['scopeImpact'],
            'comments' => $postData['comments'],
            'status' => $postData['status'],
        );

        $this->db->insert('stakeholder', $data);

        $module = "Stakeholder Management";
        $activity = "created new stakeholder ".$postData['name'];
        return array('status' => 'success', 'message' => '');
    }
}

/* End of file */
?>