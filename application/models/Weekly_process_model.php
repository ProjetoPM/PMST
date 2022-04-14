<?php
class Weekly_process_model extends CI_Model
{
	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}


	public function getAll()
	{
		$query = $this->db->get('weekly_report_process');
		return $query->result();
	}

	public function getScore($score_id)
	{
		$this->db->select('score');
		$this->db->where('score', $score_id);
		$this->db->from('weekly_report');

		$query = $this->db->get();
		$res = $query->row_array();

		return $res['score'];
	}

	public function getAllPerMember($id)
	{
		$query = $this->db->get_where('weekly_report', array('user_id' => $id));
		return $query->result();
	}

	public function getAllProcesses($id)
	{
		$query = $this->db->get_where('weekly_report_process', array('weekly_report_id' => $id));
		return $query->result();
	}

	
	public function update($weekly_report, $weekly_report_id)
	{
		$this->db->where('weekly_report.weekly_report_id', $weekly_report_id);
		return $this->db->update('weekly_report', $weekly_report);
	}

	public function delete($weekly_report_id)
	{
		$this->db->where('weekly_report.weekly_report_id', $weekly_report_id);
		$db1 = $this->db->delete('weekly_report');
		$db2 = $this->db->delete('weekly_report_process_id', array('quality_checklist_id' => $weekly_report_id));
		return $db1 + $db2;
	}
}
