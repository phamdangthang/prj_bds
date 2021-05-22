<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="author" content="Pham Dang Thang">
    <meta name="keywords" content="au theme template">
    <meta name="csrf-token" content="{{ csrf_token() }}"/>

    <!-- Title Page-->
    <title>@yield('title')</title>

    <!-- Fontfaces CSS-->
    <link href="{{ asset('modules/admin/css/font-face.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('modules/admin/vendor/font-awesome-5/css/fontawesome-all.min.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('modules/admin/vendor/font-awesome-4.7/css/font-awesome.min.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('modules/admin/vendor/mdi-font/css/material-design-iconic-font.min.css') }}" rel="stylesheet" media="all">

    <link href="{{ asset('modules/admin/vendor/bootstrap-4.1/bootstrap.min.css') }}" rel="stylesheet" media="all">

    <link href="{{ asset('modules/admin/vendor/css-hamburgers/hamburgers.min.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('modules/admin/vendor/select2/select2.min.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('modules/admin/vendor/perfect-scrollbar/perfect-scrollbar.css') }}" rel="stylesheet" media="all">

    <link href="{{ asset('modules/admin/css/theme.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('modules/admin/css/common.css') }}" rel="stylesheet" media="all">
    <script src="{{ asset('modules/admin/vendor/jquery-3.2.1.min.js') }}"></script>
    <script src="{{ asset('plugins/toastr/sweetalert2@10.js') }}"></script>
    <link href="{{ asset('modules/user/css/icons.min.css') }}" rel="stylesheet" type="text/css"/>
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/jquery.validate.min.js"></script>

    <script>
        const BASE_URL = "{{ url('/') }}";
        const BASE_API_URL = "{{ url('/api') }}";
    </script>
</head>

<body class="">
    <div class="page-wrapper">
        @include('admin::layouts.header')

        @include('admin::layouts.sidebar')

        <div class="page-container">
            <div class="main-content">
                <div class="section__content section__content--p30">
                    @yield('content')
                </div>
            </div>
        </div>

        @yield('script')
    </div>

    <script src="{{ asset('modules/admin/vendor/bootstrap-4.1/popper.min.js') }}"></script>
    <script src="{{ asset('modules/admin/vendor/bootstrap-4.1/bootstrap.min.js') }}"></script>
    <script src="{{ asset('modules/admin/vendor/perfect-scrollbar/perfect-scrollbar.js') }}"></script>
    <script src="{{ asset('modules/admin/vendor/select2/select2.min.js') }}"></script>
    <script src="{{ asset('modules/admin/vendor/main.js') }}"></script>
    <script src="{{ asset('modules/admin/js/common.js') }}"></script>

    <script>
        @if(Session::has('alert-success'))
            Toast.fire({
                icon: 'success',
                title: "{{ Session::get('alert-success') }}"
            })
        @endif

        @if(Session::has('alert-error'))
            Toast.fire({
                icon: 'error',
                title: "{{ Session::get('alert-error') }}"
            })
        @endif
    </script>
</body>
</html>
<!-- end document-->