<?php
	class Cost_model extends CI_Model {
		function __construct(){
			parent::__construct();
			$this->load->database();
		}

		function createCostManagementPlan($postData){
			$data = array(
				'project_costs_m' => $postData['project_costs_m'],
				'accuracy_level' => $postData['accuracy_level'],
				'organizational_procedures' => $postData['organizational_procedures'],
				'measurement_rules' => $postData['measurement_rules'],
				'format_report' => $postData['format_report'],
				'status' => $postData['status'],
				'project_id' => $postData['project_id'],
			);

			$this->db->insert('cost_mp', $data);
		}
		
		public function readCostManagementPlan($id){
			$query = $this->db->get_where('cost_mp',array('project_id'=>$id));
			return $query->result();
		}

		public function updateCostManagementPlan($project, $id){
			$this->db->where('cost_mp.project_id', $id);
			return $this->db->update('cost_mp', $project);
		}
	}
?>
