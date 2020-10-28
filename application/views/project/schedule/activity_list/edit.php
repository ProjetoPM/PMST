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

								<?= $this->lang->line('tap-title')  ?>

							</h1>
							<form action="<?= base_url() ?>schedule/activity-list/update/<?php echo $id; ?>" method="post">

								<input type="hidden" id="project_id" name="project_id" value="<?php echo $project_id; ?>">
								<!-- Textarea -->
								<ul class="abas">
									<!-- Aqui, criação da primeira aba -->

									<div class=" col-lg-4 form-group">
										<label for="associated_id"><?= $this->lang->line('associated_id') ?> *</label>
										<a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('associated_id-tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
										<div>
											<input id="associated_id" name="associated_id" class="form-control input-md" required="false" value="<?php echo $associated_id; ?>">
										</div>
									</div>

									<div class=" col-lg-4 form-group">
										<label for="milestone"><?= $this->lang->line('milestone') ?></label>
										<a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('milestone-tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
										<div>
											<input id="milestone" name="milestone" class="form-control input-md" value="<?php echo $milestone; ?>">
										</div>
									</div>

									<div class=" col-lg-4 form-group">
										<label for="project_phase"><?= $this->lang->line('project_phase') ?></label>
										<a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('project_phase-tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
										<div>
											<input id="project_phase" name="project_phase" class="form-control input-md" value="<?php echo $project_phase; ?>">
										</div>
									</div>


									<div class=" col-lg-12 form-group">
										<label for="activity_name"><?= $this->lang->line('activity_name') ?></label>
										<a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('activity_name-tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
										<div>
											<input id="activity_name" name="activity_name" type="text" class="form-control input-md" value="<?php echo $activity_name; ?>">
										</div>
									</div>

									<div class="col-lg-12">
										<button id="activity-submit" type="submit" value="Save" class="btn btn-lg btn-success pull-right">
											<i class="glyphicon glyphicon-ok"></i> <?= $this->lang->line('btn-save') ?>
										</button>
							</form>

							<form action="<?php echo base_url('schedule/activity-list/list/'); ?><?php echo $project_id; ?>">
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