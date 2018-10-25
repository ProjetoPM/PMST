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

               <div class="col-lg-12 wrapper">
                <div> 
                  <div class="col-lg-1 transparentBox">
                    .
                  </div>

                  <div class="col-lg-10">
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

              <div class="col-lg-12 wrapper"> <!-- Body Phases -->
                <div> 
                  <div class="col-lg-1 sideBox integrationBox">
                    Integration
                  </div>

                  <div class="col-lg-10">
                    <a  href="<?=base_url("Tap/addTap/".$project[0]->project_id) ?>">
                      <div class=" col-lg-1 midBox ">
                        Project Charter
                      </div>
                    </a>

                    <a  href="<?=base_url("CONTROLER/METODO/".$project[0]->project_id) ?>">
                      <div class=" col-lg-1 midBox ">
                        Project Management
                      </div>
                    </a>
                    
                    
                    <div class=" col-lg-1 midBox hideBox">
                        .
                    </div>
                    
                    <div class=" col-lg-1 midBox hideBox">
                        .
                    </div>
                    

                    <a  href="<?=base_url("Tap/addTap/".$project[0]->project_id) ?>">
                      <div class=" col-lg-1 midBox ">
                        Project Status Report
                      </div>
                    </a>

                    <a  href="<?=base_url("Tap/addTap/".$project[0]->project_id) ?>">
                      <div class=" col-lg-1 midBox ">
                        Change Request
                      </div>
                    </a>

                    <a href="<?=base_url("TEP/addnew/".$project[0]->project_id) ?>">
                      <div class=" col-lg-1 midBox ">
                        Lessons Learned
                      </div>
                    </a>
                  </div>
                  <!--  -->
                  <div class="col-lg-10">
                    <div class=" col-lg-1 midBox hideBox">
                      .
                    </div>
                    
                    <div class=" col-lg-1 midBox hideBox">
                      .
                    </div>

                    <div class=" col-lg-1 midBox hideBox">
                      .
                    </div>
                    
                    <div class=" col-lg-1 midBox hideBox">
                      .
                    </div>

                    <a  href="<?=base_url("CONTROLER/METODO/".$project[0]->project_id) ?>">
                      <div class=" col-lg-1 midBox ">
                        Deliverables Status
                      </div>
                    </a>

                    <a  href="<?=base_url("CONTROLER/METODO/".$project[0]->project_id) ?>">
                      <div class=" col-lg-1 midBox ">
                        Change Log
                      </div>
                    </a>

                    <div class=" col-lg-1 midBox hideBox">
                      .
                    </div>
                  </div>
                  <!--  -->
                  <div class="col-lg-10">
                    <div class=" col-lg-1 midBox hideBox">
                      .
                    </div>
                    
                    <div class=" col-lg-1 midBox hideBox">
                      .
                    </div>

                    <div class=" col-lg-1 midBox hideBox">
                      .
                    </div>
                    
                    <div class=" col-lg-1 midBox hideBox">
                      .
                    </div>

                    <a  href="<?=base_url("CONTROLER/METODO/".$project[0]->project_id) ?>">
                      <div class=" col-lg-1 midBox ">
                        Change Request
                      </div>
                    </a>

                    <a  href="<?=base_url("CONTROLER/METODO/".$project[0]->project_id) ?>">
                      <div class=" col-lg-1 midBox ">
                        Earned Value Status Report
                      </div>
                    </a>

                    <div class=" col-lg-1 midBox hideBox">
                      .
                    </div>
                  </div>
                  <!--  -->
                </div>
              </div>

                <!-- [] -->

              <div class="col-lg-12 wrapper">
                <div> 
                  <div class="col-lg-1 sideBox scopeBox">
                    Scope
                  </div>
                  
                  <div class="col-lg-10">
                    <div class=" col-lg-1 midBox hideBox">
                      .
                    </div>

                    <a  href="<?=base_url("Requirement_registration/list/".$project[0]->project_id) ?>">
                      <div class=" col-lg-1 midBox ">
                        Requirement Management
                      </div>
                    </a>
                    
                    <a  href="<?=base_url("CONTROLER/METODO/".$project[0]->project_id) ?>">
                      <div class=" col-lg-1 midBox ">
                        Requirements Documentati
                      </div>
                    </a>
                  
                    <a  href="<?=base_url("CONTROLER/METODO/".$project[0]->project_id) ?>">
                      <div class=" col-lg-1 midBox ">
                        Project Scope Statement
                      </div>
                    </a>

                    <div class=" col-lg-1 midBox hideBox">
                        .
                    </div>
                  
                    <a  href="<?=base_url("CONTROLER/METODO/".$project[0]->project_id) ?>">
                      <div class=" col-lg-1 midBox ">
                        Change Request
                      </div>
                    </a>

                    <div class=" col-lg-1 midBox hideBox">
                        .
                    </div>
                  </div>
                  <!--  -->
                  <div class="col-lg-10">
                    <div class=" col-lg-1 midBox hideBox">
                      .
                    </div>
                    
                    <a  href="<?=base_url("scope_specification/addnew/".$project[0]->project_id) ?>">
                      <div class=" col-lg-1 midBox ">
                        Scope Management
                      </div>
                    </a>

                    <a  href="<?=base_url("CONTROLER/METODO/".$project[0]->project_id) ?>">
                      <div class=" col-lg-1 midBox ">
                        Requirements Traceability Matrix
                      </div>
                    </a>

                    <a  href="<?=base_url("CONTROLER/METODO/".$project[0]->project_id) ?>">
                      <div class=" col-lg-1 midBox ">
                       Scope Baseline
                      </div>
                    </a>

                    <div class=" col-lg-1 midBox hideBox">
                      .
                    </div>

                    <div class=" col-lg-1 midBox hideBox">
                      .
                    </div>

                    <div class=" col-lg-1 midBox hideBox">
                      .
                    </div>
                  </div>
                  <!--  -->
                </div>
              </div> 

                <!-- [] -->

              <div class="col-lg-12 wrapper">
                <div> 
                  <div class="col-lg-1 sideBox timeBox">
                    Time
                  </div>
                  
                  <div class="col-lg-10">
                    <div class=" col-lg-1 midBox hideBox">
                        .
                    </div>

                    <a href="<?=base_url("Schedule/schedule_form/".$project[0]->project_id) ?>">
                      <div class=" col-lg-1 midBox ">
                        Schedule Management
                      </div>
                    </a>
                    
                    <a  href="<?=base_url("CONTROLER/METODO/".$project[0]->project_id) ?>">
                      <div class=" col-lg-1 midBox ">
                        Project Schedule Network
                      </div>
                    </a>
                    
                    <a  href="<?=base_url("CONTROLER/METODO/".$project[0]->project_id) ?>">
                      <div class=" col-lg-1 midBox ">
                        Project Calendar
                      </div>
                    </a> 

                    <div class=" col-lg-1 midBox hideBox">
                      .
                    </div>

                    <a  href="<?=base_url("Tap/addTap/".$project[0]->project_id) ?>">
                      <div class=" col-lg-1 midBox ">
                        Change Request
                      </div>
                    </a>

                    <div class=" col-lg-1 midBox hideBox">
                      .
                    </div>
                  </div>
                  <!--  -->
                  <div class="col-lg-10">
                    <div class=" col-lg-1 midBox hideBox">
                      .
                    </div>
                    
                    <a  href="<?=base_url("CONTROLER/METODO/".$project[0]->project_id) ?>">
                      <div class=" col-lg-1 midBox ">
                        Activity Attributes
                      </div>
                    </a>

                    <a  href="<?=base_url("CONTROLER/METODO/".$project[0]->project_id) ?>">
                      <div class=" col-lg-1 midBox ">
                        Activity Resource Requirement
                      </div>
                    </a>
                    
                    <a  href="<?=base_url("CONTROLER/METODO/".$project[0]->project_id) ?>">
                      <div class=" col-lg-1 midBox ">
                        Project Schedule
                      </div>
                    </a>

                    <div class=" col-lg-1 midBox hideBox">
                        .
                    </div>

                    <div class=" col-lg-1 midBox hideBox">
                        .
                    </div>

                    <div class=" col-lg-1 midBox hideBox">
                      .
                    </div>
                  </div>
                  <!--  -->
                  <div class="col-lg-10">
                    <div class=" col-lg-1 midBox hideBox">
                      .
                    </div>
                    
                    <a  href="<?=base_url("CONTROLER/METODO/".$project[0]->project_id) ?>">
                      <div class=" col-lg-1 midBox ">
                        Activity List
                      </div>
                    </a>
                    
                    <a  href="<?=base_url("CONTROLER/METODO/".$project[0]->project_id) ?>">
                      <div class=" col-lg-1 midBox ">
                        Resource Breakdown Structure
                      </div>
                    </a>
                    
                    <a  href="<?=base_url("CONTROLER/METODO/".$project[0]->project_id) ?>">
                      <div class=" col-lg-1 midBox ">
                        Schedule Baseline
                      </div>
                    </a>

                    <div class=" col-lg-1 midBox hideBox">
                        .
                    </div>

                    <div class=" col-lg-1 midBox hideBox">
                        .
                    </div>

                    <div class=" col-lg-1 midBox hideBox">
                      .
                    </div>
                  </div>
                  <!--  -->
                  <div class="col-lg-10">
                    <div class=" col-lg-1 midBox hideBox">
                      .
                    </div>
                    
                    <a  href="<?=base_url("CONTROLER/METODO/".$project[0]->project_id) ?>">
                      <div class=" col-lg-1 midBox ">
                        Milestone List
                      </div>
                    </a>

                    <a  href="<?=base_url("CONTROLER/METODO/".$project[0]->project_id) ?>">
                      <div class=" col-lg-1 midBox ">
                        Activity Duration Estimates
                      </div>
                    </a>
                    
                    <div class=" col-lg-1 midBox hideBox">
                      .
                    </div>

                    <div class=" col-lg-1 midBox hideBox">
                        .
                    </div>

                    <div class=" col-lg-1 midBox hideBox">
                        .
                    </div>

                    <div class=" col-lg-1 midBox hideBox">
                      .
                    </div>
                  </div>
                  <!--  -->
                </div>
              </div>

                <!-- [] -->
                
              <div class="col-lg-12 wrapper">
                <div> 
                  <div class="col-lg-1 sideBox costBox">
                    Cost
                  </div>
                  
                  <div class="col-lg-10">
                    <div class=" col-lg-1 midBox hideBox">
                      .
                    </div>
                    
                    <a href="<?=base_url("ManagementCost/addnew/".$project[0]->project_id)?>">
                      <div class=" col-lg-1 midBox ">
                        Cost Management
                      </div>
                    </a>

                    <a  href="<?=base_url("CONTROLER/METODO/".$project[0]->project_id) ?>">
                      <div class=" col-lg-1 midBox ">
                        Cost Basline
                      </div>
                    </a>
                    
                    <div class=" col-lg-1 midBox hideBox">
                      .
                    </div>

                    <div class=" col-lg-1 midBox hideBox">
                        .
                    </div>

                    <a  href="<?=base_url("Tap/addTap/".$project[0]->project_id) ?>">
                      <div class=" col-lg-1 midBox ">
                        Change Request
                      </div>
                    </a>

                    <div class=" col-lg-1 midBox hideBox">
                      .
                    </div>
                  </div>
                  <!--  -->
                  <div class="col-lg-10">
                    <div class=" col-lg-1 midBox hideBox">
                      .
                    </div>
                    
                    <a  href="<?=base_url("CONTROLER/METODO/".$project[0]->project_id) ?>">
                      <div class=" col-lg-1 midBox ">
                        Activity Cost Estimates
                      </div>
                    </a>

                    <a  href="<?=base_url("CONTROLER/METODO/".$project[0]->project_id) ?>">
                      <div class=" col-lg-1 midBox ">
                        Project Funding Requirement
                      </div>
                    </a>
                    
                    <div class=" col-lg-1 midBox hideBox">
                      .
                    </div>

                    <div class=" col-lg-1 midBox hideBox">
                        .
                    </div>

                    <div class=" col-lg-1 midBox hideBox">
                        .
                    </div>

                    <div class=" col-lg-1 midBox hideBox">
                      .
                    </div>
                  </div>
                  <!--  -->
                </div>
              </div>

                <!-- [] -->
                
              <div class="col-lg-12 wrapper">
                <div> 
                  <div class="col-lg-1 sideBox qualityBox">
                    Quality
                  </div>

                  <div class="col-lg-10">
                    <div class=" col-lg-1 midBox hideBox">
                      .
                    </div>
                    
                    <a href="<?=base_url()?>Charter_Quality/addnew/<?php echo $project[0]->project_id;?>">
                      <div class=" col-lg-1 midBox ">
                        Quality Management
                      </div>
                    </a>

                    <a  href="<?=base_url("CONTROLER/METODO/".$project[0]->project_id) ?>">
                      <div class=" col-lg-1 midBox ">
                        Product Quality Checklists
                      </div>
                    </a>
                    
                    <a  href="<?=base_url("Process_plan/addnew/".$project[0]->project_id) ?>">
                      <div class=" col-lg-1 midBox ">
                        Process Improvement
                      </div>
                    </a>

                    <a  href="<?=base_url("CONTROLER/METODO/".$project[0]->project_id) ?>">
                      <div class=" col-lg-1 midBox ">
                        Change Request
                      </div>
                    </a>

                    <a  href="<?=base_url("CONTROLER/METODO/".$project[0]->project_id) ?>">
                      <div class=" col-lg-1 midBox ">
                        Change Request
                      </div>
                    </a>

                    <div class=" col-lg-1 midBox hideBox">
                      .
                    </div>
                  </div>
                  <!--  -->
                  <div class="col-lg-10">
                    <div class=" col-lg-1 midBox hideBox">
                      .
                    </div>
                    
                    <a  href="<?=base_url("CONTROLER/METODO/".$project[0]->project_id) ?>">
                      <div class=" col-lg-1 midBox ">
                        Process Quality Checklists
                      </div>
                    </a>

                    <a  href="<?=base_url("CONTROLER/METODO/".$project[0]->project_id) ?>">
                      <div class=" col-lg-1 midBox ">
                        Quality Metrics
                      </div>
                    </a>
                    
                    <div class=" col-lg-1 midBox hideBox">
                      .
                    </div>

                    <div class=" col-lg-1 midBox hideBox">
                        .
                    </div>

                    <div class=" col-lg-1 midBox hideBox">
                        .
                    </div>

                    <div class=" col-lg-1 midBox hideBox">
                      .
                    </div>
                  </div>
                  <!--  -->
                </div>
              </div>

                <!-- [] -->
                
              <div class="col-lg-12 wrapper">
                <div> 
                  <div class="col-lg-1 sideBox hrBox">
                    Human Resource
                  </div>

                  <div class="col-lg-10">
                    <div class=" col-lg-1 midBox hideBox">
                      .
                    </div>
                    
                    <a href="<?=base_url("Human_resource/human_resource_form/".$project[0]->project_id) ?>">
                      <div class=" col-lg-1 midBox ">
                        Human Resource Management
                      </div>
                    </a>

                    <div class=" col-lg-1 midBox hideBox">
                      .
                    </div>
                    
                    <div class=" col-lg-1 midBox hideBox">
                      .
                    </div>

                    <a  href="<?=base_url("CONTROLER/METODO/".$project[0]->project_id) ?>">
                      <div class=" col-lg-1 midBox ">
                        Project Team Directory
                      </div>
                    </a>

                    <div class=" col-lg-1 midBox hideBox">
                      .
                    </div>

                    <div class=" col-lg-1 midBox hideBox">
                      .
                    </div>
                  </div>
                  <!--  -->
                  <div class="col-lg-10">
                    <div class=" col-lg-1 midBox hideBox">
                      .
                    </div>
                    
                    <div class=" col-lg-1 midBox hideBox">
                      .
                    </div>

                    <div class=" col-lg-1 midBox hideBox">
                      .
                    </div>
                    
                    <div class=" col-lg-1 midBox hideBox">
                      .
                    </div>

                    <a href="<?=base_url("Ade/getAde_form/".$project[0]->project_id) ?>">
                      <div class=" col-lg-1 midBox ">
                        Team Performance Assessment
                      </div>
                    </a>

                    <div class=" col-lg-1 midBox hideBox">
                      .
                    </div>

                    <div class=" col-lg-1 midBox hideBox">
                      .
                    </div>
                  </div>
                  <!--  -->
                  <div class="col-lg-10">
                    <div class=" col-lg-1 midBox hideBox">
                      .
                    </div>
                    
                    <div class=" col-lg-1 midBox hideBox">
                      .
                    </div>

                    <div class=" col-lg-1 midBox hideBox">
                      .
                    </div>
                    
                    <div class=" col-lg-1 midBox hideBox">
                      .
                    </div>

                    <a  href="<?=base_url("CONTROLER/METODO/".$project[0]->project_id) ?>">
                      <div class=" col-lg-1 midBox ">
                        Enterprise Environmental Factors
                      </div>
                    </a>

                    <div class=" col-lg-1 midBox hideBox">
                      .
                    </div>

                    <div class=" col-lg-1 midBox hideBox">
                      .
                    </div>
                  </div>
                  <!--  -->
                  <div class="col-lg-10">
                    <div class=" col-lg-1 midBox hideBox">
                      .
                    </div>
                    
                    <div class=" col-lg-1 midBox hideBox">
                      .
                    </div>

                    <div class=" col-lg-1 midBox hideBox">
                      .
                    </div>
                    
                    <div class=" col-lg-1 midBox hideBox">
                      .
                    </div>

                    <a  href="<?=base_url("CONTROLER/METODO/".$project[0]->project_id) ?>">
                      <div class=" col-lg-1 midBox ">
                        Change Request
                      </div>
                    </a>

                    <div class=" col-lg-1 midBox hideBox">
                      .
                    </div>

                    <div class=" col-lg-1 midBox hideBox">
                      .
                    </div>
                  </div>
                  <!--  -->
                </div>
              </div>

                <!-- [] -->
                
              <div class="col-lg-12 wrapper">
                <div> 
                  <div class="col-lg-1 sideBox verticalOneBox">
                    Communication
                  </div>

                  <div class="col-lg-10">
                    <div class=" col-lg-1 midBox hideBox">
                      .
                    </div>
                    
                    <a href="<?=base_url()?>communication_item/list/<?php echo $project[0]->project_id;?>">
                      <div class=" col-lg-1 midBox ">
                        Communication Management
                      </div>
                    </a>

                    <div class=" col-lg-1 midBox hideBox">
                      .
                    </div>
                    
                    <div class=" col-lg-1 midBox hideBox">
                      .
                    </div>

                    <div class=" col-lg-1 midBox hideBox">
                        .
                    </div>

                    <a  href="<?=base_url("CONTROLER/METODO/".$project[0]->project_id) ?>">
                      <div class=" col-lg-1 midBox ">
                        Change Request
                      </div>
                    </a>

                    <div class=" col-lg-1 midBox hideBox">
                      .
                    </div>
                  </div>
                  <!--  -->
                </div>
              </div>

                <!-- [] -->
                
              <div class="col-lg-12 wrapper">
                <div> 
                  <div class="col-lg-1 sideBox verticalOneBox">
                    Risk
                  </div>

                  <div class="col-lg-10">
                    <div class=" col-lg-1 midBox hideBox">
                      .
                    </div>
                    
                    <a href="<?=base_url()?>risk/risk_form/<?php echo $project[0]->project_id;?>">
                      <div class=" col-lg-1 midBox ">
                        Risk Management
                      </div>
                    </a>

                    <a href="<?=base_url("RegisterRisk/addnew/".$project[0]->project_id) ?>">
                      <div class=" col-lg-1 midBox ">
                        Risk Register
                      </div>
                    </a>
                    
                    <div class=" col-lg-1 midBox hideBox">
                      .
                    </div>

                    <a href="<?=base_url("Issues_Record/addIssuesRecord/".$project[0]->project_id) ?>">
                      <div class=" col-lg-1 midBox ">
                        Issues Record
                      </div>
                    </a>

                    <a  href="<?=base_url("CONTROLER/METODO/".$project[0]->project_id) ?>">
                      <div class=" col-lg-1 midBox ">
                        Change Request
                      </div>
                    </a>

                    <div class=" col-lg-1 midBox hideBox">
                      .
                    </div>
                  </div>
                  <!--  -->
                </div>
              </div>

                <!-- [] -->
                
              <div class="col-lg-12 wrapper">
                <div> 
                  <div class="col-lg-1 sideBox procurementBox">
                    Procurement
                  </div>
                  
                  <div class="col-lg-10">
                    <div class=" col-lg-1 midBox hideBox">
                      .
                    </div>
                    
                    <a  href="<?=base_url("CONTROLER/METODO/".$project[0]->project_id) ?>">
                      <div class=" col-lg-1 midBox ">
                        Change Request
                      </div>
                    </a>

                    <a href="<?=base_url()?>/procurement/procurement_form/<?php echo $project[0]->project_id;?>">
                      <div class=" col-lg-1 midBox ">
                        Procurement Management
                      </div>
                    </a>
                    
                    <div class=" col-lg-1 midBox hideBox">
                      .
                    </div>

                    <a  href="<?=base_url("CONTROLER/METODO/".$project[0]->project_id) ?>">
                      <div class=" col-lg-1 midBox ">
                        Procurement Agreement
                      </div>
                    </a>

                    <a  href="<?=base_url("CONTROLER/METODO/".$project[0]->project_id) ?>">
                      <div class=" col-lg-1 midBox ">
                        Change Request
                      </div>
                    </a>

                    <div class=" col-lg-1 midBox hideBox">
                      .
                    </div>
                  </div>
                  <!--  -->
                  <div class="col-lg-10">
                    <div class=" col-lg-1 midBox hideBox">
                      .
                    </div>
                    
                    <a  href="<?=base_url("CONTROLER/METODO/".$project[0]->project_id) ?>">
                      <div class=" col-lg-1 midBox ">
                        Make-or-Buy Decisions
                      </div>
                    </a>

                    <a  href="<?=base_url("CONTROLER/METODO/".$project[0]->project_id) ?>">
                      <div class=" col-lg-1 midBox ">
                        Procurement Statement of Work
                      </div>
                    </a>
                    
                    <div class=" col-lg-1 midBox hideBox">
                      .
                    </div>

                    <a  href="<?=base_url("CONTROLER/METODO/".$project[0]->project_id) ?>">
                      <div class=" col-lg-1 midBox ">
                        Change Request
                      </div>
                    </a>

                    <div class=" col-lg-1 midBox hideBox">
                      .
                    </div>

                    <div class=" col-lg-1 midBox hideBox">
                      .
                    </div>
                  </div>
                  <!--  -->
                </div>
              </div>

                <!-- [] -->
                
              <div class="col-lg-12 wrapper">  
                <div> 
                  <div class="col-lg-1 sideBox stakeholderBox">
                    Stakeholder
                  </div>

                  <div class="col-lg-10">
                    <a href="<?=base_url("ManagementStakeholder/addnew/".$project[0]->project_id) ?>">
                      <div class=" col-lg-1 midBox ">
                        Stakeholder Register
                      </div>
                    </a>
                    
                    <a href="<?=base_url("Stakeholder_mp/stakeholder_mp_form/".$project[0]->project_id) ?>">
                      <div class=" col-lg-1 midBox ">
                        Stakeholder Management
                      </div>
                    </a>

                    <div class=" col-lg-1 midBox hideBox">
                      .
                    </div>
                    
                    <div class=" col-lg-1 midBox hideBox">
                      .
                    </div>

                    <a  href="<?=base_url("CONTROLER/METODO/".$project[0]->project_id) ?>">
                      <div class=" col-lg-1 midBox ">
                        Issue Log
                      </div>
                    </a>

                    <a  href="<?=base_url("CONTROLER/METODO/".$project[0]->project_id) ?>">
                      <div class=" col-lg-1 midBox ">
                        Change Request
                      </div>
                    </a>

                    <div class=" col-lg-1 midBox hideBox">
                      .
                    </div>
                  </div>
                  <!--  -->
                  <div class="col-lg-10">
                    <div class=" col-lg-1 midBox hideBox">
                      .
                    </div>
                    
                    <div class=" col-lg-1 midBox hideBox">
                      .
                    </div>

                    <div class=" col-lg-1 midBox hideBox">
                      .
                    </div>
                    
                    <div class=" col-lg-1 midBox hideBox">
                      .
                    </div>

                    <a  href="<?=base_url("CONTROLER/METODO/".$project[0]->project_id) ?>">
                      <div class=" col-lg-1 midBox ">
                        Change Request
                      </div>
                    </a>

                    <div class=" col-lg-1 midBox hideBox">
                      .
                    </div>

                    <div class=" col-lg-1 midBox hideBox">
                      .
                    </div>
                  </div>
                  <!--  -->
                </div>
              </div> <!-- End Body Phases -->


          
              <div class="col-md-12">
                <a class="btn btn-warning btn-lg btn-block" href="<?=base_url()?>Notification_board/list/<?php echo $project[0]->project_id;?>">NOTIFICATION BOARD</a>
              </div>

            </div>
         </div>
      </div>
   </div>
</div>
<!-- /.lorem ipsum-->
<?php $this->load->view('frame/footer_view')?>