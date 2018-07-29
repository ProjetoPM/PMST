<div id="page-wrapper">
  <div class="row">
    <div class="col-lg-12">
      <h1 class="page-header">Update Stakeholder</h1>
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

      <form action="<?=base_url()?>stakeholder/saveUpdate/" method="post">

        
            <input id="stakeholder_id" name="stakeholder_id" type="hidden" placeholder="Title" class="form-control input-md" value="<?= $stakeholder[0]->stakeholder_id;?>" required="true" readonly>

          

        <!-- Text input-->
        <div class="form-group">
          <label for="name">Name</label>  
          <div >
            <input id="name" name="name" type="text" placeholder="Name" class="form-control input-md" value="<?= $stakeholder[0]->name;?>" required="true">

          </div>
        </div>

        <!-- Textarea -->
        <div class="form-group">
          <label for="description">Description</label>
          <div >                     
            <input id="description" name="description" type="text" placeholder="Description" class="form-control input-md" value="<?= $stakeholder[0]->description;?>" required="true">
          </div>
        </div>

        <!-- Textarea -->
        <div class="form-group">
          <label for="objectives">Objectives</label>
          <div >                     
            <input id="objectives" name="objectives" type="text" placeholder="Objectives" class="form-control input-md" value="<?= $stakeholder[0]->objectives;?>" required="true">
          </div>
        </div>
        <input id="new_stakeholder-submit" type="submit" value="Update" class="btn btn-lg btn-success btn-block">


      </form>


    </div>
    <!-- /.col-lg-12 -->
  </div>
  <!-- /.row -->
</div>
<?php $this->load->view('frame/footer_view')?>