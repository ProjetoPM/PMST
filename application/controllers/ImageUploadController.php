<?php
if (!defined('BASEPATH')) {
	exit('No direct script access allowed');
}

class ImageUploadController extends CI_Controller {


    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->helper('url');
        $this->load->helper('form');
    }

    public function index() {
        $this->load->view('upload/index');
    }

    function do_upload()
    {
        $url = "../upload";
        $image=basename($_FILES['pic']['name']);
        $image=str_replace(' ','|',$image);
        $type = explode(".",$image);
        $type = $type[count($type)-1];
        if (in_array($type,array('jpg','jpeg','png','gif')))
        {
            $tmppath="upload/".uniqid(rand()).".".$type;
            if(is_uploaded_file($_FILES["pic"]["tmp_name"]))
            {
                move_uploaded_file($_FILES['pic']['tmp_name'],$tmppath);
                return $tmppath;
            }
        }
        else
        {
            return false;
        }
    }

    function image_upload()
    {
        $data['path'] = $this->do_upload();
        $data['project_id'] = $this->input->post('project_id');
        $data['view']= $this->input->post('view');
        $this->db->insert('upload', $data);
        redirect('project/' . $data['project_id']);
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