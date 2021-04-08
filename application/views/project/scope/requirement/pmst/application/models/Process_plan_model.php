<?php
	class process_plan_model extends CI_Model {
		function __construct(){
			parent::__construct();
			$this->load->database();
		}

		public function get($id){
			$query = $this->db->get_where('process_improvement_plan',array('project_id'=>$id));
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