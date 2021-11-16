<?php
	class FieldEvaluation_model extends CI_Model {
		function __construct(){
			parent::__construct();
			$this->load->database();
		}

		function insert($data){
			return $this->db->insert('field_evaluation', $data);
		}
		// public function get($project_id){
		// 	$query = $this->db->get_where('business_case',array('project_id'=>$project_id));
		// 	return $query->result();
		// }

		// public function update($field_evaluation, $project_id, $view_id, $item_id, $field){
		// 	// $this->db->where('field_evaluation.project_id', $project_id);
		// 	// return $this->db->update('field_evaluation', $field_evaluation);
		// 	return $this->db->update('field_evaluation', $field_evaluation, array('field_evaluation.project_id'=>$project_id, 'field_evaluation.view_id' => $view_id, 'field_evaluation.item_id' => $item_id, 'field_evaluation.field' => $field));
		// }

		public function update($field_evaluation,$field_evaluation_id){
			$this->db->where('field_evaluation.field_evaluation_id', $field_evaluation_id);
			return $this->db->update('field_evaluation',$field_evaluation);
		}

		public function getAll($project_id, $view_id, $item_id){
            $query = $this->db->get_where('field_evaluation', array('field_evaluation.project_id'=>$project_id, 'field_evaluation.view_id' => $view_id, 'field_evaluation.item_id' => $item_id));
            return $query->result();
        }

		public function getAllByProject($project_id){
            $query = $this->db->get_where('field_evaluation', array('field_evaluation.project_id'=>$project_id));
            return $query->result();
        }

		public function delete($field_evaluation_id){
			$this->db->where('field_evaluation.field_evaluation_id', $field_evaluation_id);
			return $this->db->delete('field_evaluation');
		}
	}
