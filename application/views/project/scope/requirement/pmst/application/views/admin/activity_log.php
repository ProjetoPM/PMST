<body class="hold-transition skin-gray sidebar-mini">
    <div class="wrapper">
        <div class="content-wrapper">
            <section class="content">

                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <!-- /.panel-heading -->
                            <div class="panel-body">
                                <div role="tabpanel">
                                    <!-- Tab panes -->
                                    <div class="tab-content">
                                        <div role="tabpanel" class="tab-pane fade in active" id="advance">
                                            <div class="dataTable_wrapper" style="overflow: auto;">

                                                <table class="table table-striped table-bordered table-hover" id="dataTables-user-log-advance">
                                                    <thead>
                                                        <tr>
                                                            <th>Date & Time</th>
                                                            <th>Activities</th>
                                                            <th>User</th>
                                                            <th>Module</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody></tbody>
                                                    <tfoot></tfoot>
                                                </table>
                                            </div>

                                            <!-- /.table-responsive -->
                                        </div>


                                    </div>
                                </div>
                            </div>
                            <!-- /.panel-body -->
                        </div>
                        <!-- /.panel -->
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
            </section>
        </div>
    </div>
</body>

<?php
$this->load->view('frame/footer_view') ?>

<script type="text/javascript">
    window.onload = get_activity_log();

    function get_activity_log() {

        $('#dataTables-user-log-advance').dataTable({
            //"sScrollY": "400px",
            "bProcessing": true,
            "bServerSide": true,
            "sServerMethod": "GET",
            "sAjaxSource": $("#base-url").val() + "admin/get_activity_log",
            "iDisplayLength": 50,
            "aLengthMenu": [
                [10, 25, 50, -1],
                [10, 25, 50, "All"]
            ],
            "aaSorting": [
                [0, 'desc']
            ],
            "aoColumns": [{
                    "bVisible": true,
                    "bSearchable": true,
                    "bSortable": true
                },
                {
                    "bVisible": true,
                    "bSearchable": true,
                    "bSortable": true
                },
                {
                    "bVisible": true,
                    "bSearchable": true,
                    "bSortable": true
                },
                {
                    "bVisible": true,
                    "bSearchable": true,
                    "bSortable": true
                }
            ]
        });
    }
</script>