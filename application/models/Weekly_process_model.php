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

	public function delete_process($weekly_report_process_id, $weekly_report_id)
	{
        $this->db->where('weekly_report_process_id', $weekly_report_process_id);
        $this->db->where('weekly_report_id', $weekly_report_id);
        $delete_process = $this->db->delete('weekly_report_process');
        $delete_images_associated = $this->delete_process_images($weekly_report_process_id);
		return $delete_process && $delete_images_associated;
	}

    /**
     * Delete all images associated with a 'weekly report process'.
     */
    public function delete_process_images($weekly_report_process_id) {
        return $this->db->where('weekly_report_process_id', $weekly_report_process_id)
            ->delete('report_uploads');
    }

    /**
     * Delete all images associated with a 'weekly_report'.
     */
    public function delete_process_images_by_wr_id($weekly_report_id) {
        return $this->db->where('weekly_report_id', $weekly_report_id)
            ->delete('report_uploads');
    }

    /**
     * Delete images by 'report_upload_id'.
     */
    public function delete_image_from_process_by($report_upload_id) {
        return $this->db->where('report_upload_id', $report_upload_id)
            ->delete('report_uploads');
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
