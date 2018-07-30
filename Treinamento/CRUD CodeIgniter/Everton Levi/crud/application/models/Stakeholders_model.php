<?php
class Stakeholders_model extends CI_Model {
	function __construct(){
		parent::__construct();
		$this->load->database();
	}

	public function getProjects(){
		$query = $this->db->get('stakeholder_mp');
		return $query->result();
	}

	public function insertStakeholder($stk){
		return $this->db->insert('pmst.stakelholder', $stk);
		//OK
	}

	public function getAllStk(){
		return $this->db
		->order_by('name')
		->get('stakelholder');
	}

/* monta o select com os nomes 
da db */
public function selectStk(){

	$options = "<option value=''>
	Select Stakeholder
	</option>";
	$name = $this->getAllStk();

	foreach($name -> result() as $names) {
		$options .= "<option value='{$names->stakelholder_id}'>
		{$names->name}
		</option>".PHP_EOL;
	}
	return $options;
}

public function setNameById($stakelholder_id = null){
	return $this->db
	->where('stakelholder_id', $stakelholder_id)
	->get('stakeholder_mp');
}

public function insertStk($stake){
	return $this->db->insert('pmst.stakeholder_mp', $stake);
}

}


?>

