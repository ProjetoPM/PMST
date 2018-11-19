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
               <strong>PHASES <!-- <a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="Definir"><i class="glyphicon glyphicon-comment"></i></a> --></strong>
            </h3>
         </div>
         <div class="panel-body text-justify">
            <div class="panel-body text-center">

               <div class="col-lg-12 wrapper noSpaceSide">  
                <div class="noSpaceSide"> 

                  <div class="col-lg-1 transparentBox"></div>

                  <div class="col-lg-10 noSpaceSide floatRight">
                    <div class=" col-lg-1 menuBox hideBox">
                      Initiating
                    </div>
                    
                    <div class=" col-lg-1 menuBox planningBox hideBox">
                        Planning
                    </div>

                    <div class=" col-lg-1 menuBox hideBox">
                        Executing
                    </div>
                  
                    <div class=" col-lg-1 menuBox hideBox">
                        Monitoring & Controlling
                    </div>
                  
                    <div class=" col-lg-1 menuBox hideBox">
                      Closing
                    </div>
                  </div>
                  <!--  -->
                </div>
              </div> <!-- End Header Phases -->

              <div class="col-lg-12 wrapper noSpaceSide">  
                <div class="noSpaceSide"> 
                  <div class="col-lg-1 sideBox integrationBox integrationColor">
                    Integration
                  </div>

                  <div class="col-lg-10 noSpaceSide floatRight">
                    <a  href="<?=base_url("Tap/addTap/".$project[0]->project_id) ?>">
                      <div class=" col-lg-1 midBox integrationColor">
                        Project Charter
                      </div>
                    </a>

                    <a  href="<?=base_url("CONTROLER/METODO/".$project[0]->project_id) ?>">
                      <div class=" col-lg-1 midBox integrationColor">
                        Project Management
                      </div>
                    </a>
                    
                    
                    <div class=" col-lg-1 midBox integrationColor hideBox"></div>
                    
                    <div class=" col-lg-1 midBox integrationColor hideBox"></div>

                    <a  href="<?=base_url("Tap/addTap/".$project[0]->project_id) ?>">
                      <div class=" col-lg-1 midBox integrationColor">
                        Project Status Report
                      </div>
                    </a>

                    <a  href="<?=base_url("Tap/addTap/".$project[0]->project_id) ?>">
                      <div class=" col-lg-1 midBox integrationColor">
                        Change Request
                      </div>
                    </a>

                    <a href="<?=base_url("TEP/addnew/".$project[0]->project_id) ?>">
                      <div class=" col-lg-1 midBox integrationColor">
                        Lessons Learned
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
                        Deliverables Status
                      </div>
                    </a>

                    <a  href="<?=base_url("CONTROLER/METODO/".$project[0]->project_id) ?>">
                      <div class=" col-lg-1 midBox integrationColor">
                        Change Log
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
                        Change Request
                      </div>
                    </a>

                    <a  href="<?=base_url("CONTROLER/METODO/".$project[0]->project_id) ?>">
                      <div class=" col-lg-1 midBox integrationColor">
                        Earned Value Status Report
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
                    Scope
                  </div>
                  
                  <div class="col-lg-10 noSpaceSide floatRight">

                    <div class=" col-lg-1 midBox scopeColor hideBox"></div>

                    <a  href="<?=base_url("Requirement_registration/list/".$project[0]->project_id) ?>">
                      <div class=" col-lg-1 midBox scopeColor">
                        Requirement Management
                      </div>
                    </a>
                    
                    <a  href="<?=base_url("CONTROLER/METODO/".$project[0]->project_id) ?>">
                      <div class=" col-lg-1 midBox scopeColor">
                        Requirements Documentati
                      </div>
                    </a>
                  
                    <a  href="<?=base_url("CONTROLER/METODO/".$project[0]->project_id) ?>">
                      <div class=" col-lg-1 midBox scopeColor">
                        Project Scope Statement
                      </div>
                    </a>

                    <div class=" col-lg-1 midBox scopeColor hideBox"></div>
                  
                    <a  href="<?=base_url("CONTROLER/METODO/".$project[0]->project_id) ?>">
                      <div class=" col-lg-1 midBox scopeColor">
                        Change Request
                      </div>
                    </a>

                    <div class=" col-lg-1 midBox scopeColor hideBox"></div>

                  </div>
                  <!--  -->
                  <div class="col-lg-10 noSpaceSide floatRight">

                    <div class=" col-lg-1 midBox scopeColor hideBox"></div>
                    
                    <a  href="<?=base_url("Scope_specification/addnew/".$project[0]->project_id) ?>">
                      <div class=" col-lg-1 midBox scopeColor">
                        Scope Management
                      </div>
                    </a>

                    <a  href="<?=base_url("CONTROLER/METODO/".$project[0]->project_id) ?>">
                      <div class=" col-lg-1 midBox scopeColor">
                        Requirements Traceability Matrix
                      </div>
                    </a>

                    <a  href="<?=base_url("CONTROLER/METODO/".$project[0]->project_id) ?>">
                      <div class=" col-lg-1 midBox scopeColor">
                       Scope Baseline
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
                    Time
                  </div>
                  
                  <div class="col-lg-10 noSpaceSide floatRight">

                    <div class=" col-lg-1 midBox timeColor hideBox"></div>

                    <a href="<?=base_url("Schedule/schedule_form/".$project[0]->project_id) ?>">
                      <div class=" col-lg-1 midBox timeColor">
                        Schedule Management
                      </div>
                    </a>
                    
                    <a  href="<?=base_url("CONTROLER/METODO/".$project[0]->project_id) ?>">
                      <div class=" col-lg-1 midBox timeColor">
                        Project Schedule Network
                      </div>
                    </a>
                    
                    <a  href="<?=base_url("CONTROLER/METODO/".$project[0]->project_id) ?>">
                      <div class=" col-lg-1 midBox timeColor">
                        Project Calendar
                      </div>
                    </a> 

                    <div class=" col-lg-1 midBox timeColor hideBox"></div>

                    <a  href="<?=base_url("Tap/addTap/".$project[0]->project_id) ?>">
                      <div class=" col-lg-1 midBox timeColor">
                        Change Request
                      </div>
                    </a>

                    <div class=" col-lg-1 midBox timeColor hideBox"></div>

                  </div>
                  <!--  -->
                  <div class="col-lg-10 noSpaceSide floatRight">

                    <div class=" col-lg-1 midBox timeColor hideBox"></div>
                    
                    <a  href="<?=base_url("CONTROLER/METODO/".$project[0]->project_id) ?>">
                      <div class=" col-lg-1 midBox timeColor">
                        Activity Attributes
                      </div>
                    </a>

                    <a  href="<?=base_url("CONTROLER/METODO/".$project[0]->project_id) ?>">
                      <div class=" col-lg-1 midBox timeColor">
                        Activity Resource Requirement
                      </div>
                    </a>
                    
                    <a  href="<?=base_url("CONTROLER/METODO/".$project[0]->project_id) ?>">
                      <div class=" col-lg-1 midBox timeColor">
                        Project Schedule
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
                        Activity List
                      </div>
                    </a>
                    
                    <a  href="<?=base_url("CONTROLER/METODO/".$project[0]->project_id) ?>">
                      <div class=" col-lg-1 midBox timeColor">
                        Resource Breakdown Structure
                      </div>
                    </a>
                    
                    <a  href="<?=base_url("CONTROLER/METODO/".$project[0]->project_id) ?>">
                      <div class=" col-lg-1 midBox timeColor">
                        Schedule Baseline
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
                        Milestone List
                      </div>
                    </a>

                    <a  href="<?=base_url("CONTROLER/METODO/".$project[0]->project_id) ?>">
                      <div class=" col-lg-1 midBox timeColor">
                        Activity Duration Estimates
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
                    Cost
                  </div>
                  
                  <div class="col-lg-10 noSpaceSide floatRight">

                    <div class=" col-lg-1 midBox costColor hideBox"></div>
                    
                    <a href="<?=base_url("ManagementCost/addnew/".$project[0]->project_id)?>">
                      <div class=" col-lg-1 midBox costColor">
                        Cost Management
                      </div>
                    </a>

                    <a  href="<?=base_url("CONTROLER/METODO/".$project[0]->project_id) ?>">
                      <div class=" col-lg-1 midBox costColor">
                        Cost Basline
                      </div>
                    </a>
                    
                    <div class=" col-lg-1 midBox costColor hideBox"></div>

                    <div class=" col-lg-1 midBox costColor hideBox"></div>

                    <a  href="<?=base_url("Tap/addTap/".$project[0]->project_id) ?>">
                      <div class=" col-lg-1 midBox costColor">
                        Change Request
                      </div>
                    </a>

                    <div class=" col-lg-1 midBox costColor hideBox"></div>

                  </div>
                  <!--  -->
                  <div class="col-lg-10 noSpaceSide floatRight">

                    <div class=" col-lg-1 midBox costColor hideBox"></div>
                    
                    <a  href="<?=base_url("CONTROLER/METODO/".$project[0]->project_id) ?>">
                      <div class=" col-lg-1 midBox costColor">
                        Activity Cost Estimates
                      </div>
                    </a>

                    <a  href="<?=base_url("CONTROLER/METODO/".$project[0]->project_id) ?>">
                      <div class=" col-lg-1 midBox costColor">
                        Project Funding Requirement
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
                    Quality
                  </div>

                  <div class="col-lg-10 noSpaceSide floatRight">

                    <div class=" col-lg-1 midBox qualityColor hideBox"></div>
                    
                    <a href="<?=base_url()?>Charter_Quality/addnew/<?php echo $project[0]->project_id;?>">
                      <div class=" col-lg-1 midBox qualityColor">
                        Quality Management
                      </div>
                    </a>

                    <a  href="<?=base_url("CONTROLER/METODO/".$project[0]->project_id) ?>">
                      <div class=" col-lg-1 midBox qualityColor">
                        Product Quality Checklists
                      </div>
                    </a>
                    
                    <a  href="<?=base_url("Process_plan/addnew/".$project[0]->project_id) ?>">
                      <div class=" col-lg-1 midBox qualityColor">
                        Process Improvement
                      </div>
                    </a>

                    <a  href="<?=base_url("CONTROLER/METODO/".$project[0]->project_id) ?>">
                      <div class=" col-lg-1 midBox qualityColor">
                        Change Request
                      </div>
                    </a>

                    <a  href="<?=base_url("CONTROLER/METODO/".$project[0]->project_id) ?>">
                      <div class=" col-lg-1 midBox qualityColor">
                        Change Request
                      </div>
                    </a>

                    <div class=" col-lg-1 midBox qualityColor hideBox"></div>

                  </div>
                  <!--  -->
                  <div class="col-lg-10 noSpaceSide floatRight">

                    <div class=" col-lg-1 midBox qualityColor hideBox"></div>
                    
                    <a  href="<?=base_url("CONTROLER/METODO/".$project[0]->project_id) ?>">
                      <div class=" col-lg-1 midBox qualityColor">
                        Process Quality Checklists
                      </div>
                    </a>

                    <a  href="<?=base_url("CONTROLER/METODO/".$project[0]->project_id) ?>">
                      <div class=" col-lg-1 midBox qualityColor">
                        Quality Metrics
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
                    Human Resource
                  </div>

                  <div class="col-lg-10 noSpaceSide floatRight">

                    <div class=" col-lg-1 midBox hrColor hideBox"></div>
                    
                    <a href="<?=base_url("Human_resource/human_resource_form/".$project[0]->project_id) ?>">
                      <div class=" col-lg-1 midBox hrColor">
                        Human Resource Management
                      </div>
                    </a>

                    <div class=" col-lg-1 midBox hrColor hideBox"></div>

                    <div class=" col-lg-1 midBox hrColor hideBox"></div>

                    <a  href="<?=base_url("CONTROLER/METODO/".$project[0]->project_id) ?>">
                      <div class=" col-lg-1 midBox hrColor">
                        Project Team Directory
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
                        Team Performance Assessment
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
                        Enterprise Environmental Factors
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
                        Change Request
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
                    Communication
                  </div>

                  <div class="col-lg-10 noSpaceSide floatRight">

                    <div class=" col-lg-1 midBox communicColor hideBox"></div>
                    
                    <a href="<?=base_url()?>Communication_item/list/<?php echo $project[0]->project_id;?>">
                      <div class=" col-lg-1 midBox communicColor">
                        Communication Management
                      </div>
                    </a>

                    <div class=" col-lg-1 midBox communicColor hideBox"></div>
                    
                    <div class=" col-lg-1 midBox communicColor hideBox"></div>

                    <div class=" col-lg-1 midBox communicColor hideBox"></div>

                    <a  href="<?=base_url("CONTROLER/METODO/".$project[0]->project_id) ?>">
                      <div class=" col-lg-1 midBox communicColor">
                        Change Request
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
                    Risk
                  </div>

                  <div class="col-lg-10 noSpaceSide floatRight">

                    <div class=" col-lg-1 midBox riskColor hideBox"></div>
                    
                    <a href="<?=base_url()?>Risk/risk_form/<?php echo $project[0]->project_id;?>">
                      <div class=" col-lg-1 midBox riskColor">
                        Risk Management
                      </div>
                    </a>

                    <a href="<?=base_url("RegisterRisk/addnew/".$project[0]->project_id) ?>">
                      <div class=" col-lg-1 midBox riskColor">
                        Risk Register
                      </div>
                    </a>
                    
                    <div class=" col-lg-1 midBox riskColor hideBox"></div>

                    <a href="<?=base_url("Issues_Record/list/".$project[0]->project_id) ?>">
                      <div class=" col-lg-1 midBox riskColor">
                        Issues Record
                      </div>
                    </a>

                    <a  href="<?=base_url("CONTROLER/METODO/".$project[0]->project_id) ?>">
                      <div class=" col-lg-1 midBox riskColor">
                        Change Request
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
                    Procurement
                  </div>
                  
                  <div class="col-lg-10 noSpaceSide floatRight">

                    <div class=" col-lg-1 midBox procurementColor hideBox"></div>
                    
                    <a  href="<?=base_url("CONTROLER/METODO/".$project[0]->project_id) ?>">
                      <div class=" col-lg-1 midBox procurementColor">
                        Change Request
                      </div>
                    </a>

                    <a href="<?=base_url()?>/procurement/procurement_form/<?php echo $project[0]->project_id;?>">
                      <div class=" col-lg-1 midBox procurementColor">
                        Procurement Management
                      </div>
                    </a>
                    
                    <div class=" col-lg-1 midBox procurementColor hideBox"></div>

                    <a  href="<?=base_url("CONTROLER/METODO/".$project[0]->project_id) ?>">
                      <div class=" col-lg-1 midBox procurementColor">
                        Procurement Agreement
                      </div>
                    </a>

                    <a  href="<?=base_url("CONTROLER/METODO/".$project[0]->project_id) ?>">
                      <div class=" col-lg-1 midBox procurementColor">
                        Change Request
                      </div>
                    </a>

                    <div class=" col-lg-1 midBox procurementColor hideBox"></div>

                  </div>
                  <!--  -->
                  <div class="col-lg-10 noSpaceSide floatRight">

                    <div class=" col-lg-1 midBox procurementColor hideBox"></div>
                    
                    <a  href="<?=base_url("CONTROLER/METODO/".$project[0]->project_id) ?>">
                      <div class=" col-lg-1 midBox procurementColor">
                        Make-or-Buy Decisions
                      </div>
                    </a>

                    <a  href="<?=base_url("CONTROLER/METODO/".$project[0]->project_id) ?>">
                      <div class=" col-lg-1 midBox procurementColor">
                        Procurement Statement of Work
                      </div>
                    </a>
                    
                    <div class=" col-lg-1 midBox procurementColor hideBox"></div>

                    <a  href="<?=base_url("CONTROLER/METODO/".$project[0]->project_id) ?>">
                      <div class=" col-lg-1 midBox procurementColor">
                        Change Request
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
                    <span>Stakeholder</span>
                  </div>

                  <div class="col-lg-10 noSpaceSide floatRight">
                    <a href="<?=base_url("ManagementStakeholder/addnew/".$project[0]->project_id) ?>">
                      <div class=" col-lg-1 midBox stakeholderColor">
                        <span>Stakeholder Register</span>
                      </div>
                    </a>
                    
                    <a href="<?=base_url("Stakeholder_mp/stakeholder_mp_form/".$project[0]->project_id) ?>">
                      <div class=" col-lg-1 midBox stakeholderColor">
                        Stakeholder Management
                      </div>
                    </a>

                    <div class=" col-lg-1 midBox stakeholderColor hideBox"></div>
                    
                    <div class=" col-lg-1 midBox stakeholderColor hideBox"></div>

                    <a  href="<?=base_url("CONTROLER/METODO/".$project[0]->project_id) ?>">
                      <div class=" col-lg-1 midBox stakeholderColor">
                        Issue Log
                      </div>
                    </a>

                    <a  href="<?=base_url("CONTROLER/METODO/".$project[0]->project_id) ?>">
                      <div class=" col-lg-1 midBox stakeholderColor">
                        Change Request
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
                        Change Request
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
                  <a class="btn btn-warning btn-lg btn-block" href="<?=base_url()?>Notification_board/list/<?php echo $project[0]->project_id;?>">NOTIFICATION BOARD</a>
                </div>
              </div>

            </div>
         </div>
      </div>
   </div>
</div>
<!-- /.lorem ipsum-->
<?php $this->load->view('frame/footer_view')?>