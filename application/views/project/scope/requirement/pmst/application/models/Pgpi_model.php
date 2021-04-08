<?php
if (!defined('BASEPATH')) {
	exit('No direct script access allowed');
}

class pgpi_model extends CI_Model{

	function __construct() {
		parent::__construct();
	}

	public function updateScheduleDB($shed){
		return $this->db->insert('schedule_mp', $shed);

	}

}

?>