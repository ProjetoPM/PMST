<?php
	class Communication_item_model extends CI_Model {
		function __construct(){
			parent::__construct();
			$this->load->database();
		}

		public function getCommunication_item($id){
			$query = $this->db->get_where('communication_item',array('communication_item_id'=>$id));
			return $query->row_array();
		}

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
		}
	}
?>