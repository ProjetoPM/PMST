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
				<!-- /.row -->
				<!-- acessa o objeto do array -->

				<?php extract($risk_register); ?>

				<div class="row">
					<div class="col-lg-12">
						<div class="panel-body">
							<h1 class="page-header">

								<?= $this->lang->line('rir_title')  ?>

							</h1>


							<form action="<?= base_url() ?>risk/risk-register/update/<?php echo $risk_register_id; ?>" method="post">

								<input type="hidden" id="project_id" name="project_id" value="<?php echo $project_id; ?>">
								<!-- Textarea -->

								<div class=" col-lg-6 form-group">
									<label for="impacted_objective"><?= $this->lang->line('risk-impacted_objective') ?> *</label>
									<a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('risk-impacted_objective-tooltip') ?>"><i class="glyphicon glyphicon-comment"></i></a>

									<div>
										<input id="impacted_objective" name="impacted_objective" type="text" class="form-control input-md" required="true" value="<?php echo $impacted_objective; ?>">
									</div>
								</div>

								<!-- valor 0 para baixo | valor 1 para  medio | valor 2 para alta-->
								<div class="col-lg-6 form-group">
									<label for="priority"><?= $this->lang->line('risk-priority') ?></label>
									<a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('risk-priority-tooltip') ?>"><i class="glyphicon glyphicon-comment"></i></a>
									<select name="priority" class="form-control" value="<?php echo $priority; ?>">
										<option value="0"><?= $this->lang->line('risk-priority-low') ?></option>
										<option value="1"><?= $this->lang->line('risk-priority-medium') ?></option>
										<option value="2"><?= $this->lang->line('risk-priority-high') ?></option>

									</select>
								</div>
								<div class=" col-lg-6 form-group">
									<label for="risk_status"><?= $this->lang->line('risk-risk_status') ?></label>
									<a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('risk-risk_status-tooltip') ?>"><i class="glyphicon glyphicon-comment"></i></a>

									<div>
										<input id="risk_status" name="risk_status" type="text" class="form-control input-md" value="<?php echo $risk_status; ?>">
									</div>
								</div>


								<div class=" col-lg-6 form-group">
									<label for="event"><?= $this->lang->line('risk-event') ?></label>
									<a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('risk-event-tooltip') ?>"><i class="glyphicon glyphicon-comment"></i></a>

									<div>
										<input id="event" name="event" type="text" class="form-control input-md" value="<?php echo $event; ?>">
									</div>
								</div>


								<!-- Inicio teste datas -->
								<div class="form-group">
									<div class="col-lg-6">
										<label><?= $this->lang->line('risk-date') ?></label>
										<div class="input-group">
											<div class="input-group-addon">
												<i class="fa fa-calendar"></i>
											</div>
											<input class="form-control" id="date" placeholder="YYYY/MM/DD" type="text" name="date" value="<?php echo $date; ?>" />
										</div>
									</div>
								</div>

								<div class=" col-lg-6 form-group">
									<label for="identifier"><?= $this->lang->line('risk-identifier') ?></label>
									<a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('risk-identifier-tooltip') ?>"><i class="glyphicon glyphicon-comment"></i></a>

									<div>
										<input id="identifier" name="identifier" type="text" class="form-control input-md" value="<?php echo $identifier; ?>">
									</div>
								</div>

								<div class=" col-lg-6 form-group">
									<label for="type"><?= $this->lang->line('risk-type') ?></label>
									<a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('risk-type-tooltip') ?>"><i class="glyphicon glyphicon-comment"></i></a>

									<div>
										<input id="type" name="type" type="text" class="form-control input-md" value="<?php echo $type; ?>">
									</div>
								</div>

								<div class=" col-lg-6 form-group">
									<label for="lessons"><?= $this->lang->line('rir_lessons') ?></label>
									<a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('rir_lessons_tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
									<div>
										<input id="" name="lessons" type="text" class="form-control input-md" value="<?php echo $lessons; ?>">
									</div>
								</div>

								<div class=" col-lg-6 form-group">
									<label for="category"><?= $this->lang->line('rir_category') ?></label>
									<a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('rir_category_tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
									<div>
										<input id="" name="category" type="text" class="form-control input-md" value="<?php echo $category; ?>">
									</div>
								</div>

								<div class=" col-lg-6 form-group">
									<label for="fallback"><?= $this->lang->line('rir_fallback') ?></label>
									<a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('rir_fallback_tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
									<div>
										<input id="" name="fallback" type="text" class="form-control input-md" value="<?php echo $fallback; ?>">
									</div>
								</div>

								<div class=" col-lg-6 form-group">
									<label for="contingency_owner"><?= $this->lang->line('rir_contingency_owner') ?></label>
									<a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('rir_contingency_owner_tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
									<div>
										<input id="" name="contingency_owner" type="text" class="form-control input-md" value="<?php echo $contingency_owner; ?>">
									</div>
								</div>

								<div class=" col-lg-6 form-group">
									<label for="contingency"><?= $this->lang->line('rir_contingency') ?></label>
									<a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('rir_contingency_tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
									<div>
										<input id="" name="contingency" type="text" class="form-control input-md" value="<?php echo $contingency; ?>">
									</div>
								</div>

								<div class=" col-lg-6 form-group">
									<label for="secondary"><?= $this->lang->line('rir_secondary') ?></label>
									<a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('rir_secondary_tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
									<div>
										<input id="" name="secondary" type="text" class="form-control input-md" value="<?php echo $secondary; ?>">
									</div>
								</div>

								<div class=" col-lg-6 form-group">
									<label for="residual"><?= $this->lang->line('rir_residual') ?></label>
									<a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('rir_residual_tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
									<div>
										<input id="" name="residual" type="text" class="form-control input-md" value="<?php echo $residual; ?>">
									</div>
								</div>

								<div class=" col-lg-6 form-group">
									<label for="timing"><?= $this->lang->line('rir_timing') ?></label>
									<a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('rir_timing_tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
									<div>
										<input id="" name="timing" type="text" class="form-control input-md" value="<?php echo $timing; ?>">
									</div>
								</div>

								<div class=" col-lg-6 form-group">
									<label for="responses_owner"><?= $this->lang->line('rir_responses_owner') ?></label>
									<a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('rir_responses_owner_tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
									<div>
										<input id="" name="responses_owner" type="text" class="form-control input-md" value="<?php echo $responses_owner; ?>">
									</div>
								</div>

								<div class=" col-lg-6 form-group">
									<label for="responses"><?= $this->lang->line('rir_responses') ?></label>
									<a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('rir_responses_tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
									<div>
										<input id="" name="responses" type="text" class="form-control input-md" value="<?php echo $responses; ?>">
									</div>
								</div>

								<div class=" col-lg-6 form-group">
									<label for="triggers"><?= $this->lang->line('rir_triggers') ?></label>
									<a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('rir_triggers_tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
									<div>
										<input id="" name="triggers" type="text" class="form-control input-md" value="<?php echo $triggers; ?>">
									</div>
								</div>

								<div class=" col-lg-6 form-group">
									<label for="causes"><?= $this->lang->line('rir_causes') ?></label>
									<a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('rir_causes_tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
									<div>
										<input id="" name="causes" type="text" class="form-control input-md" value="<?php echo $causes; ?>">
									</div>
								</div>

								<div class=" col-lg-6 form-group">
									<label for="strategy"><?= $this->lang->line('rir_strategy') ?></label>
									<a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('rir_strategy_tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
									<div>
										<input id="" name="strategy" type="text" class="form-control input-md" value="<?php echo $strategy; ?>">
									</div>
								</div>

								<div class=" col-lg-6 form-group">
									<label for="effects"><?= $this->lang->line('rir_effects') ?></label>
									<a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('rir_effects_tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
									<div>
										<input id="" name="effects" type="text" class="form-control input-md" value="<?php echo $effects; ?>">
									</div>
								</div>

								<div class=" col-lg-6 form-group">
									<label for="score"><?= $this->lang->line('rir_score') ?></label>
									<a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('rir_score_tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
									<div>
										<input id="" name="score" type="text" class="form-control input-md" value="<?php echo $score; ?>">
									</div>
								</div>

								<div class=" col-lg-6 form-group">
									<label for="impact"><?= $this->lang->line('rir_impact') ?></label>
									<a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('rir_impact_tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
									<div>
										<input id="" name="impact" type="text" class="form-control input-md" value="<?php echo $impact; ?>">
									</div>
								</div>

								<div class=" col-lg-6 form-group">
									<label for="probability"><?= $this->lang->line('rir_probability') ?></label>
									<a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('rir_probability_tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
									<div>
										<input id="" name="probability" type="text" class="form-control input-md" value="<?php echo $probability; ?>">
									</div>
								</div>

								<div class="col-lg-12">
									<button id="stakeholder-submit" type="submit" value="Save" class="btn btn-lg btn-success pull-right">
										<i class="glyphicon glyphicon-ok"></i> <?= $this->lang->line('btn-save') ?>
									</button>
							</form>

							<form action="<?php echo base_url('risk/risk-register/list/'); ?><?php echo $project_id; ?>">
								<button class="btn btn-lg btn-info pull-left"> <i class="glyphicon glyphicon-chevron-left"></i> <?= $this->lang->line('btn-back') ?></button>
							</form>
						</div>
					</div>
				</div>
			</section>
		</div>
	</div>
</body>

<script src="<?= base_url() ?>assets/js/jquery-1.11.1.js" type="text/javascript"></script>
<link href="<?= base_url() ?>assets/css/bootstrap-iso.css" rel="stylesheet">
<link href="<?= base_url() ?>assets/css/bootstrap-datepicker3.css" rel="stylesheet">
<script src="<?= base_url() ?>assets/js/bootstrap-datepicker.min.js" type="text/javascript"></script>
<script src="<?= base_url() ?>assets/js/bootstrap-datepicker.pt-BR.min.js" type="text/javascript"></script>

<script type="text/javascript">
	//////////////////////////////////
	// Start Date & End Date
	//////////////////////////////////
	var currentDate = new Date();
	var today = new Date(currentDate.getFullYear(), currentDate.getMonth(), currentDate.getDate(), 0, 0, 0, 0);
	var container = $('.bootstrap-iso form').length > 0 ? $('.bootstrap-iso form').parent() : "body";

	var startDate = $("#date").datepicker({
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