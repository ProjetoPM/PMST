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

								<?= $this->lang->line('rr_title')  ?>

							</h1>
							<form action="<?= base_url() ?>schedule/resource/insert" method="post">
									<div class=" col-lg-6 form-group">
										<label for="resource_name"><?= $this->lang->line('resource_name') ?></label>
										<a class="btn-sm btn-default" id="rr_tp_1" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('rr_resource_name_tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
										<div>
											<input id="resource_name" name="resource_name" class="form-control input-md" >
										</div>
									</div>

                                    <div class=" col-lg-6 form-group">
                                        <label for="resource_description"><?= $this->lang->line('resource_description') ?></label>
                                        <a class="btn-sm btn-default" id="rr_tp_1" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('rr_resource_description_tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
                                        <div>
                                            <input id="resource_description" name="resource_description" class="form-control input-md" >
                                        </div>
                                    </div>

									<div class=" col-lg-3 form-group">
										<label for="resource_cost_per_unit"><?= $this->lang->line('resource_cost_per_unit') ?></label>
										<a class="btn-sm btn-default" id="rr_tp_3" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('rr_resource_cost_per_unit_tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
										<div>
											<input id="resource_cost_per_unit" name="resource_cost_per_unit" type="number" min="0.00" max="10000.00" class="form-control input-md" >
										</div>
									</div>

									<div class=" col-lg-9 form-group">
										<label for="resource_type"><?= $this->lang->line('resource_type') ?></label>
										<span class="rr_4">2000</span><?= $this->lang->line('character') ?>
										<a class="btn-sm btn-default" id="rr_tp_4" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('rr_resource_type_tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
										<div>
										<input id="rr_txt_4" type="text" name="resource_type" class="form-control input-md" onkeyup = "limite_textarea(this.value, 'rr_4')" maxlength="2000" oninput="eylem(this, this.value)" required="false" >
										</div>
									</div>

									<div class="col-lg-12">
										<button id="activity-submit" type="submit" value="Save" class="btn btn-lg btn-success pull-right">
											<i class="glyphicon glyphicon-ok"></i> <?= $this->lang->line('btn-save') ?>
										</button>
							</form>

							<form action="<?php echo base_url('schedule/resource-requirements/list/'); ?><?php echo $_SESSION['project_id'] ?>">
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
	for (var i = 1; i <= 4; i++) {
		if (document.getElementById("rr_tp_" + i).title == "") {
			document.getElementById("rr_tp_" + i).hidden = true;
		}
		limite_textarea(document.getElementById("rr_txt_" + i).value, "rr_" + i);
	}

	function limite_textarea(valor, txt) {
		var limite = 2000;
		var caracteresDigitados = valor.length;
		var caracteresRestantes = limite - caracteresDigitados;
		$("." + txt).text(caracteresRestantes);
	}
  </script>
<?php $this->load->view('frame/footer_view') ?>