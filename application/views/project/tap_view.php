<div id="page-wrapper">
	<div class="row">
		<div class="col-lg-12">
			<h1 class="page-header"> <?=$this->lang->line('tap-title')  ?></h1>
		</div>
		<!-- /.col-lg-12 -->
	</div>
	<!-- /.row -->          
	<div class="row">
		<div class="col-lg-12">

			<?php if ($project_charter == null) { ?>
				<form action="<?=base_url()?>tap/insert/" method="post">
					<input type="hidden" name="project_id" value="<?php echo $project_id[0];?>">

					<div class="col-lg-12 form-group">
						<label for="project_description"><?=$this->lang->line('tap-description')?></label>
						<a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?=$this->lang->line('tap-description-tooltip')?>"><i class="glyphicon glyphicon-comment"></i></a>
						<div >                     
							<textarea oninput="eylem(this, this.value)" class="form-control elasticteste" id="project_description" name="project_description"></textarea>
						</div>
					</div>

					<div class=" col-lg-6 form-group">
						<label for="project_purpose"><?=$this->lang->line('tap-purpose')?></label>
						<a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?=$this->lang->line('tap-purpose-tooltip')?>"><i class="glyphicon glyphicon-comment"></i></a>
						<div >                     
							<textarea oninput="eylem(this, this.value)" class="form-control elasticteste" id="project_purpose" name="project_purpose"></textarea>
						</div>
					</div>

					<div class=" col-lg-6 form-group">
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

					<div class=" col-lg-6 form-group">
						<label for="high_level_requirements"><?=$this->lang->line('tap-high_level_req')?></label>
						<a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?=$this->lang->line('tap-high_level_req-tooltip')?>"><i class="glyphicon glyphicon-comment"></i></a>
						<div >                     
							<textarea oninput="eylem(this, this.value)" class="form-control elasticteste" id="high_level_requirements" name="high_level_requirements"></textarea>
						</div>
					</div>

							
					<div class=" col-lg-6 form-group">
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

					<div class=" col-lg-6 form-group">
						<label for="project_limits"><?=$this->lang->line('tap-limits')?></label>
						<a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?=$this->lang->line('tap-limits-tooltip')?>"><i class="glyphicon glyphicon-comment"></i></a>
						<div >                     
							<textarea oninput="eylem(this, this.value)" class="form-control elasticteste" id="project_limits" name="project_limits"></textarea>
						</div>
					</div>


					<div class=" col-lg-6 form-group">
						<label for="high_level_risks"><?=$this->lang->line('tap-risks')?></label>
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


					<div class=" col-lg-6 form-group">
						<label for="budge_summary"><?=$this->lang->line('tap-budge')?></label>
						<a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?=$this->lang->line('tap-budge-tooltip')?>"><i class="glyphicon glyphicon-comment"></i></a>
						<div >                     
							<textarea oninput="eylem(this, this.value)" class="form-control elasticteste" id="budge_summary" name="budge_summary"></textarea>
						</div>
					</div>


					<div class=" col-lg-6 form-group">
						<label for="project_approval_requirements"><?=$this->lang->line('tap-approval')?></label>
						<a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?=$this->lang->line('tap-approval-tooltip')?>"><i class="glyphicon glyphicon-comment"></i></a>
						<div >                     
							<textarea oninput="eylem(this, this.value)" class="form-control elasticteste" id="project_approval_requirements" name="project_approval_requirements"></textarea>
						</div>
					</div>

					
					<div class="row">
						<table class="table table-dark">
							<thead>
								<tr>
								
										<div class="col-lg-12 form-group"> <label><?=$this->lang->line('tap-stakeholder')?></label> <a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?=$this->lang->line('tap-stakeholder-tooltip')?>"><i class="glyphicon glyphicon-comment"></i></a>
										<th>Name</th>
									</tr>
								</thead>
								<tbody>
									<?php
									foreach($stakeholder_mp as $stk){
										foreach($stakeholder as $stake){
											if($project_id==$stk->project_id && $stk->stakeholder_id==$stake->stakeholder_id){
												?>
												<tr>			
													<td><?php echo $stake->name; ?></td>
												</tr>
												<?php
											}
										}
									}
									?>
								</tbody>
							</table>
						</div>
						</div>



						<div class="col-lg-6 form-group">

							<label><?=$this->lang->line('tap-start')?></label><a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?=$this->lang->line('tap-start-tooltip')?>"><i class="glyphicon glyphicon-comment"></i></a><br>
							<input class="form-control" type="date" name="start_date" ><br>
						</div>
						<div class="col-lg-6 form-group">

							<label><?=$this->lang->line('tap-end')?></label><a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?=$this->lang->line('tap-end-tooltip')?>"><i class="glyphicon glyphicon-comment"></i></a><br>
							<input class="form-control" type="date" name="end_date" ><br>
						</div>
							<input type="hidden" name="status" value="1">
							
							<div class="col-lg-12">
									<button id="tap-submit" type="submit" value="Save" class="btn btn-lg btn-success pull-right">
										<i class="glyphicon glyphicon-ok"></i>
										<?=$this->lang->line('btn-save')?>
									</button>
								</form>
<form action="<?php echo base_url('project/'); ?><?php echo $project_id; ?>" >
                <button class="btn btn-lg btn-info pull-left" >  <i class="glyphicon glyphicon-chevron-left"></i> <?=$this->lang->line('btn-back')?></button>
              </form>

							</div>	
						</form>

					<?php } else {?>                           

						<form action="<?=base_url()?>Tap/update/<?php echo $project_charter[0]->project_charter_id; ?>" method="post">

							<input type="hidden" name="project_id" value="<?php echo $project_id;?>">                           
							<div class="form-group">
								<label for="project_description">Project Description  </label>
								<div >                     
									<textarea class="form-control" id="project_description" name="project_description"><?php echo $project_charter[0]->project_description; ?></textarea>
								</div>
							</div>

							<div class="form-group">
								<label for="project_purpose">Project Purpose  </label>
								<div >                     
									<textarea class="form-control" id="project_purpose" name="project_purpose"><?php echo $project_charter[0]->project_purpose; ?></textarea>
								</div>
							</div>

							<div class="form-group">
								<label for="project_objective">Project Objectives  </label>
								<div >                     
									<textarea class="form-control" id="project_objective" name="project_objective"><?php echo $project_charter[0]->project_objective; ?></textarea>
								</div>
							</div>

							<div class="form-group">
								<label for="benefits">Benefits  </label>
								<div >                     
									<textarea class="form-control" id="benefits" name="benefits"><?php echo $project_charter[0]->benefits; ?></textarea>
								</div>
							</div>

							<div class="form-group">
								<label for="high_level_requirements">High Level Requirements  </label>
								<div >                     
									<textarea class="form-control" id="high_level_requirements" name="high_level_requirements"><?php echo $project_charter[0]->high_level_requirements; ?></textarea>
								</div>
							</div>

							<div class="form-group">
								<label for="initial_assumptions">Initial Assumptions  </label>
								<div >                     
									<textarea class="form-control" id="initial_assumptions" name="initial_assumptions"><?php echo $project_charter[0]->initial_assumptions; ?></textarea>
								</div>
							</div>

							<div class="form-group">
								<label for="initial_restrictions">Initial Restrictions  </label>
								<div >                     
									<textarea class="form-control" id="initial_restrictions" name="initial_restrictions"><?php echo $project_charter[0]->initial_restrictions; ?></textarea>
								</div>
							</div>

							<div class="form-group">
								<label for="project_limits">Project Limits  </label>
								<div >                     
									<textarea class="form-control" id="project_limits" name="project_limits"><?php echo $project_charter[0]->project_limits; ?></textarea>
								</div>
							</div>

							<div class="form-group">
								<label for="high_level_risks">High Level Risks  </label>
								<div >                     
									<textarea class="form-control" id="high_level_risks" name="high_level_risks"><?php echo $project_charter[0]->high_level_risks; ?></textarea>
								</div>
							</div>

							<div class="form-group">
								<label for="summary_schedule">Summary Schedule  </label>
								<div >                     
									<textarea class="form-control" id="summary_schedule" name="summary_schedule"><?php echo $project_charter[0]->summary_schedule; ?></textarea>
								</div>
							</div>

							<div class="form-group">
								<label for="budge_summary">Budge Summary  </label>
								<div >                     
									<textarea class="form-control" id="budge_summary" name="budge_summary"><?php echo $project_charter[0]->budge_summary; ?></textarea>
								</div>
							</div>

							<!-- A LISFTA EM TABELA "STAKEHOLDER" -->
							<div class="row">
								<table class="table table-dark">
									<thead>
										<tr>
											<caption>
												<div class="col-lg-2"></div>Stakeholder List  <a href="#" data-toggle="tooltip" title="Names of skateholder listed and responsable in your project!">?</a></caption>
												<th>Name</th>
											</tr>
										</thead>
										<tbody>
											<?php
											foreach($stakeholder_mp as $stk){
												foreach($stakeholder as $stake){
													if($project_id==$stk->project_id && $stk->stakeholder_id==$stake->stakeholder_id){
														?>
														<tr>			
															<td><?php echo $stake->name; ?></td>
														</tr>
														<?php
													}
												}
											}
											?>
										</tbody>
									</table>
								</div>

								<div class="form-group">
									<label for="project_approval_requirements">Project Approval Requirements  </label>
									<div>
										<textarea class="form-control" id="project_approval_requirements" name="project_approval_requirements"><?php echo $project_charter[0]->project_approval_requirements; ?></textarea>
									</div>
								</div>

								<div class="form-group">
									<label>Enter Start Date:  </label><br>
									<input class="form-control" type="date" name="start_date" max="2017-12-31" value="<?php echo $project_charter[0]->start_date; ?>"><br><br>
									<label>Enter End Date:  </label><br>
									<input class="form-control" type="date" name="end_date" min="2025-01-02" value="<?php echo $project_charter[0]->end_date; ?>"><br></br>

									<input type="hidden" name="status" value="1">

									<div class="col-lg-12">
									<button id="tap-submit" type="submit" value="Save" class="btn btn-lg btn-success pull-right">
										<i class="glyphicon glyphicon-ok"></i>
										<?=$this->lang->line('btn-save')?>
									</button>
								
<form action="<?php echo base_url('project/'); ?><?php echo $project_id; ?>" >
                <button class="btn btn-lg btn-info pull-left" >  <i class="glyphicon glyphicon-chevron-left"></i> <?=$this->lang->line('btn-back')?></button>
              </form>

							</div>	
									
								</form>

							<?php } ?>
						</div>
						<!-- /.row -->

				<?php $this->load->view('frame/footer_view')?>                    	