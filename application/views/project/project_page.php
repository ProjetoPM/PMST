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
               <strong>SYSTEMATIC REVIEW PROCESS</strong>
            </h3>
         </div>
         <div class="panel-body text-justify">
            <div class="panel-body text-center">

               <!-- Inicio  -->
              <!--  <div class="col-lg-2 grid-container" style="grid-auto-flow: line">
                  <div class="grid-item">
                     
                  </div>

                  <div class="grid-item">
                     <label class="btn btn-lg btn-primary mesmo-tamanho" for="check">
                        <input type="checkbox" id="check">
                        Initiating
                     </label>
                  </div>
                  <div class="grid-item">
                     <label class="btn btn-lg btn-primary mesmo-tamanho" for="check">
                        <input type="checkbox" id="check">
                        Planning
                     </label>
                  </div>
                  <div class="grid-item">
                     <label class="btn btn-lg btn-primary" for="check">
                        <input type="checkbox" id="check">
                        Executing
                     </label>
                  </div>
                  <div class="grid-item">
                     <label class="btn btn-lg btn-primary" for="check">
                        <input type="checkbox" id="check">
                        Monitoring & Controlling
                     </label>
                  </div>
                  <div class="grid-item">
                     <label class="btn btn-lg btn-primary" for="check">
                        <input type="checkbox" id="check">
                        Closing
                     </label>
                  </div>
               </div> -->
               <!-- Fim -->

               <!-- Inicio Coluna 1 -->
               <div class="col-lg-2 grid-container" style="grid-auto-flow: column">
               
                 <div class="grid-item caixaLat">
                   Integration
                 </div>
                 <div class="grid-item caixaLat">
                   Scope
                 </div>
                 <div class="grid-item caixaLat">
                   Time
                 </div>
                 <div class="grid-item caixaLat">
                   Cost
                 </div>
                 <div class="grid-item caixaLat">
                   Quality
                 </div>  
                 <div class="grid-item caixaLat">
                   Human Resource
                 </div>
                 <div class="grid-item caixaLat">
                   Communication
                 </div>  
                 <div class="grid-item caixaLat">
                   Risk
                 </div>
                 <div class="grid-item caixaLat">
                   Procurement
                 </div>
                 <div class="grid-item caixaLat">
                   Stakeholder
                 </div>
               </div>
               <!-- Fim Coluna 1 -->

                <!-- Inicio Coluna 2 -->
               <div class="col-lg-2 grid-container" style="grid-auto-flow: column">
               
                  <a  href="<?=base_url("Tap/addTap/".$project[0]->project_id) ?>">
                  <div class="grid-item caixaLat">
                      Tap
                  </div>
                  </a>

                 <div class="grid-item">
                  <a class="btn btn-workflow btn-lg" href="<?=base_url("Tap/addTap/".$project[0]->project_id) ?>">TAP</a>
                 </div>
                 
                 <div class="grid-item caixaLat">
                   
                 </div>

                 <div class="grid-item caixaLat">
                   
                 </div>

                 <div class="grid-item caixaLat">
                   
                 </div>  

                 <div class="grid-item caixaLat">
                   
                 </div>

                 <div class="grid-item caixaLat">
                   
                 </div>  

                 <div class="grid-item caixaLat">
                   
                 </div>

                 <div class="grid-item caixaLat">
                   
                 </div>

                 <div class="grid-item caixaLat">
                   
                 </div>
               </div>
               <!-- Fim Coluna 2 -->

            </div>
         </div>
      </div>
   </div>
</div>
<!-- /.lorem ipsum-->
<?php $this->load->view('frame/footer_view')?>