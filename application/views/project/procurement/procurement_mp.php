<div id="page-wrapper">
  <div class="row">
    <div class="col-lg-12">
      <h1 class="page-header"><?=$this->lang->line('procuremente_mp')?></h1>
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
      <div class="col-lg-12">
        <?php
        if($procurement_mp != NULL){
                  //var_dump($project_id);
                  //die();
          ?>
          <form action="<?=base_url()?>procurement/update/<?php echo $procurement_mp[0]->procurement_mp_id;?>" method="post">
            <input type="hidden" name="project_id" value="<?php echo $project_id[0];?>">

            <!-- Textarea -->

            <div class=" col-lg-12 form-group">
              <label for="products_services_obtained"><?=$this->lang->line('products_services_obtained')?> *</label> 
              <a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?=$this->lang->line('products_services_obtained-tooltip')?>"><i class="glyphicon glyphicon-comment"></i></a>

              <div >                 
                <textarea oninput="eylem(this, this.value)" class="form-control elasticteste" id="products_services_obtained" name="products_services_obtained" required="true" maxlength="4000"><?php echo $procurement_mp[0]->products_services_obtained?></textarea>
              </div>
            </div>


            <!-- Textarea -->
            <div class=" col-lg-12 form-group">
              <label for="team_actions"><?=$this->lang->line('team_actions')?></label> 
              <a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?=$this->lang->line('team_actions-tooltip')?>"><i class="glyphicon glyphicon-comment"></i></a>

              <div >                 
                <textarea oninput="eylem(this, this.value)" class="form-control elasticteste" id="team_actions" name="team_actions" maxlength="4000"><?php echo $procurement_mp[0]->team_actions?></textarea>
              </div>
            </div>

            <div class=" col-lg-12 form-group">
              <label for="performance_metrics"><?=$this->lang->line('performance_metrics')?></label> 
              <a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?=$this->lang->line('performance_metrics-tooltip')?>"><i class="glyphicon glyphicon-comment"></i></a>

              <div>                 
                <textarea oninput="eylem(this, this.value)" class="form-control elasticteste" id="performance_metrics" name="performance_metrics" maxlength="4000"><?php echo $procurement_mp[0]->performance_metrics?></textarea>
              </div>
            </div>

            <div class=" col-lg-12 form-group">
              <label for="procurement_management"><?=$this->lang->line('procurement_management')?></label> 
              <a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?=$this->lang->line('procurement_management-tooltip')?>"><i class="glyphicon glyphicon-comment"></i></a>

              <div>                 
                <textarea oninput="eylem(this, this.value)" class="form-control elasticteste" id="procurement_management" name="procurement_management" maxlength="4000"><?php echo $procurement_mp[0]->procurement_management?></textarea>
              </div>
            </div>

            <div class="col-lg-12 form-group">
              <label><?=$this->lang->line('communication')?></label><br>
              <a href="<?= base_url()?>Communication_item/list/<?=$project_id?>"><?=$this->lang->line('communication_link')?></a>
            </div>
            
            <div class="col-lg-12 form-group">
              <label><?=$this->lang->line('change')?></label><br>
              <a href="<?= base_url()?>Communication_item/list/<?=$project_id?>"><?=$this->lang->line('change_link')?></a>
            </div>

            <div class="col-lg-12 form-group">
              <label><?=$this->lang->line('configuration')?></label><br>
              <a href="<?= base_url()?>Communication_item/list/<?=$project_id?>"><?=$this->lang->line('configuration_link')?></a>
            </div>

            <div class="col-lg-12">
              <button id="procurement_mp-submit" type="submit" value="Save" class="btn btn-lg btn-success pull-right">
                <i class="glyphicon glyphicon-ok"></i> <?=$this->lang->line('btn-save')?>
              </button> 
            </form>

            <form action="<?php echo base_url('project/'); ?><?php echo $project_id; ?>" >
              <button class="btn btn-lg btn-info pull-left" >  <i class="glyphicon glyphicon-chevron-left"></i> <?=$this->lang->line('btn-back')?></button>
            </form>
          </div>
          <?php
        }else{
          ?>
          <form action="<?=base_url()?>procurement/insert/" method="post">
            <input type="hidden" name="project_id" value="<?php echo $project_id[0];?>">
            <!-- Textarea -->
            <div class=" col-lg-12 form-group">
              <label for="products_services_obtained"><?=$this->lang->line('products_services_obtained')?> *</label> 
              <a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?=$this->lang->line('products_services_obtained-tooltip')?>"><i class="glyphicon glyphicon-comment"></i></a>

              <div >                 
                <textarea oninput="eylem(this, this.value)" class="form-control elasticteste" id="products_services_obtained" name="products_services_obtained" required="true" maxlength="4000"></textarea>
              </div>
            </div>

            <!-- Textarea -->
            <div class=" col-lg-12 form-group">
              <label for="team_actions"><?=$this->lang->line('team_actions')?></label> 
              <a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?=$this->lang->line('team_actions-tooltip')?>"><i class="glyphicon glyphicon-comment"></i></a>

              <div>                 
                <textarea oninput="eylem(this, this.value)" class="form-control elasticteste" id="team_actions" name="team_actions" maxlength="4000"></textarea>
              </div>
            </div>

            <div class=" col-lg-12 form-group">
              <label for="performance_metrics"><?=$this->lang->line('performance_metrics')?></label> 
              <a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?=$this->lang->line('performance_metrics-tooltip')?>"><i class="glyphicon glyphicon-comment"></i></a>

              <div>                 
                <textarea oninput="eylem(this, this.value)" class="form-control elasticteste" id="performance_metrics" name="performance_metrics" maxlength="4000"></textarea>
              </div>
            </div>

            <div class=" col-lg-12 form-group">
              <label for="procurement_management"><?=$this->lang->line('procurement_management')?></label> 
              <a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?=$this->lang->line('procurement_management-tooltip')?>"><i class="glyphicon glyphicon-comment"></i></a>

              <div>                 
                <textarea oninput="eylem(this, this.value)" class="form-control elasticteste" id="procurement_management" name="procurement_management" maxlength="4000"></textarea>
              </div>
            </div>

            <div class="col-lg-12 form-group">
              <label><?=$this->lang->line('communication')?></label><br>
              <a href="<?= base_url()?>Communication_item/list/<?=$project_id?>"><?=$this->lang->line('communication_link')?></a>
            </div>
            
            <div class="col-lg-12 form-group">
              <label><?=$this->lang->line('change')?></label><br>
              <a href="<?= base_url()?>Communication_item/list/<?=$project_id?>"><?=$this->lang->line('change_link')?></a>
            </div>

            <div class="col-lg-12 form-group">
              <label><?=$this->lang->line('configuration')?></label><br>
              <a href="<?= base_url()?>Communication_item/list/<?=$project_id?>"><?=$this->lang->line('configuration_link')?></a>
            </div>

            <div>

              <div class="col-lg-12">
                <button id="submit" type="submit" value="Save" class="btn btn-lg btn-success pull-right">
                  <i class="glyphicon glyphicon-ok"></i> <?=$this->lang->line('btn-save')?>
                </button> 
              </form>

              <form action="<?php echo base_url('project/'); ?><?php echo $project_id; ?>" >
                <button class="btn btn-lg btn-info pull-left" >  <i class="glyphicon glyphicon-chevron-left"></i> <?=$this->lang->line('btn-back')?></button>
              </form>
            </div>
            <?php
          }
          ?>
          <!-- AQUI VAI FINALIZAR A VIEW DO GERENCIAMENTO DE RISCOS!!!! -->
        </div>
        <!-- /.row -->
      </div>
    </div>
    <?php $this->load->view('frame/footer_view')?>            
