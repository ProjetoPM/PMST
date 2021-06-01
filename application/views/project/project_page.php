<link href="<?= base_url() ?>assets/css/show_project_page_card.css" rel="stylesheet">
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


<body class="hold-transition skin-gray sidebar-mini">
  <script src="<?= base_url() ?>assets/js/sidebar-menu.js" type="text/javascript"></script>

  <div class="wrapper">
    <div class="content-wrapper">

      <section class="content" style="padding-top: 5px;">
        <div class="row">
          <div class="col-md-12">
            <div class="panel panel-default">
              <div class="panel-heading">
                <h3 class="panel-title" style="text-align: center;padding-right: 53px;">
                  <strong><?= $this->lang->line('phases') ?>
                    <!-- <a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="Definir"><i class="glyphicon glyphicon-comment"></i></a> -->
                  </strong>
                </h3>
              </div>

              <div class="panel-body text-justify" style="background-color:#f5f5f5">
                <div class="panel-body text-center" style="background-color:#f5f5f5">

                  <div class="col-lg-12 wrapper noSpaceSide" style="background-color:#f5f5f5">
                    <div class="noSpaceSide">

                      <div class="col-lg-1 C"></div>

                      <div class="col-lg-10 noSpaceSide floatRight">
                        <div class=" col-lg-1 menuBox hideBox">
                          <div class="verticalAlign">
                            <?= $this->lang->line('initiating') ?>
                          </div>
                        </div>

                        <div class=" col-lg-1 menuBox planningBox hideBox">
                          <div class="verticalAlign">
                            <?= $this->lang->line('planning') ?>
                          </div>
                        </div>

                        <div class=" col-lg-1 menuBox hideBox">
                          <div class="verticalAlign">
                            <?= $this->lang->line('executing') ?>
                          </div>
                        </div>

                        <div class=" col-lg-1 menuBox hideBox">
                          <div class="verticalAlign">
                            <?= $this->lang->line('monitoring-controlling') ?>
                          </div>
                        </div>

                        <div class=" col-lg-1 menuBox hideBox">
                          <div class="verticalAlign">
                            <?= $this->lang->line('closing') ?>
                          </div>
                        </div>
                      </div>
                      <!--  -->
                    </div>
                  </div> <!-- End Header Phases -->

                  <div class="col-lg-12 wrapper noSpaceSide" style="background-color:#f5f5f5">
                    <div class="noSpaceSide">
                      <div class="col-lg-1 sideBox integrationBox integrationColor">
                        <div class="verticalAlign">
                          <i class="glyphicon glyphicon-star"></i>
                          <?= $this->lang->line('integration') ?>
                        </div>
                      </div>


                      <div class="col-lg-10 noSpaceSide floatRight">

                        <?php
                        $obj = &get_instance();
                        $obj->load->model('Project_Charter_model');

                        if ($obj->Project_Charter_model->get($project[0]->project_id) == null) { ?>
                          <a href="<?= base_url("integration/project-charter/new/" . $project[0]->project_id) ?>">
                          <?php } else { ?>
                            <a href="<?= base_url("integration/project-charter/edit/" . $project[0]->project_id) ?>">
                            <?php   } ?>

                            <div class=" col-lg-1 midBox integrationColor">
                              <div class="verticalAlign">
                                <i class="glyphicon glyphicon-star"></i>
                                <?= $this->lang->line('project-charter') ?>
                              </div>
                            </div>
                            </a>

                            <?php
                            $obj = &get_instance();
                            $obj->load->model('Project_Management_model');

                            if ($obj->Project_Management_model->get($project[0]->project_id) == null) { ?>
                              <a href="<?= base_url("integration/project-mp/new/" . $project[0]->project_id) ?>">
                              <?php } else { ?>
                                <a href="<?= base_url("integration/project-mp/edit/" . $project[0]->project_id) ?>">
                                <?php   } ?>

                                <div class=" col-lg-1 midBox integrationColor">
                                  <div class="verticalAlign">
                                    <i class="glyphicon glyphicon-star"></i>
                                    <?= $this->lang->line('project-management') ?>
                                  </div>
                                </div>
                                </a>

                                <div class=" col-lg-1 midBox integrationColor hideBox"></div>

                                <div class=" col-lg-1 midBox integrationColor hideBox"></div>

                                <a href="<?= base_url("integration/project-performance-report/list/" . $project[0]->project_id) ?>">
                                  <div class=" col-lg-1 midBox integrationColor">
                                    <div class="verticalAlign">
                                      <i class="glyphicon glyphicon-star"></i>
                                      <?= $this->lang->line('project-status') ?>
                                    </div>
                                  </div>
                                </a>

                                <a href="<?= base_url("integration/change-request/list/" . $project[0]->project_id) ?>">
                                  <div class=" col-lg-1 midBox integrationColor">
                                    <div class="verticalAlign">
                                      <i class="glyphicon glyphicon-star"></i>
                                      <?= $this->lang->line('change-request') ?>
                                    </div>
                                  </div>
                                </a>

                                <?php
                                $obj = &get_instance();
                                $obj->load->model('Project_Closure_model');

                                if ($obj->Project_Closure_model->get($project[0]->project_id) == null) { ?>
                                  <a href="<?= base_url("integration/project-closure/new/" . $project[0]->project_id) ?>">
                                  <?php } else { ?>
                                    <a href="<?= base_url("integration/project-closure/edit/" . $project[0]->project_id) ?>">
                                    <?php   } ?>
                                    <div class=" col-lg-1 midBox integrationColor">
                                      <div class="verticalAlign">
                                        <i class="glyphicon glyphicon-star"></i>
                                        <?= $this->lang->line('lessons-learned') ?>
                                      </div>
                                    </div>
                                    </a>
                      </div>
                       <!--  -->
                      
                      <!--  -->
                      <div class="col-lg-10 noSpaceSide floatRight">

                        <?php
                        $obj->load->model('Business_case_model');

                        if ($obj->Business_case_model->get($project[0]->project_id) == null) { ?>
                          <a href="<?= base_url("integration/business-case/new/" . $project[0]->project_id) ?>">
                          <?php } else { ?>
                            <a href="<?= base_url("integration/business-case/edit/" . $project[0]->project_id) ?>">
                            <?php   } ?>
                            <div class=" col-lg-1 midBox integrationColor">
                              <div class="verticalAlign">
                                <i class="glyphicon glyphicon-star"></i>
                                <?= $this->lang->line('business_case') ?>
                              </div>
                            </div>
                            </a>

                            <div class=" col-lg-1 midBox integrationColor hideBox"></div>

                            <div class=" col-lg-1 midBox integrationColor hideBox"></div>

                            <div class=" col-lg-1 midBox integrationColor hideBox"></div>

                            <a href="<?= base_url("integration/deliverable-status/list/" . $project[0]->project_id) ?>">
                              <div class=" col-lg-1 midBox integrationColor">
                                <div class="verticalAlign">
                                  <i class="glyphicon glyphicon-star"></i>
                                  <?= $this->lang->line('deliverables-status') ?>
                                </div>
                              </div>
                            </a>

                            <a href="<?= base_url("integration/change-log/list/" . $project[0]->project_id) ?>">
                              <div class=" col-lg-1 midBox integrationColor">
                                <div class="verticalAlign">
                                  <i class="glyphicon glyphicon-star"></i>
                                  <?= $this->lang->line('change-log') ?>
                                </div>
                              </div>
                            </a>

                            <?php
                        $obj->load->model('Final_report_model');

                        if ($obj->Final_report_model->get($project[0]->project_id) == null) { ?>
                          <a href="<?= base_url("integration/final-report/new/" . $project[0]->project_id) ?>">
                          <?php } else { ?>
                            <a href="<?= base_url("integration/final-report/edit/" . $project[0]->project_id) ?>">
                            <?php   } ?>
                            <div class=" col-lg-1 midBox integrationColor">
                              <div class="verticalAlign">
                                <i class="glyphicon glyphicon-star"></i>
                                <?= $this->lang->line('final-report') ?>
                              </div>
                            </div>
                            </a>

                      </div>
                      <!--  -->
                      <div class="col-lg-10 noSpaceSide floatRight">

                        <?php
                        $obj->load->model('Benefits_plan_model');

                        if ($obj->Benefits_plan_model->get($project[0]->project_id) == null) { ?>
                          <a href="<?= base_url("integration/benefits-mp/new/" . $project[0]->project_id) ?>">
                          <?php } else { ?>
                            <a href="<?= base_url("integration/benefits-mp/edit/" . $project[0]->project_id) ?>">
                            <?php   } ?>
                            <div class=" col-lg-1 midBox integrationColor">
                              <div class="verticalAlign">
                                <i class="glyphicon glyphicon-star"></i>
                                <?= $this->lang->line('benefits_plan') ?>
                              </div>
                            </div>
                            </a>

                            <div class=" col-lg-1 midBox integrationColor hideBox"></div>

                            <div class=" col-lg-1 midBox integrationColor hideBox"></div>

                            <div class=" col-lg-1 midBox integrationColor hideBox"></div>

                            <a href="<?= base_url("integration/work-performance-reports/list/" . $project[0]->project_id) ?>">
                              <div class=" col-lg-1 midBox integrationColor">
                                <div class="verticalAlign">
                                  <i class="glyphicon glyphicon-star"></i>
                                  <?= $this->lang->line('work_performance_report') ?>
                                </div>
                              </div>
                            </a>

                            <a href="<?= base_url("Maintenance") ?>">
                              <div class=" col-lg-1 midBox disableColor">
                                <div class="verticalAlign">
                                  <i class="glyphicon glyphicon-star"></i>
                                  <?= $this->lang->line('earned-value') ?>
                                </div>
                              </div>
                            </a>

                            <div class=" col-lg-1 midBox integrationColor hideBox"></div>
                            <div class=" col-lg-1 midBox integrationColor hideBox"></div>
                            <div class=" col-lg-1 midBox integrationColor hideBox"></div>
                            <div class=" col-lg-1 midBox integrationColor hideBox"></div>
                            <div class=" col-lg-1 midBox integrationColor hideBox"></div>

                            <a href="<?= base_url("integration/issue-log/list/" . $project[0]->project_id) ?>">
                              <div class=" col-lg-1 midBox integrationColor">
                                <div class="verticalAlign">
                                  <i class="glyphicon glyphicon-star"></i>
                                  <?= $this->lang->line('issue-log') ?>
                                </div>
                              </div>
                            </a>

                            <div class=" col-lg-1 midBox integrationColor hideBox"></div>
                            <div class=" col-lg-1 midBox integrationColor hideBox"></div>

                      </div>
                      <!--  -->
                      <div class="col-lg-10 noSpaceSide floatRight">

                               <div class=" col-lg-1 midBox integrationColor hideBox"></div>

                               <div class=" col-lg-1 midBox integrationColor hideBox"></div>

                                <div class=" col-lg-1 midBox integrationColor hideBox"></div>

                                <div class=" col-lg-1 midBox integrationColor hideBox"></div>

                                <a href="<?= base_url("integration/lesson-learned-register/list/" . $project[0]->project_id) ?>">
                              <div class=" col-lg-1 midBox integrationColor">
                                <div class="verticalAlign">
                                  <i class="glyphicon glyphicon-star"></i>
                                  <?= $this->lang->line('lesson-learned-register') ?>
                                </div>
                              </div>
                            </a>

                                <div class=" col-lg-1 midBox integrationColor hideBox"></div>

                                <div class=" col-lg-1 midBox integrationColor hideBox"></div>
                      </div>
                      <!--  -->
                    </div>
                  </div>

                  <!-- [] -->

                  <div class="col-lg-12 wrapper noSpaceSide">
                    <div class="noSpaceSide">
                      <div class="col-lg-1 sideBox scopeBox scopeColor">
                        <div class="verticalAlign">
                          <i class="glyphicon glyphicon-search"></i>
                          <?= $this->lang->line('scope') ?>
                        </div>
                      </div>

                      <div class="col-lg-10 noSpaceSide floatRight">

                        <div class=" col-lg-1 midBox scopeColor hideBox"></div>

                        <?php
                        $obj->load->model('Requirements_mp_model');

                        if ($obj->Requirements_mp_model->get($project[0]->project_id) == null) { ?>
                          <a href="<?= base_url("scope/requirements-mp/new/" . $project[0]->project_id) ?>">
                          <?php } else { ?>
                            <a href="<?= base_url("scope/requirements-mp/edit/" . $project[0]->project_id) ?>">
                            <?php   } ?>
                            <div class=" col-lg-1 midBox scopeColor">
                              <div class="verticalAlign">
                                <i class="glyphicon glyphicon-search"></i>
                                <?= $this->lang->line('requirement-management') ?>
                              </div>
                            </div>
                            </a>

                            <a href="<?= base_url("scope/requirement-documentation/list/" . $project[0]->project_id) ?>">
                              <div class=" col-lg-1 midBox scopeColor">
                                <div class="verticalAlign">
                                  <i class="glyphicon glyphicon-search"></i>
                                  <?= $this->lang->line('requirement-documentation') ?>
                                </div>
                              </div>
                            </a>


                            <?php
                            $obj->load->model('Scope_specification_model');

                            if ($obj->Requirements_mp_model->get($project[0]->project_id) == null) { ?>
                              <a href="<?= base_url("scope/project-scope-statement/new/" . $project[0]->project_id) ?>">
                              <?php } else { ?>
                                <a href="<?= base_url("scope/project-scope-statement/edit/" . $project[0]->project_id) ?>">
                                <?php   } ?>
                                <div class=" col-lg-1 midBox scopeColor">
                                  <div class="verticalAlign">
                                    <i class="glyphicon glyphicon-search"></i>
                                    <?= $this->lang->line('project-scope') ?>
                                  </div>
                                </div>
                                </a>

                                <div class=" col-lg-1 midBox scopeColor hideBox"></div>

                                <div class=" col-lg-1 midBox scopeColor hideBox"></div>

                                <div class=" col-lg-1 midBox scopeColor hideBox"></div>

                      </div>
                      <!--  -->
                      <div class="col-lg-10 noSpaceSide floatRight">

                        <div class=" col-lg-1 midBox scopeColor hideBox"></div>


                        <?php
                        $obj->load->model('Scope_mp_model');

                        if ($obj->Scope_mp_model->get($project[0]->project_id) == null) { ?>
                          <a href="<?= base_url("scope/scope-mp/new/" . $project[0]->project_id) ?>">
                          <?php } else { ?>
                            <a href="<?= base_url("scope/scope-mp/edit/" . $project[0]->project_id) ?>">
                            <?php   } ?>
                            <div class=" col-lg-1 midBox scopeColor">
                              <div class="verticalAlign">
                                <i class="glyphicon glyphicon-search"></i>
                                <?= $this->lang->line('scope-management') ?>
                              </div>
                            </div>
                            </a>

                            <a href="<?= base_url("Maintenance") ?>">
                              <div class=" col-lg-1 midBox disableColor">
                                <div class="verticalAlign">
                                  <i class="glyphicon glyphicon-search"></i>
                                  <?= $this->lang->line('requirement-traceability') ?>
                                </div>
                              </div>
                            </a>

                            <a href="<?= base_url("scope/work-breakdown-structure/new/" . $project[0]->project_id) ?>">
                              <div class=" col-lg-1 midBox scopeColor">
                                <div class="verticalAlign">
                                  <i class="glyphicon glyphicon-search"></i>
                                  <?= $this->lang->line('scope-baseline') ?>
                                </div>
                              </div>
                            </a>

                            <div class=" col-lg-1 midBox scopeColor hideBox"></div>

                            <div class=" col-lg-1 midBox scopeColor hideBox"></div>

                            <div class=" col-lg-1 midBox scopeColor hideBox"></div>

                      </div>
                      <!--  -->
                    </div>
                  </div>

                  <!-- [] -->

                  <div class="col-lg-12 wrapper noSpaceSide">
                    <div class="noSpaceSide">
                      <div class="col-lg-1 sideBox scheduleBox timeColor">
                        <div class="verticalAlign">
                          <i class="glyphicon glyphicon-time"></i>
                          <?= $this->lang->line('time') ?>
                        </div>
                      </div>

                      <div class="col-lg-10 noSpaceSide floatRight">

                        <div class=" col-lg-1 midBox timeColor hideBox"></div>

                        <?php
                        $obj->load->model('Schedule_model');

                        if ($obj->Schedule_model->get($project[0]->project_id) == null) { ?>
                          <a href="<?= base_url("schedule/schedule-mp/new/" . $project[0]->project_id) ?>">
                          <?php } else { ?>
                            <a href="<?= base_url("schedule/schedule-mp/edit/" . $project[0]->project_id) ?>">
                            <?php   } ?>

                            <div class=" col-lg-1 midBox timeColor">
                              <div class="verticalAlign">
                                <i class="glyphicon glyphicon-time"></i>
                                <?= $this->lang->line('schedule-management') ?>
                              </div>
                            </div>
                            </a>

                            <a href="<?= base_url("schedule/project-schedule-network-diagram/list/" . $project[0]->project_id) ?>">
                              <div class=" col-lg-1 midBox timeColor">
                                <div class="verticalAlign">
                                  <i class="glyphicon glyphicon-time"></i>
                                  <?= $this->lang->line('project-schedule-network') ?>
                                </div>
                              </div>
                            </a>

                            <a href="<?= base_url("schedule/project-calendars/list/" . $project[0]->project_id) ?>">
                              <div class=" col-lg-1 midBox timeColor">
                                <div class="verticalAlign">
                                  <i class="glyphicon glyphicon-time"></i>
                                  <?= $this->lang->line('project-calendar') ?>
                                </div>
                              </div>
                            </a>

                            <div class=" col-lg-1 midBox timeColor hideBox"></div>

                            <div class=" col-lg-1 midBox timeColor hideBox"></div>

                            <div class=" col-lg-1 midBox timeColor hideBox"></div>

                      </div>
                      <!--  -->
                      <div class="col-lg-10 noSpaceSide floatRight">

                        <div class=" col-lg-1 midBox timeColor hideBox"></div>



                        <a href="<?= base_url("schedule/activity-list/list/" . $project[0]->project_id) ?>">
                          <div class=" col-lg-1 midBox timeColor">
                            <div class="verticalAlign">
                              <i class="glyphicon glyphicon-time"></i>
                              <?= $this->lang->line('activity-list') ?>
                            </div>
                          </div>
                        </a>

                        <a href="<?= base_url("schedule/resource-requirements/list/" . $project[0]->project_id) ?>">
                          <div class=" col-lg-1 midBox timeColor">
                            <div class="verticalAlign">
                              <i class="glyphicon glyphicon-time"></i>
                              <?= $this->lang->line('activity-resource') ?>
                            </div>
                          </div>
                        </a>

                        <!-- <a href="<?= base_url("Activity/listQuantitative/" . $project[0]->project_id) ?>">
                      <div class=" col-lg-1 midBox timeColor">
                        <div class="verticalAlign">
                          <i class="glyphicon glyphicon-time"></i>
                          <?= $this->lang->line('quantitative_risk_analysis') ?>
                        </div>
                      </div>
                    </a> -->

                        <div class=" col-lg-1 midBox timeColor hideBox"></div>

                        <div class=" col-lg-1 midBox timeColor hideBox"></div>

                        <div class=" col-lg-1 midBox timeColor hideBox"></div>

                        <div class=" col-lg-1 midBox timeColor hideBox"></div>

                      </div>
                      <!--  -->
                      <div class="col-lg-10 noSpaceSide floatRight">

                        <div class=" col-lg-1 midBox timeColor hideBox"></div>

                        <a href="<?= base_url("schedule/earned-value-management/list/" . $project[0]->project_id) ?>">
                          <div class=" col-lg-1 midBox timeColor">
                            <div class="verticalAlign">
                              <i class="glyphicon glyphicon-time"></i>
                              <?= $this->lang->line('agregate-value') ?>
                            </div>
                          </div>
                        </a>



                        <a href="<?= base_url("schedule/duration-estimates/list/" . $project[0]->project_id) ?>">
                          <div class=" col-lg-1 midBox timeColor">
                            <div class="verticalAlign">
                              <i class="glyphicon glyphicon-time"></i>
                              <?= $this->lang->line('activity-duration') ?>
                            </div>
                          </div>
                        </a>

                        <div class=" col-lg-1 midBox timeColor hideBox"></div>


                        <div class=" col-lg-1 midBox timeColor hideBox"></div>

                        <div class=" col-lg-1 midBox timeColor hideBox"></div>

                        <div class=" col-lg-1 midBox timeColor hideBox"></div>

                      </div>

                    </div>
                  </div>

                  <!-- [] -->

                  <div class="col-lg-12 wrapper noSpaceSide">
                    <div class="noSpaceSide">
                      <div class="col-lg-1 sideBox costBox">
                        <div class="verticalAlign">
                          <i class="fa fa-money"></i>
                          <?= $this->lang->line('cost') ?>
                        </div>
                      </div>

                      <div class="col-lg-10 noSpaceSide floatRight">

                        <div class=" col-lg-1 midBox costColor hideBox"></div>

                        <?php
                        $obj->load->model('Cost_model');

                        if ($obj->Cost_model->get($project[0]->project_id) == null) { ?>
                          <a href="<?= base_url("cost/cost-mp/new/" . $project[0]->project_id) ?>">
                          <?php } else { ?>
                            <a href="<?= base_url("cost/cost-mp/edit/" . $project[0]->project_id) ?>">
                            <?php   } ?>
                            <div class=" col-lg-1 midBox costColor">
                              <div class="verticalAlign">
                                <i class="fa fa-money"></i>
                                <?= $this->lang->line('cost-management') ?>
                              </div>
                            </div>
                            </a>

                            <a href="<?= base_url("Maintenance") ?>">
                              <div class=" col-lg-1 midBox disableColor">
                                <div class="verticalAlign">
                                  <i class="fa fa-money"></i>
                                  <?= $this->lang->line('cost-baseline') ?>
                                </div>
                              </div>
                            </a>

                            <div class=" col-lg-1 midBox costColor hideBox"></div>

                            <div class=" col-lg-1 midBox costColor hideBox"></div>

                            <div class=" col-lg-1 midBox costColor hideBox"></div>

                            <div class=" col-lg-1 midBox costColor hideBox"></div>

                      </div>
                      <!--  -->
                      <div class="col-lg-10 noSpaceSide floatRight">

                        <div class=" col-lg-1 midBox costColor hideBox"></div>

                        <a href="<?= base_url("cost/cost-estimates/list/" . $project[0]->project_id) ?>">
                          <div class=" col-lg-1 midBox costColor">
                            <div class="verticalAlign">
                              <i class="fa fa-money"></i>
                              <?= $this->lang->line('activity-cost') ?>
                            </div>
                          </div>
                        </a>

                        <a href="<?= base_url("Maintenance") ?>">
                          <div class=" col-lg-1 midBox disableColor">
                            <div class="verticalAlign">
                              <i class="fa fa-money"></i>
                              <?= $this->lang->line('project-funding') ?>
                            </div>
                          </div>
                        </a>

                        <div class=" col-lg-1 midBox costColor hideBox"></div>

                        <div class=" col-lg-1 midBox costColor hideBox"></div>

                        <div class=" col-lg-1 midBox costColor hideBox"></div>

                        <div class=" col-lg-1 midBox costColor hideBox"></div>

                      </div>
                      <!--  -->
                    </div>
                  </div>

                  <!-- [] -->

                  <div class="col-lg-12 wrapper noSpaceSide">
                    <div class="noSpaceSide">
                      <div class="col-lg-1 sideBox qualityBox">
                        <div class="verticalAlign">
                          <i class="fa fa-trophy"></i>
                          <?= $this->lang->line('quality') ?>
                        </div>
                      </div>

                      <div class="col-lg-10 noSpaceSide floatRight">

                        <div class=" col-lg-1 midBox qualityColor hideBox"></div>

                        <?php
                        $obj->load->model('Quality_model');

                        if ($obj->Quality_model->get($project[0]->project_id) == null) { ?>
                          <a href="<?= base_url("quality/quality-mp/new/" . $project[0]->project_id) ?>">
                          <?php } else { ?>
                            <a href="<?= base_url("quality/quality-mp/edit/" . $project[0]->project_id) ?>">
                            <?php   } ?>

                            <div class=" col-lg-1 midBox qualityColor">
                              <div class="verticalAlign">
                                <i class="fa fa-trophy"></i>
                                <?= $this->lang->line('quality-management') ?>
                              </div>
                            </div>
                            </a>

                            <a href="<?= base_url("Maintenance") ?>">
                              <div class=" col-lg-1 midBox disableColor">
                                <div class="verticalAlign">
                                  <i class="fa fa-trophy"></i>
                                  <?= $this->lang->line('product-quality') ?>
                                </div>
                              </div>
                            </a>

                            <!-- <?php
                                  $obj->load->model('Process_plan_model');

                                  if ($obj->Process_plan_model->get($project[0]->project_id) == null) { ?>
                    <a  href="<?= base_url("Process_plan/new/" . $project[0]->project_id) ?>">
                  <?php } else { ?>
                    <a  href="<?= base_url("Process_plan/edit/" . $project[0]->project_id) ?>">
                  <?php   } ?>

                      <div class=" col-lg-1 midBox qualityColor">
                        <div class="verticalAlign">
                          <i class="fa fa-trophy"></i>
                          <?= $this->lang->line('process-improvement') ?>
                        </div>
                      </div>
                    </a> -->
                            <div class=" col-lg-1 midBox qualityColor hideBox"></div>
                            <div class=" col-lg-1 midBox qualityColor hideBox"></div>


                            <div class=" col-lg-1 midBox qualityColor hideBox"></div>


                            <div class=" col-lg-1 midBox qualityColor hideBox"></div>

                      </div>
                      <!--  -->
                      <div class="col-lg-10 noSpaceSide floatRight">

                        <div class=" col-lg-1 midBox qualityColor hideBox"></div>

                        <a href="<?= base_url("Maintenance") ?>">
                          <div class=" col-lg-1 midBox disableColor">
                            <div class="verticalAlign">
                              <i class="fa fa-trophy"></i>
                              <?= $this->lang->line('process-quality') ?>
                            </div>
                          </div>
                        </a>

                        <a href="<?= base_url("Maintenance") ?>">
                          <div class=" col-lg-1 midBox disableColor">
                            <div class="verticalAlign">
                              <i class="fa fa-trophy"></i>
                              <?= $this->lang->line('quality-metrics') ?>
                            </div>
                          </div>
                        </a>

                        <div class=" col-lg-1 midBox qualityColor hideBox"></div>

                        <div class=" col-lg-1 midBox qualityColor hideBox"></div>

                        <div class=" col-lg-1 midBox qualityColor hideBox"></div>

                        <div class=" col-lg-1 midBox qualityColor hideBox"></div>

                      </div>
                      <!--  -->
                    </div>
                  </div>

                  <!-- [] -->

                  <div class="col-lg-12 wrapper noSpaceSide">
                    <div class="noSpaceSide">
                      <div class="col-lg-1 sideBox humanBox hrColor">
                        <div class="verticalAlign">
                          <i class="fa fa-male"></i>
                          <?= $this->lang->line('hr') ?>
                        </div>
                      </div>

                      <div class="col-lg-10 noSpaceSide floatRight">

                        <div class=" col-lg-1 midBox hrColor hideBox"></div>

                        <?php
                        $obj->load->model('human_resource_model');

                        if ($obj->human_resource_model->get($project[0]->project_id) == null) { ?>
                          <a href="<?= base_url("resources/resource-mp/new/" . $project[0]->project_id) ?>">
                          <?php } else { ?>
                            <a href="<?= base_url("resources/resource-mp/edit/" . $project[0]->project_id) ?>">
                            <?php   } ?>

                            <div class=" col-lg-1 midBox hrColor">
                              <div class="verticalAlign">
                                <i class="fa fa-male"></i>
                                <?= $this->lang->line('hr-management') ?>
                              </div>
                            </div>
                            </a>

                            <a href="<?= base_url("resources/resource-breakdown-structure/new/" . $project[0]->project_id) ?>">
                              <div class=" col-lg-1 midBox hrColor">
                                <div class="verticalAlign">
                                  <i class="fa fa-male"></i>
                                  <?= $this->lang->line('resource-breakdown') ?>
                                </div>
                              </div>
                            </a>

                            <div class=" col-lg-1 midBox hrColor hideBox"></div>

                            <a href="<?= base_url("Maintenance") ?>">
                              <div class=" col-lg-1 midBox disableColor">
                                <div class="verticalAlign">
                                  <i class="fa fa-male"></i>
                                  <?= $this->lang->line('project-team') ?>
                                </div>
                              </div>
                            </a>

                            <div class=" col-lg-1 midBox hrColor hideBox"></div>

                            <div class=" col-lg-1 midBox hrColor hideBox"></div>

                      </div>
                      <!--  -->
                      <div class="col-lg-10 noSpaceSide floatRight">

                        <div class=" col-lg-1 midBox hrColor hideBox"></div>

                        <div class=" col-lg-1 midBox hrColor hideBox"></div>

                        <div class=" col-lg-1 midBox hrColor hideBox"></div>

                        <div class=" col-lg-1 midBox hrColor hideBox"></div>

                        <a href="<?= base_url("resources/team-performance-assessments/list/" . $project[0]->project_id) ?>">
                          <div class=" col-lg-1 midBox hrColor">
                            <div class="verticalAlign">
                              <i class="fa fa-male"></i>
                              <?= $this->lang->line('team-performance') ?>
                            </div>
                          </div>
                        </a>

                        <div class=" col-lg-1 midBox hrColor hideBox"></div>

                        <div class=" col-lg-1 midBox hrColor hideBox"></div>

                      </div>
                      <!--  -->
                      <div class="col-lg-10 noSpaceSide floatRight">

                        <div class=" col-lg-1 midBox hrColor hideBox"></div>

                        <div class=" col-lg-1 midBox hrColor hideBox"></div>

                        <div class=" col-lg-1 midBox hrColor hideBox"></div>

                        <div class=" col-lg-1 midBox hrColor hideBox"></div>

                        <a href="<?= base_url("Maintenance") ?>">
                          <div class=" col-lg-1 midBox disableColor">
                            <div class="verticalAlign">
                              <i class="fa fa-male"></i>
                              <?= $this->lang->line('enterprise-environment') ?>
                            </div>
                          </div>
                        </a>

                        <div class=" col-lg-1 midBox hrColor hideBox"></div>

                        <div class=" col-lg-1 midBox hrColor hideBox"></div>

                      </div>
                      <!--  -->
                      <!--  -->
                    </div>
                  </div>

                  <!-- [] -->

                  <div class="col-lg-12 wrapper noSpaceSide">
                    <div class="noSpaceSide">
                      <div class="col-lg-1 sideBox communicColor verticalOneBox">
                        <div class="verticalAlign">
                          <i class="glyphicon glyphicon-bullhorn"></i>
                          <?= $this->lang->line('communication') ?>
                        </div>
                      </div>

                      <div class="col-lg-10 noSpaceSide floatRight">

                        <div class=" col-lg-1 midBox communicColor hideBox"></div>

                        <a href="<?= base_url() ?>communication/communications-mp/list/<?php echo $project[0]->project_id; ?>">
                          <div class=" col-lg-1 midBox communicColor">
                            <div class="verticalAlign">
                              <i class="glyphicon glyphicon-bullhorn"></i>
                              <?= $this->lang->line('communication-management') ?>
                            </div>
                          </div>
                        </a>

                        <div class=" col-lg-1 midBox communicColor hideBox"></div>

                        <div class=" col-lg-1 midBox communicColor hideBox"></div>

                        <div class=" col-lg-1 midBox communicColor hideBox"></div>

                        <div class=" col-lg-1 midBox communicColor hideBox"></div>


                        <div class=" col-lg-1 midBox communicColor hideBox"></div>

                      </div>
                      <!--  -->
                    </div>
                  </div>

                  <!-- [] -->

                  <div class="col-lg-12 wrapper noSpaceSide">
                    <div class="noSpaceSide">
                      <div class="col-lg-1 sideBox riskColor verticalOneBox">
                        <div class="verticalAlign">
                          <i class="glyphicon glyphicon-exclamation-sign"></i>
                          <?= $this->lang->line('risk') ?>
                        </div>
                      </div>

                      <div class="col-lg-10 noSpaceSide floatRight">
                        <div class=" col-lg-1 midBox riskColor hideBox"></div>


                        <?php
                        $obj->load->model('Risk_mp_model');

                        if ($obj->Risk_mp_model->get($project[0]->project_id) == null) { ?>
                          <a href="<?= base_url("risk/risk-mp/new/" . $project[0]->project_id) ?>">
                          <?php } else { ?>
                            <a href="<?= base_url("risk/risk-mp/edit/" . $project[0]->project_id) ?>">
                            <?php   } ?>

                            <div class=" col-lg-1 midBox riskColor">
                              <div class="verticalAlign">
                                <i class="glyphicon glyphicon-exclamation-sign"></i>
                                <?= $this->lang->line('risk-management') ?>
                              </div>
                            </div>
                            </a>

                            <a href="<?= base_url("risk/risk-register/list/" . $project[0]->project_id) ?>">
                              <div class=" col-lg-1 midBox riskColor">
                                <div class="verticalAlign">
                                  <i class="glyphicon glyphicon-exclamation-sign"></i>
                                  <?= $this->lang->line('risk-register') ?>
                                </div>
                              </div>
                            </a>

                            <div class=" col-lg-1 midBox riskColor hideBox"></div>

                            <!-- <a href="<?= base_url("integration/issue-log/list/" . $project[0]->project_id) ?>">
                      <div class=" col-lg-1 midBox riskColor">
                        <div class="verticalAlign">
                          <i class="glyphicon glyphicon-exclamation-sign"></i>
                          <?= $this->lang->line('issues-record') ?>
                        </div>
                      </div>
                    </a> -->

                            <div class=" col-lg-1 midBox riskColor hideBox"></div>

                            <div class=" col-lg-1 midBox riskColor hideBox"></div>

                            <div class=" col-lg-1 midBox riskColor hideBox"></div>

                      </div>
                      <!--  -->
                    </div>
                  </div>

                  <!-- [] -->

                  <div class="col-lg-12 wrapper noSpaceSide">
                    <div class="noSpaceSide">
                      <div class="col-lg-1 sideBox procurementColor procurementBox">
                        <div class="verticalAlign">
                          <i class="glyphicon glyphicon-shopping-cart"></i>
                          <?= $this->lang->line('procurement') ?>
                        </div>
                      </div>

                      <div class="col-lg-10 noSpaceSide floatRight">

                        <div class=" col-lg-1 midBox procurementColor hideBox"></div>


                        <?php
                        $obj->load->model('Procurement_mp_model');

                        if ($obj->Procurement_mp_model->get($project[0]->project_id) == null) { ?>
                          <a href="<?= base_url("procurement/procurement-mp/new/" . $project[0]->project_id) ?>">
                          <?php } else { ?>
                            <a href="<?= base_url("procurement/procurement-mp/edit/" . $project[0]->project_id) ?>">
                            <?php   } ?>
                            <div class=" col-lg-1 midBox procurementColor">
                              <div class="verticalAlign">
                                <i class="glyphicon glyphicon-shopping-cart"></i>
                                <?= $this->lang->line('procurement-management') ?>
                              </div>
                            </div>
                            </a>

                            <div class=" col-lg-1 midBox procurementColor hideBox"></div>

                            <div class=" col-lg-1 midBox procurementColor hideBox"></div>

                            <a href="<?= base_url("Maintenance") ?>">
                              <div class=" col-lg-1 midBox disableColor">
                                <div class="verticalAlign">
                                  <i class="glyphicon glyphicon-shopping-cart"></i>
                                  <?= $this->lang->line('procurement-agreement') ?>
                                </div>
                              </div>
                            </a>

                            <a href="<?= base_url("procurement/closed-procurement-documentation/list/" . $project[0]->project_id) ?>">
                              <div class=" col-lg-1 midBox procurementColor">
                                <div class="verticalAlign">
                                <i class="glyphicon glyphicon-shopping-cart"></i>
                                  <?= $this->lang->line('closed-procurement-documentation') ?>
                                </div>
                              </div>
                            </a>

                            <div class=" col-lg-1 midBox procurementColor hideBox"></div>

                      </div>
                      <!--  -->
                      <div class="col-lg-10 noSpaceSide floatRight">

                        <div class=" col-lg-1 midBox procurementColor hideBox"></div>



                        <a href="<?= base_url("procurement/procurement-statement-of-work/list/" . $project[0]->project_id) ?>">
                          <div class=" col-lg-1 midBox procurementColor">
                            <div class="verticalAlign">
                              <i class="glyphicon glyphicon-shopping-cart"></i>
                              <?= $this->lang->line('procurement-statement') ?>
                            </div>
                          </div>
                        </a>


                        <div class=" col-lg-1 midBox procurementColor hideBox"></div>

                        <div class=" col-lg-1 midBox procurementColor hideBox"></div>

                        <div class=" col-lg-1 midBox procurementColor hideBox"></div>


                        <div class=" col-lg-1 midBox procurementColor hideBox"></div>

                        <div class=" col-lg-1 midBox procurementColor hideBox"></div>

                      </div>
                      <!--  -->
                    </div>
                  </div>

                  <!-- [] -->

                  <div class="col-lg-12 wrapper noSpaceSide">
                    <div class="noSpaceSide">
                      <div class="col-lg-1 sideBox stakeholderColor stakeholderBox">
                        <div class="verticalAlign">
                          <i class="fa fa-users"></i>
                          <?= $this->lang->line('stakeholder') ?>
                        </div>
                      </div>

                      <div class="col-lg-10 noSpaceSide floatRight">
                        <a href="<?= base_url("stakeholder/stakeholder-register/list/" . $project[0]->project_id) ?>">
                          <div class=" col-lg-1 midBox stakeholderColor">
                            <div class="verticalAlign">
                              <i class="fa fa-users"></i>
                              <?= $this->lang->line('stakeholder-register') ?>
                            </div>
                          </div>
                        </a>

                        <a href="<?= base_url("stakeholder/stakeholder-engagement-plan/list/" . $project[0]->project_id) ?>">
                          <div class=" col-lg-1 midBox stakeholderColor">
                            <div class="verticalAlign">
                              <i class="fa fa-users"></i>
                              <?= $this->lang->line('stakeholder-management') ?>
                            </div>
                          </div>
                        </a>

                        <div class=" col-lg-1 midBox stakeholderColor hideBox"></div>

                        <div class=" col-lg-1 midBox stakeholderColor hideBox"></div>
                        <div class=" col-lg-1 midBox stakeholderColor hideBox"></div>

                        <!-- <a href="<?= base_url("integration/issue-log/list/" . $project[0]->project_id) ?>">
                      <div class=" col-lg-1 midBox stakeholderColor">
                        <div class="verticalAlign">
                          <i class="fa fa-users"></i>
                          <?= $this->lang->line('issue-log') ?>
                        </div>
                      </div>
                    </a> -->

                        <div class=" col-lg-1 midBox stakeholderColor hideBox"></div>


                        <div class=" col-lg-1 midBox stakeholderColor hideBox"></div>

                      </div>
                      <!--  -->
                      <div class="col-lg-10 noSpaceSide floatRight">

                        <div class=" col-lg-1 midBox stakeholderColor hideBox"></div>

                        <div class=" col-lg-1 midBox stakeholderColor hideBox"></div>

                        <div class=" col-lg-1 midBox stakeholderColor hideBox"></div>

                        <div class=" col-lg-1 midBox stakeholderColor hideBox"></div>

                        <div class=" col-lg-1 midBox stakeholderColor hideBox"></div>

                        <div class=" col-lg-1 midBox stakeholderColor hideBox"></div>

                        <div class=" col-lg-1 midBox stakeholderColor hideBox"></div>

                      </div>
                      <!--  -->
                    </div>
                  </div> <!-- End Body Phases -->



                  <div class="col-md-12 noSpaceSide ">
                    <div class="col-lg-12 wrapper noSpaceSide">
                      <a class="btn btn-warning btn-lg btn-block" href="<?= base_url() ?>notification-board/list/<?php echo $project[0]->project_id; ?>">
                        <i class="glyphicon glyphicon-blackboard"></i>
                        <?= $this->lang->line('notification-board') ?>
                      </a>
                    </div>
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
<?php $this->load->view('frame/footer_view') ?>
