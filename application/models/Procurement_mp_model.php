<?php
	class Procurement_mp_model extends CI_Model {
		function __construct(){
			parent::__construct();
			$this->load->database();
		}

		public function getProcurement_mp($id){
			$query = $this->db->get_where('procurement_mp',array('procurement_mp_id'=>$id));
			return $query->row_array();
		}

		public function getProcurement_mpProject_id($project_id){
			$query = $this->db->get_where('procurement_mp', array('procurement_mp.project_id'=>$project_id));
			return $query->row_array();
		}

		public function insertProcurement_mp($procurement_mp){
			return $this->db->insert('procurement_mp', $procurement_mp);
		}
		public function updateProcurement_mp($procurement_mp, $procurement_mp_id){
			$this->db->where('procurement_mp.procurement_mp_id', $procurement_mp_id);
			return $this->db->update('procurement_mp', $procurement_mp);

		}
	}
?>