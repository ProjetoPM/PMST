<?php
class RiskChecklist_model extends CI_Model
{
	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function get($id)
	{
		$query = $this->db->get_where('communication_item', array('communication_item_id' => $id));
		return $query->row_array();
	}

	public function getAll($project_id)
	{
		$query = $this->db->get_where('risk_checklist', array('risk_checklist.project_id' => $project_id));
		return $query->result();
	}

	public function insert($communication_item)
	{
		return $this->db->insert('communication_item', $communication_item);
	}

	public function update($communication_item, $communication_item_id)
	{
		$this->db->where('communication_item.communication_item_id', $communication_item_id);
		return $this->db->update('communication_item', $communication_item);
	}

	public function delete($id)
	{
		$this->db->where('communication_item.communication_item_id', $id);
		return $this->db->delete('communication_item');
	}

	//--------------------
	// public function getAllResponsability(){
	// 	$query = $this->db->get('communication_responsability');
	// 	return $query->result();
	// }

	public function getAllResponsability($communication_item_id)
	{
		$query = $this->db->get_where('communication_stakeholder_responsability', array('communication_stakeholder_responsability.communication_item_id' => $communication_item_id));
		return $query->result();
	}

	function updateRiskCheckList($risk_checklist, $project_id)
	{
		$this->db->trans_start();

		// $this->db->where('communication_item_id', $communication_item_id);
		// $this->db->where('communication_responsability_id', $communication_responsability_id);
		// $this->db->delete('package', $data);

		//DELETE DETAIL PACKAGE
		$result = array();
		$this->db->delete('risk_checklist', array('project_id' => $project_id));
		if ($risk_checklist != null) {
			// count($_POST['pass_type'])
			for ($i = 0; $i < count($risk_checklist); $i++) {
				$result[] = array(
					'aspects'=> $_POST['aspects'][$i],
					'weight'=> $_POST['weight'][$i],
					'level'=> $_POST['level'][$i],
					'project_id' => $project_id,
					'score' => $_POST['score'][$i],
					'comments' => $_POST['comments'][$i],
				);
			}

			//MULTIPLE INSERT TO DETAIL TABLE
			$this->db->insert_batch('risk_checklist', $result);
		}
		$this->db->trans_complete();
		return $result;
	}

	public function getCommunication_stakeholder_item_id($project_id)
	{
		$query = $this->db->get_where('stakeholder', array('stakeholder.project_id' => $project_id));
		return $query->result();
	}
	public function insertCSR($stakeholder_responsability)
	{
		return $this->db->insert('communication_stakeholder_responsability', $stakeholder_responsability);
	}
}
