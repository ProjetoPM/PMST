<?php
if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Project_model extends CI_Model
{

    function __construct()
    {
        parent::__construct();
    }


    public function getProjectName($project_id)

    {

        $this->db->select('*');

        $this->db->from('project');

        $this->db->where("project_id", $project_id);

        $this->db->limit(1);

        $query = $this->db->get();

        $u = $query->row_array();

        return $u['title'];
    }

    function insert_project($postData)
    {

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
        $_SESSION['project_id'] = $project_id;

        $status = $this->db->insert('project_user', $projectUser);
        if ($status == 1)
            return true;
        else
            return false;
    }

    function insert_log($activity, $module)
    {
        $id = $this->session->userdata('user_id');

        $data = array(
            'fk_user_id' => $id,
            'activity' => $activity,
            'module' => $module,
            'created_at' => date('Y\-m\-d\ H:i:s A')
        );
        $this->db->insert('activity_log', $data);
    }

    function insertResearcher($data)
    {
        return $this->db->insert('project_user', $data);

        // if ($this->db->insert('project_user', $data)) {
        //     $this->session->set_flashdata('error2', 'User added.');
        //     redirect('projects/');
        // }

        // $error = $this->db->error();
        // if ($error['code'] == 1062) {
        //     $this->session->set_flashdata('error3', 'User already a member.');
        //     redirect('projects/');
        // }

    }

    function getRole($project_id, $user_id)
    {
        $this->db->select('access_level');
        $this->db->where('project_id', $project_id);
        $this->db->where('user_id', $user_id);
        $this->db->from('project_user');
        $this->db->limit(1);
        $query = $this->db->get();
        $res = $query->row_array();
        return $res['access_level'];
    }

     function getIdUser($email){
        // {
        //     $this->db->select('user_id');
        //     $this->db->where('email', $email);
        //     $this->db->from('user');
        //     $this->db->limit(1);
        //     $query = $this->db->get();
        //     $res = $query->row_array();
        //     return $res['user_id'];
        $this->db->where('email', $email);
        $userdata = $this->db->get('user');
        foreach ($resultado = $userdata->result() as $row) {
            $project_id   = $row->user_id;
            $name = $row->name;
        }
        $retorna = array(
            '$user_id' => $project_id
        );
        return $retorna['$user_id'];
     }

    function getResearcher($project_id, $user_id)
    {
        $query = $this->db->get_where('project_user', array('project_id' => $project_id, 'user_id' => $user_id));
        return $query->result();
    }

    public function updateResearcher($project_id,$user_id,$researcher)
    {
        $this->db->where('user_id', $user_id);
        $this->db->where('project_id', $project_id);
        $this->db->from('project_user');
        return $this->db->update('project_user', $researcher);
    }

    function deleteProjectModel($id)
    {
        $this->db->where('project_id', $id);
        if ($this->db->delete('project')) {
            $this->session->set_flashdata('error3', 'Project Deleted!');
            redirect('project/show_projects');
        } else {
            $this->session->set_flashdata('faildeleteproject', 'Problem to delete project!');
            //echo "Problema ao deletar projeto";
        }
    }
    public function getAllKnowledgeArea(){
        $data = $this->db->get('knowledge_area');
		return $data->result();
    }
}  
   
   
   /* End of file */
