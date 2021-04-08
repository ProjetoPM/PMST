 <?php


	class Chat_model extends CI_Model
	{
		public function __construct()
		{
			parent::__construct();
			// Your own constructor code
			$this->load->database();
		}
		private $Table = 'chat';


		public function SendTxtMessage($data)
		{
			//var_dump($data);exit;
			$res = $this->db->insert($this->Table, $data);
			if ($res == 1)
				return true;
			else
				return false;
		}
		public function GetReciverChatHistory($receiver_id)
		{
			//var_dump($receiver_id);exit;
			//	$sender_id = $this->session->userdata('user_id');

			//SELECT * FROM `chat` WHERE `sender_id`= 197 AND `receiver_id` = 184 OR `sender_id`= 184 AND `receiver_id` = 197
			//$condition= "`sender_id`= '$sender_id' AND `receiver_id` = '$receiver_id' OR `sender_id`= '$receiver_id' AND `receiver_id` = '$sender_id'";

			$this->db->select('*');
			$this->db->from($this->Table);
			$this->db->where('receiver_id', $receiver_id);
			$query = $this->db->get();
			if ($query) {
				return $query->result_array();
			} else {
				return false;
			}
		}
		public function GetNotificationChat($project_id, $user_id)
		{
			$this->db->select('notifications');
			$this->db->from('log_notification');
			$this->db->where('project_id', $project_id);
			$this->db->where('user_id', $user_id);

			$query = $this->db->get();
			if ($query) {
				return $query->result_array();
			} else {
				return false;
			}
		}
		public function InsertNotificationChat($log_notification)
		{
			return $this->db->insert('log_notification', $log_notification);
		}

		public function UpdateNotificationChat($log_notification, $project_id, $user_id)
		{
			$this->db->where('log_notification.project_id', $project_id);
			return $this->db->update('log_notification', $log_notification);
		}



		public function GetReciverMessageList($receiver_id)
		{

			$this->db->select('*');
			$this->db->from($this->Table);
			$this->db->where('receiver_id', $receiver_id);
			$query = $this->db->get();
			if ($query) {
				return $query->result_array();
			} else {
				return false;
			}
		}
	}
