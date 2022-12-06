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

                                <?= $this->lang->line('cpd_title')  ?>

                            </h1>

                            <form method="POST" action="<?php echo base_url('procurement/closed-procurement-documentation/insert/'); ?><?php echo $id; ?>">

                            <div class="col-lg-5 form-group">
                                    <label for="provider"><?= $this->lang->line('cpd_provider') ?> *</label>
									<span class="cpd_1">2000</span><?= $this->lang->line('character') ?>
                                    <a class="btn-sm btn-default" id="cpd_tp_1" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('cpd_provider_tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
                                    <div>
									<input id="cpd_txt_1" type="text" name="provider" class="form-control input-md" onkeyup = "limite_textarea(this.value, 'cpd_1')" maxlength="2000" oninput="eylem(this, this.value)" required="true" >

                                    </div>
                                </div>



                                <div class="col-lg-5 form-group">
                                    <label for="supplier_representative"><?= $this->lang->line('cpd_supplier_representative') ?> *</label>
									<span class="cpd_2">2000</span><?= $this->lang->line('character') ?>
                                    <a class="btn-sm btn-default" id="cpd_tp_2" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('cpd_supplier_representative_tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
                                    <div>
									<input id="cpd_txt_2" type="text" name="supplier_representative" class="form-control input-md" onkeyup = "limite_textarea(this.value, 'cpd_2')" oninput="eylem(this, this.value)" required="true" >
                                    </div>
                                </div>

                                <div class="col-lg-6 form-group">
                                    <label for="main_deliveries"><?= $this->lang->line('cpd_main_deliveries') ?> *</label>
									<span class="cpd_3">2000</span><?= $this->lang->line('character') ?>
                                    <a class="btn-sm btn-default" id="cpd_tp_3" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('cpd_main_deliveries_tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
                                    <div>
									<input id="cpd_txt_3" type="text" name="main_deliveries" class="form-control input-md" onkeyup = "limite_textarea(this.value, 'cpd_3')" maxlength="2000" oninput="eylem(this, this.value)" required="true" >
                                    </div>
                                </div>

                                <div class="col-lg-3 form-group">
                                    <label for="closing_date"><?= $this->lang->line('cpd_closing_date') ?> *</label>
                                    <a class="btn-sm btn-default" id="cpd_tp_4" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('cpd_closing_date_tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
                                    <div>
									<input id="cpd_txt_4" type="date" name="closing_date" class="form-control input-md" onkeyup = "limite_textarea(this.value, 'cpd_4')" maxlength="2000" oninput="eylem(this, this.value)" required="true" >
                                    </div>
                                </div>
                                
                                <div class="col-lg-6 form-group">
                                    <label for="comments"><?= $this->lang->line('cpd_comments') ?> </label>
									<span class="cpd_5">2000</span><?= $this->lang->line('character') ?>
                                    <a class="btn-sm btn-default" id="cpd_tp_5" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('cpd_comments_tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
                                    <div>
									<input id="cpd_txt_5" type="text" name="comments" class="form-control input-md" onkeyup = "limite_textarea(this.value, 'cpd_5')" maxlength="2000" oninput="eylem(this, this.value)" required="false"  >
                                    </div>
                                </div>

                            <div class="col-lg-12">
                                    <button id="closed_procurement_documentation-submit" type="submit" value="Save" class="btn btn-lg btn-success pull-right">
                                        <i class="glyphicon glyphicon-ok"></i> <?= $this->lang->line('btn-save') ?>
                                    </button>
                            </form>

                            <form action="<?php echo base_url('procurement/closed-procurement-documentation/list/');  ?><?php echo $_SESSION['project_id']; ?>">
                                <button class="btn btn-lg btn-info pull-left"> <i class="glyphicon glyphicon-chevron-left"></i> <?= $this->lang->line('btn-back') ?></button>
                            </form>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</body>

<script src="<?= base_url() ?>assets/js/jquery-1.11.1.js" type="text/javascript"></script>


<script type="text/javascript">
	for (var i = 1; i <= 5; i++) {
		if (document.getElementById("cpd_tp_" + i).title == "") {
			document.getElementById("cpd_tp_" + i).hidden = true;
		}
		limite_textarea(document.getElementById("cpd_txt_" + i).value, "cpd_" + i);
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