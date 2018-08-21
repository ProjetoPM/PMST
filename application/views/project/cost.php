<div id="page-wrapper">
	<div class="row">
		<div class="col-lg-12">
			<h1 class="page-header"></h1>
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
				<h3>
					<span class="pull-right"><a href="<?php echo base_url(); ?>" class="btn btn-primary"><span class="glyphicon glyphicon-arrow-left"></span> Back</a></span>
				</h3>
				<div class="container-fluid">
					<p class="text-center text-muted h5">Fill in the fields</p>
				</div>
				<?php
				$valida=false;
				foreach ($cost_mp as $cost){
					if($cost->project_id==$id){
						$valida=true;
						?>
						<form method="POST" action="<?php echo base_url('GerenciarCustos/insert/'); ?><?php echo $id; ?>">
							<div class="form-group">
								<label>Processes for managing project costs:</label>
								<input type="text" class="form-control" value="<?php echo $cost->project_costs_m; ?>" name="project_costs_m">
							</div>
							<div class="form-group">
								<label>Required accuracy level, limits and units of measure to be used:</label>
								<input type="text" class="form-control" value="<?php echo $cost->accuracy_level; ?>" name="accuracy_level">
							</div>
							<div class="form-group">
								<label>Related Organizational Procedures:</label>
								<input type="text" class="form-control" value="<?php echo $cost->organizational_procedures; ?>" name="organizational_procedures">
							</div>
							<div class="form-group">
								<label>Rules for Performance Measurement:</label>
								<input type="text" class="form-control" value="<?php echo $cost->measurement_rules; ?>" name="measurement_rules">
							</div>
							<div class="form-group">
								<label>Report format:</label>
								<input type="text" class="form-control" value="<?php echo $cost->format_report; ?>" name="format_report">
							</div>
							<button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-check"></span>Update</button>
						</form> 
						<?php
					}
				}
				if($valida==false){
					?>

					<form method="POST" action="<?php echo base_url('GerenciarCustos/insert/'); ?><?php echo $id; ?>">
						<div class="form-group">
							<label>Processes for managing project costs:</label>
							<input type="text" class="form-control" name="project_costs_m">
						</div>
						<div class="form-group">
							<label>Required accuracy level, limits and units of measure to be used:</label>
							<input type="text" class="form-control" name="accuracy_level">
						</div>
						<div class="form-group">
							<label>Related Organizational Procedures:</label>
							<input type="text" class="form-control" name="organizational_procedures">
						</div>
						<div class="form-group">
							<label>Rules for Performance Measurement:</label>
							<input type="text" class="form-control" name="measurement_rules">
						</div>
						<div class="form-group">
							<label>Report format:</label>
							<input type="text" class="form-control" name="format_report">
						</div>
						<button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-floppy-disk"></span> Save</button>
					</form>
					<?php
				}
				?>
			</section>
		</div>
	</div>
	<?php $this->load->view('frame/footer_view')?>
	