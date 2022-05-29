
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
											<button onclick="goTo('<?= base_url('weekly-report/list') ?>')" class="btn btn-lg btn-info pull-left m-t-30">
												<i class="glyphicon glyphicon-chevron-left"></i>
												<?= $this->lang->line('btn-back') ?>
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
	<script>
		var room = 0, number = 0;

		$(document).on("click", "#add_process", function() {
			room++;

			const parent = document.getElementById('education_fields')
			const div = document.createElement('div');
			div.setAttribute('id', 'remove-' + room);
			div.setAttribute('class', 'form-group');
			div.innerHTML = `<div class="col-md-12"><div class="process-title p-l-17 p-b-5 p-t-5">Process #${++number}</div><div class="around col-md-12 m-b-25"><div class="form-group col-md-6"><label for="${room}">Process Group</label><select class="form-control"id="${room}"><option selected disabled>Select</option><?php foreach($pmbok_processes as $process): ?><option value="<?= $process->pmbok_group_id ?>"><?=$process->group_name?></option><?php endforeach?></select></div><div class="form-group col-md-6"><label for="process_name_${room}">Process Name</label><select name="process_name-${room}"class="form-control"id="process_name_${room}"value="${room}"><option selected disabled>Select process group first</option></select></div><div class="form-group col-md-11"><label for="process_description">Process Description*&nbsp</label><span id="count-${room}"></span><textarea oninput="limitText(this, 2000, '${room}')"class="form-control"name="description-${room}"id="process_description-${room}"></textarea></div><div class="form-group col-md-1"><span><button onclick="remove(${room})"type="button"class="form-control btn btn-lg btn-danger m-t-23 m-l-0"><i class="fa fa-trash"style="display: flex; align-items: center; justify-content: center;"aria-hidden="true"></i></button><i class="btn btn-default" style="display: flex; align-items: center; justify-content: center;"aria-hidden="true" data-toggle="modal" data-target="#upload-${room}"><i class="fa fa-upload"></i><span class="hidden-xs"></span></i></button></div></div></div></div><div class="modal fade" id="upload-${room}" role="dialog"> <div class="modal-dialog"> <div class="modal-content"> <div class="modal-header"> <button type="button" class="close" data-dismiss="modal">&times;</button> <h3 class="modal-title">Attachment Upload</h3> </div> <div class="modal-body"> <?= form_open_multipart('weekly-report/upload-image/') ?> <div class="row"> <div class="col-lg-12"> <div class="form-group"> <label for="first">Select File</label> <input type="file" class="form-control" name="image" id="file_upload" required> </div> <div class="form-group"> <label for="description">Description</label> <input type="text" class="form-control" name="description" required> </div> </div> </div> </div> <div class="modal-footer"> <div class="row"> <div class="col-lg-12"> <button data-submit="...Enviando" type="submit" value="Save" class="btn btn-lg btn-success pull-right"> <i class="glyphicon glyphicon-ok"></i> <?= $this->lang->line('btn-save') ?> </button> </form> <button type="button" class="btn btn-lg btn-default pull-left" data-dismiss="modal">Close</button> </div> </div> </div> </div> </div> </div>`;
			parent.appendChild(div);

			/**
			 * Weekly Report
			 * 
			 * Getting the process name based on process group
			 * selected, using ajax calls.
			 */
			$(document).on('change', `#${room}`, function() {
				const element = document.activeElement.id;
				var select = $(`select#process_name_${element}`);
				var valueProcessGroup = $(`select#${element} option:selected`).val();

				$(select).empty().append($(`#process_name_${element}`));
					
				$.ajax({
					url: "../weekly-report/process-name-ajax",
					type: 'GET',
					dataType: 'html',
					async: true,
					success: function(data) { 
						var result = JSON.parse(data); 
						
						for (var i = 0; i < result.length; i++) {
							if (valueProcessGroup === result[i].pmbok_group_id) {
								$(select).append($('<option>', {
									value: result[i].pmbok_process_id,
									text: result[i].name
								}));
							}
						}
					}
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
					alertify.error('<?= $this->lang->line('wr_alert_confirm_cancel') ?>')
				}
			);
		}
	</script>