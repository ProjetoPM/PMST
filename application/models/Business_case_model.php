<?php
	class Business_case_model extends CI_Model {
		function __construct(){
			parent::__construct();
			$this->load->database();
		}

		function insert($postData){
			$data = array(
				'business_deals' => $postData['business_deals'],
				'situation_analysis' => $postData['situation_analysis'],
				'recommendation' => $postData['recommendation'],
				'evaluation' => $postData['evaluation'],
				'project_id' => $postData['project_id'],
			);

			$this->db->insert('business_case', $data);
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
