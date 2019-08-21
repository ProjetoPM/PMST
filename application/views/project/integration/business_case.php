<div id="page-wrapper">
  <div class="row">
    <div class="col-lg-12">
      <h1 class="page-header"><?=$this->lang->line('business_case-title')?></h1>
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


    <?php
    if($business_case==null){
     ?>
     <form method="POST" action="<?php echo base_url('Business_Case/insert/'); ?>">

      <input type="hidden" name="project_id"  value="<?php echo $project[0]->project_id; ?>">

      <div class=" col-lg-12 form-group">
        <label for="business_deals"><?=$this->lang->line('business_case-business_deals')?> </label>
        <a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?=$this->lang->line('business_case-business_deals-tooltip')?>"><i class="glyphicon glyphicon-comment"></i></a>
        <div >
          <textarea oninput="eylem(this, this.value)" class="form-control elasticteste" id="business_deals" name="business_deals"></textarea>
        </div>
      </div>

      <div class=" col-lg-12 form-group">
        <label for="situation_analysis"><?=$this->lang->line('business_case-situation_analysis')?> </label>
        <a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?=$this->lang->line('business_case-situation_analysis-tooltip')?>"><i class="glyphicon glyphicon-comment"></i></a>
        <div >
          <textarea oninput="eylem(this, this.value)" class="form-control elasticteste" id="situation_analysis" name="situation_analysis"></textarea>
        </div>
      </div>

      <div class=" col-lg-12 form-group">
        <label for="recommendation"><?=$this->lang->line('business_case-recommendation')?> </label>
        <a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?=$this->lang->line('business_case-recommendation-tooltip')?>"><i class="glyphicon glyphicon-comment"></i></a>
        <div >
          <textarea oninput="eylem(this, this.value)" class="form-control elasticteste" id="recommendation" name="recommendation"></textarea>
        </div>
      </div>


      <div class=" col-lg-12 form-group">
       <label for="evaluation"><?=$this->lang->line('business_case-evaluation')?> </label>
       <a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?=$this->lang->line('business_case-evaluation-tooltip')?>"><i class="glyphicon glyphicon-comment"></i></a>
       <div>
         <textarea oninput="eylem(this, this.value)" class="form-control elasticteste" id="evaluation" name="evaluation"></textarea>
       </div>
     </div>

     <div class="col-lg-12">
      <button id="new_business_case-submit" type="submit" value="Save" class="btn btn-lg btn-success pull-right">
        <i class="glyphicon glyphicon-ok"></i> <?=$this->lang->line('btn-save')?>
      </button>
    </form>

    <form action="<?php echo base_url('project/'); ?><?php echo $id; ?>" >
     <button class="btn btn-lg btn-info pull-left" >  <i class="glyphicon glyphicon-chevron-left"></i> <?=$this->lang->line('btn-back')?></button>
   </form>

 </div>

 <?php
}else{
 foreach($business_case as $bc){
   ?>

   <form method="POST" action="<?php echo base_url('Business_Case/update/');?><?php echo $id; ?>">
     <input type="hidden" name="status" value="1">


     <div class=" col-lg-12 form-group">
       <label for="business_deals"><?=$this->lang->line('business_case-business_deals')?> </label>
       <a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?=$this->lang->line('business_case-business_deals-tooltip')?>"><i class="glyphicon glyphicon-comment"></i></a>
      <div >
        <textarea oninput="eylem(this, this.value)" class="form-control elasticteste" id="business_deals" name="business_deals"><?php echo $bc->business_deals; ?></textarea>
      </div>
    </div>

    <div class=" col-lg-12 form-group">
      <label for="situation_analysis"><?=$this->lang->line('business_case-situation_analysis')?> </label>
      <a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?=$this->lang->line('business_case-situation_analysis-tooltip')?>"><i class="glyphicon glyphicon-comment"></i></a>
     <div >
       <textarea oninput="eylem(this, this.value)" class="form-control elasticteste" id="situation_analysis" name="situation_analysis"><?php echo $bc->situation_analysis; ?></textarea>
     </div>
   </div>

    <div class=" col-lg-12 form-group">
      <label for="recommendation"><?=$this->lang->line('business_case-recommendation')?> </label>
      <a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?=$this->lang->line('business_case-recommendation-tooltip')?>"><i class="glyphicon glyphicon-comment"></i></a>
      <div >
        <textarea oninput="eylem(this, this.value)" class="form-control elasticteste" id="recommendation" name="recommendation"><?php echo $bc->recommendation; ?></textarea>
      </div>
    </div>


    <div class=" col-lg-12 form-group">
     <label for="evaluation"><?=$this->lang->line('business_case-evaluation')?> </label>
     <a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?=$this->lang->line('business_case-evaluation-tooltip')?>"><i class="glyphicon glyphicon-comment"></i></a>
     <div>
       <textarea oninput="eylem(this, this.value)" class="form-control elasticteste" id="evaluation" name="evaluation"><?php echo $bc->evaluation; ?></textarea>
     </div>
   </div>

   <div class="col-lg-12">
    <button id="new_business_case-submit" type="submit" value="Save" class="btn btn-lg btn-success pull-right">
      <i class="glyphicon glyphicon-ok"></i> <?=$this->lang->line('btn-save')?>
    </button>
  </form>

  <form action="<?php echo base_url('project/'); ?><?php echo $id; ?>" >
   <button class="btn btn-lg btn-info pull-left" >  <i class="glyphicon glyphicon-chevron-left"></i> <?=$this->lang->line('btn-back')?></button>
 </form>

</div>

<?php
}
}
?>
</div>
<?php $this->load->view('frame/footer_view')?>
