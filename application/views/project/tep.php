<div id="page-wrapper">
	<div class="row">
		<div class="col-lg-12">
			<h1 class="page-header"><?=$this->lang->line('tep-title')?></h1>
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
				
				<?php
				$valida=false;
				foreach ($project_closure_term as $tep){
					if($tep->project_id==$id){
						$valida=true;
						?>
						<form method="POST" action="<?php echo base_url('TEP/insert/'); ?><?php echo $id[0]; ?>">

								<div class=" col-lg-12 form-group">
                <label for="client"><?=$this->lang->line('tep-client')?> *</label> 
                <a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?=$this->lang->line('tep-client-tooltip')?>"><i class="glyphicon glyphicon-comment"></i></a>

                <div >                 
                  <textarea oninput="eylem(this, this.value)" class="form-control elasticteste" id="client" name="client" required="true"><?= $tep[0]->client;?></textarea>  
                </div>
              </div>

						
						<div class=" col-lg-6 form-group">
                <label for="closing_date"><?=$this->lang->line('tep-closing_date')?> *</label> 
                <a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?=$this->lang->line('tep-closing_date-tooltip')?>"><i class="glyphicon glyphicon-comment"></i></a>

                <div >                 
                  <textarea oninput="eylem(this, this.value)" class="form-control elasticteste" id="closing_date" name="closing_date" required="true"><?= $tep[0]->closing_date;?></textarea>  
                </div>
              </div>


						<div class=" col-lg-6 form-group">
                <label for="changes_approved"><?=$this->lang->line('tep-changes_approved')?> *</label> 
                <a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?=$this->lang->line('tep-changes_approved-tooltip')?>"><i class="glyphicon glyphicon-comment"></i></a>

                <div >                 
                  <textarea oninput="eylem(this, this.value)" class="form-control elasticteste" id="changes_approved" name="changes_approved" required="true"><?= $tep[0]->changes_approved;?></textarea>  
                </div>
              </div>


              		<div class=" col-lg-12 form-group">
                <label for="main_deviations"><?=$this->lang->line('tep-main_deviations')?> </label> 
                <a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?=$this->lang->line('tep-main_deviations-tooltip')?>"><i class="glyphicon glyphicon-comment"></i></a>

                <div >                 
                  <textarea oninput="eylem(this, this.value)" class="form-control elasticteste" id="main_deviations" name="main_deviations"><?= $tep[0]->main_deviations;?></textarea>  
                </div>
              </div>

						
						<div class=" col-lg-6 form-group">
                <label for="lessons_learned"><?=$this->lang->line('tep-lessons_learned')?> *</label> 
                <a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?=$this->lang->line('tep-lessons_learned-tooltip')?>"><i class="glyphicon glyphicon-comment"></i></a>

                <div >                 
                  <textarea oninput="eylem(this, this.value)" class="form-control elasticteste" id="lessons_learned" name="lessons_learned" required="true"><?= $tep[0]->lessons_learned;?></textarea>  
                </div>
              </div>


						<div class=" col-lg-6 form-group">
                <label for="client_comments"><?=$this->lang->line('tep-client_comments')?> *</label> 
                <a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?=$this->lang->line('tep-client_comments-tooltip')?>"><i class="glyphicon glyphicon-comment"></i></a>

                <div >                 
                  <textarea oninput="eylem(this, this.value)" class="form-control elasticteste" id="client_comments" name="client_comments" required="true"><?= $tep[0]->client_comments;?></textarea>  
                </div>
              </div>


              			<div class=" col-lg-12 form-group">
                <label for="sponsor_comments"><?=$this->lang->line('tep-sponsor_comments')?> </label> 
                <a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?=$this->lang->line('tep-sponsor_comments-tooltip')?>"><i class="glyphicon glyphicon-comment"></i></a>

                <div >                 
                  <textarea oninput="eylem(this, this.value)" class="form-control elasticteste" id="sponsor_comments" name="sponsor_comments"><?= $tep[0]->sponsor_comments;?></textarea>  
                </div>
              </div>



							<div class="form-group">
								<label>Client:</label><a href="#" type="button" id="tooltip" data-toggle="tooltip" data-placement="top" title="Name of client">
									?
								</a>
								<input type="text" class="form-control" value="<?php echo $tep->client; ?>" name="client">
							</div>
							<div>
								<label>Date of project closure:</label><a href="#" type="button" id="tooltip" data-toggle="tooltip" data-placement="top" title="Date of project closure">
									?
								</a><br>
								<input class='form-control' type="date" value="<?php echo $tep->closing_date; ?>" name="closing_date"><br></br>
							</div>
							<div class="form-group">
								<label>Main changes approved:</label><a href="#" type="button" id="tooltip" data-toggle="tooltip" data-placement="top" title="Main changes approved">
									?
								</a>
								<input type="text" class="form-control" value="<?php echo $tep->changes_approved; ?>" name="changes_approved">
							</div>
							<div class="form-group">
								<label>Main deviationst:</label><a href="#" type="button" id="tooltip" data-toggle="tooltip" data-placement="top" title="Main deviationst">
									?
								</a>
								<input type="text" class="form-control" value="<?php echo $tep->main_deviations; ?>" name="main_deviations">
							</div>
							<div class="form-group">
								<label>Main lessons learned:</label><a href="#" type="button" id="tooltip" data-toggle="tooltip" data-placement="top" title="Main lessons learned">
									?
								</a>
								<input type="text" class="form-control" value="<?php echo $tep->lessons_learned; ?>" name="lessons_learned">
							</div>
							<div class="form-group">
								<label>Client comments:</label><a href="#" type="button" id="tooltip" data-toggle="tooltip" data-placement="top" title="Client comments">
									?
								</a>
								<input type="text" class="form-control" value="<?php echo $tep->client_comments; ?>" name="client_comments">
							</div>
							<div class="form-group">
								<label>Sponsor's comments:</label><a href="#" type="button" id="tooltip" data-toggle="tooltip" data-placement="top" title="Sponsor's comments">
									?
								</a>
								<input type="text" class="form-control" value="<?php echo $tep->sponsor_comments; ?>" name="sponsor_comments">
							</div>
							<div class="col-lg-12">
                <button id="new_human_resource-submit" type="submit" value="Save" class="btn btn-lg btn-success pull-right">
                    <i class="glyphicon glyphicon-ok"></i> <?=$this->lang->line('btn-save')?>
                </button> 
              </form>

              <form action="<?php echo base_url('project/'); ?><?php echo $id; ?>" >
                <button class="btn btn-lg btn-info pull-left" >  <i class="glyphicon glyphicon-chevron-left"></i> <?=$this->lang->line('btn-back')?></button>
              </form>
                
              </div>
						</form> 
						<?php
					}
				}
				if($valida==false){
					?>

					<form method="POST" action="<?php echo base_url('TEP/insert/'); ?><?php echo $id[0]; ?>">
						
						<div class=" col-lg-12 form-group">
                <label for="client"><?=$this->lang->line('tep-client')?> *</label> 
                <a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?=$this->lang->line('tep-client-tooltip')?>"><i class="glyphicon glyphicon-comment"></i></a>

                <div >                 
                  <textarea oninput="eylem(this, this.value)" class="form-control elasticteste" id="client" name="client" required="true"></textarea>  
                </div>
              </div>

						
						<div class=" col-lg-6 form-group">
                <label for="closing_date"><?=$this->lang->line('tep-closing_date')?></label> 
                <a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?=$this->lang->line('tep-closing_date-tooltip')?>"><i class="glyphicon glyphicon-comment"></i></a>

                <div >                 
                  <input oninput="eylem(this, this.value)" class="form-control elasticteste" id="project_closure_date" name="project_closure_date"></input>  
                </div>
              </div>


						<div class=" col-lg-6 form-group">
                <label for="changes_approved"><?=$this->lang->line('tep-changes_approved')?> </label> 
                <a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?=$this->lang->line('tep-changes_approved-tooltip')?>"><i class="glyphicon glyphicon-comment"></i></a>

                <div >                 
                  <textarea oninput="eylem(this, this.value)" class="form-control elasticteste" id="changes_approved" name="changes_approved"></textarea>  
                </div>
              </div>


              		<div class=" col-lg-12 form-group">
                <label for="main_deviations"><?=$this->lang->line('tep-main_deviations')?> </label> 
                <a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?=$this->lang->line('tep-main_deviations-tooltip')?>"><i class="glyphicon glyphicon-comment"></i></a>

                <div >                 
                  <textarea oninput="eylem(this, this.value)" class="form-control elasticteste" id="main_deviations" name="main_deviations"></textarea>  
                </div>
              </div>

						
						<div class=" col-lg-6 form-group">
                <label for="lessons_learned"><?=$this->lang->line('tep-lessons_learned')?> </label> 
                <a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?=$this->lang->line('tep-lessons_learned-tooltip')?>"><i class="glyphicon glyphicon-comment"></i></a>

                <div >                 
                  <textarea oninput="eylem(this, this.value)" class="form-control elasticteste" id="lessons_learned" name="lessons_learned"></textarea>  
                </div>
              </div>


						<div class=" col-lg-6 form-group">
                <label for="client_comments"><?=$this->lang->line('tep-client_comments')?> </label> 
                <a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?=$this->lang->line('tep-client_comments-tooltip')?>"><i class="glyphicon glyphicon-comment"></i></a>

                <div >                 
                  <textarea oninput="eylem(this, this.value)" class="form-control elasticteste" id="client_comments" name="client_comments" ></textarea>  
                </div>
              </div>


              			<div class=" col-lg-12 form-group">
                <label for="sponsor_comments"><?=$this->lang->line('tep-sponsor_comments')?> </label> 
                <a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?=$this->lang->line('tep-sponsor_comments-tooltip')?>"><i class="glyphicon glyphicon-comment"></i></a>

                <div >                 
                  <textarea oninput="eylem(this, this.value)" class="form-control elasticteste" id="sponsor_comments" name="sponsor_comments"></textarea>  
                </div>
              </div>


						

						<div>
							<label>Date of project closure:</label><a href="#" type="button" id="tooltip" data-toggle="tooltip" data-placement="top" title="Date of project closure">
									?
								</a><br>
							<input class='form-control' type="date" name="project_closure_date"><br></br>
						</div>

						

						<div class="col-lg-12">
                <button id="new_human_resource-submit" type="submit" value="Save" class="btn btn-lg btn-success pull-right">
                    <i class="glyphicon glyphicon-ok"></i> <?=$this->lang->line('btn-save')?>
                </button> 
              </form>

              <form action="<?php echo base_url('project/'); ?><?php echo $id; ?>" >
                <button class="btn btn-lg btn-info pull-left" >  <i class="glyphicon glyphicon-chevron-left"></i> <?=$this->lang->line('btn-back')?></button>
              </form>
                
              </div>
					<?php
				}
				?>
			</section>
		</div>
	</div>
	<?php $this->load->view('frame/footer_view')?>
	