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
							<form action="<?= base_url() ?>schedule/resource-requirements/insert/<?= $_SESSION['project_id']; ?>" method="post">

									<div class="col-lg-6 form-group">
										<label>Activity</label>
										<select name="activity_id" size="1" class="form-control" tabindex="1">
										<option selected disabled value=""> Select </option>	
										<?php foreach ($activities as $t) { ?>
												<option  value="<?= $t->id; ?>">
													<?= $t->activity_name; ?></option>
											<?php  } ?>
										</select>
									</div>

									<div class="col-lg-6 form-group">
										<label>Resource</label>
										<select name="resource_id" size="1" class="form-control" tabindex="1">
										<option selected disabled value=""> Select </option>	
										<?php foreach ($resources as $r): ?> 
												<option  value="<?= $r->resource_id; ?>">
													<?= $r->resource_name; ?></option>
											<?php endforeach ?>
										</select>
									</div>

									<div class="col-lg-6 form-group">
										<label for="required_amount_of_resource"><?= $this->lang->line('required_amount_of_resource') ?></label>
										<a class="btn-sm btn-default" id="rr_tp_2" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('rr_required_amount_of_resource_tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
										<div>
											<input id="required_amount_of_resource" type="number" name="required_amount_of_resource" class="form-control input-md" >
										</div>
									</div>

									<div class="col-lg-12">
										<button id="activity-submit" type="submit" value="Save" class="btn btn-lg btn-success pull-right">
											<i class="glyphicon glyphicon-ok"></i> <?= $this->lang->line('btn-save') ?>
										</button>
							</form>

							<form action="<?php echo base_url('schedule/resource-requirements/list/'); ?><?php echo $_SESSION['project_id']; ?>">
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