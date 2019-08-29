<?php
if (!defined('BASEPATH')) {
	exit('No direct script access allowed');
}

class Requirements_mp_model extends CI_Model{

	function __construct() {
		parent::__construct();
		$this->load->database();

	}

	//inicia a view
	function createRequirementsManagementPlan($postData){
		$data = array(
			'requirements_collection_proc' => $postData['requirements_collection_proc'],
			'requirements_prioritization' => $postData['requirements_prioritization'],
			'product_metrics' => $postData['product_metrics'],
			'project_id' => $postData['project_id'],
			'status' => $postData['status'],
		);

		$this->db->insert('requirements_mp', $data);
	}

	public function readRequirementsManagementPlan($id){
		$query = $this->db->get_where('requirements_mp',array('project_id'=>$id));
		return $query->result();
	}

	public function updateRequirementsManagementPlan($project, $id){
		$this->db->where('requirements_mp.project_id', $id);
		return $this->db->update('requirements_mp', $project);
	}

}

?>
