<?php
if (!defined('BASEPATH')) {
	exit('No direct script access allowed');
}

class ScopeManagement extends CI_Controller{

	function __construct(){
		parent::__construct();
		if (!$this->session->userdata('logged_in')) {
			redirect(base_url());
		}
		//$this->load->helper('url');
		$this->lang->load('btn', 'english');
		//$this->lang->load('btn', 'portuguese-brazilian');
		$this->lang->load('scope_mp', 'english');
		//$this->lang->load('tap', 'portuguese-brazilian');

		$this->load->model('Project_model');
		$this->load->helper('url');
		$this->load->model('Scope_mp_model');
	}



	public function newp($project_id){
		$idusuario = $_SESSION['user_id'];
		$this->db->where('user_id', $idusuario);
		$this->db->where('project_id', $project_id);
		$project['dados'] = $this->db->get('project_user')-> result();

		if (count($project['dados']) > 0) {
		$dado['scope_mp'] = $this->Scope_mp_model->readScopeManagementPlan($project_id);
		$dado['id'] = $project_id;
		$this->db->where('project_id', $project_id);
		$dado['project'] =  $this->db->get('project')->result();

		//$dado['verific'] = true;
		$this->db->where('project_id', $project_id);
		$dataproject['project'] = $this->db->get('project')->result();
		$this->load->view('frame/header_view');
		$this->load->view('frame/sidebar_nav_view');

		$this->load->view('project/scope/scope_mp',$dado);

		} else {
				redirect(base_url());
		}

	}

	public function insert() {
		$postData = $this->input->post();
		$insert   = $this->Scope_mp_model->createScopeManagementPlan($postData);
		redirect('project/' . $postData['project_id']);
		echo json_encode($insert);
	}

	public function update($project_id) {
		$scope_mp['scope_specification'] = $this->input->post('scope_specification');
		$scope_mp['eap_process'] = $this->input->post('eap_process');
		$scope_mp['deliveries_acceptance'] = $this->input->post('deliveries_acceptance');
		$scope_mp['scope_change_mp'] = $this->input->post('scope_change_mp');
		$scope_mp['status'] = $this->input->post('status');

		$query = $this->Scope_mp_model->updateScopeManagementPlan($scope_mp, $project_id);

		$this->load->view('frame/header_view');
		$this->load->view('frame/sidebar_nav_view');
		redirect('project/' . $project_id);
	}

	function image_upload()
{
	$this->load->view('frame/header_view.php');
	$this->load->view('project/scope/scope_mp', $data);
	$this->load->view('frame/sidebar_nav_view.php');
}

	function ajax_upload() {
			$project_id = $this->input->post('project_id');
			$view_id = $this->input->post('view_id');
			$folder = 'upload/Project'.$project_id.'View'.$view_id;
			$path = 'Project'.$project_id.'View'.$view_id;
			mkdir($folder, 0777);

			 if(isset($_FILES["image_file"]["name"]))
			 {

						$config['upload_path'] = 'upload/'.$path;
						$config['allowed_types'] = 'jpg|jpeg|png|gif';


						$this->load->library('upload', $config);
						if(!$this->upload->do_upload('image_file'))
						{
								 echo $this->upload->display_errors();
						}
						else
						{
								 $data = $this->upload->data();
								 echo '<img src="'.base_url().'upload/'.$path.$data["file_name"].'" width="300" height="225" class="img-thumbnail" />';
						}
			 }
	}

}
?>
