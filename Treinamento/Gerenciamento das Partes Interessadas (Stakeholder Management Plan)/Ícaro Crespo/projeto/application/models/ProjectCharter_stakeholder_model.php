<?php
	class ProjectCharter_stakeholder_model extends CI_Model {
		function __construct(){
			parent::__construct();
			$this->load->database();
		}

		public function getAllProjectCharter_stakeholders(){
			$query = $this->db->get('project_charter_stakeholder');
			return $query->result(); 
		}

		public function insertprojectCharter_stakeholder($projectCharter_stakeholder){
			return $this->db->insert('project_charter_stakeholder', $projectCharter_stakeholder);
		}

		public function getProjectCharter_stakeholder($idPC, $idS){
			$sql = "SELECT * FROM project_charter_stakeholder
					WHERE project_charter_stakeholder.project_charter_id
					AND project_charter_stakeholder.stakeholder_id";
			return $this->db->query($sql, array($idPC, $idS))->result();
		}

		public function updateprojectCharter_stakeholder($projectCharter_stakeholder, $idPC, $idS){
			$data = array(
        		'project_charter_id' => $project_charter_stakeholder['project_charter_id'],
        		'stakeholder_id' => $project_charter_stakeholder['stakeholder_id'],
        		'status'  => $project_charter_stakeholder['status']
			);
			$array = array('project_charter_id' => $idPC, 'stakeholder_id' => $idS);
			$this->where($array);
			$this->db->replace('project_charter_stakeholder', $data);
			return $this->db->replace('project_charter_stakeholder', $data)->result();
		}

		public function deleteprojectCharter_stakeholder($idPC, $idS){
			$array = array('project_charter_id' => $idPC, 'stakeholder_id' => $idS);
			$this->db->where($array);
			return $this->db->delete('project_charter_stakeholder');
		}
	}
?>