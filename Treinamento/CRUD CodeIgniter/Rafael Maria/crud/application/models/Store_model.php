<?php
	class Store_model extends CI_Model {
		function __construct(){
			parent::__construct();
			$this->load->database();
		}

		public function getAllStores() {
			$query = $this->db->get('store');
			return $query->result();
		}

	}	
?>