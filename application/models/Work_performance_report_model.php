<?php
	class Work_performance_report_model extends CI_Model {
		function __construct(){
			parent::__construct();
			$this->load->database();
		}

		public function insert($work_performance_report){
			return $this->db->insert('work_performance_report', $work_performance_report);
		}

        public function get($id){
            $query = $this->db->get_where('work_performance_report',array('work_performance_report_id'=>$id));
            return $query->row_array();
        }

        public function getAll($project_id){
            $query = $this->db->get_where('work_performance_report', array('work_performance_report.project_id'=>$project_id));
            return $query->result();
        }

        public function update($work_performance_report, $id){
            $this->db->where('work_performance_report.work_performance_report_id', $id);
            return $this->db->update('work_performance_report', $work_performance_report);
        }

        public function delete($id){
            $this->db->where('work_performance_report.work_performance_report_id', $id);
            return $this->db->delete('work_performance_report');
        }

	}
?>
