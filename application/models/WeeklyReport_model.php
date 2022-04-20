<?php
class WeeklyReport_model extends CI_Model
{
	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function insert($weekly_report)
	{
		$this->db->insert('weekly_report', $weekly_report);
		return $this->db->insert_id();
	}

	function updateProcessReport($process, $weekly_report_id)
	{
		$this->db->trans_start();
		$result = array();
		$this->db->delete('weekly_report_process', array('weekly_report_id' => $weekly_report_id));
		// var_dump($process);
		for ($j = 0; $j < count($process) / 3; $j++) {
			$result[] = array(
				'description' => $process['description'][$j],
				'process_name' => $process['process_name'][$j],
				'weekly_report_id' => $weekly_report_id,
			);
		}

		//MULTIPLE INSERT TO DETAIL TABLE
		$this->db->insert_batch('weekly_report_process', $result);
		$this->db->trans_complete();
		// die();
		return $result;
	}

	public function get($id)
	{
		$query = $this->db->get_where('weekly_report', array('weekly_report_id' => $id));
		return $query->row_array();
	}

	public function getByEvaluation($id)
	{
		$query = $this->db->get_where('weekly_report', array('weekly_evaluation_id' => $id));
		return $query->row_array();
	}

	public function getAll()
	{
		$query = $this->db->get('weekly_report');
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

	public function getProcessGroupsByLanguage($id) {
		$query = $this->db->get_where('pmbok_group', array('pmbok_id' => $id));
		return $query->result();
	}

	public function getPmbokEditionByLanguage($id)
	{
		$query = $this->db->get_where('pmbok_process', array('pmbok_id' => $id));
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
