<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="apple-touch-icon" sizes="57x57" href="<?php echo base_url()?>assets/images/icon/-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="<?php echo base_url()?>assets/images/icon/-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="<?php echo base_url()?>assets/images/icon/-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="<?php echo base_url()?>assets/images/icon/-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="<?php echo base_url()?>assets/images/icon/-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="<?php echo base_url()?>assets/images/icon/-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="<?php echo base_url()?>assets/images/icon/-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="<?php echo base_url()?>assets/images/icon/-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="<?php echo base_url()?>assets/images/icon/-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192"  href="/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="<?php echo base_url()?>assets/images/icon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="<?php echo base_url()?>assets/images/icon/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo base_url()?>assets/images/icon/favicon-16x16.png">
    <link rel="manifest" href="<?php echo base_url()?>assets/images/icon/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">
    <title>Arnawasys</title>
    <!-- Custom CSS -->
    <link href="<?php echo base_url();?>assets/libs/chartist/dist/chartist.min.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/extra-libs/c3/c3.min.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/libs/morris.js/morris.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="<?php echo base_url();?>assets/dist/css/style.min.css" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body>
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <header class="topbar">
            <nav class="navbar top-navbar navbar-expand-md navbar-dark">
                <div class="navbar-header">
                    <!-- This is for the sidebar toggle which is visible on mobile only -->
                    <a class="nav-toggler waves-effect waves-light d-block d-md-none" href="javascript:void(0)">
                        <i class="ti-menu ti-close"></i>
                    </a>
                    <!-- ============================================================== -->
                    <!-- Logo -->
                    <!-- ============================================================== -->
                    <a class="navbar-brand" href="#">
                        <!-- Logo icon -->
                        <b class="logo-icon">
                            <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
                            <!-- Dark Logo icon -->
                            <img src="<?php echo base_url();?>assets/images/arnawa-logo-putih.png" alt="homepage" class="dark-logo" />
                            <!-- Light Logo icon -->
                            <img src="<?php echo base_url();?>assets/images/arnawa-logo-putih.png" alt="homepage" class="light-logo"  style="width:75%;" />
                        </b>
                        <!--End Logo icon -->
                        <!-- Logo text -->
                        <!--  -->
                    </a>
                    <!-- ============================================================== -->
                    <!-- End Logo -->
                    <!-- ============================================================== -->
                    <!-- ============================================================== -->
                    <!-- Toggle which is visible on mobile only -->
                    <!-- ============================================================== -->
                    <a class="topbartoggler d-block d-md-none waves-effect waves-light" href="javascript:void(0)" data-toggle="collapse" data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="ti-more"></i>
                </a>
            </div>
            <!-- ============================================================== -->
            <!-- End Logo -->
            <!-- ============================================================== -->
            <div class="navbar-collapse collapse" id="navbarSupportedContent">
                <!-- ============================================================== -->
                <!-- toggle and nav items -->
                <!-- ============================================================== -->
                <ul class="navbar-nav float-left mr-auto">
                    <li class="nav-item d-none d-md-block">
                        <a class="nav-link sidebartoggler waves-effect waves-light" href="javascript:void(0)" data-sidebartype="mini-sidebar">
                            <i class="sl-icon-menu font-20"></i>
                        </a>
                    </li>
                    <!-- ============================================================== -->
                    <!-- mega menu -->
                    <!-- ============================================================== -->
                    <li class="nav-item dropdown mega-dropdown">
                        <a class="nav-link dropdown-toggle waves-effect waves-dark" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="ti-gift font-20"></i>
                        </a>
                    </li>
                    <!-- ============================================================== -->
                    <!-- End mega menu -->
                    <!-- ============================================================== -->
                    <!-- ============================================================== -->
                    <!-- Comment -->
                    <!-- ============================================================== -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle waves-effect waves-dark" href="#" aria-haspopup="true" aria-expanded="false">
                            <i class="ti-bell font-20"></i>

                        </a>
                    </li>
                    <!-- ============================================================== -->
                    <!-- End Comment -->
                    <!-- ============================================================== -->
                    <!-- ============================================================== -->
                    <!-- Messages -->
                    <!-- ============================================================== -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle waves-effect waves-dark" href="#" id="2" aria-haspopup="true" aria-expanded="false">
                            <i class="font-20 ti-email"></i>

                        </a>
                    </li>
                    <!-- ============================================================== -->
                    <!-- End Messages -->
                    <!-- ============================================================== -->


                </ul>
                <!-- ============================================================== -->
                <!-- Right side toggle and nav items -->
                <!-- ============================================================== -->
                <ul class="navbar-nav float-right">
                    <!-- ============================================================== -->
                    <!-- Search -->
                    <!-- ============================================================== -->
                    <li class="nav-item search-box">
                        <a class="nav-link waves-effect waves-dark" href="javascript:void(0)">
                            <i class="ti-search font-16"></i>
                        </a>
                        <form class="app-search position-absolute">
                            <input type="text" class="form-control" placeholder="Search &amp; enter">
                            <a class="srh-btn">
                                <i class="ti-close"></i>
                            </a>
                        </form>
                    </li>
                    <!-- ============================================================== -->
                    <!-- create new -->
                    <!-- ============================================================== -->

                    <!-- ============================================================== -->
                    <!-- User profile and search -->
                    <!-- ============================================================== -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark pro-pic" href="" data-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false">
                        <img src="<?php echo base_url();?>assets/images/users/1.jpg" alt="user" class="rounded-circle" width="31">
                    </a>
                    <div class="dropdown-menu dropdown-menu-right user-dd animated flipInY">
                        <span class="with-arrow">
                            <span class="bg-primary"></span>
                        </span>
                        <div class="d-flex no-block align-items-center p-15 bg-primary text-white m-b-10">
                            <div class="">
                                <img src="<?php echo base_url();?>assets/images/users/1.jpg" alt="user" class="img-circle" width="60">
                            </div>
                            <div class="m-l-10">
                                <h4 class="m-b-0"><?php echo $data_akun->nama_akun?></h4>
                                <p class=" m-b-0"><?php echo $data_akun->email_akun?></p>
                            </div>
                        </div>
                        <a class="dropdown-item" href="javascript:void(0)">
                            <i class="ti-user m-r-5 m-l-5"></i> My Profile</a>
                            <a class="dropdown-item" href="javascript:void(0)">
                                <i class="ti-wallet m-r-5 m-l-5"></i> My Balance</a>
                                <a class="dropdown-item" href="javascript:void(0)">
                                    <i class="ti-email m-r-5 m-l-5"></i> Inbox</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="javascript:void(0)">
                                        <i class="ti-settings m-r-5 m-l-5"></i> Account Setting</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="<?php echo site_url('LoginC/log_out')?>">
                                            <i class="fa fa-power-off m-r-5 m-l-5"></i> Logout</a>
                                            <div class="dropdown-divider"></div>
                                            <div class="p-l-30 p-10">
                                                <a href="javascript:void(0)" class="btn btn-sm btn-success btn-rounded">View Profile</a>
                                            </div>
                                        </div>
                                    </li>
                                    <!-- ============================================================== -->
                                    <!-- User profile and search -->
                                    <!-- ============================================================== -->
                                </ul>
                            </div>
                        </nav>
                    </header>
                    <!-- ============================================================== -->
                    <!-- End Topbar header -->
                    <!-- ============================================================== -->
                    <!-- ============================================================== -->
                    <!-- Left Sidebar - style you can find in sidebar.scss  -->
                    <!-- ============================================================== -->
                    <aside class="left-sidebar">
                        <!-- Sidebar scroll-->
                        <div class="scroll-sidebar">
                            <!-- Sidebar navigation-->
                            <nav class="sidebar-nav">
                                <ul id="sidebarnav">
                                    <!-- User Profile-->
                                    <li>
                                        <!-- User Profile-->
                                        <div class="user-profile dropdown m-t-20">
                                            <div class="user-pic">
                                                <img src="<?php echo base_url();?>assets/images/users/1.jpg" alt="users" class="rounded-circle img-fluid" />
                                            </div>
                                            <div class="user-content hide-menu m-t-10">
                                                <h5 class="m-b-10 user-name font-medium"><?php echo $data_akun->nama_akun?></h5>
                                                <a href="javascript:void(0)" class="btn btn-circle btn-sm m-r-5" id="Userdd" role="button" data-toggle="dropdown" aria-haspopup="true"
                                                aria-expanded="false">
                                                <i class="ti-settings"></i>
                                            </a>
                                            <a href="<?php echo site_url('LoginC/log_out')?>" title="Logout" class="btn btn-circle btn-sm">
                                                <i class="ti-power-off"></i>
                                            </a>
                                            <div class="dropdown-menu animated flipInY" aria-labelledby="Userdd">
                                                <a class="dropdown-item" href="javascript:void(0)">
                                                    <i class="ti-user m-r-5 m-l-5"></i> My Profile</a>
                                                    <a class="dropdown-item" href="javascript:void(0)">
                                                        <i class="ti-wallet m-r-5 m-l-5"></i> My Balance</a>
                                                        <a class="dropdown-item" href="javascript:void(0)">
                                                            <i class="ti-email m-r-5 m-l-5"></i> Inbox</a>
                                                            <div class="dropdown-divider"></div>
                                                            <a class="dropdown-item" href="<?php echo site_url('LoginC/log_out')?>">
                                                                <i class="ti-settings m-r-5 m-l-5"></i> Account Setting</a>
                                                                <div class="dropdown-divider"></div>
                                                                <a class="dropdown-item" href="javascript:void(0)">
                                                                    <i class="fa fa-power-off m-r-5 m-l-5"></i> Logout</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- End User Profile-->
                                                    </li>
                                                    <!-- User Profile-->
                       <!--  <li class="nav-small-cap">
                            <i class="mdi mdi-dots-horizontal"></i>
                            <span class="hide-menu">Dashboard</span>
                        </li> -->
                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="#" aria-expanded="false">
                                <i class="ti-dashboard"></i>
                                <span class="hide-menu">Dashboards </span>
                            </a>
                        </li>
                        <li class="nav-small-cap">
                            <i class="mdi mdi-dots-horizontal"></i>
                            <span class="hide-menu">Fitur</span>
                        </li>
                        <?php
                        if($data_akun->jenis_usaha == "koperasi"){
                           ?>     
                           <li class="sidebar-item">
                            <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false">
                                <i class="ti-money"></i>
                                <span class="hide-menu">Simpan Pinjam </span>
                            </a>
                            <ul aria-expanded="false" class="collapse  first-level">
                                <li class="sidebar-item">
                                    <a href="#" class="sidebar-link">
                                        <i class="mdi mdi-email-alert"></i>
                                        <span class="hide-menu"> Permintaan Modul </span>
                                    </a>
                                </li>
                                <li class="sidebar-item">
                                    <a href="#" class="sidebar-link">
                                        <i class="mdi mdi-email"></i>
                                        <span class="hide-menu"> Master Data </span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <?php
                    }
                    ?>
                    <li class="sidebar-item">
                        <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false">
                            <i class="ti-shopping-cart"></i>
                            <span class="hide-menu">Shopping</span>
                        </a>
                        <ul aria-expanded="false" class="collapse  first-level">
                            <li class="sidebar-item">
                                <a href="#" class="sidebar-link">
                                    <i class="mdi mdi-email-alert"></i>
                                    <span class="hide-menu"> Permintaan Modul </span>
                                </a>
                            </li>
                            <li class="sidebar-item">
                                <a href="#" class="sidebar-link">
                                    <i class="mdi mdi-email"></i>
                                    <span class="hide-menu"> Master Data </span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false">
                            <i class="ti-bar-chart-alt"></i>
                            <span class="hide-menu">Point of Sales</span>
                        </a>
                        <ul aria-expanded="false" class="collapse  first-level">
                            <li class="sidebar-item">
                                <a href="#" class="sidebar-link">
                                    <i class="mdi mdi-email-alert"></i>
                                    <span class="hide-menu"> Permintaan Modul </span>
                                </a>
                            </li>
                            <li class="sidebar-item">
                                <a href="#" class="sidebar-link">
                                    <i class="mdi mdi-email"></i>
                                    <span class="hide-menu"> Master Data </span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false">
                            <i class="ti-user"></i>
                            <span class="hide-menu">Forum</span>
                        </a>
                        <ul aria-expanded="false" class="collapse  first-level">
                            <li class="sidebar-item">
                                <a href="#" class="sidebar-link">
                                    <i class="mdi mdi-email-alert"></i>
                                    <span class="hide-menu"> Permintaan Modul </span>
                                </a>
                            </li>
                            <li class="sidebar-item">
                                <a href="inbox-email.html" class="sidebar-link">
                                    <i class="mdi mdi-email"></i>
                                    <span class="hide-menu"> Master Data </span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false">
                            <i class="ti-calendar"></i>
                            <span class="hide-menu">Event</span>
                        </a>
                        <ul aria-expanded="false" class="collapse  first-level">
                            <li class="sidebar-item">
                                <a href="#" class="sidebar-link">
                                    <i class="mdi mdi-email-alert"></i>
                                    <span class="hide-menu"> Permintaan Modul </span>
                                </a>
                            </li>
                            <li class="sidebar-item">
                                <a href="#="sidebar-link">
                                    <i class="mdi mdi-email"></i>
                                    <span class="hide-menu"> Master Data </span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false">
                            <i class="ti-agenda"></i>
                            <span class="hide-menu">E-Learning</span>
                        </a>
                        <ul aria-expanded="false" class="collapse  first-level">
                            <li class="sidebar-item">
                                <a href="#" class="sidebar-link">
                                    <i class="mdi mdi-email-alert"></i>
                                    <span class="hide-menu"> Permintaan Modul </span>
                                </a>
                            </li>
                            <li class="sidebar-item">
                                <a href="#="sidebar-link">
                                    <i class="mdi mdi-email"></i>
                                    <span class="hide-menu"> Master Data </span>
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </nav>
            <!-- End Sidebar navigation -->
        </div>
        <!-- End Sidebar scroll-->
    </aside>
    <!-- ============================================================== -->
    <!-- End Left Sidebar - style you can find in sidebar.scss  -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Page wrapper  -->
    <!-- ============================================================== -->
    <div class="page-wrapper">
        <!-- ============================================================== -->
        <!-- Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <div class="page-breadcrumb">
            <div class="row">
                <div class="col-5 align-self-center">
                    <!-- <h4 class="page-title">Dashboard</h4> -->
                    <div class="d-flex align-items-center">

                    </div>
                </div>
                <div class="col-7 align-self-center">
                    <div class="d-flex no-block justify-content-end align-items-center">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">

                                </li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- End Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Container fluid  -->
        <!-- ============================================================== -->
        <div class="main-wrapper">
            <!-- ============================================================== -->
            <!-- Preloader - style you can find in spinners.css -->
            <!-- ============================================================== -->
            <div class="preloader">
                <div class="lds-ripple">
                    <div class="lds-pos"></div>
                    <div class="lds-pos"></div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- Preloader - style you can find in spinners.css -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Login box.scss -->
            <!-- ============================================================== -->
            <div class="m-t-30">
                <div class="error-body text-center">
                    <img src="<?php echo base_url()?>assets/images/Arnawa_Apps Logo.png" style="width:20%;">
                    <div class="m-t-30">
                        <h2>Mohon menunggu.</h2>
                        <h3>Pengajuan anda sedang dalam proses verifikasi.</h3>
                        <?php
                        $a = 9;
                        echo $b = ((int)$a)/2;
                        echo "<br>".floor($b)."<br>".ceil($b);

                        ?>
                        <!-- <h5 class="m-b-0 text-muted font-medium">Something wrong going on this page.</h5> -->
                        <h5 class="text-muted font-medium">Customer service kami akan menghubungi Anda setelah proses verifikasi selesai.</h5>
                    </div>
                    <!-- <div class="m-t-30"><i class="ti-settings font-24"></i></div> -->
                    <div class="m-t-10">
                        <h5><a href="https://www.arnawa.co.id">www.arnawa.co.id</a></h5>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- Info box -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Email campaign chart -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- End Wrapper -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- customizer Panel -->
            <!-- ============================================================== -->
            <div class="chat-windows"></div>
            <!-- ============================================================== -->
            <!-- All Jquery -->
            <!-- ============================================================== -->
            <script src="<?php echo base_url();?>assets/libs/jquery/dist/jquery.min.js"></script>
            <!-- Bootstrap tether Core JavaScript -->
            <script src="<?php echo base_url();?>assets/libs/popper.js/dist/umd/popper.min.js"></script>
            <script src="<?php echo base_url();?>assets/libs/bootstrap/dist/js/bootstrap.min.js"></script>
            <!-- apps -->
            <script src="<?php echo base_url();?>assets/dist/js/app.min.js"></script>
            <script src="<?php echo base_url();?>assets/dist/js/app.init.js"></script>
            <script src="<?php echo base_url();?>assets/dist/js/app-style-switcher.js"></script>
            <!-- slimscrollbar scrollbar JavaScript -->
            <script src="<?php echo base_url();?>assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js"></script>
            <script src="<?php echo base_url();?>assets/extra-libs/sparkline/sparkline.js"></script>
            <!--Wave Effects -->
            <script src="<?php echo base_url();?>assets/dist/js/waves.js"></script>
            <!--Menu sidebar -->
            <script src="<?php echo base_url();?>assets/dist/js/sidebarmenu.js"></script>
            <!--Custom JavaScript -->
            <script src="<?php echo base_url();?>assets/dist/js/custom.min.js"></script>
            <!--This page JavaScript -->
            <!--chartis chart-->
            <script src="<?php echo base_url();?>assets/libs/chartist/dist/chartist.min.js"></script>
            <script src="<?php echo base_url();?>assets/libs/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.min.js"></script>
            <!--c3 charts -->
            <script src="<?php echo base_url();?>assets/extra-libs/c3/d3.min.js"></script>
            <script src="<?php echo base_url();?>assets/extra-libs/c3/c3.min.js"></script>
            <!--chartjs -->
            <script src="<?php echo base_url();?>assets/libs/raphael/raphael.min.js"></script>
            <script src="<?php echo base_url();?>assets/libs/morris.js/morris.min.js"></script>

            <script src="<?php echo base_url();?>assets/dist/js/pages/dashboards/dashboard1.js"></script>
        </body>

        </html>