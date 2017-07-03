    <nav class="nav navbar-static-side col-lg-2 pull-right" role="navigation">
        <div class="sidebar-collapse">
            <ul class="nav metismenu" id="side-menu">
                <li class="nav-header">
                    <div class="dropdown profile-element">
                        <span>
                        <!--<img alt="image" class="img-circle" src="admin/images/profile.jpg">-->
                         </span>
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <span class="clear"> 
                                <span class="block m-t-xs">
                                    <strong class="font-bold">Ngga WT</strong>
                                </span>
                                <span class="text-muted text-xs block">Art Director <b class="caret"></b></span>
                            </span>
                        </a>
                        <ul id="dropdown" class="dropdown-menu animated fadeInRight m-t-xs">
                            <li><a href="profile.html">Profile</a></li>
                            <li><a href="contacts.html">Contacts</a></li>
                            <li><a href="mailbox.html">Mailbox</a></li>
                            <li class="divider"></li>
                            <li><a href="login.html">Logout</a></li>
                        </ul>
                    </div>
                    <div class="logo-element">
                        IN+
                    </div>
                </li>
                
                <li class="active">
                    <a href="#" data-toggle="collapse" data-target="#dashboard">
                        <i class="fa fa-th-large"></i> <span class="nav-label">
                            דשבורד
                        </span> 
                        <span class="fa caret"></span>
                    </a>
                    <ul id="dashboard" class="nav nav-second-level collapse in">
                        <li class="active"><a href="{{ route('admin') }}">דשבורד v.1</a></li>
                        <li><a href="dashboard_2.html">דשבורד  v.2</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#" data-toggle='collapse' data-target='#blog'>
                        <i class="fa fa-envelope"></i> <span class="nav-label">
                            בלוג
                        </span>
                        <span class="label label-warning pull-left">24</span>
                        <span class="fa caret"></span>
                    </a>
                    <ul id="blog" class="nav nav-second-level collapse">
                        <li><a href="#">הצג כל הפוסטים</a></li>
                        <li><a href="#">ערוך פוסט</a></li>
                        <li><a href="#">צור פוסט</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#" data-toggle='collapse' data-target='#dropDown'>
                        <i class="fa fa-envelope"></i> <span class="nav-label">משתמשים 
                        </span>
                        <span class="label label-warning pull-left">16/24</span>
                        <span class="fa caret"></span>
                    </a>
                    <ul id="dropDown" class="nav nav-second-level collapse">
                        <li><a href="{{ route('users.index') }}">כל המשמשים</a></li>
                        <li><a href="#">Inbox</a></li>
                        <li><a href="#">Email view</a></li>
                        <li><a href="#">Compose email</a></li>
                        <li><a href="#">Email templates</a></li>
                    </ul>
                </li>
                <li>
                    <a href="metrics.html"><i class="fa fa-pie-chart"></i> <span class="nav-label">קטגוריות</span>  </a>
                </li>
                <li>
                    <a href="widgets.html"><i class="fa fa-flask"></i> <span class="nav-label">Widgets</span></a>
                </li>
                <li>
                    <a href="#" data-toggle='collapse' data-target='#formToggle'>
                        <i class="fa fa-edit"></i> 
                        <span class="nav-label">Forms</span>
                        <span class="fa caret"></span></a>
                    <ul id="formToggle" class="nav nav-second-level collapse">
                        <li><a href="form_basic.html">Basic form</a></li>
                        <li><a href="form_advanced.html">Advanced Plugins</a></li>
                        <li><a href="form_wizard.html">Wizard</a></li>
                        <li><a href="form_file_upload.html">File Upload</a></li>
                        <li><a href="form_editors.html">Text Editor</a></li>
                        <li><a href="form_autocomplete.html">Autocomplete</a></li>
                        <li><a href="form_markdown.html">Markdown</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#" data-toggle='collapse' data-target='#appView'>
                        <i class="fa fa-desktop"></i> 
                        <span class="nav-label">App Views</span>
                        <span class="pull-left label label-primary">SPECIAL</span>
                        <span class="fa caret"></span>
                    </a>
                    <ul id="appView" class="nav nav-second-level collapse">
                        <li><a href="contacts.html">Contacts</a></li>
                        <li><a href="activity_stream.html">Activity stream</a></li>
                        <li><a href="clients.html">Clients</a></li>
                        <li><a href="file_manager.html">File manager</a></li>
                        <li><a href="calendar.html">Calendar</a></li>
                        <li><a href="issue_tracker.html">Issue tracker</a></li>
                        <li><a href="article.html">Article</a></li>
                        <li><a href="timeline.html">Timeline</a></li>
                        <li><a href="pin_board.html">Pin board</a></li>
                    </ul>
                </li>
                <li>
                    <a href="grid_options.html"><i class="fa fa-laptop"></i> <span class="nav-label">Grid options</span></a>
                </li>
                <li>
                    <a href="#"><i class="fa fa-table"></i> <span class="nav-label">Tables</span><span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level collapse">
                        <li><a href="table_basic.html">Static Tables</a></li>
                        <li><a href="table_data_tables.html">Data Tables</a></li>
                        <li><a href="table_foo_table.html">Foo Tables</a></li>
                        <li><a href="jq_grid.html">jqGrid</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#"><i class="fa fa-picture-o"></i> <span class="nav-label">Gallery</span><span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level collapse">
                        <li><a href="basic_gallery.html">Lightbox Gallery</a></li>
                        <li><a href="slick_carousel.html">Slick Carousel</a></li>
                        <li><a href="carousel.html">Bootstrap Carousel</a></li>

                    </ul>
                </li>

                <li class="landing_link">
                    <a target="_blank" href="landing.html"><i class="fa fa-star"></i> <span class="nav-label">Landing Page</span> <span class="label label-warning pull-left">NEW</span></a>
                </li>
                <li class="special_link">
                    <a href="#"><i class="fa fa-database"></i> <span class="nav-label">Package</span></a>
                </li>
            </ul>

        </div>
    </nav>
