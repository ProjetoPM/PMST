<?php
	class Stakeholder_model extends CI_Model {
		function __construct(){
			parent::__construct();
			$this->load->database();
		}

		public function getAllStakeholders(){
			$query = $this->db->get('stakeholder');
			return $query->result(); 
		}

		public function insertstakeholder($stakeholder){
			return $this->db->insert('stakeholder', $stakeholder);
		}

		public function getStakeholder($id){
			$query = $this->db->get_where('stakeholder',array('stakeholder_id'=>$id));
			return $query->row_array();
		}

		public function updatestakeholder($stakeholder, $id){
			$this->db->where('stakeholder.stakeholder_id', $id);
			return $this->db->update('stakeholder', $stakeholder);
		}

		public function deletestakeholder($id){
			$this->db->where('stakeholder.stakeholder_id', $id);
			return $this->db->delete('stakeholder');
		}

	}
?>