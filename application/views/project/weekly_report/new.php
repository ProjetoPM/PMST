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
									<label for="tool_evaluation"><?= $this->lang->line('wr_tool_evaluation') ?> *</label>
									<span class="wr_1">5000</span><?= $this->lang->line('character5') ?>
									<a class="btn-sm btn-default" id="wr_tp_1" data-toggle="tooltip" data-placement="right" 
											title="<?= $this->lang->line('wr_tool_evaluation_tp') ?>">
										<i class="glyphicon glyphicon-comment"></i>
									</a>
									<div>
										<textarea oninput="eylem(this, this.value)" 
												onkeyup="limite_textarea(this.value, 'wr_1')" 
												class="form-control" name="tool_evaluation" 
												id="wr_txt_1" maxlength="5000" required></textarea>
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
	</script>
	<script src="<?= base_url() ?>assets/js/jquery-2.1.3.min.js"></script>
	<script src="<?= base_url() ?>assets/js/jquery.dataTables.min.js"></script>
	<script src="<?= base_url() ?>assets/js/dataTables.bootstrap.js"></script>
	<script src="<?= base_url() ?>assets/js/dataTables.responsive.js"></script>

	<!-- JavaScript -->
	<script src="//cdn.jsdelivr.net/npm/alertifyjs@1.11.2/build/alertify.min.js"></script>
	<!-- CSS -->
	<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.11.2/build/css/alertify.min.css">
