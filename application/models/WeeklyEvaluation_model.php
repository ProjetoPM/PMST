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
	public function get($weekly_evaluation_id)
	{
		$query = $this->db->get_where('weekly_evaluation', array('weekly_evaluation_id' => $weekly_evaluation_id));
		return $query->result();
	}

	public function getAll()
	{
		$query = $this->db->get('weekly_evaluation');
		return $query->result();
	}

	public function update($weekly_evaluation_id, $weekly_evaluation)
	{
		$this->db->where('weekly_evaluation.weekly_evaluation_id', $weekly_evaluation_id);
		return $this->db->update('weekly_evaluation', $weekly_evaluation);
	}

}
