<?php
class QualityChecklist_model extends CI_Model
{
	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function delete($quality_checklist_id)
	{
		$this->db->where('quality_checklist.quality_checklist_id', $quality_checklist_id);
		$db1 = $this->db->delete('quality_checklist');
		$db2 = $this->db->delete('quality_checklist_item', array('quality_checklist_id' => $quality_checklist_id));
		return $db1+ $db2;
	}

	function updateQualityCheckItem($check_item, $quality_checklist_id)
	{
		$this->db->trans_start();
// var_dump($quality_checklist_id);exit;
		$result = array();
		$this->db->delete('quality_checklist_item', array('quality_checklist_id' => $quality_checklist_id));
		if ($check_item['status'][0] != null) {
			for ($j = 0; $j < count($check_item)/3; $j++) {
				for ($i = 0; $i < count($check_item['comments']); $i++) {
					$result[] = array(
						'status' => $check_item['status'][$i],
						'comments' => $check_item['comments'][$i],
						'item_check' => $check_item['item_check'][$i],
						'quality_checklist_id' => $quality_checklist_id,
					);
				}
			}

			//MULTIPLE INSERT TO DETAIL TABLE
			$this->db->insert_batch('quality_checklist_item', $result);
		}
		$this->db->trans_complete();
		return $result;
	}

	public function get($id)
	{
		$query = $this->db->get_where('quality_checklist', array('quality_checklist_id' => $id));
		return $query->row_array();
	}

	public function getAllItens($id)
	{
		$query = $this->db->get_where('quality_checklist_item', array('quality_checklist_item.quality_checklist_id' => $id));
		return $query->result();
	}

	public function getAll($project_id)
	{
		$query = $this->db->get_where('quality_checklist', array('quality_checklist.project_id' => $project_id));
		return $query->result();
	}

	public function insert($quality_checklist)
	{
		$this->db->insert('quality_checklist', $quality_checklist);
		return $this->db->insert_id();
	}

	public function update($quality_checklist, $quality_checklist_id)
	{
		$this->db->where('quality_checklist.quality_checklist_id', $quality_checklist_id);
		return $this->db->update('quality_checklist', $quality_checklist);
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



	function templateRiskCheckList($project_id)
	{
		$this->db->trans_start();

		$data = array(
			array(
				'aspects' => 'Os objetivos do projeto foram validados com o cliente?',
				'project_id' => $project_id,
			),
			array(
				'aspects' => 'Existe clareza sobre o que será produzido pelo projeto, e todas as principais partes interessadas estão cientes e concordam?',
				'project_id' => $project_id,
			),
			array(
				'aspects' => 'Existe comprometimento das principais partes interessadas com o sucesso do projeto?',
				'project_id' => $project_id,
			),
			array(
				'aspects' => 'O cliente tem experiência com este tipo de projeto?',
				'project_id' => $project_id,
			),
			array(
				'aspects' => 'O gerente do projeto tem experiência e competência para conduzir um projeto com estas características?',
				'project_id' => $project_id,
			),
			array(
				'aspects' => 'A organização tem capacidade financeira para suportar um desvio significativo no orçamento do projeto?',
				'project_id' => $project_id,
			),
			array(
				'aspects' => 'O projeto tem prioridade tanto para o cliente quanto para a organização executora?',
				'project_id' => $project_id,
			),
			array(
				'aspects' => 'O projeto envolve o uso de tecnologia inovadora?',
				'project_id' => $project_id,
			),
			array(
				'aspects' => 'Existem dependências externas?',
				'project_id' => $project_id,
			),
			array(
				'aspects' => 'O ambiente utiliza gestão profissional de projetos? Existe maturidade organizacional com relação ao assunto?',
				'project_id' => $project_id,
			),
			array(
				'aspects' => 'Os prazos são realistas?',
				'project_id' => $project_id,
			),
			array(
				'aspects' => 'O ambiente externo onde o projeto será realizado é estável? (País, cidade, bairro)',
				'project_id' => $project_id,
			),
			array(
				'aspects' => 'Existe histórico positivo com relação ao cliente que será atendido?',
				'project_id' => $project_id,
			),
			array(
				'aspects' => 'Caso não existam recursos financeiros suficientes para a condução do projeto, existem fonte de recursos externos disponíveis para atender à necessidade?',
				'project_id' => $project_id,
			),
			array(
				'aspects' => 'Inclua outros aspectos que considerar importantes para o projeto, e distribua os percentuais para somarem 100%.',
				'project_id' => $project_id,
			),
		);

		//MULTIPLE INSERT TO DETAIL TABLE
		$this->db->insert_batch('risk_checklist', $data);

		$this->db->trans_complete();
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
