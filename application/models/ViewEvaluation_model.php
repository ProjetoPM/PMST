<?php
	class ViewEvaluation_model extends CI_Model {
		function __construct(){
			parent::__construct();
			$this->load->database();
		}

		public function insert($data){
			$this->db->insert('view_evaluation', $data);
			return $this->db->insert_id();
		}

		public function insertProfessorEvaluation($data){
			return $this->db->insert('professor_view_evaluation', $data);
		}
		public function getProfessorEvaluation($user_id, $view_evaluation_id){
			$query = $this->db->get_where('professor_view_evaluation',array('user_id'=>$user_id,'view_evaluation_id'=>$view_evaluation_id));
			return $query->row_array();
		}

		public function GetByProjectView($view_id, $project_id){
			$query = $this->db->get_where('view_evaluation',array('view_id'=>$view_id, 'project_id'=>$project_id));
			return $query->row_array();
		}

		public function getAllProfessorEvaluation($view_evaluation_id){
            $query = $this->db->get_where('professor_view_evaluation', array('view_evaluation_id'=>$view_evaluation_id));
            return $query->result();
        }

		public function UpdateViewEvaluation($update_evaluation, $view_evaluation_id){
            $this->db->where('view_evaluation.view_evaluation_id', $view_evaluation_id);
            return $this->db->update('view_evaluation', $update_evaluation);
        }

		public function updateProfessorEvaluation($update_evaluation, $professor_view_evaluation_id){
			$this->db->where('professor_view_evaluation.professor_view_evaluation_id', $professor_view_evaluation_id);
            return $this->db->update('professor_view_evaluation', $update_evaluation);
		}
	}
