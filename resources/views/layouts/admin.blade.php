<?php
$menus = config('menu');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel Quicktask</title>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ url('assets/ad123') }}/plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ url('assets/ad123') }}/dist/css/adminlte.min.css">
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <!-- Site wrapper -->
    <div class="wrapper">
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="#" class="nav-link">@yield('title')</a>
                </li>
            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                        <i class="fas fa-expand-arrows-alt"></i>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="#" class="brand-link">
                <img src="{{ url('assets/ad123') }}/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light">Admin</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="{{ url('assets/ad123') }}/dist/img/user.jpg" class="img-circle elevation-2" alt="User Image" style="width: 40px; height: 40px;">
                    </div>
                    <div class="info">
                        <a href="#" class="d-block">Xuan Truong Dao</a>
                    </div>
                </div>

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                        @foreach($menus as $m)
                            <li class="nav-item">
                                <a href="{{ route($m['route']) }}" class="nav-link">
                                    <i class="nav-icon fas {{$m['icon']}}"></i>
                                    <p>
                                        {{$m['label']}}
                                    </p>
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <br>
        <div class="content-wrapper">
            <!-- Main content -->
            <section class="content">

                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <!-- Default box -->
                            <div class="card">
                                <div class="card-body">
                                    @if(Session::has('error'))
                                        <div class="alert alert-danger" role="alert">
                                            {{Session::get('error')}}
                                        </div>
                                    @endif
                                    @if(Session::has('success'))
                                        <div class="alert alert-success" role="alert">
                                            {{Session::get('success')}}
                                        </div>
                                    @endif
                                    @yield('main')
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                        </div>
                    </div>
                </div>
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="{{ url('assets/ad123') }}/plugins/jquery/jquery.min.js"></script>

    <!-- Bootstrap 4 -->
    <script src="{{ url('assets/ad123') }}/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    
    <!-- AdminLTE App -->
    <script src="{{ url('assets/ad123') }}/dist/js/adminlte.min.js"></script>

    @yield('js')
</body>

</html>
