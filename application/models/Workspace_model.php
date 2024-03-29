<?php
class Workspace_model extends CI_Model
{
	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	private $table = 'workspace';
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

	public function delete($workspace_id)
	{
		$removeFromWorkspaceUser = $this->db->delete("workspace_user", array("workspace_id" => $workspace_id));
		$removeFromWorkspace = $this->db->delete("workspace", array("workspace_id" => $workspace_id));

		return $removeFromWorkspaceUser && $removeFromWorkspace;
	}


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

	public function getWorkspaceName($workspace_id)
	{
		$query = $this->db->select('name')
			->from('workspace')
			->where('workspace_id', $workspace_id)
			->get()
			->result();
		return $query[0]->name;
	}

	public function getRole($workspace_id, $user_id)
	{
		$result = $this->db->select('access_level')
			->where('workspace_id', $workspace_id)
			->where('user_id', $user_id)
			->from('workspace_user')
			->limit(1)
			->get()
			->row_array();

		return $result !== null ? $result['access_level'] : "-1";
	}

	public function getWorkSpaceUsers($workspace_id)
	{
		$query = $this->db->select('user.user_id, user.name, user.email, user.institution, workspace_user.access_level')
			->from('workspace_user')
			->join('user', 'workspace_user.user_id = user.user_id')
			->where('workspace_user.workspace_id', $workspace_id)
			->get()
			->result();

		return $query;
	}

	public function getWorkSpaceUser($workspace_id, $user_id)
	{
		$query = $this->db->select('user.user_id, user.name, user.email, user.institution, workspace_user.access_level')
			->from('workspace_user')
			->join('user', 'workspace_user.user_id = user.user_id')
			->where('workspace_user.workspace_id', $workspace_id)
			->where('workspace_user.user_id', $user_id)
			->get()
			->result();

		return $query;
	}

	public function isWorkspaceOwner($workspace_id, $user_id)
	{
		$result = $this->db->select('access_level')
			->where('workspace_id', $workspace_id)
			->where('user_id', $user_id)
			->from('workspace_user')
			->limit(1)
			->get()
			->row_array();
		
		$comparing = $result['access_level'] ?? '-1';
		return strcmp($comparing, '1') === 0;	
	}

	public function getWorkspaceProfessors($workspace_id){
		return $this->db->select('user_id')
		->where('workspace_id', $workspace_id)
		->where('access_level', 1)
		->from('workspace_user')
		->get()
		->result();
	}
	
	public function workspaceExists($workspace_id):bool {
		$query =  $this->db->select('workspace_id')
			->where('workspace_id', $workspace_id)
			->from($this->table)
			->get()->result();

		return $query[0]->workspace_id ?? false;
	}
}
