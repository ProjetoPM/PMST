<div id="page-wrapper">
	<div class="row" position="absolute">
		<div class="col-lg-12">
			<h1 class="page-header"><?=$this->lang->line('risk-title')?></h1>
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

					<button class="btn btn-info btn-lg glyphicon-plus" onclick="window.location.href='<?php echo base_url() ?>RegisterRisk/addnew/<?php echo $project_id ?>'"> <?=$this->lang->line('btn-new')?> <?=$this->lang->line('risk-title')?></button>			
					
				</div>
			</div>

			<br><br>
			<div class="row">
				<div class="col-lg-12">
					
					<table class="table table-bordered table-striped" id="tableNB">
						<thead>
							<tr>
								<th class="text-center">#</th>
								<th><?=$this->lang->line('risk-impacted_objective')?></th>
								<th><?=$this->lang->line('risk-priority')?></th>
								<th><?=$this->lang->line('risk-risk_status')?></th>
								<th><?=$this->lang->line('risk-date')?></th>
								<th><?=$this->lang->line('risk-type')?></th>

								<th><?=$this->lang->line('btn-actions')?></th>
							</tr>
						</thead>
						<tbody>
							<?php
							foreach ($risk_register as $risk) {
								?>
								<tr dados='<?= json_encode($risk); ?>'>
									<td class="moreInformationTable"></td>
									<td><?php echo $risk->impacted_objective;?></td>
									<td><?php echo $risk->priority;?></td>
									<td><?php echo $risk->risk_status;?></td>
									<td><?php echo $risk->date;?></td>
									<td><?php echo $risk->type;?></td>

									<td style="max-width: 20px">
										<div class="row center">
											<div class="col-sm-4">
												<form action="<?php echo base_url() ?>RegisterRisk/edit/<?php echo $risk->risk_register_id; ?>" method="post">
													<input type="hidden" name="project_id" value="<?=$risk->project_id?>">
													<button type="submit" class="btn btn-default"><em class="fa fa-pencil"></em><span class="hidden-xs"></span></button>
												</form>
											</div>

											<div class="col-sm-4">
												<!--<form action="<?php echo base_url() ?>RegisterRisk/delete/<?php echo $risk->risk_register_id; ?>" method="post">
												-->
												<!--<form oncomplete="run()" method="post">

													<input type="hidden" name="project_id" value="<?=$risk->project_id?>">
													<button type="submit" class="btn btn-danger"><em class="fa fa-trash"></em><span class="hidden-xs"></span></button>
												</form>-->
												<form oncomplete="<?php echo base_url() ?>RegisterRisk/delete/<?php echo $risk->risk_register_id; ?>" method="post">

													<input type="hidden" name="project_id" value="<?=$risk->project_id?>">
													<button type="submit" class="btn btn-danger run"><em class="fa fa-trash"></em><span class="hidden-xs"></span></button>
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
								{ "data": "impacted_objective" },
								{ "data": "priority" },
								{ "data": "risk_status" },
								{ "data": "date" },
								{ "data": "type" },
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
							'<td><?=$this->lang->line('risk-event')?>: </td>'+
							'<td>'+dados.event+'</td>'+
							'</tr>'+
							'<tr>'+
							'<td><?=$this->lang->line('risk-identifier')?>: </td>'+
							'<td>'+dados.identifier+'</td>'+
							'</tr>'+
							'</table>';
						}
					</script>

					<script type="text/javascript">
						$(function run(){
							//$('.run').click(function(event) {
								$(function(event) {
									alertify.confirm('Do you agree?').setting({
										'labels':{
											ok: 'Agree',
											cancel: 'Cancel'
										},
										'reverseButtons': false,
										'onok': function(){
									//	load(<?php echo base_url('RegisterRisk/delete/'); ?><?php echo $risk->risk_register_id; ?>);
											//<?php echo base_url() ?>RegisterRisk/delete/<?php echo $risk->risk_register_id; ?>),
											alertify.success('You agree.');
											//action("<?php echo base_url() ?>RegisterRisk/delete/<?php echo $risk->risk_register_id; ?>");
										},
										'oncancel': function(){
											alertify.error('You did not agree.');
										}
									}).show();
								});
							});
						
					</script>
