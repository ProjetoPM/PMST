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
                    
                     <div class="grid-item transparentBox">
                        .
                     </div>

                     <div class="grid-item menuTopPhases">
                      Initiating
                     </div>

                     <div class="grid-item menuTopPhases">
                      Planning
                     </div>
                    
                     <div class="grid-item menuTopPhases">
                      Executing
                     </div>

                      <div class="grid-item menuTopPhases">
                      Monitoring & Controlling
                     </div>

                     <div class="grid-item menuTopPhases">
                     Closing
                     </div>
                  </div>
               </div>
               <!-- Fim Top Phases-->

               <!-- Inicio Linha 1 -->
               <div class="row">
                  <div class="col-lg-2 grid-container" style="grid-auto-flow: line">
                    
                     <div class="grid-item sideBox">
                        Integration
                     </div>

                     <a  href="<?=base_url("Tap/addTap/".$project[0]->project_id) ?>">
                     <div class="grid-item midBox">
                         Tap
                     </div>
                     </a>

                     <div class="grid-item midBox">
                        .
                     </div>
                    
                     <div class="grid-item midBox">
                        .
                     </div>

                     <div class="grid-item midBox">
                        .
                     </div>

                     <div class="grid-item midBox">
                        .
                     </div>
                  </div>
               </div>
               <!-- Fim Linha 1 -->

               <!-- Inicio Linha 2 -->
               <div class="row">
                  <div class="col-lg-2 grid-container" style="grid-auto-flow: line">
                    
                     <div class="grid-item sideBox">
                        Scope
                     </div>

                     <div class="grid-item transparentBox">
                        .
                     </div>

                     <div class="grid-item midBox">
                        .
                     </div>
                    
                     <div class="grid-item midBox">
                        .
                     </div>

                     <div class="grid-item midBox">
                        .
                     </div>

                     <div class="grid-item midBox">
                        .
                     </div>
                  </div>
               </div>
               <!-- Fim Linha 2 -->

               <!-- Inicio Linha 3 -->
               <div class="row">
                  <div class="col-lg-2 grid-container" style="grid-auto-flow: line">
                    
                     <div class="grid-item sideBox">
                        Time
                     </div>

                     <div class="grid-item transparentBox">
                        .
                     </div>

                     <a href="<?=base_url("Schedule/schedule_form/".$project[0]->project_id) ?>">
                     <div class="grid-item midBox">
                      Schedule
                     </div>
                     </a>
                    
                     <div class="grid-item midBox">
                        .
                     </div>

                     <div class="grid-item midBox">
                        .
                     </div>

                     <div class="grid-item midBox">
                        .
                     </div>
                  </div>
               </div>
               <!-- Fim Linha 3 -->

               <!-- Inicio Linha 4 -->
               <div class="row">
                  <div class="col-lg-2 grid-container" style="grid-auto-flow: line">
                    
                     <div class="grid-item sideBox">
                        Cost
                     </div>

                     <div class="grid-item transparentBox">
                        .
                     </div>

                     <a href="<?=base_url("GerenciarCustos/addnew/".$project[0]->project_id)?>">
                     <div class="grid-item midBox">
                        Cost
                     </div>
                     </a>
                    
                     <div class="grid-item midBox">
                        .
                     </div>

                     <div class="grid-item midBox">
                        .
                     </div>

                     <div class="grid-item midBox">
                        .
                     </div>
                  </div>
               </div>
               <!-- Fim Linha 4 -->

               <!-- Inicio Linha 5 -->
               <div class="row">
                  <div class="col-lg-2 grid-container" style="grid-auto-flow: line">
                    
                     <div class="grid-item sideBox">
                        Quality
                     </div>

                     <div class="grid-item transparentBox">
                        .
                     </div>

                     <a href="<?=base_url()?>Charter_Quality/addnew/<?php echo $project[0]->project_id;?>">
                     <div class="grid-item midBox">
                      PMQ  
                     </div>  
                     </a>
                    
                     <div class="grid-item midBox">
                        .
                     </div>

                     <div class="grid-item midBox">
                        .
                     </div>

                     <div class="grid-item midBox">
                        .
                     </div>
                  </div>
               </div>
               <!-- Fim Linha 5 -->

               <!-- Inicio Linha 6 -->
               <div class="row">
                  <div class="col-lg-2 grid-container" style="grid-auto-flow: line">
                    
                     <div class="grid-item sideBox sideBoxBig">
                        Human Resource
                     </div>

                     <div class="grid-item transparentBox">
                        .
                     </div>

                     <a href="<?=base_url("Human_resource/human_resource_form/".$project[0]->project_id) ?>">
                     <div class="grid-item midBox midBoxBig">
                      Human Resource
                     </div>
                     </a>
                    
                     <div class="grid-item midBox">
                        .
                     </div>

                     <div class="grid-item midBox">
                        .
                     </div>

                     <div class="grid-item midBox">
                        .
                     </div>
                  </div>
               </div>
               <!-- Fim Linha 6 -->

               <!-- Inicio Linha 7 -->
               <div class="row">
                  <div class="col-lg-2 grid-container" style="grid-auto-flow: line">
                    
                     <div class="grid-item sideBox">
                        Communication
                     </div>

                     <div class="grid-item transparentBox">
                        .
                     </div>

                     <a href="<?=base_url()?>communication_item/communication_form/<?php echo $project[0]->project_id;?>">
                     <div class="grid-item midBox midBoxBig">
                        Communication Item
                     </div>
                     </a>

                     <div class="grid-item midBox">
                        .
                     </div>

                     <div class="grid-item midBox">
                        .
                     </div>

                     <div class="grid-item midBox">
                        .
                     </div>
                  </div>
               </div>
               <!-- Fim Linha 7 -->

               <!-- Inicio Linha 8 -->
               <div class="row">
                  <div class="col-lg-2 grid-container" style="grid-auto-flow: line">
                    
                     <div class="grid-item sideBox">
                        Risk
                     </div>

                     <div class="grid-item transparentBox">
                        .
                     </div>

                     <a href="<?=base_url()?>risk/risk_form/<?php echo $project[0]->project_id;?>">
                     <div class="grid-item midBox">
                        Risks 
                     </div>
                     </a>
                    
                     <div class="grid-item midBox">
                        .
                     </div>

                     <div class="grid-item midBox">
                        .
                     </div>

                     <div class="grid-item midBox">
                        .
                     </div>
                  </div>
               </div>
               <!-- Fim Linha 8 -->

               <!-- Inicio Linha 9 -->
               <div class="row">
                  <div class="col-lg-2 grid-container" style="grid-auto-flow: line">
                    
                     <div class="grid-item sideBox">
                        Procurement
                     </div>

                     <div class="grid-item transparentBox">
                        .
                     </div>

                     <a href="<?=base_url()?>/procurement/procurement_form/<?php echo $project[0]->project_id;?>">
                     <div class="grid-item midBox">
                        Procurement
                     </div>
                     </a>
                    
                     <div class="grid-item midBox">
                        .
                     </div>

                     <div class="grid-item midBox">
                        .
                     </div>

                     <div class="grid-item midBox">
                        .
                     </div>
                  </div>
               </div>
               <!-- Fim Linha 9 -->

               <!-- Inicio Linha 10 -->
               <div class="row">
                  <div class="col-lg-2 grid-container" style="grid-auto-flow: line">
                    
                     <div class="grid-item sideBox">
                        Stakeholder
                     </div>

                     <a href="<?=base_url("GerenciarStake/addnew/".$project[0]->project_id) ?>">
                     <div class="grid-item midBox midBoxBig">
                        Stakeholder Register
                     </div>
                     </a>

                     <a href="<?=base_url("Stakeholder_mp/stakeholder_mp_form/".$project[0]->project_id) ?>">
                     <div class="grid-item midBox midBoxBig">
                       Stakeholder MP
                     </div>
                     </a>
                    
                     <div class="grid-item midBox">
                        .
                     </div>

                     <div class="grid-item midBox">
                        .
                     </div>

                     <div class="grid-item midBox">
                        .
                     </div>
                  </div>
               </div>
               <!-- Fim Linha 10 -->
               
               <!-- Fim Phases -->

            </div>
         </div>
      </div>
   </div>
</div>
<!-- /.lorem ipsum-->
<?php $this->load->view('frame/footer_view')?>