<link href="<?=base_url()?>assets/css/show_project_page_card.css" rel="stylesheet">
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

<!-- lorem ipsum -->
<div class="row">
   <div class="col-md-12">
      <div class="panel panel-default">
         <div class="panel-heading">
            <h3 class="panel-title">
               <strong><?=$this->lang->line('phases')?> <!-- <a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="Definir"><i class="glyphicon glyphicon-comment"></i></a> --></strong>
            </h3>
         </div>
         <div class="panel-body text-justify">
            <div class="panel-body text-center">

               <div class="col-lg-12 wrapper noSpaceSide">  
                <div class="noSpaceSide"> 

                  <div class="col-lg-1 transparentBox"></div>

                  <div class="col-lg-10 noSpaceSide floatRight">
                    <div class=" col-lg-1 menuBox hideBox">
                      <?=$this->lang->line('initiating')?>
                    </div>
                    
                    <div class=" col-lg-1 menuBox planningBox hideBox">
                      <?=$this->lang->line('planning')?>
                    </div>

                    <div class=" col-lg-1 menuBox hideBox">
                      <?=$this->lang->line('executing')?>
                    </div>
                  
                    <div class=" col-lg-1 menuBox hideBox">
                      <?=$this->lang->line('monitoring-controlling')?>
                    </div>
                  
                    <div class=" col-lg-1 menuBox hideBox">
                      <?=$this->lang->line('closing')?>
                    </div>
                  </div>
                  <!--  -->
                </div>
              </div> <!-- End Header Phases -->

              <div class="col-lg-12 wrapper noSpaceSide">  
                <div class="noSpaceSide"> 
                  <div class="col-lg-1 sideBox integrationBox integrationColor">
                    <i class="glyphicon glyphicon-star"></i> 
                    <?=$this->lang->line('integration')?>
                  </div>

                  <div class="col-lg-10 noSpaceSide floatRight">
                    <a  href="<?=base_url("Tap/addTap/".$project[0]->project_id) ?>">
                      <div class=" col-lg-1 midBox integrationColor">
                        <i class="glyphicon glyphicon-star"></i> 
                        <?=$this->lang->line('project-charter')?>
                      </div>
                    </a>

                    <a  href="<?=base_url("CONTROLER/METODO/".$project[0]->project_id) ?>">
                      <div class=" col-lg-1 midBox integrationColor">
                        <i class="glyphicon glyphicon-star"></i> 
                        <?=$this->lang->line('project-management')?>
                      </div>
                    </a>
                    
                    
                    <div class=" col-lg-1 midBox integrationColor hideBox"></div>
                    
                    <div class=" col-lg-1 midBox integrationColor hideBox"></div>

                    <a  href="<?=base_url("Tap/addTap/".$project[0]->project_id) ?>">
                      <div class=" col-lg-1 midBox integrationColor">
                        <i class="glyphicon glyphicon-star"></i> 
                        <?=$this->lang->line('project-status')?>
                      </div>
                    </a>

                    <a  href="<?=base_url("Tap/addTap/".$project[0]->project_id) ?>">
                      <div class=" col-lg-1 midBox integrationColor">
                        <i class="glyphicon glyphicon-star"></i> 
                        <?=$this->lang->line('change-request')?>
                      </div>
                    </a>

                    <a href="<?=base_url("TEP/addnew/".$project[0]->project_id) ?>">
                      <div class=" col-lg-1 midBox integrationColor">
                        <i class="glyphicon glyphicon-star"></i> 
                        <?=$this->lang->line('lessons-learned')?>
                      </div>
                    </a>
                  </div>
                  <!--  -->
                  <div class="col-lg-10 noSpaceSide floatRight">

                    <div class=" col-lg-1 midBox integrationColor hideBox"></div>
                    
                    <div class=" col-lg-1 midBox integrationColor hideBox"></div>

                    <div class=" col-lg-1 midBox integrationColor hideBox"></div>
                    
                    <div class=" col-lg-1 midBox integrationColor hideBox"></div>

                    <a  href="<?=base_url("CONTROLER/METODO/".$project[0]->project_id) ?>">
                      <div class=" col-lg-1 midBox integrationColor">
                        <i class="glyphicon glyphicon-star"></i> 
                        <?=$this->lang->line('deliverables-status')?>
                      </div>
                    </a>

                    <a  href="<?=base_url("CONTROLER/METODO/".$project[0]->project_id) ?>">
                      <div class=" col-lg-1 midBox integrationColor">
                        <i class="glyphicon glyphicon-star"></i> 
                        <?=$this->lang->line('change-log')?>
                      </div>
                    </a>

                    <div class=" col-lg-1 midBox integrationColor hideBox"></div>

                  </div>
                  <!--  -->
                  <div class="col-lg-10 noSpaceSide floatRight">

                    <div class=" col-lg-1 midBox integrationColor hideBox"></div>
                    
                    <div class=" col-lg-1 midBox integrationColor hideBox"></div>

                    <div class=" col-lg-1 midBox integrationColor hideBox"></div>
                    
                    <div class=" col-lg-1 midBox integrationColor hideBox"></div>

                    <a  href="<?=base_url("CONTROLER/METODO/".$project[0]->project_id) ?>">
                      <div class=" col-lg-1 midBox integrationColor">
                        <i class="glyphicon glyphicon-star"></i> 
                        <?=$this->lang->line('change-request')?>
                      </div>
                    </a>

                    <a  href="<?=base_url("CONTROLER/METODO/".$project[0]->project_id) ?>">
                      <div class=" col-lg-1 midBox integrationColor">
                        <i class="glyphicon glyphicon-star"></i> 
                        <?=$this->lang->line('earned-value')?>
                      </div>
                    </a>

                    <div class=" col-lg-1 midBox integrationColor hideBox"></div>

                  </div>
                  <!--  -->
                </div>
              </div>

                <!-- [] -->

              <div class="col-lg-12 wrapper noSpaceSide">  
                <div class="noSpaceSide">  
                  <div class="col-lg-1 sideBox scopeBox scopeColor">
                    <i class="glyphicon glyphicon-search"></i> 
                    <?=$this->lang->line('scope')?>
                  </div>
                  
                  <div class="col-lg-10 noSpaceSide floatRight">

                    <div class=" col-lg-1 midBox scopeColor hideBox"></div>

                    <a  href="<?=base_url("Requirement_registration/list/".$project[0]->project_id) ?>">
                      <div class=" col-lg-1 midBox scopeColor">
                        <i class="glyphicon glyphicon-search"></i> 
                        <?=$this->lang->line('requirement-management')?>
                      </div>
                    </a>
                    
                    <a  href="<?=base_url("CONTROLER/METODO/".$project[0]->project_id) ?>">
                      <div class=" col-lg-1 midBox scopeColor">
                        <i class="glyphicon glyphicon-search"></i> 
                        <?=$this->lang->line('requirement-documentation')?>
                      </div>
                    </a>
                  
                    <a  href="<?=base_url("CONTROLER/METODO/".$project[0]->project_id) ?>">
                      <div class=" col-lg-1 midBox scopeColor">
                        <i class="glyphicon glyphicon-search"></i> 
                        <?=$this->lang->line('project-scope')?>
                      </div>
                    </a>

                    <div class=" col-lg-1 midBox scopeColor hideBox"></div>
                  
                    <a  href="<?=base_url("CONTROLER/METODO/".$project[0]->project_id) ?>">
                      <div class=" col-lg-1 midBox scopeColor">
                        <i class="glyphicon glyphicon-search"></i> 
                        <?=$this->lang->line('change-request')?>
                      </div>
                    </a>

                    <div class=" col-lg-1 midBox scopeColor hideBox"></div>

                  </div>
                  <!--  -->
                  <div class="col-lg-10 noSpaceSide floatRight">

                    <div class=" col-lg-1 midBox scopeColor hideBox"></div>
                    
                    <a  href="<?=base_url("Scope_specification/addnew/".$project[0]->project_id) ?>">
                      <div class=" col-lg-1 midBox scopeColor">
                        <i class="glyphicon glyphicon-search"></i> 
                        <?=$this->lang->line('scope-management')?>
                      </div>
                    </a>

                    <a  href="<?=base_url("CONTROLER/METODO/".$project[0]->project_id) ?>">
                      <div class=" col-lg-1 midBox scopeColor">
                        <i class="glyphicon glyphicon-search"></i> 
                        <?=$this->lang->line('requirement-traceability')?>
                      </div>
                    </a>

                    <a  href="<?=base_url("CONTROLER/METODO/".$project[0]->project_id) ?>">
                      <div class=" col-lg-1 midBox scopeColor">
                        <i class="glyphicon glyphicon-search"></i> 
                        <?=$this->lang->line('scope-baseline')?>
                      </div>
                    </a>

                    <div class=" col-lg-1 midBox scopeColor hideBox"></div>

                    <div class=" col-lg-1 midBox scopeColor hideBox"></div>

                    <div class=" col-lg-1 midBox scopeColor hideBox"></div>

                  </div>
                  <!--  -->
                </div>
              </div> 

                <!-- [] -->

              <div class="col-lg-12 wrapper noSpaceSide">  
                <div class="noSpaceSide">  
                  <div class="col-lg-1 sideBox timeBox">
                    <i class="glyphicon glyphicon-time"></i> 
                    <?=$this->lang->line('time')?>
                  </div>
                  
                  <div class="col-lg-10 noSpaceSide floatRight">

                    <div class=" col-lg-1 midBox timeColor hideBox"></div>

                    <a href="<?=base_url("Schedule/schedule_form/".$project[0]->project_id) ?>">
                      <div class=" col-lg-1 midBox timeColor">
                        <i class="glyphicon glyphicon-time"></i> 
                        <?=$this->lang->line('schedule-management')?>
                      </div>
                    </a>
                    
                    <a  href="<?=base_url("CONTROLER/METODO/".$project[0]->project_id) ?>">
                      <div class=" col-lg-1 midBox timeColor">
                        <i class="glyphicon glyphicon-time"></i> 
                        <?=$this->lang->line('project-schedule-network')?>
                      </div>
                    </a>
                    
                    <a  href="<?=base_url("CONTROLER/METODO/".$project[0]->project_id) ?>">
                      <div class=" col-lg-1 midBox timeColor">
                        <i class="glyphicon glyphicon-time"></i> 
                        <?=$this->lang->line('project-calendar')?>
                      </div>
                    </a> 

                    <div class=" col-lg-1 midBox timeColor hideBox"></div>

                    <a  href="<?=base_url("Tap/addTap/".$project[0]->project_id) ?>">
                      <div class=" col-lg-1 midBox timeColor">
                        <i class="glyphicon glyphicon-time"></i> 
                        <?=$this->lang->line('change-request')?>
                      </div>
                    </a>

                    <div class=" col-lg-1 midBox timeColor hideBox"></div>

                  </div>
                  <!--  -->
                  <div class="col-lg-10 noSpaceSide floatRight">

                    <div class=" col-lg-1 midBox timeColor hideBox"></div>
                    
                    <a  href="<?=base_url("CONTROLER/METODO/".$project[0]->project_id) ?>">
                      <div class=" col-lg-1 midBox timeColor">
                        <i class="glyphicon glyphicon-time"></i> 
                        <?=$this->lang->line('activity-attributes')?>
                      </div>
                    </a>

                    <a  href="<?=base_url("CONTROLER/METODO/".$project[0]->project_id) ?>">
                      <div class=" col-lg-1 midBox timeColor">
                        <i class="glyphicon glyphicon-time"></i> 
                        <?=$this->lang->line('activity-resource')?>
                      </div>
                    </a>
                    
                    <a  href="<?=base_url("CONTROLER/METODO/".$project[0]->project_id) ?>">
                      <div class=" col-lg-1 midBox timeColor">
                        <i class="glyphicon glyphicon-time"></i> 
                        <?=$this->lang->line('project-schedule')?>
                      </div>
                    </a>

                    <div class=" col-lg-1 midBox timeColor hideBox"></div>

                    <div class=" col-lg-1 midBox timeColor hideBox"></div>

                    <div class=" col-lg-1 midBox timeColor hideBox"></div>

                  </div>
                  <!--  -->
                  <div class="col-lg-10 noSpaceSide floatRight">

                    <div class=" col-lg-1 midBox timeColor hideBox"></div>
                    
                    <a  href="<?=base_url("CONTROLER/METODO/".$project[0]->project_id) ?>">
                      <div class=" col-lg-1 midBox timeColor">
                        <i class="glyphicon glyphicon-time"></i> 
                        <?=$this->lang->line('activity-list')?>
                      </div>
                    </a>
                    
                    <a  href="<?=base_url("CONTROLER/METODO/".$project[0]->project_id) ?>">
                      <div class=" col-lg-1 midBox timeColor">
                        <i class="glyphicon glyphicon-time"></i> 
                        <?=$this->lang->line('resource-breakdown')?>
                      </div>
                    </a>
                    
                    <a  href="<?=base_url("CONTROLER/METODO/".$project[0]->project_id) ?>">
                      <div class=" col-lg-1 midBox timeColor">
                        <i class="glyphicon glyphicon-time"></i> 
                        <?=$this->lang->line('schedule-baseline')?>
                      </div>
                    </a>

                    <div class=" col-lg-1 midBox timeColor hideBox"></div>

                    <div class=" col-lg-1 midBox timeColor hideBox"></div>

                    <div class=" col-lg-1 midBox timeColor hideBox"></div>

                  </div>
                  <!--  -->
                  <div class="col-lg-10 noSpaceSide floatRight">

                    <div class=" col-lg-1 midBox timeColor hideBox"></div>
                    
                    <a  href="<?=base_url("CONTROLER/METODO/".$project[0]->project_id) ?>">
                      <div class=" col-lg-1 midBox timeColor">
                        <i class="glyphicon glyphicon-time"></i> 
                        <?=$this->lang->line('milestone-list')?>
                      </div>
                    </a>

                    <a  href="<?=base_url("CONTROLER/METODO/".$project[0]->project_id) ?>">
                      <div class=" col-lg-1 midBox timeColor">
                        <i class="glyphicon glyphicon-time"></i> 
                        <?=$this->lang->line('activity-duration')?>
                      </div>
                    </a>
                    
                    <div class=" col-lg-1 midBox timeColor hideBox"></div>

                    <div class=" col-lg-1 midBox timeColor hideBox"></div>

                    <div class=" col-lg-1 midBox timeColor hideBox"></div>

                    <div class=" col-lg-1 midBox timeColor hideBox"></div>

                  </div>
                  <!--  -->
                </div>
              </div>

                <!-- [] -->
                
              <div class="col-lg-12 wrapper noSpaceSide">  
                <div class="noSpaceSide">  
                  <div class="col-lg-1 sideBox costBox">
                    <i class="fa fa-money"></i> 
                    <?=$this->lang->line('cost')?>
                  </div>
                  
                  <div class="col-lg-10 noSpaceSide floatRight">

                    <div class=" col-lg-1 midBox costColor hideBox"></div>
                    
                    <a href="<?=base_url("ManagementCost/addnew/".$project[0]->project_id)?>">
                      <div class=" col-lg-1 midBox costColor">
                        <i class="fa fa-money"></i> 
                        <?=$this->lang->line('cost-management')?>
                      </div>
                    </a>

                    <a  href="<?=base_url("CONTROLER/METODO/".$project[0]->project_id) ?>">
                      <div class=" col-lg-1 midBox costColor">
                        <i class="fa fa-money"></i> 
                        <?=$this->lang->line('cost-baseline')?>
                      </div>
                    </a>
                    
                    <div class=" col-lg-1 midBox costColor hideBox"></div>

                    <div class=" col-lg-1 midBox costColor hideBox"></div>

                    <a  href="<?=base_url("Tap/addTap/".$project[0]->project_id) ?>">
                      <div class=" col-lg-1 midBox costColor">
                        <i class="fa fa-money"></i> 
                        <?=$this->lang->line('change-request')?>
                      </div>
                    </a>

                    <div class=" col-lg-1 midBox costColor hideBox"></div>

                  </div>
                  <!--  -->
                  <div class="col-lg-10 noSpaceSide floatRight">

                    <div class=" col-lg-1 midBox costColor hideBox"></div>
                    
                    <a  href="<?=base_url("CONTROLER/METODO/".$project[0]->project_id) ?>">
                      <div class=" col-lg-1 midBox costColor">
                        <i class="fa fa-money"></i> 
                        <?=$this->lang->line('activity-cost')?>
                      </div>
                    </a>

                    <a  href="<?=base_url("CONTROLER/METODO/".$project[0]->project_id) ?>">
                      <div class=" col-lg-1 midBox costColor">
                        <i class="fa fa-money"></i> 
                        <?=$this->lang->line('project-funding')?>
                      </div>
                    </a>
                    
                    <div class=" col-lg-1 midBox costColor hideBox"></div>

                    <div class=" col-lg-1 midBox costColor hideBox"></div>

                    <div class=" col-lg-1 midBox costColor hideBox"></div>

                    <div class=" col-lg-1 midBox costColor hideBox"></div>

                  </div>
                  <!--  -->
                </div>
              </div>

                <!-- [] -->
                
              <div class="col-lg-12 wrapper noSpaceSide">  
                <div class="noSpaceSide"> 
                  <div class="col-lg-1 sideBox qualityBox">
                    <i class="fa fa-trophy"></i> 
                    <?=$this->lang->line('quality')?>
                  </div>

                  <div class="col-lg-10 noSpaceSide floatRight">

                    <div class=" col-lg-1 midBox qualityColor hideBox"></div>
                    
                    <a href="<?=base_url()?>Charter_Quality/addnew/<?php echo $project[0]->project_id;?>">
                      <div class=" col-lg-1 midBox qualityColor">
                        <i class="fa fa-trophy"></i> 
                        <?=$this->lang->line('quality-management')?>
                      </div>
                    </a>

                    <a  href="<?=base_url("CONTROLER/METODO/".$project[0]->project_id) ?>">
                      <div class=" col-lg-1 midBox qualityColor">
                        <i class="fa fa-trophy"></i> 
                        <?=$this->lang->line('product-quality')?>
                      </div>
                    </a>
                    
                    <a  href="<?=base_url("Process_plan/addnew/".$project[0]->project_id) ?>">
                      <div class=" col-lg-1 midBox qualityColor">
                        <i class="fa fa-trophy"></i> 
                        <?=$this->lang->line('process-improvement')?>
                      </div>
                    </a>

                    <a  href="<?=base_url("CONTROLER/METODO/".$project[0]->project_id) ?>">
                      <div class=" col-lg-1 midBox qualityColor">
                        <i class="fa fa-trophy"></i> 
                        <?=$this->lang->line('change-request')?>
                      </div>
                    </a>

                    <a  href="<?=base_url("CONTROLER/METODO/".$project[0]->project_id) ?>">
                      <div class=" col-lg-1 midBox qualityColor">
                        <i class="fa fa-trophy"></i> 
                        <?=$this->lang->line('change-request')?>
                      </div>
                    </a>

                    <div class=" col-lg-1 midBox qualityColor hideBox"></div>

                  </div>
                  <!--  -->
                  <div class="col-lg-10 noSpaceSide floatRight">

                    <div class=" col-lg-1 midBox qualityColor hideBox"></div>
                    
                    <a  href="<?=base_url("CONTROLER/METODO/".$project[0]->project_id) ?>">
                      <div class=" col-lg-1 midBox qualityColor">
                        <i class="fa fa-trophy"></i> 
                        <?=$this->lang->line('process-quality')?>
                      </div>
                    </a>

                    <a  href="<?=base_url("CONTROLER/METODO/".$project[0]->project_id) ?>">
                      <div class=" col-lg-1 midBox qualityColor">
                        <i class="fa fa-trophy"></i> 
                        <?=$this->lang->line('quality-metrics')?>
                      </div>
                    </a>
                    
                    <div class=" col-lg-1 midBox qualityColor hideBox"></div>

                    <div class=" col-lg-1 midBox qualityColor hideBox"></div>

                    <div class=" col-lg-1 midBox qualityColor hideBox"></div>

                    <div class=" col-lg-1 midBox qualityColor hideBox"></div>

                  </div>
                  <!--  -->
                </div>
              </div>

                <!-- [] -->
                
              <div class="col-lg-12 wrapper noSpaceSide">  
                <div class="noSpaceSide"> 
                  <div class="col-lg-1 sideBox hrBox">
                    <i class="fa fa-male"></i> 
                    <?=$this->lang->line('hr')?>
                  </div>

                  <div class="col-lg-10 noSpaceSide floatRight">

                    <div class=" col-lg-1 midBox hrColor hideBox"></div>
                    
                    <a href="<?=base_url("Human_resource/human_resource_form/".$project[0]->project_id) ?>">
                      <div class=" col-lg-1 midBox hrColor">
                        <i class="fa fa-male"></i> 
                        <?=$this->lang->line('hr-management')?>
                      </div>
                    </a>

                    <div class=" col-lg-1 midBox hrColor hideBox"></div>

                    <div class=" col-lg-1 midBox hrColor hideBox"></div>

                    <a  href="<?=base_url("CONTROLER/METODO/".$project[0]->project_id) ?>">
                      <div class=" col-lg-1 midBox hrColor">
                        <i class="fa fa-male"></i> 
                        <?=$this->lang->line('project-team')?>
                      </div>
                    </a>

                    <div class=" col-lg-1 midBox hrColor hideBox"></div>

                    <div class=" col-lg-1 midBox hrColor hideBox"></div>

                  </div>
                  <!--  -->
                  <div class="col-lg-10 noSpaceSide floatRight">

                    <div class=" col-lg-1 midBox hrColor hideBox"></div>

                    <div class=" col-lg-1 midBox hrColor hideBox"></div>

                    <div class=" col-lg-1 midBox hrColor hideBox"></div>

                    <div class=" col-lg-1 midBox hrColor hideBox"></div>

                    <a href="<?=base_url("Ade/getAde_form/".$project[0]->project_id) ?>">
                      <div class=" col-lg-1 midBox hrColor">
                        <i class="fa fa-male"></i> 
                        <?=$this->lang->line('team-performance')?>
                      </div>
                    </a>

                    <div class=" col-lg-1 midBox hrColor hideBox"></div>

                    <div class=" col-lg-1 midBox hrColor hideBox"></div>

                  </div>
                  <!--  -->
                  <div class="col-lg-10 noSpaceSide floatRight">

                    <div class=" col-lg-1 midBox hrColor hideBox"></div>

                    <div class=" col-lg-1 midBox hrColor hideBox"></div>

                    <div class=" col-lg-1 midBox hrColor hideBox"></div>

                    <div class=" col-lg-1 midBox hrColor hideBox"></div>

                    <a  href="<?=base_url("CONTROLER/METODO/".$project[0]->project_id) ?>">
                      <div class=" col-lg-1 midBox hrColor">
                        <i class="fa fa-male"></i> 
                        <?=$this->lang->line('enterprise-environment')?>
                      </div>
                    </a>

                    <div class=" col-lg-1 midBox hrColor hideBox"></div>

                    <div class=" col-lg-1 midBox hrColor hideBox"></div>

                  </div>
                  <!--  -->
                  <div class="col-lg-10 noSpaceSide floatRight">

                    <div class=" col-lg-1 midBox hrColor hideBox"></div>

                    <div class=" col-lg-1 midBox hrColor hideBox"></div>

                    <div class=" col-lg-1 midBox hrColor hideBox"></div>

                    <div class=" col-lg-1 midBox hrColor hideBox"></div>

                    <a  href="<?=base_url("CONTROLER/METODO/".$project[0]->project_id) ?>">
                      <div class=" col-lg-1 midBox hrColor">
                        <i class="fa fa-male"></i> 
                        <?=$this->lang->line('change-request')?>
                      </div>
                    </a>

                    <div class=" col-lg-1 midBox hrColor hideBox"></div>

                    <div class=" col-lg-1 midBox hrColor hideBox"></div>

                  </div>
                  <!--  -->
                </div>
              </div>

                <!-- [] -->
                
              <div class="col-lg-12 wrapper noSpaceSide">  
                <div class="noSpaceSide">  
                  <div class="col-lg-1 sideBox communicColor verticalOneBox">
                    <i class="glyphicon glyphicon-bullhorn"></i> 
                    <?=$this->lang->line('communication')?>
                  </div>

                  <div class="col-lg-10 noSpaceSide floatRight">

                    <div class=" col-lg-1 midBox communicColor hideBox"></div>
                    
                    <a href="<?=base_url()?>Communication_item/list/<?php echo $project[0]->project_id;?>">
                      <div class=" col-lg-1 midBox communicColor">
                        <i class="glyphicon glyphicon-bullhorn"></i> 
                        <?=$this->lang->line('communication-management')?>
                      </div>
                    </a>

                    <div class=" col-lg-1 midBox communicColor hideBox"></div>
                    
                    <div class=" col-lg-1 midBox communicColor hideBox"></div>

                    <div class=" col-lg-1 midBox communicColor hideBox"></div>

                    <a  href="<?=base_url("CONTROLER/METODO/".$project[0]->project_id) ?>">
                      <div class=" col-lg-1 midBox communicColor">
                        <i class="glyphicon glyphicon-bullhorn"></i> 
                        <?=$this->lang->line('change-request')?>
                      </div>
                    </a>

                    <div class=" col-lg-1 midBox communicColor hideBox"></div>

                  </div>
                  <!--  -->
                </div>
              </div>

                <!-- [] -->
                
              <div class="col-lg-12 wrapper noSpaceSide">  
                <div class="noSpaceSide"> 
                  <div class="col-lg-1 sideBox riskColor verticalOneBox">
                    <i class="glyphicon glyphicon-exclamation-sign"></i> 
                    <?=$this->lang->line('risk')?>
                  </div>

                  <div class="col-lg-10 noSpaceSide floatRight">

                    <div class=" col-lg-1 midBox riskColor hideBox"></div>
                    
                    <a href="<?=base_url()?>Risk/risk_form/<?php echo $project[0]->project_id;?>">
                      <div class=" col-lg-1 midBox riskColor">
                        <i class="glyphicon glyphicon-exclamation-sign"></i> 
                        <?=$this->lang->line('risk-management')?>
                      </div>
                    </a>

                    <a href="<?=base_url("RegisterRisk/addnew/".$project[0]->project_id) ?>">
                      <div class=" col-lg-1 midBox riskColor">
                        <i class="glyphicon glyphicon-exclamation-sign"></i> 
                        <?=$this->lang->line('risk-register')?>
                      </div>
                    </a>
                    
                    <div class=" col-lg-1 midBox riskColor hideBox"></div>

                    <a href="<?=base_url("Issues_Record/list/".$project[0]->project_id) ?>">
                      <div class=" col-lg-1 midBox riskColor">
                        <i class="glyphicon glyphicon-exclamation-sign"></i> 
                        <?=$this->lang->line('')?>
                        Issues Record
                      </div>
                    </a>

                    <a  href="<?=base_url("CONTROLER/METODO/".$project[0]->project_id) ?>">
                      <div class=" col-lg-1 midBox riskColor">
                        <i class="glyphicon glyphicon-exclamation-sign"></i> 
                        <?=$this->lang->line('change-request')?>
                      </div>
                    </a>

                    <div class=" col-lg-1 midBox riskColor hideBox"></div>

                  </div>
                  <!--  -->
                </div>
              </div>

                <!-- [] -->
                
              <div class="col-lg-12 wrapper noSpaceSide">  
                <div class="noSpaceSide"> 
                  <div class="col-lg-1 sideBox procurementColor procurementBox">
                    <i class="glyphicon glyphicon-shopping-cart"></i> 
                    <?=$this->lang->line('procurement')?>
                  </div>
                  
                  <div class="col-lg-10 noSpaceSide floatRight">

                    <div class=" col-lg-1 midBox procurementColor hideBox"></div>
                    
                    <a  href="<?=base_url("CONTROLER/METODO/".$project[0]->project_id) ?>">
                      <div class=" col-lg-1 midBox procurementColor">
                        <i class="glyphicon glyphicon-shopping-cart"></i> 
                        <?=$this->lang->line('change-request')?>
                      </div>
                    </a>

                    <a href="<?=base_url()?>/procurement/procurement_form/<?php echo $project[0]->project_id;?>">
                      <div class=" col-lg-1 midBox procurementColor">
                        <i class="glyphicon glyphicon-shopping-cart"></i> 
                        <?=$this->lang->line('')?>
                        Procurement Management
                      </div>
                    </a>
                    
                    <div class=" col-lg-1 midBox procurementColor hideBox"></div>

                    <a  href="<?=base_url("CONTROLER/METODO/".$project[0]->project_id) ?>">
                      <div class=" col-lg-1 midBox procurementColor">
                        <i class="glyphicon glyphicon-shopping-cart"></i> 
                        <?=$this->lang->line('')?>
                        Procurement Agreement
                      </div>
                    </a>

                    <a  href="<?=base_url("CONTROLER/METODO/".$project[0]->project_id) ?>">
                      <div class=" col-lg-1 midBox procurementColor">
                        <i class="glyphicon glyphicon-shopping-cart"></i> 
                        <?=$this->lang->line('change-request')?>
                      </div>
                    </a>

                    <div class=" col-lg-1 midBox procurementColor hideBox"></div>

                  </div>
                  <!--  -->
                  <div class="col-lg-10 noSpaceSide floatRight">

                    <div class=" col-lg-1 midBox procurementColor hideBox"></div>
                    
                    <a  href="<?=base_url("CONTROLER/METODO/".$project[0]->project_id) ?>">
                      <div class=" col-lg-1 midBox procurementColor">
                        <i class="glyphicon glyphicon-shopping-cart"></i> 
                        <?=$this->lang->line('')?>
                        Make-or-Buy Decisions
                      </div>
                    </a>

                    <a  href="<?=base_url("CONTROLER/METODO/".$project[0]->project_id) ?>">
                      <div class=" col-lg-1 midBox procurementColor">
                        <i class="glyphicon glyphicon-shopping-cart"></i> 
                        <?=$this->lang->line('')?>
                        Procurement Statement of Work
                      </div>
                    </a>
                    
                    <div class=" col-lg-1 midBox procurementColor hideBox"></div>

                    <a  href="<?=base_url("CONTROLER/METODO/".$project[0]->project_id) ?>">
                      <div class=" col-lg-1 midBox procurementColor">
                        <i class="glyphicon glyphicon-shopping-cart"></i> 
                        <?=$this->lang->line('change-request')?>
                      </div>
                    </a>

                    <div class=" col-lg-1 midBox procurementColor hideBox"></div>

                    <div class=" col-lg-1 midBox procurementColor hideBox"></div>

                  </div>
                  <!--  -->
                </div>
              </div>

                <!-- [] -->
                
              <div class="col-lg-12 wrapper noSpaceSide">  
                <div class="noSpaceSide"> 
                  <div class="col-lg-1 sideBox stakeholderColor stakeholderBox">
                    <i class="fa fa-users"></i> 
                    <?=$this->lang->line('stakeholder')?>
                  </div>

                  <div class="col-lg-10 noSpaceSide floatRight">
                    <a href="<?=base_url("ManagementStakeholder/addnew/".$project[0]->project_id) ?>">
                      <div class=" col-lg-1 midBox stakeholderColor">
                        <i class="fa fa-users"></i> 
                        <?=$this->lang->line('')?>
                        Stakeholder Register
                      </div>
                    </a>
                    
                    <a href="<?=base_url("Stakeholder_mp/stakeholder_mp_form/".$project[0]->project_id) ?>">
                      <div class=" col-lg-1 midBox stakeholderColor">
                        <i class="fa fa-users"></i> 
                        <?=$this->lang->line('')?>
                        Stakeholder Management
                      </div>
                    </a>

                    <div class=" col-lg-1 midBox stakeholderColor hideBox"></div>
                    
                    <div class=" col-lg-1 midBox stakeholderColor hideBox"></div>

                    <a  href="<?=base_url("CONTROLER/METODO/".$project[0]->project_id) ?>">
                      <div class=" col-lg-1 midBox stakeholderColor">
                        <i class="fa fa-users"></i> 
                        <?=$this->lang->line('')?>
                        Issue Log
                      </div>
                    </a>

                    <a  href="<?=base_url("CONTROLER/METODO/".$project[0]->project_id) ?>">
                      <div class=" col-lg-1 midBox stakeholderColor">
                        <i class="fa fa-users"></i> 
                        <?=$this->lang->line('change-request')?>
                      </div>
                    </a>

                    <div class=" col-lg-1 midBox stakeholderColor hideBox"></div>

                  </div>
                  <!--  -->
                  <div class="col-lg-10 noSpaceSide floatRight">

                    <div class=" col-lg-1 midBox stakeholderColor hideBox"></div>
                    
                    <div class=" col-lg-1 midBox stakeholderColor hideBox"></div>

                    <div class=" col-lg-1 midBox stakeholderColor hideBox"></div>
                    
                    <div class=" col-lg-1 midBox stakeholderColor hideBox"></div>

                    <a  href="<?=base_url("CONTROLER/METODO/".$project[0]->project_id) ?>">
                      <div class=" col-lg-1 midBox stakeholderColor">
                        <i class="fa fa-users"></i> 
                        <?=$this->lang->line('change-request')?>
                      </div>
                    </a>

                    <div class=" col-lg-1 midBox stakeholderColor hideBox"></div>

                    <div class=" col-lg-1 midBox stakeholderColor hideBox"></div>

                  </div>
                  <!--  -->
                </div>
              </div> <!-- End Body Phases -->


          
              <div class="col-md-12 noSpaceSide ">
                <div class="col-lg-12 wrapper noSpaceSide"> 
                  <a class="btn btn-warning btn-lg btn-block" href="<?=base_url()?>Notification_board/list/<?php echo $project[0]->project_id;?>"> 
                    <i class="glyphicon glyphicon-blackboard"></i> 
                    <?=$this->lang->line('notification-board')?>
                  </a>
                </div>
              </div>

            </div>
         </div>
      </div>
   </div>
</div>
<!-- /.lorem ipsum-->
<?php $this->load->view('frame/footer_view')?>