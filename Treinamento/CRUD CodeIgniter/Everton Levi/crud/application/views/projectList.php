<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title>PMST</title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>bootstrap/css/bootstrap.min.css">
</head>
<body>
	<div class="container">
		<h1 class="page-header text-center">Management of
		Stakeholders</h1>
		
		<div class="row">
			<h3 class="content-center">Project List    
				<span class="pull-right"><a href="<?php echo base_url(); ?>index.php/Stakeholders/addProject" class="btn btn-primary"><span class="glyphicon glyphicon-arrow-left"></span> Back</a></span>
			</h3>
			<br><br><br>

			<div class="row">

				<table class="table table-bordered table-striped">
					<thead>
						<tr>
							<caption><div class="col-lg-2"></div>									Analysis and Evaluation</caption>
							<th>Name</th>

							<th>Interest</th>
							<th>Power</th>
							<th>Influence</th>
							<th>Impact</th>
							<th>Weighted Importance</th>

							<th>Current Engagement</th>
							<th>Expected Engagement</th>
							<th>Strategy for management</th>
							<th>Scope and impact of changes</th>
							<th>Comments</th>
							<!-- <th>Action</th> -->
						</tr>
					</thead>
					<tbody>
						<?php
						foreach($stakeholder_mp as $db){
							?>
							<tr>
								<td><?php echo $db->stakelholder_id; ?></td>
								<td><?php echo $db->interest; ?></td>
								<td><?php echo $db->power; ?></td>
								<td><?php echo $db->influence; ?></td>
								<td><?php echo $db->impact; ?></td>
								<td><?php echo $db->average; ?></td>
								<td><?php echo $db->expectedengagement; ?></td>
								<td><?php echo $db->currentengagement; ?></td>
								<td><?php echo $db->strategy; ?></td>
								<td><?php echo $db->scope; ?></td>
								<td><?php echo $db->observation; ?></td>
							</tr>
							<?php
						}
						?>
					</tbody>
				</table>
			</div>
		</div>
		<span class="pull-right"><a href="<?php echo base_url(); ?>index.php/Stakeholders/addProject" class="btn btn-primary"><span class="glyphicon glyphicon-arrow-left"></span> Back</a></span>
	</div>
</body>
</html>