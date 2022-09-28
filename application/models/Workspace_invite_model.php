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

	function update($data) {
		return $this->db->update($this->table, $data);
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

	/**
	 * Verifica se a conta foi criada APÓS o envio do convite do workspace. Se o 'user_id'
	 * retornado for 'null', retorna true.
	 */
	function verifyNewUser($email): bool {
		$query = $this->db->select('email')
			->from($this->table)
			->where("$this->table.email", $email)
			->where("$this->table.user_id", null)
			->get()
			->result();

		return !empty($query);
	}

	/**
	 * Usado no momento da criação de conta para verificar se um usuário já foi
	 * convidado para entrar em um workspace.
	 */
	public function update_new_user($update_user_id, $email) {
		$data = array(
			"user_id" => $update_user_id,
			"email" => $email
		);
		$this->db->where("$this->table.email", $email);
		return $this->db->update($this->table, $data);
	}
}


