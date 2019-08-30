<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>


<div class="container">
    <?php echo form_open_multipart('ImageUploadController/image_upload/', array('id' => 'img')); ?>
    <h3>Anexar Imagens</h3>
    <!--    <h4><a href="--><?php //echo base_url().'index.php/Welcome/images';?><!--">View Images</a></h4>-->

    <input type="file" name="pic" tabindex="2" required>
    <input type="hidden" name="view" value="<?php echo $name ?>">
    <input type="hidden" name="project_id" value="<?php if (isset($id)) {
        echo $id;
    } else {
        echo $project_id;
    } ?>">


    <button name="submit" type="submit" id="img-submit" data-submit="...Enviando">Submit</button>

    </form>
</div>