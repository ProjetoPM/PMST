<?php
if (isset($id)) {
    $weekly_report_id = $id;
}

$this->db->where('weekly_report_id', $weekly_report_id);
$images = $this->db->get('report_uploads')->result_array();

?>

<div class="row" style="padding-top: 20px">

    <div class="col-lg-12">
        <div class="col-lg-12">
            <?php if ($images == null) {
            ?>
                <!-- <p style="text-align: center;">No Upload Images!</p> -->
            <?php } else {
            ?>
                <h3 class="page-header" style="text-align: center;"><?= $this->lang->line('upload_list')?></h3>
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th class="text-center">#</th>
                            <th><?= $this->lang->line('photo_description') ?></th>
                            <th><?= $this->lang->line('photo_preview') ?></th>
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
                                echo '<td> <a target="_blank" href="' . base_url() . $row['path'] . '">
                             <img style="
        padding-top: 5px;
        border: 1px solid #ddd;
        border-radius: 4px;
        padding: 5px;
        width: 130px;
    "
 src="' . base_url() . $row['path'] . '" class="imagem" alt="" /> </a> </td>';
                        ?>
                                <td style="max-width: 20px">
                                    <div class="row center">
                                        <div class="col-sm-4">
                                            <a type="submit" class="btn btn-danger" href="<?= base_url("ImageUploadController/image_delete/" . $row['id'] . '/' . $weekly_report_id) ?>"><em class="fa fa-trash"></em><span class="hidden-xs"></span></a>
                                        </div>
                                    </div>
                                </td>
                                </tr>
                    <?php
                            } else {
                                echo $this->lang->line('no_image');
                            }
                        }
                    }

                    ?>
                    </tbody>
                </table>
        </div>
    </div>
</div>