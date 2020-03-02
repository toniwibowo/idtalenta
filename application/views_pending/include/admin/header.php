<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <?php
  foreach($css_files as $file): ?>
  <link type="text/css" rel="stylesheet" href="<?php echo $file; ?>" />
  <?php endforeach; ?>

	<title>TBI Administrator</title>

	<link rel="icon" href="<?php echo base_url() ?>images/favicon.png" type="image/x-icon">

  <link type="text/css" rel="stylesheet" href="<?php echo base_url() ?>assets/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/dist/css/font-awesome.min.css">
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/dist/css/ionicons.min.css">
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/dist/css/AdminLTE.min.css">
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/dist/css/skins/_all-skins.min.css">
	<?php if ($this->uri->segment(2) == 'menu'): ?>
		<?php
		$css_plugins = [base_url('assets/plugins/jquery-nestable/jquery.nestable.css')];
		$js_plugins = [base_url('assets/plugins/jquery-nestable/jquery.nestable.js')];
		?>
		<?php foreach ($css_plugins as $key => $css): ?>
			<link rel="stylesheet" type="text/css" href="<?php echo $css ?>">
		<?php endforeach; ?>
	<?php endif; ?>
  <!-- Morris chart -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/dist/css/morris.css">
  <!-- jvectormap -->
  <!-- <link rel="stylesheet" href="<?php echo base_url() ?>assets/bower_components/jvectormap/jquery-jvectormap.css"> -->
  <!-- Date Picker -->
  <!-- <link rel="stylesheet" href="<?php echo base_url() ?>assets/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css"> -->
  <!-- Daterange picker -->
  <!-- <link rel="stylesheet" href="<?php echo base_url() ?>assets/bower_components/bootstrap-daterangepicker/daterangepicker.css"> -->
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

	<!-- jQuery 3 -->
	<script src="<?php echo base_url() ?>assets/grocery_crud/js/jquery-1.11.1.min.js"></script>
  <!-- <script src="<?php echo base_url() ?>assets/bower_components/jquery/dist/jquery.min.js"></script> -->

	<?php if ($this->uri->segment(2) == 'menu'): ?>
		<?php foreach ($js_plugins as $key => $js): ?>
			<script type="text/javascript" src="<?php echo $js ?>"></script>
		<?php endforeach; ?>
	<?php endif; ?>

</head>
<body class="hold-transition skin-blue sidebar-mini">

  <div class="wrapper">

    <header class="main-header">
      <!-- Logo -->
      <a href="<?php echo site_url('admin') ?>" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><b>TBI</b></span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg"><b>TBI</b>Administrator</span>
      </a>
      <!-- Header Navbar: style can be found in header.less -->
      <nav class="navbar navbar-static-top">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
          <span class="sr-only">Toggle navigation</span>
        </a>

        <div class="navbar-custom-menu">
          <ul class="nav navbar-nav">
            <!-- Messages: style can be found in dropdown.less-->
            <li class="dropdown messages-menu hidden">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <i class="fa fa-envelope-o"></i>
                <span class="label label-success">4</span>
              </a>
              <ul class="dropdown-menu">
                <li class="header">You have 4 messages</li>
                <li>
                  <!-- inner menu: contains the actual data -->
                  <ul class="menu">
                    <li><!-- start message -->
                      <a href="#">
                        <div class="pull-left">
                          <img src="<?php echo base_url() ?>assets/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
                        </div>
                        <h4>
                          Support Team
                          <small><i class="fa fa-clock-o"></i> 5 mins</small>
                        </h4>
                        <p>Why not buy a new awesome theme?</p>
                      </a>
                    </li>
                    <!-- end message -->
                    <li>
                      <a href="#">
                        <div class="pull-left">
                          <img src="<?php echo base_url() ?>assets/dist/img/user3-128x128.jpg" class="img-circle" alt="User Image">
                        </div>
                        <h4>
                          AdminLTE Design Team
                          <small><i class="fa fa-clock-o"></i> 2 hours</small>
                        </h4>
                        <p>Why not buy a new awesome theme?</p>
                      </a>
                    </li>
                    <li>
                      <a href="#">
                        <div class="pull-left">
                          <img src="<?php echo base_url() ?>assets/dist/img/user4-128x128.jpg" class="img-circle" alt="User Image">
                        </div>
                        <h4>
                          Developers
                          <small><i class="fa fa-clock-o"></i> Today</small>
                        </h4>
                        <p>Why not buy a new awesome theme?</p>
                      </a>
                    </li>
                    <li>
                      <a href="#">
                        <div class="pull-left">
                          <img src="<?php echo base_url() ?>assets/dist/img/user3-128x128.jpg" class="img-circle" alt="User Image">
                        </div>
                        <h4>
                          Sales Department
                          <small><i class="fa fa-clock-o"></i> Yesterday</small>
                        </h4>
                        <p>Why not buy a new awesome theme?</p>
                      </a>
                    </li>
                    <li>
                      <a href="#">
                        <div class="pull-left">
                          <img src="<?php echo base_url() ?>assets/dist/img/user4-128x128.jpg" class="img-circle" alt="User Image">
                        </div>
                        <h4>
                          Reviewers
                          <small><i class="fa fa-clock-o"></i> 2 days</small>
                        </h4>
                        <p>Why not buy a new awesome theme?</p>
                      </a>
                    </li>
                  </ul>
                </li>
                <li class="footer"><a href="#">See All Messages</a></li>
              </ul>
            </li>
            <!-- Notifications: style can be found in dropdown.less -->
            <li class="dropdown notifications-menu hidden">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <i class="fa fa-bell-o"></i>
                <span class="label label-warning">10</span>
              </a>
              <ul class="dropdown-menu">
                <li class="header">You have 10 notifications</li>
                <li>
                  <!-- inner menu: contains the actual data -->
                  <ul class="menu">
                    <li>
                      <a href="#">
                        <i class="fa fa-users text-aqua"></i> 5 new members joined today
                      </a>
                    </li>
                    <li>
                      <a href="#">
                        <i class="fa fa-warning text-yellow"></i> Very long description here that may not fit into the
                        page and may cause design problems
                      </a>
                    </li>
                    <li>
                      <a href="#">
                        <i class="fa fa-users text-red"></i> 5 new members joined
                      </a>
                    </li>
                    <li>
                      <a href="#">
                        <i class="fa fa-shopping-cart text-green"></i> 25 sales made
                      </a>
                    </li>
                    <li>
                      <a href="#">
                        <i class="fa fa-user text-red"></i> You changed your username
                      </a>
                    </li>
                  </ul>
                </li>
                <li class="footer"><a href="#">View all</a></li>
              </ul>
            </li>
            <!-- Tasks: style can be found in dropdown.less -->
            <li class="dropdown tasks-menu hidden">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <i class="fa fa-flag-o"></i>
                <span class="label label-danger">9</span>
              </a>
              <ul class="dropdown-menu">
                <li class="header">You have 9 tasks</li>
                <li>
                  <!-- inner menu: contains the actual data -->
                  <ul class="menu">
                    <li><!-- Task item -->
                      <a href="#">
                        <h3>
                          Design some buttons
                          <small class="pull-right">20%</small>
                        </h3>
                        <div class="progress xs">
                          <div class="progress-bar progress-bar-aqua" style="width: 20%" role="progressbar"
                               aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                            <span class="sr-only">20% Complete</span>
                          </div>
                        </div>
                      </a>
                    </li>
                    <!-- end task item -->
                    <li><!-- Task item -->
                      <a href="#">
                        <h3>
                          Create a nice theme
                          <small class="pull-right">40%</small>
                        </h3>
                        <div class="progress xs">
                          <div class="progress-bar progress-bar-green" style="width: 40%" role="progressbar"
                               aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                            <span class="sr-only">40% Complete</span>
                          </div>
                        </div>
                      </a>
                    </li>
                    <!-- end task item -->
                    <li><!-- Task item -->
                      <a href="#">
                        <h3>
                          Some task I need to do
                          <small class="pull-right">60%</small>
                        </h3>
                        <div class="progress xs">
                          <div class="progress-bar progress-bar-red" style="width: 60%" role="progressbar"
                               aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                            <span class="sr-only">60% Complete</span>
                          </div>
                        </div>
                      </a>
                    </li>
                    <!-- end task item -->
                    <li><!-- Task item -->
                      <a href="#">
                        <h3>
                          Make beautiful transitions
                          <small class="pull-right">80%</small>
                        </h3>
                        <div class="progress xs">
                          <div class="progress-bar progress-bar-yellow" style="width: 80%" role="progressbar"
                               aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                            <span class="sr-only">80% Complete</span>
                          </div>
                        </div>
                      </a>
                    </li>
                    <!-- end task item -->
                  </ul>
                </li>
                <li class="footer">
                  <a href="#">View all tasks</a>
                </li>
              </ul>
            </li>
            <!-- User Account: style can be found in dropdown.less -->
						<?php $user = $this->ion_auth->user()->row(); ?>
            <li class="dropdown user user-menu">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
								<?php if ($user->photo == ''): ?>
									<img src="<?php echo base_url() ?>images/tosstb.png" class="user-image" alt="User Image">
								<?php else: ?>
									<img src="<?php echo base_url('assets/uploads/images').'/'.$user->photo ?>" class="user-image" alt="User Image">
								<?php endif; ?>

                <span class="hidden-xs"><?php echo $user->full_name == '' ? $user->first_name.$user->last_name : $user->full_name ?></span>
              </a>
              <ul class="dropdown-menu">
                <!-- User image -->
                <li class="user-header">

									<?php if ($user->photo == ''): ?>
										<img src="<?php echo base_url() ?>images/tosstb.png" class="img-circle" alt="User Image">
									<?php else: ?>
										<img src="<?php echo base_url('assets/uploads/images').'/'.$user->photo ?>" class="img-circle" alt="User Image">
									<?php endif; ?>

                  <p>
                    <?php echo $user->full_name == '' ? $user->first_name.$user->last_name : $user->full_name ?>
                    <!-- <small>Member since Nov. 2012</small> -->
                  </p>
                </li>
                <!-- Menu Body -->
                <li class="user-body">
                  <div class="row hidden">
                    <div class="col-xs-4 text-center">
                      <a href="#">Followers</a>
                    </div>
                    <div class="col-xs-4 text-center">
                      <a href="#">Sales</a>
                    </div>
                    <div class="col-xs-4 text-center">
                      <a href="#">Friends</a>
                    </div>
                  </div>
                  <!-- /.row -->
                </li>
                <!-- Menu Footer-->
                <li class="user-footer">
                  <div class="pull-left">
                    <a href="#" class="btn btn-default btn-flat">Profile</a>
                  </div>
                  <div class="pull-right">
                    <a href="<?php echo site_url('admin/auth/logout') ?>" class="btn btn-default btn-flat">Sign out</a>
                  </div>
                </li>
              </ul>
            </li>
            <!-- Control Sidebar Toggle Button -->
            <li class="hidden">
              <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
            </li>
          </ul>
        </div>
      </nav>
    </header>

    <!-- Left side column. contains the logo and sidebar -->
    <aside class="main-sidebar">
      <!-- sidebar: style can be found in sidebar.less -->
      <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
          <div class="pull-left image">
						<?php if ($user->photo == ''): ?>
							<img src="<?php echo base_url() ?>images/tosstb.png" class="img-circle" alt="User Image">
						<?php else: ?>
							<img src="<?php echo base_url('assets/uploads/images').'/'.$user->photo ?>" class="img-circle" alt="User Image">
						<?php endif; ?>
          </div>
          <div class="pull-left info">
            <p><?php echo $user->full_name == '' ? $user->first_name.$user->last_name : $user->full_name ?></p>
            <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
          </div>
        </div>
        <!-- search form -->
        <form action="#" method="get" class="sidebar-form hidden">
          <div class="input-group">
            <input type="text" name="q" class="form-control" placeholder="Search...">
            <span class="input-group-btn">
                  <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                  </button>
                </span>
          </div>
        </form>
        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
				<ul class="sidebar-menu tree" data-widget="tree">
						<?php $menus = $this->gravenza_view->get_menu() ?>

						<?php

					 // print_r($menus);

						?>
						<?php foreach ($menus as $menu): ?>
								<li class="header"><?php echo $menu['label'] ?></li>
								<?php if (is_array($menu['children'])): ?>
										<?php foreach ($menu['children'] as $menu2): ?>
												<li <?php echo $menu2['attr'] != '' ? ' id="'.$menu2['attr'].'" ' : '' ?> <?php echo is_array($menu2['children']) ? ' class="treeview" ' : '' ?>>
														<?php if (is_array($menu2['children'])): ?>
														<a href="<?php echo $menu2['link'] != '#' ? base_url($menu2['link']) : '#' ?>" class="name">
																<i class="fa fa-<?php echo $menu2['icon'] ?>"></i> <span><?php echo $menu2['label'] ?>
																</span><i class="fa fa-angle-left pull-right"></i>
														</a>
														<ul class="treeview-menu">
																<?php foreach ($menu2['children'] as $menu3): ?>
																		<li class="<?php echo activate_menu('users'); ?>" <?php echo $menu3['attr'] != '' ? ' id="'.$menu3['attr'].'" ' : '' ?>>
																				<a href="<?php echo $menu3['link'] != '#' ? base_url($menu3['link']) : '#' ?>" class="name">
																						<i class="fa fa-<?php echo $menu3['icon'] ?>"></i> <span><?php echo $menu3['label'] ?></span>
																				</a>
																		</li>
																<?php endforeach ?>
														</ul>
														<?php else: ?>
														<a href="<?php echo $menu2['link'] != '#' ? base_url($menu2['link']) : '#' ?>" class="name">
																<i class="fa fa-<?php echo $menu2['icon'] ?>"></i> <span><?php echo $menu2['label'] ?>
														</a>
														<?php endif ?>
												</li>
										<?php endforeach ?>
								<?php endif ?>
						<?php endforeach ?>
				</ul>
      </section>
      <!-- /.sidebar -->
    </aside>
