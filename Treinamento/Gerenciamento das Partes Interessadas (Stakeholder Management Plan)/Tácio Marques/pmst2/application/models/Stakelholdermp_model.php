<?php
	class Stakelholdermp_model extends CI_Model {
		function __construct(){
			parent::__construct();
			$this->load->database();
		}

		public function getAllStakelholdermp(){
			$query = $this->db->get('stakelholder_mp');
			return $query->result(); 
		}

		public function insertstakelholdermp($stakelholder_mp){
			return $this->db->insert('stakelholder_mp', $stakelholder_mp);
		}

		public function getStakelholdermp($stakelholder_mp_id){
			$query = $this->db->get_where('stakelholder_mp',array('stakelholder_mp_id'=>$stakelholder_mp_id));
			return $query->row_array();
		}

		public function updatestakelholdermp($stakelholder_mp, $stakelholder_mp_id){
			$this->db->where('stakelholder_mp.stakelholder_mp_id', $stakelholder_mp_id);
			return $this->db->update('stakelholder_mp', $stakelholder_mp);
		}

		public function deletestakelholdermp($stakelholder_mp_id){
			$this->db->where('stakelholder_mp.stakelholder_mp_id', $stakelholder_mp_id);
			return $this->db->delete('stakelholder_mp');
		}

	}
?>