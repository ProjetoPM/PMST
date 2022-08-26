 <!--
<div id="page-wrapper">
  <div class="row">
    <div class="col-lg-12">
      <h1 class="page-header">Update Projects</h1>
    </div>
   
  </div>
 /.row -->

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
         <?php $this->load->view('errors/exceptions') ?>
         <div class="row">
           <div class="col-lg-12">

             <div class="panel-body">
               <h1 class="page-header">
                 Edit Project
                 <!-- <?= $this->lang->line('tap-title')  ?> -->

               </h1>


               <form action="<?= base_url() ?>project/saveUpdate/" method="post">


                 <input id="project_id" name="project_id" type="hidden" placeholder="Title" class="form-control input-md" value="<?= $project[0]->project_id; ?>" required="true" readonly>



                 <!-- Text input-->
                 <div class="form-group">
                   <label for="title">Title</label>
                   <span id="count-a"></span>
									  <span class="btn-sm btn-default" data-toggle="tooltip">
										  <i class="glyphicon glyphicon-comment"></i>
									  </span>
                   <div>
                     <input oninput="limitText(this, 35, 'a')" id="title" name="title" type="text" placeholder="Title" class="form-control input-md" value="<?= $project[0]->title; ?>" required="true">

                   </div>
                 </div>

                 <!-- Textarea -->
                 <div class="form-group">
                   <label for="description">Description</label>
                   <span id="count-b"></span>
									  <span class="btn-sm btn-default" data-toggle="tooltip">
										  <i class="glyphicon glyphicon-comment"></i>
									  </span>
                   <div>
                     <input oninput="limitText(this, 1000, 'b')" oninput="limitText(this, 1000, 'c')" id="description" name="description" type="text" placeholder="Description" class="form-control input-md" value="<?= $project[0]->description; ?>" required="true">
                   </div>
                 </div>

                 <!-- Textarea -->
                 <div class="form-group">
                   <label for="objectives">Objectives</label>
                   <span id="count-c"></span>
									  <span class="btn-sm btn-default" data-toggle="tooltip">
										  <i class="glyphicon glyphicon-comment"></i>
									  </span>
                   <div>
                     <input oninput="limitText(this, 1000, 'c')" oninput="limitText(this, 1000, 'c')" id="objectives" name="objectives" type="text" placeholder="Objectives" class="form-control input-md" value="<?= $project[0]->objectives; ?>" required="true">
                   </div>
                 </div>
                 <input id="new_project-submit" type="submit" value="Update" class="btn btn-lg btn-success btn-block">
               </form>
             </div>
           </div>
         </div>
       </section>
     </div>
   </div>
 </body>
 <?php $this->load->view('frame/footer_view') ?>