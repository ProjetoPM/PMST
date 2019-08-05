<div id="page-wrapper">
   <div class="row">
      <div class="col-lg-12">
         <h1 class="page-header">Add Members to: <?=  $project[0]->title ?></h1>
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
         <form action="<?=base_url()?>project/add_researcher/" method="post">
            <input id="project_id" name="project_id" type="hidden" placeholder="ID" class="form-control input-md" value="<?= $project[0]->project_id;?>" required="true" readonly>
            <!-- Text input-->
            <div class="form-group">
               <label for="email">Member E-mail</label>
               <div >
                  <input id="email" name="email" type="text" placeholder="E-mail" class="form-control input-md" value="" required="true">
               </div>
            </div>
            <!-- Select Basic -->
            <div class="form-group">
               <label for="access_level">Access Level</label>
               <div>
                  <select id="access_level" name="access_level" class="form-control">
                     <option value="0">Staff</option>
                     <option value="1">Professor</option>
                  </select>
               </div>
            </div>
            <input id="add_researcher_submit" type="submit" value="Add Member" class="btn btn-lg btn-success btn-block">
         </form>
      </div>
      <!-- /.col-lg-12 -->
   </div>
   <!-- /.row -->
</div>
<?php $this->load->view('frame/footer_view')?>
