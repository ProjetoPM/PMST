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

                                <div id="readroot" style="display: none">

                                    <input type="button" value="Remove review" onclick="this.parentNode.parentNode.removeChild(this.parentNode);" /><br /><br />


                                    <select name="process_group">

                                    </select>
                                    <option value=""></option><br /><br />

                                
                                    <textarea rows="5" cols="20" name="description"></textarea>


                                </div>

                                <form method="post" action="">

                                    <span id="writeroot"></span>

                                    <input type="button" onClick="moreFields()" value="Give me more fields!" />
                                    <input type="submit" value="Send form" />

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
<script type="text/javascript">
    var counter = 0;

    function moreFields() {
        counter++;
        var newFields = document.getElementById("readroot").cloneNode(true);
        newFields.id = '';
        newFields.style.display = 'block';
        var newField = newFields.childNodes;
        for (var i = 0; i < newField.length; i++) {
            var theName = newField[i].name;
            if (theName)
                newField[i].name = theName + counter;
        }
        var insertHere = document.getElementById("writeroot");
        insertHere.parentNode.insertBefore(newFields, insertHere);
    }

    window.onload = moreFields;
</script>


<?php $this->load->view('frame/footer_view') ?>