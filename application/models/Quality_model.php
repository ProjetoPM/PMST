<<<<<<< HEAD
<?php
	class Quality_model extends CI_Model {
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

		public function deletequality($id){
			$this->db->where('quality_mp.project_id', $id);
			return $this->db->delete('quality_mp');
		}
	}
=======
<?php
	class Quality_model extends CI_Model {
		function __construct(){
			parent::__construct();
			$this->load->database();
		}

		function createQuality($postData){
			$data = array(
				'methodology' => $postData['methodology'],
				'related_processes' => $postData['related_processes'],
				'expectations_tolerances' => $postData['expectations_tolerances'],
				'traceability' => $postData['traceability'],
				'project_id' => $postData['project_id'],
				'status' => (int) $quality_mp['status']
			);
	
			$this->db->insert('quality_mp', $data);
		}

		public function readQuality($id){
			$query = $this->db->get_where('quality_mp',array('project_id'=>$id));
			return $query->result();
		}

		public function updateQuality($project, $id){
			$this->db->where('quality_mp.project_id', $id);
			return $this->db->update('quality_mp', $project);
		}
	}
>>>>>>> master
?>