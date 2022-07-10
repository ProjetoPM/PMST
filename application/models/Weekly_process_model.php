<?php
class Weekly_process_model extends CI_Model
{
	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	function insert($data){
		return $this->db->insert('weekly_report_process', $data);
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


	public function getAllProcesses($id)
	{
		$query = $this->db->get_where('weekly_report_process', array('weekly_report_id' => $id));
		return $query->result();
	}

    public function update_processes($weekly_report_id, $update_weekly_report)
	{
        $this->db->set('pmbok_id', $update_weekly_report['pmbok_id']);
        $this->db->set('pmbok_group_id', $update_weekly_report['pmbok_group_id']);
        $this->db->set('pmbok_process_id', $update_weekly_report['pmbok_process_id']);
        $this->db->set('description', $update_weekly_report['description']);
		$this->db->where('weekly_report_id', $weekly_report_id);
		$this->db->where('weekly_report_process_id', $update_weekly_report['weekly_report_process_id']);
		return $this->db->update('weekly_report_process');
	}

	public function delete($weekly_report_id)
	{
		$this->db->where('weekly_report.weekly_report_id', $weekly_report_id);
		$db1 = $this->db->delete('weekly_report');
		$db2 = $this->db->delete('weekly_report_process_id', array('quality_checklist_id' => $weekly_report_id));
		return $db1 + $db2;
	}

    /**
     * Return the last inserted id of the weekly_report_process table.
     */
    public function getLastIdWeeklyReportProcess() {
        $id = $this->db->select("weekly_report_process_id")
                        ->from("weekly_report_process")
                        ->order_by("weekly_report_process_id", "desc")
                        ->limit(1)
                        ->get()
                        ->result();
        
        return $id[0]->weekly_report_process_id;
    }
}
