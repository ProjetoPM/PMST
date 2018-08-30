<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Projects</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>

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
            <!-- /.row -->          
        <div class="row">
        <div class="col-lg-6">
          <?php
                if($procurement_mp != NULL){
                  //var_dump($project_id);
                  //die();
            ?>
            <form action="<?=base_url()?>procurement/update/<?php echo $procurement_mp[0]->procurement_mp_id;?>" method="post">
            	
                <!-- Textarea -->
                <div class="form-group">
                  <label for="products_services_obtained">Products Services Obtained</label>
                  <div >                     
                    <textarea class="form-control" id="products_services_obtained" name="products_services_obtained"><?php echo $procurement_mp[0]->products_services_obtained?></textarea>
                  </div>
                </div>

                <!-- Textarea -->
                <div class="form-group">
                  <label for="team_actions">Team Actions</label>
                  <div >                     
                    <textarea class="form-control" id="team_actions" name="team_actions"><?php echo $procurement_mp[0]->team_actions?></textarea>
                  </div>
                </div>
                <div class="form-group">
                  <label for="performance_metrics">Performance Metrics</label>
                  <div >                     
                    <textarea class="form-control" id="performance_metrics" name="performance_metrics"><?php echo $procurement_mp[0]->performance_metrics?></textarea>
                  </div>
                </div>
                <div class="form-group">
                   <label>Status:</label> <br></br>
                    <?php if($procurement_mp[0]->status == 1){?>
                      <input type="radio" checked name="status" value="1">
                      <label>On</label><br>
                      <input type="radio" name="status" value="0">
                      <label>Off</label>
                   <?php
                    }else{
                  ?>
                      <input type="radio" checked name="status" value="1">
                      <label>On</label><br>
                      <input type="radio" name="status" value="0">
                      <label>Off</label>
                    <?php
                      }
                  ?>
              </div>
               	<input id="risk-submit" type="submit" value="Save" class="btn btn-lg btn-success btn-block">
              </form>
              <?php
                }else{
              ?>
                <form action="<?=base_url()?>procurement/insert/" method="post">
              <input type="hidden" name="project_id" value="<?php echo $project_id[0];?>">
                <!-- Textarea -->
                <div class="form-group">
                  <label for="products_services_obtained">Products Services Obtained</label>
                  <div >                     
                    <textarea class="form-control" id="products_services_obtained" name="products_services_obtained"></textarea>
                  </div>
                </div>

                <!-- Textarea -->
                <div class="form-group">
                  <label for="team_actions">Team Actions</label>
                  <div >                     
                    <textarea class="form-control" id="team_actions" name="team_actions"></textarea>
                  </div>
                </div>
                <div class="form-group">
                  <label for="performance_metrics">Performance Metrics</label>
                  <div >                     
                    <textarea class="form-control" id="performance_metrics" name="performance_metrics"></textarea>
                  </div>
                </div>
                <div class="form-group">
                  <label>Status:</label> <br></br>
                <input type="radio" checked name="status" value="1">
                <label>On</label><br>
                <input type="radio" name="status" value="0">
                <label>Off</label>                
              </div>
                    
                <input id="risk-submit" type="submit" value="Save" class="btn btn-lg btn-success btn-block">
              </form>
              <?php
                }
              ?>
<!-- AQUI VAI FINALIZAR A VIEW DO GERENCIAMENTO DE RISCOS!!!! -->
</div>
<!-- /.row -->
</div>
</div>
<?php $this->load->view('frame/footer_view')?>            
