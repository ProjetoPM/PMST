<?php
	class Stakeholder_model extends CI_Model {
		function __construct(){
			parent::__construct();
			$this->load->database();
		}

		public function insert($stakeholder){
			return $this->db->insert('stakeholder', $stakeholder);
		}

        public function getStakeholder($id){
            $query = $this->db->get_where('stakeholder',array('stakeholder_id'=>$id));
            return $query->row_array();
        }

        public function getAllStakeholders($project_id){
            $query = $this->db->get_where('stakeholder', array('stakeholder.project_id'=>$project_id));
            return $query->result();
        }

        public function updateStakeholder($stakeholder, $stakeholder_id){
            $this->db->where('stakeholder.stakeholder_id', $stakeholder_id);
            return $this->db->update('stakeholder', $stakeholder);
        }

        public function deleteStakeholder($stakeholder_id){
            $this->db->where('stakeholder.stakeholder_id', $stakeholder_id);
            return $this->db->delete('stakeholder');
        }

        public function edit($stakeholder_id) {
            $query = $this->db->get_where('stakeholder', array('stakeholder.stakeholder_id'=>$stakeholder_id));
            return $query->result();

        }
	}
?>
