<div id="page-wrapper">
	<div class="row" position="absolute">
		<div class="col-lg-12">
			<h1 class="page-header"><?= $this->lang->line('stakeholder_mp-title') ?></h1>
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

		<?php extract($stakeholder); ?>


		<br><br>
		<div class="row">
			<div class="col-lg-12">

				<table class="table table-bordered table-striped" id="tableNB">
					<thead>
						<tr>
							<th class="text-center">#</th>
							<th><?= $this->lang->line('stake') ?></th>
							<th><?= $this->lang->line('interest') ?></th>
							<th><?= $this->lang->line('power') ?></th>
							<th><?= $this->lang->line('influence') ?></th>
							<th><?= $this->lang->line('impact') ?></th>


							<th><?= $this->lang->line('btn-actions') ?></th>
						</tr>
					</thead>
					<tbody>
						<?php

						foreach ($stakeholder as $item) {
						?>
							<tr dados='<?= json_encode($item); ?>'>
								<td class="moreInformationTable"></td>
								<td><?php echo $item->name; ?></td>
								<td><?php echo $item->interest; ?></td>
								<td><?php echo $item->power; ?></td>
								<td><?php echo $item->influence; ?></td>
								<td><?php echo $item->impact; ?></td>



								<td style="max-width: 20px">
									<div class="row center">
										<div class="col-sm-4">
											<form action="<?php echo base_url() ?>ManagementStakeholder/editPlan/<?php echo $item->stakeholder_id; ?>" method="post">
												<input type="hidden" name="project_id" value="<?= $item->project_id ?>">
												<button type="submit" class="btn btn-default"><em class="fa fa-pencil"></em><span class="hidden-xs"></span></button>
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

	<!-- loading footer and script-->

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
						"data": "#",
						"orderable": false
					},
					{
						"data": "name"
					},
					{
						"data": "interest"
					},
					{
						"data": "power"
					},
					{
						"data": "influence"
					},
					{
						"data": "impact"
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
				'<td><b><?= $this->lang->line('average') ?>: </b>' + dados.average + '</td>' +
				'</tr>' +
				'<tr>' +
				'<td><b><?= $this->lang->line('expected_engagement') ?>: </b>' + dados.expected_engagement + '</td>' +
				'</tr>' +
				'<tr>' +
				'<td><b><?= $this->lang->line('current_engagement') ?>: </b>' + dados.current_engagement + '</td>' +
				'</tr>' +
				'<tr>' +
				'<td><b><?= $this->lang->line('strategy') ?>: </b>' + dados.strategy + '</td>' +
				'</tr>' +
				'<tr>' +
				'<td><b><?= $this->lang->line('scope') ?>: </b>' + dados.scope + '</td>' +
				'</tr>' +
				'<tr>' +
				'<td><b><?= $this->lang->line('observation') ?>: </b>' + dados.observation + '</td>' +
				'</tr>' +
				'</table>';
		}
	</script>

	