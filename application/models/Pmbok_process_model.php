<?php
class Pmbok_process_model extends CI_Model
{
	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	
	public function get($pmbok_id, $pmbok_process_id)
	{
		$this->db->select('*');
		$this->db->where('pmbok_process_id', $pmbok_process_id);
		$this->db->where('pmbok_id', $pmbok_id);
		$this->db->from('pmbok_process');
		
		$query = $this->db->get();

		return $query->result();
	}

	public function getAll()
	{
		$query = $this->db->get('pmbok_process');
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

	public function getProcessGroupsByLanguage($id)
	{
		$query = $this->db->get_where('pmbok_process', array('pmbok_id' => $id));
		return $query->result();
	}

	public function getProcessNamesByGroup($group)
	{
		$query = $this->db->select('*')
			->distinct('process_group')
			->from('pmbok_process')
			->get();
		return $query->result();
		// $query = $this->db->get_where('pmbok_process', array('process_group'=> $group));
		// $query = $this->db->distinct('process_group');
		// return $query->result();
	}

	public function getPmbokEditionByLanguage($id)
	{
		$query = $this->db->get_where('pmbok_process', array('pmbok_id' => $id));
		return $query->result();
	}
	
}
