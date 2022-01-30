<body id="body" class="hold-transition skin-gray sidebar-mini">
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
				<?php elseif ($this->session->flashdata('update')) : ?>
					<div class="alert alert-warning">
						<a href="#" class="close" data-dismiss="alert">&times;</a>
						<strong><?php echo $this->session->flashdata('update'); ?></strong>
					</div>
				<?php endif; ?>
				<style>
					input button[disabled],
					html input[disabled] {
						text-align: center;
					}

					.elasticteste {
						min-height: 70px;
						/* min-width: 120px; */
						/* outline: 0; */
						resize: none;
						line-height: 20px;
					}

					.elasticteste2 {
						height: 35px;
						/* min-width: 120px; */
						/* outline: 0; */
						resize: none;

					}

					textarea.form-control {
						height: 35px;
					}
				</style>

				<?php extract($weekly_processes) ?>
				<div class="row">
					<div class="col-lg-12">
						<div class="panel-body">
							<h1 class="page-header">
								<?= $this->lang->line('we_title') ?>

							</h1>
							<form method="POST" action="<?php echo base_url() ?>weekly-evaluation/update-score/<?php echo $weekly_report['weekly_report_id'] ?>">

								<div class="col-lg-6 form-group">
									<label for="name"><?= $this->lang->line('we_name') ?></label>
									<div>
										<input id="we_txt_1" type="text" name="name" class="form-control" onkeyup="limite_textarea(this.value, 'we_1')" maxlength="2000" oninput="eylem(this, this.value)" required="true" value="<?= getWeeklyEvaluationName($weekly_report['weekly_evaluation_id']); ?> " disabled>
									</div>
								</div>

								<div class="col-lg-6 form-group">
									<label for="name"><?= $this->lang->line('we_score') ?></label>
									<div>
										<select id="score" name="score" class="form-control" required>
											<?php if ($weekly_report['score'] != null) { ?>
												"<option value="<?php echo $weekly_report['score'] ?>"><?= $this->lang->line('selected') ?></option>"
											<?php } ?>
											<option value="0">NOK</option>
											<option value="1">POK</option>
											<option value="2">TOK</option>
										</select>
									</div>
								</div>

								<div class=" col-lg-6 form-group">
									<label for="tool_evaluation"><?= $this->lang->line('wr_tool_evaluation') ?></label>
									<a class="btn-sm btn-default" id="wr_tp_1" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('wr_tool_evaluation_tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
									<div>
										<textarea disabled onkeyup="limite_textarea(this.value, 'wr_1')" id="wr_txt_1" maxlength="5000" oninput="eylem(this, this.value)" class="form-control elasticteste" name="tool_evaluation"><?php echo $weekly_report['tool_evaluation'] ?></textarea>
									</div>
								</div>

								<div class=" col-lg-6 form-group">
									<label for="comments"><?= $this->lang->line('we_comments') ?></label>
									<span class="wr_1">5000</span><?= $this->lang->line('character5') ?>
									<div>
										<textarea onkeyup="limite_textarea(this.value, 'wr_1')" id="wr_txt_1" maxlength="5000" oninput="eylem(this, this.value)" class="form-control elasticteste" name="comments" required="true"><?php echo $weekly_report['comments']; ?></textarea>
									</div>
								</div>




								<div class="row">
									<div class="col-lg-12">
										<h1 class="page-header">

											<?= $this->lang->line('wr_submissions')  ?>

										</h1>

										<table class="table table-bordered table-striped" id="table_processes">
											<thead>
												<tr>
													<th><?= $this->lang->line('wr_attach_pdf') ?></th>
													<th><?= $this->lang->line('wr_process_name') ?></th>
													<th><?= $this->lang->line('wr_process_description') ?></th>
												</tr>
											</thead>
											<tbody>
												<?php
												foreach ($weekly_processes as $item) {
												?>
													<tr>
														<td>
															<a target="_blank" href="' . base_url() . $item['pdf_path'] . '">
																<img style=" padding-top: 5px; border: 1px solid #ddd;border-radius: 4px; padding: 5px; width: 130px;" src="' . base_url() . $item['pdf_path'] . '" class="pdf" alt="" />
															</a>
														</td>

														<td><?= $item->process_name ?></td>
														<td><?= $item->description ?></td>
													</tr>
												<?php
												}
												?>

											</tbody>
										</table>
									</div>
									<!-- buttons -->
									<div class="col-lg-12">
										<button type="submit" style="margin-top: 30px;" class="btn btn-lg btn-success pull-right">
											<i class="glyphicon glyphicon-ok"></i> <?= $this->lang->line('btn-save') ?>
										</button>
									</div>
								</div>

							</form>

							<form action="<?php echo base_url('weekly-evaluation/list/'); ?><?php echo  $_SESSION['project_id']; ?>">
								<button style="margin-top: 30px;" class="btn btn-lg btn-info pull-left"> <i class="glyphicon glyphicon-chevron-left"></i> <?= $this->lang->line('btn-back') ?></button>
							</form>
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

<script type="text/javascript">
	'use strict'
	let table;
	$(document).ready(function() {
		table = $('#table_processes').DataTable({
			"columns": [{
					"data": "pdf_path"
				},
				{
					"data": "process_name"
				},
				{
					"data": "process_description"
				},
			],
			"order": [
				[0, 'attr']
			]
		});
	});
</script>