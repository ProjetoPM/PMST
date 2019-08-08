<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header"> <?= $this->lang->line('scope_mp-title') ?></h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">

            <?php if ($scope_mp == null) { ?>
            <form action="<?= base_url() ?>ScopeManagement/insert/" method="post">
                <input type="hidden" name="project_id" value="<?php echo $project_id[0]; ?>">

                <div class="col-lg-12 form-group">
                    <label for="scope_specification"><?= $this->lang->line('scope_specification') ?></label>
                    <a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right"
                       title="<?= $this->lang->line('scope_specification-tooltip') ?>"><i
                                class="glyphicon glyphicon-comment"></i></a>
                    <div>
                        <textarea oninput="eylem(this, this.value)" class="form-control elasticteste"
                                  id="scope_specification" name="scope_specification" required="false"></textarea>
                    </div>
                </div>

                <div class=" col-lg-12 form-group">
                    <label for="eap_process"><?= $this->lang->line('eap_process') ?></label>
                    <a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right"
                       title="<?= $this->lang->line('eap_process-tooltip') ?>"><i
                                class="glyphicon glyphicon-comment"></i></a>
                    <div>
                        <textarea oninput="eylem(this, this.value)" class="form-control elasticteste" id="eap_process"
                                  name="eap_process"></textarea>
                    </div>
                </div>

                <div class=" col-lg-12 form-group">
                    <label for="deliveries_acceptance"><?= $this->lang->line('deliveries_acceptance') ?></label>
                    <a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right"
                       title="<?= $this->lang->line('deliveries_acceptance-tooltip') ?>"><i
                                class="glyphicon glyphicon-comment"></i></a>
                    <div>
                        <textarea oninput="eylem(this, this.value)" class="form-control elasticteste"
                                  id="deliveries_acceptance" name="deliveries_acceptance"></textarea>
                    </div>
                </div>

                <div class="col-lg-12 form-group">
                    <label for="scope_change_mp"><?= $this->lang->line('scope_change_mp') ?></label>
                    <a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right"
                       title="<?= $this->lang->line('scope_change_mp-tooltip') ?>"><i
                                class="glyphicon glyphicon-comment"></i></a>
                    <div>
                        <textarea oninput="eylem(this, this.value)" class="form-control elasticteste"
                                  id="scope_change_mp" name="scope_change_mp"></textarea>
                    </div>
                </div>

                <input type="hidden" name="status" value="1">

                <div class="col-lg-12">
                    <button id="tap-submit" type="submit" value="Save" class="btn btn-lg btn-success pull-right">
                        <i class="glyphicon glyphicon-ok"></i>
                        <?= $this->lang->line('btn-save') ?>
                    </button>
            </form>
            <form action="<?php echo base_url('project/'); ?><?php echo $project_id; ?>">
                <button class="btn btn-lg btn-info pull-left"><i
                            class="glyphicon glyphicon-chevron-left"></i> <?= $this->lang->line('btn-back') ?></button>
            </form>

        </div>
        </form>

        <?php } else { ?>

        <form action="<?= base_url() ?>ScopeManagement/update/<?php echo $scope_mp[0]->scope_mp_id; ?>" method="post">

            <input type="hidden" name="project_id" value="<?php echo $project_id; ?>">

            <div class=" col-lg-12 form-group">
                <label for="scope_specification"><?= $this->lang->line('scope_specification') ?></label>
                <a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right"
                   title="<?= $this->lang->line('scope_specification-tooltip') ?>"><i
                            class="glyphicon glyphicon-comment"></i></a
                >
                <div>
                    <textarea oninput="eylem(this, this.value)" class="form-control elasticteste"
                              id="scope_specification"
                              name="scope_specification"><?php echo $scope_mp[0]->scope_specification; ?></textarea>
                </div>
            </div>

            <div class=" col-lg-12 form-group">
                <label for="eap_process"><?= $this->lang->line('eap_process') ?></label>
                <a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right"
                   title="<?= $this->lang->line('eap_process-tooltip') ?>"><i
                            class="glyphicon glyphicon-comment"></i></a
                >
                <div>
                    <textarea oninput="eylem(this, this.value)" class="form-control elasticteste" id="eap_process"
                              name="eap_process"><?php echo $scope_mp[0]->eap_process; ?></textarea>
                </div>
            </div>

            <div class=" col-lg-12 form-group">
                <label for="deliveries_acceptance"><?= $this->lang->line('deliveries_acceptance') ?></label>
                <a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right"
                   title="<?= $this->lang->line('deliveries_acceptance-tooltip') ?>"><i
                            class="glyphicon glyphicon-comment"></i></a
                >
                <div>
                    <textarea oninput="eylem(this, this.value)" class="form-control elasticteste"
                              id="deliveries_acceptance"
                              name="deliveries_acceptance"><?php echo $scope_mp[0]->deliveries_acceptance; ?></textarea>
                </div>
            </div>

            <div class=" col-lg-12 form-group">
                <label for="scope_change_mp"><?= $this->lang->line('scope_change_mp') ?></label>
                <a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right"
                   title="<?= $this->lang->line('scope_change_mp-tooltip') ?>"><i
                            class="glyphicon glyphicon-comment"></i></a
                >
                <div>
                    <textarea oninput="eylem(this, this.value)" class="form-control elasticteste" id="scope_change_mp"
                              name="scope_change_mp"><?php echo $scope_mp[0]->scope_change_mp; ?></textarea>
                </div>
            </div>


            <input type="hidden" name="status" value="1">

            <div class="col-lg-12">
                <button id="tap-submit" type="submit" value="Save" class="btn btn-lg btn-success pull-right">
                    <i class="glyphicon glyphicon-ok"></i>
                    <?= $this->lang->line('btn-save') ?>
                </button>
        </form>
        <form action="<?php echo base_url('project/'); ?><?php echo $project_id; ?>">
            <button class="btn btn-lg btn-info pull-left"><i
                        class="glyphicon glyphicon-chevron-left"></i> <?= $this->lang->line('btn-back') ?></button>
        </form>

    </div>
    </form>

    <?php } ?>

    <br/>

		<div class="container">
		    <br />
		    <br />
		    <div align="center">
		        <button type="button" data-toggle="modal" data-target="#uploadModal" class="btn btn-info btn-lg">Upload Files</button>
		    </div>
		    <br /><br />
		    <div id="gallery">
		        <?php
		        $images = glob("upload/Project".$project_id."View"."4"."/*.*");
		     foreach($images as $image)
		     {
		         echo '<div class="col-md-1" align="center" >
						 <a href="' . base_url() . $image .'" download>
						 <img src="' . base_url() . $image .'" width="100px" height="100px" style="margin-top:15px; padding:8px; border:1px solid #ccc;" />
						 </a>
						 </div>';
		     }
		     ?>
		    </div>
		    <br />
		    <br />
		</div>
		<br />
		</body>

	</div>

		</html>
		<div id="uploadModal" class="modal fade">
		    <div class="modal-dialog">
		        <div class="modal-content">
		            <div class="modal-header">
		                <button type="button" class="close" data-dismiss="modal">&times;</button>
		                <h4 class="modal-title">Upload Multiple Files</h4>
		            </div>
		            <div class="modal-body">
		                <form method="post" id="upload_form" align="center" enctype="multipart/form-data">
		                  <input type="hidden" name="project_id" value="<?php echo $project_id; ?>">
		                  <input type="hidden" name="view_id" value="4">


		                    <input type="file" name="image_file" id="image_file" />
		                    <br />
		                    <br />
		                    <input type="submit" name="upload" id="upload" value="Upload" class="btn btn-info" />
		                </form>
		            </div>
		        </div>
		    </div>
		</div>

		<script>
		    $(document).ready(function(){
		        $('#upload_form').on('submit', function(e){
		            e.preventDefault();
		            if($('#image_file').val() == '')
		            {
		                alert("Please Select the File");
		            }
		            else
		            {
		                $.ajax({
		                    url:"<?php echo base_url(); ?>ScopeManagement/ajax_upload",
		                    method:"POST",
		                    data:new FormData(this),
		                    contentType: false,
		                    cache: false,
		                    processData:false,
		                    success:function(data)
		                    {
		                        $('#uploaded_image').html(data);
		                        location.reload();
		                    }
		                });
		            }
		        });
		    });
		</script>

    <?php $this->load->view('frame/footer_view') ?>
