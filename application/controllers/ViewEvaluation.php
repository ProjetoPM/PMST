<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ViewEvaluation extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		if (!$this->session->userdata('logged_in')) {
			redirect(base_url());
		}
		$this->load->model('view_model');
		$this->load->model('log_model');
		$this->load->helper('log_activity');
		$this->load->model('ViewEvaluation_model');
		$this->load->model('View_model');

		$this->lang->load('btn', 'english');
	}


	public function insert()
	{
		$view_id = $this->View_model->GetIDByName($this->input->post('view'));
		$view_evaluation = $this->ViewEvaluation_model->GetByProjectView($view_id, $_SESSION['project_id']);
		$view_evaluation_id = null;
		if ($view_evaluation == null) {
			$view_evaluation['view_id'] = $view_id;
			$view_evaluation['project_id'] = $_SESSION['project_id'];

			$view_evaluation_id = $this->ViewEvaluation_model->insert($view_evaluation);
		} else {
			$view_evaluation_id = $view_evaluation['view_evaluation_id'];
		}
		$evaluation['user_id'] = $_SESSION['user_id'];
		$evaluation['points'] = $this->input->post('points');
		$evaluation['view_evaluation_id'] = $view_evaluation_id;

		$professor_ev = $this->ViewEvaluation_model->getProfessorEvaluation($evaluation['user_id'], $view_evaluation_id);
		if($professor_ev != null){
			$this->ViewEvaluation_model->updateProfessorEvaluation($evaluation, $professor_ev['professor_view_evaluation_id']);
		}else{
			$this->ViewEvaluation_model->insertProfessorEvaluation($evaluation);
		}
		


		$average = 0;
		$numberAverages = 0;

		foreach ($this->ViewEvaluation_model->getAllProfessorEvaluation($view_evaluation_id) as $pe) {
			$average = $average + $pe->points;
			$numberAverages = $numberAverages + 1;
		}
		
		if ($average != 0) {
			$average = round($average / $numberAverages, 1);
		}
		
		$update_evaluation['average'] = $average;
		$this->ViewEvaluation_model->UpdateViewEvaluation($update_evaluation, $view_evaluation_id);
		
		$ev = getViewEvaluation($this->input->post('view'));

		$return = ["average" =>  $ev['average'], "evaluationTxt" => $ev['evaluationTxt']];
		echo json_encode($return);
	}

}
