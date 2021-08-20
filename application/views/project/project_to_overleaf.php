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
	const latex1 = document.getElementById('latex').value;
	var allkw_names = [];
	var allkw = <?= $json ?>;
	//  console.log(latex[0]);

	function scanner() {
		document.getElementById('latex').value = latex1;
		var text = "";
		for (let index = 0; index < allkw_names.length; index++) {
			remove_snip(allkw_names[index]);
			text = text + addKW(allkw_names[index]);
		}
	}

	function addKW(kw) {
		var latex_provisorio = document.getElementById('latex').value;

		for (let index = 0; index < allkw.name[kw].length; index++) {
			latex_provisorio = latex_provisorio + allkw.name[kw][index]["task"];
			create_snip(kw, allkw.name[kw][index]["name_task"], allkw.name[kw][index]["task"]);
		}
		document.getElementById('latex').value = latex_provisorio;
	}

	$("#integration").click(function() {
		if ($("#integration").is(":checked") == false) {
			allkw_names.splice(allkw_names.indexOf("integration"), 1);
			remove_snip("integration");
			scanner();
		} else {
			allkw_names.push("integration");
			scanner();
		}
	});

	$("#scope").click(function() {
		if ($("#scope").is(":checked") == false) {
			allkw_names.splice(allkw_names.indexOf("scope"), 1);
			remove_snip("scope");
			scanner();
		} else {
			allkw_names.push("scope");
			scanner();
		}
	});



	function create_snip(area, name, info) {
		// Snips
		var objTo = document.getElementById('snips');
		var divtest = document.createElement("div");
		divtest.setAttribute("class", "snips_" + area);
		divtest.innerHTML = ' <input type="hidden" name="snip[]" value="' + info + '">';
		objTo.appendChild(divtest);


		// Snips Names
		var objTo2 = document.getElementById('snips_names');
		var divtest2 = document.createElement("div");
		divtest2.setAttribute("class", "snips_names_" + area);
		divtest2.innerHTML = '<input type="hidden" name="snip_name[]" value="' + name + '">';
		objTo2.appendChild(divtest2);

	}

	function remove_snip(area) {
		removeElement('snips_' + area);
		removeElement('snips_names_' + area);
	}

	function removeElement(id) {
		var list = document.getElementsByClassName(id);
		for (var i = list.length - 1; 0 <= i; i--)
			if (list[i] && list[i].parentElement)
				list[i].parentElement.removeChild(list[i]);
	}
</script>
<?php $this->load->view('frame/footer_view') ?>