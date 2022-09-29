<?php
	class Project_user_model extends CI_Model {

        function __construct(){
                parent::__construct();
                $this->load->database();
        }
        private $table = 'project_user';

        public function insert($researcher){
                return $this->db->insert($this->table, $researcher);
        }

        public function get($user_id, $project_id){
                return $this->db->select("user.name, user.email, $this->table.access_level")
                    ->from($this->table)
                    ->where('project_id', $project_id)
                    ->where('user_id', $user_id)
                    ->join('user', 'user.user_id = project_user.user_id')
                    ->get()->result();
        }

        public function update($user_id, $project_id, $researcher){
            $this->db->where("$this->table.user_id", $user_id);
            $this->db->where("$this->table.project_id", $project_id);
            return $this->db->update($this->table, $researcher);
        }

        public function delete($user_id, $project_id){
            $this->db->where("$this->table.user_id", $user_id);
            $this->db->where("$this->table.project_id", $project_id);
            return $this->db->delete($this->table);
        }

    }
