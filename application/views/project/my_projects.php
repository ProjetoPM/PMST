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
                    <div class="alert alert-warning">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <strong><?php echo $this->session->flashdata('error3'); ?></strong>
                    </div>
                <?php endif; ?>

                <div class="row">
                    <div class="col-lg-12">
                        <!-- Inicio dos meus projetos -->
                        <div class="panel panel-default panel-table">
                            <div class="panel-heading">

                                <div class="row">
                                    <div class="col col-xs-2">

                                        <a type="button" href="<?= base_url("new/") ?>" class="btn btn-normal btn-info btn-create"><i class="glyphicon glyphicon-plus"></i> Create New Project</a>
                                    </div>
                                </div>
                            </div>
                            <div class="panel-body" style="background-color: #fff">
                                <table align="left" style="word-break: break-word;" class="table table-striped table-bordered table-list">
                                    <thead>
                                        <?php
                                        //$arrayMerge = array_merge($convidado, $project);
                                        //$arrayFinal = array_unique($project, $convidado);
                                        //print_r($arrayMerge);
                                        ?>
                                        <tr>
                                            <th> Title</th>
                                            <th>Created By</th>
                                            <th><em class="fa fa-cog"></em> Actions</th>
                                            <th>Access Level</th>
                                        </tr>
                                        <?php foreach ($convidado as $pro) { ?>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>
                                                <?= $pro->title; ?>
                                            </td>
                                            <td>
                                                <?php
                                                $this->db->select('name');
                                                $this->db->where('user_id', $pro->created_by);
                                                $resultado = $this->db->get('user')->result();


                                                // Busca do user_id por email
                                                $this->db->where('email', $this->session->userdata('email'));
                                                $userdata = $this->db->get('user');
                                                foreach ($resultado2 = $userdata->result() as $row) {
                                                    $id = $row->user_id;
                                                    $name = $row->name;
                                                }
                                                $retorna = array(
                                                    '$user_id' => $id
                                                );

                                                //Busca do id_project pelo nome do projeto
                                                $this->db->where('title', $pro->title);
                                                $prodata = $this->db->get('project');
                                                foreach ($resultado1 = $prodata->result() as $row) {
                                                    $id = $row->project_id;
                                                }
                                                $return = array(
                                                    'project_id' => $id
                                                );

                                                // Busca do access_level por project e pelo user
                                                $this->db->where('user_id', $retorna['$user_id']);
                                                $this->db->where('project_id', $return['project_id']);
                                                $resultados = $this->db->get('project_user')->result();
                                                $level = $resultados[0]->access_level;

                                                foreach ($resultado as $key => $row) {
                                                    echo $row->name;
                                                }

                                                // Logica para liberar os campos
                                                $disabled = "disabled";
                                                $view = "";
                                                $execute = "";
                                                $adm = "";
                                                if ($level == 0) {
                                                    $view = $disabled;
                                                    //echo $view;
                                                } elseif ($level == 1) {
                                                    $execute = $disabled;
                                                } elseif ($level == 2) {
                                                    $adm = "";
                                                }
                                                ?>
                                            </td>
                                            <td align="left">
                                                <a href="<?= base_url("project/" . $pro->project_id) ?>" class="btn btn-default"><em class="fa fa-folder-open-o"></em><span class="hidden-xs"> Open</span></a>
                                                <a href="<?= base_url("edit/" . $pro->project_id) ?>" class="btn btn-default <?php echo $view . $execute; ?>"><em class="fa fa-pencil"></em><span class="hidden-xs"> Edit</span></a>
                                                <a href="<?= base_url("researcher/" . $pro->project_id) ?>" class="btn btn-default <?php echo $view . $execute; ?>"><em class="fa fa-users"></em><span class="hidden-xs"> Add Member</span></a>
                                                <a href="<?= base_url("delete/" . $pro->project_id) ?>" onclick="return confirm('Are you sure you want to delete <?= $pro->title; ?>?');" class="btn btn-danger <?php echo $view . $execute; ?>"><em class="fa fa-trash"></em><span class="hidden-xs"> Delete</span></a>
                                            </td>
                                            <td >
                                                <?php if ($level == 0) {
                                                    echo "Staff";
                                                } elseif ($level == 1) {
                                                    echo "Professor";
                                                } elseif ($level == 2) {
                                                    echo "Project Manager";
                                                } ?>
                                            </td>
                                        </tr>
                                    <?php } //print_r($teste)  
                                    ?>
                                    </tbody>
                                </table>
                            </div>
                            <div class="panel-footer">
                                <div class="row">
                                    <div class="col col-xs-4">Page 1 of 1
                                    </div>
                                    <div class="col col-xs-8">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.row -->
            </section>
        </div>
    </div>
</body>
<?php
$this->load->view('frame/footer_view') ?>