<?php
	class Procurement_statement_of_work_model extends CI_Model {
		function __construct(){
			parent::__construct();
			$this->load->database();
		}

		public function insert($procurement_statement_of_work){
			return $this->db->insert('procurement_statement_of_work', $procurement_statement_of_work);
		}

		public function get($id){
			$query = $this->db->get_where('procurement_statement_of_work',array('id'=>$id));
			return $query->row_array();
		}

		public function getAll($project_id){
			$query = $this->db->get_where('procurement_statement_of_work', array('procurement_statement_of_work.project_id'=>$project_id));
			return $query->result();
		}

		public function update($procurement_statement_of_work, $id){
			$this->db->where('procurement_statement_of_work.id', $id);
			return $this->db->update('procurement_statement_of_work', $procurement_statement_of_work);
		}

		public function delete($id){
			$this->db->where('procurement_statement_of_work.id', $id);
			return $this->db->delete('procurement_statement_of_work');
		}

		public function edit($id) {
			$query = $this->db->get_where('procurement_statement_of_work', array('procurement_statement_of_work.id'=>$id));
			return $query->result();

		}

	}
?>
