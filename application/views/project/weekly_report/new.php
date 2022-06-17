
	<div class="wrapper">
		<div class="content-wrapper">
			<section class="content">
				<?php if ($this->session->flashdata('success')) : ?>
					<div class="alert alert-success">
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
						<strong><?= $this->session->flashdata('success') ?></strong>
					</div>
				<?php elseif ($this->session->flashdata('error')) : ?>
					<div class="alert alert-warning">
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
						<strong><?php echo $this->session->flashdata('error'); ?></strong>
					</div>
				<?php endif ?>

				<div class="row">
					<div class="col-lg-12">
						<div class="panel-body">
							<h1 class="page-header">
								<?= $this->lang->line('wr_title') ?>
							</h1>
							<form method="POST" action="<?= base_url('weekly-report/insert/') ?>">
								<div class="col-lg-3 form-group">
									<label><?= $this->lang->line('we_name') ?></label>
									<select name="evaluation_id" size="1" class="form-control" tabindex="1" required>
										<option selected="selected" disabled>Select</option>
										<?php foreach ($evaluation as $i) : ?>
											<option value="<?= $i->weekly_evaluation_id ?>">
												<?= getWeeklyEvaluationName($i->weekly_evaluation_id) ?>
											</option>
										<?php endforeach ?>
									</select>
								</div>
								<div class="col-lg-12 form-group">
									<label for="tool_evaluation"><?= $this->lang->line('wr_tool_evaluation') ?>*</label>
									<span id="count-a"></span>
									<span class="btn-sm btn-default" id="wr_tp_1" data-toggle="tooltip" data-placement="top" title="<?= $this->lang->line('wr_tool_evaluation_tp') ?>">
										<i class="glyphicon glyphicon-comment"></i>
									</span>
									<div>
										<textarea name="tool_evaluation" oninput="limitText(this, 5000, 'a')" class="form-control" id="tool_evaluation_ta" required></textarea>
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
										<div class="panel-body m-t-20" style="padding: 0">
											<div id="education_fields">
												<!-- list of processes -->
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
								</div>
							</form>
						</div>
					</div>
				</div>
			</section>
		</div>
	</div>
	<script>
		var room = 0, number = 0;

		$(document).on("click", "#add_process", function() {
			room++;

			const parent = document.getElementById('education_fields')
			const div = document.createElement('div');
			div.setAttribute('id', 'remove-' + room);
			div.setAttribute('class', 'form-group');
			div.innerHTML = `<div class="col-md-12"><div class="process-title p-l-17 p-b-5 p-t-5">Process #${++number}</div><div class="around col-md-12 m-b-25"><div class="form-group col-md-6"><label for="${room}">Process Group</label><select class="form-control" id="${room}" name="process_group_${room}"><option selected="selected" disabled="disabled">Select</option> <?php foreach($pmbok_processes as $process): ?> <option value="<?= $process->pmbok_group_id ?>"> <?=$process->group_name?> </option> <?php endforeach?> </select></div><div class="form-group col-md-6"><label for="process_name_${room}">Process Name</label><select name="process_name-${room}" class="form-control" id="process_name_${room}" value="${room}"><option selected="selected" disabled="disabled">Select process group first</option></select></div><div class="form-group col-md-10"><label for="process_description">Process Description*&nbsp;</label><span id="count-${room}"></span><textarea oninput='limitText(this,2e3,"${room}")' class="form-control" name="description-${room}" id="process_description-${room}"></textarea></div><div class="form-group col-md-2"><label for="">Actions</label><br><span class="file-upload"><input class="file-upload__input-${room}" type="file" name="files[${room}][]" id="${room}" multiple="multiple"><button class="btn btn-default file-upload__button-${room} m-b-5 m-r-7" data-toggle="toggle" title="Upload files" type="button"><i class="fa fa-upload"></i></button><button onclick="remove(${room})" data-toggle="toggle" title="Upload files" type="button" class="btn btn-danger m-b-5 m-r-7"><i class="fa fa-trash"></i></button></span></div><div class="f-u__label col-md-12 form-group"><label>Uploaded Files</label><div class="file-upload__label-${room}"></div></div></div></div>`;
			parent.appendChild(div);

			var hiddenInputFile = $(`.file-upload__input-${room}`).hide();

			document.addEventListener('click', e => {
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
					let select = $(`select#process_name_${element}`);
					let valueProcessGroup = $(`select#${element} option:selected`).val();

					const PATH = "../weekly-report/process-name-ajax";

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
			}, {
				passive: true
			})

			/**
			 * Triggering the input button.
			 */
			Array.prototype.forEach.call(document.querySelectorAll(`.file-upload__button-${room}`), function (button) {
				const hiddenInput = button.parentElement.querySelector(`.file-upload__input-${room}`);
				const fileUploadClass = button.parentElement;
				const formGroupFileUploadClass = fileUploadClass.parentElement;
				const lastElementToSwitch = formGroupFileUploadClass.parentElement;
				const label = lastElementToSwitch.querySelector(`.file-upload__label-${room}`);
				const defaultLabelText = 'No file(s) selected';

				// Set default text for label
				label.textContent = defaultLabelText;
				label.title = defaultLabelText;

				button.addEventListener('click', function () {
					hiddenInput.click();
				});

				hiddenInput.addEventListener('change', function () {
					const filenameList = Array.prototype.map.call(hiddenInput.files, function (file) {
						return file.name;
					});

					label.textContent = filenameList.join(', ') || defaultLabelText;
					label.title = label.textContent;
				});
			});
		});

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