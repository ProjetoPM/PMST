<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header"> <?=$this->lang->line('human_resource-title')?></h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->

    <div class="row">
        <div class="col-lg-12">      
            <?php
              if($human_resources_mp == NULL){
            ?>

            <form method="POST" action="<?php echo base_url('human_resource/insert/'); ?><?php echo $id[0]; ?>">
              
              <input type="hidden" name="id" value="<?php echo $id[0];?>">

              <!-- Textarea -->
              <div class=" col-lg-12 form-group">
                <label for="roles_responsibilities"><?=$this->lang->line('human_resource-roles')?> *</label> 
                <a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?=$this->lang->line('human_resource-roles-tooltip')?>"><i class="glyphicon glyphicon-comment"></i></a>

                <div >                 
                  <textarea oninput="eylem(this, this.value)" class="form-control elasticteste" id="roles_responsibilities" name="roles_responsibilities" required="true"></textarea>  
                </div>
              </div>

              <!-- Inicio teste datas -->
              <div class="form-group">
                <div class="col-lg-6">
                  <div class="input-group">
                      <div class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                      </div>
                        <input class="form-control" id="startDate" placeholder="MM/DD/YYYY" type="text" />
                    </div>
                </div>
              </div>

              <div class="form-group">
                  <div class="col-lg-6">
                  <div class="input-group">
                      <div class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                      </div>
                        <input class="form-control" id="endDate" placeholder="MM/DD/YYYY" type="text" />
                    </div>
                </div>
              </div>

              <div class="form-group">
                  <div class="col-lg-12">
                  <div class="input-group">
                      <div class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                      </div>
                        <input class="form-control" id="dateNormal" placeholder="MM/DD/YYYY" type="text" />
                    </div>
                </div>
              </div>
              <!-- Fim teste Datas -->

              <!-- Textarea -->
              <div class="col-lg-6 form-group">
                <label for="organizational_chart"><?=$this->lang->line('human_resource-chart')?>
                </label>
                <a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?=$this->lang->line('human_resource-chart-tooltip')?>"><i class="glyphicon glyphicon-comment"></i></a>
                <div >     
                  <textarea oninput="eylem(this, this.value)" class="form-control elasticteste" id="organizational_chart" name="organizational_chart"></textarea>
                </div>
              </div>
            <!-- </nav> -->

              <!-- Textarea -->
              <div class=" col-lg-6 form-group">
                <label for="staff_mp"><?=$this->lang->line('human_resource-staff')?></label>
                <a class=" btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?=$this->lang->line('human_resource-staff-tooltip')?>"><i class="glyphicon glyphicon-comment"></i></a>
                <div>
                <textarea oninput="eylem(this, this.value)" class="form-control elasticteste" id="staff_mp" name="staff_mp"></textarea>             
                </div>
              </div>

              <div class="col-lg-12">
                <button id="new_human_resource-submit" type="submit" value="Save" class="btn btn-lg btn-success pull-right">
                    <i class="glyphicon glyphicon-ok"></i> <?=$this->lang->line('btn-save')?>
                </button> 
                </form>

                <form action="<?php echo base_url('project/'); ?><?php echo $id; ?>" >
                 <button class="btn btn-lg btn-info pull-left" >  <i class="glyphicon glyphicon-chevron-left"></i> <?=$this->lang->line('btn-back')?></button>
               </form>
              </div>
            <?php
              }else{

            ?>
            <form action="<?=base_url()?>human_resource/update/<?php echo $human_resources_mp[0]->human_resources_mp_id;?>" method="post">

            <input id="project_id" name="project_id" type="hidden" value="<?= $human_resources_mp[0]->project_id;?>">
            
              <!-- Textarea -->
              <div class=" col-lg-12 form-group">
                <label for="roles_responsibilities"><?=$this->lang->line('human_resource-roles')?> *</label> 
                <a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?=$this->lang->line('human_resource-roles-tooltip')?>"><i class="glyphicon glyphicon-comment"></i></a>

                <div >                 
                  <textarea oninput="eylem(this, this.value)" class="form-control elasticteste" id="roles_responsibilities" name="roles_responsibilities" required="true"><?= $human_resources_mp[0]->roles_responsibilities;?></textarea>  
                </div>
              </div>


            <!-- <nav class="textarea-right"> -->
              <!-- Textarea -->
              <div class="col-lg-6 form-group">
                <label for="organizational_chart"><?=$this->lang->line('human_resource-chart')?>
                </label>
                <a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?=$this->lang->line('human_resource-chart-tooltip')?>"><i class="glyphicon glyphicon-comment"></i></a>
                <div >     
                  <textarea oninput="eylem(this, this.value)" class="form-control elasticteste" id="organizational_chart" name="organizational_chart"><?= $human_resources_mp[0]->organizational_chart;?></textarea>
                </div>
              </div>
            <!-- </nav> -->

              <!-- Textarea -->
              <div class=" col-lg-6 form-group">
                <label for="staff_mp"><?=$this->lang->line('human_resource-staff')?></label>
                <a class=" btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?=$this->lang->line('human_resource-staff-tooltip')?>"><i class="glyphicon glyphicon-comment"></i></a>
                <div>
                <textarea oninput="eylem(this, this.value)" class="form-control elasticteste" id="staff_mp" name="staff_mp"><?= $human_resources_mp[0]->staff_mp;?></textarea>             
                </div>
              </div>

              <div class="col-lg-12">
                <button id="new_human_resource-submit" type="submit" value="Save" class="btn btn-lg btn-success pull-right">
                    <i class="glyphicon glyphicon-ok"></i> <?=$this->lang->line('btn-save')?>
                </button> 
              </form>

              <form action="<?php echo base_url('project/'); ?><?php echo $id; ?>" >
                <button class="btn btn-lg btn-info pull-left" >  <i class="glyphicon glyphicon-chevron-left"></i> <?=$this->lang->line('btn-back')?></button>
              </form>
                
              </div>

            
            <?php
            } 
        ?>
        </div>
        <!-- /.col-lg-6 -->
    </div>
    <!-- /.row -->
</div>


    <script type="text/javascript">
      
      //////////////////////////////////
      // Start Date & End Date
      //////////////////////////////////
      var currentDate = new Date();
      var today = new Date(currentDate.getFullYear(), currentDate.getMonth(), currentDate.getDate(), 0, 0, 0, 0);
      var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";

      var startDate = $("#startDate").datepicker({
        autoclose: true,
        format: 'mm/dd/yyyy',
        //language: 'pt-BR', //Idioma do Calendario
        container: container,
        keyboardNavigation: true,
        orientation: "bottom",
        todayHighlight : true,
        startDate: today,
      }).on('changeDate', function(ev) {
        var newDate = new Date(ev.date.setDate(ev.date.getDate() + 1));
        endDate.datepicker("setStartDate", newDate);
      });
      
      //Start Date Ends Here
      var endDate = $("#endDate").datepicker({
        autoclose: true,
        format: 'mm/dd/yyyy',
        //language: 'pt-BR', //Idioma do Calendario
        container: container,
        keyboardNavigation: true,
        orientation: "bottom",
        startDate: today,
        /*todayHighlight : true,*/
      });
      //End Date Ends Here

      // date sem validação
      var dateNormal = $("#dateNormal").datepicker({
        autoclose: true,
        format: 'mm/dd/yyyy',
        //language: 'pt-BR', //Idioma do Calendario
        container: container,
        keyboardNavigation: true,
        orientation: "bottom",
        todayHighlight : true,
        // startDate: today,
      });


    </script>

    <?php $this->load->view('frame/footer_view')?>