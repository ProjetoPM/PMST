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

								<?= $this->lang->line('qr-title')  ?>

							</h1>

							<form method="POST" action="<?php echo base_url('quality/quality-reports/insert/'); ?><?php echo $project_id; ?>">
								<input type="hidden" id="project_id" name="project_id" value="<?php echo $project_id; ?>">

								<div class=" col-lg-6 form-group">
									<label for="responsible"><?= $this->lang->line('qr-responsible') ?></label>
									<a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('responsible-tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
									<div>
										<input id="responsible" type="text" name="responsible" class="form-control input-md">
									</div>
								</div>

								<div class=" col-lg-6 form-group">
									<label for=""><?= $this->lang->line('qr-identifier') ?></label>
									<a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('responsible-tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
									<div>
										<input type="text" name="identifier" class="form-control input-md">
									</div>
								</div>

								<div class=" col-lg-9 form-group">
									<label for=""><?= $this->lang->line('qr-type') ?></label>
									<a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('responsible-tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
									<div>
										<input type="text" name="type" class="form-control input-md">
									</div>
								</div>

								<div class=" col-lg-3 form-group">
									<label for="date"><?= $this->lang->line('qr-date') ?></label>
									<a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('date-tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
									<div>
										<input id="date" type="date" name="date" class="form-control input-md">
									</div>
								</div>

								<div class="col-lg-12 form-group">
									<label for=""><?= $this->lang->line('qr-description') ?></label>
									<a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('main_activities-tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
									<div>
										<textarea oninput="eylem(this, this.value)" class="form-control elasticteste"  name="description"></textarea>
									</div>
								</div>

								<div class="col-lg-12 form-group">
									<label for=""><?= $this->lang->line('qr-areas') ?></label>
									<a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('next_activities-tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
									<div>
										<textarea oninput="eylem(this, this.value)" class="form-control elasticteste"  name="areas"></textarea>
									</div>
								</div>

								<div class="col-lg-12 form-group">
									<label for=""><?= $this->lang->line('qr-deliveries') ?></label>
									<a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('comments-tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
									<div>
										<textarea oninput="eylem(this, this.value)" class="form-control elasticteste" name="deliveries"></textarea>
									</div>
								</div>

								<div class="col-lg-12 form-group">
									<label for=""><?= $this->lang->line('qr-recommendations') ?></label>
									<a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('issues-tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
									<div>
										<textarea oninput="eylem(this, this.value)" class="form-control elasticteste" name="recommendations"></textarea>
									</div>
								</div>

								<div class="col-lg-12 form-group">
									<label for=""><?= $this->lang->line('qr-corrective_actions') ?></label>
									<a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('changes-tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
									<div>
										<textarea oninput="eylem(this, this.value)" class="form-control elasticteste" name="corrective_actions"></textarea>
									</div>
								</div>

								<div class="col-lg-12 form-group">
									<label for=""><?= $this->lang->line('qr-manager_opinion') ?></label>
									<a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('risks-tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
									<div>
										<textarea oninput="eylem(this, this.value)" class="form-control elasticteste" name="manager_opinion"></textarea>
									</div>
								</div>

								<div class="col-lg-12 form-group">
									<label for=""><?= $this->lang->line('qr-conclusions') ?></label>
									<a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('attention_points-tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
									<div>
										<textarea oninput="eylem(this, this.value)" class="form-control elasticteste" name="conclusions"></textarea>
									</div>
								</div>


								<div class="col-lg-12">
									<button id="quality_reports-submit" type="submit" value="Save" class="btn btn-lg btn-success pull-right">
										<i class="glyphicon glyphicon-ok"></i> <?= $this->lang->line('btn-save') ?>
									</button>
							</form>
							<form action="<?php echo base_url('quality/quality-reports/list/'); ?><?php echo $project_id; ?>">
								<button class="btn btn-lg btn-info pull-left"> <i class="glyphicon glyphicon-chevron-left"></i> <?= $this->lang->line('btn-back') ?></button>
							</form>
						</div>
					</div>
				</div>
			</section>
		</div>
	</div>
</body>
<?php $this->load->view('frame/footer_view') ?>