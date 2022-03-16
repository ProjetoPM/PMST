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
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
						<strong><?php echo $this->session->flashdata('success'); ?></strong>
					</div>
				<?php elseif ($this->session->flashdata('error')) : ?>
					<div class="alert alert-warning">
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
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
						height: 90px;
					}
				</style>

				<div class="row">
					<div class="col-lg-12">

						<div class="panel-body">
							<h1 class="page-header">

								<?= $this->lang->line('wr_title')  ?>

							</h1>

							<form method="POST" action="<?php echo base_url('weekly-report/insert/'); ?>">

								<div class="col-lg-7 form-group">
									<label><?= $this->lang->line('we_name') ?></label>

									<select name="evaluation_id" size="1" class="form-control" tabindex="1" required>
										<option selected="selected" disabled="disabled" value=""> Select </option>
										<?php foreach ($evaluation as $i) { ?>
											<?php if (verifyEvaluation($i->weekly_evaluation_id) == null) { ?>
												<option value="<?= $i->weekly_evaluation_id; ?>">
													<?= getWeeklyEvaluationName($i->weekly_evaluation_id); ?></option>
										<?php  }
										} ?>
									</select>
								</div>
								<div class="col-lg-6 form-group">
									<label><?= $this->lang->line('wr_process_group') ?></label>

									<select onchange="getGroup(this.value)" name="process_group" size="1" id="process_group" class="form-control" tabindex="1" required>
										<option selected="selected" disabled="disabled" value=""> Select </option>
										<?php foreach ($pmbok_processes as $i) { ?>
											<option value="<?= $i->process_group; ?>"><?= $i->process_group; ?>
											</option><?php  } ?>
									</select>
								</div>

								<div class="col-lg-6 form-group">
									<label><?= $this->lang->line('wr_process_name') ?></label>
									<select name="process_name" class="form-control" id="process_name"></select>
								</div>


								<div class=" col-lg-12 form-group">
									<label for="tool_evaluation"><?= $this->lang->line('wr_tool_evaluation') ?> *</label>
									<span class="wr_1">5000</span><?= $this->lang->line('character5') ?>
									<a class="btn-sm btn-default" id="wr_tp_1" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('wr_tool_evaluation_tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
									<div>
										<textarea onkeyup="limite_textarea(this.value, 'wr_1')" id="wr_txt_1" maxlength="5000" oninput="eylem(this, this.value)" class="form-control elasticteste" name="tool_evaluation"></textarea>
									</div>
								</div>

								<div class="row">
									<div class="col-lg-12">
										<div class="panel panel-default">
											<div class="panel-heading">
												<span class="gprc_1" style="font-size: 20px;"><?= $this->lang->line('wr_processes') ?></span>
												<button class="btn btn-success" type="button" onclick="education_fields()"> <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> </button>
											</div>

											<div class="panel-body">
												<div class="col-sm-3 form-group">
													<div>
														<label for="process_name"><?= $this->lang->line('wr_process_name') ?></label>
													</div>
												</div>

												<div class="col-sm-5 form-group comments">
													<div>
														<label for="description"><?= $this->lang->line('wr_process_description') ?></label>
													</div>
												</div>

												<?php $room = 1; ?>

												<div id="education_fields">
												</div>
											</div>

											<div class="col-lg-12">
												<button id="stakeholder-submit" style="margin-top: 30px;" type="submit" value="Save" class="btn btn-lg btn-success pull-right">
													<i class="glyphicon glyphicon-ok"></i> <?= $this->lang->line('btn-save') ?>
												</button>
							</form>

							<form action="<?php echo base_url("projects") ?>">
								<button style="margin-top: 30px;" class="btn btn-lg btn-info pull-left"> <i class="glyphicon glyphicon-chevron-left"></i> <?= $this->lang->line('btn-back') ?></button>
							</form>
						</div>
					</div>
				</div>
			</section>
		</div>
	</div>
</body>


<?php
$view = array(
	"name" => "weekly_report",
);
$this->load->view('upload/index', $view);
?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.10/jquery.mask.js"></script>
<script type="text/javascript">
	function testInput(event) {
		var value = String.fromCharCode(event.which);
		var pattern = new RegExp(/[a-zåäö ]/i);
		return pattern.test(value);
	}

	$('#name_text').bind('keypress', testInput);
</script>
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
		divtest.innerHTML = ' <div class="col-sm-3 form-group"> <div class="input-group" style="width: 100%"> <textarea required="true" class="form-control elasticteste2" style="text-align:left;" id="process_name[' + room + ']" name="process_name[] "></textarea> </div> </div><div class="col-sm-5 form-group"> <div> <div class="input-group" style="width: 100%"> <textarea style="text-align:left;" required="true" class="form-control elasticteste2" id="description[' + room + ']" name="description[]"></textarea> </div> </div> </div><div class="col-lg-1 form-group"> <div class="input-group" style="width: 100%"> <button class="btn btn-danger" type="button" id="button[' + room + ']" onclick="remove_education_fields(' + room + ');"> <span class="glyphicon glyphicon-minus" aria-hidden="true"></span> </button> </div> </div>';


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

	function getGroup(process_group){
		const names = new Array('Teste', 'Teste 2')
		console.log(names.indexOf('Teste'))
			xmlhttp = new XMLHttpRequest(),
			select = document.getElementById('process_name');
			xmlhttp.onreadystatechange = function(){
				if(this.readyState == 4 && this.status == 200){
					// console.log(process_group);

					arr = eval(this.responseText);

					// console.log(select.innerHTML);
					if(arr.length > 0){
						select.innerHTML = '';

						for(let i = 0; i < arr.length; i++){
							var opt = document.createElement('option');
							var process = arr[i]['name'];

							opt.value = arr[i]['pmbok_id'];
							opt.innerHTML = process;
							select.appendChild(opt);
						}
					}
				}
			}
			xmlhttp.open("GET", "../WeeklyReport/getProcesses/" + process_group, true);
			xmlhttp.send();
	}



</script>
<?php $this->load->view('frame/footer_view') ?>