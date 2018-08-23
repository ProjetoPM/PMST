<?php
if (!defined('BASEPATH')) {
	exit('No direct script access allowed');
}

class Stakeholder_mp_model extends CI_Model{

	function __construct() {
		parent::__construct();
	}

	public function updateScheduleDB($shed){
		return $this->db->insert('schedule_mp', $shed);
	}

	public function getAllStakeholders(){
		$data = $this->db->get('stakeholder');
		return $data->result();
	}
}
?>