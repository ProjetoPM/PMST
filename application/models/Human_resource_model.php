<?php
   if (!defined('BASEPATH')) {
       exit('No direct script access allowed');
   }
   
   class Human_resource_model extends CI_Model {
   
   		function __construct(){
			parent::__construct();
			$this->load->database();
		}

		public function getHumanResource(){
			$query = $this->db->get('human_resources_mp', array('human_resources_mp_id'=>$id));
			return $query->result(); 
		}

		public function insertHumanResource($human_resources_mp){
			return $this->db->insert('human_resources_mp', $human_resources_mp);
		}

		public function updateHumanResource($project_id, $human_resources_mp_id){

		}
		    
       
   }  
   /* End of file */
   ?>