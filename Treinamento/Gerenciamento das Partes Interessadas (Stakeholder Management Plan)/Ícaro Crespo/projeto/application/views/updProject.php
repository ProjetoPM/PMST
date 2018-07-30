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
	<?php extract($project); ?>
	<div class="row">
		<div class="col-sm-4 col-sm-offset-4">
			<h3>Editar <?php echo $title?>
				<span class="pull-right"><a href="<?php echo base_url(); ?>index.php/project/index" class="btn btn-primary"><span class="glyphicon glyphicon-arrow-left"></span> Voltar</a></span>
			</h3>
			<hr>
			<form method="POST" action="<?php echo base_url(); ?>index.php/project/update/<?php echo $project_id; ?>">
				<div class="form-group">
					<label>ID:</label>
					<input type="text" class="form-control" value="<?php echo $project_id; ?>" name=project_id" readonly>
				</div>
				<div class="form-group">
					<label>Título:</label>
					<textarea class="form-control" name="title"><?php echo $title; ?></textarea>
				</div>
				<div class="form-group">
					<label>Descrição:</label>
					<textarea class="form-control" name="description"><?php echo $description; ?></textarea>
				</div>
				<div class="form-group">
					<label>Status:</label>
					<?php 
						if($status == 1){
					?>
						<input type="radio" checked name="status" value="1">
						<label>On</label>
						<input type="radio" name="status" value="0">
						<label>Off</label>

					<?php
						}else{
					?>
						<input type="radio" name="status" value="1">
						<label>On</label>
						<input type="radio" checked name="status" value="0">
						<label>Off</label>
					<?php
						}
					?>
				</div>
				<button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-check"></span> Salvar</button>
			</form>
		</div>
	</div>
</div>
</body>
</html>