<?php
class Access_level_model extends CI_Model
{
	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

    private $table = 'access_level';


    function getAll($language){
        return $this->db->select('access_level_id, access_level_name')
        ->from($this->table)
        ->where('language', $language)
        ->get()
        ->result();
    }
}
