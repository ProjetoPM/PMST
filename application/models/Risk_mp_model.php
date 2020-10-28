<?php
class Risk_mp_model extends CI_Model
{
	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	function insert($postData)
	{
		$data = array(
			'methodology' => $postData['methodology'],
			'roles_responsibilities' => $postData['roles_responsibilities'],
			'risks_categories' => $postData['risks_categories'],
			'probability_impact_matrix' => $postData['probability_impact_matrix'],
			'reviewed_tolerances' => $postData['reviewed_tolerances'],
			'traceability' => $postData['traceability'],
			'funding' => $postData['funding'],
			'timing' => $postData['timing'],
			'stakeholder_risk' => $postData['stakeholder_risk'],
			'definitions_risk' => $postData['definitions_risk'],
			'format_report' => $postData['format_report'],
			'status' => $postData['status'],
			'project_id' => $postData['project_id'],
		);

		$this->db->insert('risk_mp', $data);
	}
	public function get($id)
	{
		$query = $this->db->get_where('risk_mp', array('project_id' => $id));
		return $query->result();
	}

	public function update($project, $id)
	{
		$this->db->where('risk_mp.project_id', $id);
		return $this->db->update('risk_mp', $project);
	}
}
