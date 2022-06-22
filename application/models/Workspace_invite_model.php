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
}
