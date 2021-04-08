<?php
	class Project_Closure_model extends CI_Model {
		function __construct(){
			parent::__construct();
			$this->load->database();
		}

	public function get($project_id){
		$query = $this->db->get_where('project_closure_term',array('project_id'=>$project_id));
		return $query->result();
	}

		public function insert($project_closure_term){
			return $this->db->insert('project_closure_term', $project_closure_term);
		}

		public function update($project_closure_term, $project_id){
			$this->db->where('project_closure_term.project_id', $project_id);
			return $this->db->update('project_closure_term', $project_closure_term);
		}

	}
?>