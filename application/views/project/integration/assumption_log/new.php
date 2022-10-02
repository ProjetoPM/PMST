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

                                <?= $this->lang->line('acl_title') ?> - <?= $type == "A" ? "Assumption" : "Constraint"; ?>

                            </h1>

                            <form method="POST" action="<?php echo base_url('integration/assumption-log/insert/'); ?><?php echo $_SESSION['project_id']; ?>">

                                <input type="hidden" name="type" value="<?php echo $type; ?>">

                                <div class=" col-lg-12 form-group">
                                    <label for="description_log"><?= $this->lang->line('acl_description_log') ?>*</label>
                                    <a class="btn-sm btn-default" id="acl_tp_1" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('acl_description_log_tooltip') ?>"><i class="glyphicon glyphicon-comment"></i></a>
                                    <span id="count-a"></span>
                                    <div>
                                        <textarea 
                                            oninput="limitText(this, 2e3, 'a')" 
                                            placeholder="<?= $this->lang->line('placeholder_generic') ?>"
                                            rows="15"
                                            maxlength="2000" 
                                            class="form-control" 
                                            id="acl_txt_1" 
                                            name="description_log"
                                            required 
                                        ></textarea>
                                    </div>
                                </div>

                                <div class="col-lg-12 m-t-10">
                                    <button id="assumption-log-submit" type="submit" value="Save" class="btn btn-lg btn-success pull-right">
                                        <i class="glyphicon glyphicon-ok"></i> <?= $this->lang->line('btn-save') ?>
                                    </button>
                            </form>

                            <form action="<?php echo base_url('integration/assumption-log/list/');  ?><?php echo $_SESSION['project_id']; ?>">
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
    if (document.getElementById("acl_tp_1").title == "") {
        document.getElementById("acl_tp_1").hidden = true;
        limite_textarea(document.getElementById("acl_txt_1").value, "acl_1");
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



<?php $this->load->view('frame/footer_view') ?>