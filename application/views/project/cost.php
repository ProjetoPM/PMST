<div id="page-wrapper">
	<div class="row">
		<div class="col-lg-12">
			<h1 class="page-header"><?=$this->lang->line('manage_cost-title')?></h1>
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
				<?php
				$valida=false;
				foreach ($cost_mp as $cost){
					if($cost->project_id==$id){
						$valida=true;
						?>
						

						<form method="POST" action="<?php echo base_url('ManagementCost/insert/'); ?><?php echo $id[0]; ?>">

							<div class=" col-lg-12 form-group">
								<label for="project_costs_m"><?=$this->lang->line('manage_cost-project_costs_m')?> *</label> 
								<a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?=$this->lang->line('manage_cost-project_costs_m-tooltip')?>"><i class="glyphicon glyphicon-comment"></i></a>

								<div >                 
									<textarea oninput="eylem(this, this.value)" class="form-control elasticteste" id="project_costs_m" name="project_costs_m" required="true"><?= $cost_mp[0]->project_costs_m;?></textarea>  
								</div>
							</div>


							<div class="col-lg-12 form-group">
								<label for="accuracy_level"><?=$this->lang->line('manage_cost-accuracy_level')?>
							</label>
							<a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?=$this->lang->line('manage_cost-accuracy_level-tooltip')?>"><i class="glyphicon glyphicon-comment"></i></a>
							<div >     
								<textarea oninput="eylem(this, this.value)" class="form-control elasticteste" id="accuracy_level" name="accuracy_level"><?= $cost_mp[0]->accuracy_level;?></textarea>
							</div>
						</div>


						<div class="col-lg-12 form-group">
							<label for="organizational_procedures"><?=$this->lang->line('manage_cost-organizational_procedures')?>
						</label>
						<a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?=$this->lang->line('manage_cost-organizational_procedures-tooltip')?>"><i class="glyphicon glyphicon-comment"></i></a>
						<div >     
							<textarea oninput="eylem(this, this.value)" class="form-control elasticteste" id="organizational_procedures" name="organizational_procedures"><?= $cost_mp[0]->organizational_procedures;?></textarea>
						</div>
					</div>


					<div class=" col-lg-12 form-group">
						<label for="measurement_rules"><?=$this->lang->line('manage_cost-measurement_rules')?></label> 
						<a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?=$this->lang->line('manage_cost-measurement_rules-tooltip')?>"><i class="glyphicon glyphicon-comment"></i></a>

						<div >                 
							<textarea oninput="eylem(this, this.value)" class="form-control elasticteste" id="measurement_rules" name="measurement_rules"><?= $cost_mp[0]->measurement_rules;?></textarea>  
						</div>
					</div>


					<div class="col-lg-12 form-group">
						<label for="format_report"><?=$this->lang->line('manage_cost-format_report')?>
					</label>
					<a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?=$this->lang->line('manage_cost-format_report-tooltip')?>"><i class="glyphicon glyphicon-comment"></i></a>
					<div >     
						<textarea oninput="eylem(this, this.value)" class="form-control elasticteste" id="format_report" name="format_report"><?= $cost_mp[0]->format_report;?></textarea>
					</div>
				</div>
				
				<div class="col-lg-12">
					<button id="new_human_resource-submit" type="submit" value="Save" class="btn btn-lg btn-success pull-right">
						<i class="glyphicon glyphicon-ok"></i> <?=$this->lang->line('btn-save')?>
					</button> 
				</form>

				<form action="<?php echo base_url('project/'); ?><?php echo $id; ?>" >
					<button class="btn btn-lg btn-info pull-left" >  <i class="glyphicon glyphicon-chevron-left"></i> <?=$this->lang->line('btn-back')?></button>
				</form>
				
			</div>
			<?php
		}
	}
	if($valida==false){
		?>
		<form method="POST" action="<?php echo base_url('ManagementCost/insert/'); ?><?php echo $id[0]; ?>">

			<div class=" col-lg-12 form-group">
				<label for="project_costs_m"><?=$this->lang->line('manage_cost-project_costs_m')?> *</label> 
				<a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?=$this->lang->line('manage_cost-project_costs_m-tooltip')?>"><i class="glyphicon glyphicon-comment"></i></a>

				<div >                 
					<textarea oninput="eylem(this, this.value)" class="form-control elasticteste" id="project_costs_m" name="project_costs_m" required="true"></textarea>  
				</div>
			</div>


			<div class="col-lg-12 form-group">
				<label for="accuracy_level"><?=$this->lang->line('manage_cost-accuracy_level')?>
			</label>
			<a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?=$this->lang->line('manage_cost-accuracy_level-tooltip')?>"><i class="glyphicon glyphicon-comment"></i></a>
			<div >     
				<textarea oninput="eylem(this, this.value)" class="form-control elasticteste" id="accuracy_level" name="accuracy_level"></textarea>
			</div>
		</div>


		<div class="col-lg-12 form-group">
			<label for="organizational_procedures"><?=$this->lang->line('manage_cost-organizational_procedures')?>
		</label>
		<a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?=$this->lang->line('manage_cost-organizational_procedures-tooltip')?>"><i class="glyphicon glyphicon-comment"></i></a>
		<div >     
			<textarea oninput="eylem(this, this.value)" class="form-control elasticteste" id="organizational_procedures" name="organizational_procedures"></textarea>
		</div>
	</div>


	<div class=" col-lg-12 form-group">
		<label for="measurement_rules"><?=$this->lang->line('manage_cost-measurement_rules')?></label> 
		<a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?=$this->lang->line('manage_cost-measurement_rules-tooltip')?>"><i class="glyphicon glyphicon-comment"></i></a>

		<div >                 
			<textarea oninput="eylem(this, this.value)" class="form-control elasticteste" id="measurement_rules" name="measurement_rules"></textarea>  
		</div>
	</div>


	<div class="col-lg-12 form-group">
		<label for="format_report"><?=$this->lang->line('manage_cost-format_report')?>
	</label>
	<a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?=$this->lang->line('manage_cost-format_report-tooltip')?>"><i class="glyphicon glyphicon-comment"></i></a>
	<div >     
		<textarea oninput="eylem(this, this.value)" class="form-control elasticteste" id="format_report" name="format_report"></textarea>
	</div>
</div>

<div class="col-lg-12">
	<button id="new_human_resource-submit" type="submit" value="Save" class="btn btn-lg btn-success pull-right">
		<i class="glyphicon glyphicon-ok"></i> <?=$this->lang->line('btn-save')?>
	</button> 
</form>

<form action="<?php echo base_url('project/'); ?><?php echo $id; ?>" >
	<button class="btn btn-lg btn-info pull-left" >  <i class="glyphicon glyphicon-chevron-left"></i> <?=$this->lang->line('btn-back')?></button>
</form>
<?php
}
?>
</div>
</div>
</section>
</div>
</div>


<?php $this->load->view('frame/footer_view')?>
