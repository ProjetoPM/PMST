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

								<?= $this->lang->line('pmp_title')  ?>
								<?php $view_name = "project management plan"; ?>
								<?php $this->load->view('construction_services/rating', array(
									"view_name" => $view_name,
								)) ?>
							</h1>
							<?php extract($project_mp); ?>

							<!-- avaliação -->
							<link href="<?= base_url() ?>assets/css/field_evaluation.css" rel="stylesheet" type="text/css">
							<?php
							getViewFields($view_name);
							?>
							<?php $this->load->view('construction_services/write_field_evaluation') ?>


							<form method="POST" action="<?php echo base_url('integration/project-mp/update'); ?>">
								<input type="hidden" name="status" value="1">

								<h3><?= $this->lang->line('subsidiary_mp') ?></h3>

								<div class=" col-lg-12 form-group">
									<label for="project_guidelines"><?= $this->lang->line('pmp_guidelines') ?></label>
									<span class="pmp_1">2000</span><?= $this->lang->line('character') ?>
									<a class="btn-sm btn-default" id="pmp_tp_1" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('pmp_guidelines_tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
									<a <?= fieldStatus($view_name, $project_mp_id, "project_guidelines") ?> data-field="project_guidelines" data-field_name="<?= $this->lang->line('pmp_guidelines') ?>" data-item_id="<?= $project_mp_id ?>" data-view="<?= $view_name ?>" data-toggle="modal" data-placement="left" data-target="#write-evaluation" data-tt="tooltip"><i class="glyphicon glyphicon-list-alt"></i></a>
									<div>
										<textarea onkeyup="limite_textarea(this.value, 'pmp_1')" id="pmp_txt_1" maxlength="2000" oninput="eylem(this, this.value)" class="form-control elasticteste" name="project_guidelines"><?php echo $project_guidelines; ?></textarea>
									</div>
								</div>

								<div class=" col-lg-12 form-group">
									<label for="requirements_mp"><?= $this->lang->line('pmp_requirements_mp') ?></label>
									<span class="pmp_2">2000</span><?= $this->lang->line('character') ?>
									<a class="btn-sm btn-default" id="pmp_tp_2" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('pmp_requirements_mp_tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
									<a <?= fieldStatus($view_name, $project_mp_id, "requirements_mp") ?> data-field="requirements_mp" data-field_name="<?= $this->lang->line('pmp_requirements_mp') ?>" data-item_id="<?= $project_mp_id ?>" data-view="<?= $view_name ?>" data-toggle="modal" data-placement="left" data-target="#write-evaluation" data-tt="tooltip"><i class="glyphicon glyphicon-list-alt"></i></a>
									<div>
										<textarea onkeyup="limite_textarea(this.value, 'pmp_2')" id="pmp_txt_2" maxlength="2000" oninput="eylem(this, this.value)" class="form-control elasticteste" name="requirements_mp"><?php echo $requirements_mp; ?></textarea>
									</div>
								</div>

								<div class=" col-lg-12 form-group">
									<label for="schedule_mp"><?= $this->lang->line('pmp_schedule_mp') ?></label>
									<span class="pmp_3">2000</span><?= $this->lang->line('character') ?>
									<a class="btn-sm btn-default" id="pmp_tp_3" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('pmp_schedule_mp_tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
									<a <?= fieldStatus($view_name, $project_mp_id, "schedule_mp") ?> data-field="schedule_mp" data-field_name="<?= $this->lang->line('pmp_schedule_mp') ?>" data-item_id="<?= $project_mp_id ?>" data-view="<?= $view_name ?>" data-toggle="modal" data-placement="left" data-target="#write-evaluation" data-tt="tooltip"><i class="glyphicon glyphicon-list-alt"></i></a>
									<div>
										<textarea onkeyup="limite_textarea(this.value, 'pmp_3')" id="pmp_txt_3" maxlength="2000" oninput="eylem(this, this.value)" class="form-control elasticteste" name="schedule_mp"><?php echo $schedule_mp; ?></textarea>
									</div>
								</div>

								<div class=" col-lg-12 form-group">
									<label for="cost_mp"><?= $this->lang->line('pmp_cost_mp') ?></label>
									<span class="pmp_4">2000</span><?= $this->lang->line('character') ?>
									<a class="btn-sm btn-default" id="pmp_tp_4" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('pmp_cost_mp_tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
									<a <?= fieldStatus($view_name, $project_mp_id, "cost_mp") ?> data-field="cost_mp" data-field_name="<?= $this->lang->line('pmp_cost_mp') ?>" data-item_id="<?= $project_mp_id ?>" data-view="<?= $view_name ?>" data-toggle="modal" data-placement="left" data-target="#write-evaluation" data-tt="tooltip"><i class="glyphicon glyphicon-list-alt"></i></a>
									<div>
										<textarea onkeyup="limite_textarea(this.value, 'pmp_4')" id="pmp_txt_4" maxlength="2000" oninput="eylem(this, this.value)" class="form-control elasticteste" name="cost_mp"><?php echo $cost_mp; ?></textarea>
									</div>
								</div>

								<div class=" col-lg-12 form-group">
									<label for="quality_mp"><?= $this->lang->line('pmp_quality_mp') ?></label>
									<span class="pmp_5">2000</span><?= $this->lang->line('character') ?>
									<a class="btn-sm btn-default" id="pmp_tp_5" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('pmp_quality_mp_tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
									<a <?= fieldStatus($view_name, $project_mp_id, "quality_mp") ?> data-field="quality_mp" data-field_name="<?= $this->lang->line('pmp_quality_mp') ?>" data-item_id="<?= $project_mp_id ?>" data-view="<?= $view_name ?>" data-toggle="modal" data-placement="left" data-target="#write-evaluation" data-tt="tooltip"><i class="glyphicon glyphicon-list-alt"></i></a>
									<div>
										<textarea onkeyup="limite_textarea(this.value, 'pmp_5')" id="pmp_txt_5" maxlength="2000" oninput="eylem(this, this.value)" class="form-control elasticteste" name="quality_mp"><?php echo $quality_mp; ?></textarea>
									</div>
								</div>

								<div class=" col-lg-12 form-group">
									<label for="resource_mp"><?= $this->lang->line('pmp_resource_mp') ?></label>
									<span class="pmp_6">2000</span><?= $this->lang->line('character') ?>
									<a class="btn-sm btn-default" id="pmp_tp_6" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('pmp_resource_mp_tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
									<a <?= fieldStatus($view_name, $project_mp_id, "resource_mp") ?> data-field="resource_mp" data-field_name="<?= $this->lang->line('pmp_resource_mp') ?>" data-item_id="<?= $project_mp_id ?>" data-view="<?= $view_name ?>" data-toggle="modal" data-placement="left" data-target="#write-evaluation" data-tt="tooltip"><i class="glyphicon glyphicon-list-alt"></i></a>
									<div>
										<textarea onkeyup="limite_textarea(this.value, 'pmp_6')" id="pmp_txt_6" maxlength="2000" oninput="eylem(this, this.value)" class="form-control elasticteste" name="resource_mp"><?php echo $resource_mp; ?></textarea>
									</div>
								</div>

								<div class=" col-lg-12 form-group">
									<label for="stakeholders_communication"><?= $this->lang->line('pmp_stakeholders') ?></label>
									<span class="pmp_7">2000</span><?= $this->lang->line('character') ?>
									<a class="btn-sm btn-default" id="pmp_tp_7" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('pmp_stakeholders_tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
									<a <?= fieldStatus($view_name, $project_mp_id, "stakeholders_communication") ?> data-field="stakeholders_communication" data-field_name="<?= $this->lang->line('pmp_stakeholders') ?>" data-item_id="<?= $project_mp_id ?>" data-view="<?= $view_name ?>" data-toggle="modal" data-placement="left" data-target="#write-evaluation" data-tt="tooltip"><i class="glyphicon glyphicon-list-alt"></i></a>
									<div>
										<textarea onkeyup="limite_textarea(this.value, 'pmp_7')" id="pmp_txt_7" maxlength="2000" oninput="eylem(this, this.value)" class="form-control elasticteste" name="stakeholders_communication"><?php echo $stakeholders_communication; ?></textarea>
									</div>
								</div>

								<div class=" col-lg-12 form-group">
									<label for="risk_mp"><?= $this->lang->line('pmp_risk_mp') ?></label>
									<span class="pmp_8">2000</span><?= $this->lang->line('character') ?>
									<a class="btn-sm btn-default" id="pmp_tp_8" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('pmp_risk_mp_tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
									<a <?= fieldStatus($view_name, $project_mp_id, "risk_mp") ?> data-field="risk_mp" data-field_name="<?= $this->lang->line('pmp_risk_mp') ?>" data-item_id="<?= $project_mp_id ?>" data-view="<?= $view_name ?>" data-toggle="modal" data-placement="left" data-target="#write-evaluation" data-tt="tooltip"><i class="glyphicon glyphicon-list-alt"></i></a>
									<div>
										<textarea onkeyup="limite_textarea(this.value, 'pmp_8')" id="pmp_txt_8" maxlength="2000" oninput="eylem(this, this.value)" class="form-control elasticteste" name="risk_mp"><?php echo $risk_mp; ?></textarea>
									</div>
								</div>

								<div class=" col-lg-12 form-group">
									<label for="procurement_mp"><?= $this->lang->line('pmp_procurement_mp') ?></label>
									<span class="pmp_9">2000</span><?= $this->lang->line('character') ?>
									<a class="btn-sm btn-default" id="pmp_tp_9" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('pmp_procurement_mp_tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
									<a <?= fieldStatus($view_name, $project_mp_id, "procurement_mp") ?> data-field="procurement_mp" data-field_name="<?= $this->lang->line('pmp_procurement_mp') ?>" data-item_id="<?= $project_mp_id ?>" data-view="<?= $view_name ?>" data-toggle="modal" data-placement="left" data-target="#write-evaluation" data-tt="tooltip"><i class="glyphicon glyphicon-list-alt"></i></a>
									<div>
										<textarea onkeyup="limite_textarea(this.value, 'pmp_9')" id="pmp_txt_9" maxlength="2000" oninput="eylem(this, this.value)" class="form-control elasticteste" name="procurement_mp"><?php echo $procurement_mp; ?></textarea>
									</div>
								</div>

								<div class=" col-lg-12 form-group">
									<label for="stakeholder_mp"><?= $this->lang->line('pmp_stakeholder_mp') ?></label>
									<span class="pmp_10">2000</span><?= $this->lang->line('character') ?>
									<a class="btn-sm btn-default" id="pmp_tp_10" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('pmp_stakeholder_mp_tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
									<a <?= fieldStatus($view_name, $project_mp_id, "stakeholder_mp") ?> data-field="stakeholder_mp" data-field_name="<?= $this->lang->line('pmp_stakeholder_mp') ?>" data-item_id="<?= $project_mp_id ?>" data-view="<?= $view_name ?>" data-toggle="modal" data-placement="left" data-target="#write-evaluation" data-tt="tooltip"><i class="glyphicon glyphicon-list-alt"></i></a>
									<div>
										<textarea onkeyup="limite_textarea(this.value, 'pmp_10')" id="pmp_txt_10" maxlength="2000" oninput="eylem(this, this.value)" class="form-control elasticteste" name="stakeholder_mp"><?php echo $stakeholder_mp; ?></textarea>
									</div>
								</div>

								<h3><?= $this->lang->line('baseline') ?></h3>

								<div class=" col-lg-12 form-group">
									<label for="scope_baseline"><?= $this->lang->line('pmp_scope_baseline') ?></label>
									<span class="pmp_11">2000</span><?= $this->lang->line('character') ?>
									<a class="btn-sm btn-default" id="pmp_tp_11" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('pmp_scope_baseline_tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
									<a <?= fieldStatus($view_name, $project_mp_id, "scope_baseline") ?> data-field="scope_baseline" data-field_name="<?= $this->lang->line('pmp_scope_baseline') ?>" data-item_id="<?= $project_mp_id ?>" data-view="<?= $view_name ?>" data-toggle="modal" data-placement="left" data-target="#write-evaluation" data-tt="tooltip"><i class="glyphicon glyphicon-list-alt"></i></a>
									<div>
										<textarea onkeyup="limite_textarea(this.value, 'pmp_11')" id="pmp_txt_11" maxlength="2000" oninput="eylem(this, this.value)" class="form-control elasticteste" name="scope_baseline"><?php echo $scope_baseline; ?></textarea>
									</div>
								</div>

								<div class=" col-lg-12 form-group">
									<label for="baseline_maintenance"><?= $this->lang->line('pmp_baseline') ?></label>
									<span class="pmp_12">2000</span><?= $this->lang->line('character') ?>
									<a class="btn-sm btn-default" id="pmp_tp_12" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('pmp_baseline_tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
									<a <?= fieldStatus($view_name, $project_mp_id, "baseline_maintenance") ?> data-field="baseline_maintenance" data-field_name="<?= $this->lang->line('pmp_baseline') ?>" data-item_id="<?= $project_mp_id ?>" data-view="<?= $view_name ?>" data-toggle="modal" data-placement="left" data-target="#write-evaluation" data-tt="tooltip"><i class="glyphicon glyphicon-list-alt"></i></a>
									<div>
										<textarea onkeyup="limite_textarea(this.value, 'pmp_12')" id="pmp_txt_12" maxlength="2000" oninput="eylem(this, this.value)" class="form-control elasticteste" name="baseline_maintenance"><?php echo $baseline_maintenance; ?></textarea>
									</div>
								</div>

								<div class=" col-lg-12 form-group">
									<label for="cost_baseline"><?= $this->lang->line('pmp_cost_baseline') ?></label>
									<span class="pmp_13">2000</span><?= $this->lang->line('character') ?>
									<a class="btn-sm btn-default" id="pmp_tp_13" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('pmp_cost_baseline_tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
									<a <?= fieldStatus($view_name, $project_mp_id, "cost_baseline") ?> data-field="cost_baseline" data-field_name="<?= $this->lang->line('pmp_cost_baseline') ?>" data-item_id="<?= $project_mp_id ?>" data-view="<?= $view_name ?>" data-toggle="modal" data-placement="left" data-target="#write-evaluation" data-tt="tooltip"><i class="glyphicon glyphicon-list-alt"></i></a>
									<div>
										<textarea onkeyup="limite_textarea(this.value, 'pmp_13')" id="pmp_txt_13" maxlength="2000" oninput="eylem(this, this.value)" class="form-control elasticteste" name="cost_baseline"><?php echo $cost_baseline; ?></textarea>
									</div>
								</div>

								<h3><?= $this->lang->line('additional_components') ?></h3>

								<div class=" col-lg-12 form-group">
									<label for="change_mp"><?= $this->lang->line('pmp_change_mp') ?></label>
									<span class="pmp_14">2000</span><?= $this->lang->line('character') ?>
									<a class="btn-sm btn-default" id="pmp_tp_14" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('pmp_change_mp_tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
									<a <?= fieldStatus($view_name, $project_mp_id, "change_mp") ?> data-field="change_mp" data-field_name="<?= $this->lang->line('pmp_change_mp') ?>" data-item_id="<?= $project_mp_id ?>" data-view="<?= $view_name ?>" data-toggle="modal" data-placement="left" data-target="#write-evaluation" data-tt="tooltip"><i class="glyphicon glyphicon-list-alt"></i></a>
									<div>
										<textarea onkeyup="limite_textarea(this.value, 'pmp_14')" id="pmp_txt_14" maxlength="2000" oninput="eylem(this, this.value)" class="form-control elasticteste" name="change_mp"><?php echo $change_mp; ?></textarea>
									</div>
								</div>

								<div class="col-lg-12 form-group">
									<label for="configuration_mp"><?= $this->lang->line('pmp_configuration_mp') ?></label>
									<span class="pmp_15">2000</span><?= $this->lang->line('character') ?>
									<a class="btn-sm btn-default" id="pmp_tp_15" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('pmp_configuration_mp_tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
									<a <?= fieldStatus($view_name, $project_mp_id, "configuration_mp") ?> data-field="configuration_mp" data-field_name="<?= $this->lang->line('pmp_configuration_mp') ?>" data-item_id="<?= $project_mp_id ?>" data-view="<?= $view_name ?>" data-toggle="modal" data-placement="left" data-target="#write-evaluation" data-tt="tooltip"><i class="glyphicon glyphicon-list-alt"></i></a>
									<div>
										<textarea onkeyup="limite_textarea(this.value, 'pmp_15')" id="pmp_txt_15" maxlength="2000" oninput="eylem(this, this.value)" class="form-control elasticteste" name="configuration_mp"><?php echo $configuration_mp; ?></textarea>
									</div>
								</div>

								<div class=" col-lg-12 form-group">
									<label for="performance"><?= $this->lang->line('pmp_performance') ?></label>
									<span class="pmp_16">2000</span><?= $this->lang->line('character') ?>
									<a class="btn-sm btn-default" id="pmp_tp_16" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('pmp_performance_tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
									<a <?= fieldStatus($view_name, $project_mp_id, "performance") ?> data-field="performance" data-field_name="<?= $this->lang->line('pmp_performance') ?>" data-item_id="<?= $project_mp_id ?>" data-view="<?= $view_name ?>" data-toggle="modal" data-placement="left" data-target="#write-evaluation" data-tt="tooltip"><i class="glyphicon glyphicon-list-alt"></i></a>
									<div>
										<textarea onkeyup="limite_textarea(this.value, 'pmp_16')" id="pmp_txt_16" maxlength="2000" oninput="eylem(this, this.value)" class="form-control elasticteste" name="performance"><?php echo $performance; ?></textarea>
									</div>
								</div>

								<div class="col-lg-12 form-group">
									<label for="project_lifecycle"><?= $this->lang->line('pmp_lifecycle') ?></label>
									<span class="pmp_17">2000</span><?= $this->lang->line('character') ?>
									<a class="btn-sm btn-default" id="pmp_tp_17" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('pmp_lifecycle_tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
									<a <?= fieldStatus($view_name, $project_mp_id, "project_lifecycle") ?> data-field="project_lifecycle" data-field_name="<?= $this->lang->line('pmp_lifecycle') ?>" data-item_id="<?= $project_mp_id ?>" data-view="<?= $view_name ?>" data-toggle="modal" data-placement="left" data-target="#write-evaluation" data-tt="tooltip"><i class="glyphicon glyphicon-list-alt"></i></a>
									<div>
										<textarea onkeyup="limite_textarea(this.value, 'pmp_17')" id="pmp_txt_17" maxlength="2000" oninput="eylem(this, this.value)" class="form-control elasticteste" name="project_lifecycle"><?php echo $project_lifecycle; ?></textarea>
									</div>
								</div>

								<div class=" col-lg-12 form-group">
									<label for="development"><?= $this->lang->line('pmp_development') ?></label>
									<span class="pmp_18">2000</span><?= $this->lang->line('character') ?>
									<a class="btn-sm btn-default" id="pmp_tp_18" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('pmp_development_tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
									<a <?= fieldStatus($view_name, $project_mp_id, "development") ?> data-field="development" data-field_name="<?= $this->lang->line('pmp_development') ?>" data-item_id="<?= $project_mp_id ?>" data-view="<?= $view_name ?>" data-toggle="modal" data-placement="left" data-target="#write-evaluation" data-tt="tooltip"><i class="glyphicon glyphicon-list-alt"></i></a>
									<div>
										<textarea onkeyup="limite_textarea(this.value, 'pmp_18')" id="pmp_txt_18" maxlength="2000" oninput="eylem(this, this.value)" class="form-control elasticteste" name="development"><?php echo $development; ?></textarea>
									</div>
								</div>

								<div class="col-lg-12 form-group">
									<label for="key_review"><?= $this->lang->line('pmp_key_review') ?></label>
									<span class="pmp_19">2000</span><?= $this->lang->line('character') ?>
									<a class="btn-sm btn-default" id="pmp_tp_19" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('pmp_key_review_tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
									<a <?= fieldStatus($view_name, $project_mp_id, "key_review") ?> data-field="key_review" data-field_name="<?= $this->lang->line('pmp_key_review') ?>" data-item_id="<?= $project_mp_id ?>" data-view="<?= $view_name ?>" data-toggle="modal" data-placement="left" data-target="#write-evaluation" data-tt="tooltip"><i class="glyphicon glyphicon-list-alt"></i></a>
									<div>
										<textarea onkeyup="limite_textarea(this.value, 'pmp_19')" id="pmp_txt_19" maxlength="2000" oninput="eylem(this, this.value)" class="form-control elasticteste" name="key_review"><?php echo $key_review; ?></textarea>
									</div>
								</div>

								<input type="hidden" name="status" value="1">

								<div class="col-lg-12">
									<button id="tap-submit" type="submit" value="Save" class="btn btn-lg btn-success pull-right">
										<i class="glyphicon glyphicon-ok"></i>
										<?= $this->lang->line('btn-save') ?>
									</button>


							</form>

							<form action="<?php echo base_url('project/'); ?><?php echo $_SESSION['project_id']; ?>">
								<button class="btn btn-lg btn-info pull-left"> <i class="glyphicon glyphicon-chevron-left"></i> <?= $this->lang->line('btn-back') ?></button>
							</form>

							<form target="_blank" action="<?php echo base_url() ?>ProjectManagementPlan_PDF/pdfGenerator/<?php echo $_SESSION['project_id']; ?>" method="post">
								<button type="submit" class="btn btn-lg btn-dark center-block"><em class="glyphicon glyphicon-file"></em>PDF<span class="hidden-xs"></span></button>
							</form>

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

							<!-- Envia o nome da view como parametro -->
							<?php $view = array(
								"name" => "project_management_plan",
							); ?>

							<!--aqui-->

							<!--Carrega o form de envio-->
							<?php $this->load->view('upload/index', $view) ?>
							<!--Carrega as imagens do projeto-->
							<?php $this->load->view('upload/retrieve', $view) ?>


						</div>
					</div>
				</div>
			</section>
		</div>
	</div>
</body>
<script type="text/javascript">
	for (var i = 1; i <= 19; i++) {
		if (document.getElementById("pmp_tp_" + i).title == "") {
			document.getElementById("pmp_tp_" + i).hidden = true;
		}
		limite_textarea(document.getElementById("pmp_txt_" + i).value, "pmp_" + i);
	}

	function limite_textarea(valor, txt) {
		var limite = 2000;
		var caracteresDigitados = valor.length;
		var caracteresRestantes = limite - caracteresDigitados;
		$("." + txt).text(caracteresRestantes);
	}
</script>
<?php $this->load->view('frame/footer_view') ?>