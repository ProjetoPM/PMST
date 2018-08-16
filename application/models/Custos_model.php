<?php
	class Custos_model extends CI_Model {
		function __construct(){
			parent::__construct();
			$this->load->database();
		}

		public function getAllCustos(){
			$query = $this->db->get('cost_mp');
			return $query->result(); 
		}

		public function insertCustos($cost_mp){
			return $this->db->insert('cost_mp', $cost_mp);
		}
	}
?>