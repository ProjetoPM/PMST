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

//--------------------
		public function getAllCommunication_responsability(){
			$query = $this->db->get('communication_responsability');
			return $query->result();
		}

		public function getCommunication_stakeholder_item_id($project_id){
			$query = $this->db->get_where('stakeholder', array('stakeholder.project_id'=>$project_id));
			return $query->result();
		}
		public function insertCommunication_stakeholder_responsability($stakeholder_responsability){
			return $this->db->insert('communication_stakeholder_responsability', $stakeholder_responsability);
		}
	//---------------------
		function createCommunicationItem($postData){
			$data = array(
				'type' => $postData['type'],
				'description' => $postData['description'],
				'content' => $postData['content'],
				'distribution_reason' => $postData['distribution_reason'],
				'language' => $postData['language'],
				'channel' => $postData['channel'],
				'documento_format' => $postData['documento_format'],
				'metod' => $postData['metod'],
				'frequency' => $postData['frequency'],
				'allocated_resources' => $postData['allocated_resources'],
				'format' => $postData['format'],
				'local' => $postData['local'],
				'project_id' => $postData['project_id'],
				'status' => (int) $postData['status']
			);
	
			$this->db->insert('communication_item', $data);
		}

		public function insert($id) {
			$communication_item['type'] = $this->input->post('type');
			$communication_item['description'] = $this->input->post('description');
			$communication_item['content'] = $this->input->post('content');
			$communication_item['distribution_reason'] = $this->input->post('distribution_reason');
			$communication_item['language'] = $this->input->post('language');
			$communication_item['channel'] = $this->input->post('channel');
			$communication_item['documento_format'] = $this->input->post('documento_format');
			$communication_item['metod'] = $this->input->post('metod');
			$communication_item['frequency'] = $this->input->post('frequency');
			$communication_item['allocated_resources'] = $this->input->post('allocated_resources');
			$communication_item['format'] = $this->input->post('format');
			$communication_item['local'] = $this->input->post('local');
			$communication_item['project_id'] = $this->input->post('project_id');
			
			if($this->input->post('status') == 1){
				$communication_item['status'] = 1;
			}else{
				$communication_item['status'] = 0;
			}
			$query = $this->communication_item_model->insertCommunication_item($communication_item);
	
			if($query){
				redirect('project/communication_item');
			}
		}
		public function insertCommunication_item($communication_item){
			return $this->db->insert('communication_item', $communication_item);
		}

		


		//public function insertCommunication_item($communication_item){
		//	return $this->db->insert('communication_item', $communication_item);
		//}
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