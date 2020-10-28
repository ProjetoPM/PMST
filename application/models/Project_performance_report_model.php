<?php
	class Project_performance_report_model extends CI_Model {
		function __construct(){
			parent::__construct();
			$this->load->database();
		}

		public function insert($project_performance_report){
			return $this->db->insert('project_performance_report', $project_performance_report);
		}

        public function get($id){
            $query = $this->db->get_where('project_performance_report',array('id'=>$id));
            return $query->row_array();
        }

        public function getAll($project_id){
            $query = $this->db->get_where('project_performance_report', array('project_performance_report.project_id'=>$project_id));
            return $query->result();
        }

        public function update($project_performance_report, $id){
            $this->db->where('project_performance_report.id', $id);
            return $this->db->update('project_performance_report', $project_performance_report);
        }

        public function delete($id){
            $this->db->where('project_performance_report.id', $id);
            return $this->db->delete('project_performance_report');
        }

	}
?>
