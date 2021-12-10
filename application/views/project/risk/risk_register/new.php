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

								<?= $this->lang->line('rir_title')  ?>

							</h1>

							<form method="POST" action="<?php echo base_url('risk/risk-register/insert/'); ?><?php echo $id; ?>">

							<div class=" col-lg-6 form-group">
									<label for="impacted_objective"><?= $this->lang->line('rir_impacted_objective') ?> *</label>
									<span class="rir_1">2000</span><?= $this->lang->line('character') ?>
									<a class="btn-sm btn-default" id="rir_tp_1" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('risk-impacted_objective_tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>

									<div>
									<input id="rir_txt_1" type="text" name="impacted_objective" class="form-control input-md" onkeyup = "limite_textarea(this.value, 'rir_1')" maxlength="2000" oninput="eylem(this, this.value)" required="true">
									</div>
								</div>

								<!-- valor 0 para baixo | valor 1 para  medio | valor 2 para alta-->
								<div class="col-lg-6 form-group">
									<label for="priority"><?= $this->lang->line('rir_priority') ?></label>
									<a class="btn-sm btn-default" id="rir_tp_2" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('risk-priority_tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
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

									<div>
									<input id="rir_txt_3" type="text" name="risk_status" class="form-control input-md" onkeyup = "limite_textarea(this.value, 'rir_3')" maxlength="2000" oninput="eylem(this, this.value)" required="false">
									</div>
								</div>


								<div class=" col-lg-6 form-group">
									<label for="event"><?= $this->lang->line('rir_event') ?></label>
									<span class="rir_4">2000</span><?= $this->lang->line('character') ?>
									<a class="btn-sm btn-default" id="rir_tp_4" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('rir_event_tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>

									<div>
									<input id="rir_txt_4" type="text" name="event" class="form-control input-md" onkeyup = "limite_textarea(this.value, 'rir_4')" maxlength="2000" oninput="eylem(this, this.value)" required="false" >
									</div>
								</div>


								<!-- Inicio teste datas -->
								<div class="form-group">
									<div class="col-lg-6">
										<label><?= $this->lang->line('rir_date') ?></label>
										<div class="input-group">
											<div class="input-group-addon">
												<i class="fa fa-calendar"></i>
											</div>
											<input class="form-control" id="date" placeholder="YYYY/MM/DD" type="date" name="date" />
										</div>
									</div>
								</div>

								<div class=" col-lg-6 form-group">
									<label for="identifier"><?= $this->lang->line('rir_identifier') ?></label>
									<span class="rir_5">2000</span><?= $this->lang->line('character') ?>
									<a class="btn-sm btn-default" id="rir_tp_5" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('rir_identifier_tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>

									<div>
									<input id="rir_txt_5" type="text" name="identifier" class="form-control input-md" onkeyup = "limite_textarea(this.value, 'rir_5')" maxlength="2000" oninput="eylem(this, this.value)" required="false">
									</div>
								</div>

								<div class=" col-lg-6 form-group">
									<label for="type"><?= $this->lang->line('rir_type') ?></label>
									<span class="rir_6">2000</span><?= $this->lang->line('character') ?>
									<a class="btn-sm btn-default" id="rir_tp_6" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('rir_type_tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>

									<div>
									<input id="rir_txt_6" type="text" name="type" class="form-control input-md" onkeyup = "limite_textarea(this.value, 'rir_6')" maxlength="2000" oninput="eylem(this, this.value)" required="false">
									</div>
								</div>

								<div class=" col-lg-6 form-group">
									<label for="lessons"><?= $this->lang->line('rir_lessons') ?></label>
									<span class="rir_7">2000</span><?= $this->lang->line('character') ?>
									<a class="btn-sm btn-default" id="rir_tp_7" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('rir_lessons_tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
									<div>
									<input id="rir_txt_7" type="text" name="lessons" class="form-control input-md" onkeyup = "limite_textarea(this.value, 'rir_7')" maxlength="2000" oninput="eylem(this, this.value)" required="false"  >
									</div>
								</div>

								<div class=" col-lg-6 form-group">
									<label for="category"><?= $this->lang->line('rir_category') ?></label>
									<span class="rir_8">2000</span><?= $this->lang->line('character') ?>
									<a class="btn-sm btn-default" id="rir_tp_8" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('rir_category_tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
									<div>
									<input id="rir_txt_8" type="text" name="category" class="form-control input-md" onkeyup = "limite_textarea(this.value, 'rir_8')" maxlength="2000" oninput="eylem(this, this.value)" required="false">
									</div>
								</div>

								<div class=" col-lg-6 form-group">
									<label for="fallback"><?= $this->lang->line('rir_fallback') ?></label>
									<span class="rir_9">2000</span><?= $this->lang->line('character') ?>
									<a class="btn-sm btn-default" id="rir_tp_9" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('rir_fallback_tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
									<div>
									<input id="rir_txt_9" type="text" name="fallback" class="form-control input-md" onkeyup = "limite_textarea(this.value, 'rir_9')" maxlength="2000" oninput="eylem(this, this.value)" required="false">
									</div>
								</div>

								<div class=" col-lg-6 form-group">
									<label for="contingency_owner"><?= $this->lang->line('rir_contingency_owner') ?></label>
									<span class="rir_10">2000</span><?= $this->lang->line('character') ?>
									<a class="btn-sm btn-default" id="rir_tp_10" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('rir_contingency_owner_tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
									<div>
									<input id="rir_txt_10" type="text" name="contingency_owner" class="form-control input-md" onkeyup = "limite_textarea(this.value, 'rir_10')" maxlength="2000" oninput="eylem(this, this.value)" required="false">
									</div>
								</div>

								<div class=" col-lg-6 form-group">
									<label for="contingency"><?= $this->lang->line('rir_contingency') ?></label>
									<span class="rir_11">2000</span><?= $this->lang->line('character') ?>
									<a class="btn-sm btn-default" id="rir_tp_11" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('rir_contingency_tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
									<div>
									<input id="rir_txt_11" type="text" name="contingency" class="form-control input-md" onkeyup = "limite_textarea(this.value, 'rir_11')" maxlength="2000" oninput="eylem(this, this.value)" required="false" >
									</div>
								</div>

								<div class=" col-lg-6 form-group">
									<label for="secondary"><?= $this->lang->line('rir_secondary') ?></label>
									<span class="rir_12">2000</span><?= $this->lang->line('character') ?>
									<a class="btn-sm btn-default" id="rir_tp_12" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('rir_secondary_tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
									<div>
									<input id="rir_txt_12" type="text" name="secondary" class="form-control input-md" onkeyup = "limite_textarea(this.value, 'rir_12')" maxlength="2000" oninput="eylem(this, this.value)" required="false" >
									</div>
								</div>

								<div class=" col-lg-6 form-group">
									<label for="residual"><?= $this->lang->line('rir_residual') ?></label>
									<span class="rir_13">2000</span><?= $this->lang->line('character') ?>
									<a class="btn-sm btn-default" id="rir_tp_13" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('rir_residual_tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
									<div>
									<input id="rir_txt_13" type="text" name="residual" class="form-control input-md" onkeyup = "limite_textarea(this.value, 'rir_13')" maxlength="2000" oninput="eylem(this, this.value)" required="false" >
									</div>
								</div>

								<div class=" col-lg-6 form-group">
									<label for="timing"><?= $this->lang->line('rir_timing') ?></label>
									<span class="rir_14">2000</span><?= $this->lang->line('character') ?>
									<a class="btn-sm btn-default" id="rir_tp_14" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('rir_timing_tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
									<div>
									<input id="rir_txt_14" type="text" name="timing" class="form-control input-md" onkeyup = "limite_textarea(this.value, 'rir_14')" maxlength="2000" oninput="eylem(this, this.value)" required="false">
									</div>
								</div>

								<div class=" col-lg-6 form-group">
									<label for="responses_owner"><?= $this->lang->line('rir_responses_owner') ?></label>
									<span class="rir_15">2000</span><?= $this->lang->line('character') ?>
									<a class="btn-sm btn-default" id="rir_tp_15" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('rir_responses_owner_tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
									<div>
									<input id="rir_txt_15" type="text" name="responses_owner" class="form-control input-md" onkeyup = "limite_textarea(this.value, 'rir_15')" maxlength="2000" oninput="eylem(this, this.value)" required="false" >
									</div>
								</div>

								<div class=" col-lg-6 form-group">
									<label for="responses"><?= $this->lang->line('rir_responses') ?></label>
									<span class="rir_16">2000</span><?= $this->lang->line('character') ?>
									<a class="btn-sm btn-default" id="rir_tp_16" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('rir_responses_tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
									<div>
									<input id="rir_txt_16" type="text" name="responses" class="form-control input-md" onkeyup = "limite_textarea(this.value, 'rir_16')" maxlength="2000" oninput="eylem(this, this.value)" required="false" >
									</div>
								</div>

								<div class=" col-lg-6 form-group">
									<label for="triggers"><?= $this->lang->line('rir_triggers') ?></label>
									<span class="rir_17">2000</span><?= $this->lang->line('character') ?>
									<a class="btn-sm btn-default" id="rir_tp_17" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('rir_triggers_tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
									<div>
									<input id="rir_txt_17" type="text" name="triggers" class="form-control input-md" onkeyup = "limite_textarea(this.value, 'rir_17')" maxlength="2000" oninput="eylem(this, this.value)" required="false">
									</div>
								</div>

								<div class=" col-lg-6 form-group">
									<label for="causes"><?= $this->lang->line('rir_causes') ?></label>
									<span class="rir_18">2000</span><?= $this->lang->line('character') ?>
									<a class="btn-sm btn-default" id="rir_tp_18" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('rir_causes_tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
									<div>
									<input id="rir_txt_18" type="text" name="causes" class="form-control input-md" onkeyup = "limite_textarea(this.value, 'rir_18')" maxlength="2000" oninput="eylem(this, this.value)" required="false">
									</div>
								</div>

								<div class=" col-lg-6 form-group">
									<label for="strategy"><?= $this->lang->line('rir_strategy') ?></label>
									<span class="rir_19">2000</span><?= $this->lang->line('character') ?>
									<a class="btn-sm btn-default" id="rir_tp_19" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('rir_strategy_tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
									<div>
									<input id="rir_txt_19" type="text" name="strategy" class="form-control input-md" onkeyup = "limite_textarea(this.value, 'rir_19')" maxlength="2000" oninput="eylem(this, this.value)" required="false">
									</div>
								</div>

								<div class=" col-lg-6 form-group">
									<label for="effects"><?= $this->lang->line('rir_effects') ?></label>
									<span class="rir_20">2000</span><?= $this->lang->line('character') ?>
									<a class="btn-sm btn-default" id="rir_tp_20" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('rir_effects_tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
									<div>
									<input id="rir_txt_20" type="text" name="effects" class="form-control input-md" onkeyup = "limite_textarea(this.value, 'rir_20')" maxlength="2000" oninput="eylem(this, this.value)" required="false">
									</div>
								</div>

								<div class=" col-lg-6 form-group">
									<label for="score"><?= $this->lang->line('rir_score') ?></label>
									<span class="rir_21">2000</span><?= $this->lang->line('character') ?>
									<a class="btn-sm btn-default" id="rir_tp_21" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('rir_score_tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
									<div>
									<input id="rir_txt_21" type="text" name="score" class="form-control input-md" onkeyup = "limite_textarea(this.value, 'rir_21')" maxlength="2000" oninput="eylem(this, this.value)" required="false">
									</div>
								</div>

								<div class=" col-lg-6 form-group">
									<label for="impact"><?= $this->lang->line('rir_impact') ?></label>
									<span class="rir_22">2000</span><?= $this->lang->line('character') ?>
									<a class="btn-sm btn-default" id="rir_tp_22" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('rir_impact_tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
									<div>
									<input id="rir_txt_22" type="text" name="impact" class="form-control input-md" onkeyup = "limite_textarea(this.value, 'rir_22')" maxlength="2000" oninput="eylem(this, this.value)" required="false" >
									</div>
								</div>

								<div class=" col-lg-6 form-group">
									<label for="probability"><?= $this->lang->line('rir_probability') ?></label>
									<span class="rir_23">2000</span><?= $this->lang->line('character') ?>
									<a class="btn-sm btn-default" id="rir_tp_23" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('rir_probability_tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
									<div>
									<input id="rir_txt_23" type="text" name="probability" class="form-control input-md" onkeyup = "limite_textarea(this.value, 'rir_23')" maxlength="2000" oninput="eylem(this, this.value)" required="false" >
									</div>
								</div>

								<div class="col-lg-12">
									<button id="stakeholder-submit" type="submit" value="Save" class="btn btn-lg btn-success pull-right">
										<i class="glyphicon glyphicon-ok"></i> <?= $this->lang->line('btn-save') ?>
									</button>
							</form>
							<form action="<?php echo base_url('risk/risk-register/list/'); ?><?php echo $id; ?>">
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
<script src="<?= base_url() ?>assets/js/jquery-1.11.1.js" type="text/javascript"></script>
<script>
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

</script>
<?php $this->load->view('frame/footer_view') ?>