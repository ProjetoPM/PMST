<?php
class Score_model extends CI_Model {
    function __construct(){
        parent::__construct();
        $this->load->database();
    }

    public function getAllByGroup($group_id){
        $query = $this->db->select('score.score_id, name')
        ->from('group_score')
        ->join('score', 'group_score.score_id = score.score_id')
        ->where('group_id', $group_id)
        ->get()->result();

        return empty($query[0]) ? null: $query;
    }

    public function update($score){
        $this->db->where('report_score.report_id', $score['report_id']);
        $this->db->where('report_score.professor_id', $score['professor_id']);
        $this->db->update('report_score', $score);
    }

    public function insert($score){
        $this->db->insert('report_score', $score);
    }
}
