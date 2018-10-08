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
                <!-- Inicio Top Phases -->
               <div class="row">
                  <div class="col-lg-2 grid-container" style="grid-auto-flow: line">
                     

                     <!-- <a href="<?=base_url("Issues_Record/addIssuesRecord/".$project[0]->project_id) ?>">
                     <div class="grid-item midBox smallBox">
                        Issues Record
                     </div>
                     </a> -->

                     
                     <div class="grid-item transparentBox transparentBoxMenu">
                        .
                     </div>

                     <div class="grid-item menuBox bigBox">
                      Initiating
                     </div>

                     <div class="grid-item menuBox planningBox">
                      Planning
                     </div>
                    
                     <div class="grid-item menuBox bigBox">
                      Executing
                     </div>

                      <div class="grid-item menuBox smallBox">
                      Monitoring & Controlling
                     </div>

                     <div class="grid-item menuBox bigBox">
                     Closing
                     </div>
                  </div>
               </div>
               <!-- Fim Top Phases-->

               <div class="row">
                   <!-- Inicio Linha Integration 0 -->
                  <div class="col-lg-2 grid-container" style="grid-auto-flow: column;">
                      <div class="grid-item sideBox integrationBox">
                        Integration
                     </div>

                     <div class="grid-item sideBox scopeBox">
                        Scope
                     </div>

                     <div class="grid-item sideBox timeBox">
                        Time
                     </div>
                    
                     <div class="grid-item sideBox costBox">
                        Cost
                     </div>

                     <div class="grid-item sideBox qualityBox">
                        Quality
                     </div>

                     <div class="grid-item sideBox hrBox">
                        Human Resource
                     </div>

                     <div class="grid-item sideBox verticalOneBox">
                        Communication
                     </div>

                     <div class="grid-item sideBox verticalOneBox">
                        Risk
                     </div>

                     <div class="grid-item sideBox procurementBox">
                        Procurement
                     </div>

                     <div class="grid-item sideBox stakeholderBox">
                        Stakeholder
                     </div>
                   </div>
                     
                  <div class="col-lg-2 grid-container" style="grid-auto-flow: column;">
                  <!-- Inicio Linha Integration 1 -->
                     <a  href="<?=base_url("Tap/addTap/".$project[0]->project_id) ?>">
                     <div class="grid-item midBox smallBox">
                        Project Charter
                     </div>
                     </a>

                     <div class="grid-item midBox bigBox">
                        .
                     </div>

                     <div class="grid-item midBox bigBox">
                        .
                     </div>

                     <div class="grid-item midBox bigBox">
                        .
                     </div>
                    
                     <div class="grid-item midBox bigBox">
                        .
                     </div>

                     <div class="grid-item midBox bigBox">
                        .
                     </div>

                     <div class="grid-item midBox bigBox">
                        .
                     </div>

                     <div class="grid-item midBox bigBox">
                        .
                     </div>

                     <div class="grid-item midBox bigBox">
                        .
                     </div>

                     <div class="grid-item midBox bigBox">
                        .
                     </div>

                     <div class="grid-item midBox bigBox">
                        .
                     </div>

                     <div class="grid-item midBox bigBox">
                        .
                     </div>

                     <div class="grid-item midBox bigBox">
                        .
                     </div>

                     <div class="grid-item midBox bigBox">
                        .
                     </div>

                     <div class="grid-item midBox bigBox">
                        .
                     </div>

                     <div class="grid-item midBox bigBox">
                        .
                     </div>

                     <div class="grid-item midBox bigBox">
                        .
                     </div>

                     <div class="grid-item midBox bigBox">
                        .
                     </div>

                     <div class="grid-item midBox bigBox">
                        .
                     </div>

                     <div class="grid-item midBox bigBox">
                        .
                     </div>

                     <div class="grid-item midBox bigBox">
                        .
                     </div>

                     <a href="<?=base_url("ManagementStakeholder/addnew/".$project[0]->project_id) ?>">
                     <div class="grid-item midBox smallBox">
                        Stakeholder Register
                     </div>
                     </a>

                     <div class="grid-item midBox bigBox">
                        .
                     </div>
                  <!-- Fim Linha Integration 1 -->

                  <!-- Inicio Linha Integration 2 -->
                     <div class="grid-item midBox smallBox">
                        Project Management
                     </div>

                     <div class="grid-item midBox bigBox">
                        .
                     </div>

                     <div class="grid-item midBox bigBox">
                        .
                     </div>
                    
                     <div class="grid-item midBox smallBox">
                        Requitements Management
                     </div>

                     <div class="grid-item midBox smallBox">
                        Scope Management
                     </div>

                     <a href="<?=base_url("Schedule/schedule_form/".$project[0]->project_id) ?>">
                     <div class="grid-item  midBox smallBox">
                        Schedule Management
                     </div>
                     </a>

                     <div class="grid-item midBox smallBox">
                        Activity Attributes
                     </div>

                     <div class="grid-item  midBox bigBox">
                        Activity List
                     </div>

                     <div class="grid-item  midBox smallBox">
                        Milestone List
                     </div>

                     <a href="<?=base_url("ManagementCost/addnew/".$project[0]->project_id)?>">
                     <div class="grid-item  midBox smallBox">
                        Cost Management
                     </div>
                     </a>

                     <div class="grid-item  midBox smallBox">
                        Activity Cost Estimates
                     </div>

                     <a href="<?=base_url()?>Charter_Quality/addnew/<?php echo $project[0]->project_id;?>">
                     <div class="grid-item  midBox smallBox">
                        Quality Management
                     </div>
                     </a>

                     <div class="grid-item  midBox smallBox">
                        Process Quality Checklists
                     </div>

                     <a href="<?=base_url("Human_resource/human_resource_form/".$project[0]->project_id) ?>">
                     <div class="grid-item  midBox smallBox">
                        Human Resource Management
                     </div>
                     </a>

                     <div class="grid-item  midBox bigBox">
                        .
                     </div>

                     <div class="grid-item  midBox bigBox">
                        .
                     </div>

                     <div class="grid-item  midBox bigBox">
                        .
                     </div>

                     <a href="<?=base_url()?>communication_item/communication_form/<?php echo $project[0]->project_id;?>">
                     <div class="grid-item  midBox smallBox">
                        Communication Management
                     </div>
                     </a>

                     <a href="<?=base_url()?>risk/risk_form/<?php echo $project[0]->project_id;?>">
                     <div class="grid-item  midBox smallBox">
                        Risk Management
                     </div>
                     </a>

                     <div class="grid-item  midBox smallBox">
                        Change Request
                     </div>

                     <div class="grid-item  midBox smallBox">
                        Make-or-Buy Decisions
                     </div>

                     <a href="<?=base_url("Stakeholder_mp/stakeholder_mp_form/".$project[0]->project_id) ?>">
                     <div class="grid-item  midBox smallBox">
                        Stakeholder Management
                     </div>
                     </a>

                     <div class="grid-item  midBox smallBox">
                        .
                     </div>
                  <!-- Fim Linha Integration 2 -->

                   <!-- Inicio Linha Integration 3 -->
                     <div class="grid-item midBox smallBox">
                       .
                     </div>

                     <div class="grid-item midBox bigBox">
                        .
                     </div>

                     <div class="grid-item midBox bigBox">
                        .
                     </div>
                    
                     <div class="grid-item midBox smallBox">
                        Requitements Documentati
                     </div>

                     <div class="grid-item midBox smallBox">
                        Requirements Traceability Matrix
                     </div>

                     <div class="grid-item  midBox smallBox">
                        Project Schedule Network
                     </div>

                     <div class="grid-item midBox smallBox">
                        Activity Resource Requirement
                     </div>

                     <div class="grid-item  midBox smallBox">
                        Resource Breakdown Structure
                     </div>

                     <div class="grid-item  midBox smallBox">
                        Activity Duration Estimates
                     </div>

                     <div class="grid-item  midBox smallBox">
                        Cost Basline
                     </div>
                     
                     <div class="grid-item  midBox smallBox">
                        Project Funding Requirement
                     </div>

                     <div class="grid-item  midBox smallBox">
                        Product Quality Checklists
                     </div>

                     <div class="grid-item  midBox smallBox">
                        Quality Metrics
                     </div>

                     <div class="grid-item  midBox smallBox">
                        .
                     </div>

                     <div class="grid-item  midBox bigBox">
                        .
                     </div>

                     <div class="grid-item  midBox bigBox">
                        .
                     </div>

                     <div class="grid-item  midBox bigBox">
                        .
                     </div>

                     <div class="grid-item  midBox smallBox">
                        .
                     </div>

                     <a href="<?=base_url("RegisterRisk/addnew/".$project[0]->project_id) ?>">
                     <div class="grid-item  midBox bigBox">
                        Risk Register
                     </div>
                     </a>

                      <a href="<?=base_url()?>/procurement/procurement_form/<?php echo $project[0]->project_id;?>">
                     <div class="grid-item  midBox smallBox">
                        Procurement Management
                     </div>
                     </a>

                     <div class="grid-item  midBox smallBox">
                        Procurement Statement of Work
                     </div>

                     <div class="grid-item  midBox smallBox">
                        .
                     </div>

                     <div class="grid-item  midBox smallBox">
                        .
                     </div>
                  <!-- Fim Linha Integration 3 -->

                   <!-- Inicio Linha Integration 4 -->
                     <div class="grid-item midBox smallBox">
                       .
                     </div>

                     <div class="grid-item midBox bigBox">
                        .
                     </div>

                     <div class="grid-item midBox bigBox">
                        .
                     </div>
                    
                     <div class="grid-item midBox smallBox">
                        Project Scope Statement
                     </div>

                     <div class="grid-item midBox smallBox">
                       Scope Baseline
                     </div>

                     <div class="grid-item  midBox smallBox">
                        Project Calendar
                     </div>

                     <div class="grid-item midBox smallBox">
                        Project Schedule
                     </div>

                     <div class="grid-item  midBox smallBox">
                        Schedule Baseline
                     </div>

                     <div class="grid-item  midBox smallBox">
                        .
                     </div>

                     <div class="grid-item  midBox smallBox">
                        .
                     </div>
                     
                     <div class="grid-item  midBox smallBox">
                        .
                     </div>

                     <div class="grid-item  midBox smallBox">
                        Process Improvement
                     </div>

                     <div class="grid-item  midBox smallBox">
                        .
                     </div>

                     <div class="grid-item  midBox smallBox">
                        .
                     </div>

                     <div class="grid-item  midBox bigBox">
                        .
                     </div>

                     <div class="grid-item  midBox bigBox">
                        .
                     </div>

                     <div class="grid-item  midBox bigBox">
                        .
                     </div>

                     <div class="grid-item  midBox smallBox">
                        .
                     </div>

                     <div class="grid-item  midBox smallBox">
                        .
                     </div>

                     <div class="grid-item  midBox smallBox">
                        .
                     </div>

                     <div class="grid-item  midBox smallBox">
                        .
                     </div>

                     <div class="grid-item  midBox smallBox">
                        .
                     </div>

                     <div class="grid-item  midBox smallBox">
                        .
                     </div>
                  <!-- Fim Linha Integration 4 -->

                  <!-- Inicio Linha Integration 5 -->
                     <a  href="<?=base_url("Tap/addTap/".$project[0]->project_id) ?>">
                     <div class="grid-item midBox smallBox">
                       Project Status Report
                     </div>
                     </a>

                     <div class="grid-item midBox smallBox">
                        Deliverables Status
                     </div>

                     <div class="grid-item midBox smallBox">
                        Change Request
                     </div>
                    
                     <div class="grid-item midBox smallBox">
                        .
                     </div>

                     <div class="grid-item midBox smallBox">
                       .
                     </div>

                     <div class="grid-item  midBox smallBox">
                        .
                     </div>

                     <div class="grid-item midBox smallBox">
                        .
                     </div>

                     <div class="grid-item  midBox bigBox">
                        .
                     </div>

                     <div class="grid-item  midBox smallBox">
                        .
                     </div>

                     <div class="grid-item  midBox smallBox">
                        .
                     </div>
                     
                     <div class="grid-item  midBox smallBox">
                        .
                     </div>

                     <div class="grid-item  midBox smallBox">
                        Change Request
                     </div>

                     <div class="grid-item  midBox smallBox">
                        .
                     </div>

                     <div class="grid-item  midBox smallBox">
                        Project Team Directory
                     </div>

                     <a href="<?=base_url("Ade/getAde_form/".$project[0]->project_id) ?>">
                     <div class="grid-item  midBox smallBox">
                        Team Performance Assessment
                     </div>
                     </a>

                     <div class="grid-item  midBox smallBox">
                        Enterprise Environmental Factors
                     </div>

                     <div class="grid-item  midBox smallBox">
                        Change Request
                     </div>

                     <div class="grid-item  midBox smallBox">
                        .
                     </div>

                     <div class="grid-item  midBox smallBox">
                        .
                     </div>

                     <div class="grid-item  midBox smallBox">
                        Procurement Agreement
                     </div>

                     <div class="grid-item  midBox smallBox">
                        Change Request
                     </div>

                     <div class="grid-item  midBox smallBox">
                        Issue Log
                     </div>

                     <div class="grid-item  midBox smallBox">
                        Change Request
                     </div>
                  <!-- Fim Linha Integration 5 -->

                  <!-- Inicio Linha Integration 6 -->
                     <a  href="<?=base_url("Tap/addTap/".$project[0]->project_id) ?>">
                     <div class="grid-item midBox smallBox">
                       Change Request
                     </div>
                     </a>

                     <div class="grid-item midBox smallBox">
                        Change Log
                     </div>

                     <div class="grid-item midBox smallBox">
                        Earned Value Status Report
                     </div>
                    
                     <div class="grid-item midBox smallBox">
                        Change Request
                     </div>

                     <div class="grid-item midBox smallBox">
                       .
                     </div>

                     <div class="grid-item  midBox smallBox">
                        Change Request
                     </div>

                     <div class="grid-item midBox smallBox">
                        .
                     </div>

                     <div class="grid-item  midBox bigBox">
                        .
                     </div>

                     <div class="grid-item  midBox smallBox">
                        .
                     </div>

                     <div class="grid-item  midBox smallBox">
                        Change Request
                     </div>
                     
                     <div class="grid-item  midBox smallBox">
                        .
                     </div>

                     <div class="grid-item  midBox smallBox">
                        Change Request
                     </div>

                     <div class="grid-item  midBox smallBox">
                        .
                     </div>

                     <div class="grid-item  midBox smallBox">
                        .
                     </div>

                     <div class="grid-item  midBox bigBox">
                        .
                     </div>

                     <div class="grid-item  midBox bigBox">
                        .
                     </div>

                     <div class="grid-item  midBox bigBox">
                        .
                     </div>

                     <div class="grid-item  midBox smallBox">
                        Change Request
                     </div>

                     <div class="grid-item  midBox smallBox">
                        Change Request
                     </div>

                     <div class="grid-item  midBox smallBox">
                        Change Request
                     </div>

                     <div class="grid-item  midBox smallBox">
                        .
                     </div>

                     <div class="grid-item  midBox smallBox">
                        Change Request
                     </div>

                     <div class="grid-item  midBox smallBox">
                        .
                     </div>
                  <!-- Fim Linha Integration 6 -->

                  <!-- Inicio Linha Integration 7 -->
                     <a href="<?=base_url("TEP/addnew/".$project[0]->project_id) ?>">
                     <div class="grid-item midBox smallBox">
                       Lessons Learned
                     </div>
                     </a>

                     <div class="grid-item midBox bigBox">
                        .
                     </div>

                     <div class="grid-item midBox bigBox">
                        .
                     </div>
                    
                     <div class="grid-item midBox smallBox">
                        .
                     </div>

                     <div class="grid-item midBox smallBox">
                       .
                     </div>

                     <div class="grid-item  midBox smallBox">
                        .
                     </div>

                     <div class="grid-item midBox smallBox">
                        .
                     </div>

                     <div class="grid-item  midBox bigBox">
                        .
                     </div>

                     <div class="grid-item  midBox smallBox">
                        .
                     </div>

                     <div class="grid-item  midBox smallBox">
                        .
                     </div>
                     
                     <div class="grid-item  midBox smallBox">
                        .
                     </div>

                     <div class="grid-item  midBox smallBox">
                        .
                     </div>

                     <div class="grid-item  midBox smallBox">
                        .
                     </div>

                     <div class="grid-item  midBox smallBox">
                        .
                     </div>

                     <div class="grid-item  midBox bigBox">
                        .
                     </div>

                     <div class="grid-item  midBox bigBox">
                        .
                     </div>

                     <div class="grid-item  midBox bigBox">
                        .
                     </div>

                     <div class="grid-item  midBox smallBox">
                        .
                     </div>

                     <div class="grid-item  midBox smallBox">
                        .
                     </div>

                     <div class="grid-item  midBox smallBox">
                        .
                     </div>

                     <div class="grid-item  midBox smallBox">
                        .
                     </div>

                     <div class="grid-item  midBox smallBox">
                        .
                     </div>

                     <div class="grid-item  midBox smallBox">
                        .
                     </div>
                  <!-- Fim Linha Integration 7 -->

                  </div>      


               <hr>

               <!-- <a class="btn btn-workflow btn-lg btn-block" href="<?=base_url()?>Notification_board/notification_board_form/<?php echo $project[0]->project_id;?>">NOTIFICATION BOARD</a> -->
               <div class="col-md-12">
                  <a class="btn btn-warning btn-lg btn-block" href="<?=base_url()?>Notification_board/notification_board_form/<?php echo $project[0]->project_id;?>">NOTIFICATION BOARD</a>
               </div>

            </div>
         </div>
      </div>
   </div>
</div>
<!-- /.lorem ipsum-->
<?php $this->load->view('frame/footer_view')?>