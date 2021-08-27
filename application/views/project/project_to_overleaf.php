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
					.form-check-label {
						font-size: larger;
					}
				</style>

				<div class="row">
					<div class="col-lg-12">
						<div class="panel-body">
							<h1 class="page-header">
								Overleaf Project
								<!-- <?= $this->lang->line('qmp_title')  ?> -->

							</h1>

							<div class="form-check form-check-inline">
								<input class="form-check-input" type="checkbox" id="integration" value="Integration">
								<label class="form-check-label"><?= $this->lang->line('overleaf_integration') ?></label>
							</div>
							<div class="form-check form-check-inline">
								<input class="form-check-input" type="checkbox" id="scope" value="Scope">
								<label class="form-check-label"><?= $this->lang->line('overleaf_scope') ?></label>
							</div>
							<div class="form-check form-check-inline">
								<input class="form-check-input" type="checkbox" id="schedule" value="Schedule">
								<label class="form-check-label"><?= $this->lang->line('overleaf_schedule') ?></label>
							</div>
							<div class="form-check form-check-inline">
								<input class="form-check-input" type="checkbox" id="cost" value="cost">
								<label class="form-check-label"><?= $this->lang->line('overleaf_cost') ?></label>
							</div>
							<div class="form-check form-check-inline">
								<input class="form-check-input" type="checkbox" id="quality" value="quality">
								<label class="form-check-label"><?= $this->lang->line('overleaf_quality') ?></label>
							</div>
							<div class="form-check form-check-inline">
								<input class="form-check-input" type="checkbox" id="resources" value="resources">
								<label class="form-check-label"><?= $this->lang->line('overleaf_resources') ?></label>
							</div>
							<div class="form-check form-check-inline">
								<input class="form-check-input" type="checkbox" id="risk" value="risk">
								<label class="form-check-label"><?= $this->lang->line('overleaf_risk') ?></label>
							</div>
							<div class="form-check form-check-inline">
								<input class="form-check-input" type="checkbox" id="procurement" value="procurement">
								<label class="form-check-label"><?= $this->lang->line('overleaf_procurement') ?></label>
							</div>
							<div class="form-check form-check-inline">
								<input class="form-check-input" type="checkbox" id="stakeholder" value="stakeholder">
								<label class="form-check-label"><?= $this->lang->line('overleaf_stakeholder') ?></label>
							</div>
							<br></br>
							<div class=" col-lg-12 form-group">
								<label style="font-size: larger;">Latex </label>
								<a class="btn-sm btn-default" id="" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('') ?>"><i class="glyphicon glyphicon-comment"></i></a>
								<div>
									<textarea id="latex" style="height: 500px;" class="form-control elasticteste"><?php echo $template ?></textarea>
								</div>
							</div>

							<form action="https://www.overleaf.com/docs" method="post" target="_blank">

								<!-- template -->
								<input type="hidden" name="snip[]" value="<?php echo $template ?>"><br>

								<div id="snips"></div>

								<!-- template -->
								<input type="hidden" name="snip_name[]" value="main.tex"><br>

								<div id="snips_names"></div>


								<div class="col-lg-12">
									<button id="" type="submit" value="Save" class="btn btn-lg btn-success pull-right">
										<i class="glyphicon glyphicon-ok"></i> Open in Overleaf
									</button>
							</form>

							<form action="<?php echo base_url('projects'); ?><?php echo $_SESSION['project_id']; ?>">
								<button class="btn btn-lg btn-info pull-left"> <i class="glyphicon glyphicon-chevron-left"></i> <?= $this->lang->line('btn-back') ?></button>
							</form>


						</div>
					</div>
				</div>
			</section>
		</div>
	</div>
	<?php //echo $knowledge_areas["integration"][1]["task"];
	$json = json_encode($knowledge_areas); ?>
</body>
<script src="<?= base_url() ?>assets/js/jquery-1.11.1.js" type="text/javascript"></script>

<script>
	var latex1 = document.getElementById('latex').value;

	$("#integration").click(function() {
		if ($("#integration").is(":checked") == false) {
			document.getElementById('latex').value = latex1;
			remove_snip("integration");
		} else {
			var latex_provisorio = latex1;
			var kw = <?= $json ?>;
			// console.log(integration.integration.length);
			for (let index = 0; index < kw.integration.length; index++) {
				latex_provisorio = latex_provisorio + kw.integration[index]["task"];
				create_snip("integration", kw.integration[index]["name_task"], kw.integration[index]["task"]);
				console.log(latex_provisorio);
			}

			document.getElementById('latex').value = latex_provisorio;
		}

	});


	$("#scope").click(function() {
		if ($("#scope").is(":checked") == false) {
			document.getElementById('latex').value = latex1;
			remove_snip("scope");
		} else {
			var latex_provisorio = latex1;
			var kw = <?= $json ?>;
			for (let index = 0; index < kw.scope.length; index++) {
				latex_provisorio = latex_provisorio + kw.scope[index]["task"];
				create_snip("scope", kw.scope[index]["name_task"], kw.scope[index]["task"]);
				console.log(latex_provisorio);
			}

			document.getElementById('latex').value = latex_provisorio;
		}

	});
	
	$("#schedule").click(function() {
		if ($("#schedule").is(":checked") == false) {
			document.getElementById('latex').value = latex1;
			remove_snip("schedule");
		} else {
			var latex_provisorio = latex1;
			var kw = <?= $json ?>;
			for (let index = 0; index < kw.schedule.length; index++) {
				latex_provisorio = latex_provisorio + kw.schedule[index]["task"];
				create_snip("schedule", kw.schedule[index]["name_task"], kw.schedule[index]["task"]);
				console.log(latex_provisorio);
			}

			document.getElementById('latex').value = latex_provisorio;
		}

	});

	$("#cost").click(function() {
		if ($("#cost").is(":checked") == false) {
			document.getElementById('latex').value = latex1;
			remove_snip("cost");
		} else {
			var latex_provisorio = latex1;
			var kw = <?= $json ?>;
			for (let index = 0; index < kw.cost.length; index++) {
				latex_provisorio = latex_provisorio + kw.cost[index]["task"];
				create_snip("cost", kw.cost[index]["name_task"], kw.cost[index]["task"]);
				console.log(latex_provisorio);
			}

			document.getElementById('latex').value = latex_provisorio;
		}

	});

	$("#quality").click(function() {
		if ($("#quality").is(":checked") == false) {
			document.getElementById('latex').value = latex1;
			remove_snip("quality");
		} else {
			var latex_provisorio = latex1;
			var kw = <?= $json ?>;
			for (let index = 0; index < kw.quality.length; index++) {
				latex_provisorio = latex_provisorio + kw.quality[index]["task"];
				create_snip("quality", kw.quality[index]["name_task"], kw.quality[index]["task"]);
				console.log(latex_provisorio);
			}

			document.getElementById('latex').value = latex_provisorio;
		}

	});

	$("#resources").click(function() {
		if ($("#resources").is(":checked") == false) {
			document.getElementById('latex').value = latex1;
			remove_snip("resources");
		} else {
			var latex_provisorio = latex1;
			var kw = <?= $json ?>;
			for (let index = 0; index < kw.resources.length; index++) {
				latex_provisorio = latex_provisorio + kw.resources[index]["task"];
				create_snip("resources", kw.resources[index]["name_task"], kw.resources[index]["task"]);
				console.log(latex_provisorio);
			}

			document.getElementById('latex').value = latex_provisorio;
		}

	});

	$("#risk").click(function() {
		if ($("#risk").is(":checked") == false) {
			document.getElementById('latex').value = latex1;
			remove_snip("risk");
		} else {
			var latex_provisorio = latex1;
			var kw = <?= $json ?>;
			for (let index = 0; index < kw.risk.length; index++) {
				latex_provisorio = latex_provisorio + kw.risk[index]["task"];
				create_snip("risk", kw.risk[index]["name_task"], kw.risk[index]["task"]);
				console.log(latex_provisorio);
			}

			document.getElementById('latex').value = latex_provisorio;
		}

	});

	$("#procurement").click(function() {
		if ($("#procurement").is(":checked") == false) {
			document.getElementById('latex').value = latex1;
			remove_snip("procurement");
		} else {
			var latex_provisorio = latex1;
			var kw = <?= $json ?>;
			for (let index = 0; index < kw.procurement.length; index++) {
				latex_provisorio = latex_provisorio + kw.procurement[index]["task"];
				create_snip("procurement", kw.procurement[index]["name_task"], kw.procurement[index]["task"]);
				console.log(latex_provisorio);
			}

			document.getElementById('latex').value = latex_provisorio;
		}

	});
	$("#stakeholder").click(function() {
		if ($("#stakeholder").is(":checked") == false) {
			document.getElementById('latex').value = latex1;
			remove_snip("stakeholder");
		} else {
			var latex_provisorio = latex1;
			var kw = <?= $json ?>;
			for (let index = 0; index < kw.stakeholder.length; index++) {
				latex_provisorio = latex_provisorio + kw.stakeholder[index]["task"];
				create_snip("stakeholder", kw.stakeholder[index]["name_task"], kw.stakeholder[index]["task"]);
				console.log(latex_provisorio);
			}

			document.getElementById('latex').value = latex_provisorio;
		}

	});
	function create_snip(area, name, info) {
		// Snips
		var objTo = document.getElementById('snips')
		var divtest = document.createElement("div");
		divtest.setAttribute("id", "snips_" + area);
		divtest.innerHTML = ' <input type="hidden" name="snip[]" value="' + info + '">';
		objTo.appendChild(divtest);


		// Snips Names
		var objTo2 = document.getElementById('snips_names')
		var divtest2 = document.createElement("div");
		divtest2.setAttribute("id", "snips_names_" + area);
		divtest2.innerHTML = '<input type="hidden" name="snip_name[]" value="' + name + '">';
		objTo2.appendChild(divtest2);

	}

	function remove_snip(area) {
		$('#snips_' + area).remove();
		$('#snips_names_' + area).remove();
	}
</script>
<?php $this->load->view('frame/footer_view') ?>