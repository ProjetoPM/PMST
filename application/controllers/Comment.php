<?php
if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Comment extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->helper('url');
        $this->load->helper('form');
    }

    public function index()
    {
        // $this->load->view('upload/index');
        $this->load->view('comment/index');
    }

    public function delete($project_id)
    {
        $project_id['id'] = $this->input->post('project_id');
        $query = $this->comment_model->delete($project_id);
        // if ($query) {
        //     $this->load->view('frame/header_view');
        //     $this->load->view('frame/sidebar_nav_view');
        //     redirect(base_url() . 'comment/listp/' . $project_id['id']);
        // }
    }

    public function insert()
    {
       // date_default_timezone_set('America/Sao_paulo');
      //  $data = date("d/m/Y");  varchar os dois
      //  $hora = date("H:i");   
        $comment['user_id'] = $this->input->post('user_name');
        $comment['description'] = $this->input->post('description');
        $comment['data'] = $this->input->post('data');
        $comment['hora'] = $this->input->post('hora');

        $comment['project_id'] = $this->input->post('project_id');
        //$comment['status'] = 1;

        $data['comment'] = $comment;
        $query = $this->comment_model->insert($data['comment']);

       // if ($query) {
         //   $this->load->view('frame/header_view');
         //   $this->load->view('frame/sidebar_nav_view');
         //   redirect(base_url() . 'comment/listp/' . $comment['project_id']);
     //   }
    }

    public function listp($project_id)
    {
        $query['comment'] = $this->comment_model->getWithProject_id($project_id);
        //$query['communication_responsability'] = $this->comment_model->getAllCommunication_responsability();
        //$query['stakeholder'] = $this->comment_model->getCommunication_stakeholder_item_id($project_id);
        $query['project_id'] = $project_id;
        $this->load->view('frame/header_view');
        $this->load->view('frame/sidebar_nav_view');
        $this->load->view('project/communication/communication_mp/comment/list', $query);
    }

    function do_comment()
    {
        $url = "../upload";
        $image = basename($_FILES['pic']['name']);
        $image = str_replace(' ', '|', $image);
        $type = explode(".", $image);
        $type = $type[count($type) - 1];
        if (in_array($type, array('jpg', 'jpeg', 'png', 'gif'))) {
            $tmppath = "upload/" . uniqid(rand()) . "." . $type;
            if (is_uploaded_file($_FILES["pic"]["tmp_name"])) {
                move_uploaded_file($_FILES['pic']['tmp_name'], $tmppath);
                return $tmppath;
            }
        } else {
            return false;
        }
    }

    function image_delete($project_id = null, $project_id)
    {
        $idusuario = $_SESSION['user_id'];
        $this->db->where('user_id', $idusuario);
        $this->db->where('project_id', $project_id);
        $project['dados'] = $this->db->get('project_user')->result();

        if (count($project['dados']) > 0) {
            $this->db->where('id', $project_id);
            $this->db->delete('upload');
            echo "<script>window.location.href='javascript:history.back(-2);'</script>";
        } else {
            redirect(base_url());
        }
    }

    function insertComment()
    {
        $data['project_id'] = $this->input->post('project_id');
        $data['alt'] = $this->input->post('alt');
        $data['view'] = $this->input->post('view');
        $this->db->insert('upload', $data);
        $this->session->set_userdata('previous_url', current_url());

        echo "<script>window.location.href='javascript:history.back(-2);'</script>";
    }

    function images()
    {
        $this->load->view('images');
    }

    function not_img()
    {
        $this->load->view('not_img');
    }
}
