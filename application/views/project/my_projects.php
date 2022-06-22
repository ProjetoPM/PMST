<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>


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
                        <strong><?php echo $this->session->flashdata('success'); ?></strong>
                    </div>
                <?php elseif ($this->session->flashdata('faildeleteproject')) : ?>
                    <div class="alert alert-warning">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <strong><?php echo $this->session->flashdata('faildeleteproject'); ?></strong>
                    </div>
                <?php elseif ($this->session->flashdata('error2')) : ?>
                    <div class="alert alert-success">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <strong><?php echo $this->session->flashdata('error2'); ?></strong>
                    </div>
                <?php elseif ($this->session->flashdata('error3')) : ?>
                    <div class="alert alert-danger">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <strong><?php echo $this->session->flashdata('error3'); ?></strong>
                    </div>
                <?php endif; ?>

                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel-body">
                            <h1 class="page-header">
                                <?= $this->lang->line('projects') ?>
                            </h1>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <button class="btn btn-success btn-lg" onClick=goTo(`<?= base_url("new/{$_SESSION['workspace_id']}") ?>`)>
                                        <i class="fa fa-plus-circle m-r-5" aria-hidden="true"></i>
                                        <?= $this->lang->line('btn-create-project') ?>
                                        </button>
                                    </div>
                                    <table class="table table-bordered table-striped" id="tableProjects">
                                        <thead>
                                            <tr>
                                                <th><?= $this->lang->line('btn-title') ?></th>
                                                <th><?= $this->lang->line('created_by') ?></th>
                                                <th><em class="fa fa-cog"></em><?= $this->lang->line('actions') ?></th>
                                                <th><?= $this->lang->line('acess_level') ?></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $view = "";
                                            $execute = "";
                                            ?>
                                            <?php
                                            foreach ($projects as $project) { ?>
                                                <tr>
                                                    <td><?= $project->title ?></td>
                                                    <td><?= $project->name ?></td>
                                                    <td align="left">
                                                        <!-- open -->
                                                        <a href="<?= base_url("project/" . $project->project_id) ?>"        class="btn btn-default" data-toggle="tooltip" title="<?= $this->lang->line('btn-open') ?>">
                                                            <i class="fa fa-folder-open-o"></i>
                                                        </a>

                                                        <!-- edit -->
                                                        <a href="<?= base_url("edit/" . $project->project_id) ?>" class="btn btn-default <?= $view . $execute; ?>" data-toggle="tooltip" title="<?= $this->lang->line('btn-edit') ?>">
                                                            <i class="fa fa-pencil"></i>
                                                        </a>

                                                        <!-- add member -->
                                                        <a href="<?= base_url("researcher/" . $project->project_id) ?>" class="btn btn-default <?php echo $view . $execute; ?>" data-toggle="tooltip" title="<?= $this->lang->line('btn-add_member') ?>">
                                                            <i class="fa fa-user-plus"></i>
                                                        </a>

                                                        <!-- list members -->
                                                        <a href="<?= base_url("user/list/" . $project->project_id) ?>" class="btn btn-default <?php echo $view . $execute; ?>" data-toggle="tooltip" title="<?= $this->lang->line('btn-list-members') ?>">
                                                            <i class="fa fa-users"></i>
                                                        </a>

                                                        <!-- export overleaf -->
                                                        <a href="<?= base_url("projecttooverleaf/exportlatex/" . $project->project_id) ?>" class="btn btn-default <?php echo $view . $execute; ?>" data-toggle="tooltip" title="<?= $this->lang->line('export_overleaf') ?>">
                                                            <i class="fa fa-book"></i>
                                                        </a>

                                                        <!-- delete -->
                                                        <a href="<?= base_url("delete/" . $project->project_id) ?>" onclick="return confirm('Are you sure you want to delete <?= $project->title; ?>?');" class="btn btn-danger <?php echo $view . $execute; ?>"><em class="fa fa-trash"></em><span class="hidden-xs"><?= $this->lang->line('btn-overleaf') ?></span></a>
                                                    </td>
                                                    <td><?= getAcesslevelNameByAcessLevelId($project->access_level); ?></td>
                                                </tr>
                                            <?php } ?>
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
<?php
$this->load->view('frame/footer_view') ?>

<script type="text/javascript">
    'use strict'
    let table;

    $(document).ready(function() {
        table = $('#tableProjects').DataTable({
            "columns": [{
                    "data": "#",
                    "orderable": false
                },
                {
                    "data": "title"
                },
                {
                    "data": "created_by"
                },
                {
                    "data": "btn-actions",
                    "orderable": false
                },
                {
                    "data": "access_level"
                }
            ],
            "order": [
                [1, 'attr']
            ]
        });
    });