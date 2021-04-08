
<div id="page-wrapper">
	<div class="row" position="absolute">
		<div class="col-lg-12">
			<h1 class="page-header">Communications Management Plan </h1>
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



			<style>
			.table-bordered {
				border: 1px solid #4c4848;
			}
			modal-content{
				width: 90%;
				position: relative;
			}

			table .header-fixed {
				position: fixed;
				top: 40px;
				z-index: 1020; /* 10 less than .navbar-fixed to prevent any overlap */
				border-bottom: 1px solid #d5d5d5;
				-webkit-border-radius: 0;
				-moz-border-radius: 0;
				border-radius: 0;
				-webkit-box-shadow: inset 0 1px 0 #fff, 0 1px 5px rgba(0,0,0,.1);
				-moz-box-shadow: inset 0 1px 0 #fff, 0 1px 5px rgba(0,0,0,.1);
				box-shadow: inset 0 1px 0 #fff, 0 1px 5px rgba(0,0,0,.1);
				filter: progid:DXImageTransform.Microsoft.gradient(enabled=false); /* IE6-9 */
			}


			table {
				border-spacing: 0;
				min-width:50px;/*valor minimo px,cm,% etc.*/;
				max-width:100%;/*valor maximo px,,cm,% etc.*/;
				word-wrap:break-word;
				box-sizing: border-box;
				border-collapse: separate;
				max-height: 200px;
				min-height: 3px;
				text-align: center;
				padding: 7px;
				position: relative;
				vertical-align: middle;
				writing-mode: sideways-lr;
				word-break: break-all;
				-webkit-box-sizing: border-box;
				-moz-box-sizing: border-box;
				white-space: nowrap;
				box-sizing: border-box;

			}

			th{      
				font-size: 13px;
				height: auto;
				text-align: center;
				color: white;


			}
			td {
				width:auto;
				font-weight: normal;      
				font-size: 13px;
				height: auto;
				text-align: left;
			}

			.table thead th {
				background: linear-gradient(-180deg, #a94809, #d68e39);
				vertical-align: middle;
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


     /* .table-fixed{
  width: 100%;
  background-color: #f3f3f3;
  tbody{
    height:200px;
    overflow-y:auto;
    width: 100%;
    }
  thead,tbody,tr,td,th{
    display:block;
  }
  tbody{
    td{
      float:left;
    }
  }
  thead {
    tr{
      th{
        float:left;
       background-color: #f39c12;
       border-color:#e67e22;
      }
    }
  }
}
*/
        /*!
* jquery.fixedHeaderTable. The jQuery fixedHeaderTable plugin
*
* Copyright (c) 2011 Mark Malek
* http://fixedheadertable.com
*
* Licensed under MIT
* http://www.opensource.org/licenses/mit-license.php
* 
* http://docs.jquery.com/Plugins/Authoring
* jQuery authoring guidelines
*
* Launch  : October 2009
* Version : 1.3
* Released: May 9th, 2011
*
* 
* all CSS sizing (width,height) is done in pixels (px)
*/

/* @group Reset */

.fht-table,
.fht-table thead,
.fht-table tfoot,
.fht-table tbody,
.fht-table tr,
.fht-table th,
.fht-table td {
	/* position */
	margin: 0;

	/* size */
	padding: 0;

	/* text */
	font-size: 100%;
	font: inherit;
	vertical-align: top;
}

.fht-table {
	/* appearance */
	border-collapse: collapse;
	border-spacing: 0;
}

/* @end */

/* @group Content */

.fht-table-wrapper,
.fht-table-wrapper .fht-thead,
.fht-table-wrapper .fht-tfoot,
.fht-table-wrapper .fht-fixed-column .fht-tbody,
.fht-table-wrapper .fht-fixed-body .fht-tbody,
.fht-table-wrapper .fht-tbody {
	/* appearance */
	overflow: hidden;

	/* position */
	position: relative;
}

.fht-table-wrapper .fht-fixed-body .fht-tbody,
.fht-table-wrapper .fht-tbody {
	/* appearance */
	overflow: auto;
}

.fht-table-wrapper .fht-table .fht-cell {
	/* appearance */
	overflow: hidden;

	/* size */
	height: 1px;
}

.fht-table-wrapper .fht-fixed-column,
.fht-table-wrapper .fht-fixed-body {
	/* position */
	top: 0;
	left: 0;
	position: absolute;
}

.fht-table-wrapper .fht-fixed-column {
	/* position */
	z-index: 1;
}

/* @end */
</style>

<div class="row">
	<div class="col-lg-12">
		<div class="container">
			<!-- Trigger the modal with a button -->
			<button type="button" class="btn btn-info btn-lg glyphicon-plus" data-toggle="modal" data-target="#add"> New Communication Item</button>
			<button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#maimodel"><em class="fa fa-pencil"></em><span class="hidden-xs"> Stakeholder</span></button>
			<!-- Modal -->
			<div class="modal fade" id="add" role="dialog">
				<div class="modal-dialog"style="width:75em;" >
					<!-- Modal content-->
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal">&times;</button>
							<h4 class="modal-title">New Communication Item</h4>
						</div>
						<div class="modal-body">
							<form action="<?= base_url() ?>communication_item/insert/" method="post">

								<input type="hidden" name="project_id" value="<?php echo $project_id[0]; ?>">
								<input type="hidden" name="status" value="1">

								<div class=" col-lg-12 form-group">
									<label>Type</label>
									<a href="#" type="button" id="tooltip" data-toggle="tooltip" data-placement="top" title="Here goes the type of the Communication Item">
										?
									</a>
									<div>
										<textarea class="form-control" id="type" placeholder="Type" name="type" maxlength="45"></textarea>
									</div>
								</div>

								<!-- Textarea -->
								<div class=" col-lg-6 form-group">
									<label>Description</label>
									<div>
										<textarea class="form-control" id="description" placeholder="Description" name="description" maxlength="45"></textarea>
									</div>
								</div>

								<div class=" col-lg-6 form-group">
									<label>Content</label>
									<div>
										<textarea class="form-control" id="content" placeholder="Content" name="content" maxlength="255"></textarea>
									</div>
								</div>

								<div class=" col-lg-12 form-group">
									<label>Distribution Reason</label>
									<div>
										<textarea class="form-control" id="distribution_reason" placeholder="Distribution Reason" name="distribution_reason" maxlength="255"></textarea>
									</div>
								</div>

								<div class=" col-lg-6 form-group">
									<label>Language</label>
									<select class="form-control" name="language" required="" style="height:56px;">
										<option></option>
										<option value="English">English</option>
										<option value="Portuguese">Portuguese Brazil</option>
										<option value="Portuguese Portugal">Portuguese Portugal</option>
										<option value="Spanish">Spanish</option>
										<option value="Dutch">Dutch</option>
									</select>
								</div>

								<div class=" col-lg-6 form-group">
									<label>Channel</label>
									<div>
										<textarea class="form-control" id="channel" placeholder="Channel" name="channel" maxlength="45"></textarea>
									</div>
								</div>

								<div class=" col-lg-12 form-group">
									<label>Document Format</label>
									<div>
										<textarea class="form-control" id="documento_format" placeholder="Document Format" name="documento_format" maxlength="45"></textarea>
									</div>
								</div>

								<div class=" col-lg-6 form-group">
									<label>Method</label>
									<div>
										<textarea class="form-control" id="metod" placeholder="Method" name="metod" maxlength="45"></textarea>
									</div>
								</div>

								<div class=" col-lg-6 form-group">
									<label for="frequency">Frequency</label>
									<div>
										<textarea class="form-control" id="frequency" placeholder="Frequency" name="frequency" maxlength="45"></textarea>
									</div>
								</div>

								<div class=" col-lg-12 form-group">
									<label for="allocated_resources">Allocated Resources</label>
									<div>
										<textarea class="form-control" id="allocated_resources" placeholder="Allocated Resources" name="allocated_resources" maxlength="45"></textarea>
									</div>
								</div>

								<div class=" col-lg-6 form-group">
									<label for="format">Format</label>
									<div>                     
										<textarea class="form-control" id="format" placeholder="Format" name="format" maxlength="45"></textarea>
									</div>
								</div>

								<div class=" col-lg-6 form-group">
									<label for="local">Local</label>
									<div> 
										<textarea class="form-control" id="local" placeholder="Local" name="local" maxlength="45"></textarea>
									</div>
								</div>
								<div class="row">
									<div class="col-lg-6">
										<button type="button" class="btn btn-lg btn-default pull-left" data-dismiss="modal">Close</button>
									</div>
									<div class="col-lg-6">
										<button id="new_communication_item-submit" type="submit" value="Save" class="btn btn-lg btn-success pull-right">
											<i class="glyphicon glyphicon-ok"></i>Save
										</button> 
									</div>
								</div>
							</form>



						</div>
					</div>
				</div>
			</div>
		</div>
	</div>









	<!-- Trigger the modal with a button -->
	<div class="row">
		<div class="col-lg-2">

			<!-- Modal -->
			<div class="modal fade" id="maimodel" role="dialog">
				<div class="modal-dialog modal-lg" style="width:75em;">

					<!-- Modal content    FEchar com ESC-->
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal">&times;</button>
							<h4 class="modal-title">Communication Stakeholder</h4>
						</div>
						<div class="modal-body">

							<table class="table table-bordered table-striped" >
								<caption>Legenda</caption>
								<thead>
									<tr>
										<th>Initials</th>
										<th>Name</th>
									</tr>
								</thead>
								<body>
									<!-- Nessa Tabela as Initials tem q ficar no meio!!-->
									<tr>
										<?php
										foreach ($communication_responsability as $res) {
											?>
											<td style="text-align: center;"><?php echo $res->initials;?></td>
											<td><?php echo $res->name;?></td>
										</tr>
									<?php } ?>
								</body>
							</table>
							<br></br>
							<!-- Segunda Tabela!!-->
							<div style="overflow:scroll;max-height: 500px;"  align = "center">
								<table class="table table-bordered table-striped" align="center">
									<caption>Tabela Stakeholder</caption>
									<thead>
										<tr>
											<th >Description</th>

											<?php
											foreach ($stakeholder as $stake) {
												?>
												<th>
													<?php echo $stake->name;?>
												</th>
											<?php } ?> 
										</tr>
									</thead>
									<tbody>

										<tr>

											<?php
											foreach ($communication_item as $item) {
												?>
												<td><?php echo $item->description; ?></td>

												<?php
												foreach ($stakeholder as $stake) {
													?>
													<td>
														<label>Responsability</label>
														<select class="form-control" <select style="width:90px;">>
															<option></option>
															<?php foreach ($communication_responsability as $responsability) { ?>
																<option><?php echo $responsability->initials;?> </option>
															<?php } ?>
														</select>
													</td>
												<?php } ?> 
											</tr>
										<?php } ?>
									</tbody>
								</table> 
							</div>
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-lg btn-default btn-block" data-dismiss="modal">Close</button>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="col-sm-12" align="center">
	<br><br>
	<p> <strong>Table Communication Items</strong> </p>
	<div style="overflow:scroll;max-height: 500px;"  align = "center">
		<div id="tabelaComunication">
			<table id="tableComunication" class="table table-bordered table-striped" align="center" >
				<thead>
					<tr>
						<th >Type</th>
						<th>Description</th>
						<th>Content</th>
						<th>Distribution Reason </th>
						<th >Language</th>
						<th>Channel</th>
						<th>Document Format</th>
						<th>Method</th>
						<th>Frequency</th>
						<th>Allocated Resources</th>
						<th>Format</th>
						<th>Local</th>
						<th >Actions</th>
					</tr>
				</thead>
				<tbody>
					<?php
					foreach ($communication_item as $item) {
						?>
						<tr>

							<td><?= $item->type; ?></td>
							<td><?php echo $item->description;?></td>
							<td><?php echo $item->content;?></td>
							<td><?php echo $item->distribution_reason;?></td>
							<td><?php echo $item->language;?></td>
							<td><?php echo $item->channel;?></td>
							<td><?php echo $item->documento_format;?></td>
							<td><?php echo $item->metod;?></td>
							<td><?php echo $item->frequency;?></td>
							<td><?php echo $item->allocated_resources;?></td>
							<td><?php echo $item->format;?></td>
							<td><?php echo $item->local;?></td>
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
	</div>

	<!-- /.row --> </div> 
	<div class="col-sm-12" position= "absolute">
		<div class="container">
			<?php $this->load->view('frame/footer_view') ?>            
		</div>
	</div>
</div> 

<script src="<?=base_url()?>assets/js/jquery.fixedheadertable.min.js" type="text/javascript"></script>

<script type="text/javascript" >
    // $(document).on("ready", function(){
      // // add 30 more rows to the table
      // var row = $('table#mytable > tbody > tr:first');
      // var row2 = $('table#mytable2 > tbody > tr:first');
      // for (i=0; i<30; i++) {
      //   $('table#mytable > tbody').append(row.clone());
      //   $('table#mytable2 > tbody').append(row2.clone());
      // }

      // make the header fixed on scroll
      $('#tableComunication').fixedHeaderTable({ footer: false, cloneHeadToFoot: false, fixedColumn: false });
    // });
</script>


<!-- Cod Elastic TextArea -->
<script src="<?=base_url()?>assets/js/elasticTextarea.js" type="text/javascript"></script>