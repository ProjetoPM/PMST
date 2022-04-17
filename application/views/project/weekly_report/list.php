<body class="hold-transition skin-gray sidebar-mini">
	<div class="wrapper">
		<div class="content-wrapper">
			<section class="content">
				<?php if ($this->session->flashdata('success')): ?>
					<div class="alert alert-success">
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
						<strong><?php echo $this->session->flashdata('success'); ?></strong>
					</div>
				<?php elseif ($this->session->flashdata('error')): ?>
					<div class="alert alert-warning">
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
						<strong><?php echo $this->session->flashdata('error'); ?></strong>
					</div>
				<?php endif ?>
				<div class="row">
					<div class="col-lg-12">
						<div class="panel-body">
							<h1 class="page-header"><?= $this->lang->line('wr_title') ?></h1>
							<div class="row">
								<div class="col-lg-12">
									<button id="btn-report" class="btn btn-success btn-lg" onclick="window.location.href='<?= base_url('weekly-report/new') ?>'">
										<i class="fa fa-plus-circle"></i> <?= $this->lang->line('wr_new_report')?>
									</button>
								</div>
							</div>
							<br><br>
							<div class="row">
								<div class="col-lg-12">
									<table class="table table-bordered table-striped" id="table_report">
										<thead>
											<tr>
												<th><?= $this->lang->line('wr_username') ?></th>
												<th><?= $this->lang->line('we_name') ?></th>
												<th><?= $this->lang->line('actions') ?></th>
											</tr>
										</thead>
										<tbody>
											<?php foreach ($weekly_report as $data): ?>
												<tr>
													<td><?= getUserName($data->user_id) ?></td>
													<td><?= getWeeklyEvaluationName($data->weekly_evaluation_id) ?></td>
													<td>
														<div class="row center">
															<div class="col-sm-4">
																<form action='<?= base_url("weekly-report/edit/$data->weekly_report_id") ?>' method="post">
																	<input type="hidden" name="project_id" value="<?= $data->weekly_report_id ?>">
																	<button type="submit" class="btn btn-default">
																		<i class="fa fa-pencil"></i>
																		<span class="hidden-xs"></span>
																	</button>
																</form>
															</div>
														</div>
													</td>
												</tr>
											<?php endforeach ?>
										</tbody>
									</table>
									<button onclick="window.location.href='<?= base_url('projects') ?>'" class="btn btn-lg btn-info">
										<i class="glyphicon glyphicon-chevron-left"></i>
										<?= $this->lang->line('btn-back') ?>
									</button>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>
		</div>
	</div>
</body>
