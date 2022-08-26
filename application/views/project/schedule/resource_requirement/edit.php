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

				<?php extract($resource_requirement); ?>

				<div class="row">
					<div class="col-lg-12">
						<div class="panel-body">
							<h1 class="page-header">

								<?= $this->lang->line('rr_title')  ?>
								<?php $view_name = "resource requirements" ?>
								<?php $this->load->view('construction_services/rating', array(
									"view_name" => $view_name,
								)) ?>
							</h1>

							<!-- avaliação -->
							<link href="<?= base_url() ?>assets/css/field_evaluation.css" rel="stylesheet" type="text/css">
							<?php
							getViewFields($view_name);
							?>
							<?php $this->load->view('construction_services/write_field_evaluation') ?>

							<form action="<?= base_url() ?>schedule/resource-requirements/update/<?= $resource_requirement[0]->resource_requirements_id; ?>" method="post">

								<input type="hidden" id="project_id" name="project_id" value="<?= $resource_requirement[0]->project_id; ?>">
								<!-- Textarea -->
								<ul class="abas">
									<!-- Aqui, criação da primeira aba -->

									<div class="col-lg-12 form-group">
										<label for="name"><?= $this->lang->line('activity_name') ?></label>
										<div>
											<input id="name_text" name="name" type="text" class="form-control input-md" required="false" value="<?= $resource_requirement[0]->activity_name; ?>" disabled>
										</div>
									</div>

									<div class=" col-lg-4 form-group">
										<label for="required_amount_of_resource"><?= $this->lang->line('required_amount_of_resource') ?></label>
										<a class="btn-sm btn-default" id="rr_tp_2" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('required_amount_of_resource_tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
										<a <?= fieldStatus($view_name, $resource_requirement[0]->resource_requirements_id, "required_amount_of_resource") ?> data-field="required_amount_of_resource" data-field_name="<?= $this->lang->line('required_amount_of_resource') ?>" data-item_id="<?= $resource_requirement[0]->resource_requirements_id ?>" data-view="<?= $view_name ?>" data-toggle="modal" data-placement="left" data-target="#write-evaluation" data-tt="tooltip"><i class="glyphicon glyphicon-list-alt"></i></a>
										<div>
											<input id="required_amount_of_resource" type="number" name="required_amount_of_resource" class="form-control input-md" value="<?= $resource_requirement[0]->resource_amount; ?>">
										</div>
									</div>

									<div class="col-lg-12">
										<button id="activity-submit" type="submit" value="Save" class="btn btn-lg btn-success pull-right">
											<i class="glyphicon glyphicon-ok"></i> <?= $this->lang->line('btn-save') ?>
										</button>
							</form>

							<form action="<?= base_url('schedule/resource-requirements/list/'); ?><?= $resource_requirement[0]->project_id; ?>">
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