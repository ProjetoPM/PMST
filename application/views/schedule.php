<div id="page-wrapper">
	<div class="row">
		<div class="col-lg-12">
			<h1 class="page-header">Shedule</h1>
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

				<?php if($schedule_mp==null)
				{
					?>
				<form method="post" action="<?php echo base_url('schedule/createSchedule/');?>">

						<input type="hidden" name="project_id" value="<?php echo $project[0]->project_id; ?>">


						<div class="form-group">
							<label>Shedule Model</label>
							<textarea class="form-control" name="schedule_model">
							</textarea>
						</div>

						<div class="form-group">
							<label>Accuary Leve</label>  
							<textarea class="form-control"  name="accuracy_level">
							</textarea>
						</div>


						<div class="form-group">
							<label>Organizational Procedures</label>  
							<textarea class="form-control"  name="organizational_procedures">

							</textarea>
						</div>


						<div class="form-group">
							<label>Shedule Maintenance</label>  
							<textarea class="form-control"  name="schedule_maintenance">

							</textarea>
						</div>

						<div class="form-group">
							<label>Performance Measurement</label>					
							<textarea class="form-control" name="performance_measurement">
							</textarea>
						</div>

						<!-- Textarea-->
						<div class="form-group">
							<label>Report Format</label>						
							<textarea class="form-control" name="report_format">

							</textarea>

						</div>


						<button type="submit" class="btn btn-lg btn-success btn-block">Save</button> 
					</form>

				<?php }else{
					foreach ($schedule_mp as $schedule) {
						?>

						<form method="post" action="<?php echo base_url('schedule/updateSchedule/');?><?php echo $id; ?>">



							<!-- Textarea-->
							<div class="form-group">
								<label> Project Timeline Development Template</label>

							</div>


							<!-- Textarea-->
							<div class="form-group">
								<label>Shedule Model</label>
								<textarea class="form-control" id="schedule_model" name="schedule_model">
									<?php  
									echo $schedule->schedule_model;
									?>
								</textarea>
							</div>


							<!-- Textarea-->
							<div class="form-group">
								<label>Accuary Leve</label>  
								<textarea class="form-control" id="accuracy_level" name="accuracy_level">
									<?php  
									echo $schedule->accuracy_level; 
									?>
								</textarea>
							</div>


							<!-- Textarea-->
							<div class="form-group">
								<label>Organizational Procedures</label>  
								<textarea class="form-control" id="organizational_procedures" name="organizational_procedures">
									<?php  
									echo $schedule->organizational_procedures; 
									?>
								</textarea>
							</div>


							<!-- Textarea-->
							<div class="form-group">
								<label>Shedule Maintenance</label>  
								<textarea class="form-control" id="schedule_maintenance" name="schedule_maintenance">

									<?php  
									echo $schedule->schedule_maintenance; 
									?>
								</textarea>
							</div>

							<!-- Textarea-->
							<div class="form-group">
								<label>Performance Measurement</label>					
								<textarea class="form-control" id="performance_measurement" name="performance_measurement">
									<?php  
									echo $schedule->performance_measurement; 
									?>
								</textarea>
							</div>

							<!-- Textarea-->
							<div class="form-group">
								<label>Report Format</label>						
								<textarea class="form-control" id="report_format" name="report_format">
									<?php  
									echo $schedule->report_format; 
									?>
								</textarea>

							</div>



							<button type="submit" class="btn btn-lg btn-success btn-block">Update</button> 
						</form>



						<?php
					}
				}
				?>
			</div>
			<!-- /.col-lg-12 -->
		</div>
		<!-- /.row -->
	<?php $this->load->view('frame/footer_view')?>