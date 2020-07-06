<?php
if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Requirement_registration extends CI_Controller{

    public function __Construct(){
        parent::__Construct();
        if (!$this->session->userdata('logged_in')) {
            redirect(base_url());
        }
        $this->load->model('project_model');
        $this->load->model('requirement_registration_model');

        $this->lang->load('btn','english');
        // $this->lang->load('btn','portuguese-brazilian');
        $this->lang->load('requirement-registration','english');
        // $this->lang->load('requirement-registration','portuguese-brazilian');

    }

    private function ajax_checking(){
        if (!$this->input->is_ajax_request()) {
            redirect(base_url());
        }
    }

    public function listp($project_id){
        $query['requirement_registration'] = $this->requirement_registration_model->getWithProject_id($project_id);
        $query['project_id'] = $project_id;
        $this->load->view('frame/header_view');
        $this->load->view('frame/sidebar_nav_view');
        $this->load->view('project/scope/requirement/list', $query);
    }

    public function newp($project_id){
            $idusuario = $_SESSION['user_id'];
    $this->db->where('user_id', $idusuario);
    $this->db->where('project_id', $project_id);
    $project['dados'] = $this->db->get('project_user')-> result();

    if (count($project['dados']) > 0) {
        
$query['project_id'] = $project_id;
        $this->load->view('frame/header_view');
        $this->load->view('frame/sidebar_nav_view');
        $this->load->view('project/scope/requirement/new', $query);
    } else {
        redirect(base_url());
    }
    }

    public function edit($requirement_registration){
        $query['requirement_registration'] = $this->requirement_registration_model->get($requirement_registration);
        $query['project_id'] = $this->input->post('project_id');
        $this->load->view('frame/header_view');
        $this->load->view('frame/sidebar_nav_view');
        $this->load->view('project/scope/requirement/edit', $query);
    }

    public function insert() {
        $requirement_registration['associated_id'] = $this->input->post('associated_id');
        $requirement_registration['business_strategy'] = $this->input->post('business_strategy');
        $requirement_registration['priority'] = $this->input->post('priority');
        $requirement_registration['description'] = $this->input->post('description');
        $requirement_registration['version'] = $this->input->post('version');
        $requirement_registration['phase'] = $this->input->post('phase');
        $requirement_registration['associated_delivery'] = $this->input->post('associated_delivery');
        $requirement_registration['type'] = $this->input->post('type');
        $requirement_registration['requester'] = $this->input->post('requester');
        $requirement_registration['complexity'] = $this->input->post('complexity');
        $requirement_registration['acceptance_criteria'] = $this->input->post('acceptance_criteria');
        $requirement_registration['responsible'] = $this->input->post('responsible');
        $requirement_registration['validity'] = $this->input->post('validity');
        $requirement_registration['requirement_situation'] = $this->input->post('requirement_situation');
        $requirement_registration['supporting_documentation'] = $this->input->post('supporting_documentation');
        $requirement_registration['project_id'] = $this->input->post('project_id');

        $query = $this->requirement_registration_model->insert($requirement_registration);

        if($query){
            $this->load->view('frame/header_view');
            $this->load->view('frame/sidebar_nav_view');
            redirect(base_url() . 'Requirement_registration/listp/' . $requirement_registration['project_id']);
        }
    }

    public function update($project_id){
        $requirement_registration['business_strategy'] = $this->input->post('business_strategy');
        $requirement_registration['priority'] = $this->input->post('priority');
        $requirement_registration['description'] = $this->input->post('description');
        $requirement_registration['version'] = $this->input->post('version');
        $requirement_registration['phase'] = $this->input->post('phase');
        $requirement_registration['associated_delivery'] = $this->input->post('associated_delivery');
        $requirement_registration['type'] = $this->input->post('type');
        $requirement_registration['requester'] = $this->input->post('requester');
        $requirement_registration['complexity'] = $this->input->post('complexity');
        $requirement_registration['acceptance_criteria'] = $this->input->post('acceptance_criteria');
        $requirement_registration['responsible'] = $this->input->post('responsible');
        $requirement_registration['validity'] = $this->input->post('validity');
        $requirement_registration['requirement_situation'] = $this->input->post('requirement_situation');
        $requirement_registration['supporting_documentation'] = $this->input->post('supporting_documentation');
        $requirement_registration['project_id'] = $this->input->post('project_id');

        $query = $this->requirement_registration_model->update($requirement_registration, $project_id);

        if($query){
            $this->load->view('frame/header_view');
            $this->load->view('frame/sidebar_nav_view');
            redirect(base_url() . 'Requirement_registration/listp/' . $requirement_registration['project_id']);
        }
    }

    public function delete($project_id){
        $project_id['id'] = $this->input->post('project_id');
        $query = $this->requirement_registration_model->delete($project_id);
        if($query){
            $this->load->view('frame/header_view');
            $this->load->view('frame/sidebar_nav_view');
            redirect(base_url() . 'Requirement_registration/listp/' . $project_id['id']);
        }
    }
}
?>
