<?php
	class Requirement_registration_model extends CI_Model {
		function __construct(){
			parent::__construct();
			$this->load->database();
		}

		public function get($id){
			$query = $this->db->get_where('requirement_registration',array('requirement_registration_id'=>$id));
			return $query->result();
		}

		public function getAll(){
			$query = $this->db->get('requirement_registration');
			return $query->result();
		}

		public function getWithProject_id($project_id){
			$query = $this->db->get_where('requirement_registration', array('requirement_registration.project_id'=>$project_id));
			return $query->result();
		}

		public function insert($requirement_registration){
			return $this->db->insert('requirement_registration', $requirement_registration);
		}

		public function update($requirement_registration, $requirement_registration_id){
			$this->db->where('requirement_registration.requirement_registration_id', $requirement_registration_id);
			return $this->db->update('requirement_registration', $requirement_registration);
		}

		public function delete($id){
			$this->db->where('requirement_registration.requirement_registration_id', $id);
			return $this->db->delete('requirement_registration');
		}
	}
?>