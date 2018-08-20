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
            <?php
                if($human_resources_mp == NULL){

            ?>
            <form method="POST" action="<?php echo base_url('human_resource/insert/'); ?><?php echo $id[0]; ?>">
                <input type="hidden" name="id" value="<?php echo $id[0];?>">

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
                  <label for="staff_mp">Staff</label>
                  <div >                     
                    <textarea class="form-control" id="staff_mp" name="staff_mp"></textarea>
                  </div>
                </div>

                <input id="human_resource-submit" type="submit" value="Save" class="btn btn-lg btn-success btn-block">
            </form>
            <?php
              }else{

            ?>
            <form action="<?=base_url()?>human_resource/update/<?php echo $human_resources_mp[0]->human_resources_mp_id;?>" method="post">

            <input id="project_id" name="project_id" type="hidden" value="<?= $human_resources_mp[0]->project_id;?>">

              <!-- Textarea -->
              <div class="form-group">
                <label for="roles_responsibilities">Roles Responsibilities</label>
                <div >                 
                  <textarea class="form-control" id="roles_responsibilities" name="roles_responsibilities"><?= $human_resources_mp[0]->roles_responsibilities;?></textarea>  
                </div>
              </div>

              <!-- Textarea -->
              <div class="form-group">
                <label for="organizational_chart">Organizational Chart
                </label>
                <div >     
                  <textarea class="form-control" id="organizational_chart" name="organizational_chart"><?= $human_resources_mp[0]->organizational_chart;?></textarea>
                </div>
              </div>

              <!-- Textarea -->
              <div class="form-group">
                <label for="staff_mp">Staff_mp</label>
                <div>
                <textarea class="form-control" id="staff_mp" name="staff_mp"><?= $human_resources_mp[0]->staff_mp;?></textarea>             
                </div>
              </div>

              <input id="new_human_resource-submit" type="submit" value="Update" class="btn btn-lg btn-success btn-block">
            </form>
            <?php
            } 
        ?>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
</div>
<?php $this->load->view('frame/footer_view')?>