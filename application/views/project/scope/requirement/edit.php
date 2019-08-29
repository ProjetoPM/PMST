<div id="page-wrapper">
  <div class="row">
    <div class="col-lg-12">
      <h1 class="page-header"><?=$this->lang->line('requirement-registration')?></h1>
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
        <form method="POST" action="<?php echo base_url()?>Requirement_registration/update/<?php echo $requirement_registration[0]->requirement_registration_id; ?>">

          <input type="hidden" name="project_id"  value="<?= $requirement_registration[0]->project_id?>">

          <div class=" col-lg-4 form-group">
            <label for="associated_id"><?=$this->lang->line('associated_id')?> </label>
            <a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?=$this->lang->line('associated_id-tp')?>"><i class="glyphicon glyphicon-comment"></i></a>

            <input class="form-control" type="text" id="associated_id" name="associated_id" maxlength="45" value="<?= $requirement_registration[0]->associated_id?>">

          </div>

          <div class=" col-lg-4 form-group">
            <label for="business_strategy"><?=$this->lang->line('business_strategy')?> </label>
            <a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?=$this->lang->line('business_strategy-tp')?>"><i class="glyphicon glyphicon-comment"></i></a>

            <input class="form-control" type="text" id="business_strategy" name="business_strategy" maxlength="45" value="<?= $requirement_registration[0]->business_strategy?>">

          </div>

          <div class=" col-lg-4 form-group">
            <label for="priority"><?=$this->lang->line('priority')?> </label>
            <a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?=$this->lang->line('priority-tp')?>"><i class="glyphicon glyphicon-comment"></i></a>

            <input class="form-control" type="text" id="priority" name="priority" maxlength="45" value="<?= $requirement_registration[0]->priority?>">

          </div>

          <div class=" col-lg-12 form-group">
            <label for="description"><?=$this->lang->line('description')?> </label>
            <a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?=$this->lang->line('description-tp')?>"><i class="glyphicon glyphicon-comment"></i></a>

            <textarea oninput="eylem(this, this.value)" class="form-control elasticteste" type="text" id="description" name="description" maxlength="255"><?= $requirement_registration[0]->description?></textarea>

          </div>

          <div class=" col-lg-4 form-group">
            <label for="version"><?=$this->lang->line('version')?> </label>
            <a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?=$this->lang->line('version-tp')?>"><i class="glyphicon glyphicon-comment"></i></a>

            <input class="form-control" type="text" id="version" name="version" maxlength="45" value="<?= $requirement_registration[0]->version?>">

          </div>

          <div class=" col-lg-4 form-group">
            <label for="phase"><?=$this->lang->line('phase')?> </label>
            <a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?=$this->lang->line('phase-tp')?>"><i class="glyphicon glyphicon-comment"></i></a>

            <input class="form-control" type="text" id="phase" name="phase" maxlength="45" value="<?= $requirement_registration[0]->phase?>">

          </div>

          <div class=" col-lg-4 form-group">
            <label for="associated_delivery"><?=$this->lang->line('associated_delivery')?> </label>
            <a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?=$this->lang->line('associated_delivery-tp')?>"><i class="glyphicon glyphicon-comment"></i></a>

            <input class="form-control" type="text" id="associated_delivery" name="associated_delivery" maxlength="45" value="<?= $requirement_registration[0]->associated_delivery?>">

          </div>

          <div class=" col-lg-4 form-group">
            <label for="type"><?=$this->lang->line('type')?> </label>
            <a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?=$this->lang->line('type-tp')?>"><i class="glyphicon glyphicon-comment"></i></a>


            <select class="form-control" id="type" name="type">
              <?php
              if($requirement_registration[0]->type == "Legal"){
            ?>
              <option value="Legal" selected><?=$this->lang->line('type-legal')?></option>
              <option value="Business"><?=$this->lang->line('type-business')?></option>
              <option value="Stakeholder"><?=$this->lang->line('type-stakeholder')?></option>
              <option value="Product"><?=$this->lang->line('type-product')?></option>
              <option value="Project"><?=$this->lang->line('type-project')?></option>
            <?php
              }elseif ($requirement_registration[0]->type == "Business") {
            ?>
              <option value="Legal"><?=$this->lang->line('type-legal')?></option>
              <option value="Business" selected><?=$this->lang->line('type-business')?></option>
              <option value="Stakeholder"><?=$this->lang->line('type-stakeholder')?></option>
              <option value="Product"><?=$this->lang->line('type-product')?></option>
              <option value="Project"><?=$this->lang->line('type-project')?></option>
            <?php
              }elseif ($requirement_registration[0]->type == "Stakeholder") {
            ?>
              <option value="Legal"><?=$this->lang->line('type-legal')?></option>
              <option value="Business"><?=$this->lang->line('type-business')?></option>
              <option value="Stakeholder" selected><?=$this->lang->line('type-stakeholder')?></option>
              <option value="Product"><?=$this->lang->line('type-product')?></option>
              <option value="Project"><?=$this->lang->line('type-project')?></option>
            <?php
              }elseif ($requirement_registration[0]->type == "Product") {
            ?>
              <option value="Legal"><?=$this->lang->line('type-legal')?></option>
              <option value="Business"><?=$this->lang->line('type-business')?></option>
              <option value="Stakeholder"><?=$this->lang->line('type-stakeholder')?></option>
              <option value="Product" selected><?=$this->lang->line('type-product')?></option>
              <option value="Project"><?=$this->lang->line('type-project')?></option>
            <?php
              }else{
            ?>
              <option value="Legal"><?=$this->lang->line('type-legal')?></option>
              <option value="Business"><?=$this->lang->line('type-business')?></option>
              <option value="Stakeholder" selected><?=$this->lang->line('type-stakeholder')?></option>
              <option value="Product"><?=$this->lang->line('type-product')?></option>
              <option value="Project"><?=$this->lang->line('type-project')?></option>
            <?php
              }
            ?>
            </select>

          </div>

          <div class=" col-lg-4 form-group">
            <label for="requester"><?=$this->lang->line('requester')?> </label>
            <a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?=$this->lang->line('requester-tp')?>"><i class="glyphicon glyphicon-comment"></i></a>

            <input type="text" class="form-control" id="requester" name="requester" maxlength="45" value="<?= $requirement_registration[0]->requester?>">

          </div>

          <div class=" col-lg-4 form-group">
            <label for="complexity"><?=$this->lang->line('complexity')?> </label>
            <a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?=$this->lang->line('complexity-tp')?>"><i class="glyphicon glyphicon-comment"></i></a>

            <select class="form-control" id="complexity" name="complexity">
              <?php
                if($requirement_registration[0]->complexity == "Minimum"){
              ?>
              <option value="minimun" selected><?=$this->lang->line('complexity-minimum')?></option>
              <option value="Low"><?=$this->lang->line('complexity-low')?></option>
              <option value="Medium"><?=$this->lang->line('complexity-medium')?></option>
              <option value="High"><?=$this->lang->line('complexity-high')?></option>
              <option value="Highest"><?=$this->lang->line('complexity-highest')?></option>
              <?php
                }elseif ($requirement_registration[0]->complexity == "Low") {
              ?>
              <option value="minimun"><?=$this->lang->line('complexity-minimum')?></option>
              <option value="Low" selected><?=$this->lang->line('complexity-low')?></option>
              <option value="Medium"><?=$this->lang->line('complexity-medium')?></option>
              <option value="High"><?=$this->lang->line('complexity-high')?></option>
              <option value="Highest"><?=$this->lang->line('complexity-highest')?></option>
              <?php
                }elseif ($requirement_registration[0]->complexity == "Medium") {
              ?>
              <option value="minimun"><?=$this->lang->line('complexity-minimum')?></option>
              <option value="Low"><?=$this->lang->line('complexity-low')?></option>
              <option value="Medium" selected><?=$this->lang->line('complexity-medium')?></option>
              <option value="High"><?=$this->lang->line('complexity-high')?></option>
              <option value="Highest"><?=$this->lang->line('complexity-highest')?></option>
              <?php
                }elseif ($requirement_registration[0]->complexity == "High") {
              ?>
              <option value="minimun"><?=$this->lang->line('complexity-minimum')?></option>
              <option value="Low"><?=$this->lang->line('complexity-low')?></option>
              <option value="Medium"><?=$this->lang->line('complexity-medium')?></option>
              <option value="High" selected><?=$this->lang->line('complexity-high')?></option>
              <option value="Highest"><?=$this->lang->line('complexity-highest')?></option>
              <?php
                }elseif ($requirement_registration[0]->complexity == "Highest") {
              ?>
              <option value="minimun"><?=$this->lang->line('complexity-minimum')?></option>
              <option value="Low"><?=$this->lang->line('complexity-low')?></option>
              <option value="Medium"><?=$this->lang->line('complexity-medium')?></option>
              <option value="High"><?=$this->lang->line('complexity-high')?></option>
              <option value="Highest" selected><?=$this->lang->line('complexity-highest')?></option>
              <?php
              }
              ?>
            </select>
          </div>

          <div class=" col-lg-4 form-group">
            <label for="responsible"><?=$this->lang->line('responsible')?> </label>
            <a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?=$this->lang->line('responsible-tp')?>"><i class="glyphicon glyphicon-comment"></i></a>

            <input class="form-control" id="responsible" name="responsible" maxlength="45" value="<?= $requirement_registration[0]->responsible?>">

          </div>

          <div class=" col-lg-4 form-group">
            <label for="validity"><?=$this->lang->line('validity')?> </label>
            <a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?=$this->lang->line('validity-tp')?>"><i class="glyphicon glyphicon-comment"></i></a>

            <input class="form-control" id="validity" name="validity" maxlength="45" value="<?= $requirement_registration[0]->validity?>">

          </div>

          <div class=" col-lg-12 form-group">
            <label for="acceptance_criteria"><?=$this->lang->line('acceptance_criteria')?> </label>
            <a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?=$this->lang->line('acceptance_criteria-tp')?>"><i class="glyphicon glyphicon-comment"></i></a>

            <textarea oninput="eylem(this, this.value)" class="form-control elasticteste" id="acceptance_criteria" name="acceptance_criteria" maxlength="45"><?= $requirement_registration[0]->acceptance_criteria?> </textarea>

          </div>

          <div class=" col-lg-12 form-group">
            <label for="supporting_documentation"><?=$this->lang->line('supporting_documentation')?></label>
            <a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?=$this->lang->line('supporting_documentation-tp')?>"><i class="glyphicon glyphicon-comment"></i></a>

            <input class="form-control" id="supporting_documentation" name="supporting_documentation" value="<?= $requirement_registration[0]->supporting_documentation?>" maxlength="45">

          </div>

          <div class=" col-lg-4 form-group">
            <label for="situation"><?=$this->lang->line('requirement_situation')?></label>
            <a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?=$this->lang->line('requirement_situation-tp')?>"><i class="glyphicon glyphicon-comment"></i></a>

            <input class="form-control" id="requirement_situation" name="requirement_situation" value="<?= $requirement_registration[0]->requirement_situation?>" maxlength="45">

          </div>

          <div class="col-lg-12">
            <button id="new_quality_plan-submit" type="submit" value="Save" class="btn btn-lg btn-success pull-right">
              <i class="glyphicon glyphicon-ok"></i> <?=$this->lang->line('btn-save')?>
            </button>
          </form>

          <button onclick="history.go(-1);" class="btn btn-lg btn-info pull-left" >  <i class="glyphicon glyphicon-chevron-left"></i> <?=$this->lang->line('btn-back')?></button>

       </div>
<?php $this->load->view('frame/footer_view')?>
