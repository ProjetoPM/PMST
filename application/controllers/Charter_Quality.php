<<<<<<< HEAD
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Charter_Quality extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('Quality_model');
	}

	public function addnew($project_id){
		$dado['quality_mp'] = $this->Quality_model->getAllQuality();
		$dado['id'] = $project_id;
		//$dado['verific'] = true;
		$this->load->view('frame/header_view');
        $this->load->view('frame/sidebar_nav_view');
	 	$this->load->view('project/quality',$dado);
	 }

	public function insert($id){
		$dado['quality_mp'] = $this->Quality_model->getAllQuality();
		if($dado['quality_mp']!=null){
			$query = $this->Quality_model->deletequality($id);
		}

		$quality_mp['methodology'] = $this->input->post('methodology');
		$quality_mp['related_processes'] = $this->input->post('related_processes');
		$quality_mp['expectations_tolerances'] = $this->input->post('expectations_tolerances');
		$quality_mp['traceability'] = $this->input->post('traceability');
		$quality_mp['project_id'] = $id;
		$quality_mp['status'] = 1;
		$query = $this->Quality_model->insertquality($quality_mp);

		if($query){
		$this->load->view('frame/header_view');
        $this->load->view('frame/sidebar_nav_view');
        redirect('project/' . $quality_mp['project_id']);
		}

	}

	public function delete($project_id){
		$query = $this->Project_model->deleteproject($project_id);

		if($query){
			header('location:'.base_url().$this->index());
		}
	}

}
=======
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Charter_Quality extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('Quality_model');
	}
 
	public function addnew($project_id){
		$dado['quality_mp'] = $this->Quality_model->readQuality($project_id);
		$dado['id'] = $project_id;
		$this->db->where('project_id', $project_id);
		$dado['project'] =  $this->db->get('project')->result();
		
		//$dado['verific'] = true;
		$this->db->where('project_id', $project_id);
        $dataproject['project'] = $this->db->get('project')->result();
		$this->load->view('frame/header_view');
		$this->load->view('frame/sidebar_nav_view');
	
			$this->load->view('project/quality_mp',$dado);
	
	 }

	 function create()
	 {
		 //$this->ajax_checking();
		 
		 $postData = $this->input->post();
		 $insert   = $this->Quality_model->createQuality($postData);
		 redirect('project/' . $postData['project_id']);
		 echo json_encode($insert);
	 }


	 public function update($id){
		$quality_mp['methodology'] = $this->input->post('methodology');
		$quality_mp['related_processes'] = $this->input->post('related_processes');
		$quality_mp['expectations_tolerances'] = $this->input->post('expectations_tolerances');
		$quality_mp['traceability'] = $this->input->post('traceability');
		$quality_mp['status'] = (int) $this->input->post('status');

		//$insert = $this->project_model->insert_project_pgq($quality_mp);
		$query = $this->Quality_model->updateQuality($quality_mp, $id);

		$this->load->view('frame/header_view');
        $this->load->view('frame/sidebar_nav_view');
        redirect('project/' . $id);
	}
}
>>>>>>> master
?>