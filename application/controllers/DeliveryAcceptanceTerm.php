<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DeliveryAcceptanceTerm extends CI_Controller {

	function __construct(){
		parent::__construct();
        if (!$this->session->userdata('logged_in')) {
            redirect(base_url());
        }
		$this->load->helper('url');
		$this->load->model('Delivery_acceptance_term_model');


		$this->lang->load('btn','english');
        // $this->lang->load('btn','portuguese-brazilian');
    $this->lang->load('delivery_acceptance_term','english');

        // $this->lang->load('manage-cost','portuguese-brazilian');

	}

	public function newp($project_id){
		$idusuario = $_SESSION['user_id'];
    $this->db->where('user_id', $idusuario);
    $this->db->where('project_id', $project_id);
    $project['dados'] = $this->db->get('project_user')-> result();

    if (count($project['dados']) > 0) {
        $dado['project_id'] = $project_id;
        $this->load->view('frame/header_view');
        $this->load->view('frame/sidebar_nav_view');
        $this->load->view('project/integration/delivery_acceptance_term/new',$dado);
    } else {
        redirect(base_url());
    }
	}

    public function delete($project_id){
        $project_id['project_id'] = $this->input->post('project_id');
        $query = $this->Delivery_acceptance_term_model->deleteDeliveryTerm($project_id);
        if($query){
            $this->load->view('frame/header_view');
            $this->load->view('frame/sidebar_nav_view');
            redirect(base_url() . 'DeliveryAcceptanceTerm/listp/' . $project_id['project_id']);
        }
    }

    public function listp($project_id){
        $dado['project_id'] = $project_id;
        $dado['delivery_acceptance_term'] = $this->Delivery_acceptance_term_model->getAllDeliveryTerm($project_id);
        $this->load->view('frame/header_view');
        $this->load->view('frame/sidebar_nav_view');
        $this->load->view('project/integration/delivery_acceptance_term/list',$dado);
    }


    public function edit($project_id) {
        $query['delivery_acceptance_term'] = $this->Delivery_acceptance_term_model->getDeliveryTerm($project_id);
        $this->load->view('frame/header_view.php');
        $this->load->view('frame/sidebar_nav_view.php');
        $this->load->view('project/integration/delivery_acceptance_term/edit', $query);
    }



    public function update($project_id) {
				$delivery_acceptance_term['validator_name'] = $this->input->post('validator_name');
				$delivery_acceptance_term['role'] = $this->input->post('role');
				$delivery_acceptance_term['function'] = $this->input->post('function');
				$delivery_acceptance_term['validation_date'] = $this->input->post('validation_date');
				$delivery_acceptance_term['comments'] = $this->input->post('comments');

        $delivery_acceptance_term['project_id'] = $this->input->post('project_id');

				$data['delivery_acceptance_term'] = $delivery_acceptance_term;
				$query = $this->Delivery_acceptance_term_model->updateDeliveryTerm($data['delivery_acceptance_term'], $project_id);

        if ($query) {
            redirect('DeliveryAcceptanceTerm/listp/' . $delivery_acceptance_term['project_id']);
        }
    }

		public function insert($project_id){
			$delivery_acceptance_term['validator_name'] = $this->input->post('validator_name');
			$delivery_acceptance_term['role'] = $this->input->post('role');
			$delivery_acceptance_term['function'] = $this->input->post('function');
			$delivery_acceptance_term['validation_date'] = $this->input->post('validation_date');
			$delivery_acceptance_term['comments'] = $this->input->post('comments');

			$delivery_acceptance_term['project_id'] = $this->input->post('project_id');

				$query = $this->Delivery_acceptance_term_model->insert($delivery_acceptance_term);

				if($query){
					$this->load->view('frame/header_view');
					$this->load->view('frame/sidebar_nav_view');
					redirect('DeliveryAcceptanceTerm/listp/' . $delivery_acceptance_term['project_id']);
		}
	}

}
?>
