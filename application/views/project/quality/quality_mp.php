<div id="page-wrapper">
  <div class="row">
    <div class="col-lg-12">
      <h1 class="page-header"><?=$this->lang->line('quality_plan-title')?></h1>
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
    if($quality_mp==null){              
     ?> 
     <form method="POST" action="<?php echo base_url('Charter_Quality/insert/'); ?>">

      <input type="hidden" name="project_id"  value="<?php echo $project[0]->project_id; ?>">
      <input type="hidden" name="status" value="1">

      <div class=" col-lg-12 form-group">

        <label for="methodology"><?=$this->lang->line('quality_plan-methodology')?> </label> 
        <a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?=$this->lang->line('quality_plan-methodology-tooltip')?>"><i class="glyphicon glyphicon-comment"></i></a>

        <div >                 
          <textarea oninput="eylem(this, this.value)" class="form-control elasticteste" id="methodology" name="methodology"></textarea>  
        </div>

      </div>

      <div class=" col-lg-12 form-group">

        <label for="related_processes"><?=$this->lang->line('quality_plan-related_processes')?> </label> 
        <a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?=$this->lang->line('quality_plan-related_processes-tooltip')?>"><i class="glyphicon glyphicon-comment"></i></a>

        <div >                 
          <textarea oninput="eylem(this, this.value)" class="form-control elasticteste" id="related_processes" name="related_processes"></textarea>  
        </div>
      </div>


      <div class=" col-lg-12 form-group">
       <label for="expectations_tolerances"><?=$this->lang->line('quality_plan-expectations_tolerances')?> </label> 
       <a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?=$this->lang->line('quality_plan-expectations_tolerances-tooltip')?>"><i class="glyphicon glyphicon-comment"></i></a>
       <div>
         <textarea oninput="eylem(this, this.value)" class="form-control elasticteste" id="expectations_tolerances" name="expectations_tolerances"></textarea>
       </div>
     </div>

     <div class=" col-lg-12 form-group">
       <label for="traceability"><?=$this->lang->line('quality_plan-traceability')?> </label> 
       <a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?=$this->lang->line('quality_plan-traceability-tooltip')?>"><i class="glyphicon glyphicon-comment"></i></a>
       <div>
         <textarea oninput="eylem(this, this.value)" class="form-control elasticteste" id="traceability" name="traceability"></textarea>
       </div>
     </div>


     <div class="col-lg-12">
      <button id="new_quality_plan-submit" type="submit" value="Save" class="btn btn-lg btn-success pull-right">
        <i class="glyphicon glyphicon-ok"></i> <?=$this->lang->line('btn-save')?>
      </button> 
    </form>

    <form action="<?php echo base_url('project/'); ?><?php echo $id; ?>" >
     <button class="btn btn-lg btn-info pull-left" >  <i class="glyphicon glyphicon-chevron-left"></i> <?=$this->lang->line('btn-back')?></button>
   </form>

 </div>
 <?php
}else{
 foreach($quality_mp as $quality){
   ?>

   <form method="POST" action="<?php echo base_url('Charter_Quality/update/');?><?php echo $id; ?>">
     <input type="hidden" name="status" value="1">


     <div class=" col-lg-12 form-group">

      <label for="methodology"><?=$this->lang->line('quality_plan-methodology')?> </label> 
      <a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?=$this->lang->line('quality_plan-methodology-tooltip')?>"><i class="glyphicon glyphicon-comment"></i></a>

      <div >                 
        <textarea oninput="eylem(this, this.value)" class="form-control elasticteste" id="methodology" name="methodology"><?php echo $quality->methodology; ?></textarea>  
      </div>

    </div>

    <div class=" col-lg-12 form-group">

      <label for="related_processes"><?=$this->lang->line('quality_plan-related_processes')?> </label> 

      <a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?=$this->lang->line('quality_plan-related_processes-tooltip')?>"><i class="glyphicon glyphicon-comment"></i></a>

      <div >                 
        <textarea oninput="eylem(this, this.value)" class="form-control elasticteste" id="related_processes" name="related_processes"><?php echo $quality->related_processes; ?></textarea>  
      </div>
    </div>

    <div class=" col-lg-12 form-group">
     <label for="expectations_tolerances"><?=$this->lang->line('quality_plan-expectations_tolerances')?> </label> 
     <a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?=$this->lang->line('quality_plan-expectations_tolerances-tooltip')?>"><i class="glyphicon glyphicon-comment"></i></a>
     <div>
       <textarea oninput="eylem(this, this.value)" class="form-control elasticteste" id="expectations_tolerances" name="expectations_tolerances"> <?php echo $quality->expectations_tolerances; ?></textarea>
     </div>
   </div>    

   <div class=" col-lg-12 form-group">
     <label for="traceability"><?=$this->lang->line('quality_plan-traceability')?> </label> 
     <a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?=$this->lang->line('quality_plan-traceability-tooltip')?>"><i class="glyphicon glyphicon-comment"></i></a>
     <div>
       <textarea oninput="eylem(this, this.value)" class="form-control elasticteste" id="traceability" name="traceability"><?php  echo $quality->traceability; ?></textarea>
     </div>
   </div>



   <div class="col-lg-12">
    <button type="submit" value="Save" class="btn btn-lg btn-success pull-right">
      <i class="glyphicon glyphicon-ok"></i> <?=$this->lang->line('btn-save')?>
    </button> 
  </form>

  <form action="<?php echo base_url('project/'); ?><?php echo $id; ?>" >
    <button class="btn btn-lg btn-info pull-left" > <i class="glyphicon glyphicon-chevron-left"></i> <?=$this->lang->line('btn-back')?></button>
  </form>

</div>

<?php
} 
}
?>
</div>
<?php $this->load->view('frame/footer_view')?>
