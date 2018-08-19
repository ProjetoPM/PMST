<?php
if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Project extends CI_Controller
{
    
    function index()
    {
        
        $this->db->select('*');
        $dataproject['project'] = $this->db->get('project')->result();
        
        $this->load->view('project/my_projects', $dataproject);
        $this->load->view('project', $data);
    }
    
    public function __Construct()
    {
        parent::__Construct();
        if (!$this->session->userdata('logged_in')) {
            redirect(base_url());
        }
        
        $this->load->model('project_model');
    }
    
    private function ajax_checking()
    {
        if (!$this->input->is_ajax_request()) {
            redirect(base_url());
        }
    }
    
    public function project_form()
    {
        
        $data = array(
            'formTitle' => 'New Project',
            'title' => 'New Project'
        );
        
        $this->load->view('frame/header_view');
        $this->load->view('frame/sidebar_nav_view');
        $this->load->view('project/new_project', $data);
        
    }
    
    
    function add_project()
    {
        //$this->ajax_checking();
        
        $postData = $this->input->post();
        $insert   = $this->project_model->insert_project($postData);
        if ($insert['status'] == 'success') {
            $this->session->set_flashdata('success', 'Project ' . $postData['title'] . ' has been successfully created!');
        }
        redirect('projects');
        echo json_encode($insert);
    }
    
    //<!-- Metodo deletar projeto, passa id projeto pra model --> 
    public function delete($id = null)
    {
        $insert = $this->project_model->deleteProjectModel($id);
        if ($insert['status'] == 'success') {
            $this->session->set_flashdata('success', 'Project Deleted!');
        } else {
            echo json_encode($insert);
        }
    }
    //<!-- Fim do metodo deletar --> 
    
    //<!-- Begin Update method --> 
    public function update($id = null)
    {
        
        $this->db->where('project_id', $id);
        $dataproject['project'] = $this->db->get('project')->result();
        
        $this->load->view('frame/header_view');
        $this->load->view('frame/sidebar_nav_view');
        $this->load->view('project/edit_project', $dataproject);
        
        
    }
    //<!-- End Update method --> 
    
    public function saveUpdate()
    {
        //$this->ajax_checking();
        
        $postData = $this->input->post();
        
        $this->db->where('project_id', $postData['project_id']);
        
        if ($this->db->update('project', $postData)) {
            $this->session->set_flashdata('success', 'Project ' . $postData['title'] . ' has been updated created!');
        }
        redirect('projects');
        //echo json_encode($insert);            
    }
    
    //chama a pagina de adicionar pesquisador ao projeto
    //passando id como parametro
    public function add_researcher_page($id = null)
    {
        $this->db->where('project_id', $id);
        $dataproject['project'] = $this->db->get('project')->result();
        
        $this->load->view('frame/header_view');
        $this->load->view('frame/sidebar_nav_view');
        $this->load->view('project/add_researcher', $dataproject);
    }
    
    //metodo para adicionar pesquisador a pesquisa
    public function add_researcher()
    {
        $dados = $this->input->post();
        
        $project_id   = $dados['project_id'];
        $access_level = $dados['access_level'];
        $user_id      = $this->retornaIdUserByEmail($dados['email']);
        
        //verifica se usuario existe
        if ($user_id == null) {
            $this->session->set_flashdata('error', 'This e-mail doesn`t exist in our database!');
            redirect('researcher/' . $project_id);
        }
        
        //verifica se usuario quer adicionar ele mesmo
        if ($dados['email'] == $_SESSION['email']) {
            $this->session->set_flashdata('error', 'You can not add yourself!');
            redirect('researcher/' . $project_id);
        }
        
        $data = array(
            'project_id' => $project_id,
            'user_id' => $user_id,
            'access_level' => $access_level
        );
        
        //metodo que passa as infos para serem add no banco
        $this->project_model->insertResearcher($data);
        
    }
    
    
    //retorna id do usuario pelo seu email
    public function retornaIdUserByEmail($email)
    {
        
        //echo $email;
        $this->db->where('email', $email);
        $userdata = $this->db->get('user');
        foreach ($resultado = $userdata->result() as $row) {
            $id   = $row->user_id;
            $name = $row->name;
        }
        $retorna = array(
            '$user_id' => $id
        );
        return $retorna['$user_id'];
    }
    
    //carrega a tela principal do projeto
    public function dashboard_c()
    {
        $this->load->view('frame/header_view');
        $this->load->view('frame/sidebar_nav_view');
        $this->load->view('project/dashboard'); //joga os resultados la pra view
    }
    
    //busca todos projetos do usuario pelo seu id
    //salva na variavel dataproject
    //passa todos esses dados para a view my_projects
    public function show_projects()
    {
        
        $dataproject['project'] = $this->db->get_where('project', array(
            'created_by' => $this->session->userdata('user_id')
        ))->result();
        
        //busca projetos que foi convidado
        $iduser = $this->session->userdata('user_id');
        $this->db->where('user_id', $iduser);
        $this->db->join('project', 'project_user.project_id = project.project_id');
        
        //array CONVIDADO é um JOIN da PROJECT_USER + PROJECT
        $dataproject['convidado'] = $this->db->get('project_user')->result();
        
        /*
        foreach ($dataproject['convidado'] as $key => $value) {
        $ids = array($value); 
        }
        
        $dataproject['teste'] = $ids;
        //print_r($ids);
        */
        
        $this->load->view('frame/header_view');
        $this->load->view('frame/sidebar_nav_view');
        $this->load->view('project/my_projects', $dataproject);
        
    }
    
    
    //busca o nome do dono do projeto pelo seu id atrelado no projeto
    public function returnUserNameById($id = null)  {
        
        $this->db->where('user_id', $id);
        //$this->db->join('user', 'user.user_id = project_user.user_id');
        $data['user'] = $this->db->get('user')->result();
        
        foreach ($data['user'] as $key => $value) {
            $name = $value->name;
        }
        
        //if ($name == null) {
        //  redirect(base_url());
        //}
        return $name;
    }
    
    //retorna os projetos que o usuario foi convidado
    public function returnInvitedProject()  {
        
        $iduser = $this->session->userdata('user_id');
        
        $this->db->where('user_id', $iduser);
        $data['dados'] = $this->db->get('project_user')->result();
        //print_r($data);
        
        foreach ($data['dados'] as $key => $value) {
            $project_id[] = $value->project_id;
        }
        //print_r($project_id);          
    }

    //verifica quantos registros determinada database possui
    //não terminei a implementação, atualmente isso é feito no método studySearch
    public function noImportedStudies($idProjeto=null, $idDatabase=null)    {
        //$idprojeto = 15;

        $this->db->where('database_id', $idProjeto);
        $this->db->where('project_id', $idDatabase);
        $teste = $this->db->get('paper')->num_rows();
        echo $teste;
    }

    //implementação futura - não terminado
    public function validaUsuario($id=null) {
        $idusuario = $_SESSION['user_id']; //validar acesso do usuario
        $this->db->where('user_id', $idusuario);
        $this->db->where('project_id', $id);
        $project['dados'] = $this->db->get('project_user')->result();

        if (count($project['dados']) > 0) {
            echo "true";
        } else {
            echo "false";
        }
    }
    
    //recebe id do projeto como parametro, faz a busca de todos os dados do mesmo
    //pagina inicial do projeto
    public function initial($id=null) {
        
        //validar acesso do usuario
        $idusuario = $_SESSION['user_id'];
        $this->db->where('user_id', $idusuario);
        $this->db->where('project_id', $id);
        $project['dados'] = $this->db->get('project_user')->result();
        
        if (count($project['dados']) > 0) {
            $this->db->where('project_id', $id);
            $dataproject['project'] = $this->db->get('project')->result();
            
            $this->db->where('project_id', $id);
            $this->db->join('user', 'user.user_id = project_user.user_id');
            $dataproject['members'] = $this->db->get('project_user')->result();
            
            $this->load->view('frame/header_view');
            $this->load->view('frame/sidebar_nav_view');
            $this->load->view('project/top-menu', $dataproject);
            $this->load->view('project/project_page', $dataproject);
            
        } else {
           redirect(base_url()); //Se ele não participa volta pro dashboard
        }
    }

        public function cost($id=null) {
        
        //validar acesso do usuario
        $idusuario = $_SESSION['user_id'];
        $this->db->where('user_id', $idusuario);
        $this->db->where('project_id', $id);
        $project['dados'] = $this->db->get('project_user')->result();
        
        if (count($project['dados']) > 0) {
            $this->db->where('project_id', $id);
            $dataproject['project'] = $this->db->get('project')->result();
            
            $this->db->where('project_id', $id);
            $this->db->join('user', 'user.user_id = project_user.user_id');
            $dataproject['members'] = $this->db->get('project_user')->result();
            
            $this->load->view('frame/header_view');
            $this->load->view('frame/sidebar_nav_view');
            
            $this->load->view('project/cost', $dataproject);
            
        } else {
           redirect(base_url()); //Se ele não participa volta pro dashboard
        }

    }

}
?>