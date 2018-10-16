<?php
	class Requirements_registration_model extends CI_Model {
		function __construct(){
			parent::__construct();
			$this->load->database();
		}

		public function get($id){
			$query = $this->db->get_where('requirements_registration',array('requirements_registration_id'=>$id));
			return $query->result();
		}

		public function getAll(){
			$query = $this->db->get('requirements_registration');
			return $query->result();
		}

		public function getWithProject_id($project_id){
			$query = $this->db->get_where('requirements_registration', array('requirements_registration.project_id'=>$project_id));
			return $query->result();
		}

		public function insert($requirements_registration){
			return $this->db->insert('requirements_registration', $requirements_registration);
		}

		public function update($requirements_registration, $requirements_registration_id){
			$this->db->where('requirements_registration.requirements_registration_id', $requirements_registration_id);
			return $this->db->update('requirements_registration', $requirements_registration);
		}

		public function delete($id){
			$this->db->where('requirements_registration.requirements_registration_id', $id);
			return $this->db->delete('requirements_registration');
		}
	}
?>