<?php

defined('BASEPATH') OR exit('No direct script access allowed');



class View_model extends CI_Model {


	function __construct(){
		parent::__construct();
		$this->load->database();
	}

	
	public function GetIDByName($name)

	{  

 		$this->db->select('view_id,view_name');

		$this->db->from('view');

		$this->db->where("view_name",$name);

		$this->db->limit(1);

  		$query = $this->db->get();

		$res = $query->row_array();

 		return $res['view_id'];
	   }
	   
	public function getAllSignature($item_id)
	{
		$query = $this->db->get_where('signature', array('item_id' => $item_id));
		return $query->result();
	}


 }

