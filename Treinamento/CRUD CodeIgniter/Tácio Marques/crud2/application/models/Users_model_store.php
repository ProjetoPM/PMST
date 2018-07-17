<?php
	class Users_model_store extends CI_Model {
		function __construct(){
			parent::__construct();
			$this->load->database();
		}

		public function getAllStore(){
			$query = $this->db->get('store');
			return $query->result(); 
		}

		public function insertStore($store){
			return $this->db->insert('store', $store);
		}

		public function getStore($id){
			$query = $this->db->get_where('store',array('id'=>$id));
			return $query->row_array();
		}

		public function updateStore($name, $id){
			$this->db->where('name.id', $id);
			return $this->db->update('store', $store);
		}

		public function deleteStore($id){
			$this->db->where('name.id', $id);
			return $this->db->delete('store');
		}

	}
?>