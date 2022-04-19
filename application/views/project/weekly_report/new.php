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
									<label><?= $this->lang->line('we_name') ?></label>
									<select name="evaluation_id" size="1" class="form-control" tabindex="1" required>
										<option selected="selected" disabled>Select</option>
										<?php foreach ($evaluation as $i) : ?>
											<option value="<?= $i->weekly_evaluation_id ?>">
												<?= getWeeklyEvaluationName($i->weekly_evaluation_id) ?>
											</option>
										<?php endforeach ?>
									</select>
								</div>
								<div class="col-lg-12 form-group">
									<label for="tool_evaluation"><?= $this->lang->line('wr_tool_evaluation') ?>*</label>
									<span id="count-a">5000/5000</span>
									<a class="btn-sm btn-default" id="wr_tp_1" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('wr_tool_evaluation_tp') ?>">
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
											<button class="btn btn-success" type="button" onclick="addProcess()">
												<span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
											</button>
										</div>
										<div class="panel-body m-t-20" style="padding: 0">
											<div id="education_fields">
												<div class="col-md-12" id="remove[1]">
													<div class="process-title p-l-17 p-b-5 p-t-5">Process #1</div>
													<div class="around col-md-12 m-b-25">
														<div class="form-group col-md-6">
															<label for="process_group">Process Group</label>
															<select class="form-control" name="" id="process_group">
																<option selected disabled>Select</option>
																<?php foreach($pmbok_processes as $process): ?>
																	<option value="<?= $process->pmbok_group_id ?>">
																		<?= $process->group_name ?>
																	</option>
																<?php endforeach ?>
															</select>
														</div>
														<div class="form-group col-md-6">
															<label for="process_name">Process Name</label>
															<select class="form-control" name="" id="process_name">
																<!-- Chamada do Ajax aqui... -->
															</select>
														</div>
														<div class="form-group col-md-11">
															<label for="process_name">Process Description*</label>
															<span id="count-pd">2000/2000</span>
															<textarea oninput="limitText(this, 2000, 'pd')" class="form-control" name="" id="process_name" rows="1"></textarea>
														</div>
														<div class="form-group col-md-1">
															<button type="button" onclick="removeProcess(1)" class="form-control btn btn-lg btn-danger m-t-23 m-l-0">
																<i class="fa fa-trash" aria-hidden="true"></i>
															</button>
														</div>
													</div>
												</div>
											</div>
										</div>
										<div class="col-lg-12">
											<button id="stakeholder-submit" type="submit" value="Save" class="btn btn-lg btn-success pull-right m-t-30">
												<i class="glyphicon glyphicon-ok"></i> <?= $this->lang->line('btn-save') ?>
											</button>
											<button onclick="goTo('<?= base_url('weekly-report/list') ?>')" class="btn btn-lg btn-info pull-left m-t-30">
												<i class="glyphicon glyphicon-chevron-left"></i>
												<?= $this->lang->line('btn-back') ?>
											</button>
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
	<script>
		var room = 0;
		var total = 0;

		function addProcess() {
			room++;
			var objTo = document.getElementById('education_fields')
			var div = document.createElement("div");
			div.setAttribute("class", "form-group");
			div.setAttribute("id", 'remove[' + room + ']');
			div.innerHTML = '<div class="around col-md-12"><div class="form-group col-md-6"><label for="process_group">Process Group</label><select class="form-control"name=""id="process_group"><option selected disabled>Select</option><?php foreach($pmbok_processes as $process):?><option value="<?= $process->pmbok_group_id ?>"><?=$process->group_name?></option><?php endforeach?></select></div><div class="col-md-6"><label for="process_name">Process Name</label><select class="form-control"name=""id="process_name"></select></div><div class="col-md-12"><label for="process_name">Process Description</label><textarea class="form-control"name=""id="process_name"></textarea></div></div>';
			objTo.appendChild(div);
		}

		function removeProcess(id) {
			$('#remove[' + id + ']').remove();
		}
	</script>