<body class="hold-transition skin-gray sidebar-mini">
	<div class="wrapper">
		<div class="content-wrapper" style="padding-top:50px;">
			<section class="content">

				<?php if ($this->session->flashdata('success')) : ?>
					<div class="alert alert-success">
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
						<strong><?php echo $this->session->flashdata('success'); ?></strong>
					</div>
				<?php elseif ($this->session->flashdata('error')) : ?>
					<div class="alert alert-warning">
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
						<strong><?php echo $this->session->flashdata('error'); ?></strong>
					</div>
				<?php endif; ?>


				<div class="row">
					<div class="col-lg-12">
						<div class="panel-body">
							<h1 class="page-header">
								<?= $this->lang->line('pch_title')  ?>
							</h1>
							<form method="POST" action="<?php echo base_url('integration/project-charter/insert'); ?>">

								<input type="hidden" name="project_id" value="<?php echo $_SESSION['project_id']; ?>">
								<input type="hidden" name="status" value="1">

								<div class="col-lg-12 form-group">
									<label for="project_description"><?= $this->lang->line('pch_description') ?></label>
									<span class="pch_1">2000</span><?= $this->lang->line('character') ?>
									<a class="btn-sm btn-default" id="pch_tp_1" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('pch_description_tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
									<div>
										<textarea onkeyup="limite_textarea(this.value, 'pch_1')" id="pch_txt_1" maxlength="2000" oninput="eylem(this, this.value)" class="form-control elasticteste" name="project_description" required="true"></textarea>
									</div>
								</div>

								<div class=" col-lg-12 form-group">
									<label for="project_purpose"><?= $this->lang->line('pch_purpose') ?></label>
									<span class="pch_2">2000</span><?= $this->lang->line('character') ?>
									<a class="btn-sm btn-default" id="pch_tp_2" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('pch_purpose_tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
									<div>
										<textarea onkeyup="limite_textarea(this.value, 'pch_2')" id="pch_txt_2" maxlength="2000" oninput="eylem(this, this.value)" class="form-control elasticteste" name="project_purpose"></textarea>
									</div>
								</div>

								<div class=" col-lg-12 form-group">
									<label for="project_objective"><?= $this->lang->line('pch_objectives') ?></label>
									<span class="pch_3">2000</span><?= $this->lang->line('character') ?>
									<a class="btn-sm btn-default" id="pch_tp_3" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('pch_objectives_tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
									<div>
										<textarea onkeyup="limite_textarea(this.value, 'pch_3')" id="pch_txt_3" maxlength="2000" oninput="eylem(this, this.value)" class="form-control elasticteste" name="project_objective"></textarea>
									</div>
								</div>

								<div class="col-lg-12 form-group">
									<label for="benefits"><?= $this->lang->line('pch_benefits') ?></label>
									<span class="pch_4">2000</span><?= $this->lang->line('character') ?>
									<a class="btn-sm btn-default" id="pch_tp_4" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('pch_benefits_tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
									<div>
										<textarea onkeyup="limite_textarea(this.value, 'pch_4')" id="pch_txt_4" maxlength="2000" oninput="eylem(this, this.value)" class="form-control elasticteste" name="benefits"></textarea>
									</div>
								</div>

								<div class=" col-lg-12 form-group">
									<label for="high_level_requirements"><?= $this->lang->line('pch_high_level_req') ?></label>
									<span class="pch_5">2000</span><?= $this->lang->line('character') ?>
									<a class="btn-sm btn-default" id="pch_tp_5" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('pch_high_level_req_tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
									<div>
										<textarea onkeyup="limite_textarea(this.value, 'pch_5')" id="pch_txt_5" maxlength="2000" oninput="eylem(this, this.value)" class="form-control elasticteste" name="high_level_requirements"></textarea>
									</div>
								</div>

								<div class=" col-lg-12 form-group">
									<label for="boundaries"><?= $this->lang->line('pch_boundaries') ?></label>
									<span class="pch_6">2000</span><?= $this->lang->line('character') ?>
									<a class="btn-sm btn-default" id="pch_tp_6" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('pch_boundaries_tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
									<div>
										<textarea onkeyup="limite_textarea(this.value, 'pch_6')" id="pch_txt_6" maxlength="2000" oninput="eylem(this, this.value)" class="form-control elasticteste" name="boundaries"></textarea>
									</div>
								</div>


								<div class=" col-lg-12 form-group">
									<label for="pch_risks"><?= $this->lang->line('pch_risks') ?></label>
									<span class="pch_7">2000</span><?= $this->lang->line('character') ?>
									<a class="btn-sm btn-default" id="pch_tp_7" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('pch_risks_tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
									<div>
										<textarea onkeyup="limite_textarea(this.value, 'pch_7')" id="pch_txt_7" maxlength="2000" oninput="eylem(this, this.value)" class="form-control elasticteste" name="high_level_risks"></textarea>
									</div>
								</div>


								<div class=" col-lg-12 form-group">
									<label for="summary_schedule"><?= $this->lang->line('pch_schedule') ?></label>
									<span class="pch_8">2000</span><?= $this->lang->line('character') ?>
									<a class="btn-sm btn-default" id="pch_tp_8" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('pch_schedule_tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
									<div>
										<textarea onkeyup="limite_textarea(this.value, 'pch_8')" id="pch_txt_8" maxlength="2000" oninput="eylem(this, this.value)" class="form-control elasticteste" name="summary_schedule"></textarea>
									</div>
								</div>

								<div class=" col-lg-12 form-group">
									<label for="budge_summary"><?= $this->lang->line('pch_budge') ?></label>
									<span class="pch_9">2000</span><?= $this->lang->line('character') ?>
									<a class="btn-sm btn-default" id="pch_tp_9" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('pch_budge_tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
									<div>
										<textarea onkeyup="limite_textarea(this.value, 'pch_9')" id="pch_txt_9" maxlength="2000" oninput="eylem(this, this.value)" class="form-control elasticteste" name="budge_summary"></textarea>
									</div>
								</div>


								<div class=" col-lg-12 form-group">
									<label for="project_approval_requirements"><?= $this->lang->line('pch_approval') ?></label>
									<span class="pch_10">2000</span><?= $this->lang->line('character') ?>
									<a class="btn-sm btn-default" id="pch_tp_10" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('pch_approval_tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
									<div>
										<textarea onkeyup="limite_textarea(this.value, 'pch_10')" id="pch_txt_10" maxlength="2000" oninput="eylem(this, this.value)" class="form-control elasticteste" name="project_approval_requirements"></textarea>
									</div>
								</div>

								<div class=" col-lg-6 form-group">
									<label for="success_criteria"><?= $this->lang->line('pch_sucess_criteria') ?></label>
									<span class="pch_11">2000</span><?= $this->lang->line('character') ?>
									<a class="btn-sm btn-default" id="pch_tp_11" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('pch_success_criteria_tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
									<div>
										<textarea onkeyup="limite_textarea(this.value, 'pch_11')" id="pch_txt_11" maxlength="2000" oninput="eylem(this, this.value)" class="form-control elasticteste" name="success_criteria"></textarea>
									</div>
								</div>

								<div class=" col-lg-6 form-group">
									<label for="exit_criteria"><?= $this->lang->line('pch_exit_criteria') ?></label>
									<span class="pch_12">2000</span><?= $this->lang->line('character') ?>
									<a class="btn-sm btn-default" id="pch_tp_12" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('pch_exit_criteria_tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
									<div>
										<textarea onkeyup="limite_textarea(this.value, 'pch_12')" id="pch_txt_12" maxlength="2000" oninput="eylem(this, this.value)" class="form-control elasticteste" name="exit_criteria"></textarea>
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
											<input autocomplete="off" class=" form-control" id="start_date" placeholder="YYYY/MM/DD" type="date" name="start_date" required="true" />
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
											<input autocomplete="off" class=" form-control" id="end_date" placeholder="YYYY/MM/DD" type="date" name="end_date" required="true" />
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
									<button <?php if ($_SESSION['access_level'] == "1") { ?> disabled <?php } ?> id="pch_submit" type="submit" value="Save" class="btn btn-lg btn-success pull-right">
										<i class="glyphicon glyphicon-ok"></i> <?= $this->lang->line('btn-save') ?>
									</button>
							</form>


							<form action="<?php echo base_url('project/'); ?><?php echo $_SESSION['project_id']; ?>">
								<button class="btn btn-lg btn-info pull-left"> <i class="glyphicon glyphicon-chevron-left"></i> <?= $this->lang->line('btn-back') ?></button>
							</form>
						</div>
					</div>
				</div>
				<!-- /.row -->
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
	for (var i = 1; i <= 18; i++) {
		if (document.getElementById("pch_tp_" + i).title == "") {
			document.getElementById("pch_tp_" + i).hidden = true;
		}
		limite_textarea(document.getElementById("pch_txt_" + i).value, "pch_" + i);
	}

	function limite_textarea(valor, txt) {
		var limite = 2000;
		var caracteresDigitados = valor.length;
		var caracteresRestantes = limite - caracteresDigitados;
		$("." + txt).text(caracteresRestantes);
	}
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