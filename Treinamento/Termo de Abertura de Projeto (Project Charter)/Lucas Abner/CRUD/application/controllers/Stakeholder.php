<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Stakeholder extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('stakeholder_model'); //Tem que dar load nas models que tu vai usar
	}

	public function index()
	{
		$dados['stakeholder'] = $this->stakeholder_model->pegarStakeholders();
		$this->load->view('project', $dados);
	}

	//Carrega a pagina para cadastro de projeto
	public function addstakeholder() {
		$this->load->view('addstakeholder_page');
	}

	//Recebe os dados do formulário da page addstakeholder_page
	//Cria um array chamada $dados com todos os dados recebidos
	//Envia a array para a model
	public function createStakeholder() {
		$dados['name'] = $this->input->post('teste');
		$dados['roles_responsabilies'] = $this->input->post('stakeRoles');
		$dados['status'] = $this->input->post('stakeStatus');

		//var_dump($dados); //Descmenta essa linha se quer ver tudo que vem da view pra variavel $dados
		//Salva o resultado na variável $resultado (pode ser true ou false)
		$resultado = $this->stakeholder_model->inserirStakeholder($dados);

		//Se resultado for true volta para a pagina principal
		if($resultado){
			header('location:'.base_url().$this->index());
		}
	}

	public function deleteStakeholder($id=null){
		$resultado = $this->stakeholder_model->deletarStakeholder($id);

		if($resultado){
			header('location:'.base_url().$this->index());
		}
	}

	public function editStakeholder($id){
		$dados['stakeholder'] = $this->stakeholder_model->getstakeholder($id);
		$this->load->view('editformstakeholder.php', $dados);
	}

	public function updateStakeholder($id){
		$stakeholder['name'] = $this->input->post('name');
		$stakeholder['roles_responsabilies'] = $this->input->post('stakeRoles');
		$stakeholder['status'] = $this->input->post('stakeStatus');

		$query = $this->stakeholder_model->updateStakeholder($stakeholder, $id);

		if($query){
			header('location:'.base_url().$this->index());
		}
	}
}
