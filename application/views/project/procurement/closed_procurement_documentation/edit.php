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

				<div class="row">
					<div class="col-lg-12">
						<div class="panel-body">
							<h1 class="page-header">

								<?= $this->lang->line('cpd_title')  ?>

							</h1>
							<?php extract($stakeholder); ?>

							<form action="<?= base_url() ?>stakeholder/stakeholder-register/update/<?php echo $stakeholder_id; ?>" method="post">

								<input type="hidden" name="project_id" value="<?php echo $project_id; ?>">
								<input type="hidden" name="status" value="1">

								<div class="col-lg-5 form-group">
									<label for="name"><?= $this->lang->line('cpd_provider') ?> *</label>
									<a class="btn-sm btn-default" id="cpd_tp_1" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('cpd_provider_tooltip') ?>"><i class="glyphicon glyphicon-comment"></i></a>
									<div>
										<input id="name_text" name="name" type="text" class="form-control input-md" required="true" value="<?php echo $name; ?>">
									</div>
								</div>

								<div class="col-lg-5 form-group">
									<label for="supplier_representative"><?= $this->lang->line('cpd_supplier_representative') ?> *</label>
									<a class="btn-sm btn-default" id="cpd_tp_2" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('cpd_supplier_representative_tooltip') ?>"><i class="glyphicon glyphicon-comment"></i></a>
									<div>
										<input id="supplier_representative_text" name="supplier_name" type="text" class="form-control input-md" required="true" value="<?php echo $name; ?>">
									</div>
								</div>
		
								<div class="col-lg-12">
									<button id="stakeholder-submit" type="submit" value="Save" class="btn btn-lg btn-success pull-right">
										<i class="glyphicon glyphicon-ok"></i> <?= $this->lang->line('btn-save') ?>
									</button>
							</form>
							<form action="<?php echo base_url('stakeholder/stakeholder-register/list/');  ?><?php echo $_SESSION['project_id']; ?>">
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
	for (var i = 1; i <= 13; i++) {
		if (document.getElementById("shr_tp_" + i).title == "") {
			document.getElementById("shr_tp_" + i).hidden = true;
		}
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