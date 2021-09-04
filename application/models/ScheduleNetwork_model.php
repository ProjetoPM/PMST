<?php
	class ScheduleNetwork_model extends CI_Model {
		function __construct(){
			parent::__construct();
			$this->load->database();
		}

		public function insert($schedule_network){
			return $this->db->insert('schedule_network', $schedule_network);
		}

        public function get($id){
            $query = $this->db->get_where('schedule_network',array('schedule_network_id'=>$id));
            return $query->row_array();
        }

        public function getAll($project_id){
            $query = $this->db->get_where('schedule_network', array('schedule_network.project_id'=>$project_id));
            return $query->result();
        }

        public function update($schedule_network, $id){
            $this->db->where('schedule_network.schedule_network_id', $id);
            return $this->db->update('schedule_network', $schedule_network);
        }

        public function delete($id){
            $this->db->where('schedule_network.id', $id);
            return $this->db->delete('schedule_network');
        }

        public function edit($id) {
            $query = $this->db->get_where('schedule_network', array('schedule_network.id'=>$id));
            return $query->result();
        }
	}
