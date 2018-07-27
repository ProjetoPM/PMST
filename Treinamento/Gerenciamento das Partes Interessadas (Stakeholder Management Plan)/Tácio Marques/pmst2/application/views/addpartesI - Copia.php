<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title>Cadastro de Projeto</title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>bootstrap/css/bootstrap.min.css">
</head>
<body   style="background-color:#DCDCDC;">
<div class="container">
	<h1 class="page-header text-center">Insert Gerenciamento das Partes Interessadas</h1>
	<div class="row">
		<div class="col-sm-4 col-sm-offset-4">
			<h3>Add New Gerenciamento das Partes Interessadas<br><br>
				<a href="<?php echo base_url(); ?>index.php/Stakelholder/addnew" class="btn btn-primary"><span class="glyphicon glyphicon-plus"></span> Add New Stakelholder</a>
				<span class="pull-right"><a href="<?php echo base_url(); ?>" class="btn btn-primary"><span class="glyphicon glyphicon-arrow-left"></span> Back</a></span>
			</h3>
			<hr>
			<table class="table table-bordered table-striped">
				<thead>
					<tr>
						<th>ID</th>
						<th>ID Stakelholder</th>
						<th>Interest</th>
						<th>Power</th>
						<th>Influence</th>
						<th>Impact</th>
						<th>Average</th>
						<th>Expectedengagement</th>
						<th>Currentengagement</th>
						<th>Strategy</th>
						<th>Scope</th>
						<th>Observation</th>
						<th>ID Project</th>
						<th>Status</th>	
					</tr>
				</thead>
				<tbody>
					<?php
					foreach($stakelholder_mp as $stakeholder){
						?>
						<tr>
							<div class="form-group">
							<td><?php echo $stakeholder->stakeholder_mp_id; ?></td>
							<td><?php echo $stakeholder->stakelholder_id; ?></td>		
							</div>
							<label>Interest:</label>
							<select interest=interest>
    							<option>10%</option>
    							<option>30%</option>
    							<option>50%</option>
    							<option>70%</option>
	    						<option>90%</option>
							</select>
							<label>Power:</label>
							<select power=power>
    							<option>10%</option>
    							<option>30%</option>
    							<option>50%</option>
    							<option>70%</option>
		    					<option>90%</option>
							</select>
							<label>Influence:</label>
							<select influence=influence>
			    				<option>10%</option>
   				 				<option>30%</option>
    							<option>50%</option>
    							<option>70%</option>
    							<option>90%</option>
							</select>
							<label>Impact:</label>
							<select impact=impact>
    							<option>10%</option>
    							<option>30%</option>
    							<option>50%</option>
    							<option>70%</option>
    							<option>90%</option>
							</select>
							<label>Expectedengagement:</label>
							<select expectedengagement=expectedengagement>
 		 	  					<option>10%</option>
   				 				<option>30%</option>
    							<option>50%</option>
  				  				<option>70%</option>
	    						<option>90%</option>
							</select>
							<label>Currentengagement:</label>
							<select currentengagement=currentengagement>
  			  					<option>10%</option>
   			 					<option>30%</option>
  			  					<option>50%</option>
		    					<option>70%</option>
 				   				<option>90%</option>
							</select>
							<label>Strategy:</label>
							<select strategy=strategy>
			    				<option>10%</option>
			    				<option>30%</option>
			    				<option>50%</option>
			    				<option>70%</option>
			    				<option>90%</option>
							</select>
							<label>Scope:</label>
							<select scope=scope>
			    				<option>10%</option>
    							<option>30%</option>
   				 				<option>50%</option>
  				  				<option>70%</option>
    							<option>90%</option>
							</select>
							<label>Observation:</label>
							<select observation=observation>
			    				<option>10%</option>
   				 				<option>30%</option>
			    				<option>50%</option>
			    				<option>70%</option>
    							<option>90%</option>
							</select><br><br><br>
							<label>Status:</label><br>
							<input type="radio" name="status" value="1"/>Aberto<br />
							<input type="radio" name="status" value="0"/>Resolvido<br />
					</tr>
						<?php
					}
					?>
				</tbody>
			</table>
		</div>
	</div>
</div>
</body>
</html>