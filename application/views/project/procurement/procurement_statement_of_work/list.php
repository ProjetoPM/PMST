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

								<?= $this->lang->line('psw_title')  ?>

							</h1>

							<div class="row">
								<div class="col-lg-12">
									<button class="btn btn-info btn-lg glyphicon-plus" onclick="window.location.href='<?php echo base_url() ?>procurement/procurement-statement-of-work/new/<?php echo $project_id ?>'"> <?= $this->lang->line('btn-new2') ?> <?= $this->lang->line('psw_title') ?></button>

								</div>
							</div>

							<br><br>
							<div class="row">
								<div class="col-lg-12">

									<table class="table table-bordered table-striped" id="tableNB">
										<thead>
											<tr>
												<th class="text-center">#</th>
												<th><?= $this->lang->line('psw_description') ?></th>
												<th><?= $this->lang->line('psw_informations') ?></th>
												<th><?= $this->lang->line('psw_procurement_management') ?></th>
												<th><?= $this->lang->line('psw_selection_criterias') ?></th>
												<th><?= $this->lang->line('btn-actions') ?></th>
											</tr>
										</thead>
										<tbody>

											<?php
											foreach ($procurement_statement_of_work as $procurement_statement_of_work) {
											?>

												<tr dados='<?= json_encode($procurement_statement_of_work); ?>'>
													<td class="moreInformationTable"></td>
													<td><?php echo $procurement_statement_of_work->description; ?></td>
													<td><?php echo $procurement_statement_of_work->informations; ?></td>
													<td><?php echo $procurement_statement_of_work->procurement_management; ?></td>
													<td><?php echo $procurement_statement_of_work->selection_criterias; ?></td>


													<td <?= getStatusFieldsList("procurement statement of the work", $procurement_statement_of_work->id) ?>>
														<div class="row center">
															<div class="col-sm-4">
																<form action="<?php echo base_url() ?>procurement/procurement-statement-of-work/edit/<?php echo $procurement_statement_of_work->id; ?>" method="post">
																	<input type="hidden" name="project_id" value="<?= $procurement_statement_of_work->project_id ?>">
																	<button type="submit" class="btn btn-default"><em class="fa fa-pencil"></em><span class="hidden-xs"></span></button>
																</form>
															</div>


															<div class="col-sm-4">
																<button type="submit" class="btn btn-danger" onclick="deletar(<?= $_SESSION['project_id'] ?>, <?= $procurement_statement_of_work->id; ?>)"><em class="fa fa-trash"></em><span class="hidden-xs"></span></button>

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

							<!-- /.row -->


							<!--1º preencher o nome da view-->
							<?php $view = array(
								"name" => "procurement_statement_of_work",
							); ?>

							<!--Carrega o form de envio e envia para ele o nome da view que tu setou -->
							<?php $this->load->view('upload/index', $view) ?>

							<!--Carrega as imagens do projeto de acordo com a view, utiliza id ou project_id pra pegar o id do projeto e criar a query-->
							<?php $this->load->view('upload/retrieve', $view) ?>
						</div>
					</div>
				</div>
			</section>
		</div>
	</div>
</body>
<!-- JavaScript -->
<script src="//cdn.jsdelivr.net/npm/alertifyjs@1.11.2/build/alertify.min.js"></script>
<!-- CSS -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.11.2/build/css/alertify.min.css" />


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
					"data": "description"
				},
				{
					"data": "informations"
				},
				{
					"data": "procurement_management"
				},
				{
					"data": "selection_criterias"
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

	function deletar(idProjeto, item_id) {
		//e.preventDefault();
		alertify.confirm('Do you agree?').setting({
			'labels': {
				ok: 'Agree',
				cancel: 'Cancel'
			},
			'reverseButtons': false,
			'onok': function() {

				console.log(`Passei o ${idProjeto} e ${item_id}`);

				$.post("<?php echo base_url() ?>procurement/procurement-statement-of-work/delete/" + item_id, {
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

	function format(dados) {
		return '<table cellpadding="5" cellspacing="0" border="0" style="padding-left:50px;">' +
			'<tr>' +
			'<td style="font-weight:bold;">Associated Contract Types: </td>' +
			'<td>' + dados.types + '</td>' +
			'</tr>' +
			'<tr>' +
			'<td style="font-weight:bold;">Restrictions: </td>' +
			'<td>' + dados.restrictions + '</td>' +
			'</tr>' +
			'<td style="font-weight:bold;">Premises: </td>' +
			'<td>' + dados.premises + '</td>' +
			'</tr>' +
			'</table>';
	}
</script>