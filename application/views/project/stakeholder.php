<div id="page-wrapper">
	<div class="row">
		<div class="col-lg-12">
			<h1 class="page-header"><?=$this->lang->line('stakeholder-title')?></h1>
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

				<form method="POST" action="<?php echo base_url('GerenciarStake/insert/'); ?><?php echo $id; ?>">
					
					<div class=" col-lg-12 form-group">
						<label for="name"><?=$this->lang->line('stakeholder-name')?> *</label> 
						<a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?=$this->lang->line('stakeholder-name-tooltip')?>"><i class="glyphicon glyphicon-comment"></i></a>

						<div >                 
							<textarea oninput="eylem(this, this.value)" class="form-control elasticteste" id="name" name="name" required="true"></textarea>  
						</div>
					</div>


					<!-- valor 0 para externo | valor 1 para interno -->
					<div class="col-lg-3 form-group">
						<label for="type"><?=$this->lang->line('stakeholder-type')?></label>
						<a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?=$this->lang->line('stakeholder-type-tooltip')?>"><i class="glyphicon glyphicon-comment"></i></a>
						<select name="type" class="form-control">
							<option value="0"><?=$this->lang->line('stakeholder-type-external')?></option>
							<option value="1"><?=$this->lang->line('stakeholder-type-internal')?></option>
						</select>
					</div>


					<!-- valor 0 para cliente| valor 1 para team| valor 2 para provedor | valor 3 para gerente | valor 4 para patrocinador | valor 5 para outros -->
					<div class="col-lg-3 form-group">
						<label for="role"><?=$this->lang->line('stakeholder-role')?></label>
						<a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?=$this->lang->line('stakeholder-role-tooltip')?>"><i class="glyphicon glyphicon-comment"></i></a>
						<select name="role" class="form-control">
							<option value="0"><?=$this->lang->line('stakeholder-role-client')?></option>
							<option value="1"><?=$this->lang->line('stakeholder-role-team')?></option>
							<option value="2"><?=$this->lang->line('stakeholder-role-provider')?></option>
							<option value="3"><?=$this->lang->line('stakeholder-role-project_manager')?></option>
							<option value="4"><?=$this->lang->line('stakeholder-role-sponsor')?></option>
							<option value="5"><?=$this->lang->line('stakeholder-role-others')?></option>
						</select>
					</div>




					<div class=" col-lg-6 form-group">
						<label for="organization"><?=$this->lang->line('stakeholder-organization')?></label> 
						<a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?=$this->lang->line('stakeholder-organization-tooltip')?>"><i class="glyphicon glyphicon-comment"></i></a>

						<div >                 
							<textarea oninput="eylem(this, this.value)" class="form-control elasticteste" id="organization" name="organization"></textarea>  
						</div>
					</div>

<!--
					<div class="form-group">
						<label>Name:</label><a href="#" type="button" id="tooltip" data-toggle="tooltip" data-placement="top" title="Name of new stakeholder">
							?
						</a>
						<input type="text" class="form-control" name="name">
					</div>
					<div class="form-group">
						<label>Type:</label><a href="#" type="button" id="tooltip" data-toggle="tooltip" data-placement="top" title="Type of new stakeholder">
							?
						</a>
						<select name="type">
							<option value="External">External</option>
							<option value="Internal">Internal</option>
						</select>
					</div>
					<div class="form-group">
						<label>Organization:</label><a href="#" type="button" id="tooltip" data-toggle="tooltip" data-placement="top" title="Organization of new stakeholder">
							?
						</a>
						<input type="text" class="form-control" name="organization">
					</div>
				-->

					<div class=" col-lg-6 form-group">
						<label for="position"><?=$this->lang->line('stakeholder-position')?></label> 
						<a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?=$this->lang->line('stakeholder-position-tooltip')?>"><i class="glyphicon glyphicon-comment"></i></a>

						<div >                 
							<textarea oninput="eylem(this, this.value)" class="form-control elasticteste" id="position" name="position"></textarea>  
						</div>
					</div>
<!--
					<div class="form-group">
						<label>Position in organization:</label><a href="#" type="button" id="tooltip" data-toggle="tooltip" data-placement="top" title="Position in organization of new stakeholder">
							?
						</a>
						<input type="text" class="form-control" name="position">
					</div>

					<div class="form-group">
						<label>Main Role in the Project:</label><a href="#" type="button" id="tooltip" data-toggle="tooltip" data-placement="top" title="Role of new stakeholder in project">
							?
						</a>
						<select name="role">
							<option value="Client">Client</option>
							<option value="Team">Team</option>
							<option value="Provider">Provider</option>
							<option value="Project manager">Project manager</option>
							<option value="Sponsor">Sponsor</option>
							<option value="Others">Others</option>
						</select>
					</div>
-->					
					<div class=" col-lg-6 form-group">
						<label for="responsibility"><?=$this->lang->line('stakeholder-responsibility')?></label> 
						<a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?=$this->lang->line('stakeholder-responsibility-tooltip')?>"><i class="glyphicon glyphicon-comment"></i></a>

						<div >                 
							<textarea oninput="eylem(this, this.value)" class="form-control elasticteste" id="responsibility" name="responsibility"></textarea>  
						</div>
					</div>
					<!--
					<div class="form-group">
						<label>Main Project Responsibility:</label><a href="#" type="button" id="tooltip" data-toggle="tooltip" data-placement="top" title="Responsibility of new stakeholder in project">
							?
						</a>
						<input type="text" class="form-control" name="responsibility">
					</div>
-->


					<div class=" col-lg-12 form-group">
						<label for="email"><?=$this->lang->line('stakeholder-email')?></label> 
						<a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?=$this->lang->line('stakeholder-email-tooltip')?>"><i class="glyphicon glyphicon-comment"></i></a>

						<div >                 
							<textarea oninput="eylem(this, this.value)" class="form-control elasticteste" id="email" name="email"></textarea>  
						</div>
					</div>	
<!--
					<div class="form-group">
						<label>E-mail:</label><a href="#" type="button" id="tooltip" data-toggle="tooltip" data-placement="top" title="E-mail of new stakeholder">
							?
						</a>
						<input type="text" class="form-control" name="email">
					</div>
-->
					<div class=" col-lg-6 form-group">
						<label for="phone_number"><?=$this->lang->line('stakeholder-phone_number')?></label> 
						<a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?=$this->lang->line('stakeholder-phone_number-tooltip')?>"><i class="glyphicon glyphicon-comment"></i></a>

						<div >                 
							<textarea oninput="eylem(this, this.value)" class="form-control elasticteste" id="phone_number" name="phone_number"></textarea>  
						</div>
					</div>
					<!--
					<div class="form-group">
						<label>Fone:</label><a href="#" type="button" id="tooltip" data-toggle="tooltip" data-placement="top" title="Phone of new stakeholder">
							?
						</a>
						<input type="text" class="form-control" name="phone_number">
					</div>
-->

					<div class=" col-lg-6 form-group">
						<label for="work_place"><?=$this->lang->line('stakeholder-work_place')?></label> 
						<a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?=$this->lang->line('stakeholder-work_place-tooltip')?>"><i class="glyphicon glyphicon-comment"></i></a>

						<div >                 
							<textarea oninput="eylem(this, this.value)" class="form-control elasticteste" id="work_place" name="work_place"></textarea>  
						</div>
					</div>
					<!--
					<div class="form-group">
						<label>Workplace:</label><a href="#" type="button" id="tooltip" data-toggle="tooltip" data-placement="top" title="Workplace of new stakeholder">
							?
						</a>
						<input type="text" class="form-control" name="work_place">
					</div>
-->

					<div class=" col-lg-12 form-group">
						<label for="essential_requirements"><?=$this->lang->line('stakeholder-essential_requirements')?></label> 
						<a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?=$this->lang->line('stakeholder-essential_requirements-tooltip')?>"><i class="glyphicon glyphicon-comment"></i></a>

						<div >                 
							<textarea oninput="eylem(this, this.value)" class="form-control elasticteste" id="essential_requirements" name="essential_requirements"></textarea>  
						</div>
					</div>
<!--
					<div class="form-group">
						<label>Essential Requirements:</label><a href="#" type="button" id="tooltip" data-toggle="tooltip" data-placement="top" title="Essential Requirements of new stakeholder">
							?
						</a>
						<input type="text" class="form-control" name="essential_requirements">
					</div>
-->
					<div class=" col-lg-6 form-group">
						<label for="main_expectations"><?=$this->lang->line('stakeholder-main_expectations')?></label> 
						<a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?=$this->lang->line('stakeholder-main_expectations-tooltip')?>"><i class="glyphicon glyphicon-comment"></i></a>

						<div >                 
							<textarea oninput="eylem(this, this.value)" class="form-control elasticteste" id="main_expectations" name="main_expectations"></textarea>  
						</div>
					</div>
<!--
					<div class="form-group">
						<label>Main Expectations:</label><a href="#" type="button" id="tooltip" data-toggle="tooltip" data-placement="top" title="Expectations of new stakeholder">
							?
						</a>
						<input type="text" class="form-control" name="main_expectations">
					</div>
-->
					<div class=" col-lg-6 form-group">
						<label for="interest_phase"><?=$this->lang->line('stakeholder-interest_phase')?></label> 
						<a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?=$this->lang->line('stakeholder-interest_phase-tooltip')?>"><i class="glyphicon glyphicon-comment"></i></a>

						<div >                 
							<textarea oninput="eylem(this, this.value)" class="form-control elasticteste" id="interest_phase" name="interest_phase"></textarea>  
						</div>
					</div>
					<!--
					<div class="form-group">
						<label>Phase of Greater Interest:</label><a href="#" type="button" id="tooltip" data-toggle="tooltip" data-placement="top" title="Phase of greater interest of new stakeholder">
							?
						</a>
						<input type="text" class="form-control" name="interest_phase">
					</div>
-->	
					<div class=" col-lg-12 form-group">
						<label for="observations"><?=$this->lang->line('stakeholder-observations')?></label> 
						<a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?=$this->lang->line('stakeholder-observations-tooltip')?>"><i class="glyphicon glyphicon-comment"></i></a>

						<div >                 
							<textarea oninput="eylem(this, this.value)" class="form-control elasticteste" id="observations" name="observations"></textarea>  
						</div>
					</div>
					<!--
					<div class="form-group">
						<label>Observations:</label><a href="#" type="button" id="tooltip" data-toggle="tooltip" data-placement="top" title="Observations of new stakeholder">
							?
						</a>
						<input type="text" class="form-control" name="observations">
					</div>

-->
					<div class="col-lg-12">
            <button id="new_human_resource-submit" type="submit" value="Save" class="btn btn-lg btn-success pull-right">
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
	<?php $this->load->view('frame/footer_view')?>
