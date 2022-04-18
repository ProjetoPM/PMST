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
				<!-- /.row -->

				<style>
					@media (min-width: 1200px) {
						.texttd {
							display: block;
							width: 170px;
							overflow: hidden;
							white-space: nowrap;
							text-overflow: ellipsis;
						}
					}

					@media (max-width: 1199px) {
						.texttd {
							display: block;
							width: 90px;
							overflow: hidden;
							white-space: nowrap;
							text-overflow: ellipsis;
						}
					}

					@media (max-width: 1160px) {
						.texttd {
							display: block;
							width: 85px;
							overflow: hidden;
							white-space: nowrap;
							text-overflow: ellipsis;
						}
					}

					@media (max-width: 900px) {
						.texttd {
							display: block;
							width: 100px;
							overflow: hidden;
							white-space: nowrap;
							text-overflow: ellipsis;
						}
					}

					@media (min-width: 1200px) {
						.texttd2 {
							display: block;
							width: 650px;
							overflow: hidden;
							white-space: nowrap;
							text-overflow: ellipsis;
						}
					}

					@media (max-width: 1199px) {
						.texttd2 {
							display: block;
							width: 600px;
							overflow: hidden;
							white-space: nowrap;
							text-overflow: ellipsis;
						}
					}

					@media (max-width: 1160px) {
						.texttd2 {
							display: block;
							width: 500px;
							overflow: hidden;
							white-space: nowrap;
							text-overflow: ellipsis;
						}
					}

					@media (max-width: 900px) {
						.texttd2 {
							display: block;
							width: 100px;
							overflow: hidden;
							white-space: nowrap;
							text-overflow: ellipsis;
						}
					}
				</style>
				<div class="row">
					<div class="col-lg-12">

						<div class="panel-body">
							<h1 class="page-header">

								<?= $this->lang->line('shr_title')  ?>

							</h1>

							<div class="row">
								<div class="col-lg-12">

									<button class="btn btn-info btn-lg" onclick="window.location.href='<?php echo base_url() ?>stakeholder/stakeholder-register/new/<?php echo $project_id ?>'"><i class="fa fa-plus-circle"></i> <?= $this->lang->line('btn-new') ?></button>
								</div>
							</div>

							<br><br>
							<div class="row">
								<div class="col-lg-12">

									<table class="table table-bordered table-striped" id="table_stake">
										<thead>
											<tr>
												<th class="text-center">#</th>
												<th><?= $this->lang->line('shr_name') ?> *</th>
												<th><?= $this->lang->line('shr_organization') ?> *</th>
												<th><?= $this->lang->line('shr_position') ?> *</th>
												<th><?= $this->lang->line('shr_email') ?> *</th>
												<th><?= $this->lang->line('btn-actions') ?></th>
											</tr>
										</thead>
										<tbody>
											<?php
											foreach ($stakeholder as $item) {
											?>
												<tr dados='<?= json_encode($item); ?>'>
													<td class="moreInformationTable"></td>
													<td><span class="texttd"><?php echo $item->name ?></span></td>
													<td><span class="texttd"><?php echo $item->organization ?></span></td>
													<td><span class="texttd"><?php echo $item->position ?></span></td>
													<td><span class="texttd"><?php echo $item->email ?></span></td>
													<td <?= getStatusFieldsList("stakeholder register", $item->stakeholder_id) ?>>
														<div class="row center">
															<div class="col-sm-4">
																<form action="<?php echo base_url() ?>stakeholder/stakeholder-register/edit/<?php echo $item->project_id; ?>" method="post">
																	<input type="hidden" name="project_id" value="<?= $item->project_id ?>">
																	<button type="submit" class="btn btn-default"><em class="fa fa-pencil"></em><span class="hidden-xs"></span></button>
																</form>
															</div>

															<div class="col-sm-4">
																<button type="submit" class="btn btn-danger" onclick="deletar(<?= $item->project_id ?>, <?= $item->stakeholder_id; ?>)"><em class="fa fa-trash"></em><span class="hidden-xs"></span></button>
															</div>
														</div>
													</td>
												</tr>
											<?php
											}
											?>

										</tbody>
									</table>

									<form action="<?php echo base_url('project/'); ?><?php echo $project_id; ?>">
										<button class="btn btn-lg btn-info pull-left"> <i class="glyphicon glyphicon-chevron-left"></i> <?= $this->lang->line('btn-back') ?></button>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>
		</div>
	</div>
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
		table = $('#table_stake').DataTable({
			"columns": [{
					"data": "#",
					"orderable": false
				},
				{
					"data": "name"
				},
				{
					"data": "organization"
				},
				{
					"data": "position"
				},
				{
					"data": "email"
				},
				{
					"data": "btn-actions",
					"orderable": false
				}
			],
			"order": [
				[1, 'attr']
			]
		});
	});

	$("#table_stake tbody td.moreInformationTable").on("click", function() {
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
		var nome;
		if (dados.role == 0) {
			nome = 'Client';
		} else if (dados.role == 1) {
			nome = 'Team';
		} else if (dados.role == 2) {
			nome = 'Provider';
		} else if (dados.role == 3) {
			nome = 'Project Manager';
		} else if (dados.role == 4) {
			nome = 'Sponsor';
		} else(dados.role == 5)
		nome = 'Others';


		return '<table cellpadding="5" cellspacing="0" border="0" style="padding-left:50px;">' +
			'<tr>' +
			'<td> <span style="font-weight:bold;" ><?= $this->lang->line('shr_role') ?> : </span> </td>' +
			'<td>' + nome + '</td>' +
			'</tr>' +
			'<tr>' +
			'<td><span style="font-weight:bold;" ><?= $this->lang->line('shr_work_place') ?>: </span> </td>' +
			'<td class="texttd2">' + dados.work_place + '</td>' +
			'</tr>' +
			'<tr>' +
			'<td><span style="font-weight:bold;"><?= $this->lang->line('shr_main_expectations') ?>: </span> </td>' +
			'<td class="texttd2">' + dados.main_expectations + '</td>' +
			'</tr>' +
			'</table>';
	}
</script>

<script type="text/javascript">
	function deletar(idProjeto, stakeholder_id) {
		//e.preventDefault();
		alertify.confirm('Do you agree?').setting({
			'labels': {
				ok: 'Agree',
				cancel: 'Cancel'
			},
			'reverseButtons': false,
			'onok': function() {

				console.log(`Passei o ${idProjeto} e ${stakeholder_id}`);

				$.post("<?php echo base_url() ?>stakeholder/stakeholder-register/delete/" + stakeholder_id, {
					project_id: idProjeto,
				});
				// location.reload();
				window.location.reload();
				alertify.success('You agree.');
			},
			'oncancel': function() {
				alertify.error('You did not agree.');
			}
		}).show();

	}
</script>