<?php
	class Requirements_log_model extends CI_Model {
		function __construct(){
			parent::__construct();
			$this->load->database();
		}

		public function getLog(){
		$query = $this->db->get('requirement_log');
         
			return $query->result(); 
		}

		public function getRegistration(){
			$query = $this->db->get('requirement_registration');
		
         return $query->result(); 
		}



		public function insertLog($re_log){
			return $this->db->insert('requirement_log', $re_log);
		}

		public function insertRegistration($re_regist){
            return $this->db->insert('requirement_registration', $re_regist);
		}

	
		public function updateLog($re_log, $id){
			$this->db->where('re_log.project_id', $id);
			return $this->db->update('requirement_log', $re_log);
		}

		public function updateRegistration($re_regist, $id){
			$this->db->where('re_regist.project_id', $id);
			return $this->db->update('requirement_log', $re_regist);
		}


	}
?>