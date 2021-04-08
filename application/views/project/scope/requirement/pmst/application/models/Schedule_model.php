<?php
if (!defined('BASEPATH')) {
	exit('No direct script access allowed');
}
class Schedule_model extends CI_Model{
	function __construct() {
		parent::__construct();
	}
	public function update($schedule_mp,$id){
		$this->db->where('schedule_mp.project_id', $id);
		return $this->db->update('schedule_mp',$schedule_mp);
	}
//pegar o Schedule com id do projeto
	public function get($id){
		$query = $this->db->get_where('schedule_mp',array('project_id'=>$id));
		return $query->result();
	}
// armazenar o schedule com o mesmo project_id da tabela project
	public function insert($postData){
		$data = array(
			'schedule_model' => $postData['schedule_model'],
			'accuracy_level' => $postData['accuracy_level'],
			'organizational_procedures' => $postData['organizational_procedures'],
			'schedule_maintenance' => $postData['schedule_maintenance'],
			'performance_measurement' => $postData['performance_measurement'],
			'report_format' => $postData['report_format'],
			'release_iteration' => $postData['release_iteration'],
			'units_measure' => $postData['units_measure'],
			'control_thresholds' => $postData['control_thresholds'],
			'project_id' => $postData['project_id']);
		$this->db->insert('schedule_mp',$data);
	}
}
?>