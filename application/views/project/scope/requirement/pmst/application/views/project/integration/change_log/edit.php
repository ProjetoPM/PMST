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
                                <?= $this->lang->line('cl_title')  ?>
                            </h1>
                            <form method="POST" action="<?= base_url() ?>integration/change-log/update">

                                <input type="hidden" name="project_id" value="<?= $project_id ?>">

                                <div class=" col-lg-3 form-group">
                                    <label for="requester"><?= $this->lang->line('cl_requester') ?> </label>
                                    <a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('cl_requester-tooltip') ?>"><i class="glyphicon glyphicon-comment"></i></a>

                                    <input class="form-control" type="text" id="requester" name="requester" maxlength="45" value="<?= $change_log[0]->requester ?>">
                                </div>

                                <div class=" col-lg-3 form-group">
                                    <label for="id_number"><?= $this->lang->line('cl_id_number') ?> </label>
                                    <a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('priority-tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>

                                    <input class="form-control" type="text" id="id_number" name="id_number" maxlength="255" value="<?= $change_log[0]->id_number ?>">

                                </div>

                                <div class="col-lg-5 form-group">
                                    <label for="request_date"><?= $this->lang->line('cl_request_date') ?></label>
                                    <a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('tep-request_date-tooltip') ?>"><i class="glyphicon glyphicon-comment"></i></a>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-calendar"></i>
                                        </div>
                                        <input class="form-control" id="request_date" placeholder="YYYY/MM/DD" type="text" name="request_date" value="<?= $change_log[0]->request_date ?>" />
                                    </div>
                                </div>


                                <div class=" col-lg-4 form-group">
                                    <label for="change_type"><?= $this->lang->line('cl_change_type') ?> </label>
                                    <a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('cl_change_type-tooltip') ?>"><i class="glyphicon glyphicon-comment"></i></a>

                                    <select class="form-control" id="change_type" name="change_type">
                                        <?=
                                            $opcoes = array("Corrective Action", "Preventive Action", "Defect Repair", "Update");
                                        foreach ($opcoes as $teste) {
                                            if ($teste == $change_log[0]->change_type)
                                                echo "<option value=$teste selected='selected'>$teste</option>";
                                            else
                                                echo "<option value=$teste>$teste</option>";
                                        }
                                        ?>
                                    </select>

                                </div>



                                <div class=" col-lg-4 form-group">
                                    <label for="situation"><?= $this->lang->line('cl_situation') ?> </label>
                                    <a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('cl_situation-tooltip') ?>"><i class="glyphicon glyphicon-comment"></i></a>

                                    <select class="form-control" id="situation" name="situation">
                                        <?=
                                            $opcoes = array("Under Analysis", "Approved", "Rejected", "Canceled", "Suspended");
                                        foreach ($opcoes as $teste) {
                                            if ($teste == $change_log[0]->situation)
                                                echo "<option value=$teste selected='selected'>$teste</option>";
                                            else
                                                echo "<option value=$teste>$teste</option>";
                                        }
                                        ?>
                                    </select>
                                </div>

                                <div class=" col-lg-10 form-group">
                                    <label for="change_description"><?= $this->lang->line('cl_change_description') ?> </label>
                                    <a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('cl_change_description-tooltip') ?>">
                                        <i class="glyphicon glyphicon-comment"></i></a>

                                    <textarea oninput="eylem(this, this.value)" class="form-control elasticteste" type="text" id="change_description" name="change_description" maxlength="255"><?= $change_log[0]->change_description ?></textarea>

                                </div>

                                <div class=" col-lg-10 form-group">
                                    <label for="project_management_feedback"><?= $this->lang->line('cl_project_management_feedback') ?> </label>
                                    <a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('cl_project_management_feedback-tooltip') ?>"><i class="glyphicon glyphicon-comment"></i></a>

                                    <textarea oninput="eylem(this, this.value)" class="form-control elasticteste" type="text" id="project_management_feedback" name="project_management_feedback" maxlength="255"><?= $change_log[0]->project_management_feedback ?></textarea>

                                </div>


                                <div class=" col-lg-10 form-group">
                                    <label for="ccc_feedback"><?= $this->lang->line('cl_ccc_feedback') ?> </label>
                                    <a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('cl_ccc_feedback-tooltip') ?>"><i class="glyphicon glyphicon-comment"></i></a>

                                    <textarea oninput="eylem(this, this.value)" class="form-control elasticteste" type="text" id="ccc_feedback" name="ccc_feedback" maxlength="255"><?= $change_log[0]->ccc_feedback ?></textarea>
                                </div>


                                <div class="col-lg-6 form-group">
                                    <label for="ccc_feedback_date"><?= $this->lang->line('cl_ccc_feedback_date') ?></label>
                                    <a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('tep-ccc_feedback_date-tooltip') ?>"><i class="glyphicon glyphicon-comment"></i></a>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-calendar"></i>
                                        </div>
                                        <input class="form-control" id="ccc_feedback_date" placeholder="YYYY/MM/DD" type="text" name="ccc_feedback_date" value="<?= $change_log[0]->ccc_feedback_date ?>" />
                                    </div>
                                </div>


                                <div class=" col-lg-12 form-group">
                                    <label for="comments"><?= $this->lang->line('cl_comments') ?> </label>
                                    <a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('cl_comments-tooltip') ?>"><i class="glyphicon glyphicon-comment"></i></a>

                                    <input class="form-control" type="text" id="comments" name="comments" maxlength="45" value="<?= $change_log[0]->comments ?>">

                                </div>

                                <div class="col-lg-12">
                                    <button id="new_cl_submit" type="submit" value="Save" class="btn btn-lg btn-success pull-right">
                                        <i class="glyphicon glyphicon-ok"></i> <?= $this->lang->line('btn-save') ?>
                                    </button>
                            </form>

                            <form action="<?php echo base_url() ?>/integration/change-log/list/<?= $project_id ?>">
                                <button class="btn btn-lg btn-info pull-left"> <i class="glyphicon glyphicon-chevron-left"></i> <?= $this->lang->line('btn-back') ?></button>
                            </form>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</body>


<script type="text/javascript">
    var currentDate = new Date();
    var today = new Date(currentDate.getFullYear(), currentDate.getMonth(), currentDate.getDate(), 0, 0, 0, 0);
    var container = $('.bootstrap-iso form').length > 0 ? $('.bootstrap-iso form').parent() : "body";

    //Start Date Ends Here
    var endDate = $("#request_date").datepicker({
        autoclose: true,
        format: 'yyyy/mm/dd',
        //language: 'pt-BR', //Idioma do Calendario
        container: container,
        keyboardNavigation: true,
        orientation: "bottom",
        startDate: today,
        /*todayHighlight : true,*/
    });
    //End Date Ends Here

    var endDate = $("#ccc_feedback_date").datepicker({
        autoclose: true,
        format: 'yyyy/mm/dd',
        //language: 'pt-BR', //Idioma do Calendario
        container: container,
        keyboardNavigation: true,
        orientation: "bottom",
        startDate: today,
        /*todayHighlight : true,*/
    });
</script>

<?php $this->load->view('frame/footer_view') ?>