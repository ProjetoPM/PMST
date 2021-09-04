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
							<?php extract($quality_reports); ?>

							<form method="POST" action="<?php echo base_url('quality/quality-reports/update/'); ?><?php echo $quality_reports_id; ?>">
								<input type="hidden" id="project_id" name="project_id" value="<?php echo $project_id; ?>">

								<div class=" col-lg-6 form-group">
									<label for="responsible"><?= $this->lang->line('responsible') ?></label>
									<a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('responsible-tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
									<div>
										<input id="responsible" type="text" name="responsible" value="<?php echo $responsible; ?>" class="form-control input-md">
									</div>
								</div>

								<div class=" col-lg-6 form-group">
									<label for=""><?= $this->lang->line('identifier') ?></label>
									<a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('responsible-tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
									<div>
										<input type="text" name="identifier" class="form-control input-md" value="<?php echo $identifier; ?>">
									</div>
								</div>

								<div class=" col-lg-10 form-group">
									<label for=""><?= $this->lang->line('type') ?></label>
									<a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('responsible-tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
									<div>
										<input type="text" name="type" class="form-control input-md" value="<?php echo $type; ?>">
									</div>
								</div>

								<div class=" col-lg-2 form-group">
									<label for="date"><?= $this->lang->line('date') ?></label>
									<a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('date-tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
									<div>
										<input id="date" type="date" name="date" class="form-control input-md" value="<?php echo $date; ?>">
									</div>
								</div>

								<div class="col-lg-12 form-group">
									<label for=""><?= $this->lang->line('description') ?></label>
									<a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('main_activities-tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
									<div>
										<textarea oninput="eylem(this, this.value)" class="form-control elasticteste"  name="description"> <?php echo $description; ?></textarea>
									</div>
								</div>

								<div class="col-lg-12 form-group">
									<label for=""><?= $this->lang->line('areas') ?></label>
									<a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('next_activities-tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
									<div>
										<textarea oninput="eylem(this, this.value)" class="form-control elasticteste"  name="areas"><?php echo $areas; ?></textarea>
									</div>
								</div>

								<div class="col-lg-12 form-group">
									<label for=""><?= $this->lang->line('deliveries') ?></label>
									<a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('comments-tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
									<div>
										<textarea oninput="eylem(this, this.value)" class="form-control elasticteste" name="deliveries"><?php echo $deliveries; ?></textarea>
									</div>
								</div>

								<div class="col-lg-12 form-group">
									<label for=""><?= $this->lang->line('recommendations') ?></label>
									<a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('issues-tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
									<div>
										<textarea oninput="eylem(this, this.value)" class="form-control elasticteste" name="recommendations"><?php echo $recommendations; ?></textarea>
									</div>
								</div>

								<div class="col-lg-12 form-group">
									<label for=""><?= $this->lang->line('corrective_actions') ?></label>
									<a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('changes-tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
									<div>
										<textarea oninput="eylem(this, this.value)" class="form-control elasticteste" name="corrective_actions"><?php echo $corrective_actions; ?></textarea>
									</div>
								</div>

								<div class="col-lg-12 form-group">
									<label for=""><?= $this->lang->line('manager_opinion') ?></label>
									<a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('risks-tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
									<div>
										<textarea oninput="eylem(this, this.value)" class="form-control elasticteste" name="manager_opinion"><?php echo $manager_opinion; ?></textarea>
									</div>
								</div>

								<div class="col-lg-12 form-group">
									<label for=""><?= $this->lang->line('conclusions') ?></label>
									<a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('attention_points-tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
									<div>
										<textarea oninput="eylem(this, this.value)" class="form-control elasticteste" name="conclusions"><?php echo $conclusions; ?></textarea>
									</div>
								</div>

								<div class="col-lg-12">
									<button id="work_performance_report-submit" type="submit" value="Save" class="btn btn-lg btn-success pull-right">
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