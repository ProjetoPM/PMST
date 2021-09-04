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

				<?php extract($quality_check) ?>
				<div class="row">
					<div class="col-lg-12">
						<div class="panel-body">
							<h1 class="page-header">

								Quality Checklist
							</h1>
							<form method="POST" action="<?php echo base_url() ?>quality/quality-checklist/update/<?php echo $quality_checklist_id ?>">
								<div class="col-lg-4 form-group">
									<label for="verified">Verified Product, Process or Activity</label>
									<div>
										<input name="verified" type="text" class="form-control input-md" value="<?= $verified; ?>">
									</div>
								</div>

								<div class="col-sm-4 form-group">
									<label for="date">Verification date</label>
									<div>
										<input id="date" type="date" name="date" class="form-control input-md" value="<?php echo $date; ?>">
									</div>
								</div>


								<div class="col-lg-4 form-group">
									<label for="responsible">Responsible for Verification</label>
									<div>
										<input name="responsible" type="text" class="form-control input-md" value="<?= $responsible; ?>">
									</div>
								</div>

								<div class="col-lg-12 form-group">
									<label for="documents">Associated Documents</label>
									<div>
										<textarea oninput="eylem(this, this.value)" class="form-control elasticteste" name="documents"><?php echo $documents; ?></textarea>
									</div>
								</div>

								<div class="col-lg-12 form-group">
									<label for="guidelines">Guidelines / Comments</label>
									<div>
										<textarea oninput="eylem(this, this.value)" class="form-control elasticteste" name="guidelines"><?php echo $guidelines; ?></textarea>
									</div>
								</div>


								<div class="row">
									<div class="col-lg-12">
										<div class="panel panel-default">
											<div class="panel-heading">
												<span class="gprc_1" style="font-size: 20px;">Items </span>
												<button class="btn btn-success" type="button" onclick="education_fields()"> <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> </button>
											</div>

											<div class="panel-body">
												<div class="col-sm-3 form-group" style="min-height: 20px;">
													<div>
														<label for="">Items to Check</label>
													</div>
												</div>

												<div class="col-sm-6 form-group">
													<div>
														<label for="">Comments</label>
													</div>
												</div>

												<div class="col-sm-3 form-group">
													<div>
														<label for="">Status</label>
													</div>
												</div>


												<?php $room = 1; ?>

												<!-- <input type="hidden" name="status" value="1"> -->

												<div id="education_fields">

												</div>
												<?php
												// $json = json_encode($risk_check);

												$count = 1;
												foreach ($quality_itens as $quality) {
												?>
													<div class="form-group removeclass<?php echo $count ?>" id="removeclass[<?php echo $count ?>]">

														<div class="col-sm-3 form-group">
															<div class="input-group" style="width: 100%">
																<textarea class="form-control elasticteste2" style="text-align:left;" id="item_check[<?php echo $count ?>]" name="item_check[] "><?php echo $quality->item_check ?></textarea>
															</div>
														</div>
														<div class="col-sm-6 form-group">
															<div>
																<div class="input-group" style="width: 100%">
																	<textarea style="text-align:left;" class="form-control elasticteste2" id="comments[<?php echo $count ?>]" name="comments[]"><?php echo $quality->comments ?></textarea>
																</div>
															</div>
														</div>
														<div class="col-lg-2 form-group">
															<div class="input-group" style="width: 100%">
																<select id="status[<?php echo $count ?>]" name="status[]" class="form-control" required>
																	<option selected disabled value=""> select </option>
																	<option value="0" <?php if ($quality->status == 0) echo 'selected'; ?>>No OK</option>
																	<option value="1" <?php if ($quality->status == 1) echo 'selected'; ?>>Partially OK</option>
																	<option value="2" <?php if ($quality->status == 2) echo 'selected'; ?>>Ok</option>
																</select>
															</div>
														</div>
														<div class="col-lg-1 form-group">
															<div class="input-group" style="width: 100%">
																<button class="btn btn-danger" type="button" id="button[<?php echo $count ?>]" onclick="remove_education_fields(<?php echo $count ?>);"> <span class="glyphicon glyphicon-minus" aria-hidden="true"></span> </button>
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

							<form action="<?php echo base_url('quality/quality-checklist/list/'); ?><?php echo  $_SESSION['project_id']; ?>">
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
		divtest.innerHTML = '<div class="col-sm-3 form-group"> <div class="input-group" style="width: 100%"> <textarea class="form-control elasticteste2" style="text-align:left;" id="item_check['+ room +']" name="item_check[] "></textarea> </div> </div> <div class="col-sm-6 form-group"> <div> <div class="input-group" style="width: 100%"> <textarea style="text-align:left;" class="form-control elasticteste2" id="comments['+ room +']" name="comments[]"></textarea> </div> </div> </div> <div class="col-lg-2 form-group"> <div class="input-group" style="width: 100%"> <select id="status['+ room +']" name="status[]" class="form-control" required> <option selected disabled value=""> Select </option> <option value="0"; >No OK</option> <option value="1"; >Partially OK</option> <option value="2"; >Ok</option> </select> </div> </div> <div class="col-lg-1 form-group"> <div class="input-group" style="width: 100%"> <button class="btn btn-danger" type="button" id="button['+ room +']" onclick="remove_education_fields('+ room +');"> <span class="glyphicon glyphicon-minus" aria-hidden="true"></span> </button> </div> </div>';


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