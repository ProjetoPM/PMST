<?php
	class Final_report_model extends CI_Model {
		function __construct(){
			parent::__construct();
			$this->load->database();
		}

		function insert($data){
		
			return $this->db->insert('final_report', $data);
		}
		public function get($project_id){
			$query = $this->db->get_where('final_report',array('project_id'=>$project_id));
			return $query->result();
		}

		public function update($final_report, $project_id){
			$this->db->where('final_report.project_id', $project_id);
			return $this->db->update('final_report', $final_report);
		}
	}
?>
