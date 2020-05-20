<div id="page-wrapper">
	<div class="row">
		<div class="col-lg-12">
			<h1 class="page-header"> <?= $this->lang->line('cost_estimation_edit-title') ?></h1>
		</div>
		<!-- /.col-lg-12 -->
	</div>
	<!-- /.row -->

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
			<form action="<?= base_url() ?>Activity/updateCostEstimation/<?php echo $id; ?>" method="post">

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


					<div class=" col-lg-4 form-group">
						<label for="estimated_cost"><?= $this->lang->line('estimated_cost') ?></label>
						<a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('estimated_cost-tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
						<div>
							<input id="estimated_cost" name="resource_cost_per_unit" type="number" min="0.00" max="10000.00" step="0.01" class="form-control input-md" value="<?php echo $estimated_cost; ?>">
						</div>
					</div>

					<div class=" col-lg-4 form-group">
						<label for="cumulative_estimated_cost"><?= $this->lang->line('cumulative_estimated_cost') ?></label>
						<a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('estimated_cost-tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
						<div>
							<input id="cumulative_estimated_cost" name="cumulative_estimated_cost" type="number" min="0.00" max="10000.00" step="0.01" class="form-control input-md" value="<?php echo $cumulative_estimated_cost; ?>">
						</div>
					</div>

					<div class=" col-lg-4 form-group">
						<label for="replanted_cost"><?= $this->lang->line('replanted_cost') ?></label>
						<a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('replanted_cost-tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
						<div>
							<input id="replanted_cost" name="replanted_cost" type="number" min="0.00" max="10000.00" step="0.01" class="form-control input-md" value="<?php echo $replanted_cost; ?>">
						</div>
					</div>

					<div class=" col-lg-4 form-group">
						<label for="contingency_reserve"><?= $this->lang->line('contingency_reserve') ?></label>
						<a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('contingency_reserve-tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
						<div>
							<input id="contingency_reserve" name="contingency_reserve" type="number" min="0.00" max="10000.00" step="0.01" class="form-control input-md" value="<?php echo $contingency_reserve; ?>">
						</div>
					</div>

					<div class=" col-lg-4 form-group">
						<label for="sum_of_work_packages"><?= $this->lang->line('sum_of_work_packages') ?></label>
						<a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('sum_of_work_packages-tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
						<div>
							<input id="sum_of_work_packages" name="sum_of_work_packages" type="number" min="0.00" max="10000.00" step="0.01" class="form-control input-md" value="<?php echo $sum_of_work_packages; ?>">
						</div>
					</div>

					<div class=" col-lg-4 form-group">
						<label for="contingency_reserve_of_packages"><?= $this->lang->line('contingency_reserve_of_packages') ?></label>
						<a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('contingency_reserve_of_packages-tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
						<div>
							<input id="contingency_reserve_of_packages" name="contingency_reserve_of_packages" type="number" min="0.00" max="10000.00" step="0.01" class="form-control input-md" value="<?php echo $contingency_reserve_of_packages; ?>">
						</div>
					</div>

					<div class=" col-lg-4 form-group">
						<label for="baseline"><?= $this->lang->line('baseline') ?></label>
						<a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('baseline-tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
						<div>
							<input id="baseline" name="baseline" type="number" min="0.00" max="10000.00" step="0.01" class="form-control input-md" value="<?php echo $baseline; ?>">
						</div>
					</div>

					<div class=" col-lg-4 form-group">
						<label for="budget"><?= $this->lang->line('budget') ?></label>
						<a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('budget-tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
						<div>
							<input id="budget" name="budget" type="number" min="0.00" max="10000.00" step="0.01" class="form-control input-md" value="<?php echo $budget; ?>">
						</div>
					</div>

					<div class=" col-lg-4 form-group">
						<label for="cumulative_replanted_cost"><?= $this->lang->line('cumulative_replanted_cost') ?></label>
						<a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('cumulative_replanted_cost-tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
						<div>
							<input id="cumulative_replanted_cost" name="cumulative_replanted_cost" type="number" min="0.00" max="10000.00" step="0.01" class="form-control input-md" value="<?php echo $cumulative_replanted_cost; ?>">
						</div>
					</div>

					<div class=" col-lg-4 form-group">
						<label for="real_cost"><?= $this->lang->line('real_cost') ?></label>
						<a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('real_cost-tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
						<div>
							<input id="real_cost" name="real_cost" type="number" min="0.00" max="10000.00" step="0.01" class="form-control input-md" value="<?php echo $real_cost; ?>">
						</div>
					</div>

					<div class=" col-lg-4 form-group">
						<label for="cumulative_real_cost"><?= $this->lang->line('cumulative_real_cost') ?></label>
						<a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('cumulative_real_cost-tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
						<div>
							<input id="cumulative_real_cost" name="cumulative_real_cost" type="number" min="0.00" max="10000.00" step="0.01" class="form-control input-md" value="<?php echo $cumulative_real_cost; ?>">
						</div>
					</div>


					<div class="col-lg-12">
						<button id="activity-submit" type="submit" value="Save" class="btn btn-lg btn-success pull-right">
							<i class="glyphicon glyphicon-ok"></i> <?= $this->lang->line('btn-save') ?>
						</button>
			</form>

			<form action="<?php echo base_url('Activity/listResourceRequirement/'); ?><?php echo $project_id; ?>">
				<button class="btn btn-lg btn-info pull-left"> <i class="glyphicon glyphicon-chevron-left"></i> <?= $this->lang->line('btn-back') ?></button>
			</form>
		</div>
	</div>
</div>

<?php $this->load->view('frame/footer_view') ?>