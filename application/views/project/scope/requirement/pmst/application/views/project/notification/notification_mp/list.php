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

								<?= $this->lang->line('nb_title')  ?>

							</h1>

							<div class="row">
								<div class="col-lg-12">
									<button type="button" class="btn btn-info btn-lg glyphicon-plus" onclick="window.location.href='<?php echo base_url() ?>notification-board/new/<?php echo $project_id ?>'"><?= $this->lang->line('btn-new') ?> <?= $this->lang->line('notification-board') ?> </button>
								</div>
							</div>


							<br><br>
							<div class="row">
								<div class="col-lg-12">
									<table class="table table-bordered table-striped" id="tableNB">
										<thead>
											<tr>
												<th><?= $this->lang->line('nb_running_activities') ?></th>
												<th><?= $this->lang->line('nb_important_activities') ?></th>
												<th><?= $this->lang->line('nb_open_issues') ?></th>
												<th><?= $this->lang->line('nb_changes_approval') ?></th>
												<th><?= $this->lang->line('nb_general_warnings') ?></th>
												<th><?= $this->lang->line('btn-actions') ?></th>
											</tr>
										</thead>
										<tbody>
											<?php
											foreach ($notification_board as $notification_board) {
											?>
												<tr>

													<td><?= $notification_board->running_activities; ?></td>
													<td><?php echo $notification_board->important_activities; ?></td>
													<td><?php echo $notification_board->open_issues; ?></td>
													<td><?php echo $notification_board->changes_approval; ?></td>
													<td><?php echo $notification_board->general_warnings; ?></td>
													<td>
														<div class="row">
															<div class="col-sm-4">
																<form action="<?php echo base_url() ?>notification-board/edit/<?php echo $notification_board->notification_board_id; ?>" method="post">
																	<input type="hidden" name="project_id" value="<?= $notification_board->project_id ?>">
																	<button type="submit" class="btn btn-default"><em class="fa fa-pencil"></em><span class="hidden-xs"></span></button>
																</form>
															</div>

															<div class="col-sm-2">
																<form action="<?php echo base_url() ?>notification-board/delete/<?php echo $notification_board->notification_board_id; ?>" method="post">
																	<input type="hidden" name="project_id" value="<?= $project_id ?>">
																	<button type="submit" class="btn btn-danger"><em class="fa fa-trash"></em><span class="hidden-xs"></span></button>
																</form>
															</div>
														</div>
													</td>
												</tr>
											<?php
											}
											?>
										</tbody>
									</table>

									<form action="<?php echo base_url('project/'); ?><?php echo $project_id; ?>">
										<button class="btn btn-lg btn-info pull-left"> <i class="glyphicon glyphicon-chevron-left"></i> <?= $this->lang->line('btn-back') ?></button>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>
		</div>
	</div>
</body>




<?php $this->load->view('frame/footer_view') ?>



<script src="<?= base_url() ?>assets/js/jquery-2.1.3.min.js"></script>
<script src="<?= base_url() ?>assets/js/jquery.dataTables.min.js"></script>
<script src="<?= base_url() ?>assets/js/dataTables.bootstrap.js"></script>
<script src="<?= base_url() ?>assets/js/dataTables.responsive.js"></script>
<script src="<?= base_url() ?>assets/js/jquery.fixedheadertable.min.js" type="text/javascript"></script>

<script type="text/javascript">
	$(document).ready(function() {
		$('#tableNB').DataTable();
	});
</script>