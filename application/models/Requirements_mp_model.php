<?php
if (!defined('BASEPATH')) {
	exit('No direct script access allowed');
}

class Requirements_mp_model extends CI_Model{

	function __construct() {
		parent::__construct();

	}

	//inicia a view
	public function tap_form($project_id){
		$query = $this->db->get_where('requirements_mp', array('project_id' => $project_id));
		return $query->result();

	}

	public function getRequirements_MpProject_id($project_id) {
		$query = $this->db->get_where('requirements_mp', array('requirements_mp_id.project_id'=>$project_id));
		return $query->result();
	}

	public function insertRequirementsMp($requirements_mp) {
		return $this->db->insert('requirements_mp', $requirements_mp);
	}

	public function updateRequirementsMp($requirements_mp, $requirements_mp_id) {
		$this->db->where('requirements_mp.requirements_mp_id', $requirements_mp_id);
		return $this->db->update('requirements_mp', $requirements_mp);
	}

}

?>
