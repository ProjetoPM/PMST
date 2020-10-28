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
								<?= $this->lang->line('pch_title')  ?>
							</h1>
							<?php
							foreach ($project_charter as $pj) {
							?>
								<form method="POST" action="<?php echo base_url('integration/project-charter/update'); ?>">
									<input type="hidden" name="status" value="1">

									<div class=" col-lg-12 form-group">
										<label align="right" for="project_description"><?= $this->lang->line('pch_description') ?></label>
										<a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('pch_description-tooltip') ?>"><i class="glyphicon glyphicon-comment"></i></a>
										<div>
											<textarea oninput="eylem(this, this.value)" class="form-control elasticteste" id="project_description" name="project_description"><?php echo $pj->project_description; ?></textarea>
										</div>
									</div>

									<div class=" col-lg-12 form-group">
										<label for="project_purpose"><?= $this->lang->line('pch_purpose') ?></label>
										<a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('pch_purpose-tooltip') ?>"><i class="glyphicon glyphicon-comment"></i></a>
										<div>
											<textarea oninput="eylem(this, this.value)" class="form-control elasticteste" id="project_purpose" name="project_purpose"><?php echo $pj->project_purpose; ?></textarea>
										</div>
									</div>

									<div class=" col-lg-12 form-group">
										<label for="project_objective"><?= $this->lang->line('pch_objectives') ?></label>
										<a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('pch_objectives-tooltip') ?>"><i class="glyphicon glyphicon-comment"></i></a>
										<div>
											<textarea oninput="eylem(this, this.value)" class="form-control elasticteste" id="project_objective" name="project_objective"><?php echo $pj->project_objective; ?></textarea>
										</div>
									</div>

									<div class="col-lg-12 form-group">
										<label for="benefits"><?= $this->lang->line('pch_benefits') ?></label>
										<a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('pch_benefits-tooltip') ?>"><i class="glyphicon glyphicon-comment"></i></a>
										<div>
											<textarea oninput="eylem(this, this.value)" class="form-control elasticteste" id="benefits" name="benefits"><?php echo $pj->benefits; ?></textarea>
										</div>
									</div>

									<div class=" col-lg-12 form-group">
										<label for="high_level_requirements"><?= $this->lang->line('pch_high_level_req') ?></label>
										<a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('pch_high_level_req-tooltip') ?>"><i class="glyphicon glyphicon-comment"></i></a>
										<div>
											<textarea oninput="eylem(this, this.value)" class="form-control elasticteste" id="high_level_requirements" name="high_level_requirements"><?php echo $pj->high_level_requirements; ?></textarea>
										</div>
									</div>

									<div class=" col-lg-12 form-group">
										<label for="boundaries"><?= $this->lang->line('pch_boundaries') ?></label>
										<a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('pch_boundaries_tooltip') ?>"><i class="glyphicon glyphicon-comment"></i></a>
										<div>
											<textarea oninput="eylem(this, this.value)" class="form-control elasticteste" id="boundaries" name="boundaries"><?php echo $pj->boundaries; ?></textarea>
										</div>
									</div>


									<div class=" col-lg-12 form-group">
										<label for="pch_risks"><?= $this->lang->line('pch_risks') ?></label>
										<a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('pch_risks-tooltip') ?>"><i class="glyphicon glyphicon-comment"></i></a>
										<div>
											<textarea oninput="eylem(this, this.value)" class="form-control elasticteste" id="high_level_risks" name="high_level_risks"><?php echo $pj->high_level_risks; ?></textarea>
										</div>
									</div>


									<div class=" col-lg-12 form-group">
										<label for="summary_schedule"><?= $this->lang->line('pch_schedule') ?></label>
										<a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('pch_schedule-tooltip') ?>"><i class="glyphicon glyphicon-comment"></i></a>
										<div>
											<textarea oninput="eylem(this, this.value)" class="form-control elasticteste" id="summary_schedule" name="summary_schedule"><?php echo $pj->summary_schedule; ?></textarea>
										</div>
									</div>

									<div class=" col-lg-12 form-group">
										<label for="budge_summary"><?= $this->lang->line('pch_budge') ?></label>
										<a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('pch_budge-tooltip') ?>"><i class="glyphicon glyphicon-comment"></i></a>
										<div>
											<textarea oninput="eylem(this, this.value)" class="form-control elasticteste" id="budge_summary" name="budge_summary"><?php echo $pj->budge_summary; ?></textarea>
										</div>
									</div>


									<div class=" col-lg-12 form-group">
										<label for="project_approval_requirements"><?= $this->lang->line('pch_approval') ?></label>
										<a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('pch_approval-tooltip') ?>"><i class="glyphicon glyphicon-comment"></i></a>
										<div>
											<textarea oninput="eylem(this, this.value)" class="form-control elasticteste" id="project_approval_requirements" name="project_approval_requirements"><?php echo $pj->project_approval_requirements; ?></textarea>
										</div>
									</div>

									<div class=" col-lg-6 form-group">
										<label for="success_criteria"><?= $this->lang->line('pch_sucess_criteria') ?></label>
										<a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('') ?>"><i class="glyphicon glyphicon-comment"></i></a>
										<div>
											<textarea oninput="eylem(this, this.value)" class="form-control elasticteste" id="success_criteria" name="success_criteria"><?php echo $pj->success_criteria; ?></textarea>
										</div>
									</div>

									<div class=" col-lg-6 form-group">
										<label for="exit_criteria"><?= $this->lang->line('pch_exit_criteria') ?></label>
										<a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('pch_exit_criteria_tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
										<div>
											<textarea oninput="eylem(this, this.value)" class="form-control elasticteste" id="exit_criteria" name="exit_criteria"><?php echo $pj->exit_criteria; ?></textarea>
										</div>
									</div>

									<!-- Inicio teste datas -->
									<div class="form-group">
										<div class="col-lg-6">
											<label><?= $this->lang->line('pch_start') ?></label>
											<div class="input-group padCalendar">
												<div class="input-group-addon">
													<i class="fa fa-calendar"></i>
												</div>
												<input class="form-control" id="start_date" placeholder="YYYY/MM/DD" type="text" name="start_date" required="true" value="<?php echo $pj->start_date; ?>" />
											</div>
										</div>
									</div>

									<div class="form-group">
										<div class="col-lg-6">
											<label><?= $this->lang->line('pch_end') ?></label>
											<div class="input-group padCalendar">
												<div class="input-group-addon">
													<i class="fa fa-calendar"></i>
												</div>
												<input class="form-control" id="end_date" placeholder="YYYY/MM/DD" type="text" name="end_date" required="true" value="<?php echo $pj->end_date; ?>" />
											</div>
										</div>
									</div>
									<!-- Fim teste Datas -->

									<!-- Início modal da lista de stakeholder -->



									<!-- Trigger the modal with a button -->
									<button type="button" class="open-AddBookDialog btn btn-warning btn-lg center-block" data-toggle="modal" data-target="#add">View Stakeholder List</button>
									<!-- Modal -->
									<div class="modal fade" id="add" role="dialog">
										<div class="modal-dialog">
											<!-- Modal content-->
											<div class="modal-content pad-modal">
												<div class="modal-header">
													<button type="button" class="close" data-dismiss="modal">&times;</button>
													<h4 class="modal-title"><?= $this->lang->line('pch_stakeholder') ?></h4>
												</div>
												<div class="modal-body">


													<div class="row">
														<table class="col-lg-12">
															<thead>
																<tr>
																	<th>Name</th>
																	<th>Email</th>
																</tr>
															</thead>
															<tbody>
																<?php

																foreach ($stakeholder as $stake) {
																	if ($_SESSION['project_id'] == $stake->project_id) {
																?>
																		<tr>
																			<td><?php echo $stake->name; ?></td>
																			<td><?php echo $stake->email; ?></td>
																		</tr>
																<?php
																	}
																}
																?>
															</tbody>
														</table>
													</div>
												</div>
											</div>
										</div>
									</div>

									<input type="hidden" name="status" value="1">

									<div class="col-lg-12">
										<button id="pch_submit" type="submit" value="Save" class="btn btn-lg btn-success pull-right">
											<i class="glyphicon glyphicon-ok"></i> <?= $this->lang->line('btn-save') ?>
										</button>
								</form>

								<form action="<?php echo base_url('project/'); ?><?php echo $_SESSION['project_id']; ?>">
									<button class="btn btn-lg btn-info pull-left"> <i class="glyphicon glyphicon-chevron-left"></i> <?= $this->lang->line('btn-back') ?></button>
								</form>
							<?php } ?>
						</div>
					</div>
				</div>
				<!-- /.row -->
			</section>
		</div>
	</div>
</body>


<!-- /.row -->

<script type="text/javascript">
	//////////////////////////////////
	// Start Date & End Date
	//////////////////////////////////
	var currentDate = new Date();
	var today = new Date(currentDate.getFullYear(), currentDate.getMonth(), currentDate.getDate(), 0, 0, 0, 0);
	var container = $('.bootstrap-iso form').length > 0 ? $('.bootstrap-iso form').parent() : "body";

	var startDate = $("#start_date").datepicker({
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
	var endDate = $("#end_date").datepicker({
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

<?php $this->load->view('frame/footer_view') ?>