<?php
if (!defined('BASEPATH')) {
	exit('No direct script access allowed');
}

class Project_management_model extends CI_Model{

	function __construct() {
		parent::__construct();

	}

	//inicia a view
	public function tap_form($project_id){
		$query = $this->db->get_where('project_mp', array('project_id' => $project_id));
		return $query->result();

	}

	public function getProject_MpProject_id($project_id) {
		$query = $this->db->get_where('project_mp', array('project_mp_id.project_id'=>$project_id));
		return $query->result();
	}

	public function insertProjectMp($project_mp) {
		return $this->db->insert('project_mp', $project_mp);
	}

	public function updateProjectMp($project_mp, $project_mp_id) {
		$this->db->where('project_mp.project_mp_id', $project_mp_id);
		return $this->db->update('project_mp', $project_mp);
	}

}

?>
