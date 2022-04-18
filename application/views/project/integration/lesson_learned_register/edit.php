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

								<?= $this->lang->line('llr_title')  ?>

							</h1>
                            <!-- avaliação -->
							<link href="<?= base_url() ?>assets/css/field_evaluation.css" rel="stylesheet" type="text/css">
							<?php $view_name = "lesson learned register";
							getViewFields($view_name);
							?>
							<?php $this->load->view('construction_services/write_field_evaluation') ?>
							
                            <?php extract($lesson_learned_register);?>
                            <?php extract ($knowledge_area); ?>
							<form action="<?= base_url() ?>integration/lesson-learned-register/update/<?php echo $lesson_learned_register_id; ?>" method="post">

								<input type="hidden" name="project_id" value="<?php echo $project_id; ?>">
								<input type="hidden" name="status" value="1">

								<div class="col-lg-9 form-group">
                                    <label for="stakeholder"><?= $this->lang->line('llr_stakeholder') ?> *</label>
                                    <span class="llr_1">2000</span><?= $this->lang->line('character') ?>
                                    <a class="btn-sm btn-default" id="llr_tp_1" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('llr_stakeholder_tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
                                    <a <?= fieldStatus($view_name, $lesson_learned_register_id, "stakeholder") ?> data-field="stakeholder" data-field_name="<?= $this->lang->line('llr_stakeholder') ?>" data-item_id="<?= $lesson_learned_register_id ?>" data-view="<?= $view_name ?>" data-toggle="modal" data-placement="left" data-target="#write-evaluation" data-tt="tooltip"><i class="glyphicon glyphicon-list-alt"></i></a>
                                    <div>
                                    <input id="llr_txt_1" type="text" name="stakeholder" class="form-control input-md" onkeyup = "limite_textarea(this.value, 'llr_1')" maxlength="2000" oninput="eylem(this, this.value)" required="false" value="<?php echo $stakeholder; ?>">
                                    </div>
                                </div>

                                <div class="col-lg-3 form-group">
                                    <label for="date"><?= $this->lang->line('llr_date') ?> *</label>
                                    <a class="btn-sm btn-default" id="llr_tp_2" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('llr_date_tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
                                    <a <?= fieldStatus($view_name, $lesson_learned_register_id, "date") ?> data-field="date" data-field_name="<?= $this->lang->line('llr_date') ?>" data-item_id="<?= $lesson_learned_register_id ?>" data-view="<?= $view_name ?>" data-toggle="modal" data-placement="left" data-target="#write-evaluation" data-tt="tooltip"><i class="glyphicon glyphicon-list-alt"></i></a>
                                    <div>
                                        <input id="date" name="date" type="date" class="form-control input-md" value="<?php echo $date; ?>">
                                    </div>
                                </div>

                                <div class=" col-lg-12 form-group">
                                 <label for="description"><?= $this->lang->line('llr_description') ?> </label>
                                 <span class="llr_3">2000</span><?= $this->lang->line('character') ?>
                                 <a class="btn-sm btn-default" id="llr_tp_3" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('llr_description_tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
                                 <a <?= fieldStatus($view_name, $lesson_learned_register_id, "description") ?> data-field="description" data-field_name="<?= $this->lang->line('llr_description') ?>" data-item_id="<?= $lesson_learned_register_id ?>" data-view="<?= $view_name ?>" data-toggle="modal" data-placement="left" data-target="#write-evaluation" data-tt="tooltip"><i class="glyphicon glyphicon-list-alt"></i></a>
                                 <div>
                                  <textarea onkeyup="limite_textarea(this.value, 'llr_3')" id="llr_txt_3" maxlength="2000" oninput="eylem(this, this.value)" class="form-control elasticteste" name="description"><?php echo $description; ?></textarea>
                                 </div>
                                </div>

                                <div class="col-lg-6 form-group">
                                    <label for="category"><?= $this->lang->line('llr_category') ?> *</label>
                                    <span class="llr_4">2000</span><?= $this->lang->line('character') ?>
                                    <a class="btn-sm btn-default" id="llr_tp_4" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('llr_category_tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
                                    <a <?= fieldStatus($view_name, $lesson_learned_register_id, "category") ?> data-field="category" data-field_name="<?= $this->lang->line('llr_category') ?>" data-item_id="<?= $lesson_learned_register_id ?>" data-view="<?= $view_name ?>" data-toggle="modal" data-placement="left" data-target="#write-evaluation" data-tt="tooltip"><i class="glyphicon glyphicon-list-alt"></i></a>
                                    <div>
                                    <input id="llr_txt_4" type="text" name="category" class="form-control input-md" onkeyup = "limite_textarea(this.value, 'llr_4')" maxlength="2000" oninput="eylem(this, this.value)" required="false" value="<?php echo $category; ?>">             
                                    </div>
                                </div>

                                <div class="col-lg-6 form-group">
                                    <label for="interested"><?= $this->lang->line('llr_interested') ?> *</label>
                                    <span class="llr_5">2000</span><?= $this->lang->line('character') ?>
                                    <a class="btn-sm btn-default" id="llr_tp_5" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('llr_interested_tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
                                    <a <?= fieldStatus($view_name, $lesson_learned_register_id, "interested") ?> data-field="interested" data-field_name="<?= $this->lang->line('llr_interested') ?>" data-item_id="<?= $lesson_learned_register_id ?>" data-view="<?= $view_name ?>" data-toggle="modal" data-placement="left" data-target="#write-evaluation" data-tt="tooltip"><i class="glyphicon glyphicon-list-alt"></i></a>
                                    <div>
                                    <input id="llr_txt_5" type="text" name="interested" class="form-control input-md" onkeyup = "limite_textarea(this.value, 'llr_5')" maxlength="2000" oninput="eylem(this, this.value)" required="false" value="<?php echo $interested; ?>">
                                    </div>
                                </div>

                                <div class="col-lg-6 form-group">
                                    <label for="status"><?= $this->lang->line('llr_status') ?> *</label>
                                    <span class="llr_6">2000</span><?= $this->lang->line('character') ?>
                                    <a class="btn-sm btn-default" id="llr_tp_6" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('llr_status_tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
                                    <a <?= fieldStatus($view_name, $lesson_learned_register_id, "status") ?> data-field="status" data-field_name="<?= $this->lang->line('llr_status') ?>" data-item_id="<?= $lesson_learned_register_id ?>" data-view="<?= $view_name ?>" data-toggle="modal" data-placement="left" data-target="#write-evaluation" data-tt="tooltip"><i class="glyphicon glyphicon-list-alt"></i></a>
                                    <div>
                                    <input id="llr_txt_6" type="text" name="status" class="form-control input-md" onkeyup = "limite_textarea(this.value, 'llr_6')" maxlength="2000" oninput="eylem(this, this.value)" required="false" value="<?php echo $status; ?>">
                                    </div>
                                </div>

                                <div class="col-lg-6 form-group">
                                    <label for="impact"><?= $this->lang->line('llr_impact') ?> *</label>
                                    <span class="llr_7">2000</span><?= $this->lang->line('character') ?>
                                    <a class="btn-sm btn-default" id="llr_tp_7" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('llr_impact_tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
                                    <a <?= fieldStatus($view_name, $lesson_learned_register_id, "impact") ?> data-field="impact" data-field_name="<?= $this->lang->line('llr_impact') ?>" data-item_id="<?= $lesson_learned_register_id ?>" data-view="<?= $view_name ?>" data-toggle="modal" data-placement="left" data-target="#write-evaluation" data-tt="tooltip"><i class="glyphicon glyphicon-list-alt"></i></a>
                                    <div>
                                    <input id="llr_txt_7" type="text" name="impact" class="form-control input-md" onkeyup = "limite_textarea(this.value, 'llr_7')" maxlength="2000" oninput="eylem(this, this.value)" required="false" value="<?php echo $impact; ?>">
                                    </div>
                                </div>

                                <div class=" col-lg-12 form-group">
                                 <label for="recommendations"><?= $this->lang->line('llr_recommendations') ?> </label>
                                  <span class="llr_8">2000</span><?= $this->lang->line('character') ?>
                                  <a class="btn-sm btn-default" id="llr_tp_8" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('llr_recommendations_tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
                                  <a <?= fieldStatus($view_name, $lesson_learned_register_id, "recommendations") ?> data-field="recommendations" data-field_name="<?= $this->lang->line('llr_recommendations') ?>" data-item_id="<?= $lesson_learned_register_id ?>" data-view="<?= $view_name ?>" data-toggle="modal" data-placement="left" data-target="#write-evaluation" data-tt="tooltip"><i class="glyphicon glyphicon-list-alt"></i></a>
                                 <div>
                                 <textarea onkeyup="limite_textarea(this.value, 'llr_8')" id="llr_txt_8" maxlength="2000" oninput="eylem(this, this.value)" class="form-control elasticteste" name="recommendations"><?php echo $recommendations; ?></textarea>
                                 </div>
                                </div>

                                <div class="col-lg-6 form-group">
                                    <label for="life_cycle"><?= $this->lang->line('llr_life_cycle') ?> *</label>
                                    <span class="llr_9">2000</span><?= $this->lang->line('character') ?>
                                    <a class="btn-sm btn-default" id="llr_tp_9" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('llr_life_cycle_tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
                                    <a <?= fieldStatus($view_name, $lesson_learned_register_id, "life_cycle") ?> data-field="life_cycle" data-field_name="<?= $this->lang->line('llr_life_cycle') ?>" data-item_id="<?= $lesson_learned_register_id ?>" data-view="<?= $view_name ?>" data-toggle="modal" data-placement="left" data-target="#write-evaluation" data-tt="tooltip"><i class="glyphicon glyphicon-list-alt"></i></a>
                                    <div>
                                    <textarea onkeyup="limite_textarea(this.value, 'llr_9')" id="llr_txt_9" maxlength="2000" oninput="eylem(this, this.value)" class="form-control elasticteste" name="life_cycle"><?php echo $life_cycle; ?></textarea>
                                    </div>
                                </div>

                                <div class="col-lg-4 form-group">
                                    <label for ="knowledge_area"><?= $this->lang->line('llr_knowledge_area') ?></label>
                                    <a <?= fieldStatus($view_name, $lesson_learned_register_id, "knowledge_area") ?> data-field="knowledge_area" data-field_name="<?= $this->lang->line('llr_knowledge_area') ?>" data-item_id="<?= $lesson_learned_register_id ?>" data-view="<?= $view_name ?>" data-toggle="modal" data-placement="left" data-target="#write-evaluation" data-tt="tooltip"><i class="glyphicon glyphicon-list-alt"></i></a>
                                    <select name="knowledge_area" size="1" class="form-control" tabindex="1">
                                        <?php foreach ($knowledge_area as $ka) { ?>
                                        <option value="<?= $ka->knowledge_area_id; ?>"
                                            <?php if ($knowledge_area_id == $ka->knowledge_area_id) echo 'selected'; ?>>
                                            <?php $ka-> name ?>
                                            </option>
                                            <?php } ?>
                                            </select>
								</div>

								<div class="col-lg-12">
									<button id="lesson_learned_register-submit" type="submit" value="Save" class="btn btn-lg btn-success pull-right">
										<i class="glyphicon glyphicon-ok"></i> <?= $this->lang->line('btn-save') ?>
									</button>
							</form>
							<form action="<?php echo base_url('integration/lesson-learned-register/list/');  ?><?php echo $_SESSION['project_id']; ?>">
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
<script src="<?= base_url() ?>assets/js/jquery-1.11.1.js" type="text/javascript"></script>
<script type="text/javascript">
	function testInput(event) {
		var value = String.fromCharCode(event.which);
		var pattern = new RegExp(/[a-zåäö ]/i);
		return pattern.test(value);
	}

	$('#name_text').bind('keypress', testInput);
    for (var i = 1; i <= 9; i++) {
		if (document.getElementById("llr_tp_" + i).title == "") {
			document.getElementById("llr_tp_" + i).hidden = true;
		}
		
	}
    limite_textarea(document.getElementById("llr_txt_" + i).value, "llr_" + i);
	function limite_textarea(valor, txt) {
		var limite = 2000;
		var caracteresDigitados = valor.length;
		var caracteresRestantes = limite - caracteresDigitados;
		$("." + txt).text(caracteresRestantes);
	}
</script>


<?php $this->load->view('frame/footer_view') ?>