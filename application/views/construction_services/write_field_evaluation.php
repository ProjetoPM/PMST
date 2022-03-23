<div class="modal fade" id="write-evaluation" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog">
        <div class="modal-content pad-modal modal-lg ">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">Comments</h4>
            </div>

            <?php $json = json_encode($_SESSION['fields_view_evaluations']); ?>

            <div class="modal-body">
                <div class="row">
                    <form method="POST" action="<?php echo base_url() ?>field-evaluation/insert">
                        <div class="col-lg-12">
                            <h5 id="field_name" style="font-weight: bold;"></h5>
                        </div>
                        <br></br>
                        <input type="hidden" id="view" name="view">
                        <input type="hidden" id="field" name="field">
                        <input type="hidden" id="item_id" name="item_id">


                        <div class="col-lg-12 ">
                            <div class="col-lg-12 form-group">
                                <label>Description </label>
                                <textarea id="evaluation_description" class="form-control elasticteste" required="true" name="evaluation_description"></textarea>
                            </div>
                        </div>

                        <div class="col-lg-12 ">
                            <button class="btn btn-success btn-lg btn-block" type="submit" value="Save"> <i class="glyphicon glyphicon-ok"></i> <?= $this->lang->line('btn-save') ?> </button>
                    </form>
                    <form method="POST" action="<?php echo base_url() ?>field-evaluation/check">
                        <input type="hidden" id="view2" name="view">
                        <input type="hidden" id="field2" name="field">
                        <input type="hidden" id="item_id2" name="item_id">
                        <button id="checkfield" style="margin-top: 3px;" class="btn btn-primary btn-lg btn-block" type="submit" value="Save"> <i class="glyphicon glyphicon-eye-open"></i> <?= $this->lang->line('btn-see') ?> </button>
                    </form>
                </div>
            </div>


            <div id="table_fields" class="row" style="margin-top: 6px;">
                <div class="col-lg-12">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>User</th>
                                <th style="max-width: 18px;">Acess level</th>
                                <th>Description</th>
                                <th style="max-width: 27px;">Data/Time</th>
                                <th style="max-width: 15px;">Status</th>
                                <th style="max-width: 15px;">Action</th>
                            </tr>
                        </thead>
                        <tbody id="td_f">

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

<script src="<?= base_url() ?>assets/js/jquery-1.11.1.js" type="text/javascript"></script>
<!-- JavaScript -->
<script src="//cdn.jsdelivr.net/npm/alertifyjs@1.11.2/build/alertify.min.js"></script>
<!-- CSS -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.11.2/build/css/alertify.min.css" />

<script>
    var fields;
    $(document).ready(function() {
        $('.evaluation').on('click', function(e) {
            $('#field_name').text("Field: " + $(this).data("field_name"));
            var view = $(this).data("view");
            var field = $(this).data("field");
            var item_id = $(this).data("item_id");

            $('#view').val(view);
            $('#field').val(field);
            $('#item_id').val(item_id);

            $('#view2').val(view);
            $('#field2').val(field);
            $('#item_id2').val(item_id);

            fields = <?= $json ?>;
            buttonCheckFields(field);
            buildTable(view, field, item_id);

            // document.getElementById('evaluation_description').val = "";
            $('#evaluation_description').val('');

        });
    });


    function buildTable(view, field, item_id) {
        var notBuild = true;

        $('.fields_child').remove();
        var objTo = document.getElementById('td_f');
        for (var i = 0; i < fields.length; i++) {
            if (fields[i]['field'] == field && fields[i]['item_id'] == item_id) {
                var notBuild = false;
                var divtest = document.createElement("tr");
                divtest.setAttribute("class", "fields_child");

                divtest.innerHTML += '<td>' + fields[i]['user_name'] + '</td> <td>' + fields[i]['access_level'] + '</td> <td>' + fields[i]['description'] + '</td> <td>' + fields[i]['datatime'] + '</td> <td>' + fields[i]['status_name'] + '</td> <td><button ' + fields[i]['permissionToDelete'] + ' onclick="deletar(' + fields[i]['field_evaluation_id'] + ')" type="submit" class="btn btn-danger"><em class="fa fa-trash"></em><span class="hidden-xs"></span></button></td>';
                objTo.appendChild(divtest);
            }
        }
        if (notBuild)
            document.getElementById("table_fields").style.setProperty('display', 'none');
    }

    function buttonCheckFields(field) {

        var checked = 0;
        var accesslevelname = <?= $_SESSION['access_level'] ?>;
        var provisoria;

        if (accesslevelname == 2) {
            provisoria = "Project Manager";
        } else if (accesslevelname == 1) {
            provisoria = "Professor";
        } else {
            provisoria = "Staff";
        }

        
        for (var i = 0; i < fields.length; i++) {
            if (fields[i]['status'] == 1 && fields[i]['access_level'] != provisoria && fields[i]['field'] == field) {

                checked = 1; // algum elemento n foi marcado como visto
            }
        }
        if (checked != 1) { // 
            document.getElementById("checkfield").style.setProperty('display', 'none');
        }

    }
</script>

<script type="text/javascript">
    function deletar(id) {
        // e.preventDefault();
        alertify.confirm('Do you agree?').setting({
            'labels': {
                ok: 'Agree',
                cancel: 'Cancel'
            },
            'reverseButtons': false,
            'onok': function() {
                // var form_data = $(this).serialize();

                $.ajax({
                    url: "<?php echo base_url() ?>evaluation-delete/" + id,
                    type: "POST",
                    // data: form_data,
                    cache: false,
                    success: function() {
                        alertify.success('Item deleted successfully!');
                        location.reload(true);
                    }

                });

            },
            'oncancel': function() {
                alertify.error('Item has not been deleted!');
            }
        }).show();
    }
</script>