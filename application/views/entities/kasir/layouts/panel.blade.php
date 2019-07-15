<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>{{ getenv('APP_NAME') }} | Panel(Kasir) - {{ $title }}</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('cpanel/vendor/font-awesome/css/font-awesome.min.css') }}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('cpanel/css/adminlte.css') }}">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    @yield('hstyles')
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        @include('entities.kasir.includes.header')
        @include('entities.kasir.includes.leftsider')
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            @include('entities.kasir.includes.messages')
            @yield('content')
        </div>
        <!-- /.content-wrapper -->
        @include('entities.kasir.includes.footer')
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="{{ asset('cpanel/vendor/jquery/jquery.min.js') }}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('cpanel/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- SlimScroll -->
    <script src="{{ asset('cpanel/vendor/slimScroll/jquery.slimscroll.min.js') }}"></script>
    <!-- FastClick -->
    <script src="{{ asset('cpanel/vendor/fastclick/fastclick.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('cpanel/js/adminlte.min.js') }}"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="{{ asset('cpanel/js/demo.js') }}"></script>
    @yield('fscripts')
</body>

</html>
