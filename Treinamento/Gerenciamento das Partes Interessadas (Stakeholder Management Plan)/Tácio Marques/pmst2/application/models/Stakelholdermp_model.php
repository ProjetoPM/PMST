<?php
	class Stakelholdermp_model extends CI_Model {
		function __construct(){
			parent::__construct();
			$this->load->database();
		}

		public function getAllStakelholdermp(){
			$query = $this->db->get('stakeholder_mp');
			return $query->result(); 
		}

		public function insertstakelholdermp($stakeholder_mp){
			return $this->db->insert('stakeholder_mp', $stakeholder_mp);
		}

		public function getStakelholdermp($stakeholder_mp_id){
			$query = $this->db->get_where('stakeholder_mp',array('stakeholder_mp_id'=>$stakeholder_mp_id));
			return $query->row_array();
		}

		public function updatestakelholdermp($stakeholder_mp, $stakeholder_mp_id){
			$this->db->where('stakeholder_mp.stakeholder_mp_id', $stakeholder_mp_id);
			return $this->db->update('stakeholder_mp', $stakeholder_mp);
		}

		public function deletestakelholdermp($stakeholder_mp_id){
			$this->db->where('stakeholder_mp.stakeholder_mp_id', $stakeholder_mp_id);
			return $this->db->delete('stakeholder_mp');
		}

	}
?>