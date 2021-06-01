<?php
	class Procurement_cpd_model extends CI_Model {
		function __construct(){
			parent::__construct();
			$this->load->database();
		}

		public function insert($closed_procurement_documentation){
			return $this->db->insert('closed_procurement_documentation', $closed_procurement_documentation);
		}

        public function get($id){
            $query = $this->db->get_where('closed_procurement_documentation',array('closed_procurement_documentation_id'=>$id));
            return $query->row_array();
        }

        public function getAll($project_id){
            $query = $this->db->get_where('closed_procurement_documentation', array('closed_procurement_documentation.project_id'=>$project_id));
            return $query->result();
        }


        public function update($closed_procurement_documentation, $closed_procurement_documentation_id){
            $this->db->where('closed_procurement_documentation.closed_procurement_documentation_id', $closed_procurement_documentation_id);
            return $this->db->update('closed_procurement_documentation', $closed_procurement_documentation);
        }

        public function delete($closed_procurement_documentation_id){
            $this->db->where('closed_procurement_documentation.closed_procurement_documentation_id', $closed_procurement_documentation_id);
            return $this->db->delete('closed_procurement_documentation');
        }

	}
?>
