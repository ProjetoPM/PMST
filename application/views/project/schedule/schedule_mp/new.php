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

								<?= $this->lang->line('schmp_title')  ?>

							</h1>
							<form method="post" action="<?php echo base_url('schedule/schedule-mp/insert/'); ?>">

								<input type="hidden" name="project_id" value="<?php echo $_SESSION['project_id']; ?>">

								<div class="col-lg-12 form-group">
									<label for="schedule_model"><?= $this->lang->line('schmp_model') ?></label>
									<span class="schmp_1">2000</span><?= $this->lang->line('character') ?>
									<a class="btn-sm btn-default" id="schmp_tp_1" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('schmp_model_tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
									<div>
										<textarea onkeyup="limite_textarea(this.value, 'schmp_1')" id="schmp_txt_1" maxlength="2000" oninput="eylem(this, this.value)" class="form-control elasticteste" name="schedule_model"></textarea>
									</div>
								</div>

								<div class="col-lg-6 form-group">
										<label for="accuracy_level"><?= $this->lang->line('schmp_accuracy_level') ?></label>
										<a class="btn-sm btn-default" id="schmp_tp_2" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('schmp_accuracy_level_tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
										<span class="schmp_2">2000</span><?= $this->lang->line('character') ?>
										<div>
										<textarea onkeyup="limite_textarea(this.value, 'schmp_2')" id="schmp_txt_2" maxlength="2000" oninput="eylem(this, this.value)" class="form-control elasticteste" name="accuracy_level"></textarea>
									</div>
								</div>

								<div class="col-lg-6 form-group">
										<label for="organizational_procedures"><?= $this->lang->line('schmp_procedures') ?></label>
										<a class="btn-sm btn-default" id="schmp_tp_3" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('schmp_organization-procedures_tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
										<span class="schmp_3">2000</span><?= $this->lang->line('character') ?>
										<div>
										<textarea onkeyup="limite_textarea(this.value, 'schmp_3')" id="schmp_txt_3" maxlength="2000" oninput="eylem(this, this.value)" class="form-control elasticteste" name="organizational_procedures"></textarea>
									</div>
								</div>

								<div class="col-lg-12 form-group">						
										<label for="schedule_maintenance"><?= $this->lang->line('schmp_maintenance') ?></label>
										<a class="btn-sm btn-default" id="schmp_tp_4" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('schmp_schedule-maintenance_tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
										<span class="schmp_4">2000</span><?= $this->lang->line('character') ?>
										<div>
										<textarea onkeyup="limite_textarea(this.value, 'schmp_4')" id="schmp_txt_4" maxlength="2000" oninput="eylem(this, this.value)" class="form-control elasticteste" name="schedule_maintenance"></textarea>
									</div>
								</div>

								<div class="col-lg-6 form-group">
										<label for="performance_measurement"><?= $this->lang->line('schmp_measurement') ?></label>
										<a class="btn-sm btn-default" id="schmp_tp_5" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('schmp_performance_measurement_tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
										<span class="schmp_5">2000</span><?= $this->lang->line('character') ?>
										<div>
										<textarea onkeyup="limite_textarea(this.value, 'schmp_5')" id="schmp_txt_5" maxlength="2000" oninput="eylem(this, this.value)" class="form-control elasticteste" name="performance_measurement"></textarea>
									</div>
								</div>

								<!-- Textarea-->
								<div class="col-lg-6 form-group">
										<label for="report_format"><?= $this->lang->line('schmp_format') ?></label>
										<a class="btn-sm btn-default" id="schmp_tp_6" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('schmp_report_format_tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
										<span class="schmp_6">2000</span><?= $this->lang->line('character') ?>
										<div>
										<textarea onkeyup="limite_textarea(this.value, 'schmp_6')" id="schmp_txt_6" maxlength="2000" oninput="eylem(this, this.value)" class="form-control elasticteste" name="report_format"></textarea>
									</div>
								</div>

								<div class="col-lg-12 form-group">
										<label for="release_iteration"><?= $this->lang->line('schmp_length') ?></label>
										<a class="btn-sm btn-default" id="schmp_tp_7" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('schmp_length_tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
										<span class="schmp_7">2000</span><?= $this->lang->line('character') ?>
										<div>
										<textarea onkeyup="limite_textarea(this.value, 'schmp_7')" id="schmp_txt_7" maxlength="2000" oninput="eylem(this, this.value)" class="form-control elasticteste" name="release_iteration"></textarea>
									</div>
								</div>

								<div class="col-lg-6 form-group">						
										<label for="performance_measurement"><?= $this->lang->line('schmp_measurement') ?></label>
										<a class="btn-sm btn-default" id="schmp_tp_8" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('schmp_measure_tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
										<span class="schmp_8">2000</span><?= $this->lang->line('character') ?>
										<div>
										<textarea onkeyup="limite_textarea(this.value, 'schmp_8')" id="schmp_txt_8" maxlength="2000" oninput="eylem(this, this.value)" class="form-control elasticteste" name="units_measure"></textarea>
									</div>
								</div>

								<!-- Textarea-->
								<div class="col-lg-6 form-group">
										<label for="control_thresholds"><?= $this->lang->line('schmp_control') ?></label>
										<a class="btn-sm btn-default" id="schmp_tp_9" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('schmp_control_tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
										<span class="schmp_9">2000</span><?= $this->lang->line('character') ?>
										<div>
										<textarea onkeyup="limite_textarea(this.value, 'schmp_9')" id="schmp_txt_9" maxlength="2000" oninput="eylem(this, this.value)" class="form-control elasticteste" name="control_thresholds"></textarea>
									</div>
								</div>

								<div class="col-lg-12">
									<button id="schedule-submit" type="submit" value="Save" class="btn btn-lg btn-success pull-right">
										<i class="glyphicon glyphicon-ok"></i> <?= $this->lang->line('btn-save') ?>
									</button>
							</form>
							<form action="<?php echo base_url('project/'); ?><?php echo $_SESSION['project_id']; ?>">
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
for (var i = 1; i <= 9; i++) {
		if (document.getElementById("schmp_tp_" + i).title == "") {
			document.getElementById("schmp_tp_" + i).hidden = true;
		}
		limite_textarea(document.getElementById("schmp_txt_" + i).value, "schmp_" + i);
	}

	function limite_textarea(valor, txt) {
		var limite = 2000;
		var caracteresDigitados = valor.length;
		var caracteresRestantes = limite - caracteresDigitados;
		$("." + txt).text(caracteresRestantes);
	}
  </script>
<?php $this->load->view('frame/footer_view') ?>