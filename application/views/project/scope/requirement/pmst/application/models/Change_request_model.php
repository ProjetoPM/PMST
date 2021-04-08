<?php
	class Change_request_model extends CI_Model {
		function __construct(){
			parent::__construct();
			$this->load->database();
		}

		public function insert($change_request){
			return $this->db->insert('change_request', $change_request);
		}

		public function get($id){
			$query = $this->db->get_where('change_request',array('id'=>$id));
			return $query->row_array();
		}

		public function getAll($project_id){
			$query = $this->db->get_where('change_request', array('change_request.project_id'=>$project_id));
			return $query->result();
		}

		public function update($change_request, $id){
			$this->db->where('change_request.id', $id);
			return $this->db->update('change_request', $change_request);
		}

		public function delete($id){
			$this->db->where('change_request.id', $id);
			return $this->db->delete('change_request');
		}


	}
?>
