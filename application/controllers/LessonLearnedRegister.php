<?php
defined('BASEPATH') or exit('No direct script access allowed');

class LessonLearnedRegister extends CI_Controller
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
        $this->load->model('Stakeholder_model');
        $this->load->model('Lesson_learned_register_model');


        $array = array();
        array_push($array, 'lesson_learned_register');
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

        $dado['stakeholder'] = $this->Stakeholder_model->getAll($_SESSION['project_id']);
        $dado['knowledge_area'] = $this->Project_model->getAllKnowledgeArea();
        $idusuario = $_SESSION['user_id'];
        $this->db->where('user_id', $idusuario);
        $this->db->where('project_id', $project_id);
        $project['dados'] = $this->db->get('project_user')->result();

        if (count($project['dados']) > 0) {
            $dado['id'] = $project_id;
            $this->load->view('frame/header_view');
            $this->load->view('frame/topbar');
            $this->load->view('frame/sidebar_nav_view', $project_id);
            $this->load->view('project/integration/lesson_learned_register/new', $dado);
        } else {
            redirect(base_url());
        }
    }

    public function delete($lesson_learned_register_id)
    {
        $project_id['project_id'] = $this->input->post('project_id');
        //$project_id['project_id'] = $project_id;
        $query = $this->Lesson_learned_register_model->delete($lesson_learned_register_id);
        if ($query) {
            insertLogActivity('delete', 'lesson learned register');
            redirect('integration/lesson-learned-register/list/' . $project_id['project_id']);
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

        $dado['lesson_learned_register'] = $this->Lesson_learned_register_model->getAll($project_id);
        $this->load->view('frame/header_view');
        $this->load->view('frame/topbar');
        $this->load->view('frame/sidebar_nav_view');
        $this->load->view('project/integration/lesson_learned_register/list', $dado);
    }


    public function edit($lesson_learned_register_id)
    {
        if (strcmp($_SESSION['language'], "US") == 0) {
            $this->lang->load('btn', 'english');
        } else {
            $this->lang->load('btn', 'portuguese-brazilian');
        }

        $data['stakeholder'] = $this->Stakeholder_model->getAll($_SESSION['project_id']);
        $data['knowledge_area'] = $this->Project_model->getAllKnowledgeArea();
        $data['lesson_learned_register'] = $this->Lesson_learned_register_model->get($lesson_learned_register_id);
        $data['knowledge_area_name'] = '';
        $knowledge_area_to_remove = 0;

        foreach ($data['knowledge_area'] as $key => $knowledge_area) {
            if ($data['lesson_learned_register']['knowledge_area_id'] == $knowledge_area->knowledge_area_id) {
                $data['knowledge_area_name'] = $knowledge_area->name;
                $knowledge_area_to_remove = $key;
            }
        }
        unset($data['knowledge_area'][$knowledge_area_to_remove]);

        $dado["fields"] = getAllFieldEvaluation($_SESSION['project_id'], "lesson learned register", $data['lesson_learned_register']['lesson_learned_register_id']);

        $this->load->view('frame/header_view.php');
        $this->load->view('frame/topbar');
        $this->load->view('frame/sidebar_nav_view.php');
        $this->load->view('project/integration/lesson_learned_register/edit', $data);
    }

    public function update($lesson_learned_register_id)
    {
        $lesson_learned_register['stakeholder'] = $this->input->post('stakeholder');
        $lesson_learned_register['date'] = $this->input->post('date');
        $lesson_learned_register['description'] = $this->input->post('description');
        $lesson_learned_register['category'] = $this->input->post('category');
        $lesson_learned_register['interested'] = $this->input->post('interested');
        $lesson_learned_register['status'] = $this->input->post('status');
        $lesson_learned_register['impact'] = $this->input->post('impact');
        $lesson_learned_register['recommendations'] = $this->input->post('recommendations');
        $lesson_learned_register['knowledge_area_id'] = $this->input->post('knowledge_area');
        $lesson_learned_register['life_cycle'] = $this->input->post('life_cycle');
        $lesson_learned_register['project_id'] = $this->input->post('project_id');
        $data['lesson_learned_register'] = $lesson_learned_register;
        $query = $this->Lesson_learned_register_model->update($data['lesson_learned_register'], $lesson_learned_register_id);

        if ($query) {
            insertLogActivity('update', 'lesson learned register');
            $this->session->set_flashdata('success', 'Lesson Learned Register has been successfully changed!');
            redirect('integration/lesson-learned-register/list/' . $lesson_learned_register['project_id']);
        }
    }


    public function insert($project_id)
    {

        $lesson_learned_register['stakeholder'] = $this->input->post('stakeholder');
        $lesson_learned_register['date'] = $this->input->post('date');
        $lesson_learned_register['description'] = $this->input->post('description');
        $lesson_learned_register['category'] = $this->input->post('category');
        $lesson_learned_register['interested'] = $this->input->post('interested');
        $lesson_learned_register['status'] = $this->input->post('status');
        $lesson_learned_register['impact'] = $this->input->post('impact');
        $lesson_learned_register['recommendations'] = $this->input->post('recommendations');
        $lesson_learned_register['knowledge_area_id'] = $this->input->post('knowledge_area');
        $lesson_learned_register['life_cycle'] = $this->input->post('life_cycle');
        $lesson_learned_register['project_id'] = $_SESSION["project_id"];

        $query = $this->Lesson_learned_register_model->insert($lesson_learned_register);

        if ($query) {
            insertLogActivity('insert', 'lesson learned register');
            $this->session->set_flashdata('success', 'Lesson Learned Register has been successfully created!');
            redirect('integration/lesson-learned-register/list/' . $lesson_learned_register['project_id']);
        }
    }
}
