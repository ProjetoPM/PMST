<?php
	class Custos_model extends CI_Model {
		function __construct(){
			parent::__construct();
			$this->load->database();
		}

		public function getAllCustos(){
			$query = $this->db->get('cost_mp');
			return $query->result(); 
		}

		public function insertcustos($cost_mp){
			return $this->db->insert('cost_mp', $cost_mp);
		}

<<<<<<< HEAD
		public function deletecustos($id){
			$this->db->where('cost_mp.project_id', $id);
			return $this->db->delete('cost_mp');
=======
		public function deletecustos($project_id){
			$this->db->where('custos_mp.project_id', $project_id);
			return $this->db->delete('custos_mp');
>>>>>>> master
		}
	}
?>