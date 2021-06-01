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

				<?php extract($activity); ?>

				<div class="row">
					<div class="col-lg-12">
						<div class="panel-body">
							<h1 class="page-header">

								<?= $this->lang->line('pca_title')  ?>

							</h1>
							<form action="<?= base_url() ?>schedule/project-calendars/update/<?php echo $id; ?>" method="post">

								<input type="hidden" id="project_id" name="project_id" value="<?php echo $project_id; ?>">
								<!-- Textarea -->
								<ul class="abas">
									<!-- Aqui, criação da primeira aba -->

									<div class="col-lg-12 form-group">
										<label for="name"><?= $this->lang->line('activity_name') ?></label>
										<div>
											<input id="name_text" name="name" type="text" class="form-control input-md" required="false" value="<?php echo $activity_name; ?>" disabled>
										</div>
									</div>

									<div class=" col-lg-8 form-group">
										<label for="resource_name"><?= $this->lang->line('pca_resource_name') ?></label>
										<span class="pca_1">2000</span><?= $this->lang->line('character') ?>
										<a class="btn-sm btn-default" id = "pca_tp_1" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('pca_resource_name_tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
										<div>
										<input id="pca_txt_1" type="text" name="resource_name" class="form-control input-md" onkeyup = "limite_textarea(this.value, 'pca_1')" maxlength="2000" oninput="eylem(this, this.value)" required="false" value="<?php echo $resource_name; ?>">
										</div>
									</div>

									<div class=" col-lg-4 form-group">
										<label for="function"><?= $this->lang->line('pca_function') ?></label>
										<span class="pca_2">2000</span><?= $this->lang->line('character') ?>
										<a class="btn-sm btn-default" id = "pca_tp_2" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('pca_function_tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
										<div>
										<input id="pca_txt_2" type="text" name="function" class="form-control input-md" onkeyup = "limite_textarea(this.value, 'pca_2')" maxlength="2000" oninput="eylem(this, this.value)" required="false" value="<?php echo $function; ?>">
										</div>
									</div>

									<div class=" col-lg-3 form-group">
										<label for="availability_start"><?= $this->lang->line('pca_availability_start') ?></label>
										
										<a class="btn-sm btn-default" id = "pca_tp_3" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('pca_availability_start_tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
										<div>
											<input id="availability_start" type="date" name="availability_start" class="form-control input-md" value="<?php echo $availability_start; ?>">
										</div>
									</div>

									<div class=" col-lg-3 form-group">
										<label for="availability_ends"><?= $this->lang->line('pca_availability_ends') ?></label>
										
										<a class="btn-sm btn-default" id = "pca_tp_4" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('pca_availability_ends_tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
										<div>
											<input id="availability_ends" type="date" name="availability_ends" class="form-control input-md" value="<?php echo $availability_ends; ?>">
										</div>
									</div>

									<div class=" col-lg-3 form-group">
										<label for="allocation_start"><?= $this->lang->line('pca_allocation_start') ?></label>
										<a class="btn-sm btn-default" id = "pca_tp_5" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('pca_allocation_start_tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
										<div>
											<input id="allocation_start" type="date" name="allocation_start" class="form-control input-md" value="<?php echo $allocation_start; ?>">
										</div>
									</div>

									<div class=" col-lg-3 form-group">
										<label for="allocation_ends"><?= $this->lang->line('pca_allocation_ends') ?></label>
										<a class="btn-sm btn-default" id = "pca_tp_6" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('pca_allocation_ends_tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
										<div>
											<input id="allocation_ends" type="date" name="allocation_ends" class="form-control input-md" value="<?php echo $allocation_ends; ?>">
										</div>
									</div>


									<div class="col-lg-12">
										<button id="activity-submit" type="submit" value="Save" class="btn btn-lg btn-success pull-right">
											<i class="glyphicon glyphicon-ok"></i> <?= $this->lang->line('btn-save') ?>
										</button>
							</form>

							<form action="<?php echo base_url('schedule/project-calendars/list/'); ?><?php echo $project_id; ?>">
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
		if (document.getElementById("pca_tp_"+i).title == "") {
			document.getElementById("pca_tp_"+i).hidden = true;
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