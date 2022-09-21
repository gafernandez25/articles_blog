<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Blog</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="/public/plugins/fontawesome-free/css/all.min.css">
    <!-- pace-progress -->
    <link rel="stylesheet" href="/public/plugins/pace-progress/themes/black/pace-theme-flat-top.css">
    <link rel="stylesheet" href="/public/plugins/pace-progress/themes/black/pace-theme-flat-top.css">
    <!-- Select2 -->
    <link rel="stylesheet" href="/public/plugins/select2/css/select2.min.css">
    <link rel="stylesheet" href="/public/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="/public/dist/css/adminlte.min.css">
    <!-- Page specific css -->
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
            </li>
        </ul>
    </nav>
    <!-- /.navbar -->
    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <a href="" class="brand-link">
            <span class="brand-text font-weight-light">Articles</span>
        </a>

        <!-- Sidebar -->
        <div class="sidebar">


            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                    data-accordion="false">
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon far fa-envelope"></i>
                            <p>Articles <i class="right fas fa-angle-left"></i></p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="/articles" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>List</p>
                                </a>
                            </li>
                            <?php
                            if (isset($_SESSION["loggedUser"])):
                                ?>
                                <li class="nav-item">
                                    <a href="/articles/create" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>New</p>
                                    </a>
                                </li>
                            <?php
                            endif;
                            ?>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <?php
                        if (isset($_SESSION["loggedUser"])):
                            ?>
                            <a href="/logout" class="nav-link">
                                <i class="nav-icon far fa-envelope"></i>
                                <p>Logout</p>
                            </a>
                        <?php
                        else:
                            ?>
                            <a href="/login" class="nav-link">
                                <i class="nav-icon far fa-envelope"></i>
                                <p>Login</p>
                            </a>
                        <?php
                        endif;
                        ?>
                    </li>
                </ul>
            </nav>
            <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
    </aside>