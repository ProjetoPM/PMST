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
		return $this->db->insert('weekly_report', $weekly_report);
	}

	function updateProcessReport($process, $weekly_report_id)
	{
		$this->db->trans_start();
		$result = array();
		$this->db->delete('weekly_report_process', array('weekly_report_process_id' => $weekly_report_id));
		if ($process['status'][0] != null) {
			for ($j = 0; $j < count($process) / 3; $j++) {
				for ($i = 0; $i < count($process['description']); $i++) {
					$result[] = array(
						'status' => $process['status'][$i],
						'description' => $process['description'][$i],
						'pdf_path' => $process['pdf_path'][$i],
						'weekly_report_id' => $weekly_report_id,
					);
				}
			}

			//MULTIPLE INSERT TO DETAIL TABLE
			$this->db->insert_batch('weekly_report_process', $result);
		}
		$this->db->trans_complete();
		return $result;
	}

	public function get($id)
	{
		$query = $this->db->get_where('weekly_report', array('weekly_report_id' => $id));
		return $query->row_array();
	}
	
	public function getAll()
	{
		$query = $this->db->get('weekly_report');
		return $query->result();
	}

	public function getAllProcesses($id)
	{
		$query = $this->db->get_where('weekly_report_process', array('weekly_report_process.weekly_report_id' => $id));
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
