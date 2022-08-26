<?php
	class ScheduleNetwork_model extends CI_Model {
		function __construct(){
			parent::__construct();
			$this->load->database();
		}
        private $table = 'schedule_network';

		public function insert($schedule_network){
			return $this->db->insert($this->table, $schedule_network);
		}

        public function get($id){
            $query = $this->db->get_where($this->table,array('schedule_network_id'=>$id));
            return $query->row_array();
        }

        public function getAll($project_id){
            return $this->db->select(" activity.activity_name as name, $this->table.*")
            ->from($this->table)
            ->join('activity', "$this->table.activity_id = activity.id")
            ->get()->result();
        }

        public function update($schedule_network, $id){
            $this->db->where('schedule_network.schedule_network_id', $id);
            return $this->db->update($this->table, $schedule_network);
        }

        public function delete($id){
            $this->db->where('schedule_network.schedule_network_id', $id);
            return $this->db->delete($this->table);
        }

        public function edit($id) {
            $query = $this->db->get_where($this->table, array('schedule_network.schedule_network_id'=>$id));
            return $query->result();
        }
	}
