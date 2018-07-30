<?php
class Store_model extends CI_Model {
	function __construct(){
		parent::__construct();
		$this->load->database();
		
	}
	public function getAllStores(){
		$query = $this->db->get('crud.store'); 
		return $query->result();
	}

	public function deleteStore($idStore){
		$this->db->where('store.idStore', $idStore);
		return $this->db->delete('store');
	}

	public function getStore($idStore){
		$query = $this->db->get_where('store',array('idStore'=>$idStore));
		return $query->row_array();
	}

	public function updateStore($sto, $idStore){
		$this->db->where('store.idStore', $idStore);
		return $this->db->update('store', $sto);
	}


}
?>