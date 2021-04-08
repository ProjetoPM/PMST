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
          <?php
            if($risk_mp != NULL){
          ?>
            <form action="<?=base_url()?>risk/update/<?php echo $risk_mp[0]->risk_mp_id; ?>" method="post">
              <input type="hidden" name="project_id" value="<?php echo $project_id;?>">
                <div class="form-group">
                  <label for="methodology">Methodology</label>
                  <div >                     
                    <textarea class="form-control" id="methodology" name="methodology"><?php echo $risk_mp[0]->methodology; ?></textarea>
                  </div>
                </div>
                <div class="form-group">
                  <label for="roles_responsibilities">Roles Responsabilities</label>
                  <div >                     
                    <textarea class="form-control" id="roles_responsibilities" name="roles_responsibilities"><?php echo $risk_mp[0]->roles_responsibilities; ?></textarea>
                  </div>
                </div>
                <div class="form-group">
                  <label for="probability_impact_matrix">Probability Impact Matrix</label>
                  <div >                     
                    <textarea class="form-control" id="probability_impact_matrix" name="probability_impact_matrix"><?php echo $risk_mp[0]->probability_impact_matrix; ?></textarea>
                  </div>
                </div>
                <div class="form-group">
                  <label for="risk_management_processes">Risk Management Processes</label>
                  <div >                     
                    <textarea class="form-control" id="risk_management_processes" name="risk_management_processes"><?php echo $risk_mp[0]->risk_management_processes; ?></textarea>
                  </div>
                </div>
                <div class="form-group">
                  <label for="risks_categories">Risks Categories</label>
                  <div >                     
                    <textarea class="form-control" id="risks_categories" name="risks_categories"><?php echo $risk_mp[0]->risks_categories; ?></textarea>
                  </div>
                </div>

                <div class="form-group">
                  <label for="risks_probability_impact">Risk Probability Impact</label>
                  <div >                     
                    <textarea class="form-control" id="risks_probability_impact" name="risks_probability_impact"><?php echo $risk_mp[0]->risks_probability_impact; ?></textarea>
                  </div>
                </div>
                <div class="form-group">
                  <label for="reviewed_tolerances">Reviewed Tolerances</label>
                  <div >                     
                    <textarea class="form-control" id="reviewed_tolerances" name="reviewed_tolerances"><?php echo $risk_mp[0]->reviewed_tolerances; ?></textarea>
                  </div>
                </div>
                <div class="form-group">
                  <label for="traceability">Traceability</label>
                  <div >                     
                    <textarea class="form-control" id="traceability" name="traceability"><?php echo $risk_mp[0]->traceability; ?></textarea>
                  </div>
                </div>
                <div class="form-group">
                  <label>Status:</label> <br></br>
                <?php 
                  if($risk_mp[0]->status == 1){
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
          <?php
            }else{
          ?>
            <form action="<?=base_url()?>risk/insert/" method="post">
            	<input type="hidden" name="project_id" value="<?php echo $project_id[0];?>">
                <div class="form-group">
                  <label for="methodology">Methodology</label>
                  <div >                     
                    <textarea class="form-control" id="methodology" name="methodology"></textarea>
                  </div>
                </div>
                <div class="form-group">
                  <label for="roles_responsibilities">Roles Responsabilities</label>
                  <div >                     
                    <textarea class="form-control" id="roles_responsibilities" name="roles_responsibilities"></textarea>
                  </div>
                </div>
                <div class="form-group">
                  <label for="probability_impact_matrix">Probability Impact Matrix</label>
                  <div >                     
                    <textarea class="form-control" id="probability_impact_matrix" name="probability_impact_matrix"></textarea>
                  </div>
                </div>
                <div class="form-group">
                  <label for="risk_management_processes">Risk Management Processes</label>
                  <div >                     
                    <textarea class="form-control" id="risk_management_processes" name="risk_management_processes"></textarea>
                  </div>
                </div>
                <div class="form-group">
                  <label for="risks_categories">Risks Categories</label>
                  <div >                     
                    <textarea class="form-control" id="risks_categories" name="risks_categories"></textarea>
                  </div>
                </div>

                <div class="form-group">
                  <label for="risks_probability_impact">Risk Probability Impact</label>
                  <div >                     
                    <textarea class="form-control" id="risks_probability_impact" name="risks_probability_impact"></textarea>
                  </div>
                </div>
                <div class="form-group">
                  <label for="reviewed_tolerances">Reviewed Tolerances</label>
                  <div >                     
                    <textarea class="form-control" id="reviewed_tolerances" name="reviewed_tolerances"></textarea>
                  </div>
                </div>
                <div class="form-group">
                  <label for="traceability">Traceability</label>
                  <div >                     
                    <textarea class="form-control" id="traceability" name="traceability"></textarea>
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
</div>
<!-- /.row -->
</div>
</div>

<?php $this->load->view('frame/footer_view')?>            