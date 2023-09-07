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

				<!-- avaliação -->
				<link href="<?= base_url() ?>assets/css/field_evaluation.css" rel="stylesheet" type="text/css">
				<?php $view_name = "stakeholder register";
				getViewFields($view_name);
				?>
				<?php $this->load->view('construction_services/write_field_evaluation') ?>

				<div class="row">
					<div class="col-lg-12">
						<div class="panel-body">
							<h1 class="page-header">

								<?= $this->lang->line('shr_title')  ?>

							</h1>
							<?php extract($stakeholder); ?>

							<form action="<?= base_url() ?>stakeholder/stakeholder-register/update/<?= $stakeholder_id; ?>" method="post">

								<input type="hidden" name="project_id" value="<?php echo $project_id; ?>">
								<input type="hidden" name="status" value="1">

								<div class="col-lg-4 form-group">
									<label for="name"><?= $this->lang->line('shr_name') ?> *</label>
									<a class="btn-sm btn-default" id="shr_tp_1" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('shr_name_tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
									<a <?= fieldStatus($view_name, $stakeholder_id, "name") ?> data-field="name" data-field_name="<?= $this->lang->line('shr_name') ?>" data-item_id="<?= $stakeholder_id ?>" data-view="<?= $view_name ?>" data-toggle="modal" data-placement="left" data-target="#write-evaluation" data-tt="tooltip"><i class="glyphicon glyphicon-list-alt"></i></a>
									<span id="count-a"></span>
									<div>
										<input 
											oninput="limitText(this, 2e2, 'a')" 
                        					placeholder="<?= $this->lang->line('placeholder_generic') ?>"
											id="shr_txt_1" 
											type="text" 
											name="name" 
											class="form-control" 
											maxlength="200" 
											value="<?php echo $name; ?>"
											required>
									</div>
								</div>

								<!-- valor 0 para externo | valor 1 para interno -->
								<div class="col-lg-4 form-group">
									<label for="type"><?= $this->lang->line('shr_type') ?></label>
									<a class="btn-sm btn-default" id="shr_tp_2" data-toggle=" tooltip" data-placement="right" title="<?= $this->lang->line('shr_type_tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
									<a <?= fieldStatus($view_name, $stakeholder_id, "type") ?> data-field="type" data-field_name="<?= $this->lang->line('shr_type') ?>" data-item_id="<?= $stakeholder_id ?>" data-view="<?= $view_name ?>" data-toggle="modal" data-placement="left" data-target="#write-evaluation" data-tt="tooltip"><i class="glyphicon glyphicon-list-alt"></i></a>
									<select name="type" class="form-control" value="<?php echo $type; ?>">
										<option value="0" <?php if ($type == 0) echo 'selected'; ?>><?= $this->lang->line('shr_type_external') ?></option>
										<option value="1" <?php if ($type == 1) echo 'selected'; ?>><?= $this->lang->line('shr_type_internal') ?></option>
									</select>
								</div>


								<!-- valor 0 para cliente| valor 1 para team| valor 2 para provedor | valor 3 para gerente | valor 4 para patrocinador | valor 5 para outros -->
								<div class="col-lg-4 form-group">
									<label for="role"><?= $this->lang->line('shr_role') ?></label>
									<a class="btn-sm btn-default" id="shr_tp_3" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('shr_role_tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
									<a <?= fieldStatus($view_name, $stakeholder_id, "role") ?> data-field="role" data-field_name="<?= $this->lang->line('shr_role') ?>" data-item_id="<?= $stakeholder_id ?>" data-view="<?= $view_name ?>" data-toggle="modal" data-placement="left" data-target="#write-evaluation" data-tt="tooltip"><i class="glyphicon glyphicon-list-alt"></i></a>
									<select <?php $object = getStakeholderRoleLang($role) ?> name="role" class="form-control" value="<?php echo $role; ?>">
									<option value="<?php $object->id ?>"><?= $this->lang->line($object->lang) ?></option>
										<option value="0"><?= $this->lang->line('shr_role_client') ?></option>
										<option value="1"><?= $this->lang->line('shr_role_team') ?></option>
										<option value="2"><?= $this->lang->line('shr_role_provider') ?></option>
										<option value="3"><?= $this->lang->line('shr_role_project_manager') ?></option>
										<option value="4"><?= $this->lang->line('shr_role_sponsor') ?></option>
										<option value="5"><?= $this->lang->line('shr_role_others') ?></option>
									</select>
								</div>

								<div class="col-lg-4 form-group">
									<label for="organization"><?= $this->lang->line('shr_organization') ?> </label>
									<a class="btn-sm btn-default" id="shr_tp_4" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('shr_organization_tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
									<a <?= fieldStatus($view_name, $stakeholder_id, "organization") ?> data-field="organization" data-field_name="<?= $this->lang->line('shr_organization') ?>" data-item_id="<?= $stakeholder_id ?>" data-view="<?= $view_name ?>" data-toggle="modal" data-placement="left" data-target="#write-evaluation" data-tt="tooltip"><i class="glyphicon glyphicon-list-alt"></i></a>
									<span id="count-b"></span>
									<div>
										<input 
											oninput="limitText(this, 2e2, 'b')" 
                        					placeholder="<?= $this->lang->line('placeholder_generic') ?>"
											id="shr_txt_4" 
											type="text" 
											name="organization" 
											class="form-control" 
											required="false" 
											value="<?php echo $organization; ?>"
											maxlength="200">
									</div>
								</div>


								<div class=" col-lg-4 form-group">
									<label for="position"><?= $this->lang->line('shr_position') ?></label>
									<a class="btn-sm btn-default" id="shr_tp_5" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('shr_position_tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
									<a <?= fieldStatus($view_name, $stakeholder_id, "position") ?> data-field="position" data-field_name="<?= $this->lang->line('shr_position') ?>" data-item_id="<?= $stakeholder_id ?>" data-view="<?= $view_name ?>" data-toggle="modal" data-placement="left" data-target="#write-evaluation" data-tt="tooltip"><i class="glyphicon glyphicon-list-alt"></i></a>
									<span id="count-c"></span>
									<div>
										<input 
											oninput="limitText(this, 2e3, 'c')" 
											placeholder="<?= $this->lang->line('placeholder_generic') ?>"
											id="shr_txt_5" 
											type="text" 
											name="position" 
											class="form-control" 
											required="false" 
											value="<?php echo $position; ?>"
											maxlength="2000">
									</div>
								</div>

								<div class=" col-lg-4 form-group">
									<label for="email"><?= $this->lang->line('shr_email') ?> *</label>
									<a class="btn-sm btn-default" id="shr_tp_6" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('shr_email_tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
									<a <?= fieldStatus($view_name, $stakeholder_id, "email") ?> data-field="email" data-field_name="<?= $this->lang->line('shr_email') ?>" data-item_id="<?= $stakeholder_id ?>" data-view="<?= $view_name ?>" data-toggle="modal" data-placement="left" data-target="#write-evaluation" data-tt="tooltip"><i class="glyphicon glyphicon-list-alt"></i></a>
									<span id="count-d"></span>
									<div>
										<input 
											oninput="limitText(this, 5e2, 'd')" 
											placeholder="<?= $this->lang->line('placeholder_generic') ?>"
											id="shr_txt_6" 
											type="email" 
											name="email" 
											class="form-control" 
											required="false" 
											value="<?php echo $email; ?>"
											maxlength="500">
									</div>
								</div>

								<div class=" col-lg-12 form-group">
									<label for="responsibility"><?= $this->lang->line('shr_responsibility') ?></label>
									<a class="btn-sm btn-default" id="shr_tp_7" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('shr_responsibility_tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
									<a <?= fieldStatus($view_name, $stakeholder_id, "responsibility") ?> data-field="responsibility" data-field_name="<?= $this->lang->line('shr_responsibility') ?>" data-item_id="<?= $stakeholder_id ?>" data-view="<?= $view_name ?>" data-toggle="modal" data-placement="left" data-target="#write-evaluation" data-tt="tooltip"><i class="glyphicon glyphicon-list-alt"></i></a>
									<span id="count-e"></span>
									<div>
										<input 
											oninput="limitText(this, 2e3, 'e')" 
											placeholder="<?= $this->lang->line('placeholder_generic') ?>"
											id="shr_txt_7" 
											rows="3"
											type="text" 
											name="responsibility" 
											class="form-control" 
											required="false" 
											value="<?php echo $responsibility; ?>"
											maxlength="2000">
									</div>
								</div>

								<div class=" col-lg-6 form-group">
									<label for="phone_number"><?= $this->lang->line('shr_phone_number') ?></label>
									<a class="btn-sm btn-default" id="shr_tp_8" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('shr_phone_number_tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
									<a <?= fieldStatus($view_name, $stakeholder_id, "phone_number") ?> data-field="phone_number" data-field_name="<?= $this->lang->line('shr_phone_number') ?>" data-item_id="<?= $stakeholder_id ?>" data-view="<?= $view_name ?>" data-toggle="modal" data-placement="left" data-target="#write-evaluation" data-tt="tooltip"><i class="glyphicon glyphicon-list-alt"></i></a>
									<div>
										<input id="phone_number" name="phone_number" type="tel" class="form-control phone-ddd-mask" data-mask="(000) 0000-0000" placeholder="Ex.: (000) 00000-0000" value="<?php echo $phone_number; ?>">
									</div>
								</div>

								<div class=" col-lg-6 form-group">
									<label for="work_place"><?= $this->lang->line('shr_work_place') ?></label>
									<a class="btn-sm btn-default" id="shr_tp_9" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('shr_work_place_tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
									<a <?= fieldStatus($view_name, $stakeholder_id, "work_place") ?> data-field="work_place" data-field_name="<?= $this->lang->line('shr_work_place') ?>" data-item_id="<?= $stakeholder_id ?>" data-view="<?= $view_name ?>" data-toggle="modal" data-placement="left" data-target="#write-evaluation" data-tt="tooltip"><i class="glyphicon glyphicon-list-alt"></i></a>
									<span id="count-f"></span>
									<div>
										<input 
											oninput="limitText(this, 5e2, 'f')"
											placeholder="<?= $this->lang->line('placeholder_generic') ?>"
											id="shr_txt_9" 
											type="text" 
											name="work_place" 
											class="form-control" 
											onkeyup="limite_textarea(this.value, 'shr_9')" 
											maxlength="500" 
											oninput="eylem(this, this.value)" 
											value="<?php echo $work_place; ?>">
									</div>
								</div>


								<div class=" col-lg-12 form-group">
									<label for="essential_requirements"><?= $this->lang->line('shr_essential_requirements') ?></label>
									<a class="btn-sm btn-default" id="shr_tp_10" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('shr_essential_requirements_tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
									<a <?= fieldStatus($view_name, $stakeholder_id, "essential_requirements") ?> data-field="essential_requirements" data-field_name="<?= $this->lang->line('shr_essential_requirements') ?>" data-item_id="<?= $stakeholder_id ?>" data-view="<?= $view_name ?>" data-toggle="modal" data-placement="left" data-target="#write-evaluation" data-tt="tooltip"><i class="glyphicon glyphicon-list-alt"></i></a>
									<span id="count-g"></span>
									<div>
										<textarea 
											oninput="limitText(this, 2e3, 'g')"
											placeholder="<?= $this->lang->line('placeholder_generic') ?>"
											rows="3" 
											id="shr_txt_10" 
											name="essential_requirements" 
											class="form-control" 
											onkeyup="limite_textarea(this.value, 'shr_10')" 
											maxlength="2000" 
											oninput="eylem(this, this.value)"><?php echo $essential_requirements; ?></textarea>
									</div>
								</div>

								<div class=" col-lg-12 form-group">
									<label for="main_expectations"><?= $this->lang->line('shr_main_expectations') ?></label>
									<a class="btn-sm btn-default" id="shr_tp_11" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('shr_main_expectations_tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
									<a <?= fieldStatus($view_name, $stakeholder_id, "main_expectations") ?> data-field="main_expectations" data-field_name="<?= $this->lang->line('shr_main_expectations') ?>" data-item_id="<?= $stakeholder_id ?>" data-view="<?= $view_name ?>" data-toggle="modal" data-placement="left" data-target="#write-evaluation" data-tt="tooltip"><i class="glyphicon glyphicon-list-alt"></i></a>
									<span id="count-h"></span>
									<div>
										<textarea 
											oninput="limitText(this, 2e3, 'h')"
											placeholder="<?= $this->lang->line('placeholder_generic') ?>"
											rows="3" 
											id="shr_txt_11" 
											name="main_expectations" 
											class="form-control" 
											onkeyup="limite_textarea(this.value, 'shr_11')" 
											maxlength="2000" 
											oninput="eylem(this, this.value)"><?php echo $main_expectations; ?></textarea>
									</div>
								</div>

								<div class=" col-lg-12 form-group">
									<label for="interest_phase"><?= $this->lang->line('shr_interest_phase') ?></label>
									<a class="btn-sm btn-default" id="shr_tp_12" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('shr_interest_phase_tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
									<a <?= fieldStatus($view_name, $stakeholder_id, "interest_phase") ?> data-field="interest_phase" data-field_name="<?= $this->lang->line('shr_interest_phase') ?>" data-item_id="<?= $stakeholder_id ?>" data-view="<?= $view_name ?>" data-toggle="modal" data-placement="left" data-target="#write-evaluation" data-tt="tooltip"><i class="glyphicon glyphicon-list-alt"></i></a>
									<span id="count-i"></span>
									<div>
										<textarea 
											oninput="limitText(this, 2e3, 'i')"
											placeholder="<?= $this->lang->line('placeholder_generic') ?>"
											rows="3" 
											id="shr_txt_12" 
											name="interest_phase" 
											class="form-control" 
											onkeyup="limite_textarea(this.value, 'shr_12')" 
											maxlength="2000" 
											oninput="eylem(this, this.value)"><?php echo $interest_phase; ?></textarea>
									</div>
								</div>

								<div class=" col-lg-12 form-group">
									<label for="observations"><?= $this->lang->line('shr_observations') ?></label>
									<a class="btn-sm btn-default" id="shr_tp_13" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('shr_observations_tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
									<a <?= fieldStatus($view_name, $stakeholder_id, "observations") ?> data-field="observations" data-field_name="<?= $this->lang->line('shr_observations') ?>" data-item_id="<?= $stakeholder_id ?>" data-view="<?= $view_name ?>" data-toggle="modal" data-placement="left" data-target="#write-evaluation" data-tt="tooltip"><i class="glyphicon glyphicon-list-alt"></i></a>
									<span id="count-j"></span>
									<div>
										<textarea 
											oninput="limitText(this, 2e3, 'j')"
											placeholder="<?= $this->lang->line('placeholder_generic') ?>"
											rows="5" 
											id="shr_txt_13" 
											name="observations" 
											class="form-control" 
											onkeyup="limite_textarea(this.value, 'shr_13')" 
											maxlength="2000" 
											oninput="eylem(this, this.value)"><?php echo $observations; ?></textarea>
									</div>
								</div>

								<div class="col-lg-12 m-t-10">
									<button id="stakeholder-submit" type="submit" value="Save" class="btn btn-lg btn-success pull-right">
										<i class="glyphicon glyphicon-ok"></i> <?= $this->lang->line('btn-save') ?>
									</button>
							</form>
							<form action="<?php echo base_url('stakeholder/stakeholder-register/list/');  ?><?php echo $_SESSION['project_id']; ?>">
								<button class="btn btn-lg btn-info pull-left"> <i class="glyphicon glyphicon-chevron-left"></i> <?= $this->lang->line('btn-back') ?></button>
							</form>
						</div>
					</div>
				</div>
			</section>
		</div>
	</div>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.10/jquery.mask.js"></script>
<script>
	for (var i = 1; i <= 13; i++) {
		// if (document.getElementById("shr_tp_" + i).title == "") {
			document.getElementById("shr_tp_" + i).hidden = true;
		// }
		// limite_textarea(document.getElementById("shr_txt_" + i).value, "shr_" + i);
	}

	function limite_textarea(valor, txt) {
		var limite = 2000;
		var caracteresDigitados = valor.length;
		var caracteresRestantes = limite - caracteresDigitados;
		$("." + txt).text(caracteresRestantes);
	}
</script>

<script type="text/javascript">
	function testInput(event) {
		var value = String.fromCharCode(event.which);
		var pattern = new RegExp(/[a-zåäö ]/i);
		return pattern.test(value);
	}

	$('#name_text').bind('keypress', testInput);
</script>


<?php $this->load->view('frame/footer_view') ?>