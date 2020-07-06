<?php
	class comment_model extends CI_Model {
		function __construct(){
			parent::__construct();
			$this->load->database();
		}
        public function get($project_id){
            $query = $this->db->get_where('comment', array('comment_id'=>$project_id));
            return $query->row_array();
        }
    
        public function getAll(){
            $query = $this->db->get('comment');
            return $query->result();
        }
    
        public function getWithViewId($view_id){
            $query = $this->db->get_where('comment', array('comment.view_id'=>$view_id));
            return $query->result();
        }
    
        public function insert($comment){
            return $this->db->insert('comment', $comment);
        }
    
        public function update($comment, $comment_id){
            $this->db->where('comment.comment_id', $comment_id);
            return $this->db->update('comment', $comment);
        }
    
        public function delete($project_id){
            $this->db->where('comment.comment_id', $project_id);
            return $this->db->delete('comment');
        }

	}
?>