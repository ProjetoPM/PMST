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

							<form method="POST" action="<?php echo base_url('resources/team-performance-assessments/insert/'); ?><?php echo $id; ?>">

								<div class=" col-lg-6 form-group">
									<label for="team_member_name"><?= $this->lang->line('eval-team_member_name') ?> *</label>
									<a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('eval-team_member_name-tooltip') ?>"><i class="glyphicon glyphicon-comment"></i></a>

									<div>
										<input id="team_member_name" name="team_member_name" type="text" class="form-control input-md" required="true">
									</div>
								</div>

								<div class=" col-lg-6 form-group">
									<label for="role"><?= $this->lang->line('eval-role') ?></label>
									<a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('eval-role-tooltip') ?>"><i class="glyphicon glyphicon-comment"></i></a>

									<div>
										<input id="role" name="role" type="text" class="form-control input-md">
									</div>
								</div>


								<div class=" col-lg-6 form-group">
									<label for="project_function"><?= $this->lang->line('eval-project_function') ?></label>
									<a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('eval-project_function-tooltip') ?>"><i class="glyphicon glyphicon-comment"></i></a>

									<div>
										<input id="project_function" name="project_function" type="text" class="form-control input-md">
									</div>
								</div>


								<!-- Inicio teste datas -->
								<div class="form-group">
									<div class="col-lg-6">
										<label><?= $this->lang->line('eval-report_date') ?></label>
										<div class="input-group">
											<div class="input-group-addon">
												<i class="fa fa-calendar"></i>
											</div>
											<input class="form-control" id="report_date" placeholder="YYYY/MM/DD" type="text" name="report_date" />
										</div>
									</div>
								</div>

								<div class="col-lg-12 form-group">
									<label for="team_member_comments"><?= $this->lang->line('eval-team_member_comments') ?></label>
									<a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('eval-team_member_comments-tooltip') ?>"><i class="glyphicon glyphicon-comment"></i></a>
									<div>
										<textarea oninput="eylem(this, this.value)" class="form-control elasticteste" id="team_member_comments" name="team_member_comments"></textarea>
									</div>
								</div>

								<div class="col-lg-12 form-group">
									<label for="strong_points"><?= $this->lang->line('eval-strong_points') ?></label>
									<a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('eval-strong_points-tooltip') ?>"><i class="glyphicon glyphicon-comment"></i></a>
									<div>
										<textarea oninput="eylem(this, this.value)" class="form-control elasticteste" id="strong_points" name="strong_points"></textarea>
									</div>
								</div>

								<div class="col-lg-12 form-group">
									<label for="improvement"><?= $this->lang->line('eval-improvement') ?></label>
									<a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('eval-improvement-tooltip') ?>"><i class="glyphicon glyphicon-comment"></i></a>
									<div>
										<textarea oninput="eylem(this, this.value)" class="form-control elasticteste" id="improvement" name="improvement"></textarea>
									</div>
								</div>

								<div class="col-lg-12 form-group">
									<label for="development_plan"><?= $this->lang->line('eval-development_plan') ?></label>
									<a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('eval-development_plan-tooltip') ?>"><i class="glyphicon glyphicon-comment"></i></a>
									<div>
										<textarea oninput="eylem(this, this.value)" class="form-control elasticteste" id="development_plan" name="development_plan"></textarea>
									</div>
								</div>

								<div class="col-lg-12 form-group">
									<label for="already_developed"><?= $this->lang->line('eval-already_developed') ?></label>
									<a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('eval-already_developed-tooltip') ?>"><i class="glyphicon glyphicon-comment"></i></a>
									<div>
										<textarea oninput="eylem(this, this.value)" class="form-control elasticteste" id="already_developed" name="already_developed"></textarea>
									</div>
								</div>

								<div class="col-lg-12 form-group">
									<label for="external_comments"><?= $this->lang->line('eval-external_comments') ?></label>
									<a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('eval-external_comments-tooltip') ?>"><i class="glyphicon glyphicon-comment"></i></a>
									<div>
										<textarea oninput="eylem(this, this.value)" class="form-control elasticteste" id="external_comments" name="external_comments"></textarea>
									</div>
								</div>

								<div class="col-lg-12 form-group">
									<label for="team_mates_comments"><?= $this->lang->line('eval-team_mates_comments') ?></label>
									<a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('eval-team_mates_comments-tooltip') ?>"><i class="glyphicon glyphicon-comment"></i></a>
									<div>
										<textarea oninput="eylem(this, this.value)" class="form-control elasticteste" id="team_mates_comments" name="team_mates_comments"></textarea>
									</div>
								</div>

								<div class="col-lg-12 form-group">
									<label for="team_performance_evaluationcol"><?= $this->lang->line('eval-team_performance_evaluationcol') ?></label>
									<a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('eval-team_performance_evaluationcol-tooltip') ?>"><i class="glyphicon glyphicon-comment"></i></a>
									<div>
										<textarea oninput="eylem(this, this.value)" class="form-control elasticteste" id="team_performance_evaluationcol" name="team_performance_evaluationcol"></textarea>
									</div>
								</div>

								<div class="col-lg-12">
									<button id="team_performance_evaluation-submit" type="submit" value="Save" class="btn btn-lg btn-success pull-right">
										<i class="glyphicon glyphicon-ok"></i> <?= $this->lang->line('btn-save') ?>
									</button>
							</form>
							<form action="<?php echo base_url('TeamPerformanceEvaluation/list/'); ?><?php echo $id; ?>">
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
	//////////////////////////////////
	// Start Date & End Date
	//////////////////////////////////
	var currentDate = new Date();
	var today = new Date(currentDate.getFullYear(), currentDate.getMonth(), currentDate.getDate(), 0, 0, 0, 0);
	var container = $('.bootstrap-iso form').length > 0 ? $('.bootstrap-iso form').parent() : "body";

	var startDate = $("#report_date").datepicker({
		autoclose: true,
		format: 'yyyy/mm/dd',
		//language: 'pt-BR', //Idioma do Calendario
		container: container,
		keyboardNavigation: true,
		orientation: "bottom",
		todayHighlight: true,
		startDate: today,
	}).on('changeDate', function(ev) {
		var newDate = new Date(ev.date.setDate(ev.date.getDate() + 1));
		endDate.datepicker("setStartDate", newDate);
	});

	//Start Date Ends Here
</script>
<?php $this->load->view('frame/footer_view') ?>