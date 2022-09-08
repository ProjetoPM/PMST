<?php
class EVM_model extends CI_Model
{
	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

    private $table = 'activity';
	// Crud Mehtods

	public function insert($activity)
	{
		$this->db->insert($this->table, $activity);
		return $this->db->insert_id();
	}

	public function get($id)
	{
		return $this->db->select('activity_id, weekly_report.weekly_evaluation_id, weekly_report.user_id, tool_evaluation, weekly_report.status, group_score_id, weekly_evaluation.name')
			->from($this->table)
			->join('weekly_evaluation', 'weekly_report.weekly_evaluation_id = weekly_evaluation.weekly_evaluation_id')
			->where('activity_id', $id)
			->get()->result();
	}

	public function update($activity_id, $tool_evaluation)
	{
		$this->db->set('tool_evaluation', $tool_evaluation);
		$this->db->where('activity_id', $activity_id);
		$this->db->update($this->table);
	}

	public function delete($activity_id)
	{
		$this->db->where('activity_id', $activity_id);
		$activity = $this->db->delete('weekly_report');
		$this->db->where('activity_id', $activity_id);
		$activity_process = $this->db->delete('weekly_report_process');
		return $activity && $activity_process;
	}

	// -----------------------------
}
