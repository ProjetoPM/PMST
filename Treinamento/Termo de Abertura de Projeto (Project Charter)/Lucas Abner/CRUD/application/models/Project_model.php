<?php
	class Project_model extends CI_Model {
		function __construct(){
			parent::__construct();
			$this->load->database();
		}

		public function inserirProject($dados){
			return $this->db->insert('project', $dados);		
		}

		public function pegarProjetos($id=null){
			if ($id != null) {
			
			$this->db->where('project.project_id', $id);
			$resultado = $this->db->get('project');
			return $resultado->result();
			
			} else {

			$resultado = $this->db->get('project');
			return $resultado->result();

			} 
		}

		public function getproject($id){
			$query = $this->db->get_where('project',array('project_id'=>$id));
			return $query->row_array();
		}

		public function updateproject($project, $id){
			$this->db->where('project.project_id', $id);
			return $this->db->update('project', $project);
		}

		public function deletarProject($id){
			$this->db->where('project.project_id', $id);
			return $this->db->delete('project');
		}
	}
?>