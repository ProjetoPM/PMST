<?php
	class Team_Performance_Evaluation_model extends CI_Model {
		function __construct(){
			parent::__construct();
			$this->load->database();
		}

		public function insert($team_performance_evaluation){
			return $this->db->insert('team_performance_evaluation', $team_performance_evaluation);
		}

		public function get($team_performance_evaluation_id){
			$query = $this->db->get_where('team_performance_evaluation',array('team_performance_evaluation_id'=>$team_performance_evaluation_id));
			return $query->row_array();
		}

		public function getAll($project_id){
			$query = $this->db->get_where('team_performance_evaluation', array('team_performance_evaluation.project_id'=>$project_id));
			return $query->result(); 
		}

		public function update($team_performance_evaluation, $team_performance_evaluation_id){
			$this->db->where('team_performance_evaluation.team_performance_evaluation_id', $team_performance_evaluation_id);
			return $this->db->update('team_performance_evaluation', $team_performance_evaluation);
		}

		public function delete($team_performance_evaluation_id){
			$this->db->where('team_performance_evaluation.team_performance_evaluation_id', $team_performance_evaluation_id);
			return $this->db->delete('team_performance_evaluation');
		}

	}
?>