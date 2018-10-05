<?php
class Ade_model extends CI_Model {
	function __construct(){
		parent::__construct();
		$this->load->database();
	}

	public function insertAde($team_performance_evaluation){
		return $this->db->insert('team_performance_evaluation', $team_performance_evaluation);
	}

	public function getAde($project_id){
		$query = $this->db->get_where('team_performance_evaluation',array('team_performance_evaluation.project_id'=>$project_id));
		return $query->result();
	}

	public function deleteT($team_performance_evaluation_id){
		
		$this->db->where('team_performance_evaluation.team_performance_evaluation_id', $team_performance_evaluation_id);
		return $this->db->delete('team_performance_evaluation');
	}

	public function editAde($team_performance_evaluation_id){
		$this->db->where('team_performance_evaluation.team_performance_evaluation_id', $team_performance_evaluation_id);
		return $this->db->update('team_performance_evaluation', $team_performance_evaluation_id);
	}


}
?>