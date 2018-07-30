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
	<?php extract($projectCharter); ?>
	<div class="row">
		<div class="col-sm-8 col-sm-offset-2">
			<h3>Editar Carta de Projeto com ID <?php echo $project_charter_id?>
				<span class="pull-right"><a href="<?php echo base_url(); ?>index.php/projectCharter/index" class="btn btn-primary"><span class="glyphicon glyphicon-arrow-left"></span> Voltar</a></span>
			</h3>
			<hr>
			<form method="POST" action="<?php echo base_url(); ?>index.php/projectCharter/update/<?php echo $project_charter_id; ?>">
				<div class="row">
				<div class="form-group col-md-6">
					<label>ID:</label>
					<input type="text" class="form-control" value="<?php echo $project_charter_id; ?>" name=project_charter_id" readonly>
				</div>
				<div class="form-group col-md-6">
					<label>ID do Projeto:</label>
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
					<textarea class="form-control" name="scope" maxlength="4000" required><?php echo $scope?></textarea>
				</div>
				<div class="form-group col-md-6">
					<label>Objetivo:</label>
					<textarea class="form-control" name="objective" maxlength="4000" required><?php echo $objective?></textarea>
				</div>
				<div class="form-group col-md-6">
					<label>Sucesso:</label>
					<textarea class="form-control" name="success" maxlength="4000" required> <?php echo $success?></textarea>
				</div>
				<div class="form-group col-md-6">
					<label>Requisitos:</label>
					<textarea class="form-control" name="requirements" maxlength="4000" required><?php echo $requirements?></textarea>
				</div>
				<div class="form-group col-md-6">
					<label>Suposições:</label>
					<textarea class="form-control" name="assumptions" maxlength="4000" required><?php echo $assumptions?></textarea>
				</div>
				<div class="form-group col-md-6">
					<label>Restrições:</label>
					<textarea class="form-control" name="constraints" maxlength="4000" required><?php echo $constraints?></textarea>
				</div>
				<div class="form-group col-md-6">
					<label>Riscos:</label>
					<textarea class="form-control" name="risks" maxlength="4000" required><?php echo $risks?></textarea>
				</div>
				<div class="form-group col-md-6">
					<label>Marco:</label>
					<textarea class="form-control" name="milestone" maxlength="4000" required><?php echo $milestone?></textarea>
				</div>
				<div class="form-group col-md-6">
					<label>Mover:</label>
					<textarea class="form-control" name="budge" maxlength="4000" required><?php echo $budge?></textarea>
				</div>
				<div class="form-group col-md-6">
					<label>Parte Interessada:</label>
					<textarea class="form-control" name="stakeholder" maxlength="4000" required><?php echo $stakeholder?></textarea>
				</div>
				<div class="form-group col-md-6">
					<label>AprovalReq:</label>
					<textarea class="form-control" name="aprovalReq" maxlength="4000" required><?php echo $aprovalReq?></textarea>
				</div>
				<div class="form-group col-md-6">
					<label>Status:</label>
					<?php 
						if($status == 1){
					?>
						<input type="radio" checked name="status" value="1">
						<label>On</label><br>
						<input type="radio" name="status" value="0">
						<label>Off</label>

					<?php
						}else{
					?>
						<input type="radio" name="status" value="1">
						<label>On</label><br>
						<input type="radio" checked name="status" value="0">
						<label>Off</label>
					<?php
						}
					?>
				</div>
				<div class="form-group col-md-6">
					<label>Data de Início:</label>
					<input type="date" class="form-control" name="start_date" value="<?php echo $start_date?>" required>
				</div>
				<div class="form-group col-md-6">
					<label>Data de Término:</label>
					<input type="date" class="form-control" name="end_date" value="<?php echo $end_date?>" required>
				</div>
				</div>
				
				<button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-check"></span> Alterar</button>
			</form>
		</div>
	</div>
</div>
</body>
</html>