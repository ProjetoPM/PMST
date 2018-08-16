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
<div class="panel panel-default">
<div class="panel-body">
<section id="what-we-do">
      <div class="container-fluid">
            <p class="text-center text-muted h5">It has become essential to systematically review.</p>
            <div class="row mt-5">
                  
                  <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 col-xl-6">
                        <div class="card">
                              <div class="card-block block-1">
                              <h3 class="card-title">Description</h3>
                              <p class="card-text"><?= $project[0] -> description;?></p>
                              </div>
                        </div>
                  </div>

                  <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 col-xl-6">
                        <div class="card">
                              <div class="card-block block-2">
                              <h3 class="card-title">Objectives</h3>
                              <p class="card-text"><?= $project[0] -> objectives;?></p>
                              </div>
                        </div>
                  </div>

            </div>
            <?php if(count($members)>1) { ?>
                  <div class="row mt-5">
                        <div class="col-xs-hidden col-sm-6"></div>
                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 col-xl-6">
                              <div class="card">
                                    <div class="card-block block-3">
                                    <h3 class="card-title">Members</h3>
                                    <p class="card-text"><ul><?php foreach ($members as $member) { ?>
                                          <li><?= $member -> name; ?></li><?php } ?></ul></p>
                                    </div>
                              </div>
                        </div>
                        
                  </div>
            <?php } ?>

      </div>   
</section>
</div>
</div>


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



               <img src="<?=base_url()?>assets/images/slr_process.png" alt="bpmn slr" align="center">

             </div>
         </div>
      </div>
   </div>
</div>
<!-- /.lorem ipsum-->
<?php $this->load->view('frame/footer_view')?>