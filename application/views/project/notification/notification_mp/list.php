<div id="page-wrapper">
	<div class="row" position="absolute">
		<div class="col-lg-12">
			<h1 class="page-header"><?=$this->lang->line('notification-board')?></h1>
		</div>
		<!-- /.col-lg-12 -->

		<?php if ($this->session->flashdata('success')): ?>
			<div class="alert alert-success">
				<a href="#" class="close" data-dismiss="alert">&times;</a>
				<strong><?php echo $this->session->flashdata('success'); ?></strong>
			</div>
			<?php elseif ($this->session->flashdata('error')): ?>
				<div class="alert alert-warning">
					<a href="#" class="close" data-dismiss="alert">&times;</a>
					<strong><?php echo $this->session->flashdata('error'); ?></strong>
				</div>
			<?php endif; ?>
			<!-- /.row -->

			<div class="row">
				<div class="col-lg-12">
					<div class="container">
						<button type="button" class="btn btn-info btn-lg glyphicon-plus" onclick="window.location.href='<?php echo base_url() ?>Notification_board/newp/<?php echo $project_id ?>'"><?=$this->lang->line('btn-new')?> <?=$this->lang->line('notification-board')?> </button>

						<div class="col-sm-12">
							<br><br>
							<div>
								<table class="table table-bordered table-striped" id="tableNB">
									<thead>
										<tr>
											<th><?=$this->lang->line('running_activities')?></th>
											<th><?=$this->lang->line('important_activities')?></th>
											<th><?=$this->lang->line('open_issues')?></th>
											<th><?=$this->lang->line('changes_approval')?></th>
											<th><?=$this->lang->line('general_warnings')?></th>
											<th><?=$this->lang->line('btn-actions')?></th>
										</tr>
									</thead>
									<tbody>
										<?php
										foreach ($notification_board as $notification_board) {
											?>
											<tr>

												<td><?= $notification_board->running_activities; ?></td>
												<td><?php echo $notification_board->important_activities;?></td>
												<td><?php echo $notification_board->open_issues;?></td>
												<td><?php echo $notification_board->changes_approval;?></td>
												<td><?php echo $notification_board->general_warnings;?></td>
												<td>
													<div class="row">
														<div class="col-sm-4">
															<form action="<?php echo base_url() ?>Notification_board/edit/<?php echo $notification_board->notification_board_id; ?>" method="post">
																<input type="hidden" name="project_id" value="<?=$notification_board->project_id?>">
																<button type="submit" class="btn btn-default"><em class="fa fa-pencil"></em><span class="hidden-xs"></span></button>
															</form>
														</div>
														<div class="col-sm-3">
															||
														</div>
														<div class="col-sm-2">
															<form action="<?php echo base_url() ?>Notification_board/delete/<?php echo $notification_board->notification_board_id; ?>" method="post">
																<input type="hidden" name="project_id" value="<?=$project_id?>">
																<button type="submit" class="btn btn-danger" ><em class="fa fa-trash"></em><span class="hidden-xs"></span></button>
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
							</div>
						</div>

						<!-- /.row --> </div>
						<div class="col-sm-12" position= "absolute">
							<div class="container">
								<?php $this->load->view('frame/footer_view') ?>
							</div>
						</div>
					</div>

					<script src="<?=base_url()?>assets/js/jquery-2.1.3.min.js"></script>
					<script src="<?=base_url()?>assets/js/jquery.dataTables.min.js"></script>
					<script src="<?=base_url()?>assets/js/dataTables.bootstrap.js"></script>
					<script src="<?=base_url()?>assets/js/dataTables.responsive.js"></script>
					<script src="<?=base_url()?>assets/js/jquery.fixedheadertable.min.js" type="text/javascript"></script>

					<script type="text/javascript">
						$(document).ready( function () {
							$('#tableNB').DataTable();
						} );
					</script>
