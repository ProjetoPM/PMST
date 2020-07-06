<?php
if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Procurement extends CI_Controller{

    public function __Construct(){
        parent::__Construct();
        if (!$this->session->userdata('logged_in')) {
            redirect(base_url());
        }
        $this->load->model('Project_model');
        $this->load->model('Procurement_mp_model');

        $this->lang->load('btn','english');
        $this->lang->load('procurement-mp','english');

    }

    private function ajax_checking(){
        if (!$this->input->is_ajax_request()) {
            redirect(base_url());
        }
    }

    public function newp($project_id){
    $idusuario = $_SESSION['user_id'];
    $this->db->where('user_id', $idusuario);
    $this->db->where('project_id', $project_id);
    $project['dados'] = $this->db->get('project_user')->result();

    if (count($project['dados']) > 0) {
    $dado['procurement_mp'] = $this->Procurement_mp_model->readProcurementManagementPlan($project_id);
		$dado['id'] = $project_id;
		$this->db->where('project_id', $project_id);
		$dado['project'] =  $this->db->get('project')->result();

		//$dado['verific'] = true;
		$this->db->where('project_id', $project_id);
		$dataproject['project'] = $this->db->get('project')->result();
		$this->load->view('frame/header_view');
		$this->load->view('frame/sidebar_nav_view');

    $this->load->view('project/procurement/procurement_mp', $dado);

    } else {
        redirect(base_url());
      }
    }

    public function insert() {
      $postData = $this->input->post();
      $insert   = $this->Procurement_mp_model->createProcurementManagementPlan($postData);
      redirect('Procurement/newp/' . $postData['project_id']);
      echo json_encode($insert);
        }

    public function update($project_id){
        $procurement_mp['products_services_obtained'] = $this->input->post('products_services_obtained');
        $procurement_mp['team_actions'] = $this->input->post('team_actions');
        $procurement_mp['performance_metrics'] = $this->input->post('performance_metrics');
        $procurement_mp['procurement_management'] = $this->input->post('procurement_management');
        $procurement_mp['schedule_procurement_activities'] = $this->input->post('schedule_procurement_activities');
        $procurement_mp['functions'] = $this->input->post('functions');
        $procurement_mp['restriction'] = $this->input->post('restriction');
        $procurement_mp['premises'] = $this->input->post('premises');
        $procurement_mp['coins'] = $this->input->post('coins');
        $procurement_mp['independent_estimates'] = $this->input->post('independent_estimates');
        $procurement_mp['risk_issues'] = $this->input->post('risk_issues');
        $procurement_mp['sellers'] = $this->input->post('sellers');
        $procurement_mp['procurement_strategy'] = $this->input->post('procurement_strategy');
        $procurement_mp['status'] = $this->input->post('status');

        $query = $this->Procurement_mp_model->updateProcurementManagementPlan($procurement_mp, $project_id);

        $this->load->view('frame/header_view');
        $this->load->view('frame/sidebar_nav_view');
        redirect('Procurement/newp/' . $project_id);
    }
}
?>
