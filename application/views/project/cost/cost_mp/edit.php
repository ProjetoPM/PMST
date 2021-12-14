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
								<?= $this->lang->line('cosmp_title')  ?>
							</h1>
							<?php
							foreach ($cost_mp as $cmp) {
							?>

								<form method="POST" action="<?php echo base_url('cost/cost-mp/update'); ?>">
									<input type="hidden" name="status" value="1">

									<div class=" col-lg-12 form-group">
										<label for="project_costs_m"><?= $this->lang->line('cosmp_project_costs_m') ?> *</label>
										<span class="cosmp_1">2000</span><?= $this->lang->line('character') ?>
										<a class="btn-sm btn-default" id ="cosmp_tp_1" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('cosmp_project_costs_m_tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
										<div>
										<textarea onkeyup="limite_textarea(this.value, 'cosmp_1')" id="cosmp_txt_1" maxlength="2000" oninput="eylem(this, this.value)" class="form-control elasticteste" name="project_costs_m" required="true" ><?php echo $cmp->project_costs_m;?></textarea>
										</div>
									</div>


									<div class="col-lg-12 form-group">
										<label for="accuracy_level"><?= $this->lang->line('cosmp_accuracy') ?></label>
										<span class="cosmp_2">2000</span><?= $this->lang->line('character') ?>
										<a class="btn-sm btn-default" id ="cosmp_tp_2"data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('cosmp_accuracy_level_tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
										<div>
										<textarea onkeyup="limite_textarea(this.value, 'cosmp_2')" id="cosmp_txt_2" maxlength="2000" oninput="eylem(this, this.value)" class="form-control elasticteste" name="accuracy_level"><?php echo $cmp->accuracy_level;?></textarea>
										</div>
									</div>

									<div class="col-lg-12 form-group">
										<label for="organizational_procedures"><?= $this->lang->line('cosmp_organizational_procedures') ?></label>
										<span class="cosmp_3">2000</span><?= $this->lang->line('character') ?>
										<a class="btn-sm btn-default" id ="cosmp_tp_3"data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('cosmp_organizational_procedures_tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
										<div>
										<textarea onkeyup="limite_textarea(this.value, 'cosmp_3')" id="cosmp_txt_3" maxlength="2000" oninput="eylem(this, this.value)" class="form-control elasticteste" name="organizational_procedures"><?php echo $cmp->organizational_procedures;?></textarea>
										</div>
									</div>


									<div class=" col-lg-12 form-group">
										<label for="measurement_rules"><?= $this->lang->line('cosmp_measurement_rules') ?></label>
										<span class="cosmp_4">2000</span><?= $this->lang->line('character') ?>
										<a class="btn-sm btn-default" id ="cosmp_tp_4"data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('cosmp_measurement_rules_tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
										<div>
										<textarea onkeyup="limite_textarea(this.value, 'cosmp_4')" id="cosmp_txt_4" maxlength="2000" oninput="eylem(this, this.value)" class="form-control elasticteste" name="measurement_rules"><?php echo $cmp->measurement_rules;?></textarea>
										</div>
									</div>

									<div class=" col-lg-12 form-group">
										<label for="units_measure"><?= $this->lang->line('cosmp_units') ?></label>
										<span class="cosmp_5">2000</span><?= $this->lang->line('character') ?>
										<a class="btn-sm btn-default" id ="cosmp_tp_5"data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('cosmp_units_tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
										<div>
										<textarea onkeyup="limite_textarea(this.value, 'cosmp_5')" id="cosmp_txt_5" maxlength="2000" oninput="eylem(this, this.value)" class="form-control elasticteste" name="units_measure"><?php echo $cmp->units_measure;?></textarea>
										</div>
									</div>

									<div class=" col-lg-12 form-group">
										<label for="precision_level"><?= $this->lang->line('cosmp_precision') ?></label>
										<span class="cosmp_6">2000</span><?= $this->lang->line('character') ?>
										<a class="btn-sm btn-default" id ="cosmp_tp_6"data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('cosmp_precision_tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
										<div>
										<textarea onkeyup="limite_textarea(this.value, 'cosmp_6')" id="cosmp_txt_6" maxlength="2000" oninput="eylem(this, this.value)" class="form-control elasticteste" name="precision_level"><?php echo $cmp->precision_level;?></textarea>
										</div>
									</div>

									<div class=" col-lg-12 form-group">
										<label for="control_thresholds"><?= $this->lang->line('cosmp_control') ?></label>
										<span class="cosmp_7">2000</span><?= $this->lang->line('character') ?>
										<a class="btn-sm btn-default" id ="cosmp_tp_7"data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('cosmp_control_tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
										<div>
										<textarea onkeyup="limite_textarea(this.value, 'cosmp_7')" id="cosmp_txt_7" maxlength="2000" oninput="eylem(this, this.value)" class="form-control elasticteste" name="control_thresholds"><?php echo $cmp->control_thresholds;?></textarea>
										</div>
									</div>

									<div class=" col-lg-12 form-group">
										<label for="details"><?= $this->lang->line('cosmp_details') ?></label>
										<span class="cosmp_8">2000</span><?= $this->lang->line('character') ?>
										<a class="btn-sm btn-default" id ="cosmp_tp_8"data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('cosmp_details_tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
										<div>
										<textarea onkeyup="limite_textarea(this.value, 'cosmp_8')" id="cosmp_txt_8" maxlength="2000" oninput="eylem(this, this.value)" class="form-control elasticteste" name="details"><?php echo $cmp->details;?></textarea>
										</div>
									</div>

									<div class="col-lg-12 form-group">
										<label for="format_report"><?= $this->lang->line('cosmp_format_report') ?></label>
										<span class="cosmp_9">2000</span><?= $this->lang->line('character') ?>
										<a class="btn-sm btn-default" id ="cosmp_tp_9"data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('cosmp_format_report_tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
										<div>
										<textarea onkeyup="limite_textarea(this.value, 'cosmp_9')" id="cosmp_txt_9" maxlength="2000" oninput="eylem(this, this.value)" class="form-control elasticteste" name="format_report"><?php echo $cmp->format_report;?></textarea>
										</div>
									</div>

									<div class="col-lg-12">
										<button id="new_human_resource-submit" type="submit" value="Save" class="btn btn-lg btn-success pull-right">
											<i class="glyphicon glyphicon-ok"></i> <?= $this->lang->line('btn-save') ?>
										</button>
								</form>

								<form action="<?php echo base_url('project/'); ?><?php echo $_SESSION['project_id']; ?>">
									<button class="btn btn-lg btn-info pull-left"> <i class="glyphicon glyphicon-chevron-left"></i> <?= $this->lang->line('btn-back') ?></button>
								</form>
							<?php
							}
							?>



							<!--1º preencher o nome da view-->
							<?php $view = array(
								"name" => "cost_management_plan",
							); ?>


							<!--Carrega o form de envio e envia para ele o nome da view que tu setou -->
							<?php $this->load->view('upload/index', $view) ?>

							<!--Carrega as imagens do projeto de acordo com a view, utiliza id ou project_id pra pegar o id do projeto e criar a query-->
							<?php $this->load->view('upload/retrieve', $view) ?>

						</div>
					</div>
				</div>
			</section>
		</div>
	</div>
</body>
<script type="text/javascript">
	for (var i = 1; i <= 9; i++) {
		if (document.getElementById("cosmp_tp_" + i).title == "") {
			document.getElementById("cosmp_tp_" + i).hidden = true;
		}
		limite_textarea(document.getElementById("cosmp_txt_" + i).value, "cosmp_" + i);
	}

	function limite_textarea(valor, txt) {
		var limite = 2000;
		var caracteresDigitados = valor.length;
		var caracteresRestantes = limite - caracteresDigitados;
		$("." + txt).text(caracteresRestantes);
	}
  </script>


<?php $this->load->view('frame/footer_view') ?>