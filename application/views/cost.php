<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title>Plano de Gerenciamento de Custos</title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>bootstrap/css/bootstrap.min.css">
</head>
<body>
<div class="container">
	<h1 class="page-header text-center">Cost</h1>
	<div class="row">
		<div class="col-sm-4 col-sm-offset-4">
			<h3>
				<span class="pull-right"><a href="<?php echo base_url(); ?>" class="btn btn-primary"><span class="glyphicon glyphicon-arrow-left"></span> Back</a></span>
			</h3>
			<hr>
			<form method="POST" action="<?php echo base_url(); ?>index.php/GerenciarCustos/insert<?php echo $project_id,$verific; ?>">
				<?php
				if($cost_mp==null){
					$verific = true;
					?>	
				<div class="form-group">
					<label>Processos para gerenciamento dos custos do projeto:</label>
					<input type="text" class="form-control" name="project_costs_m">
				</div>
				<div class="form-group">
					<label>Nível de precisão necessário, limites e unidades de medida que serão utilizadas:</label>
					<input type="text" class="form-control" name="accuracy_level">
				</div>
				<div class="form-group">
					<label>Procedimentos organizacionais relacionados:</label>
					<input type="text" class="form-control" name="organizational_procedures">
				</div>
				<div class="form-group">
					<label>Regras para medição de desempenho:</label>
					<input type="text" class="form-control" name="measurement_rules">
				</div>
				<div class="form-group">
					<label>Formato de relatórios:</label>
					<input type="text" class="form-control" name="format_report">
				</div>
				<button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-floppy-disk"></span> Save</button>
				<?php
			}else{
				$verific = false;
			?>
						<?php extract($cost_mp); ?>
			<form method="POST" action="<?php echo base_url(); ?>index.php/GerenciarCustos/insert<?php echo $project_id,$verific; ?>">
				<div class="form-group">
					<label>Processos para gerenciamento dos custos do projeto:</label>
					<input type="text" class="form-control" value="<?php echo $project_costs_m; ?>" name="project_costs_m">
				</div>
				<div class="form-group">
					<label>Nível de precisão necessário, limites e unidades de medida que serão utilizadas:</label>
					<input type="text" class="form-control" value="<?php echo $accuracy_level; ?>" name="accuracy_level">
				</div>
				<div class="form-group">
					<label>Procedimentos organizacionais relacionados:</label>
					<input type="text" class="form-control" value="<?php echo $organizational_procedures; ?>" name="organizational_procedures">
				</div>
				<div class="form-group">
					<label>Regras para medição de desempenho:</label>
					<input type="text" class="form-control" value="<?php echo $measurement_rules; ?>" name="measurement_rules">
				</div>
				<div class="form-group">
					<label>Formato de relatórios:</label>
					<input type="text" class="form-control" value="<?php echo $format_report; ?>" name="format_report">
				</div>
				<button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-check"></span>Update</button>
			<?php 
		}
		?>
			</form>
		</div>
	</div>
</div>
</body>
</html>