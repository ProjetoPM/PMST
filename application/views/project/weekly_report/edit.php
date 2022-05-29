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
										<button class="btn btn-success" type="button" id="edit_add_process">
											<span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
										</button>
									</div>
									<div class="panel-body m-t-20" style="padding: 0">
										<div id="edit_education_fields"><!-- Novos processos irão aparecer no topo! --></div>
										<?php foreach ($weekly_processes as $item) : ?>
											<div id="remove-<?= $item->weekly_report_process_id ?>">
												<div class="col-md-12">
													<div class="process-title p-l-17 p-b-5 p-t-5">Process #<?= $item->weekly_report_process_id ?></div>
													<div class="around col-md-12 m-b-25">
														<div class="form-group col-md-6">
															<label for="<?= $item->weekly_report_process_id ?>">Process Group</label>
															<select class="form-control" id="<?= $item->weekly_report_process_id ?>">
																<?php
																// Getting the actual pmbok_group_id and the 'name'
																// of the process
																$pmbok_group_id = $item->pmbok_group_id;
																$name = $item->name;

																$CI = &get_instance();
																$CI->load->model('WeeklyReport_model');
																$list_processes_name = $CI->WeeklyReport_model->getProcessesName($pmbok_group_id);
																?>
																<?php foreach ($pmbok_processes as $process) : ?>
																	<?php if ($pmbok_group_id === $process->pmbok_group_id) : ?>
																		<option selected value="<?= $process->pmbok_group_id ?>">
																			<?= $process->group_name ?>
																		</option>
																	<?php else : ?>
																		<option value="<?= $process->pmbok_group_id ?>">
																			<?= $process->group_name ?>
																		</option>
																	<?php endif ?>
																<?php endforeach ?>
															</select>
														</div>
														<div class="form-group col-md-6">
															<label for="process_name_<?= $item->weekly_report_process_id ?>">Process Name</label>
															<select name="process_name-<?= $item->weekly_report_process_id ?>" class="form-control" id="process_name_<?= $item->weekly_report_process_id ?>" value="<?= $item->weekly_report_process_id ?>">
																<?php foreach ($list_processes_name as $list) : ?>
																	<?php if (strcmp($name, $list->name) === 0) : ?>
																		<option selected value="<?= $list->pmbok_group_id ?>">
																			<?= $list->name ?>
																		</option>
																	<?php else : ?>
																		<option value="<?= $list->pmbok_group_id ?>">
																			<?= $list->name ?>
																		</option>
																	<?php endif ?>
																<?php endforeach ?>
															</select>
														</div>
														<div class="form-group col-md-11"><label for="process_description">Process Description*&nbsp</label><span id="count-<?= $item->weekly_report_process_id ?>"></span><textarea oninput="limitText(this, 2000, '<?= $item->weekly_report_process_id ?>')" class="form-control" name="description-<?= $item->weekly_report_process_id ?>" id="process_description-<?= $item->weekly_report_process_id ?>"><?= $item->description ?></textarea></div>
														<div class="form-group col-md-1"><button onclick="remove(<?= $item->weekly_report_process_id ?>)" type="button" class="form-control btn btn-lg btn-danger m-t-23 m-l-0"><i class="fa fa-trash" style="display: flex; align-items: center; justify-content: center;" aria-hidden="true"></i></button></div>
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
									<button onclick="goTo('<?= base_url('weekly-report/list') ?>')" class="btn btn-lg btn-info pull-left m-t-30">
										<i class="glyphicon glyphicon-chevron-left"></i>
										<?= $this->lang->line('btn-back') ?>
									</button>
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
	let room = 0,
		number = 0;

	$(document).on("click", "#edit_add_process", function() {
		room++;

		const parent = document.getElementById('edit_education_fields')
		const div = document.createElement('div');
		div.setAttribute('id', 'remove-' + room);
		div.setAttribute('class', 'form-group');
		div.innerHTML = `<div class="col-md-12"><div class="process-title p-l-17 p-b-5 p-t-5">Process #${++number}</div><div class="around col-md-12 m-b-25"><div class="form-group col-md-6"><label for="${room}">Process Group</label><select class="form-control"id="${room}"><option selected disabled>Select</option><?php foreach ($pmbok_processes as $process) : ?><option value="<?= $process->pmbok_group_id ?>"><?= $process->group_name ?></option><?php endforeach ?></select></div><div class="form-group col-md-6"><label for="process_name_${room}">Process Name</label><select name="process_name-${room}"class="form-control"id="process_name_${room}"value="-${room}"><option selected disabled>Select process group first</option></select></div><div class="form-group col-md-11"><label for="process_description">Process Description*&nbsp</label><span id="count-${room}"></span><textarea oninput="limitText(this, 2000, '${room}')"class="form-control textarea"name="description-${room}"id="process_description-${room}"></textarea></div><div class="form-group col-md-1"><button onclick="remove(${room})"type="button"class="form-control btn btn-lg btn-danger m-t-23 m-l-0"><i class="fa fa-trash"style="display: flex; align-items: center; justify-content: center;"aria-hidden="true"></i></div></div></div></div>`;
		parent.appendChild(div);
	});

	document.addEventListener('click', e => {
		let element = parseInt(document.activeElement.id);

		/**
		 * Only if the active element is a number.
		 */
		if (!isNaN(element)) {
			/**
			 * Weekly Report
			 * 
			 * Getting the process name based on process group
			 * selected, using ajax calls. This will catch all
			 * selected processes returned by database.
			 */
			let select = $(`select#process_name_${element}`);
			let valueProcessGroup = $(`select#${element} option:selected`).val();

			const PATH = "../../weekly-report/process-name-ajax";

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
	}, {
		passive: true
	})

	function remove(id) {
		alertify.set('notifier', 'delay', 1.5);
		alertify.confirm('<?= $this->lang->line('wr_alert_confirm_title') ?>',
			'<?= $this->lang->line('wr_alert_confirm_text') ?>',
			function() {
				$(`#remove-${id}`).remove();
				alertify.success('<?= $this->lang->line('wr_alert_confirm_ok') ?>')
			},
			function() {
				alertify.error('<?= $this->lang->line('wr_alert_confirm_cancel') ?>')
			}
		);
	}

	function selectProcessGroup(id_select_wr, pmbok_group_id) {
		let element = document.getElementById(id_select_wr);
		element.value = pmbok_group_id;
	}
</script>