<div id="page-wrapper">
	<div class="row" position="absolute">
		<div class="col-lg-12">
			<h1 class="page-header"><?=$this->lang->line('stakeholder-title')?></h1>
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

					<button class="btn btn-info btn-lg glyphicon-plus" onclick="window.location.href='<?php echo base_url() ?>ManagementStakeholder/addnew/<?php echo $project_id ?>'"> <?=$this->lang->line('btn-new')?> <?=$this->lang->line('stakeholder-title')?></button>

				</div>
			</div>

			<br><br>
			<div class="row">
				<div class="col-lg-12">

					<table class="table table-bordered table-striped" id="tableNB">
						<thead>
							<tr>
								<th class="text-center">#</th>
								<th>Name</th>
								<th>Organization</th>
								<th>Position</th>
                <th>E-mail</th>

								<th><?=$this->lang->line('btn-actions')?></th>
							</tr>
						</thead>
						<tbody>
							<?php
							foreach ($stakeholder as $stakeholder) {
								?>
								<tr dados='<?= json_encode($stakeholder); ?>'>
									<td class="moreInformationTable"></td>
									<td><?php echo $stakeholder->name;?></td>
									<td><?php echo $stakeholder->organization;?></td>
                                    <td><?php echo $stakeholder->position;?></td>
                                    <td><?php echo $stakeholder->email;?></td>


                                    <td style="max-width: 20px">
										<div class="row center">
											<div class="col-sm-4">
												<form action="<?php echo base_url() ?>ManagementStakeholder/edit/<?php echo $stakeholder->stakeholder_id; ?>" method="post">
													<input type="hidden" name="project_id" value="<?=$stakeholder->project_id?>">
													<button type="submit" class="btn btn-default"><em class="fa fa-pencil"></em><span class="hidden-xs"></span></button>
												</form>
											</div>

											<div class="col-sm-4">
												<!--<form action="<?php echo base_url() ?>ManagementStakeholder/delete/<?php echo $stakeholder->stakeholder_id; ?>" method="post">
													<input type="hidden" name="project_id" value="<?=$stakeholder->project_id?>"> -->
													<button type="submit" class="btn btn-danger" onclick="deletar(<?=$stakeholder->project_id?>, <?= $stakeholder->stakeholder_id; ?>)"><em class="fa fa-trash"></em><span class="hidden-xs"></span></button>
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
								{ "data": "name" },
								{ "data": "organization" },
								{ "data": "position" },
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
							'<td><b><?=$this->lang->line('responsability')?>: </b>'+dados.responsability+'</td>'+
							'</tr>'+
							'<tr>'+
							'<td><b><?=$this->lang->line('email')?>: </b>'+dados.email+'</td>'+
							'</tr>'+
							'</table>';
						}
					</script>

					<script type="text/javascript">

						function deletar(idProjeto, stakeholder_id){
							//e.preventDefault();
							alertify.confirm('Do you agree?').setting({
								'labels':{
									ok: 'Agree',
									cancel: 'Cancel'
								},
								'reverseButtons': false,
								'onok': function(){

									console.log(`Passei o ${idProjeto} e ${stakeholder_id}`);

									$.post("<?php echo base_url() ?>ManagementStakeholder/delete/" + stakeholder_id,
									{
										project_id: idProjeto,
									});
									location.reload();
									alertify.success('You agree.');
								},
								'oncancel': function(){
									alertify.error('You did not agree.');
								}
							}).show();

						}

					</script>
						<button onclick="history.go(-1);" class="btn btn-lg btn-info pull-left" >  <i class="glyphicon glyphicon-chevron-left"></i> <?=$this->lang->line('btn-back')?></button>
