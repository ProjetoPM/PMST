<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Quality Management Plan</h1>
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
    
 
    <?php
            if($quality_mp==null){              
               ?> 
      <form method="POST" action="<?php echo base_url('Charter_Quality/create/'); ?>">
            
            <input type="hidden" name="project_id"  value="<?php echo $project[0]->project_id; ?>">

            <div class="form-group">
               <label>Methodology</label>
               <textarea class="form-control" name="methodology" placeholder="Methodology" required></textarea>
            </div>

            <div class="form-group">
               <label>Processes Related To Project Quality Management</label>
               <textarea class="form-control" name="related_processes" placeholder="Processes Related To Project Quality Management" required></textarea>
            </div>

            <div class="form-group">
               <label>Revised Expectations and Tolerances of Stakeholders</label>
               <textarea class="form-control" name="expectations_tolerances" placeholder="Revised Expectations and Tolerances of Stakeholders" required></textarea>
            </div>

            <div class="form-group">
               <label>Audit and Traceability</label>
               <textarea class="form-control" name="traceability" placeholder="Audit and Traceability" required></textarea>
            </div>

            <div class="form-group">
                <label>Status:</label>&nbsp;&nbsp;
                <input type="radio" name="status" value="1" required>
                <label>On</label>
                <input type="radio" name="status" value="0" required>
                <label>Off</label>                
            </div>

            <button type="submit" class="btn btn-lg btn-success btn-block"><span class="glyphicon glyphicon-floppy-disk"></span> Save</button>
            </form>

            <?php
         }else{
         foreach($quality_mp as $quality){
         ?>

                  
         <form method="POST" action="<?php echo base_url('Charter_Quality/update/');?><?php echo $id; ?>">

            <div class="form-group">
               <label>Methodology</label>
               <textarea class="form-control" name="methodology" placeholder="Methodology" required><?php echo $quality->methodology; ?></textarea>
            </div>

            <div class="form-group">
               <label>Processes Related To Project Quality Management</label>
               <textarea class="form-control" name="related_processes" placeholder="Processes Related To Project Quality Management" required><?php echo $quality->related_processes; ?></textarea>
            </div>

            <div class="form-group">
               <label>Revised Expectations and Tolerances of Stakeholders</label>
               <textarea class="form-control" name="expectations_tolerances" placeholder="Revised Expectations and Tolerances of Stakeholders" required><?php echo $quality->expectations_tolerances; ?></textarea>
            </div>

            <div class="form-group">
               <label>Audit and Traceability</label>
               <textarea class="form-control" name="traceability" placeholder="Audit and Traceability" required><?php echo $quality->traceability; ?></textarea>
            </div>
            
            <div class="form-group">
                <label>Status:</label> &nbsp;&nbsp;
                <input type="radio" <?= $quality->status != 1?: "checked"; ?> name="status" value="1">
                <label>On</label>
                <input type="radio" <?= $quality->status != 0?: "checked"; ?> name="status" value="0">
                <label>Off</label>                
            </div>

            <button type="submit" class="btn btn-lg btn-success btn-block"><span class="glyphicon glyphicon-check"></span>Save</button>
          </form> 
         <?php
         } 
      }
      ?>
</section>
</div>
</div>
<?php $this->load->view('frame/footer_view')?>
