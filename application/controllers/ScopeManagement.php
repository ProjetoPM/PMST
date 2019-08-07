<?php
if (!defined('BASEPATH')) {
	exit('No direct script access allowed');
}

class ScopeManagement extends CI_Controller{

	function __construct(){
		parent::__construct();
		//$this->load->helper('url');
		$this->lang->load('btn', 'english');
		//$this->lang->load('btn', 'portuguese-brazilian');
		$this->lang->load('scope_mp', 'english');
		//$this->lang->load('tap', 'portuguese-brazilian');
		$this->load->model('Scope_mp_model');
	}

	public function new($project_id){

		//buscando stakeholders
		$data['scope_mp'] = $this->Scope_mp_model->tap_form($project_id);
		$data['project_id'] = $project_id;
		$this->db->where('project_id', $project_id);
		$data['scope_mp'] = $this->db->get('scope_mp')->result();
		$this->load->view('frame/header_view.php');
		$this->load->view('frame/sidebar_nav_view.php');
		$this->load->view('project/scope/scope_mp', $data);

	}



	public function insert() {
		$scope_mp['scope_specification'] = $this->input->post('scope_specification');
		$scope_mp['eap_process'] = $this->input->post('eap_process');
		$scope_mp['deliveries_acceptance'] = $this->input->post('deliveries_acceptance');
		$scope_mp['scope_change_mp'] = $this->input->post('scope_change_mp');
		$scope_mp['project_id'] = $this->input->post('project_id');
		$scope_mp['status'] = $this->input->post('status');

		if ($this->input->post('status') == 1) {
			$project_mp['status'] = 1;
		} else {
			$project_mp['status'] = 0;
		}
		$query = $this->Scope_mp_model->insertScopeMp($scope_mp);

		if ($query) {
			redirect('project/' . $scope_mp['project_id']);
		}
	}

	public function update($scope_mp_id) {
		$scope_mp['scope_specification'] = $this->input->post('scope_specification');
		$scope_mp['eap_process'] = $this->input->post('eap_process');
		$scope_mp['deliveries_acceptance'] = $this->input->post('deliveries_acceptance');
		$scope_mp['scope_change_mp'] = $this->input->post('scope_change_mp');
		$scope_mp['project_id'] = $this->input->post('project_id');
		$scope_mp['status'] = $this->input->post('status');


		if ($this->input->post('status') == 1) {
			$scope_mp['status'] = 1;
		} else {
			$scope_mp['status'] = 0;
		}
		$query = $this->Scope_mp_model->updateScopeMp($scope_mp, $scope_mp_id);

		if ($query) {
			redirect('project/' . $scope_mp['project_id']);
		}
	}

	function image_upload()
{
	$this->load->view('frame/header_view.php');
	$this->load->view('project/scope/scope_mp', $data);
	$this->load->view('frame/sidebar_nav_view.php');
}

	function ajax_upload() {
			 if(isset($_FILES["image_file"]["name"]))
			 {

						$config['upload_path'] = './upload/';
						$config['allowed_types'] = 'jpg|jpeg|png|gif';


						$this->load->library('upload', $config);
						if(!$this->upload->do_upload('image_file'))
						{
								 echo $this->upload->display_errors();
						}
						else
						{
								 $data = $this->upload->data();
								 echo '<img src="'.base_url().'upload/'.$data["file_name"].'" width="300" height="225" class="img-thumbnail" />';
						}
			 }
	}

}
?>
