<?php
	class Risk_model extends CI_Model {
		function __construct(){
			parent::__construct();
			$this->load->database();
		}

		public function insert($risk_register){
			return $this->db->insert('risk_register', $risk_register);
		}

		public function getRisk($risk_register_id){
			$query = $this->db->get_where('risk_register',array('risk_register_id'=>$risk_register_id));
			return $query->row_array();
		}

		public function getAllRiskProject($project_id){
			$query = $this->db->get_where('risk_register', array('risk_register.project_id'=>$project_id));
			return $query->result(); 
		}

		public function updateRisk($risk_register, $risk_register_id){
			$this->db->where('risk_register.risk_register_id', $risk_register_id);
			return $this->db->update('risk_register', $risk_register);
		}

		public function deleteRisk($risk_register_id){
			$this->db->where('risk_register.risk_register_id', $risk_register_id);
			return $this->db->delete('risk_register');
		}

		public function edit($risk_register_id) {
			$query = $this->db->get_where('risk_register', array('risk_register.risk_register_id'=>$risk_register_id));
			return $query->result();

		}

	}
?>