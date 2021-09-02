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

                                <?= $this->lang->line('shr_title')  ?>

                            </h1>

                            <form method="POST" action="<?php echo base_url('stakeholder/stakeholder-register/insert/'); ?><?php echo $id; ?>">

                            <div class="col-lg-4 form-group">
									<label for="name"><?= $this->lang->line('shr_name') ?> *</label>
									<span class="shr_1">2000</span><?= $this->lang->line('character') ?>
									<a class="btn-sm btn-default" id="shr_tp_1" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('shr_name_tooltip') ?>"><i class="glyphicon glyphicon-comment"></i></a>
									<div>
									<input id="shr_txt_1" type="text" name="name" class="form-control input-md" onkeyup = "limite_textarea(this.value, 'shr_1')" maxlength="2000" oninput="eylem(this, this.value)" required="true">
									</div>
								</div>

								<!-- valor 0 para externo | valor 1 para interno -->
								<div class="col-lg-4 form-group">
									<label for="type"><?= $this->lang->line('shr_type') ?></label>
									<a class="btn-sm btn-default" id="shr_tp_2" data-toggle=" tooltip" data-placement="right" title="<?= $this->lang->line('shr_type_tooltip') ?>"><i class="glyphicon glyphicon-comment"></i></a>
									<select name="type" class="form-control" value="<?php echo $type; ?>">
										<option value="0"><?= $this->lang->line('shr_type_external') ?></option>
										<option value="1"><?= $this->lang->line('shr_type_internal') ?></option>
									</select>
								</div>


								<!-- valor 0 para cliente| valor 1 para team| valor 2 para provedor | valor 3 para gerente | valor 4 para patrocinador | valor 5 para outros -->
								<div class="col-lg-4 form-group">
									<label for="role"><?= $this->lang->line('shr_role') ?></label>
									<a class="btn-sm btn-default" id="shr_tp_3" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('shr_role_tooltip') ?>"><i class="glyphicon glyphicon-comment"></i></a>
									<select name="role" class="form-control" value="<?php echo $role; ?>">
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
									<span class="shr_5">2000</span><?= $this->lang->line('character') ?>
									<a class="btn-sm btn-default" id="shr_tp_4" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('shr_organization_tooltip') ?>"><i class="glyphicon glyphicon-comment"></i></a>
									<div>
									<input id="shr_txt_4" type="text" name="organization" class="form-control input-md" onkeyup = "limite_textarea(this.value, 'shr_4')" maxlength="2000" oninput="eylem(this, this.value)" required="false">
									</div>
								</div>


								<div class=" col-lg-4 form-group">
									<label for="position"><?= $this->lang->line('shr_position') ?></label>
									<span class="shr_5">2000</span><?= $this->lang->line('character') ?>
									<a class="btn-sm btn-default" id="shr_tp_5" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('shr_position_tooltip') ?>"><i class="glyphicon glyphicon-comment"></i></a>

									<div>
									<input id="shr_txt_5" type="text" name="position" class="form-control input-md" onkeyup = "limite_textarea(this.value, 'shr_5')" maxlength="2000" oninput="eylem(this, this.value)" required="false">
									</div>
								</div>

								<div class=" col-lg-4 form-group">
									<label for="email"><?= $this->lang->line('shr_email') ?> *</label>
									<span class="shr_6">2000</span><?= $this->lang->line('character') ?>
									<a class="btn-sm btn-default" id="shr_tp_6" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('shr_email_tooltip') ?>"><i class="glyphicon glyphicon-comment"></i></a>

									<div>
									<input id="shr_txt_6" type="text" name="email" class="form-control input-md" onkeyup = "limite_textarea(this.value, 'shr_6')" maxlength="2000" oninput="eylem(this, this.value)" required="true">
									</div>
								</div>

								<div class=" col-lg-12 form-group">
									<label for="responsibility"><?= $this->lang->line('shr_responsibility') ?></label>
									<span class="shr_7">2000</span><?= $this->lang->line('character') ?>
									<a class="btn-sm btn-default" id="shr_tp_7" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('shr_responsibility_tooltip') ?>"><i class="glyphicon glyphicon-comment"></i></a>

									<div>
									<textarea onkeyup="limite_textarea(this.value, 'shr_7')" maxlength="2000" oninput="eylem(this, this.value)" class="form-control elasticteste" id="shr_txt_7" name="responsibility" required ="false" ></textarea>
									</div>
								</div>

								<div class=" col-lg-6 form-group">
									<label for="phone_number"><?= $this->lang->line('shr_phone_number') ?></label>
									<a class="btn-sm btn-default" id="shr_tp_8" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('shr_phone_number_tooltip') ?>"><i class="glyphicon glyphicon-comment"></i></a>

									<div>
										<input id="phone_number" name="phone_number" type="tel" class="form-control phone-ddd-mask" data-mask="(000) 0000-0000" placeholder="Ex.: (000) 00000-0000">
									</div>
								</div>

								<div class=" col-lg-6 form-group">
									<label for="work_place"><?= $this->lang->line('shr_work_place') ?></label>
									<span class="shr_9">2000</span><?= $this->lang->line('character') ?>
									<a class="btn-sm btn-default" id="shr_tp_9" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('shr_work_place_tooltip') ?>"><i class="glyphicon glyphicon-comment"></i></a>

									<div>
									<input id="shr_txt_9" type="text" name="work_place" class="form-control input-md" onkeyup = "limite_textarea(this.value, 'shr_9')" maxlength="2000" oninput="eylem(this, this.value)" required="false">
									</div>
								</div>


								<div class=" col-lg-12 form-group">
									<label for="essential_requirements"><?= $this->lang->line('shr_essential_requirements') ?></label>
									<span class="shr_10">2000</span><?= $this->lang->line('character') ?>
									<a class="btn-sm btn-default" id="shr_tp_10" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('shr_essential_requirements_tooltip') ?>"><i class="glyphicon glyphicon-comment"></i></a>

									<div>
									<textarea onkeyup="limite_textarea(this.value, 'shr_10')" maxlength="2000" oninput="eylem(this, this.value)" class="form-control elasticteste" id="shr_txt_10" name="essential_requirements" required ="false" ></textarea>
									</div>
								</div>

								<div class=" col-lg-12 form-group">
									<label for="main_expectations"><?= $this->lang->line('shr_main_expectations') ?></label>
									<span class="shr_11">2000</span><?= $this->lang->line('character') ?>
									<a class="btn-sm btn-default" id="shr_tp_11" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('shr_main_expectations_tooltip') ?>"><i class="glyphicon glyphicon-comment"></i></a>

									<div>
									<textarea onkeyup="limite_textarea(this.value, 'shr_11')" maxlength="2000" oninput="eylem(this, this.value)" class="form-control elasticteste" id="shr_txt_11" name="main_expectations" required ="false" ></textarea>
									</div>
								</div>

								<div class=" col-lg-12 form-group">
									<label for="interest_phase"><?= $this->lang->line('shr_interest_phase') ?></label>
									<span class="shr_12">2000</span><?= $this->lang->line('character') ?>
									<a class="btn-sm btn-default" id="shr_tp_12" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('shr_interest_phase_tooltip') ?>"><i class="glyphicon glyphicon-comment"></i></a>

									<div>
									<textarea onkeyup="limite_textarea(this.value, 'shr_12')" maxlength="2000" oninput="eylem(this, this.value)" class="form-control elasticteste" id="shr_txt_12" name="interest_phase" required ="false" ></textarea>
									</div>
								</div>

								<div class=" col-lg-12 form-group">
									<label for="observations"><?= $this->lang->line('shr_observations') ?></label>
									<span class="shr_13">2000</span><?= $this->lang->line('character') ?>
									<a class="btn-sm btn-default" id="shr_tp_13" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('shr_observations_tooltip') ?>"><i class="glyphicon glyphicon-comment"></i></a>

									<div>
									<textarea onkeyup="limite_textarea(this.value, 'shr_13')" maxlength="2000" oninput="eylem(this, this.value)" class="form-control elasticteste" id="shr_txt_13" name="observations" required ="false" ></textarea>
									</div>
								</div>

                                <div class="col-lg-12">
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

<script>
   for (var i = 1; i <= 13; i++) {
		if (document.getElementById("shr_tp_" + i).title == "") {
			document.getElementById("shr_tp_" + i).hidden = true;
		}
		limite_textarea(document.getElementById("shr_txt_" + i).value, "shr_" + i);
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
<script type="text/javascript">
    function testInput(event) {
        var value = String.fromCharCode(event.which);
        var pattern = new RegExp(/[a-zåäö ]/i);
        return pattern.test(value);
    }

    $('#name_text').bind('keypress', testInput);
</script>

<?php $this->load->view('frame/footer_view') ?>