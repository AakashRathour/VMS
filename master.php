<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <title>Vehicle Management System</title>
    <meta name="description" content="Vehicle Management System">
    <link rel="shortcut icon" href="https://www.tractorjunction.com/assets/images/logo/TJ_LOGO_en.svg">
    <link href="/assets/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="/assets/css/ruang-admin.min.css" rel="stylesheet" type="text/css">
    
    <link href="/assets/css/sweetalert2.css" rel="stylesheet" type="text/css">
    <link href="/assets/css/daterangepicker.css" rel="stylesheet" type="text/css" />
    {{-- Form CSS --}}
    <link href="/assets/css/select2.min.css" rel="stylesheet" type="text/css">
    <link href="/assets/css/bootstrap-datepicker.min.css" rel="stylesheet" >
    <link href="/assets/css/jquery.bootstrap-touchspin.css" rel="stylesheet" >
    <link href="/assets/css/clockpicker.css" rel="stylesheet">
    
    <link href="/assets/css/style.css?v1.3" rel="stylesheet" type="text/css">
    <link href="/assets/css/custom.css?v1.1" rel="stylesheet" type="text/css">
    <link href="/assets/css/bootstrap-icons.min.css?v1.0" rel="stylesheet" type="text/css">
    <link href="/assets/css/fileinput.css?v1.0" rel="stylesheet" type="text/css">
</head>

<body id="page-top">
    <div id="wrapper">
        @include('partials.sidebar')
        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                @include('partials.topbar')
                @yield('contents')
                @include('partials.logout')
            </div>
            @include('partials.footer')
        </div>
    </div>

    <!-- Scroll to top -->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <script src="/assets/js/jquery.min.js"></script>
    <script src="/assets/js/bootstrap.bundle.min.js"></script>
    <script src="/assets/js/jquery.easing.min.js"></script>
    <script src="/assets/js/Chart.min.js"></script>
    <script src="/assets/js/notify.min.js"></script>
    <script src="/assets/js/sweetalert2.min.js"></script>
    <script src="/assets/js/moment.min.js"></script>
    <script src="/assets/js/daterangepicker.min.js"></script>
    {{-- Form JS --}}
    <script src="/assets/js/select2.min.js"></script>
    <script src="/assets/js/bootstrap-datepicker.min.js"></script>
    <script src="/assets/js/jquery.bootstrap-touchspin.js"></script>
    <script src="/assets/js/clockpicker.js"></script>

    {{-- <script src="/assets/js/multi-image.js"></script> --}}
    <script src="/assets/js/multi-img-upload-js/buffer.min.js"></script>
    <script src="/assets/js/multi-img-upload-js/fileinput.js"></script>
    
    <script src="/assets/js/ruang-admin.min.js"></script>
    @include('partials.script')
    @yield('javascript')
</body>
</html>