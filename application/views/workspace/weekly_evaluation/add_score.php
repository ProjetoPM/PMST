<body id="body" class="hold-transition skin-gray sidebar-mini">
	<div class="wrapper">
		<div class="content-wrapper">
			<section class="content">
				<?php $this->load->view('errors/exceptions') ?>
				<?php extract($weekly_processes) ?>
                
				<div class="row">
					<div class="col-lg-12">
						<div class="panel-body">
							<h1 class="page-header">
								<?= $this->lang->line('we_title') ?>
							</h1>
							<form method="POST" action="<?= base_url() ?>weekly-evaluation/insert-score/<?= $weekly_report[0]->weekly_report_id ?>">
								<div class="col-lg-6 form-group">
									<label for="name"><?= $this->lang->line('we_name') ?></label>
									<div>
										<input class="form-control" id="we_txt_1" type="text" value="<?= $weekly_report[0]->name ?> " readonly>
									</div>
								</div>

								<div class="col-lg-6 form-group">
									<label for="name"><?= $this->lang->line('we_score') ?></label>
									<div>
										<select id="score" name="score" class="form-control" required>
											<?php foreach($scores as $s): ?>
											<option value="<?= $s->score_id ?>"><?= $s->name?></option>
											<?php endforeach; ?>
										</select>
									</div>
								</div>

								<div class=" col-lg-6 form-group">
									<label for="tool_evaluation"><?= $this->lang->line('wr_tool_evaluation') ?></label>
									<a class="btn-sm btn-default" id="wr_tp_1" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('wr_tool_evaluation_tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
									<div>
										<textarea readonly oninput="limitText(this,2e3,'1')" class="form-control"><?= $weekly_report[0]->tool_evaluation ?></textarea>
									</div>
                                </div>

								<div class=" col-lg-6 form-group">
									<label for="comments"><?= $this->lang->line('we_comments') ?></label>
                                    <span id="count-a"></span>
                                    <textarea oninput="limitText(this, 5e3, 'a')" maxlength="5000" class="form-control" name="comments" required></textarea>
								</div>

                                <div class="col-md-12">
                                    <div class="uploaded-files">
                                        <h1 class="page-header">
                                            <?= $this->lang->line('wr_submissions')  ?>
                                        </h1>
                                        <?php foreach ($weekly_processes as $item) : ?>
                                            <div class="col-md-12 m-b-15 p-l-0 p-r-0">
                                                    <div class="process-title-edit-score">
                                                        <?= $this->lang->line('wr_process') ?> #<?= $item->weekly_report_process_id ?>
                                                    </div>
                                                    <div class="around-edit-score col-md-12">
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
                                                                readonly
                                                            >
                                                                <option selected value="">
                                                                    <?= getProcessGroupName($item->pmbok_id, $item->pmbok_group_id) ?>
                                                                </option>
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
                                                                readonly
                                                            >
                                                                <option selected value="<?= $item->pmbok_process_id ?>">
                                                                    <?= $item->name ?>
                                                                </option>
                                                            </select>
                                                        </div>
                                                        <div class="form-group col-md-12">
                                                            <label for="update[<?= $item->weekly_report_process_id ?>][process_description]">
                                                                <?= $this->lang->line("wr_process_description") ?>*&nbsp;
                                                            </label>
                                                            <span id="count-<?= $item->weekly_report_process_id ?>"></span>
                                                            <textarea 
                                                                oninput="limitText(this, 2e3,'<?= $item->weekly_report_process_id ?>')" 
                                                                class="form-control" 
                                                                name="update[<?= $item->weekly_report_process_id ?>][process_description]" 
                                                                id="update[<?= $item->weekly_report_process_id ?>][process_description]" 
                                                                readonly
                                                            ><?= $item->description ?></textarea>
                                                        </div>                                                        
                                                        <div class="f-u__label col-md-12 form-group m-b-0">
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
                                                                            <tr 
                                                                                id="image_uploaded-<?= $image->report_upload_id ?>"
                                                                            >
                                                                                <td scope="row"><?= $image->report_upload_id ?></td>
                                                                                <td><?= $image->name ?></td>
                                                                                <td>
                                                                                    <a 
                                                                                        data-bs-toggle="tooltip" 
                                                                                        title="Download image" 
                                                                                        href="<?= base_url($image->path) ?>" 
                                                                                        download="<?= $image->name ?>"
                                                                                        class="edit-score"
                                                                                    >
                                                                                        <i class="fa-solid fa-file-arrow-down"></i>
                                                                                    </a>
                                                                                    <a 
                                                                                        data-bs-toggle="tooltip" 
                                                                                        title="Open image" 
                                                                                        href="<?= base_url($image->path) ?>" 
                                                                                        target="_blank"
                                                                                        class="edit-score"
                                                                                    >
                                                                                        <i class="m-l-2 fa-solid fa-arrow-up-right-from-square"></i>
                                                                                    </a>
                                                                                    <input 
                                                                                        type="hidden" 
                                                                                        id="image_uploaded[<?= $image->report_upload_id ?>][remove]" 
                                                                                        name="image_uploaded[<?= $image->report_upload_id ?>][remove]" 
                                                                                        value="false"
                                                                                    >
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
                                        <div class="col-md-12 m-b-10">
                                            <a style="margin-top: 30px;" class="btn btn-lg btn-info pull-left" href='<?= base_url("weekly-evaluation/list/{$_SESSION['workspace_id']}") ?>'>
                                                <i class="glyphicon glyphicon-chevron-left"></i><?= $this->lang->line('btn-back') ?>
                                            </a>
                                            <button type="submit" style="margin-top: 30px;" class="btn btn-lg btn-success pull-right">
                                                <i class="glyphicon glyphicon-ok m-r-4"></i>
                                                <?= $this->lang->line('btn-save') ?>
                                            </button>
                                        </div>
                                    </div>
                                </div>
							</form>
						</div>
					</div>
				</div>
			</section>
		</div>
	</div>
</body>

<?php $this->load->view('frame/footer_view') ?>

<script src="<?= base_url() ?>assets/js/jquery-2.1.3.min.js"></script>
<script src="<?= base_url() ?>assets/js/jquery.dataTables.min.js"></script>
<script src="<?= base_url() ?>assets/js/dataTables.bootstrap.js"></script>
<script src="<?= base_url() ?>assets/js/dataTables.responsive.js"></script>