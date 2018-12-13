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

					<button class="btn btn-info btn-lg glyphicon-plus" onclick="window.location.href='<?php echo base_url() ?>RiskRegister/addnew/<?php echo $project_id ?>'"> <?=$this->lang->line('btn-new')?> <?=$this->lang->line('risk-title')?></button>			
					
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
								<th><?=$this->lang->line('risk-event')?></th>
								<th><?=$this->lang->line('risk-date')?></th>

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
									<td>

										<?php 
										
										if($risk->priority == '0'){
											?>
											<?=$this->lang->line('risk-priority-low') ?>
											<?php
										}else if($risk->priority == '1'){
											?>
											<?=$this->lang->line('risk-priority-medium') ?>
											<?php
										}else if($risk->priority == '2'){
											?>
											<?=$this->lang->line('risk-priority-high') ?>
											<?php
										}  
										?>	
									</td>
									<td><?php echo $risk->event;?></td>
									<td><?php echo $risk->date;?></td>

									<td style="max-width: 20px">
										<div class="row center">
											<div class="col-sm-4">
												<form action="<?php echo base_url() ?>RiskRegister/edit/<?php echo $risk->risk_register_id; ?>" method="post">
													<input type="hidden" name="project_id" value="<?=$risk->project_id?>">
													<button type="submit" class="btn btn-default"><em class="fa fa-pencil"></em><span class="hidden-xs"></span></button>
												</form>
											</div>

											<div class="col-sm-4">
												<!--<form action="<?php echo base_url() ?>RiskRegister/delete/<?php echo $risk->risk_register_id; ?>" method="post">
													<input type="hidden" name="project_id" value="<?=$risk->project_id?>"> -->
													<button type="submit" class="btn btn-danger" onclick="deletar(<?=$risk->project_id?>, <?= $risk->risk_register_id; ?>)"><em class="fa fa-trash"></em><span class="hidden-xs"></span></button>
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

						<form action="<?php echo base_url('project/'); ?><?php echo $project_id; ?>" >
						<button class="btn btn-lg btn-info pull-left" >  <i class="glyphicon glyphicon-chevron-left"></i> <?=$this->lang->line('btn-back')?></button>
					</form>

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
								{ "data": "event" },
								{ "data": "date" },
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
							'<td><strong><?=$this->lang->line('risk-risk_status')?>: </strong>'+dados.risk_status+'</td>'+
							'</tr>'+
							'<tr>'+
							'<td><strong><?=$this->lang->line('risk-identifier')?>: </strong>'+dados.identifier+'</td>'+
							'</tr>'+
							'</table>';
						}
					</script>

					<script type="text/javascript">

						function deletar(idProjeto, idRisk){
							//e.preventDefault();
							alertify.defaults.glossary.title = '<?=$this->lang->line('alertfy-delete-tittle')?>';
							alertify.defaults.theme.ok = "btn btn-lg btn-success pull";
							alertify.defaults.theme.cancel = "btn btn-danger";
							alertify.defaults.theme.input = "form-control";
							alertify.confirm('<?=$this->lang->line('alertfy-delete-message')?>').setting({
								'labels':{
									ok: '<?=$this->lang->line('alertfy-delete-confirm')?>',
									cancel: '<?=$this->lang->line('alertfy-delete-cancel')?>'
								},
								'reverseButtons': false,
								'onok': function(){

									//console.log(`Passei o ${idProjeto} e ${idRisk}`);

									$.post("<?php echo base_url() ?>RiskRegister/delete/" + idRisk,
									{
										project_id: idProjeto,
									}).done(() => {
										alertify.success('<?=$this->lang->line('alertfy-delete-success')?>');
										setTimeout(() => {
											location.reload()
										}, 1500)
									}).fail(() => {
										alertify.error('<?=$this->lang->line('alertfy-delete-error')?>');
									})
								},
								'oncancel': function(){
									alertify.warning('<?=$this->lang->line('alertfy-delete-warning')?>');
								}
							}).show();

						}
						
					</script>

