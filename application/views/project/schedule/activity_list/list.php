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
				<!-- /.row -->
				<div class="row">
					<div class="col-lg-12">
						<div class="panel-body">
							<h1 class="page-header">
								<?= $this->lang->line('al_title')  ?>

								<?php $view_name = "activity list"?>
								<?php $this->load->view('construction_services/rating', array(
									"view_name" => $view_name,
								)) ?>
							</h1>
							<div class="row">
								<div class="col-lg-12">
									<button class="btn btn-info btn-lg" onclick="window.location.href='<?php echo base_url() ?>schedule/activity-list/new/<?php echo $project_id ?>'"><i class="fa fa-plus-circle"></i> <?= $this->lang->line('btn-new') ?></button>
									<button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#milestone"><i class="fa fa-plus-circle"></i> Milestone Manager</button>
									<button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#phase"><i class="fa fa-plus-circle"></i> Project Phase Manager</button>
									<button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#upload"><i class="fa fa-plus-circle"></i> Upload</button>
								</div>
							</div>
							<br><br>

							<!-- Nav tabs
								<ul class="nav nav-tabs" id="myTab" role="tablist">
								<li class="nav-item active">
									<a class="nav-link show active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true" aria-expanded="true">Activity List</a>
								</li>
								<li class="nav-item">
									<a class="nav-link" id="milestone-tab" data-toggle="tab" href="#milestone" role="tab" aria-controls="milestone" aria-selected="false">Milestone</a>
								</li>
								<li class="nav-item">
									<a class="nav-link" id="phase-tab" data-toggle="tab" href="#phase" role="tab" aria-controls="phase" aria-selected="false">Project Phase</a>
								</li>
							</ul>
							
							<div class="tab-content" style="margin-top: 10px;">
								<div class="tab-pane fade show active in" id="home" role="tabpanel" aria-labelledby="home-tab"> -->
							<div class="row">
								<div class="col-lg-12">
									<table class="table table-bordered table-striped" id="tableNB">

										<thead>
											<tr>
												<th><?= $this->lang->line('al_label') ?></th>
												<th><?= $this->lang->line('al_project_phase') ?></th>
												<th><?= $this->lang->line('al_milestone') ?></th>
												<th><?= $this->lang->line('al_activity_name') ?></th>

												<th><?= $this->lang->line('btn-actions') ?></th>
											</tr>
										</thead>
										<tbody>
											<?php
											foreach ($activity as $a) {
											?>
												<tr dados='<?= json_encode($a); ?>'>
													<td><?php echo $a->associated_id; ?></td>
													<td><?php echo $a->project_phase; ?></td>
													<td><?php echo $a->milestone; ?></td>
													<td><?php echo $a->activity_name; ?></td>

													<td style="max-width: 10px">
														<div class="row" style="margin: auto">
															<div class="col-sm-3" style="padding-left: 5px">
																<form action="<?php echo base_url() ?>schedule/activity-list/edit/<?php echo $a->id; ?>" method="post">
																	<input type="hidden" name="project_id" value="<?= $a->project_id; ?>">
																	<button type="submit" class="btn btn-default"><em class="fa fa-pencil"></em><span class="hidden-xs"></span></button>
																</form>
															</div>
															<div class="col-sm-3" style="margin-left: 13px;">
																<button type="submit" class="btn btn-danger" onclick="deletar(<?= $a->project_id ?>, <?= $a->id; ?>)"><em class="fa fa-trash"></em><span class="hidden-xs"></span></button>
															</div>
														</div>
								</div>
								<!-- <div class="col-sm-3">
												<form target="_blank" action="<?php echo base_url() ?>TeamPerformanceEvaluation_PDF/pdfGenerator/<?php echo $a->id; ?>" method="post">
													<input type="hidden" name="project_id" value="<?= $project_id ?>">
													<button type="submit" class="btn btn-success" ><em class="glyphicon glyphicon-file"></em> to PDF<span class="hidden-xs"></span></button>
												</form>
											</div> -->
							</div>
							</td>
							</tr>
						<?php
											}
						?>
						</tbody>
						</table>


						<div class="row">
							<div class="col-lg-12">
								<form action="<?php echo base_url('project/'); ?><?php echo $project_id; ?>">
									<button class="btn btn-lg btn-info pull-left"> <i class="glyphicon glyphicon-chevron-left"></i> <?= $this->lang->line('btn-back') ?></button>
								</form>
							</div>
						</div>

						<!-- /.row -->


						<!--1º preencher o nome da view-->
						<?php $view = array(
							"name" => "activity_list",
						); ?>



						<!--Carrega as imagens do projeto de acordo com a view, utiliza id ou project_id pra pegar o id do projeto e criar a query-->
						<?php $this->load->view('upload/retrieve', $view) ?>

						</div>
					</div>
				</div>
		</div>
		</section>
	</div>
	</div>
</body>


<!--Carrega o form de envio e envia para ele o nome da view que tu setou -->
<?php $this->load->view('upload/index', $view) ?>




<!-- Modal Milestone -->
<div class="modal fade" id="milestone" role="dialog">
	<div class="modal-dialog">
		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h3 class="modal-title">Milestone Manager</h3>
			</div>
			<div class="modal-body">
				<div class="row">
					<div class="col-lg-12">

						<?php
						if ($milestone != null) {
						?>
							<table style="margin-top:10px ;" class="table table-bordered table-striped" id="tableMilestone">
								<thead>
									<tr>
										<th>Milestone List</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody>
									<?php
									foreach ($milestone as $item) {
									?>
										<tr dados='<?= json_encode($item); ?>'>
											<td><?php echo $item->milestone; ?></td>
											<td>
												<div class="row center">
													<div class="col-sm-4">
														<button type="button" class="btn btn-danger" onclick="deletarMilestone(<?= $item->milestone_id; ?>)"><em class="fa fa-trash"></em><span class="hidden-xs"></span></button>
													</div>
													</form>
												</div>
											</td>
										</tr>
									<?php
									}
									?>
								</tbody>
							</table>
						<?php
						} else {
						?>
							<div style="margin-bottom: 10px;">
								No milestone registered!
							</div>
						<?php
						}
						?>

						<form action="<?php echo base_url() ?>schedule/activity-list/milestone/insert" method="post">
							<div>
								<label>New Milestone</label>
								<input name="milestone" type="text" class="form-control input-md">
							</div>
					</div>
				</div>
			</div>

			<div class="modal-footer">
				<div class="row">
					<div class="col-lg-12">
						<button id="activity-submit" type="submit" value="Save" class="btn btn-lg btn-success pull-right">
							<i class="glyphicon glyphicon-ok"></i> <?= $this->lang->line('btn-save') ?>
						</button>
						</form>
						<button type="button" class="btn btn-lg btn-default pull-left" data-dismiss="modal">Close</button>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- Modal Milestone End -->

<!-- Modal Phase-->
<div class="modal fade" id="phase" role="dialog">
	<div class="modal-dialog">
		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h3 class="modal-title">Project Phase Manager</h3>
			</div>
			<div class="modal-body">
				<div class="row">
					<div class="col-lg-12">

						<?php
						if ($phase != null) {
						?>
							<table style="margin-top:10px ;" class="table table-bordered table-striped" id="tablePhase">
								<thead>
									<tr>
										<th>Project Phase List</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody>
									<?php
									foreach ($phase as $item) {
									?>
										<tr dados='<?= json_encode($item); ?>'>
											<td><?php echo $item->project_phase; ?></td>
											<td>
												<div class="row center">
													<div class="col-sm-4">
														<button type="button" class="btn btn-danger" onclick="deletarPhase(<?= $item->project_phase_id; ?>)"><em class="fa fa-trash"></em><span class="hidden-xs"></span></button>
													</div>
													</form>
												</div>
											</td>
										</tr>
									<?php
									}
									?>
								</tbody>
							</table>
						<?php
						} else {
						?>
							<div style="margin-bottom: 10px;">
								No Project Phase registered!
							</div>
						<?php
						}
						?>

						<form action="<?php echo base_url() ?>schedule/activity-list/project-phase/insert" method="post">
							<div>
								<label>New Project Phase</label>
								<input name="project_phase" type="text" class="form-control input-md">
							</div>
					</div>
				</div>
			</div>

			<div class="modal-footer">
				<div class="row">
					<div class="col-lg-12">
						<button id="phase-submit" type="submit" value="Save" class="btn btn-lg btn-success pull-right">
							<i class="glyphicon glyphicon-ok"></i> <?= $this->lang->line('btn-save') ?>
						</button>
						</form>
						<button type="button" class="btn btn-lg btn-default pull-left" data-dismiss="modal">Close</button>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- Modal Phase End -->
</body>



<?php $this->load->view('frame/footer_view') ?>


<script src="<?= base_url() ?>assets/js/jquery-2.1.3.min.js"></script>
<script src="<?= base_url() ?>assets/js/jquery.dataTables.min.js"></script>
<script src="<?= base_url() ?>assets/js/dataTables.bootstrap.js"></script>
<script src="<?= base_url() ?>assets/js/dataTables.responsive.js"></script>
<!-- JavaScript -->
<script src="//cdn.jsdelivr.net/npm/alertifyjs@1.11.2/build/alertify.min.js"></script>
<!-- CSS -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.11.2/build/css/alertify.min.css" />

<!--<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.1/jquery.min.js"></script>
					-->
<script type="text/javascript">
	'use strict'
	let table;


	$(document).ready(function() {
		table = $('#tableNB').DataTable({
			"columns": [{
					"data": "associated_id"
				},
				{
					"data": "project_phase"
				},
				{
					"data": "milestone"
				},
				{
					"data": "activity_name"
				},
				{
					"data": "btn-actions",
					"orderable": true
				}
			],
			"order": [
				[0, 'asc']
			]
		});
	});

	$("#tableNB tbody td.moreInformationTable").on("click", function() {
		let element = jQuery($(this)[0].parentNode);
		let tr = element.closest('tr');
		let row = table.row(tr);
		console.log(element)
		let dados = JSON.parse(element.attr("dados"));

		if (row.child.isShown()) {
			row.child.hide();
			tr.removeClass('shown');
		} else {
			row.child(format(dados)).show();
			tr.addClass('shown');
		}
	});

	function format(dados) {
		return '<table cellpadding="5" cellspacing="0" border="0" style="padding-left:50px;">' +
			'<tr>' +
			'<td><b><?= $this->lang->line('milestone') ?>:</b> </td>' +
			'<td>' + dados.milestone + '</td>' +
			'</tr>' +

			'</table>';
	}
</script>

<script type="text/javascript">
	function deletar(idProjeto, id) {
		//e.preventDefault();
		alertify.confirm('If you delete this activity also delete all tasks linked to it').setting({
			title: 'Alert!',
			'labels': {
				ok: 'Agree',
				cancel: 'Cancel'
			},
			'reverseButtons': false,
			'onok': function() {

				console.log(`Passei o ${idProjeto} e ${id}`);

				$.post("<?php echo base_url() ?>schedule/activity-list/delete/" + id, {
					project_id: idProjeto,
				});

				alertify.success('You agree.');
				location.reload();
				//location.reload();
			},
			'oncancel': function() {
				alertify.error('You did not agree.');
			}
		}).show();

	}

	function deletarMilestone(id) {
		//e.preventDefault();
		alertify.confirm('Do you agree?').setting({
			'labels': {
				ok: 'Agree',
				cancel: 'Cancel'
			},
			'reverseButtons': false,
			'onok': function() {

				$.post("<?php echo base_url() ?>schedule/activity-list/milestone/delete/" + id);

				alertify.success('You agree.');
				location.reload();
				//location.reload();
			},
			'oncancel': function() {
				alertify.error('You did not agree.');
			}
		}).show();
	}

	function deletarPhase(id) {
		//e.preventDefault();
		alertify.confirm('Do you agree?').setting({
			'labels': {
				ok: 'Agree',
				cancel: 'Cancel'
			},
			'reverseButtons': false,
			'onok': function() {

				$.post("<?php echo base_url() ?>schedule/activity-list/project-phase/delete/" + id);

				alertify.success('You agree.');
				location.reload();
				//location.reload();
			},
			'oncancel': function() {
				alertify.error('You did not agree.');
			}
		}).show();
	}
</script>