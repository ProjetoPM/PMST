<?php
class Workspace_model extends CI_Model
{
	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	function insert($workspace, $workspace_user)
	{
		$this->db->insert('workspace', $workspace);
		$insert_id = $this->db->insert_id();
		$workspace_user['workspace_id'] = $insert_id;
		$this->db->insert('workspace_user', $workspace_user);
		return $insert_id;
	}
	public function get($workspace_id)
	{
		$query = $this->db->get_where('workspace', array('workspace_id' => $workspace_id));
		return $query->result();
	}

	public function update($workspace, $workspace_id)
	{
		$this->db->where('workspace.workspace_id', $workspace_id);
		return $this->db->update('workspace', $workspace);
	}

	// public function getUserWorkSpaces($user_id){
	// 	$query = $this->db->get_where('workspace', array('user_id'=>$user_id));
	// 	return $query->result();
	// }
	public function getUserWorkSpaces($user_id)
	{
		$query = $this->db->select('*')
			->from('workspace')
			->join('workspace_user', 'workspace.workspace_id = workspace_user.workspace_id')
			->where('workspace_user.user_id', $user_id)
			->get()
			->result();
		return $query;
	}

	public function getRole($workspace_id, $user_id)
	{
		$this->db->select('access_level');
		$this->db->where('workspace_id', $workspace_id);
		$this->db->where('user_id', $user_id);
		$this->db->from('workspace_user');
		$this->db->limit(1);
		$query = $this->db->get();
		$res = $query->row_array();
		return $res['access_level'];
	}

	public function getWorkSpaceUsers($workspace_id){
		$query = $this->db->select('user.user_id, user.name, user.email, user.institution, workspace_user.access_level')
			->from('workspace_user')
			->join('user', 'workspace_user.user_id = user.user_id')
			->where('workspace_user.workspace_id', $workspace_id)
			->get()
			->result();

			return $query;
	}
}
