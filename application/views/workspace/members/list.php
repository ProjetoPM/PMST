<body class="hold-transition skin-gray sidebar-mini">
    <div class="wrapper">
        <div class="content-wrapper">
            <section class="content">
                <?php $this->load->view('errors/exceptions') ?>

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
                                    <div class="form-group">
                                        <button class="btn btn-success btn-lg" data-toggle="modal" data-target="#invite-user">
                                            <i class="fa fa-plus-square m-r-5"></i>
                                            <?= $this->lang->line('ws_add_new_user') ?>
                                        </button>
                                        <button class="btn btn-secondary btn-lg" data-toggle="modal" data-target="#invite-users">
                                            <i class="fa fa-plus-square m-r-5"></i>
                                            <?= $this->lang->line('ws_add_list_of_users') ?>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <table class="table table-view table-bordered table-striped" id="table_stake">
                                        <thead>
                                            <tr>
                                                <th><?= $this->lang->line('user_name') ?></th>
                                                <th><?= $this->lang->line('user_email') ?></th>
                                                <th><?= $this->lang->line('user_institution') ?></th>
                                                <th><?= $this->lang->line('user_access_level') ?></th>
                                                <th><?= $this->lang->line('btn-actions') ?></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($users as $item): ?>
                                                <tr>
                                                    <td><span class="texttd"><?= $item->name ?></span></td>
                                                    <td><span class="texttd"><?= $item->email ?></span></td>
                                                    <td><span class="texttd"><?= $item->institution ?></span></td>
                                                    <td><span class="texttd"><?= getAcesslevelNameByAcessLevelId($item->access_level) ?></span></td>
                                                    <td style="display: fixed;min-width: 100px;">

                                                    <form method="GET" action="<?= base_url() ?><?= "workspace/member/edit/$item->user_id" ?>">
                                                        <button type="submit" class="btn btn-default">
                                                            <em class="fa fa-pencil"></em>
                                                            <span class="hidden-xs"></span>
                                                        </button>
                                                    </form>
                                                    
                                                    </td>
                                                </tr>
                                            <?php endforeach ?>
                                        </tbody>
                                    </table>

                                    <form action="<?= base_url("workspace/list"); ?>">
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
    <?php $this->load->view('workspace/members/invite_user_modal'); ?>
    <?php $this->load->view('workspace/members/invite_list_modal'); ?>
</body>

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