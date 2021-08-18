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
										<label for="requirements_collection_proc"><?= $this->lang->line('rmp_requirements_collection_proc') ?></label>
										<span class="rmp_1">2000</span><?= $this->lang->line('character') ?>
										<a class="btn-sm btn-default" id ="rmp_tp_1" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('rmp_requirements_collection_proc_tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
										<div>
										<textarea onkeyup="limite_textarea(this.value, 'rmp_1')" id="rmp_txt_1" maxlength="2000" oninput="eylem(this, this.value)" class="form-control elasticteste" name="requirements_collection_proc"><?= $rmp->requirements_collection_proc; ?></textarea>
										</div>
									</div>

									<div class=" col-lg-12 form-group">
										<label for="configuration"><?= $this->lang->line('rmp_configuration') ?></label>
										<span class="rmp_2">2000</span><?= $this->lang->line('character') ?>
										<a class="btn-sm btn-default" id ="rmp_tp_2" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('rmp_configuration_tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
										<div>
										<textarea onkeyup="limite_textarea(this.value, 'rmp_2')" id="rmp_txt_2" maxlength="2000" oninput="eylem(this, this.value)" class="form-control elasticteste" name="configuration"><?= $rmp->configuration; ?></textarea>
										</div>
									</div>

									<div class=" col-lg-12 form-group">
										<label for="requirements_prioritization"><?= $this->lang->line('rmp_requirements_prioritization') ?></label>
										<span class="rmp_3">2000</span><?= $this->lang->line('character') ?>
										<a class="btn-sm btn-default" id ="rmp_tp_3" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('rmp_requirements_prioritization_tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
										<div>
										<textarea onkeyup="limite_textarea(this.value, 'rmp_3')" id="rmp_txt_3" maxlength="2000" oninput="eylem(this, this.value)" class="form-control elasticteste" name="requirements_prioritization"><?= $rmp->requirements_prioritization; ?></textarea>
										</div>
									</div>

									<div class=" col-lg-12 form-group">
										<label for="product_metrics"><?= $this->lang->line('rmp_product_metrics') ?></label>
										<span class="rmp_4">2000</span><?= $this->lang->line('character') ?>
										<a class="btn-sm btn-default" id ="rmp_tp_4" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('rmp_product_metrics_tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
										<div>
										<textarea onkeyup="limite_textarea(this.value, 'rmp_4')" id="rmp_txt_4" maxlength="2000" oninput="eylem(this, this.value)" class="form-control elasticteste" name="product_metrics"><?= $rmp->product_metrics; ?></textarea>
										</div>
									</div>

									<div class=" col-lg-12 form-group">
										<label for="traceability"><?= $this->lang->line('rmp_traceability') ?></label>
										<span class="rmp_5">2000</span><?= $this->lang->line('character') ?>
										<a class="btn-sm btn-default" id ="rmp_tp_5" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('rmp_traceability_tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
										<div>
										<textarea onkeyup="limite_textarea(this.value, 'rmp_5')" id="rmp_txt_5" maxlength="2000" oninput="eylem(this, this.value)" class="form-control elasticteste" name="traceability"><?= $rmp->traceability; ?></textarea>
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
<script src="<?= base_url() ?>assets/js/jquery-1.11.1.js" type="text/javascript"></script>
<script type="text/javascript">
for (var i = 1; i <= 6; i++) {
		if (document.getElementById("rmp_tp_" + i).title == "") {
			document.getElementById("rmp_tp_" + i).hidden = true;
		}
		limite_textarea(document.getElementById("rmp_txt_" + i).value, "rmp_" + i);
	}

	function limite_textarea(valor, txt) {
		var limite = 2000;
		var caracteresDigitados = valor.length;
		var caracteresRestantes = limite - caracteresDigitados;
		$("." + txt).text(caracteresRestantes);
	}
</script>
<?php $this->load->view('frame/footer_view') ?>