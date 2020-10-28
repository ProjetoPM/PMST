<?php
	class Benefits_plan_model extends CI_Model {
		function __construct(){
			parent::__construct();
			$this->load->database();
		}

		function insert($postData){
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

			$this->db->insert('benefits_plan', $data);
		}
		public function get($id){
			$query = $this->db->get_where('benefits_plan',array('project_id'=>$id));
			return $query->result();
		}

		public function update($project, $id){
			$this->db->where('benefits_plan.project_id', $id);
			return $this->db->update('benefits_plan', $project);
		}
	}
?>
