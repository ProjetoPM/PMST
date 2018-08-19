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

		public function insertRisk_mp($risk_mp){
			return $this->db->insert('risk_mp', $risk_mp);
		}
		public function updateRisk_mp($project_id, $risk_mp_id){

		}
	}
?>