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
						<a href="#" class="close" data-dismiss="alert">&times;</a>
						<strong><?php echo $this->session->flashdata('success'); ?></strong>
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

					.input-group .form-control {

						margin-right: 70px;
					}

					.elasticteste {
						min-height: 70px;
						/* min-width: 120px; */
						/* outline: 0; */
						resize: none;
						line-height: 20px;

					}
				</style>
				<div class="row">
					<div class="col-lg-12">

						<div class="panel-body">
							<h1 class="page-header">

								<?= $this->lang->line('tap-title')  ?>
								General Project Risk Checklist
							</h1>

							<div class="panel panel-default">
								<div class="panel-heading">Pontuação Total : 90%
									<button class="btn btn-success" type="button" onclick="education_fields();"> <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> </button>
								</div>

								<div class="panel-body">
									<div class="col-sm-3 nopadding" style="min-height: 20px;">
										<div class="form-group">
											<div class="input-group">
												<label for="question_description">Aspects</label>
											</div>
										</div>
									</div>

									<div class="col-sm-1 nopadding">
										<div class="form-group">
											<label for="question_description">weight</label>
										</div>
									</div>
									<div class="col-sm-1 nopadding">
										<div class="form-group">
											<label for="question_description">Level</label>
										</div>
									</div>
									<div class="col-sm-1 nopadding">
										<div class="form-group">
											<label for="question_description">Score</label>
										</div>
									</div>

									<div class="col-sm-5 nopadding">
										<div class="form-group">
											<div class="input-group">
												<label for="question_description">Comments</label>

											</div>
										</div>
									</div>

									<form method="POST" action="<?php echo base_url() ?>risk/risk-checklist/insert/<?php echo $_SESSION['project_id'] ?>">
										<?php $room = 1; ?>

										<div id="education_fields">

										</div>
										<div class="form-group removeclass<?php echo $room ?>">
											<?php
											
											$json = json_encode($risk_check);
											
											$count = 1;
											foreach ($risk_check as $risk) {
											?>
												<div class="col-sm-3 nopadding" style="min-height: 20px">
													<div class="form-group">
														<div class="input-group">
															<textarea class="form-control elasticteste" id="aspects[<?php echo $count ?>]" name="aspects[] " value=<?php echo $risk->aspects ?> maxlength="255"><?php echo $risk->aspects ?></textarea>
														</div>
													</div>
												</div>

												<div class="col-sm-1 nopadding">
													<div class="form-group"> <input onchange="calcula(this)" onkeypress="return somenteNumeros(event)" type="text" maxlength="2" class="form-control elasticteste" id="weight[<?php echo $count ?>]" name="weight[]" value=<?php echo $risk->weight ?>></div>
												</div>
												<div class="col-sm-1 nopadding">
													<div class="form-group"> <input onkeypress="return somenteNumeros(event)" maxlength="2" type="text" class="form-control elasticteste" id="level[<?php echo $count ?>]" name="level[]" value=<?php echo $risk->level ?>></div>
												</div>
												<div class="col-sm-1 nopadding">
													<div class="form-group"><input type="text" class="form-control elasticteste" id="score[<?php echo $count ?>]" name="score[]" value=<?php echo $risk->score ?> readonly></div>
												</div>
												<div class="col-sm-4 nopadding">
													<div class="form-group">
														<div class="input-group">
															<textarea style="width:380px" class="form-control elasticteste" id="comments[<?php echo $count ?>]" name="comments[]" value=<?php echo $risk->comments ?> maxlength="255"><?php echo $risk->comments ?></textarea>
															<div class="input-group-btn"><button style="margin-left:-75px;" class="btn btn-danger" type="button" onclick="remove_education_fields(<?php echo $room++ ?>);"> <span class="glyphicon glyphicon-minus" aria-hidden="true"></span> </button></div>
														</div>
													</div>
												</div>
										</div>
									<?php
												$count++;
											}
									?>

									<!-- buttons -->
									<div class="col-lg-12">
										<button type="submit" class="btn btn-lg btn-success pull-right">
											<i class="glyphicon glyphicon-ok"></i> <?= $this->lang->line('btn-save') ?>
										</button>

									</form>

									<form action="<?php echo base_url('project/'); ?><?php echo  $_SESSION['project_id']; ?>">
										<button class="btn btn-lg btn-info pull-left"> <i class="glyphicon glyphicon-chevron-left"></i> <?= $this->lang->line('btn-back') ?></button>
									</form>
								</div>
							</div>
						</div>
			</section>
		</div>
	</div>
</body>
<script>
	var room = 0;
	var jsonrisk = <?php echo $json ?>;


	function education_fields() {
		// <style>.input - group.form - control {margin - right: 70 px;}.elasticteste {min - width: 50 px;} </style>
		room--;
		var objTo = document.getElementById('education_fields')
		var divtest = document.createElement("div");
		divtest.setAttribute("class", "form-group removeclass" + room);
		var rdiv = 'removeclass' + room;
		divtest.innerHTML = ' <div class="col-sm-3 nopadding" style="min-height: 20px;"><div class="form-group"><div class="input-group"><textarea class="form-control elasticteste" id="aspects[' + room + ']" name="aspects[]" maxlength="255"></textarea></div></div></div><div class="col-sm-1 nopadding"><div class="form-group"> <input onkeypress="return somenteNumeros(event)" type="text" class="form-control elasticteste" id="weight[' + room + ']" name="weight[]" maxlength="2" ></div></div><div class="col-sm-1 nopadding"><div class="form-group"> <input type="text" onkeypress="return somenteNumeros(event)" maxlength="2" class="form-control elasticteste" id="level[' + room + ']" name="level[]" value="0" ></div></div><div class="col-sm-1 nopadding"><div class="form-group"><input type="text" class="form-control elasticteste" id="score[' + room + ']" name="score[]" disabled value="0" ></div></div><div class="col-sm-5 nopadding"><div class="form-group"><div class="input-group"><textarea class="form-control elasticteste" id="comments[' + room + ']" name="comments[]" maxlength="255"></textarea><div class="input-group-btn"><button class="btn btn-danger" type="button" onclick="remove_education_fields(' + room + ');"> <span class="glyphicon glyphicon-minus" aria-hidden="true"></span> </button></div></div></div></div>';


		objTo.appendChild(divtest);

		json[json.length].aspects = document.getElementById('aspects[' + room + ']').value;
		json[json.length].weight = document.getElementById('weight[' + room + ']').value;
		json[json.length].level = document.getElementById('level[' + room + ']').value;
		json[json.length].score = document.getElementById('score[' + room + ']').value;
		json[json.length].comments = document.getElementById('comments[' + room + ']').value;

	}

	function remove_education_fields(rid) {
		$('.removeclass' + rid).remove();
	}

	alert('nome: ' + $jsonrisk);
	for (var x = 0; x < jsonrisk.length; x++) {
		// number = parseInt(document.getElementById(json[x]).value);

		var weight = document.getElementById('weight[' + x + ']').value;
		var level = document.getElementById('level[' + x + ']').value;
		var aux = ((weight / 100) - ((level * 10) / 100));
		document.getElementById('score[' + x + ']').value = aux;
	}

	// var jsonJS = <?= $json ?>;
	//isso é um objeto json, então para acessar os valores trate ele como objeto:
	// alert('nome: ' + jsonJS[0].level);

	// var agregate_value = document.getElementById('agregate_value').value;
	// var real_agregate_cost = document.getElementById('real_agregate_cost').value;
	// var aux = ((agregate_value) - (real_agregate_cost));
	// document.getElementById('variation_at_the_end').value = aux;
</script>

<script>
	function somenteNumeros(e) {
		var charCode = e.charCode ? e.charCode : e.keyCode;
		// charCode 8 = backspace   
		// charCode 9 = tab

		if (charCode != 8 && charCode != 9) {
			// charCode 48 equivale a 0   
			// charCode 57 equivale a 9
			if (charCode < 48 || charCode > 57) {
				return false;
			}
		};


	}
</script>
<?php $this->load->view('frame/footer_view') ?>
<!-- <div class="col-sm-1 nopadding"><div class="form-group"><input type="text" class="form-control" id="score" name="score[]" value="" placeholder="Degree"></div></div><div class="col-sm-5 nopadding"><div class="form-group"><div class="input-group"><textarea class="form-control" id="question_description" name="question_description" maxlength="255"></textarea><div class="input-group-btn"><button class="btn btn-success" type="button" onclick="education_fields();"> <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> </button></div></div></div></div> -->
<!-- <div class="col-sm-1 nopadding"><div class="form-group"><input type="text" class="form-control" id="score" name="score[]" value="" placeholder="Degree"></div></div><div class="col-sm-5 nopadding"><div class="form-group"><div class="input-group"><textarea class="form-control" id="question_description" name="question_description" maxlength="255"></textarea><div class="input-group-btn"><button class="btn btn-danger" type="button" onclick="remove_education_fields('+ room +');"> <span class="glyphicon glyphicon-minus" aria-hidden="true"></span> </button></div></div></div></div> -->
<!-- <button class="btn btn-danger" type="button" onclick="remove_education_fields('+ room +');"> <span class="glyphicon glyphicon-minus" aria-hidden="true"></span> </button> -->