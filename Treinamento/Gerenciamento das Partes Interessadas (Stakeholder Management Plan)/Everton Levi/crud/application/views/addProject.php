<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title>PMST</title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>bootstrap/css/bootstrap.min.css">
</head>
<body>
	<div class="container">
		<h1 class="page-header text-left">Management of
		Stakeholders</h1>
		<form method="POST" action="<?php echo base_url(); ?>index.php/Stakeholders/insertProject">
			<div class="form-group row">
				<h3 class="content-center">Add the Stakeholders    
					<button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-floppy-disk"><a href="<?php echo base_url(); ?>"></a></span> Save</button>
				</h3>
			</div>


			<div class="form-group row">

				<div class="col-xs-2">
					<select name="name" class="form-control">
						<?php echo $option_names; ?>
					</select>
				</div>


				<div class="col-xs-2">
					<select name="interest" class="form-control" id="sel1">
						<option disabled="" selected>Interest</option>
						<option value="10">10%</option>
						<option value="20">20%</option>
						<option value="30">30%</option>
						<option value="40">40%</option>
						<option value="50">50%</option>
						<option value="60">60%</option>
						<option value="70">70%</option>
						<option value="80">80%</option>
						<option value="90">90%</option>
						<option value="100">100%</option>
					</select>
				</div>
				<div class="col-xs-2">
					<select name="power" class="form-control" id="sel2">
						<option disabled="" selected>Power</option>
						<option value="10">10%</option>
						<option value="20">20%</option>
						<option value="30">30%</option>
						<option value="40">40%</option>
						<option value="50">50%</option>
						<option value="60">60%</option>
						<option value="70">70%</option>
						<option value="80">80%</option>
						<option value="90">90%</option>
						<option value="100">100%</option>
					</select>
				</div>
				<div class="col-xs-2">
					<select name="influence" class="form-control" id="sel3">
						<option disabled="" selected>Influence</option>
						<option value="10">10%</option>
						<option value="20">20%</option>
						<option value="30">30%</option>
						<option value="40">40%</option>
						<option value="50">50%</option>
						<option value="60">60%</option>
						<option value="70">70%</option>
						<option value="80">80%</option>
						<option value="90">90%</option>
						<option value="100">100%</option>
					</select>
				</div>
				<div class="col-xs-2">
					<select name="impact" class="form-control" id="sel4">
						<option disabled="" selected>Impact</option>
						<option value="10">10%</option>
						<option value="20">20%</option>
						<option value="30">30%</option>
						<option value="40">40%</option>
						<option value="50">50%</option>
						<option value="60">60%</option>
						<option value="70">70%</option>
						<option value="80">80%</option>
						<option value="90">90%</option>
						<option value="100">100%</option>
					</select>
				</div>
				<div class="col-xs-1">
					<input name="average" class="form-control right-border-none" type="text" placeholder="%"><!-- INSERIR CÁLCULO DE INFLUÊNCIA PONDERADA -->
				</div>
				<div class="form-group row"></div>

				<div class="form-group row">
					<div class="col-xs-2">
						<!-- ESPAÇO PRA ALINHAMENTO CORRETO NA TELA -->
					</div>
					<div class="col-xs-2">
						<select class="form-control" id="sel1" name="expectedengagement">
							<option disabled="" selected>Current Engagement</option>
							<option value="Support">Support</option>
							<option value="Neutral">Neutral</option>
							<option value="Engaged">Engaged</option>
						</select>
					</div>
					<div class="col-xs-2">
						<select class="form-control" id="sel1" name="currentengagement">
							<option disabled="" selected>Expected Engagement</option>
							<option value="Support">Support</option>
							<option value="Neutral">Neutral</option>
							<option value="Engaged">Engaged</option>
						</select>
					</div>
					<div class="col-xs-2">
					</div>
					<div class="col-xs-2">
					</div>
					<div class="col-xs-1">
					</div>
				</div>
				<div class="form-group row"></div>

				<div class="form-group row"> 
					<div class="form-group col-xs-2">
					</div>
					<div class="form-group col-xs-3">
						<textarea name="strategy" placeholder="Strategy for management" class="form-control" rows="5"></textarea>
					</div>
					<div class="form-group col-xs-3">
						<textarea name="scope" placeholder="Scope and impact of changes" class="form-control" rows="5"></textarea>
					</div>
					<div class="form-group col-xs-3">
						<textarea name="observation" placeholder="Comments" class="form-control" rows="5"></textarea>
					</div>
				</div>
				<div class="form-group col-xs-2" style="text-align: center;">
					<label class="form-check-label" for="gridCheck">
						Status Project
					</label>
					<div class="form-group">
						<input name="status" value="1" class="form-check-input" type="radio" checked>				Active Project<br>
						<input name="status" value="0" class="form-check-input" type="radio">				Non-active Project
					</div>
				</div>
			</form>
			<span class="pull-right"><a href="<?php echo base_url(); ?>" class="btn btn-primary"><span class="glyphicon glyphicon-arrow-left"></span> Back</a></span>
			<br><br>
			<span class="pull-right"><a href="<?php echo base_url(); ?>index.php/Stakeholders/projectList" class="btn btn-primary"><span class="glyphicon glyphicon-arrow-right"></span> Jump</a></span>
		</div>

	</div>
</body>
</html>