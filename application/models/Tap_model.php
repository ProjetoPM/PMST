<?php
if (!defined('BASEPATH')) {
	exit('No direct script access allowed');
}

class Tap_model extends CI_Model{

	function __construct() {
		parent::__construct();

	}

	//inicia a view
	public function tap_form($project_id){
		$query = $this->db->get_where('project_charter', array('project_id' => $project_id));
		return $query->result();

	}


	//buscando stakeholders
	public function getAllStk_mp(){
		$data = $this->db->get('stakeholder_mp');
		return $data->result();
	}

	public function getAllStk(){
		$data = $this->db->get('stakeholder');
		return $data->result();
	}


	public function getpProject_charterProject_id($project_id) {
		$query = $this->db->get_where('project_charter', array('project_charter_id.project_id'=>$project_id));
		return $query->result();
	}

	public function insertTap($project_charter) {
		return $this->db->insert('project_charter', $project_charter);
	}

	public function updateTap($project_charter, $project_charter_id) {
		$this->db->where('project_charter.project_charter_id', $project_charter_id);
		return $this->db->update('project_charter', $project_charter);
	}

}

?>