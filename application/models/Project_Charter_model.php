<?php
if (!defined('BASEPATH')) {
	exit('No direct script access allowed');
}

class Project_Charter_model extends CI_Model{

	function __construct() {
		parent::__construct();

	}

	function insert($postData){
		$data = array(
			'project_description' => $postData['project_description'],
			'project_purpose' => $postData['project_purpose'],
			'project_objective' => $postData['project_objective'],
			'benefits' => $postData['benefits'],
			'high_level_requirements' => $postData['high_level_requirements'],
			'boundaries' => $postData['boundaries'],
			'high_level_risks' => $postData['high_level_risks'],
			'summary_schedule' => $postData['summary_schedule'],
			'budge_summary' => $postData['budge_summary'],
			'project_approval_requirements' => $postData['project_approval_requirements'],
			'exit_criteria' => $postData['exit_criteria'],
			'success_criteria' => $postData['success_criteria'],
			'start_date' => $postData['start_date'],
			'end_date' => $postData['end_date'],
			'project_id' => $postData['project_id'],
			'status' => $postData['status'],
		);

		$this->db->insert('project_charter', $data);
	}

	public function get($project_id){
		$query = $this->db->get_where('project_charter',array('project_id'=>$project_id));
		return $query->result();
	}

	public function update($project_charter, $project_id){
		$this->db->where('project_charter.project_id', $project_id);
		return $this->db->update('project_charter', $project_charter);
	}


	//buscando stakeholders
	public function getAllStk_mp(){
		$data = $this->db->get('stakeholder_mp');
		return $data->result();
	}

	public function getAllStk(){
		$data = $this->db->get('stakeholder');
		return $data->result();
	}


	public function getpProject_charterProject_id($project_id) {
		$query = $this->db->get_where('project_charter', array('project_charter_id.project_id'=>$project_id));
		return $query->result();
	}

	public function insertTap($project_charter) {
		return $this->db->insert('project_charter', $project_charter);
	}

}

?>
