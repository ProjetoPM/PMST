<?php
class Procurement_mp_model extends CI_Model
{
	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	function insert($postData)
	{
		$data = array(
			'products_services_obtained' => $postData['products_services_obtained'],
			'performance_metrics' => $postData['performance_metrics'],
			'procurement_management' => $postData['procurement_management'],
			'schedule_procurement_activities' => $postData['schedule_procurement_activities'],
			'estimates' => $postData['estimates'],
			'issues' => $postData['issues'],
			'sellers' => $postData['sellers'],
			'strategy' => $postData['strategy'],
			'constraint_assumption' => $postData['constraint_assumption'],
			'legal_jurisdiction' => $postData['legal_jurisdiction'],
			'roles' => $postData['roles'],
			'status' => $postData['status'],
			'project_id' => $postData['project_id'],
		);

		$this->db->insert('procurement_mp', $data);
	}

	public function get($id)
	{
		$query = $this->db->get_where('procurement_mp', array('project_id' => $id));
		return $query->result();
	}

	public function update($project, $id)
	{
		$this->db->where('procurement_mp.project_id', $id);
		return $this->db->update('procurement_mp', $project);
	}
}
