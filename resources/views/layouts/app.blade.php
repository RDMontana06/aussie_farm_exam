<!-- resources/views/layouts/app.blade.php -->
<!DOCTYPE html>
<html>
<head>
    <!-- Include AdminLTE CSS -->
    <!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> -->
   <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
   <script src="{{ asset('dist/bootstrap/js/bootstrap.bundle.js') }}"></script>
   <link rel="stylesheet" href="https://cdn3.devexpress.com/jslib/21.1.6/css/dx.common.css" />
    <link rel="stylesheet" href="https://cdn3.devexpress.com/jslib/21.1.6/css/dx.light.css" />
    <script src="https://cdn3.devexpress.com/jslib/21.1.6/js/dx.all.js"></script>

    <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Aussie Farm</title>
    <style>
        .content-wrapper{
            min-height: 0px !important;
        }
    </style>
</head>
<body class="hold-transition layout-top-nav">
    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand-md navbar-light bg-white border-bottom">
        <div class="container">
            <!-- Navbar content -->
        </div>
    </nav>

    <!-- Content Wrapper -->
    <div class="content-wrapper">
        <!-- Main content -->
        <div class="content">
            <div class="container">
                @yield('content')
            </div>
        </div>
    </div>
    <!-- Include AdminLTE JavaScript -->
    <script src="{{ asset('dist/js/adminlte.min.js') }}"></script>
</body>
</html>
