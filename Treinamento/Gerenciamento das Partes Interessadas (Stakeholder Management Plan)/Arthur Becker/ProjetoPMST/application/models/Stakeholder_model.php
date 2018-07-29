<?php
	class Stakeholder_model extends CI_Model {
		function __construct(){
			parent::__construct();
			$this->load->database();
		}

		public function getAllStakeholder(){
			$query = $this->db->get('users');
			return $query->result(); 
		}

		public function insertstakeholder($user){
			return $this->db->insert('users', $user);
		}

		public function getStakeholder($id){
			$query = $this->db->get_where('users',array('id'=>$id));
			return $query->row_array();
		}

		public function updatestakeholder($user, $id){
			$this->db->where('users.id', $id);
			return $this->db->update('users', $user);
		}

		public function deletestakeholder($id){
			$this->db->where('users.id', $id);
			return $this->db->delete('users');
		}

	}
?>