<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header"><?=$title?></h1>
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
            
            <form action="<?=base_url()?>project/add_project/" method="post">
                

                <!-- Text input-->
                <div class="form-group">
                  <label for="title">Title</label>  
                  <div >
                  <input id="title" name="title" type="text" placeholder="Title" class="form-control input-md" required="true">
                    
                  </div>
                </div>

                <!-- Textarea -->
                <div class="form-group">
                  <label for="description">Description</label>
                  <div >                     
                    <textarea class="form-control" id="description" name="description"></textarea>
                  </div>
                </div>

                <!-- Textarea -->
                <div class="form-group">
                  <label for="objectives">Objectives</label>
                  <div >                     
                    <textarea class="form-control" id="objectives" name="objectives"></textarea>
                  </div>
                </div>
                <input id="new_project-submit" type="submit" value="Create" class="btn btn-lg btn-success btn-block">

                
            </form>


        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
</div>
<?php $this->load->view('frame/footer_view')?>