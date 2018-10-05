<?php
if (!defined('BASEPATH')) {
	exit('No direct script access allowed');
}

class Stakeholder_mp extends CI_Controller{

	function __construct(){
		parent::__construct();
		// $this->load->helper('url', 'english');
        
     $this->lang->load('btn','english');
       // $this->lang->load('btn','portuguese-brazilian');
       $this->lang->load('stakeholder_mp','english');
      //   $this->lang->load('stakeholder_mp','portuguese-brazilian');
        

		$this->load->helper('url');
		$this->load->model('Stakeholder_mp_model');
	}

	function stakeholder_mp_form($project_id){
		//chamar db da model
		$query['stakeholders'] = $this->Stakeholder_mp_model->getAllStakeholders();
       	$query['project_id'] = $project_id;
		$this->load->view('frame/header_view.php');
		$this->load->view('frame/sidebar_nav_view.php');
		$this->load->view('project/stakeholder_mp.php', $query);
		
	}


//Criar o Schedule 1 Vez
	public function createStakeholderMP(){
		$postData = $this->input->post();
		 // Recebe tudo que está sendo passado pelo formulário
  $insert = $this->Stakeholder_mp_model->createStakeholderMP($postData);
 redirect('stakeholder_mp/stakeholder_mp_form/' . $postData['project_id']);
 echo json_encode($insert);

	//	$dados = $this->post('schedule_mp.schedule_model');
	}

	public function updateSchedule(){
		$shed['schedule_model'] = $this->input->post('schedule_model');
		$shed['accuracy_level'] = $this->input->post('accuracy_level');
		$shed['organizational_procedures'] = $this->input->post('organizational_procedures');
		$shed['schedule_maintenance'] = $this->input->post('schedule_maintenance');
		$shed['performance_measurement'] = $this->input->post('performance_measurement');
		$shed['report_format'] = $this->input->post('report_format');

		$query =	$this->Schedule_model->updateScheduleDB($shed);
		if ($query) {
			header('location:'.base_url().$this->schedule_form());
		}

		//var_dump($shed);
	}
}
?>