<?php
	class Store_model extends CI_Model {
		function __construct(){
			parent::__construct();
			$this->load->database();
   }
   public function getAllStories(){
   	$query = $this->db->get('store');
			return $query->result(); 
		
   }

	}
?>