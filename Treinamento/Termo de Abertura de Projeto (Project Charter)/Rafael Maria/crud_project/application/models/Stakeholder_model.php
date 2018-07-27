<?php 
/**
 * 
 */
class Stakeholder_model extends CI_Model {
	
	function __construct() {
		parent::__construct();
		$this->load->database();
	}

	public function insertStakeholder($stakeholder) {
			return $this->db->insert('stakelholder', $stakeholder);
	}

	public function insertProject($project) {
		return $this->db->insert('project_charter', $project);
	}

	public function getAllStakeholder() {
			$query = $this->db->get('stakelholder');
			return $query->result();
	}

	public function getStakeholder($id) {
		$query = $this->db->get_where('stakelholder',array('stakelholder_id'=>$id));
			return $query->row_array();
	}

	public function deletestakeholder($id){
			$this->db->where('stakelholder.stakelholder_id', $id);
			return $this->db->delete('stakelholder');
		}

		public function updatestakeholder($stakeholder, $id) {
			$this->db->where('stakelholder.stakelholder_id', $id);
			return $this->db->update('stakelholder', $stakeholder);
		}

		public function getAllProjects() {
			$query = $this->db->get('project_charter');
			return $query->result();
	}

	public function deleteproject($id){
			$this->db->where('project_charter.project_charter_id', $id);
			return $this->db->delete('project_charter');
		}

		public function getProject($id) {
		$query = $this->db->get_where('project_charter',array('project_charter_id'=>$id));
			return $query->row_array();
	}

	public function updateproject($project, $id) {
			$this->db->where('project_charter.project_charter_id', $id);
			return $this->db->update('project_charter', $project);
		}
}
 ?>