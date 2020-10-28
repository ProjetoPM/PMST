<div class="row" style="padding-top: 1px">
    <div class="col-lg-12">
        <div class="col-lg-12">
            <h3>Attachment Upload (Images)</h3>
            <?php echo form_open_multipart('ImageUploadController/image_upload/', array('id' => 'img')); ?>
            <div class="row">
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="first">Img Description</label>
                        <input type="text" class="form-control" placeholder="" name="alt" required>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <div class="form-group">
                        <label for="first">Select File</label>
                        <input type="file" placeholder="" name="pic" required>
                    </div>
                </div>
            </div>

            <input type="hidden" name="view" value="<?php echo $name ?>">
            <input type="hidden" name="project_id" value="<?php if (isset($id)) {
                                                                echo $id;
                                                            } else {
                                                                echo $_SESSION['project_id'];
                                                            } ?>">

            <div class="row">
                <div class="col-lg-12">
                    <button name="submit" class="btn btn-primary" type="submit" id="img-submit" data-submit="...Enviando">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>