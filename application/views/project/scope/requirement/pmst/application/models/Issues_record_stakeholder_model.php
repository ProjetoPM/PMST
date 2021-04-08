<?php
	class Issues_record_stakeholder_model extends CI_Model {
		function __construct(){
			parent::__construct();
			$this->load->database();
		}

		public function get($idIR, $idS){
			$query = $this->db->get_where('issues_record',array('issues_record_id'=>$id));
			return $query->row_array();
		}


		public function getAll($project_id){
			$query = $this->db->get_where('issues_record', array('issues_record.project_id'=>$project_id));
			return $query->result();
		}

		public function insert($issues_record){
			return $this->db->insert('issues_record', $issues_record);
		}
		public function update($issues_record, $issues_record_id){
			$this->db->where('issues_record.issues_record_id', $issues_record_id);
			return $this->db->update('issues_record', $issues_record);
		}
	}
?>