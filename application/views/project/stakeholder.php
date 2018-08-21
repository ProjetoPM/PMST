<div id="page-wrapper">
	<div class="row">
		<div class="col-lg-12">
			<h1 class="page-header"></h1>
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
				<h3>Cadastro de Stakeholder
					<span class="pull-right"><a href="<?php echo base_url(); ?>" class="btn btn-primary"><span class="glyphicon glyphicon-arrow-left"></span> Back</a></span>
				</h3>
				<div class="container-fluid">
					<p class="text-center text-muted h5">Preencha os campos</p>
				</div>
				<form method="POST" action="<?php echo base_url('GerenciarStake/insert/'); ?><?php echo $id; ?>">
					<div class="form-group">
						<label>Nome:</label>
						<input type="text" class="form-control" name="name">
					</div>
					<div class="form-group">
						<label>Tipo:</label>
						<select name="type">
							<option value="Externa">Externa</option>
							<option value="Interna">Interna</option>
						</select>
					</div>
					<div class="form-group">
						<label>Organização:</label>
						<input type="text" class="form-control" name="organization">
					</div>
					<div class="form-group">
						<label>Posição na organização:</label>
						<input type="text" class="form-control" name="position">
					</div>
					<div class="form-group">
						<label>Principal papel no Projeto:</label>
						<select name="role">
							<option value="Cliente">Cliente</option>
							<option value="Equipe">Equipe</option>
							<option value="Fornecedor">Fornecedor</option>
							<option value="Gerente do Projeto">Gerente do Projeto</option>
							<option value="Patrocinador">Patrocinador</option>
							<option value="Outros">Outros</option>
						</select>
					</div>
					<div class="form-group">
						<label>Principal Responsabilidade no Projeto:</label>
						<input type="text" class="form-control" name="responsibility">
					</div>
					<div class="form-group">
						<label>Email:</label>
						<input type="text" class="form-control" name="email">
					</div>
					<div class="form-group">
						<label>Fone:</label>
						<input type="text" class="form-control" name="phone_number">
					</div>
					<div class="form-group">
						<label>Local de Trabalho:</label>
						<input type="text" class="form-control" name="work_place">
					</div>
					<div class="form-group">
						<label>Requisitos Essenciais:</label>
						<input type="text" class="form-control" name="essential_requirements">
					</div>
					<div class="form-group">
						<label>Principais Expectativas:</label>
						<input type="text" class="form-control" name="main_expectations">
					</div>
					<div class="form-group">
						<label>Fase de Maior Interesse:</label>
						<input type="text" class="form-control" name="interest_phase">
					</div>
					<div class="form-group">
						<label>Observações:</label>
						<input type="text" class="form-control" name="observations">
					</div>
					<button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-floppy-disk"></span> Save</button>
				</form>
			</section>
		</div>
	</div>
	<?php $this->load->view('frame/footer_view')?>
