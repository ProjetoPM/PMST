<?php
defined('BASEPATH') or exit('No direct script access allowed');

class QualityReports extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('logged_in')) {
            redirect(base_url());
        }

        $this->load->helper('url');
        $this->load->helper('log_activity');
        
        $this->load->model('log_model');
        $this->load->model('view_model');
        $this->load->model('Project_model');
        $this->load->model('Quality_reports_model');

        $array = array();
		array_push($array, 'quality_reports');
		loadLangs($array);

		$userInProject = $this->Project_model->userInProject($_SESSION['user_id'], $_SESSION['project_id']);
		
		if ($userInProject) {
			$this->session->set_flashdata('error3', 'You have no access to this project');
			redirect('projects/' . $_SESSION['project_id']);
		}

    }

    public function new($project_id)
    {
        if (strcmp($_SESSION['language'], "US") == 0) {
			$this->lang->load('btn', 'english');
		} else {
			$this->lang->load('btn', 'portuguese-brazilian');
		}

        $idusuario = $_SESSION['user_id'];
        $this->db->where('user_id', $idusuario);
        $this->db->where('project_id', $project_id);
        $project['dados'] = $this->db->get('project_user')->result();

        if (count($project['dados']) > 0) {
            $dado['project_id'] = $project_id;
            $this->load->view('frame/header_view');
            $this->load->view('frame/topbar');
            $this->load->view('frame/sidebar_nav_view');
            $this->load->view('project/quality/quality_reports/new', $dado);
        } else {
            redirect('quality/quality-reports/list' . $_SESSION[$project_id]);
        }
    }

    public function delete($work_id)
    {
        $project_id['project_id'] = $this->input->post('project_id');
        $query = $this->Quality_reports_model->delete($work_id);
        if ($query) {
            insertLogActivity('delete', 'quality reports');
            redirect('quality/quality-reports/list/' . $_SESSION['project_id']);
        }
    }

    public function list($project_id)
    {
        if (strcmp($_SESSION['language'], "US") == 0) {
			$this->lang->load('btn', 'english');
		} else {
			$this->lang->load('btn', 'portuguese-brazilian');
		}

        $dado['project_id'] = $project_id;
        $dado['quality_reports'] = $this->Quality_reports_model->getAll($project_id);
        $this->load->view('frame/header_view');
        $this->load->view('frame/topbar');
        $this->load->view('frame/sidebar_nav_view');
        $this->load->view('project/quality/quality_reports/list', $dado);
    }


    public function edit($project_id)
    {
        if (strcmp($_SESSION['language'], "US") == 0) {
			$this->lang->load('btn', 'english');
		} else {
			$this->lang->load('btn', 'portuguese-brazilian');
		}
        
        $query['quality_reports'] = $this->Quality_reports_model->get($project_id);

        $dado["fields"] = getAllFieldEvaluation($_SESSION['project_id'], "quality reports", $query['quality_reports']['quality_reports_id']);

        $this->load->view('frame/header_view');
        $this->load->view('frame/topbar');
        $this->load->view('frame/sidebar_nav_view');
        $this->load->view('project/quality/quality_reports/edit', $query);
    }



    public function update($project_id)
    {
        $quality_reports['responsible'] = $this->input->post('responsible');
        $quality_reports['identifier'] = $this->input->post('identifier');
        $quality_reports['date'] = $this->input->post('date');
        $quality_reports['type'] = $this->input->post('type');
        $quality_reports['description'] = $this->input->post('description');
        $quality_reports['areas'] = $this->input->post('areas');
        $quality_reports['deliveries'] = $this->input->post('deliveries');
        $quality_reports['recommendations'] = $this->input->post('recommendations');
        $quality_reports['corrective_actions'] = $this->input->post('corrective_actions');
        $quality_reports['manager_opinion'] = $this->input->post('manager_opinion');
        $quality_reports['conclusions'] = $this->input->post('conclusions');

        $data['quality_reports'] = $quality_reports;
        $query = $this->Quality_reports_model->update($data['quality_reports'], $project_id);

        if ($query) {
            insertLogActivity('update', 'quality reports');
            redirect('quality/quality-reports/list/' . $_SESSION['project_id']);
        }
    }

    public function insert($project_id)
    {
        $quality_reports['responsible'] = $this->input->post('responsible');
        $quality_reports['identifier'] = $this->input->post('identifier');
        $quality_reports['date'] = $this->input->post('date');
        $quality_reports['type'] = $this->input->post('type');
        $quality_reports['description'] = $this->input->post('description');
        $quality_reports['areas'] = $this->input->post('areas');
        $quality_reports['deliveries'] = $this->input->post('deliveries');
        $quality_reports['recommendations'] = $this->input->post('recommendations');
        $quality_reports['corrective_actions'] = $this->input->post('corrective_actions');
        $quality_reports['manager_opinion'] = $this->input->post('manager_opinion');
        $quality_reports['conclusions'] = $this->input->post('conclusions');

        $quality_reports['project_id'] = $this->input->post('project_id');

        $query = $this->Quality_reports_model->insert($quality_reports);

        if ($query) {
            insertLogActivity('insert', 'quality reports');
            redirect('quality/quality-reports/list/' . $_SESSION['project_id']);
        }
    }
}
