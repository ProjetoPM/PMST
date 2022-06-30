<?php if ($this->session->flashdata('success')) : ?>
    <div class="alert alert-success">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        <i class="fa fa-info-circle m-r-5" aria-hidden="true"></i>
        <?php echo $this->session->flashdata('success'); ?>
    </div>
<?php elseif ($this->session->flashdata('fail')) : ?>
    <div class="alert alert-warning">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        <i class="fa fa-exclamation-circle m-r-5" aria-hidden="true"></i>
        <?php echo $this->session->flashdata('fail'); ?>
    </div>
<?php elseif ($this->session->flashdata('error')) : ?>
    <div class="alert alert-danger">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        <i class="fa fa-exclamation-circle m-r-5" aria-hidden="true"></i>
        <?php echo $this->session->flashdata('error'); ?>
    </div>
<?php endif ?>