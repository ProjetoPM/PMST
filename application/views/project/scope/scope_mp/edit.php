<body class="hold-transition skin-gray sidebar-mini">
    <script>
        (function() {
            if (Boolean(sessionStorage.getItem('sidebar-toggle-collapsed'))) {
                var body = document.getElementsByTagName('body')[0];
                body.className = body.className + ' sidebar-collapse';
            }
        })();
    </script>
    <div class="wrapper">
        <div class="content-wrapper">
            <section class="content">
                <?php if ($this->session->flashdata('success')) : ?>
                    <div class="alert alert-success">
                        <a href="#" class="close" data-dismiss="alert">&times;</a>
                        <strong><?php echo $this->session->flashdata('success'); ?></strong>
                    </div>
                <?php elseif ($this->session->flashdata('error')) : ?>
                    <div class="alert alert-warning">
                        <a href="#" class="close" data-dismiss="alert">&times;</a>
                        <strong><?php echo $this->session->flashdata('error'); ?></strong>
                    </div>
                <?php endif; ?>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel-body">
                            <h1 class="page-header">

                                <?= $this->lang->line('tap-title')  ?>

                            </h1>
                            <?php

                            foreach ($scope_mp as $smp) {
                            ?>

                                <form method="POST" action="<?php echo base_url('scope/scope-mp/update/'); ?>">
                                    <input type="hidden" name="status" value="1">

                                    <div class=" col-lg-12 form-group">
                                        <label for="scope_specification"><?= $this->lang->line('scope_specification') ?></label>
                                        <a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('scope_specification-tooltip') ?>"><i class="glyphicon glyphicon-comment"></i></a>
                                        <div>
                                            <textarea oninput="eylem(this, this.value)" class="form-control elasticteste" id="scope_specification" name="scope_specification"><?php echo $smp->scope_specification; ?></textarea>
                                        </div>
                                    </div>

                                    <div class=" col-lg-12 form-group">
                                        <label for="eap_process"><?= $this->lang->line('eap_process') ?></label>
                                        <a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('eap_process-tooltip') ?>"><i class="glyphicon glyphicon-comment"></i></a>
                                        <div>
                                            <textarea oninput="eylem(this, this.value)" class="form-control elasticteste" id="eap_process" name="eap_process"><?php echo $smp->eap_process; ?></textarea>
                                        </div>
                                    </div>

                                    <div class=" col-lg-12 form-group">
                                        <label for="deliveries_acceptance"><?= $this->lang->line('deliveries_acceptance') ?></label>
                                        <a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('deliveries_acceptance-tooltip') ?>"><i class="glyphicon glyphicon-comment"></i></a>
                                        <div>
                                            <textarea oninput="eylem(this, this.value)" class="form-control elasticteste" id="deliveries_acceptance" name="deliveries_acceptance"><?php echo $smp->deliveries_acceptance; ?></textarea>
                                        </div>
                                    </div>

                                    <div class=" col-lg-12 form-group">
                                        <label for="scope_change_mp"><?= $this->lang->line('scope_change_mp') ?></label>
                                        <a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('scope_change_mp-tooltip') ?>"><i class="glyphicon glyphicon-comment"></i></a>
                                        <div>
                                            <textarea oninput="eylem(this, this.value)" class="form-control elasticteste" id="scope_change_mp" name="scope_change_mp"><?php echo $smp->scope_change_mp; ?></textarea>
                                        </div>
                                    </div>


                                    <div class="col-lg-12">
                                        <button id="tap-submit" type="submit" value="Save" class="btn btn-lg btn-success pull-right">
                                            <i class="glyphicon glyphicon-ok"></i>
                                            <?= $this->lang->line('btn-save') ?>
                                        </button>
                                </form>
                                <form action="<?php echo base_url('project/'); ?><?php echo $_SESSION['project_id']; ?>">
                                    <button class="btn btn-lg btn-info pull-left"><i class="glyphicon glyphicon-chevron-left"></i> <?= $this->lang->line('btn-back') ?></button>
                                </form>

                            <?php  } ?>


                            <!-- Envia o nome da view como parametro -->
                            <?php $view = array(
                                "name" => "scope_management_plan",
                            ); ?>

                            <!--aqui-->

                            <!--Carrega o form de envio-->
                            <?php $this->load->view('upload/index', $view) ?>
                            <!--Carrega as imagens do projeto-->
                            <?php $this->load->view('upload/retrieve', $view) ?>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</body>

<?php $this->load->view('frame/footer_view') ?>