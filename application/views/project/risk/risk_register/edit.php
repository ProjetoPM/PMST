<div id="page-wrapper">
	<div class="row">
		<div class="col-lg-12">
			<h1 class="page-header"> <?=$this->lang->line('risk-title')  ?></h1>
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
		<!-- acessa o objeto do array -->

		<?php extract($risk_register); ?>
		
	<!--	<form action="<?=base_url()?>RiskRegister/update/<?php echo $risk_register_id; ?>" method="post">
	-->
	<div class="row">
	<form id="form" method="post">

		<input type="hidden" id="project_id" name="project_id" value="<?php echo $project_id; ?>">                          
		<input type="hidden" id="risk_register_id" name="risk_register_id" value="<?php echo $risk_register_id; ?>">  
		<!-- Textarea -->

		<div class=" col-lg-6 form-group">
			<label for="impacted_objective"><?=$this->lang->line('risk-impacted_objective')?> *</label> 
			<a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?=$this->lang->line('risk-impacted_objective-tooltip')?>"><i class="glyphicon glyphicon-comment"></i></a>

			<div >  
				<input id="impacted_objective" name="impacted_objective" type="text" class="form-control input-md" required="true" value="<?php echo $impacted_objective; ?>">
			</div>
		</div>

		<!-- valor 0 para baixo | valor 1 para  medio | valor 2 para alta-->
		<div class="col-lg-6 form-group">
			<label for="priority"><?=$this->lang->line('risk-priority')?></label>
			<a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?=$this->lang->line('risk-priority-tooltip')?>"><i class="glyphicon glyphicon-comment"></i></a>
			<select name="priority" id="priority" class="form-control" value="<?php echo $priority; ?>">
				<option value="0"><?=$this->lang->line('risk-priority-low')?></option>
				<option value="1"><?=$this->lang->line('risk-priority-medium')?></option>
				<option value="2"><?=$this->lang->line('risk-priority-high')?></option>

			</select>
		</div>

		<div class=" col-lg-6 form-group">
			<label for="risk_status"><?=$this->lang->line('risk-risk_status')?></label> 
			<a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?=$this->lang->line('risk-risk_status-tooltip')?>"><i class="glyphicon glyphicon-comment"></i></a>

			<div >
				<input id="risk_status" name="risk_status" type="text" class="form-control input-md" value="<?php echo $risk_status; ?>">
			</div>
		</div>


		<div class=" col-lg-6 form-group">
			<label for="event"><?=$this->lang->line('risk-event')?></label> 
			<a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?=$this->lang->line('risk-event-tooltip')?>"><i class="glyphicon glyphicon-comment"></i></a>

			<div >            
				<input id="event" name="event" type="text" class="form-control input-md" value="<?php echo $event; ?>">
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
					<input class="form-control" id="date" placeholder="YYYY/MM/DD" type="text" name="date" value="<?php echo $date; ?>" />
				</div>
			</div>
		</div>



		<div class=" col-lg-6 form-group">
			<label for="identifier"><?=$this->lang->line('risk-identifier')?></label> 
			<a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?=$this->lang->line('risk-identifier-tooltip')?>"><i class="glyphicon glyphicon-comment"></i></a>

			<div >               
				<input id="identifier" name="identifier" type="text" class="form-control input-md" value="<?php echo $identifier; ?>">
			</div>
		</div>

		<div class=" col-lg-6 form-group">
			<label for="type"><?=$this->lang->line('risk-type')?></label> 
			<a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?=$this->lang->line('risk-type-tooltip')?>"><i class="glyphicon glyphicon-comment"></i></a>

			<div >                 
				<input id="type" name="type" type="text" class="form-control input-md" value="<?php echo $type; ?>">
			</div>
		</div>	

		<div class=" col-lg-6 form-group">
			<label for="result"><?=$this->lang->line('risk-result')?></label> 
			<a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?=$this->lang->line('risk-result-tooltip')?>"><i class="glyphicon glyphicon-comment"></i></a>

			<div >                 
				<input id="result" name="result" type="text" class="form-control input-md"  value="<?php echo $result; ?>">
			</div>
		</div>	

		<div class=" col-lg-6 form-group">
			<label for="strategy"><?=$this->lang->line('risk-strategy')?></label> 
			<a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?=$this->lang->line('risk-strategy-tooltip')?>"><i class="glyphicon glyphicon-comment"></i></a>

			<div >                 
				<input id="strategy" name="strategy" type="text" class="form-control input-md" value="<?php echo $strategy; ?>">
			</div>
		</div>	

		<div class=" col-lg-6 form-group">
			<label for="triggers"><?=$this->lang->line('risk-triggers')?></label> 
			<a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?=$this->lang->line('risk-triggers-tooltip')?>"><i class="glyphicon glyphicon-comment"></i></a>

			<div >                 
				<input id="triggers" name="triggers" type="text" class="form-control input-md" value="<?php echo $triggers; ?>">
			</div>
		</div>	

		<div class=" col-lg-6 form-group">
			<label for="response_action"><?=$this->lang->line('risk-response_action')?></label> 
			<a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?=$this->lang->line('risk-response_action-tooltip')?>"><i class="glyphicon glyphicon-comment"></i></a>

			<div >                 
				<input id="response_action" name="response_action" type="text" class="form-control input-md" value="<?php echo $response_action; ?>">
			</div>
		</div>	

		<div class=" col-lg-6 form-group">
			<label for="contingency_action"><?=$this->lang->line('risk-contingency_action')?></label>
			<a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?=$this->lang->line('risk-contingency_action-tooltip')?>"><i class="glyphicon glyphicon-comment"></i></a>

			<div >                 
				<input id="contingency_action" name="contingency_action" type="text" class="form-control input-md" value="<?php echo $contingency_action; ?>">
			</div>
		</div>

		<div class=" col-lg-6 form-group">
			<label for="responsible_contingency"><?=$this->lang->line('risk-responsible_contingency')?></label>
			<a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?=$this->lang->line('risk-responsible_contingency-tooltip')?>"><i class="glyphicon glyphicon-comment"></i></a>

			<div >                 
				<input id="responsible_contingency" name="responsible_contingency" type="text" class="form-control input-md" value="<?php echo $responsible_contingency; ?>">
			</div>
		</div>

		<div class=" col-lg-6 form-group">
			<label for="contingency_reserve"><?=$this->lang->line('risk-contingency_reserve')?></label>
			<a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?=$this->lang->line('risk-contingency_reserve')?>"><i class="glyphicon glyphicon-comment"></i></a>

			<div >                 
				<input id="contingency_reserve" name="contingency_reserve" type="text" class="form-control input-md" value="<?php echo $contingency_reserve; ?>">
			</div>
		</div>

		<div class=" col-lg-6 form-group">
			<label for="category"><?=$this->lang->line('risk-category')?></label>
			<a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?=$this->lang->line('risk-category-tooltip')?>"><i class="glyphicon glyphicon-comment"></i></a>

			<div >                 
				<input id="category" name="category" type="text" class="form-control input-md" value="<?php echo $category; ?>">
			</div>
		</div>

		<div class=" col-lg-6 form-group">
			<label for="lessons_learned"><?=$this->lang->line('risk-lessons_learned')?></label>
			<a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?=$this->lang->line('risk-lessons_learned-tooltip')?>"><i class="glyphicon glyphicon-comment"></i></a>

			<div >                 
				<input id="lessons_learned" name="lessons_learned" type="text" class="form-control input-md" value="<?php echo $lessons_learned; ?>">
			</div>
		</div>

		<div class="col-lg-12">
			<button id="stakeholder-submit" type="submit" value="Save" class="btn btn-lg btn-success pull-right">
				<i class="glyphicon glyphicon-ok"></i> <?=$this->lang->line('btn-save')?>
			</button> 
		</form>

		<form action="<?php echo base_url('RiskRegister/list/'); ?><?php echo $project_id; ?>" >
			<button class="btn btn-lg btn-info pull-left" >  <i class="glyphicon glyphicon-chevron-left"></i> <?=$this->lang->line('btn-back')?></button>
		</form>
	</div>
</div>

</section>

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

									  <!-- JavaScript -->
									  <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.11.2/build/alertify.min.js"></script>
									  <!-- CSS -->
									  <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.11.2/build/css/alertify.min.css"/>

									  <script type="text/javascript">

									  	$('#form').on('submit', (e) => {
									  		e.preventDefault()

									  	//	var project_id = $('#project_id').val();

									  	$.post("<?php echo base_url() ?>RiskRegister/update/<?= $risk_register_id ?>", {
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
									  		project_id: $('#project_id').val()
									  	}).done(() => {
									  		alertify.success('<?=$this->lang->line('alertfy-edit-success')?>');
									  		setTimeout(() => {
									  			location.href = "../list/<?= $project_id ?>"
									  		}, 1500)
									  	}).fail(() => {
									  		alertify.error('<?=$this->lang->line('alertfy-edit-error')?>');
									  	})

									  })

									</script>
									<?php $this->load->view('frame/footer_view')?>
