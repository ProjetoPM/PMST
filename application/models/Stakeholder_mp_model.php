<?php
if (!defined('BASEPATH')) {
	exit('No direct script access allowed');
}

class Stakeholder_mp_model extends CI_Model{

	function __construct() {
		parent::__construct();
	}

public function createStakeholderMP($postData){
		$interest = $postData ['interest'];
		$power = $postData['power'];
		$impact = $postData['impact'];
		$influence = $postData['influence'];

		$average = ($influence + $power + $interest + $impact) / 4;

		$data = array(
			'stakeholder_id' => $postData ['stakeholder_id'],
			'project_id' => $postData ['project_id'],
			'interest' => $postData['interest'],
			'power' => $postData['power'],
			'influence' => $postData['influence'],
			'impact' => $postData['impact'],
			'average' => $average,
			'current_engagement' => $postData['current_engagement'],
			'expected_engagement' => $postData['expected_engagement'],
		    'strategy' => $postData['strategy'],
		    'scope' => $postData['scope'],
		    'observation' => $postData['observation']
	     	);




		$this->db->insert('stakeholder_mp',$data);
	}
	public function getAllStakeholders(){
		$data = $this->db->get('stakeholder');
        return $data->result();


	}


	public function getProjectId($id){
		$query = $this->db->get_where('stakeholder_mp',array('project_id'=>$id));
		return $query->result();
	}
}
?>