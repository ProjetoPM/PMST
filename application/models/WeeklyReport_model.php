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
		$query = $this->db->get_where('weekly_report', array('weekly_report_id' => $id));
		return $query->row_array();
	}

	public function update($weekly_report_id, $weekly_report)
	{
        $this->db->set('tool_evaluation', $weekly_report['tool_evaluation']);
		$this->db->where('weekly_report_id', $weekly_report_id);
		return $this->db->update('weekly_report');
	}
	
	public function delete($weekly_report_id)
	{
		$this->db->where('weekly_report_id', $weekly_report_id);
		$weekly_report = $this->db->delete('weekly_report');
        $this->db->where('weekly_report_id', $weekly_report_id);
        $weekly_report_process = $this->db->delete('weekly_report_process');
        return $weekly_report && $weekly_report_process;
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
		$query = $this->db->get('weekly_report');
		return $query->result();
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

	public function getAllPerMember($id)
	{
		return $query = $this->db->select('*')
		->from('weekly_report')
		->join('score', 'weekly_report.score = score.score_id')
		->where('user_id', $id)
		->get()
		->result();
		// $query = $this->db->get_where('weekly_report', array('user_id' => $id));
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

	public function getProcessGroupsByLanguage($id) {
		$query = $this->db->get_where('pmbok_group', array('pmbok_id' => $id));
		return $query->result();
	}

	public function getProcessNamesByGroup($language) { 
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
	public function getProcessesName($group) {
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
            ->get_where('weekly_report', 
                array(
                    'weekly_evaluation_id' => $weekly_evaluation_id, 
                    'user_id' => $user_id
                ))
			->result();
			
		return empty($query) ?  false : true;
	}
}
