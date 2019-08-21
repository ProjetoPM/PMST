<?php
	class business_case_model extends CI_Model {
		function __construct(){
			parent::__construct();
			$this->load->database();
		}

		function createBusinessCase($postData){
			$data = array(
				'business_deals' => $postData['target_benefits'],
				'situation_analysis' => $postData['strategic_alignment'],
				'recommendation' => $postData['schedule_benefit'],
				'evaluation' => $postData['benefits_owner'],
				'project_id' => $postData['project_id'],
			);

			$this->db->insert('business_case', $data);
		}
		public function readBusinessCase($id){
			$query = $this->db->get_where('business_case',array('project_id'=>$id));
			return $query->result();
		}

		public function updateBusinessCase($project, $id){
			$this->db->where('business_case.project_id', $id);
			return $this->db->update('business_case', $project);
		}
	}
?>
