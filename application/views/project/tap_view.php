<div id="page-wrapper">
	<div class="row">
		<div class="col-lg-12">
			<h1 class="page-header"> <?=$this->lang->line('tap-title')  ?></h1>
			<form method="POST" action="<?php echo base_url('TapPdf/pdfGenerator/');?><?php echo $id; ?>">
				<input type="hidden" name="project_id"  value="<?php echo $project[0]->project_id; ?>">
				<input type="hidden" name="status" value="1">

				<button id="tap-pdf" type="submit" value="Save" class="btn btn-lg btn-success pull-right" <?php if ($project_charter == null){ ?> disabled <?php   } ?>>
				<i class="glyphicon glyphicon-file"></i> To PDF
			</button>
		</form>
		</div>
		<!-- /.col-lg-12 -->
	</div>
	<!-- /.row -->
	<?php if($this->session->flashdata('success')):?>
		<div class="alert alert-success">
			<a href="#" class="close" data-dismiss="alert">&times;</a>
			<strong><?php echo $this->session->flashdata('success'); ?></strong>
		</div>
		<?php elseif($this->session->flashdata('error')):?>
			<div class="alert alert-warning">
				<a href="#" class="close" data-dismiss="alert">&times;</a>
				<strong><?php echo $this->session->flashdata('error'); ?></strong>
			</div>
		<?php endif;?>

			<?php if ($project_charter == null) { ?>
				<form method="POST" action="<?php echo base_url('Tap/insert/'); ?>">

					<input type="hidden" name="project_id"  value="<?php echo $project[0]->project_id; ?>">
		      <input type="hidden" name="status" value="1">

					<div class="col-lg-12 form-group">
						<label for="project_description"><?=$this->lang->line('tap-description')?></label>
						<a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?=$this->lang->line('tap-description-tooltip')?>"><i class="glyphicon glyphicon-comment"></i></a>
						<div >
							<textarea oninput="eylem(this, this.value)" class="form-control elasticteste" id="project_description" name="project_description" required="true"></textarea>
						</div>
					</div>

					<div class=" col-lg-12 form-group">
						<label for="project_purpose"><?=$this->lang->line('tap-purpose')?></label>
						<a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?=$this->lang->line('tap-purpose-tooltip')?>"><i class="glyphicon glyphicon-comment"></i></a>
						<div >
							<textarea oninput="eylem(this, this.value)" class="form-control elasticteste" id="project_purpose" name="project_purpose"></textarea>
						</div>
					</div>

					<div class=" col-lg-12 form-group">
						<label for="project_objective"><?=$this->lang->line('tap-objectives')?></label>
						<a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?=$this->lang->line('tap-objectives-tooltip')?>"><i class="glyphicon glyphicon-comment"></i></a>
						<div >
							<textarea oninput="eylem(this, this.value)" class="form-control elasticteste" id="project_objective" name="project_objective"></textarea>
						</div>
					</div>

					<div class="col-lg-12 form-group">
						<label for="benefits"><?=$this->lang->line('tap-benefits')?></label>
						<a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?=$this->lang->line('tap-benefits-tooltip')?>"><i class="glyphicon glyphicon-comment"></i></a>
						<div >
							<textarea oninput="eylem(this, this.value)" class="form-control elasticteste" id="benefits" name="benefits"></textarea>
						</div>
					</div>

					<div class=" col-lg-12 form-group">
						<label for="high_level_requirements"><?=$this->lang->line('tap-high_level_req')?></label>
						<a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?=$this->lang->line('tap-high_level_req-tooltip')?>"><i class="glyphicon glyphicon-comment"></i></a>
						<div >
							<textarea oninput="eylem(this, this.value)" class="form-control elasticteste" id="high_level_requirements" name="high_level_requirements"></textarea>
						</div>
					</div>


					<div class=" col-lg-12 form-group">
						<label for="initial_assumptions"><?=$this->lang->line('tap-initial_assumptions')?></label>
						<a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?=$this->lang->line('tap-initial_assumptions-tooltip')?>"><i class="glyphicon glyphicon-comment"></i></a>
						<div >
							<textarea oninput="eylem(this, this.value)" class="form-control elasticteste" id="initial_assumptions" name="initial_assumptions"></textarea>
						</div>
					</div>

					<div class="col-lg-12 form-group">
						<label for="initial_restrictions"><?=$this->lang->line('tap-restrictions')?></label>
						<a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?=$this->lang->line('tap-restrictions-tooltip')?>"><i class="glyphicon glyphicon-comment"></i></a>
						<div >
							<textarea oninput="eylem(this, this.value)" class="form-control elasticteste" id="initial_restrictions" name="initial_restrictions"></textarea>
						</div>
					</div>

					<div class=" col-lg-12 form-group">
						<label for="project_limits"><?=$this->lang->line('tap-limits')?></label>
						<a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?=$this->lang->line('tap-limits-tooltip')?>"><i class="glyphicon glyphicon-comment"></i></a>
						<div >
							<textarea oninput="eylem(this, this.value)" class="form-control elasticteste" id="project_limits" name="project_limits"></textarea>
						</div>
					</div>


					<div class=" col-lg-12 form-group">
						<label for="tap-risks"><?=$this->lang->line('tap-risks')?></label>
						<a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?=$this->lang->line('tap-risks-tooltip')?>"><i class="glyphicon glyphicon-comment"></i></a>
						<div >
							<textarea oninput="eylem(this, this.value)" class="form-control elasticteste" id="high_level_risks" name="high_level_risks"></textarea>
						</div>
					</div>


					<div class=" col-lg-12 form-group">
						<label for="summary_schedule"><?=$this->lang->line('tap-schedule')?></label>
						<a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?=$this->lang->line('tap-schedule-tooltip')?>"><i class="glyphicon glyphicon-comment"></i></a>
						<div >
							<textarea oninput="eylem(this, this.value)" class="form-control elasticteste" id="summary_schedule" name="summary_schedule"></textarea>
						</div>
					</div>

					<div class=" col-lg-12 form-group">
						<label for="budge_summary"><?=$this->lang->line('tap-budge')?></label>
						<a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?=$this->lang->line('tap-budge-tooltip')?>"><i class="glyphicon glyphicon-comment"></i></a>
						<div >
							<textarea oninput="eylem(this, this.value)" class="form-control elasticteste" id="budge_summary" name="budge_summary"></textarea>
						</div>
					</div>


					<div class=" col-lg-12 form-group">
						<label for="project_approval_requirements"><?=$this->lang->line('tap-approval')?></label>
						<a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?=$this->lang->line('tap-approval-tooltip')?>"><i class="glyphicon glyphicon-comment"></i></a>
						<div >
							<textarea oninput="eylem(this, this.value)" class="form-control elasticteste" id="project_approval_requirements" name="project_approval_requirements"></textarea>
						</div>
					</div>

					<!-- Inicio teste datas -->
					<div class="form-group">
						<div class="col-lg-6">
							<label><?=$this->lang->line('tap-start')?></label>
							<div class="input-group padCalendar">
								<div class="input-group-addon">
									<i class="fa fa-calendar"></i>
								</div>
								<input class="form-control" id="start_date" placeholder="YYYY/MM/DD" type="text" name="start_date" required="true" />
							</div>
						</div>
					</div>

					<div class="form-group">
						<div class="col-lg-6">
							<label><?=$this->lang->line('tap-end')?></label>
							<div class="input-group padCalendar">
								<div class="input-group-addon">
									<i class="fa fa-calendar"></i>
								</div>
								<input class="form-control" id="end_date" placeholder="YYYY/MM/DD" type="text" name="end_date" required="true" />
							</div>
						</div>
					</div>
					<!-- Fim teste Datas -->

					<!-- Início modal da lista de stakeholder -->



					<!-- Trigger the modal with a button -->
					<button type="button" class="open-AddBookDialog btn btn-warning btn-lg center-block" data-toggle="modal" data-target="#add">View Stakeholder List</button>
					<!-- Modal -->
					<div class="modal fade" id="add" role="dialog">
						<div class="modal-dialog">
							<!-- Modal content-->
							<div class="modal-content pad-modal">
								<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal">&times;</button>
									<h4 class="modal-title"><?=$this->lang->line('tap-stakeholder')?></h4>
								</div>
								<div class="modal-body">


									<div class="row">
										<table class="col-lg-12">
											<thead>
												<tr>
													<th>Name</th>
													<th>Email</th>
												</tr>
											</thead>
											<tbody>
												<?php

												foreach($stakeholder as $stake){
													if($id==$stake->project_id){
														?>
														<tr>
															<td><?php echo $stake->name; ?></td>
															<td><?php echo $stake->email; ?></td>
														</tr>
														<?php
													}
												}
												?>
											</tbody>
										</table>
									</div>
								</div>
							</div>
						</div>
					</div>

				<input type="hidden" name="status" value="1">

				<div class="col-lg-12">
	       <button id="tap-submit" type="submit" value="Save" class="btn btn-lg btn-success pull-right">
	         <i class="glyphicon glyphicon-ok"></i> <?=$this->lang->line('btn-save')?>
	       </button>
	     </form>


	     <form action="<?php echo base_url('project/'); ?><?php echo $id; ?>" >
	      <button class="btn btn-lg btn-info pull-left" >  <i class="glyphicon glyphicon-chevron-left"></i> <?=$this->lang->line('btn-back')?></button>
	    </form>
	  </div>
	</div>
</form>



		<?php
		}else{
		foreach($project_charter as $tap){
			?>

			<form method="POST" action="<?php echo base_url('Tap/update/');?><?php echo $id; ?>">
			<input type="hidden" name="status" value="1">

			<div class=" col-lg-12 form-group">
				<label for="project_description"><?=$this->lang->line('tap-description')?></label>
				<a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?=$this->lang->line('tap-description-tooltip')?>"><i class="glyphicon glyphicon-comment"></i></a>
				<div>
						<textarea oninput="eylem(this, this.value)" class="form-control elasticteste" id="project_description" name="project_description"><?php echo $tap->project_description; ?></textarea>
				</div>
			</div>

			<div class=" col-lg-12 form-group">
				<label for="project_purpose"><?=$this->lang->line('tap-purpose')?></label>
				<a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?=$this->lang->line('tap-purpose-tooltip')?>"><i class="glyphicon glyphicon-comment"></i></a>
				<div >
					<textarea oninput="eylem(this, this.value)" class="form-control elasticteste" id="project_purpose" name="project_purpose"><?php echo $tap->project_purpose; ?></textarea>
				</div>
			</div>

			<div class=" col-lg-12 form-group">
				<label for="project_objective"><?=$this->lang->line('tap-objectives')?></label>
				<a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?=$this->lang->line('tap-objectives-tooltip')?>"><i class="glyphicon glyphicon-comment"></i></a>
				<div >
					<textarea oninput="eylem(this, this.value)" class="form-control elasticteste" id="project_objective" name="project_objective"><?php echo $tap->project_objective; ?></textarea>
				</div>
			</div>

			<div class="col-lg-12 form-group">
				<label for="benefits"><?=$this->lang->line('tap-benefits')?></label>
				<a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?=$this->lang->line('tap-benefits-tooltip')?>"><i class="glyphicon glyphicon-comment"></i></a>
				<div >
					<textarea oninput="eylem(this, this.value)" class="form-control elasticteste" id="benefits" name="benefits"><?php echo $tap->benefits; ?></textarea>
				</div>
			</div>

			<div class=" col-lg-12 form-group">
				<label for="high_level_requirements"><?=$this->lang->line('tap-high_level_req')?></label>
				<a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?=$this->lang->line('tap-high_level_req-tooltip')?>"><i class="glyphicon glyphicon-comment"></i></a>
				<div >
					<textarea oninput="eylem(this, this.value)" class="form-control elasticteste" id="high_level_requirements" name="high_level_requirements"><?php echo $tap->high_level_requirements; ?></textarea>
				</div>
			</div>


			<div class=" col-lg-12 form-group">
				<label for="initial_assumptions"><?=$this->lang->line('tap-initial_assumptions')?></label>
				<a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?=$this->lang->line('tap-initial_assumptions-tooltip')?>"><i class="glyphicon glyphicon-comment"></i></a>
				<div >
					<textarea oninput="eylem(this, this.value)" class="form-control elasticteste" id="initial_assumptions" name="initial_assumptions"><?php echo $tap->initial_assumptions; ?></textarea>
				</div>
			</div>

			<div class="col-lg-12 form-group">
				<label for="initial_restrictions"><?=$this->lang->line('tap-restrictions')?></label>
				<a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?=$this->lang->line('tap-restrictions-tooltip')?>"><i class="glyphicon glyphicon-comment"></i></a>
				<div >
					<textarea oninput="eylem(this, this.value)" class="form-control elasticteste" id="initial_restrictions" name="initial_restrictions"><?php echo $tap->initial_restrictions; ?></textarea>
				</div>
			</div>

			<div class=" col-lg-12 form-group">
				<label for="project_limits"><?=$this->lang->line('tap-limits')?></label>
				<a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?=$this->lang->line('tap-limits-tooltip')?>"><i class="glyphicon glyphicon-comment"></i></a>
				<div >
					<textarea oninput="eylem(this, this.value)" class="form-control elasticteste" id="project_limits" name="project_limits"><?php echo $tap->project_limits; ?></textarea>
				</div>
			</div>


			<div class=" col-lg-12 form-group">
				<label for="tap-risks"><?=$this->lang->line('tap-risks')?></label>
				<a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?=$this->lang->line('tap-risks-tooltip')?>"><i class="glyphicon glyphicon-comment"></i></a>
				<div >
					<textarea oninput="eylem(this, this.value)" class="form-control elasticteste" id="high_level_risks" name="high_level_risks"><?php echo $tap->high_level_risks; ?></textarea>
				</div>
			</div>


			<div class=" col-lg-12 form-group">
				<label for="summary_schedule"><?=$this->lang->line('tap-schedule')?></label>
				<a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?=$this->lang->line('tap-schedule-tooltip')?>"><i class="glyphicon glyphicon-comment"></i></a>
				<div >
					<textarea oninput="eylem(this, this.value)" class="form-control elasticteste" id="summary_schedule" name="summary_schedule"><?php echo $tap->summary_schedule; ?></textarea>
				</div>
			</div>

			<div class=" col-lg-12 form-group">
				<label for="budge_summary"><?=$this->lang->line('tap-budge')?></label>
				<a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?=$this->lang->line('tap-budge-tooltip')?>"><i class="glyphicon glyphicon-comment"></i></a>
				<div >
					<textarea oninput="eylem(this, this.value)" class="form-control elasticteste" id="budge_summary" name="budge_summary"><?php echo $tap->budge_summary; ?></textarea>
				</div>
			</div>


			<div class=" col-lg-12 form-group">
				<label for="project_approval_requirements"><?=$this->lang->line('tap-approval')?></label>
				<a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?=$this->lang->line('tap-approval-tooltip')?>"><i class="glyphicon glyphicon-comment"></i></a>
				<div >
					<textarea oninput="eylem(this, this.value)" class="form-control elasticteste" id="project_approval_requirements" name="project_approval_requirements"><?php echo $tap->project_approval_requirements; ?></textarea>
				</div>
			</div>

			<!-- Inicio teste datas -->
			<div class="form-group">
				<div class="col-lg-6">
					<label><?=$this->lang->line('tap-start')?></label>
					<div class="input-group padCalendar">
						<div class="input-group-addon">
							<i class="fa fa-calendar"></i>
						</div>
						<input class="form-control" id="start_date" placeholder="YYYY/MM/DD" type="text" name="start_date" required="true" value="<?php echo $tap->start_date;?>"/>
					</div>
				</div>
			</div>

			<div class="form-group">
				<div class="col-lg-6">
					<label><?=$this->lang->line('tap-end')?></label>
					<div class="input-group padCalendar">
						<div class="input-group-addon">
							<i class="fa fa-calendar"></i>
						</div>
						<input class="form-control" id="end_date" placeholder="YYYY/MM/DD" type="text" name="end_date" required="true" value="<?php echo $tap->end_date;?>" />
					</div>
				</div>
			</div>
			<!-- Fim teste Datas -->

			<!-- Início modal da lista de stakeholder -->



			<!-- Trigger the modal with a button -->
			<button type="button" class="open-AddBookDialog btn btn-warning btn-lg center-block" data-toggle="modal" data-target="#add">View Stakeholder List</button>
			<!-- Modal -->
			<div class="modal fade" id="add" role="dialog">
				<div class="modal-dialog">
					<!-- Modal content-->
					<div class="modal-content pad-modal">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal">&times;</button>
							<h4 class="modal-title"><?=$this->lang->line('tap-stakeholder')?></h4>
						</div>
						<div class="modal-body">


							<div class="row">
								<table class="col-lg-12">
									<thead>
										<tr>
											<th>Name</th>
											<th>Email</th>
										</tr>
									</thead>
									<tbody>
										<?php

										foreach($stakeholder as $stake){
											if($id==$stake->project_id){
												?>
												<tr>
													<td><?php echo $stake->name; ?></td>
													<td><?php echo $stake->email; ?></td>
												</tr>
												<?php
											}
										}
										?>
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>

		<input type="hidden" name="status" value="1">

		<div class="col-lg-12">
		 <button id="tap-submit" type="submit" value="Save" class="btn btn-lg btn-success pull-right">
			 <i class="glyphicon glyphicon-ok"></i> <?=$this->lang->line('btn-save')?>
		 </button>
	 </form>

	 <form action="<?php echo base_url('project/'); ?><?php echo $id; ?>" >
		<button class="btn btn-lg btn-info pull-left" >  <i class="glyphicon glyphicon-chevron-left"></i> <?=$this->lang->line('btn-back')?></button>
	</form>
</div>

														<?php } }?>

														<!-- /.row -->

														<script type="text/javascript">

									      //////////////////////////////////
									      // Start Date & End Date
									     //////////////////////////////////
									     var currentDate = new Date();
									     var today = new Date(currentDate.getFullYear(), currentDate.getMonth(), currentDate.getDate(), 0, 0, 0, 0);
									     var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";

									     var startDate = $("#start_date").datepicker({
									     	autoclose: true,
									     	format: 'yyyy/mm/dd',
									        //language: 'pt-BR', //Idioma do Calendario
									        container: container,
									        keyboardNavigation: true,
									        orientation: "bottom",
									        todayHighlight : true,
									        startDate: today,
									       }).on('changeDate', function(ev) {
									       	var newDate = new Date(ev.date.setDate(ev.date.getDate() + 1));
									       	endDate.datepicker("setStartDate", newDate);
									       });

									      //Start Date Ends Here
									      var endDate = $("#end_date").datepicker({
									      	autoclose: true,
									      	format: 'yyyy/mm/dd',
									        //language: 'pt-BR', //Idioma do Calendario
									        container: container,
									        keyboardNavigation: true,
									        orientation: "bottom",
									        startDate: today,
									        /*todayHighlight : true,*/
									       });
									      //End Date Ends Here
									     </script>
									      <?php $this->load->view('frame/footer_view')?>
