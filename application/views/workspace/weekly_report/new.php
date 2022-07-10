<div class="wrapper">
    <div class="content-wrapper">
        <section class="content">
            <?php $this->load->view('errors/exceptions') ?>
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel-body">
                        <h1 class="page-header">
                            <?= $this->lang->line('wr_title') ?>
                        </h1>
                        <form method="POST" action="<?= base_url('weekly-report/insert/') ?>" enctype="multipart/form-data">
                            <div class="col-lg-3 form-group">
                                <label><?= $this->lang->line('we_name') ?></label>
                                <select 
                                    name="weekly_report[evaluation_id]" 
                                    class="form-control" 
                                    required
                                >
                                    <option selected disabled value="">Select</option>
                                    <?php foreach ($evaluation as $i) : ?>
                                        <option value="<?= $i->weekly_evaluation_id ?>">
                                            <?= getWeeklyEvaluationName($i->weekly_evaluation_id) ?>
                                        </option>
                                    <?php endforeach ?>
                                </select>
                            </div>
                            <div class="col-lg-12 form-group">
                                <label for="tool_evaluation">
                                    <?= $this->lang->line('wr_tool_evaluation') ?>*
                                </label>
                                <span id="count-a"></span>
                                <span 
                                    class="btn-sm btn-default" 
                                    data-toggle="tooltip"
                                >
                                    <i class="glyphicon glyphicon-comment"></i>
                                </span>
                                <div>
                                    <textarea 
                                        name="weekly_report[tool_evaluation]" 
                                        oninput="limitText(this, 5000, 'a')" 
                                        class="form-control" 
                                        id="tool_evaluation_ta" 
                                        required
                                    ></textarea>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <span class="fs-20">
                                            <?= $this->lang->line('wr_processes') ?>
                                        </span>
                                        <button class="btn btn-success" type="button" id="add_process">
                                            <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                                        </button>
                                    </div>
                                    <div class="panel-body" style="padding: 0">
                                        <div id="education_fields">
                                            <!-- list of processes -->
                                        </div>
                                    </div>
                                    <button id="stakeholder-submit" type="submit" value="Save" class="btn btn-lg btn-success pull-right m-t-20 m-b-10">
                                        <i class="glyphicon glyphicon-ok"></i>
                                        <?= $this->lang->line('btn-save') ?>
                                    </button>
                                    <a onclick="goTo('<?= base_url('weekly-report/list') ?>')" class="btn btn-lg btn-info pull-left m-t-20 m-b-10">
                                        <i class="glyphicon glyphicon-chevron-left"></i>
                                        <?= $this->lang->line('btn-back') ?>
                                    </a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
        </section>
    </div>
</div>
<script>
    var room = 0,
        number = 0;

    $(document).on("click", "#add_process", function() {
        room++;

        const parent = document.getElementById('education_fields')
        const div = document.createElement('div');
        div.setAttribute('id', `remove-${room}`);
        div.setAttribute('class', 'form-group');
        div.innerHTML = `<?php $this->load->view('workspace/weekly_report/process/add') ?>`;

        parent.appendChild(div);
    });

    function getProcessesName(processNumber) {
        "use strict"
        /**
         * Weekly Report
         * Getting the process name based on process group
         * selected, using ajax calls. This will catch all
         * selected processes returned by database.
         */
        let valueProcessGroup = document.getElementById(`add[${processNumber}][process_group]`).value;
        let selectProcessName = document.getElementById(`add[${processNumber}][process_name]`)

        const PATH = `../weekly-report/process-name-ajax`;

        /**
         * Ajax call.
         */
        $.get(PATH, function(data, status) {
            $(selectProcessName).empty();
            const dataToManipulate = JSON.parse(data);

            for (let i = 0; i < dataToManipulate.length; i++) {
                if (valueProcessGroup === dataToManipulate[i].pmbok_group_id) {
                    $(selectProcessName).append($('<option>', {
                        value: dataToManipulate[i].pmbok_process_id,
                        text: dataToManipulate[i].name
                    }));
                }
            }
            $(selectProcessName).value = 1;
        });
    }

    function remove(id) {
        alertify.set('notifier', 'delay', 1.5);
        alertify.confirm('<?= $this->lang->line('wr_alert_confirm_title') ?>',
            '<?= $this->lang->line('wr_alert_confirm_text') ?>',
            function() {
                $(`#remove-${id}`).remove();
                alertify.success('<?= $this->lang->line('wr_alert_confirm_ok') ?>')
            },
            function() {
                alertify.warning('<?= $this->lang->line('wr_alert_confirm_cancel') ?>')
            }
        );
    }
</script>