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
									<button id="btn-report" class="btn btn-success btn-lg" onclick="goTo(`<?= base_url('weekly-report/new') ?>`)">
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
												<th><?= $this->lang->line('we_score') ?></th>
												<th><?= $this->lang->line('actions') ?></th>
											</tr>
										</thead>
										<tbody>
											<?php foreach ($weekly_report as $data): ?>
												<tr>
													<td><?= getUserName($data->user_id) ?></td>
													<td><?= getWeeklyEvaluationName($data->weekly_evaluation_id) ?></td>
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
																	<button class="btn btn-default" data-toggle="modal" data-target="#upload-<?=($data->weekly_report_id) ?>">
																		<i class="fa fa-upload"></i>
																		<span class="hidden-xs"></span>
																	</button>
																</span>
															</div>
														</div>
													</td>
												</tr>
												<div class="modal fade" id="upload-<?= ($data->weekly_report_id) ?>" role="dialog">
													<div class="modal-dialog">
														<div class="modal-content">
															<div class="modal-header">
																<button type="button" class="close" data-dismiss="modal">&times;</button>
																<h3 class="modal-title">Attachment Upload</h3>
															</div>
															<div class="modal-body">
																<?= form_open_multipart('weekly-report/upload-image/') ?>
																<div class="row">
																	<div class="col-lg-12">
																		<div class="form-group">
																			<label for="">Process</label>
																			<select name="process_id" size="1" class="form-control" tabindex="1" required>
																				<option selected="selected" disabled="disabled" value=""> Select </option>
																				<?php foreach ($processes as $process): ?>
																					<option value="<?= $process->pmbok_group_id ?>">
																						<?= getProcessGroupName($process->pmbok_id, $process->pmbok_group_id) ?>
																					</option>
																				<?php endforeach ?>
																			</select>
																		</div>
																		<div class="form-group">
																			<label for="description">Descrição</label>
																			<input type="text" class="form-control" placeholder="..." name="description" required>
																		</div>
																		<div class="form-group">
																			<label for="first">Select File</label>
																			<input type="file" class="form-control" name="image" id="file_upload" required>
																		</div>
																	</div>
																</div>
															</div>
															<div class="modal-footer">
																<div class="row">
																	<div class="col-lg-12">
																		<button data-submit="...Enviando" type="submit" value="Save" class="btn btn-lg btn-success pull-right">
																			<i class="glyphicon glyphicon-ok"></i> <?= $this->lang->line('btn-save') ?>
																		</button>
																		</form>
																		<button type="button" class="btn btn-lg btn-default pull-left" data-dismiss="modal">Close</button>
																	</div>
																</div>
															</div>
														</div>
													</div>
												</div>
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

