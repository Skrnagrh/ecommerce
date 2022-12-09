<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard | E-commerce</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="/admin/plugins/fontawesome-free/css/all.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="/admin/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="/admin/dist/css/adminlte.min.css">
    <link rel="stylesheet" href="/admin/dist/css/trix.css">
    <script type="text/javascript" src="/admin/dist/js/trix.js"></script>

    <style>
        trix-toolbar [data-trix-button-group="file-tools"]{
          display: none;
        }
      </style>
</head>

<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">

    <div class="wrapper">
        <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__wobble" src="/sayurshop.png" alt="Sayur Shop" height="300"
                width="300">>
        </div>
        @include('admin.layouts.navbar')
        @include('admin.layouts.sidebar')
        @yield('content')
    </div>



    <!-- REQUIRED SCRIPTS -->
    <!-- jQuery -->
    <script src="/admin/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="/admin/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- overlayScrollbars -->
    <script src="/admin/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
    <!-- AdminLTE App -->
    <script src="/admin/dist/js/adminlte.js"></script>
    {{-- <script src="/admin/dist/js/trix.js"></script> --}}

    <!-- PAGE PLUGINS -->
    <!-- jQuery Mapael -->
    <script src="/admin/plugins/jquery-mousewheel/jquery.mousewheel.js"></script>
    <script src="/admin/plugins/raphael/raphael.min.js"></script>
    <script src="/admin/plugins/jquery-mapael/jquery.mapael.min.js"></script>
    <script src="/admin/plugins/jquery-mapael/maps/usa_states.min.js"></script>
    <!-- ChartJS -->
    <script src="/admin/plugins/chart.js/Chart.min.js"></script>

    <!-- AdminLTE for demo purposes -->
    <script src="/admin/dist/js/demo.js"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="/admin/dist/js/pages/dashboard2.js"></script>
</body>

</html>
