<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <!-- <h1 class="page-header"><?=$title?></h1> -->
            <h1 class="page-header"><?=$this->lang->line('title')?></h1>
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
                <div class="col-lg-12 form-group">
                  <label for="title"><?=$this->lang->line('project-title')?> *</label>  
                  <a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?=$this->lang->line('project-title-tooltip')?>"><i class="glyphicon glyphicon-comment"></i></a>
                  <div >
                  <input id="title" name="title" type="text" class="form-control input-md" required="true">
                  <!-- <input id="title" name="title" type="text" placeholder="Title" class="form-control input-md" required="true"> -->
                    
                  </div>
                </div>

                <!-- Textarea -->
                <div class="col-lg-6 form-group">
                  <label for="description"><?=$this->lang->line('project-description')?></label>
                  <a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?=$this->lang->line('project-description-tooltip')?>"><i class="glyphicon glyphicon-comment"></i></a>
                  <div >                     
                    <textarea oninput="eylem(this, this.value)" class="form-control elasticteste" id="description" name="description"></textarea>
                  </div>
                </div>

                <!-- Textarea -->
                <div class="col-lg-6 form-group">
                  <label for="objectives"><?=$this->lang->line('project-objectives')?></label>
                  <a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?=$this->lang->line('project-objectives-tooltip')?>"><i class="glyphicon glyphicon-comment"></i></a>
                  <div >                     
                    <textarea oninput="eylem(this, this.value)" class="form-control elasticteste" id="objectives" name="objectives"></textarea>
                  </div>
                </div>
  
                <div class="col-lg-12">
                  <button id="new_project-submit" type="submit" value="Create" class="btn btn-lg btn-success pull-right">
                    <i class="glyphicon glyphicon-ok"></i> <?=$this->lang->line('btn-save')?>
                 </button> 
              </form>
              <form action="<?php echo base_url('projects/'); ?>" >
                <button class="btn btn-lg btn-info pull-left" >  <i class="glyphicon glyphicon-chevron-left"></i> <?=$this->lang->line('btn-back')?></button>
              </form>
              </div>
              </form>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
</div>
<?php $this->load->view('frame/footer_view')?>