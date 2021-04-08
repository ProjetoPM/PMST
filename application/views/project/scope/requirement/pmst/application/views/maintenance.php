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
  </div>
  <!-- /.col-lg-12 -->
</div>
<!-- /.row -->

<img class="img-responsive center-block" src="<?=base_url()?>assets/images/maintenance.jpg" alt="IMG">
