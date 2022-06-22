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
                <!-- /.row -->

                <style>
                    @media (min-width: 1200px) {
                        .texttd {
                            display: block;
                            width: 170px;
                            overflow: hidden;
                            white-space: nowrap;
                            text-overflow: ellipsis;
                        }
                    }

                    @media (max-width: 1199px) {
                        .texttd {
                            display: block;
                            width: 90px;
                            overflow: hidden;
                            white-space: nowrap;
                            text-overflow: ellipsis;
                        }
                    }

                    @media (max-width: 1160px) {
                        .texttd {
                            display: block;
                            width: 85px;
                            overflow: hidden;
                            white-space: nowrap;
                            text-overflow: ellipsis;
                        }
                    }

                    @media (max-width: 900px) {
                        .texttd {
                            display: block;
                            width: 100px;
                            overflow: hidden;
                            white-space: nowrap;
                            text-overflow: ellipsis;
                        }
                    }

                    @media (min-width: 1200px) {
                        .texttd2 {
                            display: block;
                            width: 650px;
                            overflow: hidden;
                            white-space: nowrap;
                            text-overflow: ellipsis;
                        }
                    }

                    @media (max-width: 1199px) {
                        .texttd2 {
                            display: block;
                            width: 600px;
                            overflow: hidden;
                            white-space: nowrap;
                            text-overflow: ellipsis;
                        }
                    }

                    @media (max-width: 1160px) {
                        .texttd2 {
                            display: block;
                            width: 500px;
                            overflow: hidden;
                            white-space: nowrap;
                            text-overflow: ellipsis;
                        }
                    }

                    @media (max-width: 900px) {
                        .texttd2 {
                            display: block;
                            width: 100px;
                            overflow: hidden;
                            white-space: nowrap;
                            text-overflow: ellipsis;
                        }
                    }
                </style>
                <div class="row">
                    <div class="col-lg-12">

                        <div class="panel-body">
                            <h1 class="page-header">
                                User List
                            </h1>

                            <div class="row">
                                <div class="col-lg-12">
                                    <button class="btn btn-success btn-lg" data-toggle="modal" data-target="#inviteUsers">
                                        <i class="fa fa-plus-square m-r-5"></i>
                                        <?= $this->lang->line('btn-new') ?>
                                    </button>
                                </div>
                            </div>

                            <br><br>
                            <div class="row">
                                <div class="col-lg-12">

                                    <table class="table table-bordered table-striped" id="table_stake">
                                        <thead>
                                            <tr>

                                                <th><?= $this->lang->line('user_name') ?></th>
                                                <th><?= $this->lang->line('user_institution') ?></th>
                                                <th><?= $this->lang->line('user_access_level') ?></th>
                                                <th><?= $this->lang->line('user_email') ?></th>
                                                <th><?= $this->lang->line('btn-actions') ?></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($users as $item): ?>
                                                <tr>
                                                    <td><span class="texttd"><?= $item->name ?></span></td>
                                                    <td><span class="texttd"><?= $item->institution ?></span></td>
                                                    <td><span class="texttd"><?= getAcesslevelNameByAcessLevelId($item->access_level) ?></span></td>
                                                    <td><span class="texttd"><?= $item->email ?></span></td>
                                                    <td style="display: fixed;min-width: 100px;">

                                                    </td>
                                                    </tr>
                                                <?php endforeach ?>

                                        </tbody>
                                    </table>

                                    <form action="<?= base_url("projects/{$_SESSION['user_id']}"); ?>">
                                        <button class="btn btn-lg btn-info pull-left"> <i class="glyphicon glyphicon-chevron-left"></i> <?= $this->lang->line('btn-back') ?></button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</body>
<?php $this->load->view('workspace/modal/invite_user'); ?>

<script src="<?= base_url() ?>assets/js/jquery-2.1.3.min.js"></script>
<script src="<?= base_url() ?>assets/js/jquery.dataTables.min.js"></script>
<script src="<?= base_url() ?>assets/js/dataTables.bootstrap.js"></script>
<script src="<?= base_url() ?>assets/js/dataTables.responsive.js"></script>

<!-- JavaScript -->
<script src="//cdn.jsdelivr.net/npm/alertifyjs@1.11.2/build/alertify.min.js"></script>
<!-- CSS -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.11.2/build/css/alertify.min.css" />

<!--<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.1/jquery.min.js"></script>
					-->