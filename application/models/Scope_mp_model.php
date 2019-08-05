<?php
if (!defined('BASEPATH')) {
	exit('No direct script access allowed');
}

class Scope_mp_model extends CI_Model{

	function __construct() {
		parent::__construct();

	}

	//inicia a view
	public function tap_form($project_id){
		$query = $this->db->get_where('scope_mp', array('project_id' => $project_id));
		return $query->result();

	}

	public function getScope_MpProject_id($project_id) {
		$query = $this->db->get_where('scope_mp', array('scope_mp_id.project_id'=>$project_id));
		return $query->result();
	}

	public function insertScopeMp($scope_mp) {
		return $this->db->insert('scope_mp', $scope_mp);
	}

	public function updateScopeMp($scope_mp, $scope_mp_id) {
		$this->db->where('scope_mp.scope_mp_id', $scope_mp_id);
		return $this->db->update('scope_mp', $scope_mp);
	}

}

?>
