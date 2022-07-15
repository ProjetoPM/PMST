<?php
class WeeklyReport_model extends CI_Model
{
	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}


	// Crud Mehtods

	public function insert($weekly_report)
	{
		$this->db->insert('weekly_report', $weekly_report);
		return $this->db->insert_id();
	}

	public function get($id)
	{
		return $this->db->select('weekly_report_id, weekly_report.weekly_evaluation_id, weekly_report.user_id, tool_evaluation, weekly_report.status, group_score_id, weekly_evaluation.name')
			->from('weekly_report')
			->join('weekly_evaluation', 'weekly_report.weekly_evaluation_id = weekly_evaluation.weekly_evaluation_id')
			->where('weekly_report_id', $id)
			->get()->result();
	}

	public function update($weekly_report_id, $tool_evaluation)
	{
		$this->db->set('tool_evaluation', $tool_evaluation);
		$this->db->where('weekly_report_id', $weekly_report_id);
		$this->db->update('weekly_report');
	}

	public function delete($weekly_report_id)
	{
		$this->db->where('weekly_report_id', $weekly_report_id);
		$weekly_report = $this->db->delete('weekly_report');
		$this->db->where('weekly_report_id', $weekly_report_id);
		$weekly_report_process = $this->db->delete('weekly_report_process');
		return $weekly_report && $weekly_report_process;
	}

	public function get_path_image_by_wr_process_id($weekly_report_process_id)
	{
		return $this->db->select('path')
			->from('report_uploads')
			->where('weekly_report_process_id', $weekly_report_process_id)
			->get()->result();
	}

	public function get_path_image_by_wr_id($weekly_report_id)
	{
		return $this->db->select('path')
			->from('report_uploads')
			->where('weekly_report_id', $weekly_report_id)
			->get()->result();
	}

	public function get_path_image_by_report_upload_id($report_upload_id)
	{
		return $this->db->select('path')
			->from('report_uploads')
			->where('report_upload_id', $report_upload_id)
			->get()->result();
	}
	// __________________________________________________

	// Other Methods

	public function getByEvaluation($id)
	{
		$query = $this->db->get_where('weekly_report', array('weekly_evaluation_id' => $id));
		return $query->row_array();
	}

	public function getAll()
	{
		return $this->db->select('weekly_report_id, weekly_report.weekly_evaluation_id, weekly_report.user_id, tool_evaluation, weekly_report.status, group_score_id, weekly_evaluation.name')
			->from('weekly_report')
			->join('weekly_evaluation', 'weekly_report.weekly_evaluation_id = weekly_evaluation.weekly_evaluation_id')
			->get()->result();
	}

	public function getAllPerWorkspace($workspace_id)
	{
		return $this->db->select('weekly_report_id, weekly_report.weekly_evaluation_id, weekly_report.user_id, tool_evaluation, weekly_report.status, group_score_id, weekly_evaluation.name')
			->from('weekly_report')
			->join('weekly_evaluation', 'weekly_report.weekly_evaluation_id = weekly_evaluation.weekly_evaluation_id')
			->where('workspace_id', $workspace_id)
			->get()->result();
	}

	public function getScore($weekly_report_id)
	{
		return $this->db->select('sum(score.value) / count(*) as score_evaluation')
			->from('report_score')
			->join('score', 'report_score.score_id = score.score_id')
			->where('report_id', $weekly_report_id)
			->get()
			->result();
	}

	public function getAllScoresPerReport($weekly_report_id)
	{
		return $this->db->select('report_score.comments, score.name, user.name as username')
			->from('report_score')
			->join('score', 'report_score.score_id = score.score_id')
			->join('user', 'report_score.professor_id = user.user_id')
			->where('report_id', $weekly_report_id)
			->get()
			->result();
	}
	public function getScoreGivenByProfessor($weekly_report_id, $user_id)
	{
		return $this->db->select('report_score.score_id, report_score.comments, score.name as grade')
			->from('report_score')
			->join('score', 'report_score.score_id = score.score_id')
			->where('professor_id', $user_id)
			->where('report_id', $weekly_report_id)
			->get()->result();
	}

	public function getAllPerMember($id)
	{
		return $query = $this->db->select('*')
			->from('weekly_report')
			->where('user_id', $id)
			->get()
			->result();
	}

	public function getAllProcesses($id, $language)
	{
		return $this->db->select('weekly_report_process.*, pmbok_process.pmbok_group_id, pmbok_process.name')
			->from('weekly_report_process')
			->join('pmbok_process', 'weekly_report_process.pmbok_process_id = pmbok_process.pmbok_process_id AND weekly_report_process.pmbok_id = pmbok_process.pmbok_id')
			->where('weekly_report_process.weekly_report_id', $id)
			->where('pmbok_process.pmbok_id', $language)
			->get()->result();
	}

	public function getProcessGroupsByLanguage($id)
	{
		$query = $this->db->get_where('pmbok_group', array('pmbok_id' => $id));
		return $query->result();
	}

	public function getProcessNamesByGroup($language)
	{
		$query = $this->db->select('pmbok_process_id, pmbok_group_id, name')
			->get_where('pmbok_process', array('pmbok_id' => $language));

		return $query->result();
	}

	/**
	 * Return all processes of table 'pmbok_process' with 'pmbok_group_id' 
	 * specified, considering the language.
	 * 
	 * Used on edit of WeeklyReport.
	 */
	public function getProcessesName($group)
	{
		return $this->db->select("pmbok_process_id, pmbok_group_id, name")
			->from("pmbok_process")
			->where("pmbok_group_id", $group)
			->where("pmbok_id", getIndexOfLanguage())
			->get()->result();
	}

	public function getPmbokEditionByLanguage($id)
	{
		$query = $this->db->get_where('pmbok_process', array('pmbok_id' => $id));
		return $query->result();
	}

	public function alreadySubmitted($weekly_evaluation_id, $user_id)
	{
		$query = $this->db
			->get_where(
				'weekly_report',
				array(
					'weekly_evaluation_id' => $weekly_evaluation_id,
					'user_id' => $user_id
				)
			)
			->result();

		return empty($query) ?  false : true;
	}
}
