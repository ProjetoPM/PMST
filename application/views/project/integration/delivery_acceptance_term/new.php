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

								<?= $this->lang->line('ds_title')  ?>

							</h1>

							<form method="POST" action="<?php echo base_url('integration/deliverable-status/insert/'); ?><?php echo $project_id; ?>">
								<input type="hidden" id="project_id" name="project_id" value="<?php echo $project_id; ?>">


								<div class=" col-lg-6 form-group">
									<label for="validator_name"><?= $this->lang->line('ds_validator_name') ?></label>
									<span class="ds_1">2000</span><?= $this->lang->line('character') ?>
									<a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('validator_name-tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
									<div>
										<input id="ds_txt_1" type="text" name="validator_name" class="form-control input-md" onkeyup = "limite_textarea(this.value, 'ds_1')" maxlength="2000" oninput="eylem(this, this.value)" required="false">
									</div>
								</div>

								<div class=" col-lg-6 form-group">
									<label for="role"><?= $this->lang->line('ds_role') ?></label>
									<span class="ds_2">2000</span><?= $this->lang->line('character') ?>
									<a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('role-tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
									<div>
									<input id="ds_txt_1" type="text" name="validator_name" class="form-control input-md" onkeyup = "limite_textarea(this.value, 'ds_2')" maxlength="2000" oninput="eylem(this, this.value)" required="false">
									</div>
								</div>

								<div class=" col-lg-6 form-group">
									<label for="function"><?= $this->lang->line('ds_function') ?></label>
									<span class="ds_3">2000</span><?= $this->lang->line('character') ?>
									<a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('function-tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
									<div>
									<input id="ds_txt_1" type="text" name="validator_name" class="form-control input-md" onkeyup = "limite_textarea(this.value, 'ds_3')" maxlength="2000" oninput="eylem(this, this.value)" required="false">
									</div>
								</div>

								<div class=" col-lg-6 form-group">
									<label for="validation_date"><?= $this->lang->line('ds_validation_date') ?></label>
									<a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('validation_date-tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
									<div>
										<input id="validation_date" type="date" name="validation_date" class="form-control input-md">
									</div>
								</div>


								<div class="col-lg-12 form-group">
									<label for="comments"><?= $this->lang->line('ds_comments') ?></label>
									<span class="ds_4">2000</span><?= $this->lang->line('character') ?>
									<a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('ds_comments_tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
									<div>
									<textarea onkeyup="limite_textarea(this.value, 'ds_4')" id="ds_txt_4" maxlength="2000" oninput="eylem(this, this.value)" class="form-control elasticteste" name="comments"></textarea>
									</div>
								</div>

								<div class="col-lg-12">
									<button id="delivery_acceptance_term-submit" type="submit" value="Save" class="btn btn-lg btn-success pull-right">
										<i class="glyphicon glyphicon-ok"></i> <?= $this->lang->line('btn-save') ?>
									</button>
							</form>
							<form action="<?php echo base_url('integration/deliverable-status/list/'); ?><?php echo $project_id; ?>">
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
	for (var i = 1; i <= 11; i++) {
		if (document.getElementById("cr_tp_" + i).title == "") {
			document.getElementById("cr_tp_" + i).hidden = true;
		}
		limite_textarea(document.getElementById("cr_txt_" + i).value, "cr_" + i);
	}

	function limite_textarea(valor, txt) {
		var limite = 2000;
		var caracteresDigitados = valor.length;
		var caracteresRestantes = limite - caracteresDigitados;
		$("." + txt).text(caracteresRestantes);
	}
  </script>

<?php $this->load->view('frame/footer_view') ?>