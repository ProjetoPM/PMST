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
				<?php elseif ($this->session->flashdata('error')) : ?>
					<div class="alert alert-warning">
						<a href="#" class="close" data-dismiss="alert">&times;</a>
						<strong><?php echo $this->session->flashdata('error'); ?></strong>
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
								<?= $this->lang->line('wr_title') ?>


							</h1>

							<form method="POST" action="<?php echo base_url() ?>weekly-report/update/<?php echo $weekly_report['weekly_report_id'] ?>">

								<div class=" col-lg-5 form-group">
									<label for="type"><?= $this->lang->line('we_name') ?></label>
									<select name="evaluation_id" class="form-control">
										<?php if ($weekly_report['weekly_evaluation_id'] != null) { ?>
											"<option value="<?php echo $weekly_report['weekly_evaluation_id'] ?>"><?= $this->lang->line('selected') ?></option>"
										<?php } ?>

										<?php foreach ($evaluation as $i) { ?>
											<option value="<?= $i->weekly_evaluation_id; ?>">
												<?= getWeeklyEvaluationName($i->weekly_evaluation_id); ?></option>
										<?php  } ?>
									</select>
								</div>

								<div class=" col-lg-6 form-group">
									<label for="tool_evaluation"><?= $this->lang->line('wr_tool_evaluation') ?></label>
									<a class="btn-sm btn-default" id="wr_tp_1" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('wr_tool_evaluation_tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
									<div>
										<textarea onkeyup="limite_textarea(this.value, 'wr_1')" id="wr_txt_1" maxlength="5000" oninput="eylem(this, this.value)" class="form-control elasticteste" name="tool_evaluation"><?php echo $weekly_report['tool_evaluation'] ?></textarea>
									</div>
								</div>

								<div class="row">
									<div class="col-lg-12">
										<div class="panel panel-default">
											<div class="panel-heading">
												<span class="gprc_1" style="font-size: 20px;"><?= $this->lang->line('wr_processes') ?></span>

											</div>

											<div class="panel-body">
												<span></span>

												<div class="col-sm-3 form-group">
													<div>
														<label for="process_name"><?= $this->lang->line('wr_process_name') ?></< /label>
													</div>
												</div>

												<div class="col-sm-6 form-group comments">
													<div>
														<label for="description"><?= $this->lang->line('wr_process_description') ?></label>
													</div>
												</div>

												<?php $room = 1; ?>

												<div id="education_fields">
												</div>
											</div>
											<?php
											// $json = json_encode($risk_check);

											$count = 1;
											foreach ($weekly_processes as $processes) {
											?>
												<div class="form-group removeclass<?php echo $count ?>" id="removeclass[<?php echo $count ?>]">

													<div class="col-sm-6 form-group">
														<div>
															<div class="input-group" style="width: 100%">
																<textarea style="text-align:left;" class="form-control elasticteste2" id="process_name[<?php echo $count ?>]" name="process_name[]"><?php echo $processes->process_name ?></textarea>
															</div>
														</div>
													</div>

													<div class="col-sm-6 form-group">
														<div>
															<div class="input-group" style="width: 100%">
																<textarea style="text-align:left;" class="form-control elasticteste2" id="process_name[<?php echo $count ?>]" name="process_name[]"><?php echo $processes->process_name ?></textarea>
															</div>
														</div>
													</div>

												</div>
											<?php
												$count++;
												$room++;
											}
											?>

										</div>
									</div>
									<!-- buttons -->
									<div class="col-lg-12">
										<button type="submit" style="margin-top: 30px;" class="btn btn-lg btn-success pull-right">
											<i class="glyphicon glyphicon-ok"></i> <?= $this->lang->line('btn-save') ?>
										</button>
							</form>
							<h1 class="page-header">
								Uploads
							</h1>
							<form action="" method="POST">
								<button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#upload"><i class="fa fa-plus-circle"></i> Upload</button>
							</form>


							<?php

							$this->load->view('upload/upload_pdf', $weekly_report['weekly_report_id']);
							$this->load->view('upload/retrieve_pdf', $weekly_report['weekly_report_id']);

							?>
							<form action="<?php echo base_url('weekly-report/list/'); ?><?php echo  $_SESSION['project_id']; ?>">
								<button style="margin-top: 30px;" class="btn btn-lg btn-info pull-left"> <i class="glyphicon glyphicon-chevron-left"></i> <?= $this->lang->line('btn-back') ?></button>
							</form>
						</div>
					</div>
				</div>
			</section>
		</div>
</body>

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
		divtest.innerHTML = '<div class="col-sm-3 form-group"> <div class="input-group" style="width: 100%"> <textarea required="true" class="form-control elasticteste2" style="text-align:left;" id="process_name[' + room + ']" name="process_name[] "></textarea> </div> </div><div class="col-sm-5 form-group"> <div> <div class="input-group" style="width: 100%"> <textarea style="text-align:left;" required="true" class="form-control elasticteste2" id="description[' + room + ']" name="description[]"></textarea> </div> </div> </div><div class="col-lg-1 form-group"> <div class="input-group" style="width: 100%"> <button class="btn btn-danger" type="button" id="button[' + room + ']" onclick="remove_education_fields(' + room + ');"> <span class="glyphicon glyphicon-minus" aria-hidden="true"></span> </button> </div> </div>';


		objTo.appendChild(divtest);

		// json[json.length].aspects = document.getElementById('aspects[' + room + ']').value;
		// json[json.length].weight = document.getElementById('weight[' + room + ']').value;
		// json[json.length].level = document.getElementById('level[' + room + ']').value;
		// json[json.length].score = document.getElementById('score[' + room + ']').value;
		// json[json.length].comments = document.getElementById('comments[' + room + ']').value;

	}

	function remove_education_fields(rid) {
		$('.removeclass' + rid).remove();
	}
</script>
<?php $this->load->view('frame/footer_view') ?>