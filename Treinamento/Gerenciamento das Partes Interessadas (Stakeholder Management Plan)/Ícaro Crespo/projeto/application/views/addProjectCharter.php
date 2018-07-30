<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title>Gerenciamento das Partes Interessadas</title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>bootstrap/css/bootstrap.min.css">
</head>
<body>
<div class="container">
	<h1 class="page-header text-center">Gerenciamento das Partes Interessadas</h1>
	<center><h2>Adicionar Carta Projeto</h2></center>
	<div class="row">
		<div class="col-sm-8 col-sm-offset-2">
			<h3><span class="pull-right"><a href="<?php echo base_url(); ?>" class="btn btn-primary"><span class="glyphicon glyphicon-arrow-left"></span> Voltar</a></span></h3><br>
			<hr>
			<form method="POST" action="<?php echo base_url(); ?>index.php/projectCharter/insert">
				<div class="row">
					<div class="form-group col-md-6">
					<label>Projeto:</label>
					<select name="project_id" class="form-control" required>
						<?php
							foreach ($projects as $obj) {
						?>
							<option value="<?php echo $obj->project_id;?>"> <?php echo $obj->title;?> </option>	
						<?php
							}
						?>
					</select>
				</div>
				<div class="form-group col-md-6">
					<label>Escopo:</label>
					<textarea class="form-control" name="scope" maxlength="4000" required></textarea>
				</div>
				<div class="form-group col-md-6">
					<label>Objetivo:</label>
					<textarea class="form-control" name="objective" maxlength="4000" required></textarea>
				</div>
				<div class="form-group col-md-6">
					<label>Sucesso:</label>
					<textarea class="form-control" name="success" maxlength="4000" required></textarea>
				</div>
				<div class="form-group col-md-6">
					<label>Requisitos:</label>
					<textarea class="form-control" name="requirements" maxlength="4000" required></textarea>
				</div>
				<div class="form-group col-md-6">
					<label>Suposições:</label>
					<textarea class="form-control" name="assumptions" maxlength="4000" required></textarea>
				</div>
				<div class="form-group col-md-6">
					<label>Restrições:</label>
					<textarea class="form-control" name="constraints" maxlength="4000" required></textarea>
				</div>
				<div class="form-group col-md-6">
					<label>Riscos:</label>
					<textarea class="form-control" name="risks" maxlength="4000" required></textarea>
				</div>
				<div class="form-group col-md-6">
					<label>Marco:</label>
					<textarea class="form-control" name="milestone" maxlength="4000" required></textarea>
				</div>
				<div class="form-group col-md-6">
					<label>Mover:</label>
					<textarea class="form-control" name="budge" maxlength="4000" required></textarea>
				</div>
				<div class="form-group col-md-6">
					<label>Parte Interessada:</label>
					<textarea class="form-control" name="stakeholder" maxlength="4000" required></textarea>
				</div>
				<div class="form-group col-md-6">
					<label>AprovalReq:</label>
					<textarea class="form-control" name="aprovalReq" maxlength="4000" required></textarea>
				</div>
			</div>
				<div class="row">
					<div class="form-group col-md-4">
						<label>Data de Início:</label>
						<input type="date" class="form-control" name="start_date" required>
					</div>
					<div class="form-group col-md-4">
						<label>Data de Término:</label>
						<input type="date" class="form-control" name="end_date" required>
					</div>
				
				
				</div>
				<div class="form-group">
					<label>Status:</label>
					<input type="radio" name="status" value="1">
					<label>On</label>
					<input type="radio" name="status" value="0">
					<label>Off</label>
				</div>
				<button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-floppy-disk"></span> Salvar</button>
			</form>
		</div>
	</div>
</div>
</body>
</html>