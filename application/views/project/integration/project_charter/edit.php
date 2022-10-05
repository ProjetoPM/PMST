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
				<?php $error = $this->session->flashdata('error') ?>
				<?php $style = "style='border: 1px solid red;'" ?>
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

				<!-- avaliação -->
				<link href="<?= base_url() ?>assets/css/field_evaluation.css" rel="stylesheet" type="text/css">
				<?php $view_name = "project charter";
				getViewFields($view_name);
				?>
				<?php $this->load->view('construction_services/write_field_evaluation') ?>

				<div class="row">
					<div class="col-lg-12">
						<div class="panel-body">
							<h1 class="page-header">
								
							<?php $this->load->view('construction_services/rating', array(
									"view_name" => $view_name,
								)) ?>
								<?= $this->lang->line('pch_title')  ?> <?php if ($items != null) { ?>
									<span data_tp="<?= $this->lang->line('signed') ?>"> <i class="glyphicon glyphicon-lock"></i></span>
								<?php }  ?>
							</h1>
							<?php
							foreach ($project_charter as $pj) {
							?>

								<form method="POST" action="<?php echo base_url('integration/project-charter/update'); ?>">
									<input type="hidden" name="status" value="1">

									<div class=" col-lg-12 form-group">
										<label for="project_description"><?= $this->lang->line('pch_description') ?></label>
										<a <?= fieldStatus($view_name, $pj->project_charter_id, "project_description") ?> data-field="project_description" data-field_name="<?= $this->lang->line('pch_description') ?>" data-item_id="<?= $pj->project_charter_id ?>" data-view="<?= $view_name ?>" data-toggle="modal" data-placement="left" data-target="#write-evaluation" data-tt="tooltip"><i class="glyphicon glyphicon-list-alt"></i></a>
										<span id="count-a"></span>
										<div>
											<textarea 
												name="project_description" 
												class="form-control" 
												id="project_description"
												oninput="limitText(this, 2e3, 'a')"
												placeholder="<?= $this->lang->line('placeholder_generic') ?>" 
												rows="3"
												required
											><?= $pj->project_description; ?></textarea>
                                		</div>
									</div>


									<div class="col-lg-12 form-group">
										<label><?= $this->lang->line('pch_start') ?></label>
										<a <?= fieldStatus($view_name, $pj->project_charter_id, "start_date") ?> data-field="start_date" data-field_name="<?= $this->lang->line('pch_start') ?>" data-item_id="<?= $pj->project_charter_id ?>" data-view="<?= $view_name ?>" data-toggle="modal" data-placement="left" data-target="#write-evaluation" data-tt="tooltip"><i class="glyphicon glyphicon-list-alt"></i></a>
										<div>
											<input autocomplete="off" class="form-control input-md" id="start_date" placeholder="YYYY/MM/DD" type="date" name="start_date" required="true" value="<?php echo $pj->start_date; ?>" />
										</div>
									</div>

									<div class="col-lg-12 form-group">
										<label><?= $this->lang->line('pch_end') ?></label>
										<a <?= fieldStatus($view_name, $pj->project_charter_id, "end_date") ?> <?= $error ? $style : '' ?> data-field="end_date" data-field_name="<?= $this->lang->line('pch_end') ?>" data-item_id="<?= $pj->project_charter_id ?>" data-view="<?= $view_name ?>" data-toggle="modal" data-placement="left" data-target="#write-evaluation" data-tt="tooltip"><i class="glyphicon glyphicon-list-alt"></i></a>
										<div>
											<input autocomplete="off" class="form-control input-md" id="end_date" placeholder="YYYY/MM/DD" type="date" name="end_date" required="true" value="<?php echo $pj->end_date; ?>" />
										</div>
									</div>


									<div class=" col-lg-12 form-group">
										<label for="project_purpose"><?= $this->lang->line('pch_purpose') ?></label>
										<a class="btn-sm btn-default" id="pch_tp_2" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('pch_purpose_tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
										<a <?= fieldStatus($view_name, $pj->project_charter_id, "project_purpose") ?> data-field="project_purpose" data-field_name="<?= $this->lang->line('pch_purpose') ?>" data-item_id="<?= $pj->project_charter_id ?>" data-view="<?= $view_name ?>" data-toggle="modal" data-placement="left" data-target="#write-evaluation" data-tt="tooltip"><i class="glyphicon glyphicon-list-alt"></i></a>
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
											><?= $pj->project_purpose; ?></textarea>
										</div>
									</div>

									<div class=" col-lg-12 form-group">
										<label for="project_objective"><?= $this->lang->line('pch_objectives') ?></label>
										<a class="btn-sm btn-default" id="pch_tp_3" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('pch_objectives_tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
										<a <?= fieldStatus($view_name, $pj->project_charter_id, "project_objective") ?> data-field="project_objective" data-field_name="<?= $this->lang->line('pch_objectives') ?>" data-item_id="<?= $pj->project_charter_id ?>" data-view="<?= $view_name ?>" data-toggle="modal" data-placement="left" data-target="#write-evaluation" data-tt="tooltip"><i class="glyphicon glyphicon-list-alt"></i></a>
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
											><?= $pj->project_objective; ?></textarea>
										</div>
									</div>

									<div class="col-lg-12 form-group">
										<label for="benefits"><?= $this->lang->line('pch_benefits') ?></label>
										<a class="btn-sm btn-default" id="pch_tp_4" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('pch_benefits_tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
										<a <?= fieldStatus($view_name, $pj->project_charter_id, "benefits") ?> data-field="benefits" data-field_name="<?= $this->lang->line('pch_benefits') ?>" data-item_id="<?= $pj->project_charter_id ?>" data-view="<?= $view_name ?>" data-toggle="modal" data-placement="left" data-target="#write-evaluation" data-tt="tooltip"><i class="glyphicon glyphicon-list-alt"></i></a>
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
											><?= $pj->benefits; ?></textarea>
										</div>
									</div>

									<div class=" col-lg-12 form-group">
										<label for="high_level_requirements"><?= $this->lang->line('pch_high_level_req') ?></label>
										<a class="btn-sm btn-default" id="pch_tp_5" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('pch_high_level_req_tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
										<a <?= fieldStatus($view_name, $pj->project_charter_id, "high_level_requirements") ?> data-field="high_level_requirements" data-field_name="<?= $this->lang->line('pch_high_level_req') ?>" data-item_id="<?= $pj->project_charter_id ?>" data-view="<?= $view_name ?>" data-toggle="modal" data-placement="left" data-target="#write-evaluation" data-tt="tooltip"><i class="glyphicon glyphicon-list-alt"></i></a>
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
											><?= $pj->high_level_requirements; ?></textarea>
										</div>
									</div>

									<div class=" col-lg-12 form-group">
										<label for="boundaries"><?= $this->lang->line('pch_boundaries') ?></label>
										<a class="btn-sm btn-default" id="pch_tp_6" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('pch_boundaries_tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
										<a <?= fieldStatus($view_name, $pj->project_charter_id, "boundaries") ?> data-field="boundaries" data-field_name="<?= $this->lang->line('pch_boundaries') ?>" data-item_id="<?= $pj->project_charter_id ?>" data-view="<?= $view_name ?>" data-toggle="modal" data-placement="left" data-target="#write-evaluation" data-tt="tooltip"><i class="glyphicon glyphicon-list-alt"></i></a>
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
											><?= $pj->boundaries; ?></textarea>
										</div>
									</div>

									<div class=" col-lg-12 form-group">
										<label for="pch_risks"><?= $this->lang->line('pch_risks') ?></label>
										<a class="btn-sm btn-default" id="pch_tp_7" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('pch_risks_tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
										<a <?= fieldStatus($view_name, $pj->project_charter_id, "high_level_risks") ?> data-field="high_level_risks" data-field_name="<?= $this->lang->line('pch_risks') ?>" data-item_id="<?= $pj->project_charter_id ?>" data-view="<?= $view_name ?>" data-toggle="modal" data-placement="left" data-target="#write-evaluation" data-tt="tooltip"><i class="glyphicon glyphicon-list-alt"></i></a>
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
											><?= $pj->high_level_risks; ?></textarea>
										</div>
									</div>

									<div class=" col-lg-12 form-group">
										<label for="summary_schedule"><?= $this->lang->line('pch_schedule') ?></label>
										<a class="btn-sm btn-default" id="pch_tp_8" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('pch_schedule_tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
										<a <?= fieldStatus($view_name, $pj->project_charter_id, "summary_schedule") ?> data-field="summary_schedule" data-field_name="<?= $this->lang->line('pch_schedule') ?>" data-item_id="<?= $pj->project_charter_id ?>" data-view="<?= $view_name ?>" data-toggle="modal" data-placement="left" data-target="#write-evaluation" data-tt="tooltip"><i class="glyphicon glyphicon-list-alt"></i></a>
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
											><?= $pj->summary_schedule; ?></textarea>
										</div>
									</div>

									<div class=" col-lg-12 form-group">
										<label for="budge_summary"><?= $this->lang->line('pch_budge') ?></label>
										<a class="btn-sm btn-default" id="pch_tp_9" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('pch_budge_tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
										<a <?= fieldStatus($view_name, $pj->project_charter_id, "budge_summary") ?> data-field="budge_summary" data-field_name="<?= $this->lang->line('pch_budge') ?>" data-item_id="<?= $pj->project_charter_id ?>" data-view="<?= $view_name ?>" data-toggle="modal" data-placement="left" data-target="#write-evaluation" data-tt="tooltip"><i class="glyphicon glyphicon-list-alt"></i></a>
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
											><?php echo $pj->budge_summary; ?></textarea>
										</div>
									</div>


									<div class=" col-lg-12 form-group">
										<label for="project_approval_requirements"><?= $this->lang->line('pch_approval') ?></label>
										<a class="btn-sm btn-default" id="pch_tp_10" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('pch_approval_tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
										<a <?= fieldStatus($view_name, $pj->project_charter_id, "project_approval_requirements") ?> data-field="project_approval_requirements" data-field_name="<?= $this->lang->line('pch_approval') ?>" data-item_id="<?= $pj->project_charter_id ?>" data-view="<?= $view_name ?>" data-toggle="modal" data-placement="left" data-target="#write-evaluation" data-tt="tooltip"><i class="glyphicon glyphicon-list-alt"></i></a>
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
											><?php echo $pj->project_approval_requirements; ?></textarea>
										</div>
									</div>

									<div class=" col-lg-6 form-group">
										<label for="success_criteria"><?= $this->lang->line('pch_sucess_criteria') ?></label>
										<a class="btn-sm btn-default" id="pch_tp_11" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('pch_success_criteria_tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
										<a <?= fieldStatus($view_name, $pj->project_charter_id, "success_criteria") ?> data-field="success_criteria" data-field_name="<?= $this->lang->line('pch_sucess_criteria') ?>" data-item_id="<?= $pj->project_charter_id ?>" data-view="<?= $view_name ?>" data-toggle="modal" data-placement="left" data-target="#write-evaluation" data-tt="tooltip"><i class="glyphicon glyphicon-list-alt"></i></a>
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
											><?php echo $pj->success_criteria; ?></textarea>
										</div>
									</div>

									<div class=" col-lg-6 form-group">
										<label for="exit_criteria"><?= $this->lang->line('pch_exit_criteria') ?></label>
										<a class="btn-sm btn-default" id="pch_tp_12" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('pch_exit_criteria_tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
										<a <?= fieldStatus($view_name, $pj->project_charter_id, "exit_criteria") ?> data-field="exit_criteria" data-field_name="<?= $this->lang->line('pch_exit_criteria') ?>" data-item_id="<?= $pj->project_charter_id ?>" data-view="<?= $view_name ?>" data-toggle="modal" data-placement="left" data-target="#write-evaluation" data-tt="tooltip"><i class="glyphicon glyphicon-list-alt"></i></a>
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
											><?php echo $pj->exit_criteria; ?></textarea>
										</div>
									</div>




									<!-- Início modal da lista de stakeholder -->



									<!-- Trigger the modal with a button -->
									<button type="button" class="open-AddBookDialog btn btn-warning btn-lg center-block" data-toggle="modal" data-target="#add"><?= $this->lang->line('view_stakeholder_list'); ?></button>
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
																	<th><?= $this->lang->line('stakeholder_name'); ?></th>
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
										<button id="pch_submit" type="submit" <?php echo $buttonsub ?> value="<?= $this->lang->line('btn-save'); ?>" class="btn btn-lg btn-success pull-right">
											<i class="glyphicon glyphicon-ok"></i> <?= $this->lang->line('btn-save') ?> </button>
										</button>
								</form>
								<form action="<?php echo base_url('project/'); ?><?php echo $_SESSION['project_id']; ?>">
									<button class="btn btn-lg btn-info pull-left"> <i class="glyphicon glyphicon-chevron-left"></i> <?= $this->lang->line('btn-back'); ?></button>
								</form>
							<?php } ?>

							<!-- Trigger the modal with a button 2-->
							<button type="button" disabled style="margin-top:10px;" class="open-AddBookDialog btn btn-default btn-lg center-block" data-toggle="modal" data-target="#signature"><i class="glyphicon glyphicon-edit"></i><?= $this->lang->line('signature'); ?> </button>
							<!-- Modal2 -->
							<div class="modal fade" id="signature" role="dialog">
								<div class="modal-dialog">
									<!-- Modal conten2t-->
									<div class="modal-content pad-modal">
										<div class="modal-header">
											<button type="button" class="close" data-dismiss="modal">&times;</button>
											<h4 class="modal-title"><?= $this->lang->line('signature'); ?> - <?= $this->lang->line('pch_acess_level'); ?>:
												<?php if ($_SESSION['access_level'] == "2") : ?>
													<?= $this->lang->line('project_manager'); ?>
												<?php elseif ($_SESSION['access_level'] == "1") : ?>
													<?= $this->lang->line('professor'); ?>
												<?php else : ?>
													<?= $this->lang->line('staff'); ?>
												<?php endif; ?> </h4>

										</div>
										<div class="modal-body">
											<p><?= $this->lang->line('signature_required'); ?></p>
											<p><?= $this->lang->line('signed_pch'); ?></p>
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
																		<label for="terms1"><?= $this->lang->line('signature_agreement'); ?></label><br>
																	</div>
																<?php }
																if ($items != null) { ?>
																	<div>
																		<input type="radio" id="terms2" name="terms" value="2">
																		<label for="terms2"><?= $this->lang->line('cancel_agreement'); ?></label><br>
																	</div>
																<?php } ?> </h4>

																<span class="login100-form-title">
																	<?= $this->lang->line('member_login') ?>
																</span>
																<div class="wrap-input100 validate-input" data-validate="<?= $this->lang->line('email_required') ?>">
																	<input class="input100" id="email" placeholder="E-mail" name="email" type="email" autofocus>
																	<span class="focus-input100"></span>
																	<span class="symbol-input100">
																		<i class="fa fa-envelope" aria-hidden="true"></i>
																	</span>
																</div>
																<div class="wrap-input100 validate-input" data-validate="<?= $this->lang->line('password_required') ?>">
																	<input class="input100" id="password" placeholder="<?= $this->lang->line('password') ?>" name="password" type="password" value="">
																	<span class="focus-input100"></span>
																	<span class="symbol-input100">
																		<i class="fa fa-lock" aria-hidden="true"></i>
																	</span>
																</div>
																<div class="container-login100-form-btn">
																	<button class="login100-form-btn" id="login-submit" type="submit" value="Login" class="btn btn-lg btn-success btn-block">
																		<?= $this->lang->line('credentials') ?>
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
															<th><?= $this->lang->line('stakeholder_name'); ?></th>
															<th><?= $this->lang->line('pch_acess_level'); ?></th>
															<th><?= $this->lang->line('date_time'); ?></th>
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
																		<?= $this->lang->line('project_manager'); ?>
																	<?php elseif ($_SESSION['acess_level'] == "1") : ?>
																		<?= $this->lang->line('professor'); ?>
																	<?php else : ?>
																		<?= $this->lang->line('staff'); ?>
																	<?php endif; ?>


																</td>

																<?php if (strcmp($_SESSION['language'], "US") == 0) : ?>
																	<td><?php echo $item->date; ?> / <?php echo $item->time; ?></td>
																<?php else : ?>
																	<td><?php echo date('d/m/Y', strtotime($item->date)) ?> / <?php echo $item->time; ?></td>
																<?php endif; ?>

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

<!-- Não mostrar -->
<?php if (1 + 1 === 3): ?>
<script type="text/javascript">
	for (var i = 1; i <= 12; i++) {
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
	// var currentDate = new Date();
	// var today = new Date(currentDate.getFullYear(), currentDate.getMonth(), currentDate.getDate(), 0, 0, 0, 0);
	// var container = $('.bootstrap-iso form').length > 0 ? $('.bootstrap-iso form').parent() : "body";

	// var startDate = $("#start_date").datepicker({
	// 	autoclose: true,
	// 	format: 'yyyy/mm/dd',
	// 	//language: 'pt-BR', //Idioma do Calendario
	// 	container: container,
	// 	keyboardNavigation: true,
	// 	orientation: "bottom",
	// 	todayHighlight: true,
	// 	startDate: today,
	// }).on('changeDate', function(ev) {
	// 	var newDate = new Date(ev.date.setDate(ev.date.getDate() + 1));
	// 	endDate.datepicker("setStartDate", newDate);
	// });

	//Start Date Ends Here
	// var endDate = $("#end_date").datepicker({
	// 	autoclose: false,
	// 	format: 'YYYY/mm/dd',
	// 	//language: 'pt-BR', //Idioma do Calendario
	// 	container: container,
	// 	keyboardNavigation: true,
	// 	orientation: "bottom",
	// 	startDate: today,
	// 	/*todayHighlight : true,*/
	// }).on('change', function(ev) {
	// 	var newDate = new Date(ev.date.setDate(ev.date.getDate() + 1));
	// 	endDate.datepicker("setStartDate", newDate);
	// });
	//End Date Ends Here
</script>
<?php endif ?>

<?php $this->load->view('frame/footer_view') ?>