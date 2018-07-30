<?php
	class Stake_model extends CI_Model {
		function __construct(){
			parent::__construct();
			$this->load->database();
		}

		public function getAll(){
			$query = $this->db->get('stakelholder');
			return $query->result(); 
		}
		public function insertstake($stake){
			return $this->db->insert('stakelholder', $stake);
		}
		public function getStake($id){
			$query = $this->db->get_where('stakelholder',array('stakelholder_id'=>$id));
			return $query->row_array();
		}

		public function updatestake($stake, $id){
			$this->db->where('stakelholder_id', $id);
			return $this->db->update('stakelholder', $stake);
		}

		public function deletestake($id){
			$this->db->where('stakelholder_id', $id);
			return $this->db->delete('stakelholder');
		}

	}
?>