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

								<?= $this->lang->line('we_title')  ?>

							</h1>
							<?php extract($weekly_evaluation) ?>

							<form method="POST" action="<?php echo base_url() ?>weekly-evaluation/update/<?php echo $weekly_evaluation[0]->weekly_evaluation_id ?>">


								<div class=" col-lg-3 form-group">
									<label for="name"><?= $this->lang->line('we_name') ?> </label>
									<div>
										<input type="text" class="form-control" id="name" name="name" maxlength="255" value="<?php echo $weekly_evaluation[0]->name ?>">
									</div>
								</div>

								<div class="col-lg-3 form-group">
									<label><?= $this->lang->line('we_start_date') ?></label>
									<div>
										<input autocomplete="off" class="form-control input-md" id="date" placeholder="YYYY/MM/DD" type="date" name="start_date" required="true" value="<?php echo $weekly_evaluation[0]->start_date ?>" />
									</div>
								</div>

								<div class=" col-lg-3 form-group">
									<label><?= $this->lang->line('we_end_date') ?></label>
									<div>
										<input autocomplete="off" class="form-control input-md" id="date" placeholder="YYYY/MM/DD" type="date" name="end_date" required="true" value="<?php echo $weekly_evaluation[0]->end_date ?>" />
									</div>
								</div>

								<div class=" col-lg-3 form-group">
									<label><?= $this->lang->line('we_deadline') ?></label>
									<div>
										<input autocomplete="off" class="form-control input-md" id="date" placeholder="YYYY/MM/DD" type="date" name="deadline" required="true" value="<?php echo $weekly_evaluation[0]->deadline ?>" />
									</div>
								</div>
								
								<div class=" col-lg-5 form-group">
									<label for="type"><?= $this->lang->line('we_type') ?></label>
									<select name="type" class="form-control">
										<?php if($weekly_evaluation[0]->individual_or_group != null) {?>
										"<option value="<?php echo $weekly_evaluation[0]->individual_or_group ?>" ><?= $this->lang->line('selected') ?></option>" 
										<?php } ?>
										<option value="0"><?= $this->lang->line('we_individual') ?></option>
										<option value="1"><?= $this->lang->line('we_group') ?></option>
									</select>
								</div>

								<div class="col-lg-5 form-group">
									<label for="status"><?= $this->lang->line('we_status') ?></label>
									<select name="status" class="form-control">
									<?php if($weekly_evaluation[0]->status != null) {?>
										"<option value="<?php echo $weekly_evaluation[0]->status ?>" ><?= $this->lang->line('selected') ?></option>" 
										<?php } ?>
										<option value="1"><?= $this->lang->line('we_open') ?></option>
										<option value="0"><?= $this->lang->line('we_closed') ?></option>
									</select>
								</div>

								<div class="col-lg-12">
									<button id="stakeholder-submit" style="margin-top: 30px;" type="submit" value="Save" class="btn btn-lg btn-success pull-right">
										<i class="glyphicon glyphicon-ok"></i> <?= $this->lang->line('btn-save') ?>
									</button>
							</form>

							<form action="<?php echo base_url("project/" . $_SESSION['project_id']) ?>">
								<button style="margin-top: 30px;" class="btn btn-lg btn-info pull-left"> <i class="glyphicon glyphicon-chevron-left"></i> <?= $this->lang->line('btn-back') ?></button>
							</form>
			</section>
		</div>
	</div>
</body>

<script>
	for (var i = 1; i <= 13; i++) {
		if (document.getElementById("wr_tp_" + i).title == "") {
			document.getElementById("wr_tp_" + i).hidden = true;
		}
		limite_textarea(document.getElementById("wr_txt_" + i).value, "wr_" + i);
	}

	function limite_textarea(valor, txt) {
		var limite = 5000;
		var caracteresDigitados = valor.length;
		var caracteresRestantes = limite - caracteresDigitados;
		$("." + txt).text(caracteresRestantes);
	}
</script>
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

<?php $this->load->view('frame/footer_view') ?>