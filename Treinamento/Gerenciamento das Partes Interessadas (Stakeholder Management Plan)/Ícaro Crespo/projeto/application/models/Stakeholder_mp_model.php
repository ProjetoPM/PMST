<?php
	class Stakeholder_mp_model extends CI_Model {
		function __construct(){
			parent::__construct();
			$this->load->database();
		}

		public function getAllStakeholder_mps(){
			$query = $this->db->get('stakeholder_mp');
			return $query->result(); 
		}

		public function insertstakeholder_mp($stakeholder_mp){
			return $this->db->insert('stakeholder_mp', $stakeholder_mp);
		}

		public function getStakeholder_mp($id){
			$query = $this->db->get_where('stakeholder_mp',array('stakeholder_mp_id'=>$id));
			return $query->row_array();
		}

		public function updatestakeholder_mp($stakeholder_mp, $id){
			$this->db->where('stakeholder_mp.stakeholder_mp_id', $id);
			return $this->db->update('stakeholder_mp', $stakeholder_mp);
		}

		public function deletestakeholder_mp($id){
			$this->db->where('stakeholder_mp.stakeholder_mp_id', $id);
			return $this->db->delete('stakeholder_mp');
		}

	}
?>