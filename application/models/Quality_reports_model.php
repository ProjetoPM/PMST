<?php
	class Quality_reports_model extends CI_Model {
		function __construct(){
			parent::__construct();
			$this->load->database();
		}

		public function insert($quality_reports){
			return $this->db->insert('quality_reports', $quality_reports);
		}

        public function get($id){
            $query = $this->db->get_where('quality_reports',array('quality_reports_id'=>$id));
            return $query->row_array();
        }

        public function getAll($project_id){
            $query = $this->db->get_where('quality_reports', array('quality_reports.project_id'=>$project_id));
            return $query->result();
        }

        public function update($quality_reports, $id){
            $this->db->where('quality_reports.quality_reports_id', $id);
            return $this->db->update('quality_reports', $quality_reports);
        }

        public function delete($id){
            $this->db->where('quality_reports.quality_reports_id', $id);
            return $this->db->delete('quality_reports');
        }

	}
?>
