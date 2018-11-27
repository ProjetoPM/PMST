<div id="page-wrapper">
	<div class="row">
		<div class="col-lg-12">
			<h1 class="pageheader"> <?=$this->lang->line('issues_record-title')  ?></h1>
		</div>
		<!-- /.col-lg-12 -->
	</div>

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
		<!-- /.row -->   
		<!-- acessa o objeto do array -->
		<div class="row">
			<div class="col-lg-12">
		<?php extract($issues_record); ?>
		
		<form action="<?=base_url()?>Issues_Record/update/<?php echo $issues_record_id; ?>" method="post">

			<input type="hidden" name="project_id" value="<?php echo $project_id; ?>">
			<input type="hidden" name="status" value="1">                           
			<!-- Textarea -->


			<div class="form-group col-lg-12">
				<label for="identification"><?=$this->lang->line('ir-identification')?></label>                    
				<textarea class="form-control" id="identification"  name="identification" maxlength="45"><?php echo $identification; ?></textarea>
			</div>

			<div class="form-group">
				<div class="col-lg-6">
					<label><?=$this->lang->line('ir-identification_date')?></label>
					<div class="input-group">
						<div class="input-group-addon">
							<i class="fa fa-calendar"></i>
						</div>
						<input class="form-control" id="identification_date" placeholder="YYYY/MM/DD" type="text" name="identification_date" value="<?php echo $identification_date; ?>"/>
					</div>
				</div>
			</div>


			<div class="form-group col-lg-6">
				<label for="question_description"><?=$this->lang->line('ir-question_description')?></label>                    
				<textarea class="form-control" id="question_description"  name="question_description" maxlength="45"><?php echo $question_description; ?></textarea>
			</div>

			<div class="form-group col-lg-12">
				<label for="type"><?=$this->lang->line('ir-type')?></label>                    
				<textarea class="form-control" id="type"  name="type" maxlength="45"><?php echo $type; ?></textarea>
			</div>

			<div class="form-group col-lg-6">
				<label for="responsable"><?=$this->lang->line('ir-responsable')?></label>                    
				<textarea class="form-control" id="responsable"  name="responsable" maxlength="45"><?php echo $responsable; ?></textarea>
			</div>
			<div class="form-group col-lg-6">
				<label for="situation"><?=$this->lang->line('ir-situation')?></label>                    
				<textarea class="form-control" id="situation"  name="situation" maxlength="45"><?php echo $situation; ?></textarea>
			</div>

			<div class="form-group col-lg-12">
				<label for="action"><?=$this->lang->line('ir-action')?></label>                    
				<textarea class="form-control" id="action"  name="action" maxlength="45"><?php echo $action; ?></textarea>
			</div>

			<div class="form-group">
				<div class="col-lg-6">
					<label><?=$this->lang->line('ir-resolution_date')?></label>
					<div class="input-group">
						<div class="input-group-addon">
							<i class="fa fa-calendar"></i>
						</div>
						<input class="form-control" id="resolution_date" placeholder="YYYY/MM/DD" type="text" name="resolution_date" value="<?php echo $resolution_date; ?>"/>
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
						<input class="form-control" id="replan_date" placeholder="YYYY/MM/DD" type="text" name="replan_date" value="<?php echo $replan_date; ?>"/>
					</div>
				</div>
			</div>

			<div class="form-group col-lg-12">
				<label for="observations"><?=$this->lang->line('ir-observations')?></label>                    
				<textarea class="form-control" id="observations" name="observations" maxlength="45"><?php echo $observations; ?></textarea>
			</div>

			<!-- buttons -->
			<div class="col-lg-12"><button type="submit" class="btn btn-lg btn-success pull-right">
				<i class="glyphicon glyphicon-ok"></i> <?=$this->lang->line('btn-save')?>
			</button>
				</form>
				
					<form action="<?php echo base_url()?>/Issues_Record/list/<?=$project_id?>">
					<button class="btn btn-lg btn-info pull-left" >  <i class="glyphicon glyphicon-chevron-left"></i> <?=$this->lang->line('btn-back')?></button>
				</form>
				</div>

		</div>
	</div>
</div>
</div>
</div>  
</div>

<!-- /.row -->


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

	//var currentDate = new Date();
 //var today = new Date(currentDate.getFullYear(), currentDate.getMonth(), currentDate.getDate(), 0, 0, 0, 0);
 //var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";

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


<div>
	<?php $this->load->view('frame/footer_view') ?>            
</div>