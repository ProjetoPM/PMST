<?php
if (!defined('BASEPATH')) {
	exit('No direct script access allowed');
}

class Project_management_model extends CI_Model{

	function __construct() {
		parent::__construct();
		$this->load->database();
	}

	function createProjectManagementPlan($postData){
		$data = array(
			'project_lifecycle' => $postData['project_lifecycle'],
			'project_guidelines' => $postData['project_guidelines'],
			'change_mp' => $postData['change_mp'],
			'configuration_mp' => $postData['configuration_mp'],
			'baseline_maintenance' => $postData['baseline_maintenance'],
			'stakeholders_communication' => $postData['stakeholders_communication'],
			'key_review' => $postData['key_review'],
			'project_id' => $postData['project_id'],
			'status' => $postData['status'],

		);

		$this->db->insert('project_mp', $data);
	}

	public function readProjectManagementPlan($id){
		$query = $this->db->get_where('project_mp',array('project_id'=>$id));
		return $query->result();
	}

	public function updateProjectManagementPlan($project, $id){
		$this->db->where('project_mp.project_id', $id);
		return $this->db->update('project_mp', $project);
	}
}

?>
