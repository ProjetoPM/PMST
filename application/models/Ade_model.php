<?php
class Ade_model extends CI_Model {
	function __construct(){
		parent::__construct();
		$this->load->database();
	}

	public function insertAde($team_performance_evaluation){
		return $this->db->insert('team_performance_evaluation', $team_performance_evaluation);
	}

	public function getAde($id){
		$query = $this->db->get_where('team_performance_evaluation',array('project_id'=>$id));
		return $query->row_array();
	}

/*
	public function getAde($id){
		$query = $this->db->get_where('ade_view',array('ade_view'=>$id));
		return $query->row_array();
	}*/

/*
	public function getAllCommunication_item(){
		$query = $this->db->get('communication_item');
		return $query->result();
	}

	public function getCommunication_itemProject_id($project_id){
		$query = $this->db->get_where('communication_item', array('communication_item.project_id'=>$project_id));
		return $query->result();
	}

	public function insertCommunication_item($communication_item){
		return $this->db->insert('communication_item', $communication_item);
	}
	public function updateCommunication_item($communication_item, $communication_item_id){
		$this->db->where('communication_item.communication_item_id', $communication_item_id);
		return $this->db->update('communication_item', $communication_item);
	}

	public function deleteCommunication_item($id){
		$this->db->where('communication_item.communication_item_id', $id);
		return $this->db->delete('communication_item');
	}*/
}
?>