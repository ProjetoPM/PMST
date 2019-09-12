<div id="page-wrapper">
  <div class="row">
    <div class="col-lg-12">
      <h1 class="page-header"><?=$this->lang->line('communication')?></h1>
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


    <form method="POST" action="<?php echo base_url()?>Communication_item/insert/">

      <input type="hidden" name="project_id"  value="<?php echo $project_id; ?>">

      <div class=" col-lg-6 form-group">
        <label for="type"><?=$this->lang->line('type')?> </label>
        <a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?=$this->lang->line('type-tp')?>"><i class="glyphicon glyphicon-comment"></i></a>
        <div>
          <input type="text" class="form-control" id="type" name="type" maxlength="45" required>
        </div>
      </div>

      <div class=" col-lg-6 form-group">
        <label for="description"><?=$this->lang->line('description')?> </label>
        <a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?=$this->lang->line('description-tp')?>"><i class="glyphicon glyphicon-comment"></i></a>
        <div>
          <input type="text" class="form-control" id="description" name="description" maxlength="45">
        </div>
      </div>

      <div class=" col-lg-12 form-group">
        <label for="content"><?=$this->lang->line('content')?> </label>
        <a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?=$this->lang->line('content-tp')?>"><i class="glyphicon glyphicon-comment"></i></a>
        <div>
          <input type="text" class="form-control" id="content" name="content" maxlength="255">
        </div>
      </div>

      <div class=" col-lg-12 form-group">
        <label for="distribution_reason"><?=$this->lang->line('distribution_reason')?> </label>
        <a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?=$this->lang->line('distribution_reason-tp')?>"><i class="glyphicon glyphicon-comment"></i></a>
        <div>
          <input type="text" class="form-control" id="distribution_reason" name="distribution_reason" maxlength="255">
        </div>
      </div>

      <div class=" col-lg-6 form-group">
        <label for="language"><?=$this->lang->line('language')?> </label>
        <a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?=$this->lang->line('language-tp')?>"><i class="glyphicon glyphicon-comment"></i></a>
        <div>
          <input type="text" class="form-control" id="language" name="language" maxlength="45">
        </div>
      </div>

      <div class=" col-lg-6 form-group">
        <label for="channel"><?=$this->lang->line('channel')?> </label>
        <a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?=$this->lang->line('channel-tp')?>"><i class="glyphicon glyphicon-comment"></i></a>
        <div>
          <input type="text" class="form-control" id="channel" name="channel" maxlength="45">
        </div>
      </div>

      <div class=" col-lg-6 form-group">
        <label for="document_format"><?=$this->lang->line('document_format')?> </label>
        <a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?=$this->lang->line('document_format-tp')?>"><i class="glyphicon glyphicon-comment"></i></a>
        <div>
          <input type="text" class="form-control" id="document_format" name="document_format" maxlength="45">
        </div>
      </div>

      <div class=" col-lg-6 form-group">
        <label for="method"><?=$this->lang->line('method')?> </label>
        <a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?=$this->lang->line('method-tp')?>"><i class="glyphicon glyphicon-comment"></i></a>
        <div>
          <input type="text" class="form-control" id="method" name="method" maxlength="45">
        </div>
      </div>

      <div class=" col-lg-6 form-group">
        <label for="frequency"><?=$this->lang->line('frequency')?> </label>
        <a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?=$this->lang->line('frequency-tp')?>"><i class="glyphicon glyphicon-comment"></i></a>
        <div>
          <input type="text" class="form-control" id="frequency" name="frequency" maxlength="45">
        </div>
      </div>

      <div class=" col-lg-6 form-group">
        <label for="allocated_resources"><?=$this->lang->line('allocated_resources')?> </label>
        <a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?=$this->lang->line('allocated_resources-tp')?>"><i class="glyphicon glyphicon-comment"></i></a>
        <div>
          <input type="text" class="form-control" id="allocated_resources" name="allocated_resources" maxlength="45">
        </div>
      </div>

      <div class=" col-lg-6 form-group">
        <label for="format"><?=$this->lang->line('format')?> </label>
        <a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?=$this->lang->line('format-tp')?>"><i class="glyphicon glyphicon-comment"></i></a>
        <div>
          <input type="text" class="form-control" id="format" name="format" maxlength="45">
        </div>
      </div>

      <div class=" col-lg-6 form-group">
        <label for="local"><?=$this->lang->line('local')?> </label>
        <a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?=$this->lang->line('local-tp')?>"><i class="glyphicon glyphicon-comment"></i></a>
        <div>
          <input type="text" class="form-control" id="local" name="local" maxlength="45">
        </div>
      </div>

     <div class="col-lg-12">
      <button id="new_quality_plan-submit" type="submit" value="Save" class="btn btn-lg btn-success pull-right">
        <i class="glyphicon glyphicon-ok"></i> <?=$this->lang->line('btn-save')?>
      </button>
    </form>

    <form action="<?php echo base_url()?>/Communication_item/listp/<?=$project_id?>" >
     <button class="btn btn-lg btn-info pull-left" >  <i class="glyphicon glyphicon-chevron-left"></i> <?=$this->lang->line('btn-back')?></button>
   </form>

 </div>
</div>
<?php $this->load->view('frame/footer_view')?>
