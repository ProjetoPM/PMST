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
				<h3>Stakeholder Registration
					<form action="<?php echo base_url('project/'); ?><?php echo $id; ?>" >
					<button class="btn btn-primary pull-right" > Back</button></form>
				</h3>
				<div class="container-fluid">
					<p class="text-center text-muted h5">Fill in the fields</p>
				</div>
				<form method="POST" action="<?php echo base_url('GerenciarStake/insert/'); ?><?php echo $id; ?>">
					<div class="form-group">
						<label>Name:</label><a href="#" type="button" id="tooltip" data-toggle="tooltip" data-placement="top" title="Name of new stakeholder">
									?
								</a>
						<input type="text" class="form-control" name="name">
					</div>
					<div class="form-group">
						<label>Type:</label><a href="#" type="button" id="tooltip" data-toggle="tooltip" data-placement="top" title="Type of new stakeholder">
									?
								</a>
						<select name="type">
							<option value="External">External</option>
							<option value="Internal">Internal</option>
						</select>
					</div>
					<div class="form-group">
						<label>Organization:</label><a href="#" type="button" id="tooltip" data-toggle="tooltip" data-placement="top" title="Organization of new stakeholder">
									?
								</a>
						<input type="text" class="form-control" name="organization">
					</div>
					<div class="form-group">
						<label>Position in organization:</label><a href="#" type="button" id="tooltip" data-toggle="tooltip" data-placement="top" title="Position in organization of new stakeholder">
									?
								</a>
						<input type="text" class="form-control" name="position">
					</div>
					<div class="form-group">
						<label>Main Role in the Project:</label><a href="#" type="button" id="tooltip" data-toggle="tooltip" data-placement="top" title="Role of new stakeholder in project">
									?
								</a>
						<select name="role">
							<option value="Client">Client</option>
							<option value="Team">Team</option>
							<option value="Provider">Provider</option>
							<option value="Project manager">Project manager</option>
							<option value="Sponsor">Sponsor</option>
							<option value="Others">Others</option>
						</select>
					</div>
					<div class="form-group">
						<label>Main Project Responsibility:</label><a href="#" type="button" id="tooltip" data-toggle="tooltip" data-placement="top" title="Responsibility of new stakeholder in project">
									?
								</a>
						<input type="text" class="form-control" name="responsibility">
					</div>
					<div class="form-group">
						<label>E-mail:</label><a href="#" type="button" id="tooltip" data-toggle="tooltip" data-placement="top" title="E-mail of new stakeholder">
									?
								</a>
						<input type="text" class="form-control" name="email">
					</div>
					<div class="form-group">
						<label>Fone:</label><a href="#" type="button" id="tooltip" data-toggle="tooltip" data-placement="top" title="Phone of new stakeholder">
									?
								</a>
						<input type="text" class="form-control" name="phone_number">
					</div>
					<div class="form-group">
						<label>Workplace:</label><a href="#" type="button" id="tooltip" data-toggle="tooltip" data-placement="top" title="Workplace of new stakeholder">
									?
								</a>
						<input type="text" class="form-control" name="work_place">
					</div>
					<div class="form-group">
						<label>Essential Requirements:</label><a href="#" type="button" id="tooltip" data-toggle="tooltip" data-placement="top" title="Essential Requirements of new stakeholder">
									?
								</a>
						<input type="text" class="form-control" name="essential_requirements">
					</div>
					<div class="form-group">
						<label>Main Expectations:</label><a href="#" type="button" id="tooltip" data-toggle="tooltip" data-placement="top" title="Expectations of new stakeholder">
									?
								</a>
						<input type="text" class="form-control" name="main_expectations">
					</div>
					<div class="form-group">
						<label>Phase of Greater Interest:</label><a href="#" type="button" id="tooltip" data-toggle="tooltip" data-placement="top" title="Phase of greater interest of new stakeholder">
									?
								</a>
						<input type="text" class="form-control" name="interest_phase">
					</div>
					<div class="form-group">
						<label>Observations:</label><a href="#" type="button" id="tooltip" data-toggle="tooltip" data-placement="top" title="Observations of new stakeholder">
									?
								</a>
						<input type="text" class="form-control" name="observations">
					</div>
					<button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-floppy-disk"></span>Save</button>
				</form>
			</section>
		</div>
	</div>
	<?php $this->load->view('frame/footer_view')?>
