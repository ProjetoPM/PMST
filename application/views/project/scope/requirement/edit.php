<div id="page-wrapper">
  <div class="row">
    <div class="col-lg-12">
      <h1 class="page-header"><?=$this->lang->line('notification')?></h1>
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


    <form action="<?= base_url() ?>communication_item/update/<?php echo $communication_item[0]->communication_item_id; ?>" method="post">
      <div class="form-group">
        <label>Type</label>
        <textarea class="form-control" id="type" placeholder="Type" name="type" maxlength="45"><?php echo $communication_item[0]->type; ?></textarea>
      </div>
      <!-- Textarea -->
      <div class="form-group">
        <label>Description</label>
        <textarea class="form-control" id="description" placeholder="Description" name="description" maxlength="45"><?php echo $communication_item[0]->description; ?></textarea>
      </div>
      <div class="form-group">
        <label>Content</label>
        <textarea class="form-control" id="content" placeholder="Content" name="content" maxlength="255"><?php echo $communication_item[0]->content; ?></textarea>
      </div>
      <div class="form-group">
        <label>Distribution Reason</label>
        <textarea class="form-control" id="distribution_reason" placeholder="Distribution Reason" name="distribution_reason" maxlength="255"><?php echo $communication_item[0]->distribution_reason; ?></textarea>
      </div>
      <div class="form-group">
        <label>Language</label>
        <textarea class="form-control" id="language" placeholder="Language" name="language" maxlength="45"><?php echo $communication_item[0]->language; ?></textarea>
      </div>
      <div class="form-group">
        <label>Channel</label>
        <textarea class="form-control" id="channel" placeholder="Channel" name="channel" maxlength="45"><?php echo $communication_item[0]->channel; ?></textarea>
      </div>
      <div class="form-group">
        <label>Document Format</label>
        <textarea class="form-control" id="documento_format" placeholder="Document Format" name="documento_format" maxlength="45"><?php echo $communication_item[0]->documento_format; ?></textarea>
      </div>
      <div class="form-group">
        <label>Method</label>
        <textarea class="form-control" id="metod" placeholder="Method" name="metod" maxlength="45"><?php echo $communication_item[0]->metod; ?></textarea>
      </div>
      <div class="form-group">
        <label for="frequency">Frequency</label>
        <textarea class="form-control" id="frequency" placeholder="Frequency" name="frequency" maxlength="45"><?php echo $communication_item[0]->frequency; ?></textarea>
      </div>
      <div class="form-group">
        <label for="allocated_resources">Allocated Resources</label>
        <textarea class="form-control" id="allocated_resources" placeholder="Allocated Resources" name="allocated_resources" maxlength="45"><?php echo $communication_item[0]->allocated_resources; ?></textarea>
      </div>
      <div class="form-group">
        <label for="format">Format</label>
        <div>                     
          <textarea class="form-control" id="format" placeholder="Format" name="format" maxlength="45"><?php echo $communication_item[0]->format; ?></textarea>
        </div>
      </div>
      <div class="form-group">
        <label for="local">Local</label>
        <textarea class="form-control" id="local" placeholder="Local" name="local" maxlength="45"><?php echo $communication_item[0]->local; ?></textarea>
      </div>

      <button type="submit" class="btn btn-lg btn-success btn-block">Save</button>
    </form>
  </div>
</div>
<?php $this->load->view('frame/footer_view')?>
