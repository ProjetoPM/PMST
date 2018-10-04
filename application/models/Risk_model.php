<?php
	class Risk_model extends CI_Model {
		function __construct(){
			parent::__construct();
			$this->load->database();
		}

		public function insert($risk_register){
			return $this->db->insert('risk_register', $risk_register);
		}
	}
?>