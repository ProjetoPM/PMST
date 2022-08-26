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

		if(strcmp($_SESSION['language'],"US") == 0){
            $this->lang->load('btn', 'english');
			$this->lang->load('project-page', 'english');
        }else{
            $this->lang->load('btn', 'portuguese-brazilian');
			$this->lang->load('project-page', 'portuguese-brazilian');
        }

		$this->load->helper('url');
		$this->load->helper('log_activity');
		$this->load->model('project_model');
		
		// if(strcmp($_SESSION['language'],"US") == 0){
        //     $this->lang->load('btn', 'english');
        // }else{
        //     $this->lang->load('btn', 'portuguese-brazilian');
        // }
	}

	private function ajax_checking()
	{
		if (!$this->input->is_ajax_request()) {
			redirect(base_url());
		}
	}

	public function project_form()
	{

		if(strcmp($_SESSION['language'],"US") == 0){
            $this->lang->load('btn', 'english');
			$this->lang->load('project-page', 'english');
        }else{
            $this->lang->load('btn', 'portuguese-brazilian');
			$this->lang->load('project-page', 'portuguese-brazilian');
        }

		$_SESSION['access_level'] = null;
		$_SESSION['project_id'] = null;
		$data = array(
			'formTitle' => 'New Project',
			'title' => 'New Project'
		);

		if(strcmp($_SESSION['language'],"US") == 0){
            $this->lang->load('btn', 'english');
			$this->lang->load('new-project', 'english');
        }else{
            $this->lang->load('btn', 'portuguese-brazilian');
			$this->lang->load('new-project','portuguese-brazilian');
        }


		// $this->load->helper('url');
		// $this->load->view('frame/header_view');
		// $this->load->view('frame/topbar');
		// $this->load->view('frame/topbar');
		// $this->load->view('frame/sidebar_nav_view');
		// $this->load->view('project/new_project', $data);
		loadViews('project/new_project', $data);
	}


	function add_project()
	{

		//$this->ajax_checking();
		$_SESSION['access_level'] = null;
		$_SESSION['project_id'] = null;
		$postData = $this->input->post();
		$status = $this->project_model->insert_project($postData);
		if ($status == 1) {
			$this->session->set_flashdata('success', 'Project ' . $postData['title'] . ' has been successfully created!');

			insertLogActivity('insert', 'project');

			redirect('project/show_projects');
		} else {
			$this->session->set_flashdata('failinsertproject', 'Problem to insert project!');
			//echo "Problema ao deletar projeto";
		}
	}

	//<!-- Metodo deletar projeto, passa id projeto pra model --> 
	public function delete($project_id)
	{
		$this->project_model->deleteProjectModel($project_id);
	}
	//<!-- Fim do metodo deletar --> 

	//<!-- Begin Update method --> 
	public function update($project_id)
	{
		if(strcmp($_SESSION['language'],"US") == 0){
			$this->lang->load('project-page', 'english');
			$this->lang->load('btn', 'english');
		}else{
			$this->lang->load('project-page', 'portuguese-brazilian');
			$this->lang->load('btn', 'portuguese-brazilian');
		}
		
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
		//$this->ajax_checking();

		$postData = $this->input->post();

		$this->db->where('project_id', $postData['project_id']);
		// $_SESSION['project_id'] = $postData['project_id'];

		if ($this->db->update('project', $postData)) {

			insertLogActivity('update', 'project');

			$this->session->set_flashdata('success', 'Project ' . $postData['title'] . ' has been updated created!');
		}
		$_SESSION['project_id'] = null;
		redirect('projects');
		//echo json_encode($insert);            
	}

	//chama a pagina de adicionar pesquisador ao projeto
	//passando id como parametro
	public function add_researcher_page($project_id = null)
	{
		if(strcmp($_SESSION['language'],"US") == 0){
		$this->lang->load('btn', 'english');
		$this->lang->load('project-page', 'english');
	}else{
		$this->lang->load('btn', 'portuguese-brazilian');
		$this->lang->load('project-page', 'portuguese-brazilian');
	}
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

		if ($this->project_model->getResearcher($project_id, $user_id)) {
			$this->session->set_flashdata('error2', 'User update!');
			$this->project_model->updateResearcher($project_id, $user_id, $data);
			redirect('projects/');
		}

		//metodo que passa as infos para serem add no banco
		$query= $this->project_model->insertResearcher($data);
		 if($query){
			insertLogActivity('insert', 'project members');
			$this->session->set_flashdata('error2', 'User added.');
        // $error = $this->db->error();
        // if ($error['code'] == 1062) {
        //     $this->session->set_flashdata('error3', 'User already a member.');
        //     redirect('projects/');
		}else{
			$this->session->set_flashdata('error3', 'User already a member.');
		}

		redirect('projects/');
	}

	public function edit_researcher_page()
	{
		
		$this->db->where('project_id', $_SESSION['project_id']);
		$dataproject['project'] = $this->db->get('project')->result();
		
		$this->load->view('frame/header_view');
		$this->load->view('frame/topbar');
		$this->load->view('frame/sidebar_nav_view');
		$this->load->view('project/edit_researcher', $dataproject);
	}
	
	//metodo para adicionar pesquisador a pesquisa
	public function update_researcher()
	{
		// if ($_SESSION['acess_level'] != 3) {
		// 	$this->session->set_flashdata('error', 'You are not allowed to update user role');
		// 	redirect("user/list/" . $_SESSION['project_id']);
		// 	redirect("integration/project-charter/edit/" . $_SESSION['project_id']);
		// }
		
		$researcher['role'] = $this->input->post('role');
		
		$data = $this->input->post();
		$project_id   = $data['project_id'];
		$access_level = $data['access_level'];
		$user_id      = $this->retornaIdUserByEmail($data['email']);
		
		$query = $this->Project_model->update_role($_SESSION['project_id'], $_SESSION['user_id'], $researcher);
		if ($this->project_model->getResearcher($project_id, $user_id)) {
			$this->session->set_flashdata('success', 'Benefits Management Plan has been successfully changed!');
			insertLogActivity('update', 'benefits management plan');
		}
		redirect('user/list' . $_SESSION['project_id']);
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

	//busca todos projetos do usuario pelo seu id
	//salva na variavel dataproject
	//passa todos esses dados para a view my_projects
	public function show_projects()
	{
		$_SESSION['project_name'] = null;
		$_SESSION['access_level'] = null;
		$_SESSION['project_id'] = null;

		


		$dataproject['project'] = $this->db->get_where('project', array(
			'created_by' => $this->session->userdata('user_id')
		))->result();

		//busca projetos que foi convidado
		$iduser = $this->session->userdata('user_id');
		$this->db->where('user_id', $iduser);
		$this->db->join('project', 'project_user.project_id = project.project_id');

		//array CONVIDADO é um JOIN da PROJECT_USER + PROJECT
		$dataproject['convidado'] = $this->db->get('project_user')->result();

        
		$this->load->view('frame/header_view');
		$this->load->view('frame/topbar');
		$this->load->view('frame/sidebar_nav_view');
		$this->parser->parse('project/my_projects', $dataproject);

		// if(strcmp($_SESSION['language'],"US") == 0){
        //     $this->lang->load('btn', 'english');
        // }else{
        //     $this->lang->load('btn', 'portuguese-brazilian');
        // }
		// $this->load->view('construction_services/chat_template', $dataproject);

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
		$_SESSION['access_level'] = $this->project_model->getRole($project_id,$_SESSION['user_id']);
		$_SESSION['project_id'] = $project_id;
		if ($project_id == null) {
			redirect(base_url());
		}
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

			if(strcmp($_SESSION['language'],"US") == 0){
				$this->lang->load('project-page', 'english');
				$this->lang->load('btn', 'english');
			}else{
				$this->lang->load('project-page', 'portuguese-brazilian');
				$this->lang->load('btn', 'portuguese-brazilian');
			}

			
			// $this->lang->load('project-page','portuguese-brazilian');   

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
