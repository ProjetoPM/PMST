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

								<?= $this->lang->line('rmp_title')  ?>

							</h1>

							<?php
							foreach ($requirements_mp as $rmp) {
							?>

								<form method="POST" action="<?php echo base_url('scope/requirements-mp/update/'); ?>">
									<input type="hidden" name="status" value="1">

									<div class=" col-lg-12 form-group">
										<label for="requirements_collection_proc"><?= $this->lang->line('rmp_requirements_activities') ?></label>
										<a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('rmp_requirements_activities_tooltip') ?>"><i class="glyphicon glyphicon-comment"></i></a>
										<div>
											<textarea oninput="eylem(this, this.value)" class="form-control elasticteste" id="requirements_collection_proc" name="requirements_collection_proc"><?php echo $rmp->requirements_collection_proc; ?></textarea>
										</div>
									</div>

									<div class=" col-lg-12 form-group">
										<label for="configuration"><?= $this->lang->line('rmp_configuration_management') ?></label>
										<a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('rmp_configuration_management_tooltip') ?>"><i class="glyphicon glyphicon-comment"></i></a>
										<div>
											<textarea oninput="eylem(this, this.value)" class="form-control elasticteste" id="configuration" name="configuration"><?php echo $rmp->configuration; ?></textarea>
										</div>
									</div>

									<div class=" col-lg-12 form-group">
										<label for="requirements_prioritization"><?= $this->lang->line('rmp_requirements_prioritization') ?></label>
										<a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('rmp_requirements_prioritization_tooltip') ?>"><i class="glyphicon glyphicon-comment"></i></a>
										<div>
											<textarea oninput="eylem(this, this.value)" class="form-control elasticteste" id="requirements_prioritization" name="requirements_prioritization"><?php echo $rmp->requirements_prioritization; ?></textarea>
										</div>
									</div>

									<div class=" col-lg-12 form-group">
										<label for="product_metrics"><?= $this->lang->line('rmp_product_metrics') ?></label>
										<a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('rmp_product_metrics_tooltip') ?>"><i class="glyphicon glyphicon-comment"></i></a>
										<div>
											<textarea oninput="eylem(this, this.value)" class="form-control elasticteste" id="product_metrics" name="product_metrics"><?php echo $rmp->product_metrics; ?></textarea>
										</div>
									</div>

									<div class=" col-lg-12 form-group">
										<label for="traceability"><?= $this->lang->line('rmp_requirements_traceability') ?></label>
										<a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('rmp_requirements_traceability_tooltip') ?>"><i class="glyphicon glyphicon-comment"></i></a>
										<div>
											<textarea oninput="eylem(this, this.value)" class="form-control elasticteste" id="" name="traceability"><?php echo $rmp->traceability; ?></textarea>
										</div>
									</div>

									<input type="hidden" name="status" value="1">

									<div class="col-lg-12">
										<button id="tap-submit" type="submit" value="Save" class="btn btn-lg btn-success pull-right">
											<i class="glyphicon glyphicon-ok"></i>
											<?= $this->lang->line('btn-save') ?>
										</button>
								</form>
								<form action="<?php echo base_url('project/'); ?><?php echo $_SESSION['project_id']; ?>">
									<button class="btn btn-lg btn-info pull-left"> <i class="glyphicon glyphicon-chevron-left"></i> <?= $this->lang->line('btn-back') ?></button>
								</form>
							<?php } ?>


							<!--1º preencher o nome da view-->
							<?php $view = array(
								"name" => "requirements_management_plan",
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