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

								<?= $this->lang->line('ce_title')  ?>

							</h1>

							<!-- avaliação -->
							<link href="<?= base_url() ?>assets/css/field_evaluation.css" rel="stylesheet" type="text/css">
							<?php $view_name = "cost estimates";
							getViewFields($view_name);
							?>
							<?php $this->load->view('construction_services/write_field_evaluation') ?>

							<form action="<?= base_url() ?>cost/cost-estimates/update/<?php echo $id; ?>" method="post">

								<input type="hidden" id="project_id" name="project_id" value="<?php echo $project_id; ?>">
								<!-- Textarea -->
									<!-- Aqui, criação da primeira aba -->

									<div class="col-lg-12 form-group">
										<label for="name"><?= $this->lang->line('activity_name') ?></label>
										<div>
											<input id="name_text" name="name" type="text" class="form-control input-md" required="false" value="<?php echo $activity_name; ?>" disabled>
										</div>
									</div>


									<div class=" col-lg-4 form-group">
										<label for="estimated_cost"><?= $this->lang->line('ce_estimated_cost') ?></label>
										<a class="btn-sm btn-default" id ="ce_tp_1" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('ce_estimated_cost_tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
										<a <?= fieldStatus($view_name, $id, "estimated_cost") ?> data-field="estimated_cost" data-field_name="<?= $this->lang->line('ce_estimated_cost_tp') ?>" data-item_id="<?= $id ?>" data-view="<?= $view_name ?>" data-toggle="modal" data-placement="left" data-target="#write-evaluation" data-tt="tooltip"><i class="glyphicon glyphicon-list-alt"></i></a>
										<div>
											<input id="estimated_cost" name="estimated_cost" type="number" min="0.00" max="10000.00" step="0.01" class="form-control input-md" value="<?php echo $estimated_cost; ?>">
										</div>
									</div>

									<div class=" col-lg-4 form-group">
										<label for="cumulative_estimated_cost"><?= $this->lang->line('ce_cumulative_estimated_cost') ?></label>
										<a class="btn-sm btn-default" id ="ce_tp_2" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('ce_estimated_cost_tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
										<a <?= fieldStatus($view_name, $id, "cumulative_estimated_cost") ?> data-field="cumulative_estimated_cost" data-field_name="<?= $this->lang->line('ce_cumulative_estimated_cost') ?>" data-item_id="<?= $id ?>" data-view="<?= $view_name ?>" data-toggle="modal" data-placement="left" data-target="#write-evaluation" data-tt="tooltip"><i class="glyphicon glyphicon-list-alt"></i></a>
										<div>
											<input id="cumulative_estimated_cost" name="cumulative_estimated_cost" type="number" min="0.00" max="10000.00" step="0.01" class="form-control input-md" value="<?php echo $cumulative_estimated_cost; ?>">
										</div>
									</div>

									<div class=" col-lg-4 form-group">
										<label for="replanted_cost"><?= $this->lang->line('ce_replanted_cost') ?></label>
										<a class="btn-sm btn-default" id ="ce_tp_3" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('ce_replanted_cost_tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
										<a <?= fieldStatus($view_name, $id, "replanted_cost") ?> data-field="replanted_cost" data-field_name="<?= $this->lang->line('ce_replanted_cost') ?>" data-item_id="<?= $id ?>" data-view="<?= $view_name ?>" data-toggle="modal" data-placement="left" data-target="#write-evaluation" data-tt="tooltip"><i class="glyphicon glyphicon-list-alt"></i></a>
										<div>
											<input id="replanted_cost" name="replanted_cost" type="number" min="0.00" max="10000.00" step="0.01" class="form-control input-md" value="<?php echo $replanted_cost; ?>">
										</div>
									</div>

									<div class=" col-lg-4 form-group">
										<label for="contingency_reserve"><?= $this->lang->line('ce_contingency_reserve') ?></label>
										<a class="btn-sm btn-default" id ="ce_tp_4" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('ce_contingency_reserve_tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
										<a <?= fieldStatus($view_name, $id, "contingency_reserve") ?> data-field="contingency_reserve" data-field_name="<?= $this->lang->line('ce_contingency_reserve') ?>" data-item_id="<?= $id ?>" data-view="<?= $view_name ?>" data-toggle="modal" data-placement="left" data-target="#write-evaluation" data-tt="tooltip"><i class="glyphicon glyphicon-list-alt"></i></a>
										<div>
											<input id="contingency_reserve" name="contingency_reserve" type="number" min="0.00" max="10000.00" step="0.01" class="form-control input-md" value="<?php echo $contingency_reserve; ?>">
										</div>
									</div>

									<div class=" col-lg-4 form-group">
										<label for="sum_of_work_packages"><?= $this->lang->line('ce_sum_of_work_packages') ?></label>
										<a class="btn-sm btn-default" id ="ce_tp_5" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('ce_sum_of_work_packages_tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
										<a <?= fieldStatus($view_name, $id, "sum_of_work_packages") ?> data-field="sum_of_work_packages" data-field_name="<?= $this->lang->line('ce_sum_of_work_packages') ?>" data-item_id="<?= $id ?>" data-view="<?= $view_name ?>" data-toggle="modal" data-placement="left" data-target="#write-evaluation" data-tt="tooltip"><i class="glyphicon glyphicon-list-alt"></i></a>
										<div>
											<input id="sum_of_work_packages" name="sum_of_work_packages" type="number" min="0.00" max="10000.00" step="0.01" class="form-control input-md" value="<?php echo $sum_of_work_packages; ?>">
										</div>
									</div>

									<div class=" col-lg-4 form-group">
										<label for="contingency_reserve_of_packages"><?= $this->lang->line('ce_contingency_reserve_of_packages') ?></label>
										<a class="btn-sm btn-default" id ="ce_tp_6" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('ce_contingency_reserve_of_packages_tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
										<a <?= fieldStatus($view_name, $id, "contingency_reserve_of_packages") ?> data-field="contingency_reserve_of_packages" data-field_name="<?= $this->lang->line('ce_contingency_reserve_of_packages') ?>" data-item_id="<?= $id ?>" data-view="<?= $view_name ?>" data-toggle="modal" data-placement="left" data-target="#write-evaluation" data-tt="tooltip"><i class="glyphicon glyphicon-list-alt"></i></a>
										<div>
											<input id="contingency_reserve_of_packages" name="contingency_reserve_of_packages" type="number" min="0.00" max="10000.00" step="0.01" class="form-control input-md" value="<?php echo $contingency_reserve_of_packages; ?>">
										</div>
									</div>

									<div class=" col-lg-4 form-group">
										<label for="baseline"><?= $this->lang->line('ce_baseline') ?></label>
										<a class="btn-sm btn-default" id ="ce_tp_7" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('ce_baseline_tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
										<a <?= fieldStatus($view_name, $id, "baseline") ?> data-field="baseline" data-field_name="<?= $this->lang->line('ce_baseline') ?>" data-item_id="<?= $id ?>" data-view="<?= $view_name ?>" data-toggle="modal" data-placement="left" data-target="#write-evaluation" data-tt="tooltip"><i class="glyphicon glyphicon-list-alt"></i></a>
										<div>
											<input id="baseline" name="baseline" type="number" min="0.00" max="10000.00" step="0.01" class="form-control input-md" value="<?php echo $baseline; ?>">
										</div>
									</div>

									<div class=" col-lg-4 form-group">
										<label for="budget"><?= $this->lang->line('ce_budget') ?></label>
										<a class="btn-sm btn-default" id ="ce_tp_8" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('ce_budget_tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
										<a <?= fieldStatus($view_name, $id, "budget") ?> data-field="budget" data-field_name="<?= $this->lang->line('ce_budget') ?>" data-item_id="<?= $id ?>" data-view="<?= $view_name ?>" data-toggle="modal" data-placement="left" data-target="#write-evaluation" data-tt="tooltip"><i class="glyphicon glyphicon-list-alt"></i></a>
										<div>
											<input id="budget" name="budget" type="number" min="0.00" max="10000.00" step="0.01" class="form-control input-md" value="<?php echo $budget; ?>">
										</div>
									</div>

									<div class=" col-lg-4 form-group">
										<label for="cumulative_replanted_cost"><?= $this->lang->line('ce_cumulative_replanted_cost') ?></label>
										<a class="btn-sm btn-default" id ="ce_tp_9" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('ce_cumulative_replanted_cost_tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
										<a <?= fieldStatus($view_name, $id, "cumulative_replanted_cost") ?> data-field="cumulative_replanted_cost" data-field_name="<?= $this->lang->line('ce_cumulative_replanted_cost') ?>" data-item_id="<?= $id ?>" data-view="<?= $view_name ?>" data-toggle="modal" data-placement="left" data-target="#write-evaluation" data-tt="tooltip"><i class="glyphicon glyphicon-list-alt"></i></a>
										<div>
											<input id="cumulative_replanted_cost" name="cumulative_replanted_cost" type="number" min="0.00" max="10000.00" step="0.01" class="form-control input-md" value="<?php echo $cumulative_replanted_cost; ?>">
										</div>
									</div>

									<div class=" col-lg-4 form-group">
										<label for="real_cost"><?= $this->lang->line('ce_real_cost') ?></label>
										<a class="btn-sm btn-default" id ="ce_tp_10" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('ce_real_cost_tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
										<a <?= fieldStatus($view_name, $id, "real_cost") ?> data-field="real_cost" data-field_name="<?= $this->lang->line('ce_real_cost') ?>" data-item_id="<?= $id ?>" data-view="<?= $view_name ?>" data-toggle="modal" data-placement="left" data-target="#write-evaluation" data-tt="tooltip"><i class="glyphicon glyphicon-list-alt"></i></a>
										<div>
											<input id="real_cost" name="real_cost" type="number" min="0.00" max="10000.00" step="0.01" class="form-control input-md" value="<?php echo $real_cost; ?>">
										</div>
									</div>

									<div class=" col-lg-4 form-group">
										<label for="cumulative_real_cost"><?= $this->lang->line('ce_cumulative_real_cost') ?></label>
										<a class="btn-sm btn-default" id ="ce_tp_11" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('ce_cumulative_real_cost_tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
										<a <?= fieldStatus($view_name, $id, "cumulative_real_cost") ?> data-field="cumulative_real_cost" data-field_name="<?= $this->lang->line('ce_cumulative_real_cost') ?>" data-item_id="<?= $id ?>" data-view="<?= $view_name ?>" data-toggle="modal" data-placement="left" data-target="#write-evaluation" data-tt="tooltip"><i class="glyphicon glyphicon-list-alt"></i></a>
										<div>
											<input id="" name="cumulative_real_cost" type="number" min="0.00" max="10000.00" step="0.01" class="form-control input-md" value="<?php echo $cumulative_real_cost; ?>">
										</div>
									</div>

									<div class=" col-lg-4 form-group">
										<label for="reserve"><?= $this->lang->line('ce_reserve') ?></label>
										<a class="btn-sm btn-default" id ="ce_tp_12" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('ce_reserve_tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
										<a <?= fieldStatus($view_name, $id, "reserve") ?> data-field="reserve" data-field_name="<?= $this->lang->line('ce_reserve') ?>" data-item_id="<?= $id ?>" data-view="<?= $view_name ?>" data-toggle="modal" data-placement="left" data-target="#write-evaluation" data-tt="tooltip"><i class="glyphicon glyphicon-list-alt"></i></a>
										<div>
											<input id="" name="reserve" type="number" min="0.00" max="10000.00" step="0.01" class="form-control input-md" value="<?php echo $reserve; ?>">
										</div>
									</div>


									<div class="col-lg-12">
										<button id="activity-submit" type="submit" value="Save" class="btn btn-lg btn-success pull-right">
											<i class="glyphicon glyphicon-ok"></i> <?= $this->lang->line('btn-save') ?>
										</button>
							</form>

							<form action="<?php echo base_url('cost/cost-estimates/list/'); ?><?php echo $project_id; ?>">
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
	for (var i = 1; i <= 12; i++) {
		if (document.getElementById("ce_tp_" + i).title == "") {
			document.getElementById("ce_tp_" + i).hidden = true;
		}
		
	}
</script>
<?php $this->load->view('frame/footer_view') ?>