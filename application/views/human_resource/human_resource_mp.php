<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header"> Human Resource </h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->

    <?php if($this->session->flashdata('success')):?>
        <div class="alert alert-success">
        <a href="#" class="close" data-dismiss="alert">&times;</a>
        <strong><?php echo $this->session->flashdata('success'); ?></strong>
        </div>
    <?php elseif($this->session->flashdata('error')):?>
        <div class="alert alert-warning">
        <a href="#" class="close" data-dismiss="alert">&times;</a>
        <strong><?php echo $this->session->flashdata('error'); ?></strong>
        </div>
    <?php endif;?>
    <div class="row">
        <div class="col-lg-12">      
            
            <form action="<?=base_url()?>project/add_project/" method="post">
                

                <!-- Text input-->
                <!-- <div class="form-group">
                  <label for="roles_responsibilities">Roles Responsibilities</label>  
                  <div >
                  <input id="roles_responsibilities" name="roles_responsibilities" type="text" placeholder="Roles responsibilities" class="form-control input-md" required="true">
                  </div>
                </div> -->


                <!-- Textarea -->
                <div class="form-group">
                  <label for="roles_responsibilities">Roles Responsibilities</label>
                  <div >                     
                    <textarea class="form-control" id="roles_responsibilities" name="roles_responsibilities"></textarea>
                  </div>
                </div>

                <!-- Textarea -->
                <div class="form-group">
                  <label for="organizational_chart">Organizational Chart</label>
                  <div >                     
                    <textarea class="form-control" id="organizational_chart" name="organizational_chart"></textarea>
                  </div>
                </div>

                <!-- Textarea -->
                <div class="form-group">
                  <label for="staff">Staff</label>
                  <div >                     
                    <textarea class="form-control" id="staff" name="staff"></textarea>
                  </div>
                </div>
                <input id="human_resource-submit" type="submit" value="Save" class="btn btn-lg btn-success btn-block">

                
            </form>


        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
</div>
<?php $this->load->view('frame/footer_view')?>