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
			<div class="col-lg-6">
				<!--<form method="POST" action="<?php echo base_url('RiskRegister/insert/'); ?><?php echo $id; ?>">
				-->
				<form id="form" method="post">
					<div class="form-group">
						<label for="impacted_objective"><?=$this->lang->line('risk-impacted_objective')?> *</label> 
						<a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?=$this->lang->line('risk-impacted_objective-tooltip')?>"><i class="glyphicon glyphicon-comment"></i></a>
						<div>  
							<input id="impacted_objective" name="impacted_objective" type="text" class="form-control input-md" required="true">
						</div>
					</div>
					</div>
					


					<!-- valor 0 para baixo | valor 1 para  medio | valor 2 para alta-->
					<div class="col-lg-6 form-group">
						<label for="priority"><?=$this->lang->line('risk-priority')?></label>
						<a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?=$this->lang->line('risk-priority-tooltip')?>"><i class="glyphicon glyphicon-comment"></i></a>
						<select id="priority" name="priority" class="form-control">
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

					<div class=" col-lg-6 form-group">
						<label for="result"><?=$this->lang->line('risk-result')?></label> 
						<a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?=$this->lang->line('risk-result-tooltip')?>"><i class="glyphicon glyphicon-comment"></i></a>

						<div >                 
							<input id="result" name="result" type="text" class="form-control input-md">
						</div>
					</div>	

					<div class=" col-lg-6 form-group">
						<label for="strategy"><?=$this->lang->line('risk-strategy')?></label> 
						<a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?=$this->lang->line('risk-strategy-tooltip')?>"><i class="glyphicon glyphicon-comment"></i></a>

						<div >                 
							<input id="strategy" name="strategy" type="text" class="form-control input-md">
						</div>
					</div>	

					<div class=" col-lg-6 form-group">
						<label for="triggers"><?=$this->lang->line('risk-triggers')?></label> 
						<a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?=$this->lang->line('risk-triggers-tooltip')?>"><i class="glyphicon glyphicon-comment"></i></a>

						<div >                 
							<input id="triggers" name="triggers" type="text" class="form-control input-md">
						</div>
					</div>	

					<div class=" col-lg-6 form-group">
						<label for="response_action"><?=$this->lang->line('risk-response_action')?></label> 
						<a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?=$this->lang->line('risk-response_action-tooltip')?>"><i class="glyphicon glyphicon-comment"></i></a>

						<div >                 
							<input id="response_action" name="response_action" type="text" class="form-control input-md">
						</div>
					</div>	

					<div class=" col-lg-6 form-group">
						<label for="contingency_action"><?=$this->lang->line('risk-contingency_action')?></label>
						<a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?=$this->lang->line('risk-contingency_action-tooltip')?>"><i class="glyphicon glyphicon-comment"></i></a>

						<div >                 
							<input id="contingency_action" name="contingency_action" type="text" class="form-control input-md">
						</div>
					</div>

					<div class=" col-lg-6 form-group">
						<label for="responsible_contingency"><?=$this->lang->line('risk-responsible_contingency')?></label>
						<a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?=$this->lang->line('risk-responsible_contingency-tooltip')?>"><i class="glyphicon glyphicon-comment"></i></a>

						<div >                 
							<input id="responsible_contingency" name="responsible_contingency" type="text" class="form-control input-md">
						</div>
					</div>

					<div class=" col-lg-6 form-group">
						<label for="contingency_reserve"><?=$this->lang->line('risk-contingency_reserve')?></label>
						<a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?=$this->lang->line('risk-contingency_reserve')?>"><i class="glyphicon glyphicon-comment"></i></a>

						<div >                 
							<input id="contingency_reserve" name="contingency_reserve" type="text" class="form-control input-md">
						</div>
					</div>

					<div class=" col-lg-6 form-group">
						<label for="category"><?=$this->lang->line('risk-category')?></label>
						<a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?=$this->lang->line('risk-category-tooltip')?>"><i class="glyphicon glyphicon-comment"></i></a>

						<div >                 
							<input id="category" name="category" type="text" class="form-control input-md">
						</div>
					</div>

					<div class=" col-lg-6 form-group">
						<label for="lessons_learned"><?=$this->lang->line('risk-lessons_learned')?></label>
						<a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?=$this->lang->line('risk-lessons_learned-tooltip')?>"><i class="glyphicon glyphicon-comment"></i></a>

						<div >                 
							<input id="lessons_learned" name="" type="text" class="form-control input-md">
						</div>
					</div>

					<div class="col-lg-12">
						<button id="register_risk-submit" type="submit" value="Save" class="btn btn-lg btn-success pull-right">
							<i class="glyphicon glyphicon-ok"></i> <?=$this->lang->line('btn-save')?>
						</button> 
					</form>
					<form action="<?php echo base_url('RiskRegister/list/'); ?><?php echo $id; ?>" >
						<button class="btn btn-lg btn-info pull-left" >  <i class="glyphicon glyphicon-chevron-left"></i> <?=$this->lang->line('btn-back')?></button>
					</form>

				</section>  
			</div>
		</div>

		<script type="text/javascript">

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

									  <!-- JavaScript -->
									  <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.11.2/build/alertify.min.js"></script>
									  <!-- CSS -->
									  <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.11.2/build/css/alertify.min.css"/>

									  <script type="text/javascript">
									     	//console.log(`Passei a prioridade $('#priority').val()`);

									     	$('#form').on('submit', (e) => {
									     		e.preventDefault()

									     		$.post("<?php echo base_url() ?>RiskRegister/insert/", {
									     			project_id: <?= $id ?>,
									     			impacted_objective: $('#impacted_objective').val(),
									     			priority: $('#priority').val(),
									     			risk_status: $('#risk_status').val(),
									     			event: $('#event').val(),
									     			date: $('#date').val(),
									     			identifier: $('#identifier').val(),
									     			type: $('#type').val(),
									     			result: $('#result').val(),
									     			strategy: $('#strategy').val(),
									     			triggers: $('#triggers').val(),
									     			response_action: $('#response_action').val(),
									     			contingency_action: $('#contingency_action').val(),
									     			responsible_contingency: $('#responsible_contingency').val(),
									     			contingency_reserve: $('#contingency_reserve').val(),
									     			category: $('#category').val(),
									     			lessons_learned: $('#lessons_learned').val(),
									     		}).done(() => {
									     			alertify.success('<?=$this->lang->line('alertfy-save-success')?>');
									     			setTimeout(() => {
									     				location.href = "../list/<?= $id ?>"
									     			}, 1500)
									  			// location.href = "../list/<?= $id ?>"
									  		}).fail(() => {
									  			alertify.error('<?=$this->lang->line('alertfy-save-error')?>');
									  		})

									  	})

									  </script>
									  <?php $this->load->view('frame/footer_view')?>
