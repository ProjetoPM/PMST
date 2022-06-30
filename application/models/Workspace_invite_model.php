<?php
class Workspace_invite_model extends CI_Model
{
	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	function insert($data)
	{
		return $this->db->insert('workspace_invite', $data);
	}

	function getInvitesPerUser($user_id){
		$query = $this->db->select('workspace.name, workspace_invite.access_level, workspace_invite.workspace_id')
		// $query = $this->db->select('*')
		->from('workspace_invite')
		->join('workspace', 'workspace_invite.workspace_id = workspace.workspace_id')
		->where('workspace_invite.user_id', $user_id)
		->get()
		->result();

		// var_dump($query);
		// exit();

		return $query;
	}
}
