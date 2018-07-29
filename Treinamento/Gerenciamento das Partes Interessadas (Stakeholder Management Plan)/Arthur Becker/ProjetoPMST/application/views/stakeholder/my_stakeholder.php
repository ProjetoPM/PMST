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
                        <?php foreach ($stakeholder as $stak) { ?>                
                        
                    <tr> 
                        <td><?= $stak -> name; ?></td> 
                        <td><?= $stak -> interest; ?></td> 
                        <td><?= $stak -> leverage; ?></td> 
                        <td><?= $stak -> influence; ?></td>
                        <td><?= $stak -> impact; ?></td>
                        <td><?= $stak -> average; ?></td>
                        <td><?= $stak -> currentEngagement; ?></td>
                        <td><?= $stak -> expectedEngagement; ?></td>
                        <!-- <td><?= $stak -> status; ?></td> -->
                        <td><?= $stak -> strategy; ?></td>
                        <td><?= $stak -> scopeImpact; ?></td>
                        <td><?= $stak -> comments; ?></td>
                        <td>
                            <!-- Begin Update method --> 
                            <a href="<?=base_url("Stakeholder/update/".$pro->stakeholder_id)?>" class="btn btn-primary btn-group" href="">Update</a> 
                            <!-- End Update method --> 

                            <!-- Begin Delete method --> 
                            <a href="<?=base_url("Stakeholder/delete/".$pro->stakeholder_id)?>" class="btn btn-danger btn-group" onclick="return confirm('Are you sure you want to delete <?= $pro -> title; ?>?');">Delete</a> 
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