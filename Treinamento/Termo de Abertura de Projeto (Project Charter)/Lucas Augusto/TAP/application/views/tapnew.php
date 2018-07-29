<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title>Gerenciador de Projetos</title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>bootstrap/css/bootstrap.min.css">
</head>
<body>
<div class="container">
	<h1 class="page-header text-center">Termo de Abertura do Projeto</h1>
	<div class="row">
		<div class="col-sm-12">
		   <h5> Insira as informações nos campos correspondentes.
				<br><br><span class="pull-right"><a href="<?php echo base_url(); ?>" class="btn btn-primary"><span class="glyphicon glyphicon-arrow-left"></span> Voltar</a></span>
			</h5>
			<hr>

			<form method="POST" action="<?php echo base_url(); ?>index.php/tap/insert">
				<div class="form-group col-sm-6">
					<label>Descrição do Projeto:</label>
					<input type="text" class="form-control" name="scope">
				
				</div><div  class="form-group col-sm-6">
					<label>Objetivo:</label>
					<input type="text" class="form-control" name="objective">
				</div>
				
				<div class="form-group col-sm-6">
					<label>Critério de Sucesso do Projeto:</label>
					<input type="text" class="form-control" name="sucess">
				</div>
					<div class="form-group col-sm-6">
					<label>Requisitos de Alto Nível:</label>
					<input type="text" class="form-control" name="requirements">
				</div>
					<div class="form-group col-sm-6">
					<label>Premissas Iniciais:</label>
					<input type="text" class="form-control" name="assumptions">
				</div>
				
					<div class="form-group col-sm-6">
					<label>Restrições do Projeto:</label>
					<input type="text" class="form-control" name="constraints">
				</div>
				
					<div class="form-group col-sm-6">
					<label>Riscos do Projeto:</label>
					<input type="text" class="form-control" name="risks">
				</div>
				
					<div class="form-group col-sm-6">
					<label>Resumo do Cronograma:</label>
					<input type="text" class="form-control" name="schedule">
				</div>
				
					<div class="form-group col-sm-6">
					<label>Resumo do Orçamento:</label>
					<input type="text" class="form-control" name="budget">
				</div>
				
					<div class="form-group col-sm-6">
					<label>Lista de Stakeholders:</label>
					<input type="text" class="form-control" name="stakeholder">
				</div>
			<div class="form-group col-sm-6">
					<label>Requisitos para Aprovação de Projeto:</label>
					<input type="text" class="form-control" name="aprovalReq">
				</div>
				<div class="form-group col-sm-12">
	<button type="submit" class="pull-right btn btn-primary"><span class="glyphicon glyphicon-floppy-disk"></span> Salvar</button>
</div>
					
				


			</form>
		</div>
	</div>
</div>
</body>
</html>