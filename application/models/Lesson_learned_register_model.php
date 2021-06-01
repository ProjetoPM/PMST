<?php
	class Lesson_learned_register_model extends CI_Model {
		function __construct(){
			parent::__construct();
			$this->load->database();
		}

		public function insert($lesson_learned_register){
			return $this->db->insert('lesson_learned_register', $lesson_learned_register);
		}

        public function get($id){
            $query = $this->db->get_where('lesson_learned_register',array('lesson_learned_register_id'=>$id));
            return $query->row_array();
        }

        public function getAll($project_id){
            $query = $this->db->get_where('lesson_learned_register', array('lesson_learned_register.project_id'=>$project_id));
            return $query->result();
        }


        public function update($lesson_learned_register, $lesson_learned_register_id){
            $this->db->where('lesson_learned_register.lesson_learned_register_id', $lesson_learned_register_id);
            return $this->db->update('lesson_learned_register', $lesson_learned_register);
        }

        public function delete($lesson_learned_register_id){
            $this->db->where('lesson_learned_register.lesson_learned_register_id', $lesson_learned_register_id);
            return $this->db->delete('lesson_learned_register');
        }

	}
?>
