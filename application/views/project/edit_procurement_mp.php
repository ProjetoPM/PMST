<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Projects</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
            <!-- /.row -->
        <?php extract($procurement_mp);?>          
        <div class="row">
        <div class="col-lg-12">
            <form action="<?=base_url()?>procurement/update/<?php echo $procurement_id;?>" method="post">
            	<input type="hidden" name="project_id" value="<?php echo $project_id;?>">
                <!-- Textarea -->
                <div class="form-group">
                  <label for="products_services_obtained">Products Services Obtained</label>
                  <div >                     
                    <textarea class="form-control" id="products_services_obtained" name="products_services_obtained"><?php echo $products_services_obtained;?></textarea>
                  </div>
                </div>
                <div class="form-group">
                  <label for="team_actions">Team Actions</label>
                  <div >                     
                    <textarea class="form-control" id="team_actions" name="team_actions"><?php echo $team_actions;?></textarea>
                  </div>
                </div>
                <div class="form-group">
                  <label for="performance_metrics">Performance Metrics</label>
                  <div >                     
                    <textarea class="form-control" id="performance_metrics" name="performance_metrics"><?php echo $performance_metrics;?></textarea>
                  </div>
                </div>
                <div class="form-group">
        	        <label>Status:</label> <br></br>
		              <?php 
                  if($status == 1){
                ?>
                  <input type="radio" checked name="status" value="1">
                  <label>On</label><br>
                  <input type="radio" name="status" value="0">
                  <label>Off</label>
                <?php
                  }else{
                ?>
                  <input type="radio" name="status" value="1">
                  <label>On</label><br>
                  <input type="radio" checked name="status" value="0">
                  <label>Off</label>
                <?php
                  }
                ?>         
            	</div>
               	<input id="risk-submit" type="submit" value="Save" class="btn btn-lg btn-success btn-block">
              </form>
<!-- AQUI VAI FINALIZAR A VIEW DO GERENCIAMENTO DE RISCOS!!!! -->
</div>
<!-- /.row -->
</div>
</div>

<?php
$this->load->view('frame/footer_view')?>            