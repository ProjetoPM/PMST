<?php
class Log_model extends CI_Model
{
	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function insert($log)
	{
		return $this->db->insert('log_activity', $log);
	}

	public function getAllLogActivity($project_id)
	{
		$query = $this->db->get_where('log_activity', array('log_activity.project_id' => $project_id));
		return $query->result();
	}

	public function getAllActivity($project_id)
	{
		$query = $this->db->get_where('activity', array('activity.project_id' => $project_id));
		return $query->result();
	}

	public function insertNotification($project_id, $user)

	{
		$notification['user_id'] = $user;
		$notification['notification'] = 1;
		$notification['project_id'] = $project_id;

		return $this->db->insert('log_notification', $notification);

		//$this->db-> where( 'project_id' , $project_id );
		//	$this->db-> set( array( 'notifications' => 'notifications + 1' ) );
		//	$this->db-> update( 'log_notification' );
	}
}