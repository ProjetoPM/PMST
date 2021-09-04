<?php
	class ProjectCalendars_model extends CI_Model {
		function __construct(){
			parent::__construct();
			$this->load->database();
		}

		public function insert($project_calendars){
			return $this->db->insert('project_calendars', $project_calendars);
		}

        public function get($id){
            $query = $this->db->get_where('project_calendars',array('project_calendars_id'=>$id));
            return $query->row_array();
        }

        public function getAll($project_id){
            $query = $this->db->get_where('project_calendars', array('project_calendars.project_id'=>$project_id));
            return $query->result();
        }

        public function update($project_calendars, $id){
            $this->db->where('project_calendars.project_calendars_id', $id);
            return $this->db->update('project_calendars', $project_calendars);
        }

        public function delete($id){
            $this->db->where('project_calendars.id', $id);
            return $this->db->delete('project_calendars');
        }

        public function edit($id) {
            $query = $this->db->get_where('project_calendars', array('project_calendars.id'=>$id));
            return $query->result();
        }
	}
