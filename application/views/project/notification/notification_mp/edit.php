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
						<!-- Trigger the modal with a button -->
						<button type="button" class="open-AddBookDialog btn btn-info btn-lg glyphicon-plus" > <?=$this->lang->line('btn-edit')?> <?=$this->lang->line('notification')?></button>

						<div class="container">
							<br><br>
							<div class="col-sm-12">
								<div class="modal-dialog">
									<!-- Modal content-->
									<div class="modal-content">
											<form action="<?= base_url() ?>notification_board/update/<?php echo $notification_board->notification_board_id; ?>" method="post">
												<input type="hidden" name="project_id" value="<?php echo $notification_board->project_id?>">
												<div class="form-group">
													<label>Running Activities</label>
													<a href="#" type="button" id="tooltip" data-toggle="tooltip" data-placement="top" title="running_activities">?</a>
													<textarea class="form-control" id="running_activities" placeholder="Running Activities" name="running_activities"><?php echo $notification_board->running_activities?></textarea>
												</div>

												<!-- Textarea -->
												<div class="form-group">
													<label>Important Activities</label>
													<a href="#" type="button" id="tooltip" data-toggle="tooltip" data-placement="top" title="important_activities">?</a>
													<textarea class="form-control" id="important_activities" placeholder="Important Activities" name="important_activities"><?php echo $notification_board->important_activities?></textarea>
												</div>

												<div class="form-group">
													<label>Open Issues</label>
													<a href="#" type="button" id="tooltip" data-toggle="tooltip" data-placement="top" title="open_issues">?</a>
													<textarea class="form-control" id="open_issues" placeholder="Open Issues" name="open_issues"><?php echo $notification_board->open_issues?></textarea>
												</div>

												<div class="form-group">
													<label>Changes Approval</label>
													<a href="#" type="button" id="tooltip" data-toggle="tooltip" data-placement="top" title="changes_approval">?</a>
													<textarea class="form-control" id="changes_approval" placeholder="Changes Approval" name="changes_approval"><?php echo $notification_board->changes_approval?></textarea>
												</div>

												<div class="form-group">
													<label>General Warnings</label>
													<a href="#" type="button" id="tooltip" data-toggle="tooltip" data-placement="top" title="general_warnings">?</a>
													<textarea class="form-control" id="general_warnings" placeholder="General Warnings" name="general_warnings"><?php echo $notification_board->general_warnings?></textarea>
												</div>
												<button type="submit" class="btn btn-lg btn-success btn-block">Save</button>
											</form>
									</div>
								</div>
							</div>

							<!-- /.row --> </div> 
							<div class="col-sm-12" position= "absolute">
								<div class="container">
									<?php $this->load->view('frame/footer_view') ?>            
								</div>
							</div>
						</div>