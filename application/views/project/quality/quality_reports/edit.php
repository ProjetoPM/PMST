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
							<!-- avaliação -->
							<link href="<?= base_url() ?>assets/css/field_evaluation.css" rel="stylesheet" type="text/css">
							<?php $view_name = "quality reports";
							getViewFields($view_name);
							?>
							<?php $this->load->view('construction_services/write_field_evaluation') ?>

							<?php extract($quality_reports); ?>

							<form method="POST" action="<?php echo base_url('quality/quality-reports/update/'); ?><?php echo $quality_reports_id; ?>">
								<input type="hidden" id="project_id" name="project_id" value="<?php echo $project_id; ?>">

								<div class=" col-lg-6 form-group">
									<label for="responsible"><?= $this->lang->line('qr-responsible') ?></label>
									<a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('responsible-tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
									<a <?= fieldStatus($view_name, $quality_reports_id, "responsible") ?> data-field="responsible" data-field_name="<?= $this->lang->line('qr-responsible') ?>" data-item_id="<?= $quality_reports_id ?>" data-view="<?= $view_name ?>" data-toggle="modal" data-placement="left" data-target="#write-evaluation" data-tt="tooltip"><i class="glyphicon glyphicon-list-alt"></i></a>
									<div>
										<input id="responsible" type="text" name="responsible" value="<?php echo $responsible; ?>" class="form-control input-md">
									</div>
								</div>

								<div class=" col-lg-6 form-group">
									<label for=""><?= $this->lang->line('qr-identifier') ?></label>
									<a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('responsible-tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
									<a <?= fieldStatus($view_name, $quality_reports_id, "identifier") ?> data-field="identifier" data-field_name="<?= $this->lang->line('qr-identifier') ?>" data-item_id="<?= $quality_reports_id ?>" data-view="<?= $view_name ?>" data-toggle="modal" data-placement="left" data-target="#write-evaluation" data-tt="tooltip"><i class="glyphicon glyphicon-list-alt"></i></a>
									<div>
										<input type="text" name="identifier" class="form-control input-md" value="<?php echo $identifier; ?>">
									</div>
								</div>

								<div class=" col-lg-9 form-group">
									<label for=""><?= $this->lang->line('qr-type') ?></label>
									<a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('responsible-tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
									<a <?= fieldStatus($view_name, $quality_reports_id, "type") ?> data-field="type" data-field_name="<?= $this->lang->line('qr-type') ?>" data-item_id="<?= $quality_reports_id ?>" data-view="<?= $view_name ?>" data-toggle="modal" data-placement="left" data-target="#write-evaluation" data-tt="tooltip"><i class="glyphicon glyphicon-list-alt"></i></a>
									<div>
										<input type="text" name="type" class="form-control input-md" value="<?php echo $type; ?>">
									</div>
								</div>

								<div class=" col-lg-3 form-group">
									<label for="date"><?= $this->lang->line('qr-date') ?></label>
									<a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('date-tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
									<a <?= fieldStatus($view_name, $quality_reports_id, "date") ?> data-field="date" data-field_name="<?= $this->lang->line('qr-date') ?>" data-item_id="<?= $quality_reports_id ?>" data-view="<?= $view_name ?>" data-toggle="modal" data-placement="left" data-target="#write-evaluation" data-tt="tooltip"><i class="glyphicon glyphicon-list-alt"></i></a>
									<div>
										<input id="date" type="date" name="date" class="form-control input-md" value="<?php echo $date; ?>">
									</div>
								</div>

								<div class="col-lg-12 form-group">
									<label for=""><?= $this->lang->line('qr-description') ?></label>
									<a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('main_activities-tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
									<a <?= fieldStatus($view_name, $quality_reports_id, "description") ?> data-field="description" data-field_name="<?= $this->lang->line('qr-description') ?>" data-item_id="<?= $quality_reports_id ?>" data-view="<?= $view_name ?>" data-toggle="modal" data-placement="left" data-target="#write-evaluation" data-tt="tooltip"><i class="glyphicon glyphicon-list-alt"></i></a>
									<div>
										<textarea oninput="eylem(this, this.value)" class="form-control elasticteste"  name="description"> <?php echo $description; ?></textarea>
									</div>
								</div>

								<div class="col-lg-12 form-group">
									<label for=""><?= $this->lang->line('qr-areas') ?></label>
									<a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('next_activities-tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
									<a <?= fieldStatus($view_name, $quality_reports_id, "areas") ?> data-field="areas" data-field_name="<?= $this->lang->line('qr-areas') ?>" data-item_id="<?= $quality_reports_id ?>" data-view="<?= $view_name ?>" data-toggle="modal" data-placement="left" data-target="#write-evaluation" data-tt="tooltip"><i class="glyphicon glyphicon-list-alt"></i></a>
									<div>
										<textarea oninput="eylem(this, this.value)" class="form-control elasticteste"  name="areas"><?php echo $areas; ?></textarea>
									</div>
								</div>

								<div class="col-lg-12 form-group">
									<label for=""><?= $this->lang->line('qr-deliveries') ?></label>
									<a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('comments-tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
									<a <?= fieldStatus($view_name, $quality_reports_id, "deliveries") ?> data-field="deliveries" data-field_name="<?= $this->lang->line('qr-deliveries') ?>" data-item_id="<?= $quality_reports_id ?>" data-view="<?= $view_name ?>" data-toggle="modal" data-placement="left" data-target="#write-evaluation" data-tt="tooltip"><i class="glyphicon glyphicon-list-alt"></i></a>
									<div>
										<textarea oninput="eylem(this, this.value)" class="form-control elasticteste" name="deliveries"><?php echo $deliveries; ?></textarea>
									</div>
								</div>

								<div class="col-lg-12 form-group">
									<label for=""><?= $this->lang->line('qr-recommendations') ?></label>
									<a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('issues-tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
									<a <?= fieldStatus($view_name, $quality_reports_id, "recommendations") ?> data-field="recommendations" data-field_name="<?= $this->lang->line('qr-recommendations') ?>" data-item_id="<?= $quality_reports_id ?>" data-view="<?= $view_name ?>" data-toggle="modal" data-placement="left" data-target="#write-evaluation" data-tt="tooltip"><i class="glyphicon glyphicon-list-alt"></i></a>
									<div>
										<textarea oninput="eylem(this, this.value)" class="form-control elasticteste" name="recommendations"><?php echo $recommendations; ?></textarea>
									</div>
								</div>

								<div class="col-lg-12 form-group">
									<label for=""><?= $this->lang->line('qr-corrective_actions') ?></label>
									<a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('changes-tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
									<a <?= fieldStatus($view_name, $quality_reports_id, "corrective_actions") ?> data-field="corrective_actions" data-field_name="<?= $this->lang->line('qr-corrective_actions') ?>" data-item_id="<?= $quality_reports_id ?>" data-view="<?= $view_name ?>" data-toggle="modal" data-placement="left" data-target="#write-evaluation" data-tt="tooltip"><i class="glyphicon glyphicon-list-alt"></i></a>
									<div>
										<textarea oninput="eylem(this, this.value)" class="form-control elasticteste" name="corrective_actions"><?php echo $corrective_actions; ?></textarea>
									</div>
								</div>

								<div class="col-lg-12 form-group">
									<label for=""><?= $this->lang->line('qr-manager_opinion') ?></label>
									<a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('risks-tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
									<a <?= fieldStatus($view_name, $quality_reports_id, "manager_opinion") ?> data-field="manager_opinion" data-field_name="<?= $this->lang->line('qr-manager_opinion') ?>" data-item_id="<?= $quality_reports_id ?>" data-view="<?= $view_name ?>" data-toggle="modal" data-placement="left" data-target="#write-evaluation" data-tt="tooltip"><i class="glyphicon glyphicon-list-alt"></i></a>
									<div>
										<textarea oninput="eylem(this, this.value)" class="form-control elasticteste" name="manager_opinion"><?php echo $manager_opinion; ?></textarea>
									</div>
								</div>

								<div class="col-lg-12 form-group">
									<label for=""><?= $this->lang->line('qr-conclusions') ?></label>
									<a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('attention_points-tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
									<a <?= fieldStatus($view_name, $quality_reports_id, "conclusions") ?> data-field="conclusions" data-field_name="<?= $this->lang->line('qr-conclusions') ?>" data-item_id="<?= $quality_reports_id ?>" data-view="<?= $view_name ?>" data-toggle="modal" data-placement="left" data-target="#write-evaluation" data-tt="tooltip"><i class="glyphicon glyphicon-list-alt"></i></a>
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