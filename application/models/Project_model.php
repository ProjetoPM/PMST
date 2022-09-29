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
    private $table = 'project';

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

    function insert_project_and_get_id($project)
    {

        $this->db->insert('project', $project);
        $project_id = $this->db->insert_id();

        $project_user['project_id'] = $project_id;
        $project_user['user_id'] = $project['created_by'];
        $project_user['access_level'] = 2;

        $this->db->insert('project_user', $project_user);

        return $project_id;
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
    }

    function getAll($project_id)
    {
        $query = $this->db->get_where('lesson_learned_register', array('lesson_learned_register.project_id' => $project_id));
        return $query->result();
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

    function getIdUser($email)
    {
        $this->db->where('email', $email);
        $userdata = $this->db->get('user');
        foreach ($resultado = $userdata->result() as $row) {
            $project_id = $row->user_id;
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

    public function update_role($project_id, $user_id, $researcher)
    {
        $this->db->where('user_id', $user_id);
        $this->db->where('project_id', $project_id);
        $this->db->from('project_user');
        return $this->db->update('user', $researcher);
    }

    function deleteProjectModel($id)
    {
        $this->db->where('project_id', $id);

        if ($this->db->delete('project')) {
            $this->session->set_flashdata('success', 'Project Deleted!');
            redirect("projects/{$_SESSION['workspace_id']}");
        } else {
            $this->session->set_flashdata('fail', 'Problem to delete project!');
        }
    }

    public function getAllKnowledgeArea()
    {
        $data = $this->db->get('knowledge_area');
        return $data->result();
    }

    public function getProjectsRelatedToUser($user_id, $workspace_id)
    {

        // Um join entre project_user e project para pegar projetos em que um usuário está vinculado
        // E a filtragem pelo workspace do projeto
        // $query = $this->db->select('*')
        $query = $this->db->select('user.name, project.title, project.project_id, project_user.access_level ')
            ->from('project_user')
            ->join('project', 'project_user.project_id = project.project_id')
            ->join('user', 'project.created_by = user.user_id')
            ->where('project_user.user_id', $user_id)
            ->where('project.workspace_id', $workspace_id)
            ->get()->result();

        return $query;
    }

    public function verifyProjectAccess($workspace_id, $user_id) {
        return $this->db->select("access_level")
            ->from("workspace_user")
            ->where("workspace_id", $workspace_id)
            ->where("user_id", $user_id)
            ->get()->result();
    }

    // Função responsável por verificar se um usuário tem acesso a um determinado projeto
    public function userInProject($user_id, $project_id)
    {
        $query = $this->db->select('access_level')
            ->from('project_user')
            ->where('user_id', $user_id)
            ->where('project_id', $project_id)
            ->get()->result();

        return empty($query);
    }
    
    public function userInvitedNotInWorkspace($user_id, $workspace_id){
        $query = $this->db->select('access_level')
            ->from('workspace_user')
            ->where('user_id', $user_id)
            ->where('workspace_id', $workspace_id)
            ->get()->result();
    
        return empty($query);
    }

    public function isProjectOwner($project_id, $user_id)
    {
        $result = $this->db->select('created_by')
            ->where('project_id', $project_id)
            ->from($this->table)
            ->limit(1)
            ->get()
            ->row_array();

       return strcmp($result['created_by'], $user_id) === 0;
    }
}


/* End of file */
