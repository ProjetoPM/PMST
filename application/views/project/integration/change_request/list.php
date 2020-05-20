<div id="page-wrapper">
	<div class="row" position="absolute">
		<div class="col-lg-12">
			<h1 class="page-header"><?= $this->lang->line('change_request-title') ?></h1>
		</div>
		<!-- /.col-lg-12 -->

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
				<button class="btn btn-info btn-lg glyphicon-plus" onclick="window.location.href='<?php echo base_url() ?>ChangeRequest/addnew/<?php echo $project_id ?>'"> <?= $this->lang->line('btn-new') ?> <?= $this->lang->line('change_request-btn') ?></button>
			</div>
		</div>

		<br><br>
		<div class="row">
			<div class="col-lg-12">

				<table class="table table-bordered table-striped" id="tableNB">
					<thead>
						<tr>
							<th class="text-center">#</th>
							<th>Id.</th>
							<th><?= $this->lang->line('requester') ?></th>
							<th><?= $this->lang->line('request_date') ?></th>
							<th><?= $this->lang->line('type') ?></th>
							<th><?= $this->lang->line('btn-actions') ?></th>
						</tr>
					</thead>
					<tbody>

						<?php
						foreach ($change_request as $change_request) {
						?>

							<tr dados='<?= json_encode($change_request); ?>'>
								<td class="moreInformationTable"></td>
								<td><?php echo $change_request->number_id; ?></td>
								<td><?php echo $change_request->requester; ?></td>
								<td><?php echo $change_request->request_date; ?></td>
								<td><?php echo $change_request->type; ?></td>


								<td>
									<div class="row center">
										<div class="col-sm-3">
											<form action="<?php echo base_url() ?>ChangeRequest/edit/<?php echo $change_request->id; ?>" method="post">
												<input type="hidden" name="project_id" value="<?= $change_request->project_id ?>">
												<button type="submit" class="btn btn-default"><em class="fa fa-pencil"></em><span class="hidden-xs"></span></button>
											</form>
										</div>


										<div class="col-sm-3">
											<form action="<?php echo base_url() ?>ChangeRequest/delete/<?php echo $change_request->id; ?>" method="post">
												<input type="hidden" name="project_id" value="<?= $project_id ?>">
												<button type="submit" class="btn btn-danger"><em class="fa fa-trash"></em><span class="hidden-xs"></span></button>
											</form>
										</div>

										<div class="col-sm-3">
											<form target="_blank" action="<?php echo base_url() ?>ChangeRequest_PDF/pdfGenerator/<?php echo $change_request->id; ?>" method="post">
												<input type="hidden" name="project_id" value="<?= $project_id ?>">
												<button type="submit" class="btn btn-success"><em class="glyphicon glyphicon-file"></em> to PDF<span class="hidden-xs"></span></button>
											</form>
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
				<!-- /.row -->


				<!--1º preencher o nome da view-->
				<?php $view = array(
					"name" => "change_request",
				); ?>

				<!--Carrega o form de envio e envia para ele o nome da view que tu setou -->
				<?php $this->load->view('upload/index', $view) ?>

				<!--Carrega as imagens do projeto de acordo com a view, utiliza id ou project_id pra pegar o id do projeto e criar a query-->
				<?php $this->load->view('upload/retrieve', $view) ?>

				<?php $this->load->view('frame/footer_view') ?>
	

	<script src="<?= base_url() ?>assets/js/jquery-2.1.3.min.js"></script>
	<script src="<?= base_url() ?>assets/js/jquery.dataTables.min.js"></script>
	<script src="<?= base_url() ?>assets/js/dataTables.bootstrap.js"></script>
	<script src="<?= base_url() ?>assets/js/dataTables.responsive.js"></script>

	<script type="text/javascript">
		'use strict'
		let table;

		$(document).ready(function() {
			table = $('#tableNB').DataTable({
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
						"data": "request_date"
					},
					{
						"data": "type"
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
				'<td>Description of Change: </td>' +
				'<td>' + dados.description + '</td>' +
				'</tr>' +
				'<tr>' +
				'<td>Impacted Areas: </td>' +
				'<td>' + dados.impacted_areas + '</td>' +
				'</tr>' +
				'<td>Additional comments: </td>' +
				'<td>' + dados.comments + '</td>' +
				'</tr>' +
				'<td>Status/Situation: </td>' +
				'<td>' + dados.status + '</td>' +
				'</tr>' +
				'</table>';
		}
	</script>