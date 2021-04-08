<?php
	class Activity_model extends CI_Model {
		function __construct(){
			parent::__construct();
			$this->load->database();
		}

		public function insert($activity){
			return $this->db->insert('activity', $activity);
		}

        public function get($id){
            $query = $this->db->get_where('activity',array('id'=>$id));
            return $query->row_array();
        }

        public function getAll($project_id){
            $query = $this->db->get_where('activity', array('activity.project_id'=>$project_id));
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
