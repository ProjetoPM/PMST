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
										<a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('methodology-tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
										<div>
											<textarea oninput="eylem(this, this.value)" class="form-control elasticteste" id="methodology" name="methodology"><?php echo $rmp->methodology; ?></textarea>
										</div>
									</div>

									<div class="form-group">
										<label for="roles_responsibilities"><?= $this->lang->line('rimp_roles_responsibilities') ?></label>
										<a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('roles_responsabilities-tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
										<div>
											<textarea oninput="eylem(this, this.value)" class="form-control elasticteste" id="roles_responsibilities" name="roles_responsibilities"><?php echo $rmp->roles_responsibilities; ?></textarea>
										</div>
									</div>

									<div class="form-group">
										<label for="probability_impact_matrix"><?= $this->lang->line('rimp_probability_impact_matrix') ?></label>
										<a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('probability_impact_matrix-tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
										<div>
											<textarea oninput="eylem(this, this.value)" class="form-control elasticteste" id="probability_impact_matrix" name="probability_impact_matrix"><?php echo $rmp->probability_impact_matrix; ?></textarea>
										</div>
									</div>

									<div class="form-group">
										<label for="risks_categories"><?= $this->lang->line('rimp_risks_categories') ?></label>
										<a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('risks_categories-tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
										<div>
											<textarea oninput="eylem(this, this.value)" class="form-control elasticteste" id="risks_categories" name="risks_categories"><?php echo $rmp->risks_categories; ?></textarea>
										</div>
									</div>


									<div class="form-group">
										<label for="reviewed_tolerances"><?= $this->lang->line('rimp_strategy') ?></label>
										<a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('reviewed_tolerances-tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
										<div>
											<textarea oninput="eylem(this, this.value)" class="form-control elasticteste" id="reviewed_tolerances" name="reviewed_tolerances"><?php echo $rmp->reviewed_tolerances; ?></textarea>
										</div>
									</div>

									<div class="form-group">
										<label for="traceability"><?= $this->lang->line('rimp_tracking') ?></label>
										<a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('traceability-tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
										<div>
											<textarea oninput="eylem(this, this.value)" class="form-control elasticteste" id="traceability" name="traceability"><?php echo $rmp->traceability; ?></textarea>
										</div>
									</div>

									<div class="form-group">
										<label for="funding"><?= $this->lang->line('rimp_funding') ?></label>
										<a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('traceability-tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
										<div>
											<textarea oninput="eylem(this, this.value)" class="form-control elasticteste" id="funding" name="funding"><?php echo $rmp->funding; ?></textarea>
										</div>
									</div>

									<div class="form-group">
										<label for="timing"><?= $this->lang->line('rimp_timing') ?></label>
										<a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('traceability-tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
										<div>
											<textarea oninput="eylem(this, this.value)" class="form-control elasticteste" id="timing" name="timing"><?php echo $rmp->timing; ?></textarea>
										</div>
									</div>

									<div class="form-group">
										<label for="stakeholder_risk"><?= $this->lang->line('rimp_stakeholder') ?></label>
										<a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('traceability-tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
										<div>
											<textarea oninput="eylem(this, this.value)" class="form-control elasticteste" id="stakeholder_risk" name="stakeholder_risk"><?php echo $rmp->stakeholder_risk; ?></textarea>
										</div>
									</div>

									<div class="form-group">
										<label for="definitions_risk"><?= $this->lang->line('rimp_definitions') ?></label>
										<a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('traceability-tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
										<div>
											<textarea oninput="eylem(this, this.value)" class="form-control elasticteste" id="definitions_risk" name="definitions_risk"><?php echo $rmp->definitions_risk; ?></textarea>
										</div>
									</div>

									<div class="form-group">
										<label for="format_report"><?= $this->lang->line('rimp_format') ?></label>
										<a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('traceability-tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
										<div>
											<textarea oninput="eylem(this, this.value)" class="form-control elasticteste" id="format_report" name="format_report"><?php echo $rmp->format_report; ?></textarea>
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

<?php $this->load->view('frame/footer_view') ?>