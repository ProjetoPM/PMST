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
				<div class="row">
					<div class="col-lg-12">
						<div class="panel-body">
							<h1 class="page-header">

								<?= $this->lang->line('cr_title')  ?>

								<?php
								$view_name = 'change request'; 
								$this->load->view('construction_services/write_field_evaluation') 
								?>
								<?php $this->load->view('construction_services/rating', array(
									"view_name" => $view_name,
								)) ?>

							</h1>

							<div class="row">
								<div class="col-lg-12">
									<button class="btn btn-info btn-lg glyphicon-plus" onclick="window.location.href='<?php echo base_url() ?>integration/change-request/new/<?php echo $project_id ?>'"> <?= $this->lang->line('btn-new') ?> <?= $this->lang->line('change_request-btn') ?></button>
								</div>
							</div>
							<br><br>
							<div class="row">
								<div class="col-lg-12">

									<table class="table table-bordered table-striped" id="table_cr">
										<thead>
											<tr>
												<th class="text-center">#</th>
												<th>Id.</th>
												<th><?= $this->lang->line('cr_requester') ?></th>
												<th><?= $this->lang->line('cr_request_date') ?></th>
												<th><?= $this->lang->line('cr_type') ?></th>
												<th><?= $this->lang->line('cr_status') ?></th>
												<th><?= $this->lang->line('btn-actions') ?></th>
											</tr>
										</thead>
										<tbody>

											<?php
											foreach ($change_request as $cr) {
												if ($cr->log != 1) {
											?>

													<tr dados='<?= json_encode($cr); ?>'>
														<td class="moreInformationTable"></td>
														<td><?php echo $cr->number_id; ?></td>
														<td><?php echo getStakeholderName($cr->requester) ?></td>
														<td><?php echo $cr->request_date; ?></td>
														<td><?php echo $cr->type; ?></td>
														<td><?php echo $cr->status; ?></td>


														<td>
															<div class="row center">
																<div class="col-sm-3">
																	<form action="<?php echo base_url() ?>integration/change-request/edit/<?php echo $cr->id; ?>" method="post">
																		<input type="hidden" name="project_id" value="<?= $cr->project_id ?>">
																		<button type="submit" class="btn btn-default"><em class="fa fa-pencil"></em><span class="hidden-xs"></span></button>
																	</form>
																</div>


																<div class="col-sm-3">
																	<form action="<?php echo base_url() ?>integration/change-request/delete/<?php echo $cr->id; ?>" method="post">
																		<input type="hidden" name="project_id" value="<?= $project_id ?>">
																		<button type="submit" class="btn btn-danger"><em class="fa fa-trash"></em><span class="hidden-xs"></span></button>
																	</form>
																</div>

																<div class="col-sm-3">
																	<form target="_blank" action="<?php echo base_url() ?>ChangeRequest_PDF/pdfGenerator/<?php echo $cr->id; ?>" method="post">
																		<input type="hidden" name="project_id" value="<?= $project_id ?>">
																		<button type="submit" class="btn btn-success"><em class="glyphicon glyphicon-file"></em> to PDF<span class="hidden-xs"></span></button>
																	</form>
																</div>
															</div>
														</td>
													</tr>
											<?php
												}
											}
											?>

										</tbody>
									</table>


									<form action="<?php echo base_url('project/'); ?><?php echo $project_id; ?>">
										<button class="btn btn-lg btn-info pull-left"> <i class="glyphicon glyphicon-chevron-left"></i> <?= $this->lang->line('btn-back') ?></button>
									</form>
								</div>
							</div>
							<?php $view = array(
								"name" => "change_request",
							); ?>

							<!--Carrega o form de envio e envia para ele o nome da view que tu setou -->
							<?php $this->load->view('upload/index', $view) ?>

							<!--Carrega as imagens do projeto de acordo com a view, utiliza id ou project_id pra pegar o id do projeto e criar a query-->
							<?php $this->load->view('upload/retrieve', $view) ?>

							<?php $this->load->view('frame/footer_view') ?>
						</div>
					</div>
				</div>
			</section>
		</div>
	</div>
</body>


<!--1º preencher o nome da view-->

<script src="<?= base_url() ?>assets/js/jquery-2.1.3.min.js"></script>
<script src="<?= base_url() ?>assets/js/jquery.dataTables.min.js"></script>
<script src="<?= base_url() ?>assets/js/dataTables.bootstrap.js"></script>
<script src="<?= base_url() ?>assets/js/dataTables.responsive.js"></script>

<!-- JavaScript -->
<script src="//cdn.jsdelivr.net/npm/alertifyjs@1.11.2/build/alertify.min.js"></script>
<!-- CSS -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.11.2/build/css/alertify.min.css" />

<script type="text/javascript">
	'use strict'
	let table;

	$(document).ready(function() {
		table = $('#table_cr').DataTable({
			"columns": [{
					"data": "#",
					"orderable": false
				},
				{
					"data": "number_id"
				},
				{
					"data": "requester"
				},
				{
					"data": "requester_date"
				},
				{
					"data": "type"
				},
				{
					"data": "status"
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

	$("#table_cr tbody td.moreInformationTable").on("click", function() {
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
			'<td> <span style="font-weight:bold;" >Description of Change: </span> </td>' +
			'<td>' + dados.description + '</td>' +
			'</tr>' +
			'<tr>' +
			'<td><span style="font-weight:bold;" >Impacted Areas: </span> </td>' +
			'<td class="texttd2">' + dados.impacted_areas + '</td>' +
			'</tr>' +
			'<tr>' +
			'<td><span style="font-weight:bold;">Additional comments: </span> </td>' +
			'<td class="texttd2">' + dados.comments + '</td>' +
			'</tr>' +
			'</table>';
	}
</script>