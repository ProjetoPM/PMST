<div id="page-wrapper">
	<div class="row">
		<div class="col-lg-12">
			<h1 class="page-header"> <?=$this->lang->line('wbs-title')  ?></h1>
		</div>
		<!-- /.col-lg-12 -->
	</div>
	<!-- /.row -->
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


									<!--1º preencher o nome da view-->
									<?php $view = array(
									  "name" => "wbs",
									); ?>

									<!--Carrega o form de envio e envia para ele o nome da view que tu setou -->
									<?php $this->load->view('upload/index', $view) ?>
                  <br>
                  <div>
									<!--Carrega as imagens do projeto de acordo com a view, utiliza id ou project_id pra pegar o id do projeto e criar a query-->
									<?php $this->load->view('upload/retrieve', $view) ?>
                  <form action="<?php echo base_url('project/'); ?><?php echo $id; ?>" >
                    <button class="btn btn-lg btn-info pull-left" >  <i class="glyphicon glyphicon-chevron-left"></i> <?=$this->lang->line('btn-back')?></button>
                  </form>
                  </div>


									<?php $this->load->view('frame/footer_view')?>
