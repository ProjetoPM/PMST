<?php
class Stakeholder_availability_model extends CI_Model
{
	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

    private $table = 'stakeholder_availability';


    function getAllPerStakeholder($language){
        return $this->db->select('access_level_id, access_level_name')
        ->from($this->table)
        ->where('language', $language)
        ->get()
        ->result();
    }
}
