<?php
	class Tep_model extends CI_Model {
		function __construct(){
			parent::__construct();
			$this->load->database();
		}

		public function getTep(){
			$query = $this->db->get('project_closure_term');
			return $query->result(); 
		}

		public function insertTep($project_closure_term){
			return $this->db->insert('project_closure_term', $project_closure_term);
		}

		public function updatetep($project_closure_term, $id){
			$this->db->where('project_closure_term.project_id', $id);
			return $this->db->update('project_closure_term', $project_closure_term);
		}

	}
?>