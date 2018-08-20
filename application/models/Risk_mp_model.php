<?php
	class Risk_mp_model extends CI_Model {
		function __construct(){
			parent::__construct();
			$this->load->database();
		}

		public function getRisk_mp($id){
			$query = $this->db->get_where('risk_mp',array('risk_mp_id'=>$id));
			return $query->row_array();
		}

		public function getRisk_mpProject_id($project_id){
			$query = $this->db->get_where('risk_mp', array('risk_mp.project_id'=>$project_id));
			return $query->result();
		}

		public function insertRisk_mp($risk_mp){
			return $this->db->insert('risk_mp', $risk_mp);
		}
		public function updateRisk_mp($risk_mp, $risk_mp_id){
			$this->db->where('risk_mp.risk_mp_id', $risk_mp_id);
			return $this->db->update('risk_mp', $risk_mp);
		}
	}
?>