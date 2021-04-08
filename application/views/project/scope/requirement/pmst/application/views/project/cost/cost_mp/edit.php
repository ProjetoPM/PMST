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
										<a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('cosmp_project_costs_m_tooltip') ?>"><i class="glyphicon glyphicon-comment"></i></a>
										<div>
											<textarea oninput="eylem(this, this.value)" class="form-control elasticteste" id="project_costs_m" name="project_costs_m" required="true"><?php echo $cmp->project_costs_m; ?></textarea>
										</div>
									</div>


									<div class="col-lg-12 form-group">
										<label for="accuracy_level"><?= $this->lang->line('cosmp_accuracy') ?>
										</label>
										<a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('cosmp_accuracy_level_tooltip') ?>"><i class="glyphicon glyphicon-comment"></i></a>
										<div>
											<textarea oninput="eylem(this, this.value)" class="form-control elasticteste" id="accuracy_level" name="accuracy_level"><?php echo $cmp->accuracy_level; ?></textarea>
										</div>
									</div>

									<div class="col-lg-12 form-group">
										<label for="organizational_procedures"><?= $this->lang->line('cosmp_organizational_procedures') ?>
										</label>
										<a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('cosmp_organizational_procedures_tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
										<div>
											<textarea oninput="eylem(this, this.value)" class="form-control elasticteste" id="organizational_procedures" name="organizational_procedures"><?php echo $cmp->organizational_procedures; ?></textarea>
										</div>
									</div>


									<div class=" col-lg-12 form-group">
										<label for="measurement_rules"><?= $this->lang->line('cosmp_measurement_rules') ?></label>
										<a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('cosmp_measurement_rules_tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>

										<div>
											<textarea oninput="eylem(this, this.value)" class="form-control elasticteste" id="measurement_rules" name="measurement_rules"><?php echo $cmp->measurement_rules; ?></textarea>
										</div>
									</div>

									<div class=" col-lg-12 form-group">
										<label for="units_measure"><?= $this->lang->line('cosmp_units') ?></label>
										<a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('cosmp_units_tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
										<div>
											<textarea oninput="eylem(this, this.value)" class="form-control elasticteste" id="units_measure" name="units_measure"><?php echo $cmp->units_measure; ?></textarea>
										</div>
									</div>

									<div class=" col-lg-12 form-group">
										<label for="precision_level"><?= $this->lang->line('cosmp_precision') ?></label>
										<a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('cosmp_precision_tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
										<div>
											<textarea oninput="eylem(this, this.value)" class="form-control elasticteste" id="precision_level" name="precision_level"><?php echo $cmp->precision_level; ?></textarea>
										</div>
									</div>

									<div class=" col-lg-12 form-group">
										<label for="control_thresholds"><?= $this->lang->line('cosmp_control') ?></label>
										<a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('cosmp_control_tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
										<div>
											<textarea oninput="eylem(this, this.value)" class="form-control elasticteste" id="control_thresholds" name="control_thresholds"><?php echo $cmp->control_thresholds; ?></textarea>
										</div>
									</div>

									<div class=" col-lg-12 form-group">
										<label for="details"><?= $this->lang->line('cosmp_details') ?></label>
										<a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('cosmp_details_tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
										<div>
											<textarea oninput="eylem(this, this.value)" class="form-control elasticteste" id="details" name="details"><?php echo $cmp->details; ?></textarea>
										</div>
									</div>

									<div class="col-lg-12 form-group">
										<label for="format_report"><?= $this->lang->line('cosmp_format_report') ?>
										</label>
										<a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('cosmp_format_report-tooltip') ?>"><i class="glyphicon glyphicon-comment"></i></a>
										<div>
											<textarea oninput="eylem(this, this.value)" class="form-control elasticteste" id="format_report" name="format_report"><?php echo $cmp->format_report; ?></textarea>
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



<?php $this->load->view('frame/footer_view') ?>