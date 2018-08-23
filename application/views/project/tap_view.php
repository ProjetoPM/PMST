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
						<div >                     
							<textarea class="form-control" id="project_description" name="project_description"></textarea>
						</div>
					</div>

					<div class="form-group">
						<label for="project_purpose">Project Purpose</label>
						<div >                     
							<textarea class="form-control" id="project_purpose" name="project_purpose"></textarea>
						</div>
					</div>

					<div class="form-group">
						<label for="project_objective">Project Objectives</label>
						<div >                     
							<textarea class="form-control" id="project_objective" name="project_objective"></textarea>
						</div>
					</div>

					<div class="form-group">
						<label for="benefits">Benefits</label>
						<div >                     
							<textarea class="form-control" id="benefits" name="benefits"></textarea>
						</div>
					</div>

					<div class="form-group">
						<label for="high_level_requirements">High Level Requirements</label>
						<div >                     
							<textarea class="form-control" id="high_level_requirements" name="high_level_requirements"></textarea>
						</div>
					</div>

					<div class="form-group">
						<label for="initial_assumptions">Initial Assumptions</label>
						<div >                     
							<textarea class="form-control" id="initial_assumptions" name="initial_assumptions"></textarea>
						</div>
					</div>

					<div class="form-group">
						<label for="initial_restrictions">Initial Restrictions</label>
						<div >                     
							<textarea class="form-control" id="initial_restrictions" name="initial_restrictions"></textarea>
						</div>
					</div>

					<div class="form-group">
						<label for="project_limits">Project Limits</label>
						<div >                     
							<textarea class="form-control" id="project_limits" name="project_limits"></textarea>
						</div>
					</div>

					<div class="form-group">
						<label for="high_level_risks">High Level Risks</label>
						<div >                     
							<textarea class="form-control" id="high_level_risks" name="high_level_risks"></textarea>
						</div>
					</div>

					<div class="form-group">
						<label for="summary_schedule">Summary Schedule</label>
						<div >                     
							<textarea class="form-control" id="summary_schedule" name="summary_schedule"></textarea>
						</div>
					</div>

					<div class="form-group">
						<label for="budge_summary">Budge Summary</label>
						<div >                     
							<textarea class="form-control" id="budge_summary" name="budge_summary"></textarea>
						</div>
					</div>

					<div class="form-group">
						<label for="project_approval_requuirements">Project Approval Requirements</label>
						<div>
							<textarea class="form-control" id="project_approval_requuirements" name="project_approval_requuirements"></textarea>
						</div>
					</div>

					<!-- COLOCAR LISTA DE STAKEHOLDERS AQUI, BUSCAR A LISTA EM TABELA "STAKEHOLDER" -->
					<div class="row">
						<table class="table">
							<thead>
								<tr>
									<caption>
										<div class="col-lg-2"></div>Stakeholder List</caption>
										<th>Name</th>
										<th>Roles and responsabilities</th>

									</tr>
								</thead>
								<tbody>
									<?php
									foreach($query as $stk){
										?>
										<tr>
											<td><?php echo $stk->name; ?></td>
											<td><?php echo $stk->responsibility; ?></td>
										</tr>
										<?php
									}
									?>
								</tbody>
							</table>
						</div>


						<div class="form-group">

							<label>Enter Start Date:</label><br>
							<input type="date" name="start_date" max="2017-12-31"><br>
							<label>Enter End Date:</label><br>
							<input type="date" name="end_date" min="2025-01-02"><br></br>

							<div class="form-group">
								<label>Status:</label> <br></br>
								<input type="radio" checked name="status" value="1">
								<label>On</label><br>
								<input type="radio" name="status" value="0">
								<label>Off</label>                
							</div>
							<input id="tap-submit" type="submit" value="Save" class="btn btn-lg btn-success btn-block">
						</form>

					<?php } else {?>                           

						<form action="<?=base_url()?>Tap/update/<?php echo $project_charter[0]->project_charter_id; ?>" method="post">

							<input type="hidden" name="project_id" value="<?php echo $project_id;?>">                           
							<div class="form-group">
								<label for="project_description">Project Description</label>
								<div >                     
									<textarea class="form-control" id="project_description" name="project_description"><?php echo $project_charter[0]->project_description; ?></textarea>
								</div>
							</div>

							<div class="form-group">
								<label for="project_purpose">Project Purpose</label>
								<div >                     
									<textarea class="form-control" id="project_purpose" name="project_purpose"><?php echo $project_charter[0]->project_purpose; ?></textarea>
								</div>
							</div>

							<div class="form-group">
								<label for="project_objective">Project Objectives</label>
								<div >                     
									<textarea class="form-control" id="project_objective" name="project_objective"><?php echo $project_charter[0]->project_objective; ?></textarea>
								</div>
							</div>

							<div class="form-group">
								<label for="benefits">Benefits</label>
								<div >                     
									<textarea class="form-control" id="benefits" name="benefits"><?php echo $project_charter[0]->benefits; ?></textarea>
								</div>
							</div>

							<div class="form-group">
								<label for="high_level_requirements">High Level Requirements</label>
								<div >                     
									<textarea class="form-control" id="high_level_requirements" name="high_level_requirements"><?php echo $project_charter[0]->high_level_requirements; ?></textarea>
								</div>
							</div>

							<div class="form-group">
								<label for="initial_assumptions">Initial Assumptions</label>
								<div >                     
									<textarea class="form-control" id="initial_assumptions" name="initial_assumptions"><?php echo $project_charter[0]->initial_assumptions; ?></textarea>
								</div>
							</div>

							<div class="form-group">
								<label for="initial_restrictions">Initial Restrictions</label>
								<div >                     
									<textarea class="form-control" id="initial_restrictions" name="initial_restrictions"><?php echo $project_charter[0]->initial_restrictions; ?></textarea>
								</div>
							</div>

							<div class="form-group">
								<label for="project_limits">Project Limits</label>
								<div >                     
									<textarea class="form-control" id="project_limits" name="project_limits"><?php echo $project_charter[0]->project_limits; ?></textarea>
								</div>
							</div>

							<div class="form-group">
								<label for="high_level_risks">High Level Risks</label>
								<div >                     
									<textarea class="form-control" id="high_level_risks" name="high_level_risks"><?php echo $project_charter[0]->high_level_risks; ?></textarea>
								</div>
							</div>

							<div class="form-group">
								<label for="summary_schedule">Summary Schedule</label>
								<div >                     
									<textarea class="form-control" id="summary_schedule" name="summary_schedule"><?php echo $project_charter[0]->summary_schedule; ?></textarea>
								</div>
							</div>

							<div class="form-group">
								<label for="budge_summary">Budge Summary</label>
								<div >                     
									<textarea class="form-control" id="budge_summary" name="budge_summary"><?php echo $project_charter[0]->budge_summary; ?></textarea>
								</div>
							</div>


							<!-- A LISFTA EM TABELA "STAKEHOLDER" -->
							<div class="row">
								<table class="table">
									<thead>
										<tr>
											<caption>
												<div class="col-lg-2"></div>Stakeholder List</caption>
												<th>Name</th>
												<th>Roles and responsabilities</th>

											</tr>
										</thead>
										<tbody>
											<?php
											foreach($query as $stk){
												?>
												<tr>
													<td><?php echo $stk->name; ?></td>
													<td><?php echo $stk->responsibility; ?></td>
												</tr>
												<?php
											}
											?>
										</tbody>
									</table>
								</div>

								<div class="form-group">
									<label for="project_approval_requirements">Project Approval Requirements</label>
									<div>
										<textarea class="form-control" id="project_approval_requirements" name="project_approval_requirements"><?php echo $project_charter[0]->project_approval_requirements; ?></textarea>
									</div>
								</div>

								<div class="form-group">
									<label>Enter Start Date:</label><br>
									<input type="date" name="start_date" max="2017-12-31"><br><br>
									<label>Enter End Date:</label><br>
									<input type="date" name="end_date" min="2025-01-02"><br></br>

									<?php if ($project_charter[0]->status == 1){ ?>
										<input type="radio" checked name="status" value="1">
										<label>On</label><br>
										<input type="radio" name="status" value="0">
										<label>Off</label>

									<?php } else { ?>

										<input type="radio" name="status" value="1">
										<label>On</label><br>
										<input type="radio" checked name="status" value="0">
										<label>Off</label>

									<?php } ?>
									<input id="tap-submit" type="submit" value="Save" class="btn btn-lg btn-success btn-block">

								</form>

							<?php } ?>
						</div>
						<!-- /.row -->
					</div>
				</div>

				<?php $this->load->view('frame/footer_view')?>                    	