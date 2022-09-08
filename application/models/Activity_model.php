<?php
	class Activity_model extends CI_Model {
		function __construct(){
			parent::__construct();
			$this->load->database();
		}

        private $table = 'activity';
		public function insert($activity){
			return $this->db->insert($this->table, $activity);
		}

        public function insertMilestone($milestone){
			return $this->db->insert('milestone', $milestone);
		}

        public function insertPhase($project_phase){
			return $this->db->insert('project_phase', $project_phase);
		}

        public function deleteMilestone($id){
            $this->db->where('milestone.milestone_id', $id);
            return $this->db->delete('milestone');
        }

        public function deletePhase($id){
            $this->db->where('project_phase.project_phase_id', $id);
            return $this->db->delete('project_phase');
        }

        public function get($id){
            $query = $this->db->get_where($this->table,array('id'=>$id));
            return $query->row_array();
        }

        public function getAll($project_id){
            $query = $this->db->get_where($this->table, array('activity.project_id'=>$project_id));
            return $query->result();
        }

        public function getAllPerProject($project_id){
             $query = $this->db->select('*')
            ->from($this->table)
            ->where('project_id', $project_id)
            ->get()->result();

            var_dump($query);
        }

        public function getAllMilestone($project_id){
            $query = $this->db->get_where('milestone', array('milestone.project_id'=>$project_id));
            return $query->result();
        }

        public function getAllPhase($project_id){
            $query = $this->db->get_where('project_phase', array('project_phase.project_id'=>$project_id));
            return $query->result();
        }

        public function update($activity, $id){
            $this->db->where('activity.id', $id);
            return $this->db->update($this->table, $activity);
        }

        public function delete($id){
            $this->db->where('activity.id', $id);
            return $this->db->delete($this->table);
        }

        public function edit($id) {
            $query = $this->db->get_where($this->table, array('activity.id'=>$id));
            return $query->result();
        }
	}
?>
