<?php
	class business_case_model extends CI_Model {
		function __construct(){
			parent::__construct();
			$this->load->database();
		}

		function createBusinessCase($postData){
			$data = array(
				'target_benefits' => $postData['target_benefits'],
				'strategic_alignment' => $postData['strategic_alignment'],
				'schedule_benefit' => $postData['schedule_benefit'],
				'benefits_owner' => $postData['benefits_owner'],
				'indicators' => $postData['indicators'],
				'premises' => $postData['premises'],
				'risks' => $postData['risks'],
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
