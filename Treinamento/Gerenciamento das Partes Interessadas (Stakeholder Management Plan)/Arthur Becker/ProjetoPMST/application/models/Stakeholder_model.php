<?php
	class Stakelholder_model extends CI_Model {
		function __construct(){
			parent::__construct();
			$this->load->database();
		}

		public function getAllStakelholder(){
			$query = $this->db->get('stakelholder');
			return $query->result(); 
		}

		public function insertstakelholder($stakelholder){
			return $this->db->insert('stakelholder', $stakelholder);
		}

		public function getStakelholder($stakelholder_id){
			$query = $this->db->get_where('stakelholder',array('stakelholder_id'=>$stakelholder_id));
			return $query->row_array();
		}

		public function updatestakelholder($stakelholder, $stakelholder_id){
			$this->db->where('stakelholder.stakelholder_id', $stakelholder_id);
			return $this->db->update('stakelholder', $stakelholder);
		}

		public function deletestakeholder($stakelholder_id){
			$this->db->where('stakelholder.stakelholder_id', $stakelholder_id);
			return $this->db->delete('stakelholder');
		}

	}
?>