<div id="page-wrapper">
	<div class="row" position="absolute">
		<div class="col-lg-12">
			<h1 class="page-header"><?=$this->lang->line('eval-title')?></h1>
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

					<button class="btn btn-info btn-lg glyphicon-plus" onclick="window.location.href='<?php echo base_url() ?>Team_Performance_Evaluation/new/<?php echo $project_id ?>'"> <?=$this->lang->line('btn-new')?> <?=$this->lang->line('eval-title')?></button>			
					
				</div>
			</div>

			<br><br>
			<div class="row">
				<div class="col-lg-12">
					
					<table class="table table-bordered table-striped" id="tableNB">
						<thead>
							<tr>
								<th class="text-center">#</th>
								<th><?=$this->lang->line('eval-team_member_name')?></th>
								<th><?=$this->lang->line('eval-project_function')?></th>
								<th><?=$this->lang->line('eval-report_date')?></th>

								<th><?=$this->lang->line('btn-actions')?></th>
							</tr>
						</thead>
						<tbody>
							<?php
							foreach ($team_performance_evaluation as $team) {
								?>
								<tr dados='<?= json_encode($team); ?>'>
									<td class="moreInformationTable"></td>
									<td><?php echo $team->team_member_name;?></td>
									<td><?php echo $team->project_function;?></td>
									<td><?php echo $team->report_date;?></td>

									<td style="max-width: 20px">
										<div class="row center">
											<div class="col-sm-4">
												<form action="<?php echo base_url() ?>Team_Performance_Evaluation/edit/<?php echo $team->team_performance_evaluation_id; ?>" method="post">
													<input type="hidden" name="project_id" value="<?=$team->project_id; ?>">
													<button type="submit" class="btn btn-default"><em class="fa fa-pencil"></em><span class="hidden-xs"></span></button>
												</form>
											</div>

											<div class="col-sm-4">
												<!--<form action="<?php echo base_url() ?>Team_Performance_Evaluation/delete/<?php echo $team->team_performance_evaluation_id; ?>" method="post">
												<input type="hidden" name="project_id" value="<?=$team->project_id?>"> -->
												<button type="submit" class="btn btn-danger" onclick="deletar(<?=$team->project_id?>, <?= $team->team_performance_evaluation_id; ?>)"><em class="fa fa-trash"></em><span class="hidden-xs"></span></button>
												<!-- </form> -->
											</div>
										</div>
									</td>
								</tr> 
								<?php
							}
							?>

						</tbody>
					</table> 



					<!-- loading footer and script-->
					<div class="col-sm-12" position= "absolute">
						<div class="container">
							<?php $this->load->view('frame/footer_view') ?>            
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
								{ "data": "team_member_name" },
								{ "data": "project_function" },
								{ "data": "report_date" },
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
							'<td><b><?=$this->lang->line('eval-role')?>:</b> </td>'+
							'<td>'+dados.role+'</td>'+
							'</tr>'+
							'<tr>'+
							'<td><b><?=$this->lang->line('eval-team_member_comments')?>:</b> </td>'+
							'<td>'+dados.team_member_comments+'</td>'+
							'</tr>'+
							'<tr>'+
							'<td><b><?=$this->lang->line('eval-strong_points')?>:</b> </td>'+
							'<td>'+dados.strong_points+'</td>'+
							'</tr>'+
							'<tr>'+
							'<td><b><?=$this->lang->line('eval-improvement')?>:</b> </td>'+
							'<td>'+dados.improvement+'</td>'+
							'</tr>'+
							'<tr>'+
							'<td><b><?=$this->lang->line('eval-development_plan')?>:</b> </td>'+
							'<td>'+dados.development_plan+'</td>'+
							'</tr>'+
							'<tr>'+
							'<td><b><?=$this->lang->line('eval-already_developed')?>:</b> </td>'+
							'<td>'+dados.already_developed+'</td>'+
							'</tr>'+
							'<tr>'+
							'<td><b><?=$this->lang->line('eval-external_comments')?>:</b> </td>'+
							'<td>'+dados.external_comments+'</td>'+
							'</tr>'+
							'<tr>'+
							'<td><b><?=$this->lang->line('eval-team_mates_comments')?>:</b> </td>'+
							'<td>'+dados.team_mates_comments+'</td>'+
							'</tr>'+
							'<tr>'+
							'<td><b><?=$this->lang->line('eval-team_performance_evaluationcol')?>:</b> </td>'+
							'<td>'+dados.team_performance_evaluationcol+'</td>'+
							'</tr>'+
							'</table>';
						}
					</script>

					<script type="text/javascript">

						function deletar(idProjeto, idEval){
							//e.preventDefault();
							alertify.confirm('Do you agree?').setting({
								'labels':{
									ok: 'Agree',
									cancel: 'Cancel'
								},
								'reverseButtons': false,
								'onok': function(){

									console.log(`Passei o ${idProjeto} e ${idEval}`);

							$.post("<?php echo base_url() ?>Team_Performance_Evaluation/delete/" + idEval,
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

