<div id="page-wrapper">
	<div class="row">
		<div class="col-lg-12">
			<h1 class="page-header">Projects</h1>
		</div>
		<!-- /.col-lg-12 -->
	</div>
	<!-- /.row -->          
	<div class="row">
		<div class="col-lg-6">

			<?php if ($project_charter == null) { ?>
				<form action="<?=base_url()?>tap/insert/" method="post">
					<input type="hidden" name="project_id" value="<?php echo $project_id[0];?>">

					<div class="form-group">
						<label for="project_description">Project Description</label>
						<a href="#" data-toggle="tooltip" title="Description of your project!">?</a>
						<div >                     
							<textarea class="form-control" id="project_description" name="project_description"></textarea>
						</div>
					</div>

					<div class="form-group">
						<label for="project_purpose">Project Purpose</label>
						<a href="#" data-toggle="tooltip" title="Purpose of your project!">?</a>
						<div >                     
							<textarea class="form-control" id="project_purpose" name="project_purpose"></textarea>
						</div>
					</div>

					<div class="form-group">
						<label for="project_objective">Project Objectives</label>
						<a href="#" data-toggle="tooltip" title="Objectives of your project!">?</a>
						<div >                     
							<textarea class="form-control" id="project_objective" name="project_objective"></textarea>
						</div>
					</div>

					<div class="form-group">
						<label for="benefits">Benefits</label>
						<a href="#" data-toggle="tooltip" title="Benefits of your project!">?</a>
						<div >                     
							<textarea class="form-control" id="benefits" name="benefits"></textarea>
						</div>
					</div>

					<div class="form-group">
						<label for="high_level_requirements">High Level Requirements</label>
						<a href="#" data-toggle="tooltip" title="Description of requirements in high level!">?</a>
						<div >                     
							<textarea class="form-control" id="high_level_requirements" name="high_level_requirements"></textarea>
						</div>
					</div>

					<div class="form-group">
						<label for="initial_assumptions">Initial Assumptions</label>
						<a href="#" data-toggle="tooltip" title="Assumptions of start your projetc!">?</a>
						<div >                     
							<textarea class="form-control" id="initial_assumptions" name="initial_assumptions"></textarea>
						</div>
					</div>

					<div class="form-group">
						<label for="initial_restrictions">Initial Restrictions</label>
						<a href="#" data-toggle="tooltip" title="Restrictions initial of your project!">?</a>
						<div >                     
							<textarea class="form-control" id="initial_restrictions" name="initial_restrictions"></textarea>
						</div>
					</div>

					<div class="form-group">
						<label for="project_limits">Project Limits</label>
						<a href="#" data-toggle="tooltip" title="Limits of your project">?</a>
						<div >                     
							<textarea class="form-control" id="project_limits" name="project_limits"></textarea>
						</div>
					</div>

					<div class="form-group">
						<label for="high_level_risks">High Level Risks</label>
						<a href="#" data-toggle="tooltip" title="Risks of your project in high level!">?</a>
						<div >                     
							<textarea class="form-control" id="high_level_risks" name="high_level_risks"></textarea>
						</div>
					</div>

					<div class="form-group">
						<label for="summary_schedule">Summary Schedule</label>
						<a href="#" data-toggle="tooltip" title="detail of schedule of your project!">?</a>
						<div >                     
							<textarea class="form-control" id="summary_schedule" name="summary_schedule"></textarea>
						</div>
					</div>

					<div class="form-group">
						<label for="budge_summary">Budge Summary</label>
						<a href="#" data-toggle="tooltip" title="Budget summary of your project!">?</a>
						<div >                     
							<textarea class="form-control" id="budge_summary" name="budge_summary"></textarea>
						</div>
					</div>

					<div class="form-group">
						<label for="project_approval_requuirements">Project Approval Requirements</label>
						<a href="#" data-toggle="tooltip" title="Requirements for approval your project!">?</a>
						<div>
							<textarea class="form-control" id="project_approval_requuirements" name="project_approval_requuirements"></textarea>
						</div>
					</div>

					<!-- COLOCAR LISTA DE STAKEHOLDERS AQUI, BUSCAR A LISTA EM TABELA "STAKEHOLDER" -->
					<div class="row">
						<table class="table table-dark">
							<thead>
								<tr>
									<caption>
										<div class="col-lg-2"></div>Stakeholder List</caption>
										<th>Name</th>										
									</tr>
								</thead>
								<tbody>
									<?php
									foreach($query as $stk){
										?>
										<tr>
											<td><?php echo $stk->name; ?></td>											
										</tr>
										<?php
									}
									?>
								</tbody>
							</table>
						</div>


						<div class="form-group">

							<label>Enter Start Date:</label><a href="#" data-toggle="tooltip" title="Date start of your project!">?</a><br>
							<input type="date" name="start_date" max="2017-12-31"><br>
							<label>Enter End Date:</label><a href="#" data-toggle="tooltip" title="Date finish of your project!">?</a><br>
							<input type="date" name="end_date" min="2025-01-02"><br></br>

							<input type="hidden" name="status" value="1">
							
							<input id="tap-submit" type="submit" value="Save" class="btn btn-lg btn-success btn-block">
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
											foreach($query as $stk){
												?>
												<tr>
													<td><?php echo $stk->name; ?></td>
												</tr>
												<?php
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
									<input type="date" name="start_date" max="2017-12-31" value="<?php echo $project_charter[0]->start_date; ?>"><br><br>
									<label>Enter End Date:  </label><br>
									<input type="date" name="end_date" min="2025-01-02" value="<?php echo $project_charter[0]->end_date; ?>"><br></br>
									<input type="hidden" name="status" value="1">
									<input id="tap-submit" type="submit" value="Save" class="btn btn-lg btn-success btn-block">

								</form>

							<?php } ?>
						</div>
						<!-- /.row -->
					</div>
					<script type="text/javascript">
						$(document).$(function() {
							$('')
						});
					</script>
				</div>

				<?php $this->load->view('frame/footer_view')?>                    	