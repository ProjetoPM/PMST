<?php
	class DurationEstimates_model extends CI_Model {
		function __construct(){
			parent::__construct();
			$this->load->database();
		}
		private $table = 'duration_estimates';

		public function insert($duration_estimates){
			return $this->db->insert($this->table, $duration_estimates);
		}

        public function get($id){
            $query = $this->db->get_where('duration_estimates',array('duration_estimates_id'=>$id));
            return $query->row_array();
        }

        public function getAll($project_id){
            return $this->db->select("activity_name, $this->table.activity_id, $this->table.duration_estimates_id, $this->table.status, $this->table.estimated_duration, $this->table.performed_duration, $this->table.estimated_start_date, $this->table.performed_start_date, $this->table.estimated_end_date, $this->table.performed_end_date")
            ->from($this->table)
            ->join('activity', "$this->table.activity_id = activity.id")
            ->where("$this->table.project_id", $project_id)
            ->get()->result();
        }

        public function update($duration_estimates, $id){
            $this->db->where('duration_estimates.duration_estimates_id', $id);
            return $this->db->update($this->table, $duration_estimates);
        }

        // neste caso precisa deletar todos q tem o mesmo activity_id
        public function delete($activity_id){
            $this->db->where('duration_estimates.activity_id', $activity_id);
            return $this->db->delete($this->table);
        }

        public function edit($id) {
            $query = $this->db->get_where($this->table, array('duration_estimates.duration_estimates_id '=>$id));
            return $query->result();
        }
	}
