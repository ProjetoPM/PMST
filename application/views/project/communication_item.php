<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Projects</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>

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
            <!-- /.row -->          
        <div class="row">
        <div class="col-lg-6">
          <?php
                if($communication_item != NULL){
                  //var_dump($project_id);
                  //die();
            ?>
            <form action="<?=base_url()?>communication_item/update/<?php echo $communication_item[0]->communication_item_id;?>" method="post">
            	<input type="hidden" name="project_id" value="<?php echo $project_id[0];?>">
                <!-- Textarea -->
                <div class="form-group">
                  <label for="type">Type</label>
                  <div >                     
                    <textarea class="form-control" id="type" name="type" maxlength="45"><?php echo $communication_item[0]->type?></textarea>
                  </div>
                </div>

                <!-- Textarea -->
                <div class="form-group">
                  <label for="description">Description</label>
                  <div >                     
                    <textarea class="form-control" id="description" name="description" maxlength="45"><?php echo $communication_item[0]->description?></textarea>
                  </div>
                </div>
                <div class="form-group">
                  <label for="content">Content</label>
                  <div>                     
                    <textarea class="form-control" id="content" name="content" maxlength="255"><?php echo $communication_item[0]->content?></textarea>
                  </div>
                </div>
                <div class="form-group">
                  <label for="distribution_reason">Distribution Reason</label>
                  <div>                     
                    <textarea class="form-control" id="distribution_reason" name="distribution_reason" maxlength="255"><?php echo $communication_item[0]->distribution_reason?></textarea>
                  </div>
                </div>
                <div class="form-group">
                  <label for="language">Language</label>
                  <div>                     
                    <textarea class="form-control" id="language" name="language" maxlength="45"><?php echo $communication_item[0]->language?></textarea>
                  </div>
                </div>
                <div class="form-group">
                  <label for="channel">Channel</label>
                  <div>                     
                    <textarea class="form-control" id="channel" name="channel" maxlength="45"><?php echo $communication_item[0]->channel?></textarea>
                  </div>
                </div>
                <div class="form-group">
                  <label for="documento_format">Documento Format</label>
                  <div>                     
                    <textarea class="form-control" id="documento_format" name="documento_format" maxlength="45"><?php echo $communication_item[0]->documento_format?></textarea>
                  </div>
                </div>
                <div class="form-group">
                  <label for="metod">Metod</label>
                  <div>                     
                    <textarea class="form-control" id="metod" name="metod" maxlength="45"><?php echo $communication_item[0]->metod?></textarea>
                  </div>
                </div>
                <div class="form-group">
                  <label for="frequency">Frequency</label>
                  <div>                     
                    <textarea class="form-control" id="frequency" name="frequency" maxlength="45"><?php echo $communication_item[0]->frequency?></textarea>
                  </div>
                </div>
                <div class="form-group">
                  <label for="allocated_resources">Allocated Resources</label>
                  <div>                     
                    <textarea class="form-control" id="allocated_resources" name="allocated_resources" maxlength="45"><?php echo $communication_item[0]->allocated_resources?></textarea>
                  </div>
                </div>
                 <div class="form-group">
                  <label for="format">Format</label>
                  <div>                     
                    <textarea class="form-control" id="format" name="format" maxlength="45"><?php echo $communication_item[0]->format?></textarea>
                  </div>
                </div>
                 <div class="form-group">
                  <label for="local">local</label>
                  <div>                     
                    <textarea class="form-control" id="local" name="local" maxlength="45"><?php echo $communication_item[0]->local?></textarea>
                  </div>
                </div>
                <div class="form-group">
                   <label>Status:</label> <br></br>
                    <?php if($communication_item[0]->status == 1){?>
                      <input type="radio" checked name="status" value="1">
                      <label>On</label><br>
                      <input type="radio" name="status" value="0">
                      <label>Off</label>
                   <?php
                    }else{
                  ?>
                      <input type="radio" checked name="status" value="1">
                      <label>On</label><br>
                      <input type="radio" name="status" value="0">
                      <label>Off</label>
                    <?php
                      }
                  ?>
              </div>
               	<input id="risk-submit" type="submit" value="Save" class="btn btn-lg btn-success btn-block">
              </form>
              <?php
                }else{
              ?>
                <form action="<?=base_url()?>communication_item/insert/" method="post">
              <input type="hidden" name="project_id" value="<?php echo $project_id[0];?>">
                <!-- Textarea -->
                <div class="form-group">
                  <label for="type">Type</label>
                  <div >                     
                    <textarea class="form-control" id="type" placeholder="Type" name="type" maxlength="45"></textarea>
                  </div>
                </div>

                <!-- Textarea -->
                <div class="form-group">
                  <label for="description">Description</label>
                  <div >                     
                    <textarea class="form-control" id="description" placeholder="Description" name="description" maxlength="45"></textarea>
                  </div>
                </div>
                <div class="form-group">
                  <label for="content">Content</label>
                  <div>                     
                    <textarea class="form-control" id="content" placeholder="Content" name="content" maxlength="255"></textarea>
                  </div>
                </div>
                <div class="form-group">
                  <label for="distribution_reason">Distribution Reason</label>
                  <div>                     
                    <textarea class="form-control" id="distribution_reason" placeholder="Distribution Reason" name="distribution_reason" maxlength="255"></textarea>
                  </div>
                </div>
                <div class="form-group">
                  <label for="language">Language</label>
                  <div>                     
                    <textarea class="form-control" id="language" placeholder="Language" name="language" maxlength="45"></textarea>
                  </div>
                </div>
                <div class="form-group">
                  <label for="channel">Channel</label>
                  <div>                     
                    <textarea class="form-control" id="channel" placeholder="Channel" name="channel" maxlength="45"></textarea>
                  </div>
                </div>
                <div class="form-group">
                  <label for="documento_format">Document Format</label>
                  <div>                     
                    <textarea class="form-control" id="documento_format" placeholder="Document Format" name="documento_format" maxlength="45"></textarea>
                  </div>
                </div>
                <div class="form-group">
                  <label for="metod">Metod</label>
                  <div>                     
                    <textarea class="form-control" id="metod" placeholder="Method" name="metod" maxlength="45"></textarea>
                  </div>
                </div>
                <div class="form-group">
                  <label for="frequency">Frequency</label>
                  <div>                     
                    <textarea class="form-control" id="frequency" placeholder="Frequency" name="frequency" maxlength="45"></textarea>
                  </div>
                </div>
                <div class="form-group">
                  <label for="allocated_resources">Allocated Resources</label>
                  <div>                     
                    <textarea class="form-control" id="allocated_resources" placeholder="Allocated Resources" name="allocated_resources" maxlength="45"></textarea>
                  </div>
                </div>
                 <div class="form-group">
                  <label for="format">Format</label>
                  <div>                     
                    <textarea class="form-control" id="format" placeholder="Format" name="format" maxlength="45"></textarea>
                  </div>
                </div>
                 <div class="form-group">
                  <label for="local">Local</label>
                  <div>                     
                    <textarea class="form-control" id="local" placeholder="Local" name="local" maxlength="45"></textarea>
                  </div>
                </div>
                <div class="form-group">
                   <label>Status:</label> <br></br>
                      <input type="radio" name="status" value="1">
                      <label>On</label><br>
                      <input type="radio" name="status" value="0">
                      <label>Off</label>
              </div>
                <input id="risk-submit" type="submit" value="Save" class="btn btn-lg btn-success btn-block">
              </form>
              <?php
                }
              ?>
<!-- AQUI VAI FINALIZAR A VIEW DO GERENCIAMENTO DE RISCOS!!!! -->
</div>
<div class="col-lg-6">
    <div class="dropdown">
    <button class="btn btn-secondary btn-lg dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    Dropdown button
    </button>
  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
    <a class="dropdown-item" href="#">Action</a>
    <a class="dropdown-item" href="#">Another action</a>
    <a class="dropdown-item" href="#">Something else here</a>
  </div>
</div>
</div>
<!-- /.row -->
</div>
</div>
<?php $this->load->view('frame/footer_view')?>            
