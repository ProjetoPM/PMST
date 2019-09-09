<div id="page-wrapper">
	<div class="row">
		<div class="col-lg-12">
			<h1 class="page-header"> <?=$this->lang->line('projectmp-title')  ?></h1>
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

			<?php if ($project_mp == null) { ?>
				<form method="POST" action="<?php echo base_url('ProjectManagement/insert/'); ?>">

					<input type="hidden" name="project_id"  value="<?php echo $project[0]->project_id; ?>">
		      <input type="hidden" name="status" value="1">

					<div class="col-lg-12 form-group">
						<label for="project_lifecycle"><?=$this->lang->line('project_lifecycle')?></label>
						<a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?=$this->lang->line('project_lifecycle-tooltip')?>"><i class="glyphicon glyphicon-comment"></i></a>
						<div >
							<textarea oninput="eylem(this, this.value)" class="form-control elasticteste" id="project_lifecycle" name="project_lifecycle" required="false"></textarea>
						</div>
					</div>

					<div class=" col-lg-12 form-group">
						<label for="project_guidelines"><?=$this->lang->line('project_guidelines')?></label>
						<a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?=$this->lang->line('project_guidelines-tooltip')?>"><i class="glyphicon glyphicon-comment"></i></a>
						<div >
							<textarea oninput="eylem(this, this.value)" class="form-control elasticteste" id="project_guidelines" name="project_guidelines"></textarea>
						</div>
					</div>

					<div class=" col-lg-12 form-group">
						<label for="change_mp"><?=$this->lang->line('change_mp')?></label>
						<a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?=$this->lang->line('change_mp-tooltip')?>"><i class="glyphicon glyphicon-comment"></i></a>
						<div >
							<textarea oninput="eylem(this, this.value)" class="form-control elasticteste" id="change_mp" name="change_mp"></textarea>
						</div>
					</div>

					<div class="col-lg-12 form-group">
						<label for="configuration_mp"><?=$this->lang->line('configuration_mp')?></label>
						<a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?=$this->lang->line('configuration_mp-tooltip')?>"><i class="glyphicon glyphicon-comment"></i></a>
						<div >
							<textarea oninput="eylem(this, this.value)" class="form-control elasticteste" id="configuration_mp" name="configuration_mp"></textarea>
						</div>
					</div>

					<div class=" col-lg-12 form-group">
						<label for="baseline_maintenance"><?=$this->lang->line('baseline_maintenance')?></label>
						<a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?=$this->lang->line('baseline_maintenance-tooltip')?>"><i class="glyphicon glyphicon-comment"></i></a>
						<div >
							<textarea oninput="eylem(this, this.value)" class="form-control elasticteste" id="baseline_maintenance" name="baseline_maintenance"></textarea>
						</div>
					</div>


					<div class=" col-lg-12 form-group">
						<label for="stakeholders_communication"><?=$this->lang->line('stakeholders_communication')?></label>
						<a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?=$this->lang->line('stakeholders_communication-tooltip')?>"><i class="glyphicon glyphicon-comment"></i></a>
						<div >
							<textarea oninput="eylem(this, this.value)" class="form-control elasticteste" id="stakeholders_communication" name="stakeholders_communication"></textarea>
						</div>
					</div>

					<div class="col-lg-12 form-group">
						<label for="key_review"><?=$this->lang->line('key_review')?></label>
						<a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?=$this->lang->line('key_review-tooltip')?>"><i class="glyphicon glyphicon-comment"></i></a>
						<div >
							<textarea oninput="eylem(this, this.value)" class="form-control elasticteste" id="key_review" name="key_review"></textarea>
						</div>
					</div>

				<input type="hidden" name="status" value="1">

				<div class="col-lg-12">
					<button id="tap-submit" type="submit" value="Save" class="btn btn-lg btn-success pull-right">
						<i class="glyphicon glyphicon-ok"></i>
						<?=$this->lang->line('btn-save')?>
					</button>
				</form>
				<form action="<?php echo base_url('project/'); ?><?php echo $id; ?>" >
					<button class="btn btn-lg btn-info pull-left" >  <i class="glyphicon glyphicon-chevron-left"></i> <?=$this->lang->line('btn-back')?></button>
				</form>

			</div>
		</form>

	<?php } else {
		foreach($project_mp as $pmp){
    ?>

		<form method="POST" action="<?php echo base_url('ProjectManagement/update/');?><?php echo $id; ?>">
      <input type="hidden" name="status" value="1">

			<div class=" col-lg-12 form-group">
				<label for="project_lifecycle"><?=$this->lang->line('project_lifecycle')?></label>
				<a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?=$this->lang->line('project_lifecycle-tooltip')?>"><i class="glyphicon glyphicon-comment"></i></a
					><div >
						<textarea oninput="eylem(this, this.value)" class="form-control elasticteste" id="project_lifecycle" name="project_lifecycle"><?php echo $pmp->project_lifecycle; ?></textarea>
					</div>
				</div>

				<div class=" col-lg-12 form-group">
					<label for="project_guidelines"><?=$this->lang->line('project_guidelines')?></label>
					<a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?=$this->lang->line('project_guidelines-tooltip')?>"><i class="glyphicon glyphicon-comment"></i></a
						><div >
							<textarea oninput="eylem(this, this.value)" class="form-control elasticteste" id="project_guidelines" name="project_guidelines"><?php echo $pmp->project_guidelines; ?></textarea>
						</div>
					</div>

					<div class=" col-lg-12 form-group">
						<label for="change_mp"><?=$this->lang->line('change_mp')?></label>
						<a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?=$this->lang->line('change_mp-tooltip')?>"><i class="glyphicon glyphicon-comment"></i></a
							><div >
								<textarea oninput="eylem(this, this.value)" class="form-control elasticteste" id="change_mp" name="change_mp"><?php echo $pmp->change_mp; ?></textarea>
							</div>
						</div>

						<div class=" col-lg-12 form-group">
							<label for="configuration_mp"><?=$this->lang->line('configuration_mp')?></label>
							<a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?=$this->lang->line('configuration_mp-tooltip')?>"><i class="glyphicon glyphicon-comment"></i></a
								><div >
									<textarea oninput="eylem(this, this.value)" class="form-control elasticteste" id="configuration_mp" name="configuration_mp"><?php echo $pmp->configuration_mp; ?></textarea>
								</div>
							</div>

							<div class=" col-lg-12 form-group">
								<label for="baseline_maintenance"><?=$this->lang->line('baseline_maintenance')?></label>
								<a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?=$this->lang->line('baseline_maintenance-tooltip')?>"><i class="glyphicon glyphicon-comment"></i></a
									><div >
										<textarea oninput="eylem(this, this.value)" class="form-control elasticteste" id="baseline_maintenance" name="baseline_maintenance"><?php echo $pmp->baseline_maintenance; ?></textarea>
									</div>
								</div>

								<div class=" col-lg-12 form-group">
									<label for="stakeholders_communication"><?=$this->lang->line('stakeholders_communication')?></label>
									<a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?=$this->lang->line('stakeholders_communication-tooltip')?>"><i class="glyphicon glyphicon-comment"></i></a
										><div >
											<textarea oninput="eylem(this, this.value)" class="form-control elasticteste" id="stakeholders_communication" name="stakeholders_communication"><?php echo $pmp->stakeholders_communication; ?></textarea>
										</div>
									</div>

									<div class=" col-lg-12 form-group">
										<label for="key_review"><?=$this->lang->line('key_review')?></label>
										<a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?=$this->lang->line('key_review-tooltip')?>"><i class="glyphicon glyphicon-comment"></i></a
											><div >
												<textarea oninput="eylem(this, this.value)" class="form-control elasticteste" id="key_review" name="key_review"><?php echo $pmp->key_review; ?></textarea>
											</div>
										</div>


																	<input type="hidden" name="status" value="1">

																	<div class="col-lg-12">
																		<button id="tap-submit" type="submit" value="Save" class="btn btn-lg btn-success pull-right">
																			<i class="glyphicon glyphicon-ok"></i>
																			<?=$this->lang->line('btn-save')?>
																		</button>
																	</form>
																	<form action="<?php echo base_url('project/'); ?><?php echo $id; ?>" >
																		<button class="btn btn-lg btn-info pull-left" >  <i class="glyphicon glyphicon-chevron-left"></i> <?=$this->lang->line('btn-back')?></button>
																	</form>

																</div>
															</form>

														<?php } } ?>

														<!-- /.row -->

														<script type="text/javascript">

									      //////////////////////////////////
									      // Start Date & End Date
									     //////////////////////////////////
									     var currentDate = new Date();
									     var today = new Date(currentDate.getFullYear(), currentDate.getMonth(), currentDate.getDate(), 0, 0, 0, 0);
									     var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";

									     var startDate = $("#start_date").datepicker({
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
									      var endDate = $("#end_date").datepicker({
									      	autoclose: true,
									      	format: 'yyyy/mm/dd',
									        //language: 'pt-BR', //Idioma do Calendario
									        container: container,
									        keyboardNavigation: true,
									        orientation: "bottom",
									        startDate: today,
									        /*todayHighlight : true,*/
									       });
									      //End Date Ends Here
									     </script>

											 <!-- Envia o nome da view como parametro -->
											 <?php $view = array(
											   "name" => "project_management_plan",
											 ); ?>

											 <!--aqui-->

											 <!--Carrega o form de envio-->
											 <?php $this->load->view('upload/index', $view) ?>
											 <!--Carrega as imagens do projeto-->
											 <?php $this->load->view('upload/retrieve', $view) ?>

									      <?php $this->load->view('frame/footer_view')?>
