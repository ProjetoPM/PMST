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
                <?php $this->load->view('errors/exceptions') ?>
				<div class="row">
					<div class="col-lg-12">
						<div class="panel-body">
							<h1 class="page-header">
								<?= $this->lang->line('we_title')  ?>
							</h1>
							<div class="row">
								<div class="col-lg-12">
                                    <a 
                                        href="./new" 
                                        class="btn btn-lg btn-success"
                                        id="btn-evaluation"
                                    >
                                        <i class="fa fa-plus-circle"></i>
                                        <?= $this->lang->line('we_new_evaluation') ?>
                                    </a>
								</div>
							</div>

							<br><br>
							<div class="row">
								<div class="col-lg-12">
									<table class="table table-bordered table-striped" id="table_evaluation">
										<thead>
											<tr>
												<th><?= $this->lang->line('we_name') ?></th>
												<th><?= $this->lang->line('we_start_date') ?></th>
												<th><?= $this->lang->line('we_end_date') ?></th>
												<th><?= $this->lang->line('we_deadline') ?></th>
												<th><?= $this->lang->line('actions') ?></th>
												<!-- <th><?= $this->lang->line('wr_date') ?></th>
												<th><?= $this->lang->line('actions') ?></th> -->
											</tr>
										</thead>
										<tbody>
											<?php
											foreach ($weekly_evaluation as $item) {
											?>
												<tr>
													<td><?= $item->name ?></td>
													<td><?= $item->start_date ?></td>
													<td><?= $item->end_date ?></td>
													<td><?= $item->deadline ?></td>

													<td>
														<div class="row center">
															<div class="col-sm-4">
																<form action="<?php echo base_url() ?>weekly-evaluation/edit/<?php echo $item->weekly_evaluation_id; ?>" method="post">
																	<input type="hidden" name="project_id" value="<?= $item->weekly_evaluation_id; ?>">
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

									<h1 class="page-header">

										<?= $this->lang->line('wr_submissions')  ?>

									</h1>

									<table class="table table-bordered table-striped" id="table_submission_">
										<thead>
											<tr>
												<th><?= $this->lang->line('wr_username') ?></th>
												<th><?= $this->lang->line('we_name') ?></th>
												<th><?= $this->lang->line('we_score') ?></th>
												<th><?= $this->lang->line('actions') ?></th>
											</tr>
										</thead>
										<tbody>
											<?php foreach ($weekly_report as $item): ?>
												<tr>
													<td><?= getUserName($item->user_id) ?></td>
													<td><?= getWeeklyEvaluationName($item->weekly_evaluation_id) ?></td>
													<td><?= getWeeklyEvaluationScore($item->weekly_report_id) ?></td>
													<td>
														<div class="row center">
															<div class="col-sm-4">
																<form action="./edit-score/<?= $item->weekly_report_id ?>")" method="post">
																	<input 
                                                                        type="hidden" 
                                                                        name="project_id" 
                                                                        value="<?= $item->weekly_report_id ?>"
                                                                    >
																	<button 
                                                                        type="submit" 
                                                                        class="btn btn-lg btn-info"
                                                                    >
                                                                        <i class = "fa fa-check-square"></i>
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
									<a 
                                        class="btn btn-lg btn-info pull-left" 
                                        href="<?= base_url("/projects") ?>"    
                                    >
                                        <i class="glyphicon glyphicon-chevron-left"></i>
                                        <?= $this->lang->line('btn-back') ?>
                                    </a>
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
    $(document).ready(function () {
        $('.table').DataTable({
            "bInfo": false,
            "responsive": true,
            "paging": true,
            "pageLength": 5,
            "lengthMenu": [5, 10, 25, 50, 100],
        });
    });
</script>
