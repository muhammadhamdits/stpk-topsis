<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>STPK-TOPSIS | Kelompok 4 STPK 02</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSS -->
        <link rel="stylesheet" href="{{ url('css/all.min.css') }}">
        <!-- <link rel="stylesheet" href="{{ url('css/ionicons.min.css') }}"> -->
        <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
        <link rel="stylesheet" href="{{ url('css/tempusdominus-bootstrap-4.min.css') }}">
        <link rel="stylesheet" href="{{ url('css/icheck-bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ url('css/jqvmap.min.css') }}">
        <link rel="stylesheet" href="{{ url('css/adminlte.min.css') }}">
        <link rel="stylesheet" href="{{ url('css/OverlayScrollbars.min.css') }}">
        <link rel="stylesheet" href="{{ url('css/daterangepicker.css') }}">
        <link rel="stylesheet" href="{{ url('css/summernote-bs4.css') }}">
        <!-- <link rel="stylesheet" href="{{ url('css/css.css') }}"> -->
        <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <!-- CSS -->
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
                </li>
            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#">
                    <i class="fas fa-th-large"></i>
                    </a>
                </li>
            </ul>
        </nav>

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="index3.html" class="brand-link">
                <span class="brand-text font-weight-light">STPK TOPSIS</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <li class="nav-item">
                            <a href="pages/widgets.html" class="nav-link">
                                <i class="nav-icon fas fa-th"></i>
                                <p>
                                    Widgets
                                    <span class="right badge badge-danger">New</span>
                                </p>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                @yield('contentheader')
            </div>

            <!-- Main content -->
            <section class="content">
                @yield('content')
            </section>
        </div>

        <!-- Footer -->
        <footer class="main-footer">
            <strong>Copyright &copy; 2020 Kelompok 4 STPK 02 | Template by <a href="http://adminlte.io">AdminLTE.io</a>.</strong>
            All rights reserved.
            <div class="float-right d-none d-sm-inline-block">
                <b>Version</b> 3.0.2
            </div>
        </footer>

        <aside class="control-sidebar control-sidebar-dark">
        </aside>
    </div>

    <!-- Script -->
        <script src="{{ url('js/jquery.min.js') }}"></script>
        <script src="{{ url('js/jquery-ui.min.js') }}"></script>
        <script>$.widget.bridge('uibutton', $.ui.button)</script>
        <script src="{{ url('js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ url('js/Chart.min.js') }}"></script>
        <script src="{{ url('js/sparkline.js') }}"></script>
        <!-- <script src="{{ url('js/jquery.vmap.min.js') }}"></script> -->
        <!-- <script src="{{ url('js/jquery.vmap.usa.js') }}"></script> -->
        <script src="{{ url('js/jquery.knob.min.js') }}"></script>
        <script src="{{ url('js/moment.min.js') }}"></script>
        <script src="{{ url('js/daterangepicker.js') }}"></script>
        <script src="{{ url('js/tempusdominus-bootstrap-4.min.js') }}"></script>
        <script src="{{ url('js/summernote-bs4.min.js') }}"></script>
        <script src="{{ url('js/jquery.overlayScrollbars.min.js') }}"></script>
        <script src="{{ url('js/adminlte.js') }}"></script>
        <script src="{{ url('js/dashboard.js') }}"></script>
        @yield('js')
    <!-- Script -->
</body>
</html>
