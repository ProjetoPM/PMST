<?php
	class Resource_requirements_model extends CI_Model {
		function __construct(){
			parent::__construct();
			$this->load->database();
		}
		private $table = 'resource_requirements';

		public function insert($resource_requirement){
			return $this->db->insert($this->table, $resource_requirement);
		}

        public function get($id){

            return $query = $this->db->select('activity.project_id, activity_name, resource_amount, resource.resource_name, resource.cost_per_unit, resource_requirements.resource_requirements_id')
            ->from($this->table)
            ->join("activity", "$this->table.activity_id = activity.id")
            ->join("resource", "$this->table.resource_id = resource.resource_id")
            ->where('resource_requirements_id', $id)
            ->get()->result();
        }

        public function getAll($project_id){
            return $this->db->select('*')
            ->from($this->table)
            ->where('project_id', $project_id)
            ->get()->result();
        }
        
        public function getAllPerProject($project_id){
            return $query = $this->db->select('activity.project_id, activity_name, resource_amount, resource.resource_name, resource.cost_per_unit, resource_requirements.resource_requirements_id')
            ->from($this->table)
            ->join("activity", "$this->table.activity_id = activity.id")
            ->join("resource", "$this->table.resource_id = resource.resource_id")
            ->where('activity.project_id', $project_id)
            ->get()->result();


        }

        public function update($resource_requirement, $resource_requirement_id){
            $this->db->where('resource_requirement.resource_requirement_id', $resource_requirement_id);
            return $this->db->update($this->table, $resource_requirement);
        }

        public function delete($resource_requirement_id){
            $this->db->where('resource_requirement.resource_requirement_id', $resource_requirement_id);
            return $this->db->delete($this->table);
        }

	}
?>
