<?php
	class Change_log_model extends CI_Model {
		function __construct(){
			parent::__construct();
			$this->load->database();
		}

		public function get($id){
			$query = $this->db->get_where('change_log',array('change_log_id'=>$id));
			return $query->result();
		}

		public function getAll(){
			$query = $this->db->get('change_log');
			return $query->result();
		}

		public function getWithProject_id($project_id){
			$query = $this->db->get_where('change_log', array('change_log.project_id'=>$project_id));
			return $query->result();
		}

		public function insert($change_log){
			return $this->db->insert('change_log', $change_log);
		}

		public function update($change_log, $change_log_id){
			$this->db->where('change_log.change_log_id', $change_log_id);
			return $this->db->update('change_log', $change_log);
		}

		public function delete($id){
			$this->db->where('change_log.change_log_id', $id);
			return $this->db->delete('change_log');
		}
	}
?>