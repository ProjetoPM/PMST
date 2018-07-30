<?php
	class Stakeholder_model extends CI_Model {
		function __construct(){
			parent::__construct();
			$this->load->database();
		}

		public function inserirStakeholder($dados){
			return $this->db->insert('stakelholder', $dados);		
		}

		public function deletarStakeholder($id){
			$this->db->where('stakelholder.stakelholder_id', $id);
			return $this->db->delete('stakelholder');
		}

		public function pegarStakeholders(){
			$resultado = $this->db->get('stakelholder');
			return $resultado->result(); 
		}

		public function getstakeholder($id){
			$query = $this->db->get_where('stakelholder',array('stakelholder_id'=>$id));
			return $query->row_array();
		}

		public function updateStakeholder($stakeholder, $id){
			$this->db->where('stakelholder.stakelholder_id', $id);
			return $this->db->update('stakelholder', $stakeholder);
		}
	}
?>