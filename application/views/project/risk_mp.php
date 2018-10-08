<div id="page-wrapper">
	<div class="row">
		<div class="col-lg-12">
			<h1 class="page-header" ><?=$this->lang->line('risk_mp')?></h1>
		</div>
		<!-- /.col-lg-12 -->
	</div>
	<!-- /.row -->          
	<div class="row">
		<div class="col-lg-12">
			<?php
			if($risk_mp != NULL){
				?>
				<form action="<?=base_url()?>risk/update/<?php echo $risk_mp[0]->risk_mp_id; ?>" method="post">
					<input type="hidden" name="project_id" value="<?php echo $project_id;?>">
					<div class="form-group">
						<label for="methodology"><?=$this->lang->line('methodology')?></label>
						<a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?=$this->lang->line('methodology-tp')?>"><i class="glyphicon glyphicon-comment"></i></a>
						<div >                     
							<textarea class="form-control" id="methodology" name="methodology"><?php echo $risk_mp[0]->methodology; ?></textarea>
						</div>
					</div>
					<div class="form-group">
						<label for="roles_responsibilities"><?=$this->lang->line('roles_responsabilities')?></label>
						<a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?=$this->lang->line('roles_responsabilities-tp')?>"><i class="glyphicon glyphicon-comment"></i></a>
						<div >                     
							<textarea class="form-control" id="roles_responsibilities" name="roles_responsabilities"><?php echo $risk_mp[0]->roles_responsibilities; ?></textarea>
						</div>
					</div>
					<div class="form-group">
						<label for="probability_impact_matrix"><?=$this->lang->line('probability_impact_matrix')?></label>
						<a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?=$this->lang->line('probability_impact_matrix-tp')?>"><i class="glyphicon glyphicon-comment"></i></a>
						<div >                     
							<textarea class="form-control" id="probability_impact_matrix" name="probability_impact_matrix"><?php echo $risk_mp[0]->probability_impact_matrix; ?></textarea>
						</div>
					</div>
					<div class="form-group">
						<label for="risk_management_processes"><?=$this->lang->line('risk_management_processes')?></label>
						<a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?=$this->lang->line('risk_management_processes-tp')?>"><i class="glyphicon glyphicon-comment"></i></a>
						<div >                     
							<textarea class="form-control" id="risk_management_processes" name="risk_management_processes"><?php echo $risk_mp[0]->risk_management_processes; ?></textarea>
						</div>
					</div>
					<div class="form-group">
						<label for="risks_categories"><?=$this->lang->line('risks_categories')?></label>
						<a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?=$this->lang->line('risks_categories-tp')?>"><i class="glyphicon glyphicon-comment"></i></a>
						<div >                     
							<textarea class="form-control" id="risks_categories" name="risks_categories"><?php echo $risk_mp[0]->risks_categories; ?></textarea>
						</div>
					</div>

					<div class="form-group">
						<label for="risks_probability_impact"><?=$this->lang->line('risks_probability_impact')?></label>
						<a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?=$this->lang->line('risks_probability_impact-tp')?>"><i class="glyphicon glyphicon-comment"></i></a>
						<div >                     
							<textarea class="form-control" id="risks_probability_impact" name="risks_probability_impact"><?php echo $risk_mp[0]->risks_probability_impact; ?></textarea>
						</div>
					</div>
					<div class="form-group">
						<label for="reviewed_tolerances"><?=$this->lang->line('reviewed_tolerances')?></label>
						<a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?=$this->lang->line('reviewed_tolerances-tp')?>"><i class="glyphicon glyphicon-comment"></i></a>
						<div >                     
							<textarea class="form-control" id="reviewed_tolerances" name="reviewed_tolerances"><?php echo $risk_mp[0]->reviewed_tolerances; ?></textarea>
						</div>
					</div>
					<div class="form-group">
						<label for="traceability"><?=$this->lang->line('traceability')?></label>
						<a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?=$this->lang->line('traceability-tp')?>"><i class="glyphicon glyphicon-comment"></i></a>
						<div >                     
							<textarea class="form-control" id="traceability" name="traceability"><?php echo $risk_mp[0]->traceability; ?></textarea>
						</div>
					</div>
					<div class="col-lg-12">
						<button id="stakeholder-submit" type="submit" value="Save" class="btn btn-lg btn-success pull-right">
							<i class="glyphicon glyphicon-ok"></i> <?=$this->lang->line('btn-save')?>
						</button> 
					</form>

					<form action="<?php echo base_url('project/'); ?><?php echo  $project_id[0]; ?>" >
						<button class="btn btn-lg btn-info pull-left" >  <i class="glyphicon glyphicon-chevron-left"></i> <?=$this->lang->line('btn-back')?></button>
					</form>
					<?php
				}else{
					?>
					<form action="<?=base_url()?>risk/insert/" method="post">
						<input type="hidden" name="project_id" value="<?php echo $project_id[0];?>">
						<div class="form-group">
							<label for="methodology"><?=$this->lang->line('methodology')?></label>
							<a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?=$this->lang->line('methodology-tp')?>"><i class="glyphicon glyphicon-comment"></i></a>
							<div >                     
								<textarea class="form-control" id="methodology" name="methodology" ></textarea>
							</div>
						</div>
						<div class="form-group">
							<label for="roles_responsibilities"><?=$this->lang->line('roles_responsabilities')?></label>
							<a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?=$this->lang->line('roles_responsabilities-tp')?>"><i class="glyphicon glyphicon-comment"></i></a>
							<div >                     
								<textarea class="form-control" id="roles_responsibilities" name="roles_responsibilities"></textarea>
							</div>
						</div>
						<div class="form-group">
							<label for="probability_impact_matrix"><?=$this->lang->line('probability_impact_matrix')?></label>
							<a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?=$this->lang->line('probability_impact_matrix-tp')?>"><i class="glyphicon glyphicon-comment"></i></a>
							<div >                     
								<textarea class="form-control" id="probability_impact_matrix" name="probability_impact_matrix"></textarea>
							</div>
						</div>
						<div class="form-group">
							<label for="risk_management_processes"><?=$this->lang->line('risk_management_processes')?></label>
							<a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?=$this->lang->line('risk_management_processes-tp')?>"><i class="glyphicon glyphicon-comment"></i></a>
							<div >                     
								<textarea class="form-control" id="risk_management_processes" name="risk_management_processes"></textarea>
							</div>
						</div>
						<div class="form-group">
							<label for="risks_categories"><?=$this->lang->line('risks_categories')?></label>
							<a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?=$this->lang->line('risks_categories-tp')?>"><i class="glyphicon glyphicon-comment"></i></a>
							<div >                     
								<textarea class="form-control" id="risks_categories" name="risks_categories"></textarea>
							</div>
						</div>

						<div class="form-group">
							<label for="risks_probability_impact"><?=$this->lang->line('risks_probability_impact')?></label>
							<a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?=$this->lang->line('risks_probability_impact-tp')?>"><i class="glyphicon glyphicon-comment"></i></a>
							<div >                     
								<textarea class="form-control" id="risks_probability_impact" name="risks_probability_impact"></textarea>
							</div>
						</div>
						<div class="form-group">
							<label for="reviewed_tolerances"><?=$this->lang->line('reviewed_tolerances')?></label>
							<a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?=$this->lang->line('reviewed_tolerances-tp')?>"><i class="glyphicon glyphicon-comment"></i></a>
							<div >                     
								<textarea class="form-control" id="reviewed_tolerances" name="reviewed_tolerances"></textarea>
							</div>
						</div>
						<div class="form-group">
							<label for="traceability"><?=$this->lang->line('traceability')?></label>
							<a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?=$this->lang->line('traceability-tp')?>"><i class="glyphicon glyphicon-comment"></i></a>
							<div >                     
								<textarea class="form-control" id="traceability" name="traceability"></textarea>
							</div>
						</div>
						<div class="col-lg-12">
							<button id="stakeholder-submit" type="submit" value="Save" class="btn btn-lg btn-success pull-right">
								<i class="glyphicon glyphicon-ok"></i> <?=$this->lang->line('btn-save')?>
							</button> 
						</form>

						<form action="<?php echo base_url('project/'); ?><?php echo  $project_id[0]; ?>" >
							<button class="btn btn-lg btn-info pull-left" >  <i class="glyphicon glyphicon-chevron-left"></i> <?=$this->lang->line('btn-back')?></button>
						</form>
						<?php
					}
					?>
				</div>
				<!-- /.row -->
			</div>
		</div>

		<?php $this->load->view('frame/footer_view')?>            