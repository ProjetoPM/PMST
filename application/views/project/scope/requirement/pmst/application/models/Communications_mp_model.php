<?php
class Communications_mp_model extends CI_Model
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
		$query = $this->db->get_where('communication_item', array('communication_item.project_id' => $project_id));
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

	function updateResponsability($communication_item_id, $communication_responsability_id, $stakeholder_responsability)
	{
		$this->db->trans_start();

		// $this->db->where('communication_item_id', $communication_item_id);
		// $this->db->where('communication_responsability_id', $communication_responsability_id);
		// $this->db->delete('package', $data);

		//DELETE DETAIL PACKAGE
		$result = array();
		$this->db->delete('communication_stakeholder_responsability', array('communication_item_id' => $communication_item_id, 'communication_responsability_id' => $communication_responsability_id));
		if ($stakeholder_responsability != null) {
			
			foreach ($stakeholder_responsability as $key => $val) {
				$result[] = array(
					'communication_item_id'  	=> $communication_item_id,
					'communication_responsability_id'  	=> $communication_responsability_id,
					'stakeholder_id'  	=> $_POST['responsability'][$key],
				);
			}
		
		//MULTIPLE INSERT TO DETAIL TABLE
		$this->db->insert_batch('communication_stakeholder_responsability', $result);
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
