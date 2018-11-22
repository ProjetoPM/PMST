<div id="page-wrapper">
	<div class="row">
		<div class="col-lg-12">
			<h1 class="pageheader"> <?=$this->lang->line('issues_record-title')  ?></h1>
		</div>
	</div>
	<!-- verification -->
	<?php if ($this->session->flashdata('success')): ?>
		<div class="alert alert-success">
			<a href="#" class="close" data-dismiss="alert">&times;</a>
			<strong><?php echo $this->session->flashdata('success'); ?></strong>
		</div>
		<?php elseif ($this->session->flashdata('error')): ?>
			<div class="alert alert-warning">
				<a href="#" class="close" data-dismiss="alert">&times;</a>
				<strong><?php echo $this->session->flashdata('error'); ?></strong>
			</div>
		<?php endif; ?>
		<!-- begin of crud -->
		<form action="<?= base_url() ?>issues_record/insert/" method="post">

			<input type="hidden" name="project_id" value="<?php echo $project_id[0]; ?>">
			<input type="hidden" name="status" value="1">

			<div class="form-group col-lg-12">
				<label for="responsable"><?=$this->lang->line('ir-identification')?></label>
				<a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?=$this->lang->line('ir-identification-tooltip')?>"><i class="glyphicon glyphicon-comment"></i></a>
				<textarea class="form-control" id="identification"  name="identification" maxlength="45"></textarea>
			</div>

			<div class="form-group">
				<div class="col-lg-6">
					<label><?=$this->lang->line('ir-identification_date')?></label>
					<div class="input-group">
						<div class="input-group-addon">
							<i class="fa fa-calendar"></i>
						</div>
						<input class="form-control" id="identification_date" placeholder="YYYY/MM/DD" type="text" name="identification_date"/>
					</div>
				</div>
			</div>

			<div class="form-group col-lg-6">
				<label for="question_description"><?=$this->lang->line('ir-question_description')?></label>
				<a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?=$this->lang->line('ir-question_description-tooltip')?>"><i class="glyphicon glyphicon-comment"></i></a>
				<textarea class="form-control" id="question_description"  name="question_description" maxlength="255"></textarea>
			</div>

			<div class="form-group col-lg-12">
				<label for="type"><?=$this->lang->line('ir-type')?></label>                      
				<a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?=$this->lang->line('ir-type-tooltip')?>"><i class="glyphicon glyphicon-comment"></i></a>

				<textarea class="form-control" id="type"  name="type" maxlength="255"></textarea>
			</div>

			<div class="form-group col-lg-6">
				<label for="responsable"><?=$this->lang->line('ir-responsable')?></label>
				<a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?=$this->lang->line('ir-responsable-tooltip')?>"><i class="glyphicon glyphicon-comment"></i></a>
				<textarea class="form-control" id="responsable"  name="responsable" maxlength="45"></textarea>
			</div>

			<div class="form-group col-lg-6">
				<label for="situation"><?=$this->lang->line('ir-situation')?></label>
				<a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?=$this->lang->line('ir-situation-tooltip')?>"><i class="glyphicon glyphicon-comment"></i></a>
				<textarea class="form-control" id="situation"  name="situation" maxlength="45"></textarea>
			</div>

			<div class="form-group col-lg-12">
				<label for="action"><?=$this->lang->line('ir-action')?></label>
				<a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?=$this->lang->line('ir-action-tooltip')?>"><i class="glyphicon glyphicon-comment"></i></a>
				<textarea class="form-control" id="action"  name="action" maxlength="45"></textarea>
			</div>

			<div class="form-group">
				<div class="col-lg-6">
					<label><?=$this->lang->line('ir-resolution_date')?></label>
					<div class="input-group">
						<div class="input-group-addon">
							<i class="fa fa-calendar"></i>
						</div>
						<input class="form-control" id="resolution_date" placeholder="YYYY/MM/DD" type="text" name="resolution_date"/>
					</div>
				</div>
			</div>


			<div class="form-group">
				<div class="col-lg-6">
					<label><?=$this->lang->line('ir-replan_date')?></label>
					<div class="input-group">
						<div class="input-group-addon">
							<i class="fa fa-calendar"></i>
						</div>
						<input class="form-control" id="replan_date" placeholder="YYYY/MM/DD" type="text" name="replan_date"/>
					</div>
				</div>
			</div>

			<div class="form-group col-lg-12">
				<label for="observations"><?=$this->lang->line('ir-observations')?></label>
				<a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?=$this->lang->line('ir-replan_date-tooltip')?>"><i class="glyphicon glyphicon-comment"></i></a>
				<textarea class="form-control" id="observations"  name="observations" maxlength="45"></textarea>
			</div>

			<div><button type="submit" class="btn btn-lg btn-success pull-right">Save</button>
			</div>
		</form>
				<form action="<?php echo base_url()?>/Issues_Record/list/<?=$project_id?>">
					<button class="btn btn-lg btn-info pull-left" >  <i class="glyphicon glyphicon-chevron-left"></i> <?=$this->lang->line('btn-back')?></button>
				</form>
			</div>

			<script type="text/javascript">
 //////////////////////////////////
 // Date Normal
 //////////////////////////////////
 var currentDate = new Date();
 var today = new Date(currentDate.getFullYear(), currentDate.getMonth(), currentDate.getDate(), 0, 0, 0, 0);
 var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";

 var identification_date = $("#identification_date").datepicker({
 	autoclose: true,
 	format: 'yyyy/mm/dd',
  //language: 'pt-BR', //Idioma do Calendario
  container: container,
  keyboardNavigation: true,
  orientation: "bottom",
  todayHighlight : true,
  // startDate: today,
 });

 var resolution_date = $("#resolution_date").datepicker({
 	autoclose: true,
 	format: 'yyyy/mm/dd',
  //language: 'pt-BR', //Idioma do Calendario
  container: container,
  keyboardNavigation: true,
  orientation: "bottom",
  todayHighlight : true,
  // startDate: today,
 });


 var replan_date = $("#replan_date").datepicker({
 	autoclose: true,
 	format: 'yyyy/mm/dd',
  //language: 'pt-BR', //Idioma do Calendario
  container: container,
  keyboardNavigation: true,
  orientation: "bottom",
  todayHighlight : true,
  // startDate: today,
 });
</script>
<?php $this->load->view('frame/footer_view')?>