<body class="hold-transition skin-gray sidebar-mini">
	<div class="wrapper">
		<div class="content-wrapper">
			<section class="content">
				<?php if ($this->session->flashdata('success')) : ?>
					<div class="alert alert-success">
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
						<strong><?= $this->session->flashdata('success') ?></strong>
					</div>
				<?php elseif ($this->session->flashdata('error')) : ?>
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

						<h1 class="page-header">
							<?= $this->lang->line('wr_title') ?>
						</h1>
							<form method="POST" action="<?= base_url('weekly-report/insert/') ?>">
								<div class="col-lg-6 form-group">
									<label>
										<?= $this->lang->line('we_name') ?>
									</label>
									<select name="evaluation_id" size="1" class="form-control" tabindex="1" required>
										<option selected="selected" disabled>Select</option>
										<?php foreach ($evaluation as $i): ?>
											<option value="<?= $i->weekly_evaluation_id ?>">
												<?= getWeeklyEvaluationName($i->weekly_evaluation_id) ?>
											</option>
										<?php endforeach ?>
									</select>
								</div>
								<div class="col-lg-12 form-group">
									<label for="tool_evaluation"><?= $this->lang->line('wr_tool_evaluation') ?>*</label>
									<span id="count-a">5000/5000</span>
									<a class="btn-sm btn-default" id="wr_tp_1" data-toggle="tooltip" data-placement="right" 
											title="<?= $this->lang->line('wr_tool_evaluation_tp') ?>">
										<i class="glyphicon glyphicon-comment"></i>
									</a>
									<div>
										<textarea oninput="limitText(this, 5000, 'a')" class="form-control" id="tool_evaluation_ta" required></textarea>

									</div>
								</div>
								<div class="col-lg-12">
									<div class="panel panel-default">
										<div class="panel-heading">
											<span class="fs-20">
												<?= $this->lang->line('wr_processes') ?>
											</span>
											<button class="btn btn-success" type="button" onclick="education_fields()">
												<span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
											</button>
										</div>
										<div class="panel-body p-b-0">
											<div class="col-sm-3">
												<label for="pdf_path"><?= $this->lang->line('wr_attach_pdf') ?></label>
											</div>

											<div class="col-sm-3">
												<label for="process_name"><?= $this->lang->line('wr_process_name') ?></label>
											</div>
											<div class="col-sm-6 comments">
												<label for="description"><?= $this->lang->line('wr_process_description') ?></label>
											</div>
										</div>
										<div class="panel-body p-t-10">
											<div id="education_fields"><!-- list of processes will appear here --></div>
										</div>
										<div class="col-lg-12">
											<button id="stakeholder-submit" type="submit" value="Save" class="btn btn-lg btn-success pull-right m-t-30">
												<i class="glyphicon glyphicon-ok"></i> <?= $this->lang->line('btn-save') ?>
											</button>
											<form action="<?= base_url('weekly-report/list') ?>">
												<button class="btn btn-lg btn-info pull-left m-t-30">
													<i class="glyphicon glyphicon-chevron-left"></i>
													<?= $this->lang->line('btn-back') ?>

												</button>
											</form>
										</div>
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
			</section>
		</div>
	</div>

