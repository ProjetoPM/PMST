<?php
class Project_access_level_model extends CI_Model
{
	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

    private $table = 'project_access_level';


    function getAll($language){
        return $this->db->select('project_access_level_id, name')
        ->from($this->table)
        ->where('language', $language)
        ->get()
        ->result();
    }
}
