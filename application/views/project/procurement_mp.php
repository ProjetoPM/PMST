<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Projects</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
            <!-- /.row -->          
        <div class="row">
        <div class="col-lg-6">
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

                <!-- Textarea -->
                <div class="form-group">
        	        <label>Status:</label> <br></br>
		            <input type="radio" checked name="status" value="1">
           		 	<label>On</label><br>
            		<input type="radio" name="status" value="0">
            		<label>Off</label>                
            	</div>
               	<input id="risk-submit" type="submit" value="Save" class="btn btn-lg btn-success btn-block">
              </form>
<!-- AQUI VAI FINALIZAR A VIEW DO GERENCIAMENTO DE RISCOS!!!! -->
</div>
<!-- /.row -->
</div>
</div>

<<<<<<< HEAD
<?php $this->load->view('frame/footer_view')?>
=======
<?php $this->load->view('frame/footer_view')?>            
>>>>>>> deba48088d3dd7a6de807a468a21639ae325c092
