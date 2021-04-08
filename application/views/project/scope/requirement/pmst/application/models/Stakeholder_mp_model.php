<?php
class Stakeholder_mp_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function insert($stakeholder_mp)
    {
        return $this->db->insert('stakeholder_mp', $stakeholder_mp);
    }

    public function getAll($stakeholder_id)
    {
        $query = $this->db->get_where('stakeholder_mp', array('stakeholder_id' => $stakeholder_id));
        return $query->row_array();
    }

    public function update($stakeholder_mp, $stakeholder_id)
    {
        $this->db->where('stakeholder_mp.stakeholder_id', $stakeholder_id);
        return $this->db->update('stakeholder_mp', $stakeholder_mp);
    }

    public function delete($stakeholder_id)
    {
        $this->db->where('stakeholder_mp.stakeholder_id', $stakeholder_id);
        return $this->db->delete('stakeholder_mp');
    }

    public function edit($stakeholder_id)
    {
        $query = $this->db->get_where('stakeholder_mp', array('stakeholder_mp.stakeholder_id' => $stakeholder_id));
        return $query->result();
    }
}
