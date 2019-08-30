<?php
	class Risk_mp_model extends CI_Model {
		function __construct(){
			parent::__construct();
			$this->load->database();
		}

		function createRiskManagementPlan($postData){
			$data = array(
				'methodology' => $postData['methodology'],
				'roles_responsibilities' => $postData['roles_responsibilities'],
				'risk_management_processes' => $postData['risk_management_processes'],
				'risks_categories' => $postData['risks_categories'],
				'risks_probability_impact' => $postData['risks_probability_impact'],
				'probability_impact_matrix' => $postData['probability_impact_matrix'],
				'reviewed_tolerances' => $postData['reviewed_tolerances'],
				'traceability' => $postData['traceability'],
				'status' => $postData['status'],
				'project_id' => $postData['project_id'],
			);

			$this->db->insert('risk_mp', $data);
		}
		public function readRiskManagementPlan($id){
			$query = $this->db->get_where('risk_mp',array('project_id'=>$id));
			return $query->result();
		}

		public function updateRiskManagementPlan($project, $id){
			$this->db->where('risk_mp.project_id', $id);
			return $this->db->update('risk_mp', $project);
		}
	}
?>
