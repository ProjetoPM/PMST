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
                <?php echo form_open_multipart('ImageUploadController/profile_photo_upload/'); ?>
               
                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label for="first">Select File</label>
                            <input type="file" placeholder="" name="pic" required>
                        </div>
                    </div>
                </div>


            </div>

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