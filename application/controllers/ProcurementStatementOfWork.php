<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ProcurementStatementOfWork extends CI_Controller {

	function __construct(){
		parent::__construct();
		if (!$this->session->userdata('logged_in')) {
			redirect(base_url());
		}
		$this->load->helper('url');
		$this->load->model('Procurement_statement_of_work_model');


		$this->lang->load('btn','english');
        // $this->lang->load('btn','portuguese-brazilian');
        $this->lang->load('procurement_statement_of_work','english');
        // $this->lang->load('risk','portuguese-brazilian');

	}

	public function listp($project_id){
		$dado['project_id'] = $project_id;

		$dado['procurement_statement_of_work'] = $this->Procurement_statement_of_work_model->getAllProcurementOfWork($project_id);
		$this->load->view('frame/header_view');
		$this->load->view('frame/sidebar_nav_view');
		$this->load->view('project/procurement/procurement_statement_of_work/list',$dado);
	}

	public function addnew($project_id){
		$idusuario = $_SESSION['user_id'];
    $this->db->where('user_id', $idusuario);
    $this->db->where('project_id', $project_id);
    $project['dados'] = $this->db->get('project_user')-> result();

    if (count($project['dados']) > 0) {
    $dado['project_id'] = $project_id;
		$this->load->view('frame/header_view');
		$this->load->view('frame/sidebar_nav_view');
		$this->load->view('project/procurement/procurement_statement_of_work/new',$dado);

    } else {
        redirect(base_url());
    }
	}

	public function edit($project_id) {
		$query['procurement_statement_of_work'] = $this->Procurement_statement_of_work_model->getProcurementOfWork($project_id);

		$this->load->view('frame/header_view.php');
		$this->load->view('frame/sidebar_nav_view.php');
		$this->load->view('project/procurement/procurement_statement_of_work/edit', $query);
	}

	public function insert($project_id){
		$procurement_statement_of_work['description'] = $this->input->post('description');
		$procurement_statement_of_work['types'] = $this->input->post('types');
		$procurement_statement_of_work['restrictions'] = $this->input->post('restrictions');
		$procurement_statement_of_work['premises'] = $this->input->post('premises');
		$procurement_statement_of_work['schedule'] = $this->input->post('schedule');
		$procurement_statement_of_work['informations'] = $this->input->post('informations');
		$procurement_statement_of_work['procurement_management'] = $this->input->post('procurement_management');
		$procurement_statement_of_work['selection_criterias'] = $this->input->post('selection_criterias');
		$procurement_statement_of_work['project_id'] = $project_id;

		$query = $this->Procurement_statement_of_work_model->insert($procurement_statement_of_work);

		if($query){
			$this->load->view('frame/header_view');
			$this->load->view('frame/sidebar_nav_view');
			redirect('ProcurementStatementOfWork/listp/' . $procurement_statement_of_work['project_id']);
		}
	}

	public function update($project_id) {

		$procurement_statement_of_work['description'] = $this->input->post('description');
		$procurement_statement_of_work['types'] = $this->input->post('types');
		$procurement_statement_of_work['restrictions'] = $this->input->post('restrictions');
		$procurement_statement_of_work['premises'] = $this->input->post('premises');
		$procurement_statement_of_work['schedule'] = $this->input->post('schedule');
		$procurement_statement_of_work['informations'] = $this->input->post('informations');
		$procurement_statement_of_work['procurement_management'] = $this->input->post('procurement_management');
		$procurement_statement_of_work['selection_criterias'] = $this->input->post('selection_criterias');
		$procurement_statement_of_work['project_id'] = $this->input->post('project_id');

		$query = $this->Procurement_statement_of_work_model->updateProcurementOfWork($procurement_statement_of_work,$project_id);

		if ($query) {
			redirect('ProcurementStatementOfWork/listp/' . $procurement_statement_of_work['project_id']);
		}
	}

	public function delete($project_id){

		$project_id['project_id'] = $this->input->post('project_id');
		//$project_id['project_id'] = $project_id;
		$query = $this->Procurement_statement_of_work_model->deleteProcurementOfWork($project_id);
		if($query){
			$this->load->view('frame/header_view');
            $this->load->view('frame/sidebar_nav_view');
            redirect(base_url() . 'ProcurementStatementOfWork/listp/' . $project_id['project_id']);
		}
	}

}
?>
