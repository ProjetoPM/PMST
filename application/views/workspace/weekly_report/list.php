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
									<table class="table table-view table-bordered table-striped" id="table_report_list">
										<thead>
											<tr>
												<th class="col-lg-1">#</th>
												<th class="col-lg-3"><?= $this->lang->line('wr_username') ?></th>
												<th class="col-lg-3"><?= $this->lang->line('we_name') ?></th>
												<th class="col-lg-1"><?= $this->lang->line('we_score') ?></th>
												<th class="col-lg-4"><?= $this->lang->line('actions') ?></th>
											</tr>
										</thead>
										<tbody>
											<?php foreach ($weekly_report as $data) : ?>
												<tr>
													<td><?= $data->weekly_report_id ?></td>
													<td><?= getUserName($data->user_id) ?></td>
													<td><?= getWeeklyEvaluationName($data->weekly_evaluation_id) ?></td>
													<td><?= getWeeklyEvaluationScore($data->weekly_report_id) ?></td>
													<td style="white-space: nowrap;">
														<div class="center">
															<div class="col-md-4 p-l-0">
																<span>
																	<button onclick=goTo(`<?= base_url("weekly-report/edit/$data->weekly_report_id") ?>`) class="btn btn-default">
																		<i class="fa fa-pencil"></i>
																		<span class="hidden-xs"></span>
																	</button>

																	<button class="btn btn-default" type="button" data-toggle="modal" data-target="#scoreDetails<?php $data->weekly_report_id ?>">
																		<i class="fa-solid fa-file" aria-hidden="true"></i>
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
									<button onclick=goTo(`<?= base_url("projects/{$_SESSION['workspace_id']}") ?>`) class="btn btn-lg btn-info m-t-20">
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

<!-- Modal -->
<div class="modal fade" id="scoreDetails" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header modal-green">
				<h3 class="modal-title" id="myModalLabel">Score Details</h3>
			</div>

			<?php $scores = getScorePerReport($data->weekly_report_id) ?? [] ?>

            <div class="modal-body">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th class="col">Professor</th>
                            <th class="col">Nota</th>
                            <th class="col">Comentário</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($scores as $s) : ?>
                            <tr>
                                <td><?= $s->username ?></td>
                                <td><?= $s->name ?></td>
                                <td><?= $s->comments ?></td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>            
		</div>
		<!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
</div>
<!-- Fim Modal -->