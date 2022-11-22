<?php
	class Activity_model extends CI_Model {
		function __construct(){
			parent::__construct();
			$this->load->database();
		}

        private $table = "activity";
		public function insert($activity){
			return $this->db->insert('activity', $activity);
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
            $query = $this->db->get_where('activity',array('id'=>$id));
            return $query->row_array();
        }
        
        public function getPerProject($id){
            return $this->db->select('activity.project_id, id, project_id, activity_name, agregate_value, planned_value, real_agregate_cost,variation_of_terms, variation_of_costs, variation_at_the_end, estimate_for_completion')
            ->from($this->table)
            ->where('activity.id', $id)
            ->get()->result();
        }

        public function getAll($project_id){
            $query = $this->db->get_where('activity', array('activity.project_id'=>$project_id));
            return $query->result();
        }

        public function getAllActivityIdsPerProject($project_id){
            return $this->db->select('id')
            ->from($this->table)
            ->where('activity.project_id', $project_id)
            ->get()->result();
        }

        

        public function getAllPerProject($project_id){
            return $this->db->select('activity.project_id, id, activity_name, agregate_value, planned_value, real_agregate_cost,variation_of_terms, variation_of_costs, variation_at_the_end, estimate_for_completion')
            ->from($this->table)
            ->where('activity.project_id', $project_id)
            ->get()->result();
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
            return $this->db->update('activity', $activity);
        }

        public function delete($id){
            $this->db->where('activity.id', $id);
            return $this->db->delete('activity');
        }

        public function edit($id) {
            $query = $this->db->get_where('activity', array('activity.id'=>$id));
            return $query->result();
        }
	}
?>
