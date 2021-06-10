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
                            <!-- <form action="<?= base_url() ?>integration/lesson-learned-register/update/<?php echo $lesson_learned_register_id; ?>" method="post"> -->
                            <form method="POST" action="<?php echo base_url('integration/lesson-learned-register/insert/'); ?><?php echo $id; ?>">

                                <div class="col-lg-9 form-group">
                                    <label for="stakeholder"><?= $this->lang->line('llr_stakeholder') ?> *</label>
                                    <span class="llr_1">2000</span><?= $this->lang->line('character') ?>
                                    <a class="btn-sm btn-default" id="llr_tp_1" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('llr_stakeholder_tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
                                    <div>
                                    <input id="llr_txt_1" type="text" name="stakeholder" class="form-control input-md" onkeyup = "limite_textarea(this.value, 'llr_1')" maxlength="2000" oninput="eylem(this, this.value)" required="false">
                                    </div>
                                </div>

                                <div class="col-lg-3 form-group">
                                    <label for="date"><?= $this->lang->line('llr_date') ?> *</label>
                                    <a class="btn-sm btn-default" id="llr_tp_2" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('llr_date_tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
                                    <div>
                                        <input id="date" name="date" type="date" class="form-control input-md">
                                    </div>
                                </div>

                                <div class=" col-lg-12 form-group">
                                 <label for="description"><?= $this->lang->line('llr_description') ?> </label>
                                 <span class="llr_3">2000</span><?= $this->lang->line('character') ?>
                                 <a class="btn-sm btn-default" id="llr_tp_3" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('llr_description_tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
                                 
                                 <div>
                                  <textarea onkeyup="limite_textarea(this.value, 'llr_3')" id="llr_txt_3" maxlength="2000" oninput="eylem(this, this.value)" class="form-control elasticteste" name="description"></textarea>
                                 </div>
                                </div>

                                <div class="col-lg-6 form-group">
                                    <label for="category"><?= $this->lang->line('llr_category') ?> *</label>
                                    <span class="llr_4">2000</span><?= $this->lang->line('character') ?>
                                    <a class="btn-sm btn-default" id="llr_tp_4" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('llr_category_tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
                                    <div>
                                    <input id="llr_txt_4" type="text" name="category" class="form-control input-md" onkeyup = "limite_textarea(this.value, 'llr_4')" maxlength="2000" oninput="eylem(this, this.value)" required="false">
                                    </div>
                                </div>

                                <div class="col-lg-6 form-group">
                                    <label for="interested"><?= $this->lang->line('llr_interested') ?> *</label>
                                    <span class="llr_5">2000</span><?= $this->lang->line('character') ?>
                                    <a class="btn-sm btn-default" id="llr_tp_5" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('llr_interested_tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
                                    <div>
                                    <input id="llr_txt_5" type="text" name="interested" class="form-control input-md" onkeyup = "limite_textarea(this.value, 'llr_5')" maxlength="2000" oninput="eylem(this, this.value)" required="false">
                                    </div>
                                </div>

                                <div class="col-lg-6 form-group">
                                    <label for="status"><?= $this->lang->line('llr_status') ?> *</label>
                                    <span class="llr_6">2000</span><?= $this->lang->line('character') ?>
                                    <a class="btn-sm btn-default" id="llr_tp_6" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('llr_status_tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
                                    <div>
                                    <input id="llr_txt_6" type="text" name="status" class="form-control input-md" onkeyup = "limite_textarea(this.value, 'llr_6')" maxlength="2000" oninput="eylem(this, this.value)" required="false">
                                    </div>
                                </div>

                                <div class="col-lg-6 form-group">
                                    <label for="impact"><?= $this->lang->line('llr_impact') ?> *</label>
                                    <span class="llr_7">2000</span><?= $this->lang->line('character') ?>
                                    <a class="btn-sm btn-default" id="llr_tp_7" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('llr_impact_tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
                                    <div>
                                    <input id="llr_txt_7" type="text" name="impact" class="form-control input-md" onkeyup = "limite_textarea(this.value, 'llr_7')" maxlength="2000" oninput="eylem(this, this.value)" required="false">
                                    </div>
                                </div>

                                <div class=" col-lg-12 form-group">
                                 <label for="recommendations"><?= $this->lang->line('llr_recommendations') ?> </label>
                                  <span class="llr_8">2000</span><?= $this->lang->line('character') ?>
                                  <a class="btn-sm btn-default" id="llr_tp_8" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('llr_recommendations_tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
                                 <div>
                                 <textarea onkeyup="limite_textarea(this.value, 'llr_8')" id="llr_txt_8" maxlength="2000" oninput="eylem(this, this.value)" class="form-control elasticteste" name="recommendations"></textarea>
                                 </div>
                                </div>

                                <div class="col-lg-6 form-group">
                                    <label for="life_cycle"><?= $this->lang->line('llr_life_cycle') ?> *</label>
                                    <span class="llr_9">2000</span><?= $this->lang->line('character') ?>
                                    <a class="btn-sm btn-default" id="llr_tp_9" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('llr_life_cycle_tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
                                    <div>
                                    <input id="llr_txt_9" type="text" name="life_cycle" class="form-control input-md" onkeyup = "limite_textarea(this.value, 'llr_9')" maxlength="2000" oninput="eylem(this, this.value)" required="false">
                                    </div>
                                </div>

                                <div class="col-lg-4 form-group">
                                <label for ="knowledge_area"><?= $this->lang->line('llr_knowledge_area') ?></label>
                                    <select name="knowledge_area" size="1" class="form-control" tabindex="1">
                                        <?php foreach ($knowledge_area as $ka) { ?>
                                        <option value="<?= $ka->knowledge_area_id; ?>">
                                        
                                        <?= $ka->name ?>
                                            </option>
                                            <?php } ?>
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
        limite_textarea(document.getElementById("llr_txt_" + i).value, "llr_" + i);
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