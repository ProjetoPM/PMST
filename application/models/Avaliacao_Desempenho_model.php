<?php
	class Team_Performance_Evaluation_model extends CI_Model {
		function __construct(){
			parent::__construct();
			$this->load->database();
		}

		public function insert($risk_register){
			return $this->db->insert('risk_register', $risk_register);
		}

		public function getAvalDes($risk_register_id){
			$query = $this->db->get_where('risk_register',array('risk_register_id'=>$risk_register_id));
			return $query->row_array();
		}

		public function getAllAvalDesProject($project_id){
			$query = $this->db->get_where('risk_register', array('risk_register.project_id'=>$project_id));
			return $query->result(); 
		}

		public function updateAvalDes($risk_register, $risk_register_id){
			$this->db->where('risk_register.risk_register_id', $risk_register_id);
			return $this->db->update('risk_register', $risk_register);
		}

		public function deleteAvalDes($risk_register_id){
			$this->db->where('risk_register.risk_register_id', $risk_register_id);
			return $this->db->delete('risk_register');
		}

		public function edit($risk_register_id) {
			$query = $this->db->get_where('risk_register', array('risk_register.risk_register_id'=>$risk_register_id));
			return $query->result();

		}

	}
?>