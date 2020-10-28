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
				<!-- /.row -->

				<?php
				extract($notification_board);
				?>
				<div class="row">
					<div class="col-lg-12">
						<div class="panel-body">
							<h1 class="page-header">

								<?= $this->lang->line('nb_title')  ?>

							</h1>
							<form method="POST" action="<?php echo base_url() ?>notification-board/update">

								<input type="hidden" name="project_id" value="<?php echo  $project_id; ?>">

								<div class=" col-lg-12 form-group">
									<label for="running_activities"><?= $this->lang->line('nb_running_activities') ?> </label>
									<a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('running_activities-tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>

									<textarea oninput="eylem(this, this.value)" class="form-control elasticteste" id="running_activities" name="running_activities" maxlength="4000"><?php echo $running_activities ?></textarea>

								</div>

								<div class=" col-lg-12 form-group">
									<label for="important_activities"><?= $this->lang->line('nb_important_activities') ?> </label>
									<a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('important_activities-tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>

									<textarea oninput="eylem(this, this.value)" class="form-control elasticteste" id="important_activities" name="important_activities" maxlength="4000"><?php echo $important_activities ?></textarea>

								</div>

								<div class=" col-lg-12 form-group">
									<label for="open_issues"><?= $this->lang->line('nb_open_issues') ?> </label>
									<a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('open_issues-tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>

									<textarea oninput="eylem(this, this.value)" class="form-control elasticteste" id="open_issues" name="open_issues" maxlength="4000"><?php echo $open_issues ?></textarea>

								</div>

								<div class=" col-lg-12 form-group">
									<label for="changes_approval"><?= $this->lang->line('nb_changes_approval') ?> </label>
									<a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('changes_approval-tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>

									<textarea oninput="eylem(this, this.value)" class="form-control elasticteste" id="changes_approval" name="changes_approval" maxlength="4000"><?php echo $changes_approval ?></textarea>

								</div>

								<div class=" col-lg-12 form-group">
									<label for="general_warnings"><?= $this->lang->line('nb_general_warnings') ?> </label>
									<a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('general_warnings-tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>

									<textarea oninput="eylem(this, this.value)" class="form-control elasticteste" id="general_warnings" name="general_warnings" maxlength="4000"><?php echo $general_warnings ?></textarea>
								</div>

								<div class="col-lg-12">
									<button id="new_quality_plan-submit" type="submit" value="Save" class="btn btn-lg btn-success pull-right">
										<i class="glyphicon glyphicon-ok"></i> <?= $this->lang->line('btn-save') ?>
									</button>
							</form>

							<form action="<?php echo base_url() ?>/notification-board/list/<?= $project_id ?>">
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