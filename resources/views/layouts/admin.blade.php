<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel Quicktask</title>

    <link rel="stylesheet" href="{{ url('assets/ad123') }}/plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="{{ url('assets/ad123') }}/plugins/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="{{ url('assets/ad123') }}/dist/css/adminlte.min.css">
    <link rel="stylesheet" href="{{ url('assets/ad123') }}/dist/css/admin.css">
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <!-- header -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="#" class="nav-link">@yield('title')</a>
                </li>
            </ul>
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a href="{!! route('change-language', ['en']) !!}" class="dropdown-item lang-item">
                        <i class="flag-icon flag-icon-us mr-2"></i> {{ __('messages.english') }}
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{!! route('change-language', ['vi']) !!}" class="dropdown-item lang-item">
                        <i class="flag-icon flag-icon-vn mr-2"></i> {{ __('messages.vietnamese') }}
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                        <i class="fas fa-expand-arrows-alt"></i>
                    </a>
                </li>
            </ul>
        </nav>

        <!-- sidebar -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <a href="#" class="brand-link">
                <img src="{{ config('image.logo') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3">
                <span class="brand-text font-weight-light">{{ __('messages.admin') }}</span>
            </a>
            <div class="sidebar">
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="{{ config('image.user') }}" id="user-img" class="img-circle elevation-2" alt="User Image">
                    </div>
                    <div class="info">
                        <a href="#" class="d-block">Xuan Truong Dao</a>
                    </div>
                </div>
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        @foreach(config('menu') as $key => $value)
                            <li class="nav-item">
                                <a href="{{ route($value['route']) }}" class="nav-link">
                                    <i class="nav-icon fas {{ $value['icon'] }}"></i>
                                    <p>{{ __('messages.' . $value['label']) }}</p>
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </nav>
            </div>
        </aside>

        <br>

        <!-- main-content -->
        <div class="content-wrapper">
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    @if (Session::has('error'))
                                        <div class="alert alert-danger" role="alert">
                                            {{ Session::get('error') }}
                                        </div>
                                    @endif
                                    @if (Session::has('success'))
                                        <div class="alert alert-success" role="alert">
                                            {{ Session::get('success') }}
                                        </div>
                                    @endif
                                    @yield('main')
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>

    <script src="{{ url('assets/ad123') }}/plugins/jquery/jquery.min.js"></script>
    <script src="{{ url('assets/ad123') }}/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="{{ url('assets/ad123') }}/dist/js/adminlte.min.js"></script>

    @yield('js')

</body>

</html>