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
        <a href="<?php echo base_url(); ?>index.php/Stakelholder/addnew/ " class="btn btn-primary"><span class="glyphicon glyphicon-plus"></span> Add New Stakelholder</a>     Add New Stakeholder Management Plan<a href="<?php echo base_url(); ?>index.php/PartesInteressadas/view/" class="btn btn-primary"><span class="glyphicon glyphicon-plus"></span>View Stakeholder Management Plan</a><a>
        <span class="pull-right"><a href="<?php echo base_url(); ?>" class="btn btn-primary"><span class="glyphicon glyphicon-arrow-left"></span> Back</a></span>
      </h3>
<table style="width:100%" class="table table-bordered table-striped">
  <thead>
  <tr>
      <th>ID Stakelholder</th>
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
        <tbody>
          <?php
          foreach($stakelholder as $stakeholder){
            //foreach($stakeholder_mp as $stakeholdermp){
              //if($stakeholder->stakelholder_id!=$stakeholdermp->stakelholder_id){
            ?>
            <tr>
            <form method="POST" action="<?php echo base_url(); ?>index.php/PartesInteressadas/insert/<?php echo $id; ?>">
              <td><input name="stakelholder_id" type="text" value="<?php echo $stakeholder->stakelholder_id; ?>" readonly="readonly" /></td>
              <td><?php echo $stakeholder->name; ?></td>
              <td><select name="interest">
                  <option value="10">10%</option>
                  <option value="30">30%</option>
                  <option value="50">50%</option>
                  <option value="70">70%</option>
                  <option value="90">90%</option>
              </select></td>
              <td><select name="power">
                  <option value="10">10%</option>
                  <option value="30">30%</option>
                  <option value="50">50%</option>
                  <option value="70">70%</option>
                  <option value="90">90%</option>
              </select></td>
              <td><select name="influence">
                  <option value="10">10%</option>
                  <option value="30">30%</option>
                  <option value="50">50%</option>
                  <option value="70">70%</option>
                  <option value="90">90%</option>
              </select></td>
              <td><select name="impact">
                  <option value="10">10%</option>
                  <option value="30">30%</option>
                  <option value="50">50%</option>
                  <option value="70">70%</option>
                  <option value="90">90%</option>
              </select></td>
              <td><select name="expectedengagement">
                  <option value="Alheio">Alheio</option>
                  <option value="Apoiador">Apoiador</option>
                  <option value="Engajado">Engajado</option>
                  <option value="Neutro">Neutro</option>
                  <option value="Residente">Residente</option>
              </select></td>
              <td><select name="currentengagement">
                  <option value="Alheio">Alheio</option>
                  <option value="Apoiador">Apoiador</option>
                  <option value="Engajado">Engajado</option>
                  <option value="Neutro">Neutro</option>
                  <option value="Residente">Residente</option>
              </select></td>
              <td>
                <div class="form-group">
                    <input type="text" class="form-control" name="strategy">
                </div></td>
              <td>
                <div class="form-group">
                    <input type="text" class="form-control" name="scope">
                </div></td>
              <td>
                <div class="form-group">
                    <input type="text" class="form-control" name="observation">
                </div></td>
                <td><?php echo $id; ?></td>
              <td><select name="status">
                  <option value="1">Aberto</option>
                  <option value="0">Resolvido</option>
              </select></td>
              <td><button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-check"></span>Save</button></td>
            </form>
            </tr>
            <?php
          //}
        //}
      }
          ?>
          </tbody>
</table>
</body>
</html>