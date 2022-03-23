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

                                <?= $this->lang->line('smp-title')  ?>

                                <?php $view_name = "scope management plan";?>
								<?php $this->load->view('construction_services/rating', array(
									"view_name" => $view_name,
								)) ?>

                            </h1>

                            <!-- avaliação -->
                            <link href="<?= base_url() ?>assets/css/field_evaluation.css" rel="stylesheet" type="text/css">
                            <?php 
                            getViewFields($view_name);
                            ?>
                            <?php $this->load->view('construction_services/write_field_evaluation') ?>

                            <?php

                            foreach ($scope_mp as $smp) {
                            ?>

                                <form method="POST" action="<?php echo base_url('scope/scope-mp/update'); ?>">
                                    <input type="hidden" name="status" value="1">

                                    <div class=" col-lg-12 form-group">
                                        <label for="scope_specification"><?= $this->lang->line('smp-scope_specification') ?></label>
                                        <span class="smp_1">2000</span><?= $this->lang->line('character') ?>
                                        <a class="btn-sm btn-default" id="smp_tp_1" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('smp-scope_specification-tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
                                        <a <?= fieldStatus($view_name, $smp->scope_mp_id, "scope_specification") ?> data-field="scope_specification" data-field_name="<?= $this->lang->line('smp-scope_specification') ?>" data-item_id="<?= $smp->scope_mp_id ?>" data-view="<?= $view_name ?>" data-toggle="modal" data-placement="left" data-target="#write-evaluation" data-tt="tooltip"><i class="glyphicon glyphicon-list-alt"></i></a>
                                        <div>
                                            <textarea onkeyup="limite_textarea(this.value, 'smp_1')" id="smp_txt_1" maxlength="2000" oninput="eylem(this, this.value)" class="form-control elasticteste" name="scope_specification"><?= $smp->scope_specification; ?></textarea>
                                        </div>
                                    </div>

                                    <div class=" col-lg-12 form-group">
                                        <label for="eap_process"><?= $this->lang->line('smp-eap_process') ?></label>
                                        <span class="smp_2">2000</span><?= $this->lang->line('character') ?>
                                        <a class="btn-sm btn-default" id="smp_tp_2" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('smp-eap_process-tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
                                        <a <?= fieldStatus($view_name, $smp->scope_mp_id, "eap_process") ?> data-field="eap_process" data-field_name="<?= $this->lang->line('smp-eap_process') ?>" data-item_id="<?= $smp->scope_mp_id ?>" data-view="<?= $view_name ?>" data-toggle="modal" data-placement="left" data-target="#write-evaluation" data-tt="tooltip"><i class="glyphicon glyphicon-list-alt"></i></a>
                                        <div>
                                            <textarea onkeyup="limite_textarea(this.value, 'smp_2')" id="smp_txt_2" maxlength="2000" oninput="eylem(this, this.value)" class="form-control elasticteste" name="eap_process"><?= $smp->eap_process; ?></textarea>
                                        </div>
                                    </div>

                                    <div class=" col-lg-12 form-group">
                                        <label for="deliveries_acceptance"><?= $this->lang->line('smp-deliveries_acceptance') ?></label>
                                        <span class="smp_3">2000</span><?= $this->lang->line('character') ?>
                                        <a class="btn-sm btn-default" id="smp_tp_3" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('smp-deliveries_acceptance-tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
                                        <a <?= fieldStatus($view_name, $smp->scope_mp_id, "deliveries_acceptance") ?> data-field="deliveries_acceptance" data-field_name="<?= $this->lang->line('smp-deliveries_acceptance') ?>" data-item_id="<?= $smp->scope_mp_id ?>" data-view="<?= $view_name ?>" data-toggle="modal" data-placement="left" data-target="#write-evaluation" data-tt="tooltip"><i class="glyphicon glyphicon-list-alt"></i></a>
                                        <div>
                                            <textarea onkeyup="limite_textarea(this.value, 'smp_3')" id="smp_txt_3" maxlength="2000" oninput="eylem(this, this.value)" class="form-control elasticteste" name="deliveries_acceptance"><?= $smp->deliveries_acceptance; ?></textarea>
                                        </div>
                                    </div>

                                    <div class=" col-lg-12 form-group">
                                        <label for="scope_change_mp"><?= $this->lang->line('smp-scope_change_mp') ?></label>
                                        <span class="smp_4">2000</span><?= $this->lang->line('character') ?>
                                        <a class="btn-sm btn-default" id="smp_tp_4" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('smp-scope_change_mp-tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
                                        <a <?= fieldStatus($view_name, $smp->scope_mp_id, "scope_change_mp") ?> data-field="scope_change_mp" data-field_name="<?= $this->lang->line('smp-scope_change_mp') ?>" data-item_id="<?= $smp->scope_mp_id ?>" data-view="<?= $view_name ?>" data-toggle="modal" data-placement="left" data-target="#write-evaluation" data-tt="tooltip"><i class="glyphicon glyphicon-list-alt"></i></a>
                                        <div>
                                            <textarea onkeyup="limite_textarea(this.value, 'smp_4')" id="smp_txt_4" maxlength="2000" oninput="eylem(this, this.value)" class="form-control elasticteste" name="scope_change_mp"><?= $smp->scope_change_mp; ?></textarea>
                                        </div>
                                    </div>

                                    <div class="col-lg-12 form-group">
                                        <label for="baseline"><?= $this->lang->line('smp-baseline') ?></label>
                                        <span class="smp_5">2000</span><?= $this->lang->line('character') ?>
                                        <a class="btn-sm btn-default" id="smp_tp_5" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('smp-baseline-tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
                                        <a <?= fieldStatus($view_name, $smp->scope_mp_id, "baseline") ?> data-field="baseline" data-field_name="<?= $this->lang->line('smp-baseline') ?>" data-item_id="<?= $smp->scope_mp_id ?>" data-view="<?= $view_name ?>" data-toggle="modal" data-placement="left" data-target="#write-evaluation" data-tt="tooltip"><i class="glyphicon glyphicon-list-alt"></i></a>
                                        <div>
                                            <textarea onkeyup="limite_textarea(this.value, 'smp_5')" id="smp_txt_5" maxlength="2000" oninput="eylem(this, this.value)" class="form-control elasticteste" name="baseline"><?= $smp->baseline; ?></textarea>
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
<script src="<?= base_url() ?>assets/js/jquery-1.11.1.js" type="text/javascript"></script>
<script type="text/javascript">
    for (var i = 1; i <= 6; i++) {
        if (document.getElementById("smp_tp_" + i).title == "") {
            document.getElementById("smp_tp_" + i).hidden = true;
        }
        limite_textarea(document.getElementById("smp_txt_" + i).value, "smp_" + i);
    }

    function limite_textarea(valor, txt) {
        var limite = 2000;
        var caracteresDigitados = valor.length;
        var caracteresRestantes = limite - caracteresDigitados;
        $("." + txt).text(caracteresRestantes);
    }
</script>
<?php $this->load->view('frame/footer_view') ?>