<div id="page-wrapper">
	<div class="row" position="absolute">
		<div class="col-lg-12">
			<h1 class="page-header">Team Performance Evaluation </h1>
		</div>
		<!-- /.col-lg-12 -->

		<style>
		.table-bordered {
			border: 1px solid #4c4848;
		}
		table {
			border-spacing: 0;
			min-width:50px;/*valor minimo px,cm,% etc.*/;
			max-width:100%;/*valor maximo px,,cm,% etc.*/;
			word-wrap:break-word;
			white-space: nowrap;
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
		}
		th{      
			font-size: 13px;
			height: auto;
			text-align: center;
			color: white;
		}
		td {
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
	</style>


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
					<button type="button" class="open-AddBookDialog btn btn-info btn-lg glyphicon-plus" data-toggle="modal" data-target="#add"> Team Performance Evaluation</button>

					<!-- Modal -->
					<div class="modal fade" id="add" role="dialog">
						<div class="modal-dialog">
							<!-- Modal content-->
							<div class="modal-content">
								<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal">&times;</button>
									<h4 class="modal-title">Team Performance Evaluation</h4>
								</div>
								<div class="modal-body">
									<form action="<?= base_url() ?>Ade/insertAde/" method="post">

										<!-- Textarea -->
										<div class="form-group">
											<label>Team Member Name</label>
											<textarea class="form-control" id="team_member_name" placeholder="Team Member Name" name="team_member_name" maxlength="45"></textarea>
										</div>

										<div class="form-group">
											<label>Role</label>
											<textarea class="form-control" id="role" placeholder="Role" name="role" maxlength="255"></textarea>
										</div>

										<div class="form-group">
											<label>Project Function</label>
											<textarea class="form-control" id="project_function" placeholder="Project Function" name="project_function" maxlength="255"></textarea>
										</div>

										<div class="form-group">
											<label>Report Date</label>
											<div class="form-group">

												<label><?=$this->lang->line('tap-start')?></label><a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?=$this->lang->line('tap-start-tooltip')?>"><i class="glyphicon glyphicon-comment"></i></a><br>
												<input class="form-control" type="date" name="start_date"><br>

											</div>
										</div>

										<div class="form-group">
											<label>Team Members Comments</label>
											<textarea class="form-control" id="team_member_comments" placeholder="Team Members Comments" name="team_member_comments" maxlength="45"></textarea>
										</div>

										<div class="form-group">
											<label>Strong Points</label>
											<textarea class="form-control" id="strong_points" placeholder="Strong Points" name="strong_points" maxlength="45"></textarea>
										</div>

										<div class="form-group">
											<label for="frequency">Improvement</label>
											<textarea class="form-control" id="improvement" placeholder="Improvement" name="improvement" maxlength="45"></textarea>
										</div>

										<div class="form-group">
											<label for="allocated_resources">Development Plan</label>
											<textarea class="form-control" id="development_plan" placeholder="Development Plan" name="development_plan" maxlength="45"></textarea>
										</div>

										<div class="form-group">
											<label for="allocated_resources">Already Developed</label>
											<textarea class="form-control" id="already_developed" placeholder="Already Developed" name="already_developed" maxlength="45"></textarea>
										</div>

										<div class="form-group">
											<label for="format">External Comments</label>
											<div>                     
												<textarea class="form-control" id="external_comments" placeholder="External Comments" name="external_comments" maxlength="45"></textarea>
											</div>
										</div>

										<div class="form-group">
											<label for="format">Team Mates Comments</label>
											<div>                     
												<textarea class="form-control" id="team_mates_comments" placeholder="Team Mates Comments" name="team_mates_comments" maxlength="45"></textarea>
											</div>
										</div>

										<div class="form-group">
											<label for="format">Team Performance Evalution</label>
											<div>                     
												<textarea class="form-control" id="team_performance_exaluationcol" placeholder="Team Performance Evalution" name="team_performance_exaluationcol" maxlength="45"></textarea>
											</div>
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
					<!-- Modal -->


					<div class="col-sm-12" align="center">
						<p> <strong>Team Performance Evaluation</strong> </p>
						<div style="overflow:scroll;"  align="center">

							<table class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">

								<thead>
									<tr>
										<th align="t-small">Nome do Membro</th>
										<th>Data Avaliação</th>
										<th>Função</th>
									</tr>
								</thead>
								<?php var_dump($team_performance_evaluation); ?>

								<tbody>
									<tr>
										<td><?php echo $team_performance_evaluation->team_member_name;?></td>
										<td></td>
										<td></td>
										<td><button></button></td>
										<!-- FINISH TABLE -->								
									</tr> 
								</tbody>
							</table> 
						</div>
					</div>
				</div>
			</div>

			<!-- MODAL CONTENT -->

			<div class="col-sm-12" position= "absolute">
				<div class="container">
					<?php $this->load->view('frame/footer_view') ?>
				</div> 
			</div>