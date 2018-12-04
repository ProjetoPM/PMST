<?php
if (!defined('BASEPATH')) {
	exit('No direct script access allowed');
}
class Schedule_model extends CI_Model{
	function __construct() {
		parent::__construct();
	}

	public function Schedule_form($project_id){
		$query = $this->db->get_where('schedule_mp', array('project_id' => $project_id));
		return $query->result();
	}
	public function update($schedule_mp, $schedule_mp_id){
		$this->db->where('schedule_mp.schedule_mp_id', $schedule_mp_id);
		return $this->db->update('schedule_mp', $schedule_mp);
	}
//pegar o Schedule com id do projeto
	public function getSchedule($project_id){
		$query = $this->db->get_where('schedule_mp',array('project_id'=>$project_id));
		return $query->result();
	}
// armazenar o schedule com o mesmo project_id da tabela project
	public function insert($schedule_mp){
		return $this->db->insert('schedule_mp', $schedule_mp);
}
}

?>