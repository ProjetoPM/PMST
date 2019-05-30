<div id="page-wrapper">
	<div class="row">
		<div class="col-lg-12">
			<h1 class="pageheader"> <?=$this->lang->line('stakeholder-title')  ?></h1>
		</div>
		<!-- /.col-lg-12 -->
	</div>

	<?php if ($this->session->flashdata('success')): ?>
		<div class="alert alert-success">
			<a href="#" class="close" data-dismiss="alert">&times;</a>
			<strong><?php echo $this->session->flashdata('success'); ?></strong>
		</div>
		<?php elseif ($this->session->flashdata('error')): ?>
			<div class="alert alert-warning">
				<a href="#" class="close" data-dismiss="alert">&times;</a>
				<strong><?php echo $this->session->flashdata('error'); ?></strong>
			</div>
		<?php endif; ?>
		<!-- /.row -->   
		<!-- acessa o objeto do array -->

		
		<form action="<?=base_url()?>ManagementStakeholder/update/<?php echo $stakeholder_id; ?>" method="post">

			<input type="hidden" id="project_id" name="project_id" value="<?php echo $project_id; ?>">                          
			<!-- Textarea -->

            <div id="page-wrapper">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header"><?=$this->lang->line('stakeholder-title')?></h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
                <?php if($this->session->flashdata('success')):?>
                    <div class="alert alert-success">
                        <a href="#" class="close" data-dismiss="alert">&times;</a>
                        <strong><?php echo $this->session->flashdata('success'); ?></strong>
                    </div>
                <?php elseif($this->session->flashdata('error')):?>
                    <div class="alert alert-warning">
                        <a href="#" class="close" data-dismiss="alert">&times;</a>
                        <strong><?php echo $this->session->flashdata('error'); ?></strong>
                    </div>
                <?php endif;?>
                <div class="row">
                    <div class="col-lg-12">

                        <form method="POST" action="<?php echo base_url('ManagementStakeholder/edit/'); ?><?php echo $id; ?>">

                            <div class="col-lg-4 form-group">
                                <label for="name"><?=$this->lang->line('stakeholder-name')?> *</label>
                                <a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?=$this->lang->line('stakeholder-name-tooltip')?>"><i class="glyphicon glyphicon-comment"></i></a>
                                <div >
                                    <input id="name_text" name="name" type="text" class="form-control input-md" required="true">
                                </div>
                            </div>



                            <!-- valor 0 para externo | valor 1 para interno -->
                            <div class="col-lg-4 form-group">
                                <label for="type"><?=$this->lang->line('stakeholder-type')?></label>
                                <a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?=$this->lang->line('stakeholder-type-tooltip')?>"><i class="glyphicon glyphicon-comment"></i></a>
                                <select name="type" class="form-control">
                                    <option value="0"><?=$this->lang->line('stakeholder-type-external')?></option>
                                    <option value="1"><?=$this->lang->line('stakeholder-type-internal')?></option>
                                </select>
                            </div>


                            <!-- valor 0 para cliente| valor 1 para team| valor 2 para provedor | valor 3 para gerente | valor 4 para patrocinador | valor 5 para outros -->
                            <div class="col-lg-4 form-group">
                                <label for="role"><?=$this->lang->line('stakeholder-role')?></label>
                                <a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?=$this->lang->line('stakeholder-role-tooltip')?>"><i class="glyphicon glyphicon-comment"></i></a>
                                <select name="role" class="form-control">
                                    <option value="0"><?=$this->lang->line('stakeholder-role-client')?></option>
                                    <option value="1"><?=$this->lang->line('stakeholder-role-team')?></option>
                                    <option value="2"><?=$this->lang->line('stakeholder-role-provider')?></option>
                                    <option value="3"><?=$this->lang->line('stakeholder-role-project_manager')?></option>
                                    <option value="4"><?=$this->lang->line('stakeholder-role-sponsor')?></option>
                                    <option value="5"><?=$this->lang->line('stakeholder-role-others')?></option>
                                </select>
                            </div>


                            <div class="col-lg-4 form-group">
                                <label for="organization"><?=$this->lang->line('stakeholder-organization')?> </label>
                                <a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?=$this->lang->line('stakeholder-organization-tooltip')?>"><i class="glyphicon glyphicon-comment"></i></a>
                                <div >
                                    <input id="organization" name="organization" type="text" class="form-control input-md">
                                </div>
                            </div>


                            <div class=" col-lg-4 form-group">
                                <label for="position"><?=$this->lang->line('stakeholder-position')?></label>
                                <a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?=$this->lang->line('stakeholder-position-tooltip')?>"><i class="glyphicon glyphicon-comment"></i></a>

                                <div >
                                    <input id="position" name="position" type="text" class="form-control input-md">
                                </div>
                            </div>

                            <div class=" col-lg-4 form-group">
                                <label for="email"><?=$this->lang->line('stakeholder-email')?> *</label>
                                <a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?=$this->lang->line('stakeholder-email-tooltip')?>"><i class="glyphicon glyphicon-comment"></i></a>

                                <div >
                                    <input id="email" name="email" type="email" placeholder="name@email.com" required pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" class="form-control input-md" required="true">
                                </div>
                            </div>

                            <div class=" col-lg-12 form-group">
                                <label for="responsibility"><?=$this->lang->line('stakeholder-responsibility')?></label>
                                <a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?=$this->lang->line('stakeholder-responsibility-tooltip')?>"><i class="glyphicon glyphicon-comment"></i></a>

                                <div >
                                    <textarea oninput="eylem(this, this.value)" class="form-control elasticteste" id="responsibility" name="responsibility"></textarea>
                                </div>
                            </div>

                            <div class=" col-lg-6 form-group">
                                <label for="phone_number"><?=$this->lang->line('stakeholder-phone_number')?></label>
                                <a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?=$this->lang->line('stakeholder-phone_number-tooltip')?>"><i class="glyphicon glyphicon-comment"></i></a>

                                <div >
                                    <input id="phone_number" name="phone_number" type="tel" class="form-control phone-ddd-mask" data-mask="(000) 0000-0000" placeholder="Ex.: (000) 0000-0000">
                                </div>
                            </div>

                            <div class=" col-lg-6 form-group">
                                <label for="work_place"><?=$this->lang->line('stakeholder-work_place')?></label>
                                <a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?=$this->lang->line('stakeholder-work_place-tooltip')?>"><i class="glyphicon glyphicon-comment"></i></a>

                                <div >
                                    <input id="work_place" name="work_place" type="text" class="form-control input-md">
                                </div>
                            </div>


                            <div class=" col-lg-12 form-group">
                                <label for="essential_requirements"><?=$this->lang->line('stakeholder-essential_requirements')?></label>
                                <a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?=$this->lang->line('stakeholder-essential_requirements-tooltip')?>"><i class="glyphicon glyphicon-comment"></i></a>

                                <div >
                                    <textarea oninput="eylem(this, this.value)" class="form-control elasticteste" id="essential_requirements" name="essential_requirements"></textarea>
                                </div>
                            </div>

                            <div class=" col-lg-12 form-group">
                                <label for="main_expectations"><?=$this->lang->line('stakeholder-main_expectations')?></label>
                                <a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?=$this->lang->line('stakeholder-main_expectations-tooltip')?>"><i class="glyphicon glyphicon-comment"></i></a>

                                <div >
                                    <textarea oninput="eylem(this, this.value)" class="form-control elasticteste" id="main_expectations" name="main_expectations"></textarea>
                                </div>
                            </div>

                            <div class=" col-lg-12 form-group">
                                <label for="interest_phase"><?=$this->lang->line('stakeholder-interest_phase')?></label>
                                <a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?=$this->lang->line('stakeholder-interest_phase-tooltip')?>"><i class="glyphicon glyphicon-comment"></i></a>

                                <div >
                                    <textarea oninput="eylem(this, this.value)" class="form-control elasticteste" id="interest_phase" name="interest_phase"></textarea>
                                </div>
                            </div>

                            <div class=" col-lg-12 form-group">
                                <label for="observations"><?=$this->lang->line('stakeholder-observations')?></label>
                                <a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?=$this->lang->line('stakeholder-observations-tooltip')?>"><i class="glyphicon glyphicon-comment"></i></a>

                                <div >
                                    <textarea oninput="eylem(this, this.value)" class="form-control elasticteste" id="observations" name="observations"></textarea>
                                </div>
                            </div>

                            <div class="col-lg-12">
                                <button id="stakeholder-submit" type="submit" value="Save" class="btn btn-lg btn-success pull-right">
                                    <i class="glyphicon glyphicon-ok"></i> <?=$this->lang->line('btn-save')?>
                                </button>
                        </form>

                        <form action="<?php echo base_url('project/'); ?><?php echo $id; ?>" >
                            <button class="btn btn-lg btn-info pull-left" >  <i class="glyphicon glyphicon-chevron-left"></i> <?=$this->lang->line('btn-back')?></button>
                        </form>
                    </div>
                </div>

                </section>
            </div>
</div>
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


<?php $this->load->view('frame/footer_view')?>

