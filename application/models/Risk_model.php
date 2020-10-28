<?php
	class Risk_model extends CI_Model {
		function __construct(){
			parent::__construct();
			$this->load->database();
		}

		public function insert($risk_register){
			return $this->db->insert('risk_register', $risk_register);
		}

		public function get($risk_register_id){
			$query = $this->db->get_where('risk_register',array('risk_register_id'=>$risk_register_id));
			return $query->row_array();
		}

		public function getAll($project_id){
			$query = $this->db->get_where('risk_register', array('risk_register.project_id'=>$project_id));
			return $query->result(); 
		}

		public function update($risk_register, $risk_register_id){
			$this->db->where('risk_register.risk_register_id', $risk_register_id);
			return $this->db->update('risk_register', $risk_register);
		}

		public function delete($risk_register_id){
			$this->db->where('risk_register.risk_register_id', $risk_register_id);
			return $this->db->delete('risk_register');
		}


	}
?>