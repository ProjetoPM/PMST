<!DOCTYPE html>
<html>
<body>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <title>Cadastro das Partes Interessadas</title>
  <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>bootstrap/css/bootstrap.min.css">
</head>
<body   style="background-color:#DCDCDC;">
  <h1 class="page-header text-center">Insert Stakeholder Management Plan</h1>
      <h3 class="page-header text-center">
        <a href="<?php echo base_url(); ?>index.php/Stakelholder/addnew" class="btn btn-primary"><span class="glyphicon glyphicon-plus"></span> Add New Stakelholder</a>     Add New Stakeholder Management Plan<a href="<?php echo base_url(); ?>index.php/PartesInteressadas/view" class="btn btn-primary"><span class="glyphicon glyphicon-plus"></span>View Stakeholder Management Plan</a><a>
        <span class="pull-right"><a href="<?php echo base_url(); ?>" class="btn btn-primary"><span class="glyphicon glyphicon-arrow-left"></span> Back</a></span>
      </h3>
<table style="width:100%" class="table table-bordered table-striped">
  <thead>
  <tr>
      <th>Name Stakelholder</th>
      <th>Interest</th>
      <th>Power</th>
      <th>Influence</th>
      <th>Impact</th>
      <th>Expectedengagement</th>
      <th>Currentengagement</th>
      <th>Strategy</th>
      <th>Scope</th>
      <th>Observation</th>
      <th>ID Project</th> 
      <th>Status</th> 
  </tr>
</thead>
        <form method="POST">
        <tbody>
          <?php
          foreach($stakelholder as $stakeholder){
            ?>
            <tr>
              <td><?php echo $stakeholder->name; ?></td>
              <td><select name=interest>
                  <option>10%</option>
                  <option>30%</option>
                  <option>50%</option>
                  <option>70%</option>
                  <option>90%</option>
              </select></td>
              <td><select name=power>
                  <option>10%</option>
                  <option>30%</option>
                  <option>50%</option>
                  <option>70%</option>
                  <option>90%</option>
              </select></td>
              <td><select name=influence>
                  <option>10%</option>
                  <option>30%</option>
                  <option>50%</option>
                  <option>70%</option>
                  <option>90%</option>
              </select></td>
              <td><select name=impact>
                  <option>10%</option>
                  <option>30%</option>
                  <option>50%</option>
                  <option>70%</option>
                  <option>90%</option>
              </select></td>
              <td><select name=expectedengagement>
                  <option>Alheio</option>
                  <option>Apoiador</option>
                  <option>Engajado</option>
                  <option>Neutro</option>
                  <option>Residente</option>
              </select></td>
              <td><select name=currentengagement>
                  <option>Alheio</option>
                  <option>Apoiador</option>
                  <option>Engajado</option>
                  <option>Neutro</option>
                  <option>Residente</option>
              </select></td>
              <td>
                <div class="form-group">
                    <input type="text" class="form-control" name=strategy>
                </div></td>
              <td>
                <div class="form-group">
                    <input type="text" class="form-control" name=scope>
                </div></td>
              <td>
                <div class="form-group">
                    <input type="text" class="form-control" name=observation>
                </div></td>
                <td><?php echo $id; ?></td>
              <td><select name=status>
                  <option>Aberto</option>
                  <option>Resolvido</option>
              </select></td>
              <td><a href="<?php echo base_url(); ?>index.php/PartesInteressadas/insert/<?php ; ?>" class="btn btn-success"><span class="glyphicon glyphicon-plus"></span>Save/Update</a></td>
            </tr>
            <?php
          }
          ?>
          </tbody>
        </form>
</table>
</body>
</html>