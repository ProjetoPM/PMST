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
					<p class="text-center text-muted h5">End of Project Term</p>
				</div>
				<?php
				$valida=false;
				foreach ($project_closure_term as $tep){
					if($tep->project_id==$id){
						$valida=true;
						?>
						<form method="POST" action="<?php echo base_url('TEP/insert/'); ?><?php echo $id; ?>">
							<div class="form-group">
								<label>Client:</label>
								<input type="text" class="form-control" value="<?php echo $tep->client; ?>" name="client">
							</div>
							<div>
									<label>Date of project closure:</label><br>
									<input type="date" name="closing_date"><br></br>
							</div>
							<div class="form-group">
								<label>Main changes approved:</label>
								<input type="text" class="form-control" value="<?php echo $tep->changes_approved; ?>" name="changes_approved">
							</div>
							<div class="form-group">
								<label>Main deviationst:</label>
								<input type="text" class="form-control" value="<?php echo $tep->main_deviations; ?>" name="main_deviations">
							</div>
							<div class="form-group">
								<label>Main lessons learned:</label>
								<input type="text" class="form-control" value="<?php echo $tep->lessons_learned; ?>" name="lessons_learned">
							</div>
							<div class="form-group">
								<label>Client comments:</label>
								<input type="text" class="form-control" value="<?php echo $tep->client_comments; ?>" name="client_comments">
							</div>
							<div class="form-group">
								<label>Sponsor's comments:</label>
								<input type="text" class="form-control" value="<?php echo $tep->sponsor_comments; ?>" name="sponsor_comments">
							</div>
							<button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-check"></span>Update</button>
						</form> 
						<?php
					}
				}
				if($valida==false){
					?>

					<form method="POST" action="<?php echo base_url('TEP/insert/'); ?><?php echo $id; ?>">
						<div class="form-group">
							<label>Client:</label>
							<input type="text" class="form-control" name="client">
						</div>
						<div class="form-group">
							<label>Date of project closure:</label>
							<input type="text" class="form-control" name="closing_date">
						</div>
						<div class="form-group">
							<label>Main changes approved:</label>
							<input type="text" class="form-control" name="changes_approved">
						</div>
						<div class="form-group">
							<label>Main deviations:</label>
							<input type="text" class="form-control" name="main_deviations">
						</div>
						<div class="form-group">
							<label>Main lessons learned:</label>
							<input type="text" class="form-control" name="lessons_learned">
						</div>
						<div class="form-group">
							<label>Customer comments:</label>
							<input type="text" class="form-control" name="client_comments">
						</div>
						<div class="form-group">
							<label>Sponsor's comments:</label>
							<input type="text" class="form-control" name="sponsor_comments">
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
	