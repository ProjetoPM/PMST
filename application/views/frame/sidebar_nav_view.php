<aside class="main-sidebar" style="
/* position:absolute;
height: fit-content; */

position:-webkit-sticky


 
  
 ">
   <section class="sidebar">
      <div class="user-panel">

         <div class="pull-left image">

            <img src="<?= base_url() ?>assets/images/user-icon.jpg" class="img-circle profileImgUrl" alt="User Image">
         </div>
         <div class="pull-left info">
            <p class="NameEdt">
               <?= $this->session->userdata('name') ?>
            </p>
            <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
         </div>
      </div>


      <?php $uri1 = $this->uri->segment(1);
      $uri2 = $this->uri->segment(2);
      ?>
      <ul class="sidebar-menu" data-widget="tree">
         <!-- <li class="header">MAIN NAVIGATION</li>
         <span class="pull-right-container"> <i class="fa fa-angle-left pull-right"></i> </span> -->

         <!-- <li>
               <a href="#"><i class="fa fa-folder fa-fw"></i> Projects<span class="fa arrow"></span></a>
               <ul class="nav nav-second-level collapse in">
                  <li> <a href="<?= base_url('new') ?>"> <i class="fa fa-plus-circle"></i> New Project</a> </li>
                  <li> <a href="<?= base_url('projects') ?>"><i class="fa fa-folder-open"></i> My Projects</a> </li>
               </ul>
            </li> -->

         <!-- <li class="treeview"> <a href="#"> <i class="fa fa-folder fa-fw"></i> <span>Projects</span> <span class="pull-right-container"> <i class="fa fa-angle-left pull-right"></i> </span> </a> -->
         <!-- <li class="treeview"> <a href="#"> <i class="fa fa-folder fa-fw"></i> <span>Projects</span> <span class="pull-right-container"> <i class="fa fa-angle-left pull-right"></i> </span> </a> -->
         <!-- <ul class="treeview-menu">
               <li><a href="<?= base_url('new') ?>"><i class="fa fa-plus-circle"></i>New Project</a></li>
               <li> <a href="<?= base_url('projects') ?>"><i class="fa fa-folder-open"></i> My Projects</a> </li>
            </ul>
         </li> -->

         <!-- <li>
               <a href="#"><i class="fa fa-user fa-fw"></i> Account<span class="fa arrow"></span></a>
               <ul class="nav nav-second-level">
                  <li> <a data-toggle="modal" data-target="#myAccount" href="#myAccount"><i class="fa fa-user fa-fw"></i> My Profile</a> </li>
               </ul>
            </li> -->
         <!-- fim do main panel -->

         <li class="<?php if ($uri1 == 'projects') {
                        echo 'active';
                     } ?>"> <a href="<?= base_url('projects'); ?>"><i class="fa fa-folder fa-fw"></i> <span>Projects</span>
            </a>
         </li>


         <?php if ($_SESSION['project_id'] != null) { ?>

            <li class="<?php if ($uri1 == 'chat') {
                           echo 'active';
                        } ?>"> <a href="<?= base_url('chat'); ?>">
                  <i class="fa fa-comment fa-fw"></i> <span>Chat</span>
               </a>
            </li>

            <li class="<?php if ($uri1 == 'project') {
                           echo 'active';
                        } ?>"><a href="<?= base_url("project/" . $_SESSION['project_id']) ?>"><i class="fa fa-home fa-2"></i> <span>Dashboard</span>
               </a>
            </li>

            <!-- INICIO INTEGRATION -->
            <li class="treeview <?php if ($uri1 == 'integration') {
                                    echo 'active';
                                 } ?>"><a href=" #"> <i class="fa fa-star"></i> <span>Integration</span> <span class="pull-right-container"> <i class="fa fa-angle-left pull-right"></i> </span> </a>
               <ul class="treeview-menu">
                  <li class="<?php if ($uri2 == 'project-charter') {
                                 echo 'active';
                              } ?>"><a href="<?= base_url("integration/project-charter/new/" . $_SESSION['project_id']) ?>"><i class="fa fa-star"></i>Project Charter</a></li>
                  <li class="<?php if ($uri2 == 'business-case') {
                                 echo 'active';
                              } ?>"><a href="<?= base_url("integration/business-case/new/" . $_SESSION['project_id']) ?>"><i class="fa fa-star"></i>Business Case</a></li>
                  <li class="<?php if ($uri2 == 'benefits-mp') {
                                 echo 'active';
                              } ?>"><a href="<?= base_url("integration/benefits-mp/new/" . $_SESSION['project_id']) ?>"><i class="fa fa-star"></i>Benefits Management Plan</a></li>
                  <li class="<?php if ($uri2 == 'project-mp') {
                                 echo 'active';
                              } ?>"><a href="<?= base_url("integration/project-mp/new/" . $_SESSION['project_id']) ?>"><i class="fa fa-star"></i>Project Management Plan</a></li>
                  <li class="<?php if ($uri2 == 'project-performance-report') {
                                 echo 'active';
                              } ?>"><a href="<?= base_url("integration/project-performance-report/list/" . $_SESSION['project_id']) ?>"><i class="fa fa-star"></i>Proj. Performance & Mon. Report</a></li>
                  <li class="<?php if ($uri2 == 'deliverable-status') {
                                 echo 'active';
                              } ?>"><a href="<?= base_url("integration/deliverable-status/list/" . $_SESSION['project_id']) ?>"><i class="fa fa-star"></i>Deliverable Status</a></li>
                  <li class="<?php if ($uri2 == 'work-performance-reports') {
                                 echo 'active';
                              } ?>"><a href="<?= base_url("integration/work-performance-reports/list/" . $_SESSION['project_id']) ?>"><i class="fa fa-star"></i>Work Performance Reports</a></li>
                  <li class="<?php if ($uri2 == 'issue-log') {
                                 echo 'active';
                              } ?>"><a href="<?= base_url("integration/issue-log/list/" . $_SESSION['project_id']) ?>"><i class="fa fa-star"></i>Issue Log</a></li>
                  <li class="<?php if ($uri2 == 'change-request') {
                                 echo 'active';
                              } ?>"><a href="<?= base_url("integration/change-request/list/" . $_SESSION['project_id']) ?>"><i class="fa fa-star"></i>Change Request</a></li>
                  <li class="<?php if ($uri2 == 'change-log') {
                                 echo 'active';
                              } ?>"><a href="<?= base_url("integration/change-log/list/" . $_SESSION['project_id']) ?>"><i class="fa fa-star"></i>Change Log</a></li>
                  <li class="<?php if ($uri2 == 'project-closure') {
                                 echo 'active';
                              } ?>"><a href="<?= base_url("integration/project-closure/new/" . $_SESSION['project_id']) ?>"><i class="fa fa-star"></i>Project Closure Term</a></li>
                   <li class="<?php if ($uri2 == 'final-report') {
                                 echo 'active';
                              } ?>"><a href="<?= base_url("integration/final-report/new/" . $_SESSION['project_id']) ?>"><i class="fa fa-star"></i>Final Report</a></li>            
               </ul>
            </li>
            <!-- FIM INTEGRATION -->

            <!-- INICIO SCOPE -->
            <li class="treeview <?php if ($uri1 == 'scope') {
                                    echo 'active';
                                 } ?>"> <a href="#"> <i class="fa fa-search"></i> <span>Scope</span> <span class="pull-right-container"> <i class="fa fa-angle-left pull-right"></i> </span> </a>
               <ul class="treeview-menu">
                  <li class="<?php if ($uri2 == 'requirements-mp') {
                                 echo 'active';
                              } ?>"><a href="<?= base_url("scope/requirements-mp/new/" . $_SESSION['project_id']) ?>"><i class="fa fa-search"></i>Requirements Man. Plan</a></li>
                  <li class="<?php if ($uri2 == 'scope-mp') {
                                 echo 'active';
                              } ?>"><a href="<?= base_url("scope/scope-mp/new/" . $_SESSION['project_id']) ?>"><i class="fa fa-search"></i>Scope Management Plan</a></li>
                  <li class="<?php if ($uri2 == 'requirement-documentation') {
                                 echo 'active';
                              } ?>"><a href="<?= base_url("scope/requirement-documentation/list/" . $_SESSION['project_id']) ?>"><i class="fa fa-search"></i>Requirement Documentation</a></li>
                  <li class="<?php if ($uri2 == 'project-scope-statement') {
                                 echo 'active';
                              } ?>"><a href="<?= base_url("scope/project-scope-statement/new/" . $_SESSION['project_id']) ?>"><i class="fa fa-search"></i>Project Scope Statement</a></li>
                  <li class="<?php if ($uri2 == 'work-breakdown-structure') {
                                 echo 'active';
                              } ?>"><a href="<?= base_url("scope/work-breakdown-structure/new/" . $_SESSION['project_id']) ?>"><i class="fa fa-search"></i>Work Breakdown Structure</a></li>
               </ul>
            </li>
            <!-- FIM SCOPE -->

            <!-- INICIO SCHEDULE -->
            <li class="treeview <?php if ($uri1 == 'schedule') {
                                    echo 'active';
                                 } ?>"> <a href="#"> <i class="glyphicon glyphicon-time"></i> <span>Schedule</span> <span class="pull-right-container"> <i class="fa fa-angle-left pull-right"></i> </span> </a>
               <ul class="treeview-menu">
                  <li class="<?php if ($uri2 == 'schedule-mp') {
                                 echo 'active';
                              } ?>"><a href="<?= base_url("schedule/schedule-mp/new/" . $_SESSION['project_id']) ?>"><i class="glyphicon glyphicon-time"></i>Schedule Management Plan</a></li>
                  <li class="<?php if ($uri2 == 'activity-list') {
                                 echo 'active';
                              } ?>"><a href="<?= base_url("schedule/activity-list/list/" . $_SESSION['project_id']) ?>"><i class="glyphicon glyphicon-time"></i>Activity List</a></li>
                  <li class="<?php if ($uri2 == 'earned-value-management') {
                                 echo 'active';
                              } ?>"><a href="<?= base_url("schedule/earned-value-management/list/" . $_SESSION['project_id']) ?>"><i class="glyphicon glyphicon-time"></i>Earned Value Management</a></li>
                  <li class="<?php if ($uri2 == 'project-schedule-network-diagram') {
                                 echo 'active';
                              } ?>"><a href="<?= base_url("schedule/project-schedule-network-diagram/list/" . $_SESSION['project_id']) ?>"><i class="glyphicon glyphicon-time"></i>Schedule Network Diagram</a></li>
                  <li class="<?php if ($uri2 == 'resource-requirements') {
                                 echo 'active';
                              } ?>"><a href="<?= base_url("schedule/resource-requirements/list/" . $_SESSION['project_id']) ?>"><i class="glyphicon glyphicon-time"></i>Resource Requirements</a></li>
                  <li class="<?php if ($uri2 == 'duration-estimates') {
                                 echo 'active';
                              } ?>"><a href="<?= base_url("schedule/duration-estimates/list/" . $_SESSION['project_id']) ?>"><i class="glyphicon glyphicon-time"></i>Duration Estimates</a></li>
                  <li class="<?php if ($uri2 == 'project-calendars') {
                                 echo 'active';
                              } ?>"><a href="<?= base_url("schedule/project-calendars/list/" . $_SESSION['project_id']) ?>"><i class="glyphicon glyphicon-time"></i>Project Calendars</a></li>
               </ul>
            </li>
            <!-- FIM SCHEDULE -->

            <!-- INICIO COST -->
            <li class="treeview <?php if ($uri1 == 'cost') {
                                    echo 'active';
                                 } ?>"> <a href="#"> <i class="fa fa-money"></i> <span>Cost</span> <span class="pull-right-container"> <i class="fa fa-angle-left pull-right"></i> </span> </a>
               <ul class="treeview-menu">
                  <li class="<?php if ($uri2 == 'cost-mp') {
                                 echo 'active';
                              } ?>"><a href="<?= base_url("cost/cost-mp/new/" . $_SESSION['project_id']) ?>"><i class="fa fa-money"></i>Cost Management Plan</a></li>
                  <li class="<?php if ($uri2 == 'cost-estimates') {
                                 echo 'active';
                              } ?>"><a href="<?= base_url("cost/cost-estimates/list/" . $_SESSION['project_id']) ?>"><i class="fa fa-money"></i>Cost Estimates</a></li>
               </ul>
            </li>
            <!-- FIM COST -->

            <!-- INICIO QUALITY -->
            <li class="treeview <?php if ($uri1 == 'quality') {
                                    echo 'active';
                                 } ?>"> <a href="#"> <i class="fa fa-trophy"></i> <span>Quality</span> <span class="pull-right-container"> <i class="fa fa-angle-left pull-right"></i> </span> </a>
               <ul class="treeview-menu">
                  <li class="<?php if ($uri2 == 'quality-mp') {
                                 echo 'active';
                              } ?>"><a href="<?= base_url("quality/quality-mp/new/" . $_SESSION['project_id']) ?>"><i class="fa fa-trophy"></i>Quality Management Plan</a></li>
               </ul>
            </li>
            <!-- FIM QUALITY -->

            <!-- INICIO RESOURCES -->
            <li class="treeview <?php if ($uri1 == 'resources') {
                                    echo 'active';
                                 } ?>"> <a href="#"> <i class="fa fa-male"></i> <span>Resources</span> <span class="pull-right-container"> <i class="fa fa-angle-left pull-right"></i> </span> </a>
               <ul class="treeview-menu">
                  <li class="<?php if ($uri2 == 'resource-mp') {
                                 echo 'active';
                              } ?>"><a href="<?= base_url("resources/resource-mp/new/" . $_SESSION['project_id']) ?>"><i class="fa fa-male"></i>Resource Management Plan</a></li>
                  <li class="<?php if ($uri2 == 'resource-breakdown-structure') {
                                 echo 'active';
                              } ?>"><a href="<?= base_url("resources/resource-breakdown-structure/new/" . $_SESSION['project_id']) ?>"><i class="fa fa-male"></i>Resource Breakdown Structure</a></li>
                  <li class="<?php if ($uri2 == 'team-performance-assessments') {
                                 echo 'active';
                              } ?>"><a href="<?= base_url("resources/team-performance-assessments/list/" . $_SESSION['project_id']) ?>"><i class="fa fa-male"></i>Team Performance Assessments</a></li>
               </ul>
            </li>
            <!-- FIM RESOURCES -->

            <!-- INICIO COMMUNICATION -->
            <li class="treeview <?php if ($uri1 == 'communication') {
                                    echo 'active';
                                 } ?>"> <a href="#"> <i class="fa fa-bullhorn"></i> <span>Communication</span> <span class="pull-right-container"> <i class="fa fa-angle-left pull-right"></i> </span> </a>
               <ul class="treeview-menu">
                  <li class="<?php if ($uri2 == 'communications-mp') {
                                 echo 'active';
                              } ?>"><a href="<?= base_url() ?>communication/communications-mp/list/<?php echo $_SESSION['project_id']; ?>"><i class="fa fa-bullhorn"></i>Commun. Management Plan</a></li>
               </ul>
            </li>
            <!-- FIM COMMUNICATION -->

            <!-- INICIO RISK -->
            <li class="treeview <?php if ($uri1 == 'risk') {
                                    echo 'active';
                                 } ?>"> <a href="#"> <i class="fa fa-exclamation-circle"></i> <span>Risk</span> <span class="pull-right-container"> <i class="fa fa-angle-left pull-right"></i> </span> </a>
               <ul class="treeview-menu">
                  <li class="<?php if ($uri2 == 'risk-mp') {
                                 echo 'active';
                              } ?>"><a href="<?= base_url("risk/risk-mp/new/" . $_SESSION['project_id']) ?>"><i class="fa fa-exclamation-circle"></i>Risk Management Plan</a></li>
                  <li class="<?php if ($uri2 == 'risk-register') {
                                 echo 'active';
                              } ?>"><a href="<?= base_url("risk/risk-register/list/" . $_SESSION['project_id']) ?>"><i class="fa fa-exclamation-circle"></i>Risk Register</a></li>
               </ul>
            </li>
            <!-- FIM RISK -->

            <!-- INICIO PROCUREMENT -->
            <li class="treeview <?php if ($uri1 == 'procurement') {
                                    echo 'active';
                                 } ?>"> <a href="#"> <i class="fa fa-shopping-cart"></i> <span>Procurement</span> <span class="pull-right-container"> <i class="fa fa-angle-left pull-right"></i> </span> </a>
               <ul class="treeview-menu">
                  <li class="<?php if ($uri2 == 'procurement-mp') {
                                 echo 'active';
                              } ?>"><a href="<?= base_url("procurement/procurement-mp/new/" . $_SESSION['project_id']) ?>"><i class="fa fa-shopping-cart"></i>Procurement Management Plan</a></li>
                  <li class="<?php if ($uri2 == 'procurement-statement-of-work') {
                                 echo 'active';
                              } ?>"><a href="<?= base_url("procurement/procurement-statement-of-work/list/" . $_SESSION['project_id']) ?>"><i class="fa fa-shopping-cart"></i>Procurement Statement Of Work</a></li>
               </ul>
            </li>
            <!-- FIM PROCUREMENT -->

            <!-- INICIO STAKEHOLDER -->
            <li class="treeview <?php if ($uri1 == 'stakeholder') {
                                    echo 'active';
                                 } ?>"> <a href="#"> <i class="fa fa-users"></i> <span>Stakeholder</span> <span class="pull-right-container"> <i class="fa fa-angle-left pull-right"></i> </span> </a>
               <ul class="treeview-menu">
                  <li class="<?php if ($uri2 == 'stakeholder-register') {
                                 echo 'active';
                              } ?>"><a href="<?= base_url("stakeholder/stakeholder-register/list/" . $_SESSION['project_id']) ?>"><i class="fa fa-users"></i>Stakeholder Register</a></li>
                  <li class="<?php if ($uri2 == 'stakeholder-engagement-plan') {
                                 echo 'active';
                              } ?>"><a href="<?= base_url("stakeholder/stakeholder-engagement-plan/list/" . $_SESSION['project_id']) ?>"><i class="fa fa-users"></i>Stakeholder Engagement Plan</a></li>
               </ul>
            </li>
            <!-- FIM STAKEHOLDER-->

            <!-- INICIO NOTIFICATION BOARD -->
            <li class="<?php if ($uri1 == 'notification-board') {
                           echo 'active';
                        } ?>"><a href="<?= base_url() ?>notification-board/list/<?php echo $_SESSION['project_id']; ?>"><i class="glyphicon glyphicon-blackboard"></i> <span>Notification Board</span>
               </a>
            </li>
            <!-- FIM NOTIFICATION BOARD -->

         <?php } ?>

      </ul>
   </section>

   <!-- /.sidebar -->

</aside>