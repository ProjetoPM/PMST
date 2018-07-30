<?php
	class Project_model extends CI_Model {
		function __construct(){
			parent::__construct();
			$this->load->database();
		}

		public function getAllProjects(){
			$query = $this->db->get('project');
			return $query->result(); 
		}

		public function insertproject($project){
			return $this->db->insert('project', $project);
		}

		public function getProject($id){
			$query = $this->db->get_where('project',array('project_id'=>$id));
			return $query->row_array();
		}

		public function updateproject($project, $id){
			$this->db->where('project.project_id', $id);
			return $this->db->update('project', $project);
		}

		public function deleteproject($id){
			$this->db->where('project.project_id', $id);
			return $this->db->delete('project');
		}

	}
?>