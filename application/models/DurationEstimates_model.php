<?php
	class DurationEstimates_model extends CI_Model {
		function __construct(){
			parent::__construct();
			$this->load->database();
		}

		public function insert($duration_estimates){
			return $this->db->insert('duration_estimates', $duration_estimates);
		}

        public function get($id){
            $query = $this->db->get_where('duration_estimates',array('duration_estimates_id'=>$id));
            return $query->row_array();
        }

        public function getAll($project_id){
            $query = $this->db->get_where('duration_estimates', array('duration_estimates.project_id'=>$project_id));
            return $query->result();
        }

        public function update($duration_estimates, $id){
            $this->db->where('duration_estimates.duration_estimates_id', $id);
            return $this->db->update('duration_estimates', $duration_estimates);
        }

        public function delete($id){
            $this->db->where('duration_estimates.id', $id);
            return $this->db->delete('duration_estimates');
        }

        public function edit($id) {
            $query = $this->db->get_where('duration_estimates', array('duration_estimates.id'=>$id));
            return $query->result();
        }
	}
