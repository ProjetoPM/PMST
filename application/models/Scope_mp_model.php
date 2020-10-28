<?php
if (!defined('BASEPATH')) {
	exit('No direct script access allowed');
}

class Scope_mp_model extends CI_Model{

	function __construct() {
		parent::__construct();

	}

	function insert($postData){
		$data = array(
			'scope_specification' => $postData['scope_specification'],
			'eap_process' => $postData['eap_process'],
			'deliveries_acceptance' => $postData['deliveries_acceptance'],
			'scope_change_mp' => $postData['scope_change_mp'],
			'project_id' => $postData['project_id'],
			'status' => $postData['status'],
		);
		$this->db->insert('scope_mp', $data);
	}

		public function get($id){
			$query = $this->db->get_where('scope_mp',array('project_id'=>$id));
			return $query->result();
		}

		public function update($project, $id){
			$this->db->where('scope_mp.project_id', $id);
			return $this->db->update('scope_mp', $project);
		}
}

?>
