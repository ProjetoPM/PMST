<?php
	class process_plan_model extends CI_Model {
		function __construct(){
			parent::__construct();
			$this->load->database();
		}

		public function getAll(){
			$query = $this->db->get('process_improvement_plan');
			return $query->result(); 
		}

		public function insert($process_plan){
			return $this->db->insert('process_improvement_plan', $process_plan);
		}

		public function update($process_plan, $id){
			$this->db->where('process_improvement_plan.project_id', $id);
			return $this->db->update('process_improvement_plan', $process_plan);
		}

	}
?>