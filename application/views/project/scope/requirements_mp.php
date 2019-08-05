<div id="page-wrapper">
	<div class="row">
		<div class="col-lg-12">
			<h1 class="page-header"> <?=$this->lang->line('requirements_mp-title')  ?></h1>
		</div>
		<!-- /.col-lg-12 -->
	</div>
	<!-- /.row -->
	<div class="row">
		<div class="col-lg-12">

			<?php if ($requirements_mp == null) { ?>
				<form action="<?=base_url()?>RequirementsManagement/insert/" method="post">
					<input type="hidden" name="project_id" value="<?php echo $project_id[0];?>">

					<div class="col-lg-12 form-group">
						<label for="requirements_collection_proc"><?=$this->lang->line('requirements_collection_proc')?></label>
						<a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?=$this->lang->line('requirements_collection_proc-tooltip')?>"><i class="glyphicon glyphicon-comment"></i></a>
						<div >
							<textarea oninput="eylem(this, this.value)" class="form-control elasticteste" id="requirements_collection_proc" name="requirements_collection_proc" required="false"></textarea>
						</div>
					</div>

					<div class=" col-lg-12 form-group">
						<label for="requirements_prioritization"><?=$this->lang->line('requirements_prioritization')?></label>
						<a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?=$this->lang->line('requirements_prioritization-tooltip')?>"><i class="glyphicon glyphicon-comment"></i></a>
						<div >
							<textarea oninput="eylem(this, this.value)" class="form-control elasticteste" id="requirements_prioritization" name="requirements_prioritization"></textarea>
						</div>
					</div>

					<div class=" col-lg-12 form-group">
						<label for="product_metrics"><?=$this->lang->line('product_metrics')?></label>
						<a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?=$this->lang->line('product_metrics-tooltip')?>"><i class="glyphicon glyphicon-comment"></i></a>
						<div >
							<textarea oninput="eylem(this, this.value)" class="form-control elasticteste" id="product_metrics" name="product_metrics"></textarea>
						</div>
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

		<form action="<?=base_url()?>RequirementsManagement/update/<?php echo $requirements_mp[0]->requirements_mp_id; ?>" method="post">

			<input type="hidden" name="project_id" value="<?php echo $project_id;?>">

			<div class=" col-lg-12 form-group">
				<label for="requirements_collection_proc"><?=$this->lang->line('requirements_collection_proc')?></label>
				<a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?=$this->lang->line('requirements_collection_proc-tooltip')?>"><i class="glyphicon glyphicon-comment"></i></a
					><div >
						<textarea oninput="eylem(this, this.value)" class="form-control elasticteste" id="requirements_collection_proc" name="requirements_collection_proc"><?php echo $requirements_mp[0]->requirements_collection_proc; ?></textarea>
					</div>
				</div>

				<div class=" col-lg-12 form-group">
					<label for="requirements_prioritization"><?=$this->lang->line('requirements_prioritization')?></label>
					<a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?=$this->lang->line('requirements_prioritization-tooltip')?>"><i class="glyphicon glyphicon-comment"></i></a
						><div >
							<textarea oninput="eylem(this, this.value)" class="form-control elasticteste" id="requirements_prioritization" name="requirements_prioritization"><?php echo $requirements_mp[0]->requirements_prioritization; ?></textarea>
						</div>
					</div>

					<div class=" col-lg-12 form-group">
						<label for="product_metrics"><?=$this->lang->line('product_metrics')?></label>
						<a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?=$this->lang->line('product_metrics-tooltip')?>"><i class="glyphicon glyphicon-comment"></i></a
							><div >
								<textarea oninput="eylem(this, this.value)" class="form-control elasticteste" id="product_metrics" name="product_metrics"><?php echo $requirements_mp[0]->product_metrics; ?></textarea>
							</div>
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

														<?php } ?>

									      <?php $this->load->view('frame/footer_view')?>
