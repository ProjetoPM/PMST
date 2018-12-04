<div id="page-wrapper">
	<div class="row" position="absolute">
		<div class="col-lg-12">
			<h1 class="page-header"><?=$this->lang->line('communication-item')?></h1>
			<!-- <?php var_dump($communication_responsability) ?> -->
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
				<div class="col-lg-12">
					<button type="button" class="btn btn-info btn-lg glyphicon-plus" onclick="window.location.href='<?php echo base_url() ?>Communication_item/new/<?php echo $project_id ?>'"><?=$this->lang->line('btn-new')?> <?=$this->lang->line('communication-item')?></button>
					<button type="button" class="btn btn-info btn-lg" data-target=""  onclick="window.location.href='<?php echo base_url() ?>Communication_stakeholder/list/<?php echo $project_id ?>'"  ><em class="fa fa-pencil"></em><span class="hidden-xs"> <?=$this->lang->line('stakeholder')?></span></button>
				</div>
				<div class="col-lg-12">
					<br><br>
					<div>
						<table class="table table-bordered table-striped" id="tableCI">
							<thead>
								<tr>
									<th class="text-center">#</th>
									<th><?=$this->lang->line('type')?></th>
									<th><?=$this->lang->line('description')?></th>
									<th><?=$this->lang->line('content')?></th>
									<th><?=$this->lang->line('distribution_reason')?></th>
									<th><?=$this->lang->line('document_format')?></th>
									<th><?=$this->lang->line('allocated_resources')?></th>
									<th><?=$this->lang->line('format')?></th>
									<th><?=$this->lang->line('actions')?></th>
								</tr>
							</thead>
							<tbody>
								<?php
								foreach ($communication_item as $item) {
									?>
									<tr dados='<?= json_encode($item); ?>'>
										<td class="moreInformationTable"></td>
										<td><?php echo $item->type;?></td>
										<td><?php echo $item->description;?></td>
										<td><?php echo $item->content;?></td>
										<td><?php echo $item->distribution_reason;?></td>
										<td><?php echo $item->document_format;?></td>
										<td><?php echo $item->allocated_resources;?></td>
										<td><?php echo $item->format;?></td>
										<td>
											<div class="row">
												<div class="col-sm-4">
													<form action="<?php echo base_url() ?>Communication_item/edit/<?php echo $item->communication_item_id; ?>" method="post">
														<input type="hidden" name="project_id" value="<?=$item->project_id?>">
														<button type="submit" class="btn btn-default"><em class="fa fa-pencil"></em><span class="hidden-xs"></span></button>
													</form>
												</div>
												<div class="col-sm-3">
												</div>
												<div class="col-sm-2">
													<form action="<?php echo base_url() ?>Communication_item/delete/<?php echo $item->communication_item_id; ?>" method="post">
														<input type="hidden" name="project_id" value="<?=$project_id?>">
														<button type="submit" class="btn btn-danger" ><em class="fa fa-trash"></em><span class="hidden-xs"></span></button>
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
					</div>
				</div>
				<!-- /.row --> </div>
				<div class="col-lg-12">
					<form action="<?php echo base_url('project/'); ?><?php echo $project_id; ?>" >
						<button class="btn btn-lg btn-info pull-left" >  <i class="glyphicon glyphicon-chevron-left"></i> <?=$this->lang->line('btn-back')?></button>
					</form>
				</div>
				<?php $this->load->view('frame/footer_view') ?>            
			</div> 
			<!--DataTable -->
			<script src="<?=base_url()?>assets/js/jquery-2.1.3.min.js"></script>
			<script src="<?=base_url()?>assets/js/jquery.dataTables.min.js"></script>
			<script src="<?=base_url()?>assets/js/dataTables.bootstrap.js"></script>
			<script src="<?=base_url()?>assets/js/dataTables.responsive.js"></script>
			<script src="<?=base_url()?>assets/js/jquery.fixedheadertable.min.js" type="text/javascript"></script>

			<script type="text/javascript">
				'use strict'
				let table;

				$(document).ready( function () {
					table = $('#tableCI').DataTable({
						"columns": [
						{ "data": "#", "orderable": false},
						{ "data": "associated_id" },
						{ "data": "description" },
						{ "data": "priority" },
						{ "data": "business_strategy" },
						{ "data": "btn-actions", "orderable": false}
						],
						"order": [[1, 'attr']]
					});
				} );

				$("#tableCI tbody td.moreInformationTable").on("click", function() {
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
					'<td>Supporting Documentation:</br>' + dados. + '</td>'+
					'<td>'+dados.supporting_documentation+'</td>'+
					'<td>Type: </td>'+
					'<td>'+dados.type+'</td>'+
					'</tr>'+
					'</table>';
				}

			</script>