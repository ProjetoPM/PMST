<?php
class Workspace_invite_model extends CI_Model
{
	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	private $table = 'workspace_invite';
	// Crud
	function insert($data)
	{
		return $this->db->insert($this->table, $data);
	}

	function delete($workspace_id, $user_id){
		return $this->db->delete($this->table, array('workspace_id' => $workspace_id, 'user_id' => $user_id));
	}
	// ---------------------------

	function getInvitesPerUser($user_id){
		$query = $this->db->select('workspace.name, workspace_invite.access_level, workspace_invite.workspace_id')
		->from($this->table)
		->join('workspace', 'workspace_invite.workspace_id = workspace.workspace_id')
		->where('workspace_invite.user_id', $user_id)
		->get()
		->result();

		return $query;
	}

	function userAlreadyInvited($workspace_id, $user_id){
		$query = $this->db->select('user_id')
		    ->from($this->table)
		    ->where("$this->table.workspace_id", $workspace_id)
		    ->where("$this->table.user_id", $user_id)
		    ->get()
		    ->result();

		return !empty($query);
	}
}


