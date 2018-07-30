<?php
	class ProjectCharter_model extends CI_Model {
		function __construct(){
			parent::__construct();
			$this->load->database();
		}

		public function getAllProjectCharters(){
			$query = $this->db->get('project_charter');
			return $query->result(); 
		}

		public function insertprojectCharter($projectCharter){
			return $this->db->insert('project_charter', $projectCharter);
		}

		public function getProjectCharter($id){
			$query = $this->db->get_where('project_charter',array('project_charter_id'=>$id));
			return $query->row_array();
		}

		public function updateprojectCharter($projectCharter, $id){
			$this->db->where('project_charter.project_charter_id', $id);
			return $this->db->update('project_charter', $projectCharter);
		}

		public function deleteprojectCharter($id){
			$this->db->where('project_charter.project_charter_id', $id);
			return $this->db->delete('project_charter');
		}

	}
?>