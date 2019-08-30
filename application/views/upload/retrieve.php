<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>

<?php
//$images = $this->db->get('upload')->result_array();

if (isset($id)) {
    $project_id = $id;
} else {
    $project_id = $project_id;
}

$this->db->where('project_id', $project_id);
$this->db->where('view', $name);
$images = $this->db->get('upload')->result_array();

foreach($images as $row):
?>

<div class="container">
    <img src="<?php echo base_url().$row['path'];?>" class="img" alt="" />
</div>

<?
endforeach;
?>