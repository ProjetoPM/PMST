<?php
	class tap_model extends CI_Model {
		function __construct(){
			parent::__construct();
			$this->load->database();
		}

		public function getAllTap(){
			$query = $this->db->get('project_charter');
			return $query->result(); 
		}
		public function insert($tap){
			return $this->db->insert('project_charter', $tap);
		}
		public function updatetap($tap, $id){
			$this->db->where('project_charter_id', $id);
			return $this->db->update('project_charter', $tap);
		}

		public function deletetap($id){
			$this->db->where('project_charter_id', $id);
			return $this->db->delete('project_charter');
		}

	}
?>