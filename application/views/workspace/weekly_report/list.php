<body class="hold-transition skin-gray sidebar-mini">
	<div class="wrapper">
		<div class="content-wrapper">
			<section class="content">
				<?php $this->load->view('errors/exceptions') ?>
				<div class="row">
					<div class="col-lg-12">
						<div class="panel-body">

							<h1 class="page-header"><?= $this->lang->line('wr_title') ?></h1>
							<div class="row">
								<div class="col-lg-12">
									<button id="btn-report" class="btn btn-success btn-lg" onclick="goTo(`<?= base_url('weekly-report/new') ?>`)">
										<i class="fa fa-plus-circle"></i> <?= $this->lang->line('wr_new_report') ?>
									</button>
								</div>
							</div>
							<br><br>
							<div class="row">
								<div class="col-lg-12">
									<table class="table table-bordered table-striped" id="table_report_list">
										<thead>
											<tr>
												<th class="col">#</th>
												<th class="col"><?= $this->lang->line('wr_username') ?></th>
												<th class="col-lg-2"><?= $this->lang->line('we_name') ?></th>
												<th class="col-lg-4"><?= $this->lang->line('wr_tool_evaluation') ?></th>
												<th class="col-lg-2"><?= $this->lang->line('we_score') ?></th>
												<th class="col-lg-2"><?= $this->lang->line('actions') ?></th>
											</tr>
										</thead>
										<tbody>
											<?php foreach ($weekly_report as $data) : ?>
												<tr>
                                                    <td><?= $data->weekly_report_id ?></td>
													<td><?= getUserName($data->user_id) ?></td>
													<td><?= getWeeklyEvaluationName($data->weekly_evaluation_id) ?></td>
													<td><?= $data->tool_evaluation ?></td>
													<td><?= getScoreIdAsScore($data->score) ?></td>
													<td>
														<div class="center">
															<div class="col-sm-4 p-l-0">
																<span>
																	<input type="hidden" value="<?= $data->weekly_report_id ?>">
																	<button onclick=goTo(`<?= base_url("weekly-report/edit/$data->weekly_report_id") ?>`) class="btn btn-default">
																		<i class="fa fa-pencil"></i>
																		<span class="hidden-xs"></span>
																	</button>
																	<input type="hidden" value="<?= $data->weekly_report_id ?>">
																</span>
															</div>
														</div>
													</td>
												</tr>
											<?php endforeach ?>
										</tbody>
									</table>
									<button onclick=goTo(`<?= base_url('projects') ?>`) class="btn btn-lg btn-info m-t-20">
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