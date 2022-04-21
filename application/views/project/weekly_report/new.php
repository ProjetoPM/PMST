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
											<button class="btn btn-success" type="button" onclick="education_fields()">
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
															<select class="form-control" id="process_group">
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
															<select class="form-control" id="process_name">
																<option selected disabled>Select process group first</option>
															</select>
														</div>
														<div class="form-group col-md-11">
															<label for="process_description">Process Description*</label>
															<span id="count-pd">2000/2000</span>
															<textarea oninput="limitText(this, 2000, 'pd')" class="form-control" id="process_description" rows="1"></textarea>
														</div>
														<div class="form-group col-md-1">
															<button type="button" onclick="" class="form-control btn btn-lg btn-danger m-t-23 m-l-0">
																<i class="fa fa-trash" style="display: flex; align-items: center; justify-content: center;" aria-hidden="true"></i>
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

		function education_fields() {
			// <style>.input - group.form - control {margin - right: 70 px;}.elasticteste {min - width: 50 px;} </style>
			room--;
			var objTo = document.getElementById('education_fields')
			var divtest = document.createElement("div");
			divtest.setAttribute("class", "form-group removeclass" + room);
			divtest.setAttribute("id", 'removeclass[' + room + ']');
			var rdiv = 'removeclass' + room;
			divtest.innerHTML = '<div style="height: 65px;"><div class="col-sm-3"><input class="form-control" type="file" id="pdf_path[' + room + ']" name="pdf_path[]"></input></div><div class="col-sm-3"><textarea class="form-control" id="process_name[' + room + ']" name="process_name[] "></textarea></div><div class="col-sm-5"><textarea class="form-control" id="description[' + room + ']" name="description[]"></textarea></div><div class="col-sm-1"><button class="btn btn-danger" type="button" id="button[' + room + ']" onclick="remove_education_fields(' + room + ');"><span class="glyphicon glyphicon-minus" aria-hidden="true"></span></button></div></div>';
			objTo.appendChild(divtest);
		}

		function remove_education_fields(rid) {
			$('.removeclass' + rid).remove();
		}

		/**
		 * Weekly Report
		 * 
		 * Getting the process name based on process group
		 * selected, using ajax calls.
		 */
		$(document).on('change', '#process_group', function() {
			var select = $('select#process_name');
			var valueProcessGroup = $('select#process_group option:selected').val();

			$(select).empty().append($('#process_name'));
				
			$.ajax({
				url: "<?= base_url('weekly-report/process-name-ajax') ?>",
				type: 'GET',
				dataType: 'html',
				async: true,
				success: function(data) { 
					var result = JSON.parse(data); 
					
					for (var i = 0; i < result.length; i++) {
						if (valueProcessGroup === result[i].pmbok_group_id) {
							$(select).append($('<option>', {
								value: result[i].pmbok_process_id,
								text: result[i].name
							}));
						}
					}
				}
			});
		});
	</script>