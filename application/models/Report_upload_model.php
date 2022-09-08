<?php
class Report_upload_model extends CI_Model
{
	function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->model('WeeklyReport_model');
	}

	function insert($data)
	{
		return $this->db->insert('report_uploads', $data);
	}
	public function get($id)
	{
		$query = $this->db->get_where('report_uploads', array('report_upload_id' => $id));
		return $query->result();
	}

	public function getByWeeklyReportProcessId($id)
	{
		$query = $this->db->get_where('report_uploads', array('weekly_report_process_id' => $id));
		return $query->result();
	}

	public function getAllPerProcesses($weekly_report_id)
	{
		$uploads = array();
		$processes_ids = array();
		$query = $this->WeeklyReport_model->getAllProcesses($weekly_report_id);

		foreach ($query as $q) {
			array_push($processes_ids, $q->weekly_report_process_id);
		}

		foreach ($processes_ids as $process) {
			array_push($uploads, $this->getByWeeklyReportProcessId($process));
		}
		
		return $uploads;
	}
	public function update($report_uploads, $id)
	{
		$this->db->where('report_uploads.report_upload_id', $id);
		return $this->db->update('report_uploads', $report_uploads);
	}

    /**
     * Salva as imagens da página 'new' do Weekly Report na tabela
     * 'upload_reports'.
     */
    public function saveImage($weekly_report_id, $weekly_report_process_id, $name, $path) {
        return $this->db->insert('report_uploads', array(
            'weekly_report_id' => $weekly_report_id,
            'weekly_report_process_id' => $weekly_report_process_id,
            'name' => $name,
            'path' => $path
        ));
    }

    /**
     * Retorna as informações da tabela 'upload_reports' de acordo com o
     * 'weekly_report_id' passado.
     */
    public function getImages($weekly_report_id) {
        $query = $this->db->get_where('report_uploads', array('weekly_report_id' => $weekly_report_id));
        return $query->result();
    }
}
