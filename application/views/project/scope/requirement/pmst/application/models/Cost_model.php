<?php
class Cost_model extends CI_Model
{
	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	function insert($postData)
	{
		$data = array(
			'project_costs_m' => $postData['project_costs_m'],
			'accuracy_level' => $postData['accuracy_level'],
			'organizational_procedures' => $postData['organizational_procedures'],
			'measurement_rules' => $postData['measurement_rules'],
			'format_report' => $postData['format_report'],
			'status' => $postData['status'], 
			'control_thresholds' => $postData['control_thresholds'],
			'details' => $postData['details'],
			'precision_level' => $postData['precision_level'],
			'units_measure' => $postData['units_measure'],
			'project_id' => $postData['project_id'],
		);

		$this->db->insert('cost_mp', $data);
	}

	public function get($id)
	{
		$query = $this->db->get_where('cost_mp', array('project_id' => $id));
		return $query->result();
	}

	public function update($project, $id)
	{
		$this->db->where('cost_mp.project_id', $id);
		return $this->db->update('cost_mp', $project);
	}
}
