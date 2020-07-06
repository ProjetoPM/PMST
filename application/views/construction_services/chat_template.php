<?php defined('BASEPATH') OR exit('No direct script access allowed');?>

<style>
	.fileDiv {
  position: relative;
  overflow: hidden;
}
.upload_attachmentfile {
  position: absolute;
  opacity: 0;
  right: 0;
  top: 0;
}
.btnFileOpen {margin-top: -50px; }

.direct-chat-warning .right>.direct-chat-text {
    background: #d2d6de;
    border-color: #d2d6de;
    color: #444;
	text-align: right;
}
.direct-chat-primary .right>.direct-chat-text {
    background: #3c8dbc;
    border-color: #3c8dbc;
    color: #fff;
	text-align: right;
}
.spiner{}
.spiner .fa-spin { font-size:24px;}
.attachmentImgCls{ width:450px; margin-left: -25px; cursor:pointer; }
</style>
 


  
  <!-- Content Header (Page header) -->

    <!-- Main content -->
     <div class="row">
            <div class="col-md-8" id="chatSection">
              <!-- DIRECT CHAT -->
              <div class="box box-warning direct-chat direct-chat-primary">
                <div class="box-header with-border">
                  <h3 class="box-title" id="ReciverName_txt"><?=$chatTitle;?></h3>

                  <div class="box-tools ">
                    <span data-toggle="tooltip" title="Clear Chat" class="ClearChat"><i class="fa fa-comments"></i></span>
                    <!--<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                    </button>-->
                   <!-- <button type="button" class="btn btn-box-tool" data-toggle="tooltip" title="Clear Chat"
                            data-widget="chat-pane-toggle">
                      <i class="fa fa-comments"></i></button>-->
                   <!-- <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i>
                    </button>-->
                  </div>
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
						 
             $obj=&get_instance();
             $obj->load->model('UserModel');
             
             $user=$obj->UserModel->GetUserData();
            //$user= $this->session->userdata();
            
 					?>
                           	
                        <input type="hidden" id="Sender_Name" value="<?=$user['name'];?>">
                        <!-- <input type="hidden" id="Sender_ProfilePic" value="<?=$profile_url;?>"> -->
                    	
                    	<input type="hidden" id="ReciverId_txt">
                        <input type="text" name="message" placeholder="Type Message ..." class="form-control message">
                      		<span class="input-group-btn">
                             <button type="button" class="btn btn-success btn-flat btnSend" id="nav_down">Send</button>
                             
                          </span>
                    </div>
                  <!--</form>-->
                </div>
                <!-- /.box-footer-->
              </div>
              <!--/.direct-chat -->
            </div>




            <div class="col-md-4">
              <!-- USERS LIST -->
              <div class="box box-danger">
                <div class="box-header with-border">
                  <h3 class="box-title"><?=$strTitle;?></h3>

                  <div class="box-tools pull-right">
                    <span class="label label-danger"><?=count($vendorslist);?> <?=$strsubTitle;?></span>
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i>
                    </button>
                  </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body no-padding">
                  <ul class="users-list clearfix">
                  
                    <?php if(!empty($vendorslist)){
						foreach($vendorslist as $v):
						?>
                        <li class="selectVendor" id="<?=$v['id'];?>" title="<?=$v['name'];?>">
                          <img alt="<?=$v['name'];?>" title="<?=$v['name'];?>">
                          <a class="users-list-name" href="#"><?=$v['name'];?></a>
                          
                        </li>
                    <?php endforeach;?>
                    
                   <?php }else{?>
                   	<li>
                       <a class="users-list-name" href="#">No Vendor's Find...</a>
                     </li>
                  	<?php } ?>
                    
                    
                  </ul>
                  <!-- /.users-list -->
                </div>
                <!-- /.box-body -->
               <!-- <div class="box-footer text-center">
                  <a href="javascript:void(0)" class="uppercase">View All Users</a>
                </div>-->
                <!-- /.box-footer -->
              </div>
              <!--/.box -->
            </div>
            <!-- /.col -->            
          </div>
    
    <!-- /.row --> 
    
    
    

  
  <!-- /.content --> 
  


<!-- /.content-wrapper --> 

<!-- Modal -->
<div class="modal fade" id="myModalImg">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title" id="modelTitle">Modal Heading</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
          <img id="modalImgs" src="upload/21_preview.png" class="img-thumbnail" alt="Cinque Terre">
        </div>
        
        <!-- Modal footer -->
         
        
      </div>
    </div>
  </div>
<!-- Modal -->
  
<script src="<?=base_url('assets/js/chat.js');?>"></script> 
<?php $this->load->view('frame/footer_view')?>

</body>

