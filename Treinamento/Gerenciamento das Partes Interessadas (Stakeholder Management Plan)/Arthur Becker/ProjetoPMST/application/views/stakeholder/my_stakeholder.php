<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Stakeholder Management Plan - Stakeholders</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->

    <?php if($this->session->flashdata('success')):?>
        <div class="alert alert-success">
            <a href="#" class="close" data-dismiss="alert">&times;</a>
            <strong><?php echo $this->session->flashdata('success'); ?></strong>
        </div>
    <?php elseif($this->session->flashdata('error')):?>
        <div class="alert alert-warning">
            <a href="#" class="close" data-dismiss="alert">&times;</a>
            <strong><?php echo $this->session->flashdata('error'); ?></strong>
        </div>
    <?php endif;?>
    <div class="row">
        <div class="col-lg-12">      
            
            <!-- INICIO DA CAQUITA -->  
                         
            <table class="table table-striped"> 
                <tbody>
                    <tr> 
                        <th>Name</th> 
                        <th>Interest</th> 
                        <th>Leverage</th> 
                        <th>Influence</th>
                        <th>Impact</th>
                        <th>Weighted Importance</th>
                        <th>Current Engagement</th>
                        <th>Expected Engagement</th>
                        <!-- <th>Status</th> -->
                        <th>Strategy</th>
                        <th>Scope/Impact</th>
                        <th>Comments</th>
                        <th></th>
                  </tr>
                        <?php foreach ($project as $pro) { ?>                
                        
                    <tr> 
                        <td><?= $pro -> name; ?></td> 
                        <td><?= $pro -> interest; ?></td> 
                        <td><?= $pro -> leverage; ?></td> 
                        <td><?= $pro -> influence; ?></td>
                        <td><?= $pro -> impact; ?></td>
                        <td><?= $pro -> average; ?></td>
                        <td><?= $pro -> currentEngagement; ?></td>
                        <td><?= $pro -> expectedEngagement; ?></td>
                        <!-- <td><?= $pro -> status; ?></td> -->
                        <td><?= $pro -> strategy; ?></td>
                        <td><?= $pro -> scopeImpact; ?></td>
                        <td><?= $pro -> comments; ?></td>
                        <td>
                            <!-- Begin Update method --> 
                            <a href="<?=base_url("project/update/".$pro->project_id)?>" class="btn btn-primary btn-group" href="">Update</a> 
                            <!-- End Update method --> 

                            <!-- Begin Delete method --> 
                            <a href="<?=base_url("project/delete/".$pro->project_id)?>" class="btn btn-danger btn-group" onclick="return confirm('Are you sure you want to delete <?= $pro -> title; ?>?');">Delete</a> 
                            <!-- End Delete method --> 
                        </td>

                    </tr>
                    <?php } ?>
                </tbody>
            </table>
            
        </div>
                        <!-- FIM DA CAQUITA -->

        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
</div>
<?php $this->load->view('frame/footer_view')?>