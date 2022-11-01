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
							<!-- avaliação -->
							<link href="<?= base_url() ?>assets/css/field_evaluation.css" rel="stylesheet" type="text/css">
							<?php $view_name = "risk register";
							getViewFields($view_name);
							?>
							<?php $this->load->view('construction_services/write_field_evaluation') ?>

							<form action="<?= base_url() ?>risk/risk-register/update/<?php echo $risk_register_id; ?>" method="post">

								<input type="hidden" id="project_id" name="project_id" value="<?php echo $project_id; ?>">
								<!-- Textarea -->

								<div class=" col-lg-6 form-group">
									<label for="impacted_objective"><?= $this->lang->line('rir_impacted_objective') ?> *</label>
									<span class="rir_1">2000</span><?= $this->lang->line('character') ?>
									<a class="btn-sm btn-default" id="rir_tp_1" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('rir_impacted_objective_tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>

									<a <?= fieldStatus($view_name, $risk_register_id, "impacted_objective") ?> data-field="impacted_objective" data-field_name="<?= $this->lang->line('rir_impacted_objective') ?>" data-item_id="<?= $risk_register_id ?>" data-view="<?= $view_name ?>" data-toggle="modal" data-placement="left" data-target="#write-evaluation" data-tt="tooltip"><i class="glyphicon glyphicon-list-alt"></i></a>

									<div>
										<input id="rir_txt_1" type="text" name="impacted_objective" class="form-control input-md" onkeyup="limite_textarea(this.value, 'rir_1')" maxlength="2000" oninput="eylem(this, this.value)" required="true" value=" <?php echo $impacted_objective; ?>">
									</div>
								</div>

								<!-- valor 0 para baixo | valor 1 para  medio | valor 2 para alta-->
								<div class="col-lg-6 form-group">
									<label for="priority"><?= $this->lang->line('rir_priority') ?></label>
									<a class="btn-sm btn-default" id="rir_tp_2" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('risk-priority_tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
									<a <?= fieldStatus($view_name, $risk_register_id, "priority") ?> data-field="priority" data-field_name="<?= $this->lang->line('rir_priority') ?>" data-item_id="<?= $risk_register_id ?>" data-view="<?= $view_name ?>" data-toggle="modal" data-placement="left" data-target="#write-evaluation" data-tt="tooltip"><i class="glyphicon glyphicon-list-alt"></i></a>
									<select name="priority" class="form-control" value="<?php echo $priority; ?>">
										<option value="0"><?= $this->lang->line('rir_priority-low') ?></option>
										<option value="1"><?= $this->lang->line('rir_priority-medium') ?></option>
										<option value="2"><?= $this->lang->line('rir_priority-high') ?></option>

									</select>
								</div>
								<div class=" col-lg-6 form-group">
									<label for="risk_status"><?= $this->lang->line('rir_risk_status') ?></label>
									<span class="rir_3">2000</span><?= $this->lang->line('character') ?>
									<a class="btn-sm btn-default" id="rir_tp_3" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('rir_risk_status_tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>

									<a <?= fieldStatus($view_name, $risk_register_id, "risk_status") ?> data-field="risk_status" data-field_name="<?= $this->lang->line('rir_risk_status') ?>" data-item_id="<?= $risk_register_id ?>" data-view="<?= $view_name ?>" data-toggle="modal" data-placement="left" data-target="#write-evaluation" data-tt="tooltip"><i class="glyphicon glyphicon-list-alt"></i></a>
									<div>
										<input id="rir_txt_3" type="text" name="risk_status" class="form-control input-md" onkeyup="limite_textarea(this.value, 'rir_3')" maxlength="2000" oninput="eylem(this, this.value)" required="false" value=" <?php echo $risk_status; ?>">
									</div>
								</div>


								<div class=" col-lg-6 form-group">
									<label for="event"><?= $this->lang->line('rir_event') ?></label>
									<span class="rir_4">2000</span><?= $this->lang->line('character') ?>
									<a class="btn-sm btn-default" id="rir_tp_4" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('rir_event_tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
									<a <?= fieldStatus($view_name, $risk_register_id, "event") ?> data-field="event" data-field_name="<?= $this->lang->line('rir_event') ?>" data-item_id="<?= $risk_register_id ?>" data-view="<?= $view_name ?>" data-toggle="modal" data-placement="left" data-target="#write-evaluation" data-tt="tooltip"><i class="glyphicon glyphicon-list-alt"></i></a>
									<div>
										<input id="rir_txt_4" type="text" name="event" class="form-control input-md" onkeyup="limite_textarea(this.value, 'rir_4')" maxlength="2000" oninput="eylem(this, this.value)" required="false" value=" <?php echo $event; ?>">
									</div>
								</div>


								<!-- Inicio teste datas -->
								<div class="col-lg-6 form-group">
									<label><?= $this->lang->line('rir_date') ?></label>
									<div>
										<input autocomplete="off" class="form-control input-md" placeholder="YYYY/MM/DD" type="date" name="date"  value ="<?php echo $date; ?>" />
									</div>
								</div>

								<div class=" col-lg-6 form-group">
									<label for="identifier"><?= $this->lang->line('rir_identifier') ?></label>
									<span class="rir_5">2000</span><?= $this->lang->line('character') ?>
									<a class="btn-sm btn-default" id="rir_tp_5" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('rir_identifier_tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
									<a <?= fieldStatus($view_name, $risk_register_id, "identifier") ?> data-field="identifier" data-field_name="<?= $this->lang->line('rir_identifier') ?>" data-item_id="<?= $risk_register_id ?>" data-view="<?= $view_name ?>" data-toggle="modal" data-placement="left" data-target="#write-evaluation" data-tt="tooltip"><i class="glyphicon glyphicon-list-alt"></i></a>

									<div>
										<input id="rir_txt_5" type="text" name="identifier" class="form-control input-md" onkeyup="limite_textarea(this.value, 'rir_5')" maxlength="2000" oninput="eylem(this, this.value)" required="false" value=" <?php echo $identifier; ?>">
									</div>
								</div>

								<div class=" col-lg-6 form-group">
									<label for="type"><?= $this->lang->line('rir_type') ?></label>
									<span class="rir_6">2000</span><?= $this->lang->line('character') ?>
									<a class="btn-sm btn-default" id="rir_tp_6" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('rir_type_tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
									<a <?= fieldStatus($view_name, $risk_register_id, "type") ?> data-field="type" data-field_name="<?= $this->lang->line('rir_type') ?>" data-item_id="<?= $risk_register_id ?>" data-view="<?= $view_name ?>" data-toggle="modal" data-placement="left" data-target="#write-evaluation" data-tt="tooltip"><i class="glyphicon glyphicon-list-alt"></i></a>
									<div>
										<input id="rir_txt_6" type="text" name="type" class="form-control input-md" onkeyup="limite_textarea(this.value, 'rir_6')" maxlength="2000" oninput="eylem(this, this.value)" required="false" value=" <?php echo $type; ?>">
									</div>
								</div>

								<div class=" col-lg-6 form-group">
									<label for="lessons"><?= $this->lang->line('rir_lessons') ?></label>
									<span class="rir_7">2000</span><?= $this->lang->line('character') ?>
									<a class="btn-sm btn-default" id="rir_tp_7" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('') ?>"><i class="glyphicon glyphicon-comment"></i></a>
									<a <?= fieldStatus($view_name, $risk_register_id, "lessons") ?> data-field="lessons" data-field_name="<?= $this->lang->line('rir_lessons') ?>" data-item_id="<?= $risk_register_id ?>" data-view="<?= $view_name ?>" data-toggle="modal" data-placement="left" data-target="#write-evaluation" data-tt="tooltip"><i class="glyphicon glyphicon-list-alt"></i></a>
									<div>
										<input id="rir_txt_7" type="text" name="lessons" class="form-control input-md" onkeyup="limite_textarea(this.value, 'rir_7')" maxlength="2000" oninput="eylem(this, this.value)" required="false" value=" <?php echo $lessons; ?>">
									</div>
								</div>

								<div class=" col-lg-6 form-group">
									<label for="category"><?= $this->lang->line('rir_category') ?></label>
									<span class="rir_8">2000</span><?= $this->lang->line('character') ?>
									<a class="btn-sm btn-default" id="rir_tp_8" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('rir_category_tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
									<a <?= fieldStatus($view_name, $risk_register_id, "category") ?> data-field="category" data-field_name="<?= $this->lang->line('rir_category') ?>" data-item_id="<?= $risk_register_id ?>" data-view="<?= $view_name ?>" data-toggle="modal" data-placement="left" data-target="#write-evaluation" data-tt="tooltip"><i class="glyphicon glyphicon-list-alt"></i></a>
									<div>
										<input id="rir_txt_8" type="text" name="category" class="form-control input-md" onkeyup="limite_textarea(this.value, 'rir_8')" maxlength="2000" oninput="eylem(this, this.value)" required="false" value=" <?php echo $category; ?>">
									</div>
								</div>

								<div class=" col-lg-6 form-group">
									<label for="fallback"><?= $this->lang->line('rir_fallback') ?></label>
									<span class="rir_9">2000</span><?= $this->lang->line('character') ?>
									<a class="btn-sm btn-default" id="rir_tp_9" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('rir_fallback_tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
									<a <?= fieldStatus($view_name, $risk_register_id, "fallback") ?> data-field="fallback" data-field_name="<?= $this->lang->line('rir_fallback') ?>" data-item_id="<?= $risk_register_id ?>" data-view="<?= $view_name ?>" data-toggle="modal" data-placement="left" data-target="#write-evaluation" data-tt="tooltip"><i class="glyphicon glyphicon-list-alt"></i></a>
									<div>
										<input id="rir_txt_9" type="text" name="fallback" class="form-control input-md" onkeyup="limite_textarea(this.value, 'rir_9')" maxlength="2000" oninput="eylem(this, this.value)" required="false" value=" <?php echo $fallback; ?>">
									</div>
								</div>

								<div class=" col-lg-6 form-group">
									<label for="contingency_owner"><?= $this->lang->line('rir_contingency_owner') ?></label>
									<span class="rir_10">2000</span><?= $this->lang->line('character') ?>
									<a class="btn-sm btn-default" id="rir_tp_10" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('rir_contingency_owner_tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
									<a <?= fieldStatus($view_name, $risk_register_id, "contingency_owner") ?> data-field="contingency_owner" data-field_name="<?= $this->lang->line('rir_contingency_owner') ?>" data-item_id="<?= $risk_register_id ?>" data-view="<?= $view_name ?>" data-toggle="modal" data-placement="left" data-target="#write-evaluation" data-tt="tooltip"><i class="glyphicon glyphicon-list-alt"></i></a>
									<div>
										<input id="rir_txt_10" type="text" name="contingency_owner" class="form-control input-md" onkeyup="limite_textarea(this.value, 'rir_10')" maxlength="2000" oninput="eylem(this, this.value)" required="false" value=" <?php echo $contingency_owner; ?>">
									</div>
								</div>

								<div class=" col-lg-6 form-group">
									<label for="contingency"><?= $this->lang->line('rir_contingency') ?></label>
									<span class="rir_11">2000</span><?= $this->lang->line('character') ?>
									<a class="btn-sm btn-default" id="rir_tp_11" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('rir_contingency_tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
									<a <?= fieldStatus($view_name, $risk_register_id, "contingency") ?> data-field="contingency" data-field_name="<?= $this->lang->line('rir_contingency') ?>" data-item_id="<?= $risk_register_id ?>" data-view="<?= $view_name ?>" data-toggle="modal" data-placement="left" data-target="#write-evaluation" data-tt="tooltip"><i class="glyphicon glyphicon-list-alt"></i></a>
									<div>
										<input id="rir_txt_11" type="text" name="contingency" class="form-control input-md" onkeyup="limite_textarea(this.value, 'rir_11')" maxlength="2000" oninput="eylem(this, this.value)" required="false" value=" <?php echo $contingency; ?>">
									</div>
								</div>

								<div class=" col-lg-6 form-group">
									<label for="secondary"><?= $this->lang->line('rir_secondary') ?></label>
									<span class="rir_12">2000</span><?= $this->lang->line('character') ?>
									<a class="btn-sm btn-default" id="rir_tp_12" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('rir_secondary_tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
									<a <?= fieldStatus($view_name, $risk_register_id, "secondary") ?> data-field="secondary" data-field_name="<?= $this->lang->line('rir_secondary') ?>" data-item_id="<?= $risk_register_id ?>" data-view="<?= $view_name ?>" data-toggle="modal" data-placement="left" data-target="#write-evaluation" data-tt="tooltip"><i class="glyphicon glyphicon-list-alt"></i></a>
									<div>
										<input id="rir_txt_12" type="text" name="secondary" class="form-control input-md" onkeyup="limite_textarea(this.value, 'rir_12')" maxlength="2000" oninput="eylem(this, this.value)" required="false" value=" <?php echo $secondary; ?>">
									</div>
								</div>

								<div class=" col-lg-6 form-group">
									<label for="residual"><?= $this->lang->line('rir_residual') ?></label>
									<span class="rir_13">2000</span><?= $this->lang->line('character') ?>
									<a class="btn-sm btn-default" id="rir_tp_13" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('rir_residual_tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
									<a <?= fieldStatus($view_name, $risk_register_id, "residual") ?> data-field="residual" data-field_name="<?= $this->lang->line('rir_residual') ?>" data-item_id="<?= $risk_register_id ?>" data-view="<?= $view_name ?>" data-toggle="modal" data-placement="left" data-target="#write-evaluation" data-tt="tooltip"><i class="glyphicon glyphicon-list-alt"></i></a>
									<div>
										<input id="rir_txt_13" type="text" name="residual" class="form-control input-md" onkeyup="limite_textarea(this.value, 'rir_13')" maxlength="2000" oninput="eylem(this, this.value)" required="false" value=" <?php echo $residual; ?>">
									</div>
								</div>

								<div class=" col-lg-6 form-group">
									<label for="timing"><?= $this->lang->line('rir_timing') ?></label>
									<span class="rir_14">2000</span><?= $this->lang->line('character') ?>
									<a class="btn-sm btn-default" id="rir_tp_14" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('rir_timing_tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
									<a <?= fieldStatus($view_name, $risk_register_id, "timing") ?> data-field="timing" data-field_name="<?= $this->lang->line('rir_timing') ?>" data-item_id="<?= $risk_register_id ?>" data-view="<?= $view_name ?>" data-toggle="modal" data-placement="left" data-target="#write-evaluation" data-tt="tooltip"><i class="glyphicon glyphicon-list-alt"></i></a>
									<div>
										<input id="rir_txt_14" type="text" name="timing" class="form-control input-md" onkeyup="limite_textarea(this.value, 'rir_14')" maxlength="2000" oninput="eylem(this, this.value)" required="false" value=" <?php echo $timing; ?>">
									</div>
								</div>

								<div class=" col-lg-6 form-group">
									<label for="responses_owner"><?= $this->lang->line('rir_responses_owner') ?></label>
									<span class="rir_15">2000</span><?= $this->lang->line('character') ?>
									<a class="btn-sm btn-default" id="rir_tp_15" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('rir_responses_owner_tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
									<a <?= fieldStatus($view_name, $risk_register_id, "responses_owner") ?> data-field="responses_owner" data-field_name="<?= $this->lang->line('rir_responses_owner') ?>" data-item_id="<?= $risk_register_id ?>" data-view="<?= $view_name ?>" data-toggle="modal" data-placement="left" data-target="#write-evaluation" data-tt="tooltip"><i class="glyphicon glyphicon-list-alt"></i></a>
									<div>
										<input id="rir_txt_15" type="text" name="responses_owner" class="form-control input-md" onkeyup="limite_textarea(this.value, 'rir_15')" maxlength="2000" oninput="eylem(this, this.value)" required="false" value=" <?php echo $responses_owner; ?>">
									</div>
								</div>

								<div class=" col-lg-6 form-group">
									<label for="responses"><?= $this->lang->line('rir_responses') ?></label>
									<span class="rir_16">2000</span><?= $this->lang->line('character') ?>
									<a class="btn-sm btn-default" id="rir_tp_16" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('rir_responses_tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
									<a <?= fieldStatus($view_name, $risk_register_id, "responses") ?> data-field="responses" data-field_name="<?= $this->lang->line('rir_responses') ?>" data-item_id="<?= $risk_register_id ?>" data-view="<?= $view_name ?>" data-toggle="modal" data-placement="left" data-target="#write-evaluation" data-tt="tooltip"><i class="glyphicon glyphicon-list-alt"></i></a>
									<div>
										<input id="rir_txt_16" type="text" name="responses" class="form-control input-md" onkeyup="limite_textarea(this.value, 'rir_16')" maxlength="2000" oninput="eylem(this, this.value)" required="false" value=" <?php echo $responses; ?>">
									</div>
								</div>

								<div class=" col-lg-6 form-group">
									<label for="triggers"><?= $this->lang->line('rir_triggers') ?></label>
									<span class="rir_17">2000</span><?= $this->lang->line('character') ?>
									<a class="btn-sm btn-default" id="rir_tp_17" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('rir_triggers_tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
									<a <?= fieldStatus($view_name, $risk_register_id, "impacted_objective") ?> data-field="impacted_objective" data-field_name="<?= $this->lang->line('rir_impacted_objective') ?>" data-item_id="<?= $risk_register_id ?>" data-view="<?= $view_name ?>" data-toggle="modal" data-placement="left" data-target="#write-evaluation" data-tt="tooltip"><i class="glyphicon glyphicon-list-alt"></i></a>
									<div>
										<input id="rir_txt_17" type="text" name="triggers" class="form-control input-md" onkeyup="limite_textarea(this.value, 'rir_17')" maxlength="2000" oninput="eylem(this, this.value)" required="false" value=" <?php echo $triggers; ?>">
									</div>
								</div>

								<div class=" col-lg-6 form-group">
									<label for="causes"><?= $this->lang->line('rir_causes') ?></label>
									<span class="rir_18">2000</span><?= $this->lang->line('character') ?>
									<a class="btn-sm btn-default" id="rir_tp_18" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('rir_causes_tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
									<a <?= fieldStatus($view_name, $risk_register_id, "causes") ?> data-field="causes" data-field_name="<?= $this->lang->line('rir_causes') ?>" data-item_id="<?= $risk_register_id ?>" data-view="<?= $view_name ?>" data-toggle="modal" data-placement="left" data-target="#write-evaluation" data-tt="tooltip"><i class="glyphicon glyphicon-list-alt"></i></a>
									<div>
										<input id="rir_txt_18" type="text" name="causes" class="form-control input-md" onkeyup="limite_textarea(this.value, 'rir_18')" maxlength="2000" oninput="eylem(this, this.value)" required="false" value=" <?php echo $causes; ?>">
									</div>
								</div>

								<div class=" col-lg-6 form-group">
									<label for="strategy"><?= $this->lang->line('rir_strategy') ?></label>
									<span class="rir_19">2000</span><?= $this->lang->line('character') ?>
									<a class="btn-sm btn-default" id="rir_tp_19" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('rir_strategy_tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
									<a <?= fieldStatus($view_name, $risk_register_id, "strategy") ?> data-field="strategy" data-field_name="<?= $this->lang->line('rir_strategy') ?>" data-item_id="<?= $risk_register_id ?>" data-view="<?= $view_name ?>" data-toggle="modal" data-placement="left" data-target="#write-evaluation" data-tt="tooltip"><i class="glyphicon glyphicon-list-alt"></i></a>
									<div>
										<input id="rir_txt_19" type="text" name="strategy" class="form-control input-md" onkeyup="limite_textarea(this.value, 'rir_19')" maxlength="2000" oninput="eylem(this, this.value)" required="false" value=" <?php echo $strategy; ?>">
									</div>
								</div>

								<div class=" col-lg-6 form-group">
									<label for="effects"><?= $this->lang->line('rir_effects') ?></label>
									<span class="rir_20">2000</span><?= $this->lang->line('character') ?>
									<a class="btn-sm btn-default" id="rir_tp_20" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('rir_effects_tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
									<a <?= fieldStatus($view_name, $risk_register_id, "effects") ?> data-field="effects" data-field_name="<?= $this->lang->line('rir_effects') ?>" data-item_id="<?= $risk_register_id ?>" data-view="<?= $view_name ?>" data-toggle="modal" data-placement="left" data-target="#write-evaluation" data-tt="tooltip"><i class="glyphicon glyphicon-list-alt"></i></a>
									<div>
										<input id="rir_txt_20" type="text" name="effects" class="form-control input-md" onkeyup="limite_textarea(this.value, 'rir_20')" maxlength="2000" oninput="eylem(this, this.value)" required="false" value=" <?php echo $effects; ?>">
									</div>
								</div>

								<div class=" col-lg-6 form-group">
									<label for="score"><?= $this->lang->line('rir_score') ?></label>
									<span class="rir_21">2000</span><?= $this->lang->line('character') ?>
									<a class="btn-sm btn-default" id="rir_tp_21" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('rir_score_tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
									<a <?= fieldStatus($view_name, $risk_register_id, "score") ?> data-field="score" data-field_name="<?= $this->lang->line('rir_score') ?>" data-item_id="<?= $risk_register_id ?>" data-view="<?= $view_name ?>" data-toggle="modal" data-placement="left" data-target="#write-evaluation" data-tt="tooltip"><i class="glyphicon glyphicon-list-alt"></i></a>
									<div>
										<input id="rir_txt_21" type="text" name="score" class="form-control input-md" onkeyup="limite_textarea(this.value, 'rir_21')" maxlength="2000" oninput="eylem(this, this.value)" required="false" value=" <?php echo $score; ?>">
									</div>
								</div>

								<div class=" col-lg-6 form-group">
									<label for="impact"><?= $this->lang->line('rir_impact') ?></label>
									<span class="rir_22">2000</span><?= $this->lang->line('character') ?>
									<a class="btn-sm btn-default" id="rir_tp_22" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('rir_impact_tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
									<a <?= fieldStatus($view_name, $risk_register_id, "impact") ?> data-field="impact" data-field_name="<?= $this->lang->line('impact') ?>" data-item_id="<?= $risk_register_id ?>" data-view="<?= $view_name ?>" data-toggle="modal" data-placement="left" data-target="#write-evaluation" data-tt="tooltip"><i class="glyphicon glyphicon-list-alt"></i></a>
									<div>
										<input id="rir_txt_22" type="text" name="impact" class="form-control input-md" onkeyup="limite_textarea(this.value, 'rir_22')" maxlength="2000" oninput="eylem(this, this.value)" required="false" value=" <?php echo $impact; ?>">
									</div>
								</div>

								<div class=" col-lg-6 form-group">
									<label for="probability"><?= $this->lang->line('rir_probability') ?></label>
									<span class="rir_23">2000</span><?= $this->lang->line('character') ?>
									<a class="btn-sm btn-default" id="rir_tp_23" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('rir_probability_tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
									<a <?= fieldStatus($view_name, $risk_register_id, "probability") ?> data-field="probability" data-field_name="<?= $this->lang->line('rir_probability') ?>" data-item_id="<?= $risk_register_id ?>" data-view="<?= $view_name ?>" data-toggle="modal" data-placement="left" data-target="#write-evaluation" data-tt="tooltip"><i class="glyphicon glyphicon-list-alt"></i></a>
									<div>
										<input id="rir_txt_23" type="text" name="probability" class="form-control input-md" onkeyup="limite_textarea(this.value, 'rir_23')" maxlength="2000" oninput="eylem(this, this.value)" required="false" value=" <?php echo $probability; ?>">
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


<link href="<?= base_url() ?>assets/css/bootstrap-iso.css" rel="stylesheet">
<link href="<?= base_url() ?>assets/css/bootstrap-datepicker3.css" rel="stylesheet">
<script src="<?= base_url() ?>assets/js/bootstrap-datepicker.min.js" type="text/javascript"></script>
<script src="<?= base_url() ?>assets/js/bootstrap-datepicker.pt-BR.min.js" type="text/javascript"></script>
<script src="<?= base_url() ?>assets/js/jquery-1.11.1.js" type="text/javascript"></script>
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


	for (var i = 1; i <= 23; i++) {
		if (document.getElementById("rir_tp_" + i).title == "") {
			document.getElementById("rir_tp_" + i).hidden = true;
		}
		limite_textarea(document.getElementById("rir_txt_" + i).value, "rir_" + i);
	}

	function limite_textarea(valor, txt) {
		var limite = 2000;
		var caracteresDigitados = valor.length;
		var caracteresRestantes = limite - caracteresDigitados;
		$("." + txt).text(caracteresRestantes);
	}

	//Start Date Ends Here
</script>
<?php $this->load->view('frame/footer_view') ?>