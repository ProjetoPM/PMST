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

        	<?php if ($project_charter == null) { ?>
        		<form action="<?=base_url()?>tap/insert_tap/" method="post">
            	<input type="hidden" name="project_id" value="<?php echo $project_id[0];?>">

            	<div class="form-group">
                  <label for="project_description">Project Description</label>
                  <div >                     
                    <textarea class="form-control" id="project_description" name="project_description"></textarea>
                  </div>
                </div>

                <div class="form-group">
                  <label for="project_purpose">Project Purpose</label>
                  <div >                     
                    <textarea class="form-control" id="project_purpose" name="project_purpose"></textarea>
                  </div>
                </div>

                <div class="form-group">
                  <label for="project_objective">Project Objectives</label>
                  <div >                     
                    <textarea class="form-control" id="project_objective" name="project_objective"></textarea>
                  </div>
                </div>

                <div class="form-group">
                  <label for="benefits">Benefits</label>
                  <div >                     
                    <textarea class="form-control" id="benefits" name="benefits"></textarea>
                  </div>
                </div>

                <div class="form-group">
                  <label for="high_level_requirements">High Level Requirements</label>
                  <div >                     
                    <textarea class="form-control" id="high_level_requirements" name="high_level_requirements"></textarea>
                  </div>
                </div>

                <div class="form-group">
                  <label for="initial_assumptions">Initial Assumptions</label>
                  <div >                     
                    <textarea class="form-control" id="initial_assumptions" name="initial_assumptions"></textarea>
                  </div>
                </div>

                <div class="form-group">
                  <label for="initial_restrictions">Initial Restrictions</label>
                  <div >                     
                    <textarea class="form-control" id="initial_restrictions" name="initial_restrictions"></textarea>
                  </div>
                </div>

                <div class="form-group">
                  <label for="project_limits">Project Limits</label>
                  <div >                     
                    <textarea class="form-control" id="project_limits" name="project_limits"></textarea>
                  </div>
                </div>

                <div class="form-group">
                  <label for="high_level_risks">High Level Risks</label>
                  <div >                     
                    <textarea class="form-control" id="high_level_risks" name="high_level_risks"></textarea>
                  </div>
                </div>

                <div class="form-group">
                  <label for="summary_schedule">Summary Schedule</label>
                  <div >                     
                    <textarea class="form-control" id="summary_schedule" name="summary_schedule"></textarea>
                  </div>
                </div>

                <div class="form-group">
                  <label for="budge_summary">Budge Summary</label>
                  <div >                     
                    <textarea class="form-control" id="budge_summary" name="budge_summary"></textarea>
                  </div>
                </div>

                <!-- VERIFICAR STAKEHOLDER NO DB !!!!!!!!!!!! -->

                <div>
                	<form action="/action_page.php">
                		Enter start date: <br></br>
                		<input type="date" name="start_date" max="2017-12-31"><br></br>
                		Enter final date: <br>
                		<input type="date" name="final_date" min="2025-01-02"><br></br>
                		<input type="submit">
                	</form>

                </div>
        	<?php } ?> 

</div>
<!-- /.row -->
</div>
</div>

<?php $this->load->view('frame/footer_view')?>                    	