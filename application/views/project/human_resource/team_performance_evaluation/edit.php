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
				<div class="row">
					<div class="col-lg-12">
						<div class="panel-body">
							<h1 class="page-header">

								<?= $this->lang->line('eval_title')  ?>

							</h1>

							<!-- avaliação -->
							<link href="<?= base_url() ?>assets/css/field_evaluation.css" rel="stylesheet" type="text/css">
							<?php $view_name = "team performance assessments";
							getViewFields($view_name);
							?>
							<?php $this->load->view('construction_services/write_field_evaluation') ?>

							<?php extract($team_performance_evaluation); ?>

							<form action="<?= base_url() ?>resources/team-performance-assessments/update/<?php echo $team_performance_evaluation_id; ?>" method="post">

								<input type="hidden" id="project_id" name="project_id" value="<?php echo $project_id; ?>">
								<!-- Textarea -->

								<div class=" col-lg-6 form-group">
									<label for="team_member_name"><?= $this->lang->line('eval_team_member_name') ?> *</label>
									<span class="eval_1">2000</span><?= $this->lang->line('character') ?>
									<a class="btn-sm btn-default" id ="eval_tp_1" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('eval_team_member_name_tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
									<a <?= fieldStatus($view_name, $team_performance_evaluation_id, "team_member_name") ?> data-field="team_member_name" data-field_name="<?= $this->lang->line('eval_team_member_name') ?>" data-item_id="<?= $team_performance_evaluation_id ?>" data-view="<?= $view_name ?>" data-toggle="modal" data-placement="left" data-target="#write-evaluation" data-tt="tooltip"><i class="glyphicon glyphicon-list-alt"></i></a>

									<div>
									<input id="eval_txt_1" type="text" name="team_member_name" class="form-control input-md" onkeyup = "limite_textarea(this.value, 'eval_1')" maxlength="2000" oninput="eylem(this, this.value)" required="true" value="<?php echo $team_member_name; ?>">
									</div>
								</div>

								<div class=" col-lg-6 form-group">
									<label for="role"><?= $this->lang->line('eval_role') ?></label>
									<span class="eval_2">2000</span><?= $this->lang->line('character') ?>
									<a class="btn-sm btn-default" id ="eval_tp_2" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('eval_role_tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
									<a <?= fieldStatus($view_name, $team_performance_evaluation_id, "role") ?> data-field="role" data-field_name="<?= $this->lang->line('eval_role') ?>" data-item_id="<?= $team_performance_evaluation_id ?>" data-view="<?= $view_name ?>" data-toggle="modal" data-placement="left" data-target="#write-evaluation" data-tt="tooltip"><i class="glyphicon glyphicon-list-alt"></i></a>
									<div>
									<input id="eval_txt_2" type="text" name="role" class="form-control input-md" onkeyup = "limite_textarea(this.value, 'eval_2')" maxlength="2000" oninput="eylem(this, this.value)" required="false" value="<?php echo $role; ?>">
									</div>
								</div>


								<div class=" col-lg-6 form-group">
									<label for="project_function"><?= $this->lang->line('eval_project_function') ?></label>
									<span class="eval_3">2000</span><?= $this->lang->line('character') ?>
									<a class="btn-sm btn-default" id ="eval_tp_3" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('eval_project_function_tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
									<a <?= fieldStatus($view_name, $team_performance_evaluation_id, "project_function") ?> data-field="project_function" data-field_name="<?= $this->lang->line('eval_project_function') ?>" data-item_id="<?= $team_performance_evaluation_id ?>" data-view="<?= $view_name ?>" data-toggle="modal" data-placement="left" data-target="#write-evaluation" data-tt="tooltip"><i class="glyphicon glyphicon-list-alt"></i></a>
									<div>
									<input id="eval_txt_3" type="text" name="project_function" class="form-control input-md" onkeyup = "limite_textarea(this.value, 'eval_3')" maxlength="2000" oninput="eylem(this, this.value)" required="false" value="<?php echo $project_function; ?>">
									</div>
								</div>


								<!-- Inicio teste datas -->
								<div class="form-group">
									<div class="col-lg-6">
										<label><?= $this->lang->line('eval_report_date') ?></label>
										<a <?= fieldStatus($view_name, $team_performance_evaluation_id, "report_date") ?> data-field="report_date" data-field_name="<?= $this->lang->line('eval_report_date') ?>" data-item_id="<?= $team_performance_evaluation_id ?>" data-view="<?= $view_name ?>" data-toggle="modal" data-placement="left" data-target="#write-evaluation" data-tt="tooltip"><i class="glyphicon glyphicon-list-alt"></i></a>
										<div class="input-group">
											<div class="input-group-addon">
												<i class="fa fa-calendar"></i>
											</div>
											<input class="form-control" id="report_date" placeholder="YYYY/MM/DD" type="text" name="report_date" value="<?php echo $report_date; ?>" />
										</div>
									</div>
								</div>

								<div class="col-lg-12 form-group">
									<label for="team_member_comments"><?= $this->lang->line('eval_team_member_comments') ?></label>
									<span class="eval_4">2000</span><?= $this->lang->line('character') ?>
									<a class="btn-sm btn-default" id ="eval_tp_4" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('eval_team_member_comments_tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
									<a <?= fieldStatus($view_name, $team_performance_evaluation_id, "team_member_comments") ?> data-field="team_member_comments" data-field_name="<?= $this->lang->line('eval_team_member_comments') ?>" data-item_id="<?= $team_performance_evaluation_id ?>" data-view="<?= $view_name ?>" data-toggle="modal" data-placement="left" data-target="#write-evaluation" data-tt="tooltip"><i class="glyphicon glyphicon-list-alt"></i></a>
									<div>
									<textarea onkeyup="limite_textarea(this.value, 'eval_4')" id="eval_txt_4" maxlength="2000" oninput="eylem(this, this.value)" class="form-control elasticteste" name="team_member_comments"><?php echo $team_member_comments; ?></textarea>
									</div>
								</div>

								<div class="col-lg-12 form-group">
									<label for="strong_points"><?= $this->lang->line('eval_strong_points') ?></label>
									<span class="eval_5">2000</span><?= $this->lang->line('character') ?>
									<a class="btn-sm btn-default" id ="eval_tp_5" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('eval_strong_points_tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
									<a <?= fieldStatus($view_name, $team_performance_evaluation_id, "strong_points") ?> data-field="strong_points" data-field_name="<?= $this->lang->line('eval_strong_points') ?>" data-item_id="<?= $team_performance_evaluation_id ?>" data-view="<?= $view_name ?>" data-toggle="modal" data-placement="left" data-target="#write-evaluation" data-tt="tooltip"><i class="glyphicon glyphicon-list-alt"></i></a>
									<div>
									<textarea onkeyup="limite_textarea(this.value, 'eval_5')" id="eval_txt_5" maxlength="2000" oninput="eylem(this, this.value)" class="form-control elasticteste" name="strong_points"><?php echo $strong_points; ?></textarea>
									</div>
								</div>

								<div class="col-lg-12 form-group">
									<label for="improvement"><?= $this->lang->line('eval_improvement') ?></label>
									<span class="eval_6">2000</span><?= $this->lang->line('character') ?>
									<a class="btn-sm btn-default" id ="eval_tp_6" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('eval_improvement_tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
									<a <?= fieldStatus($view_name, $team_performance_evaluation_id, "improvement") ?> data-field="improvement" data-field_name="<?= $this->lang->line('eval_improvement') ?>" data-item_id="<?= $team_performance_evaluation_id ?>" data-view="<?= $view_name ?>" data-toggle="modal" data-placement="left" data-target="#write-evaluation" data-tt="tooltip"><i class="glyphicon glyphicon-list-alt"></i></a>
									<div>
									<textarea onkeyup="limite_textarea(this.value, 'eval_6')" id="eval_txt_6" maxlength="2000" oninput="eylem(this, this.value)" class="form-control elasticteste" name="improvement"><?php echo $improvement; ?></textarea>
									</div>
								</div>

								<div class="col-lg-12 form-group">
									<label for="development_plan"><?= $this->lang->line('eval_development_plan') ?></label>
									<span class="eval_7">2000</span><?= $this->lang->line('character') ?>
									<a class="btn-sm btn-default" id ="eval_tp_7" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('eval_development_plan_tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
									<a <?= fieldStatus($view_name, $team_performance_evaluation_id, "development_plan") ?> data-field="development_plan" data-field_name="<?= $this->lang->line('eval_development_plan') ?>" data-item_id="<?= $team_performance_evaluation_id ?>" data-view="<?= $view_name ?>" data-toggle="modal" data-placement="left" data-target="#write-evaluation" data-tt="tooltip"><i class="glyphicon glyphicon-list-alt"></i></a>
									<div>
									<textarea onkeyup="limite_textarea(this.value, 'eval_7')" id="eval_txt_7" maxlength="2000" oninput="eylem(this, this.value)" class="form-control elasticteste" name="development_plan"><?php echo $development_plan; ?></textarea>
									</div>
								</div>

								<div class="col-lg-12 form-group">
									<label for="already_developed"><?= $this->lang->line('eval_already_developed') ?></label>
									<span class="eval_8">2000</span><?= $this->lang->line('character') ?>
									<a class="btn-sm btn-default" id ="eval_tp_8" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('eval_already_developed_tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
									<a <?= fieldStatus($view_name, $team_performance_evaluation_id, "already_developed") ?> data-field="already_developed" data-field_name="<?= $this->lang->line('eval_already_developed') ?>" data-item_id="<?= $team_performance_evaluation_id ?>" data-view="<?= $view_name ?>" data-toggle="modal" data-placement="left" data-target="#write-evaluation" data-tt="tooltip"><i class="glyphicon glyphicon-list-alt"></i></a>
									<div>
									<textarea onkeyup="limite_textarea(this.value, 'eval_8')" id="eval_txt_8" maxlength="2000" oninput="eylem(this, this.value)" class="form-control elasticteste" name="already_developed"><?php echo $already_developed; ?></textarea>
									</div>
								</div>

								<div class="col-lg-12 form-group">
									<label for="external_comments"><?= $this->lang->line('eval_external_comments') ?></label>
									<span class="eval_9">2000</span><?= $this->lang->line('character') ?>
									<a class="btn-sm btn-default" id ="eval_tp_9" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('eval_external_comments_tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
									<a <?= fieldStatus($view_name, $team_performance_evaluation_id, "external_comments") ?> data-field="external_comments" data-field_name="<?= $this->lang->line('eval_external_comments') ?>" data-item_id="<?= $team_performance_evaluation_id ?>" data-view="<?= $view_name ?>" data-toggle="modal" data-placement="left" data-target="#write-evaluation" data-tt="tooltip"><i class="glyphicon glyphicon-list-alt"></i></a>
									<div>
									<textarea onkeyup="limite_textarea(this.value, 'eval_9')" id="eval_txt_9" maxlength="2000" oninput="eylem(this, this.value)" class="form-control elasticteste" name="external_comments"><?php echo $external_comments; ?></textarea>
									</div>
								</div>

								<div class="col-lg-12 form-group">
									<label for="team_mates_comments"><?= $this->lang->line('eval_team_mates_comments') ?></label>
									<span class="eval_10">2000</span><?= $this->lang->line('character') ?>
									<a class="btn-sm btn-default" id ="eval_tp_10" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('eval_team_mates_comments_tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
									<a <?= fieldStatus($view_name, $team_performance_evaluation_id, "team_mates_comments") ?> data-field="team_mates_comments" data-field_name="<?= $this->lang->line('eval_team_mates_comments') ?>" data-item_id="<?= $team_performance_evaluation_id ?>" data-view="<?= $view_name ?>" data-toggle="modal" data-placement="left" data-target="#write-evaluation" data-tt="tooltip"><i class="glyphicon glyphicon-list-alt"></i></a>
									<div>
									<textarea onkeyup="limite_textarea(this.value, 'eval_10')" id="eval_txt_10" maxlength="2000" oninput="eylem(this, this.value)" class="form-control elasticteste" name="team_mates_comments"><?php echo $team_mates_comments; ?></textarea>
									</div>
								</div>

								<div class="col-lg-12 form-group">
									<label for="team_performance_evaluationcol"><?= $this->lang->line('eval_team_performance_evaluationcol') ?></label>
									<span class="eval_11">2000</span><?= $this->lang->line('character') ?>
									<a class="btn-sm btn-default" id ="eval_tp_11" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('eval_team_performance_evaluationcol_tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
									<a <?= fieldStatus($view_name, $team_performance_evaluation_id, "team_performance_evaluationcol") ?> data-field="team_performance_evaluationcol" data-field_name="<?= $this->lang->line('eval_team_performance_evaluationcol') ?>" data-item_id="<?= $team_performance_evaluation_id ?>" data-view="<?= $view_name ?>" data-toggle="modal" data-placement="left" data-target="#write-evaluation" data-tt="tooltip"><i class="glyphicon glyphicon-list-alt"></i></a>
									<div>
									<textarea onkeyup="limite_textarea(this.value, 'eval_11')" id="eval_txt_11" maxlength="2000" oninput="eylem(this, this.value)" class="form-control elasticteste" name="team_performance_evaluationcol"><?php echo $team_performance_evaluationcol; ?></textarea>
									</div>
								</div>

								<div class="col-lg-12">
									<button id="team_performance_evaluation-submit" type="submit" value="Save" class="btn btn-lg btn-success pull-right">
										<i class="glyphicon glyphicon-ok"></i> <?= $this->lang->line('btn-save') ?>
									</button>
							</form>

							<form action="<?php echo base_url('resources/team-performance-assessments/list/'); ?><?php echo $project_id; ?>">
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

	for (var i = 1; i <= 6; i++) {
		if (document.getElementById("eval_tp_"+i).title == "") {
			document.getElementById("eval_tp_"+i).hidden = true;
		}
		limite_textarea(document.getElementById("eval_txt_" + i).value, "eval_" + i);
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