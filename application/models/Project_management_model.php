<?php
if (!defined('BASEPATH')) {
	exit('No direct script access allowed');
}

class Project_Management_model extends CI_Model{

	function __construct() {
		parent::__construct();
		$this->load->database();
	}

	function insert($postData){
		return $this->db->insert('project_mp', $postData);
	}

	public function get($id){
		$query = $this->db->get_where('project_mp',array('project_id'=>$id));
		return $query->row_array();
	}

	public function update($project, $id){
		$this->db->where('project_mp.project_id', $id);
		return $this->db->update('project_mp', $project);
	}
}

?>
