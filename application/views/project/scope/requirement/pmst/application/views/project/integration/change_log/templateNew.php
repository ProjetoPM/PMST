<div id="page-wrapper">
	<div class="row">
		<div class="col-lg-12">
			<h1 class="page-header"><?= $this->lang->line('tep-title') ?></h1>
		</div>
		<!-- /.col-lg-12 -->
	</div>
	<!-- /.row -->
	<?php if ($this->session->flashdata('success')) : ?>
		<div class="alert alert-success">
			<a href="#" class="close" data-dismiss="alert">&times;</a>
			<strong><?php echo $this->session->flashdata('success'); ?></strong>
		</div>
		<?php elseif ($this->session->flashdata('error')) : ?>
			<div class="alert alert-warning">
				<a href="#" class="close" data-dismiss="alert">&times;</a>
				<strong><?php echo $this->session->flashdata('error'); ?></strong>
			</div>
		<?php endif; ?>

		<div class="row">
			<div class="col-lg-12">

				<form method="POST" action="<?php echo base_url()?>Change_log/insert/">

					<input type="hidden" name="project_id"  value="<?= $project_id?>">

					<div class="col-lg-4 form-group">
						<label for="change_description"><?= $this->lang->line('tep-client') ?> *</label>  
						<a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('tep-client-tooltip') ?>"><i class="glyphicon glyphicon-comment"></i></a>
						<div >
							<input id="change_description" name="change_description" type="text" class="form-control input-md" required="true">
						</div>
					</div>


					<div class=" col-lg-4 form-group">
						<label for="comments"><?= $this->lang->line('tep-comments') ?></label> 
						<a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('tep-comments-tooltip') ?>"><i class="glyphicon glyphicon-comment"></i></a>

						<div >                 
							<textarea oninput="eylem(this, this.value)" class="form-control elasticteste" id="comments" name="comments" ></textarea>  
						</div>
					</div>


					<div class="col-lg-4 form-group">
						<label><?= $this->lang->line('tep-comments_date') ?></label>
						<a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('tep-comments_date-tooltip') ?>"><i class="glyphicon glyphicon-comment"></i></a>
						<div class="input-group">
							<div class="input-group-addon">
								<i class="fa fa-calendar"></i>
							</div>
							<input class="form-control" id="comments_date" placeholder="YYYY/MM/DD" type="text" name="comments_date"  />
						</div>
					</div>



					<div class=" col-lg-4 form-group">
						<label for="change_type"><?= $this->lang->line('tep-change_type') ?> </label> 
						<a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('tep-change_type-tooltip') ?>"><i class="glyphicon glyphicon-comment"></i></a>

						<div >                 
							<textarea oninput="eylem(this, this.value)" class="form-control elasticteste" id="change_type" name="change_type"></textarea>  
						</div>
					</div>


					<div class=" col-lg-4 form-group">
						<label for="situation"><?= $this->lang->line('tep-situation') ?></label> 
						<a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('tep-situation-tooltip') ?>"><i class="glyphicon glyphicon-comment"></i></a>

						<div >                 
							<textarea oninput="eylem(this, this.value)" class="form-control elasticteste" id="situation" name="situation" ></textarea>  
						</div>
					</div>

					<div class=" col-lg-4"></div>


					<div class=" col-lg-12 form-group">
						<label for="change_description"><?= $this->lang->line('tep-change_description') ?></label> 
						<a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('tep-change_description-tooltip') ?>"><i class="glyphicon glyphicon-comment"></i></a>

						<div >                 
							<textarea oninput="eylem(this, this.value)" class="form-control elasticteste" id="change_description" name="change_description" ></textarea>  
						</div>
					</div>


					<div class=" col-lg-12 form-group">
						<label for="comments"><?= $this->lang->line('tep-comments') ?> </label> 
						<a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('tep-comments-tooltip') ?>"><i class="glyphicon glyphicon-comment"></i></a>

						<div >                 
							<textarea oninput="eylem(this, this.value)" class="form-control elasticteste" id="comments" name="comments"></textarea>  
						</div>
					</div>

					<div class=" col-lg-12 form-group">
						<label for="comments"><?= $this->lang->line('tep-comments') ?> </label> 
						<a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('tep-comments-tooltip') ?>"><i class="glyphicon glyphicon-comment"></i></a>

						<div >                 
							<textarea oninput="eylem(this, this.value)" class="form-control elasticteste" id="comments" name="comments"></textarea>  
						</div>
					</div>

					<div class="col-lg-6 form-group">
						<label><?= $this->lang->line('tep-comments_date') ?></label>
						<a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('tep-comments_date-tooltip') ?>"><i class="glyphicon glyphicon-comment"></i></a>
						<div class="input-group">
							<div class="input-group-addon">
								<i class="fa fa-calendar"></i>
							</div>
							<input class="form-control" id="comments_date" placeholder="YYYY/MM/DD" type="text" name="comments_date"  />
						</div>
					</div>

					<div class=" col-lg-12 form-group">
						<label for="comments"><?= $this->lang->line('tep-comments') ?> </label> 
						<a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('tep-comments-tooltip') ?>"><i class="glyphicon glyphicon-comment"></i></a>

						<div >                 
							<textarea oninput="eylem(this, this.value)" class="form-control elasticteste" id="comments" name="comments"></textarea>  
						</div>
					</div>

					<div class="col-lg-12 form-group">
						<button id="new_human_resource-submit" type="submit" value="Save" class="btn btn-lg btn-success pull-right">
							<i class="glyphicon glyphicon-ok"></i> <?= $this->lang->line('btn-save') ?>
						</button> 
					</form>

					<form action="<?php echo base_url()?>/Change_log/list/<?=$project_id?>">
						<button class="btn btn-lg btn-info pull-left" >  <i class="glyphicon glyphicon-chevron-left"></i> <?= $this->lang->line('btn-back') ?></button>
					</form>
				</div>

		

		<script type="text/javascript">
			var currentDate = new Date();
			var today = new Date(currentDate.getFullYear(), currentDate.getMonth(), currentDate.getDate(), 0, 0, 0, 0);
			var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";

		//Start Date Ends Here
		var endDate = $("#comments_date").datepicker({
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

	    <div class="col-sm-12" position= "absolute">
	    	<div class="container">
	    		<?php $this->load->view('frame/footer_view') ?>            
	    	</div>
	    </div>
	</div>