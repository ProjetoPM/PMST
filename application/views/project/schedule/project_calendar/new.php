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

								<?= $this->lang->line('pca-title')  ?>

							</h1>
							<form action="<?= base_url() ?>schedule/project-calendars/insert" method="post">

								<div class="col-lg-6 form-group">
									<label>Activity</label>
									<select name="activity_id" size="1" required class="form-control" tabindex="1">
									<option selected disabled value=""> Select </option>	
									<?php foreach ($activities as $t) { ?>
											<option value="<?= $t->id; ?>">
												<?= $t->activity_name; ?></option>
										<?php  } ?>
									</select>
								</div>

								<div class="col-lg-6 form-group">
									<label>Stakeholder</label>
									<select name="stakeholder_id" size="1" required class="form-control" tabindex="1">
									<option selected disabled value=""> Select </option>	
									<?php foreach ($stakeholders as $s) { ?>
											<option value="<?= $s->stakeholder_id; ?>">
												<?= $s->name . " | " . getStakeholderRole($s->role);  ?></option>
										<?php  } ?>
									</select>
								</div>

								<div class=" col-lg-6 form-group">
									<label for="allocation_start"><?= $this->lang->line('pca-allocation_start') ?></label>
									<a class="btn-sm btn-default" id = "pca_tp_5" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('pca-allocation_start-tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
									<div>
										<input id="allocation_start" type="date" name="allocation_start" class="form-control input-md">
									</div>
								</div>

								<div class=" col-lg-6 form-group">
									<label for="allocation_ends"><?= $this->lang->line('pca-allocation_ends') ?></label>
									<a class="btn-sm btn-default" id = "pca_tp_6" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('pca-allocation_ends-tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
									<div>
										<input id="allocation_ends" type="date" name="allocation_ends" class="form-control input-md">
									</div>
								</div>


								<div class="col-lg-12">
									<button id="activity-submit" type="submit" value="Save" class="btn btn-lg btn-success pull-right">
										<i class="glyphicon glyphicon-ok"></i> <?= $this->lang->line('btn-save') ?>
									</button>
								</div>
							</form>

							<form action="<?php echo base_url('schedule/project-calendars/list/'); ?><?php echo $_SESSION['project_id']; ?>">
								<button class="btn btn-lg btn-info pull-left"> <i class="glyphicon glyphicon-chevron-left"></i> <?= $this->lang->line('btn-back') ?></button>
							</form>
						</div>
					</div>
				</div>
			</section>
		</div>
	</div>
</body>
<script>
	for (var i = 1; i <= 6; i++) {
		if (document.getElementById("pca_tp_" + i).title == "") {
			document.getElementById("pca_tp_" + i).hidden = true;
		}
		limite_textarea(document.getElementById("pca_txt_" + i).value, "pca_" + i);
	}

	function limite_textarea(valor, txt) {
		var limite = 2000;
		var caracteresDigitados = valor.length;
		var caracteresRestantes = limite - caracteresDigitados;
		$("." + txt).text(caracteresRestantes);
	}
</script>
<?php $this->load->view('frame/footer_view') ?>