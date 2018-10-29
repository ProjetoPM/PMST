<?php
	class Notification_board_model extends CI_Model {
		function __construct(){
			parent::__construct();
			$this->load->database();
		}

		public function get($id){
			$query = $this->db->get_where('notification_board',array('notification_board_id'=>$id));
			return $query->row_array();
		}

		public function getWithProject_id($project_id){
			$query = $this->db->get_where('notification_board', array('notification_board.project_id'=>$project_id));
			return $query->result();
		}

		public function insert($notification_board){
			return $this->db->insert('notification_board', $notification_board);
		}
		public function update($notification_board, $notification_board_id){
			$this->db->where('notification_board.notification_board_id', $notification_board_id);
			return $this->db->update('notification_board', $notification_board);
		}

		public function delete($id){
			$this->db->where('notification_board.notification_board_id', $id);
			return $this->db->delete('notification_board');
		}
	}
?>