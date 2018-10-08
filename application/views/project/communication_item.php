<div id="page-wrapper">
	<div class="row" position="absolute">
		<div class="col-lg-12">
			<h1 class="page-header"><?=$this->lang->line('communication')?></h1>
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
				<div class="col-lg-10">
					<div class="container">
						<button type="button" class="btn btn-info btn-lg glyphicon-plus"><a href="<?php echo base_url() ?>communication_item/insert/"></a> <?=$this->lang->line('new-communication')?></button>
						<button type="button" class="btn btn-info btn-lg" data-target=""><em class="fa fa-pencil"></em><span class="hidden-xs"> <?=$this->lang->line('stakeholder')?></span></button>
					</div>
				</div>
			</div>

			<br><br>
			<div class="row">
				<div class="col-lg-12">
					<table id="tableC">
						<thead>
							<tr>
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
								<tr>
									<td><?php echo $item->type;?></td>
									<td><?php echo $item->description;?></td>
									<td><?php echo $item->content;?></td>
									<td><?php echo $item->distribution_reason;?></td>
									<td><?php echo $item->documento_format;?></td>
									<td><?php echo $item->allocated_resources;?></td>
									<td><?php echo $item->format;?></td>
									<td>
										<form action="<?php echo base_url() ?>communication_item/delete/<?php echo $item->communication_item_id; ?>">
											<a> <button type="button" class="btn btn-default" data-id="edit" data-toggle="modal" data-target="#modal"><em class="fa fa-pencil"></em><span class="hidden-xs"> Edit</span></button></a> ||

											<a><button type="submit" class="btn btn-danger"><em class="fa fa-trash"></em><span class="hidden-xs"> Delete</span></button>
											</a></form>
											<div class="modal fade" id="modal" role="dialog">
												<div class="modal-dialog">
													<!-- Modal content-->
													<div class="modal-content">
														<div class="modal-header">
															<button type="button" class="close" data-dismiss="modal">&times;</button>
															<h4 class="modal-title">Edit Communication Item</h4>
														</div>
														<div class="modal-body">
															<form action="<?= base_url() ?>communication_item/update/<?php echo $communication_item[0]->communication_item_id; ?>" method="post">
																<div class="form-group">
																	<label>Type</label>
																	<textarea class="form-control" id="type" placeholder="Type" name="type" maxlength="45"><?php echo $communication_item[0]->type; ?></textarea>
																</div>
																<!-- Textarea -->
																<div class="form-group">
																	<label>Description</label>
																	<textarea class="form-control" id="description" placeholder="Description" name="description" maxlength="45"><?php echo $communication_item[0]->description; ?></textarea>
																</div>
																<div class="form-group">
																	<label>Content</label>
																	<textarea class="form-control" id="content" placeholder="Content" name="content" maxlength="255"><?php echo $communication_item[0]->content; ?></textarea>
																</div>
																<div class="form-group">
																	<label>Distribution Reason</label>
																	<textarea class="form-control" id="distribution_reason" placeholder="Distribution Reason" name="distribution_reason" maxlength="255"><?php echo $communication_item[0]->distribution_reason; ?></textarea>
																</div>
																<div class="form-group">
																	<label>Language</label>
																	<textarea class="form-control" id="language" placeholder="Language" name="language" maxlength="45"><?php echo $communication_item[0]->language; ?></textarea>
																</div>
																<div class="form-group">
																	<label>Channel</label>
																	<textarea class="form-control" id="channel" placeholder="Channel" name="channel" maxlength="45"><?php echo $communication_item[0]->channel; ?></textarea>
																</div>
																<div class="form-group">
																	<label>Document Format</label>
																	<textarea class="form-control" id="documento_format" placeholder="Document Format" name="documento_format" maxlength="45"><?php echo $communication_item[0]->documento_format; ?></textarea>
																</div>
																<div class="form-group">
																	<label>Method</label>
																	<textarea class="form-control" id="metod" placeholder="Method" name="metod" maxlength="45"><?php echo $communication_item[0]->metod; ?></textarea>
																</div>
																<div class="form-group">
																	<label for="frequency">Frequency</label>
																	<textarea class="form-control" id="frequency" placeholder="Frequency" name="frequency" maxlength="45"><?php echo $communication_item[0]->frequency; ?></textarea>
																</div>
																<div class="form-group">
																	<label for="allocated_resources">Allocated Resources</label>
																	<textarea class="form-control" id="allocated_resources" placeholder="Allocated Resources" name="allocated_resources" maxlength="45"><?php echo $communication_item[0]->allocated_resources; ?></textarea>
																</div>
																<div class="form-group">
																	<label for="format">Format</label>
																	<div>                     
																		<textarea class="form-control" id="format" placeholder="Format" name="format" maxlength="45"><?php echo $communication_item[0]->format; ?></textarea>
																	</div>
																</div>
																<div class="form-group">
																	<label for="local">Local</label>
																	<textarea class="form-control" id="local" placeholder="Local" name="local" maxlength="45"><?php echo $communication_item[0]->local; ?></textarea>
																</div>

																<div class="form-group">
																	<label>Status:</label>
																	<input type="radio" <?= $communication_item[0]->status != 1?: "checked"; ?> name="status" value="1">
																	<label>On</label>
																	<input type="radio" <?= $communication_item[0]->status != 0?: "checked"; ?> name="status" value="0">
																	<label>Off</label>
																</div>
																<button type="submit" class="btn btn-lg btn-success btn-block">Save</button>
															</form>
														</div>
														<div class="modal-footer">
															<button type="button" class="btn btn-lg btn-default btn-block" data-dismiss="modal">Close</button>
														</div>
													</div>
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
				<div class="col-sm-12" position= "absolute">
					<div class="container">
						<?php $this->load->view('frame/footer_view') ?>            
					</div>
				</div>
			</div> 

			<!--DataTable -->
			<!--<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>-->
			<!--<script src='https://cdn.datatables.net/1.10.5/js/jquery.dataTables.min.js'></script> -->
			<!--<script src='https://cdn.datatables.net/plug-ins/f2c75b7247b/integration/bootstrap/3/dataTables.bootstrap.js'></script>-->
			<!--<script src='https://cdn.datatables.net/responsive/1.0.4/js/dataTables.responsive.js'></script>-->
			<script src="<?=base_url()?>assets/js/jquery-2.1.3.min.js"></script>
			<script src="<?=base_url()?>assets/js/jquery.dataTables.min.js"></script>
			<script src="<?=base_url()?>assets/js/dataTables.bootstrap.js"></script>
			<script src="<?=base_url()?>assets/js/dataTables.responsive.js"></script>
			<script src="<?=base_url()?>assets/js/jquery.fixedheadertable.min.js" type="text/javascript"></script>

			<script type="text/javascript">
				$(document).ready( function () {
					$('#tableC').DataTable();
				} );
			</script>