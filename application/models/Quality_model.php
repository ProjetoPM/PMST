<?php
	class Custos_model extends CI_Model {
		function __construct(){
			parent::__construct();
			$this->load->database();
		}

		public function getAllQuality(){
			$query = $this->db->get('quality_mp');
			return $query->result(); 
		}

		public function insertquality($quality_mp){
			return $this->db->insert('quality_mp', $quality_mp);
		}

		public function deletecustos($id){
			$this->db->where('quality_mp.project_id', $id);
			return $this->db->delete('quality_mp');
		}
	}
?>