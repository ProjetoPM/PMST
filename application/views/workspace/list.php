<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<link rel="stylesheet" href="<?= base_url() ?>assets/css/workspace.css">

<body class="hold-transition skin-gray sidebar-mini">
    <script src="<?= base_url() ?>assets/js/sidebar-menu.js" type="text/javascript"></script>
    <div class="wrapper">
        <div class="content-wrapper" style="padding-top: 50px;">
            <section class="content">
                <?php if ($this->session->flashdata('success')) : ?>
                    <div class="alert alert-success">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <?php echo $this->session->flashdata('success'); ?>
                    </div>
                <?php elseif ($this->session->flashdata('warning')) : ?>
                    <div class="alert alert-warning">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <?php echo $this->session->flashdata('warning'); ?>
                    </div>
                <?php elseif ($this->session->flashdata('error')) : ?>
                    <div class="alert alert-danger">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <?php echo $this->session->flashdata('error'); ?>
                    </div>
                <?php endif; ?>

                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel-body">
                            <h1 class="page-header"><?= $this->lang->line('ws_title') ?></h1>
                            <div class="row">
                                <div class="col-lg-12">

                                <div class="form-group">
                                    <button class="btn btn-info btn-lg glyphicon-plus" data-toggle="modal" data-target="#newWorkspace">
                                        <?= $this->lang->line('ws_new_workspace') ?>
                                    </button>
                                </div>

                                    <table class="table table-bordered table-striped" id="tableProjects">
                                        <thead>
                                            <tr>
                                                <th><?= $this->lang->line('ws_name') ?></th>
                                                <th><em class="fa fa-cog"></em><?= $this->lang->line('actions') ?></th>
                                                <th><?= $this->lang->line('ws_access_level') ?></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($workspace as $item) : ?>
                                            <tr>
                                                    <td><?= $item->name ?></td>
                                                    <td>
                                                        <a href="<?= base_url("projects/" . $item->workspace_id) ?>" class="btn btn-default"><em class="fa fa-folder-open-o"></em><span class="hidden-xs"></span></a>
                                                        <a href="<?= base_url("workspace/members/$item->workspace_id" ) ?>" class="btn btn-default"><i class="fa fa-users"></i></a>
                                                    </td>
                                                    <td><?= verifyWorkspaceAcesslevel($item->workspace_id, $item->user_id);  ?></td>
                                                    <?php endforeach ?>
                                                </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
    
</body>

<?php $this->load->view('workspace/modal_new') ?>
<?php $this->load->view('frame/footer_view') ?>