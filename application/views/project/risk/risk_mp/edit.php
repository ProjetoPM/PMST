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

								<?= $this->lang->line('rimp_title')  ?>

							</h1>
							<?php
							foreach ($risk_mp as $rmp) {
							?>

								<form method="POST" action="<?php echo base_url('risk/risk-mp/update'); ?>">
									<input type="hidden" name="status" value="1">

									<div class="form-group">
										<label for="methodology"><?= $this->lang->line('rimp_methodology') ?></label>
										<span class="rimp_1">2000</span><?= $this->lang->line('character') ?>
										<a class="btn-sm btn-default" id ="rimp_tp_1" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('rimp_methodology_tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
										<div>
										<textarea onkeyup="limite_textarea(this.value, 'rimp_1')" id="rimp_txt_1" maxlength="2000" oninput="eylem(this, this.value)" class="form-control elasticteste" name="methodology" ><?php echo $rmp->methodology;?></textarea>
										</div>
									</div>

									<div class="form-group">
										<label for="roles_responsibilities"><?= $this->lang->line('rimp_roles_responsibilities') ?></label>
										<span class="rimp_2">2000</span><?= $this->lang->line('character') ?>
										<a class="btn-sm btn-default" id ="rimp_tp_2" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('rimp_roles_responsabilities_tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
										<div>
										<textarea onkeyup="limite_textarea(this.value, 'rimp_2')" id="rimp_txt_2" maxlength="2000" oninput="eylem(this, this.value)" class="form-control elasticteste" name="roles_responsibilities" ><?php echo $rmp->roles_responsibilities;?></textarea>
										</div>
									</div>

									<div class="form-group">
										<label for="probability_impact_matrix"><?= $this->lang->line('rimp_probability_impact_matrix') ?></label>
										<span class="rimp_3">2000</span><?= $this->lang->line('character') ?>
										<a class="btn-sm btn-default" id ="rimp_tp_3" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('rimp_probability_impact_matrix_tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
										<div>
										<textarea onkeyup="limite_textarea(this.value, 'rimp_3')" id="rimp_txt_3" maxlength="2000" oninput="eylem(this, this.value)" class="form-control elasticteste" name="probability_impact_matrix" ><?php echo $rmp->probability_impact_matrix;?></textarea>
										</div>
									</div>

									<div class="form-group">
										<label for="risks_categories"><?= $this->lang->line('rimp_risks_categories') ?></label>
										<span class="rimp_4">2000</span><?= $this->lang->line('character') ?>
										<a class="btn-sm btn-default" id ="rimp_tp_4" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('rimp_risks_categories_tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
										<div>
										<textarea onkeyup="limite_textarea(this.value, 'rimp_4')" id="rimp_txt_4" maxlength="2000" oninput="eylem(this, this.value)" class="form-control elasticteste" name="risks_categories" ><?php echo $rmp->probability_impact_matrix;?></textarea>
										</div>
									</div>


									<div class="form-group">
										<label for="reviewed_tolerances"><?= $this->lang->line('rimp_strategy') ?></label>
										<span class="rimp_5">2000</span><?= $this->lang->line('character') ?>
										<a class="btn-sm btn-default" id ="rimp_tp_5" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('rimp_strategy_tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
										<div>
										<textarea onkeyup="limite_textarea(this.value, 'rimp_5')" id="rimp_txt_5" maxlength="2000" oninput="eylem(this, this.value)" class="form-control elasticteste" name="reviewed_tolerances" ><?php echo $rmp->reviewed_tolerances;?></textarea>
										</div>
									</div>

									<div class="form-group">
										<label for="traceability"><?= $this->lang->line('rimp_tracking') ?></label>
										<span class="rimp_6">2000</span><?= $this->lang->line('character') ?>
										<a class="btn-sm btn-default" id ="rimp_tp_6" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('rimp_traceability_tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
										<div>
										<textarea onkeyup="limite_textarea(this.value, 'rimp_6')" id="rimp_txt_6" maxlength="2000" oninput="eylem(this, this.value)" class="form-control elasticteste" name="traceability" ><?php echo $rmp->traceability;?></textarea>
										</div>
									</div>

									<div class="form-group">
										<label for="funding"><?= $this->lang->line('rimp_funding') ?></label>
										<span class="rimp_7">2000</span><?= $this->lang->line('character') ?>
										<a class="btn-sm btn-default" id ="rimp_tp_7" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('rimp_traceability_tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
										<div>
										<textarea onkeyup="limite_textarea(this.value, 'rimp_7')" id="rimp_txt_7" maxlength="2000" oninput="eylem(this, this.value)" class="form-control elasticteste" name="funding" ><?php echo $rmp->funding;?></textarea>
										</div>
									</div>

									<div class="form-group">
										<label for="timing"><?= $this->lang->line('rimp_timing') ?></label>
										<span class="rimp_8">2000</span><?= $this->lang->line('character') ?>
										<a class="btn-sm btn-default" id ="rimp_tp_8" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('rimp_timing_tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
										<div>
										<textarea onkeyup="limite_textarea(this.value, 'rimp_8')" id="rimp_txt_8" maxlength="2000" oninput="eylem(this, this.value)" class="form-control elasticteste" name="timing" ><?php echo $rmp->timing;?></textarea>
										</div>
									</div>

									<div class="form-group">
										<label for="stakeholder_risk"><?= $this->lang->line('rimp_stakeholder') ?></label>
										<span class="rimp_9">2000</span><?= $this->lang->line('character') ?>
										<a class="btn-sm btn-default" id ="rimp_tp_9" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('rimp_traceability_tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
										<div>
										<textarea onkeyup="limite_textarea(this.value, 'rimp_9')" id="rimp_txt_9" maxlength="2000" oninput="eylem(this, this.value)" class="form-control elasticteste" name="stakeholder_risk" ><?php echo $rmp->stakeholder_risk;?></textarea>
										</div>
									</div>

									<div class="form-group">
										<label for="definitions_risk"><?= $this->lang->line('rimp_definitions') ?></label>
										<span class="rimp_10">2000</span><?= $this->lang->line('character') ?>
										<a class="btn-sm btn-default" id ="rimp_tp_10" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('rimp_definitions_tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
										<div>
										<textarea onkeyup="limite_textarea(this.value, 'rimp_10')" id="rimp_txt_10" maxlength="2000" oninput="eylem(this, this.value)" class="form-control elasticteste" name="definitions_risk" ><?php echo $rmp->definitions_risk;?></textarea>
										</div>
									</div>

									<div class="form-group">
										<label for="format_report"><?= $this->lang->line('rimp_format') ?></label>
										<span class="rimp_11">2000</span><?= $this->lang->line('character') ?>
										<a class="btn-sm btn-default" id ="rimp_tp_11" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('rimp_format_tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
										<div>
										<textarea onkeyup="limite_textarea(this.value, 'rimp_11')" id="rimp_txt_11" maxlength="2000" oninput="eylem(this, this.value)" class="form-control elasticteste" name="format_report" ><?php echo $rmp->format_report;?></textarea>
										</div>
									</div>

									<div class="col-lg-12">
										<button id="stakeholder-submit" type="submit" value="Save" class="btn btn-lg btn-success pull-right">
											<i class="glyphicon glyphicon-ok"></i> <?= $this->lang->line('btn-save') ?>
										</button>
								</form>

								<form action="<?php echo base_url('project/'); ?><?php echo  $_SESSION['project_id']; ?>">
									<button class="btn btn-lg btn-info pull-left"> <i class="glyphicon glyphicon-chevron-left"></i> <?= $this->lang->line('btn-back') ?></button>
								</form>
							<?php
							}
							?>

							<!--1º preencher o nome da view-->
							<?php $view = array(
								"name" => "risk_management_plan",
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
<script src="<?= base_url() ?>assets/js/jquery-1.11.1.js" type="text/javascript"></script>
<script type="text/javascript">
	for (var i = 1; i <= 19; i++) {
		if (document.getElementById("rimp_tp_" + i).title == "") {
			document.getElementById("rimp_tp_" + i).hidden = true;
		}
		limite_textarea(document.getElementById("rimp_txt_" + i).value, "rimp_" + i);
	}

	function limite_textarea(valor, txt) {
		var limite = 2000;
		var caracteresDigitados = valor.length;
		var caracteresRestantes = limite - caracteresDigitados;
		$("." + txt).text(caracteresRestantes);
	}
  </script>
<?php $this->load->view('frame/footer_view') ?>