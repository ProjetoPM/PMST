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
			<form action="<?= base_url() ?>Activity/updateScheduleNetwork/<?php echo $id; ?>" method="post">

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

					<div class=" col-lg-12 form-group">
						<label for="predecessor_activity"><?= $this->lang->line('predecessor_activity') ?></label>
						<a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('predecessor_activity-tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
						<div>
							<input id="predecessor_activity" name="predecessor_activity" class="form-control input-md" value="<?php echo $predecessor_activity; ?>">
						</div>
					</div>


					<div class=" col-lg-4 form-group">
						<label for="dependence_type"><?= $this->lang->line('dependence_type') ?></label>
						<a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('dependence_type-tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
						<div>
							<input id="dependence_type" name="dependence_type" class="form-control input-md" value="<?php echo $dependence_type; ?>">
						</div>
					</div>

					<div class=" col-lg-4 form-group">
						<label for="anticipation"><?= $this->lang->line('anticipation') ?></label>
						<a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('anticipation-tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
						<div>
							<input id="anticipation" name="anticipation" class="form-control input-md" value="<?php echo $anticipation; ?>">
						</div>
					</div>


					<div class=" col-lg-4 form-group">
						<label for="wait"><?= $this->lang->line('wait') ?></label>
						<a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('wait-tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
						<div>
							<input id="wait" name="wait" type="text" class="form-control input-md" value="<?php echo $wait; ?>">
						</div>
					</div>


					<div class="col-lg-12">
						<button id="activity-submit" type="submit" value="Save" class="btn btn-lg btn-success pull-right">
							<i class="glyphicon glyphicon-ok"></i> <?= $this->lang->line('btn-save') ?>
						</button>
			</form>

			<form action="<?php echo base_url('Activity/listScheduleNetwork/'); ?><?php echo $project_id; ?>">
				<button class="btn btn-lg btn-info pull-left"> <i class="glyphicon glyphicon-chevron-left"></i> <?= $this->lang->line('btn-back') ?></button>
			</form>
		</div>
	</div>
</div>

<?php $this->load->view('frame/footer_view') ?>