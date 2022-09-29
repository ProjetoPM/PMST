<body class="hold-transition skin-gray sidebar-mini">
	<div class="wrapper">
		<div class="content-wrapper" style="padding-top:50px;">
			<section class="content">
				<?php $this->load->view('errors/exceptions') ?>

				<div class="row">
					<div class="col-lg-12">
						<div class="panel-body">
							<h1 class="page-header">
								<?= $this->lang->line('pch_title')  ?>
							</h1>
							<form method="POST" action="<?= base_url('integration/project-charter/update') ?>">
								<input type="hidden" name="project_id" value="<?= $_SESSION['project_id']; ?>">
								<input type="hidden" name="status" value="1">
								<div class="col-lg-12 form-group">
									<label for="project_description"><?= $this->lang->line('pch_description') ?></label>
									<a class="btn-sm btn-default" id="pch_tp_1" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('pch_description_tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
									<span id="count-a"></span>
									<div>
										<textarea 
											name="project_description" 
											oninput="limitText(this, 2e3, 'a')" 
											class="form-control" 
											id="project_description"
											placeholder="<?= $this->lang->line('placeholder_generic') ?>" 
											rows="3"
											required
										></textarea>
                                	</div>
								</div>

								<!-- Inicio teste datas -->
									<div class="col-lg-12 form-group">
										<label><?= $this->lang->line('pch_start') ?></label>
										<div>
											<input autocomplete="off" class="form-control input-md" id="start_date" placeholder="YYYY/MM/DD" type="date" name="start_date" required="true" />
										</div>
									</div>

									<div class="col-lg-12 form-group">
										<label><?= $this->lang->line('pch_end') ?></label>
										<div>
											<input autocomplete="off" class="form-control input-md" id="end_date" placeholder="YYYY/MM/DD" type="date" name="end_date" required="true" />
										</div>
									</div>
								<!-- Fim teste Datas -->

								<div class=" col-lg-12 form-group">
									<label for="project_purpose"><?= $this->lang->line('pch_purpose') ?></label>
									<a class="btn-sm btn-default" id="pch_tp_2" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('pch_purpose_tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
									<span id="count-b"></span>
									<div>
										<textarea 
											name="project_purpose" 
											oninput="limitText(this, 2e3, 'b')" 
											class="form-control" 
											id="project_purpose"
											placeholder="<?= $this->lang->line('placeholder_generic') ?>" 
											rows="3"
											required
										></textarea>
                                	</div>
								</div>

								<div class=" col-lg-12 form-group">
									<label for="project_objective"><?= $this->lang->line('pch_objectives') ?></label>
									<a class="btn-sm btn-default" id="pch_tp_3" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('pch_objectives_tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
									<span id="count-c"></span>
									<div>
										<textarea 
											name="project_objective" 
											oninput="limitText(this, 2e3, 'c')" 
											class="form-control" 
											id="project_objective"
											placeholder="<?= $this->lang->line('placeholder_generic') ?>" 
											rows="3"
											required
										></textarea>
                                	</div>
								</div>

								<div class="col-lg-12 form-group">
									<label for="benefits"><?= $this->lang->line('pch_benefits') ?></label>
									<a class="btn-sm btn-default" id="pch_tp_4" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('pch_benefits_tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
									<span id="count-d"></span>
									<div>
										<textarea 
											name="benefits" 
											oninput="limitText(this, 2e3, 'd')" 
											class="form-control" 
											id="benefits"
											placeholder="<?= $this->lang->line('placeholder_generic') ?>" 
											rows="3"
											required
										></textarea>
                                	</div>
								</div>

								<div class=" col-lg-12 form-group">
									<label for="high_level_requirements"><?= $this->lang->line('pch_high_level_req') ?></label>
									<a class="btn-sm btn-default" id="pch_tp_5" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('pch_high_level_req_tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
									<span id="count-e"></span>
									<div>
										<textarea 
											name="high_level_requirements" 
											oninput="limitText(this, 2e3, 'e')" 
											class="form-control" 
											id="high_level_requirements"
											placeholder="<?= $this->lang->line('placeholder_generic') ?>" 
											rows="3"
											required
										></textarea>
                                	</div>
								</div>

								<div class=" col-lg-12 form-group">
									<label for="boundaries"><?= $this->lang->line('pch_boundaries') ?></label>
									<a class="btn-sm btn-default" id="pch_tp_6" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('pch_boundaries_tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
									<span id="count-f"></span>
									<div>
										<textarea 
											name="boundaries" 
											oninput="limitText(this, 2e3, 'f')" 
											class="form-control" 
											id="boundaries"
											placeholder="<?= $this->lang->line('placeholder_generic') ?>" 
											rows="3"
											required
										></textarea>
                                	</div>
								</div>

								<div class=" col-lg-12 form-group">
									<label for="pch_risks"><?= $this->lang->line('pch_risks') ?></label>
									<a class="btn-sm btn-default" id="pch_tp_7" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('pch_risks_tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
									<span id="count-g"></span>
									<div>
										<textarea 
											name="high_level_risks" 
											oninput="limitText(this, 2e3, 'g')" 
											class="form-control" 
											id="high_level_risks"
											placeholder="<?= $this->lang->line('placeholder_generic') ?>" 
											rows="3"
											required
										></textarea>
                                	</div>
								</div>

								<div class=" col-lg-12 form-group">
									<label for="summary_schedule"><?= $this->lang->line('pch_schedule') ?></label>
									<a class="btn-sm btn-default" id="pch_tp_8" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('pch_schedule_tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
									<span id="count-h"></span>
									<div>
										<textarea 
											name="summary_schedule" 
											oninput="limitText(this, 2e3, 'h')" 
											class="form-control" 
											id="summary_schedule"
											placeholder="<?= $this->lang->line('placeholder_generic') ?>" 
											rows="3"
											required
										></textarea>
                                	</div>
								</div>

								<div class=" col-lg-12 form-group">
									<label for="budge_summary"><?= $this->lang->line('pch_budge') ?></label>
									<a class="btn-sm btn-default" id="pch_tp_9" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('pch_budge_tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
									<span id="count-i"></span>
									<div>
										<textarea 
											name="budge_summary" 
											oninput="limitText(this, 2e3, 'i')" 
											class="form-control" 
											id="budge_summary"
											placeholder="<?= $this->lang->line('placeholder_generic') ?>"
											rows="3" 
											required
										></textarea>
                                	</div>
								</div>

								<div class=" col-lg-12 form-group">
									<label for="project_approval_requirements"><?= $this->lang->line('pch_approval') ?></label>
									<a class="btn-sm btn-default" id="pch_tp_10" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('pch_approval_tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
									<span id="count-j"></span>
									<div>
										<textarea 
											name="project_approval_requirements" 
											oninput="limitText(this, 2e3, 'j')" 
											class="form-control" 
											id="project_approval_requirements"
											placeholder="<?= $this->lang->line('placeholder_generic') ?>" 
											rows="3"
											required
										></textarea>
                                	</div>
								</div>

								<div class=" col-lg-6 form-group">
									<label for="success_criteria"><?= $this->lang->line('pch_sucess_criteria') ?></label>
									<a class="btn-sm btn-default" id="pch_tp_11" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('pch_success_criteria_tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
									<span id="count-k"></span>
									<div>
										<textarea 
											name="success_criteria" 
											oninput="limitText(this, 2e3, 'k')" 
											class="form-control" 
											id="success_criteria"
											placeholder="<?= $this->lang->line('placeholder_generic') ?>" 
											rows="3"
											required
										></textarea>
                                	</div>
								</div>

								<div class=" col-lg-6 form-group">
									<label for="exit_criteria"><?= $this->lang->line('pch_exit_criteria') ?></label>
									<a class="btn-sm btn-default" id="pch_tp_12" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('pch_exit_criteria_tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
									<span id="count-m"></span>
									<div>
										<textarea 
											name="exit_criteria" 
											oninput="limitText(this, 2e3, 'm')" 
											class="form-control" 
											id="exit_criteria"
											placeholder="<?= $this->lang->line('placeholder_generic') ?>" 
											rows="3"
											required
										></textarea>
                                	</div>
								</div>
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
		/todayHighlight : true,/
	});
	//End Date Ends Here
</script>

<?php $this->load->view('frame/footer_view') ?>