<?php
	class Issues_record_stakeholder_model extends CI_Model {
		function __construct(){
			parent::__construct();
			$this->load->database();
		}

		public function getIssues_record_stakeholder($idIR, $idS){
			$query = $this->db->get_where('issues_record',array('issues_record_id'=>$id));
			return $query->row_array();
		}

		public function getAllIssues_record(){
			$query = $this->db->get('issues_record');
			return $query->result();
		}

		public function getIssues_recordProject_id($project_id){
			$query = $this->db->get_where('issues_record', array('issues_record.project_id'=>$project_id));
			return $query->result();
		}

		public function insertIssues_record($issues_record){
			return $this->db->insert('issues_record', $issues_record);
		}
		public function updateIssues_record($issues_record, $issues_record_id){
			$this->db->where('issues_record.issues_record_id', $issues_record_id);
			return $this->db->update('issues_record', $issues_record);
		}
	}
?>