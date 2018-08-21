<?php
   if (!defined('BASEPATH')) {
       exit('No direct script access allowed');
   }
   
   class Project_model extends CI_Model {
   
       function __construct() {
           parent::__construct();
       }
   
       function insert_project($postData){
   
           $data = array(
               'title' => $postData['title'],
               'description' => $postData['description'],
               'objectives' => $postData['objectives'],
               'created_by' => $this->session->userdata('user_id')
           );
   
           $this->db->insert('project', $data);
           $this->db->select_max('project_id');
           $result = $this->db->get('project')->row_array();
           $project_id = $result['project_id'];
   
           $projectUser = array(
              'project_id' => $project_id,
              'user_id' => $this->session->userdata('user_id'),
              'access_level' => 2
           );
           $this->db->insert('project_user', $projectUser);
   
       }
   
       function insert_log($activity, $module){
           $id = $this->session->userdata('user_id');
   
           $data = array(
               'fk_user_id' => $id,
               'activity' => $activity,
               'module' => $module,
               'created_at' => date('Y\-m\-d\ H:i:s A')
           );
           $this->db->insert('activity_log', $data);
       }

       function insertResearcher($data) {

        if ($this->db->insert('project_user', $data)) {
            $this->session->set_flashdata('error2', 'User added.');
            redirect('projects/');
        }

        $error = $this->db->error();
        if ($error['code'] == 1062) {
            $this->session->set_flashdata('error3', 'User already a member.');
            redirect('projects/');
        }

       }

   
       function deleteProjectModel($id) {
           $this->db->where('project_id', $id);
           if($this->db->delete('project')) {
               $this->session->set_flashdata('success', 'Project Deleted!');            
               redirect('project/show_projects');
           } else {
               $this->session->set_flashdata('faildeleteproject', 'Problem to delete project!');            
               //echo "Problema ao deletar projeto";
           }
       }
   }  
   
   
   /* End of file */
   ?>