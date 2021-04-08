<body class="hold-transition skin-gray sidebar-mini">
	<script>
		(function() {
			if (Boolean(sessionStorage.getItem('sidebar-toggle-collapsed'))) {
				var body = document.getElementsByTagName('body')[0];
				body.className = body.className + ' sidebar-collapse';
			}
		})();
	</script>
	<div class="wrapper">
		<div class="content-wrapper">
			<section class="content">
				<?php if ($this->session->flashdata('success')) : ?>
					<div class="alert alert-success">
						<a href="#" class="close" data-dismiss="alert">&times;</a>
						<strong><?php echo $this->session->flashdata('success'); ?></strong>
					</div>
				<?php elseif ($this->session->flashdata('error')) : ?>
					<div class="alert alert-warning">
						<a href="#" class="close" data-dismiss="alert">&times;</a>
						<strong><?php echo $this->session->flashdata('error'); ?></strong>
					</div>
				<?php endif; ?>

				<div class="row">
					<div class="col-lg-12">
						<div class="panel-body">
							<h1 class="page-header">

								<?= $this->lang->line('tap-title')  ?>

							</h1>

							<form method="POST" action="<?php echo base_url('integration/project-closure/insert/'); ?>">

								<div class="col-lg-12 form-group">
									<label for="client"><?= $this->lang->line('tep-client') ?> *</label>
									<a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('tep-client-tooltip') ?>"><i class="glyphicon glyphicon-comment"></i></a>
									<div>
										<input id="client" name="client" type="text" class="form-control input-md" required="true">
									</div>
								</div>


								<div class="col-lg-6 form-group">
									<label><?= $this->lang->line('tep-project_closure_date') ?></label>
									<a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('tep-project_closure_date-tooltip') ?>"><i class="glyphicon glyphicon-comment"></i></a>
									<div class="input-group">
										<div class="input-group-addon">
											<i class="fa fa-calendar"></i>
										</div>
										<input class="form-control" id="project_closure_date" placeholder="YYYY/MM/DD" type="text" name="project_closure_date" />
									</div>
								</div>


								<!--
						<div class=" col-lg-6 form-group">
							<label for="project_closure_date"><?= $this->lang->line('tep-project_closure_date') ?></label> 
							<a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('tep-project_closure_date-tooltip') ?>"><i class="glyphicon glyphicon-comment"></i></a>

							<div >                 
								<input oninput="eylem(this, this.value)" class="form-control" type="date" id="project_closure_date" name="project_closure_date">
							</div>
						</div>
					-->
								<div class=" col-lg-6 form-group">
									<label for="main_changes_approved"><?= $this->lang->line('tep-main_changes_approved') ?></label>
									<a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('tep-main_changes_approved-tooltip') ?>"><i class="glyphicon glyphicon-comment"></i></a>

									<div>
										<textarea oninput="eylem(this, this.value)" class="form-control elasticteste" id="main_changes_approved" name="main_changes_approved"></textarea>
									</div>
								</div>


								<div class=" col-lg-12 form-group">
									<label for="main_lessons_learned"><?= $this->lang->line('tep-main_lessons_learned') ?> </label>
									<a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('tep-main_lessons_learned-tooltip') ?>"><i class="glyphicon glyphicon-comment"></i></a>

									<div>
										<textarea oninput="eylem(this, this.value)" class="form-control elasticteste" id="main_lessons_learned" name="main_lessons_learned"></textarea>
									</div>
								</div>


								<div class=" col-lg-6 form-group">
									<label for="main_deviations"><?= $this->lang->line('tep-main_deviations') ?></label>
									<a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('tep-main_deviations-tooltip') ?>"><i class="glyphicon glyphicon-comment"></i></a>

									<div>
										<textarea oninput="eylem(this, this.value)" class="form-control elasticteste" id="main_deviations" name="main_deviations"></textarea>
									</div>
								</div>


								<div class=" col-lg-6 form-group">
									<label for="client_comments"><?= $this->lang->line('tep-client_comments') ?></label>
									<a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('tep-client_comments-tooltip') ?>"><i class="glyphicon glyphicon-comment"></i></a>

									<div>
										<textarea oninput="eylem(this, this.value)" class="form-control elasticteste" id="client_comments" name="client_comments"></textarea>
									</div>
								</div>


								<div class=" col-lg-12 form-group">
									<label for="sponsor_comments"><?= $this->lang->line('tep-sponsor_comments') ?> </label>
									<a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('tep-sponsor_comments-tooltip') ?>"><i class="glyphicon glyphicon-comment"></i></a>

									<div>
										<textarea oninput="eylem(this, this.value)" class="form-control elasticteste" id="sponsor_comments" name="sponsor_comments"></textarea>
									</div>
								</div>

								<div class="col-lg-12">
									<button id="new_human_resource-submit" type="submit" value="Save" class="btn btn-lg btn-success pull-right">
										<i class="glyphicon glyphicon-ok"></i> <?= $this->lang->line('btn-save') ?>
									</button>
							</form>


							<form action="<?php echo base_url('project/'); ?><?php echo $_SESSION['project_id']; ?>">
								<button class="btn btn-lg btn-info pull-left"> <i class="glyphicon glyphicon-chevron-left"></i> <?= $this->lang->line('btn-back') ?></button>
							</form>
						</div>
					</div>
				</div>
			</section>
		</div>
	</div>
</body>




<script type="text/javascript">
	var currentDate = new Date();
	var today = new Date(currentDate.getFullYear(), currentDate.getMonth(), currentDate.getDate(), 0, 0, 0, 0);
	var container = $('.bootstrap-iso form').length > 0 ? $('.bootstrap-iso form').parent() : "body";

	//Start Date Ends Here
	var endDate = $("#project_closure_date").datepicker({
		autoclose: true,
		format: 'yyyy/mm/dd',
		//language: 'pt-BR', //Idioma do Calendario
		container: container,
		keyboardNavigation: true,
		orientation: "bottom",
		startDate: today,
		/*todayHighlight : true,*/
	});
	//End Date Ends Here
</script>
<?php $this->load->view('frame/footer_view'); ?>