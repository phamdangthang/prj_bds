<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="author" content="Pham Dang Thang">
    <meta name="keywords" content="au theme template">

    <!-- Title Page-->
    <title>Forms</title>

    <!-- Fontfaces CSS-->
    <link href="{{ asset('modules/admin/css/font-face.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('modules/admin/vendor/font-awesome-5/css/fontawesome-all.min.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('modules/admin/vendor/font-awesome-4.7/css/font-awesome.min.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('modules/admin/vendor/mdi-font/css/material-design-iconic-font.min.css') }}" rel="stylesheet" media="all">

    <link href="{{ asset('modules/admin/vendor/bootstrap-4.1/bootstrap.min.css') }}" rel="stylesheet" media="all">

    <link href="{{ asset('modules/admin/vendor/css-hamburgers/hamburgers.min.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('modules/admin/vendor/slick/slick.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('modules/admin/vendor/select2/select2.min.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('modules/admin/vendor/perfect-scrollbar/perfect-scrollbar.css') }}" rel="stylesheet" media="all">

    <link href="{{ asset('modules/admin/css/theme.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('modules/admin/css/common.css') }}" rel="stylesheet" media="all">

    <script>
        const BASE_URL = "{{ url('/') }}";
        const BASE_API_URL = "{{ url('/api') }}";
    </script>
</head>

<body class="animsition">
    <div class="page-wrapper">
        @include('admin::layouts.header')

        @include('admin::layouts.sidebar')

        @yield('content')

        @yield('script')
    </div>

    <script src="{{ asset('modules/admin/vendor/jquery-3.2.1.min.js') }}"></script>
    <script src="{{ asset('modules/admin/vendor/bootstrap-4.1/popper.min.js') }}"></script>
    <script src="{{ asset('modules/admin/vendor/bootstrap-4.1/bootstrap.min.js') }}"></script>
    <script src="{{ asset('modules/admin/vendor/animsition/animsition.min.js') }}"></script>
    <script src="{{ asset('modules/admin/vendor/perfect-scrollbar/perfect-scrollbar.js') }}"></script>
    <script src="{{ asset('modules/admin/vendor/select2/select2.min.js') }}"></script>
    <script src="{{ asset('modules/admin/vendor/main.js') }}"></script>
</body>
</html>
<!-- end document-->