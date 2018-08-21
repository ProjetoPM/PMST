<link rel="stylesheet" href="<?=base_url()?>assets/css/dashboard_timeline.css">
<div id="page-wrapper">
<?php if($this->session->flashdata('success')):?>
&nbsp;
<div class="alert alert-success">
  <a href="#" class="close" data-dismiss="alert">&times;</a>
  <strong><?php echo $this->session->flashdata('success'); ?></strong>
</div>
<?php elseif($this->session->flashdata('error')):?>
&nbsp;
<div class="alert alert-warning">
  <a href="#" class="close" data-dismiss="alert">&times;</a>
  <strong><?php echo $this->session->flashdata('error'); ?></strong>                
</div>
<?php endif;?>
<div class="row">
  <div class="col-lg-12">
    <h1 class="page-header">Dashboard</h1>
  </div>
  <!-- /.col-lg-12 -->
</div>
<!-- /.row -->
<div class="panel panel-default">
  
  <div class="panel-body">
    <ul class="timeline">
                    <div class="col-md-12">
                        <div class="wel_header">
                            <h2>Mussum Ipsum</h2>
                            <p>Mussum Ipsum, cacilds vidis litro abertis. Sapien in monti palavris qui num significa nadis i pareci latim.</p>
                        </div>
                    </div>
    </ul>
  </div>
  <!-- /.panel-body -->
</div>

<section id="welcome">
            <div class="container">

                <div class="row">
                    <div class="col-md-3">
                        <div class="item">
                            <div class="single_item">                             
                                <div class="item_list">
                                    <div class="welcome_icon">
                                        <i class="fa fa-question"></i>
                                    </div>
                                    <h4>Mussum Ipsum</h4>
                                   <p>Mussum Ipsum, cacilds vidis litro abertis. Sapien in monti palavris qui num significa nadis i pareci latim.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--End of col-md-3-->
                    <div class="col-md-3">
                        <div class="item">
                            <div class="single_item">
                                <div class="item_list">
                                    <div class="welcome_icon">
                                        <i class="fa fa-book"></i>
                                    </div>
                                    <h4>Mussum Ipsum</h4>
                                    <p>Mussum Ipsum, cacilds vidis litro abertis. Sapien in monti palavris qui num significa nadis i pareci latim.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--End of col-md-3-->
                    <div class="col-md-3">
                        <div class="item">
                            <div class="single_item">
                                <div class="item_list">
                                    <div class="welcome_icon">
                                        <i class="fa fa-thumbs-o-up"></i>
                                    </div>
                                    <h4>Mussum Ipsum</h4>
                                    <p>Mussum Ipsum, cacilds vidis litro abertis. Sapien in monti palavris qui num significa nadis i pareci latim.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--End of col-md-3-->
                    <div class="col-md-3">
                        <div class="item">
                            <div class="single_item">
                                <div class="item_list">
                                    <div class="welcome_icon">
                                        <i class="fa fa-compress"></i>
                                    </div>
                                    <h4>Mussum Ipsum</h4>
                                    <p>Mussum Ipsum, cacilds vidis litro abertis. Sapien in monti palavris qui num significa nadis i pareci latim.</p>
                                </div>
                            </div>
                        </div>
                    </div>                    
                </div>                
            </div>            
        </section>        
<img class="img-responsive center-block" src="<?=base_url()?>assets/images/lesse_logo.png" alt="IMG">