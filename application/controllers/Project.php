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

		$this->parser->parse('project/my_projects', $dataproject);
		//		$this->load->view('project', $data);
	}

	public function __construct()
	{
		parent::__construct();
		if (!$this->session->userdata('logged_in')) {
			redirect(base_url());
		}
		
		$array = array();
		loadLangs($array);
		
		$this->load->helper('url');
		$this->load->helper('log_activity');

		$this->load->model('User_Model');
		$this->load->model('Project_model');
		$this->load->model('Workspace_model');
		$this->load->model('Project_access_level_model');

	}
	
	private function ajax_checking()
	{
		if (!$this->input->is_ajax_request()) {
			redirect(base_url());
		}
	}
	
	public function project_form()
	{
		
		$_SESSION['access_level'] = null;
		$_SESSION['project_id'] = null;
		$data = array(
			'formTitle' => 'New Project',
			'title' => 'New Project'
		);
		
		if(strcmp($_SESSION['language'],"US") == 0){
			$this->lang->load('new-project', 'english');
        }else{
			$this->lang->load('new-project','portuguese-brazilian');
        }
		
		loadViews('project/new_project', $data);
	}
	
	//busca todos projetos do usuario pelo seu id
	//salva na variavel dataproject
	//passa todos esses dados para a view my_projects
	
	
	public function listProjects($workspace_id)
	{
			$_SESSION['project_name'] = null;
			$_SESSION['access_level'] = null;
			$_SESSION['project_id'] = null;
			$_SESSION['workspace_id'] = $workspace_id;
	
			$data['projects'] = $this->Project_model->getProjectsRelatedToUser($_SESSION['user_id'], $workspace_id);
			$data['workspace_title'] = $this->Workspace_model->getWorkspaceName($workspace_id);
            $data['workspace_verification'] = $this->Project_model->verifyProjectAccess($workspace_id, $_SESSION['user_id']);

            /**
             * Verifica se o usuário tem acesso ao workspace.
             */
            if (empty($data['workspace_verification'])) {
                $this->session->set_flashdata('error', 'You do not have access to this workspace or an error has occurred.');
                redirect(base_url("workspace/list"));
                return;
            }
			$this->load->view('frame/header_view');
			$this->load->view('frame/topbar');
			$this->load->view('frame/sidebar_nav_view');
			$this->parser->parse('project/my_projects', $data);
	}
	
	function add_project($workspace_id)
	{
		$_SESSION['access_level'] = null;
		$_SESSION['project_id'] = null;
		
		$project['title'] = $this->input->post('title');
		$project['description'] = $this->input->post('description');
		$project['objectives'] = $this->input->post('objectives');
		$project['created_by'] = $this->session->userdata('user_id');
		$project['workspace_id'] = $workspace_id;

		$insert = $this->Project_model->insert_project($project);
		if ($insert) {
			$this->session->set_flashdata('success', 'Project ' . $project['title'] . ' has been successfully created!');
			insertLogActivity('insert', 'project');
			redirect("projects/{$project['workspace_id']}");
		} else {
			$this->session->set_flashdata('fail', 'Problem to insert project!');
			//echo "Problema ao deletar projeto";
		}
	}

	//<!-- Metodo deletar projeto, passa id projeto pra model --> 
	public function delete($project_id)
	{
		$this->Project_model->deleteProjectModel($project_id);
	}
	//<!-- Fim do metodo deletar --> 

	//<!-- Begin Update method --> 
	public function update($project_id)
	{

		$_SESSION['access_level'] = null;
		$_SESSION['project_id'] = null;
		 $this->db->where('project_id', $project_id);
		$dataproject['project'] = $this->db->get('project')->result();

		$this->load->view('frame/header_view');
		$this->load->view('frame/topbar');
		$this->load->view('frame/sidebar_nav_view');
		$this->load->view('project/edit_project', $dataproject);
	}
	//<!-- End Update method --> 

	public function saveUpdate()
	{
		$postData = $this->input->post();

		/**
		 * Verifica se os dados estão devidamente preenchidos.
		 * 
		 * Estes podem ser alterados via client-side. Evita que mesmo retirando
		 * o atributo 'required', não possa ser enviado com campos vazios.
		 */
		foreach ($postData as $key => $value) {
			if (empty($value)) {
				$this->session->set_flashdata('fail', 'An error has occurred while updating.');
				redirect("projects/{$_SESSION['workspace_id']}");
			}
		}
		$this->db->where('project_id', $postData['project_id']);

		if ($this->db->update('project', $postData)) {
			insertLogActivity('update', 'project');
			$this->session->set_flashdata('success', "Project {$postData['title']} has been updated!");
		}
		$_SESSION['project_id'] = null;
		redirect("projects/{$_SESSION['workspace_id']}");            
	}

	//chama a pagina de adicionar pesquisador ao projeto
	//passando id como parametro
	public function add_researcher_page($project_id = null)
	{

		$_SESSION['access_level'] = null;
		$_SESSION['project_id'] = null;
		$this->db->where('project_id', $project_id);
		$dataproject['project'] = $this->db->get('project')->result();

		$this->load->view('frame/header_view');
		$this->load->view('frame/topbar');
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

		if ($this->Project_model->getResearcher($project_id, $user_id)) {
			$this->session->set_flashdata('error', 'User update!');
			$this->Project_model->update_role($project_id, $user_id, $data);
			redirect('projects/' .$project_id);
		}

		//metodo que passa as infos para serem add no banco
		$query= $this->Project_model->insertResearcher($data);
		 if($query){
			insertLogActivity('insert', 'project members');
			$this->session->set_flashdata('error', 'User added.');
		}else{
			$this->session->set_flashdata('error', 'User already a member.');
		}
		redirect('projects/' . $project_id);
	}

	public function edit_researcher_page($user_id)
	{
		$data['user_project'] = $this->Project_model->getResearcher($_SESSION['project_id'], $user_id);
		$data['user'] = $this->User_Model->getUserById($user_id);

		$language = getIndexOfLanguage();
		$data['access_levels'] = $this->Project_access_level_model->getAll($language);
		var_dump($data['access_levels']);


		$this->db->where('project_id', $_SESSION['project_id']);
		$data['project'] = $this->db->get('project')->result();
		$this->load->view('frame/header_view');
		$this->load->view('frame/topbar');
		$this->load->view('frame/sidebar_nav_view');
		$this->load->view('project/edit_researcher', $data);
	}
	
	//metodo para atualizar pesquisador
	public function update_researcher($user_id)
	{	
		$researcher['access_level'] = $this->input->post('role');
		
		$data = $this->input->post();
		
		$project_id = $this->input->post('project_id');

		$access_level = $this->input->post('access_level');
		
		$query = $this->Project_model->update_role($data['project_id'], $user_id, $researcher);
		if ($this->Project_model->getResearcher($project_id, $user_id)) {
			$this->session->set_flashdata('success', 'User Role changed!');
			insertLogActivity('update', 'project');
		}
		redirect('user/list/' . $_SESSION['project_id']);
	}


	//retorna id do usuario pelo seu email
	public function retornaIdUserByEmail($email)
	{

		//echo $email;
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
	
	//carrega a tela principal do projeto
	public function dashboard_c()
	{
		$_SESSION['project_id'] = null;
		$this->load->view('frame/header_view');
		$this->load->view('frame/topbar');
		$this->load->view('frame/sidebar_nav_view');
		$this->load->view('project/dashboard'); //joga os resultados la pra view
	}



	//busca o nome do dono do projeto pelo seu id atrelado no projeto
	public function returnUserNameById($project_id = null)
	{

		$this->db->where('user_id', $project_id);
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
	public function getTitleById($project_id = null){
    $this->db->where('title', $project_id);
    $data['title'] = $this->db->get('title')->result();

    foreach ($data['title']as $key => $value){
	$name = $value->name;
    }
    return $name;
	}

	//retorna os projetos que o usuario foi convidado
	public function returnInvitedProject()
	{

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
	public function noImportedStudies($idProjeto = null, $idDatabase = null)
	{
		//$idprojeto = 15;

		$this->db->where('database_id', $idProjeto);
		$this->db->where('project_id', $idDatabase);
		$teste = $this->db->get('paper')->num_rows();
		echo $teste;
	}

	//implementação futura - não terminado
	public function validaUsuario($project_id = null)
	{
		$idusuario = $_SESSION['user_id']; //validar acesso do usuario
		$this->db->where('user_id', $idusuario);
		$this->db->where('project_id', $project_id);
		$project['dados'] = $this->db->get('project_user')->result();

		if (count($project['dados']) > 0) {
			echo "true";
		} else {
			echo "false";
		}
	}

	//recebe id do projeto como parametro, faz a busca de todos os dados do mesmo
	//pagina inicial do projeto
	public function initial($project_id = null)
	{
		
		$_SESSION['access_level'] = $this->Project_model->getRole($project_id,$_SESSION['user_id']);
		$_SESSION['project_id'] = $project_id;

		if ($project_id === null) 
			redirect(base_url());
		
		//validar acesso do usuario
		$idusuario = $_SESSION['user_id'];
		$this->db->where('user_id', $idusuario);
		$this->db->where('project_id', $project_id);
		$project['dados'] = $this->db->get('project_user')->result();

		if (count($project['dados']) > 0) {
			$this->db->where('project_id', $project_id);
			$dataproject['project'] = $this->db->get('project')->result();
			$_SESSION['project_name'] = $dataproject['project'][0]->title;
			

			$this->db->where('project_id', $project_id);
			$this->db->join('user', 'user.user_id = project_user.user_id');
			$dataproject['members'] = $this->db->get('project_user')->result();
   

			$this->load->view('frame/header_view');
			$this->load->view('frame/topbar');
			$this->load->view('frame/sidebar_nav_view');
			//$this->load->view('project/top-menu', $dataproject);
			$this->load->view('project/project_page', $dataproject);
		} else {
			redirect(base_url()); //Se ele não participa volta pro dashboard
		}
	}

	public function cost($project_id = null)
	{

		//validar acesso do usuario
		$idusuario = $_SESSION['user_id'];
		$this->db->where('user_id', $idusuario);
		$this->db->where('project_id', $project_id);
		$project['dados'] = $this->db->get('project_user')->result();

		if (count($project['dados']) > 0) {
			$this->db->where('project_id', $project_id);
			$dataproject['project'] = $this->db->get('project')->result();

			$this->db->where('project_id', $project_id);
			$this->db->join('user', 'user.user_id = project_user.user_id');
			$dataproject['members'] = $this->db->get('project_user')->result();

			$this->load->view('frame/header_view');
			$this->load->view('frame/topbar');
			$this->load->view('frame/sidebar_nav_view');

			$this->load->view('project/cost', $dataproject);
		} else {
			redirect(base_url()); //Se ele não participa volta pro dashboard
		}
	}
}
