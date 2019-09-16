<div id="page-wrapper">
	<div class="row" position="absolute">
		<div class="col-lg-12">
			<h1 class="page-header"><?=$this->lang->line('activity_list-title')?></h1>
		</div>
		<!-- /.col-lg-12 -->

		<?php if ($this->session->flashdata('success')): ?>
			<div class="alert alert-success">
				<a href="#" class="close" data-dismiss="alert">&times;</a>
				<strong><?php echo $this->session->flashdata('success'); ?></strong>
			</div>
			<?php elseif ($this->session->flashdata('error')): ?>
				<div class="alert alert-warning">
					<a href="#" class="close" data-dismiss="alert">&times;</a>
					<strong><?php echo $this->session->flashdata('error'); ?></strong>
				</div>
			<?php endif; ?>
			<!-- /.row -->

			<div class="row">
				<div class="col-lg-10">
					<button class="btn btn-info btn-lg glyphicon-plus" onclick="window.location.href='<?php echo base_url() ?>Activity/newp/<?php echo $project_id ?>'"> <?=$this->lang->line('activity_list-btn')?> <?=$this->lang->line('eval-title')?></button>
				</div>
			</div>

			<br><br>
			<div class="row">
				<div class="col-lg-12">

					<table class="table table-bordered table-striped" id="tableNB">
						<thead>
							<tr>
								<th class="text-center">#</th>
								<th><?=$this->lang->line('associated_id')?></th>
								<th><?=$this->lang->line('project_phase')?></th>
								<th><?=$this->lang->line('activity_name')?></th>

								<th><?=$this->lang->line('btn-actions')?></th>
							</tr>
						</thead>
						<tbody>
							<?php
							foreach ($activity as $a) {
								?>
								<tr dados='<?= json_encode($a); ?>'>
									<td class="moreInformationTable"></td>
									<td><?php echo $a->associated_id;?></td>
									<td><?php echo $a->project_phase;?></td>
									<td><?php echo $a->activity_name;?></td>

									<td style="max-width: 20px">
										<div class="row center">
											<div class="col-sm-3">
												<form action="<?php echo base_url() ?>Activity/editActivity/<?php echo $a->id; ?>" method="post">
													<input type="hidden" name="project_id" value="<?=$a->project_id; ?>">
													<button type="submit" class="btn btn-default"><em class="fa fa-pencil"></em><span class="hidden-xs"></span></button>
												</form>
											</div>

											<div class="col-sm-3">
												<button type="submit" class="btn btn-danger" onclick="deletar(<?=$a->project_id?>, <?= $a->id; ?>)"><em class="fa fa-trash"></em><span class="hidden-xs"></span></button>
											</div>

											<!-- <div class="col-sm-3">
												<form target="_blank" action="<?php echo base_url() ?>TeamPerformanceEvaluation_PDF/pdfGenerator/<?php echo $a->id; ?>" method="post">
													<input type="hidden" name="project_id" value="<?=$project_id?>">
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


					<form action="<?php echo base_url('project/'); ?><?php echo $project_id; ?>" >
				   <button class="btn btn-lg btn-info pull-left" >  <i class="glyphicon glyphicon-chevron-left"></i> <?=$this->lang->line('btn-back')?></button>
				 </form>
					<!-- /.row -->
					<div class="col-sm-12" position= "absolute">
						<div class="container">

																<!--1º preencher o nome da view-->
																<?php $view = array(
																  "name" => "activity_list",
																); ?>

																<!--Carrega o form de envio e envia para ele o nome da view que tu setou -->
																<?php $this->load->view('upload/index', $view) ?>
							                  <br>
							                  <div>
																<!--Carrega as imagens do projeto de acordo com a view, utiliza id ou project_id pra pegar o id do projeto e criar a query-->
																<?php $this->load->view('upload/retrieve', $view) ?>

																<?php $this->load->view('frame/footer_view')?>
						</div>
					</div>
				</div>

				<script src="<?=base_url()?>assets/js/jquery-2.1.3.min.js"></script>
				<script src="<?=base_url()?>assets/js/jquery.dataTables.min.js"></script>
				<script src="<?=base_url()?>assets/js/dataTables.bootstrap.js"></script>
				<script src="<?=base_url()?>assets/js/dataTables.responsive.js"></script>
				<!-- JavaScript -->
				<script src="//cdn.jsdelivr.net/npm/alertifyjs@1.11.2/build/alertify.min.js"></script>
				<!-- CSS -->
				<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.11.2/build/css/alertify.min.css"/>

					<!--<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.1/jquery.min.js"></script>
					-->
					<script type="text/javascript">
						'use strict'
						let table;


						$(document).ready( function () {
							table = $('#tableNB').DataTable({
								"columns": [
								{ "data": "#", "orderable": false},
								{ "data": "associated_id" },
								{ "data": "activity_name" },
								{ "data": "btn-actions", "orderable": false}
								],
								"order": [[1, 'attr']]
							});
						} );

						$("#tableNB tbody td.moreInformationTable").on("click", function() {
							let element = jQuery($(this)[0].parentNode);
							let tr = element.closest('tr');
							let row = table.row(tr);
							console.log(element)
							let dados = JSON.parse(element.attr("dados"));

							if ( row.child.isShown() ) {
								row.child.hide();
								tr.removeClass('shown');
							}
							else {
								row.child( format(dados) ).show();
								tr.addClass('shown');
							}
						});

						function format (dados) {
							return '<table cellpadding="5" cellspacing="0" border="0" style="padding-left:50px;">'+
							'<tr>'+
							'<td><b><?=$this->lang->line('milestone')?>:</b> </td>'+
							'<td>'+dados.milestone+'</td>'+
							'</tr>'+

							'</table>';
						}
					</script>

					<script type="text/javascript">

						function deletar(idProjeto, id){
							//e.preventDefault();
							alertify.confirm('Do you agree?').setting({
								'labels':{
									ok: 'Agree',
									cancel: 'Cancel'
								},
								'reverseButtons': false,
								'onok': function(){

									console.log(`Passei o ${idProjeto} e ${id}`);

							$.post("<?php echo base_url() ?>Activity/deleteActivity/" + id,
							{
								project_id: idProjeto,
							});

											alertify.success('You agree.');
											location.reload();
							//location.reload();
										},
										'oncancel': function(){
											alertify.error('You did not agree.');
										}
									}).show();

						}

					</script>
