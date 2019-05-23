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
                      <div class="verticalAlign">
                        <?=$this->lang->line('initiating')?>
                      </div>
                    </div>
                    
                    <div class=" col-lg-1 menuBox planningBox hideBox">
                      <div class="verticalAlign">
                        <?=$this->lang->line('planning')?>
                      </div>
                    </div>

                    <div class=" col-lg-1 menuBox hideBox">
                      <div class="verticalAlign">
                        <?=$this->lang->line('executing')?>
                      </div>
                    </div>

                    <div class=" col-lg-1 menuBox hideBox">
                      <div class="verticalAlign">
                        <?=$this->lang->line('monitoring-controlling')?>
                      </div>
                    </div>            
                    
                    <div class=" col-lg-1 menuBox hideBox">
                      <div class="verticalAlign">
                        <?=$this->lang->line('closing')?>
                      </div>
                    </div>
                  </div>
                  <!--  -->
                </div>
              </div> <!-- End Header Phases -->

              <div class="col-lg-12 wrapper noSpaceSide">  
                <div class="noSpaceSide"> 
                  <div class="col-lg-1 sideBox integrationBox integrationColor">
                    <div class="verticalAlign">
                      <i class="glyphicon glyphicon-star"></i> 
                      <?=$this->lang->line('integration')?>
                    </div>
                  </div>

                  <div class="col-lg-10 noSpaceSide floatRight">
                    <a  href="<?=base_url("Tap/addTap/".$project[0]->project_id) ?>">
                      <div class=" col-lg-1 midBox integrationColor">
                        <div class="verticalAlign">
                          <i class="glyphicon glyphicon-star"></i> 
                          <?=$this->lang->line('project-charter')?>
                        </div>
                      </div>
                    </a>

                    <a  href="<?=base_url("CONTROLER/METODO/".$project[0]->project_id) ?>">
                      <div class=" col-lg-1 midBox integrationColor">
                        <div class="verticalAlign">
                          <i class="glyphicon glyphicon-star"></i> 
                          <?=$this->lang->line('project-management')?>
                        </div>
                      </div>
                    </a>                 
                    
                    <div class=" col-lg-1 midBox integrationColor hideBox"></div>
                    
                    <div class=" col-lg-1 midBox integrationColor hideBox"></div>

                    <a  href="<?=base_url("Tap/addTap/".$project[0]->project_id) ?>">
                      <div class=" col-lg-1 midBox integrationColor">
                        <div class="verticalAlign">
                          <i class="glyphicon glyphicon-star"></i> 
                          <?=$this->lang->line('project-status')?>
                        </div>
                      </div>
                    </a>

                    <a  href="<?=base_url("Tap/addTap/".$project[0]->project_id) ?>">
                      <div class=" col-lg-1 midBox integrationColor">
                        <div class="verticalAlign">
                          <i class="glyphicon glyphicon-star"></i> 
                          <?=$this->lang->line('change-request')?>
                        </div>
                      </div>
                    </a>

                    <a href="<?=base_url("TEP/new/".$project[0]->project_id) ?>">
                      <div class=" col-lg-1 midBox integrationColor">
                        <div class="verticalAlign">
                          <i class="glyphicon glyphicon-star"></i> 
                          <?=$this->lang->line('lessons-learned')?>
                        </div>
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
                        <div class="verticalAlign">
                          <i class="glyphicon glyphicon-star"></i> 
                          <?=$this->lang->line('deliverables-status')?>
                        </div>
                      </div>
                    </a>

                    <a  href="<?=base_url("Change_log/list/".$project[0]->project_id) ?>">
                      <div class=" col-lg-1 midBox integrationColor">
                        <div class="verticalAlign">
                          <i class="glyphicon glyphicon-star"></i> 
                          <?=$this->lang->line('change-log')?>
                        </div>
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
                        <div class="verticalAlign">
                          <i class="glyphicon glyphicon-star"></i> 
                          <?=$this->lang->line('change-request')?>
                        </div> 
                      </div>
                    </a>

                    <a  href="<?=base_url("CONTROLER/METODO/".$project[0]->project_id) ?>">
                      <div class=" col-lg-1 midBox integrationColor">
                        <div class="verticalAlign">
                          <i class="glyphicon glyphicon-star"></i> 
                          <?=$this->lang->line('earned-value')?>
                        </div>
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
                    <div class="verticalAlign">
                      <i class="glyphicon glyphicon-search"></i> 
                      <?=$this->lang->line('scope')?>
                    </div>
                  </div>
                  
                  <div class="col-lg-10 noSpaceSide floatRight">

                    <div class=" col-lg-1 midBox scopeColor hideBox"></div>

                    <a  href="<?=base_url("Requirement_registration/list/".$project[0]->project_id) ?>">
                      <div class=" col-lg-1 midBox scopeColor">
                        <div class="verticalAlign">
                          <i class="glyphicon glyphicon-search"></i> 
                          <?=$this->lang->line('requirement-management')?>
                        </div>
                      </div>
                    </a>
                    
                    <a  href="<?=base_url("CONTROLER/METODO/".$project[0]->project_id) ?>">
                      <div class=" col-lg-1 midBox scopeColor">
                        <div class="verticalAlign">
                          <i class="glyphicon glyphicon-search"></i> 
                          <?=$this->lang->line('requirement-documentation')?>
                        </div>
                      </div>
                    </a>
                  
                    <a  href="<?=base_url("Scope_specification/addnew/".$project[0]->project_id) ?>">
                      <div class=" col-lg-1 midBox scopeColor">
                        <div class="verticalAlign">
                          <i class="glyphicon glyphicon-search"></i> 
                          <?=$this->lang->line('project-scope')?>
                        </div>
                      </div>
                    </a>

                    <div class=" col-lg-1 midBox scopeColor hideBox"></div>
                  
                    <a  href="<?=base_url("CONTROLER/METODO/".$project[0]->project_id) ?>">
                      <div class=" col-lg-1 midBox scopeColor">
                        <div class="verticalAlign">
                          <i class="glyphicon glyphicon-search"></i> 
                          <?=$this->lang->line('change-request')?>
                        </div>
                      </div>
                    </a>

                    <div class=" col-lg-1 midBox scopeColor hideBox"></div>

                  </div>
                  <!--  -->
                  <div class="col-lg-10 noSpaceSide floatRight">

                    <div class=" col-lg-1 midBox scopeColor hideBox"></div>
                    
                    <a  href="<?=base_url("CONTROLER/METODO/".$project[0]->project_id) ?>">
                      <div class=" col-lg-1 midBox scopeColor">
                        <div class="verticalAlign">
                          <i class="glyphicon glyphicon-search"></i> 
                          <?=$this->lang->line('scope-management')?>
                        </div>
                      </div>
                    </a>

                    <a  href="<?=base_url("CONTROLER/METODO/".$project[0]->project_id) ?>">
                      <div class=" col-lg-1 midBox scopeColor">
                        <div class="verticalAlign">
                          <i class="glyphicon glyphicon-search"></i> 
                          <?=$this->lang->line('requirement-traceability')?>
                        </div>
                      </div>
                    </a>

                    <a  href="<?=base_url("CONTROLER/METODO/".$project[0]->project_id) ?>">
                      <div class=" col-lg-1 midBox scopeColor">
                        <div class="verticalAlign">
                          <i class="glyphicon glyphicon-search"></i> 
                          <?=$this->lang->line('scope-baseline')?>
                        </div>
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
                    <div class="verticalAlign">
                      <i class="glyphicon glyphicon-time"></i> 
                      <?=$this->lang->line('time')?>
                    </div>
                  </div>
                  
                  <div class="col-lg-10 noSpaceSide floatRight">

                    <div class=" col-lg-1 midBox timeColor hideBox"></div>

                    <a href="<?=base_url("Schedule/new/".$project[0]->project_id) ?>">
                      <div class=" col-lg-1 midBox timeColor">
                        <div class="verticalAlign">
                          <i class="glyphicon glyphicon-time"></i> 
                          <?=$this->lang->line('schedule-management')?>
                        </div>      
                      </div>
                    </a>
                    
                    <a  href="<?=base_url("CONTROLER/METODO/".$project[0]->project_id) ?>">
                      <div class=" col-lg-1 midBox timeColor">
                        <div class="verticalAlign">
                          <i class="glyphicon glyphicon-time"></i> 
                          <?=$this->lang->line('project-schedule-network')?>
                        </div>
                      </div>
                    </a>
                    
                    <a  href="<?=base_url("CONTROLER/METODO/".$project[0]->project_id) ?>">
                      <div class=" col-lg-1 midBox timeColor">
                        <div class="verticalAlign">
                          <i class="glyphicon glyphicon-time"></i> 
                          <?=$this->lang->line('project-calendar')?>
                        </div>
                      </div>
                    </a> 

                    <div class=" col-lg-1 midBox timeColor hideBox"></div>

                    <a  href="<?=base_url("Tap/addTap/".$project[0]->project_id) ?>">
                      <div class=" col-lg-1 midBox timeColor">
                        <div class="verticalAlign">
                          <i class="glyphicon glyphicon-time"></i> 
                          <?=$this->lang->line('change-request')?>
                        </div>
                      </div>
                    </a>

                    <div class=" col-lg-1 midBox timeColor hideBox"></div>

                  </div>
                  <!--  -->
                  <div class="col-lg-10 noSpaceSide floatRight">

                    <div class=" col-lg-1 midBox timeColor hideBox"></div>
                    
                    <a  href="<?=base_url("CONTROLER/METODO/".$project[0]->project_id) ?>">
                      <div class=" col-lg-1 midBox timeColor">
                        <div class="verticalAlign">
                          <i class="glyphicon glyphicon-time"></i> 
                          <?=$this->lang->line('activity-attributes')?>
                        </div>
                      </div>
                    </a>

                    <a  href="<?=base_url("CONTROLER/METODO/".$project[0]->project_id) ?>">
                      <div class=" col-lg-1 midBox timeColor">
                        <div class="verticalAlign">
                          <i class="glyphicon glyphicon-time"></i> 
                          <?=$this->lang->line('activity-resource')?>
                        </div>
                      </div>
                    </a>
                    
                    <a  href="<?=base_url("CONTROLER/METODO/".$project[0]->project_id) ?>">
                      <div class=" col-lg-1 midBox timeColor">
                        <div class="verticalAlign">
                          <i class="glyphicon glyphicon-time"></i> 
                          <?=$this->lang->line('project-schedule')?>
                        </div>
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
                        <div class="verticalAlign">
                          <i class="glyphicon glyphicon-time"></i> 
                          <?=$this->lang->line('activity-list')?>
                        </div>
                      </div>
                    </a>
                    
                    <a  href="<?=base_url("CONTROLER/METODO/".$project[0]->project_id) ?>">
                      <div class=" col-lg-1 midBox timeColor">
                        <div class="verticalAlign">
                          <i class="glyphicon glyphicon-time"></i> 
                          <?=$this->lang->line('resource-breakdown')?>
                        </div>
                      </div>
                    </a>
                    
                    <a  href="<?=base_url("CONTROLER/METODO/".$project[0]->project_id) ?>">
                      <div class=" col-lg-1 midBox timeColor">
                        <div class="verticalAlign">
                          <i class="glyphicon glyphicon-time"></i> 
                          <?=$this->lang->line('schedule-baseline')?>
                        </div>
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
                        <div class="verticalAlign">
                          <i class="glyphicon glyphicon-time"></i> 
                          <?=$this->lang->line('milestone-list')?>
                        </div>
                      </div>
                    </a>

                    <a  href="<?=base_url("CONTROLER/METODO/".$project[0]->project_id) ?>">
                      <div class=" col-lg-1 midBox timeColor">
                        <div class="verticalAlign">
                          <i class="glyphicon glyphicon-time"></i> 
                          <?=$this->lang->line('activity-duration')?>
                        </div>
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
                    <div class="verticalAlign">
                      <i class="fa fa-money"></i> 
                      <?=$this->lang->line('cost')?>
                    </div>
                  </div>
                  
                  <div class="col-lg-10 noSpaceSide floatRight">

                    <div class=" col-lg-1 midBox costColor hideBox"></div>
                    
                    <a href="<?=base_url("ManagementCost/new/".$project[0]->project_id)?>">
                      <div class=" col-lg-1 midBox costColor">
                        <div class="verticalAlign">
                          <i class="fa fa-money"></i> 
                          <?=$this->lang->line('cost-management')?>
                        </div>
                      </div>
                    </a>

                    <a  href="<?=base_url("CONTROLER/METODO/".$project[0]->project_id) ?>">
                      <div class=" col-lg-1 midBox costColor">
                        <div class="verticalAlign">
                          <i class="fa fa-money"></i> 
                          <?=$this->lang->line('cost-baseline')?>
                        </div>
                      </div>
                    </a>
                    
                    <div class=" col-lg-1 midBox costColor hideBox"></div>

                    <div class=" col-lg-1 midBox costColor hideBox"></div>

                    <a  href="<?=base_url("Tap/addTap/".$project[0]->project_id) ?>">
                      <div class=" col-lg-1 midBox costColor">
                        <div class="verticalAlign">
                          <i class="fa fa-money"></i> 
                          <?=$this->lang->line('change-request')?>
                        </div>
                      </div>
                    </a>

                    <div class=" col-lg-1 midBox costColor hideBox"></div>

                  </div>
                  <!--  -->
                  <div class="col-lg-10 noSpaceSide floatRight">

                    <div class=" col-lg-1 midBox costColor hideBox"></div>
                    
                    <a  href="<?=base_url("CONTROLER/METODO/".$project[0]->project_id) ?>">
                      <div class=" col-lg-1 midBox costColor">
                        <div class="verticalAlign">
                          <i class="fa fa-money"></i> 
                          <?=$this->lang->line('activity-cost')?>
                        </div>
                      </div>
                    </a>

                    <a  href="<?=base_url("CONTROLER/METODO/".$project[0]->project_id) ?>">
                      <div class=" col-lg-1 midBox costColor">
                        <div class="verticalAlign">
                          <i class="fa fa-money"></i> 
                          <?=$this->lang->line('project-funding')?>
                        </div>
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
                    <div class="verticalAlign">
                      <i class="fa fa-trophy"></i> 
                      <?=$this->lang->line('quality')?>
                    </div>
                  </div>

                  <div class="col-lg-10 noSpaceSide floatRight">

                    <div class=" col-lg-1 midBox qualityColor hideBox"></div>
                    
                    <a href="<?=base_url()?>Charter_Quality/new/<?php echo $project[0]->project_id;?>">
                      <div class=" col-lg-1 midBox qualityColor">
                        <div class="verticalAlign">
                          <i class="fa fa-trophy"></i> 
                          <?=$this->lang->line('quality-management')?>
                        </div>
                      </div>
                    </a>

                    <a  href="<?=base_url("CONTROLER/METODO/".$project[0]->project_id) ?>">
                      <div class=" col-lg-1 midBox qualityColor">
                        <div class="verticalAlign">
                          <i class="fa fa-trophy"></i> 
                          <?=$this->lang->line('product-quality')?>
                        </div>
                      </div>
                    </a>
                    
                    <a  href="<?=base_url("Process_plan/new/".$project[0]->project_id) ?>">
                      <div class=" col-lg-1 midBox qualityColor">
                        <div class="verticalAlign">
                          <i class="fa fa-trophy"></i> 
                          <?=$this->lang->line('process-improvement')?>
                        </div>
                      </div>
                    </a>

                    <a  href="<?=base_url("CONTROLER/METODO/".$project[0]->project_id) ?>">
                      <div class=" col-lg-1 midBox qualityColor">
                        <div class="verticalAlign">
                          <i class="fa fa-trophy"></i> 
                          <?=$this->lang->line('change-request')?>
                        </div>
                      </div>
                    </a>

                    <a  href="<?=base_url("CONTROLER/METODO/".$project[0]->project_id) ?>">
                      <div class=" col-lg-1 midBox qualityColor">
                        <div class="verticalAlign">
                          <i class="fa fa-trophy"></i> 
                          <?=$this->lang->line('change-request')?>
                        </div>
                      </div>
                    </a>

                    <div class=" col-lg-1 midBox qualityColor hideBox"></div>

                  </div>
                  <!--  -->
                  <div class="col-lg-10 noSpaceSide floatRight">

                    <div class=" col-lg-1 midBox qualityColor hideBox"></div>
                    
                    <a  href="<?=base_url("CONTROLER/METODO/".$project[0]->project_id) ?>">
                      <div class=" col-lg-1 midBox qualityColor">
                        <div class="verticalAlign">
                          <i class="fa fa-trophy"></i> 
                          <?=$this->lang->line('process-quality')?>
                        </div>
                      </div>
                    </a>

                    <a  href="<?=base_url("CONTROLER/METODO/".$project[0]->project_id) ?>">
                      <div class=" col-lg-1 midBox qualityColor">
                        <div class="verticalAlign">
                          <i class="fa fa-trophy"></i> 
                          <?=$this->lang->line('quality-metrics')?>
                        </div>
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
                    <div class="verticalAlign">
                      <i class="fa fa-male"></i> 
                      <?=$this->lang->line('hr')?>
                    </div>      
                  </div>

                  <div class="col-lg-10 noSpaceSide floatRight">

                    <div class=" col-lg-1 midBox hrColor hideBox"></div>
                    
                    <a href="<?=base_url("Human_resource/new/".$project[0]->project_id) ?>">
                      <div class=" col-lg-1 midBox hrColor">
                        <div class="verticalAlign">
                          <i class="fa fa-male"></i> 
                          <?=$this->lang->line('hr-management')?>
                        </div>
                      </div>
                    </a>

                    <div class=" col-lg-1 midBox hrColor hideBox"></div>

                    <div class=" col-lg-1 midBox hrColor hideBox"></div>

                    <a  href="<?=base_url("CONTROLER/METODO/".$project[0]->project_id) ?>">
                      <div class=" col-lg-1 midBox hrColor">
                        <div class="verticalAlign">
                          <i class="fa fa-male"></i> 
                          <?=$this->lang->line('project-team')?>
                        </div>
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

                    <a href="<?=base_url("Team_Performance_Evaluation/list/".$project[0]->project_id) ?>">
                      <div class=" col-lg-1 midBox hrColor">
                        <div class="verticalAlign">
                          <i class="fa fa-male"></i> 
                          <?=$this->lang->line('team-performance')?>
                        </div> 
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
                        <div class="verticalAlign">
                          <i class="fa fa-male"></i> 
                          <?=$this->lang->line('enterprise-environment')?>
                        </div>
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
                        <div class="verticalAlign">
                          <i class="fa fa-male"></i> 
                          <?=$this->lang->line('change-request')?>
                        </div>
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
                    <div class="verticalAlign">
                      <i class="glyphicon glyphicon-bullhorn"></i> 
                      <?=$this->lang->line('communication')?>
                    </div>
                  </div>

                  <div class="col-lg-10 noSpaceSide floatRight">

                    <div class=" col-lg-1 midBox communicColor hideBox"></div>
                    
                    <a href="<?=base_url()?>Communication_item/list/<?php echo $project[0]->project_id;?>">
                      <div class=" col-lg-1 midBox communicColor">
                        <div class="verticalAlign">
                          <i class="glyphicon glyphicon-bullhorn"></i> 
                          <?=$this->lang->line('communication-management')?>
                        </div>
                      </div>
                    </a>

                    <div class=" col-lg-1 midBox communicColor hideBox"></div>
                    
                    <div class=" col-lg-1 midBox communicColor hideBox"></div>

                    <div class=" col-lg-1 midBox communicColor hideBox"></div>

                    <a  href="<?=base_url("CONTROLER/METODO/".$project[0]->project_id) ?>">
                      <div class=" col-lg-1 midBox communicColor">
                        <div class="verticalAlign">
                          <i class="glyphicon glyphicon-bullhorn"></i> 
                          <?=$this->lang->line('change-request')?>
                        </div>
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
                    <div class="verticalAlign">
                      <i class="glyphicon glyphicon-exclamation-sign"></i> 
                      <?=$this->lang->line('risk')?>
                    </div>
                  </div>

                  <div class="col-lg-10 noSpaceSide floatRight">

                    <div class=" col-lg-1 midBox riskColor hideBox"></div>
                    
                    <a href="<?=base_url()?>Risk/new/<?php echo $project[0]->project_id;?>">
                      <div class=" col-lg-1 midBox riskColor">
                        <div class="verticalAlign">
                          <i class="glyphicon glyphicon-exclamation-sign"></i> 
                          <?=$this->lang->line('risk-management')?>
                        </div>
                      </div>
                    </a>

                    <a href="<?=base_url("RegisterRisk/list/".$project[0]->project_id) ?>">
                      <div class=" col-lg-1 midBox riskColor">
                        <div class="verticalAlign">
                          <i class="glyphicon glyphicon-exclamation-sign"></i> 
                          <?=$this->lang->line('risk-register')?>
                        </div>
                      </div>
                    </a>
                    
                    <div class=" col-lg-1 midBox riskColor hideBox"></div>

                    <a href="<?=base_url("Issues_Record/list/".$project[0]->project_id) ?>">
                      <div class=" col-lg-1 midBox riskColor">
                        <div class="verticalAlign"> 
                          <i class="glyphicon glyphicon-exclamation-sign"></i> 
                          <?=$this->lang->line('issues-record')?>
                        </div>
                      </div>
                    </a>

                    <a  href="<?=base_url("CONTROLER/METODO/".$project[0]->project_id) ?>">
                      <div class=" col-lg-1 midBox riskColor">
                        <div class="verticalAlign">
                          <i class="glyphicon glyphicon-exclamation-sign"></i> 
                          <?=$this->lang->line('change-request')?>
                        </div>
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
                    <div class="verticalAlign">
                      <i class="glyphicon glyphicon-shopping-cart"></i> 
                      <?=$this->lang->line('procurement')?>
                    </div>
                  </div>
                  
                  <div class="col-lg-10 noSpaceSide floatRight">

                    <div class=" col-lg-1 midBox procurementColor hideBox"></div>
                    
                    <a  href="<?=base_url("CONTROLER/METODO/".$project[0]->project_id) ?>">
                      <div class=" col-lg-1 midBox procurementColor">
                        <div class="verticalAlign">
                          <i class="glyphicon glyphicon-shopping-cart"></i> 
                          <?=$this->lang->line('change-request')?>
                        </div>
                      </div>
                    </a>

                    <a href="<?=base_url()?>/procurement/new/<?php echo $project[0]->project_id;?>">
                      <div class=" col-lg-1 midBox procurementColor">
                        <div class="verticalAlign">
                          <i class="glyphicon glyphicon-shopping-cart"></i> 
                          <?=$this->lang->line('procurement-management')?>
                        </div>
                      </div>
                    </a>
                    
                    <div class=" col-lg-1 midBox procurementColor hideBox"></div>

                    <a  href="<?=base_url("CONTROLER/METODO/".$project[0]->project_id) ?>">
                      <div class=" col-lg-1 midBox procurementColor">
                        <div class="verticalAlign">
                          <i class="glyphicon glyphicon-shopping-cart"></i> 
                          <?=$this->lang->line('procurement-agreement')?>
                        </div>
                      </div>
                    </a>

                    <a  href="<?=base_url("CONTROLER/METODO/".$project[0]->project_id) ?>">
                      <div class=" col-lg-1 midBox procurementColor">
                        <div class="verticalAlign">
                          <i class="glyphicon glyphicon-shopping-cart"></i> 
                          <?=$this->lang->line('change-request')?>
                        </div>
                      </div>
                    </a>

                    <div class=" col-lg-1 midBox procurementColor hideBox"></div>

                  </div>
                  <!--  -->
                  <div class="col-lg-10 noSpaceSide floatRight">

                    <div class=" col-lg-1 midBox procurementColor hideBox"></div>
                    
                    <a  href="<?=base_url("CONTROLER/METODO/".$project[0]->project_id) ?>">
                      <div class=" col-lg-1 midBox procurementColor">
                        <div class="verticalAlign">
                          <i class="glyphicon glyphicon-shopping-cart"></i> 
                          <?=$this->lang->line('make-decisions')?>
                        </div>
                      </div>
                    </a>

                    <a  href="<?=base_url("CONTROLER/METODO/".$project[0]->project_id) ?>">
                      <div class=" col-lg-1 midBox procurementColor">
                        <div class="verticalAlign">
                          <i class="glyphicon glyphicon-shopping-cart"></i> 
                          <?=$this->lang->line('procurement-statement')?>
                        </div>
                      </div>
                    </a>
                    
                    <div class=" col-lg-1 midBox procurementColor hideBox"></div>

                    <a  href="<?=base_url("CONTROLER/METODO/".$project[0]->project_id) ?>">
                      <div class=" col-lg-1 midBox procurementColor">
                        <div class="verticalAlign">
                          <i class="glyphicon glyphicon-shopping-cart"></i> 
                          <?=$this->lang->line('change-request')?>
                        </div>
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
                    <div class="verticalAlign">
                      <i class="fa fa-users"></i> 
                      <?=$this->lang->line('stakeholder')?>
                    </div>
                  </div>

                  <div class="col-lg-10 noSpaceSide floatRight">
                    <a href="<?=base_url("ManagementStakeholder/addnew/".$project[0]->project_id) ?>">
                      <div class=" col-lg-1 midBox stakeholderColor">
                        <div class="verticalAlign">
                          <i class="fa fa-users"></i> 
                          <?=$this->lang->line('stakeholder-register')?>
                        </div>
                      </div>
                    </a>
                    
                    <a href="<?=base_url("Stakeholder_mp/new/".$project[0]->project_id) ?>">
                      <div class=" col-lg-1 midBox stakeholderColor">
                        <div class="verticalAlign">
                          <i class="fa fa-users"></i> 
                          <?=$this->lang->line('stakeholder-management')?>
                        </div>
                      </div>
                    </a>

                    <div class=" col-lg-1 midBox stakeholderColor hideBox"></div>
                    
                    <div class=" col-lg-1 midBox stakeholderColor hideBox"></div>

                    <a  href="<?=base_url("CONTROLER/METODO/".$project[0]->project_id) ?>">
                      <div class=" col-lg-1 midBox stakeholderColor">
                        <div class="verticalAlign">
                          <i class="fa fa-users"></i> 
                          <?=$this->lang->line('issue-log')?>
                        </div>
                      </div>
                    </a>

                    <a  href="<?=base_url("CONTROLER/METODO/".$project[0]->project_id) ?>">
                      <div class=" col-lg-1 midBox stakeholderColor">
                        <div class="verticalAlign">
                          <i class="fa fa-users"></i> 
                          <?=$this->lang->line('change-request')?>
                        </div>
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
                        <div class="verticalAlign">
                          <i class="fa fa-users"></i> 
                          <?=$this->lang->line('change-request')?>
                        </div>
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