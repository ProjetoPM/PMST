<div id="page-wrapper">
  <div class="row">
    <div class="col-lg-12">
      <h1 class="page-header"><?=$this->lang->line('procurement_mp')?></h1>
    </div>
    <!-- /.col-lg-12 -->
  </div>
  <!-- JavaScript -->
  <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.11.2/build/alertify.min.js"></script>
  <!-- CSS -->
  <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.11.2/build/css/alertify.min.css"/>

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
        if($procurement_mp == null){
          ?>

          <form method="POST" action="<?php echo base_url('Procurement/insert/'); ?>">

           <input type="hidden" name="project_id"  value="<?php echo $project[0]->project_id; ?>">
           <input type="hidden" name="status" value="1">

            <!-- Textarea -->
            <div class="form-group">
              <label for="products_services_obtained"><?=$this->lang->line('products_services_obtained')?></label>
              <a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?=$this->lang->line('products_services_obtained-tooltip')?>"><i class="glyphicon glyphicon-comment"></i></a>
              <div >
                <textarea oninput="eylem(this, this.value)" class="form-control elasticteste" id="products_services_obtained" name="products_services_obtained" ></textarea>
              </div>
            </div>

            <div class="form-group">
              <label for="procurement_management"><?=$this->lang->line('procurement_management')?></label>
              <a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?=$this->lang->line('procurement_management-tooltip')?>"><i class="glyphicon glyphicon-comment"></i></a>
              <div >
                <textarea oninput="eylem(this, this.value)" class="form-control elasticteste" id="procurement_management" name="procurement_management" ></textarea>
              </div>
            </div>

            <div class="form-group">
              <label for="schedule_procurement_activities"><?=$this->lang->line('schedule_procurement_activities')?></label>
              <a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?=$this->lang->line('schedule_procurement_activities-tooltip')?>"><i class="glyphicon glyphicon-comment"></i></a>
              <div >
                <textarea oninput="eylem(this, this.value)" class="form-control elasticteste" id="schedule_procurement_activities" name="schedule_procurement_activities" ></textarea>
              </div>
            </div>

            <div class="form-group">
              <label for="performance_metrics"><?=$this->lang->line('performance_metrics')?></label>
              <a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?=$this->lang->line('performance_metrics-tooltip')?>"><i class="glyphicon glyphicon-comment"></i></a>
              <div >
                <textarea oninput="eylem(this, this.value)" class="form-control elasticteste" id="performance_metrics" name="performance_metrics" ></textarea>
              </div>
            </div>

            <div class="form-group">
              <label for="functions"><?=$this->lang->line('functions')?></label>
              <a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?=$this->lang->line('functions-tooltip')?>"><i class="glyphicon glyphicon-comment"></i></a>
              <div >
                <textarea oninput="eylem(this, this.value)" class="form-control elasticteste" id="functions" name="functions" ></textarea>
              </div>
            </div>

            <div class="form-group">
              <label for="restriction"><?=$this->lang->line('restriction')?></label>
              <a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?=$this->lang->line('restriction-tooltip')?>"><i class="glyphicon glyphicon-comment"></i></a>
              <div >
                <textarea oninput="eylem(this, this.value)" class="form-control elasticteste" id="restriction" name="restriction" ></textarea>
              </div>
            </div>

            <div class="form-group">
              <label for="premises"><?=$this->lang->line('premises')?></label>
              <a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?=$this->lang->line('premises-tooltip')?>"><i class="glyphicon glyphicon-comment"></i></a>
              <div >
                <textarea oninput="eylem(this, this.value)" class="form-control elasticteste" id="premises" name="premises" ></textarea>
              </div>
            </div>

            <div class="form-group">
              <label for="coins"><?=$this->lang->line('coins')?></label>
              <a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?=$this->lang->line('coins-tooltip')?>"><i class="glyphicon glyphicon-comment"></i></a>
              <div >
                <textarea oninput="eylem(this, this.value)" class="form-control elasticteste" id="coins" name="coins" ></textarea>
              </div>
            </div>

            <div class="form-group">
              <label for="independent_estimates"><?=$this->lang->line('independent_estimates')?></label>
              <a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?=$this->lang->line('independent_estimates-tooltip')?>"><i class="glyphicon glyphicon-comment"></i></a>
              <div >
                <textarea oninput="eylem(this, this.value)" class="form-control elasticteste" id="independent_estimates" name="independent_estimates" ></textarea>
              </div>
            </div>

            <div class="form-group">
              <label for="risk_issues"><?=$this->lang->line('risk_issues')?></label>
              <a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?=$this->lang->line('independent_estimates-tooltip')?>"><i class="glyphicon glyphicon-comment"></i></a>
              <div >
                <textarea oninput="eylem(this, this.value)" class="form-control elasticteste" id="risk_issues" name="risk_issues"></textarea>
              </div>
            </div>

            <div class="form-group">
              <label for="sellers"><?=$this->lang->line('sellers')?></label>
              <a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?=$this->lang->line('sellers-tooltip')?>"><i class="glyphicon glyphicon-comment"></i></a>
              <div >
                <textarea oninput="eylem(this, this.value)" class="form-control elasticteste" id="sellers" name="sellers"></textarea>
              </div>
            </div>

            <div class="form-group">
              <label for="procurement_strategy"><?=$this->lang->line('procurement_strategy')?></label>
              <a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?=$this->lang->line('procurement_strategy-tooltip')?>"><i class="glyphicon glyphicon-comment"></i></a>
              <div >
                <textarea oninput="eylem(this, this.value)" class="form-control elasticteste" id="procurement_strategy" name="procurement_strategy"></textarea>
              </div>
            </div>

            <div class="col-lg-12 form-group">
              <label><?=$this->lang->line('communication')?></label><br>
              <a href="<?= base_url()?>Communication_item/listp/<?=$id?>"><?=$this->lang->line('communication_link')?></a>
            </div>

            <div class="col-lg-12 form-group">
              <label><?=$this->lang->line('change')?></label><br>
              <a href="<?= base_url()?>ProjectManagement/newp/<?=$id?>"><?=$this->lang->line('change_link')?></a>
            </div>

            <div class="col-lg-12 form-group">
              <label><?=$this->lang->line('configuration')?></label><br>
              <a href="<?= base_url()?>ProjectManagement/newp/<?=$id?>"><?=$this->lang->line('configuration_link')?></a>
            </div>

            <div class="col-lg-12">
              <button id="procurement_mp-submit" type="submit" value="Save" class="btn btn-lg btn-success pull-right">
                <i class="glyphicon glyphicon-ok"></i> <?=$this->lang->line('btn-save')?>
              </button>
            </form>

            <form action="<?php echo base_url('project/'); ?><?php echo $id; ?>" >
              <button class="btn btn-lg btn-info pull-left" >  <i class="glyphicon glyphicon-chevron-left"></i> <?=$this->lang->line('btn-back')?></button>
            </form>
          </div>

          <?php
         } else {
          foreach($procurement_mp as $pmp){
            ?>

            <form method="POST" action="<?php echo base_url('Procurement/update/');?><?php echo $id; ?>">
              <input type="hidden" name="status" value="1">

            <div class="form-group">
              <label for="products_services_obtained"><?=$this->lang->line('products_services_obtained')?></label>
              <a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?=$this->lang->line('products_services_obtained-tp')?>"><i class="glyphicon glyphicon-comment"></i></a>
              <div >
                <textarea oninput="eylem(this, this.value)" class="form-control elasticteste" id="products_services_obtained" name="products_services_obtained"><?php echo $pmp->products_services_obtained; ?></textarea>
              </div>
            </div>

            <div class="form-group">
              <label for="procurement_management"><?=$this->lang->line('procurement_management')?></label>
              <a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?=$this->lang->line('procurement_management-tooltip')?>"><i class="glyphicon glyphicon-comment"></i></a>
              <div >
                <textarea oninput="eylem(this, this.value)" class="form-control elasticteste" id="procurement_management" name="procurement_management" ><?php echo $pmp->procurement_management; ?></textarea>
              </div>
            </div>

            <div class="form-group">
              <label for="schedule_procurement_activities"><?=$this->lang->line('schedule_procurement_activities')?></label>
              <a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?=$this->lang->line('schedule_procurement_activities-tooltip')?>"><i class="glyphicon glyphicon-comment"></i></a>
              <div >
                <textarea oninput="eylem(this, this.value)" class="form-control elasticteste" id="schedule_procurement_activities" name="schedule_procurement_activities" ><?php echo $pmp->schedule_procurement_activities; ?></textarea>
              </div>
            </div>

            <div class="form-group">
              <label for="performance_metrics"><?=$this->lang->line('performance_metrics')?></label>
              <a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?=$this->lang->line('performance_metrics-tooltip')?>"><i class="glyphicon glyphicon-comment"></i></a>
              <div >
                <textarea oninput="eylem(this, this.value)" class="form-control elasticteste" id="performance_metrics" name="performance_metrics" ><?php echo $pmp->performance_metrics; ?></textarea>
              </div>
            </div>

            <div class="form-group">
              <label for="functions"><?=$this->lang->line('functions')?></label>
              <a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?=$this->lang->line('functions-tooltip')?>"><i class="glyphicon glyphicon-comment"></i></a>
              <div >
                <textarea oninput="eylem(this, this.value)" class="form-control elasticteste" id="functions" name="functions" ><?php echo $pmp->functions; ?></textarea>
              </div>
            </div>

            <div class="form-group">
              <label for="restriction"><?=$this->lang->line('restriction')?></label>
              <a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?=$this->lang->line('restriction-tooltip')?>"><i class="glyphicon glyphicon-comment"></i></a>
              <div >
                <textarea oninput="eylem(this, this.value)" class="form-control elasticteste" id="restriction" name="restriction" ><?php echo $pmp->restriction; ?></textarea>
              </div>
            </div>

            <div class="form-group">
              <label for="premises"><?=$this->lang->line('premises')?></label>
              <a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?=$this->lang->line('premises-tooltip')?>"><i class="glyphicon glyphicon-comment"></i></a>
              <div >
                <textarea oninput="eylem(this, this.value)" class="form-control elasticteste" id="premises" name="premises" ><?php echo $pmp->premises; ?></textarea>
              </div>
            </div>

            <div class="form-group">
              <label for="coins"><?=$this->lang->line('coins')?></label>
              <a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?=$this->lang->line('coins-tooltip')?>"><i class="glyphicon glyphicon-comment"></i></a>
              <div >
                <textarea oninput="eylem(this, this.value)" class="form-control elasticteste" id="coins" name="coins" ><?php echo $pmp->coins; ?></textarea>
              </div>
            </div>

            <div class="form-group">
              <label for="independent_estimates"><?=$this->lang->line('independent_estimates')?></label>
              <a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?=$this->lang->line('independent_estimates-tooltip')?>"><i class="glyphicon glyphicon-comment"></i></a>
              <div >
                <textarea oninput="eylem(this, this.value)" class="form-control elasticteste" id="independent_estimates" name="independent_estimates" ><?php echo $pmp->independent_estimates; ?></textarea>
              </div>
            </div>

            <div class="form-group">
              <label for="risk_issues"><?=$this->lang->line('risk_issues')?></label>
              <a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?=$this->lang->line('independent_estimates-tooltip')?>"><i class="glyphicon glyphicon-comment"></i></a>
              <div >
                <textarea oninput="eylem(this, this.value)" class="form-control elasticteste" id="risk_issues" name="risk_issues"><?php echo $pmp->risk_issues; ?></textarea>
              </div>
            </div>

            <div class="form-group">
              <label for="sellers"><?=$this->lang->line('sellers')?></label>
              <a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?=$this->lang->line('sellers-tooltip')?>"><i class="glyphicon glyphicon-comment"></i></a>
              <div >
                <textarea oninput="eylem(this, this.value)" class="form-control elasticteste" id="sellers" name="sellers"><?php echo $pmp->sellers; ?></textarea>
              </div>
            </div>

            <div class="form-group">
              <label for="procurement_strategy"><?=$this->lang->line('procurement_strategy')?></label>
              <a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?=$this->lang->line('procurement_strategy-tooltip')?>"><i class="glyphicon glyphicon-comment"></i></a>
              <div >
                <textarea oninput="eylem(this, this.value)" class="form-control elasticteste" id="procurement_strategy" name="procurement_strategy"><?php echo $pmp->procurement_strategy; ?></textarea>
              </div>
            </div>



            <div class="col-lg-12 form-group">
              <label><?=$this->lang->line('communication')?></label><br>
              <a href="<?= base_url()?>Communication_item/listp/<?=$id?>"><?=$this->lang->line('communication_link')?></a>
            </div>

            <div class="col-lg-12 form-group">
              <label><?=$this->lang->line('change')?></label><br>
              <a href="<?= base_url()?>ProjectManagement/newp/<?=$id?>"><?=$this->lang->line('change_link')?></a>
            </div>

            <div class="col-lg-12 form-group">
              <label><?=$this->lang->line('configuration')?></label><br>
              <a href="<?= base_url()?>ProjectManagement/newp/<?=$id?>"><?=$this->lang->line('configuration_link')?></a>
            </div>

            <div>

              <div class="col-lg-12">
                <button id="submit" type="submit" value="Save" class="btn btn-lg btn-success pull-right">
                  <i class="glyphicon glyphicon-ok"></i> <?=$this->lang->line('btn-save')?>
                </button>
              </form>

              <form action="<?php echo base_url('project/'); ?><?php echo $id; ?>" >
                <button class="btn btn-lg btn-info pull-left" >  <i class="glyphicon glyphicon-chevron-left"></i> <?=$this->lang->line('btn-back')?></button>
              </form>
            </div>
            <?php
          }
        }
          ?>
          <!-- AQUI VAI FINALIZAR A VIEW DO GERENCIAMENTO DE RISCOS!!!! -->
        </div>
        <!-- /.row -->
        <!-- Envia o nome da view como parametro -->
        <?php $view = array(
          "name" => "procurement_management_plan",
        ); ?>

        <!--aqui-->

        <!--Carrega o form de envio-->
        <?php $this->load->view('upload/index', $view) ?>
        <!--Carrega as imagens do projeto-->
        <?php $this->load->view('upload/retrieve', $view) ?>

      </div>
    </div>


    <?php $this->load->view('frame/footer_view')?>
