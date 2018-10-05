<?php
	class Cost_model extends CI_Model {
		function __construct(){
			parent::__construct();
			$this->load->database();
		}

		public function getAll(){
			$query = $this->db->get('cost_mp');
			return $query->result(); 
		}

		public function insert($cost_mp){
			return $this->db->insert('cost_mp', $cost_mp);
		}

		//public function deletecustos($id){
		//	$this->db->where('cost_mp.project_id', $id);
		//	return $this->db->delete('cost_mp');
		//}

		public function update($cost_mp, $id){
			$this->db->where('cost_mp.project_id', $id);
			return $this->db->update('cost_mp', $cost_mp);
		}

	}
?>