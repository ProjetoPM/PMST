<?php
if (!defined('BASEPATH')) {
	exit('No direct script access allowed');
}

class Tap_model extends CI_Model{

	function __construct() {
		parent::__construct();

	}

//insere os dados da TAP no projeto
	public function insertTap($project_id){
		$query = $this->db->get_where('project_charter', array('project_id' => $project_id));
		return $query->result();

	}





}

?>