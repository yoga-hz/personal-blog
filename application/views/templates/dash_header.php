<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title><?= $page_title ?> | Yoga Hilmi's Blog</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="<?= base_url('assets/') ?>img/favicon.png">

    <!-- App css -->
    <link href="<?= base_url('assets/css/') ?>bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="<?= base_url('assets/css/') ?>icons.min.css" rel="stylesheet" type="text/css" />
    <link href="<?= base_url('assets/css/') ?>app.min.css" rel="stylesheet" type="text/css" />

</head>

<body>

    <!-- Begin page -->
    <div id="wrapper">

        <!-- ========== Left Sidebar Start ========== -->
        <div class="left-side-menu left-side-menu-dark">

            <div class="slimscroll-menu">

                <!-- LOGO -->
                <a href="<?= base_url('admin/dashboard') ?>" class="logo text-center mb-3">
                    <span class="logo-lg">
                        <img src="<?= base_url('assets/') ?>img/favicon.png" alt="" height="64">
                    </span>
                    <span class="logo-sm">
                        <img src="<?= base_url('assets/') ?>img/favicon.png" alt="" height="24">
                    </span>
                </a>

                <!--- Sidemenu -->
                <div id="sidebar-menu">

                    <ul class="metismenu" id="side-menu">

                        <li>
                            <a href="<?= base_url() ?>">
                                <i class="mdi mdi-link"></i>
                                <span>Goto Site</span>
                            </a>
                        </li>
                        <li class="menu-title">Navigation</li>

                        <li>
                            <a href="<?= base_url('admin/dashboard') ?>" class="text-warning">
                                <i class="mdi mdi-home"></i>
                                <span>Dashboard</span>
                            </a>
                        </li>

                        <li class="menu-title">Posts</li>

                        <li>
                            <a href="javascript: void(0);" class="text-primary">
                                <i class="mdi mdi-file-plus"></i>
                                <span>Add new Post</span>
                            </a>
                        </li>
                        <li>
                            <a href="javascript: void(0);" style="color: mediumpurple" onmouseover="$(this).css('color', 'mediumorchid')" onmouseout="$(this).css('color', 'mediumpurple')">
                                <i class="mdi mdi-file-document"></i>
                                <span>All Posts</span>
                            </a>
                        </li>

                        <li class="menu-title">User</li>

                        <li>
                            <a href="<?= base_url('admin/edit/') ?>" class="text-info">
                                <i class="mdi mdi-account-edit"></i>
                                <span>Edit Profile</span>
                            </a>
                        </li>

                        <li class="menu-title">Logout</li>

                        <li>
                            <a href="<?= base_url('admin/logout') ?>" class="text-danger">
                                <i class="mdi mdi-logout"></i>
                                <span>Logout</span>
                            </a>
                        </li>
                    </ul>

                </div>
                <!-- End Sidebar -->

                <div class="clearfix"></div>

            </div>
            <!-- Sidebar -left -->

        </div>
        <!-- Left Sidebar End -->

        <!-- ============================================================== -->
        <!-- Start Page Content here -->
        <!-- ============================================================== -->

        <div class="content-page">
            <div class="content">
                <!-- Topbar Start -->
                <div class="navbar-custom" style="background-color: #343b4a">
                    <ul class="list-unstyled topbar-right-menu float-right mb-0">

                        <li class="dropdown notification-list">
                            <a class="nav-link dropdown-toggle nav-user mr-0" data-toggle="dropdown" role="button" aria-haspopup="false" aria-expanded="false">
                                <img src="<?= base_url('assets/img/profile/') . $user['image'] ?>" alt="user-image" class="rounded-circle">
                                <small class="pro-user-name ml-1">
                                    <?= $user['name'] ?>
                                </small>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-animated profile-dropdown ">
                                <!-- item-->
                                <div class="dropdown-header noti-title">
                                    <h6 class="text-overflow m-0">Welcome !</h6>
                                </div>

                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item notify-item text-info">
                                    <i class="mdi mdi-account"></i>
                                    <span>My Account</span>
                                </a>

                                <div class="dropdown-divider"></div>

                                <!-- item-->
                                <a href="<?= base_url('admin/logout/') ?>" class="dropdown-item notify-item text-danger">
                                    <i class="mdi mdi-logout"></i>
                                    <span>Logout</span>
                                </a>

                            </div>
                        </li>

                    </ul>
                    <button class="button-menu-mobile open-left disable-btn">
                        <i class="fe-menu"></i>
                    </button>
                    <div class="app-search">
                        <h3><?= $page_title ?></h3>
                    </div>
                </div>
                <!-- end Topbar --> 