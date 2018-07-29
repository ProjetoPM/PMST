            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li>
                            <a href="<?=base_url()?>"><i class="fa fa-home fa-fw"></i> Dashboard</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-folder fa-fw"></i> Projects<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li> <a href="<?=base_url('project/project_form')?>">&raquo; New Project</a> </li>
                                <li> <a href="<?=base_url('project/show_projects')?>">&raquo; My Projects</a> </li>
                            </ul>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-folder fa-fw"></i> SMP<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li> <a href="<?=base_url('stakeholder/stakeholder_form')?>">&raquo; New Stakeholder</a> </li>
                                <li> <a href="<?=base_url('Stakeholder/show_stakeholders')?>">&raquo; Stakeholders</a> </li>
                            </ul>
                        </li>
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>