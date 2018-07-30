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
			<table  class= "table table-bordered">
				<thead>
					<tr>
						<th>Descrição do Projeto</th>
						<th>Objetivo</th>
						<th>Critério de Sucesso do Projeto</th>
						<th>Requisitos de Alto Nível</th>
						<th>Premissas Iniciais</th>
						<th>Restrições do Projeto</th>
						<th>Riscos do Projeto</th>
						<th>Resumo do Cronograma</th>
						<th>Resumo do Orçamento</th>
						<th>Lista de Stakeholders</th>
						<th>Requisitos para Aprovação do Projeto</th>
					</tr>
				</thead>
				<tbody>
					<?php
					foreach($tap as $cont){
						?>
						<tr>
						
							<td><?php echo $cont->scope; ?></td>
							<td><?php echo $cont->objective; ?></td>
							<td><?php echo $cont->sucess; ?></td>
							<td><?php echo $cont->requirements; ?></td>
							<td><?php echo $cont->assumptions; ?></td>
							<td><?php echo $cont->constraints; ?></td>
							<td><?php echo $cont->risks; ?></td>
							<td><?php echo $cont->milestone; ?></td>
							<td><?php echo $cont->budge; ?></td>
							<td><?php echo $cont->stakeholder; ?></td>
							<td><?php echo $cont->aprovalReq; ?></td>
							<td><a href="<?php echo base_url(); ?>index.php/tap/delete/<?php echo $cont->project_charter_id; ?>" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span> Delete</a></td>
						</tr>
						<?php
				}
					?>
					
				</tbody>
		</div>
<span class="pull-left"><a href="<?php echo base_url(); ?>" class="btn btn-primary"><span class="glyphicon glyphicon-arrow-left"></span> Voltar</a></span><br><br>
	</div>
</div>

</body>
</html>