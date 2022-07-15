<?php
class WeeklyEvaluation_model extends CI_Model
{
	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	function getDeadline($weekly_evaluation_id)
	{
		$this->db->select('deadline');
		$this->db->where('weekly_evaluation_id', $weekly_evaluation_id);
		$this->db->from('weekly_evaluation');
		$this->db->limit(1);

		$query = $this->db->get();
		$result = $query->row_array();

		return $result['deadline'];
	}
	function insert($data)
	{
		return $this->db->insert('weekly_evaluation', $data);
	}

	public function alreadyEvaluated($weekly_report_id)
	{
		$query =  $this->db->select('report_id')
			->from('report_score')
			->where('report_id', $weekly_report_id)
			->get()->result();

			return $query[0];
	}
	public function get($weekly_evaluation_id)
	{
		return $this->db->select("weekly_evaluation.*, score_metric.name as score_metric_name")
			->from('weekly_evaluation')
			->join('score_metric', 'weekly_evaluation.group_score_id = score_metric.score_metric_id')
			->where('weekly_evaluation_id', $weekly_evaluation_id)
			->get()
			->result();
	}

	public function getAll($workspace_id)
	{
		return $this->db->select('*')
			->from('weekly_evaluation')
			->where('workspace_id', $workspace_id)
			->get()->result();
	}

	public function update($weekly_evaluation_id, $weekly_evaluation)
	{
		$this->db->where('weekly_evaluation.weekly_evaluation_id', $weekly_evaluation_id);
		return $this->db->update('weekly_evaluation', $weekly_evaluation);
	}
}
