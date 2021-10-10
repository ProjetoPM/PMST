<!-- Modal Milestone -->
<div class="modal fade" id="uploadProfilePhoto" role="dialog" aria-labelledby="ModalmyAccount" aria-hidden="true" tabindex="-1">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h3 class="modal-title">Attachment Upload</h3>
            </div>


            <div class="modal-body">
                <?php $this->db->where('user_id', $_SESSION['user_id']);
                $datauser = $this->db->get('user')->result();
                foreach ($datauser as $data) { ?>
                    <?php echo form_open_multipart('ImageUploadController/profile_photo_upload/'); ?>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="first">Select File</label>
                                <input type="file" placeholder="Choose a file" name="pic" required>
                            </div>
                        </div>

                        <div>
                            <img src="<?php echo $data->photo_path ?>" id="cropbox" class="img" /> <br />
                            <?php var_dump($data->photo_path); ?>
                        </div>
                        <div>
                            <input type="button" id="crop" value='CROP'>
                        </div>
                        <div>
                            <img src="#" id="cropped_img" style="display: none;">
                        </div>
                    </div>
            </div>
        <?php } ?>

        <div class="modal-footer">
            <div class="row">
                <div class="col-lg-12">
                    <button data-submit="...Enviando" type="submit" value="Save" class="btn btn-lg btn-success pull-right">
                        <i class="glyphicon glyphicon-ok"></i> <?= $this->lang->line('btn-save') ?>
                    </button>
                    </form>
                    <button type="button" class="btn btn-lg btn-default pull-left" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
        </div>
    </div>
</div>
<!-- Modal Milestone End -->

<script type="text/javascript">
    $(document).ready(function() {
        var size;
        $('#cropbox').Jcrop({
            aspectRation: 1,
            onSelect: function(c) {
                size = {
                    x: c.x,
                    y: c.y,
                    w: c.w,
                    h: c.h
                };
                $("#crop").css("visibility", "visible");
            }
        });
        $("#crop").click(function() {
            alert("teste");
            var img = $("#cropbox").attr('src');
            $("#cropped_img").show();
            $("#cropped_img").attr('src', 'image-crop.php?x=' + size.x + '&y=' + size.y + '&w=' + size.w + '&h=' + size.h + '&img=' + img);
        });
    });
</script>