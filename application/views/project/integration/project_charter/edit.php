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
				<?php elseif ($this->session->flashdata('delete_signature')) : ?>
					<div class="alert alert-danger">
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
						<strong><?php echo $this->session->flashdata('delete_signature'); ?></strong>
					</div>
				<?php endif; ?>
				<script src="<?= base_url() ?>assets/js/jquery-1.11.3.min.js" type="text/javascript"></script>

				<style>
					[data_tp] {
						font-size: 15px;
						position: relative;
						top: 1px;
						display: inline-block;
						font-family: 'Glyphicons Halflings';
						font-style: normal;
						font-weight: 400;
					}

					[data_tp]:after {
						display: none;
						position: absolute;
						top: -5px;
						padding: 5px;
						border-radius: 3px;
						left: calc(100% + 2px);
						content: attr(data_tp);
						white-space: nowrap;
						background-color: #333;
						color: White;
					}

					[data_tp]:hover:after {
						display: block;
					}
				</style>

				<div class="row">
					<div class="col-lg-12">
						<div class="panel-body">
							<h1 class="page-header">
								<?= $this->lang->line('pch_title')  ?> <?php if ($items != null) { ?>
									<span data_tp="Signed"> <i class="glyphicon glyphicon-lock"></i></span>
								<?php }  ?>
							</h1>
							<?php
							foreach ($project_charter as $pj) {
							?>
			
								<form method="POST" action="<?php echo base_url('integration/project-charter/update'); ?>">
									<input type="hidden" name="status" value="1">

									<div class=" col-lg-12 form-group">
										<label align="right" for="project_description"><?= $this->lang->line('pch_description') ?></label>
										<a class="btn-sm btn-default" id="pch_tp_1" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('pch_description_tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
										<span class="pch_1">2000</span><?= $this->lang->line('character') ?>
										<div>
											<textarea onkeyup="limite_textarea(this.value, 'pch_1')" maxlength="2000" oninput="eylem(this, this.value)" class="form-control elasticteste" id="pch_txt_1" name="project_description"><?php echo $pj->project_description; ?></textarea>
											
										</div>
									</div>

									<div class=" col-lg-12 form-group">
										<label for="project_purpose"><?= $this->lang->line('pch_purpose') ?></label>
										<a class="btn-sm btn-default" id="pch_tp_2" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('pch_purpose_tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
										<span class="pch_2">2000</span><?= $this->lang->line('character') ?>
										<div>
											<textarea onkeyup="limite_textarea(this.value, 'pch_2')" maxlength="2000" oninput=" eylem(this, this.value)" class="form-control elasticteste" id="pch_txt_2" name="project_purpose"><?php echo $pj->project_purpose; ?></textarea>
										</div>
									</div>

									<div class=" col-lg-12 form-group">
										<label for="project_objective"><?= $this->lang->line('pch_objectives') ?></label>
										<a class="btn-sm btn-default" id="pch_tp_3" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('pch_objectives_tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
										<span class="pch_3">2000</span><?= $this->lang->line('character') ?>
										<div>
											<textarea onkeyup="limite_textarea(this.value, 'pch_3')" maxlength="2000" oninput="eylem(this, this.value)" class="form-control elasticteste" id="pch_txt_3" name="project_objective"><?php echo $pj->project_objective; ?></textarea>
										</div>
									</div>

									<div class="col-lg-12 form-group">
										<label for="benefits"><?= $this->lang->line('pch_benefits') ?></label>
										<a class="btn-sm btn-default" id="pch_tp_4" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('pch_benefits_tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
										<span class="pch_4">2000</span><?= $this->lang->line('character') ?>
										<div>
											<textarea onkeyup="limite_textarea(this.value, 'pch_4')" maxlength="2000" oninput="eylem(this, this.value)" class="form-control elasticteste" id="pch_txt_4" name="benefits"><?php echo $pj->benefits; ?></textarea>
										</div>
									</div>

									<div class=" col-lg-12 form-group">
										<label for="high_level_requirements"><?= $this->lang->line('pch_high_level_req') ?></label>
										<a class="btn-sm btn-default" id="pch_tp_5" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('pch_high_level_req_tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
										<span class="pch_5">2000</span><?= $this->lang->line('character') ?>
										<div>
											<textarea onkeyup="limite_textarea(this.value, 'pch_5')" maxlength="2000" oninput="eylem(this, this.value)" class="form-control elasticteste" id="pch_txt_5" name="high_level_requirements"><?php echo $pj->high_level_requirements; ?></textarea>
										</div>
									</div>

									<div class=" col-lg-12 form-group">
										<label for="boundaries"><?= $this->lang->line('pch_boundaries') ?></label>
										<span class="pch_6">2000</span><?= $this->lang->line('character') ?>
										<a class="btn-sm btn-default" id="pch_tp_6" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('pch_boundaries_tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
										<div>
											<textarea onkeyup="limite_textarea(this.value, 'pch_6')" maxlength="2000" oninput="eylem(this, this.value)" class="form-control elasticteste" id="pch_txt_6" name="boundaries"><?php echo $pj->boundaries; ?></textarea>
										</div>
									</div>

									<div class=" col-lg-12 form-group">
										<label for="pch_risks"><?= $this->lang->line('pch_risks') ?></label>
										<span class="pch_7">2000</span><?= $this->lang->line('character') ?>
										<a class="btn-sm btn-default" id="pch_tp_7" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('pch_risks_tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
										<div>
											<textarea onkeyup="limite_textarea(this.value, 'pch_7')" maxlength="2000" oninput="eylem(this, this.value)" class="form-control elasticteste" id="pch_txt_7" name="high_level_risks"><?php echo $pj->high_level_risks; ?></textarea>
										</div>
									</div>

									<div class=" col-lg-12 form-group">
										<label for="summary_schedule"><?= $this->lang->line('pch_schedule') ?></label>
										<a class="btn-sm btn-default" id="pch_tp_8" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('pch_schedule_tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
										<span class="pch_8">2000</span><?= $this->lang->line('character') ?>
										<div>
											<textarea onkeyup="limite_textarea(this.value, 'pch_8')" maxlength="2000" oninput="eylem(this, this.value)" class="form-control elasticteste" id="pch_txt_8" name="summary_schedule"><?php echo $pj->summary_schedule; ?></textarea>
										</div>
									</div>

									<div class=" col-lg-12 form-group">
										<label for="budge_summary"><?= $this->lang->line('pch_budge') ?></label>
										<a class="btn-sm btn-default" id="pch_tp_9" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('pch_budge_tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
										<span class="pch_9">2000</span><?= $this->lang->line('character') ?>
										<div>
											<textarea onkeyup="limite_textarea(this.value, 'pch_9')" maxlength="2000" oninput="eylem(this, this.value)" class="form-control elasticteste" id="pch_txt_9" name="budge_summary"><?php echo $pj->budge_summary; ?></textarea>
										</div>
									</div>


									<div class=" col-lg-12 form-group">
										<label for="project_approval_requirements"><?= $this->lang->line('pch_approval') ?></label>
										<span class="pch_10">2000</span><?= $this->lang->line('character') ?>
										<a class="btn-sm btn-default" id="pch_tp_10" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('pch_approval_tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
										<div>
											<textarea onkeyup="limite_textarea(this.value, 'pch_10')" maxlength="2000" oninput="eylem(this, this.value)" class="form-control elasticteste" id="pch_txt_10" name="project_approval_requirements"><?php echo $pj->project_approval_requirements; ?></textarea>
										</div>
									</div>

									<div class=" col-lg-6 form-group">
										<label for="success_criteria"><?= $this->lang->line('pch_sucess_criteria') ?></label>
										<a class="btn-sm btn-default" id="pch_tp_11" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('pch_success_criteria_tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
										<span class="pch_11">2000</span><?= $this->lang->line('character') ?>
										<div>
											<textarea onkeyup="limite_textarea(this.value, 'pch_11')" maxlength="2000" oninput="eylem(this, this.value)" class="form-control elasticteste" id="pch_txt_11" name="success_criteria"><?php echo $pj->success_criteria; ?></textarea>
										</div>
									</div>

									<div class=" col-lg-6 form-group">
										<label for="exit_criteria"><?= $this->lang->line('pch_exit_criteria') ?></label>
										<span class="pch_12">2000</span><?= $this->lang->line('character') ?>
										<a class="btn-sm btn-default" id="pch_tp_12" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('pch_exit_criteria_tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
										<div>
											<textarea onkeyup="limite_textarea(this.value, 'pch_12')" maxlength="2000" oninput="eylem(this, this.value)" class="form-control elasticteste" id="pch_txt_12" name="exit_criteria"><?php echo $pj->exit_criteria; ?></textarea>
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
												<input class="form-control" id="start_date" autocomplete="off" placeholder="YYYY/MM/DD" type="text" name="start_date" required="true" value="<?php echo $pj->start_date; ?>" />
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
												<input class="form-control" id="end_date" autocomplete="off" placeholder="YYYY/MM/DD" type="text" name="end_date" required="true" value="<?php echo $pj->end_date; ?>" />
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

									<?php $buttonsub = "";
									if ($_SESSION['access_level'] == "1" || $items != null) {
										$buttonsub = "disabled";
									}
									?>


									<div class="col-lg-12">
										<button id="pch_submit" type="submit" <?php echo $buttonsub ?> value="Save" class="btn btn-lg btn-success pull-right">
											<i class="glyphicon glyphicon-ok"></i> <?= $this->lang->line('btn-save') ?> </button>
								</form>
								<form action="<?php echo base_url('project/'); ?><?php echo $_SESSION['project_id']; ?>">
									<button class="btn btn-lg btn-info pull-left"> <i class="glyphicon glyphicon-chevron-left"></i> <?= $this->lang->line('btn-back') ?></button>
								</form>
							<?php } ?>

							<!-- Trigger the modal with a button 2-->
							<button type="button" style="margin-top:10px;" class="open-AddBookDialog btn btn-default btn-lg center-block" data-toggle="modal" data-target="#signature"><i class="glyphicon glyphicon-edit"></i>Signature</button>
							<!-- Modal2 -->
							<div class="modal fade" id="signature" role="dialog">
								<div class="modal-dialog">
									<!-- Modal conten2t-->
									<div class="modal-content pad-modal">
										<div class="modal-header">
											<button type="button" class="close" data-dismiss="modal">&times;</button>
											<h4 class="modal-title">Signature - Your Access Level:
												<?php if ($_SESSION['access_level'] == "2") : ?>
													Project Manager
												<?php elseif ($_SESSION['access_level'] == "1") : ?>
													Professor
												<?php else : ?>
													Staff
												<?php endif; ?> </h4>
										</div>
										<div class="modal-body">
											<p>Signature Required: Professor</p>
											<p>*When this document is signed by the Professor, the edition will no longer be available</p>
											<?php if ($_SESSION['access_level'] == "1") {
											?>
												<div class="limiter">
													<div class="container-login100">
														<div class="wrap-login100">
															<form class="login100-form validate-form" role="form" method="post" onsubmit="return checkEmptyInput();" action="<?= base_url() ?>authentication/signature/<?= $project_charter[0]->project_charter_id ?>/<?= $this->uri->segment(2); ?>">
																<?php
																// var_dump(array_search($_SESSION['user_id'], array_column($items, 'user_id')));exit;die;
																if ($items == null || array_search($_SESSION['user_id'], array_column($items, 'user_id')) === false) { ?>

																	<div>
																		<input type="radio" id="terms1" name="terms" value="1">
																		<label for="terms1">I agree to sign this document</label><br>
																	</div>
																<?php }
																if ($items != null) { ?>
																	<div>
																		<input type="radio" id="terms2" name="terms" value="2">
																		<label for="terms2">I agree to cancel all subscriptions</label><br>
																	</div>
																<?php } ?> </h4>

																<span class="login100-form-title">
																	Member Login
																</span>
																<div class="wrap-input100 validate-input" data-validate="Valid email is required: ex@abc.xyz">
																	<input class="input100" id="email" placeholder="E-mail" name="email" type="email" autofocus>
																	<span class="focus-input100"></span>
																	<span class="symbol-input100">
																		<i class="fa fa-envelope" aria-hidden="true"></i>
																	</span>
																</div>
																<div class="wrap-input100 validate-input" data-validate="Password is required">
																	<input class="input100" id="password" placeholder="Password" name="password" type="password" value="">
																	<span class="focus-input100"></span>
																	<span class="symbol-input100">
																		<i class="fa fa-lock" aria-hidden="true"></i>
																	</span>
																</div>
																<div class="container-login100-form-btn">
																	<button class="login100-form-btn" id="login-submit" type="submit" value="Login" class="btn btn-lg btn-success btn-block">
																		Confirm credentials and signature
																	</button>
																</div>
															</form>
														</div>
													</div>
												</div>
											<?php }
											?>

											<div class="row">
												<table class="col-lg-12" style="margin-top: 10px;">
													<thead>
														<tr>
															<th>Name</th>
															<th>Acces Level</th>
															<th>Date/Time</th>
														</tr>
													</thead>
													<tbody>
														<?php

														foreach ($items as $item) {

														?>
															<tr>
																<td><?php
																	$this->db->select('name');
																	$this->db->where('user_id', $item->user_id);
																	$this->db->from('user');
																	$this->db->limit(1);

																	$query = $this->db->get();
																	$res = $query->row_array();
																	echo $res['name'];

																	?></td>
																<td>
																	<?php if ($item->access_level == "2") : ?>
																		Project Manager
																	<?php elseif ($_SESSION['acess_level'] = "1") : ?>
																		Professor
																	<?php else : ?>
																		Staff
																	<?php endif; ?>


																</td>
																<td><?php echo $item->date; ?> / <?php echo $item->time; ?></td>
															</tr>
														<?php

														}
														?>
													</tbody>
												</table>
											</div>
										</div>
									</div>
								</div>
							</div>




							<!-- <input type="hidden" id="<?php echo $_SESSION['access_level']; ?>"> -->
						</div>
					</div>
				</div>
				<!-- /.row -->
			</section>
		</div>
	</div>
</body>


<!-- /.row -->
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
</script>
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