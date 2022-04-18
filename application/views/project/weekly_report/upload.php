<body class="hold-transition skin-gray sidebar-mini">
    <script>
        (function() {
            if (Boolean(sessionStorage.getItem('sidebar-toggle-collapsed'))) {
                var body = document.getElementsByTagName('body')[0];
                body.className = body.className + ' sidebar-collapse';
            }
        })();
    </script>
    <div class="wrapper">
        <div class="content-wrapper">
            <section class="content">
                <?php if ($this->session->flashdata('success')) : ?>
                    <div class="alert alert-success">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <strong><?php echo $this->session->flashdata('success'); ?></strong>
                    </div>
                <?php elseif ($this->session->flashdata('error')) : ?>
                    <div class="alert alert-warning">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <strong><?php echo $this->session->flashdata('error'); ?></strong>
                    </div>
                <?php endif; ?>

                <style>
                    input button[disabled],
                    html input[disabled] {
                        text-align: center;
                    }

                    .elasticteste {
                        min-height: 70px;
                        /* min-width: 120px; */
                        /* outline: 0; */
                        resize: none;
                        line-height: 20px;
                    }


                    .elasticteste2 {
                        height: 35px;
                        /* min-width: 120px; */
                        /* outline: 0; */
                        resize: none;
                    }


                    textarea.form-control {
                        height: 90px;
                    }
                </style>

                <div class="row">
                    <div class="col-lg-12">

                        <div class="panel-body">
                            <h1 class="page-header">

                                <?= $this->lang->line('wr_title')  ?>

                            </h1>

                            <form method="POST" enctype="multipart/form-data" action="<?php echo base_url('weekly-report/upload-image/' . 50 ); ?>">

                                
                                <input type="file" name ="image"></input>
                                <input type="text" name ="description">Descrição da Imagem</input>
                                <input type="submit" value="Upload Image" name="submit">
                            </form>

                            <form action="<?php echo base_url("projects") ?>">
                                <button style="margin-top: 30px;" class="btn btn-lg btn-info pull-left"> <i class="glyphicon glyphicon-chevron-left"></i> <?= $this->lang->line('btn-back') ?></button>
                            </form>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</body>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.10/jquery.mask.js"></script>

<?php $this->load->view('frame/footer_view') ?>