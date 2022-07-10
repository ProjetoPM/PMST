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
                        <form method="POST" action='<?= base_url("weekly-report/update/{$this->uri->segment(3)}") ?>' enctype="multipart/form-data">
                            <div class="col-lg-3 form-group">
                                <label>
                                    <?= $this->lang->line('we_name') ?>
                                </label>
                                <span 
                                    name="evaluation_id" 
                                    class="form-control" 
                                    disabled 
                                    required
                                >
									<?= $evaluation['name'] ?>
								</span>
                            </div>
                            <div class="col-lg-12 form-group">
                                <label for="tool_evaluation">
                                    <?= $this->lang->line('wr_tool_evaluation') ?>*
                                </label>
                                <span id="count-a"></span>
                                <span class="btn-sm btn-default" data-toggle="tooltip">
                                    <i class="glyphicon glyphicon-comment"></i>
                                </span>
                                <div>
                                    <textarea 
                                        name="weekly_report[tool_evaluation]" 
                                        oninput="limitText(this, 5000, 'a')" 
                                        class="form-control" 
                                        id="tool_evaluation_ta" 
                                        required
                                    ><?= $evaluation['tool'] ?></textarea>
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
                                        <div id="education_fields"><!-- list of processes --></div>
                                        <?php foreach ($weekly_processes as $item) : ?>
                                            <?php
                                                // Getting the actual pmbok_group_id and the 'name' of the process
                                                $pmbok_group_id = $item->pmbok_group_id;
                                                $name = $item->name;

                                                $CI = &get_instance();
                                                $CI->load->model('WeeklyReport_model');
                                                $list_processes_name = $CI->WeeklyReport_model->getProcessesName($pmbok_group_id);
                                            ?>
                                            <div 
                                                id="remove-<?= $item->weekly_report_process_id ?>"
                                                class="m-t-15"
                                            >
                                                <div class="col-md-12 m-b-15">
                                                    <div class="process-title-edit">
                                                        <?= $this->lang->line('wr_process') ?> #<?= $item->weekly_report_process_id ?>
                                                    </div>
                                                    <div class="around-edit col-md-12">
                                                        <div class="form-group col-md-6">
                                                            <input 
                                                                type="hidden" 
                                                                id="update[<?= $item->weekly_report_process_id ?>][remove_process]" 
                                                                name="update[<?= $item->weekly_report_process_id ?>][remove_process]" 
                                                                value="false"
                                                            >
                                                            <label for="update[<?= $item->weekly_report_process_id ?>][process_group]">
                                                                <?= $this->lang->line("wr_process_group") ?>
                                                            </label>
                                                            <select 
                                                                name="update[<?= $item->weekly_report_process_id ?>][process_group]" 
                                                                class="form-control" 
                                                                id="update[<?= $item->weekly_report_process_id ?>][process_group]" 
                                                                oninput="getProcessesName('<?= $item->weekly_report_process_id ?>', true, true, false)" 
                                                                required
                                                            >
                                                                <option selected disabled value="">
                                                                    <?= $this->lang->line('wr_select_process_group') ?>
                                                                </option>
                                                                <?php foreach($pmbok_processes as $process): ?>
                                                                    <option 
                                                                        <?= (($pmbok_group_id === $process->pmbok_group_id) ? 'selected' : '') ?> 
                                                                        name="update[<?= $process->pmbok_group_id ?>][group_name]" 
                                                                        value="<?= $process->pmbok_group_id ?>"
                                                                    >
                                                                        <?= $process->group_name ?>
                                                                    </option>
                                                                <?php endforeach?>
                                                            </select>
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <label for="update[<?= $item->weekly_report_process_id ?>][process_name]">
                                                                <?= $this->lang->line("wr_process_name") ?>
                                                            </label>
                                                            <select 
                                                                name="update[<?= $item->weekly_report_process_id ?>][process_name]" 
                                                                class="form-control" 
                                                                id="update[<?= $item->weekly_report_process_id ?>][process_name]" 
                                                                required
                                                            >
                                                                <?php foreach ($list_processes_name as $list) : ?>
                                                                    <option <?= (strcmp($name, $list->name) === 0) ? 'selected' : '' ?> value="<?= $list->pmbok_process_id ?>">
                                                                        <?= $list->name ?>
                                                                    </option>
                                                                <?php endforeach ?>
                                                            </select>
                                                        </div>
                                                        <div class="form-group col-md-10">
                                                            <label for="update[<?= $item->weekly_report_process_id ?>][process_description]">
                                                                <?= $this->lang->line("wr_process_description") ?>*&nbsp;
                                                            </label>
                                                            <span id="count-<?= $item->weekly_report_process_id ?>"></span>
                                                            <textarea 
                                                                oninput="limitText(this,2e3,'<?= $item->weekly_report_process_id ?>')" 
                                                                class="form-control" 
                                                                name="update[<?= $item->weekly_report_process_id ?>][process_description]" 
                                                                id="update[<?= $item->weekly_report_process_id ?>][process_description]" 
                                                                required
                                                            ><?= $item->description ?></textarea>
                                                        </div>
                                                        <div class="form-group col-md-2">
                                                            <label for=""><?= $this->lang->line("wr_actions") ?></label>
                                                            <br>
                                                            <span class="file-upload">
                                                                <input 
                                                                    class="file-upload__input-<?= $item->weekly_report_process_id ?>" 
                                                                    style="display: none;" 
                                                                    type="file" 
                                                                    name="files_update[<?= $item->weekly_report_process_id ?>][]" 
                                                                    id="files_update[<?= $item->weekly_report_process_id ?>]" 
                                                                    multiple
                                                                >
                                                                <button 
                                                                    onclick="openFileButton(<?= $item->weekly_report_process_id ?>, this, '<?= $this->lang->line('wr_no_file_selected') ?>')"
                                                                    class="btn btn-default file-upload__button-<?= $item->weekly_report_process_id ?> m-b-5 m-r-7" 
                                                                    data-toggle="toggle" 
                                                                    title="Upload files" 
                                                                    type="button"
                                                                >
                                                                    <i class="fa fa-upload"></i>
                                                                </button>
                                                                <button 
                                                                    onclick="markToRemove('<?= $item->weekly_report_process_id ?>')" 
                                                                    data-toggle="toggle" 
                                                                    title="Upload files" 
                                                                    type="button" 
                                                                    class="btn btn-danger m-b-5 m-r-7"
                                                                >
                                                                    <i class="fa fa-trash"></i>
                                                                </button>
                                                            </span>
                                                        </div>
                                                        
                                                        <div class="f-u__label col-md-12 form-group">
                                                            <label><?= $this->lang->line("wr_upload_files") ?></label>
                                                            <div>
                                                                <span 
                                                                    class="badge-file file-upload__label-<?= $item->weekly_report_process_id ?>"
                                                                >
                                                                    <?= $this->lang->line("wr_no_file_selected") ?>
                                                                </span>
                                                            </div>
                                                            <label class="m-t-15"><?= $this->lang->line("wr_uploaded_files") ?></label>
                                                            <div class="uploaded-files">
                                                                <table class="table table-responsive table-hover">
                                                                    <thead>
                                                                        <tr>
                                                                            <th scope="col-lg-2">#</th>
                                                                            <th scope="col-lg-6"><?= $this->lang->line("wr_filename") ?></th>
                                                                            <th scope="col-lg-2"><?= $this->lang->line("wr_actions") ?></th>
                                                                            <th scope="col-lg-2"><?= $this->lang->line("wr_date_upload") ?></th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                    <?php foreach ($weekly_images as $image): ?>
                                                                        <?php if ($image->weekly_report_process_id == $item->weekly_report_process_id): ?>
                                                                            <tr>
                                                                                <td scope="row"><?= $image->report_upload_id ?></td>
                                                                                <td><?= $image->name ?></td>
                                                                                <td>
                                                                                    <a 
                                                                                        data-bs-toggle="tooltip" 
                                                                                        title="Download image" 
                                                                                        href="<?= base_url($image->path) ?>" 
                                                                                        download
                                                                                    >
                                                                                        <i class="fa-solid fa-file-arrow-down"></i>
                                                                                    </a>
                                                                                    <a 
                                                                                        data-bs-toggle="tooltip" 
                                                                                        title="Open image" 
                                                                                        href="<?= base_url($image->path) ?>" 
                                                                                        target="_blank"
                                                                                    >
                                                                                        <i class="m-l-2 fa-solid fa-arrow-up-right-from-square"></i>
                                                                                    </a>
                                                                                    <a 
                                                                                        data-bs-toggle="tooltip" 
                                                                                        title="Delete image" 
                                                                                        href="<?= base_url($image->path) ?>" 
                                                                                        target="_blank"
                                                                                    >
                                                                                        <i class="m-l-2 fa-solid fa-trash"></i>
                                                                                    </a>
                                                                                </td>
                                                                                <td>
                                                                                    <?=
                                                                                        strcmp($_SESSION['language'], "US") === 0
                                                                                            ? $image->date_upload
                                                                                            : date("d/m/Y H:i:s", strtotime($image->date_upload));
                                                                                    ?>
                                                                                </td>
                                                                            </tr>
                                                                        <?php endif ?>
                                                                    <?php endforeach ?>
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endforeach ?>
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

    function markToRemove(id) {
        alertify.set('notifier', 'delay', 1.5);
        alertify.confirm('<?= $this->lang->line('wr_alert_confirm_title') ?>',
            '<?= $this->lang->line('wr_alert_confirm_text') ?>',
            function() {
                document.getElementById(`remove-${id}`).style.display = "none";
                alertify.success('<?= $this->lang->line('wr_alert_confirm_ok') ?>');
                document.getElementById(`update[${id}][remove_process]`).value = true;
            },
            function() {
                alertify.warning('<?= $this->lang->line('wr_alert_confirm_cancel') ?>')
            }
        );
    }
</script>