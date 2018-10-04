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
               
               <!-- Inicio Phases -->

               <!-- Inicio Top Phases -->
               <div class="row">
                  <div class="col-lg-2 grid-container" style="grid-auto-flow: line">
                    
                     <div class="grid-item transparentBox bigBox">
                        .
                     </div>

                     <div class="grid-item menuBox bigBox">
                      Initiating
                     </div>

                     <div class="grid-item menuBox bigBox">
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

               <!-- Inicio Linha 1 -->
               <div class="row">
                  <div class="col-lg-2 grid-container" style="grid-auto-flow: line">
                    
                     <div class="grid-item sideBox bigBox">
                        Integration
                     </div>

                     <a  href="<?=base_url("Tap/addTap/".$project[0]->project_id) ?>">
                     <div class="grid-item midBox bigBox">
                         TAP
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

                     <a href="<?=base_url("TEP/addnew/".$project[0]->project_id) ?>">
                     <div class="grid-item midBox bigBox">
                        TEP
                     </div>
                     </a>
                  </div>
               </div>
               <!-- Fim Linha 1 -->

               <!-- Inicio Linha 2 -->
               <div class="row">
                  <div class="col-lg-2 grid-container" style="grid-auto-flow: line">
                    
                     <div class="grid-item sideBox bigBox">
                        Scope
                     </div>

                     <div class="grid-item transparentBox bigBox">
                        .
                     </div>

                     <div class="grid-item midBox bigBox">
                        .
                     </div>
                    
                     <div class="grid-item transparentBox bigBox">
                        .
                     </div>

                     <div class="grid-item midBox bigBox">
                        .
                     </div>

                     <div class="grid-item transparentBox bigBox">
                        .
                     </div>
                  </div>
               </div>
               <!-- Fim Linha 2 -->

               <!-- Inicio Linha 3 -->
               <div class="row">
                  <div class="col-lg-2 grid-container" style="grid-auto-flow: line">
                    
                     <div class="grid-item sideBox bigBox">
                        Time
                     </div>

                     <div class="grid-item transparentBox bigBox">
                        .
                     </div>

                     <a href="<?=base_url("Schedule/schedule_form/".$project[0]->project_id) ?>">
                     <div class="grid-item midBox bigBox">
                      Schedule
                     </div>
                     </a>
                    
                     <div class="grid-item transparentBox bigBox">
                        .
                     </div>

                     <div class="grid-item midBox bigBox">
                        .
                     </div>

                     <div class="grid-item transparentBox bigBox">
                        .
                     </div>
                  </div>
               </div>
               <!-- Fim Linha 3 -->

               <!-- Inicio Linha 4 -->
               <div class="row">
                  <div class="col-lg-2 grid-container" style="grid-auto-flow: line">
                    
                     <div class="grid-item sideBox bigBox">
                        Cost
                     </div>

                     <div class="grid-item transparentBox bigBox">
                        .
                     </div>

                     <a href="<?=base_url("GerenciarCustos/addnew/".$project[0]->project_id)?>">
                     <div class="grid-item midBox bigBox">
                        Cost
                     </div>
                     </a>
                    
                     <div class="grid-item transparentBox bigBox">
                        .
                     </div>

                     <div class="grid-item midBox bigBox">
                        .
                     </div>

                     <div class="grid-item transparentBox bigBox">
                        .
                     </div>
                  </div>
               </div>
               <!-- Fim Linha 4 -->

               <!-- Inicio Linha 5 -->
               <div class="row">
                  <div class="col-lg-2 grid-container" style="grid-auto-flow: line">
                    
                     <div class="grid-item sideBox bigBox">
                        Quality
                     </div>

                     <div class="grid-item transparentBox bigBox">
                        .
                     </div>

                     <a href="<?=base_url()?>Charter_Quality/addnew/<?php echo $project[0]->project_id;?>">
                     <div class="grid-item midBox bigBox">
                      PMQ  
                     </div>  
                     </a>
                    
                     <div class="grid-item midBox bigBox">
                        .
                     </div>

                     <div class="grid-item midBox bigBox">
                        .
                     </div>

                     <div class="grid-item transparentBox bigBox">
                        .
                     </div>
                  </div>
               </div>
               <!-- Fim Linha 5 -->

               <!-- Inicio Linha 6 -->
               <div class="row">
                  <div class="col-lg-2 grid-container" style="grid-auto-flow: line">
                    
                     <div class="grid-item sideBox smallBox">
                        Human Resource
                     </div>

                     <div class="grid-item transparentBox bigBox">
                        .
                     </div>

                     <a href="<?=base_url("Human_resource/human_resource_form/".$project[0]->project_id) ?>">
                     <div class="grid-item midBox smallBox">
                      Human Resource
                     </div>
                     </a>
                    
                     <div class="grid-item midBox bigBox">
                        .
                     </div>

                     <a href="<?=base_url("Ade/getAde_form/".$project[0]->project_id) ?>">
                     <div class="grid-item midBox bigBox">
                        TPE<!-- Team Performance Ealuation -->
                     </div>
                     </a>

                     <div class="grid-item transparentBox bigBox">
                        .
                     </div>
                  </div>
               </div>
               <!-- Fim Linha 6 -->

               <!-- Inicio Linha 7 -->
               <div class="row">
                  <div class="col-lg-2 grid-container" style="grid-auto-flow: line">
                    
                     <div class="grid-item sideBox bigBox">
                        Communication
                     </div>

                     <div class="grid-item transparentBox bigBox">
                        .
                     </div>

                     <a href="<?=base_url()?>communication_item/communication_form/<?php echo $project[0]->project_id;?>">
                     <div class="grid-item midBox midBoxBig smallBox">
                        Communication Management
                     </div>
                     </a>

                     <div class="grid-item transparentBox bigBox">
                        .
                     </div>

                     <div class="grid-item midBox smallBox">
                        Communication Change
                     </div>

                     <div class="grid-item transparentBox bigBox">
                        .
                     </div>
                  </div>
               </div>
               <!-- Fim Linha 7 -->

               <!-- Inicio Linha 8 -->
               <div class="row">
                  <div class="col-lg-2 grid-container" style="grid-auto-flow: line">
                    
                     <div class="grid-item sideBox bigBox">
                        Risk
                     </div>

                     <a href="<?=base_url("RegisterRisk/addnew/".$project[0]->project_id) ?>">
                     <div class="grid-item midBox smallBox">
                        Register Risks
                     </div>
                     </a>

                     <a href="<?=base_url()?>risk/risk_form/<?php echo $project[0]->project_id;?>">
                     <div class="grid-item midBox bigBox">
                        Risks 
                     </div>
                     </a>
                    
                     <div class="grid-item transparentBox bigBox">
                        .
                     </div>

                     <a href="<?=base_url("Issues_Record/addIssuesRecord/".$project[0]->project_id) ?>">
                     <div class="grid-item midBox bigBox">
                        Issues Record
                     </div>
                     </a>
                     <div class="grid-item transparentBox bigBox">
                        .
                     </div>
                  </div>
               </div>
               <!-- Fim Linha 8 -->

               <!-- Inicio Linha 9 -->
               <div class="row">
                  <div class="col-lg-2 grid-container" style="grid-auto-flow: line">
                    
                     <div class="grid-item sideBox bigBox">
                        Procurement
                     </div>

                     <div class="grid-item transparentBox bigBox">
                        .
                     </div>

                     <a href="<?=base_url()?>/procurement/procurement_form/<?php echo $project[0]->project_id;?>">
                     <div class="grid-item midBox bigBox">
                        Procurement
                     </div>
                     </a>
                    
                     <div class="grid-item midBox bigBox">
                        .
                     </div>

                     <div class="grid-item midBox bigBox">
                        .
                     </div>

                     <div class="grid-item transparentBox bigBox">
                        .
                     </div>
                  </div>
               </div>
               <!-- Fim Linha 9 -->

               <!-- Inicio Linha 10 -->
               <div class="row">
                  <div class="col-lg-2 grid-container" style="grid-auto-flow: line">
                    
                     <div class="grid-item sideBox bigBox">
                        Stakeholder
                     </div>

                     <a href="<?=base_url("GerenciarStake/addnew/".$project[0]->project_id) ?>">
                     <div class="grid-item midBox smallBox">
                        Stakeholder Register
                     </div>
                     </a>

                     <a href="<?=base_url("Stakeholder_mp/stakeholder_mp_form/".$project[0]->project_id) ?>">
                     <div class="grid-item midBox smallBox">
                       Stakeholder MP
                     </div>
                     </a>
                    
                     <div class="grid-item midBox bigBox">
                        .
                     </div>

                     <div class="grid-item midBox bigBox">
                        .
                     </div>

                     <div class="grid-item transparentBox bigBox">
                        .
                     </div>
                  </div>
               </div>
               <!-- Fim Linha 10 -->
               
               <!-- Fim Phases -->

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