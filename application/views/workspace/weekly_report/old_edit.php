
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
								<span 
                                    class="btn-sm btn-default" 
                                    data-toggle="tooltip" 
                                    title="<?= $this->lang->line('wr_tool_evaluation_tp') ?>"
                                >
									<i class="glyphicon glyphicon-comment"></i>
								</span>
								<div>
									<textarea 
                                        name="tool_evaluation" 
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
									<div class="panel-body">
										<div id="education_fields"><!-- Novos processos irão aparecer no topo! --></div>
										<?php foreach ($weekly_processes as $item) : ?>
                                            <?php
                                                // Getting the actual pmbok_group_id and the 'name' of the process
                                                $pmbok_group_id = $item->pmbok_group_id;
                                                $name = $item->name;

                                                $CI = &get_instance();
                                                $CI->load->model('WeeklyReport_model');
                                                $list_processes_name = $CI->WeeklyReport_model->getProcessesName($pmbok_group_id);
                                            ?>
											<div id="remove-<?= $item->weekly_report_process_id ?>">
												<div class="col-md-12">
													<div class="process-title p-l-17 p-b-5 p-t-5">
                                                        <?= $this->lang->line("wr_process") ?> #<?= $item->weekly_report_process_id ?>
													</div>
													<div class="around col-md-12 m-b-25">
														<div class="form-group col-md-6">
															<label for="<?= $item->weekly_report_process_id ?>">
                                                                <?= $this->lang->line("wr_process_group") ?>
                                                            </label>
															<select 
                                                                class="form-control" 
                                                                id="<?= $item->weekly_report_process_id ?>"
                                                            >
																<option selected disabled value=""><?= $this->lang->line("wr_select") ?></option>
																<?php foreach($pmbok_processes as $process): ?>
																	<option 
                                                                            <?= (($pmbok_group_id === $process->pmbok_group_id) ? 'selected' : '') ?> 
                                                                            name="group_name-<?= $process->pmbok_group_id ?>" 
                                                                            value="<?= $process->pmbok_group_id ?>">
																		<?= $process->group_name ?>
																	</option>
																<?php endforeach?>
															</select>
														</div>
														<div class="form-group col-md-6">
															<label for="process_name-<?= $item->weekly_report_process_id ?>">
                                                                <?= $this->lang->line("wr_process_name") ?>
                                                            </label>
															<select name="process_name-<?= $item->weekly_report_process_id ?>" class="form-control" id="process_name-<?= $item->weekly_report_process_id ?>" value="<?= $item->weekly_report_process_id ?>">
                                                                <?php foreach ($list_processes_name as $list) : ?>
                                                                    <option <?= (strcmp($name, $list->name) === 0) ? 'selected' : '' ?> value="<?= $list->pmbok_group_id ?>">
                                                                        <?= $list->name ?>
                                                                    </option>
																<?php endforeach ?>
															</select>
														</div>
														<div class="form-group col-md-10">
															<label for="process_description">
                                                                <?= $this->lang->line("wr_process_description") ?>*&nbsp;
                                                            </label>
															<span id="count-<?= $item->weekly_report_process_id ?>"></span>
															<textarea 
                                                                oninput="limitText(this,2e3,&quot;<?= $item->weekly_report_process_id ?>&quot;)" 
                                                                class="form-control" 
                                                                name="description-<?= $item->weekly_report_process_id ?>" 
                                                                id="process_description-<?= $item->weekly_report_process_id ?>"
                                                            ><?= $item->description ?></textarea>
														</div>
														<div class="form-group col-md-2">
															<label for=""><?= $this->lang->line("wr_actions") ?></label><br>
															<span class="file-upload">
																<input 
                                                                    class="file-upload__input-<?= $item->weekly_report_process_id ?>" 
                                                                    type="file" 
                                                                    name="files-<?= $item->weekly_report_process_id ?>[]" 
                                                                    style="display: none;" 
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
                                                                    onclick="remove(<?= $item->weekly_report_process_id ?>)" 
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
								</div>
								<div class="col-lg-12">
									<button id="stakeholder-submit" type="submit" value="Save" class="btn btn-lg btn-success pull-right m-t-30">
										<i class="glyphicon glyphicon-ok"></i> <?= $this->lang->line('btn-save') ?>
									</button>
									<a onclick="goTo('<?= base_url('weekly-report/list') ?>')" class="btn btn-lg btn-info pull-left m-t-30">
										<i class="glyphicon glyphicon-chevron-left"></i>
										<?= $this->lang->line('btn-back') ?>
                                    </a>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</section>
	</div>
</div>
<script src="https://kit.fontawesome.com/a3de6dbf75.js" crossorigin="anonymous"></script>
<script>
	var room = 0, number = 0;

	$('#add_process').on("click", function() {
		room++;

		const parent = document.getElementById('education_fields')
		const div = document.createElement('div');
		div.setAttribute('id', 'remove-' + room);
		div.setAttribute('class', 'form-group');
		div.innerHTML = `<?php $this->load->view('workspace/weekly_report/process/add') ?>`;
		parent.appendChild(div);
	});

    document.addEventListener('click', function () {
        let element = parseInt(document.activeElement.id);

        /**
         * Only if the active element is a number.
         */
        if (!isNaN(element)) {
            /**
             * Weekly Report
             * 
             * 
             * 
             * Getting the process name based on process group
             * selected, using ajax calls. This will catch all
             * selected processes returned by database.
             */
            let select = $(`select#process_name-${element}`);
            let valueProcessGroup = $(`select#${element} option:selected`).val();

            const PATH = "../../weekly-report/process-name-ajax";

            /**
             * Only 'triggers' if the process group has been selected.
             */
            if (valueProcessGroup !== 'Select') {
                $.get(PATH, function(data, status) {
                    $(select).empty();
                    const dataToManipulate = JSON.parse(data);

                    for (let i = 0; i < dataToManipulate.length; i++) {
                        if (valueProcessGroup === dataToManipulate[i].pmbok_group_id) {
                            $(select).append($('<option>', {
                                value: dataToManipulate[i].pmbok_process_id,
                                text: dataToManipulate[i].name
                            }));
                        }
                    }
                    $(select).value = 1;
                });
            }
        }
    })

    /**
     * Triggering the input button.
     */
    function openFileButton(element, button, defaultText) {
        const hiddenInput = button.parentElement.querySelector(`.file-upload__input-${element}`);
        const fileUploadClass = button.parentElement;
        const formGroupFileUploadClass = fileUploadClass.parentElement;
        const lastElementToSwitch = formGroupFileUploadClass.parentElement;
        const label = lastElementToSwitch.querySelector(`.file-upload__label-${element}`);
        const defaultLabelText = `${defaultText}`;

        // Set default text for label
        label.textContent = defaultLabelText;
        label.title = defaultLabelText;

        hiddenInput.click();

        hiddenInput.addEventListener('change', function () {
            const filenameList = Array.prototype.map.call(hiddenInput.files, function (file) {
                return file.name;
            });

            label.textContent = filenameList.join(', ') || defaultLabelText;
            label.title = label.textContent;
        });
    }

	function remove(id) {
		alertify.set('notifier','delay', 1.5);
		alertify.confirm('<?= $this->lang->line('wr_alert_confirm_title') ?>', 
			'<?= $this->lang->line('wr_alert_confirm_text') ?>'
			, function() {
				$(`#remove-${id}`).remove(); 
				alertify.success('<?= $this->lang->line('wr_alert_confirm_ok') ?>') 
			}, function() { 
				alertify.warning('<?= $this->lang->line('wr_alert_confirm_cancel') ?>')
			}
		);
	}
</script>