<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>

<style>
    img {
        border: 1px solid #ddd; /* Gray border */
        border-radius: 4px; /* Rounded border */
        padding: 5px; /* Some padding */
        width: 130px; /* Set a small width */
    }

    /* Add a hover effect (blue shadow) */
    img:hover {
        box-shadow: 0 0 2px 1px rgba(0, 140, 186, 0.5);
    }
</style>

<?php
if (isset($id)) {
    $project_id = $id;
} else {
    $project_id = $project_id;
}

$this->db->where('project_id', $project_id);
$this->db->where('view', $name);
$images = $this->db->get('upload')->result_array();

?>


<div class="container">
    <table class="table table-bordered table-striped" id="tableNB">
        <thead>
        <tr>
            <th class="text-center">#</th>
            <th>Description</th>
            <th>Preview</th>
            <th><?= $this->lang->line('btn-actions') ?></th>
        </tr>
        </thead>
        <tbody>
        <?php
        //$images = $this->db->get('upload')->result_array();
        foreach ($images as $row) {
            echo '<tr>';
            if (!empty($row['path'])) {
                echo '<td>' . $row['id'] . '</td>';
                echo '<td>' . $row['alt'] . '</td>';
                echo '<td> <a target="_blank" href="' . base_url() . $row['path'] . '"> <img src="' . base_url() . $row['path'] . '" class="img" alt="" /> </a> </td>';
                ?>
                <td style="max-width: 20px">
                    <div class="row center">
                        <div class="col-sm-4">
                            <a type="submit" class="btn btn-danger" href="<?= base_url("ImageUploadController/image_delete/" . $row['id'] . '/' . $project_id) ?>"><em
                                        class="fa fa-trash"></em><span class="hidden-xs"></span></a>
                        </div>
                    </div>
                </td>
                </tr>
                <?php
            } else {
                echo 'No images found.';
            }
        }

        ?>
        </tbody>
    </table>
</div>