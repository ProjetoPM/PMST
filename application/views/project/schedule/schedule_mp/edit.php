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

								<?= $this->lang->line('schmp-title')  ?>

							</h1>
							<form action="<?= base_url() ?>schedule/schedule-mp/update" method="post">
								<input type="hidden" name="project_id" value="<?php echo $_SESSION['project_id']; ?>">

								<div class="col-lg-12 form-group">
									<label for="schedule_model"><?= $this->lang->line('schmp-model') ?></label>
									<span class="schmp_1">2000</span><?= $this->lang->line('character') ?>
									<a class="btn-sm btn-default" id="schmp_tp_1" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('schmp-model-tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
									<div>
										<textarea onkeyup="limite_textarea(this.value, 'schmp_1')" id="schmp_txt_1" maxlength="2000" oninput="eylem(this, this.value)" class="form-control elasticteste" name="schedule_model"><?php echo $schedule_mp[0]->schedule_model; ?></textarea>
									</div>
								</div>

								<div class="col-lg-6 form-group">
										<label for="accuracy_level"><?= $this->lang->line('schmp-accuracy_level') ?></label>
										<a class="btn-sm btn-default" id="schmp_tp_2" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('schmp-accuracy_level-tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
										<span class="schmp_2">2000</span><?= $this->lang->line('character') ?>
										<div>
										<textarea onkeyup="limite_textarea(this.value, 'schmp_2')" id="schmp_txt_2" maxlength="2000" oninput="eylem(this, this.value)" class="form-control elasticteste" name="accuracy_level"><?php echo $schedule_mp[0]->accuracy_level; ?></textarea>
									</div>
								</div>

								<div class="col-lg-6 form-group">
										<label for="organizational_procedures"><?= $this->lang->line('schmp-procedures') ?></label>
										<a class="btn-sm btn-default" id="schmp_tp_3" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('schmp-procedures-tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
										<span class="schmp_3">2000</span><?= $this->lang->line('character') ?>
										<div>
										<textarea onkeyup="limite_textarea(this.value, 'schmp_3')" id="schmp_txt_3" maxlength="2000" oninput="eylem(this, this.value)" class="form-control elasticteste" name="organizational_procedures"><?php echo $schedule_mp[0]->organizational_procedures; ?></textarea>
									</div>
								</div>

								<div class="col-lg-12 form-group">						
										<label for="schedule_maintenance"><?= $this->lang->line('schmp-maintenance') ?></label>
										<a class="btn-sm btn-default" id="schmp_tp_4" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('schmp-maintenance-tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
										<span class="schmp_4">2000</span><?= $this->lang->line('character') ?>
										<div>
										<textarea onkeyup="limite_textarea(this.value, 'schmp_4')" id="schmp_txt_4" maxlength="2000" oninput="eylem(this, this.value)" class="form-control elasticteste" name="schedule_maintenance"><?php echo $schedule_mp[0]->schedule_maintenance; ?></textarea>
									</div>
								</div>

								<div class="col-lg-6 form-group">
										<label for="performance_measurement"><?= $this->lang->line('schmp-rules') ?></label>
										<a class="btn-sm btn-default" id="schmp_tp_5" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('schmp-rules-tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
										<span class="schmp_5">2000</span><?= $this->lang->line('character') ?>
										<div>
										<textarea onkeyup="limite_textarea(this.value, 'schmp_5')" id="schmp_txt_5" maxlength="2000" oninput="eylem(this, this.value)" class="form-control elasticteste" name="performance_measurement"><?php echo $schedule_mp[0]->performance_measurement; ?></textarea>
									</div>
								</div>

								<!-- Textarea-->
								<div class="col-lg-6 form-group">
										<label for="report_format"><?= $this->lang->line('schmp-format') ?></label>
										<a class="btn-sm btn-default" id="schmp_tp_6" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('schmp-report_format-tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
										<span class="schmp_6">2000</span><?= $this->lang->line('character') ?>
										<div>
										<textarea onkeyup="limite_textarea(this.value, 'schmp_6')" id="schmp_txt_6" maxlength="2000" oninput="eylem(this, this.value)" class="form-control elasticteste" name="report_format"><?php echo $schedule_mp[0]->report_format; ?></textarea>
									</div>
								</div>

								<div class="col-lg-12 form-group">
										<label for="release_iteration"><?= $this->lang->line('schmp-length') ?></label>
										<a class="btn-sm btn-default" id="schmp_tp_7" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('schmp-length-tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
										<span class="schmp_7">2000</span><?= $this->lang->line('character') ?>
										<div>
										<textarea onkeyup="limite_textarea(this.value, 'schmp_7')" id="schmp_txt_7" maxlength="2000" oninput="eylem(this, this.value)" class="form-control elasticteste" name="release_iteration"><?php echo $schedule_mp[0]->release_iteration; ?></textarea>
									</div>
								</div>

								<div class="col-lg-6 form-group">						
										<label for="units_measure"><?= $this->lang->line('schmp-measure') ?></label>
										<a class="btn-sm btn-default" id="schmp_tp_8" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('schmp-measure-tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
										<span class="schmp_8">2000</span><?= $this->lang->line('character') ?>
										<div>
										<textarea onkeyup="limite_textarea(this.value, 'schmp_8')" id="schmp_txt_8" maxlength="2000" oninput="eylem(this, this.value)" class="form-control elasticteste" name="units_measure"><?php echo $schedule_mp[0]->units_measure; ?></textarea>
									</div>
								</div>

								<!-- Textarea-->
								<div class="col-lg-6 form-group">
										<label for="control_thresholds"><?= $this->lang->line('schmp-control') ?></label>
										<a class="btn-sm btn-default" id="schmp_tp_9" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('schmp-control-tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
										<span class="schmp_9">2000</span><?= $this->lang->line('character') ?>
										<div>
										<textarea onkeyup="limite_textarea(this.value, 'schmp_9')" id="schmp_txt_9" maxlength="2000" oninput="eylem(this, this.value)" class="form-control elasticteste" name="control_thresholds"><?php echo $schedule_mp[0]->control_thresholds; ?></textarea>
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
<script src="<?= base_url() ?>assets/js/jquery-1.11.1.js" type="text/javascript"></script>
<script type="text/javascript">
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