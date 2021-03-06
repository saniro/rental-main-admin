<!-- Navigation -->
<nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="index?route=dashboard"><img style="display:inline-block;margin-right:5px;" src="img/apicon.png" class="fa-fw"><?php echo $_SESSION['name'];?></a>
    </div>
    <!-- /.navbar-header -->

    <ul class="nav navbar-top-links navbar-right">
        <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                <i class="fa fa-bell fa-fw"></i> <i class="fa fa-caret-down"></i>
            </a>
            <ul class="dropdown-menu dropdown-alerts">
                <li>
                    <a href="#">
                        <div>
                            <i class="fa fa-bell fa-fw"></i> New Comment
                            <span class="pull-right text-muted small">4 minutes ago</span>
                        </div>
                    </a>
                </li>
                <li class="divider"></li>
                <li>
                    <a href="#">
                        <div>
                            <i class="fa fa-bell fa-fw"></i> 3 New Followers
                            <span class="pull-right text-muted small">12 minutes ago</span>
                        </div>
                    </a>
                </li>
                <li class="divider"></li>
                <li>
                    <a class="text-center" href="index?route=notifications">
                        <strong>See All Alerts</strong>
                        <i class="fa fa-angle-right"></i>
                    </a>
                </li>
            </ul>
            <!-- /.dropdown-alerts -->
        </li>
        <!-- /.dropdown -->
        <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
            </a>
            <ul class="dropdown-menu dropdown-user">
                <li><a href="#"><i class="fa fa-user fa-fw"></i> User Profile</a>
                </li>
                <li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>
                </li>
                <li class="divider"></li>
                <li><a href="index?route=logout"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                </li>
            </ul>
            <!-- /.dropdown-user -->
        </li>
        <!-- /.dropdown -->
    </ul>
    <!-- /.navbar-top-links -->

    <div class="navbar-default sidebar" role="navigation">
        <div class="sidebar-nav navbar-collapse">
            <ul class="nav" id="side-menu">
                <li class="sidebar-search">
                    <div class="input-group custom-search-form">
                    <img style="display:inline-block;margin-right:5px;width:13%;height:8%;" src="users/default-profile-picture.png" class="fa-fw">
					<label style="text-align:center;">ADMINISTRATOR</label>
                    </div>
                    <!-- /input-group -->
                </li>
                <li>
                    <a href="index?route=dashboard"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                </li>
                <li>
                    <a href="index?route=applicants"><i class="fa fa-plus-square fa-fw"></i> Host Applicants</a>
                </li>
                <li>
                    <a href="index?route=applyhouses"><i class="fa fa-home fa-fw"></i> Apartment Applications</a>
                </li>
                <li>
                    <a href="#"><i class="fa fa-group fa-fw"></i> Hosts<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="index?route=ahosts">Current Hosts</a>
                        </li>
                        <li>
                            <a href="index?route=rhosts">Rejected Hosts</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#"><i class="fa fa-home fa-fw"></i> Apartments<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="index?route=ahouses">Current Apartments</a>
                        </li>
                        <li>
                            <a href="index?route=rhouses">Rejected Apartments</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="index?route=notifications"><i class="fa fa-bell fa-fw"></i> Notifications</a>
                </li>
            </ul>
        </div>
        <!-- /.sidebar-collapse -->
    </div>
    <!-- /.navbar-static-side -->
</nav>