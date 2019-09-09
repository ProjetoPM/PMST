<?php
	class Procurement_mp_model extends CI_Model {
		function __construct(){
			parent::__construct();
			$this->load->database();
		}

		function createProcurementManagementPlan($postData){
			$data = array(
				'products_services_obtained' => $postData['products_services_obtained'],
				'team_actions' => $postData['team_actions'],
				'performance_metrics' => $postData['performance_metrics'],
				'procurement_management' => $postData['procurement_management'],
				'schedule_procurement_activities' => $postData['schedule_procurement_activities'],
				'functions' => $postData['functions'],
				'restriction' => $postData['restriction'],
				'premises' => $postData['premises'],
				'coins' => $postData['coins'],
				'independent_estimates' => $postData['independent_estimates'],
				'risk_issues' => $postData['risk_issues'],
				'sellers' => $postData['sellers'],
				'procurement_strategy' => $postData['procurement_strategy'],
				'status' => $postData['status'],
				'project_id' => $postData['project_id'],
			);

			$this->db->insert('procurement_mp', $data);
		}

		public function readProcurementManagementPlan($id){
			$query = $this->db->get_where('procurement_mp',array('project_id'=>$id));
			return $query->result();
		}

		public function updateProcurementManagementPlan($project, $id){
			$this->db->where('procurement_mp.project_id', $id);
			return $this->db->update('procurement_mp', $project);
		}
	}
?>
