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

<<script type="text/javascript">
  function avg(){
    document.getElementById('average').value = 0
    var interest = document.getElementById('interest').value;
    var power = document.getElementById('power').value;
    var influence = document.getElementById('influence').value;
    var impact = document.getElementById('impact').value;
    var aux  = (((interest * 10) + (power * 10) + (influence * 10) + (impact * 10)) / 4) / 10;
    document.getElementById('average').value = parseFloat(aux.toFixed(2));
  }

</script>

    <div class="row">
				<?php extract($stakeholder); ?>

        <form action="<?=base_url()?>ManagementStakeholder/updatePlan/<?php echo $stakeholder_id; ?>" method="post">

           <input type="hidden" name="project_id" value="<?php echo $project_id; ?>">
           <input type="hidden" name="status" value="1">

           <div class="col-lg-4 form-group">
 						<label for="name"><?=$this->lang->line('stakeholder-name')?></label>
 						<div >
 							<input  id="name_text" name="name" type="text" class="form-control input-md" required="false" value="<?php echo $name; ?>" disabled>
 						</div>
 					</div>

          <div class="col-lg-4 form-group">
            <label for="current_engagement "><?=$this->lang->line('select-6')?></label>
            <select name="current_engagement" class="form-control" onchange="avg()">
             <option value="unaware" <?php if ($current_engagement == "unaware" ) echo 'selected' ; ?>><?=$this->lang->line('option-1')?></option>
             <option value="supportive" <?php if ($current_engagement == "supportive" ) echo 'selected' ; ?>><?=$this->lang->line('option-2')?></option>
             <option value="leading" <?php if ($current_engagement == "leading" ) echo 'selected' ; ?>><?=$this->lang->line('option-3')?></option>
             <option value="neutral" <?php if ($current_engagement == "neutral" ) echo 'selected' ; ?>><?=$this->lang->line('option-4')?></option>
             <option value="resistant" <?php if ($current_engagement == "resistant" ) echo 'selected' ; ?>><?=$this->lang->line('option-5')?></option>
           </select>
         </div>

         <div class="col-lg-4 form-group">
          <label for="expected_engagement "><?=$this->lang->line('select-7')?></label>
          <select name="expected_engagement" class="form-control" onchange="avg()">
            <option value="unaware" <?php if ($expected_engagement == "unaware" ) echo 'selected' ; ?>><?=$this->lang->line('option-1')?></option>
            <option value="supportive" <?php if ($expected_engagement == "supportive" ) echo 'selected' ; ?>><?=$this->lang->line('option-2')?></option>
            <option value="leading" <?php if ($expected_engagement == "leading" ) echo 'selected' ; ?>><?=$this->lang->line('option-3')?></option>
            <option value="neutral" <?php if ($expected_engagement == "neutral" ) echo 'selected' ; ?>><?=$this->lang->line('option-4')?></option>
            <option value="resistant" <?php if ($expected_engagement == "resistant" ) echo 'selected' ; ?>><?=$this->lang->line('option-5')?></option>
          </select>
        </div>
        <!-- Text input-->
        <!-- Textarea -->
        <div class="col-lg-2 form-group">
          <label for="interest"><?=$this->lang->line('select-2')?></label>
          <select name="interest" class="form-control" id="interest" onchange="avg()">
            <option value=10 <?php if ($interest == 10) echo 'selected' ; ?>>10%</option>
            <option value=30 <?php if ($interest == 30) echo 'selected' ; ?>>30%</option>
            <option value=50 <?php if ($interest == 50) echo 'selected' ; ?>>50%</option>
            <option value=70 <?php if ($interest == 70) echo 'selected' ; ?>>70%</option>
            <option value=90 <?php if ($interest == 90) echo 'selected' ; ?>>90%</option>
          </select>
        </div>

        <div class="col-lg-2 form-group">
          <label for="power"><?=$this->lang->line('select-3')?></label>
          <select name="power" class="form-control" id="power" onchange="avg()">
            <option value=10 <?php if ($power == 10) echo 'selected' ; ?>>10%</option>
            <option value=30 <?php if ($power == 30) echo 'selected' ; ?>>30%</option>
            <option value=50 <?php if ($power == 50) echo 'selected' ; ?>>50%</option>
            <option value=70 <?php if ($power == 70) echo 'selected' ; ?>>70%</option>
            <option value=90 <?php if ($power == 90) echo 'selected' ; ?>>90%</option>
          </select>
        </div>

        <div class="col-lg-2 form-group">
          <label for="influence"><?=$this->lang->line('select-4')?></label>
          <select name="influence" class="form-control" id="influence" onchange="avg()">
            <option value=10 <?php if ($influence == 10) echo 'selected' ; ?>>10%</option>
            <option value=30 <?php if ($influence == 30) echo 'selected' ; ?>>30%</option>
            <option value=50 <?php if ($influence == 50) echo 'selected' ; ?>>50%</option>
            <option value=70 <?php if ($influence == 70) echo 'selected' ; ?>>70%</option>
            <option value=90 <?php if ($influence == 90) echo 'selected' ; ?>>90%</option>
          </select>
        </div>

        <div class="col-lg-2 form-group">
          <label for="impact"><?=$this->lang->line('select-5')?></label>
          <select name="impact" class="form-control" id="impact" onchange="avg()">
            <option value=10 <?php if ($impact == 10) echo 'selected' ; ?>>10%</option>
            <option value=30 <?php if ($impact == 30) echo 'selected' ; ?>>30%</option>
            <option value=50 <?php if ($impact == 50) echo 'selected' ; ?>>50%</option>
            <option value=70 <?php if ($impact == 70) echo 'selected' ; ?>>70%</option>
            <option value=90 <?php if ($impact == 90) echo 'selected' ; ?>>90%</option>
          </select>
        </div>

        <div class="col-lg-4 form-group">
          <label for="average"><?=$this->lang->line('average')?></label>
          <input name="average" class="form-control" id="average" value="<?php echo $average; ?>" readonly=“true”>
        </div>

        <div class="col-lg-12 form-group">
          <label for="strategy"><?=$this->lang->line('text-1')?></label>
          <a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?=$this->lang->line('stakeholder_mp-text1-tooltip')?>"><i class="glyphicon glyphicon-comment"></i></a>
          <div >
            <textarea class=" form-control elasticteste" oninput="eylem(this, this.value)"  id="strategy" name="strategy"><?php echo $strategy; ?></textarea>
          </div>
        </div>

        <div class="col-lg-12 form-group">
          <label for="scope"><?=$this->lang->line('text-2')?></label>
          <a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?=$this->lang->line('stakeholder_mp-text2-tooltip')?>"><i class="glyphicon glyphicon-comment"></i></a>
          <div >
            <textarea class="form-control elasticteste" oninput="eylem(this, this.value)" id="scope" name="scope"><?php echo $scope; ?></textarea>
          </div>
        </div>

        <div class="col-lg-12 form-group">
          <label for="observation"><?=$this->lang->line('text-3')?></label>
          <a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?=$this->lang->line('stakeholder_mp-text3-tooltip')?>"><i class="glyphicon glyphicon-comment"></i></a>
          <div >
            <textarea class="col-lg-6 form-control elasticteste" oninput="eylem(this, this.value)" id="observation" name="observation"><?php echo $observation; ?></textarea>
          </div>
        </div>
        <div class="col-lg-12">
          <button id="new_human_resource-submit" type="submit" value="Save" class="btn btn-lg btn-success pull-right">
            <i class="glyphicon glyphicon-ok"></i> <?=$this->lang->line('btn-save')?>
          </button>
        </form>

        <form action="<?php echo base_url("ManagementStakeholder/listPlan/".$project_id); ?>" >
          <button class="btn btn-lg btn-info pull-left" >  <i class="glyphicon glyphicon-chevron-left"></i> <?=$this->lang->line('btn-back')?></button>
        </form>

      </div>
    </div>

    <!-- /.col-lg-12 -->
  </div>
  <!-- /.row -->
</div>


<?php $this->load->view('frame/footer_view')?>
