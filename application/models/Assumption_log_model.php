<?php
	class Assumption_log_model extends CI_Model {
		function __construct(){
			parent::__construct();
			$this->load->database();
		}

		public function insert($assumption_log){
			return $this->db->insert('assumption_log', $assumption_log);
		}

        public function get($id){
            $query = $this->db->get_where('assumption_log',array('assumption_log_id'=>$id));
            return $query->row_array();
        }

        public function getAll($project_id){
            $query = $this->db->get_where('assumption_log', array('assumption_log.project_id'=>$project_id));
            return $query->result();
        }


        public function update($assumption_log, $assumption_log_id){
            $this->db->where('assumption_log.assumption_log_id', $assumption_log_id);
            return $this->db->update('assumption_log', $assumption_log);
        }

        public function delete($assumption_log_id){
            $this->db->where('assumption_log.assumption_log_id', $assumption_log_id);
            return $this->db->delete('assumption_log');
        }

	}
?>
