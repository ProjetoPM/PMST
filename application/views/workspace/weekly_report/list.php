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
												<th class="col"><?= $this->lang->line('we_name') ?></th>
												<th class="col-lg-3"><?= $this->lang->line('wr_tool_evaluation') ?></th>
												<th class="col"><?= $this->lang->line('we_score') ?></th>
												<th class="col-lg-3"><?= $this->lang->line('actions') ?></th>
											</tr>
										</thead>
										<tbody>
											<?php foreach ($weekly_report as $data) : ?>
												<tr>
                                                    <td><?= $data->weekly_report_id ?></td>
													<td><?= getUserName($data->user_id) ?></td>
													<td><?= getWeeklyEvaluationName($data->weekly_evaluation_id) ?></td>
													<td><?= $data->tool_evaluation ?></td>
													<td><?= $data->name ?></td>
													<td>
														<div class="center">
															<div class="col-md-4 p-l-0">
																<span>
																	<button onclick=goTo(`<?= base_url("weekly-report/edit/$data->weekly_report_id") ?>`) class="btn btn-default">
																		<i class="fa fa-pencil"></i>
																		<span class="hidden-xs"></span>
																	</button>
                                                                    <button onclick=remove(`<?= $data->weekly_report_id ?>`) class="btn btn-danger">
																		<i class="fa fa-trash"></i>
																		<span class="hidden-xs"></span>
																	</button>
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
    <script>
        function remove(id) {
            alertify.set('notifier', 'delay', 1.5);
            alertify.confirm('<?= $this->lang->line('wr_alert_confirm_title') ?>',
                '<?= $this->lang->line('wr_alert_confirm_text') ?>',
                function() {
                    window.location.href = `<?= base_url('weekly-report/delete/') ?>${id}`;
                    alertify.success('<?= $this->lang->line('wr_alert_confirm_ok') ?>')
                },
                function() {
                    alertify.warning('<?= $this->lang->line('wr_alert_confirm_cancel') ?>')
                }
            );
        }
    </script>
</body>