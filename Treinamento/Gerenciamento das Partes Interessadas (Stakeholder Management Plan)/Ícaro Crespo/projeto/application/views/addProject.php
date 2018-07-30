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
	<h2 class="text-center">Adicionar Projeto</h2>
	<div class="row">
		<div class="col-sm-6 col-sm-offset-3">
			<h3><span class="pull-right"><a href="<?php echo base_url(); ?>index.php/project/index" class="btn btn-primary"><span class="glyphicon glyphicon-arrow-left"></span> Voltar</a></span></h3>
			<hr>
			<form method="POST" action="<?php echo base_url(); ?>index.php/project/insert">
				<div class="form-group">
					<label>Título:</label>
					<textarea class="form-control" name="title"></textarea>
				</div>
				<div class="form-group">
					<label>Descrição:</label>
					<textarea class="form-control" name="description"></textarea>
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