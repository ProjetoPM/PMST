<?php
	class Stakeholder_model extends CI_Model {
		function __construct(){
			parent::__construct();
			$this->load->database();
		}

        private $table = 'stakeholder';
		public function insert($stakeholder){
			return $this->db->insert('stakeholder', $stakeholder);
		}

        public function get($id){
            $query = $this->db->get_where('stakeholder',array('stakeholder_id'=>$id));
            return $query->row_array();
        }

        public function getAll($project_id){
            $query = $this->db->get_where('stakeholder', array('stakeholder.project_id'=>$project_id));
            return $query->result();
        }

        public function getAllWithRole($project_id, $language){
            return $this->db->select('stakeholder.*, stakeholder_roles.role as rolename')
                ->from($this->table)
                ->join('stakeholder_roles', 'stakeholder_roles.stakeholder_roles_id = stakeholder.role')
                ->where('project_id', $project_id)
                ->where('language', $language)
                ->get()->result();
        }


        public function update($stakeholder, $stakeholder_id){
            $this->db->where('stakeholder.stakeholder_id', $stakeholder_id);
            return $this->db->update('stakeholder', $stakeholder);
        }

        public function delete($stakeholder_id){
            $this->db->where('stakeholder.stakeholder_id', $stakeholder_id);
            return $this->db->delete('stakeholder');
        }

	}
?>
