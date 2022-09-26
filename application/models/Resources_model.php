<?php
	class Resources_model extends CI_Model {
		function __construct(){
			parent::__construct();
			$this->load->database();
		}
		private $table = 'resource';
		private $id = 'resource_id';

		public function insert($resource){
			return $this->db->insert($this->table, $resource);
		}

        public function get($resource_id){
            $query = $this->db->get_where($this->table, array($this->id => $resource_id));
            return $query->row_array();
        }

        public function getAll($project_id){
            return $this->db->select('*')
            ->from($this->table)
            ->where('project_id', $project_id)
            ->get()->result();
        }


        public function update($resource, $resource_id){
            $this->db->where("$this->table.$this->id", $resource_id);
            return $this->db->update($this->table, $resource);
        }

        public function delete($resource_id){
            $this->db->where("$this->table.$this->id", $resource_id);
            return $this->db->delete($this->table);
        }

	}
?>
