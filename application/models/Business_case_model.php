<?php
	class Business_case_model extends CI_Model {
		function __construct(){
			parent::__construct();
			$this->load->database();
		}

		function insert($data){
			return $this->db->insert('business_case', $data);
		}
		public function get($project_id){
			$query = $this->db->get_where('business_case',array('project_id'=>$project_id));
			return $query->result();
		}

		public function update($business_case, $project_id){
			$this->db->where('business_case.project_id', $project_id);
			return $this->db->update('business_case', $business_case);
		}
	}
?>
