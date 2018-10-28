<?php
class Change_log_model extends CI_Model {
	function __construct(){
		parent::__construct();
		$this->load->database();
	}

	public function getChange_log(){
		$query = $this->db->get('change_log');
		return $query->result(); 
	}

	public function insertChange_log($change_log){
		return $this->db->insert('change_log', $change_log);
	}

	public function updateChange_log($change_log, $id){
		$this->db->where('change_log.project_id', $id);
		return $this->db->update('change_log', $change_log);
	}

}
?>