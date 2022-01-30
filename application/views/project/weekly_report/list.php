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
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
						<strong><?php echo $this->session->flashdata('success'); ?></strong>
					</div>
				<?php elseif ($this->session->flashdata('error')) : ?>
					<div class="alert alert-warning">
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
						<strong><?php echo $this->session->flashdata('error'); ?></strong>
					</div>
				<?php endif; ?>
				<!-- /.row -->
				<style>
					@media (min-width: 1200px) {
						.texttd {
							display: block;
							width: 650px;
							overflow: hidden;
							white-space: nowrap;
							text-overflow: ellipsis;
						}
					}

					@media (max-width: 1199px) {
						.texttd {
							display: block;
							width: 450px;
							overflow: hidden;
							white-space: nowrap;
							text-overflow: ellipsis;
						}
					}

					@media (max-width: 1160px) {
						.texttd {
							display: block;
							width: 300px;
							overflow: hidden;
							white-space: nowrap;
							text-overflow: ellipsis;
						}
					}

					@media (max-width: 900px) {
						.texttd {
							display: block;
							width: 100px;
							overflow: hidden;
							white-space: nowrap;
							text-overflow: ellipsis;
						}
					}
				</style>
				<div class="row">
					<div class="col-lg-12">

						<div class="panel-body">
							<h1 class="page-header">

								<?= $this->lang->line('wr_title')  ?>

							</h1>

							
							<div class="row">
								<div class="col-lg-12">

									<button id="btn-report" class="btn btn-info btn-lg" onclick="window.location.href='<?php echo base_url() ?>weekly-report/new'"><i class="fa fa-plus-circle"></i> <?= $this->lang->line('wr_new_report')?></button>
									
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
												<th><?= $this->lang->line('we_score') ?></th>
												<th><?= $this->lang->line('actions') ?></th>
											</tr>
										</thead>
										<tbody>
											<?php
											foreach ($weekly_report as $item) {
											?>
												<tr>
													<td><?= getUserName($item->user_id) ?></td>
													<td><?= getWeeklyEvaluationName($item->weekly_evaluation_id) ?></td>
													<td><?= getScoreIdAsScore($item->score) ?></td>

													<td>
														<div class="row center">
															<div class="col-sm-4">
																<form action="<?php echo base_url() ?>weekly-report/edit/<?php echo $item->weekly_report_id; ?>" method="post">
																	<input type="hidden" name="project_id" value="<?= $item->weekly_report_id; ?>">
																	<button type="submit" class="btn btn-default"><em class="fa fa-pencil"></em><span class="hidden-xs"></span></button>
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

									<form action="<?php echo base_url('projects'); ?>">
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

<!-- JavaScript -->
<script src="//cdn.jsdelivr.net/npm/alertifyjs@1.11.2/build/alertify.min.js"></script>
<!-- CSS -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.11.2/build/css/alertify.min.css" />

<!--<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.1/jquery.min.js"></script>

-->
<script type="text/javascript">
	'use strict'
	let table;

	$(document).ready(function() {
		table = $('#table_report').DataTable({
			"columns": [{
					"data": "user_id"
				},
				{
					"data": "weekly_evaluation_id"
				},
				{
					"data": "score"
				},
				{
					"data": "btn-actions",
					"orderable": false
				}
			],
			"order": [
				[0, 'attr']
			]
		});
	});

</script>

<!-- <script type="text/javascript">
	function deletar(idProjeto, assumption_log_id) {
		//e.preventDefault();
		alertify.confirm('Do you agree?').setting({
			'labels': {
				ok: 'Agree',
				cancel: 'Cancel'
			},
			'reverseButtons': false,
			'onok': function() {

				console.log(`Passei o ${idProjeto} e ${assumption_log_id}`);

				$.post("<?php echo base_url() ?>integration/assumption-log/delete/" + assumption_log_id, {
					project_id: idProjeto,
				});
				// location.reload();
				window.location.reload();
				alertify.success('You agree.');
			},
			'oncancel': function() {
				alertify.error('You did not agree.');
			}
		}).show();

	}
</script> -->