<div id="page-wrapper">
	<div class="row">
		<div class="col-lg-12">
			<h1 class="page-header"><?=$this->lang->line('risk-title')?></h1>
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
		<div class="row">
			<div class="col-lg-12">

				<form method="POST" action="<?php echo base_url('RegisterRisk/insert/'); ?><?php echo $id; ?>">
					
					<div class=" col-lg-6 form-group">
						<label for="impacted_objective"><?=$this->lang->line('risk-impacted_objective')?> *</label> 
						<a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?=$this->lang->line('risk-impacted_objective-tooltip')?>"><i class="glyphicon glyphicon-comment"></i></a>

						<div >  
							<input id="impacted_objective" name="impacted_objective" type="text" class="form-control input-md" required="true">
						</div>
					</div>


					<!-- valor 0 para baixo | valor 1 para  medio | valor 2 para alta-->
					<div class="col-lg-6 form-group">
						<label for="priority"><?=$this->lang->line('risk-priority')?></label>
						<a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?=$this->lang->line('risk-priority-tooltip')?>"><i class="glyphicon glyphicon-comment"></i></a>
						<select name="priority" class="form-control">
							<option value="0"><?=$this->lang->line('risk-priority-low')?></option>
							<option value="1"><?=$this->lang->line('risk-priority-medium')?></option>
							<option value="2"><?=$this->lang->line('risk-priority-high')?></option>

						</select>
					</div>

					<div class=" col-lg-6 form-group">
						<label for="risk_status"><?=$this->lang->line('risk-risk_status')?></label> 
						<a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?=$this->lang->line('risk-risk_status-tooltip')?>"><i class="glyphicon glyphicon-comment"></i></a>

						<div >
							<input id="risk_status" name="risk_status" type="text" class="form-control input-md">
						</div>
					</div>


					<div class=" col-lg-6 form-group">
						<label for="event"><?=$this->lang->line('risk-event')?></label> 
						<a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?=$this->lang->line('risk-event-tooltip')?>"><i class="glyphicon glyphicon-comment"></i></a>

						<div >            
							<input id="event" name="event" type="text" class="form-control input-md">
						</div>
					</div>


					<!-- Inicio teste datas -->
					<div class="form-group">
						<div class="col-lg-6">
							<label><?=$this->lang->line('risk-date')?></label>
							<div class="input-group">
								<div class="input-group-addon">
									<i class="fa fa-calendar"></i>
								</div>
								<input class="form-control" id="date" placeholder="YYYY/MM/DD" type="text" name="date"  />
							</div>
						</div>
					</div>



					<div class=" col-lg-6 form-group">
						<label for="identifier"><?=$this->lang->line('risk-identifier')?></label> 
						<a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?=$this->lang->line('risk-identifier-tooltip')?>"><i class="glyphicon glyphicon-comment"></i></a>

						<div >               
							<input id="identifier" name="identifier" type="text" class="form-control input-md">
						</div>
					</div>

					<div class=" col-lg-6 form-group">
						<label for="type"><?=$this->lang->line('risk-type')?></label> 
						<a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?=$this->lang->line('risk-type-tooltip')?>"><i class="glyphicon glyphicon-comment"></i></a>

						<div >                 
							<input id="type" name="type" type="text" class="form-control input-md">
						</div>
					</div>	

					<div class="col-lg-12">
						<button id="stakeholder-submit" type="submit" value="Save" class="btn btn-lg btn-success pull-right">
							<i class="glyphicon glyphicon-ok"></i> <?=$this->lang->line('btn-save')?>
						</button> 
					</form>

					<form action="<?php echo base_url('project/'); ?><?php echo $id; ?>" >
						<button class="btn btn-lg btn-info pull-left" >  <i class="glyphicon glyphicon-chevron-left"></i> <?=$this->lang->line('btn-back')?></button>
					</form>
				</div>
			</div>

		</section>
	</div>
</div>
<script type="text/javascript">

									      //////////////////////////////////
									      // Start Date & End Date
									      //////////////////////////////////
									      var currentDate = new Date();
									      var today = new Date(currentDate.getFullYear(), currentDate.getMonth(), currentDate.getDate(), 0, 0, 0, 0);
									      var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";

									      var startDate = $("#date").datepicker({
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
									  </script>
									  <?php $this->load->view('frame/footer_view')?>
