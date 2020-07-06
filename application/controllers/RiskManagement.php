<?php
if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class RiskManagement extends CI_Controller{

    public function __Construct(){
        parent::__Construct();
        if (!$this->session->userdata('logged_in')) {
            redirect(base_url());
        }

        $this->lang->load('btn','english');
        //$this->lang->load('btn','portuguese-brazilian');
        $this->lang->load('risk-mp','english');
        //$this->lang->load('risk-mp','portuguese-brazilian');

        $this->load->model('Project_model');
        $this->load->helper('url');
        $this->load->model('Risk_mp_model');
    }


    public function newp($project_id){
    $idusuario = $_SESSION['user_id'];
    $this->db->where('user_id', $idusuario);
    $this->db->where('project_id', $project_id);
    $project['dados'] = $this->db->get('project_user')->result();

    if (count($project['dados']) > 0) {
    $dado['risk_mp'] = $this->Risk_mp_model->readRiskManagementPlan($project_id);
		$dado['id'] = $project_id;
		$this->db->where('project_id', $project_id);
		$dado['project'] =  $this->db->get('project')->result();

		//$dado['verific'] = true;
		$this->db->where('project_id', $project_id);
		$dataproject['project'] = $this->db->get('project')->result();
		$this->load->view('frame/header_view');
		$this->load->view('frame/sidebar_nav_view');

    $this->load->view('project/risk/risk_mp/risk_mp', $dado);

    } else {
        redirect(base_url());
      }
    }

    public function insert() {
      $postData = $this->input->post();
  		$insert   = $this->Risk_mp_model->createRiskManagementPlan($postData);
  		redirect('RiskManagement/newp/' . $postData['project_id']);
  		echo json_encode($insert);
    }

    public function update($project_id){
        $risk_mp['methodology'] = $this->input->post('methodology');
        $risk_mp['roles_responsibilities'] = $this->input->post('roles_responsibilities');
        $risk_mp['risk_management_processes'] = $this->input->post('risk_management_processes');
        $risk_mp['risks_categories'] = $this->input->post('risks_categories');
        $risk_mp['risks_probability_impact'] = $this->input->post('risks_probability_impact');
        $risk_mp['probability_impact_matrix'] = $this->input->post('probability_impact_matrix');
        $risk_mp['reviewed_tolerances'] = $this->input->post('reviewed_tolerances');
        $risk_mp['traceability'] = $this->input->post('traceability');
        $risk_mp['status'] = $this->input->post('status');

        $query = $this->Risk_mp_model->updateRiskManagementPlan($risk_mp, $project_id);

        $this->load->view('frame/header_view');
        $this->load->view('frame/sidebar_nav_view');
        redirect('RiskManagement/newp/' . $project_id);
    }
}
?>
