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

								<?= $this->lang->line('ppr_title')  ?>

							</h1>
							<?php extract($project_performance_report); ?>

							<form method="POST" action="<?php echo base_url('integration/project-performance-report/update/'); ?><?php echo $id; ?>">
							
								<input type="hidden" id="project_id" name="project_id" value="<?php echo $project_id; ?>">

								<div class="col-lg-12 form-group">
									<label for="current_performance_analysis"><?= $this->lang->line('ppr_current_performance_analysis') ?></label>
									<span class="ppr_1">2000</span><?= $this->lang->line('character') ?>
									<a class="btn-sm btn-default" id ="ppr_tp_1" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('ppr_current_performance_analysis_tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
									<div>
									<textarea onkeyup="limite_textarea(this.value, 'ppr_1')" id="ppr_txt_1" maxlength="2000" oninput="eylem(this, this.value)" class="form-control elasticteste" name="current_performance_analysis"><?php echo $current_performance_analysis;?></textarea>
									</div>
								</div>

								<div class="col-lg-12 form-group">
									<label for="planned_forecasts"><?= $this->lang->line('ppr_planned_forecasts') ?></label>
									<span class="ppr_2">2000</span><?= $this->lang->line('character') ?>
									<a class="btn-sm btn-default" id ="ppr_tp_2" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('ppr_planned_forecasts_tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
									<div>
									<textarea onkeyup="limite_textarea(this.value, 'ppr_2')" id="ppr_txt_2" maxlength="2000" oninput="eylem(this, this.value)" class="form-control elasticteste" name="planned_forecasts"><?php echo $planned_forecasts;?></textarea>
									</div>
								</div>

								<div class="col-lg-12 form-group">
									<label for="forecasts_considering_current_performance"><?= $this->lang->line('ppr_forecasts_considering_current_performance') ?></label>
									<span class="ppr_3">2000</span><?= $this->lang->line('character') ?>
									<a class="btn-sm btn-default" id ="ppr_tp_3" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('ppr_forecasts_considering_current_performance_tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
									<div>
									<textarea onkeyup="limite_textarea(this.value, 'ppr_3')" id="ppr_txt_3" maxlength="2000" oninput="eylem(this, this.value)" class="form-control elasticteste" name="forecasts_considering_current_performance"><?php echo $forecasts_considering_current_performance;?></textarea>
									</div>
								</div>

								<div class="col-lg-12 form-group">
									<label for="current_risk_situation"><?= $this->lang->line('ppr_current_risk_situation') ?></label>
									<span class="ppr_4">2000</span><?= $this->lang->line('character') ?>
									<a class="btn-sm btn-default" id ="ppr_tp_4" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('ppr_current_risk_situation_tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
									<div>
									<textarea onkeyup="limite_textarea(this.value, 'ppr_4')" id="ppr_txt_4" maxlength="2000" oninput="eylem(this, this.value)" class="form-control elasticteste" name="current_risk_situation"><?php echo $current_risk_situation;?></textarea>
									</div>
								</div>

								<div class="col-lg-12 form-group">
									<label for="current_status_of_issues"><?= $this->lang->line('ppr_current_status_of_issues') ?></label>
									<span class="ppr_5">2000</span><?= $this->lang->line('character') ?>
									<a class="btn-sm btn-default" id ="ppr_tp_5" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('ppr_current_status_of_issues_tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
									<div>
									<textarea onkeyup="limite_textarea(this.value, 'ppr_5')" id="ppr_txt_5" maxlength="2000" oninput="eylem(this, this.value)" class="form-control elasticteste" name="current_status_of_issues"><?php echo $current_status_of_issues;?></textarea>
									</div>
								</div>

								<div class="col-lg-12 form-group">
									<label for="work_completed_during_the_period"><?= $this->lang->line('ppr_work_completed_during_the_period') ?></label>
									<span class="ppr_6">2000</span><?= $this->lang->line('character') ?>
									<a class="btn-sm btn-default" id ="ppr_tp_6" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('ppr_work_completed_during_the_period_tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
									<div>
									<textarea onkeyup="limite_textarea(this.value, 'ppr_6')" id="ppr_txt_6" maxlength="2000" oninput="eylem(this, this.value)" class="form-control elasticteste" name="work_completed_during_the_period"><?php echo $work_completed_during_the_period;?></textarea>
									</div>
								</div>

								<div class="col-lg-12 form-group">
									<label for="work_to_be_completed_in_the_next_period"><?= $this->lang->line('ppr_work_to_be_completed_in_the_next_period') ?></label>
									<span class="ppr_7">2000</span><?= $this->lang->line('character') ?>
									<a class="btn-sm btn-default" id ="ppr_tp_7" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('ppr_work_to_be_completed_in_the_next_period_tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
									<div>
									<textarea onkeyup="limite_textarea(this.value, 'ppr_7')" id="ppr_txt_7" maxlength="2000" oninput="eylem(this, this.value)" class="form-control elasticteste" name="work_to_be_completed_in_the_next_period"><?php echo $work_to_be_completed_in_the_next_period;?></textarea>
									</div>
								</div>

								<div class="col-lg-12 form-group">
									<label for="summary_of_changes"><?= $this->lang->line('ppr_summary_of_changes') ?></label>
									<span class="ppr_8">2000</span><?= $this->lang->line('character') ?>
									<a class="btn-sm btn-default" id ="ppr_tp_8" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('ppr_summary_of_changes_tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
									<div>
									<textarea onkeyup="limite_textarea(this.value, 'ppr_8')" id="ppr_txt_8" maxlength="2000" oninput="eylem(this, this.value)" class="form-control elasticteste" name="summary_of_changes"><?php echo $summary_of_changes;?></textarea>
									</div>
								</div>

								<div class="col-lg-12 form-group">
									<label for="earned_value_management"><?= $this->lang->line('ppr_earned_value_management') ?></label>
									<span class="ppr_9">2000</span><?= $this->lang->line('character') ?>
									<a class="btn-sm btn-default" id ="ppr_tp_9" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('ppr_earned_value_management_tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
									<div>
									<textarea onkeyup="limite_textarea(this.value, 'ppr_9')" id="ppr_txt_9" maxlength="2000" oninput="eylem(this, this.value)" class="form-control elasticteste" name="earned_value_management"><?php echo $earned_value_management;?></textarea>
									</div>
								</div>

								<div class="col-lg-12 form-group">
									<label for="other_relevant_information"><?= $this->lang->line('ppr_other_relevant_information') ?></label>
									<span class="ppr_10">2000</span><?= $this->lang->line('character') ?>
									<a class="btn-sm btn-default" id ="ppr_tp_10" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('ppr_other_relevant_information_tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
									<div>
									<textarea onkeyup="limite_textarea(this.value, 'ppr_10')" id="ppr_txt_10" maxlength="2000" oninput="eylem(this, this.value)" class="form-control elasticteste" name="other_relevant_information"><?php echo $other_relevant_information;?></textarea>
									</div>
								</div>

								<div class=" col-lg-3 form-group">
									<label for="date"><?= $this->lang->line('ppr_date') ?></label>
									<a class="btn-sm btn-default" id ="11" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('ppr_date_tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
									<div>
										<input id="date" type="date" name="date" class="form-control input-md" value="<?php echo $date; ?>">
									</div>
								</div>


								<div class="col-lg-12">
									<button id="project_performance_report-submit" type="submit" value="Save" class="btn btn-lg btn-success pull-right">
										<i class="glyphicon glyphicon-ok"></i> <?= $this->lang->line('btn-save') ?>
									</button>
							</form>

							<form action="<?php echo base_url('integration/project-performance-report/list/'); ?><?php echo $project_id; ?>">
								<button class="btn btn-lg btn-info pull-left"> <i class="glyphicon glyphicon-chevron-left"></i> <?= $this->lang->line('btn-back') ?></button>
							</form>
						</div>
					</div>
				</div>
			</section>
		</div>
	</div>
</body>
<script>
    for (var i = 1; i <= 11; i++) {
        if (document.getElementById("ppr_tp_" + i).title == "") {
            document.getElementById("ppr_tp_" + i).hidden = true;
        }
        limite_textarea(document.getElementById("ppr_txt_" + i).value, "ppr_" + i);
    }
    function limite_textarea(valor, txt) {
		var limite = 2000;
		var caracteresDigitados = valor.length;
		var caracteresRestantes = limite - caracteresDigitados;
		$("." + txt).text(caracteresRestantes);
	}
	</script>
<?php $this->load->view('frame/footer_view') ?>