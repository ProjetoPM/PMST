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
		<div class="row">
			<div class="col-lg-12">      

				<form action="<?=base_url()?>project/add_project/" method="post">


					<!-- Textarea-->
					<div class="form-group">
						<label for="shedule_mp_id">Project Timeline Development Template</label>  
						<div >
							<textarea class="form-control" id="shedule_mp_id" name="shedule_mp_id">
							</textarea>
						</div>
					</div>

					<!-- Textarea-->
					<div class="form-group">
						<label for="shedule_model">Shedule Model</label>  
						<div >
							<textarea class="form-control" id="shedule_model" name="shedule_model">
							</textarea>
						</div>
					</div>

					<!-- Textarea-->
					<div class="form-group">
						<label for="accuracy_level">Accuary Leve</label>  
						<div >
							<textarea class="form-control" id="accuracy_level" name="accuracy_level">
							</textarea>
						</div>
					</div>

					<!-- Textarea-->
					<div class="form-group">
						<label for="organizational_procedures">Organizational Procedures</label>  
						<div >
							<textarea class="form-control" id="organizational_procedures" name="organizational_procedures">
							</textarea>
						</div>
					</div>

					<!-- Textarea-->
					<div class="form-group">
						<label for="shedule_maintenance">Shedule Maintenance</label>  
						<div >
							<textarea class="form-control" id="shedule_maintenance" name="shedule_maintenance">
							</textarea>
						</div>
					</div>

					<!-- Textarea-->
					<div class="form-group">
						<label for="performance_measurement">Performance Measurement</label>						<div >
							<textarea class="form-control" id="performance_measurement" name="performance_measurement">
							</textarea>
						</div>
					</div>

					<!-- Textarea-->
					<div class="form-group">
						<label for="report_format">Report Format</label>						<div >
							<textarea class="form-control" id="report_format" name="report_format">
							</textarea>
						</div>
					</div>

					<input id="shedule-submit" type="submit" value="Save" class="btn btn-lg btn-success btn-block">

				</form>


			</div>
			<!-- /.col-lg-12 -->
		</div>
		<!-- /.row -->
	</div>
	<?php $this->load->view('frame/footer_view')?>