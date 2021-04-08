<?php
class Communication_item_model extends CI_Model {
	function __construct(){
		parent::__construct();
		$this->load->database();
	}

	public function get($id){
		$query = $this->db->get_where('communication_item', array('communication_item_id'=>$id));
		return $query->row_array();
	}

	public function getAll(){
		$query = $this->db->get('communication_item');
		return $query->result();
	}

	public function getWithProject_id($project_id){
		$query = $this->db->get_where('communication_item', array('communication_item.project_id'=>$project_id));
		return $query->result();
	}

	public function insert($communication_item){
		return $this->db->insert('communication_item', $communication_item);
	}

	public function update($communication_item, $communication_item_id){
		$this->db->where('communication_item.communication_item_id', $communication_item_id);
		return $this->db->update('communication_item', $communication_item);
	}

	public function delete($id){
		$this->db->where('communication_item.communication_item_id', $id);
		return $this->db->delete('communication_item');
	}

//--------------------
	public function getAllResponsability(){
		$query = $this->db->get('communication_responsability');
		return $query->result();
	}

	public function getCommunication_stakeholder_item_id($project_id){
		$query = $this->db->get_where('stakeholder', array('stakeholder.project_id'=>$project_id));
		return $query->result();
	}
	public function insertCSR($stakeholder_responsability){
		return $this->db->insert('communication_stakeholder_responsability', $stakeholder_responsability);
	}
}
?>