<?php
	class Risk_mp_model extends CI_Model {
		function __construct(){
			parent::__construct();
			$this->load->database();
		}

		public function get($id){
			$query = $this->db->get_where('risk_mp',array('risk_mp_id'=>$id));
			return $query->row_array();
		}

		public function getWithProject_id($project_id){
			$query = $this->db->get_where('risk_mp', array('risk_mp.project_id'=>$project_id));
			return $query->result();
		}

		public function insert($risk_mp){
			return $this->db->insert('risk_mp', $risk_mp);
		}
		public function update($risk_mp, $risk_mp_id){
			$this->db->where('risk_mp.risk_mp_id', $risk_mp_id);
			return $this->db->update('risk_mp', $risk_mp);
		}

		public function delete($id){
			$this->db->where('risk_mp.risk_mp_id', $id);
			return $this->db->delete('risk_mp');
		}
	}
?>