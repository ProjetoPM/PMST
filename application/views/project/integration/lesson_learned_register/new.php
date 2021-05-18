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
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <strong><?php echo $this->session->flashdata('success'); ?></strong>
                    </div>
                <?php elseif ($this->session->flashdata('error')) : ?>
                    <div class="alert alert-warning">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <strong><?php echo $this->session->flashdata('error'); ?></strong>
                    </div>
                <?php endif; ?>

                <div class="row">
                    <div class="col-lg-12">

                        <div class="panel-body">
                            <h1 class="page-header">

                                <?= $this->lang->line('llr_title')  ?>

                            </h1>
                            <form action="<?= base_url() ?>integration/lesson-learned-register/update/<?php echo $lesson_learned_register_id; ?>" method="post">
                            <form method="POST" action="<?php echo base_url('integration/lesson-learned-register/insert/'); ?><?php echo $id; ?>">

                                <div class="col-lg-8 form-group">
                                    <label for="stakeholder"><?= $this->lang->line('llr_stakeholder') ?> *</label>
                                    <a class="btn-sm btn-default" id="llr_tp_1" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('llr_stakeholder_tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
                                    <div>
                                        <input id="name_text" name="stakeholder" type="text" class="form-control input-md">
                                    </div>
                                </div>

                                <div class="col-lg-4 form-group">
                                    <label for="date"><?= $this->lang->line('llr_date') ?> *</label>
                                    <a class="btn-sm btn-default" id="llr_tp_2" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('llr_date_tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
                                    <div>
                                        <input id="date" name="date" type="date" class="form-control input-md">
                                    </div>
                                </div>

                                <div class=" col-lg-06 form-group">
                                 <label for="description"><?= $this->lang->line('llr_description') ?> </label>
                                 <span class="llr_3">2000</span><?= $this->lang->line('character') ?>
                                 <a class="btn-sm btn-default" id="llr_tp_3" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('fr_description_tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
                                 <div>
                                  <textarea onkeyup="limite_textarea(this.value, 'fr_3')" id="fr_txt_3" maxlength="2000" oninput="eylem(this, this.value)" class="form-control elasticteste" name="description"></textarea>
                                 </div>
                                </div>

                                <div class="col-lg-4 form-group">
                                    <label for="category"><?= $this->lang->line('llr_category') ?> *</label>
                                    <a class="btn-sm btn-default" id="llr_tp_4" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('llr_category_tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
                                    <div>
                                        <input id="name_text" name="category" type="text" class="form-control input-md">
                                    </div>
                                </div>

                                <div class="col-lg-5 form-group">
                                    <label for="interested"><?= $this->lang->line('llr_interested') ?> *</label>
                                    <a class="btn-sm btn-default" id="llr_tp_5" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('llr_interested_tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
                                    <div>
                                        <input id="name_text" name="interested" type="text" class="form-control input-md">
                                    </div>
                                </div>

                                <div class="col-lg-5 form-group">
                                    <label for="status"><?= $this->lang->line('llr_status') ?> *</label>
                                    <a class="btn-sm btn-default" id="llr_tp_6" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('llr_status_tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
                                    <div>
                                        <input id="name_text" name="status" type="text" class="form-control input-md">
                                    </div>
                                </div>

                                <div class="col-lg-5 form-group">
                                    <label for="impact"><?= $this->lang->line('llr_impact') ?> *</label>
                                    <a class="btn-sm btn-default" id="llr_tp_7" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('llr_impact_tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
                                    <div>
                                        <input id="name_text" name="impact" type="text" class="form-control input-md">
                                    </div>
                                </div>

                                <div class=" col-lg-06 form-group">
                                 <label for="recommendations"><?= $this->lang->line('llr_recommendations') ?> </label>
                                  <span class="fr_8">2000</span><?= $this->lang->line('character') ?>
                                  <a class="btn-sm btn-default" id="fr_tp_8" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('fr_recommendations_tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
                                 <div>
                                 <textarea onkeyup="limite_textarea(this.value, 'fr_8')" id="fr_txt_8" maxlength="2000" oninput="eylem(this, this.value)" class="form-control elasticteste" name="recommendations"></textarea>
                                 </div>
                                </div>

                                <div class="col-lg-6 form-group">
                                    <label for="life_cycle"><?= $this->lang->line('llr_life_cycle') ?> *</label>
                                    <a class="btn-sm btn-default" id="llr_tp_9" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('llr_life_cycle_tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
                                    <div>
                                        <input id="name_text" name="life_cycle" type="text" class="form-control input-md">
                                    </div>
                                </div>

                                <div class="col-lg-4 form-group">
                                    <label>knowledge_area</label>
                                    <select name="knowledge_area" size="1" class="form-control" tabindex="1">
                                        <?php foreach ($knowlege_area as $ka) { ?>
                                        <option value="<?= $ka->knowledge_area_id; ?>"
                                            <?php if (getIdKnowlegeArea($knowledge_area_id) == $t->knowledge_area_id) echo 'selected'; ?>>
                                        </option>
                                    </select>        
                                </div>

                            <div class="col-lg-12">
                                    <button id="lesson_learned_register-submit" type="submit" value="Save" class="btn btn-lg btn-success pull-right">
                                        <i class="glyphicon glyphicon-ok"></i> <?= $this->lang->line('btn-save') ?>
                                    </button>
                            </form>

                            <form action="<?php echo base_url('integration/lesson-learned-register/list/');  ?><?php echo $_SESSION['project_id']; ?>">
                                <button class="btn btn-lg btn-info pull-left"> <i class="glyphicon glyphicon-chevron-left"></i> <?= $this->lang->line('btn-back') ?></button>
                            </form>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</body>

<script>
    for (var i = 1; i <= 10; i++) {
        if (document.getElementById("llr_tp_" + i).title == "") {
            document.getElementById("llr_tp_" + i).hidden = true;
        }
        limite_textarea(document.getElementById("fr_txt_" + i).value, "fr_" + i);
    }
    function limite_textarea(valor, txt) {
		var limite = 2000;
		var caracteresDigitados = valor.length;
		var caracteresRestantes = limite - caracteresDigitados;
		$("." + txt).text(caracteresRestantes);
	}
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.10/jquery.mask.js"></script>
<script type="text/javascript">
    function testInput(event) {
        var value = String.fromCharCode(event.which);
        var pattern = new RegExp(/[a-zåäö ]/i);
        return pattern.test(value);
    }

    $('#name_text').bind('keypress', testInput);
</script>

<?php $this->load->view('frame/footer_view') ?>