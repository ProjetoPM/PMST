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
		$this->load->helper('log_activity');

		$this->lang->load('btn','english');
        // $this->lang->load('btn','portuguese-brazilian');
        $this->lang->load('procurement_statement_of_work','english');
        // $this->lang->load('risk','portuguese-brazilian');

	}

	public function list($project_id){
		$dado['project_id'] = $project_id;

		$dado['procurement_statement_of_work'] = $this->Procurement_statement_of_work_model->getAll($project_id);
		$this->load->view('frame/header_view'); 
		$this->load->view('frame/topbar');
		$this->load->view('frame/sidebar_nav_view');
		$this->load->view('project/procurement/procurement_statement_of_work/list',$dado);
	}

	public function new($project_id){
		$idusuario = $_SESSION['user_id'];
    $this->db->where('user_id', $idusuario);
    $this->db->where('project_id', $project_id);
    $project['dados'] = $this->db->get('project_user')-> result();

    if (count($project['dados']) > 0) {
    $dado['project_id'] = $project_id;
		$this->load->view('frame/header_view'); 
		$this->load->view('frame/topbar');
		$this->load->view('frame/sidebar_nav_view');
		$this->load->view('project/procurement/procurement_statement_of_work/new',$dado);

    } else {
        redirect(base_url());
    }
	}

	public function edit($project_id) {
		$query['procurement_statement_of_work'] = $this->Procurement_statement_of_work_model->get($project_id);

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
			insertLogActivity('insert', 'procurement statement of the work');
			redirect('procurement/procurement-statement-of-work/list/' . $procurement_statement_of_work['project_id']);
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

		$query = $this->Procurement_statement_of_work_model->update($procurement_statement_of_work,$project_id);

		if ($query) {
			insertLogActivity('update', 'procurement statement of the work');
			redirect('procurement/procurement-statement-of-work/list/' . $procurement_statement_of_work['project_id']);
		}
	}

	public function delete($id){

		$project_id['project_id'] = $this->input->post('project_id');
		//$project_id['project_id'] = $project_id;
		$query = $this->Procurement_statement_of_work_model->delete($id);
		if($query){
			insertLogActivity('delete', 'procurement statement of the work');
            redirect('procurement/procurement-statement-of-work/list/' . $_SESSION['project_id']);
		}
	}

}
