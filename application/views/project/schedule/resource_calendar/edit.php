<div id="page-wrapper">
	<div class="row">
		<div class="col-lg-12">
			<h1 class="page-header"> <?= $this->lang->line('schedule_network_edit-title') ?></h1>
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
			<form action="<?= base_url() ?>Activity/updateResourceCalendar/<?php echo $id; ?>" method="post">

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
						<label for="resource_name"><?= $this->lang->line('resource_name') ?></label>
						<a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('resource_name-tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
						<div>
							<input id="resource_name" type="text" name="resource_name" class="form-control input-md" value="<?php echo $resource_name; ?>">
						</div>
					</div>

					<div class=" col-lg-4 form-group">
						<label for="function"><?= $this->lang->line('function') ?></label>
						<a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('function-tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
						<div>
							<input id="function" type="text" name="function" class="form-control input-md" value="<?php echo $function; ?>">
						</div>
					</div>

					<div class=" col-lg-3 form-group">
						<label for="availability_start"><?= $this->lang->line('availability_start') ?></label>
						<a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('availability_start-tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
						<div>
							<input id="availability_start" type="date" name="availability_start" class="form-control input-md" value="<?php echo $availability_start; ?>">
						</div>
					</div>

					<div class=" col-lg-3 form-group">
						<label for="availability_ends"><?= $this->lang->line('availability_ends') ?></label>
						<a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('availability_ends-tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
						<div>
							<input id="availability_ends" type="date" name="availability_ends" class="form-control input-md" value="<?php echo $availability_ends; ?>">
						</div>
					</div>

					<div class=" col-lg-3 form-group">
						<label for="allocation_start"><?= $this->lang->line('allocation_start') ?></label>
						<a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('allocation_start-tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
						<div>
							<input id="allocation_start" type="date" name="allocation_start" class="form-control input-md" value="<?php echo $allocation_start; ?>">
						</div>
					</div>

					<div class=" col-lg-3 form-group">
						<label for="allocation_ends"><?= $this->lang->line('allocation_ends') ?></label>
						<a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('allocation_ends-tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
						<div>
							<input id="allocation_ends" type="date" name="allocation_ends" class="form-control input-md" value="<?php echo $allocation_ends; ?>">
						</div>
					</div>


					<div class="col-lg-12">
						<button id="activity-submit" type="submit" value="Save" class="btn btn-lg btn-success pull-right">
							<i class="glyphicon glyphicon-ok"></i> <?= $this->lang->line('btn-save') ?>
						</button>
			</form>

			<form action="<?php echo base_url('Activity/listDurationEstimates/'); ?><?php echo $project_id; ?>">
				<button class="btn btn-lg btn-info pull-left"> <i class="glyphicon glyphicon-chevron-left"></i> <?= $this->lang->line('btn-back') ?></button>
			</form>
		</div>
	</div>
</div>


<?php $this->load->view('frame/footer_view') ?>