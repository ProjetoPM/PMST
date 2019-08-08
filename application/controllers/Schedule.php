<?php
if (!defined('BASEPATH')) {
	exit('No direct script access allowed');
}

class Schedule extends CI_Controller
{

	function __construct(){
		parent::__construct();
		if (!$this->session->userdata('logged_in')) {
			redirect(base_url());
		}

		$this->lang->load('btn','english');
        // $this->lang->load('btn','portuguese-brazilian');
        $this->lang->load('schedule','english');
        // $this->lang->load('schedule','portuguese-brazilian');
		$this->load->helper('url');
		$this->load->model('Schedule_model');
	}

	public function newp($id){
    $idusuario = $_SESSION['user_id'];
    $this->db->where('user_id', $idusuario);
    $this->db->where('project_id', $id);
    $project['dados'] = $this->db->get('project_user')-> result();

  
    if (count($project['dados']) > 0) {        
		$dados['schedule_mp'] = $this->Schedule_model->getSchedule($id);
		$dados['id'] = $id;
		$this->db->where('project_id', $id);
		$dados['project'] = $this->db->get('project')->result();
		$this->load->view('frame/header_view.php');
		$this->load->view('frame/sidebar_nav_view.php');
		$this->load->view('schedule',$dados);

    } else {
        redirect(base_url());
    }
		//var_dump($dados);
	}

//Criar o Schedule 1 Vez
	public function insert(){
		$postData = $this->input->post();
		$insert = $this->Schedule_model->createSchedule($postData);
		redirect('project/' . $postData['project_id']);
		echo json_encode($insert);

	//	$dados = $this->post('schedule_mp.schedule_model');
	}


// esse parametro vai ser inicializado la na view
	public function update($id){
		$schedule_mp['schedule_model'] = $this->input->post('schedule_model');
		$schedule_mp['accuracy_level'] = $this->input->post('accuracy_level');
		$schedule_mp['organizational_procedures'] = $this->input->post('organizational_procedures');
		$schedule_mp['schedule_maintenance'] = $this->input->post('schedule_maintenance');
		$schedule_mp['performance_measurement'] = $this->input->post('performance_measurement');
		$schedule_mp['report_format'] = $this->input->post('report_format');

		$query =	$this->Schedule_model->updateScheduleDB($schedule_mp,$id);

		$this->load->view('frame/header_view');
		$this->load->view('frame/sidebar_nav_view');
		redirect('project/' . $id);
		//if ($query) {
		//header('location:'.base_url().//$this->schedule_form());
	}



		//var_dump($shed);






}






?>
