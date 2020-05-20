<div id="page-wrapper">
	<div class="row">
		<div class="col-lg-12">
			<h1 class="page-header"><?= $this->lang->line('new_activity-title') ?></h1>
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

	<div class="row">
		<div class="col-lg-12">
			<form method="POST" action="<?php echo base_url('Activity/insertActivity/'); ?><?php echo $project_id; ?>">
				<input type="hidden" name="project_id" value="<?= $project_id ?>">

				<div class=" col-lg-4 form-group">
					<label for="associated_id"><?= $this->lang->line('associated_id') ?> *</label>
					<a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('associated_id-tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
					<div>
						<input id="associated_id" name="associated_id" class="form-control input-md" required="false">
					</div>
				</div>

				<div class=" col-lg-4 form-group">
					<label for="milestone"><?= $this->lang->line('milestone') ?></label>
					<a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('milestone-tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
					<div>
						<input id="milestone" name="milestone" class="form-control input-md">
					</div>
				</div>

				<div class=" col-lg-4 form-group">
					<label for="project_phase"><?= $this->lang->line('project_phase') ?></label>
					<a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('project_phase-tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
					<div>
						<input id="project_phase" name="project_phase" class="form-control input-md">
					</div>
				</div>


				<div class=" col-lg-12 form-group">
					<label for="activity_name"><?= $this->lang->line('activity_name') ?></label>
					<a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('activity_name-tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
					<div>
						<input id="activity_name" name="activity_name" type="text" class="form-control input-md">
					</div>
				</div>


				<div class="col-lg-12">
					<button id="activity-submit" type="submit" value="Save" class="btn btn-lg btn-success pull-right">
						<i class="glyphicon glyphicon-ok"></i> <?= $this->lang->line('btn-save') ?>
					</button>
			</form>
			<form action="<?php echo base_url('Activity/listp/'); ?><?php echo $project_id; ?>">
				<button class="btn btn-lg btn-info pull-left"> <i class="glyphicon glyphicon-chevron-left"></i> <?= $this->lang->line('btn-back') ?></button>
			</form>
		</div>
	</div>
</div>
<?php $this->load->view('frame/footer_view') ?>