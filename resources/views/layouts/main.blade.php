<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Барбершоп</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('adminlte/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('adminlte/dist/css/adminlte.min.css') }}">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{ asset('adminlte/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
    <!-- Select2 -->
    <link rel="stylesheet" href="{{ asset('adminlte/plugins/select2/css/select2.min.css') }}">
    <!-- summernote -->
    <link rel="stylesheet" href="{{ asset('adminlte/plugins/summernote/summernote-bs4.min.css') }}">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet"
        href="{{ asset('adminlte/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <!-- Preloader -->
        <div class="preloader flex-column justify-content-center align-items-center">
            <p class="animation__shake">Барбершоп</p>
        </div>

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i
                            class="fas fa-bars"></i></a>
                </li>
            </ul>
            <ul class="navbar-nav ml-auto mb-3">
                <li class="nav-link">
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <input type="submit" class="btn btn-outline-dark" value="Выйти">
                    </form>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="{{ route('main.index') }}" class="brand-link">
                <span class="brand-text font-weight-light">Барбершоп</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">




                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                        <li class="nav-item">
                            <a href="{{ route('master.index') }}" class="nav-link">
                                <i class="nav-icon fas fa-tshirt"></i>
                                <p>
                                    Мастера
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('service.index') }}" class="nav-link">
                                <i class="nav-icon fas fa-concierge-bell"></i>
                                <p>
                                    Услуги
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('photo.index') }}" class="nav-link">
                                <i class="nav-icon fas fa-images"></i>
                                <p>
                                    Фото
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('reservation.index') }}" class="nav-link">
                                <i class="nav-icon fas fa-pen"></i>
                                <p>
                                    Записи
                                </p>
                            </a>
                        </li>
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            @yield('content')
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
        <footer class="main-footer">
            <strong>Copyright &copy; 2014-{{ now()->year }} <a
                    href="{{ route('main.index') }}">Барбершоп</a>.</strong>
            All rights reserved.
        </footer>

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="{{ asset('adminlte/plugins/jquery/jquery.min.js') }}"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="{{ asset('adminlte/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
        $.widget.bridge('uibutton', $.ui.button)
    </script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- overlayScrollbars -->
    <script src="{{ asset('adminlte/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
    <!-- Select2 -->
    <script src="{{ asset('adminlte/plugins/select2/js/select2.full.min.js') }}"></script>
    <!-- moment -->
    <script src="{{ asset('adminlte/plugins/moment/moment.min.js') }}"></script>
    <!-- Summernote -->
    <script src="{{ asset('adminlte/plugins/summernote/summernote-bs4.min.js') }}"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="{{ asset('adminlte/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('adminlte/dist/js/adminlte.js') }}"></script>

    <script>
        $(function() {
            // Summernote
            $('#summernote').summernote()

            //Initialize Select2 Elements
            $('.services').select2()

            //Date picker

            // получаем дату и время
            var today = new Date();
            var date = (new Date()).toISOString().slice(0, 10);

            date = date.split(/\s*-\s*/)

            var nowDate = date[1] + "/" + date[2] + "/" + date[0]
            var maxReservationDate = ++date[1] + "/" + date[2] + "/" + date[0]


            //Мастера
            $('#datetimepicker-create').datetimepicker({
                allowMultidate: true,
                multidateSeparator: ' ',
                format: 'L',
                minDate: nowDate,
                maxDate: maxReservationDate,
            });
            $('#datetimepicker-edit').datetimepicker({
                allowMultidate: true,
                multidateSeparator: ' ',
                format: 'L',
                minDate: nowDate,
                maxDate: maxReservationDate,
            });
        })
    </script>
</body>

</html>
