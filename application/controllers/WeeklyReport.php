<?php
if (!defined('BASEPATH')) {
	exit('No direct script access allowed');
}

class WeeklyReport extends CI_Controller
{

	public function __Construct()
	{
		parent::__Construct();
		if (!$this->session->userdata('logged_in')) {
			redirect(base_url());
		}

		date_default_timezone_set('America/Sao_Paulo');

		if (strcmp($_SESSION['language'], "US") == 0) {
			$this->lang->load('weekly_eval', 'english');

			$this->lang->load('weekly_report', 'english');
			$this->lang->load('project-page', 'english');
		} else {
			$this->lang->load('weekly_eval', 'english');
			$this->lang->load('weekly_report', 'portuguese-brazilian');
			$this->lang->load('project-page', 'portuguese-brazilian');
		}

		//$this->lang->load('btn','portuguese-brazilian');
		//$this->lang->load('risk-mp','portuguese-brazilian');

		$this->load->model('Project_model');
		$this->load->helper('log_activity');
		$this->load->model('log_model');
		$this->load->model('view_model');
		$this->load->helper('url');
		$this->load->model('WeeklyReport_model');
		$this->load->model('WeeklyEvaluation_model');
	}

	public function list()
	{

		if (strcmp($_SESSION['language'], "US") == 0) {
			$this->lang->load('btn', 'english');
		} else {
			$this->lang->load('btn', 'portuguese-brazilian');
		}

		$dado['weekly_report'] = $this->WeeklyReport_model->getAllPerMember($_SESSION['user_id']);


		$this->load->view('frame/header_view');
		$this->load->view('frame/topbar');
		$this->load->view('frame/sidebar_nav_view');
		$this->load->view('project/weekly_report/list', $dado);
	}

	public function new()
	{

		if (strcmp($_SESSION['language'], "US") == 0) {
			$this->lang->load('btn', 'english');
		} else {
			$this->lang->load('btn', 'portuguese-brazilian');
		}

		$dado['evaluation'] = $this->WeeklyEvaluation_model->getAll();

		$this->load->view('frame/header_view');
		$this->load->view('frame/topbar');
		$this->load->view('frame/sidebar_nav_view');
		$this->load->view('project/weekly_report/new', $dado);
	}

	public function insert()
	{

		// insertLogActivity('insert', 'Weekly Report');

		$weekly_report['tool_evaluation'] = $this->input->post('tool_evaluation');
		$weekly_report['user_id'] = $_SESSION['user_id'];
		$weekly_report['weekly_evaluation_id'] = $this->input->post('evaluation_id');
		$weekly_report['score'] = 3;

		$weekly_report_process['description'] = $this->input->post('description');
		$weekly_report_process['process_name'] = $this->input->post('process_name');



		
		$data = $this->WeeklyEvaluation_model->getDeadline($weekly_report['weekly_evaluation_id']);
		$date = date('m/d/Y', time());
		$currentDate = new DateTime($date);
		$submitDay = new DateTime($data);
		
		if ($currentDate > $submitDay) {
			$this->session->set_flashdata('error', 'You are not able to create this item, since the deadline has arrived');
			redirect('weekly-report/list');
		} else {
			$insert_id   = $this->WeeklyReport_model->insert($weekly_report);
			$weekly_report_process['weekly_report_id'] = $insert_id;
			$query2 = $this->WeeklyReport_model->updateProcessReport($weekly_report_process, $insert_id);
			$this->session->set_flashdata('success', 'Weekly Report has been successfully created!');
			redirect('weekly-report/list');

		}

		// echo json_encode($insert);
	}

	function upload_pdf()
    {
        $url = "../upload";
        $image=basename($_FILES['pic']['name']);
        $image=str_replace(' ','|',$image);
        $type = explode(".",$image);
        $type = $type[count($type)-1];
        if (in_array($type,array('pdf')))
        {
            $tmppath="upload/".uniqid(rand()).".".$type;
            if(is_uploaded_file($_FILES["pic"]["tmp_name"]))
            {
                move_uploaded_file($_FILES['pic']['tmp_name'],$tmppath);
                return $tmppath;
            }
        }
        else
        {
            return false;
        }
    }

	function file_upload()
    {
        $data['path'] = $this->upload_pdf();
		$data['weekly_report_process_id'] = $this->input->post('weekly_report_process_id');
        $data['alt'] = $this->input->post('alt');
        $this->db->insert('report_uploads', $data);
				$this->session->set_userdata('previous_url', current_url());

				echo "<script>window.location.href='javascript:history.back(-2);'</script>";
    }

	public function edit($weekly_report_id)
	{

		if (strcmp($_SESSION['language'], "US") == 0) {
			$this->lang->load('btn', 'english');
		} else {
			$this->lang->load('btn', 'portuguese-brazilian');
		}

		$dado['evaluation'] = $this->WeeklyEvaluation_model->getAll();
		$dado['weekly_report'] = $this->WeeklyReport_model->get($weekly_report_id);
		$dado['weekly_processes'] = $this->WeeklyReport_model->getAllProcesses($weekly_report_id);

		$this->load->view('frame/header_view');
		$this->load->view('frame/topbar');
		$this->load->view('frame/sidebar_nav_view');
		$this->load->view('project/weekly_report/edit', $dado);
	}


	public function update($weekly_report_id)
	{
		
		$weekly_report['tool_evaluation'] = $this->input->post('tool_evaluation');
		$weekly_report['weekly_evaluation_id'] = $this->input->post('evaluation_id');		
		$weekly_report['user_id'] = $_SESSION['user_id'];
		
		
		
		$weekly_report_process['description'] = $this->input->post('description');
		$weekly_report_process['process_name'] = $this->input->post('process_name');
		
		
		$data = $this->WeeklyEvaluation_model->getDeadline($weekly_report['weekly_evaluation_id']);
		$date = date('m/d/Y', time());
		$currentDate = new DateTime($date);
		$submitDay = new DateTime($data);

		if ($currentDate > $submitDay) {
			$this->session->set_flashdata('error', 'You are not able to update this item, since the deadline has arrived');
			redirect('weekly-report/list');
		} else {
			$insert_id   = $this->WeeklyReport_model->update($weekly_report, $weekly_report_id);
			$query2 = $this->WeeklyReport_model->updateProcessReport($weekly_report_process, $insert_id);
			insertLogActivity('update', 'weekly report');
			$this->session->set_flashdata('update', 'Weekly Report has been successfully changed!');
			redirect('weekly-report/list');
		}
	}

	public function delete($weekly_report_id)
	{
		//$project_id['project_id'] = $project_id;
		$query = $this->WeeklyReport_model->delete($weekly_report_id);
		if ($query) {
			insertLogActivity('delete', 'quality checklist');
			redirect('weekly-report/list');
		}
	}
}
