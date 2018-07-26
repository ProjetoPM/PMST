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
   public function getStore($idStore){
			$query = $this->db->get_where('store',array('idStore'=>$idStore));
			return $query->row_array();
		}
   public function updatestore($store, $idStore){
			$this->db->where('idStore', $idStore);
			return $this->db->update('store', $store);
		}

		public function deletestore($idStore){
			$this->db->where('idStore', $idStore);
			return $this->db->delete('store');
		}


	}
?>