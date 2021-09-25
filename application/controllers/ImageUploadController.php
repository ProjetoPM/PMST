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
        if (in_array($type,array('jpg','jpeg','png','gif', 'PNG', 'pdf', 'mp4', 'mkv')))
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

    function do_profile_photo_upload()
    {
        $url = "../upload";
        $image=basename($_FILES['pic']['name']);
        $image=str_replace(' ','|',$image);
        $type = explode(".",$image);
        $type = $type[count($type)-1];
        if (in_array($type,array('jpg','jpeg','png', 'PNG')))
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

    function image_delete($id = null, $project_id)
    {
        $idusuario = $_SESSION['user_id'];
        $this->db->where('user_id', $idusuario);
        $this->db->where('project_id', $project_id);
        $project['dados'] = $this->db->get('project_user')->result();

        if (count($project['dados']) > 0) {
            $this->db->where('id', $id);
            $this->db->delete('upload');
						echo "<script>window.location.href='javascript:history.back(-2);'</script>";
        } else {
            redirect(base_url());
        }
    }

    function image_upload()
    {
        $data['path'] = $this->do_upload();
        $data['project_id'] = $this->input->post('project_id');
        $data['alt'] = $this->input->post('alt');
        $data['view']= $this->input->post('view');
        $this->db->insert('upload', $data);
				$this->session->set_userdata('previous_url', current_url());

				echo "<script>window.location.href='javascript:history.back(-2);'</script>";
    }


    
    function profile_photo_upload()
    {
        $data['photo_path'] = $this->do_profile_photo_upload();
     
        $this->db->where('user.user_id', $_SESSION['user_id'] );
        $query = $this->db->update('user', $data);
        
		echo "<script>window.location.href='javascript:history.back(-2);'</script>";
        
        if ($query) {
            $_SESSION['profile_photo_path'] = $data['photo_path'];
			$this->session->set_flashdata('success', 'Profile Photo has been successfully changed!');
			// insertLogActivity('update', 'profile photo');
		}
		echo "<script>window.location.href='javascript:history.back(-2);'</script>";

		// redirect('integration/benefits-mp/edit/' . $_SESSION['project_id']);
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
