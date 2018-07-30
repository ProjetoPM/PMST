<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title>Registro das Partes Interessadas</title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>bootstrap/css/bootstrap.min.css">
</head>
<body>
<div class="container">
	<h1 class="page-header text-center">Registro das Partes Interessadas</h1>
	<div class="row">
		<div class="col-sm-4 col-sm-offset-4">
			<h3>Adicionar
				<span class="pull-right"><a href="<?php echo base_url(); ?>" class="btn btn-primary"><span class="glyphicon glyphicon-arrow-left"></span> Voltar</a></span>
			</h3>
			<hr>
			<form method="POST" action="<?php echo base_url(); ?>index.php/stakeholder/insert">
				<div class="form-group">
					<label>Nome:</label>
					<input type="text" class="form-control" name="nome">
				</div>
				<div class="form-group">
					<label>Função:</label>
					<input type="text" class="form-control" name="função">
				</div>
				<div class="form-group">
					<label>Status:</label>
					<input type="text" class="form-control" name="status">
				</div>
				<button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-floppy-disk"></span> Salvar</button>
			</form>
		</div>
	</div>
</div>
</body>
</html>