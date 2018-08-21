<?php
   if (!defined('BASEPATH')) {
       exit('No direct script access allowed');
   }
   
   class Human_resource_model extends CI_Model {
   
   		function __construct(){
			parent::__construct();
			$this->load->database();
		}

		public function getHumanResource($id){
			$query = $this->db->get_where('human_resources_mp',array('human_resources_mp.human_resources_mp_id'=>$id));
			return $query->row_array();
		}

		public function getHumanResourceProject_id($project_id){
			$query = $this->db->get_where('human_resources_mp', array('human_resources_mp.project_id'=>$project_id));
			return $query->result(); 
		}

		public function insertHumanResource($human_resources_mp){
			return $this->db->insert('human_resources_mp', $human_resources_mp);
		}

		public function updateHumanResource($human_resources_mp, $id){
			$this->db->where('human_resources_mp.human_resources_mp_id', $id);
			return $this->db->update('human_resources_mp', $human_resources_mp);
		}
   }  
   ?>