
<?php
if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Project_to_overleaf_model extends CI_Model
{

    function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function get_project_export_latex($project_id){
$project = new Project();
$this->db->select('project.*');
$this->db->from('project');
$this->db->where('project_id',$project_id);
$query = $this->db->get();

foreach($query->result()as $row){
    // $project->set_title($row->title);

}
    }

}  