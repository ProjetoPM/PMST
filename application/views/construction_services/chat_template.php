<style>
  .direct-chat-warning .right>.direct-chat-text {
    background: #d2d6de;
    border-color: #d2d6de;
    color: #444;
    text-align: right;
  }

  .direct-chat-messages {
    transform: translate(0, 0);
    padding: 10px;
    height: 250px;
    overflow: auto;
  }


  .direct-chat-primary .right>.direct-chat-text {
    background: #3c8dbc;
    border-color: #3c8dbc;
    color: #fff;
    text-align: right;
  }

  .spiner .fa-spin {
    font-size: 24px;
  }

  .attachmentImgCls {
    width: 450px;
    margin-left: -25px;
    cursor: pointer;
  }
</style>



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
      <section class="content-header">
        <div class="row">
          <div class="col-md-12">
            <div class="panel panel-default">
              <div class="panel-heading">
                <h3 class="panel-title" style="text-align: center;">
                  <strong>Chat
                    <!-- <a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="Definir"><i class="glyphicon glyphicon-comment"></i></a> --></strong>
                </h3>
              </div>
            </div>
          </div>
      </section>
      <section class="content" style="padding-top: 1px;">
        <!-- Main content -->
        <div class="row">
          <div class="col-lg-10 center" id="chatSection" itemid="<?= $idp; ?>" title="<?= $name; ?>" style="left: 8%;">
            <!-- DIRECT CHAT -->
            <div class="box box-warning direct-chat direct-chat-primary">
              <div class="box-header with-border">
                <h3 class="box-title" id="reciver_name"><?= $name; ?></h3>
              </div>
              <!-- /.box-header -->
              <div class="box-body">

                <!-- Conversations are loaded here -->
                <div class="direct-chat-messages" id="content">
                  <!-- /.direct-chat-msg -->
                  <div id="dumppy"></div>

                </div>
                <!--/.direct-chat-messages-->

              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <!--<form action="#" method="post">-->
                <div class="input-group">
                  <?php

                  $obj = &get_instance();
                  $obj->load->model('User_Model');

                  $user = $obj->User_Model->GetUserData();
                  //$user= $this->session->userdata();
                  // print($user['name']);
                  ?>

                  <input type="hidden" id="receiver_id" value="<?= $this->Outh_model->Encryptor('encrypt', $_SESSION['project_id']); ?>">
                  <input type="hidden" id="sender_name" value="<?= $user['name']; ?>">
                  <!-- <input type="hidden" id="Sender_ProfilePic" value="<?= base_url() ?>assets/images/user-icon.jpg"> -->


                  <input type="hidden" id="project_id" value="<?= $_SESSION['project_id']; ?>">
                  <input type="text" name="message" placeholder="<?= $this->lang->line('type_message') ?>"class="form-control message">
                  <span class="input-group-btn">
                    <button type="button" class="btn btn-success btn-flat btnSend" id="nav_down"><?= $this->lang->line('send') ?></button>

                  </span>
                </div>
                <!--</form>-->
              </div>
              <!-- /.box-footer-->
            </div>
            <!--/.direct-chat -->
          </div>




          <div class="col-lg-12" style="padding-top: 20px;">
            <form action="<?php echo base_url('project/'); ?><?php echo $_SESSION['project_id']; ?>">
              <button class="btn btn-lg btn-info pull-left"> <i class="glyphicon glyphicon-chevron-left"></i> <?= $this->lang->line('btn-back') ?></button>
            </form>
          </div>
          <!-- /.col -->
        </div>


        <!-- /.row -->
      </section>

      <!-- /.content -->
    </div>
  </div>
</body>


<?php $this->load->view('frame/footer_view') ?>
<script src="<?= base_url('assets/js/chat.js'); ?>">

</script>