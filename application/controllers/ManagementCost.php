<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ManagementCost extends CI_Controller {

	function __construct(){
		parent::__construct();
		if (!$this->session->userdata('logged_in')) {
			redirect(base_url());
		}
		$this->load->helper('url');
		$this->load->model('Cost_model');

		$this->lang->load('btn','english');
        // $this->lang->load('btn','portuguese-brazilian');
        $this->lang->load('manage-cost','english');
        // $this->lang->load('manage-cost','portuguese-brazilian');

	}

	public function newp($project_id){
		$idusuario = $_SESSION['user_id'];
    $this->db->where('user_id', $idusuario);
    $this->db->where('project_id', $project_id);
    $project['dados'] = $this->db->get('project_user')-> result();

    if (count($project['dados']) > 0) {
			$dado['cost_mp'] = $this->Cost_model->readCostManagementPlan($project_id);
			$dado['id'] = $project_id;
			$this->db->where('project_id', $project_id);
			$dado['project'] =  $this->db->get('project')->result();

			//$dado['verific'] = true;
			$this->db->where('project_id', $project_id);
			$dataproject['project'] = $this->db->get('project')->result();
			$this->load->view('frame/header_view');
			$this->load->view('frame/sidebar_nav_view');

		$this->load->view('project/cost/cost_mp',$dado);

    } else {
        redirect(base_url());
    }
	}

	function insert()	{
		$postData = $this->input->post();
		$insert   = $this->Cost_model->createCostManagementPlan($postData);
		redirect('ManagementCost/newp/' . $postData['project_id']);
		echo json_encode($insert);
	}

	public function update($id){
		$cost_mp['project_costs_m'] = $this->input->post('project_costs_m');
		$cost_mp['accuracy_level'] = $this->input->post('accuracy_level');
		$cost_mp['organizational_procedures'] = $this->input->post('organizational_procedures');
		$cost_mp['measurement_rules'] = $this->input->post('measurement_rules');
		$cost_mp['format_report'] = $this->input->post('format_report');
		$cost_mp['status'] = $this->input->post('status');

		//$insert = $this->project_model->insert_project_pgq($quality_mp);
		$query = $this->Cost_model->updateCostManagementPlan($cost_mp, $id);

		$this->load->view('frame/header_view');
		$this->load->view('frame/sidebar_nav_view');
		redirect('ManagementCost/newp/' . $id);
	}
}
?>
