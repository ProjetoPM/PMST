<?php
class Quality_model extends CI_Model
{
	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	function insert($postData)
	{
		$data = array(
			'standards' => $postData['standards'],
			'objectives' => $postData['objectives'],
			'roles_responsibilities' => $postData['roles_responsibilities'],
			'deliverables' => $postData['deliverables'],
			'activities' => $postData['activities'],
			'tools' => $postData['tools'],
			'procedures' => $postData['procedures'],
			'project_id' => $postData['project_id'],
			'status' => (int) $postData['status']
		);

		$this->db->insert('quality_mp', $data);
	}

	public function get($id)
	{
		$query = $this->db->get_where('quality_mp', array('project_id' => $id));
		return $query->result();
	}

	public function update($project, $id)
	{
		$this->db->where('quality_mp.project_id', $id);
		return $this->db->update('quality_mp', $project);
	}
}
