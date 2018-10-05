<div id="page-wrapper">
	<div class="row">
		<div class="col-lg-12">
			<h1 class="pageheader"> <?=$this->lang->line('issues_record-title')  ?></h1>
		</div>
		<!-- /.col-lg-12 -->
	</div>

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
				<div class="container">
					<!-- Trigger the modal with a button -->
					<button type="button" class="open-AddBookDialog btn btn-info btn-lg glyphicon-plus" data-toggle="modal" data-target="#add"> Register Issues Record</button>
					<!-- Modal -->
					<div class="modal fade" id="add" role="dialog">
						<div class="modal-dialog">
							<!-- Modal content-->
							<div class="modal-content">
								<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal">&times;</button>
									<h4 class="modal-title">Register Issues Record</h4>
								</div>
								<div class="modal-body">
									<form action="<?= base_url() ?>issues_record/insert/" method="post">

										<input type="hidden" name="project_id" value="<?php echo $project_id[0]; ?>">
										<input type="hidden" name="status" value="1">

										<div class="form-group col-lg-12">
											<label for="responsable"><?=$this->lang->line('ir-identification')?></label>
											<a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?=$this->lang->line('ir-identification-tooltip')?>"><i class="glyphicon glyphicon-comment"></i></a>
											<textarea class="form-control" id="identification"  name="identification" maxlength="45"></textarea>
										</div>

										<!-- Textarea -->

										<div class="form-group">
											<div class="col-lg-6">
												<label><?=$this->lang->line('ir-identification_date')?></label>
												<div class="input-group">
													<div class="input-group-addon">
														<i class="fa fa-calendar"></i>
													</div>
													<input class="form-control" id="identification_date" placeholder="YYYY/MM/DD" type="text" name="identification_date"/>
												</div>
											</div>
										</div>
										
										<div class="form-group col-lg-6">
											<label for="question_description"><?=$this->lang->line('ir-question_description')?></label>
											<a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?=$this->lang->line('ir-question_description-tooltip')?>"><i class="glyphicon glyphicon-comment"></i></a>
											<textarea class="form-control" id="question_description"  name="question_description" maxlength="255"></textarea>
										</div>

										<div class="form-group col-lg-12">
											<label for="type"><?=$this->lang->line('ir-type')?></label>                      
											<a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?=$this->lang->line('ir-type-tooltip')?>"><i class="glyphicon glyphicon-comment"></i></a>

											<textarea class="form-control" id="type"  name="type" maxlength="255"></textarea>
										</div>

										<div class="form-group col-lg-6">
											<label for="responsable"><?=$this->lang->line('ir-responsable')?></label>
											<a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?=$this->lang->line('ir-responsable-tooltip')?>"><i class="glyphicon glyphicon-comment"></i></a>
											<textarea class="form-control" id="responsable"  name="responsable" maxlength="45"></textarea>
										</div>

										<div class="form-group col-lg-6">
											<label for="situation"><?=$this->lang->line('ir-situation')?></label>
											<a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?=$this->lang->line('ir-situation-tooltip')?>"><i class="glyphicon glyphicon-comment"></i></a>
											<textarea class="form-control" id="situation"  name="situation" maxlength="45"></textarea>
										</div>

										<div class="form-group col-lg-12">
											<label for="action"><?=$this->lang->line('ir-action')?></label>
											<a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?=$this->lang->line('ir-action-tooltip')?>"><i class="glyphicon glyphicon-comment"></i></a>
											<textarea class="form-control" id="action"  name="action" maxlength="45"></textarea>
										</div>

										<div class="form-group">
											<div class="col-lg-6">
												<label><?=$this->lang->line('ir-resolution_date')?></label>
												<div class="input-group">
													<div class="input-group-addon">
														<i class="fa fa-calendar"></i>
													</div>
													<input class="form-control" id="resolution_date" placeholder="YYYY/MM/DD" type="text" name="resolution_date"/>
												</div>
											</div>
										</div>


										<div class="form-group">
											<div class="col-lg-6">
												<label><?=$this->lang->line('ir-replan_date')?></label>
												<div class="input-group">
													<div class="input-group-addon">
														<i class="fa fa-calendar"></i>
													</div>
													<input class="form-control" id="replan_date" placeholder="YYYY/MM/DD" type="text" name="replan_date"/>
												</div>
											</div>
										</div>

										<div class="form-group col-lg-12">
											<label for="observations"><?=$this->lang->line('ir-observations')?></label>
											<a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?=$this->lang->line('ir-replan_date-tooltip')?>"><i class="glyphicon glyphicon-comment"></i></a>
											<textarea class="form-control" id="observations"  name="observations" maxlength="45"></textarea>
										</div>

										<div><button type="submit" class="btn btn-lg btn-success pull-right">Save</button>

										</form>
									</div>
									<div class="modal-footer">
										<button type="button" class="btn btn-lg btn-default pull-left" data-dismiss="modal">Close</button>
									</div></div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>


			<style>
			table {
				border-spacing: 0;
				border-collapse: collapse;
				min-width:50px;/*valor minimo px,cm,% etc.*/;
				max-width:100px;/*valor maximo px,,cm,% etc.*/;
				word-wrap:break-word;
				white-space: nowrap;
			}

			.table { 
				width: 100%;
				margin-bottom: 20px;
			}

			.table th,
			.table td {
				font-weight: normal;
				font-size: 13px;
				padding: 8px 15px;
				line-height: 20px;
				text-align: left;
				vertical-align: middle;
				border-top: 1px solid #dddddd;
			}
			.table thead th {
				background: #eeeeee;
				vertical-align: bottom;
			}   
			.table tbody > tr:nth-child(odd) > td,
			.table tbody > tr:nth-child(odd) > th {
				background-color: #fafafa;
			}    
			.table .t-small {
				width: 8%;
			}
			.table .t-medium {
				width: 13%;
			}

		</style>



		<div class="col-sm-12">
			<br><br>
			<div style="overflow:scroll;">
				<?php //var_dump($issues_record) ?>
				<!--	<table id="example" class="table table-striped table-bordered" style="width:100%"> -->
					<table id="example" class="table table-striped table-bordered">
						<thead>
							<tr>
								<th><?=$this->lang->line('ir-identification')?></th>
								<th><?=$this->lang->line('ir-identification_date')?></th>
								<th><?=$this->lang->line('ir-question_description')?></th>
								<th><?=$this->lang->line('ir-type')?></th>
								<th><?=$this->lang->line('ir-responsable')?></th>
								<th><?=$this->lang->line('ir-situation')?></th>
								<th><?=$this->lang->line('ir-action')?></th>
								<th><?=$this->lang->line('ir-resolution_date')?></th>
								<th><?=$this->lang->line('ir-replan_date')?></th>
								<th><?=$this->lang->line('ir-observations')?></th>
								<th>Actions</th>

							</tr>
						</thead>
						<tbody>
							<?php
							foreach ($issues_record as $item) {
								?>
								<tr>
									<td><?php echo $item->identification;?></td>
									<td><?php echo $item->identification_date;?></td>
									<td><?php echo $item->question_description;?></td>
									<td><?php echo $item->type;?></td>
									<td><?php echo $item->responsable;?></td>
									<td><?php echo $item->situation;?></td>
									<td><?php echo $item->action;?></td>
									<td><?php echo $item->resolution_date;?></td>
									<td><?php echo $item->replan_date;?></td>
									<td><?php echo $item->observations;?></td>


									<td>        
										
									</form>

									<form action="<?php echo base_url("Issues_Record/edit/".$item->issues_record_id) ?>">
										<a href="<?=base_url("Issues_Record/edit/".$item->issues_record_id) ?>">
										<button type="button" class="btn btn-default"><em class="fa fa-pencil"></em><span class="hidden-xs">Edit</span></button>
									</a>
									</form>																		

										<form action="<?php echo base_url() ?>issues_record/delete/<?php echo $item->issues_record_id; ?>">
											<button type="submit" class="btn btn-danger"><span class="fa fa-trash"></span> Delete</button>
										</form>
									</td>
								</tr> 
								<?php
							}
							?>

						</tbody>
					</table> 
				</div>  
			</div>
			<!-- /.row -->


			<script type="text/javascript">
 //////////////////////////////////
 // Date Normal
 //////////////////////////////////
 var currentDate = new Date();
 var today = new Date(currentDate.getFullYear(), currentDate.getMonth(), currentDate.getDate(), 0, 0, 0, 0);
 var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";

 var identification_date = $("#identification_date").datepicker({
 	autoclose: true,
 	format: 'yyyy/mm/dd',
  //language: 'pt-BR', //Idioma do Calendario
  container: container,
  keyboardNavigation: true,
  orientation: "bottom",
  todayHighlight : true,
  // startDate: today,
});

	//var currentDate = new Date();
 //var today = new Date(currentDate.getFullYear(), currentDate.getMonth(), currentDate.getDate(), 0, 0, 0, 0);
 //var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";

 var resolution_date = $("#resolution_date").datepicker({
 	autoclose: true,
 	format: 'yyyy/mm/dd',
  //language: 'pt-BR', //Idioma do Calendario
  container: container,
  keyboardNavigation: true,
  orientation: "bottom",
  todayHighlight : true,
  // startDate: today,
});


 var replan_date = $("#replan_date").datepicker({
 	autoclose: true,
 	format: 'yyyy/mm/dd',
  //language: 'pt-BR', //Idioma do Calendario
  container: container,
  keyboardNavigation: true,
  orientation: "bottom",
  todayHighlight : true,
  // startDate: today,
});
</script>


<div>
	<?php $this->load->view('frame/footer_view') ?>            
</div>