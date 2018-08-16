<div id="page-wrapper">
  <div class="row">
    <div class="col-lg-12">
      <h1 class="page-header">Update Projects</h1>
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
    <div class="col-lg-12">      

      <form action="<?=base_url()?>project/saveUpdate/" method="post">

        
            <input id="project_id" name="project_id" type="hidden" placeholder="Title" class="form-control input-md" value="<?= $project[0]->project_id;?>" required="true" readonly>

          

        <!-- Text input-->
        <div class="form-group">
          <label for="title">Title</label>  
          <div >
            <input id="title" name="title" type="text" placeholder="Title" class="form-control input-md" value="<?= $project[0]->title;?>" required="true">

          </div>
        </div>

        <!-- Textarea -->
        <div class="form-group">
          <label for="description">Description</label>
          <div >                     
            <input id="description" name="description" type="text" placeholder="Description" class="form-control input-md" value="<?= $project[0]->description;?>" required="true">
          </div>
        </div>

        <!-- Textarea -->
        <div class="form-group">
          <label for="objectives">Objectives</label>
          <div >                     
            <input id="objectives" name="objectives" type="text" placeholder="Objectives" class="form-control input-md" value="<?= $project[0]->objectives;?>" required="true">
          </div>
        </div>
        <input id="new_project-submit" type="submit" value="Update" class="btn btn-lg btn-success btn-block">


      </form>


    </div>
    <!-- /.col-lg-12 -->
  </div>
  <!-- /.row -->
</div>
<?php $this->load->view('frame/footer_view')?>