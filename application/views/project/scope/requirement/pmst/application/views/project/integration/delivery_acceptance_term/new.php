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

								<?= $this->lang->line('tap-title')  ?>

							</h1>

							<form method="POST" action="<?php echo base_url('integration/deliverable-status/insert/'); ?><?php echo $project_id; ?>">
								<input type="hidden" id="project_id" name="project_id" value="<?php echo $project_id; ?>">


								<div class=" col-lg-6 form-group">
									<label for="validator_name"><?= $this->lang->line('validator_name') ?></label>
									<a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('validator_name-tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
									<div>
										<input id="validator_name" type="text" name="validator_name" class="form-control input-md">
									</div>
								</div>

								<div class=" col-lg-6 form-group">
									<label for="role"><?= $this->lang->line('role') ?></label>
									<a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('role-tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
									<div>
										<input id="role" type="text" name="role" class="form-control input-md">
									</div>
								</div>

								<div class=" col-lg-6 form-group">
									<label for="function"><?= $this->lang->line('function') ?></label>
									<a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('function-tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
									<div>
										<input id="function" type="text" name="function" class="form-control input-md">
									</div>
								</div>

								<div class=" col-lg-6 form-group">
									<label for="validation_date"><?= $this->lang->line('validation_date') ?></label>
									<a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('validation_date-tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
									<div>
										<input id="validation_date" type="date" name="validation_date" class="form-control input-md">
									</div>
								</div>

								<div class="col-lg-12 form-group">
									<label for="comments"><?= $this->lang->line('comments') ?></label>
									<a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('comments-tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
									<div>
										<textarea oninput="eylem(this, this.value)" class="form-control elasticteste" id="comments" name="comments"></textarea>
									</div>
								</div>

								<div class="col-lg-12">
									<button id="delivery_acceptance_term-submit" type="submit" value="Save" class="btn btn-lg btn-success pull-right">
										<i class="glyphicon glyphicon-ok"></i> <?= $this->lang->line('btn-save') ?>
									</button>
							</form>
							<form action="<?php echo base_url('integration/deliverable-status/list/'); ?><?php echo $project_id; ?>">
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