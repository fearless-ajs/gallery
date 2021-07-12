<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Dashboard</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{asset('admin/plugins/fontawesome-free/css/all.min.css')}}">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{asset('admin/plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('admin/dist/css/adminlte.min.css')}}">

    <link rel="stylesheet" href="{{asset('admin/dist/css/toastr.css')}}">
    <!--Laravel livewire styles  -->
    <livewire:styles />

</head>


<body class="hold-transition dark-mode sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
<div class="wrapper">

    <!-- Preloader -->
    <div class="preloader flex-column justify-content-center align-items-center">
        <img class="animation__wobble" src="{{asset('admin/dist/img/AdminLTELogo.png')}}" alt="AdminLTELogo" height="60" width="60">
    </div>

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-dark">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
            </li>
            <li class="nav-item d-none d-sm-inline-block">
                <a href="index3.html" class="nav-link">Home</a>
            </li>
            <li class="nav-item d-none d-sm-inline-block">
                <a href="#" class="nav-link">Settings</a>
            </li>
        </ul>
        <!-- Right navbar links -->
        <ul class="navbar-nav ml-auto">

            <!-- Messages Dropdown Menu -->
            <li class="nav-item dropdown">
                <a class="nav-link"  href="{{route('logout')}}">
                    <i class="far fa-user"></i>
                    <span class="badge badge-danger navbar-badge">Logout</span>
                </a>
          </li>

        </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Component-->
    <x-admin-sidebar />



    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
    @yield('content')
    </div>


    <!-- Main Footer -->
    <footer class="main-footer">
        <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong>
        All rights reserved.
        <div class="float-right d-none d-sm-inline-block">
            <b>Version</b> 3.1.0
        </div>
    </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->
<!--Livewire script-->
<livewire:scripts />
<!-- jQuery -->
<script src="{{asset('admin/plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap -->
<script src="{{asset('admin/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- overlayScrollbars -->
<script src={{asset('admin/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}""></script>
<!-- AdminLTE App -->
<script src="{{asset('admin/dist/js/adminlte.js')}}"></script>

<!-- PAGE PLUGINS -->
<!-- jQuery Mapael -->
<script src="{{asset('admin/plugins/jquery-mousewheel/jquery.mousewheel.js')}}"></script>
<script src="{{asset('admin/plugins/raphael/raphael.min.js')}}"></script>
<script src="{{asset('admin/plugins/jquery-mapael/jquery.mapael.min.js')}}"></script>
<script src="{{asset('admin/plugins/jquery-mapael/maps/usa_states.min.js')}}"></script>
<!-- ChartJS -->
<script src="{{asset('admin/plugins/chart.js/Chart.min.js')}}"></script>

<!-- AdminLTE for demo purposes -->
<script src="{{asset('admin/dist/js/demo.js')}}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{asset('admin/dist/js/pages/dashboard2.js')}}"></script>
<script  src="{{asset('admin/dist/js/toastr.js')}}"></script>
<script>
    window.livewire.on('alert', param => {
        toastr[param['type']](param['message'], param['type']);
    });
</script>
</body>
</html>

