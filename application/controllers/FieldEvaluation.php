<?php
defined('BASEPATH') or exit('No direct script access allowed');

class FieldEvaluation extends CI_Controller
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
		$this->load->model('FieldEvaluation_model');
		$this->load->model('View_model');

		$array = array();
		loadLangs($array);
		$this->lang->load('btn', 'english');
	}


	public function insert()
	{
		// var_dump($_POST);exit;die;
		$view_id = $this->View_model->GetIDByName($this->input->post('view'));

		date_default_timezone_set('america/sao_paulo');
		$dataTime = date('Y-m-d H:i:s');

		$evaluation['field'] = $this->input->post('field');
		$evaluation['view_id'] = $view_id;
		$evaluation['item_id'] = $this->input->post('item_id');
		$evaluation['project_id'] = $_SESSION['project_id'];
		$evaluation['description'] = $this->input->post('evaluation_description');
		$evaluation['status'] = 1;

		$evaluation['user_id'] = $this->session->userdata('user_id');
		$evaluation['datatime'] = $dataTime;

		$query = $this->FieldEvaluation_model->insert($evaluation);

		if ($query) {
			// insertLogActivity('create', 'duration estimates');
			$this->session->set_flashdata('success', 'Successfully evaluated field!');
		}

		// getViewFields($this->input->post('view'));
		echo "<script>window.location.href='javascript:history.back(-2);'</script>";
	}


	public function check()
	{
		$view_id = $this->View_model->GetIDByName($this->input->post('view'));
		$field = $this->input->post('field');
		$item_id = $this->input->post('item_id');
		
		$arrayObject = $this->FieldEvaluation_model->getAllByProject($_SESSION['project_id']);

		foreach ($arrayObject as $f) {
			if ($f->view_id == $view_id && $f->item_id == $item_id && $f->field == $field && $f->status != 0) {
				$f->status = 0; // checked
				$this->FieldEvaluation_model->update($f, $f->field_evaluation_id);
			}
		}

		$this->session->set_flashdata('success', 'The comments were successfully marked as seen!');

		// getViewFields($this->input->post('view'));

		echo "<script>window.location.href='javascript:history.back(-2);'</script>";

		
	}

	public function delete($id)
	{

		// var_dump("dewdew");exit;die;
		$query = $this->FieldEvaluation_model->delete($id);
		if ($query) {
			// insertLogActivity('delete', 'closed procurement documentation');
			$this->session->set_flashdata('error', 'Field successfully deleted!');
			// getViewFields($view);
			echo "<script>window.location.href='javascript:history.back(-2);'</script>";
		}
	}
}
