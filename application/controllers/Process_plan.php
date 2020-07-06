<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Process_plan extends CI_Controller {

	function __construct(){
		parent::__construct();
		if (!$this->session->userdata('logged_in')) {
			redirect(base_url());
		}
		$this->load->helper('url');
		$this->load->model('Process_plan_model');

		$this->lang->load('btn','english');
        // $this->lang->load('btn','portuguese-brazilian');
        $this->lang->load('process-plan','english');
        // $this->lang->load('process_plan','portuguese-brazilian');

	}

	public function newp($project_id){
		$idusuario = $_SESSION['user_id'];
    $this->db->where('user_id', $idusuario);
    $this->db->where('project_id', $project_id);
    $project['dados'] = $this->db->get('project_user')-> result();

    if (count($project['dados']) > 0) {
        $data['process_plan'] = $this->Process_plan_model->getAll();
		$data['id'] = $project_id;
		$this->load->view('frame/header_view');
		$this->load->view('frame/sidebar_nav_view');
		$this->load->view('project/process_plan',$data);

    } else {
        redirect(base_url());
    }
	}

	public function insert($project_id){
		$data['process_plan'] = $this->Process_plan_model->getAll();
		$process_plan['process_limits'] = $this->input->post('process_limits');
		$process_plan['process_configuration'] = $this->input->post('process_configuration');
		$process_plan['process_metrics'] = $this->input->post('process_metrics');
		$process_plan['goals_performance_improvement'] = $this->input->post('goals_performance_improvement');
		$process_plan['project_id'] = $project_id;

		$query=false;
		if($data['process_plan']!=null){
			foreach($data['process_plan'] as $process){
				$verific = $process->project_id;
				if($project_id==$verific){
					$query = $this->Process_plan_model->update($process_plan, $project_id);
				}
			}
		}
		if($query!=true){
			$query = $this->Process_plan_model->insert($process_plan);
		}

		if($query){
			$this->load->view('frame/header_view');
			$this->load->view('frame/sidebar_nav_view');
			redirect('Process_plan/newp/' . $process_plan['project_id']);
		}

	}
}
?>
