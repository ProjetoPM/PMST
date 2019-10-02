<div id="page-wrapper">
	<div class="row">
		<div class="col-lg-12">
			<h1 class="page-header"> <?=$this->lang->line('agregate_value_edit-title')?></h1>
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

		<script type="text/javascript">
		  function variation(){
		    document.getElementById('variation_at_the_end').value = 0
		    var agregate_value = document.getElementById('agregate_value').value;
		    var real_agregate_cost = document.getElementById('real_agregate_cost').value;
		    var aux  = ((agregate_value) - (real_agregate_cost));
		    document.getElementById('variation_at_the_end').value = aux;
		  }
		</script>

		<script type="text/javascript">
			function estimate(){
				document.getElementById('estimate_for_completion').value = 0
				var estimated_of_completation = document.getElementById('estimated_of_completation').value;
				var budget_at_cumulative_end = document.getElementById('budget_at_cumulative_end').value;
				var aux  = ((estimated_of_completation) - (budget_at_cumulative_end));
				document.getElementById('estimate_for_completion').value = aux;
			}
		</script>


		<?php extract($activity); ?>

		<div class="row">
			<div class="col-lg-12">
					<form action="<?=base_url()?>Activity/updateAgregateValue/<?php echo $id; ?>" method="post">

			<input type="hidden" id="project_id" name="project_id" value="<?php echo $project_id; ?>">
			<!-- Textarea -->
			<ul class="abas">
			    <!-- Aqui, criação da primeira aba -->

					<div class="col-lg-12 form-group">
					 <label for="name"><?=$this->lang->line('activity_name')?></label>
					 <div >
						 <input  id="name_text" name="name" type="text" class="form-control input-md" required="false" value="<?php echo $activity_name; ?>" disabled>
					 </div>
				 </div>


			<div class=" col-lg-3 form-group">
				<label for="agregate_value"><?=$this->lang->line('agregate_value')?></label>
				<a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?=$this->lang->line('agregate_value-tp')?>"><i class="glyphicon glyphicon-comment"></i></a>
				<div>
					<input id="agregate_value" name="agregate_value" type="number" min="0.00" max="10000.00" step="0.01" class="form-control input-md" value="<?php echo $agregate_value; ?>" onchange="variation()">
				</div>
			</div>

			<div class=" col-lg-3 form-group">
				<label for="planned_value"><?=$this->lang->line('planned_value')?></label>
				<a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?=$this->lang->line('planned_value-tp')?>"><i class="glyphicon glyphicon-comment"></i></a>
				<div>
					<input id="planned_value" name="planned_value" type="number" min="0.00" max="10000.00" step="0.01" class="form-control input-md" value="<?php echo $planned_value; ?>">
				</div>
			</div>

			<div class=" col-lg-3 form-group">
				<label for="real_agregate_cost"><?=$this->lang->line('real_agregate_cost')?></label>
				<a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?=$this->lang->line('real_agregate_cost-tp')?>"><i class="glyphicon glyphicon-comment"></i></a>
				<div>
					<input id="real_agregate_cost" name="real_agregate_cost" type="number" min="0.00" max="10000.00" step="0.01" class="form-control input-md" onchange="variation()" value="<?php echo $real_agregate_cost; ?>">
				</div>
			</div>

			<div class=" col-lg-3 form-group">
				<label for="budget_at_cumulative_end"><?=$this->lang->line('budget_at_cumulative_end')?></label>
				<a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?=$this->lang->line('budget_at_cumulative_end-tp')?>"><i class="glyphicon glyphicon-comment"></i></a>
				<div>
					<input id="budget_at_cumulative_end" name="budget_at_cumulative_end" onchange="estimate()" type="number" min="0.00" max="10000.00" step="0.01" class="form-control input-md" value="<?php echo $budget_at_cumulative_end; ?>">
				</div>
			</div>

			<div class=" col-lg-3 form-group">
				<label for="variation_of_terms"><?=$this->lang->line('variation_of_terms')?></label>
				<a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?=$this->lang->line('variation_of_terms-tp')?>"><i class="glyphicon glyphicon-comment"></i></a>
				<div>
					<input id="variation_of_terms" name="variation_of_terms" type="number" min="0.00" max="10000.00" step="0.01" class="form-control input-md" value="<?php echo $variation_of_terms; ?>">
				</div>
			</div>

			<div class=" col-lg-3 form-group">
				<label for="variation_of_costs"><?=$this->lang->line('variation_of_costs')?></label>
				<a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?=$this->lang->line('variation_of_costs-tp')?>"><i class="glyphicon glyphicon-comment"></i></a>
				<div>
					<input id="variation_of_costs" name="variation_of_costs" type="number" min="0.00" max="10000.00" step="0.01" class="form-control input-md" value="<?php echo $variation_of_costs; ?>">
				</div>
			</div>

			<div class=" col-lg-3 form-group">
				<label for="variation_at_the_end"><?=$this->lang->line('variation_at_the_end')?></label>
				<a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?=$this->lang->line('variation_at_the_end-tp')?>"><i class="glyphicon glyphicon-comment"></i></a>
				<div>
					<input id="variation_at_the_end" name="variation_at_the_end" type="number" min="0.00" max="10000.00" step="0.01" class="form-control input-md" readonly=“true” value="<?php echo $variation_at_the_end; ?>">
				</div>
			</div>

			<div class=" col-lg-3 form-group">
				<label for="deadline_performance_index"><?=$this->lang->line('deadline_performance_index')?></label>
				<a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?=$this->lang->line('deadline_performance_index-tp')?>"><i class="glyphicon glyphicon-comment"></i></a>
				<div>
					<input id="deadline_performance_index" name="deadline_performance_index" type="number" min="0.00" max="10000.00" step="0.01" class="form-control input-md" value="<?php echo $deadline_performance_index; ?>">
				</div>
			</div>

			<div class=" col-lg-3 form-group">
				<label for="costs_performance_index"><?=$this->lang->line('costs_performance_index')?></label>
				<a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?=$this->lang->line('costs_performance_index-tp')?>"><i class="glyphicon glyphicon-comment"></i></a>
				<div>
					<input id="costs_performance_index" name="costs_performance_index" type="number" min="0.00" max="10000.00" step="0.01" class="form-control input-md" value="<?php echo $costs_performance_index; ?>">
				</div>
			</div>

			<div class=" col-lg-3 form-group">
				<label for="estimated_of_completation"><?=$this->lang->line('estimated_of_completation')?></label>
				<a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?=$this->lang->line('estimated_of_completation-tp')?>"><i class="glyphicon glyphicon-comment"></i></a>
				<div>
					<input id="estimated_of_completation" name="estimated_of_completation" onchange="estimate()" type="number" min="0.00" max="10000.00" step="0.01" class="form-control input-md" value="<?php echo $estimated_of_completation; ?>">
				</div>
			</div>

			<div class=" col-lg-3 form-group">
				<label for="estimate_for_completion"><?=$this->lang->line('estimate_for_completion')?></label>
				<a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?=$this->lang->line('estimate_for_completion-tp')?>"><i class="glyphicon glyphicon-comment"></i></a>
				<div>
					<input id="estimate_for_completion" name="estimate_for_completion" readonly=“true” type="number" min="0.00" max="10000.00" step="0.01" class="form-control input-md" value="<?php echo $estimate_for_completion; ?>">
				</div>
			</div>



			<div class="col-lg-12">
				<button id="activity-submit" type="submit" value="Save" class="btn btn-lg btn-success pull-right">
					<i class="glyphicon glyphicon-ok"></i> <?=$this->lang->line('btn-save')?>
				</button>
			</form>

			<form action="<?php echo base_url('Activity/listAgregateValue/'); ?><?php echo $project_id; ?>" >
				<button onclick="estimate()" onclick="variation()" class="btn btn-lg btn-info pull-left" >  <i class="glyphicon glyphicon-chevron-left"></i> <?=$this->lang->line('btn-back')?></button>
			</form>
		</div>
	</div>

	</div>

</section>
</div>
</div>

									  <?php $this->load->view('frame/footer_view')?>
