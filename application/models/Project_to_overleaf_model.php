<?php
class Project_to_overleaf_model extends CI_Model
{
	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function get($project_id)
	{
		$query = $this->db->get_where('business_case', array('project_id' => $project_id));
		return $query->result();
	}

	public function get_project_export_latex($id_project)
	{
		// $project = new Project();
		// $this->db->select('project.*');
		// $this->db->from('project');
		// $this->db->where('id_project', $id_project);
		// $query = $this->db->get();
	}
}
