<?php
class Workspace_user_model extends CI_Model
{
	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	private $table = 'workspace_user';
	function insert($data)
	{
		return $this->db->insert($this->table, $data);
	}

	function userAlreadyInWorkspace($workspace_id, $user_id){
		$query = $this->db->select('user_id')
		->from($this->table)
		->where("$this->table.workspace_id", $workspace_id)
		->where("$this->table.user_id", $user_id)
		->get()
		->result();

		return !empty($query);
	}

	public function update($member, $user_id, $workspace_id){
		$this->db->where("$this->table.user_id", $user_id);
		$this->db->where("$this->table.workspace_id", $workspace_id);
		return $this->db->update($this->table, $member);
	}
	
	public function delete($user_id, $workspace_id){
		$this->db->where("$this->table.user_id", $user_id);
		$this->db->where("$this->table.workspace_id", $workspace_id);
		return $this->db->delete('workspace_user');
	}
}
